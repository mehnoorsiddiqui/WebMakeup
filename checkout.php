<?php 
require('header.php');
if(!isset($_SESSION['cart']) || count($_SESSION['cart'])==0){
	?>
	<script>
		window.location.href='index.php';
	</script>
	<?php
}

$cart_total=0;

if(isset($_POST['submit'])){
	$address=get_safe_value($con,$_POST['address']);
	$city=get_safe_value($con,$_POST['city']);
	$pincode=get_safe_value($con,$_POST['pincode']);
	$payment_type=get_safe_value($con,$_POST['payment_type']);
	$user_id=$_SESSION['USER_ID'];
	foreach($_SESSION['cart'] as $key=>$val){
		$productArr=get_product($con,'','',$key);
		$price=$productArr[0]['price'];
		$qty=$val['qty'];
		$cart_total=$cart_total+($price*$qty);
		
	}
	$total_price=$cart_total;
	$payment_status='pending';
	if($payment_type=='cod'){
		$payment_status='success';
	}
	$order_status='1';
	$added_on=date('Y-m-d h:i:s');
	
	mysqli_query($con,"insert into ordertb (user_id,address,city,pincode,payment_type,payment_status,order_status,added_on,total_price) values('$user_id','$address','$city','$pincode','$payment_type','$payment_status','$order_status','$added_on','$total_price')");
	$order_id=mysqli_insert_id($con);
	
	foreach($_SESSION['cart'] as $key=>$val){
		$productArr=get_product($con,'','',$key);
		$price=$productArr[0]['price'];
		$qty=$val['qty'];
		
		mysqli_query($con,"insert into order_detail (order_id,product_id,qty,price) values('$order_id','$key','$qty','$price')");
	}
	
	unset($_SESSION['cart'])
	?>
	<script>
		window.location.href='thank_you.php';
	</script>
	<?php
}
?>


<!-- Checkout page starts -->
<div class="checkout-wrap ptb--20">
        <div class="container-checkout">
            <div class="row-checkout">
                <div class="ck-12">
                    <!-- <div class="statusBody">
                        <div class="mainWrapper">
                            <div class="statusBar">
                                <span class="pBar"></span>
                                <div class="node n0 done nConfirm0">
                                    <div class="main done m0 done nConfirm0"></div>
                                    <span class="text t0 done nConfirm0">Cart</span>
                                </div>
                                <div class="node n1 nConfirm1">
                                    <div class="main m1 nConfirm1"></div>
                                    <span class="text t1 nConfirm1">Information</span>
                                </div>
                                <div class="node n2 nConfirm2">
                                    <div class="main m2 nConfirm2"></div>
                                    <span class="text t2 nConfirm2">Review</span>
                                </div>
                                <div class="node n3 nConfirm3">
                                    <div class="main m3 nConfirm3"></div>
                                    <span class="text t3 nConfirm3">Payment</span>
                                </div>
                                <div class="node n4 nConfirm4">
                                    <div class="main m4 nConfirm4"></div>
                                    <span class="text t4 nConfirm4">Complete</span>
                                </div>
                            </div>

                        </div>

                    </div> -->
                </div>
            </div>
            <div class="row">
                <div class="leftside-ck-8">
                    <div class="checkout__inner">
                        <div class="accordion-list">
                            <div class="accordion">
                            <?php 
								$accordion_class='accordion-title';
								if(!isset($_SESSION['USER_LOGIN'])){
								$accordion_class='accordion-hide';
							?>
                                <div class="accordionItem open">
                                    <div class="accordion-title">
                                        Checkout Method
                                    </div>
                                    <div class="accordion-body">
                                        <div class="accordion-body-form">
                                            <div class="row">
                                                <div class="ck-6">
                                                    <div class="checkout-method-login">
                                                    <form action="" method="post">
                                                            <h5 class="checkout-method-title">Login</h5>
                                                            <div class="single-input">
                                                                <label for="user-email">Email Address</label>
                                                                <input type="email" name="login_email" id="login_email" >
                                                                <span class="field_error" id="login_email_error"></span>
                                                            </div>
                                                            <div class="single-input">
                                                                <label for="user-pass">Password</label>
                                                                <input type="password" name="login_password" id="login_password">
                                                                <span class="field_error" id="login_password_error"></span>
                                                            </div>
                                                            <p class="require">* Required fields</p>
                                                            <div class="dark-btn">
                                                               <button type="button" onclick="user_login()">Login</button>
                                                            </div>
                                                            <div class="form-output login_msg">
						                                        <p class="form-messege field_error"></p>
					                                        </div>
                                                        </form>
                                                    </div>
                                                </div>
                                                <div class="ck-6">
                                                    <div class="checkout-method-login">
                                                    <form action="" method="post">
                                                            <h5 class="checkout-method-title">Register</h5>
                                                            <div class="single-input">
                                                                <label for="user-name">Name</label>
                                                                <input  type="text" name="name" id="name" >
                                                                <span class="field_error" id="name_error"></span>
                                                            </div>
                                                            <div class="single-input">
                                                                <label for="user-email">Email Address</label>
                                                                <input type="email" name="email" id="email" >
                                                                <span class="field_error" id="email_error"></span>
                                                            </div>
                                                            <div class="single-input">
                                                                <label for="user-mobile">Mobile</label>
                                                                <input type="tel" name="mobile" id="mobile" >
                                                                <span class="field_error" id="mobile_error"></span>
                                                            </div>
                                                            <div class="single-input">
                                                                <label for="user-pass">Password</label>
                                                                <input type="password" name="password" id="password">
                                                                <span class="field_error" id="password_error"></span>
                                                            </div>
                                                            <div class="dark-btn">
                                                            <button type="button" onclick="user_register()">Register</button>
                                                            </div>
                                                        </form>
                                                        <div class="form-output register_msg">
				                                        	<p class="form-messege "></p>
		                                    		    </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <?php } ?>
                                <div class="accordionItem close">                              
                                    <div class="<?php echo $accordion_class?>">
                                        Address Information
                                    </div>
                                <form method="post">
                                    <div class="accordion-body">
                                        <div class="bilinfo">
                                            
                                                <div class="row">                                        
                                                    <div class="ck-12">
                                                        <div class="single-input">
                                                            <input type="text" name="address"  placeholder="Street Address" required>
                                                        </div>
                                                    </div>                                                  
                                                    <div class="ck-6">
                                                        <div class="single-input">
                                                            <input type="text" name="city" placeholder="City/State" required>
                                                        </div>
                                                    </div>
                                                    <div class="ck-6">
                                                        <div class="single-input">
                                                            <input type="text" name="pincode" placeholder="Post code/ zip" required>
                                                        </div>
                                                    </div>
                                                   
                                                </div>
                                            
                                        </div>
                                    </div>
                                   </div>
                                   <div class="accordionItem close">
                                   <div class="<?php echo $accordion_class?>">
										payment information
									</div>
                                    <div class="accordion-body">
                                        <div class="paymentinfo">
                                            <div class="single-method">
                                            COD <input type="radio" name="payment_type" value="cod" required/>
											&nbsp;&nbsp;
                                            <!-- PayU <input type="radio" name="payment_type" value="payu" required/> -->
                                            </div>                                            
                                        </div>
                                    </div>
                                    <input class="checkBtn" type="submit" name="submit"/>
                                    
                                 </form>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="leftside-ck-4 ">
                    <div class="order-details">
                        <h5 class="order-details-title">Your Order</h5>
                        <div class="order-details-item">
                        <?php
								$cart_total=0;
								foreach($_SESSION['cart'] as $key=>$val){
								$productArr=get_product($con,'','',$key);
								$pname=$productArr[0]['name'];
								$mrp=$productArr[0]['mrp'];
								$price=$productArr[0]['price'];
								$image=$productArr[0]['image'];
								$qty=$val['qty'];
								$cart_total=$cart_total+($price*$qty);
								?>
                            <div class="single-item">
                                <div class="single-item-thumb">
                                     <img src="<?php echo PRODUCT_IMAGE_SITE_PATH.$image?>"  />
                                </div>
                                <div class="single-item-content">
                                    <a href="#"><?php echo $pname?></a>
                                    <span class="price">Rs.<?php echo $price*$qty?></span>
                                </div>
                                <div class="single-item-remove">
                                <a href="javascript:void(0)" onclick="manage_cart('<?php echo $key?>','remove')"><i class="fa fa-trash" aria-hidden="true"></i>
                                    </a>
                                </div>
                            </div>
                            <?php } ?>
                        </div>
                        <div class="ordre-details__total">
                            <h5>Order total</h5>
                            <span class="price">Rs.<?php echo $cart_total?></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- Checkout page end -->


<?php require('footer.php')?>       