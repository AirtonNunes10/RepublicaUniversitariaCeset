<!DOCTYPE html>
<html lang="en" ng-app="pessoasModulo">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- As 3 metatags acima * devem * vir em primeiro lugar na cabeça; qualquer outro conteúdo principal deve vir * depois * dessas tags -->
	<meta name="description" content="">
	<meta name="author" content="">
	<link rel="icon" href="img/cesertLogo.jpg">
	<script src="js/angular.min.js"></script>
	<script src="js/jquery.mask.js"></script>
	<script src="js/angular.min.js"></script>
	<script src="js/cadastros.js"></script>

	<title>Cesert</title>

	<!-- Bootstrap core CSS -->
	<link href="css/bootstrap.min.css" rel="stylesheet">

	<script src="controller/pessoa.js"></script>

	<!-- Estilos personalizados para este modelo -->
	<link href="css/starter-template.css" rel="stylesheet">

</head>

<body ng-controller="pessoasController">

	<!-- MENU GERAL -->
	<div ng-include src="'menu.php'"></div>

	<br>

	<?php if (isset($_GET['inclusao']) && $_GET['inclusao'] == 1) { ?>
	<div class="alert alert-success" role="alert">
		<h3 align="center" size="100">Cadastro realizado com sucesso!<h3>
	</div>
	<?php } ?>

	<div class="container">
		<!-- Nav tabs -->
		<ul class="nav nav-tabs" role="tablist">
			<li role="presentation" class="active"><a href="#cadastrarFuncionario" aria-controls="cadastrarFuncionario"
					role="tab" data-toggle="tab">Cadastrar Funcionarios</a></li>
			<li role="presentation"><a href="#consultarFuncionario" aria-controls="consultarFuncionario" role="tab"
					data-toggle="tab">Consultar Funcionarios</a></li>
		</ul>
		<!-- DADOS FuncionarioIS -->
		<form class="center-from" method="post" action="funcionario_controller.php">
			<h5 class="featurette-heading"><span class="text-muted">Dados Funcionarios</span></h5>
			<div class="form-group col-sm-4">
				<label for="cpf">CPF</label>
				<input name="cpf" type="text" required ng-model="cpf" class="form-control" id="cpf"
					placeholder="xxx.xxx.xxx-xx">
			</div>
			<div class="form-group col-sm-4">
				<label for="nome">Nome completo</label>
				<input name="nome" type="text" required ng-model="nome" class="form-control" id="nome"
					placeholder="Nome completo">
			</div>
			<div class="form-group col-sm-4">
				<label for="rg">RG</label>
				<input name="rg" type="text" required ng-model="rg" class="form-control" id="rg" placeholder="0000000">
			</div>
			<div class="form-group col-sm-4">
				<label for="dataNascimento">Data de nascimento</label>
				<input name="dataNascimento" type="date" required ng-model="dataNascimento" class="form-control"
					id="dataNascimento" placeholder="dd/mm/aaaa">
			</div>
			<div class="form-group col-sm-4">
				<label for="sexo">Sexo</label>
				<select name="sexo" required ng-model="sexo" class="form-control">
					<option></option>
					<option value="F">Femino</option>
					<option value="M">Marculino</option>
				</select>
			</div>
			<div class="form-group col-sm-4">
				<label for="estadoCivil">Estado civil</label>
				<select name="estadoCivil" required ng-model="estadoCivil" class="form-control">
					<option></option>
					<option>Solteiro</option>
					<option>Casado</option>
					<option>Divorciado</option>
					<option>Viúvo</option>
				</select>
			</div>
			<div class="form-group col-sm-4">
				<label for="tipoUsuario">Tipo de usuário</label>
				<select name="tipoUsuario" required ng-model="tipoUsuario" class="form-control">
					<option></option>
            		<option value="admin">Administrador</option>
           			<option value="estud">Estudante</option>
					<option value="func">Funcionario</option>
					<option value="tesou">Tesoureiro</option>
				</select>
			</div>
			<div class="form-group col-sm-4">
				<label for="email">Email</label>
				<input name="email" type="text" required ng-model="email" class="form-control" id="email"
					placeholder="example@gmail.com">
			</div>
			<div class="form-group col-sm-4">
				<label for="senha">Senha</label>
				<input name="senha" type="password" required ng-model="senha" class="form-control" id="senha"
					placeholder="*********">
			</div>

			<br><br><br><br><br><br><br><br><br><br><br>
			<div class="borda"></div>

			<!-- ENDEREÇO -->
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
					<option></option>
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

			<br><br><br><br><br><br><br><br><br><br><br>
			<div class="borda"></div>
			<!-- TELEFONES -->

			<h5 class="featurette-heading"><span class="text-muted">Telefones para contato</span></h5>
			<div class="form-group col-sm-4">
				<label for="dddCelular1">DDD 1</label>
				<input name="dddCelular1" type="numeric" required ng-model="dddCelular1" class="form-control"
					id="dddCelular1" placeholder="(00)">
			</div>
			<div class="form-group col-sm-4">
				<label for="telefoneCelular1">Celular 1</label>
				<input name="telefoneCelular1" type="numeric" required ng-model="telefoneCelular1" class="form-control"
					id="telefoneCelular1" placeholder="00000-0000">
			</div>
			<div class="form-group col-sm-4">
				<label for="dddCelular2">DDD 2</label>
				<input name="dddCelular2" type="numeric" ng-model="dddCelular2" class="form-control" id="dddCelular2"
					placeholder="(00)">
			</div>
			<div class="form-group col-sm-4">
				<label for="telefoneCelular2">Celular 2</label>
				<input name="telefoneCelular2" type="numeric" ng-model="telefoneCelular2" class="form-control"
					id="telefoneCelular2" placeholder="00000-0000">
			</div>
			<div class="form-group col-sm-4">
				<label for="dddResidencial">DDD Fixo</label>
				<input name="dddResidencial" type="numeric" ng-model="dddResidencial" class="form-control"
					id="dddResidencial" placeholder="(00)">
			</div>
			<div class="form-group col-sm-4">
				<label for="telefoneResidencial">Telefone fixo</label>
				<input name="telefoneResidencial" type="numeric" ng-model="telefoneResidencial" class="form-control"
					id="telefoneResidencial" placeholder="0000-0000">
			</div>

			<br><br><br><br><br><br><br><br>
			<div class="borda"></div>
			<!-- DEPARTAMENTO E PROFISSAO -->

			<div id="areaFuncionario">
				<h5 class="featurette-heading"><span class="text-muted">Departamento e Profissão</span></h5>
				<div class="form-group col-sm-4">
					<label for="departamento">Departamento</label>
					<input name="departamento" type="text" required ng-model="departamento" class="form-control"
						id="departamento" placeholder="Área de trabalho">
				</div>
				<div class="form-group col-sm-4">
					<label for="profissao">Profissão</label>
					<input name="profissao" type="text" required ng-model="profissao" class="form-control"
						id="profissao" placeholder="Profissao">
				</div>
				<div class="form-group col-sm-4">
					<label for="dataCadastro">Data de cadastro</label>
					<input name="dataCadastro" type="date" required ng-model="dataCadastro" class="form-control"
						id="dataCadastro" placeholder="dataCadastro">
				</div>
				<br><br><br><br>
			</div>
			<div id="areaEstudante">
				<h5 class="featurette-heading"><span class="text-muted">Escolaridade</span></h5>
				<div class="form-group col-sm-4">
					<label for="instituicao">Instituição</label>
					<input name="instituicao" type="text" required ng-model="instituicao" class="form-control"
						id="instituicao" placeholder="Instituição">
				</div>
				<div class="form-group col-sm-4">
					<label for="matricula">Matricula</label>
					<input name="matricula" type="text" required ng-model="matricula" class="form-control"
						id="matricula" placeholder="Matricula">
				</div>
				<div class="form-group col-sm-4">
					<label for="curso">Curso</label>
					<input name="curso" type="text" required ng-model="curso" class="form-control" id="curso"
						placeholder="Curso">
				</div>
				<div class="form-group col-sm-4">
					<label for="dataInicioCurso">Data de início do curso</label>
					<input name="dataInicioCurso" type="date" required ng-model="dataInicioCurso" class="form-control"
						id="dataInicioCurso" placeholder="dd/mm/aaaa">
				</div>
				<div class="form-group col-sm-4">
					<label for="dataFinalCurso">Data final do curso</label>
					<input name="dataFinalCurso" type="date" required ng-model="dataFinalCurso" class="form-control"
						id="dataFinalCurso" placeholder="dd/mm/aaaa">
				</div>
				<div class="form-group col-sm-4">
					<label for="periodo">Periódo atual</label>
					<input name="periodo" type="numeric" required ng-model="periodo" class="form-control" id="periodo"
						placeholder="Periódo atual">
				</div>
				<div class="form-group col-sm-4">
					<label for="escolaridade">Nível escolaridade</label>
					<select name="escolaridade" class="form-control">
						<option></option>
						<option>Fundamental</option>
						<option>Médio</option>
						<option>Técnico</option>
						<option>Superior</option>
					</select>
				</div>
				<br><br><br><br><br><br><br><br>
			</div>
			<div class="borda"></div>
			<br>
			<div class="center-button" align="center">
				<button type="reset" ng-click="limparCampos()" class="btn btn-default">Limpar</button>
				<button ng-disabled="!cpf" type="submit" class="btn btn-primary">Salvar</button>
			</div>
			<br>
		</form>
	</div><!-- Nav tabs -->

	<!-- Bootstrap core JavaScript
    ================================================== -->
	<!-- Colocado no final do documento para que as páginas sejam carregadas mais rapidamente -->
	<script src="js/bootstrap.min.js"></script>
</body>

</html>