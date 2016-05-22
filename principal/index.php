<?php
session_start();

if(isset($_POST['enviar'])) {
    $user = $_POST['usuario'];      // Salva o conteúdo do input name="usuario" do form de login na variável $user
    $pass = md5($_POST['senha']);   // Salva o conteúdo do input name="senha" do form de login na variável $pass
    
    // Salva os dados do servidor, usuario, senha e nome do banco de dados para fazer a conexão

    $hostname = "mysql.hostinger.com.br";
    $username = "u954200687_ibra";
    $password = "ibra2365877";
    $dbname = "u954200687_amigo";

    /*$hostname="localhost";
    $username="root";
    $password="";
    $dbname="amigao";*/

    $connect = mysqli_connect($hostname, $username, $password, $dbname);    // Faz a conexão com o banco de dados

    // consulta para puxar do banco usuario e senha que sejam iguais aos digitados no form de login

    $query = "SELECT senha, usuario, funcao FROM usuarios WHERE usuario='$user' AND senha='$pass'";
    $result = mysqli_query($connect, $query);      // Executa a query e salva o resultado

    // Checa se houve resultado da consulta
    if($result){
        $arr = mysqli_fetch_assoc($result);     // Transforma o resultado da consulta em um array associativo (os índices são as colunas da tabela 'usuarios')
        $row = mysqli_num_rows($result);        // Recebe o número de linhas retornadas da consulta ao banco

        if($arr['funcao'] == "adm"){
          if(!isset($_SESSION['funcao'])){
           $_SESSION['funcao'] = "adm";
           $funcao = "adm";
         } else {
           $funcao = $_SESSION['funcao'];
         }
       }
        // Checa se o usuário e senha digitados no form de login são iguais aos que estão salvos no banco de dados
       if($user == $arr['usuario'] && $pass == $arr['senha']){
                // Se verdadeiro, salva o usuário na sessão
        $_SESSION['usuario'] = $user;
      }

        // Checa se o número de linhas retornadas da consulta é diferente de zero. Se verdadeiro, redireciona para a página "index.php"
      if($row != 0) {
        header("location: index.php");
      }

        // Senão, exibe um alerta para o usuário
      else {
        echo "<script>
        alert('Usuário ou senha incorretos!!');
        </script>";
      }
    }
    // Encerra a conexão com o banco de dados
    mysqli_close($connect);
  }
  ?>
  <!DOCTYPE html>
  <html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="Bertonni">
    <link rel="shortcut icon" href="imagens/amigao.jpg"/>

    <title>Pelada do Amigão</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <link href="css/ie10-viewport-bug-workaround.css" rel="stylesheet">

    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <script type="text/javascript" src="js/main.js" charset="UTF-8"></script><script src="js/ie-emulation-modes-warning.js"></script>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
      <![endif]-->

      <!-- Custom styles for this template -->
      <link href="css/carousel.css" rel="stylesheet">
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
              <a class="navbar-brand" href="#">Pelada do Amigão</a>
            </div>
            <div id="navbar" class="navbar-collapse collapse">
              <ul class="nav navbar-nav">
                <li><a href="#">Home</a></li>
                <li><a href="#peladeiros">Peladeiros</a></li>
                <li><a href="#artilharia">Artilharia</a></li>
                <li class="dropdown">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Mais<span class="caret"></span></a>
                  <ul class="dropdown-menu">
                    <li><a href="php/cadastro.php">Cadastro</a></li>
                    <li><a href="#">Resenhas</a></li>
                    <li role="separator" class="divider"></li>
                    <li><a href="#fotos">Fotos</a></li>
                    <li><a href="#videos">Vídeos</a></li>
                  </ul>
                </li>
              </ul>
              <?php
              if(!isset($_SESSION['usuario'])){
                ?>
                <form class="navbar-form navbar-right" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST">
                  <div class="form-group">
                    <input type="text" placeholder="Usuário" name="usuario" class="form-control" required>
                  </div>
                  <div class="form-group">
                    <input type="password" placeholder="Senha" name="senha" class="form-control" required>
                  </div>
                  <button type="submit" class="btn btn-success" name="enviar">Entrar</button>
                </form>
                <?php
              } else {

                ?>
                <form class="navbar-form navbar-right" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST">
                  <button class="btn btn-success" style="float: right;" type="submit" name="logout">Logout</button>
                </form>
                <?php
                // echo "<span style='color: white; margin-top: 1%;' class='navbar-form navbar-right'>Bem vindo, <b>" . $_SESSION['usuario'] . "</b>!! </span>";
                echo "<div class='navbar-right' style='margin-top: 1%; color: white;'>Bem vindo, <b>" . $_SESSION['usuario'] . "</b>!!</div>";
              }
              if(isset($_POST['logout'])) {
                unset($_SESSION['usuario']);                
                unset($_SESSION['funcao']);                
                header("location: index.php");
              }
              ?>
            </div>
          </div>
        </div>
      </nav>

    </div>
  </div>


    <!-- Carousel
    ================================================== -->
    <div id="myCarousel" class="carousel slide" data-ride="carousel">
      <!-- Indicators -->
      <ol class="carousel-indicators">
        <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
        <li data-target="#myCarousel" data-slide-to="1"></li>
        <li data-target="#myCarousel" data-slide-to="2"></li>
      </ol>
      <div class="carousel-inner" role="listbox">
        <div class="item active">
          <img class="first-slide" src="imagens/foto_01.jpg" alt="First slide">
          <div class="container">
            <div class="carousel-caption">
              <h1>Pelada do Amigão</h1>
              <p>A pelada do Amigão retornou no dia 01/05/2016 e resgatou a sua essência, que é promover a amizade entre seus participantes.</p>
              <p><a class="btn btn-lg btn-primary" href="php/cadastro.php" role="button">Cadastre-se</a></p>
            </div>
          </div>
        </div>
        <div class="item">
          <img class="second-slide" src="imagens/foto_02.jpg" alt="Second slide">
          <div class="container">
            <div class="carousel-caption">
              <h1>O Retorno do Amigão.</h1>
              <p>O retorno da pelada do amigão foi marcado pelo reencontro dos amigos que haviam deixado de frequentar a pelada por motivos diversos.</p>
              <p><a class="btn btn-lg btn-primary" href="#" role="button">Leia Mais</a></p>
            </div>
          </div>
        </div>
        <div class="item">
          <img class="third-slide" src="imagens/foto_03.jpg" alt="Third slide">
          <div class="container">
            <div class="carousel-caption">
              <h1>Fotos e Vídeos</h1>
              <p>Confira nossa galeria para ver fotos e vídeos clicando no botão abaixo.</p>
              <p><a class="btn btn-lg btn-primary" href="#" role="button">Ver mais Fotos</a></p>
            </div>
          </div>
        </div>
      </div>
      <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
        <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
      </a>
      <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
        <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
      </a>
    </div><!-- /.carousel -->


    <!-- Marketing messaging and featurettes
    ================================================== -->
    <!-- Wrap the rest of the page in another container to center all the content. -->
    <div class="container marketing">

      <!-- Three columns of text below the carousel -->
      <div class="container theme-showcase" role="main">
        <div id="peladeiros" class="page-header">
          <h1>Peladeiros</h1>
        </div>
        <div class="col-lg-4">
          <img class="img-circle" src="data:image/gif;base64,R0lGODlhAQABAIAAAHd3dwAAACH5BAAAAAAALAAAAAABAAEAAAICRAEAOw==" alt="Generic placeholder image" width="140" height="140">
          <h2>Bertonni</h2>
          <p>Posição: Atacante. <br>
            Idade: 29 anos</p>
            <p><a class="btn btn-default" href="php/peladeiros.php" role="button">Ver Todos &raquo;</a></p>
          </div><!-- /.col-lg-4 -->
          <div class="col-lg-4">
            <img class="img-circle" src="data:image/gif;base64,R0lGODlhAQABAIAAAHd3dwAAACH5BAAAAAAALAAAAAABAAEAAAICRAEAOw==" alt="Generic placeholder image" width="140" height="140">
            <h2>Victor</h2>
            <p>Posição: Atacante. <br>
              Idade: 34 anos</p>
              <p><a class="btn btn-default" href="php/peladeiros.php" role="button">Ver Todos &raquo;</a></p>
            </div><!-- /.col-lg-4 -->
            <div class="col-lg-4">
              <img class="img-circle" src="data:image/gif;base64,R0lGODlhAQABAIAAAHd3dwAAACH5BAAAAAAALAAAAAABAAEAAAICRAEAOw==" alt="Generic placeholder image" width="140" height="140">
              <h2>Beethoven</h2>
              <p>Posição: Zagueiro. <br>
                Idade: 29 anos</p>
                <p><a class="btn btn-default" href="php/peladeiros.php" role="button">Ver Todos &raquo;</a></p>
              </div><!-- /.col-lg-4 -->
            </div><!-- /.container theme-showcase -->
            <?php
            $hostname = "mysql.hostinger.com.br";
            $username = "u954200687_ibra";
            $password = "ibra2365877";
            $dbname = "u954200687_amigo";

            /*$hostname="localhost";
            $username="root";
            $password="";
            $dbname="amigao";*/

        $connect = mysqli_connect($hostname, $username, $password, $dbname);    // Faz a conexão com o banco de dados
        
        $sql = "SELECT peladeiro, gols FROM `artilheiros` ORDER BY gols DESC";
        $result = mysqli_query($connect, $sql);
        $pos = 0;
        ?>
        <div class="container theme-showcase" role="main">
          <div id="artilharia" class="page-header">
            <h1>Artilharia</h1>
          </div>
          <div class="row">
            <div class="col-md-6">
              <table class="table table-striped">
                <thead>
                  <tr>
                    <th>#</th>
                    <th>Nome</th>
                    <th>Gols</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  while($array = mysqli_fetch_assoc($result)){
                    $pos++;
                    echo "<tr>
                    <td>". $pos ."</td>
                    <td>". $array['peladeiro'] ."</td>
                    <td>". $array['gols'] ."</td>
                    </tr>";
                    if($pos == 4) {
                      break;
                    }
                  }
                  mysqli_close($connect);
                  ?>
                </tbody>
              </table>
            </div>
          </div>
          <p><a class="btn btn-default" href="php/artilharia.php" role="button">Ver Tabela Completa &raquo;</a></p>
        </div>
        <br>
        <br>
        <!-- FOOTER -->
        <footer>
          <p class="pull-right"><a href="#">Ir para o topo</a></p>
          <p>&copy; 2005 Pelada do Amigão.</p>
        </footer>

      </div><!-- /.container -->

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="js/jquery-1.12.0.min.js"></script>
    <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery.min.js"><\/script>')</script>
    <script src="js/bootstrap.min.js"></script>
  </body>
  </html>