<?php include "menu.php";
	require_once("database.php");
	$con = mysqli_connect($DB_HOST, $DB_USER, $DB_PASS, $DB_NAME);
	$query = "select * from deck where id_deck = '".$_GET['id_deck']."'";
	$res =  mysqli_query($con, $query);
	$aux = $res->fetch_assoc();
?>
<div class="container">
	<div class="row">
		<div class="col-md-4">
			<h2>Deck</h2>
			<form class="form-signin" action="updateDeck.php" method="POST">
				<label for="inputName" >Name</label>
				<input type="name" name="inputName" value="<?php echo $aux['name'] ?>" class="form-control" placeholder="Deck name..." required autofocus>
				</br>
				<input type="hidden" name="id_deck" value="<?php echo $aux['id_deck'] ?>" >
				</br>
				<button class="btn btn-lg btn-primary btn-block" type="submit">Update</button>
				<button type="button" class="btn btn-lg btn-danger btn-block" data-toggle="modal" data-target="#myModal" action="deleteDeck.php?id=<?php echo $aux['id'] ?>">Delete Deck</button>
			</form>
			<div id="myModal" class="modal fade" role="dialog">
				<div class="modal-dialog modal-sm">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal">&times;</button>
							<h4 class="modal-title">Delete Deck</h4>
						</div>
						<div class="modal-body">
							<p>Are you sure you wanna delete your Deck?</p>
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-default" data-dismiss="modal" onclick="javascript:window.location.href='deleteDeck.php?id_deck=<?php echo $aux['id_deck'] ?>';">Yes</button>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="col-md-8">
			<a class="btn btn-lg btn-primary btn-block" href="createCard.php?id_deck=<?php echo $aux['id_deck'] ?>" >Add Card</a>
			</br>
			<table class=".table-condensed" id="example">
				<thead>
					<tr>
						<th>Front</th>
						<th>Back</th>
						<th></th>
						<th></th>
					</tr>
				</thead>
				<tbody>
					<?php
						$query2 = "select * from card where id_deck = '".$aux['id_deck']."'";
						$res2 =  mysqli_query($con, $query2);
						while($aux2 = $res2->fetch_assoc()) {
					?>
					<tr>
						<td><?php echo $aux2["front"] ?></td>
						<td><?php echo $aux2["back"] ?></td>
						<td><a href="updateCard.php?id=<?php echo $aux2["id"]?>">Update</a></td>
						<td><a href="deleteCard.php?id=<?php echo $aux2["id"]?>&id_deck=<?php echo $aux["id_deck"]?>">Delete</a></td>
					</tr>
					<?php } ?>
				</tbody>
			</table>
		</div>
	</div>
</div>
<?php include "footer.php"; ?>
