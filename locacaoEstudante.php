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
	<script src="js/toastr.min.js"></script>
	<script src="js/cadastros_usuarios.js"></script>
	<script src="js/quartos.js"></script>
	<script src="js/jquery-ui-1.12.1.custom/jquery-ui.js"></script>
	<script src="js/chosen.jquery.js"></script>

	<script type="text/javascript" src="DataTables/datatables.js"></script>
	<script src="js/buttons.flash.min.js"></script>
	<script src="js/buttons.html5.min.js"></script>
	<script src="js/buttons.print.min.js"></script>
	<script src="js/dataTables.buttons.min.js"></script>
	<script src="js/jszip.min.js"></script>
	<script src="js/pdfmake.min.js"></script>
	<script src="js/vfs_fonts.js"></script>
 
	<link rel="stylesheet" type="text/css" href="css/fa/css/all.css">
	<link rel="stylesheet" type="text/css" href="js/jquery-ui-1.12.1.custom/jquery-ui.css">
	<link rel="stylesheet" type="text/css" href="DataTables/dataTables.css"/>
	<link rel="stylesheet" type="text/css" href="css/toastr.min.css">
	<link rel="stylesheet" type="text/css" href="css/chosen.css">

	<title>Cesert</title>

	<!-- Bootstrap core CSS -->
	<link href="css/bootstrap.min.css" rel="stylesheet">

	<!-- Estilos personalizados para este modelo -->
	<link href="css/starter-template.css" rel="stylesheet">

</head>

<body>

	<!-- MENU GERAL -->
    <div ng-include src="'menu.php'"></div>

	<br>

	<div class="container">
		<!-- Nav tabs -->			
		<ul class="nav nav-tabs" role="tablist">
			<? if($_SESSION['usuario_perfil'] == 1) { ?>
				<li role="presentation" class="active" id="tabLocarEstudante"><a href="#locarEstudante" aria-controls="locarEstudante"
					role="tab" data-toggle="tab">Locar Estudante</a></li>
			<? } ?>
			<li role="presentation" id="tabConsultarLocacao"><a href="#consultarLocacao" aria-controls="consultarLocacao" role="tab"
					data-toggle="tab">Consultar Locação</a></li>
		</ul>
		<!-- Tab panes -->
		<div class="tab-content">
			<!-- DADOS LOCACAO -->
			<? if($_SESSION['usuario_perfil'] == 1) { ?>
				<div role="tabpanel" class="tab-pane active" id="locarEstudante">
					<form class="center-from" method="post" id="fromLocacao">
						<h5 class="featurette-heading"><span class="text-muted">Dados da Locação</span></h5>
						<div class="row col-md-12">

						<input hidden id="action" name="action" value="none">

							<div class="form-group col-sm-8">
								<label for="estudante">Estudante</label>
								<select data-placeholder="Selecione" name="estudante" id="estudante" class="standardSelect" tabindex="1" required ng-model="estudante" class="form-control">
									<option value=""></option>
								</select>
							</div>
							
							<div class="form-group col-sm-4">
								<label for="quarto">Quarto</label>
								<select data-placeholder="Selecione" name="quarto" id="quarto" class="standardSelect" tabindex="1" required ng-model="quarto" class="form-control">
									<option value=""></option>
								</select>
							</div>
						</div>

						<div class="row col-md-12">
							<div class="borda"></div>
							<br>
							<div class="center-button" style="text-align: center;">
								<button type="reset" ng-click="limparCampos()" class="btn btn-default">Limpar</button>
								<button ng-disabled="!estudante" onclick="salvarLocacao()" class="btn btn-primary">Salvar</button>
							</div>
							<br>
						</div>
					</form>
				</div>
			<? } ?>

			<div role="tabpanel" class="tab-pane" id="consultarLocacao">
				<div class="tab-content">
					<table cellpadding='1' cellspacing='1' id='tabelaConsultarLocacao' class="table table-striped table-bordered" width='100%'>
						<thead>
							<tr>
								<th>Quarto</th>
								<th>Estudante</th>
							</tr>
						</thead>
					</table>
				</div>
			</div>
		</div><!-- Nav tabs -->
	</div>
	
	<!-- Bootstrap core JavaScript
    ================================================== -->
	<script src="js/bootstrap.min.js"></script>

</body>

</html>