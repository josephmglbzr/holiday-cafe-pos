<?php include('../partials/header.php'); ?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Holiday Cafe Reset Password</title>

</head>
<div class="forgot-con">
    
    <form action="" method="POST">
        <h2>Reset your password</h2>
        <fieldset>
            <legend>Enter your username</legend>
            <input type="text" name="username">
        </fieldset>

        
        <fieldset>
            <legend>Enter your old password</legend>
            <input type="password" name="old_pass" id="myInput">
        </fieldset>

         
        <fieldset>
            <legend>Enter your new password</legend>
            <input type="password" name="new_pass" id="myInput">
        </fieldset>

             
        <fieldset>
            <legend>Re-enter your new password</legend>
            <input type="password" name="re_enter_pass" id="myInput">
        </fieldset>
        <div class="input-res">
            <input type="submit" name="submit" value="Reset Password">

        </div>
    </form>
</div>
<script src="password-validate"></script>
</body>
</html>
<?php 

    if(isset($_POST['submit']))
    {
      
        $username = md5($_POST['username']);
        $password =  mysqli_real_escape_string($conn, (md5($_POST['password']))) ;


        $sql = "UPDATE tbl_sign_up SET
        password='$password' 
        WHERE username='$username'";

        $res = mysqli_query($conn, $sql) or die(mysqli_error($conn));
        
        if($res == TRUE){
            
            $_SESSION['update-password'] = "Password Updated Successfully";
            header('Location:'.SITENEW.'login-signup/login.php');

        }else{
            $_SESSION['update-password'] = "Failed to Update Password";
        }
    }




?>
<?php include('../partials/footer.php'); ?>
