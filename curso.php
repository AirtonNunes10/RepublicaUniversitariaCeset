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
	<script src="js/cadastros_cursos.js"></script>
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
			<?php if($_SESSION['usuario_perfil'] == 1) { ?>
				<li role="presentation" class="active" id="tabCadastrarCurso"><a href="#cadastrarCurso" aria-controls="cadastrarCurso"
					role="tab" data-toggle="tab">Cadastrar Curso</a></li>
			<?php } ?>
			<li role="presentation" id="tabConsultarCurso"><a href="#consultarCurso" aria-controls="consultarCurso" role="tab"
					data-toggle="tab">Consultar Cursos</a></li>
		</ul>
		<!-- Tab panes -->
		<div class="tab-content">
			<!-- DADOS DO CURSO -->

			<?php if($_SESSION['usuario_perfil'] == 1) { ?>
				<div role="tabpanel" class="tab-pane active" id="cadastrarCurso">
					<form class="center-from" method="post" id="cursoForm">
						<h5 class="featurette-heading"><span class="text-muted">Dados do Curso</span></h5>
						<div class="row col-md-12">

						<input hidden id="action" name="action" value="none">

							<div class="form-group col-sm-4">
								<label for="codigo">Código</label>
								<input name="codigo" type="numeric" readonly ng-model="codigo" class="form-control" id="codigo" placeholder="0000">
							</div>
							<div class="form-group col-sm-4">
								<label for="sigla">Sigla do curso</label>
								<input name="sigla" type="text" required ng-model="sigla" class="form-control" id="sigla"
									placeholder="SI">
							</div>
							<div class="form-group col-sm-4">
								<label for="curso">Nome do Curso</label>
								<input name="curso" type="text" required ng-model="curso" class="form-control" id="curso"
									placeholder="Sistemas de Informação">
							</div>
						</div>

						<div class="row col-md-12">
							<div class="borda"></div>
							<br>
							<div class="center-button" style="text-align: center;">
								<button type="reset" ng-click="limparCampos()" class="btn btn-default">Limpar</button>
								<button ng-disabled="!curso" onclick="salvarCurso()" class="btn btn-primary">Salvar</button>
							</div>
							<br>
						</div>
					</form>
				</div>
			<?php } ?>

			<div role="tabpanel" class="tab-pane" id="consultarCurso">
				<div class="tab-content">
					<table cellpadding='1' cellspacing='1' id='tabelaConsultarCurso' class="table table-striped table-bordered" width='100%'>
						<thead>
							<tr>
								<th>Código</th>
								<th>Sigla</th>
								<th>Curso</th>
								<?php if($_SESSION['usuario_perfil'] == 1) { ?>
									<th>Opções</th>
								<?php } ?>
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