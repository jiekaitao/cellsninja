<?php 
session_start();
//database config/password info
require_once($_SERVER['DOCUMENT_ROOT']."/imports/config.php");


$_SESSION['temp_message'] = "";
$_SESSION['energy_expended'] = 80;

if($_SESSION['game_step']==2) {
	$_SESSION['energy_expended'] = 100;
}

if($_SESSION['game_step']==3) {
	$_SESSION['energy_expended'] = 120;
}

if($_SESSION['game_step']==4) {
	die("You won! If you would to play again, please clear your cookies.");
}

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


function saveData($link, $game_step, $money, $resets){
	
	$sql = "UPDATE users SET game_step = ?, money = ?, resets = ? WHERE user_id = ?";
	$stmt = mysqli_prepare($link, $sql);
	mysqli_stmt_bind_param($stmt, "iiis", $param_game_step, $param_money, $param_resets, $param_user_id);
	
	$param_game_step = $_SESSION['game_step'];
	$param_money = $_SESSION['money'];
	$param_resets = $_SESSION['resets'];
	$param_user_id = $_SESSION['user_id'];

	mysqli_stmt_execute($stmt);

}

function checkDead(){
	
	if($_SESSION['money'] <= 0) {
		die('You died. Your guts leak out and the process of lysis destroys your precious cell membrane. You did not survive the 2077 cell evolution event. :( Reinarcarnate by clearing your cookies!');
	}

}

function returnToGame() {

	$_SESSION['money'] = $_SESSION['money'] + $_SESSION['recovery'] - $_SESSION['energy_expended'] - $_SESSION['dmg_receieved'];
	if($_GET['choice']==3) { $_SESSION['enemy_hp'] = $_SESSION['enemy_hp'] - $_SESSION['damage']; }

	if($_SESSION['enemy_hp'] <= 0) {
		++$_SESSION['game_step'];
		$_SESSION['bonusATP'] = 1000 + rand(80, 160);
		$_SESSION['money'] = $_SESSION['money'] + $_SESSION['bonusATP'];

		$_SESSION['enemyATPincrement'] = rand(100, 160);
		$_SESSION['enemy_hp'] = 1000 + $_SESSION['enemyATPincrement'];

		$_SESSION['specialMSG'] = true;
	}
	
	if($_GET['choice']==3) {
		$_SESSION['temp_message'] = "In order to keep yourself alive, you spent ".$_SESSION['energy_expended']." ATP. The enemy dealt ".$_SESSION['dmg_receieved']." You now have ".$_SESSION['money']." total ATP. You recovered ".$_SESSION['recovery']." ATP. You dealt ".$_SESSION['damage']." damage. The enemy now has ".$_SESSION['enemy_hp']." ATP remaining.";
	} else {
		$_SESSION['temp_message'] = "In order to keep yourself alive, you spent ".$_SESSION['energy_expended']." ATP. The enemy dealt ".$_SESSION['dmg_receieved']." You now have ".$_SESSION['money']." total ATP. You recovered ".$_SESSION['recovery']." ATP. You chose to defend, so you didn't inflict damage. The enemy still has ".$_SESSION['enemy_hp']." ATP remaining.";
	}

	if($_SESSION['specialMSG']==true) {
		$_SESSION['specialMSG']=false;
		$_SESSION['temp_message'] = "You successfully beat your opponent and you have now progressed to the next stage. You absorbed ".$_SESSION['bonusATP']." ATP points from defeating your opponent. You now have ".$_SESSION['money']." ATP";
	}
	checkDead();
	header('Location: https://'.$_SERVER["HTTP_HOST"].'/game'.$_SESSION['game_step'].'.php');
	exit();
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
	$_SESSION['enemy_hp'] = 1000;
	$_SESSION['money'] = 700;
	header('Location: https://'.$_SERVER["HTTP_HOST"].'/game'.$_SESSION['game_step'].'.php');
	exit();
	} elseif ($_GET['choice']==2) {
	//chose eukaryote
	$_SESSION['class'] = "EUK";
	$_SESSION['game_step'] = 1;
	$_SESSION['enemy_hp'] = 1000;
	$_SESSION['money'] = 1000;
	header('Location: https://'.$_SERVER["HTTP_HOST"].'/game'.$_SESSION['game_step'].'.php');
	exit();
	} else {
	header('Location: https://'.$_SERVER["HTTP_HOST"].'/classPicker.php');
	exit();
	}

}


if ($_SESSION['game_step'] > 0) {
	$_SESSION['recovery'] = 0;
	//Step 1, user finished picking fight against girus
	//redirect to picker if needed

	if($_SESSION['enemy_hp'] > 0) {
		$rng = rand(1, 10);
		$_SESSION['dmg_receieved'] = rand(50, 195);



		if ($_GET['choice']==3) {
		//chose attack
		checkDead();

			if($_SESSION['class'] == "PRO") {
				if($rng > 5) {
					$_SESSION['damage'] = 550;
					returnToGame();
				} else {
					$_SESSION['damage'] = 30;
					returnToGame();
				}	
			} else {
				if($rng > 5) {
					$_SESSION['damage'] = 200;
					returnToGame();
				} else {
					$_SESSION['damage'] = 200;
					$_SESSION['recovery'] = $_SESSION['dmg_receieved'] / 2;
					returnToGame();
				}
			}





		} elseif ($_GET['choice']==4) {
			//chose avoid conflict
			if($_SESSION['class'] == "PRO") {
				if($rng > 5) {
					$_SESSION['recovery'] = 300;
					returnToGame();
				} else {
					returnToGame();
				} 
			} else {
				$_SESSION['dmg_receieved'] = 0;
				$_SESSION['energy_expended'] = $_SESSION['energy_expended'] + 40;
				returnToGame();
			}







		} else {
		header('Location: https://'.$_SERVER["HTTP_HOST"].'/game'.$_SESSION['game_step'].'.php');
		exit();
		}
	} else {
		//header('Location: https://'.$_SERVER["HTTP_HOST"].'/game2.php');
		//die("you won. The enemy's hp is (or rather, was) ".$_SESSION['enemy_hp']."");
		returnToGame();
		exit();
	}
}