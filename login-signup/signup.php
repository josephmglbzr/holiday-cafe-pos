<?php include('../config/constant.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../CSS/signup.css">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
  
    <script src="https://www.google.com/recaptcha/api.js"></script> 
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/intl-tel-input@21.0.6/build/css/intlTelInput.css">

    
    <title>Holiday Cafe and Souvenir Shop</title>
</head>
<body>
    
    <form action="" method="POST">
        <span>Create the following</span>
        <fieldset>
        <legend>Full Name</legend>
            <input type="text" id="usrname" name="full_name" required>
        </fieldset>
        <fieldset>
        <legend>Username</legend>
            <input type="text" id="usrname" name="username" required>
        </fieldset>

        <fieldset>
            <legend>Password</legend>
            <input type="password" id="psw" name="password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" required>

        </fieldset>
        <div id="message">
            <h3>Password must contain the following:</h3>
            <p id="letter" class="invalid">A <b>lowercase</b> letter</p>
            <p id="capital" class="invalid">A <b>capital (uppercase)</b> letter</p>
            <p id="number" class="invalid">A <b>number</b></p>
            <p id="length" class="invalid">Minimum <b>8 characters</b></p>
         </div>
         <div id="age-gender">
            <div class="age-gender2">
                <label>Gender</label>
                <select name="gender" required>
                    <option value="Male">Male</option>
                    <option value="Female">Female</option>
                </select>

            </div>
            <div class="age-gender2">
                <label>Birthday</label>
                <input type="date" name="birthday" required>
                

            </div>
         </div>
         <div id="address">
            <fieldset>
                <legend>Address</legend>
                <input type="text" name="address" required>
            </fieldset>
         </div>

         <!-- Add country code for phone number -->
        <fieldset>
            <legend>Phone No</legend>
            <input type="text" name="phone_no" id="phone">

        </fieldset>
        <script src="https://cdn.jsdelivr.net/npm/intl-tel-input@21.0.6/build/js/intlTelInput.min.js"></script>
        <script>
            const input = document.querySelector("#phone");
                window.intlTelInput(input, {
                utilsScript: "https://cdn.jsdelivr.net/npm/intl-tel-input@21.0.6/build/js/utils.js",
            });
        </script>
         <div class="g-recaptcha" data-sitekey="6Ld-EK8pAAAAAOMDj6ScGTz3jUdJKrdQZJWSUPnW"></div>




        <div class="submit">
            <input type="submit" name="submit" value="Continue">

        </div>
    </form>

<script src="../JS/password-validate.js">

</script>
   
      
</body>
</html>
<?php


    if(isset($_POST['submit'])){
        
        $full_name = $_POST['full_name'];
        $username = $_POST['username'];
        $password =  mysqli_real_escape_string($conn, (md5($_POST['password']))) ;
        $gender = $_POST['gender'];
        $birthday = $_POST['birthday'];
        $address = $_POST['address'];
        $phone_no = $_POST['phone_no'];

        $sql = "INSERT INTO tbl_sign_up SET
        full_name='$full_name',
        username='$username',
        password='$password',
        gender='$gender',
        birthday='$birthday',
        address='$address',
        phone_no='$phone_no'
        ";

        $res = mysqli_query($conn, $sql) or die(mysqli_error($conn));

        if($res == TRUE){
            header('Location:'.SITENEW.'login-signup/login.php');
        }
        else{
            echo "Unable to connect";
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
            header('Location:'.SITENEW.'login-signup/login.php');
        }
        else {
            $_SESSION['click_mssg'] = '<div class="message">Please click on the reCAPTCHA box.</div>';
        }
    }

    }


?>



