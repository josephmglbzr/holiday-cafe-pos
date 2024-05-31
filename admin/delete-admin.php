<?php
    include('../config/constant.php');

    $id = $_GET['id'];


    $sql = "DELETE FROM tbl_add_admin WHERE id=$id";
    $res = mysqli_query($conn, $sql);

    if($res==TRUE){
        $_SESSION['delete-admin'] = "Admin Deleted Successfully";
        header('location:'.SITENEW.'admin/manage-admin.php');
    }
    
?>