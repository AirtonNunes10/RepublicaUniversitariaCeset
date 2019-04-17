<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- As 3 metatags acima * devem * vir em primeiro lugar na cabeça; qualquer outro conteúdo principal deve vir * depois * dessas tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="img/cesertLogo.jpg">

    <title>Cesert</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Estilos personalizados para este modelo -->
    <link href="css/carousel.css" rel="stylesheet">

  </head>
<!-- NAVBAR
================================================== -->
  <body>
    
  	<div class="navbar-wrapper">
  		<div class="container">
    		<nav class="navbar navbar-inverse navbar-static-top">
      		<div class="container">
        		<div class="col-lg-5">
          			<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            			<span class="sr-only">Toggle navigation</span>
              			<span class="icon-bar"></span>
              			<span class="icon-bar"></span>
              			<span class="icon-bar"></span>
            		</button>
            		<div class="container">
            			<div class="col-lg-5"></div>
              			<a class="navbar-brand" href="index.php">Casa do Estudante de Sertânia (Cesert)</a>
            		</div>
        		</div>
        		<div id="navbar" class="navbar-collapse collapse">
          			<div class="container">
            			<div class="col-lg-5"></div>
            			<ul class="nav navbar-nav">
              				<li><a class="navbar-brand" href="login.php">Login</a></li>
            			</ul>
        			</div>
        		</div>
     		</div>
    		</nav>
  		</div>
	</div>

    <!-- Carousel
    ================================================== -->
    <div id="myCarousel" class="carousel slide" data-ride="carousel">
      <!-- Indicadores -->
      <ol class="carousel-indicators">
        <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
        <li data-target="#myCarousel" data-slide-to="1"></li>
        <li data-target="#myCarousel" data-slide-to="2"></li>
      </ol>
      <div class="carousel-inner" role="listbox">
        <div class="item active">
          <img class="first-slide" src="img/cesertMembro.jpg" alt="first slide">
          <div class="container">
            <div class="carousel-caption">
              <h1>Estudantes</h1>
                <p>Membros que moram na Cesert
                 <!--<code>file://</code> URL, the "next" and "previous" Glyphicon buttons on the left and right might not load/display properly due to web browser security rules.</p>
                 <p><a class="btn btn-lg btn-primary" href="#" role="button">Sign up today</a> -->
               </p>
            </div>
          </div>
        </div>
        <div class="item">
          <img class="second-slide" src="img/cesertTime.jpeg" alt="Second slide">
          <div class="container">
            <div class="carousel-caption">
              <h1>Cesert FC</h1>
                <p>Time da Cesert Futebol Clube. 
                  <!-- Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.</p>
                  <p><a class="btn btn-lg btn-primary" href="#" role="button">Learn more</a>  -->
                </p>
            </div>
          </div>
        </div>
        <div class="item">
          <img class="third-slide" src="img/cesertFest.jpg" alt="Third slide">
          <div class="container">
            <div class="carousel-caption">
              <h1>CesertFest</h1></font>
              <p>Festa realizada para arrecadação de fundos.</p>
              <!-- <p><a class="btn btn-lg btn-primary" href="#" role="button">Browse gallery</a></p> -->
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


    <!-- Mensagens de marketing e featurettes
    ================================================== -->
    <!-- Envolva o restante da página em outro contêiner para centralizar todo o conteúdo. -->

    <div class="container marketing">

      <!-- Três colunas de texto abaixo do carrossel-->
      <div class="row">
        <div class="col-lg-4">
          <img class="img-circle" src="img/cesertMembro.jpg" alt="Generic placeholder image" width="140" height="140">
          <h2>Estudantes</h2>
          <p>Para se tornar um membro da Casa do estudante de Sertânia (Cesert), o Estudante terá que ser obrigatoriamente residente da cidade Sertânia - PE. </p>
          <!-- <p><a class="btn btn-default" href="#" role="button">View details &raquo;</a></p> -->
        </div><!-- /.col-lg-4 -->
        <div class="col-lg-4">
          <img class="img-circle" src="img/cesertTime.jpeg" alt="Generic placeholder image" width="140" height="140">
          <h2>Cesert FC</h2>
          <p>O time Cesert Futebol Clube particia de várias campeonatos durante o ano. O mesmo é formado para disputar campeonatos de futebol de Campo e Futsal</p>
          <!-- <p><a class="btn btn-default" href="#" role="button">View details &raquo;</a></p> -->
        </div><!-- /.col-lg-4 -->
        <div class="col-lg-4">
          <img class="img-circle" src="img/cesertFest.jpg" alt="Generic placeholder image" width="140" height="140">
          <h2>CesertFest</h2>
          <p>Todo ano a cesert realiza uma festa para arrecadar fundos que serão investidos na república. E esse ano a mesma acontecerá em 20/10/2019. Estamos aguardando vocês!</p>
          <!-- <p><a class="btn btn-default" href="#" role="button">View details &raquo;</a></p> -->
        </div><!-- /.col-lg-4 -->
      </div><!-- /.row -->


      <!-- COMECE OS RECURSOS -->

      <hr class="featurette-divider">

      <div class="row featurette">
        <div class="col-md-7">
          <h2 class="featurette-heading">Fundador. <span class="text-muted">Cesert.</span></h2>
          <p class="lead">A Casa do Estudante de Sertânia (Cesert), foi fundada em 1987 pelo prefeito Alindo Ferreira dos Santos, da cidade de Sertânia que fica localizada no interior de Pernambuco a 314,3 km via BR 232 da capital pernambucana (Recife). O mesmo, teve a iniciativa de abrir está república universitária para os estudantes de baixa renda que não tinham condições de alugar algum(a) casa/apartamento na cidade do Recife - PE.</p>
        </div>
        <div class="col-md-5">
          <img class="featurette-image img-responsive center-block" src="img/cesertFundador.jpeg" data-src="holder.js/500x500/auto" alt="Generic placeholder image">
        </div>
      </div>

      <hr class="featurette-divider">

      <div class="row featurette">
        <div class="col-md-7 col-md-push-5">
          <h2 class="featurette-heading">Gestão atual. <span class="text-muted">Equipe organizadora.</span></h2>
          <p class="lead">A Cesert é gerenciada por um equipe de membro, cujo esta é dividida em cinco funções. São elas: Presidente: Samuel Magalhães, Vice - Presidente: Jose Edilberto, Secretário(a): Tayse Lira, Tesoureio(a): Laura Fernanda, Conselheiro: Paulo Filho.</p>
        </div>
        <div class="col-md-5 col-md-pull-7">
          <img class="featurette-image img-responsive center-block" src="img/cesertGestao.jpeg" data-src="holder.js/500x500/auto" alt="Generic placeholder image">
        </div>
      </div>

      <hr class="featurette-divider">

      <div class="row featurette">
        <div class="col-md-7">
          <h2 class="featurette-heading">Localização. <span class="text-muted">Cesert.</span></h2>
          <p class="lead">A casa do estudante de Sertânia (Cesert), é localizada na Rua Ricardo Salazar, Nº 182, no bairro da Madalena, na cidade de Recife - PE.</p>
        </div>
        <div class="col-md-5">
          <img class="featurette-image img-responsive center-block" src="img/cesertCasa.jpeg" data-src="holder.js/500x500/auto" alt="Generic placeholder image">
        </div>
      </div>

      <hr class="featurette-divider">

      <!-- / TERMINAR OS RECURSOS -->


      <!-- RODAPÉ -->
      <footer>
        <p class="pull-right"><a href="#">Voltar ao topo</a></p>
        <p>&copy; 2018 Casa do estudante de Sertânia. &middot; <a href="#">Cesert</a> &middot; <a href="#">Termo</a></p>
      </footer>

    </div><!-- /.container -->


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Colocado no final do documento para que as páginas sejam carregadas mais rapidamente -->
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>
