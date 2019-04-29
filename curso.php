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
	<script src="js/cadastros.js"></script>
	<script src="js/jquery-ui-1.12.1.custom/jquery-ui.js"></script>

	<title>Cesert</title>

	<!-- Bootstrap core CSS -->
	<link href="css/bootstrap.min.css" rel="stylesheet">

	<link rel="stylesheet" type="text/css" href="DataTables/datatables.min.css"/>
 
	<script type="text/javascript" src="DataTables/datatables.min.js"></script>

	<!-- Estilos personalizados para este modelo -->
	<link href="css/starter-template.css" rel="stylesheet">
	<link href="js/jquery-ui-1.12.1.custom/jquery-ui.css" rel="stylesheet">

</head>


<body>

	<!-- MENU GERAL -->
    <div ng-include src="'menu.php'"></div>

	<br>

	<?php if (isset($_GET['inclusao']) && $_GET['inclusao'] == 1) { ?>
	<div class="alert alert-success" role="alert" style="text-align: center;">
		<h3 size="100">Cadastro realizado com sucesso!<h3>
	</div>
	<?php } ?>

	<div class="container">
		<!-- Nav tabs -->			
		<ul class="nav nav-tabs" role="tablist">
			<li role="presentation" class="active" id="tabCadastrarCurso"><a href="#cadastrarCurso" aria-controls="cadastrarCurso"
					role="tab" data-toggle="tab">Cadastrar Curso</a></li>
			<li role="presentation" id="tabConsultarCurso"><a href="#consultarCurso" aria-controls="consultarCurso" role="tab"
					data-toggle="tab">Consultar Cursos</a></li>
		</ul>
		<!-- Tab panes -->
		<div class="tab-content">
			<!-- DADOS DO CURSO -->
			<div role="tabpanel" class="tab-pane active" id="cadastrarCurso">
				<form class="center-from" method="post" action="curso_controller.php">
				<h5 class="featurette-heading"><span class="text-muted">Dados do Curso</span></h5>
				<div class="row col-md-12">
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
						<button ng-disabled="!curso" type="submit" class="btn btn-primary">Salvar</button>
					</div>
					<br>
				</div>
				</form>
			</div>

			<div role="tabpanel" class="tab-pane" id="consultarCurso">
				<div class="tab-content">
					<table cellpadding='1' cellspacing='1' id='tabelaConsultarCurso' class="table table-striped table-bordered" width='100%'>
						<thead>
							<tr>
								<th>Código</th>
								<th>Sigla</th>
								<th>Curso</th>
							</tr>
						</thead>
					</table>
				</div>
			</div>
		</div><!-- Nav tabs -->
	</div>

	<!-- Bootstrap core JavaScript
    ================================================== -->
	<!-- Colocado no final do documento para que as páginas sejam carregadas mais rapidamente -->
	<script src="js/bootstrap.min.js"></script>
</body>

</html>