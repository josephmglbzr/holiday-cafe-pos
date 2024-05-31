







<?php
include('../config/constant.php');
require_once("../config/dbcontroller.php");
$db_handle = new DBController();
if(!empty($_GET["action"])) {
switch($_GET["action"]) {
	case "add":
		if(!empty($_POST["quantity"])) {
			$productByCode = $db_handle->runQuery("SELECT * FROM tbl_food_beverages WHERE code='" . $_GET["code"] . "'");
			$itemArray = array($productByCode[0]["code"]=>array('name'=>$productByCode[0]["name"], 'code'=>$productByCode[0]["code"], 'quantity'=>$_POST["quantity"], 'change_due'=>$productByCode[0]["change_due"], 'discount_rate'=>$productByCode[0]["discount_rate"], 'price'=>$productByCode[0]["price"], 'image'=>$productByCode[0]["image"]));
			
			if(!empty($_SESSION["cart_item"])) {
				if(in_array($productByCode[0]["code"],array_keys($_SESSION["cart_item"]))) {
					foreach($_SESSION["cart_item"] as $k => $v) {
							if($productByCode[0]["code"] == $k) {
								if(empty($_SESSION["cart_item"][$k]["quantity"])) {
									$_SESSION["cart_item"][$k]["quantity"] = 0;
								}
								$_SESSION["cart_item"][$k]["quantity"] += $_POST["quantity"];
							}
					}
				} else {
					$_SESSION["cart_item"] = array_merge($_SESSION["cart_item"],$itemArray);
				}
			} else {
				$_SESSION["cart_item"] = $itemArray;
			}
		}
	break;
	case "remove":
		if(!empty($_SESSION["cart_item"])) {
			foreach($_SESSION["cart_item"] as $k => $v) {
					if($_GET["code"] == $k)
						unset($_SESSION["cart_item"][$k]);				
					if(empty($_SESSION["cart_item"]))
						unset($_SESSION["cart_item"]);
			}
		}
	break;
	case "empty":
		unset($_SESSION["cart_item"]);
	break;	
}
}
?>
<html>
	<head>
		<title>Holiday Cafe and Souvenir Shop Point of Sale</title>
		<link rel="stylesheet" href="../CSS/cashier.css">
		<link rel="preconnect" href="https://fonts.googleapis.com">
		<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
		<link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">


		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

	</head>
<body>

<div id="myModal1" class="modal1">

	<!-- Modal Content and for Logout Button -->
	<div class="modal-content1">
		<span>Are you sure you want to logout?</span>
		<div class="modal-flex1">
			<span class="close1">Cancel</span>
			<a href="logout.php">Confirm</a>
		</div>
		
	</div>

</div>

<div class="left-container">
	<div class="logo-container">
		<img src="../img/holiday-image/holiday-logo.png" alt="">
	</div>

	<div class="left-content">
		<a href="index.php">
			<img src="../icon/dashboard.png" alt="">
			<span>Dashboard</span>
		</a>
		<a href="online-order.php">
			<img src="../icon/transaction.png" alt="">
			<span>Online Order</span>
		</a>
		<a href="">
			<img src="../icon/tray.png" alt="">
			<span>Order</span>
		</a>
		<a href="cashier-history.php">
			<img src="../icon/history.png" alt="">
			<span>History</span>
		</a>
	
	</div>

	<div id="myBtn1">
		<img src="../icon/logout.png" alt="">
		<span>Logout</span>
	</div>
		

	
</div>


<!-- Add to cart container right side -->
<div id="shopping-cart">
	<div class="header-cart">
		<h3>Current Order</h3>
		<a id="btnEmpty" href="index.php?action=empty">Clear All</a>
	</div>
	

	<?php
	
	if(isset($_SESSION["cart_item"])){
	$total_quantity = 0;
	$total_price = 0;
	?>	

	<div class="select-con">
	<?php		
		foreach ($_SESSION["cart_item"] as $item){
			$item_price = $item["quantity"]*$item["price"];
			?>

				<form action="" method="POST">
				<div class="current-select">

					<div class="img-con">
						<img src="<?php echo '../img/product-food-beverages/'.$item["image"]; ?>" class="cart-item-image" />
					</div>
					
					<div class="container1">
						<div class="prod-name">
							<?php echo $item["name"]; ?>
						

						</div>
						<div class="prod-price">
							<?php echo " ₱".$item["price"]; ?>
						</div>

					</div>				

					<div class="del-quan">
						<a href="index.php?action=remove&code=<?php echo $item["code"]; ?>" class="btnRemoveAction"><img src="../icon/delete.png" alt="Remove Item" /></a>
						<div class="quantity">
							X <?php echo $item["quantity"]; ?>
						</div>
					</div>

				</div>		
					<?php
					$total_quantity += $item["quantity"];
					$total_price += ($item["price"]*$item["quantity"]);
			}
			?>	
			
	</div>	
	
	</form>
	<div class="change-con">
		<form action="" method="POST">
			<h4>Discount</h4>
			<select name="discount_rate" id="">
				<option value="0%">0%</option>
				<option value="20%">Senior Citizen 20%</option>
				<option value="5%">PWD 5%</option>
			</select>
			<br>
			<h4>Change Due</h4>

			<input type="number" name="change_due" value="0" min="0">
			<input type="submit" value="Submit" id="submit-change">
		</form>
		<?php

			if(isset($_POST['submit'])){
				$change_due = $_POST['change_due'];
				$discount = $_POST['discount_rate'];
				$sql2 = "INSERT INTO tbl_food_beverages SET
						change_due=$change_due,
						discount_rate='$discount'";

				$res2 = mysqli_query($conn, $sql2);

			}

		?>
	</div>

	<button name='submit1' id='myBtn'>Generate Receipt</button>

			
				<div id="myModal" class="modal">

					<!-- Modal content -->
					<div class="modal-content">
						<div class="pdf-content">

						<img src="../img/holiday-image/holiday-logo.png" alt="">
						<div>Cainta Rizal</div>
						<div style="text-align: center;">www.holiday-cafe-souvenir-shop.com</div>
						<div>--------------------------------</div>
						<table id="receipt-tbl">

							<?php
							$total_quantity = 0;
							$total_price = 0;
							foreach ($_SESSION["cart_item"] as $item){
								$size = $item['size'];

								$item_price = $item["quantity"]*$item["price"];

							?>
							<tr class="tr-receipt">
								<td  class="td-receipt">

									<?php echo $item["name"]; ?>
									<?php echo $item["size"]; ?>
									<?php echo 'x'.$item["quantity"]; ?>
								</td>
								<td class="td-receipt">
									<?php echo " ₱".number_format($item["price"], 2); ?>
								</td>

							</tr>
							
							<div></div>
							<div></div>
							
							<?php
							$total_quantity += $item["quantity"];
							$total_price += ($item["price"]*$item["quantity"]);
							

							}?>
							
							<tr class="tr-receipt">
								<td class="td-receipt">Quantity</td>
								<td class="td-receipt">
									<?php echo 'x'.$total_quantity; ?>
								</td>
							</tr>

							<tr class="tr-receipt">
								<td class="td-receipt">Discount</td>
								<td class="td-receipt">
									<?php echo $_POST['discount_rate']; ?>
								</td>
							</tr>

							<tr class="tr-receipt">
								<td class="td-receipt">Change Due</td>
								<td class="td-receipt">
									<?php echo " ₱" .number_format($_POST['change_due'], 2); ?>
								</td>
							</tr>

							<tr class="tr-receipt">
								<td class="td-receipt">
									<h3>Total</h3>
								</td>
								<td class="td-receipt">
									<?php echo " ₱" .number_format($total_price, 2); ?>

								</td>
							</tr>

						</table>
						<div>--------------------------------</div>
						<h3>Thank You!</h3>
						<div>--------------------------------</div>
						<p id="date-time"></p>
						<div class="print-con">
							<span class="close">Cancel</span>
							<button onclick="window.print();" class="btn btn-primary" id="print-btn">Print</button>

						</div>
							
							
						</div>
						
					</div>

						
				</div>

		

			
	

				
<?php
	} else {
?>
<?php 
}
?>
</div>

<!-- For middle content -->
<div class="container2">
	<div class="head-con2">
		<h2>Order Confirmation</h2>
		<form action="" method="POST">
			<button name="clear-all">Clear All</button>

		</form>
	</div>

	<?php

		if(isset($_POST['clear-all'])){
			
			$sql4 = "DELETE FROM tbl_food_order";

			$res4 = mysqli_query($conn, $sql4);

		
		}

	?>


    <table class="tbl-order">
        <tr>
            <th>Id</th>
            <th>Product Name</th>
            <th>Size</th>
            <th>Sugar Level</th>
            <th>Price</th>
            <th>Qty</th>
            <th>Date</th>
        </tr>
        <?php
            $sql = "SELECT * FROM tbl_food_order";
            $res = mysqli_query($conn, $sql);
            $s1 = 1;

            if($res == TRUE){
                $count = mysqli_num_rows($res);
                if($count > 0){
                    while($rows=mysqli_fetch_assoc($res)){
                        $id=$rows['id'];
                        $name=$rows['food_name'];
                        $size=$rows['food_size'];
                        $price=$rows['food_price'];
                        $qty=$rows['qty'];
                        $sugar_level=$rows['sugar_lvl'];
                        $date=$rows['date'];
                        ?>
                        
                        <tr>
                            <td><?php echo $s1++; ?></td>
                            <td><?php echo $name; ?></td>
                            <td><?php echo $size; ?></td>
                            <td><?php echo $sugar_level; ?></td>
                            <td><?php echo " ₱" .$price; ?></td>
                            <td><?php echo $qty; ?></td>
                            <td><?php echo $date; ?></td>
                        </tr>
                        
                        <?php

                    }
                }
            }
        ?>


    </table>
</div>
<script>
	 var now = new Date();

	// Format the date and time
	var date = now.toDateString();
	var time = now.toLocaleTimeString();

	// Display the date and time
	document.getElementById('date-time').innerHTML = date + ' ' + time;

</script>
	

<script>
	var buttonElement = document.querySelector("#btn-generate");
	buttonElement.addEventListener('click', function() {
		var pdfContent = document.querySelector("#pdf-content");
		html2pdf().from(pdfContent).save();
	});



</script>

<script src="../JS/clock.js"></script>
<script src="../JS/modal.js"></script>
<script src="../JS/modal1.js"></script>
<script src="../JS/size.js"></script>
</body>
</html>