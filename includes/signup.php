  <?php 
if(isset($_POST['submit']))
  {
    $fname=$_POST['firstname'];
    $lname=$_POST['lastname'];
    $contno=$_POST['mobilenumber'];
    $email=$_POST['email'];
    $password=md5($_POST['password']);

    $ret=mysqli_query($con, "select Email from tbluser where Email='$email' || MobileNumber='$contno'");
    $result=mysqli_fetch_array($ret);
    if($result>0){
 echo "<script>alert('This email or Contact Number already associated with another account');</script>";
    }
    else{
    $query=mysqli_query($con, "insert into tbluser(FirstName, LastName, MobileNumber, Email, Password) value('$fname', '$lname','$contno', '$email', '$password' )");
    if ($query) {
     echo "<script>alert('You have successfully registered');</script>";
     echo "<script>window.location.href='index.php'</script>";
  }
  else
    {
       echo "<script>alert('Something Went Wrong. Please try again.');</script>";
        echo "<script>window.location.href='index.php'</script>";
    }
}
}

 ?>

<!-- Javascript for password confirmation-->
<script type="text/javascript">
function checkpass()
{
if(document.signup.password.value!=document.signup.repeatpassword.value)
{
alert('Password and Repeat Password field does not match');
document.signup.repeatpassword.focus();
return false;
}
return true;
} 
</script>
  <div class="sign-popup text-center">
            <div class="sign-popup-wrapper brd-rd5">
                <div class="sign-popup-inner brd-rd5">
                    <a class="sign-close-btn" href="#" title="" itemprop="url"><i class="fa fa-close"></i></a>
                    <div class="sign-popup-title text-center">
                        <h4 itemprop="headline">SIGN UP</h4>
                    </div>
             
                    <span class="popup-seprator text-center"><i class="brd-rd50">Signup</i></span>
                    <form class="sign-form" name="signup" onsubmit="return checkpass();" method="post">
                        <div class="row">
                            <div class="col-md-6 col-sm-6 col-lg-6">
                                <input class="brd-rd3" type="text"  id="firstname" name="firstname" required="true" placeholder="First Name">
                            </div>
                            <div class="col-md-6 col-sm-6 col-lg-6">
                                <input class="brd-rd3" type="text" id="lastname" name="lastname" required="true" placeholder="Last Name">
                            </div>
                            <div class="col-md-12 col-sm-12 col-lg-12">
                                <input class="brd-rd3" type="email" name="email" required="true" placeholder="Email id">
                            </div>
                             <div class="col-md-12 col-sm-12 col-lg-12">
                                <input class="brd-rd3" id="mobilenumber" name="mobilenumber" required="true" maxlength="10" pattern="[0-9]{10}" title="Mobile must contain 10 digits only" placeholder="Mobile Number">
                            </div>

                               <div class="col-md-12 col-sm-12 col-lg-12">
                                <input class="brd-rd3" type="password" name="password" required="true" required="true" placeholder="Password">
                            </div>

                               <div class="col-md-12 col-sm-12 col-lg-12">
                                <input class="brd-rd3" type="password"  id="repeatpassword" name="repeatpassword" required="true" placeholder="Confirm Password">
                            </div>
                            <div class="col-md-12 col-sm-12 col-lg-12">
                                <button class="red-bg brd-rd3" type="submit" name="submit">REGISTER NOW</button>
                            </div>
                            <div class="col-md-12 col-sm-12 col-lg-12">
                                <a class="sign-btn" href="#" title="" itemprop="url">Already Registered? Sign in</a>
                                <a class="recover-btn" href="forgot-password.php" title="" itemprop="url">Recover my password</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>