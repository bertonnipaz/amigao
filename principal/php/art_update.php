<?php
require_once 'cabecalho.php';

$hostname = "mysql.hostinger.com.br";
$username = "u`954200687_ibra";
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

$sql = "SELECT * FROM `artilheiros` ORDER BY gols DESC";
$result = mysqli_query($connect, $sql);
$pos = 0;
$idGET = $_GET['id'];
?>
    <title>Artilharia</title>
    <div class="container marketing">

      <div class="container theme-showcase" role="main">
        <div id="artilharia" class="page-header">
          <h1>Artilharia</h1>
        </div>

        <div class="row">
          <div class="col-md-6">
              <form action="update.php" method="POST">
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
                $id = $array['id'];
                $peladeiro = $array['peladeiro'];
                $gols = $array['gols'];

                if($idGET == $id){
                  echo "<tr>
                          <td>{$pos}</td>
                          <td>
                            <input type='text' name='peladeiro' value='{$peladeiro}'>
                          </td>
                          <td>
                            <input type='text' name='gols' value='{$gols}'>
                          </td>
                          <td>
                            <input name='id' type='hidden' id='id' value='{$id}'>
                          </td>
                        </tr>";
                } else {
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
              <button type="submit" class="btn btn-primary" name="salvar">Salvar</button>
              </form>
          </div>
        </div>
      </div>
      <br>
      <br>
<?php
require_once 'rodape.php';
?>