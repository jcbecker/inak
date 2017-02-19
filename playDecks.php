<?php include "menu.php" ?>
<div class="container" >
	<div class="row">
		<div class="list-group" class="listDecks">
			<?php
				require_once("database.php");
				$con = mysqli_connect($DB_HOST, $DB_USER, $DB_PASS, $DB_NAME);
				if (mysqli_connect_errno()){
					echo "Failed to connect to MySQL: " . mysqli_connect_error();
					return;
				}

				$query = "select * from deck where ownerId = '".$_SESSION['email']."'";
				$res =  mysqli_query($con, $query);
				while($aux = $res->fetch_assoc()) {
			?>
			<a href= "playDeck.php?id_deck=<?php echo $aux["id_deck"] ?>" class="list-group-item"><?php echo $aux["name"] ?> </a>
			<?php
				}
			?>
		</div>
	</div>
</div>
<?php include "footer.php" ?>
