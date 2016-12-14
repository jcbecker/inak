<?php
	require_once("database.php");
	$idDeck = $_GET['id'];
	$con = mysqli_connect($DB_HOST, $DB_USER, $DB_PASS, $DB_NAME);
	$query = "DELETE FROM deck";
	$query.= " WHERE id='".$idDeck."'";
	
	$res = mysqli_query($con, $query);

	if(!$res){
		returnError(4);
		return;
	}
	
	mysqli_close($con);
	session_destroy();
	header("Location:homeDeck.php");
?>