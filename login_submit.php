<?php
require('connection.inc.php');
require('functions.inc.php');

$email=get_safe_value($con,$_POST['email']);
$password=get_safe_value($con,$_POST['password']);

$res=mysqli_query($con,"select * from users where email='$email' and password='$password'");
$check_user=mysqli_num_rows($res); //to return the number of rows present in the result set
if($check_user>0){   // it means that row with given email and username exists
	$row=mysqli_fetch_assoc($res);
	$_SESSION['USER_LOGIN']='yes';     // setting the user_login session to yes
	$_SESSION['USER_ID']=$row['id'];   
	$_SESSION['USER_NAME']=$row['name'];

	if(isset($_SESSION['WISHLIST_ID']) && $_SESSION['WISHLIST_ID']!=''){
		wishlist_add($con,$_SESSION['USER_ID'],$_SESSION['WISHLIST_ID']);// to insert the user id product id and the time of addition in database
		unset($_SESSION['WISHLIST_ID']); 
	}
	
	echo "valid";
}else{
	echo "wrong";
}
?>