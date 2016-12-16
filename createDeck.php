<?php include "menu.php"; ?>
<div class="container">
    <div class="row">
        <div class="col-md-4" id = "profile_body">
            <h2 align="center">Create Deck</h2>
            <form class="form-signin" action="insertDeck.php?id=idUserOwnerDeck" method="POST">
                <label for="inputName" >Name</label>
                <input type="name" name="inputName" class="form-control" placeholder="Deck name..." required autofocus>
                </br>
                <label for="inputShared" >Shared</label>
                </br>
                Não
                <input type="checkbox" name="inputShared" class="form-control" value="0">
                </br>
                Sim
                <input type="checkbox" name="inputShared" class="form-control" value="1">
                <input type="hidden" name="IdUserEmail" value="<?php echo $_SESSION['email'] ?>"  />
                <button class="btn btn-lg btn-primary btn-block" type="submit">Create</button>
            </form>
        </div>
    </div>
</div>
<hr>
<?php include "footer.php"; ?>
