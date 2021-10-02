<?php 
require('header.php');
if(!isset($_SESSION['USER_LOGIN'])){
	?>
	<script>
	window.location.href='index.php';
	</script>
	<?php
}
$order_id=get_safe_value($con,$_GET['id']);

?>
<div class="header-cart">
       <h1>MY  ORDER DETAILS</h1>
  </div>
 <table class="my-order-table">
  <thead>
    <tr>
      <th scope="col">Product Name</th>
      <th scope="col">Product Image</th>
      <th scope="col">Qty</th>
      <th scope="col">Price</th>
      <th scope="col">Total Price</th>
    </tr>
  </thead>
  <tbody>
  <?php
	$uid=$_SESSION['USER_ID'];

	$res=mysqli_query($con,"select distinct(order_detail.id) ,order_detail.*,product.name,product.image from order_detail,product ,ordertb where order_detail.order_id='$order_id' and ordertb.user_id='$uid' and order_detail.product_id=product.id");
	$total_price=0;
	while($row=mysqli_fetch_assoc($res)){
	$total_price=$total_price+($row['qty']*$row['price']);
    echo $row['qty'];
   ?>
    <tr>
    <td data-label="Product Name"><?php echo $row['name']?></td>
    <td data-label="Product Image"><img src="<?php echo PRODUCT_IMAGE_SITE_PATH.$row['image']?>"></td>
    <td data-label="Qty"><?php echo $row['qty']?></td>
	<td data-label="Price"><?php echo $row['price']?></td>
	<td data-label="Total Price"><?php echo $row['qty']*$row['price']?></td>
                                                
    </tr>
    <?php } ?>
    <tr>
				<td colspan="3"></td>
				<td >Total Price</td>
				<td ><?php echo $total_price?></td>
   </tr>
  
  </tbody>
</table>

<?php 
require('footer.php');
?>