<?php include('config/constant.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="CSS/styles.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <link rel="icon" type="png" href="img/holiday-image/holiday-logo.png">
    
    <title>Holiday Cafe</title>
</head>
<body>
    <div class="header">
        <div class="nav-con">
            <div class="logo">
                <a href="<?php echo 'http://localhost/holiday-cafe-pos-system/index.php';?>"><img src="img/holiday-image/holiday-logo.png" alt="" ></a>
            </div>
            <div class="menu-bar">
            
                <a href="<?php echo 'http://localhost/holiday-cafe-pos-system/menu.php';?>">MENU</a>
                <a href="<?php echo 'http://localhost/holiday-cafe-pos-system/souvenir.php'; ?>">SOUVENIR&DECORATION</a>
                <a href="<?php echo 'http://localhost/holiday-cafe-pos-system/store.php'; ?>">STORE</a>
            </div>
        </div>
        <div class="login">
            
            <a href="<?php echo 'http://localhost/holiday-cafe-pos-system/login-signup/login.php'; ?>">Sign in</a>
            <a href="<?php echo 'http://localhost/holiday-cafe-pos-system/login-signup/signup.php'; ?>" id="signup">Register</a>
        </div>
    </div>

    <div class="learnmore-content">
        <div class="learnmore1">
            <img src="img/cup2.png" alt="">
            <div class="learnmore2">
                <h2>Eco Friendly</h2>
                <p>Holiday Cafe use a paper cup instead of plastic to protect and nurture the environment.</p>
            </div>
        </div>
        <div class="learnmore1">
            <div class="learnmore2">
                <h2>Coffee Creativity</h2>
                <p>A creative barista turns coffee into appealing vibes</p>
            </div>
            <img src="img/cup3.jpg" alt="">

        </div>

        <div class="learnmore1">
        <img src="img/shop2.jpg" alt="">

            <div class="learnmore2">
                <h2>Wide Space</h2>
                <p>Availability of tables for your loved ones, can serve many customer</p>
            </div>

        </div>

        <div class="learnmore1">

            <div class="learnmore2">
                <h2>Aesthetic Vibes and Relaxation</h2>
                <p>A minimalist theme with warm colors and design</p>
            </div>
        <img src="img/relax.jpg" alt="">

        </div>
    </div>
   
    <footer>
        <div class="info-con">
            <div class="info1">
                <h3>About Us</h3>
                <a href="<?php echo SITENEW.'footer-content/our-company.php'; ?>">Our Company</a>
                <a href="<?php echo SITENEW.'footer-content/our-coffee.php'; ?>">Our Coffee</a>
                <a href="<?php echo SITENEW.'footer-content/customer-service.php'; ?>">Customer Service</a>
                <a href="<?php echo SITENEW.'footer-content/contact-us.php'; ?>">Contact Us</a>
            </div>
            <div class="info1">
                <div class="icon-footer">
                    <a href="https://web.facebook.com/profile.php?id=61558378048628" target="_blank"><img src="icon/facebook.png" alt=""></a>
                    <a href="https://www.instagram.com/holiday_cafe_shop/" target="_blank"><img src="icon/instagram.png" alt=""></a>
                    <a href="https://twitter.com/holiday_cafe1" target="_blank"><img src="icon/twitter.png" alt=""></a>
                </div>
                <a href="<?php echo SITENEW.'footer-content/privacy-policy.php'; ?>">Privacy Notice</a>
                <a href="<?php echo SITENEW.'footer-content/terms-of-use.php'; ?>">Terms of Use</a>
                <a href="<?php echo SITENEW.'footer-content/accessibility.php'; ?>">Accessibility</a>
                <a href="<?php echo SITENEW.'footer-content/cookie-preferences.php'; ?>">Cookie Preferences</a>
            </div>
        </div>
        <span>© 2024 Holiday Cafe and Souvenir Shop Company. All rights reserved.</span>
    </footer>
   
</body>
</html>