<?php include('../partials/header.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Holiday Cafe Login</title>

</head>
<body>

    <section class="section-log">
  
        <form action="" method="POST">
            <div class="sec-img">
                <img src="../img/holiday-image/holiday-logo.png" alt="">
            </div>
            <div class="login-con">
                <input type="text" name="username" placeholder="Username" required>
                <img src="../icon/user.png" alt="">
            </div>
            <div class="login-con">
                <input type="password" name="password" placeholder="Password" id="myInput" required>
                <img src="../icon/password.png" alt="" onclick="myFunction()">
            </div>
            <?php

                if(isset($_SESSION['invalid-admin'])){
                    echo $_SESSION['invalid-admin'];
                    unset($_SESSION['invalid-admin']);
                }


            ?>
            <div class="login-con3">
                <input type="submit" name="submit" value="Login">
             
            </div>
            <br>
        </form>
    </section>
<script src="../JS/login-script.js"></script>
</body>
</html>
<?php

    if(isset($_POST['submit'])){

        $username = $_POST['username'];
        $password =  mysqli_real_escape_string($conn, (md5($_POST['password']))) ;


        $sql = "SELECT * FROM tbl_add_admin WHERE position='Cashier' AND username='$username' AND password='$password'";
        $res = mysqli_query($conn, $sql);
        $count = mysqli_num_rows($res);

        if($count == TRUE){
            header('Location:'.SITENEW.'cashier/index.php');
        }else{
            $_SESSION['invalid-admin'] = 'Invalid Username or Password';
            header('Location:'.SITENEW.'login-signup/admin-cashier-login.php');

        }

        $sql2 = "SELECT * FROM tbl_add_admin WHERE position='Admin' AND username='$username' AND password='$password'";
        $res2 = mysqli_query($conn, $sql2);
        $count2 = mysqli_num_rows($res2);

        if($count2 == TRUE){
            header('Location:'.SITENEW.'admin/dashboard.php');
        }else{
            $_SESSION['invalid-admin'] = '<div class="admin-error-msg">Invalid Username or Password</div>';

        }
        
    }
        
     
        



    

    


?>
<?php include('../partials/footer.php'); ?>
