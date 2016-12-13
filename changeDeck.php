<?php include "menu.php";
	
	require_once("database.php");
	$con = mysqli_connect($DB_HOST, $DB_USER, $DB_PASS, $DB_NAME);
	$query = "select * from deck where id = '".$_GET['id']."'";
	$res =  mysqli_query($con, $query);
	$aux = $res->fetch_assoc();
	$var = $aux['id'];
				
?>
<div class="container">
	<div class="row"> 
	<div class="col-md-4">
		Edição de Deck:
		<h2>Deck</h2>
              <form class="form-signin" action="updateDeck.php" method="POST">
                <label for="inputName" >Name</label>
                <input type="name" name="inputName" value="<?php echo $aux['name'] ?>"class="form-control" placeholder="Deck name..." required autofocus>
                </br>
                <label for="inputShared" >Shared</label>
               </br>
                Não
               <input type="checkbox" name="inputShared" class="form-control" value="0" 
				<?php echo ($aux['shared'] == 0) ? "checked": "" ?>
				>
               </br>
               Sim
               <input type="checkbox" name="inputShared" class="form-control" value="1" 
               	<?php echo ($aux['shared'] == 1) ? "checked": "" ?>
               >
                <input type="hidden" name="id" value="<?php echo $aux['id'] ?>"  />
                <button class="btn btn-lg btn-primary btn-block" type="submit">Update</button>
             </form>
	</div>
	<div class="col-md-8">
		Lista de Cards

	</div> 
</div>

<?php include "footer.php"; ?>