<?php include "menu.php";
	require_once("database.php");
	$con = mysqli_connect($DB_HOST, $DB_USER, $DB_PASS, $DB_NAME);
	$query = "select * from deck where id_deck = '".$_GET['id_deck']."'";
	$res =  mysqli_query($con, $query);
	$aux = $res->fetch_assoc();

	//	Gets the cards from the deck that need to be played
	$query = "select * from card where id_deck = ".$_GET['id_deck']." and card.nextPlay <= CURTIME();";
	$res =  mysqli_query($con, $query);

	//	If there are cards to play
	if($res){
		$card = $res->fetch_assoc();	// Card from the top of the pile
	}

	//	If there aren't cards to play
	else{
		echo "there aren't cards to play right now.";
		return;	//	Aqui vai dar merda
	}

	//	DATE_ADD(datefield, INTERVAL 30 MINUTE)
	//	UPDATE NOME_DA_TABELA SET campo1 = valor1, campo2 = valor2.


?>

<script>
//	Function to change the visibility of the answer
function showAnswer(){
	var page = document.getElementById('back');
	if (!page) return false;
	page.style.visibility='visible';
	page.style.display='block';

	return true;
}




function play(score){
	window.location = "playCard.php?id_deck="+
	<?php
	 	echo $_GET['id_deck'];
	?> + "&score=" + score + "&id_card=" +
	<?php
	 	echo $card['id'];
	?>;

}


</script>


<link href="css/card_style.css" rel="stylesheet">
<div class="container" style="margin-bottom:50px;">
	<h2><span class="label label-primary"><?php echo $aux['name'] ?> </span></h2>
	<div class="row">
		<div class="col-md-6" id ="profile_body" style="margin-top:50px;">
			<div class="panel panel-default">
  					<div class="panel-body">
						<div id="front" style="visibility: visible; display: block; text-align: center; width: 50%; float: left">
							<?php
								if($card) echo $card["front"];
								else echo "There aren't cards to play right now."; ?>
						</div>

						<div id="back" style="visibility: hidden; display: block; text-align: center; width: 50%; float: right">
							<?php echo $card["back"]; ?>
						</div>
					</div>
			</div>

			<div class="btn-group btn-group-justified" role="group" aria-label="...">
				<div class="btn-group" role="group" style="witdh: 30%">
					<button type="button" class="btn btn-default" onclick="showAnswer();">Show</button>
				</div>
			</div>

			<div class="btn-group btn-group-justified" role="group" aria-label="...">
  				<div class="btn-group" role="group">
    				<button type="button" class="btn btn-default" onclick="play(1);">Easy</button>
  				</div>
	  			<div class="btn-group" role="group">
	    				<button type="button" class="btn btn-default" onclick="play(0);">Ok</button>
	  			</div>
	  			<div class="btn-group" role="group">
	    			<button type="button" class="btn btn-default" onclick="play(-1);">Hard</button>
	  			</div>
			</div>
		</div>
	</div>
</div>
<?php include "footer.php"; ?>
