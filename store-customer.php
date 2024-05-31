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
        <h2>Find a store</h2>
        <div>try to find a nearby store from your location</div>
        <div id="map">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d61777.87685722017!2d121.08194093774735!3d14.592391003282202!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3397b87f701edd6b%3A0xe1c1fe496d818869!2sCainta%2C%201900%20Rizal!5e0!3m2!1sen!2sph!4v1715133444111!5m2!1sen!2sph" width="800" height="600" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
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