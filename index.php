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
            
                <a href="<?php echo 'http://localhost/holiday-cafe-pos-system/menu.php'; ?>">MENU</a>
                <a href="<?php echo 'http://localhost/holiday-cafe-pos-system/souvenir.php'; ?>">SOUVENIR&DECORATION</a>
                <a href="<?php echo 'http://localhost/holiday-cafe-pos-system/store.php'; ?>">STORE</a>
            </div>
        </div>
        <div class="login">
            
            <a href="<?php echo 'http://localhost/holiday-cafe-pos-system/login-signup/login.php'; ?>">Sign in</a>
            <a href="<?php echo 'http://localhost/holiday-cafe-pos-system/login-signup/signup.php'; ?>" id="signup">Register</a>
        </div>
    </div>

    <section class="section1">
            <img src="img/cup-img/cup1.png" alt="">

        <div class="con-1">
            <h1>Welcome to <span>Holiday Cafe</span> and <span>Souvenir Shop</span></h1>
            <p>a coffee shop serving its people for 15 years</p>
            <a href="<?php echo 'http://localhost/holiday-cafe-pos-system/learnmore.php'; ?>">Learn More</a>
        </div>
    </section>

    <section class="section2">
        <div class="details-con">
            <img src="img/holiday-image/image-1.jpg" alt="">
            <div class="con-2">
                <span>A coffee shop perfect with your loved ones</span>
            </div>
        </div>
        <div class="details-con">
            <img src="img/holiday-image/image-2.jpg" alt="">
            <div class="con-2">
                <span>A pure coffee comes from different popular places</span>
            </div>
        </div>
        <div class="details-con">
            <img src="img/holiday-image/image-3.jpg" alt="">
            <div class="con-2">
                <span>A minimalist and aesthetic vibes</span>
            </div>
        </div>
        <div class="details-con">
            <img src="img/holiday-image/image-4.jpg" alt="">
            <div class="con-2">
                <span>A combination of other dishes</span>
            </div>
        </div>
    </section>

    <section class="section3">
        <div class="con-3 flex">
            <div class="con-4">
                <h1>"Brewing Happiness Daily."</h1>
                <span>Order Coffee and Food now with ease and at your comfort home!</span>
            </div>
            <a href="">Order Now</a>
        </div>
        <div class="con-3">
            <img src="img/aesthetic-bg.png" alt="">
        </div>
    </section>


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