<!DOCTYPE html>
<html lang="pt-BR">
  <head>
        <title>Home Page</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="css/inak.css" rel="stylesheet">
        <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  </head>
  <body>
        <nav class="navbar navbar-inverse navbar-fixed-top">
            <div class="container">
                <div class="navbar-header">
                     <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                         <span class="sr-only">Toggle navigation</span>
                         <span class="icon-bar"></span>
                         <span class="icon-bar"></span>
                         <span class="icon-bar"></span>
                     </button>
                     <a class="navbar-brand" href="#">INAK</a>
                </div>
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav">
                        <li><a href="#">Home</a></li>
                        <li class="active"><a href="#">Account<span class="sr-only">(current)</span></a></li>
                        <li><a href="#">Decks</a></li>
                    </ul>
                    <ul class="nav navbar-nav navbar-right">
                        <li><a href="#">Logout</a></li>
                    </ul>
                </div>
            </div>
        </nav>
        <div class="jumbotron">
            <div class="container showHome" id ="profile">
                <div class="row">
                    <div class="col-md-12" id = "profile_body">
                        <div   id = "profile_img">
                            <img src ="img/user.png"/ width="100%" height="100%">
                        </div>
                        <div id = "profile_text">
                            <p>Nick: Marcelinho Bug</p>
                            <p>E-mail: marcelinho@gmail.uy</p>
                            <p>Decks: 333</p>
                        </div>
                        <button class="btn btn-lg btn-primary btn-block" type="submit">Editar conta</button>
                        <button class="btn btn-lg btn-primary btn-block" type="submit">Excluir conta</button>
                    </div>
                </div>
            </div>
        </div>
        <hr>

        <footer>
          <p>&copy; 2016 INAK, Inc .</p>
        </footer>
    </body>
</html>
