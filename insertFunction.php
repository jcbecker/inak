<?php
	function testUSER(){
        session_start();
        if(isset($_SESSION['user']))
            $sessionUser = $_SESSION['user'];
        else
            header("Location: index.php");
    }
	function mysql_co(){
		require_once("database.php");
		$con = mysqli_connect($DB_HOST, $DB_USER, $DB_PASS, $DB_NAME);
		if (mysqli_connect_errno()){
			echo "Failed to connect to MySQL: " . mysqli_connect_error();
			return;
		}
		return $con;
	}
	function insert($con, $query, $GO){
		$res = mysqli_query($con, $query);
		echo $res;
		if(!$res){ // || (mysqli_affected_rows($con)==0)
			//header('Location: createDeck.php?err=2');	//User not inserted in DB
			echo "Não gravou";
			echo $query."--";
			return;
		} else {
			mysqli_close($con);
			header("Location: ".$GO);
		}
	}
?>
