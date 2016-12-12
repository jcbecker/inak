<?php
	session_start();
	if(isset($_SESSION['user'])) {
			$sessionUser = $_SESSION['user'];
	}else{
			header("Location: index.php");
	}
	require_once("database.php");
	$deckName = "inputName";
	$deckShared = "inputShared";

	$GO = "homeDeck.php";	//Load after correct register
	if(!isset($_POST[$deckName]) || !isset($_POST[$deckShared])){
		header('Location: createDeck.php?err=1');
		return;
	}
	$name = $_POST[$deckName];
	$shared = $_POST[$deckShared];
	$idUserDeck = $_POST["IdUserEmail"];

	$con = mysqli_connect($DB_HOST, $DB_USER, $DB_PASS, $DB_NAME);

	if (mysqli_connect_errno())
	{
		echo "Failed to connect to MySQL: " . mysqli_connect_error();
		return;
	}
	$query = "INSERT INTO deck (name,shared,ownerId) VALUES ('".$name."','".$shared."','".$idUserDeck."')";
	$res = mysqli_query($con, $query);
	echo $res;
	if(!$res){ // || (mysqli_affected_rows($con)==0)
		//header('Location: createDeck.php?err=2');	//User not inserted in DB
		echo "Não gravou";
		echo $query."--";
		return;
	}else{
		mysqli_close($con);
		header("Location: ".$GO);
		
	}	



?>