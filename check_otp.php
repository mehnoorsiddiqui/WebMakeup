<?php
require('connection.inc.php');
require('functions.inc.php');

$type=get_safe_value($con,$_POST['type']);
$otp=get_safe_value($con,$_POST['email_otp']);
if($type=='email'){
	if($otp==$_SESSION['EMAIL_OTP']){
		
		echo "done";
		unset($_SESSION['EMAIL_OTP']);
	}else{
		echo "no";
	}
}
?>