<?php
include('../config/constant.php');


    
    if(isset($_GET['id']) && isset($_GET['product_image'])){

        //process the deletion

        //get id and image name
        $id = $_GET['id'];
        $product_image = $_GET['product_image'];

        if($product_image != "")
        {
            //get the image path
            $path = "../img/product-food-beverages/".$product_image;

            //remove image file form folder
            $remove = unlink($path);

            //check whether image is removed
            if($remove==false)
            {

                $_SESSION['upload'] = "Failed to remove image";
                header('location:'.SITENEW.'admin/manage-food.php');

                die();

            }
        }
        //delete food from database

        $sql = "DELETE FROM tbl_food_beverages WHERE id=$id ";
        
        $res = mysqli_query($conn, $sql);

        if($res==true){

            $_SESSION['delete'] = "Food Deleted Successfully";
            header('location:'.SITENEW.'admin/manage-food.php');
        }   
        else
        {
            $_SESSION['delete'] = "Failed to Delete Food";
            header('location:'.SITENEW.'admin/manage-food.php');
        }



    }
    else
    {
        $_SESSION['unauthorized'] = "Delete Failed";
        header('location:'.SITENEW.'admin/manage-food.php');
    }

?>