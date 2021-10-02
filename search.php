<?php
require("header.php");
$str=mysqli_real_escape_string($con,$_GET['str']);
if($str!=''){
	$get_product=get_product($con,'','','',$str);
}else{
	?>
	<script>
	window.location.href='index.php';
	</script>
	<?php
}		
?>
<!--product grid start-->

<div class="product-list">
    <div class="container">
        <?php
        if(count($get_product)>0){
        ?>
        <div class="rowproduct">
            <?php
				foreach($get_product as $list){
		    ?>
		   <!-- Item -->
		   <div class="item">
			   <div class="product">
				   <div class="product-thumb">
				   <a href="product.php?id=<?php echo $list['id']?>">
                        <img src="<?php echo PRODUCT_IMAGE_SITE_PATH.$list['image']?>" alt="product images">
                    </a>

						<div class="product-button">
							<a href="#" title="Quick View">
								<i class="fa fa-eye"></i>
							</a>
							<a href="#" title="Add To Cart">
								<i class="fa fa-shopping-cart"></i>
							</a>
							<a href="#" title="Wishlist">
								<i class="fa fa-heart"></i>
							</a>
						</div>
				   </div>
				   <div class="product-info">
					   <h3 class="product-name"> <?php  echo $list ['name'] ?> </h3>
					   <p class="product-cat"><?php  echo $list ['mrp'] ?></p>
					   <p class="product-price"><?php  echo $list ['price'] ?></p>
				   </div>
			   </div>
		   </div>
		   <!-- Item End -->
		   <?php } ?>
        </div>
    <?php } else { 
		echo "Data not found";
	}
    ?>
    </div>
  
 </div>
 
 <!--product grid end-->

<?php
require("footer.php");
?>