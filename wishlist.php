<?php 
require('header.php');
if(!isset($_SESSION['USER_LOGIN'])){
	?>
	<script>
	window.location.href='index.php';
	</script>
	<?php
}
$uid=$_SESSION['USER_ID'];

$res=mysqli_query($con,"select product.name,product.image,product.price,product.mrp,wishlist.id from product,wishlist where wishlist.product_id=product.id and wishlist.user_id='$uid'");
?>
<div class="header-cart">
       <h1>WISHLIST </h1>
  </div>
 <table class="my-order-table">
  <thead>
    <tr>
      <th scope="col">Products</th>
      <th scope="col">Name of Products</th>
      <th scope="col">Remove</th>
    </tr>
  </thead>
  <tbody>
  <?php
	while($row=mysqli_fetch_assoc($res)){
  ?>
    <tr>
    <td data-label="Products"><a href="#"><img src="<?php echo PRODUCT_IMAGE_SITE_PATH.$row['image']?>"  /></a></td>
    <td data-label="Name of Products"><a href="#"><?php echo $row['name']?></a>
        <ul  class="pro__prize">
			<li class="old__prize"><?php echo $row['mrp']?></li>
			<li><?php echo $row['price']?></li>
		</ul>
    </td>
    <td data-label="Remove"><a href="wishlist.php?wishlist_id=<?php echo $row['id']?>"><i class="fa fa-trash" aria-hidden="true"></i>
</a></td>                                                
    </tr>
    <?php } ?>
  </tbody>
</table>

<?php 
require('footer.php');
?>