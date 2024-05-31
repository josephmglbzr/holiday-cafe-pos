<?php include('../config/constant.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../CSS/styles.css">
    <link rel="icon" type="png" href="../img/holiday-image/holiday-logo.png">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <script src="https://www.google.com/recaptcha/api.js"></script> 
    

    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <title>Holiday Cafe</title>
</head>
<body>
    <div class="header">
        <div class="nav-con">
            <div class="logo">
                <a href="<?php echo 'http://localhost/holiday-cafe-pos-system/index.php';?>"><img src="../img/holiday-image/holiday-logo.png" alt="" ></a>
            </div>
            <div class="menu-bar">
            
                <a href="<?php echo 'http://localhost/holiday-cafe-pos-system/menu.php';?>">MENU</a>
                <a href="<?php echo 'http://localhost/holiday-cafe-pos-system/souvenir.php';?>">SOUVENIR&DECORATION</a>
                <a href="<?php echo 'http://localhost/holiday-cafe-pos-system/store.php';?>">STORE</a>
            </div>
        </div>
        <div class="login"> 
            <a href="<?php echo SITENEW.'login-signup/login.php';?>">Sign in</a>

            
            <a href="<?php echo SITENEW.'login-signup/signup.php';?>" id="signup">Register</a>

        </div>
    </div>