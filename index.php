<?php 
include_once($_SERVER['DOCUMENT_ROOT'].'/imports/header.php');
$playerCNT = 0;

//check if club game room count is created since last server reboot
//if not, create one

$templateFile5 = file_get_contents($_SERVER['DOCUMENT_ROOT'].'/handlers/templateRoomcnt.html');

if (!file_exists($_SERVER['DOCUMENT_ROOT'].'/handlers/gameRoomcnt.html')) {
    $handle = fopen($_SERVER['DOCUMENT_ROOT'].'/handlers/gameRoomcnt.html','w+');
    fwrite($handle, $templateFile5); 
    fclose($handle); 
}


//get player count

if(file_exists($_SERVER['DOCUMENT_ROOT'].'/handlers/gameRoomcnt.html')){
	$handle = fopen($_SERVER['DOCUMENT_ROOT'].'/handlers/gameRoomcnt.html', "r");
	$contents = fread($handle, filesize($_SERVER['DOCUMENT_ROOT'].'/handlers/gameRoomcnt.html'));
	$playerCNT = strval($contents);
	fclose($handle);
}


if ($_SESSION['account']=="just created") {
	++$playerCNT;
}


?>

		<div class="banner_section">
			<div class="container-fluid">
				<section class="slide-wrapper">
				<div class="container-fluid">
					<div id="myCarousel" class="carousel slide" data-ride="carousel">
					<!-- Indicators -->
					<ol class="carousel-indicators">
						<li data-target="#myCarousel" data-slide-to="0"></li>
					</ol>

					<br>
					<br>
					<br>

					<!-- Wrapper for slides -->
					<div class="carousel-inner">
						<div class="active">
							<div class="row">
							<div class="col-sm-2 padding_0">
								<!--p class="mens_taital">Organelle Trail Live!</p-->

								<div class="page_no"><?php echo htmlspecialchars($playerCNT); ?>/17</div>
								<?php if(isset($_SESSION['user_id'])) { ?>
									<br>
									<hr>
									You're User ID is <?php echo htmlspecialchars($_SESSION['user_id']); ?>
								<?php
								}
								?>
							</div>
							<div class="col-sm-5">
								<div class="banner_taital">




									<h1 class="banner_text">Waiting on Players
									</h1>
									<h1 class="mens_text"><strong>Organelle Trail</strong></h1>
									<p class="lorem_text">The world-famous Organelle Trail game! And definately not a ripoff of Oregon Trail!</p>
									<?php if(isset($_SESSION['user_id'])) { ?><button class="buy_bt" onclick="window.location.href = 'http://cells.ninja/game.php';">Join</button>
									<?php } else { ?> 
									<button class="buy_bt" onclick="window.location.href = 'https://cells.ninja/php/register.php';">New Acc.</button> <?php } ?>
								
									<button class="more_bt" onclick="window.location.href = 'https://cells.ninja/restore.php';">Restore Acc.</button>
								</div>
							</div>
							<div class="col-sm-5">
								<div class="shoes_img"><img style='border-radius: 15px;' src="images_game/index_cell.jpg"></div>
							</div>
						</div>
					</div>
                </div>
            </div>
        </div>
		<br>
		<br>
		<br>
		<br>
		<br>
		<br>
		<br>
		<br>
		<br>
		<br>
		<br>
		<br>
		<br>
		<br>
		<br>
		<br>
		<br>
		<div class="collection_section">
    	<div class="container">
    		<h1 class="new_text"><strong>Game Objective</strong></h1>
    	    <p class="consectetur_text">Build</p>
    	</div>
    </div>
    <div class="collectipn_section_3 layuot_padding">
    	<div class="container">
    		<div class="racing_shoes">
    			<div class="row">
    				<div class="col-md-8">
    					<div class="shoes-img3"><img src="images/shoes-img3.png"></div>
    				</div>
    				<div class="col-md-4">
    					<div class="sale_text"><strong>Sale <br><span style="color: #0a0506;">JOGING</span> <br>SHOES</strong></div>
    					<div class="number_text"><strong>$ <span style="color: #0a0506">100</span></strong></div>
    					<button class="seemore">See More</button>
    				</div>
    			</div>
    		</div>
    	</div>
    </div>
    </div>
</section>			
</div>
</div>
</div>

<br>
<br>
<br>
<br>
<br>


<script>
alert('test');

// jQuery Document

//var updatedCNT = '<?php echo $playerCNT ?>';
//$.post('https://<?php echo htmlspecialchars($_SERVER["HTTP_HOST"]); ?>/php/updatePlayers.php', {text: updatedCNT});				

alert('test');

	/*
	//Load the file containing the chat log
	function loadRoomcnt(){		
		$.ajax({
			url: 'https://<?php echo htmlspecialchars($_SERVER["HTTP_HOST"]); ?>/handlers/gameRoomcnt.html',
			cache: false,
			success: function(html){
				$("#playerCNT").html(html); //Insert chat log into the #chatbox div				
		  	},
		});
	}
	setInterval (loadRoomcnt, 300);	//Reload file every 300 ms
	*/
	
</script>


	<?php include_once($_SERVER['DOCUMENT_ROOT'].'/imports/footer.php'); ?>