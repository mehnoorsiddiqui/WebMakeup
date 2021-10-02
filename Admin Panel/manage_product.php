<?php
require("top.inc.php");
$categories_id='';
$name='';
$mrp='';
$price='';
$qty='';
$image='';
$short_desc	='';
$description	='';
$meta_title	='';
$meta_desc  ='';
$meta_keyword='';
$best_seller='';
$sub_categories_id='';

$msg='';
$image_required='required';
if(isset($_GET['id']) && $_GET['id']!=''){
	$image_required='';
	$id=get_safe_value($con,$_GET['id']);
	$res=mysqli_query($con,"select * from product where id='$id'");
	$check=mysqli_num_rows($res);
	if($check>0){
		$row=mysqli_fetch_assoc($res);
		$categories_id=$row['categories_id'];
		$sub_categories_id=$row['sub_categories_id'];
		$name=$row['name'];
		$mrp=$row['mrp'];
		$price=$row['price'];
		$qty=$row['qty'];
		$short_desc=$row['short_desc'];
		$description=$row['description'];
		$meta_title=$row['meta_title'];
		$meta_desc=$row['meta_desc'];
		$meta_keyword=$row['meta_keyword'];
		$best_seller=$row['best_seller'];
	}else{
		header('location:product.php');
		die();
	}
}

if(isset($_POST['submit'])){
	$categories_id=get_safe_value($con,$_POST['categories_id']);
	$sub_categories_id=get_safe_value($con,$_POST['sub_categories_id']);
	$name=get_safe_value($con,$_POST['name']);
	$mrp=get_safe_value($con,$_POST['mrp']);
	$price=get_safe_value($con,$_POST['price']);
	$qty=get_safe_value($con,$_POST['qty']);
	$short_desc=get_safe_value($con,$_POST['short_desc']);
	$description=get_safe_value($con,$_POST['description']);
	$meta_title=get_safe_value($con,$_POST['meta_title']);
	$meta_desc=get_safe_value($con,$_POST['meta_desc']);
	$meta_keyword=get_safe_value($con,$_POST['meta_keyword']);
	$best_seller=get_safe_value($con,$_POST['best_seller']);
	
	$res=mysqli_query($con,"select * from product where name='$name'");
	$check=mysqli_num_rows($res);
	if($check>0){
		if(isset($_GET['id']) && $_GET['id']!=''){
			$getData=mysqli_fetch_assoc($res);
			if($id==$getData['id']){
			
			}else{
				$msg="Product already exist";
			}
		}else{
			$msg="Product already exist";
		}
	}
		
	if(isset($_GET['id']) && $_GET['id']==0){
		if($_FILES['image']['type']!='image/png' && $_FILES['image']['type']!='image/jpg' && $_FILES['image']['type']!='image/jpeg'){
			$msg="Please select only png,jpg and jpeg image format";
		}
	}else{
		if($_FILES['image']['type']!=''){
				if($_FILES['image']['type']!='image/png' && $_FILES['image']['type']!='image/jpg' && $_FILES['image']['type']!='image/jpeg'){
				$msg="Please select only png,jpg and jpeg image format";
			}
		}
	}
	
	if($msg==''){
		if(isset($_GET['id']) && $_GET['id']!=''){
			if($_FILES['image']['name']!=''){
				$image=rand(111111111,999999999).'_'.$_FILES['image']['name'];
				move_uploaded_file($_FILES['image']['tmp_name'],PRODUCT_IMAGE_SERVER_PATH.$image);
				$update_sql="update product set categories_id='$categories_id',name='$name',mrp='$mrp',price='$price',qty='$qty',short_desc='$short_desc',description='$description',meta_title='$meta_title',meta_desc='$meta_desc',meta_keyword='$meta_keyword',image='$image',best_seller='$best_seller',sub_categories_id='$sub_categories_id' where id='$id'";				
			}else{
				$update_sql="update product set categories_id='$categories_id',name='$name',mrp='$mrp',price='$price',qty='$qty',short_desc='$short_desc',description='$description',meta_title='$meta_title',meta_desc='$meta_desc',meta_keyword='$meta_keyword',best_seller='$best_seller',sub_categories_id='$sub_categories_id' where id='$id'";				
			}
			mysqli_query($con,$update_sql);
		}else{
			$image=rand(111111111,999999999).'_'.$_FILES['image']['name'];
			move_uploaded_file($_FILES['image']['tmp_name'],PRODUCT_IMAGE_SERVER_PATH.$image);
			mysqli_query($con,"insert into product(categories_id,name,mrp,price,qty,short_desc,description,meta_title,meta_desc,meta_keyword,status,image,best_seller,sub_categories_id) values('$categories_id','$name','$mrp','$price','$qty','$short_desc','$description','$meta_title','$meta_desc','$meta_keyword',1,'$image','$best_seller','$sub_categories_id')");
		}
		header('location:product.php');
		die();
	}
} 
?>
 <div class="form-Card">
         <div class="form-Categories">
            <div class="form-Head">
            <h4 class="form-Title">Product Form </h4> 
             
            </div>
          </div>
    <div class="form-Body">
        <form method="post" enctype="multipart/form-data">
          <div class="input-Section">
			    <div>
                   <label for="categories">Categories</label>
                   <select name="categories_id"  id="categories_id" class="res-select" onchange="get_sub_cat('')" required>
				      <option>Select Category</option>
					  <?php
						$res=mysqli_query($con,"select id,categories from categories order by categories asc");
						while($row=mysqli_fetch_assoc($res)){
							if($row['id']==$categories_id){
							echo "<option selected value=".$row['id'].">".$row['categories']."</option>";
							}else{
							echo "<option value=".$row['id'].">".$row['categories']."</option>";
							}
											
						}
					?>
			        </select>
			    </div>
               <br>
			   <div>
                   <label for="categories">Sub Categories</label>
                   <select name="sub_categories_id" id="sub_categories_id" class="res-select">
				      <option>Select Sub Category</option>
			        </select>
			    </div>
               <br>
			   <div>
			        <label for="categories">Product Name</label>
					<input type="text" name="name" placeholder="Enter Product Name" required value="<?php echo $name?>">
			   </div>
			   <br>
			   <div>
                   <label for="categories">Trending Now/Best Seller</label>
                   <select name="best_seller" required class="res-select">
				      <option value=''>Select Category</option>
					  <?php
							if($best_seller==1){
								echo '<option value="1" selected>Yes</option>
									  <option value="0">No</option>';
							}elseif($best_seller==0){
						    	echo '<option value="1">Yes</option>
								  <option value="0" selected>No</option>';
							}else{
							    echo '<option value="1">Yes</option>
								  <option value="0">No</option>';
							}
					  ?>
			        </select>
			    </div>
				<br>
			   <div>
			        <label for="categories">MRP</label>
					<input type="text" name="mrp" placeholder="Enter MRP" required value="<?php echo $mrp?>">
			   </div>
			   <div>
			        <label for="categories">Price</label>
					<input type="text" name="price" placeholder="Enter Price" required value="<?php echo $price?>">
			   </div>
			   <div>
			        <label for="categories">Qty</label>
					<input type="text" name="qty" placeholder="Enter Qty" required value="<?php echo $qty?>">
			   </div>
			   <div>
			        <label for="categories">Image</label>
					<input type="file" name="image"<?php echo $image_required?>>
			   </div>
			   <div>
			        <label for="categories">Short Description</label>
					<textarea  name="short_desc" placeholder="Enter product Short Description" required><?php echo $short_desc?></textarea>
			   </div>
			   <div>
			        <label for="categories">Description</label>
					<textarea  name="description" placeholder="Enter product Description" required><?php echo $description?></textarea>
			   </div>
			   <div>
			        <label for="categories">Meta Title</label>
					<textarea  name="meta_title" placeholder="Enter product Meta Title"><?php echo $meta_title?></textarea>
			   </div>
			   <div>
			        <label for="categories">Meta Description</label>
					<textarea  name="meta_desc" placeholder="Enter product Meta description"><?php echo $meta_desc?></textarea>
			   </div>
			   <div>
			        <label for="categories">Meta Keyword</label>
					<textarea  name="meta_keyword" placeholder="Enter product Meta Keyword"><?php echo $meta_keyword?></textarea>
			   </div>
               <button name="submit" type="submit" class="form-Submit" >
              Submit
              </button>
              <div class="field_error"><?php echo $msg?></div>
          </div>
         
        </form>
    </div>
<script>
	function get_sub_cat(sub_cat_id) {
        var categories_id = document.querySelector('#categories_id').value;
        var ajax = new XMLHttpRequest();
        ajax.open("post", "get_sub_cat.php", true);
        ajax.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            // Response
           var response = this.responseText;
           document.querySelector('#sub_categories_id').innerHTML = response;
        }
    };
    var data = new URLSearchParams({ categories_id, sub_cat_id});
    ajax.send(data);
}
</script>

<?php
require("footer.inc.php");
?>
<script>
<?php
if(isset($_GET['id'])){
?>
get_sub_cat('<?php echo $sub_categories_id?>');
<?php } ?>
</script>