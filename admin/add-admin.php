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
</head>
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
            <a href="" class="abso">
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
            <a href="" class="abso">
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

<script src="../JS/modal.js"></script>

    </div>

    <div class="mid-container">
        <div class="form-con">
            <form action="" method="POST">
                <fieldset>
                    <legend>Full Name</legend>
                    <input type="text" name="full_name">
                </fieldset>

                    <label>Position</label>
                    <select name="position" id="">
                        <option value="Admin">Admin</option>
                        <option value="Cashier">Cashier</option>
                    </select>

                <fieldset>
                    <legend>Department</legend>
                    <input type="text" name="department">
                </fieldset>
                <fieldset>
                    <legend>Username</legend>
                    <input type="text" name="username">
                </fieldset>
                <fieldset>
                    <legend>Password</legend>
                    <input type="password" name="password" id="myInput" required>
                    
                </fieldset>
                
                <div class="login-con2">
                    <input type="checkbox" onclick="myFunction()">
                    <div>Show Password</div>
                </div>  

                <input type="submit" name="submit" value="Confirm" id="submit">
            </form>
        </div>
        
    </div>
    <script src="../JS/login-script.js"></script>
</body>
</html>
<?php

    if(isset($_POST['submit']))
    {
        $full_name = $_POST['full_name'];
        $position = $_POST['position'];
        $department = $_POST['department'];
        $username = $_POST['username'];
        $password =  mysqli_real_escape_string($conn, (md5($_POST['password']))) ;


        $sql = "INSERT INTO tbl_add_admin SET
        full_name='$full_name',
        position='$position',
        department='$department',
        username='$username',   
        password='$password'";

        $res = mysqli_query($conn, $sql) or die(mysqli_error($conn));
        
        if($res == TRUE){
            
            $_SESSION['add-admin'] = "Admin Added Successfully";
            header('Location:'.SITENEW.'admin/manage-admin.php');

        }else{
            $_SESSION['add-admin'] = "Failed to Add Admin";
        }
    }


?>