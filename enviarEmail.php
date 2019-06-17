<?php

include_once __DIR__."../app_university_republic/validador_acesso.php";
  
?>

<!DOCTYPE html>
<html lang="en" ng-app>

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- As 3 metatags acima * devem * vir em primeiro lugar na cabeça; qualquer outro conteúdo principal deve vir * depois * dessas tags -->
	<meta name="description" content="">
	<meta name="author" content="">
	<link rel="icon" href="img/cesertLogo.jpg">
	<script src="js/jquery.min.js"></script>
	<script src="js/jquery.mask.js"></script>
	<script src="js/angular.min.js"></script>
	<script src="js/jquery-ui-1.12.1.custom/jquery-ui.js"></script>

	<title>Cesert</title>

	<!-- Bootstrap core CSS -->
	<link href="css/bootstrap.min.css" rel="stylesheet">

	<!-- Estilos personalizados para este modelo -->
	<link href="css/starter-template.css" rel="stylesheet">
	<link href="js/jquery-ui-1.12.1.custom/jquery-ui.css" rel="stylesheet">

</head>


<body>

	<!-- MENU GERAL -->
    <div ng-include src="'menu.php'"></div>

	<br>

    <div class="container">
		<div class="py-3 text-center">
			<img class="d-block mx-auto mb-2" src="img/envioEmail.png" alt="" width="72" height="72">
			<h2>Enviar Email</h2>
		</div>
        </div class="row">
            <div class="center-from">
                <div class="col-md-12">
                    <div class="card-body font-weight-bold">
                        <form class="center-from" action="processa_envio.php" method="post">
                            <div class="form-group">
                                <label for="para">Para</label>
                                <input name="para" type="text" class="form-control" id="para" placeholder="exemplo@gmail.com">
                            </div>

                            <div class="form-group">
                                <label for="titulo">Título</label>
                                <input name="titulo" type="text" class="form-control" id="titulo" placeholder="Título do e-mail">
                            </div>

                            <div class="form-group">
                                <label for="mensagem">Mensagem</label>
                                <textarea name="mensagem" class="form-control" id="mensagem"></textarea>
                            </div>
                            <div class="center-button" style="text-align: center;">
                                <button type="submit" class="btn btn-primary btn-lg">Enviar Email</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="js/bootstrap.min.js"></script>
</body>

</html>