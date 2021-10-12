<?php 

session_start();
//database config/password info
require_once($_SERVER['DOCUMENT_ROOT']."/imports/config.php");

if(!isset($_SESSION['game_step'])) {
//initial get vars
$sql = "SELECT game_step, money, resets FROM users WHERE user_id = ?";
$stmt = mysqli_prepare($link, $sql);
mysqli_stmt_bind_param($stmt, "s", $param_uuid);
$param_uuid = $_SESSION['user_id'];
mysqli_stmt_execute($stmt);
mysqli_stmt_store_result($stmt);
mysqli_stmt_bind_result($stmt, $game_step, $money, $resets);
mysqli_stmt_fetch($stmt);
mysqli_stmt_close($stmt);

$_SESSION['game_step'] = $game_step;
$_SESSION['money'] = $money;
$_SESSION['resets'] = $resets;
}


function saveData($game_step, $money, $resets){
	
	$sql = "UPDATE users SET game_step = ?, money = ?, resets = ? WHERE user_id = ?";
	$stmt = mysqli_prepare($link, $sql);
	mysqli_stmt_bind_param($stmt, "iiis", $param_game_step, $param_money, $param_resets, $param_user_id);
	
	$param_game_step = $_SESSION['game_step'];
	$param_money = $_SESSION['money'];
	$param_resets = $_SESSION['resets'];
	$param_user_id = $_SESSION['user_id'];

	mysqli_stmt_execute($stmt);

}

function checkDead($game_step, $money, $resets){
	
	$sql = "UPDATE users SET game_step = ?, money = ?, resets = ? WHERE user_id = ?";
	$stmt = mysqli_prepare($link, $sql);
	mysqli_stmt_bind_param($stmt, "iiis", $param_game_step, $param_money, $param_resets, $param_user_id);
	
	$param_game_step = $_SESSION['game_step'];

	mysqli_stmt_execute($stmt);

}

if ($_SESSION['game_step'] == 0) {
	//Step 0, user is fresh
	//redirect to class picker
	$_SESSION['game_step'] = $game_step;
	$_SESSION['money'] = 1000;
	$_SESSION['resets'] = $resets;

	if ($_GET['choice']==1) {
	//chose prokaryote
	$_SESSION['class'] = "PRO";
	$_SESSION['game_step'] = 1;
	} elseif ($_GET['choice']==2) {
	//chose eukaryote
	$_SESSION['class'] = "EUK";
	$_SESSION['game_step'] = 1;
	} else {
	header('Location: https://'.$_SERVER["HTTP_HOST"].'/classPicker.php');
	exit();
	}

}
