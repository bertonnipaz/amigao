<?php
require_once 'cabecalho.php';

$servername = "localhost";
$username = "u954200687_ibra";
$password = "ibra2365877";
$dbname = "u954200687_amigo";

$connect = mysqli_connect($servername, $username, $password, $dbname);

if (!$connect) {
  die("Connection failed: " . mysqli_connect_error());
}

$sql = "SELECT peladeiro, gols FROM `artilheiros` ORDER BY gols DESC";
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
              while($array = mysqli_fetch_assoc($result)){
                $pos++;
                echo "<tr>
                        <td>". $pos ."</td>
                        <td>". $array['peladeiro'] ."</td>
                        <td>". $array['gols'] ."</td>
                      </tr>";
              }
              ?>
              </tbody>
            </table>
          </div>
        </div>
        <?php
        if(isset($_SESSION['funcao']) && $_SESSION['funcao'] == "adm"){
          echo "<a href='art_update.php'>Atualizar Tabela</a>";
        }
        ?>
      </div>
      <br>
      <br>
<?php
require_once 'rodape.php';
?>