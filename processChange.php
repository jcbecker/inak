<?php
session_start();
if(isset($_SESSION['user'])){
	$sessionUser = $_SESSION['user'];
}
else{
	header("Location: index.php");
	break;
}
//$sessionUser = "usuario@teste.com";
require_once("database.php");

$con = mysqli_connect($DB_HOST, $DB_USER, $DB_PASS, $DB_NAME);
if (mysqli_connect_errno())
{
	echo "Failed to connect to MySQL: " . mysqli_connect_error();
	return;
}
$query = "SELECT * FROM user WHERE userName='".$sessionUser."'";
$res = mysqli_query($con, $query);
$res = mysqli_fetch_assoc($res);

$GO = "profile.php";	//page to be redirected

$email = $res['email'];
$password = $res['password'];
if(isset($res['picture'])) $picture = $res['picture']; 

$idUser = "inputUserName";	//name of input field
$idEmail = "inputEmail";	//name of input field

$flag=0;
if(isset($_POST[$idEmail])){
	$newEmail = $_POST[$idEmail];
	$newEmail = addslashes($newEmail);
	if(strcmp($newEmail,"")){
		$email = $newEmail;
	}
}

if(isset($_POST[$idUser])){
	$newUsername = $_POST[$idUser];
	$newUsername = addslashes($newUsername);
	if(strcmp($newUsername,"")){
		$userName =$newUsername;
	}
	echo"aqui:".$userName;
}

$query = "UPDATE user SET email='".$email."', userName='".$userName."' WHERE userName='".$sessionUser."'";
$res = mysqli_query($con, $query);
if(mysqli_affected_rows($con)<1){
	echo "Not updated";
}
else{
	$_SESSION['user'] = $userName;
	$_SESSION['email'] = $email;
}

mysqli_close($con);
header("Location: ".$GO);

?>
