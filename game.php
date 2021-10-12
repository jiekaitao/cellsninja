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
$_SESSION['game_step'] = $game_step;
$_SESSION['money'] = $money;
$_SESSION['resets'] = $resets;

//$_SESSION['status'] if user is supporter or not





//clubname





//check if club chat room is created since last server reboot
//if not, create one
$templateFile5 = file_get_contents($_SERVER['DOCUMENT_ROOT'].'/c/chatrooms/templateRoom.html');

if (!file_exists($_SERVER['DOCUMENT_ROOT'].'/c/chatrooms/ROOM_'.$clubid.'.html')) {
    $handle = fopen($_SERVER['DOCUMENT_ROOT'].'/c/chatrooms/ROOM_'.$clubid.'.html','w+');
    fwrite($handle, $templateFile5); 
    fclose($handle); 
}

//check if club chat archive is created since last server reboot
//if not, create one
$templateFile6 = file_get_contents($_SERVER['DOCUMENT_ROOT'].'/c/chatrooms/archive/templateArchive.html');

if (!file_exists($_SERVER['DOCUMENT_ROOT'].'/c/chatrooms/archive/ROOM_'.$clubid.'.html')) {
    $handle = fopen($_SERVER['DOCUMENT_ROOT'].'/c/chatrooms/archive/ROOM_'.$clubid.'.html','w+');
    fwrite($handle, $templateFile6); 
    fclose($handle); 
}


?>

    

<!-- HOME -->
<section class="section-hero overlay inner-page bg-image" style="background-image: url('https://<?php echo htmlspecialchars($_SERVER["HTTP_HOST"]); ?>/images/hero_1.jpg');" id="home-section">
    <div class="container">
    <div class="row">
        <div class="col-md-7">
        <h1 class="text-white font-weight-bold">Chatroom </h1>
        <div class="custom-breadcrumbs">
            <a href="https://<?php echo htmlspecialchars($_SERVER["HTTP_HOST"]); ?>">Home</a> 
            <span class="mx-2 slash">/</span>
            <a href="https://<?php echo htmlspecialchars($_SERVER["HTTP_HOST"]); ?>">Portal</a> 
            <span class="mx-2 slash">/</span>
            <a href="https://<?php echo htmlspecialchars($_SERVER["HTTP_HOST"]); ?>">Club</a> 
            <span class="mx-2 slash">/</span>
            <span class="text-white"><strong>Chatroom</strong></span>
        </div>
        </div>
    </div>
    </div>
</section>

<h1>General Chatroom</h1>
<br>
<style>
/* CSS Document */
 
input { font:12px arial; }

 
#wrapperx {
	margin:0 auto;
	padding-bottom:25px;
	background:#EBF4FB;
	width:1000px;
	border:1px solid #ACD8F0; }
 
 
#chatbox {
	text-align:left;
	margin:0 auto;
	margin-bottom:25px;
	padding:15px;
	background:#fff;
	height:690px;
	width:1000px;
	border:1px solid #ACD8F0;
	overflow:auto; }
 
#usermsg {
	width:395px;
	border:1px solid #ACD8F0; }
 
#submitmsg { width: 60px; }
 
.error { color: #ff0000; }
 
#menu { padding:19.5px 70px 19.5px 70px; }
 
.welcome { float:left; }
 
.msgln { margin:0 5px 0; overflow-y: auto; }
 
 
	</style>
</head>
<body>
<center>
<div id="wrapperx" style="position: relative; left: -150px;">
	<div id="menu">
		<p class="welcome">Welcome, <b><?php echo $_SESSION['username']; ?></b></p>
		<p class="logout"><a href="<?php echo $_SERVER['HTTP_HOST']; ?>/contact.php">Report User</a></p>
		<p class="text-white"><a href="<?php echo $_SERVER['HTTP_HOST']; ?>/commands.php">Command List</a></p>
		<div style="clear:both">
    </div>
</div>	

<div id="chatbox"><?php
    
	if(file_exists($_SERVER['DOCUMENT_ROOT'].'/c/chatrooms/ROOM_'.$clubid.'.html') && filesize($_SERVER['DOCUMENT_ROOT'].'/c/chatrooms/ROOM_'.$clubid.'.html') > 0){
		$handle = fopen($_SERVER['DOCUMENT_ROOT'].'/c/chatrooms/ROOM_'.$clubid.'.html', "r");
		$contents = fread($handle, filesize($_SERVER['DOCUMENT_ROOT'].'/c/chatrooms/ROOM_'.$clubid.'.html'));
		fclose($handle);
		
		echo $contents;
	}
    
  ?>
</div>
  
  <?php
  //PHP CLIENT-SIDE COMMANDS
  /*
  function whoami() {
    $fp = fopen($_SERVER['DOCUMENT_ROOT'].'/c/chatrooms/ROOM_'.$clubid.'.html', 'a');
    fwrite($fp, "<div class='msgln'><br>First Name: <b> " .$_SESSION['name']."</b> | ID: ".$_SESSION['id']." | Membership: ".$_SESSION['status']." | Email: ".$_SESSION['email']." | Username: " .$_SESSION['chatName'].".<br> <br></div>");
    fclose($fp);
	}
	*/

  ?>


<!--form name="message" action="">

    <input name="usermsg" type="text" id="usermsg" size="63" />
	<input name="clubid" type="hidden" value="<?php echo htmlspecialchars($clubid); ?>" id="clubid"/>
    <input name="submitmsg" type="submit"  id="submitmsg" value="Send" />

</form-->

<form name="message" action="">
		<input name="usermsg" type="text" id="usermsg" size="63" />
		<input name="submitmsg" type="submit"  id="submitmsg" value="Send" />
	</form>

</center>

<script>
/*
$(document).ready(function(){
	//If user submits the form
	$("#submitmsg").click(function(){	
		var clientmsg = $("#usermsg").val();
		var clubid = $("#clubid").val();
		$.post('https://<?php echo htmlspecialchars($_SERVER["HTTP_HOST"]); ?>/c/chatrooms/message.php', {text: clientmsg, clubid: clubid});
        $("#usermsg").attr("value", "");
		$("#clubid").attr("value", "");
		return false;
	});

	$("#submitmsg").click(

    function(){
        $("#usermsg").val('');
		$("#clubid").val('');
    }
	
	);
*/

// jQuery Document
$(document).ready(function(){
	//If user submits the form
	$("#submitmsg").click(function(){	
		var clientmsg = $("#usermsg").val();
		$.post('https://<?php echo htmlspecialchars($_SERVER["HTTP_HOST"]); ?>/c/chatrooms/message.php', {text: clientmsg});				
		$("#usermsg").attr("value", "");
		return false;
	});

	$("#submitmsg").click(
    function(){
        $("#usermsg").val('');
    });
	

	//Load the file containing the chat log
	function loadLog(){		
		var oldscrollHeight = $("#chatbox").attr("scrollHeight") - 20;
		$.ajax({
			url: 'https://<?php echo htmlspecialchars($_SERVER["HTTP_HOST"]); ?>/c/chatrooms/ROOM_<?php echo htmlspecialchars($clubid); ?>.html',
			cache: false,
			success: function(html){		
				$("#chatbox").html(html); //Insert chat log into the #chatbox div				
				var newscrollHeight = $("#chatbox").attr("scrollHeight") - 20;
				if(newscrollHeight > oldscrollHeight){
					$("#chatbox").animate({ scrollTop: newscrollHeight }, "normal"); //Autoscroll to bottom of div
				}				
		  	},
		});
	}
	setInterval (loadLog, 300);	//Reload file every 300 ms
	
	//If user wants to end session
	$("#exit").click(function(){
		if(exit==true){window.location = 'contact.php';}		
	});
});


</script>


</div>	
</div>	
</div>	
</div>	
</div>	
</div>	
</div>	










<br>
<br>
<?php require_once($_SERVER['DOCUMENT_ROOT']."/imports/footer.php"); ?>
