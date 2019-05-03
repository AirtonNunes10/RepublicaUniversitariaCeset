<?php

require "app_university_republic/estudante.model.php";
require "app_university_republic/estudante.service.php";
require "app_university_republic/conexao.php";

$action = $_POST['action'];

if ($action === "cadastrarEstudante") {
	$estudante = new Estudante('cpf', 'nome', 'rg', 'dataNascimento', 'sexo', 'estadoCivil', 'tipoUsuario', 'email', 'senha', 'cep', 'endereco', 'numero', 'bairro', 'cidade', 'uf', 'complemento', 'dddCelular1', 'telefoneCelular1', 'dddCelular2', 'telefoneCelular2', 'dddResidencial', 'telefoneResidencial');
    $estudante->__set('cpf', $_POST['cpf']);
    $estudante->__set('nome', $_POST['nome']);
    $estudante->__set('rg', $_POST['rg']);
    $estudante->__set('dataNascimento', $_POST['dataNascimento']);
    $estudante->__set('sexo', $_POST['sexo']);
    $estudante->__set('estadoCivil', $_POST['estadoCivil']);
    $estudante->__set('tipoUsuario', $_POST['tipoUsuario']);
    $estudante->__set('email', $_POST['email']);
    $estudante->__set('senha', $_POST['senha']);
    $estudante->__set('instituicao', $_POST['instituicao']);
    $estudante->__set('matricula', $_POST['matricula']);
    $estudante->__set('curso', $_POST['curso']);
    $estudante->__set('dataInicioCurso', $_POST['dataInicioCurso']);
    $estudante->__set('dataFinalCurso', $_POST['dataFinalCurso']);
    $estudante->__set('periodo', $_POST['periodo']);
    $estudante->__set('escolaridade', $_POST['escolaridade']);
    $estudante->__set('cep', $_POST['cep']);
    $estudante->__set('endereco', $_POST['endereco']);
    $estudante->__set('numero', $_POST['numero']);
    $estudante->__set('bairro', $_POST['bairro']);
    $estudante->__set('cidade', $_POST['cidade']);
    $estudante->__set('uf', $_POST['uf']);
    $estudante->__set('complemento', $_POST['complemento']);
    $estudante->__set('dddCelular1', $_POST['dddCelular1']);
    $estudante->__set('telefoneCelular1', $_POST['telefoneCelular1']);
    $estudante->__set('dddCelular2', $_POST['dddCelular2']);
    $estudante->__set('telefoneCelular2', $_POST['telefoneCelular2']);
    $estudante->__set('dddResidencial', $_POST['dddResidencial']);
    $estudante->__set('telefoneResidencial', $_POST['telefoneResidencial']);

    $conexao = new Conexao();

    $estudanteService = new EstudanteService($conexao, $estudante);
    $estudanteService->salvarCadastro();
    /*
    echo '<pre>';
    print_r($funcionarioService);
    echo '</pre>';
     */
    header('Location: usuario.php?inclusao=1');
} else if ($action === "consultarEstudantesTable") {
    $conexao = new Conexao();
    $estudante = new Estudante('cpf', 'nome', 'rg', 'dataNascimento', 'sexo', 'estadoCivil', 'tipoUsuario', 'email', 'senha', 'cep', 'endereco', 'numero', 'bairro', 'cidade', 'uf', 'complemento', 'dddCelular1', 'telefoneCelular1', 'dddCelular2', 'telefoneCelular2', 'dddResidencial', 'telefoneResidencial');
    
    $estudanteService = new EstudanteService($conexao, $estudante);
    $estudanteService->consultarCadastro();
}
