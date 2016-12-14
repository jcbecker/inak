<?php include "menu.php";
	
	require_once("database.php");
	$con = mysqli_connect($DB_HOST, $DB_USER, $DB_PASS, $DB_NAME);
	$query = "select * from deck where id = '".$_GET['id']."'";
	$res =  mysqli_query($con, $query);
	$aux = $res->fetch_assoc();
	$var = $aux['id'];
				
?>
<script type="text/javascript">
	$(document).ready(function() {
    $('#example').DataTable( {
        columnDefs: [ {
            targets: [ 0 ],
            orderData: [ 0, 1 ]
        }, {
            targets: [ 1 ],
            orderData: [ 1, 0 ]
        }, {
            targets: [ 4 ],
            orderData: [ 4, 0 ]
        } ]
    } );
} );
			
		</script>
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
                </br>
                <button class="btn btn-lg btn-primary btn-block" type="submit">Update</button>
                <button type="button" class="btn btn-lg btn-danger btn-block" data-toggle="modal" data-target="#myModal" action="deleteDeck.php?id=<?php echo $aux['id'] ?>">Delete Deck</button>
             </form>
             <div id="myModal" class="modal fade" role="dialog">
							<div class="modal-dialog modal-sm">

								<!-- Modal content-->
								<div class="modal-content">
									<div class="modal-header">
										<button type="button" class="close" data-dismiss="modal">&times;</button>
										<h4 class="modal-title">Delete Deck</h4>
									</div>
									<div class="modal-body">
										<p>Are you sure you wanna delete your Deck?</p>
									</div>
									<div class="modal-footer">
										<button type="button" class="btn btn-default" data-dismiss="modal" onclick="javascript:window.location.href='deleteDeck.php?id=<?php echo $aux['id'] ?>';">Yes</button>
									</div>
								</div>
							</div>
						</div>
	</div>
	<div class="col-md-8">
		Lista de Cards
		<table class=".table-condensed" id="example">
			<tr>
				<th>Front</th>
				<th>Back</th> 
			</tr>
			<tr>
				<td>Dad</td>
				<td>Pai</td>
			</tr>

		</table>


	</div> 
</div>

<?php include "footer.php"; ?>