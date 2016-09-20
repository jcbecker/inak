<?php
	session_start();
	require_once("database.php");
	$emailField = "inputEmail";	//Name of input field (e-mail)
	$passwordField = "inputPassword";	//Name of input field (password)
	$userNameField = "inputUserName";	//Name of input field (userName)
	
	$GO = "homeDeck.php";	//Load after correct register
	if(!isset($_POST[$emailField]) || !isset($_POST[$passwordField])){
		header('Location: index.php?err=1');
		return;
	}
	$email = $_POST[$emailField];
	$pwd = $_POST[$passwordField];
	$username = $_POST[$userNameField];
	
	$con = mysqli_connect($DB_HOST, $DB_USER, $DB_PASS, $DB_NAME);
	if (mysqli_connect_errno())
	{
		echo "Failed to connect to MySQL: " . mysqli_connect_error();
		return;
	}
	$query = "INSERT INTO user (email, password, userName) VALUES ('".$email."', '".sha1($pwd)."', '".sha1($username)."')";
	$res = mysqli_query($con, $query);
	if(!$res || (mysqli_affected_rows($con)==0)){
		header('Location: index.php?err=2');	//User not inserted in DB
		return;
	}
	else{
		mysqli_close($con);
		$_SESSION['user'] = $username;
		$_SESSION['email'] = $email;
		header("Location: ".$GO);
	}
?>
