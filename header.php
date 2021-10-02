<?php
require('connection.inc.php');
require('functions.inc.php');
require('add_to_cart.inc.php');
$wishlist_count=0;
$cat_res=mysqli_query($con,"select * from categories where status=1 order by categories asc");
$cat_arr=array();
while($row=mysqli_fetch_assoc($cat_res)){
	$cat_arr[]=$row;	
}

$obj=new add_to_cart();
$totalProduct=$obj->totalProduct();

if(isset($_SESSION['USER_LOGIN'])){
	$uid=$_SESSION['USER_ID'];
	
	if(isset($_GET['wishlist_id'])){
		$wid=get_safe_value($con,$_GET['wishlist_id']);
		mysqli_query($con,"delete from wishlist where id='$wid' and user_id='$uid'");
	}

	$wishlist_count=mysqli_num_rows(mysqli_query($con,"select product.name,product.image,product.price,product.mrp,wishlist.id from product,wishlist where wishlist.product_id=product.id and wishlist.user_id='$uid'"));
}
$script_name=$_SERVER['SCRIPT_NAME'];
$script_name_arr=explode('/',$script_name);
$mypage=$script_name_arr[count($script_name_arr)-1];

$meta_title="Buy Makeup Online";
$meta_desc="Buy Makeup Online";
$meta_keyword="Buy Makeup Online";
if($mypage=='product.php'){
	$product_id=get_safe_value($con,$_GET['id']);
	$product_meta=mysqli_fetch_assoc(mysqli_query($con,"select * from product where id='$product_id'"));
	$meta_title=$product_meta['meta_title'];
	$meta_desc=$product_meta['meta_desc'];
	$meta_keyword=$product_meta['meta_keyword'];
}if($mypage=='contact.php'){
	$meta_title='Contact Us';
}
?>
<!DOCTYPE html>
<html>
<head>
	<title><?php echo $meta_title?></title>
    <meta name="description" content="<?php echo $meta_desc?>">
	<meta name="keywords" content="<?php echo $meta_keyword?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="css/font-awesome.css">
	<link rel="stylesheet" type="text/css" href="css/style.css?v=<?php echo time();?>" >
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css?v=<?php echo time();?>" >
	<link href="https://fonts.googleapis.com/css2?family=Raleway:wght@400&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css"
    integrity="sha512-+4zCK9k+qNFUR5X+cKL9EIR+ZOhtIloNl9GIKS57V1MyNsYpYcUrUeQc9vNfzsWfV28IaLL3i96P9sdNyeRssA=="
    crossorigin="anonymous?v=<?php echo time();?>">
	
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css?v=<?php echo time();?>" >
	
	
</head>
<body>

<a onclick="topFunction()" id="myBtn" href="#"> <i class="fas fa-arrow-up"></i></a>

<div class="head"> <p> <b > HELLO GORGEOUS!</b> 
	GET FREE SHIPPING ON ORDERS ABOVE RS 5000.</p> </div>

	

 <!-- header start -->
 <header class="header">
	<div class="container">
		<div class="row v-center">
			<div class="header-item item-left">
				<div class="logo">
					<a href="index.php"> <span >makeup</span>city</a>
				</div>
			</div>
			<!-- menu start here -->
			<div class="header-item item-center">
				<div class="menu-overlay">
				</div>
				<nav class="menu">
					<div class="mobile-menu-head">
						<div class="go-back"><i class="fa fa-angle-left"></i></div>
						<div class="current-menu-title"></div>
						<div class="mobile-menu-close">&times;</div>
					</div>
					<ul class="menu-main text-center">
						<li><a href="index.php">HOME </i></a></li>						
						<?php
						 foreach($cat_arr as $list){
						?>
						<li class="menu-item-has-children" >
							<a href="categories.php?id=<?php echo $list['id']?>"><?php echo $list['categories']?> <i class="fa fa-angle-down"></i></a>
							<p class="hide-p " href="categories.php?id=<?php echo $list['id']?>" ><?php echo $list['categories']?><i class="fa fa-angle-down"></i></p>
						<?php
							$cat_id=$list['id'];
							$sub_cat_res=mysqli_query($con,"select * from sub_categories where status='1' and categories_id='$cat_id'");
							if(mysqli_num_rows($sub_cat_res)>0){
						?>
				       		<div class="sub-menu single-column-menu">
								<ul>
								<li class="hide-li"><a href="categories.php?id=<?php echo $list['id']?>">All <?php echo $list['categories']?></a></li>
								<?php
									while($sub_cat_rows=mysqli_fetch_assoc($sub_cat_res)){
									echo '<li><a href="categories.php?id='.$list['id'].'&sub_categories='.$sub_cat_rows['id'].'">'.$sub_cat_rows['sub_categories'].'</a></li>';
						            }
								?>
								</ul>
								<?php } ?>
					    </li>
						<?php
						}
						?>				
						<li>
							<a href="contact.php">CONTACT</a>
						</li>
					</ul>
				</nav>
			</div>
			<!-- menu end here -->
			<div id="myOverlay" class="overlay">
			   <span class="closebtn" onclick="closeSearch()" title="Close Overlay">×</span>
			   <div class="overlay-content">
			   <form action="search.php" method="get">
				  
				   <input type="text" placeholder="Search here.." name="str">
				   <button type="submit"><i  style="color: white;"class="fa fa-search"></i></button>
				   
				 </form>
			   </div>
			 </div>
			<div class="header-item item-right">
				<ul>
				   <a href="#" onclick="openSearch()"><i class="fas fa-search fa-lg"></i></a>
				   <?php if(isset($_SESSION['USER_LOGIN'])){
					   ?>
					   
					   <div class=" dropdown-log">
					      <i class="far fa-user fa-lg"></i>					  
					      <div class="dropdown-logcontent">
					         <a href="my_order.php">My Order</a>
					         <a href="profile.php">Profile</a>
					         <a href="logout.php"><i class="fa fa-power-off"></i> Logout</a>
						   </div>
				       </div>
					
					<?php
					}
					else{
						echo' 
						<div class=" dropdown-log">
						   <i class="far fa-user fa-lg"></i>
					       <div class="dropdown-logcontent">
					        	<a href="login.php"><i class="fa fa-power-off"></i> Login</a>
							</div>
					</div>';
					}
					?>
				   <!-- <a href="login.php"><i class="far fa-user fa-lg"></i></a> -->
				   <?php
						if(isset($_SESSION['USER_ID'])){
					?>
					<a href="wishlist.php"  class="cart-a"><i class="far fa-heart"></i>
					<span style="right:-6px"><?php echo $wishlist_count?></span>
	                 </a>
					 <?php } ?>
					
					<a href="cart.php" class="cart-a">
						<i class="fab fa-opencart fa-lg"></i>
					   <span ><?php echo $totalProduct?></span>
				   </a>
					
				</ul>
				
				<!-- mobile menu trigger -->
				<div class="mobile-menu-trigger">
					<span></span>
				</div>
			</div>
		</div>
	</div>
</header>
<!-- header end -->
