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
                <a href=""><img src="img/holiday-image/holiday-logo.png" alt="" ></a>
            </div>
            <div class="menu-bar">
            
                <a href="<?php echo 'http://localhost/holiday-cafe-pos-system/menu-customer.php'; ?>">MENU</a>
                <a href="<?php echo 'http://localhost/holiday-cafe-pos-system/souvenir-customer.php'; ?>">SOUVENIR&DECORATION</a>
                <a href="<?php echo 'http://localhost/holiday-cafe-pos-system/store-customer.php'; ?>">STORE</a>
            </div>
        </div>
   
        <div class="myaccount">         
            <div class="dropdown">
                <button onclick="myFunction()" class="dropbtn profile">ACCOUNT <img src="icon/down-arrow.png" alt=""></button>
                    <div id="myDropdown" class="dropdown-content">
                        <a href="<?php echo SITENEW.'customer-profile.php'; ?>">PROFILE</a>
                        <a href="<?php echo SITENEW.'customer-order.php';?>">ORDER</a>
                        <a href="<?php echo SITENEW.'order-tracking.php';?>">STATUS</a>
                        <a href="<?php echo SITENEW.'customer-logout.php';?>">LOGOUT</a>
                </div>
            </div>
        </div>
    </div>

    <div class="menu-content">
        <h2>Souvenirs and Decorations</h2>
        <div class="all-menu">
            <div class="menu-container">
                <div class="img-con1">
                    <img src="img/all-menu/DIY egg.jpg" alt="">
                </div>
                <div>DIY Easter Egg Kit</div>
            </div>

            <div class="menu-container">
                <div class="img-con1">
                    <img src="img/all-menu/Christmas Lantern.jpg" alt="">
                </div>
                <div>Christmas Lantern</div>
            </div>

            <div class="menu-container">
                <div class="img-con1">
                    <img src="img/all-menu/Parol.webp" alt="">
                </div>
                <div>Christmas Parol</div>
            </div>

            <div class="menu-container">
                <div class="img-con1">
                    <img src="img/all-menu/Maple light.jpg" alt="">
                </div>
                <div>Maple Light Tree</div>
            </div>

            <div class="menu-container">
                <div class="img-con1">
                    <img src="img/all-menu/Pumpkin Light.jpg" alt="">
                </div>
                <div>Pumpkin with Light</div>
            </div>

            <div class="menu-container">
                <div class="img-con1">
                    <img src="img/all-menu/homemade-gingerbread-house.jpg" alt="">
                </div>
                <div>Ginger Bread House</div>
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
<script>
        /* When the user clicks on the button,
toggle between hiding and showing the dropdown content */
function myFunction() {
  document.getElementById("myDropdown").classList.toggle("show");
}

// Close the dropdown menu if the user clicks outside of it
window.onclick = function(event) {
  if (!event.target.matches('.dropbtn')) {
    var dropdowns = document.getElementsByClassName("dropdown-content");
    var i;
    for (i = 0; i < dropdowns.length; i++) {
      var openDropdown = dropdowns[i];
      if (openDropdown.classList.contains('show')) {
        openDropdown.classList.remove('show');
      }
    }
  }
}
</script>
</body>
</html>