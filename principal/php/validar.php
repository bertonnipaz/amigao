<?php

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
if(isset($_POST['idade'])){
	$idade = $_POST['idade'];
} else {
	$idade = "";
}
$usuario = $_POST['usuario'];
$senha = md5($_POST['senha']);

$sql = "SELECT usuario FROM usuarios WHERE usuario = '$usuario'";
$res = mysqli_query($connect, $sql);
$row = mysqli_num_rows($res)

if($row != 0){
	if(!isset($_SESSION['dublicate'])){
		$_SESSION['dublicate'] = "existe";
	}
} else {
	$query = "INSERT INTO `usuarios` (`funcao`, `nome`, `idade`, `usuario`, `senha`) VALUES ('$funcao', '$nome', '$idade', '$usuario', '$senha')";
	$result = mysqli_query($connect, $query);
}

if($result) {
	header("location: ../index.php");
}
else {
	echo "Error: " . $query . "<br>" . mysqli_error($conn);
}

mysqli_close($connect);
?>