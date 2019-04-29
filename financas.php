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
			<li role="presentation" class="active" id="tabCadastrarUsuario"><a href="#cadastrarUsuario" aria-controls="cadastrarUsuario"
					role="tab" data-toggle="tab">Pagamentos</a></li>
			<li role="presentation" id="tabConsultarUsuario"><a href="#consultarUsuario" aria-controls="consultarUsuario" role="tab"
					data-toggle="tab">Despesas</a></li>
		</ul>
		<!-- Tab panes -->
		<div class="tab-content">
			<!-- DADOS PAGAMENTOS -->
			<div role="tabpanel" class="tab-pane active" id="cadastrarUsuario">
				<form class="center-from" method="post" action="pagamentos_controller.php">
				<h5 class="featurette-heading"><span class="text-muted">Dados pagamentos</span></h5>
				<div class="row col-md-12">
                    <div class="form-group col-sm-4">
						<label for="codigo">Código</label>
						<input name="codigo" type="numeric" readonly ng-model="codigo" class="form-control" id="codigo" placeholder="0000">
					</div>
					<div class="form-group col-sm-4">
						<label for="cpf">CPF</label>
						<input name="cpf" type="text" required ng-model="cpf" class="form-control" id="cpf"
							placeholder="000.000.000-00">
					</div>
					<div class="form-group col-sm-4">
						<label for="nome">Nome completo</label>
						<input name="nome" type="text" required ng-model="nome" class="form-control" id="nome"
							placeholder="Nome completo">
                    </div>
                    <div class="form-group col-sm-4">
						<label for="tipoPagamento">Tipo pagamento</label>
						<select name="tipoPagamento" id="tipoPagamento" required ng-model="tipoPagamento" class="form-control"
							onchange="changeType()">
							<option></option>
							<option value="doacao">Doação</option>
							<option value="mensal">Mensalidade</option>
							<option value="multa">Multa</option>
						</select>
					</div>
					<div class="form-group col-sm-4">
						<label for="dataPagamento">Data de pagamento</label>
						<input name="dataPagamento" type="date" required ng-model="dataPagamento" class="form-control"
							id="dataPagamento" placeholder="dd/mm/aaaa">
					</div>
					<div class="form-group col-sm-4">
						<label for="valorMensalidade">Valor da mensalidade</label>
						<input name="valorMensalidade" type="password" required ng-model="valorMensalidade" class="form-control" id="valorMensalidade"
							placeholder="00,00">
					</div>
				</div>

				<div class="row col-md-12">
					<div class="borda"></div>
					<br>
					<div class="center-button" style="text-align: center;">
						<button type="reset" ng-click="limparCampos()" class="btn btn-default">Limpar</button>
						<button ng-disabled="!cpf" type="submit" class="btn btn-primary">Salvar</button>
					</div>
					<br>
				</div>
				</form>
			</div>

			<div role="tabpanel" class="tab-pane" id="consultarUsuario">
				<ul class="nav nav-tabs" role="tablist">
					<li role="presentation" class="active" id="tabConsultarEstudante"><a href="#consultarEstudante" aria-controls="consultarEstudante"
							role="tab" data-toggle="tab">Estudantes</a></li>
					<li role="presentation" id="tabConsultarFuncionario"><a href="#consultarFuncionario" aria-controls="consultarFuncionario" role="tab"
							data-toggle="tab">Funcionários</a></li>
				</ul>
				<!-- Tab panes -->
				<div class="tab-content">
					<div role="tabpanel" class="tab-pane active" id="consultarEstudante">
						<table cellpadding='1' cellspacing='1' id='tabelaConsultarEstudante' class="table table-striped table-bordered" width='100%'>
							<thead>
								<tr>
									<th>CPF</th>
									<th>Nome</th>
									<th>Email</th>
									<th>Instituição</th>
									<th>Curso</th>
									<th>Perído Atual</th>
									<th>Dada Inicio Curso</th>
									<th>Dada Final Curso</th>
								</tr>
							</thead>
						</table>
					</div>
					<div role="tabpanel" class="tab-pane" id="consultarFuncionario">
						<table cellpadding='1' cellspacing='1' id='tabelaConsultarFuncionario' class="table table-striped table-bordered" width='100%'>
							<thead>
								<tr>
									<th>CPF</th>
									<th>Nome</th>
									<th>Email</th>
									<th>Departamento</th>
									<th>Profissão</th>
									<th>Data Cadastro</th>
								</tr>
							</thead>
						</table>
					</div>
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