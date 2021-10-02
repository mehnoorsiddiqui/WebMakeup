<?php require('header.php');
if(!isset($_SESSION['cart']) || count($_SESSION['cart'])==0){
	?>
	<script>
		window.location.href='index.php';
	</script>
	<?php
}
?>

<body>

  <div class="main-c">
  <div class="header-cart">
       <h1>MY  CART</h1>
  </div>
    <div class="basket-c">
      <div class="basket-labels-c">
        <ul class="ul-c">
          <li class="item-c item-heading-c li-c">Item</li>
          <li class="price-c li-c">Price</li>
          <li class="quantity-c li-c">Quantity</li>
          <li class="subtotal-c li-c">Subtotal</li>
        </ul>
      </div>
      
      <div class="basket-product-c">
      <?php
										if(isset($_SESSION['cart'])){
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
        <div class="item-c">
          <div class="product-image-c">
            <img src="<?php echo PRODUCT_IMAGE_SITE_PATH.$image?>" class="product-frame" />
          </div>
          <div class="product-details-c">
            <a><strong><span ><?php echo $pname?></span></a>
            <p><strong><?php echo $mrp?></strong></p>
            <p><?php echo $price?></p>
          </div>
        </div>
        <div class="price-c"><?php echo $price?></div>
        <div class="quantity-c">
          <input type="number" class="quantity-field-c" id="<?php echo $key?>qty" value="<?php echo $qty?>"/>
          <br/><a href="javascript:void(0)" onclick="manage_cart('<?php echo $key?>','update')">update</a>
        </div>
        <div class="subtotal-c"><?php echo $qty*$price?></div>
        <div class="remove-c">
        <a href="javascript:void(0)" onclick="manage_cart('<?php echo $key?>','remove')">Remove</a>
        </div>
      
        <?php } } ?>
      </div>
    </div>
    <aside class="aside-c">
      <div class="summary-c">
        <div class="summary-total-items-c"><span class="total-items-c"></span>ORDER SUMMARY</div>
        <div class="summary-subtotal-c">

            <div class="basket-product-c">
                <div class="subtotal-title-c">Subtotal</div>
                 <div class="subtotal-value-c final-value-c" id="basket-subtotal"><?php echo $cart_total?></div>
            </div>
            <div class="summary-total-c">
              <div class="total-title-c">Total</div>
              <div class="total-value-c final-value-c" id="basket-total"><?php echo $cart_total?></div>
            </div>
         
        </div>
        <div class="summary-checkout-c">
          <a class="checkout-cta-c  bg-red"  href="checkout.php">PROCEED TO CHECKOUT</a>
        </div>
        <br>
        <div class="summary-checkout-c">
          <a class="checkout-cta-c outline-black" href="index.php">CONTINUE SHOPPING</a>
        </div>
      </div>
    </aside>
</div>
</body>

<?php
require("footer.php")
?>