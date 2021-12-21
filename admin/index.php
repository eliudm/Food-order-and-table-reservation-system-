<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');

if(isset($_POST['login']))
  {
    $adminuser=$_POST['username'];
    $password=md5($_POST['password']);
    $query=mysqli_query($con,"select ID from tbladmin where  UserName='$adminuser' && Password='$password' ");
    $ret=mysqli_fetch_array($query);
    if($ret>0){
      $_SESSION['fosaid']=$ret['ID'];
     header('location:dashboard.php');
    }
    else{
    $msg="Invalid Details.";
    }
  }
  ?>
<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>FOS| Admin Login</title>

    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="font-awesome/css/font-awesome.css" rel="stylesheet">

    <link href="css/animate.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">

</head>

<body class="gray-bg">

    <div class="loginColumns animated fadeInDown">
        <div class="row">

            <div class="col-md-6">
                <h2 class="font-bold">Food Ordering System | Admin Login</h2>

              
            </div>
            <div class="col-md-6">
                <div class="ibox-content">
                     <p style="font-size:16px; color:red" align="center"> <?php if($msg){
    echo $msg;
  }  ?> </p>
                    <form class="m-t" role="form" action="" method="post" name="login">
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="username" name="username" required="">
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-control" placeholder="Password" required="" name="password">
                        </div>
                        <button type="submit" class="btn btn-primary block full-width m-b" name="login">Login</button>

                        <a href="forgot-password.php">
                            <p>Forgot password?</p>
                        </a>

                        
                       
                    </form>
                    
                </div>
            </div>
        </div>
        <hr/>
       
    </div>
<?php include_once('includes/footer.php');?>
</body>

</html>
