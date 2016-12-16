<?php
	session_start();
	if(isset($_SESSION['user']))
		$sessionUser = $_SESSION['user'];
	else
		header("Location: index.php");
	require_once("database.php");
	$deckName = "inputName";
	$deckShared = "inputShared";
	$var = $_POST["id_deck"];
	$GO = "changeDeck.php?id_deck=".$var;	//Load after correct register
	if(!isset($_POST[$deckName]) || !isset($_POST[$deckShared])){
		header("Location: changeDeck.php?id_deck=".$var);
		return;
	}
	$name = $_POST[$deckName];
	$shared = $_POST[$deckShared];
	$idDeck = $_POST["id_deck"];
	$con = mysqli_connect($DB_HOST, $DB_USER, $DB_PASS, $DB_NAME);
	if (mysqli_connect_errno()){
		echo "Failed to connect to MySQL: " . mysqli_connect_error();
		return;
	}
	$query = "UPDATE deck SET name='".$name."', shared='".$shared."'";
	$query.= " WHERE id_deck = '".$idDeck."'";
	$res = mysqli_query($con, $query);
	if(!$res){ // || (mysqli_affected_rows($con)==0)
		//header('Location: createDeck.php?err=2');	//User not inserted in DB
		echo "Não gravou";
		echo $query."--";
		return;
	} else {
		mysqli_close($con);
		header("Location: ".$GO);
	}
?>
