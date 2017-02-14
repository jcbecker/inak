<?php
	require_once("database.php");
	$con = mysqli_connect($DB_HOST, $DB_USER, $DB_PASS, $DB_NAME);
	$query = "DELETE FROM card";
	$query.= " WHERE id ='".$_GET['id']."'";
	$res = mysqli_query($con, $query);
	if(!$res){
		returnError(4);
		return;
	}
	$id_deck = $_GET['id_deck'];
	mysqli_close($con);
	session_destroy();
	$GO = "changeDeck.php?id_deck=".$id_deck;
	header("Location: ".$GO);
?>
