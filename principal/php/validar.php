<?php
require_once 'cabecalho.php';

$hostname = "mysql.hostinger.com.br";
$username = "u954200687_ibra";
$password = "ibra2365877";
$dbname = "u954200687_amigo";

/*$hostname="localhost";
$username="root";
$password="";
$dbname="amigao";*/

$connect = mysqli_connect($hostname, $username, $password, $dbname);

if (!$connect) {
	die("Connection failed: " . mysqli_connect_error());
}


$funcao = "membro";
$nome = $_POST['nome'];
$idade = $_POST['idade'];
$usuario = $_POST['usuario'];
$senha = md5($_POST['senha']);

$sql = "SELECT usuario FROM usuarios WHERE usuario = '$usuario'";
$result = mysqli_query($connect, $sql);
$row = mysqli_num_rows($result);

if($row != 0) {
	echo "<div class='container marketing'>
		    <div class='container theme-showcase'>
		    <div id='artilharia' class='page-header'>
		    	<h4 style='margin-top: 40px;'> *** Alguém está usando o nome de usuário escolhido por você, por favor, escolha outro!! ***</h4>
        	</div>
		    </div>
		    <a href='cadastro.php'>Clique aqui para voltar à página de cadastro</a><br/><br/>
     	";
} else {
	$query = "INSERT INTO `usuarios` (`funcao`, `nome`, `idade`, `usuario`, `senha`) VALUES ('$funcao', '$nome', '$idade', '$usuario', '$senha')";
	$result = mysqli_query($connect, $query);

	if($result) {
		echo "<div class='container marketing'>
			      <div class='container theme-showcase'>
			      <div id='artilharia' class='page-header'>
			     	<h4 style='margin-top: 40px;'> Usuário cadastrado com sucesso!!</h4>
				  </div>
			      </div>
			      <a href='../index.php'>Ir para a página principal</a><br/><br/>
      		";
	}
	else {
		echo "Error: " . $query . "<br>" . mysqli_error($conn);
	}
}

mysqli_close($connect);
require_once 'rodape.php';
?>