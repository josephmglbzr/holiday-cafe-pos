<?php include('../config/constant.php');?>
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
        <a href="<?php echo SITENEW.'admin/logout.php'; ?>">Confirm</a>
    </div>

</div>

</div>
    <div class="left-container">

        <div class="content">
            <a href="<?php echo SITENEW.'admin/dashboard.php'; ?>" class="abso">
                <img src="../icon/dashboard.png" alt="">
                <span>Dashboard</span>
            </a>  
        </div>  

        <div class="content">
            <a href="<?php echo SITENEW.'admin/manage-food.php'; ?>" class="abso">
                <img src="../icon/tray.png" alt="">
                <span>Food & Beverages</span>
            </a>

        </div>

        <div class="content">
            <a href="" class="abso">
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

<script src="../JS/modal.js"></script>

    </div>
    
    <div class="mid-container">
        <h2>Manage Admin</h1>
        
        <?php

            if(isset($_SESSION['add-admin'])){
                echo $_SESSION['add-admin'];
                unset($_SESSION['add-admin']);
            }
            if(isset($_SESSION['delete-admin'])){
                echo $_SESSION['delete-admin'];
                unset($_SESSION['delete-admin']);
            } 
            if(isset($_SESSION['update-admin'])){
                echo $_SESSION['update-admin'];
                unset($_SESSION['update-admin']);
            }


        ?>
        <a href="add-admin.php" class="add-admin"><img src="../icon/plus.png" alt="">Add Admin</a>
        <table>
            <tr>
                <th>Id</th>
                <th>Full Name</th>
                <th>Position</th>
                <th>Department</th>
                <th colspan="2">Actions</th>
            </tr>
            <?php
                            $sql = "SELECT * FROM tbl_add_admin";

                            $res = mysqli_query($conn, $sql);
                            $s1=1;

                            if($res==TRUE){
                                $count = mysqli_num_rows($res);

                                if($count > 0){
                                    
                                    while($rows=mysqli_fetch_assoc($res)){

                                        $id=$rows['id'];
                                        $full_name=$rows['full_name'];
                                        $username=$rows['username'];
                                        $position=$rows['position'];
                                        $department=$rows['department'];
                                        

                                        ?>
                                        <tr>
                                            <td><?php echo $s1++; ?></td>
                                            <td><?php echo $full_name; ?></td>
                                            <td><?php echo $position; ?></td>
                                            <td><?php echo $department; ?></td>
                                            <td>
                                                <a href="<?php echo SITENEW; ?>admin/update-admin.php?id=<?php echo $id; ?>" class="btn-secondary"><img src="../icon/edit.png" alt=""></a>
                                                <a href="<?php echo SITENEW; ?>admin/delete-admin.php?id=<?php echo $id; ?>" class="btn-delete"><img src="../icon/delete.png" alt=""></a>

                                            </td>
                                        </tr>
                                        <?php
                                    }
                          


                                }
            
                            }
                        ?>
        </table>
    </div>

</body>
</html>