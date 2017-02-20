<?php include "menu.php" ?>
<div class="container" >
	<p><a class="btn btn-primary btn-md" href="createDeck.php" role="button">Create Deck</a></p>
	<div class="row">
		<div class="list-group" class="listDecks">
			<?php
				require_once("database.php");
				$con = mysqli_connect($DB_HOST, $DB_USER, $DB_PASS, $DB_NAME);
				if (mysqli_connect_errno()){
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
					$queryCount = "select count(id) as qtd from card where id_deck = '".$aux["id_deck"]."'";
					$result =  mysqli_query($con, $queryCount);

					$valor = $result->fetch_assoc();
			?>
			<a href= "changeDeck.php?id_deck=<?php echo $aux["id_deck"] ?>" class="list-group-item"><?php echo $aux["name"] ?> <span class="badge"><?php echo $valor["qtd"] ?></span></a></a>
			<?php
				}
			?>
		</div>
	</div>
</div>
<?php include "footer.php" ?>
