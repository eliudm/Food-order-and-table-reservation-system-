<?php
session_start();
error_reporting(0);
include_once('includes/dbconnection.php');
if(isset($_POST['addcart']))
{
$foodid=$_POST['foodid'];
$foodqty=$_POST['foodqty'];
$userid= $_SESSION['fosuid'];
$query=mysqli_query($con,"insert into tblorders(UserId,FoodId,FoodQty) values('$userid','$foodid','$foodqty') ");
if($query)
{
 echo "<script>alert('Food has been added in to the cart');</script>";   
} else {
 echo "<script>alert('Something went wrong.');</script>";      
}
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="" />
    <meta name="keywords" content="" />
    <title>Food Ordering System | Food Details</title>

    <link rel="stylesheet" href="assets/css/icons.min.css">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/main.css">
    <link rel="stylesheet" href="assets/css/red-color.css">
    <link rel="stylesheet" href="assets/css/yellow-color.css">
    <link rel="stylesheet" href="assets/css/responsive.css">
</head>
<body itemscope>
<?php include_once('includes/header.php');?>
     
<?php
//Getting Food details
 $cid=$_GET['fid'];
$ret=mysqli_query($con,"select * from tblfood where ID='$cid'");
$cnt=1;
while ($row=mysqli_fetch_array($ret)) {

?>

        <section>
            <div class="block">
				<div class="fixed-bg" style="background-image: url(assets/images/topbg.jpg);"></div>
                <div class="page-title-wrapper text-center">
					<div class="col-md-12 col-sm-12 col-lg-12">
						<div class="page-title-inner">
							<h1 itemprop="headline"><?php echo $row['ItemName'];?> Details</h1>
						
				
						</div>
					</div>
                </div>
            </div>
        </section>

        <div class="bread-crumbs-wrapper">
            <div class="container">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.php" title="" itemprop="url">Home</a></li>
                    <li class="breadcrumb-item active">Food Details</li>
                </ol>
            </div>
        </div>

        <section>
            <div class="block gray-bg bottom-padd210 top-padd30">
                
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12">
                            <div class="sec-box">
    							<div class="sec-wrapper">
<form method="post">

    								<div class="col-md-8 col-sm-12 col-lg-8">
    									<div class="restaurant-detail-wrapper">
    										<div class="restaurant-detail-info">
    											<div class="restaurant-detail-thumb">
    												<ul class="restaurant-detail-img-carousel">
    													<li><img class="brd-rd3" src="admin/itemimages/<?php echo $row['Image'];?>" alt="<?php echo $row['ItemName'];?>" itemprop="image"></li>
    												
    												</ul>
    											</div>
    											<div class="restaurant-detail-title">
    												<h1 itemprop="headline"><?php echo $row['ItemName'];?></h1>
    												<div class="info-meta">
    													<span><?php echo $row['CategoryName'];?></span>
    												
    												</div>
    										
    												<span class="price">Rs.<?php echo $row['ItemPrice'];?></span>
    												<div class="qty-wrap">
    						  <input type="hidden" name="foodid" value="<?php echo $row['ID'];?>"> 
    <input class="qty" name="foodqty" type="text" value="1">
    												</div>
    												<p itemprop="description"><?php echo $row['ItemDes'];?></p>
<?php if($_SESSION['fosuid']==""){?>
  <a class="log-popup-btn" href="#" title="Login"  class="btn  pull-right red-bg brd-rd3">Order Now</a>
<?php } else {?>
<button type="submit" name="addcart" class="btn  pull-right red-bg brd-rd3">Order Now</button>
                                                <?php } ?>
    											</div>
    										</div>
    									</div>
    								</div>
                                    </form>
<?php } ?>

<div class="col-md-3 col-sm-12 col-lg-3" style="margin-left:2%">
                                    <div class="sidebar right">
                                        
                                        <div class="widget style2 quick_filters wow fadeIn" data-wow-delay="0.2s" style="visibility: visible; animation-delay: 0.2s; animation-name: fadeIn;">
                                            <h4 class="widget-title2 sudo-bg-red" itemprop="headline">Food Categories</h4>
                                            <div class="widget-data">
                                                <ul>

<?php
     $query=mysqli_query($con,"select * from  tblcategory");
              while($row=mysqli_fetch_array($query))
              {
              ?> 
                                                    <li><span class="radio-box"><label for="filt1-1"><a href="categorywise-menu.php?catid=<?php echo $row['CategoryName'];?>"><?php echo $row['CategoryName'];?></a></label></span></li>
                                                   
                                                <?php } ?>
                                                </ul>
                                            </div>
                                        </div>
                                 
                                    </div><!--Sidebar -->
                                </div>
    							</div>
                            </div>
                        </div>
                    </div>
                </div><!-- Section Box -->
            </div>
        </section>

    <!-- red section -->
    <?php include_once('includes/footer.php');
include_once('includes/signin.php');
include_once('includes/signup.php');
      ?>
    </main><!-- Main Wrapper -->

    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="https://maps.googleapis.com/maps/api/js?v=3.exp"></script>
    <script src="assets/js/google-map-int2.js"></script>
    <script src="assets/js/plugins.js"></script>
    <script src="assets/js/main.js"></script>
</body>	

</html>