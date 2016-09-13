<?php
session_start();
require_once("database.php");
$idUser = "inputEmail";	//name of input field
$idPass = "inputPassword";	//name of input field
$GO = "homeDeck.php";	//load after correct login

function returnError($n, $name=NULL){
	if(isset($name)) header('Location: index.php?error='.$n.'&login_name='.$name);
	else header('Location: index.php?error='.$n);
}

if(!isset($_POST[$idUser]) || !isset($_POST[$idPass])){
	returnError(0);
	return;
}

$id = trim($_POST[$idUser]);
$pass = trim($_POST[$idPass]);

if(!strcmp($id, "")){
	if(!strcmp($pass, "")){
		returnError(1);
		return;
	}
	else{
		returnError(2);
		return;
	}
}
if(!strcmp($pass, "")){
	returnError(3, $id);
}
$con = mysqli_connect($DB_HOST, $DB_USER, $DB_PASS, $DB_NAME);

if (mysqli_connect_errno())
{
	echo "Failed to connect to MySQL: " . mysqli_connect_error();
	return;
}
$query = "SELECT * FROM user WHERE email='".$id."'";
$res = mysqli_query($con, $query);


if(!$res || (mysqli_affected_rows($con)==0)){
	returnError(4);
	return;
}
$row = mysqli_fetch_assoc($res);
if(strcmp(sha1($pass), $row['password'])){
	returnError(5, $id);
	unset ($_SESSION['email']);
	return;
}
else{
	$_SESSION['user'] = $row['email'];
	header('Location: '.$GO);
	mysqli_close($con);
}

?>
