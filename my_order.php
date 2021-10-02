<?php 
require('header.php');
if(!isset($_SESSION['USER_LOGIN'])){
	?>
	<script>
	window.location.href='index.php';
	</script>
	<?php
}
?>
<div class="header-cart">
       <h1>MY  ORDER</h1>
  </div>
 <table class="my-order-table">
  <!-- <caption>Statement Summary</caption> -->
  <thead>
    <tr>
      <th scope="col">Order ID</th>
      <th scope="col">Order Date</th>
      <th scope="col">Address</th>
      <th scope="col">Payment Type</th>
      <th scope="col">Payment Status</th>
      <th scope="col">Order Status</th>
    </tr>
  </thead>
  <tbody>
  <?php
		$uid=$_SESSION['USER_ID'];
		$res=mysqli_query($con,"select `ordertb`.*,order_status.name as order_status_str from `ordertb`,order_status where `ordertb`.user_id='$uid' and order_status.id=`ordertb`.order_status");
		while($row=mysqli_fetch_assoc($res)){
  ?>
    <tr>
    <td data-label="Order ID"><a href="my_order_details.php?id=<?php echo $row['id']?>"> <?php echo $row['id']?></a></td>
    <td data-label="Order Date"><?php echo $row['added_on']?></td>
    <td data-label="Address">
	<?php echo $row['address']?><br/>
	<?php echo $row['city']?><br/>
	<?php echo $row['pincode']?>
	</td>
	<td data-label="Payment Type"><?php echo $row['payment_type']?></td>
	<td data-label="Payment Status"><?php echo $row['payment_status']?></td>
	<td data-label="Order Status"><?php echo $row['order_status_str']?></td>
                                                
    </tr>
    <?php } ?>
  </tbody>
</table>

<?php 
require('footer.php');
?>