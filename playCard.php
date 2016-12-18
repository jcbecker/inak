<?php
    require_once("database.php");
    $con = mysqli_connect($DB_HOST, $DB_USER, $DB_PASS, $DB_NAME);
    if (mysqli_connect_errno()){
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
        return;
    }

    $id_deck = "id_deck";
    $score = "score";
    $id_card ="id_card";

    if(!isset($_GET[$id_deck]) || !isset($_GET[$id_card]) || !isset($_GET[$score])){
        header('Location: https://www.google.com.br/search?q=perdi&espv=2&biw=1366&bih=638&source=lnms&tbm=isch&sa=X&ved=0ahUKEwja0azU4vvQAhVFjpAKHfejDVYQ_AUIBigB#tbm=isch&q=wat');
        return;
    }

    $id_deck    = $_GET[$id_deck];
    $score      = $_GET[$score];
    $id_card    = $_GET[$id_card];


    //	Gets the cards from the deck that need to be played
	$query = "select * from card where id_deck = ".$_GET['id_deck']." and card.nextPlay <= CURTIME();";
	$res =  mysqli_query($con, $query);

    //	If there are cards to play
	if($res){
		$card = $res->fetch_assoc();	// Card from the top of the pile



    	$whereTo = "playDeck.php?id_deck=".$id_deck;

    	if($score < 0){
    		$card["box_id"] -= 1;
    		if($card["box_id"] < 1){
    			$card["box_id"] = 0;
    		}

    		$query = "UPDATE card SET nextPlay = DATE_ADD(CURTIME(), INTERVAL power(2,".$card["box_id"].") MINUTE), box_id = ".$card["box_id"]." where id = ".$card["id"];
    		$res =  mysqli_query($con, $query);
    		header("location: playDeck.php?id_deck=".$_GET['id_deck']);
    	}
    	else if($score = 0){
            $query = "UPDATE card SET nextPlay = DATE_ADD(CURTIME(), INTERVAL power(2,".$card["box_id"].") MINUTE) where id = ".$card["id"];
            $res =  mysqli_query($con, $query);
            header("location: playDeck.php?id_deck=".$_GET['id_deck']);
    	}
    	else{
            $card["box_id"] += 1;

            $query = "UPDATE card SET nextPlay = DATE_ADD(CURTIME(), INTERVAL power(2,".$card["box_id"].") MINUTE), box_id = ".$card["box_id"]." where id = ".$card["id"];
            $res =  mysqli_query($con, $query);
            header("location: playDeck.php?id_deck=".$_GET['id_deck']);
    	}
}




 ?>
