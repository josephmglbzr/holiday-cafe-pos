<?php 
    include('config/constant.php'); 

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




<!-- The Modal -->
<div id="myModal" class="modal">

  <!-- Modal content -->
  <div class="modal-content">
    <span class="close">&times;</span>
    <div class="receipt-con">
        <img src="img/holiday-image/holiday-logo.png" alt="">
        <span>Cainta Rizal</span>
        <span>www.holiday-cafe-souvenir-shop.com</span>
        <div id="long-border"></div>
        
        <?php
            $sql = "SELECT * FROM tbl_customer_order";

            $res = mysqli_query($conn, $sql);

            if($res==TRUE){
                $count = mysqli_num_rows($res);

                if($count >= 0){
                    $totalPrice = 0;

                    while($rows=mysqli_fetch_assoc($res)){
                        $product = $rows['prod_name'];
                        $price = $rows['price'];
                        $quantity = $rows['qty'];
                        $sugar_level = $rows['sugar_lvl'];
                        $extra = $rows['extra'];
                        $sub_total = $rows['sub_total'];

                        $totalPrice += $sub_total;    
                        ?>
                            <div class="flex1">
                                <div><?php echo $product; ?></div>
                                <div><?php echo 'x'.$quantity; ?></div>
                                <div><?php echo "₱ ".number_format($price, 2); ?></div>
                            </div>
                        <?php
                    }
                }
            }
            ?>
        <div id="long-border"></div>
        <div class="flex1">
            <h4>Change Due</h4>
            <div><?php echo "₱ ".number_format('0', 2);?></div>
        </div>
        <div class="flex1">
            <h3>Total</h3>
            <div><?php echo "₱ ".number_format($totalPrice, 2);?></div>
        </div>
        <div id="long-border"></div>
            <div>Thank You!!!</div>
        <div id="long-border"></div>
        <p id="date-time"></p>


        
    
       
    </div>
  </div>

</div>
   
  
    <div class="customer-order">
            <?php
                if(isset($_SESSION['tracking'])){
                    echo $_SESSION['tracking'];
                    unset($_SESSION['tracking']);
                }
            ?>

        <div id="customer-header">
            <div class="processing">
                <div><strong>Order Status : </strong></div>

                <div style="margin-left: .5rem;">
                <?php 
                    if(isset($_SESSION['pending'])){
                        echo $_SESSION['pending'];
                        
                    }
                ?>
                </div>
                  
            </div>
            

            <div class="last-header">
               
                <button id="myBtn">My Receipt</button>
                <a href="<?php echo SITENEW.'cancel-order.php'; ?>">Cancel My Order</a>
               
            </div>

        </div>
        
        <table>
            <tr>
                <th>Product Name</th>
                <th>Price</th>
                <th>Quantity</th>
                <th>Sugar Level</th>
                <th>Extra Whipped Cream</th>
                <th>Sub Total</th>
            </tr>

            <?php
            $sql = "SELECT * FROM tbl_customer_order";

            $res = mysqli_query($conn, $sql);

            if($res==TRUE){
                $count = mysqli_num_rows($res);

                if($count >= 0){
                    $totalPrice = 0;

                    while($rows=mysqli_fetch_assoc($res)){
                        $product = $rows['prod_name'];
                        $price = $rows['price'];
                        $quantity = $rows['qty'];
                        $sugar_level = $rows['sugar_lvl'];
                        $extra = $rows['extra'];
                        $sub_total = $rows['sub_total'];

                        
                        $totalPrice += $sub_total;
                        ?>
                 
                            <tr>
                                <td><?php echo $product; ?></td>
                                <td><?php echo "₱ ".number_format($price, 2); ?></td>
                                <td><?php echo $quantity; ?></td>
                                <td><?php echo $sugar_level; ?></td>
                                <td><?php echo $extra; ?></td>
                                <td><?php echo "₱ ".number_format($sub_total, 2); ?></td>

                            </tr>
                        <?php

                    }

                }
            }

            ?>
           
        </table>
            
        
        <div id="long-border"></div>
        <div class="mode">
            <h4>Total</h4>
         
            <div><?php echo "₱ ".number_format($totalPrice, 2); ?></div>
        </div>
        <div id="long-border"></div>

        <form action="" method="POST">
            <h3>Provide your details below</h3>
            <label for="Full Name">Full Name</label>
            <input type="text" name="full_name" required>

            <label for="Address">Address</label>
            <input type="text" name="address" required >

            <label for="Address">Phone No</label>
            <input type="number" name="phone" required>

            <label for="Way">Pick up or Delivery?</label>
            <select name="mode" id="">
                <option value="Pick up">Pick up</option>
                <option value="Delivery">Delivery</option>
            </select>

            <label for="">Payment Method</label>
            <select name="payment" id="">
                <option value="Cash">Cash</option>
                <option value="E-wallet">E-wallet</option>
            </select>

            <label for="">Amount of Money</label>
            <input type="number">

            <label for="Comment">Comment</label>
            <textarea name="comment" id=""></textarea>
            
            <input type="submit" name="submit" id="submit1" value="Purchase">
        </form>
    </div>
<?php
    if(isset($_POST['submit'])){
        $full_name = $_POST['full_name'];
        $address = $_POST['address'];
        $phone = $_POST['phone'];
        $mode = $_POST['mode'];
        $payment = $_POST['payment'];
        $comment = $_POST['comment'];

        $sql3 = "INSERT INTO tbl_customer_purchased SET
                full_name='$full_name',
                address='$address',
                phone_no=$phone,
                pick_deliver='$mode',
                payment='$payment',
                comment='$comment'";
        
        $res3 = mysqli_query($conn, $sql3);

        if($res3 == TRUE){
            $_SESSION['pending'] = "Processing";
            
            if($mode === "Delivery"){
                echo "<div class='tracking-con'>
                        <h2>Order Successfully Made</h2>
                        <p>Please proceed to status to track your order</p>
                        <a href='order-tracking.php'>Track my Order</a>
                      </div>";
            }else{
                echo "<div class='tracking-con'>
                        <h4>Please go to your specified location to pick up your order!</h4>
                    </div>";
            }
              
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
	 var now = new Date();

	// Format the date and time
	var date = now.toDateString();
	var time = now.toLocaleTimeString();

	// Display the date and time
	document.getElementById('date-time').innerHTML = date + ' ' + time;

</script>
	


<script>


    // Get the modal
var modal = document.getElementById("myModal");

// Get the button that opens the modal
var btn = document.getElementById("myBtn");

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks on the button, open the modal
btn.onclick = function() {
  modal.style.display = "block";
}

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
  modal.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
}
</script>



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