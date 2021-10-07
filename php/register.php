<?php

if(!isset($_SESSION['user_id'])) {

    require_once($_SERVER['DOCUMENT_ROOT']."/imports/config.php");

    $length = 4;

    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($length);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }

    $sql = "INSERT INTO users (user_id) VALUES (?)";
    $stmt = mysqli_prepare($link, $sql);
    if($stmt == false) { die("<pre>".mysqli_error($link).PHP_EOL.$sql."</pre>"); }
    mysqli_stmt_bind_param($stmt, "s", $param_user_id);
                
    // Set parameters
    $param_user_id = $randomString;

    // Attempt to execute the prepared statement
    if (mysqli_stmt_execute($stmt)) {
        $_SESSION["user_id"] = $randomString;
    }

}


?>