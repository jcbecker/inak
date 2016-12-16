<?php
	require_once("database.php");
	session_start();
	$userName = 'user';
	
	if((!isset ($_SESSION[$userName]) == true)){
		header('Location: index.php');
	}
	$con = mysqli_connect($DB_HOST, $DB_USER, $DB_PASS, $DB_NAME);
	$query = "DELETE FROM user WHERE user.userName = '".$_SESSION[$userName]."'";
	$res = mysqli_query($con, $query);

	if(!$res){
		returnError(4);
		return;
	}
	
	mysqli_close($con);
	session_destroy();
	header("Location:index.php");
?>
