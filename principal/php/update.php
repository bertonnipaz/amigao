<?php
session_start();

$hostname = "mysql.hostinger.com.br";
$username = "u282775039_tonni";
$password = "amigao2005";
$dbname = "u282775039_amigo";

/*$hostname="localhost";
$username="root";
$password="";
$dbname="amigao";*/

$gols = $_POST['gols'];
$peladeiro = $_POST['peladeiro'];
$id = $_POST['id'];

$conn = mysqli_connect($hostname, $username, $password, $dbname)or die("cannot connect"); 
	
$sql = "UPDATE artilheiros SET peladeiro='$peladeiro', gols='$gols' WHERE id='$id'";
$result = mysqli_query($conn, $sql);

if($result){
	header("location: artilharia.php");
}

else {
	echo "Error";
}
mysqli_close($conn);
?>