<?php
session_start();
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
  <meta name="description" content="">
  <meta name="author" content="">
  <link rel="icon" href="../../favicon.ico">

  <title>Carousel Template for Bootstrap</title>

  <!-- Bootstrap core CSS -->
  <link href="../css/bootstrap.min.css" rel="stylesheet">

  <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
  <link href="../css/ie10-viewport-bug-workaround.css" rel="stylesheet">

  <style type="text/css">
  .marketing {
    margin-top: 40px;
  }
  </style>

  <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
  <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
  <script type="text/javascript" src="../js/main.js" charset="UTF-8"></script><script src="js/ie-emulation-modes-warning.js"></script>

  <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
      <![endif]-->

      <!-- Custom styles for this template -->
      <link href="../css/carousel.css" rel="stylesheet">
    </head>
<!-- NAVBAR
  ================================================== -->
  <body>
    <div class="navbar-wrapper">
      <div class="container">

        <nav class="navbar navbar-inverse navbar-fixed-top">
          <div class="container">
            <div class="navbar-header">
              <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
              </button>
              <a class="navbar-brand" href="home.php">Pelada do Amigão</a>
            </div>
            <div id="navbar" class="navbar-collapse collapse">
              <ul class="nav navbar-nav">
                <li><a href="home.php">Home</a></li>
                <li><a href="peladeiros.php">Peladeiros</a></li>
                <li><a href="artilharia.php">Artilharia</a></li>
                <li class="dropdown">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Mais<span class="caret"></span></a>
                  <ul class="dropdown-menu">
                    <li><a href="#">Cadastro</a></li>
                    <li><a href="#">Resenhas</a></li>
                    <li role="separator" class="divider"></li>
                    <li><a href="#fotos">Fotos</a></li>
                    <li><a href="#videos">Vídeos</a></li>
                  </ul>
                </li>
              </ul>
              <form class="navbar-form navbar-right">
                <div class="form-group">
                  <input type="text" placeholder="Usuário" class="form-control">
                </div>
                <div class="form-group">
                  <input type="password" placeholder="Senha" class="form-control">
                </div>
                <button type="submit" class="btn btn-success">Entrar</button>
              </form>
            </div>
          </div>
        </div>
      </nav>

    </div>
  </div>