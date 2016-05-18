<?php

$servername = "server56.hostinger.com";
$username = "ibra";
$password = "ibra2365877";
$dbname = "amigo";

$connect = mysqli_connect($servername, $username, $password, $dbname);

if (!$connect) {
	die("Connection failed: " . mysqli_connect_error());
}

$funcao = "membro";
$nome = $_POST['nome'];
if(isset($_POST['idade'])){
	$idade = $_POST['idade'];
} else {
	$idade = "";
}
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