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

    <div class="menu-content">
        <h2> Menu </h2>
        <h3>Beverages</h3>
        <!-- Beverages Content -->
        <div class="all-menu">
            <div class="menu-container">
                <div class="img-con">
                    <img src="img/all-menu/caffe-mocha.png" alt="">
                </div>
                <div>Caffe Mocha</div>
            </div>

            <div class="menu-container">
                <div class="img-con">
                    <img id="exceed" src="img/all-menu/CARAMEL MACCHIATO.png" alt="">
                </div>
                <div>Caramel Macchiato</div>
            </div>

            <div class="menu-container">
                <div class="img-con">
                    <img src="img/all-menu/caramel.png" alt="">
                </div>
                <div>Caramel</div>
            </div>

            <div class="menu-container">
                <div class="img-con">
                    <img src="img/all-menu/chocolate-frappuccino.png" alt="">
                </div>
                <div>Chocolate Frappuccino</div>
            </div>

            <div class="menu-container">
                <div class="img-con">
                    <img src="img/all-menu/flat-white.png" alt="">
                </div>
                <div>Flat White</div>
            </div>

            <div class="menu-container">
                <div class="img-con">
                    <img src="img/all-menu/frappe.png" alt="">
                </div>
                <div>Frappe</div>
            </div>

            <div class="menu-container">
                <div class="img-con">
                    <img src="img/all-menu/ice-latte.png" alt="">
                </div>
                <div>Iced Latte</div>
            </div>

            <div class="menu-container">
                <div class="img-con">
                    <img id="exceed" src="img/all-menu/ICED CAPPUCINO.png" alt="">
                </div>
                <div>Iced Cappuccino</div>
            </div>

            <div class="menu-container">
                <div class="img-con">
                    <img src="img/all-menu/vanilla-frappuccino.png" alt="">
                </div>
                <div>Vanilla Frappuccino</div>
            </div>

            <div class="menu-container">
                <div class="img-con">
                    <img src="img/all-menu/white-chocolate-mocha.png" alt="">
                </div>
                <div>White Chocolate</div>
            </div>
            
            
            <div class="menu-container">
                <div class="img-con">
                    <img src="img/all-menu/Hot Cappuccino.png" alt="">
                </div>
                <div>Hot Cappuccino</div>
            </div>

            <div class="menu-container">
                <div class="img-con">
                    <img id="exceed1" src="img/all-menu/BATIROL.png" alt="">
                </div>
                <div>Batirol</div>
            </div>

            <div class="menu-container">
                <div class="img-con">
                    <img id="exceed1" src="img/all-menu/Iced Chai Tea.png" alt="">
                </div>
                <div>Ice Chai Tea</div>
            </div>

            <div class="menu-container">
                <div class="img-con">
                    <img id="exceed1" src="img/all-menu/iced matcha tea.png" alt="">
                </div>
                <div>Ice Matcha Tea</div>
            </div>

            
            <div class="menu-container">
                <div class="img-con">
                    <img id="exceed1" src="img/all-menu/iced-black-tea-recipe.png" alt="">
                </div>
                <div>Ice Black Tea</div>
            </div>
        </div>
        <!-- Food Content -->
        <h3>Food</h3>
        <div class="all-menu">
            <div class="menu-container">
                <div class="img-con">
                    <img id="exceed1"  src="img/all-menu/Penne Pasta with Marinara.png" alt="">
                </div>
                <div>Penne Pasta with Marino</div>
            </div>

            <div class="menu-container">
                <div class="img-con">
                    <img id="exceed2" src="img/all-menu/Lasagna.png" alt="">
                </div>
                <div>Lasagna</div>
            </div>

            <div class="menu-container">
                <div class="img-con">
                    <img id="exceed2"  src="img/all-menu/sansrival-cake.png" alt="">
                </div>
                <div>Sans Rival Cake</div>
            </div>
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