<?php
	session_start();
	if(isset($_SESSION['user'])) {
			$sessionUser = $_SESSION['user'];
	}else{
			header("Location: index.php");
	}
	require_once("database.php");
	$inputFront = "inputFront";
	$inputBack = "inputBack";

	$GO = "changeDeck.php";	//Load after correct register
	if(!isset($_POST[$inputFront]) || !isset($_POST[$inputBack])){
		header('Location: createDeck.php?err=1');
		return;
	}
	$front = $_POST[$inputFront];
	$back = $_POST[$inputBack];
	$idDeck = $_POST["idDeck"];

	$con = mysqli_connect($DB_HOST, $DB_USER, $DB_PASS, $DB_NAME);

	if (mysqli_connect_errno()){
		echo "Failed to connect to MySQL: " . mysqli_connect_error();
		return;
	}
	$query = "INSERT INTO card (front,back,deck) VALUES ('".$front."','".$back."','".$idDeck."')";
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