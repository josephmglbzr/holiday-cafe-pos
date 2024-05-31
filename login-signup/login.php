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
        <?php
        $sql = "SELECT * FROM tbl_sign_up";

        $res = mysqli_query($conn, $sql);
        $s1=1;

        if($res==TRUE){
            $count = mysqli_num_rows($res);

            if($count > 0){
            
            while($rows=mysqli_fetch_assoc($res)){

                $id=$rows['id'];
            }
            }else{

            }
        }
        ?>
        <form action="" method="POST">
            <?php
                if(isset($_SESSION['update-password'])){
                    echo $_SESSION['update-password'];
                    unset($_SESSION['update-password']);
                }
            ?>
            <div class="login-con">
                <input type="text" name="username" placeholder="Username" required>
                <img src="../icon/user.png" alt="">
            </div>
            <div class="login-con">
                <input type="password" name="password" placeholder="Password" id="myInput" required>
                <img src="../icon/password.png" alt="" onclick="myFunction()">
            </div>

            <?php
                if(isset($_SESSION['invalid-acc'])){
                    echo $_SESSION['invalid-acc'];
                    unset($_SESSION['invalid-acc']);
                }
            ?>
                
            <div class="forgot-pass">
                <a href="<?php echo SITENEW.'login-signup/forgot-pass.php'?>">Forgot Password?</a>
            </div>
        
            <!-- For recaptcha box -->
            <div class="g-recaptcha" data-sitekey="6Ld-EK8pAAAAAOMDj6ScGTz3jUdJKrdQZJWSUPnW"></div>

            <?php 

                if(isset($_SESSION['click_mssg'])){
                    echo $_SESSION['click_mssg'];
                    unset($_SESSION['click_mssg']);
                }
            ?>

            <div class="login-con3">
                <input type="submit" name="submit" value="Login">
                <span>or</span>
                <a href="<?php echo SITENEW.'API/google-oauth.php'; ?>" class="login-con4">
                    <img src="../icon/google1.png" alt="">
                    <span>Sign in with Google</span>
                </a>
            </div>
        </form>
    </section>
<script src="../JS/login-script.js"></script>
</body>
</html>
<?php

    if(isset($_POST['submit'])){

        $username = $_POST['username'];
        $password =  mysqli_real_escape_string($conn, (md5($_POST['password']))) ;


        $sql = "SELECT * FROM tbl_sign_up WHERE username='$username' AND password='$password'";

        $res = mysqli_query($conn, $sql);
        $count = mysqli_num_rows($res);

        if($count==TRUE){
            header('Location:'.SITENEW.'menu-customer.php');
        }
        else{
            $_SESSION['invalid-acc'] = "<div class='invalid'>Invalid Username or Password</div>";
            header('Location:'.SITENEW.'login-signup/login.php');

        }
    }
        
     
        


        if(isset($_POST['g-recaptcha-response'])) {
        // RECAPTCHA SETTINGS
        $captcha = $_POST['g-recaptcha-response'];
        $ip = $_SERVER['REMOTE_ADDR'];
        $key = '6Ld-EK8pAAAAAIFHahU6KyuXsQZUPGKQr9BwK3oK';
        $url = 'https://www.google.com/recaptcha/api/siteverify';

        // RECAPTCH RESPONSE
        $recaptcha_response = file_get_contents($url.'?secret='.$key.'&response='.$captcha.'&remoteip='.$ip);
        $data = json_decode($recaptcha_response);

        if(isset($data->success) &&  $data->success === true) {
          
        }
        else {
            $_SESSION['click_mssg'] = '<div class="message">Please click on the reCAPTCHA box.</div>';
        }
    }

    


?>
<?php include('../partials/footer.php'); ?>
