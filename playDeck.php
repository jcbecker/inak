<?php include "menu.php";
	require_once("database.php");
	$con = mysqli_connect($DB_HOST, $DB_USER, $DB_PASS, $DB_NAME);
	$query = "select * from deck where id_deck = '".$_GET['id_deck']."'";
	$res =  mysqli_query($con, $query);
	$aux = $res->fetch_assoc();
?>
<div class="container" style="margin-bottom:50px;">
	<h2><span class="label label-primary"><?php echo $aux['name'] ?> </span></h2>
	<div class="row">
		<div class="col-md-6" id ="profile_body" style="margin-top:50px;">
			<div class="panel panel-default">
  					<div class="panel-body">
   					 Conteúdo
  					</div>
			</div>
			<div class="btn-group btn-group-justified" role="group" aria-label="...">
  				<div class="btn-group" role="group">
    				<button type="button" class="btn btn-default">Easy</button>
  				</div>
  			<div class="btn-group" role="group">
    				<button type="button" class="btn btn-default">Middle</button>
  				</div>
  			<div class="btn-group" role="group">
    			<button type="button" class="btn btn-default">Hard</button>
  			</div>
			</div>
		</div>
	</div>
</div>
<?php include "footer.php"; ?>
