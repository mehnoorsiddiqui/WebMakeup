<?php
require("top.inc.php");
$order_id=get_safe_value($con,$_GET['id']);
if(isset($_POST['update_order_status'])){
	$update_order_status=$_POST['update_order_status'];
	if($update_order_status=='5'){
		mysqli_query($con,"update `ordertb` set order_status='$update_order_status',payment_status='Success' where id='$order_id'");
	}else{
		mysqli_query($con,"update `ordertb` set order_status='$update_order_status' where id='$order_id'");
	}
	
}
?>

<div class="detailsCategory">
            <div class="recentCategory">
                <div class="card-header">
                    <h2>Order Details </h2>  
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
					$res=mysqli_query($con,"select distinct(order_detail.id) ,order_detail.*,product.name,product.image,`ordertb`.address,`ordertb`.city,`ordertb`.pincode from order_detail,product ,`ordertb` where order_detail.order_id='$order_id' and  order_detail.product_id=product.id GROUP by order_detail.id");
					$total_price=0;									
					$userInfo=mysqli_fetch_assoc(mysqli_query($con,"select * from `ordertb` where id='$order_id'"));									
					$address=$userInfo['address'];
					$city=$userInfo['city'];
					$pincode=$userInfo['pincode'];									
					while($row=mysqli_fetch_assoc($res)){									
					 $total_price=$total_price+($row['qty']*$row['price']);
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
            <div id="address_details">
							<strong>Address</strong>
							<?php echo $address?>, <?php echo $city?>, <?php echo $pincode?><br/><br/>
							<strong>Order Status</strong>
							<?php 
							$order_status_arr=mysqli_fetch_assoc(mysqli_query($con,"select order_status.name from order_status,`ordertb` where `ordertb`.id='$order_id' and `ordertb`.order_status=order_status.id"));
							echo $order_status_arr['name'];
							?>
							
							<div>
								<form method="post">
									<select class="form-control" name="update_order_status" required>
										<option value="">Select Status</option>
										<?php
										$res=mysqli_query($con,"select * from order_status");
										while($row=mysqli_fetch_assoc($res)){
											if($row['id']==$categories_id){
												echo "<option selected value=".$row['id'].">".$row['name']."</option>";
											}else{
												echo "<option value=".$row['id'].">".$row['name']."</option>";
											}
										}
										?>
									</select>
									<input type="submit" class="form-control"/>
								</form>
							</div>
						</div>
            </div>
        </div>
    </div>
</div>
<?php
require("footer.inc.php");
?>