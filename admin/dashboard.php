<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if (strlen($_SESSION['fosaid']==0)) {
  header('location:logout.php');
  } 
     ?>

<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Food Ordering System</title>

    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="font-awesome/css/font-awesome.css" rel="stylesheet">

    <link href="css/animate.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">

</head>

<body>
    <div id="wrapper">
<?php include_once('includes/leftbar.php');?>

        <div id="page-wrapper" class="gray-bg">
       <?php include_once('includes/header.php');?>
            <div class="wrapper wrapper-content">
        <div class="row">
                    <div class="col-lg-4">
                        <div class="ibox ">
                            <div class="ibox-title">
                                <?php $query=mysqli_query($con,"Select * from tblorderaddresses");
$totalorder=mysqli_num_rows($query);
?>
<a class="text-muted text-uppercase m-b-20" href="all-order.php" style="font-size: 20px"><strong>Total Order</strong></a>
                                <h5></h5>
                            </div>
                            <div class="ibox-content">
                                <h1 class="no-margins"><?php echo $totalorder;?></h1>
                                
                                <small>Total order</small>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="ibox ">
                            <div class="ibox-title">
                                <?php $query1=mysqli_query($con,"Select * from  tblorderaddresses where OrderFinalStatus is null");
$notconfirmedorder=mysqli_num_rows($query1);
?>
<a class="text-muted text-uppercase m-b-20" href="notconfirmedyet.php" style="font-size: 20px"><strong>New Order</strong></a>


                            </div>
                            <div class="ibox-content">
                                <h1 class="no-margins"><?php echo $notconfirmedorder;?></h1>
                                <small>New Order</small>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="ibox ">
                            <div class="ibox-title">
                                <?php $query2=mysqli_query($con,"Select * from  tblorderaddresses where OrderFinalStatus ='Order Confirmed'");
$conforder=mysqli_num_rows($query2);
?>
      <a class="text-muted text-uppercase m-b-20" href="confirmed-order.php" style="font-size: 20px"><strong>Confirmed Order</strong></a>                          
                                
                            </div>
                            <div class="ibox-content">
                                <h1 class="no-margins"><?php echo $conforder;?></h1>
                                
                                <small>Confirmed Order</small>
                            </div>
                        </div>
                    </div>
           
        </div>
          <div class="row">

         <div class="col-lg-4">
                        <div class="ibox ">
                            <div class="ibox-title">
                                <?php $query3=mysqli_query($con,"Select * from  tblorderaddresses where OrderFinalStatus ='Food being Prepared'");
$beigpre=mysqli_num_rows($query3);
?>
<a class="text-muted text-uppercase m-b-20" href="foodbeingprepared.php" style="font-size: 20px"><strong>Food being Prepared</strong></a>
                               
                              
                            </div>
                            <div class="ibox-content">
                                <h1 class="no-margins"><?php echo $beigpre;?></h1>
                                <small>Food being Prepared</small>
                            </div>
                        </div>
            </div>

                    <div class="col-lg-4">
                        <div class="ibox ">
                            <div class="ibox-title">
                                <?php $query4=mysqli_query($con,"Select * from tblorderaddresses where OrderFinalStatus ='Food Pickup'");
$foodpickup=mysqli_num_rows($query4);
?>
<a class="text-muted text-uppercase m-b-20" href="food-pickup.php" style="font-size: 20px"><strong> Food Pickup</strong></a>
                                
                            </div>
                            <div class="ibox-content">
                                <h1 class="no-margins"><?php echo $foodpickup;?></h1>
                                
                                <small> Food Pickup</small>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="ibox ">
                            <div class="ibox-title">
                                <?php $query5=mysqli_query($con,"Select * from  tblorderaddresses where OrderFinalStatus ='Food Delivered'");
$fooddel=mysqli_num_rows($query5);
?>
<a class="text-muted text-uppercase m-b-20" href="food-delivered.php" style="font-size: 20px"><strong>Total Food Deliver</strong></a>

                            </div>
                            <div class="ibox-content">
                                <h1 class="no-margins"><?php echo $fooddel;?></h1>
                                <small>Total Food Deliver</small>
                            </div>
                        </div>
                    </div>
                    

           <div class="col-lg-4">
                        <div class="ibox ">
                            <div class="ibox-title">
<?php $query1=mysqli_query($con,"Select * from  tblorderaddresses where OrderFinalStatus='Order Cancelled'");
$notconfirmedorder=mysqli_num_rows($query1);
?>
<a class="text-muted text-uppercase m-b-20" href="canclled-order.php" style="font-size: 20px"><strong>Cancelled Order</strong></a>


                            </div>
                            <div class="ibox-content">
                                <h1 class="no-margins"><?php echo $notconfirmedorder;?></h1>
                                <small>Cancelled Order</small>
                            </div>
                        </div>
                    </div>


                    <div class="col-lg-4">
                        <div class="ibox ">
                            <div class="ibox-title">
                                <?php $query=mysqli_query($con,"Select * from tbluser");
$usercount=mysqli_num_rows($query);
?>
<a class="text-muted text-uppercase m-b-20" href="user-detail.php" style="font-size: 25px"><strong>Total Regd. User</strong></a>
                         
                            </div>
                            <div class="ibox-content">
                                <h1 class="no-margins"><?php echo $usercount;?></h1>
                                
                                <small>Total Regd. User</small>
                            </div>
                        </div>
                    </div>

?>
<!--a class="text-muted text-uppercase m-b-20" href="reservations.php"style="font-size: 25px"><strong>Total Reserved</strong></a-->
                            <div>
                             <div class="inbox-content">
                                 <h1 class="no-margins"><?php echo $reservation;?></h1>

                                 <!--small>Total reserved</small-->
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

    <!-- Flot -->
    <script src="js/plugins/flot/jquery.flot.js"></script>
    <script src="js/plugins/flot/jquery.flot.tooltip.min.js"></script>
    <script src="js/plugins/flot/jquery.flot.spline.js"></script>
    <script src="js/plugins/flot/jquery.flot.resize.js"></script>
    <script src="js/plugins/flot/jquery.flot.pie.js"></script>
    <script src="js/plugins/flot/jquery.flot.symbol.js"></script>
    <script src="js/plugins/flot/jquery.flot.time.js"></script>

    <!-- Peity -->
    <script src="js/plugins/peity/jquery.peity.min.js"></script>
    <script src="js/demo/peity-demo.js"></script>

    <!-- Custom and plugin javascript -->
    <script src="js/inspinia.js"></script>
    <script src="js/plugins/pace/pace.min.js"></script>

    <!-- jQuery UI -->
    <script src="js/plugins/jquery-ui/jquery-ui.min.js"></script>

    <!-- Jvectormap -->
    <script src="js/plugins/jvectormap/jquery-jvectormap-2.0.2.min.js"></script>
    <script src="js/plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>

    <!-- EayPIE -->
    <script src="js/plugins/easypiechart/jquery.easypiechart.js"></script>

    <!-- Sparkline -->
    <script src="js/plugins/sparkline/jquery.sparkline.min.js"></script>

    <!-- Sparkline demo data  -->
    <script src="js/demo/sparkline-demo.js"></script>

    <script>
        $(document).ready(function() {
            $('.chart').easyPieChart({
                barColor: '#f8ac59',
//                scaleColor: false,
                scaleLength: 5,
                lineWidth: 4,
                size: 80
            });

            $('.chart2').easyPieChart({
                barColor: '#1c84c6',
//                scaleColor: false,
                scaleLength: 5,
                lineWidth: 4,
                size: 80
            });

            var data2 = [
                [gd(2012, 1, 1), 7], [gd(2012, 1, 2), 6], [gd(2012, 1, 3), 4], [gd(2012, 1, 4), 8],
                [gd(2012, 1, 5), 9], [gd(2012, 1, 6), 7], [gd(2012, 1, 7), 5], [gd(2012, 1, 8), 4],
                [gd(2012, 1, 9), 7], [gd(2012, 1, 10), 8], [gd(2012, 1, 11), 9], [gd(2012, 1, 12), 6],
                [gd(2012, 1, 13), 4], [gd(2012, 1, 14), 5], [gd(2012, 1, 15), 11], [gd(2012, 1, 16), 8],
                [gd(2012, 1, 17), 8], [gd(2012, 1, 18), 11], [gd(2012, 1, 19), 11], [gd(2012, 1, 20), 6],
                [gd(2012, 1, 21), 6], [gd(2012, 1, 22), 8], [gd(2012, 1, 23), 11], [gd(2012, 1, 24), 13],
                [gd(2012, 1, 25), 7], [gd(2012, 1, 26), 9], [gd(2012, 1, 27), 9], [gd(2012, 1, 28), 8],
                [gd(2012, 1, 29), 5], [gd(2012, 1, 30), 8], [gd(2012, 1, 31), 25]
            ];

            var data3 = [
                [gd(2012, 1, 1), 800], [gd(2012, 1, 2), 500], [gd(2012, 1, 3), 600], [gd(2012, 1, 4), 700],
                [gd(2012, 1, 5), 500], [gd(2012, 1, 6), 456], [gd(2012, 1, 7), 800], [gd(2012, 1, 8), 589],
                [gd(2012, 1, 9), 467], [gd(2012, 1, 10), 876], [gd(2012, 1, 11), 689], [gd(2012, 1, 12), 700],
                [gd(2012, 1, 13), 500], [gd(2012, 1, 14), 600], [gd(2012, 1, 15), 700], [gd(2012, 1, 16), 786],
                [gd(2012, 1, 17), 345], [gd(2012, 1, 18), 888], [gd(2012, 1, 19), 888], [gd(2012, 1, 20), 888],
                [gd(2012, 1, 21), 987], [gd(2012, 1, 22), 444], [gd(2012, 1, 23), 999], [gd(2012, 1, 24), 567],
                [gd(2012, 1, 25), 786], [gd(2012, 1, 26), 666], [gd(2012, 1, 27), 888], [gd(2012, 1, 28), 900],
                [gd(2012, 1, 29), 178], [gd(2012, 1, 30), 555], [gd(2012, 1, 31), 993]
            ];


            var dataset = [
                {
                    label: "Number of orders",
                    data: data3,
                    color: "#1ab394",
                    bars: {
                        show: true,
                        align: "center",
                        barWidth: 24 * 60 * 60 * 600,
                        lineWidth:0
                    }

                }, {
                    label: "Payments",
                    data: data2,
                    yaxis: 2,
                    color: "#1C84C6",
                    lines: {
                        lineWidth:1,
                            show: true,
                            fill: true,
                        fillColor: {
                            colors: [{
                                opacity: 0.2
                            }, {
                                opacity: 0.4
                            }]
                        }
                    },
                    splines: {
                        show: false,
                        tension: 0.6,
                        lineWidth: 1,
                        fill: 0.1
                    },
                }
            ];


            var options = {
                xaxis: {
                    mode: "time",
                    tickSize: [3, "day"],
                    tickLength: 0,
                    axisLabel: "Date",
                    axisLabelUseCanvas: true,
                    axisLabelFontSizePixels: 12,
                    axisLabelFontFamily: 'Arial',
                    axisLabelPadding: 10,
                    color: "#d5d5d5"
                },
                yaxes: [{
                    position: "left",
                    max: 1070,
                    color: "#d5d5d5",
                    axisLabelUseCanvas: true,
                    axisLabelFontSizePixels: 12,
                    axisLabelFontFamily: 'Arial',
                    axisLabelPadding: 3
                }, {
                    position: "right",
                    clolor: "#d5d5d5",
                    axisLabelUseCanvas: true,
                    axisLabelFontSizePixels: 12,
                    axisLabelFontFamily: ' Arial',
                    axisLabelPadding: 67
                }
                ],
                legend: {
                    noColumns: 1,
                    labelBoxBorderColor: "#000000",
                    position: "nw"
                },
                grid: {
                    hoverable: false,
                    borderWidth: 0
                }
            };

            function gd(year, month, day) {
                return new Date(year, month - 1, day).getTime();
            }

            var previousPoint = null, previousLabel = null;

            $.plot($("#flot-dashboard-chart"), dataset, options);

            var mapData = {
                "US": 298,
                "SA": 200,
                "DE": 220,
                "FR": 540,
                "CN": 120,
                "AU": 760,
                "BR": 550,
                "IN": 200,
                "GB": 120,
            };

            $('#world-map').vectorMap({
                map: 'world_mill_en',
                backgroundColor: "transparent",
                regionStyle: {
                    initial: {
                        fill: '#e4e4e4',
                        "fill-opacity": 0.9,
                        stroke: 'none',
                        "stroke-width": 0,
                        "stroke-opacity": 0
                    }
                },

                series: {
                    regions: [{
                        values: mapData,
                        scale: ["#1ab394", "#22d6b1"],
                        normalizeFunction: 'polynomial'
                    }]
                },
            });
        });
    </script>
</body>
</html>
