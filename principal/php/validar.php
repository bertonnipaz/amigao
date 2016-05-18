<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "amigao";

$connect = mysqli_connect($servername, $username, $password, $dbname);

if (!$connect) {
	die("Connection failed: " . mysqli_connect_error());
}

$nome = $_POST['nome'];
$usuario = $_POST['usuario'];
if(isset($_POST['nasc'])){
	$nasc = $_POST['nasc'];
} else {
	$nasc = "";
}
$senha = md5($_POST['senha']);

$query = "INSERT INTO `usuarios` (`nome`, `idade`, `usuario`, `senha`) VALUES ('$nome', '$idade', '$usuario', '$senha')";
$result = mysqli_query($connect, $query);

if($result) {
	header("location: ../index.php");
}
else {
	echo "Error: " . $query . "<br>" . mysqli_error($conn);
}

mysqli_close($connect);
?>