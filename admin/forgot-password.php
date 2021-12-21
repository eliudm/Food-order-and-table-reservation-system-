<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');

if(isset($_POST['submit']))
  {
    $contactno=$_POST['contactno'];
    $email=$_POST['email'];

        $query=mysqli_query($con,"select ID from tbladmin where  Email='$email' and MobileNumber='$contactno' ");
    $ret=mysqli_fetch_array($query);
    if($ret>0){
      $_SESSION['contactno']=$contactno;
      $_SESSION['email']=$email;
     header('location:resetpassword.php');
    }
    else{
      $msg="Invalid Details. Please try again.";
    }
  }
  ?>
<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>FOS| Admin Forgot Password</title>

    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="font-awesome/css/font-awesome.css" rel="stylesheet">

    <link href="css/animate.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">

</head>

<body class="gray-bg">

    <div class="loginColumns animated fadeInDown">
        <div class="row">

            <div class="col-md-6">
                <h2 class="font-bold">Food Ordering System | Admin  Forgot Password</h2>

              
            </div>
            <div class="col-md-6">
                <div class="ibox-content">
                     <p style="font-size:16px; color:red" align="center"> <?php if($msg){
    echo $msg;
  }  ?> </p>
                    <form class="m-t" role="form" action="" method="post" name="submit">
                        <div class="form-group">
                            <input type="email" class="form-control" placeholder="Email" name="email" required="">
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Mobile Number" required="" name="contactno" maxlength="10" pattern="[0-9]{10}">
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
