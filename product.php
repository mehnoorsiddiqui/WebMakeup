<?php
require("header.php");
if(isset($_GET['id'])){
	$product_id=mysqli_real_escape_string($con,$_GET['id']);
	if($product_id>0){
		$get_product=get_product($con,'','',$product_id);
	}else{
		?>
		<script>
		window.location.href='index.php';
		</script>
		<?php
	}
}else{
	?>
	<script>
	window.location.href='index.php';
	</script>
	<?php
}
?>
<body>
  


<section class="bg-white card-section1">
    <div class="card-wrapper">
      <div class="card">
        <!-- card left -->
        <div class="product-imgs">
          <div class="img-display">
            <div class="img-showcase">
              <img src="<?php echo PRODUCT_IMAGE_SITE_PATH.$get_product['0']['image']?>" alt="full-image">
            </div>
          </div>
        </div>
        <!-- card right -->
        <div class="product-content">
          <h2 class="product-title"><?php echo $get_product['0']['name']?></h2>
          <div class="product-price">
            <span class="last-price"> <span>Rs. <?php echo $get_product['0']['mrp']?></span></span>
            <span class="new-price"><span>Rs. <?php echo $get_product['0']['price']?></span></span>
          </div>
          <p class="pro__info"><?php echo $get_product['0']['short_desc']?></p>

          <div class="product-detail">
            <ul>
              <li>Available: <span>in stock</span></li>
              <li>Quantity: </li>
              <div class="counter">
                <!-- <span class="down" onClick='decreaseCount(event, this)'>-</span>
                <input type="number" id ="qty" value=1>
                <span class="up" onClick='increaseCount(event, this)'>+</span> -->
                <select id="qty">
											<option>1</option>
											<option>2</option>
											<option>3</option>
											<option>4</option>
											<option>5</option>
											<option>6</option>
											<option>7</option>
											<option>8</option>
											<option>9</option>
											<option>10</option>
										</select>
              </div>
              <li>Category:
                <a href="#"><span><?php echo $get_product['0']['categories']?></span></a>
              </li>
            </ul>
          </div>
          <div class="purchase-info">
            <a type="button" class="btn" href="javascript:void(0)" onclick="manage_cart('<?php echo $get_product['0']['id']?>','add')">
              Add to Cart 
            </a>
          </div>
        </div>
      </div>
    </div>
</section>
  <!-- Start Product Description -->
  <section class="card-section2 bg-white">
    <div class="container">
      <div class="description-title">
        <h4>Product Details</h4>
      </div>
      <div class="description-content">
      <?php echo $get_product['0']['description']?>
      </div>
    </div>
  </section>
  </body>
  <!-- End Product Description -->
<?php
require("footer.php");
?>