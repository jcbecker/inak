<?php include "menu.php";
	require_once("database.php");
	$con = mysqli_connect($DB_HOST, $DB_USER, $DB_PASS, $DB_NAME);
	$query = "select * from card where id = '".$_GET['id']."'";
	$res =  mysqli_query($con, $query);
	$aux = $res->fetch_assoc();
?>
<div class="container">
    <div class="row">
        <div class="col-md-4" id ="profile_body">
            <h2 align="center">Update Card</h2>
            <form class="form-signin" action= "processUpdateCard.php?id=<?php echo $aux['id']?>&id_deck=<?php echo $aux['id_deck']?>" method="POST">
                <label for="inputName" >Front</label>
                <input type="name" name="inputFront" value="<?php echo $aux['front'] ?>" class="form-control" placeholder="Front name..." required autofocus>
                </br>
                <label for="inputName" >Back</label>
                <input type="name" name="inputBack" value="<?php echo $aux['back'] ?>" class="form-control" placeholder="Back name..." required autofocus>
                </br>
                <button class="btn btn-lg btn-primary btn-block" type="submit">Update</button>
            </form>
        </div>
    </div>
    <br>
</div>
<?php include "footer.php" ?>
