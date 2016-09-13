<?php
	require_once("database.php");
	session_start();
	$userEmail = 'user';
	
	if((!isset ($_SESSION[$userEmail]) == true)){
		header('Location: index.php');
	}
	$con = mysqli_connect($DB_HOST, $DB_USER, $DB_PASS, $DB_NAME);
	$query = "DELETE FROM user WHERE user.email = '".$_SESSION[$userEmail]."'";
	$res = mysqli_query($con, $query);

	if(!$res){
		returnError(4);
		return;
	}
	
	mysqli_close($con);
	session_destroy();
	header("Location:index.php");
?>
