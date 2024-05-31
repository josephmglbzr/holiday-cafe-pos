<?php

    session_start();

    define('SITENEW', 'http://localhost/holiday-cafe-pos-system/');
    define('LOCALHOST', 'localhost');
    define('DB_USERNAME', 'root');
    define('DB_PASSWORD', '');
    define('DB_NAME', 'holiday_cafe');

    $conn = mysqli_connect(LOCALHOST, DB_USERNAME, DB_PASSWORD) or die(mysqli_error($conn)); //establish connection
    $db_select = mysqli_select_db($conn, DB_NAME) or die(mysqli_error($conn)); // connect to database

?>

