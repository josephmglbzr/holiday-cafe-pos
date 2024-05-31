<?php include('../config/constant.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../CSS/admin.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <title>Admin Dashboard</title>


<body>
    <div id="myModal" class="modal">

        <!-- Modal content -->
        <div class="modal-content">
            <div class="ask-admin">Are you sure you want to logout?</div>
            <div class="confirmation">
                <span class="close">Cancel</span>
                <a href="logout.php">Confirm</a>
            </div>

        </div>

    </div>


    <div class="left-container">
        
        <div class="content">
            <a href="<?php echo SITENEW.'admin/dashboard.php';?>" class="abso">
                <img src="../icon/dashboard.png" alt="">
                <span>Dashboard</span>
            </a>  
        </div>  

        <div class="content">
            <a href="<?php echo SITENEW.'admin/manage-food.php';?>" class="abso">
                <img src="../icon/tray.png" alt="">
                <span>Food & Beverages</span>
            </a>

        </div>

        <div class="content">
            <a href="manage-admin.php" class="abso">
                <img src="../icon/group.png" alt="">
                <span>Manage Account</span>
            </a>
        </div>

        <div class="content">
            <a href="inventory.php" class="abso">
                <img src="../icon/inventory.png" alt="">
                <span>Inventories</span>
            </a>
        </div>

        <div class="content">
            <a href="audit-trail.php" class="abso">
                <img src="../icon/history.png" alt="">
                <span>Audit Trail</span>
            </a>
        </div>

        <div name="submit" id="myBtn" class="content">
            <div class="abso">
                <img src="../icon/logout.png" alt="">
                <span>Logout</span>
            </div>
           
        </div>
    </div>
    <div class="sales-con">
        <div class="sales-head">
            <h3>Total Revenue</h3>
            <img src="../icon/sales.png" alt="">
        </div>

        <h2>₱ 100,000.00</h2>
    </div>
        
<script src="../JS/modal.js"></script>
</body>
</html>