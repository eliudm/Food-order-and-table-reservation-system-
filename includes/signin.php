<?php
if(isset($_POST['login']))
  {
    $emailcon=trim($_POST['emailcont']);
    $password=$_POST['password'];
    $stmt = mysqli_prepare($con, "SELECT ID, Email, Password FROM tbluser WHERE Email = ? OR MobileNumber = ?");
    mysqli_stmt_bind_param($stmt, "ss", $emailcon, $emailcon);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    $ret = mysqli_fetch_assoc($result);
    if($ret && app_verify_password($password, $ret['Password'])){
      if (!password_verify($password, $ret['Password'])) {
        $newHash = app_hash_password($password);
        $update = mysqli_prepare($con, "UPDATE tbluser SET Password = ? WHERE ID = ?");
        mysqli_stmt_bind_param($update, "si", $newHash, $ret['ID']);
        mysqli_stmt_execute($update);
      }
      $_SESSION['fosuid']=$ret['ID'];
      $_SESSION['uemail']=$ret['Email'];
      echo "<script>window.location.href='index.php'</script>";
    }
    else{
      echo "<script>alert('Invalid details');</script>";
    }
  }
  ?>




    <div class="log-popup text-center">
            <div class="sign-popup-wrapper brd-rd5">
                <div class="sign-popup-inner brd-rd5">
                    <a class="log-close-btn" href="#" title="" itemprop="url"><i class="fa fa-close"></i></a>
                    <div class="sign-popup-title text-center">
                        <h4 itemprop="headline">SIGN IN</h4>
                    </div>
           
                    <form class="sign-form" method="post">
                        <div class="row">
                            <div class="col-md-12 col-sm-12 col-lg-12">
                                <input class="brd-rd3"  name="emailcont" id="email" placeholder="Registered Email or Contact Number" required>
                            </div>
                            <div class="col-md-12 col-sm-12 col-lg-12">
                                <input class="brd-rd3" type="password" id="password" name="password"  placeholder="Password" required>
                            </div>
                            <div class="col-md-12 col-sm-12 col-lg-12">
                                <button class="red-bg brd-rd3" type="submit" name="login">SIGN IN</button>
                            </div>
                           <div class="col-md-12 col-sm-12 col-lg-12">
                                <a class="sign-popup-btn" href="#" title="Register" itemprop="url">Not Registered yet? Sign up</a>
                                <a class="recover-btn" href="forgot-password.php" title="" itemprop="url">Recover my password</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>