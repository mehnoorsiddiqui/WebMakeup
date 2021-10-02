 <?php
require('connection.inc.php');
require('functions.inc.php');
$is_login=isset($_SESSION['ADMIN_LOGIN']) && $_SESSION['ADMIN_LOGIN']!='';
if(!$is_login){
	header('location:login.php');
	die();
}
?> 
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"
        integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
        <link rel="stylesheet" href="assets/css/form.css?v=<?php echo time();?>" >
    <link rel="stylesheet" href="assets/css/style.css?v=<?php echo time();?>" >
</head>

<body>
    <aside>
        <div class="container">
            <div class="navigation">
                <ul>

                    <li>
                        <a href="#" class="a-brand">
                            <span class="icon"><i class="fa fa-meetup" aria-hidden="true"></i></i></span>
                            <span class="title">
                                <h2>Dashboard</h2>
                            </span>
                        </a>
                    </li>
                    <li class="menu-title">
                        <div>
                            <span class="icon-menu"><i class="fa fa-laptop" aria-hidden="true"></i></span>
                            <span class="title-menu">MENU</span>
                        </div>
                    </li>
                    <li>
                        <a href="categories.php">
                            <span class="icon"><i class="fa fa-home" aria-hidden="true"></i>
                            </span>
                            <span class="title">Categories Master</span>
                        </a>
                    </li>
                    <li>
                        <a href="sub_categories.php">
                            <span class="icon"><i class="fa fa-home" aria-hidden="true"></i>
                            </span>
                            <span class="title">Sub Categories Master</span>
                        </a>
                    </li>
                    <li>
                        <a href="product.php">
                            <span class="icon"><i class="fa fa-user-o" aria-hidden="true"></i>
                            </span>
                            <span class="title">Product Master</span>
                        </a>
                    </li>
                    <li>
                        <a href="order_master.php">
                            <span class="icon"><i class="fa fa-comment" aria-hidden="true"></i>
                            </span>
                            <span class="title">Order Master</span>
                        </a>
                    </li>
                    <li>
                        <a href="users.php">
                            <span class="icon"><i class="fa fa-question" aria-hidden="true"></i>
                            </span>
                            <span class="title">User Listings</span>
                        </a>
                    </li>
                    <li>
                        <a href="contact_us.php">
                            <span class="icon"><i class="fa fa-cog" aria-hidden="true"></i>
                            </span>
                            <span class="title">Contact us leads</span>
                        </a>
                    </li>
                </ul>
            </div>
    </aside>
    <!-- left panel completed-->


    <div class="main">
        <div class="topbar">
            <div class="toggleadmin" onclick="toggleMenu()">
            </div>
            <div class=" dropdown-log">
         
                <img src="images/user.jpg" class="user-area"  >
            
               <div class="dropdown-logcontent">
                <a href="logout.php"><i class="fa fa-power-off"></i> Logout</a>
            </div>
            </div>
           

        </div>