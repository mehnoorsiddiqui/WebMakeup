<?php
require('connection.inc.php');
require('functions.inc.php');

$type=get_safe_value($con,$_POST['type']);
if($type=='email'){  //checking if we receive a correct type means it is an email
	$email=get_safe_value($con,$_POST['email']);
	$check_user=mysqli_num_rows(mysqli_query($con,"select * from users where email='$email'"));
	if($check_user>0){  // if email is already registers
		echo "email_present";
		die(); // stop the process then
	}
	
	$otp=rand(1111,9999); //generating otp randomly
	$_SESSION['EMAIL_OTP']=$otp;    
	$html="$otp is your otp";
	
	include('smtp/PHPMailerAutoload.php');
	//PHPMailer Object
	$mail=new PHPMailer(true);//Argument true in constructor enables exceptions
	$mail->isSMTP();
	$mail->Host="smtp.gmail.com";
	$mail->Port=587;
	$mail->SMTPSecure="tls";
	$mail->SMTPAuth=true;
	$mail->Username="//email";
	$mail->Password="//yourpassword";
	$mail->SetFrom("//email");
	$mail->addAddress($email);
	$mail->IsHTML(true);//Send HTML or Plain Text email
	$mail->Subject="Registration Verification";
	$mail->Body=$html;
	$mail->SMTPOptions=array('ssl'=>array(
		'verify_peer'=>false,
		'verify_peer_name'=>false,
		'allow_self_signed'=>false
	));
	if($mail->send()){
		echo "done";
	}else{
		//echo "Error occur";
	}
}
?>