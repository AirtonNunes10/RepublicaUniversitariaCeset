<?php

include_once __DIR__ . "../app_university_republic/validador_acesso.php";

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
	<script src="js/cadastros_financas.js"></script>
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
	<link rel="stylesheet" type="text/css" href="DataTables/dataTables.css" />
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
			<li role="presentation" class="active show in" id="tabPagamento"><a href="#pagamento" aria-controls="pagamento" role="tab" data-toggle="tab">Pagamentos</a></li>
			<li role="presentation" id="tabDespesa"><a href="#despesa" aria-controls="despesa" role="tab" data-toggle="tab">Despesas</a></li>
			<li role="presentation" id="tabSaldo"><a href="#saldo" aria-controls="saldo" role="tab" data-toggle="tab">Saldo</a></li>
		</ul>
		<!-- Tab panes -->
		<div class="tab-content">
			<!-- DADOS PAGAMENTOS -->
			<div role="tabpanel" class="tab-pane active" id="pagamento">
				<ul class="nav nav-tabs" role="tablist">
					<li role="presentation" class="active" id="tabCadastrarPagamento"><a href="#cadastrarPagamento" aria-controls="cadastrarPagamento" role="tab" data-toggle="tab">Cadastrar pagamentos</a></li>
					<li role="presentation" id="tabConsultarPagamento"><a href="#consultarPagamento" aria-controls="consultarPagamento" role="tab" data-toggle="tab">Consultar pagamentos</a></li>
				</ul>
				<div class="tab-content">
					<?php if($_SESSION['usuario_perfil'] == 4) { ?>
						<div role="tabpanel" class="tab-pane active" id="cadastrarPagamento">
							<form class="center-from" method="post" id="formPagamento">
								<h5 class="featurette-heading"><span class="text-muted">Dados pagamentos</span></h5>

								<!-- <input hidden id="action" name="action" value="cadastrarPagamento"> -->

								<div class="row col-md-12">
									<div class="form-group col-sm-4">
										<label for="tipoPagamento">Tipo pagamento</label>
										<select name="tipoPagamento" placeholder="Selecione" id="tipoPagamento" onchange="trocaTipo()" required ng-model="tipoPagamento" class="form-control required">
											<option value=""></option>
											<option value="1">Doação</option>
											<option value="2">Mensalidade</option>
											<option value="3">Multa</option>
										</select>
									</div>
									<div class="form-group col-sm-4">
										<label for="cpf">CPF</label>
										<input name="cpf" type="text" required ng-model="cpf" class="form-control required" id="cpf" placeholder="000.000.000-00">
									</div>
									<div id="financainterna">
										<div class="form-group col-sm-4">
											<label for="estudante">Estudante</label>
											<select data-placeholder="Selecione" onchange="putCPF()" name="estudante" id="estudante" class="standardSelect" tabindex="1" required ng-model="estudante" class="form-control required">
												<option value=""></option>
											</select>
										</div>
									</div>
									<div id="doacao">
										<div class="form-group col-sm-4">
											<label for="nome">Nome completo</label>
											<input name="nome" type="text" required ng-model="nome" class="form-control required" id="nome" placeholder="Nome completo">
										</div>
									</div>
									<div class="form-group col-sm-4">
										<label for="valorPagamento">Valor pagamento</label>
										<input name="valorPagamento" type="numeric" required ng-model="valorPagamento" class="form-control required" id="valorPagamento" placeholder="00,00">
									</div>
								</div>

								<div class="row col-md-12">
									<div class="borda"></div>
									<br>
									<div class="center-button" style="text-align: center;">
										<button type="reset" ng-click="limparCampos()" class="btn btn-default">Limpar</button>
										<button onclick="salvarPagamento()" class="btn btn-primary">Salvar</button>
									</div>
									<br>
								</div>

							</form>
						</div>
					<?php } ?>
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
					<li role="presentation" class="active" id="tabCadastrarDespesa"><a href="#cadastrarDespesa" aria-controls="cadastrarDespesa" role="tab" data-toggle="tab">Cadastrar despesas</a></li>
					<li role="presentation" id="tabConsultarDespesa"><a href="#consultarDespesa" aria-controls="consultarDespesa" role="tab" data-toggle="tab">Consultar despesas</a></li>
				</ul>
				<!-- Tab panes -->
				<div class="tab-content">
					<?php if($_SESSION['usuario_perfil'] == 4) { ?>
						<div role="tabpanel" class="tab-pane active" id="cadastrarDespesa">
							<form class="center-from" method="post" id="formDespesa">
								<h5 class="featurette-heading"><span class="text-muted">Dados despesas</span></h5>
								<div class="row col-md-12">
									<div class="form-group col-sm-4">
										<label for="codigoCompra">Código da compra</label>
										<input name="codigoCompra" type="numeric" ng-model="codigoCompra" class="form-control" id="codigoCompra" placeholder="000000">
									</div>
									<div class="form-group col-sm-4">
										<label for="descricao">Descrição</label>
										<input name="descricao" type="text" required ng-model="descricao" class="form-control" id="descricao" placeholder="Internet">
									</div>
									<div class="form-group col-sm-4">
										<label for="quantidade">Quantidade</label>
										<input name="quantidade" type="numeric" required ng-model="quantidade" class="form-control" id="quantidade" placeholder="000000">
									</div>
									<div class="form-group col-sm-4">
										<label for="localCompra">Local compra</label>
										<input name="localCompra" type="text" required ng-model="localCompra" class="form-control" id="localCompra" placeholder="NET">
									</div>
									<div class="form-group col-sm-4">
										<label for="dataCompra">Data compra</label>
										<input name="dataCompra" type="date" required ng-model="dataCompra" class="form-control" id="dataCompra" placeholder="dd/mm/aaaa">
									</div>
									<div class="form-group col-sm-4">
										<label for="valorCompra">Valor compra</label>
										<input name="valorCompra" type="numeric" required ng-model="valorCompra" class="form-control" id="valorCompra" placeholder="00,00">
									</div>
								</div>
								<div class="row col-md-12">
									<div class="borda"></div>
									<br>
									<div class="center-button" style="text-align: center;">
										<button type="reset" ng-click="limparCampos()" class="btn btn-default">Limpar</button>
										<button onclick="salvarDespesa()" class="btn btn-primary">Salvar</button>
									</div>
									<br>
								</div>
							</form>
						</div>
					<?php } ?>

					<div role="tabpanel" class="tab-pane" id="consultarDespesa">
						<table cellpadding='1' cellspacing='1' id='tabelaConsultarDespesa' class="table table-striped table-bordered" width='100%'>
							<thead>
								<tr>
									<th>Código da compra</th>
									<th>Descrição</th>
									<th>Local compra</th>
									<th>Data compra</th>
									<th>Quantidade</th>
									<th>Valor compra</th>
									<th>Valor total compra</th>
								</tr>
							</thead>
						</table>
					</div>
				</div>
			</div>

			<div role="tabpanel" class="tab-pane" id="saldo">
				<br>
				<div class="container">
					<form class="center-from">
						<h5 class="featurette-heading"><span class="text-muted">Valores do mês atual</span></h5>
						<div class="form-group col-sm-4">
							<label for="valorTotalRecebidoMes">Valor recebido</label>
							<input class="form-control" id="valorTotalRecebidoMes" readonly placeholder="00,00">
						</div>
						<div class="form-group col-sm-4">
							<label for="valorTotalDespesaMes">Valor despesas</label>
							<input class="form-control" id="valorTotalDespesaMes" readonly placeholder="00,00">
						</div>
						<div class="form-group col-sm-4">
							<label for="valorSaldoTotalMes">Saldo Total</label>
							<input class="form-control" id="valorSaldoTotalMes" readonly placeholder="00,00">
						</div>
					</form>
				</div>
				<div class="center-button" align="center">
					<button type="button" onclick="consultaSaldoMesAtual()" class="btn btn-primary">Consultar valores</button>
				</div>
				<br>
				<div class="borda"></div>
				<br>
				<div class="container">
					<form class="center-from">
						<h5 class="featurette-heading"><span class="text-muted">Filtrar por data</span></h5>
						<div class="form-group col-sm-6">
							<label for="dataInicioSaldo">Data início</label>
							<input type="date" class="form-control" id="dataInicioSaldo" name="dataInicioSaldo" placeholder="dd/mm/aaaa">
						</div>
						<div class="form-group col-sm-6">
							<label for="dataFinalSaldo">Data Final</label>
							<input type="date" class="form-control" id="dataFinalSaldo" name="dataFinalSaldo" placeholder="dd/mm/aaaa">
						</div>
						<div class="form-group col-sm-4">
							<label for="valorTotalRecebidoDt">Valor recebido</label>
							<input type="numeric" class="form-control" readonly id="valorTotalRecebidoDt" placeholder="00,00">
						</div>
						<div class="form-group col-sm-4">
							<label for="valorTotalDespesaDt">Valor despesas</label>
							<input type="numeric" class="form-control" readonly id="valorTotalDespesaDt" placeholder="00,00">
						</div>
						<div class="form-group col-sm-4">
							<label for="valorSaldoTotalDt">Saldo Total</label>
							<input type="numeric" class="form-control" readonly id="valorSaldoTotalDt" placeholder="00,00">
						</div>
					</form>
				</div>
				<div class="center-button" align="center">
				<button type="button" class="btn btn-primary" onclick="filtrarEntreDatas()">Consultar valores</button>
				</div>
				<br>
				<div class="borda"></div>
			</div>
		</div><!-- Nav tabs -->
	</div>

	<!-- Bootstrap core JavaScript
    ================================================== -->
	<script src="js/bootstrap.min.js"></script>

</body>

</html>