







<?php
include('../config/constant.php');
require_once("../config/dbcontroller.php");
$db_handle = new DBController();
if(!empty($_GET["action"])) {
switch($_GET["action"]) {
	case "add":
		if(!empty($_POST["quantity"])) {
			$productByCode = $db_handle->runQuery("SELECT * FROM tbl_food_beverages WHERE code='" . $_GET["code"] . "'");
			$itemArray = array($productByCode[0]["code"]=>array('name'=>$productByCode[0]["name"], 'code'=>$productByCode[0]["code"], 'quantity'=>$_POST["quantity"], 'price'=>$productByCode[0]["price"], 'size'=>$productByCode[0]["size"], 'image'=>$productByCode[0]["image"], 'sugar_lvl'=>$_POST["sugar_lvl"]));
			
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
							<br>
							<?php echo $item["size"];?>

						</div>
						<div class="prod-price">
							<?php echo "₱ ".$item["price"]; ?>
							<br>
							Sugar Level : <?php echo $item["sugar_lvl"]; ?>
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
	
		<input type="submit" name="submit" value="Process Order">
	</form>
		
	<?php

			if(isset($_POST['submit'])){
				$total_quantity += $item["quantity"];

				foreach ($_SESSION["cart_item"] as $item){
					
					$namef = $item["name"]; 
					$price = $item["price"];
					$sugar_lvl = $item['sugar_lvl'];

					$size = $_POST['size'];
					if($size === "Medium"){
						$total = $total_price += ($item["price"]*$item["quantity"]+20);
					}
					if($size === "Large"){
						$total = $total_price += ($item["price"]*$item["quantity"]+50);

					}
					$sql = "INSERT INTO tbl_food_order SET
							food_name='$namef',
							food_price=$price,
							qty=$total_quantity,
							total=$total,
							food_size='$size',
							sugar_lvl='$sugar_lvl'";
					$res = mysqli_query($conn, $sql);
					if($res){
						header('Location:'.SITENEW.'cashier/order.php');
					}else{
						header('Location:'.SITENEW.'cashier/index.php');

					}
				}
				
			}
			?>




			
				<div id="myModal" class="modal">

					<!-- Modal content -->
					<div class="modal-content">
						<span class="close">&times;</span>
						<?php
						foreach ($_SESSION["cart_item"] as $item){
						?>
						<div>
							<?php echo $item["name"]; ?>

						</div>
						<div><?php echo " ₱".$item["price"]; ?></div>
						<div><?php echo $item["quantity"];; ?></div>
						
						<div><?php echo " ₱". number_format($item_price,2); ?></div>
						<div ><a href="index.php?action=remove&code=<?php echo $item["code"]; ?>" class="btnRemoveAction"><img src="icon-delete.png" alt="Remove Item" /></a></div>
						<?php
						$total_quantity += $item["quantity"];
						$total_price += ($item["price"]*$item["quantity"]);
						}?>
					</div>

				</div>
		
			
			<!-- For payment method container -->  
	

				
<?php
	} else {
?>
<?php 
}
?>
</div>

<!-- For middle content -->
<div id="product-grid">
	<div class="header">
		<h2>Food and Drinks</h2>
		<div class="clock-con">
			<div id="dateDisplay"></div>

			<div id="clock"></div>
		</div>
	
	</div>
	<h3>Category</h3>
	<div class="container">
        <div class="inner">
			<a href="index.php" class="content"><div>Hot Coffees</div></a>
			<a href="cold-coffees.php" class="content"><div>Cold Coffees</div></a>
			<a href="hot-tea.php" class="content"><div>Hot Tea</div></a>
			<a href="cold-tea.php" class="content"><div>Cold Tea</div></a>
			<a href="ice-beverages.php" class="content"><div>Ice Beverages</div></a>
			<a href="hot-beverages.php" class="content"><div>Hot Beverages</div></a>
			<a href="pasta.php" class="content"><div>Pasta</div></a>
			<a href="cakes.php" class="content"><div>Cakes</div></a>
			<a href="seasonal-foods.php" class="content"><div>Seasonal Food</div></a>
			<a href="seasonal-drinks.php" class="content"><div>Seasonal Drinks</div></a>
			<a href="souvenir-decorations.php" class="content"><div>Souvenirs & Decorations</div></a>
			

		</div>
	</div>
	<h4 class="brown">Seasonal Food</h4>

	<div class="product-con">


	<?php
	$product_array = $db_handle->runQuery("SELECT * FROM tbl_food_beverages WHERE prod_category='Seasonal Food'");
	if (!empty($product_array)) { 
		foreach($product_array as $key=>$value){
	?>
		<div class="product-item">
			<form method="post" action="index.php?action=add&code=<?php echo $product_array[$key]["code"]; ?>">
				<div class="product-image"><img src="<?php echo '../img/product-food-beverages/'.$product_array[$key]["image"]; ?>"></div>
				<div class="product-tile-footer">
					<div class="product-title"><?php echo $product_array[$key]["name"];?></div>
					
					<div class="product-title"><?php echo $product_array[$key]["size"]; ?></div>

					<div class="cart-action"><input type="number" class="product-quantity" name="quantity" value="1" size="2" /></div>
					<div class="cart-action">

					<select name="sugar_lvl" id="">
						<option value="100%">100%</option>
						<option value="75%">75%</option>
						<option value="50%">50%</option>
						<option value="25%">25%</option>
					</select>

				
				
				</div>
					<input type="submit" value="Select" class="btnAddAction" />
				</div>
			</form>
		</div>
	<?php
		}
	}
	?>
	</div>
</div>
<script src="../JS/clock.js"></script>
<script src="../JS/modal.js"></script>
<script src="../JS/modal1.js"></script>
<script src="../JS/size.js"></script>
</body>
</html>