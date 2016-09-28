<?php
session_start();
if(isset($_SESSION['user'])){
	$sessionUser = $_SESSION['userName'];
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

$idUser = "e-mail";	//name of input field
$idPass = "password";	//name of input field
$idPicture = "picture";	//name of input field

$flag=0;
if(isset($_POST[$idUser])){
	$newEmail = trim($_POST[$idUser]);
	$newEmail = addslashes($newEmail);
	if(strcmp($newEmail,"")){
		$email = $newEmail;
	}
	$flag++;
}

if(isset($_POST[$idPass])){
	$newPassword = trim($_POST[$idPass]);
	$newPassword = addslashes($newPassword);
	if(strcmp($newPassword,"")){
		$password =$newPassword;
	}
	$flag++;
}

if(isset($_FILES[$idPicture])){
	if(!strcmp(substr($_FILES[$idPicture]['type'], 0, 5),"image")){
		$picture = $sessionUser.".jpg";
		if(!move_uploaded_file($_FILES[$idPicture]['tmp_name'], 'userPicture/'.$picture)) echo "Error: uploaded image";
	}
}

$query = "UPDATE user SET email='".$email."', password='".sha1($password)."', picture='".$picture."' WHERE email='".$sessionUser."'";
$res = mysqli_query($con, $query);
if(mysqli_affected_rows($con)<1) echo "Not updated";
mysqli_close($con);
header("Location: ".$GO);

?>