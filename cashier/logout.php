<?php

    include('../config/constant.php');

    session_destroy();
    header('Location: '.SITENEW.'login-signup/admin-cashier-login.php');

?>