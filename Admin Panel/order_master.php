<?php
require("top.inc.php");
$sql="select * from users order by id desc";
$res=mysqli_query($con,$sql);
?>

<div class="detailsCategory">
            <div class="recentCategory">
                <div class="card-header">
                    <h2>Orders </h2>  
                </div>
<table class="my-order-table">
  <thead>
    <tr>
    <th scope="col">#</th>
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
		$res=mysqli_query($con,"select `ordertb`.*,order_status.name as order_status_str from `ordertb`,order_status where order_status.id=`ordertb`.order_status");
    $i=1;
    while($row=mysqli_fetch_assoc($res)){
  ?>
    <tr>
    <td data-label="#"><?php echo $i?></td>
    <td data-label="Order ID"><a href="order_master_detail.php?id=<?php echo $row['id']?>"> <?php echo $row['id']?></a></td>
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
    <?php $i=$i+1; } ?>
  </tbody>
</table>
            </div>
        </div>
    </div>
</div>
<?php
require("footer.inc.php");
?>