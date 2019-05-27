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
	<script src="js/cadastros_financas.js"></script>
	<script src="js/jquery-ui-1.12.1.custom/jquery-ui.js"></script>

	<link rel="stylesheet" type="text/css" href="css/fa/css/all.css">
	<link rel="stylesheet" type="text/css" href="js/jquery-ui-1.12.1.custom/jquery-ui.css">
	<link rel="stylesheet" type="text/css" href="DataTables/datatables.min.css"/>
	<link rel="stylesheet" type="text/css" href="css/toastr.min.css">
 
	<script type="text/javascript" src="DataTables/datatables.min.js"></script>
	<script src="js/buttons.flash.min.js"></script>
	<script src="js/buttons.html5.min.js"></script>
	<script src="js/buttons.print.min.js"></script>
	<script src="js/dataTables.buttons.min.js"></script>
	<script src="js/jszip.min.js"></script>
	<script src="js/pdfmake.min.js"></script>
	<script src="js/vfs_fonts.js"></script>

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

	<?php if (isset($_GET['inclusao']) && $_GET['inclusao'] == 1) { ?>
	<div class="alert alert-success" role="alert" style="text-align: center;">
		<h3 size="100">Cadastro realizado com sucesso!<h3>
	</div>
	<?php } ?>

	<div class="container">
		<!-- Nav tabs -->			
		<ul class="nav nav-tabs" role="tablist">
			<li role="presentation" class="active show in" id="tabPagamento"><a href="#pagamento" aria-controls="pagamento"
					role="tab" data-toggle="tab">Pagamentos</a></li>
			<li role="presentation" id="tabDespesa"><a href="#despesa" aria-controls="despesa" role="tab"
					data-toggle="tab">Despesas</a></li>
			<li role="presentation" id="tabSaldo"><a href="#saldo" aria-controls="saldo" role="tab"
					data-toggle="tab">Saldo</a></li>
		</ul>
		<!-- Tab panes -->
		<div class="tab-content">
			<!-- DADOS PAGAMENTOS -->
			<div role="tabpanel" class="tab-pane active" id="pagamento">
				<ul class="nav nav-tabs" role="tablist">
					<li role="presentation" class="active" id="tabCadastrarPagamento"><a href="#cadastrarPagamento" aria-controls="cadastrarPagamento"
							role="tab" data-toggle="tab">Cadastrar pagamentos</a></li>
					<li role="presentation" id="tabConsultarPagamento"><a href="#consultarPagamento" aria-controls="consultarPagamento" role="tab"
							data-toggle="tab">Consultar pagamentos</a></li>
				</ul>
				<div class="tab-content">
					<div role="tabpanel" class="tab-pane active" id="cadastrarPagamento">
						<form class="center-from" method="post" action="pagamento_controller.php">
							<h5 class="featurette-heading"><span class="text-muted">Dados pagamentos</span></h5>

							<input hidden id="action" name="action" value="none">

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
									<select name="tipoPagamento" id="tipoPagamento" required ng-model="tipoPagamento" class="form-control">
										<option>[Selecione]</option>
										<option>Doação</option>
										<option>Mensalidade</option>
										<option>Multa</option>
									</select>
								</div>
								<div class="form-group col-sm-4">
									<label for="valorMensalidade">Valor pagamento</label>
									<input name="valorMensalidade" type="numeric" required ng-model="valorMensalidade" class="form-control" id="valorMensalidade"
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
					<div role="tabpanel" class="tab-pane" id="consultarPagamento">
						<table cellpadding='1' cellspacing='1' id='tabelaConsultarPagamento' class="table table-striped table-bordered" width='100%'>
							<thead>
								<tr>
									<th>Código</th>
									<th>CPF</th>
									<th>Nome</th>
									<th>Tipo pagamento</th>
									<th>Data pagamento</th>
									<th>Valor mensalidade</th>
								</tr>
							</thead>
						</table>
					</div>
				</div>
			</div>

			<div role="tabpanel" class="tab-pane" id="despesa">
				<ul class="nav nav-tabs" role="tablist">
					<li role="presentation" class="active" id="tabCadastrarDespesa"><a href="#cadastrarDespesa" aria-controls="cadastrarDespesa"
							role="tab" data-toggle="tab">Cadastrar despesas</a></li>
					<li role="presentation" id="tabConsultarDespesa"><a href="#consultarDespesa" aria-controls="consultarDespesa" role="tab"
							data-toggle="tab">Consultar despesas</a></li>
				</ul>
				<!-- Tab panes -->
				<div class="tab-content">
					<div role="tabpanel" class="tab-pane active" id="cadastrarDespesa">
						<form class="center-from" method="post" action="despesa_controller.php">
							<h5 class="featurette-heading"><span class="text-muted">Dados despesas</span></h5>
							<div class="row col-md-12">

								<input hidden id="action" name="action" value="none">

								<div class="form-group col-sm-4">
									<label for="codigoCompra">Código da compra</label>
									<input name="codigoCompra" type="numeric" readonly ng-model="codigoCompra" class="form-control" id="codigoCompra" placeholder="000000">
								</div>
								<div class="form-group col-sm-4">
									<label for="descricao">Descrição</label>
									<input name="descricao" type="text" required ng-model="descricao" class="form-control" id="descricao"
										placeholder="Internet">
								</div>
								<div class="form-group col-sm-4">
									<label for="quantidade">Quantidade</label>
									<input name="quantidade" type="numeric" required ng-model="quantidade" class="form-control" id="quantidade"
										placeholder="00">
								</div>
								<div class="form-group col-sm-4">
									<label for="localCompra">Local compra</label>
									<input name="localCompra" type="text" required ng-model="localCompra" class="form-control" id="localCompra"
										placeholder="NET">
								</div>
								<div class="form-group col-sm-4">
									<label for="dataCompra">Data compra</label>
									<input name="dataCompra" type="date" required ng-model="dataCompra" class="form-control" id="dataCompra"
										placeholder="dd/mm/aaaa">
								</div>
								<div class="form-group col-sm-4">
									<label for="valorCompra">Valor compra</label>
									<input name="valorCompra" type="numeric" required ng-model="valorCompra" class="form-control" id="valorCompra"
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
					
					<div role="tabpanel" class="tab-pane" id="consultarDespesa">
						<table cellpadding='1' cellspacing='1' id='tabelaConsultarDespesa' class="table table-striped table-bordered" width='100%'>
							<thead>
								<tr>
									<th>Código da compra</th>
									<th>Descrição</th>
									<th>Quantidade</th>
									<th>Local compra</th>
									<th>Data compra</th>
									<th>Valor compra</th>
								</tr>
							</thead>
						</table>
					</div>
				</div>
			</div>

			<div role="tabpanel" class="tab-pane" id="saldo">
				<table cellpadding='1' cellspacing='1' id='tabelaConsultarSaldo' class="table table-striped table-bordered" width='100%'>
					<thead>
						<tr>
							<th>Valor recebido</th>
							<th>Valor despesa</th>
							<th>Valor saldo</th>
						</tr>
					</thead>
				</table>
			</div>
		</div><!-- Nav tabs -->
	</div>

	<!-- Bootstrap core JavaScript
    ================================================== -->
	<!-- Colocado no final do documento para que as páginas sejam carregadas mais rapidamente -->
	<script src="js/bootstrap.min.js"></script>
</body>

</html>