<?php
require("header.php");
if(!isset($_GET['id']) && $_GET['id']!=''){
	?>
	<script>
	window.location.href='index.php';
	</script>
	<?php
}

$cat_id=mysqli_real_escape_string($con,$_GET['id']);
$sub_categories='';
if(isset($_GET['sub_categories'])){
	$sub_categories=mysqli_real_escape_string($con,$_GET['sub_categories']);
}
$price_high_selected="";
$price_low_selected="";
$new_selected="";
$old_selected="";
$sort_order="";
if(isset($_GET['sort'])){
	$sort=mysqli_real_escape_string($con,$_GET['sort']);
	if($sort=="price_high"){
		$sort_order=" order by product.price desc ";
		$price_high_selected="selected";	
	}if($sort=="price_low"){
		$sort_order=" order by product.price asc ";
		$price_low_selected="selected";
	}if($sort=="new"){
		$sort_order=" order by product.id desc ";
		$new_selected="selected";
	}if($sort=="old"){
		$sort_order=" order by product.id asc ";
		$old_selected="selected";
	}

}


if($cat_id>0){	
	$get_product=get_product($con,'',$cat_id,'','',$sort_order,'',$sub_categories);
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
    <?php if(count($get_product)>0){?>
         <div class="sort">
            <select class="select" onchange="sort_product_drop('<?php echo $cat_id?>','<?php echo SITE_PATH?>')" id="sort_product_id">
                <option>Default softing</option>
                <option value="price_low" <?php echo $price_low_selected?>>Sort by price low to high</option>
                <option value="price_high"<?php echo $price_high_selected?>>Sort by price high to low</option>
                <option value="new" <?php echo $new_selected?>>Sort by new first</option>
				<option value="old"  <?php echo $old_selected?>>Sort by old first</option>
            </select>
        </div>
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
							<a href="javascript:void(0)" onclick="manage_cart('<?php echo $list['id']?>','add')" title="Add To Cart">
								<i class="fa fa-shopping-cart"></i>
							</a>
							<a href="javascript:void(0)" onclick="wishlist_manage('<?php echo $list['id']?>','add')" title="Wishlist">
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