<?php
session_start();
include_once('includes/dbconnection.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="" />
    <meta name="keywords" content="" />
    <title>Food Ordering System | Contact us</title>

    

    <link rel="stylesheet" href="assets/css/icons.min.css">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/main.css">
    <link rel="stylesheet" href="assets/css/red-color.css">
    <link rel="stylesheet" href="assets/css/yellow-color.css">
    <link rel="stylesheet" href="assets/css/responsive.css">
</head>
<body itemscope>
  


<?php include_once('includes/header.php');?>
        <section>
            <div class="block">
				<div class="fixed-bg" style="background-image: url(assets/images/topbg.jpg);"></div>
                <div class="page-title-wrapper text-center">
					<div class="col-md-12 col-sm-12 col-lg-12">
						<div class="page-title-inner">
							<h1 itemprop="headline">Contact Us</h1>
						</div>
					</div>
                </div>
            </div>
        </section>

        <div class="bread-crumbs-wrapper">
            <div class="container">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.php" title="" itemprop="url">Home</a></li>
                    <li class="breadcrumb-item active">Contact Us</li>
                </ol>
            </div>
        </div>

        <section>
            <div class="block less-spacing gray-bg top-padd30">
                
                    <div class="container">
                        <div class="row">
                            
                            <div class="col-md-12 col-sm-12 col-lg-12">
                                <div class="sec-box">
       
                                <div class="contact-info-sec text-center">
                                    <div class="row">
                                        <div class="col-md-4 col-sm-4 col-lg-4">
                                            <div class="contact-info-box">
                                                <i class="fa fa-phone-square"></i>
                                                <h5 itemprop="headline">PHONE</h5>
                                                <p itemprop="description">Phone :+254798634619</p>
                                                <p itemprop="description">Phone :+254742540054</p>
                                            </div>
                                        </div>
                                        <div class="col-md-4 col-sm-4 col-lg-4">
                                            <div class="contact-info-box">
                                                <i class="fa fa-map-marker"></i>
                                                <h5 itemprop="headline">ADDRESS</h5>
                                                <p itemprop="description">eLytech Addresss</p>
                                            </div>
                                        </div>
                                        <div class="col-md-4 col-sm-4 col-lg-4">
                                            <div class="contact-info-box">
                                                <i class="fa fa-envelope"></i>
                                                <h5 itemprop="headline">EMAIL</h5>
                                                <p itemprop="description">meliud61@gmail.com</p>
                                                <p itemprop="description">elytech@gmail.com</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                      
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

               <?php include_once('includes/footer.php');
include_once('includes/signin.php');
include_once('includes/signup.php');
      ?>
    </main><!-- Main Wrapper -->

    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/plugins.js"></script>
    <script src="https://maps.googleapis.com/maps/api/js?v=3.exp"></script>
    <script src="assets/js/google-map-int.js"></script>
    <script src="../../www.google.com/recaptcha/api.js"></script>
    <script src="assets/js/main.js"></script>
</body>	

</html>