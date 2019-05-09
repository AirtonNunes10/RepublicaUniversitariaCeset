<?php

header("Access-Control-Allow-Header: Origin, Accept, X-Requested-with, Content-Type, Access-Control-Request-Method, Access-Control-Request-Headers");
header("Content-Type: application/json; charset=utf-8");
ini_set("default_charset", "UTF-8");
error_reporting(E_ALL);
ini_set('display_errors', true);
ini_set('display_startup_errors', true);

require "app_university_republic/estudante.model.php";
require "app_university_republic/estudante.service.php";
require "app_university_republic/conexao.php";


$action = $_POST['action'];

if ($action === "cadastrarEstudante") {
    $user = json_decode($_POST['user']);
    
    var_dump($user);

	$estudante = new Estudante('cpf', 'nome', 'rg', 'dataNascimento', 'sexo', 'estadoCivil', 'tipoUsuario', 'email', 'senha', 'cep', 'endereco', 'numero', 'bairro', 'cidade', 'uf', 'complemento', 'dddCelular1', 'telefoneCelular1', 'dddCelular2', 'telefoneCelular2', 'dddResidencial', 'telefoneResidencial');
    $estudante->__set('cpf', $user->cpf);
    $estudante->__set('nome', $user->nome);
    $estudante->__set('rg', $user->rg);
    $estudante->__set('dataNascimento', $user->dataNascimento);
    $estudante->__set('sexo', $user->sexo);
    $estudante->__set('estadoCivil', $user->estadoCivil);
    $estudante->__set('tipoUsuario', $user->tipoUsuario);
    $estudante->__set('email', $user->email);
    $estudante->__set('senha', $user->senha);
    $estudante->__set('instituicao', $user->instituicao);
    $estudante->__set('matricula', $user->matricula);
    $estudante->__set('curso', $user->curso);
    $estudante->__set('dataInicioCurso', $user->dataInicioCurso);
    $estudante->__set('dataFinalCurso', $user->dataFinalCurso);
    $estudante->__set('periodo', $user->periodo);
    $estudante->__set('escolaridade', $user->escolaridade);
    $estudante->__set('cep', $user->cep);
    $estudante->__set('endereco', $user->endereco);
    $estudante->__set('numero', $user->numero);
    $estudante->__set('bairro', $user->bairro);
    $estudante->__set('cidade', $user->cidade);
    $estudante->__set('uf', $user->uf);
    $estudante->__set('complemento', $user->complemento);
    $estudante->__set('dddCelular1', $user->dddCelular1);
    $estudante->__set('telefoneCelular1', $user->telefoneCelular1);
    $estudante->__set('dddCelular2', $user->dddCelular2);
    $estudante->__set('telefoneCelular2', $user->telefoneCelular2);
    $estudante->__set('dddResidencial', $user->dddResidencial);
    $estudante->__set('telefoneResidencial', $user->telefoneResidencial);

    $conexao = new Conexao();

    $estudanteService = new EstudanteService($conexao, $estudante);
    $estudanteService->salvarCadastro();
    /*
    echo '<pre>';
    print_r($funcionarioService);
    echo '</pre>';
     */
    //header('Location: usuario.php?inclusao=1');
} else if ($action === "consultarEstudantesTable") {
    $conexao = new Conexao();
    $estudante = new Estudante('cpf', 'nome', 'rg', 'dataNascimento', 'sexo', 'estadoCivil', 'tipoUsuario', 'email', 'senha', 'cep', 'endereco', 'numero', 'bairro', 'cidade', 'uf', 'complemento', 'dddCelular1', 'telefoneCelular1', 'dddCelular2', 'telefoneCelular2', 'dddResidencial', 'telefoneResidencial');
    
    $estudanteService = new EstudanteService($conexao, $estudante);
    $estudanteService->consultarCadastro();
}

function file_get_contents_utf8($fn) {
    $content = file_get_contents($fn);
     return mb_convert_encoding($content, 'UTF-8',
         mb_detect_encoding($content, 'UTF-8, ISO-8859-1', true));
}