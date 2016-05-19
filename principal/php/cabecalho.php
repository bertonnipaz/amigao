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

  <!-- Bootstrap core CSS -->
  <link href="../css/bootstrap.min.css" rel="stylesheet">

  <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
  <link href="../css/ie10-viewport-bug-workaround.css" rel="stylesheet">

  <script src="js/jquery-1.12.0.min.js"></script>
  <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery.min.js"><\/script>')</script>
  <script src="js/bootstrap.min.js"></script>

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
              <a class="navbar-brand" href="../index.php">Pelada do Amigão</a>
            </div>
            <div id="navbar" class="navbar-collapse collapse">
              <ul class="nav navbar-nav">
                <li><a href="../index.php">Home</a></li>
                <li><a href="peladeiros.php">Peladeiros</a></li>
                <li><a href="artilharia.php">Artilharia</a></li>
                <li class="dropdown">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Mais<span class="caret"></span></a>
                  <ul class="dropdown-menu">
                    <li><a href="cadastro.php">Cadastro</a></li>
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
                echo "<span style='color: white; margin-top: 1%;' class='navbar-form navbar-right'>Bem vindo, <b>" . $_SESSION['usuario'] . "</b>!! </span>";
              }
              if(isset($_POST['logout'])) {
                unset($_SESSION['usuario']);
                unset($_SESSION['funcao']);
                header("location: ../index.php");
              }
              ?>
            </div>
          </div>
        </div>
      </nav>

    </div>
  </div>
  <?php
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

            // Checa se o número de linhas retornadas da consulta é diferente de zero. Se verdadeiro, redireciona para a página "home.php"
            if($row != 0) {
                header("location: ../index.php");
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