<?php
/* Database credentials. Assuming you are running MySQL
server with default setting (user 'root' with no password) */

$DB_SERVER = getenv('DB_HOST');
$DB_USERNAME = getenv('DB_USER');
$DB_PASSWORD = getenv('DB_PASSWORD');
$DB_NAME = getenv('DB_NAME');

$link = mysqli_connect($DB_SERVER, $DB_USERNAME, $DB_PASSWORD, $DB_NAME);

// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}

mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

?>