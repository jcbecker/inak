<!DOCTYPE html>
<html lang="pt-BR">
  <head>
        <title>Home Page</title>
        <meta charset="UTF-8">
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <link href="css/inak.css" rel="stylesheet">
  </head>
  <body>
        <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">INAK</a>
        </div>
      </div>
    </nav>

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

      <footer>
        <p>&copy; 2016 INAK, Inc .</p>
      </footer>
  </div> <!-- /container -->


  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  </body>

</html>
