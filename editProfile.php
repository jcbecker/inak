<?php include "menu.php"; 
	session_start();
	
	if((!isset ($_SESSION['user']) == true)){
		header('Location: index.php');
	}
?>
        <div  >
            <div class="container showHome" id ="profile">
                <div class="row">
                    <div class="col-md-12" id = "profile_body">
                        <div   id = "profile_img">
							<!--<img src="..." alt="..." class="img-circle"> Carrega a imagem em circulo-->
                            <img src ="userPicture/<?php echo $_SESSION['picture']?>"/ width="100%" height="100%">	
                            <br><br>
                        </div>
                        
                        <form method="post" action="processChange.php">
							Nick:<input type="text" name="inputUserName" class="form-control" value="<?php echo $_SESSION['user']." "; ?>" required>
							E-mail:<input type="text" name="inputEmail" class="form-control" value="<?php echo $_SESSION['email']." "; ?>" required>
							<button type="submit" class="btn btn-lg btn-primary btn-block">Save changes</button>
                        </form>
						
                    </div>
                </div>
            </div>
        </div>
   

<?php include "footer.php"; ?>
