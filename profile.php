<?php
	include "menu.php";
	if((!isset ($_SESSION['user']) == true))
		header('Location: index.php');
?>
<div class="container showHome" id ="profile">
	<div class="row">
		<div class="col-md-12" id = "profile_body">
			<div id="profile_img">
				<img src ="userPicture/<?php echo $_SESSION['picture']?>"/ width="100%" height="100%" class="img-circle">
			</div>
			<div id = "profile_text">
				<p><b>Nick:</b> <?php echo $_SESSION['user']." "; ?></p></p>
				<p><b>E-mail:</b> <?php echo $_SESSION['email']." "; ?></p>
				<!-- <p><b>Decks:</b> 333</p> -->
			</div>
			<button class="btn btn-lg btn-primary btn-block" onclick="window.location.href='editProfile.php'">Edit Account</button>
			<!-- Trigger the modal with a button -->
			<button type="button" class="btn btn-lg btn-primary btn-block" data-toggle="modal" data-target="#myModal" action="delete_account.php">Delete account</button>
			<!-- Modal -->
			<div id="myModal" class="modal fade" role="dialog">
				<div class="modal-dialog modal-sm">
					<!-- Modal content-->
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal">&times;</button>
							<h4 class="modal-title">Delete Account</h4>
						</div>
						<div class="modal-body">
							<p>Are you sure you wanna delete your account?</p>
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-default" data-dismiss="modal" onclick="javascript:window.location.href='delete_account.php';">Yes</button>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<?php include "footer.php"; ?>
