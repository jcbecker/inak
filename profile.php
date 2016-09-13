<?php include "menu.php"; ?>
        <div  >
            <div class="container showHome" id ="profile">
                <div class="row">
                    <div class="col-md-12" id = "profile_body">
                        <div   id = "profile_img">
							<!--<img src="..." alt="..." class="img-circle"> Carrega a imagem em circulo-->
                            <img src ="img/user.png"/ width="100%" height="100%">	
                        </div>
                        <div id = "profile_text">
                            <p>Nick: Marcelinho Bug</p>
                            <p>E-mail: <?php echo $logado." "; ?></p>
                            <p>Decks: 333</p>
                        </div>
                        <button class="btn btn-lg btn-primary btn-block" type="submit">Edit account</button>
						<!-- Trigger the modal with a button -->
						<button type="button" class="btn btn-lg btn-primary btn-block" data-toggle="modal" data-target="#myModal" action="delete_account.php">Delete account</button>
						
						<!-- Modal -->
						<div id="myModal" class="modal fade" role="dialog">
							<div class="modal-dialog modal-sm">

								<!-- Modal content-->
								<div class="modal-content">
									<div class="modal-header">
										<button type="button" class="close" data-dismiss="modal">&times;</button>
										<h4 class="modal-title">Delete account</h4>
									</div>
									<div class="modal-body">
										<p>Are you sure you wanna delete your account?</p>
									</div>
									<div class="modal-footer">
										<button type="button" class="btn btn-default" data-dismiss="modal">Yes</button>
									</div>
								</div>
							</div>
						</div>
                    </div>
                </div>
            </div>
        </div>
   

<?php include "footer.php"; ?>
