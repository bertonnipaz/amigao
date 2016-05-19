<?php
require_once 'cabecalho.php';

unset($_SESSION['duplicate']);
$servername = "mysql.hostinger.com.br";
$username = "u954200687_ibra";
$password = "ibra2365877";
$dbname = "u954200687_amigo";

/*$hostname="localhost";
$username="root";
$password="";
$dbname="amigao";*/

$connect = mysqli_connect($servername, $username, $password, $dbname);

if (!$connect) {
	die("Connection failed: " . mysqli_connect_error());
}

$funcao = "membro";
$nome = $_POST['nome'];
$idade = $_POST['idade'];
$usuario = $_POST['usuario'];
$senha = md5($_POST['senha']);

$sql = "SELECT usuario FROM usuarios WHERE usuario = '$usuario'";
$res = mysqli_query($connect, $sql);

if($row = mysqli_num_rows($res)){
	if($row != 0){
		if(!isset($_SESSION['dublicate'])){
			$_SESSION['dublicate'] = "existe";
			echo "<div class='container marketing'>";
			echo "<div class='page-header'>
          			<h5 style='color: red;'>*** Alguém está usando o nome de usuário escolhido, por favor, escolha outro!! ***</h5>
          		  </div><br/>/<br/>";
			echo "<a href='cadastro.php'>Clique aqui para voltar à página de cadastro</a>";
		}
	}
} else {
	$query = "INSERT INTO `usuarios` (`funcao`, `nome`, `idade`, `usuario`, `senha`) VALUES ('$funcao', '$nome', '$idade', '$usuario', '$senha')";
	$result = mysqli_query($connect, $query);
}

if($result) {
	echo "<div class='container marketing'>";
	echo "<div class='page-header'>
          	<h5>Usuário cadastrado com sucesso</h5>
          </div><br/>/<br/>";
	echo "<a href='../index.php'>Clique aqui para voltar à página principal</a>";
}
else {
	echo "Error: " . $query . "<br>" . mysqli_error($connect);
}

mysqli_close($connect);

require_once 'rodape.php';
?>