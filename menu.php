<!DOCTYPE html>
<html lang="pt-BR">
  <head>
        <title>Home Page</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="css/inak.css" rel="stylesheet">
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/r/bs-3.3.5/jq-2.1.4,dt-1.10.8/datatables.min.css"/>

        <link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
        <?php
			session_start();
			if((isset ($_SESSION['user']) == true))
				$logado = $_SESSION['user'];
		?>
        <script src="js/jquery.min.js" type="text/javascript"></script>
        <script type="text/javascript" src="https://cdn.datatables.net/r/bs-3.3.5/jqc-1.11.3,dt-1.10.8/datatables.min.js"></script>
        <script type="text/javascript" charset="utf-8">
            $(document).ready(function() {
                $('#example').DataTable();
                $('#example').addClass('table table-striped table-bordered');
            } );
        </script>
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
                     <a class="navbar-brand">INAK</a>
                </div>
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                   <?php
						if((isset ($_SESSION['user']) == true)){
								?>
							<ul class="nav navbar-nav" id="navTop">
								<!-- <li><a href="">Home</a></li> -->
								<li><a href="profile.php">Account</a></li>
								<li><a href="homeDeck.php">Manage Decks</a></li>
                                <li><a href="playDecks.php">Play Decks</a></li>
							</ul>
							<ul class="nav navbar-nav navbar-right">
								<li><a ><?php echo $logado." "; ?></a></li>
								<li><a href="logout.php">Logout</a></li>
							</ul>
					<?php } ?>
                </div>
            </div>
        </nav>
