<?php 

	require "../../app__university_republic/funcionario.model.php";
	require "../../app__university_republic/funcionario.service.php";
	require "../../app__university_republic/conexao.php";

	$funcionario = new funcionario('cpf', 'nome', 'rg', 'dataNascimento', 'sexo', 'estadoCivil', 'tipoUsuario', 'email', 'senha', 'cep', 'endereco', 'numero', 'bairro', 'cidade', 'uf', 'complemento', 'dddCelular1', 'telefoneCelular1', 'dddCelular2', 'telefoneCelular2', 'dddResidencial', 'telefoneResidencial');
	$funcionario->__set('cpf', $_POST['cpf']);
	$funcionario->__set('nome', $_POST['nome']);
	$funcionario->__set('rg', $_POST['rg']);
	$funcionario->__set('dataNascimento', $_POST['dataNascimento']);
	$funcionario->__set('sexo', $_POST['sexo']);
	$funcionario->__set('estadoCivil', $_POST['estadoCivil']);
	$funcionario->__set('tipoUsuario', $_POST['tipoUsuario']);
	$funcionario->__set('email', $_POST['email']);
	$funcionario->__set('senha', $_POST['senha']);
	$funcionario->__set('cep', $_POST['cep']);
	$funcionario->__set('endereco', $_POST['endereco']);
	$funcionario->__set('numero', $_POST['numero']);
	$funcionario->__set('bairro', $_POST['bairro']);
	$funcionario->__set('cidade', $_POST['cidade']);
	$funcionario->__set('uf', $_POST['uf']);
	$funcionario->__set('complemento', $_POST['complemento']);
	$funcionario->__set('dddCelular1', $_POST['dddCelular1']);
	$funcionario->__set('telefoneCelular1', $_POST['telefoneCelular1']);
	$funcionario->__set('dddCelular2', $_POST['dddCelular2']);
	$funcionario->__set('telefoneCelular2', $_POST['telefoneCelular2']);
	$funcionario->__set('dddResidencial', $_POST['dddResidencial']);
	$funcionario->__set('telefoneResidencial', $_POST['telefoneResidencial']);
	$funcionario->__set('departamento', $_POST['departamento']);
	$funcionario->__set('profissao', $_POST['profissao']);
	$funcionario->__set('dataCadastro', $_POST['dataCadastro']);

	$conexao = new Conexao();

	$funcionarioService = new FuncionarioService($conexao, $funcionario);
	$funcionarioService->salvarCadastro();

	header('Location: paginaEstudante.php?inclusao=1');
	
?>