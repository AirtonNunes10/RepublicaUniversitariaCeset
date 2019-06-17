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
				<li role="presentation" class="active" id="tabCadastrarUsuario"><a href="#cadastrarUsuario" aria-controls="cadastrarUsuario"
					role="tab" data-toggle="tab">Cadastrar usuários</a></li>
			<? } ?>
			<li role="presentation" id="tabConsultarUsuario"><a href="#consultarUsuario" aria-controls="consultarUsuario" role="tab"
					data-toggle="tab">Consultar usuários</a></li>
		</ul>
		<!-- Tab panes -->
		<div class="tab-content">
			<!-- DADOS PESSOAIS -->
			<? if($_SESSION['usuario_perfil'] == 1) { ?>
				<div role="tabpanel" class="tab-pane active" id="cadastrarUsuario">
					<form class="center-from" method="post" id="formCadastro">
					<h5 class="featurette-heading"><span class="text-muted">Dados pessoais</span></h5>
					<div class="row col-md-12">

						<input hidden id="action" name="action" value="none">
					
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
							<label for="rg">RG</label>
							<input name="rg" type="text" required ng-model="rg" class="form-control" id="rg"
								placeholder="0000000">
						</div>
						<div class="form-group col-sm-4">
							<label for="dataNascimento">Data de nascimento</label>
							<input name="dataNascimento" type="date" required ng-model="dataNascimento" class="form-control"
								id="dataNascimento" placeholder="dd/mm/aaaa">
						</div>
						<div class="form-group col-sm-4">
							<label for="sexo">Sexo</label>
							<select name="sexo" required ng-model="sexo" class="form-control">
								<option value="">Selecione</option>
								<option value="F">Femino</option>
								<option value="M">Masculino</option>
							</select>
						</div>
						<div class="form-group col-sm-4">
							<label for="estadoCivil">Estado civil</label>
							<select name="estadoCivil" required ng-model="estadoCivil" class="form-control">
								<option value="">Selecione</option>
								<option>Solteiro</option>
								<option>Casado</option>
								<option>Divorciado</option>
								<option>Viúvo</option>
							</select>
						</div>
						<div class="form-group col-sm-4">
							<label for="tipoUsuario">Tipo de usuário</label>
							<select name="tipoUsuario" id="tipoUsuario" required ng-model="tipoUsuario" class="form-control"
								onchange="changeType()">
								<option value="">Selecione</option>
								<option value="1">Administrador</option>
								<option value="2">Estudante</option>
								<option value="3">Funcionario</option>
								<option value="4">Tesoureiro</option>
							</select>
						</div>
						<div class="form-group col-sm-4">
							<label for="email">E-mail</label>
							<input name="email" type="text" required ng-model="email" class="form-control" id="email"
								placeholder="example@gmail.com">
						</div>
						<div class="form-group col-sm-4">
							<label for="senha">Senha</label>
							<input name="senha" type="password" required ng-model="senha" class="form-control" id="senha"
								placeholder="*********">
						</div>
					</div>

					<!-- ENDEREÇO -->

					<div class="row col-md-12">
						<div class="borda"></div>
						<h5 class="featurette-heading"><span class="text-muted">Endereço</span></h5>
						<div class="form-group col-sm-4">
							<label for="cep">CEP</label>
							<input name="cep" type="text" required ng-model="cep" class="form-control" id="cep"
								placeholder="00000-000">
						</div>
						<div class="form-group col-sm-4">
							<label for="endereco">Endereço</label>
							<input name="endereco" type="text" required ng-model="endereco" class="form-control" id="endereco"
								placeholder="Endereço">
						</div>
						<div class="form-group col-sm-4">
							<label for="numero">Número</label>
							<input name="numero" type="numeric" required ng-model="numero" class="form-control" id="numero"
								placeholder="00">
						</div>
						<div class="form-group col-sm-4">
							<label for="bairro">Bairro</label>
							<input name="bairro" type="text" required ng-model="bairro" class="form-control" id="bairro"
								placeholder="Bairro">
						</div>
						<div class="form-group col-sm-4">
							<label for="cidade">Cidade</label>
							<input name="cidade" type="text" required ng-model="cidade" class="form-control" id="cidade"
								placeholder="Cidade">
						</div>
						<div class="form-group col-sm-4">
							<label for="uf">UF</label>
							<select name="uf" required ng-model="uf" class="form-control">
								<option value="">Selecione</option>
								<option>AC</option>
								<option>AL</option>
								<option>AP</option>
								<option>AM</option>
								<option>BA</option>
								<option>CE</option>
								<option>DF</option>
								<option>ES</option>
								<option>GO</option>
								<option>MA</option>
								<option>MT</option>
								<option>MS</option>
								<option>MG</option>
								<option>PA</option>
								<option>PB</option>
								<option>PE</option>
								<option>PI</option>
								<option>PR</option>
								<option>RJ</option>
								<option>RN</option>
								<option>RS</option>
								<option>RO</option>
								<option>RR</option>
								<option>SC</option>
								<option>SP</option>
								<option>SE</option>
								<option>TO</option>
							</select>
						</div>
						<div class="form-group col-sm-4">
							<label for="complemento">Complemento</label>
							<input name="complemento" type="text" ng-model="complemento" class="form-control" id="complemento"
								placeholder="Complemento">
						</div>
					</div>

					<!-- TELEFONES -->

					<div class="row col-md-12">
						<div class="borda"></div>
						<h5 class="featurette-heading"><span class="text-muted">Telefones para contato</span></h5>
						<div class="form-group col-sm-4">
							<label for="celular1">Celular 1</label>
							<input name="celular" type="numeric" required ng-model="celular1" class="form-control" 
								id="celular1" placeholder="(00)00000-0000">
						</div>
						<div class="form-group col-sm-4">
							<label for="celular2">Celular 2</label>
							<input name="celular2" type="numeric" ng-model="celular2" class="form-control" 
								id="celular2" placeholder="(00)00000-0000">
						</div>
					</div>

					<!-- DEPARTAMENTO E PROFISSAO -->

					<div id="areaFuncionario">
						<div class="row col-md-12">
							<div class="borda"></div>
							<h5 class="featurette-heading"><span class="text-muted">Departamento e Profissão</span></h5>
							<div class="form-group col-sm-4">
								<label for="departamento">Departamento</label>
								<input name="departamento" type="text" ng-model="departamento" class="form-control"
									id="departamento" placeholder="Área de trabalho">
							</div>
							<div class="form-group col-sm-4">
								<label for="profissao">Profissão</label>
								<input name="profissao" type="text" ng-model="profissao" class="form-control"
									id="profissao" placeholder="Profissao">
							</div>
						</div>
					</div>

					<!-- ESTUDANTE -->

					<div id="areaEstudante">
						<div class="row col-md-12">
							<div class="borda"></div>
							<h5 class="featurette-heading"><span class="text-muted">Escolaridade</span></h5>
							<div class="form-group col-sm-4">
								<label for="instituicao">Instituição</label>
								<input name="instituicao" type="text" ng-model="instituicao" class="form-control"
									id="instituicao" placeholder="Instituição">
							</div>
							<div class="form-group col-sm-4">
								<label for="matricula">Matricula</label>
								<input name="matricula" type="text" ng-model="matricula" class="form-control"
									id="matricula" placeholder="Matricula">
							</div>
							<div class="form-group col-sm-4">
								<label for="escolaridade">Nível escolaridade</label>
								<select name="escolaridade" class="form-control">
									<option value="">Selecione</option>
									<option>Fundamental</option>
									<option>Médio</option>
									<option>Superior</option>
									<option>Técnico</option>
								</select>
							</div>
							<div class="form-group col-sm-4">
								<label for="dataInicioCurso">Data de início do curso</label>
								<input name="dataInicioCurso" type="date" ng-model="dataInicioCurso"
									class="form-control" id="dataInicioCurso" placeholder="dd/mm/aaaa">
							</div>
							<div class="form-group col-sm-4">
								<label for="dataFinalCurso">Data final do curso</label>
								<input name="dataFinalCurso" type="date" ng-model="dataFinalCurso" class="form-control"
									id="dataFinalCurso" placeholder="dd/mm/aaaa">
							</div>
							<div class="form-group col-sm-4">
								<label for="periodo">Periódo atual</label>
								<input name="periodo" type="numeric" ng-model="periodo" class="form-control"
									id="periodo" placeholder="Periódo atual">
							</div>
							<div class="form-group col-sm-4">
								<label for="curso">Curso</label>
								<select data-placeholder="Selecione" class="standardSelect" tabindex="1" multiple name="curso[]" id="curso" class="form-control">
									<option value=""></option>
								</select>
							</div>
						</div>
					</div>

					<div class="row col-md-12">
						<div class="borda"></div>
						<br>
						<div class="center-button" style="text-align: center;">
							<button type="reset" ng-click="limparCampos()" class="btn btn-default">Limpar</button>
							<button ng-disabled="!cpf" type="button" onclick="salvar()" class="btn btn-primary">Salvar</button>
						</div>
						<br>
					</div>
					</form>
				</div>
			<? } ?>

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
									<th>E-mail</th>
									<th>Instituição</th>
									<th>Curso</th>
									<th>Perído Atual</th>
									<th>Data Inicio Curso</th>
									<th>Data Final Curso</th>
									<? if($_SESSION['usuario_perfil'] == 1) { ?>
										<th>Opções</th>
									<? } ?>
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
									<th>E-mail</th>
									<th>Departamento</th>
									<th>Profissão</th>
									<th>Data Cadastro</th>
									<? if($_SESSION['usuario_perfil'] == 1) { ?>
										<th>Opções</th>
									<? } ?>
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
	<script src="js/bootstrap.min.js"></script>
	
</body>
	
<?php
	include_once __DIR__."../../app_university_republic/modalEditarUsuario.php";
?>

</html>