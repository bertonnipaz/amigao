<?php
require_once 'cabecalho.php';

/*$hostname = "mysql.hostinger.com.br";
$username = "u954200687_ibra";
$password = "ibra2365877";
$dbname = "u954200687_amigo";*/

$hostname="localhost";
$username="root";
$password="";
$dbname="amigao";

$connect = mysqli_connect($hostname, $username, $password, $dbname);

if (!$connect) {
  die("Connection failed: " . mysqli_connect_error());
}

$sql = "SELECT * FROM `artilheiros` ORDER BY gols DESC";
$result = mysqli_query($connect, $sql);
$pos = 0;
?>
    <title>Artilharia</title>
    <div class="container marketing">

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
              if(isset($_SESSION['funcao']) && $_SESSION['funcao'] == "adm"){
                while($array = mysqli_fetch_assoc($result)){
                  $pos++;
                  $id = $array['id'];
                  echo "<tr>
                          <td>". $pos ."</td>
                          <td>". $array['peladeiro'] ."</td>
                          <td>". $array['gols'] ."</td>
                          <td>
                            <a href='art_update.php?id=". $id ."' title='Editar'>&#9998</a>
                          </td>
                        </tr>";
                }
              } else {
                while($array = mysqli_fetch_assoc($result)){
                  $pos++;
                  echo "<tr>
                          <td>". $pos ."</td>
                          <td>". $array['peladeiro'] ."</td>
                          <td>". $array['gols'] ."</td>
                        </tr>";
                }
              }
              ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
      <br>
      <br>
<?php
require_once 'rodape.php';
?>