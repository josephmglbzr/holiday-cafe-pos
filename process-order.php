<?php include('config/constant.php'); 

$id = $_GET['id'];

?>
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
            
                <a href="<?php echo 'http://localhost/holiday-cafe-pos-system/menu-customer.php';?>">MENU</a>
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

    <?php
    
        $sql = "SELECT * FROM tbl_food_beverages WHERE id=$id";

                $res = mysqli_query($conn, $sql);
                $s1=1;

                if($res==TRUE){
                    $count = mysqli_num_rows($res);

                    if($count > 0){
                        
                        while($rows=mysqli_fetch_assoc($res)){

                            $product_name=$rows['name'];
                            $product_image=$rows['image'];
                            $product_code=$rows['code'];
                            $product_size=$rows['size'];
                            $product_category=$rows['prod_category'];
                            $product_price=$rows['price'];
                            $product_seasonal=$rows['prod_seasonal'];
                            $product_description=$rows['prod_description'];
                        }
                    }
                }
    ?>
   <form action="" method="POST">
        <div class="process-con">
            <div class="process-con2">
                <img src="<?php echo SITENEW; ?>img/product-food-beverages/<?php echo $product_image; ?>" alt="">
                <div><?php echo $product_name; ?></div>
                <div><?php echo $product_description; ?></div>
                <div><?php echo $product_size; ?></div>
            </div>
            
             
             <div class="prod-details">
                <div>Price :</div>
                <input id="pricing" type="number" name="pricing" value="<?php echo $product_price; ?>" readonly>

                <div class="customize-order">
                    <div>Quantity : </div>
                    <input id="for-qty" type="number" name="qty" min="1" value="1">
                    
                    <div>Sugar Level :</div>
                    <select name="sugar_level">
                        <option value="100%">100%</option>
                        <option value="75%">75%</option>
                        <option value="50%">50%</option>
                        <option value="25%">25%</option>
                        <option value="none">none</option>
                    </select>
                    <div>Extra Whipped Cream</div> 
                    <input type="radio" name="extra" value="Yes" checked> Yes
                    <input type="radio" name="extra" value="No"> No

                </div>
             </div>

           
             <div class="relative1">
                <input type="submit" name="submit5" value="Purchase">

             </div>

        </div>
   </form>

   <?php

        if(isset($_POST['submit5']))
        {
            $qty = $_POST['qty'];
            $extra = $_POST['extra'];
            $total = number_format($product_price * $qty);
            $sugar = $_POST['sugar_level'];
            $sql4 = "INSERT INTO tbl_customer_order SET
                    prod_name='$product_name',
                    prod_size='$product_size',
                    price=$product_price,
                    qty=$qty,
                    sugar_lvl='$sugar',
                    sub_total=$total,
                    extra='$extra'";            
            $res2 = mysqli_query($conn, $sql4);


            if($res2 == TRUE){
                header("Location:".SITENEW."customer-order.php");
            }
        }

    ?>
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