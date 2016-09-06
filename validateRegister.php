<?php
require_once("database.php");

$emailField = "inputEmail";	//Name of input field (e-mail)
$passwordField = "inputPassword";	//Name of input field (password)
$GO = "profile.php";	//Load after correct register

if(!isset($_POST[$emailField]) || !isset($_POST[$passwordField])){
	header('Location: index.php?err=1');
	return;
}

$email = $_POST[$emailField];
$pwd = $_POST[$passwordField];

$con = mysqli_connect($DB_HOST, $DB_USER, $DB_PASS, $DB_NAME);
if (mysqli_connect_errno())
{
	echo "Failed to connect to MySQL: " . mysqli_connect_error();
	return;
}

$query = "INSERT INTO user (email, password) VALUES ('".$email."', '".sha1($pwd)."')";
$res = mysqli_query($con, $query);
if(!$res || (mysqli_affected_rows($con)==0)){
	header('Location: index.php?err=2');	//User not inserted in DB
	return;
}
else{
	mysqli_close($con);
	header("Location: ".$GO);
}
?>
