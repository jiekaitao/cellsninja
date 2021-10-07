<?php 
include_once($_SERVER['DOCUMENT_ROOT'].'/imports/header.php');
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
								<div class="page_no">0/17</div>
							</div>
							<div class="col-sm-5">
								<div class="banner_taital">




									<h1 class="banner_text">Waiting on Players

									<div class="fade-in" style='animation-delay: 1.5s;'>
									<span
										class="txt-rotate"
										data-period="2000"
										data-rotate='[ ".", "..", "...", "...." ]'>
									</span>
									</div>
									</h1>


										<?php if(isset($_SESSION['user_id'])) { ?>
											You're User ID is <?php echo htmlspecialchars($_SESSION['user_id']); ?>
										<?php
										}
										?>
									<h1 class="mens_text"><strong>Organelle Trail</strong></h1>
									<p class="lorem_text">ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
									<?php if(isset($_SESSION['user_id'])) { ?><button class="buy_bt" onclick="window.location.href = 'http://cells.ninja/game.php';">Join</button>
									<?php } else { ?> 
									<button class="buy_bt" onclick="window.location.href = 'http://cells.ninja/game.php';">New Acc.</button> <?php } ?>
								

									<button class="more_bt" onclick="window.location.href = 'http://cells.ninja/restore.php';">Restore Acc.</button>
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

<footer>
	<script>

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
</footer>


	<?php include_once($_SERVER['DOCUMENT_ROOT'].'/imports/footer.php'); ?>