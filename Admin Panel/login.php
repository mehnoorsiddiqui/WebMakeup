<?php
require('connection.inc.php');
require('functions.inc.php');
$msg='';
if(isset($_POST['submit'])){
   $username=get_safe_value($con,$_POST['username']);
   $password=get_safe_value($con,$_POST['password']);
   $sql="select * from admin_users where username='$username' and password='$password'";
   $res=mysqli_query($con,$sql);
   $count=mysqli_num_rows($res);

   //there is same data in database 
	if($count>0){
		$_SESSION['ADMIN_LOGIN']='yes';
		$_SESSION['ADMIN_USERNAME']=$username;
		header('location:categories.php');
		die();
	}else{
		$msg="Please enter correct login details";	
	}
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="assets/css/login.css?v=<?php echo time();?>">
    
  <script src="https://kit.fontawesome.com/a076d05399.js"></script>
</head>
<body class="log-black">
    <section id="Animated-Login-Form">
        <div class="containerW">
          <div class="login-content">
            <form method="post">
              <img src="images/avatar.svg">
              <h2 class="titleW">Welcome</h2>
              <div class="input-div one">
                <div class="i">
                  <i class="fas fa-user"></i>
                </div>
                <div class="div">
                  <!-- <h5>Username</h5> -->
                  <input type="text" name="username" class="input"placeholder="Username" required>
                </div>
              </div>
              <div class="input-div passW">
                <div class="i">
                  <i class="fas fa-lock"></i>
                </div>
                <div class="div">
                  <!-- <h5>Password</h5> -->
                  <input type="password"  name="password" class="input" placeholder="Password" required> 
                </div>
              </div>
        
              <input type="submit" name="submit" class="btn" value="Login">
             <div class="field_error"><?php echo $msg ?>
            </div>
            </form>
           
          </div>
        </div>
      </section>
    
    <!-- <script src="assets/js/login.js"></script> -->
</body>
</html>