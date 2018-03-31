<?php 
    
    ob_start();
    session_start();    
    date_default_timezone_set('Asia/Kolkata');//or change to whatever timezone you want

    $db['db_host'] = "localhost";
    $db['db_user'] = "Swapnil";
    $db['db_pass'] = "swapnil";
    $db['db_name'] = "cms";

    foreach ($db as $key => $value) {
        define(strtoupper($key), $value);
    }

    $connection = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);


    $query = "SET NAMES utf8";
    mysqli_query($connection, $query);

    /*
    if($connection) {
        echo "We are connected";
    }

    */

?>
