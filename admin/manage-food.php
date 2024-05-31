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
    
    <div class="manage-food">
        <h2>Food and Beverages</h2>
        <?php

            if(isset($_SESSION['food-added'])){
                echo $_SESSION['food-added'];
                unset($_SESSION['food-added']);
            }

            if(isset($_SESSION['upload'])){
                echo $_SESSION['upload'];
                unset($_SESSION['upload']);

            }
                 
            if(isset($_SESSION['delete'])){
                echo $_SESSION['delete'];
                unset($_SESSION['delete']);

            }
            if(isset($_SESSION['update-food'])){
                echo $_SESSION['update-food'];
                unset($_SESSION['update-food']);

            }
        ?>
        <br>
        <div class="add-btn">
            <a href="<?php echo SITENEW.'admin/add-food.php'?>"><img src="../icon/plus.png" alt=""> Add</a> 
        </div>
       
        <table>
            <tr>
                <th>Id</th>
                <th>Prod Name</th>
                <th>Image</th>
                <th>Size</th>
                <th>Category</th>
                <th>Seasonal</th>
                <th>Price</th>
                <th>Description</th>
                <th>Actions</th>
            </tr>

            <?php
                $sql = "SELECT * FROM tbl_food_beverages";

                $res = mysqli_query($conn, $sql);
                $s1=1;

                if($res==TRUE){
                    $count = mysqli_num_rows($res);

                    if($count > 0){
                        
                        while($rows=mysqli_fetch_assoc($res)){

                            $id=$rows['id'];
                            $product_name=$rows['name'];
                            $product_image=$rows['image'];
                            $product_code=$rows['code'];
                            $product_size=$rows['size'];
                            $product_category=$rows['prod_category'];
                            $product_price=$rows['price'];
                            $product_seasonal=$rows['prod_seasonal'];
                            $product_description=$rows['prod_description'];
                            

                            ?>
                            <tr>
                                <td><?php echo $s1++; ?></td>
                                <td><?php echo $product_name; ?></td>
                                <td>
                                    <?php
                                        if($product_image == ''){
                                            echo "Image is not available";
                                        }
                                        else{
                                            ?>   
                                                <img src="<?php echo SITENEW; ?>img/product-food-beverages/<?php echo $product_image; ?>" width="50">
                                            <?php
                                        }

                                    ?>
                                </td>
                                <td><?php echo $product_size; ?></td>
                                
                                <td><?php echo $product_category; ?></td>
                                <td><?php echo $product_seasonal; ?></td>
                                <td>₱<?php echo $product_price; ?></td>
                                <td><?php echo $product_description; ?></td>
                                <td colspan="2">
                                    <div class="delete-item">
                                        <a href="<?php echo SITENEW; ?>admin/delete-food.php?id=<?php echo $id; ?>&product_image=<?php echo $product_image; ?>" class="btn-del"><img src="../icon/delete.png" alt=""></a> 
                                    </div>
                                   
                                </td>
                            </tr>
                            <?php
                        }
                


                    }

                }
            ?>
        </table>
    </div>


<script src="../JS/modal.js"></script>
</body>
</html>