<?php

include_once __DIR__."../app_university_republic/validador_acesso.php";

?>

<nav class="navbar navbar-inverse navbar-fixed-top">
  <div class="container">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
        <a class="navbar-brand" href="index.php" title="Site da Cesert" target="_blank">Cesert</a>
    </div>
    <div id="navbar" class="collapse navbar-collapse">
      <ul class="nav navbar-nav">
        <li class="active"><a href="principal.php" title="Página inicial">Home</a></li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Sistema <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="curso.php">Curso</a></li>
            <?php if($_SESSION['usuario_perfil'] == 1 || $_SESSION['usuario_perfil'] == 4) { ?>
              <li><a href="enviarEmail.php">Enviar email</a></li>
            <?php } ?>
            <li><a href="financas.php">Finanças</a></li>
            <li><a href="locacaoEstudante.php">Locar Estudante</a></li>
            <li><a href="usuario.php">Usuário</a></li>
            <li role="separator" class="divider"></li>
            <li class="dropdown-header">Sites Informativos</li>
            <li><a href="http://www.casadoestudantepe.org.br/" title="Site da Casa do estudante de Pernambuco" target="_blank">CEP</a></li>
            <li><a href="https://www.sertania.pe.gov.br/" title="Site da prefeitura de Sertânia" target="_blank">Sertânia</a></li>
          </ul>
        </li>
        <!--li><a class="nav-link" href="app_university_republic/logoff.php">Sair</a></li-->
      </ul>
      <ul class="nav navbar-nav float-right pull-right">
        <li class="float-right"><a class="nav-link" href="app_university_republic/logoff.php">Sair</a></li>
      </ul>
    </div>
   
  <!--/.nav-collapse -->
  </div>
</nav>