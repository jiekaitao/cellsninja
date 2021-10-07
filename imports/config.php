<?php
/* Database credentials. Assuming you are running MySQL
server with default setting (user 'root' with no password) */

$DB_SERVER = "us-cdbr-east-04.cleardb.net";
$DB_USERNAME = "bc473ff49638ea";
$DB_PASSWORD = "532e47c1";
$DB_NAME = "heroku_d9cb7d06fbd7b65";

$link = mysqli_connect($DB_SERVER, $DB_USERNAME, $DB_PASSWORD, $DB_NAME);

// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}

mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

?>