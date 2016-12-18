<?php include "menu.php";
	require_once("database.php");
	$con = mysqli_connect($DB_HOST, $DB_USER, $DB_PASS, $DB_NAME);
	$query = "select * from deck where id_deck = '".$_GET['id_deck']."'";
	$res =  mysqli_query($con, $query);
	$aux = $res->fetch_assoc();

	//	Gets the cards from the deck that need to be played
	$query = "select * from card where id_deck = ".$_GET['id_deck']." and card.nextPlay <= CURTIME();";
	$res =  mysqli_query($con, $query);
	$card = $res->fetch_assoc();	// Card from the top of the pile
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
</script>


<link href="css/card_style.css" rel="stylesheet">
<div class="container" style="margin-bottom:50px;">
	<h2><span class="label label-primary"><?php echo $aux['name'] ?> </span></h2>
	<div class="row">
		<div class="col-md-6" id ="profile_body" style="margin-top:50px;">
			<div class="panel panel-default">
  					<div class="panel-body">
						<div id="front" style="visibility: visible; display: block; text-align: center; width: 50%; float: left">
							<?php echo $card["front"]; ?>
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
    				<button type="button" class="btn btn-default">Easy</button>
  				</div>
	  			<div class="btn-group" role="group">
	    				<button type="button" class="btn btn-default">Ok</button>
	  			</div>
	  			<div class="btn-group" role="group">
	    			<button type="button" class="btn btn-default">Hard</button>
	  			</div>
			</div>
		</div>
	</div>
</div>
<?php include "footer.php"; ?>
