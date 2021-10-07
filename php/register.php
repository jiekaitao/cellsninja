<?php

if(!isset($_SESSION['user_id'])) {

    require_once($_SERVER['DOCUMENT_ROOT']."/imports/config.php");

    function getUUID($length) {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $str = '';
      
        for ($i = 0; $i < $length; $i++) {
            $index = rand(0, strlen($characters) - 1);
            $str .= $characters[$index];
        }
      
        return $str;
    }
      
    $randomString = getUUID(6);

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

header('Location: https://'.$_SERVER["HTTP_HOST"].' ');


?>