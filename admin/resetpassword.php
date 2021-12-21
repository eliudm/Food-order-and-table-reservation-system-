<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
error_reporting(0);

if(isset($_POST['submit']))
  {
    $contactno=$_SESSION['contactno'];
    $email=$_SESSION['email'];
    $password=md5($_POST['newpassword']);

        $query=mysqli_query($con,"update tbladmin set Password='$password'  where  Email='$email' && MobileNumber='$contactno' ");
   if($query)
   {
echo "<script>alert('Password successfully changed');</script>";
session_destroy();
   }
  
  }
  ?>
<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>FOS| Reset Password</title>

    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="font-awesome/css/font-awesome.css" rel="stylesheet">

    <link href="css/animate.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
<script type="text/javascript">
function checkpass()
{
if(document.changepassword.newpassword.value!=document.changepassword.confirmpassword.value)
{
alert('New Password and Confirm Password field does not match');
document.changepassword.confirmpassword.focus();
return false;
}
return true;
} 

</script>
</head>

<body class="gray-bg">

    <div class="loginColumns animated fadeInDown">
        <div class="row">

            <div class="col-md-6">
                <h2 class="font-bold">Food Ordering System | Admin  Reset Password</h2>

              
            </div>
            <div class="col-md-6">
                <div class="ibox-content">
                     <p style="font-size:16px; color:red" align="center"> <?php if($msg){
    echo $msg;
  }  ?> </p>
                    <form class="m-t" role="form" action="" method="post" name="changepassword" onsubmit="return checkpass();">
                        <div class="form-group">
                            <input class="form-control" type="password" required="" name="newpassword" placeholder="New Password">
                        </div>
                        <div class="form-group">
                            <input class="form-control" type="password" name="confirmpassword" required="" placeholder="Confirm Your Password">
                        </div>
                        <button type="submit" class="btn btn-primary block full-width m-b" name="submit">Reset</button>

                        <div class="form-group row m-t-30 mb-0">
                                <div class="col-12">
                                    <a href="index.php" class="text-muted"><i class="fa fa-lock m-r-5"></i> Sign In</a>
                                </div>
                            </div>

                        
                       
                    </form>
                    
                </div>
            </div>
        </div>
        <hr/>
        
    </div>
<?php include_once('includes/footer.php');?>
</body>

</html>
