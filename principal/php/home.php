<?php
require_once 'cabecalho.php';
?>
<!-- Carousel
    ================================================== -->
    <div id="myCarousel" class="carousel slide" data-ride="carousel">
      <!-- Indicators -->
      <ol class="carousel-indicators">
        <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
        <li data-target="#myCarousel" data-slide-to="1"></li>
        <li data-target="#myCarousel" data-slide-to="2"></li>
      </ol>
      <div class="carousel-inner" role="listbox">
        <div class="item active">
          <img class="first-slide" src="../imagens/foto_01.jpg" alt="First slide">
          <div class="container">
            <div class="carousel-caption">
              <h1>Pelada do Amigão</h1>
              <p>A pelada do Amigão retornou no dia 01/05/2016 e resgatou a sua essência, que é promover a amizade entre seus participantes.</p>
              <p><a class="btn btn-lg btn-primary" href="cadastro.php" role="button">Cadastre-se</a></p>
            </div>
          </div>
        </div>
        <div class="item">
          <img class="second-slide" src="../imagens/foto_02.jpg" alt="Second slide">
          <div class="container">
            <div class="carousel-caption">
              <h1>O Retorno do Amigão.</h1>
              <p>O retorno da pelada do amigão foi marcado pelo reencontro dos amigos que haviam deixado de frequentar a pelada por motivos diversos.</p>
              <p><a class="btn btn-lg btn-primary" href="#" role="button">Leia Mais</a></p>
            </div>
          </div>
        </div>
        <div class="item">
          <img class="third-slide" src="../imagens/foto_03.jpg" alt="Third slide">
          <div class="container">
            <div class="carousel-caption">
              <h1>Fotos e Vídeos</h1>
              <p>Confira nossa galeria para ver fotos e vídeos clicando no botão abaixo.</p>
              <p><a class="btn btn-lg btn-primary" href="fotos.php" role="button">Ver mais Fotos</a></p>
            </div>
          </div>
        </div>
      </div>
      <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
        <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
      </a>
      <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
        <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
      </a>
    </div><!-- /.carousel -->


    <!-- Marketing messaging and featurettes
    ================================================== -->
    <!-- Wrap the rest of the page in another container to center all the content. -->
    <div class="container marketing">

      <!-- Three columns of text below the carousel -->
      <div class="row">
        <div id="peladeiros" class="page-header">
          <h1>Peladeiros</h1>
        </div>
        <div class="col-lg-4">
          <img class="img-circle" src="data:image/gif;base64,R0lGODlhAQABAIAAAHd3dwAAACH5BAAAAAAALAAAAAABAAEAAAICRAEAOw==" alt="Generic placeholder image" width="140" height="140">
          <h2>Bertonni</h2>
          <p>Posição: Centro Avante. <br>
            Idade: 29 anos</p>
          <p><a class="btn btn-default" href="peladeiros.php" role="button">Ver Todos &raquo;</a></p>
        </div><!-- /.col-lg-4 -->
        <div class="col-lg-4">
          <img class="img-circle" src="data:image/gif;base64,R0lGODlhAQABAIAAAHd3dwAAACH5BAAAAAAALAAAAAABAAEAAAICRAEAOw==" alt="Generic placeholder image" width="140" height="140">
          <h2>Victor</h2>
          <p>Posição: Centro Avante. <br>
            Idade: 34 anos</p>
          <p><a class="btn btn-default" href="peladeiros.php" role="button">Ver Todos &raquo;</a></p>
        </div><!-- /.col-lg-4 -->
        <div class="col-lg-4">
          <img class="img-circle" src="data:image/gif;base64,R0lGODlhAQABAIAAAHd3dwAAACH5BAAAAAAALAAAAAABAAEAAAICRAEAOw==" alt="Generic placeholder image" width="140" height="140">
          <h2>Beethoven</h2>
          <p>Posição: Zagueiro. <br>
            Idade: 29 anos</p>
          <p><a class="btn btn-default" href="peladeiros.php" role="button">Ver Todos &raquo;</a></p>
        </div><!-- /.col-lg-4 -->
      </div><!-- /.row -->
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
                <tr>
                  <td>1</td>
                  <td>Bertonni</td>
                  <td>10</td>
                </tr>
                <tr>
                  <td>2</td>
                  <td>Emílio</td>
                  <td>9</td>
                </tr>
                <tr>
                  <td>3</td>
                  <td>Victor</td>
                  <td>8</td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
        <p><a class="btn btn-default" href="artilharia.php" role="button">Ver Tabela Completa &raquo;</a></p>
      </div>
      <br>
      <br>
<?php
require_once 'rodape.php';
?>