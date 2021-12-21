<?php
session_start();
error_reporting(0);
include_once('includes/dbconnection.php');
 ?>
<script language="javascript" type="text/javascript">
function f2()
{
window.close();
}
function f3()
{
window.print(); 
}
</script>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Track Order</title>
</head>
<body>

<div style="margin-left:50px;">
<?php  
$oid=$_GET['oid'];
$query=mysqli_query($con,"select tblfood.Image,tblfood.ItemName,tblfood.ItemDes,tblfood.ItemPrice,tblfood.ItemQty,tblorders.FoodId,tblorders.FoodQty from tblorders join tblfood on tblfood.ID=tblorders.FoodId where  tblorders.IsOrderPlaced=1 and tblorders.OrderNumber='$oid'");
$num=mysqli_num_rows($query);
$cnt=1;
?>

<table border="1"  cellpadding="10" style="border-collapse: collapse; border-spacing:0; width: 100%; text-align: center;">
  <tr align="center">
   <th colspan="6" >Invoice of #<?php echo  $oid;?></th> 
  </tr>
  <tr>
    <th>#</th>
<th>Food </th>
<th>Food Name</th>
<th>Quantity</th>
<th>Price/Unit</th>
<th>Total</th>
</tr>
<?php  
while ($row=mysqli_fetch_array($query)) {
  ?>
<tr>
  <td><?php echo $cnt;?></td>
 <td><img src="admin/itemimages/<?php echo $row['Image']?>" width="60" height="40" alt="<?php echo $row['ItemName']?>"></td> 
  <td><?php  echo $row['ItemName'];?></td>
  <td><?php  echo $qty=$row['FoodQty'];?></td>  
   <td><?php  echo $ppu=$row['ItemPrice'];?></td>
   <td><?php  echo $total=$qty*$ppu;?></td> 
</tr>
<?php 
$grandtotal+=$total;
$cnt=$cnt+1;} ?>
<tr>
  <th colspan="5" style="text-align:center">Grand Total </th>
<td><?php  echo $grandtotal;?></td>
</tr>
</table>
     
     <p >
      <input name="Submit2" type="submit" class="txtbox4" value="Close" onClick="return f2();" style="cursor: pointer;"  />   <input name="Submit2" type="submit" class="txtbox4" value="Print" onClick="return f3();" style="cursor: pointer;"  /></p>
</div>

</body>
</html>

     