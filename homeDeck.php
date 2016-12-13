<?php include "menu.php"?>
	<div class="container" >
	 <p><a class="btn btn-primary btn-md" href="createDeck.php" role="button">Create Deck</a></p>
		<div class="row">
			<div class="list-group" class="listDecks">
			<?php 
				require_once("database.php");
				$con = mysqli_connect($DB_HOST, $DB_USER, $DB_PASS, $DB_NAME);
					if (mysqli_connect_errno())
						{
							echo "Failed to connect to MySQL: " . mysqli_connect_error();
							return;
						}
						/*
						$query = "INSERT INTO deck (name,shared,ownerId) VALUES ('".$name."','".$shared."','".$idUserDeck."')";
						$res = mysqli_query($con, $query);
						*/
						$query = "select * from deck where ownerId = '".$_SESSION['email']."'";
						$res =  mysqli_query($con, $query);
						while($aux = $res->fetch_assoc()) {
								?>
			<a href="changeDeck.php?id=<?php echo $aux["id"] ?>" class="list-group-item"><?php echo $aux["name"] ?>  <span class="badge">1</span></a>
								<?php 
									} 
								?>
						</div>
		</div>
	</div>
<?php include "footer.php" ?>
