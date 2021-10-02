<?php
require("top.inc.php");
$categories='';
$msg='';
$sub_categories='';
if(isset($_GET['id']) && $_GET['id']!=''){
	$id=get_safe_value($con,$_GET['id']);
	$res=mysqli_query($con,"select * from sub_categories where id='$id'");
	$check=mysqli_num_rows($res);
	if($check>0){
		$row=mysqli_fetch_assoc($res);
		$sub_categories=$row['sub_categories'];
		$categories=$row['categories_id'];
	}else{
		header('location:sub_categories.php');
		die();
	}
}

if(isset($_POST['submit'])){
	$categories=get_safe_value($con,$_POST['categories_id']);
	$sub_categories=get_safe_value($con,$_POST['sub_categories']);
	$res=mysqli_query($con,"select * from sub_categories where categories_id='$categories' and sub_categories='$sub_categories'");
	$check=mysqli_num_rows($res);
	if($check>0){
		if(isset($_GET['id']) && $_GET['id']!=''){
			$getData=mysqli_fetch_assoc($res);
			if($id==$getData['id']){
			
			}else{
				$msg="Sub Category already exists";
			}
		}else{
			$msg="Sub Category already exists";
		}
	}
	
	if($msg==''){
		if(isset($_GET['id']) && $_GET['id']!=''){
			mysqli_query($con,"update sub_categories set categories_id='$categories',sub_categories='$sub_categories' where id='$id'");
		}else{

			mysqli_query($con,"insert into sub_categories(categories_id,sub_categories,status) values('$categories','$sub_categories','1')");
		}
		header('location:sub_categories.php');
		die();
	}
}
?>
 <div class="form-Card">
         <div class="form-Categories">
            <div class="form-Head">
            <h4 class="form-Title">Sub Categories Form </h4> 
             
            </div>
          </div>
    <div class="form-Body">
        <form method="post">
          <div class="input-Section">
               <label for="categories">Categories</label>
			   <select name="categories_id" required class="res-select">
					<option value="">Select Categories</option>
				<?php
					$res=mysqli_query($con,"select * from categories where status='1'");
					while($row=mysqli_fetch_assoc($res)){
						if($row['id']==$categories){
							echo "<option value=".$row['id']." selected>".$row['categories']."</option>";
						}else{
							echo "<option value=".$row['id'].">".$row['categories']."</option>";
						}
					}
					?>
				</select>
			</div>
			<div class="input-Section">
			    <div>
			        <label for="categories">Sub Categories</label>
					<input  type="text" name="sub_categories" placeholder="Enter Sub Categories" required value="<?php echo $sub_categories?>">
			    </div>               
               <br>
               <button name="submit" type="submit" class="form-Submit" >
              Submit
              </button>
              <div class="field_error"><?php echo $msg?></div>
          </div>
         
        </form>
    </div>
<?php
require("footer.inc.php");
?>