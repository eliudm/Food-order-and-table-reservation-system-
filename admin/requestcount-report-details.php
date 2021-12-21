<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if (strlen($_SESSION['fosaid']==0)) {
  header('location:logout.php');
  } else{

  

  ?>
<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Food Ordering System</title>

    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="font-awesome/css/font-awesome.css" rel="stylesheet">
    <link href="css/plugins/iCheck/custom.css" rel="stylesheet">
    <link href="css/plugins/steps/jquery.steps.css" rel="stylesheet">
    <link href="css/animate.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">

</head>

<body>

    <div id="wrapper">

    <?php include_once('includes/leftbar.php');?>

        <div id="page-wrapper" class="gray-bg">
             <?php include_once('includes/header.php');?>
        <div class="row border-bottom">
        <p style="font-size:16px; color:red;"> <?php if($msg){
    echo $msg;
  }  ?> </p>
        </div>
            
        <div class="wrapper wrapper-content animated fadeInRight">
            
            <div class="row">
                <div class="col-lg-12">
                    <div class="ibox">
                        
                        <div class="ibox-content">
                           
<h4 class="header-title m-t-0 m-b-30">Report Counts</h4>
<?php
$fdate=$_POST['fromdate'];
$tdate=$_POST['todate'];
?>
<h5 align="center" style="color:blue">Order Count Report from <?php echo $fdate?> to <?php echo $tdate?></h5>
<hr />
<table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                        <thead>
<tr>
<th>S.NO</th>
<th>Total Order</th>
<th>Total Order not confirmed</th>
<th>Total Order Confirmed</th>
<th>Total Order Cancelled</th>
<th>Total Order being prepared</th>
<th>Total Order Pickup</th>
<th>Total Delivered</th>
</tr>
</thead>
<?php
$ret=mysqli_query($con,"select month(OrderTime) as lmonth,year(OrderTime) as lyear,
    count(ID) as totalcount,count(if((OrderFinalStatus='' || OrderFinalStatus is null),0,null)) as uncofirmedorder,
    count(if(OrderFinalStatus='Order Confirmed',0,null)) as confirmedorder,
    count(if(OrderFinalStatus='Food being Prepared',0,null)) as fdbgpr,
    count(if(OrderFinalStatus='Food Pickup',0,null)) as foodpickup,
    count(if(OrderFinalStatus='Food Delivered',0,null)) as fooddel,
    count(if(OrderFinalStatus='Order Cancelled',0,null)) as foodcancel 
    from tblorderaddresses where date(OrderTime) between '$fdate' and '$tdate' group by lmonth,lyear");
while ($row=mysqli_fetch_array($ret)) {

?>
              
                <tr>
                  <td><?php  echo $row['lmonth']."/".$row['lyear'];?></td>
              <td><?php  echo $total=$row['totalcount'];?></td>
              <td><?php  echo $npytotal=$row['uncofirmedorder'];?></td>
                  <td><?php  echo $ntotal=$row['confirmedorder'];?></td>
                    <td><?php  echo $tctotal=$row['foodcancel'];?></td>
                  <td><?php  echo $atotl=$row['fdbgpr'];?></td>
                <td><?php  echo $intotal=$row['foodpickup'];?></td>
                <td><?php  echo $aritotal=$row['fooddel'];?></td>
                    </tr>
                <?php
$ftotal+=$total;
$ttlny+=$npytotal;
$fntotal+=$ntotal;
$fctotal+=$tctotal;
$fatotl+=$atotl;
$fintotal+=$intotal;
$faritotal+=$aritotal;

}?>
   
   <tr>
                  <td>Total </td>
              <td><?php  echo $ftotal;?></td>
              <td><?php echo $ttlny;?></td>
                  <td><?php  echo $fntotal;?></td>
                      <td><?php  echo $fctotal;?></td>
                  <td><?php  echo $fatotl;?></td>
                <td><?php  echo $fintotal;?></td>
                <td><?php  echo $faritotal;?></td>
                 
                 
                </tr>   

</table>
                        </div>
                    </div>
                    </div>

                </div>
            </div>
      
    
    
       <?php include_once('includes/footer.php');?>

        </div>
        </div>



    <!-- Mainly scripts -->
    <script src="js/jquery-3.1.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.js"></script>
    <script src="js/plugins/metisMenu/jquery.metisMenu.js"></script>
    <script src="js/plugins/slimscroll/jquery.slimscroll.min.js"></script>

    <!-- Custom and plugin javascript -->
    <script src="js/inspinia.js"></script>
    <script src="js/plugins/pace/pace.min.js"></script>

    <!-- Steps -->
    <script src="js/plugins/steps/jquery.steps.min.js"></script>

    <!-- Jquery Validate -->
    <script src="js/plugins/validate/jquery.validate.min.js"></script>


    <script>
        $(document).ready(function(){
            $("#wizard").steps();
            $("#form").steps({
                bodyTag: "fieldset",
                onStepChanging: function (event, currentIndex, newIndex)
                {
                    // Always allow going backward even if the current step contains invalid fields!
                    if (currentIndex > newIndex)
                    {
                        return true;
                    }

                    // Forbid suppressing "Warning" step if the user is to young
                    if (newIndex === 3 && Number($("#age").val()) < 18)
                    {
                        return false;
                    }

                    var form = $(this);

                    // Clean up if user went backward before
                    if (currentIndex < newIndex)
                    {
                        // To remove error styles
                        $(".body:eq(" + newIndex + ") label.error", form).remove();
                        $(".body:eq(" + newIndex + ") .error", form).removeClass("error");
                    }

                    // Disable validation on fields that are disabled or hidden.
                    form.validate().settings.ignore = ":disabled,:hidden";

                    // Start validation; Prevent going forward if false
                    return form.valid();
                },
                onStepChanged: function (event, currentIndex, priorIndex)
                {
                    // Suppress (skip) "Warning" step if the user is old enough.
                    if (currentIndex === 2 && Number($("#age").val()) >= 18)
                    {
                        $(this).steps("next");
                    }

                    // Suppress (skip) "Warning" step if the user is old enough and wants to the previous step.
                    if (currentIndex === 2 && priorIndex === 3)
                    {
                        $(this).steps("previous");
                    }
                },
                onFinishing: function (event, currentIndex)
                {
                    var form = $(this);

                    // Disable validation on fields that are disabled.
                    // At this point it's recommended to do an overall check (mean ignoring only disabled fields)
                    form.validate().settings.ignore = ":disabled";

                    // Start validation; Prevent form submission if false
                    return form.valid();
                },
                onFinished: function (event, currentIndex)
                {
                    var form = $(this);

                    // Submit form input
                    form.submit();
                }
            }).validate({
                        errorPlacement: function (error, element)
                        {
                            element.before(error);
                        },
                        rules: {
                            confirm: {
                                equalTo: "#password"
                            }
                        }
                    });
       });
    </script>

</body>

</html>
<?php } ?>