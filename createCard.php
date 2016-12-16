<?php include "menu.php"; ?>
<div class="container">
    <div class="row">
        <div class="col-md-4" id ="profile_body">
            <h2 align="center">Card</h2>
            <form class="form-signin" action="insertCard.php" method="POST">
                <label for="inputName" >Front</label>
                <input type="name" name="inputFront" class="form-control" placeholder="Front name..." required autofocus>
                </br>
                <label for="inputName" >Back</label>
                <input type="name" name="inputBack" class="form-control" placeholder="Back name..." required autofocus>
                </br>
                <input type="hidden" name="id_deck" value="<?php echo $_GET['id_deck'] ?>"  />
                <button class="btn btn-lg btn-primary btn-block" type="submit">Create</button>
            </form>
        </div>
    </div>
    <br>
</div>
<?php include "footer.php" ?>
