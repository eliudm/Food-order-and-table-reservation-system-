<?php
session_start();
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
    <title>Food Ordering System</title>
    

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
            <div class="block blackish opac90">
                <div class="fixed-bg" style="background-image: url(assets/images/parallax2.jpg);"></div>
                <div class="restaurant-searching style2 text-center">
                    <div class="restaurant-searching-inner">
						<span>Welcome to <i>Eliam foods</i> </span>
                        <h2 itemprop="headline">Order and it will be delivered</h2>
                        <form class="restaurant-search-form2 brd-rd30" method="post" action="search-result.php">
           <input class="brd-rd30" type="text" placeholder="Dish Name" required="true"  name="searchdata">
                            <button class="brd-rd30 red-bg" type="submit" name="search">SEARCH</button>
                        </form>
                    </div>
                </div><!-- Restaurant Searching -->
            </div>
        </section>

        <section>
            <div class="block less-spacing gray-bg top-padd30">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12 col-sm-12 col-lg-12">
                            <div class="sec-box">
                                <div class="remove-ext">
                                    <div class="row">

<?php

if (isset($_GET['page_no']) && $_GET['page_no']!="") {
	$page_no = $_GET['page_no'];
	} else {
		$page_no = 1;
        }

	$total_records_per_page = 12;
    $offset = ($page_no-1) * $total_records_per_page;
	$previous_page = $page_no - 1;
	$next_page = $page_no + 1;
	$adjacents = "2"; 
	$result_count = mysqli_query($con,"SELECT COUNT(*) As total_records FROM tblfood");
	$total_records = mysqli_fetch_array($result_count);
	$total_records = $total_records['total_records'];
    $total_no_of_pages = ceil($total_records / $total_records_per_page);
	$second_last = $total_no_of_pages - 1; // total page minus 1
	  $result = mysqli_query($con,"SELECT * FROM tblfood LIMIT $offset, $total_records_per_page");
    while($row = mysqli_fetch_array($result)){
	?>


                                        <div class="col-md-4 col-sm-6 col-lg-4">
                                        <div class="popular-dish-box style2 wow fadeIn" data-wow-delay="0.2s">
                                            <div class="popular-dish-thumb">
                                                <a href="food-detail.php?fid=<?php echo $row['ID'];?>" title="" itemprop="url"><img src="admin/itemimages/<?php echo $row['Image'];?>" alt="<?php echo $row['ItemName'];?>" itemprop="image" width="400" height="180"></a>
                                            </div>
                                            <div class="popular-dish-info">
                                                <h4 itemprop="headline"><a href="food-detail.php?fid=<?php echo $row['ID'];?>" title="" itemprop="url"><?php echo $row['ItemName'];?></a></h4>
                                            <form method="post">    
                                                   <p itemprop="description">
    <input type="hidden" name="foodid" value="<?php echo $row['ID'];?>"> 
	<input class="qty" name="foodqty" type="text" value="1">
                                               </p>
                                                <span class="price">Sh. <?php echo $row['ItemPrice'];?></span>

                              <?php if($_SESSION['fosuid']==""){?>
  <a class="log-popup-btn btn  pull-right blue-bg brd-rd3" href="#" title="Login">Order Now</a>
<?php } else {?>
<button type="submit" name="addcart" class="btn  pull-right blue-bg brd-rd3">Order Now</button>
                                                <?php } ?>
                                        </form>
                                            </div>
                                        </div>
                                    </div>
                              <?php } ?>
                                    </div>
                                </div>
                                <div class="pagination-wrapper text-center">
                                    <ul class="pagination justify-content-center">
                               
<!-- 
<ul class="pagination"> -->
	<?php // if($page_no > 1){ echo "<li><a href='?page_no=1'>First Page</a></li>"; } ?>
    
	<li class="page-item prev" <?php if($page_no <= 1){ echo "class='disabled'"; } ?>>
	<a class="page-link brd-rd2" <?php if($page_no > 1){ echo "href='?page_no=$previous_page'"; } ?>>Previous</a>
	</li>
       
    <?php 
	if ($total_no_of_pages <= 10){  	 
		for ($counter = 1; $counter <= $total_no_of_pages; $counter++){
			if ($counter == $page_no) {
		   echo "<li class='active'><a>$counter</a></li>";	
				}else{
           echo "<li><a href='?page_no=$counter'>$counter</a></li>";
				}
        }
	}
	elseif($total_no_of_pages > 10){
		
	if($page_no <= 4) {			
	 for ($counter = 1; $counter < 8; $counter++){		 
			if ($counter == $page_no) {
		   echo "<li class='active'><a>$counter</a></li>";	
				}else{
           echo "<li><a href='?page_no=$counter'>$counter</a></li>";
				}
        }
		echo "<li><a>...</a></li>";
		echo "<li><a href='?page_no=$second_last'>$second_last</a></li>";
		echo "<li><a href='?page_no=$total_no_of_pages'>$total_no_of_pages</a></li>";
		}

	 elseif($page_no > 4 && $page_no < $total_no_of_pages - 4) {		 
		echo "<li><a href='?page_no=1'>1</a></li>";
		echo "<li><a href='?page_no=2'>2</a></li>";
        echo "<li><a>...</a></li>";
        for ($counter = $page_no - $adjacents; $counter <= $page_no + $adjacents; $counter++) {			
           if ($counter == $page_no) {
		   echo "<li class='active'><a>$counter</a></li>";	
				}else{
           echo "<li><a href='?page_no=$counter'>$counter</a></li>";
				}                  
       }
       echo "<li><a>...</a></li>";
	   echo "<li><a href='?page_no=$second_last'>$second_last</a></li>";
	   echo "<li><a href='?page_no=$total_no_of_pages'>$total_no_of_pages</a></li>";      
            }
		
		else {
        echo "<li><a href='?page_no=1'>1</a></li>";
		echo "<li><a href='?page_no=2'>2</a></li>";
        echo "<li><a>...</a></li>";

        for ($counter = $total_no_of_pages - 6; $counter <= $total_no_of_pages; $counter++) {
          if ($counter == $page_no) {
		   echo "<li class='active'><a>$counter</a></li>";	
				}else{
           echo "<li><a href='?page_no=$counter'>$counter</a></li>";
				}                   
                }
            }
	}
?>
    
	<li class="page-item next" <?php if($page_no >= $total_no_of_pages){ echo "class='disabled'"; } ?>>
	<a class="page-link brd-rd2" <?php if($page_no < $total_no_of_pages) { echo "href='?page_no=$next_page'"; } ?>>Next</a>
	</li>
    <?php if($page_no < $total_no_of_pages){ ?>
  <li class="page-item next"><a class="page-link brd-rd2" href='?page_no=<?php echo $total_no_of_pages;?>'>Last &rsaquo;&rsaquo;</a></li>
<?php
		} ?>


                                    </ul>
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
    <script src="assets/js/main.js"></script>
</body>	

</html>