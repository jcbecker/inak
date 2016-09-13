<?php include "menu.php"; ?>

     <div class="jumbotron">
      <div class="container showHome">
        <h1>Welcome to INAK!</h1>
        <p style="text-align:justify">

Here you can learn using Flash Cards . Based TWO Fundamentals structures , which are decks ( platforms) and the card ( cards). CARDS THE INFORMATION What are like wish memorize texts may be , Images , mental maps .</p>
      </div>
    </div>

       <div class="container">
      <!-- Example row of columns -->
      <div class="row">
        <div class="col-md-6">
          <h2>LOGIN</h2>
              <form class="form-signin" action="login.php" method="POST">
                <label for="inputEmail" class="sr-only">E-mail</label>
                <input type="email" name="inputEmail" class="form-control" placeholder="Email address" required autofocus>
                <label for="inputPassword" class="sr-only">Password</label>
               <input type="password" name="inputPassword" class="form-control" placeholder="Password" required>
                <button class="btn btn-lg btn-primary btn-block" type="submit">LOGIN</button>
             </form>
        </div>
        <div class="col-md-6">
          <h2>REGISTRAR-SE</h2>
           <form class="form-signin" action="validateRegister.php" method="POST">
                <label for="inputEmail" class="sr-only"> E-mail</label>
                <input type="email" name="inputEmail" class="form-control" placeholder="Email address" required autofocus>
                <label for="inputPassword" class="sr-only">Passwd</label>
               <input type="password" name="inputPassword" class="form-control" placeholder="Password" required>
                <button class="btn btn-lg btn-primary btn-block" type="submit">SIGN IN</button>
             </form>
       </div>
      </div>

      <hr>

<?php include "footer.php"; ?>
