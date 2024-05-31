<?php 
    include('config/constant.php');

    $sql6 = "DELETE FROM tbl_customer_order";

    $res6 = mysqli_query($conn, $sql6);

    if($res6 == TRUE){
        header('Location:'.SITENEW.'customer-order.php');
    }
   
?>