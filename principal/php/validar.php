<?php

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

$query = "INSERT INTO `usuarios` (`funcao`, `nome`, `idade`, `usuario`, `senha`) VALUES ('$funcao', '$nome', '$idade', '$usuario', '$senha')";
$result = mysqli_query($connect, $query);

if($result) {
	header("location: ../index.php");
}
else {
	echo "Error: " . $query . "<br>" . mysqli_error($conn);
}

mysqli_close($connect);
?>