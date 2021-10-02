<?php
require("top.inc.php");

$categories='';
$msg='';
if(isset($_GET['id']) && $_GET['id']!=''){
	$id=get_safe_value($con,$_GET['id']);
	$res=mysqli_query($con,"select * from categories where id='$id'");
	$check=mysqli_num_rows($res);
	if($check>0){
		$row=mysqli_fetch_assoc($res);
		$categories=$row['categories'];
	}else{
		header('location:categories.php');
		die();
	}
}

if(isset($_POST['submit'])){
	$categories=get_safe_value($con,$_POST['categories']);
	$res=mysqli_query($con,"select * from categories where categories='$categories'");
	$check=mysqli_num_rows($res);
	if($check>0){
		if(isset($_GET['id']) && $_GET['id']!=''){
			$getData=mysqli_fetch_assoc($res);
			if($id==$getData['id']){
			
			}else{
				$msg="Category already exists";
			}
		}else{
			$msg="Category already exists";
		}
	}
	
	if($msg==''){
		if(isset($_GET['id']) && $_GET['id']!=''){
			mysqli_query($con,"update categories set categories='$categories' where id='$id'");
		}else{
			mysqli_query($con,"insert into categories(categories,status) values('$categories','1')");
		}
		header('location:categories.php');
		die();
	}
}

?>
 <div class="form-Card">
         <div class="form-Categories">
            <div class="form-Head">
            <h4 class="form-Title">Categories Form </h4> 
             
            </div>
          </div>
    <div class="form-Body">
        <form method="post">
          <div class="input-Section">
               <label for="categories">Categories</label>
               <input type="text" name="categories" placeholder="Enter Categories Name" required value="<?php echo $categories?>">
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