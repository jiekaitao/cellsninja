<?php

session_start();

$playerCNT = $_POST['text'];

$handle = fopen($_SERVER['DOCUMENT_ROOT'].'/handlers/gameRoomcnt.html', "w+") or die("Unable to open file!");
fwrite($handle, $playerCNT); 
fclose($handle);


?>