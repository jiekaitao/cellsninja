<?php 

session_start();
//database config/password info
require_once($_SERVER['DOCUMENT_ROOT']."/imports/config.php");

//clubid
$sql = "SELECT game_step, money, resets FROM users WHERE user_id = ?";
$stmt = mysqli_prepare($link, $sql);
mysqli_stmt_bind_param($stmt, "s", $param_uuid);
$param_uuid = $_SESSION['user_id'];
mysqli_stmt_execute($stmt);
mysqli_stmt_store_result($stmt);
mysqli_stmt_bind_result($stmt, $game_step, $money, $resets);
mysqli_stmt_fetch($stmt);
mysqli_stmt_close($stmt);

if($game_step == 0) {
//Step 0, user is fresh

$_SESSION['game_step'] = $game_step;
$_SESSION['money'] = $money;
$_SESSION['resets'] = $resets;

}

