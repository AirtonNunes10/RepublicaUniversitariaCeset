<?php

header("Content-Type: application/json; charset=utf-8");
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Credentials: true");
header("Access-Control-Allow-Methods: GET,HEAD,OPTIONS,POST,PUT");
header("Access-Control-Allow-Headers: Origin,Accept, X-Requested-With, Content-Type, Access-Control-Request-Method, Access-Control-Request-Headers");
ini_set('default_charset', 'UTF-8');

require "app_university_republic/model/Estudante.php";
require "app_university_republic/estudante.service.php";
require "app_university_republic/conexao.php";

$action = $_POST['action'];

if ($action === "cadastrarEstudante") {

    $dados = json_decode($_POST['user']); 

    $conexao = new Conexao();

    $estudante = new Estudante($dados, $conexao);

    echo "\n\n\n\n\n\n\n";
    $estudante->excluirCadastro();
    exit();
    
    $estudanteService = new EstudanteService($conexao);
    $estudanteService->salvarCadastro($estudante);
    /*
      echo '<pre>';
      print_r($funcionarioService);
      echo '</pre>';
     */
    header('Location: usuario.php?inclusao=1');
} else if ($action === "consultarEstudantesTable") {
    $conexao = new Conexao();
    
    $estudanteService = new EstudanteService($conexao);
    $estudanteService->consultarCadastro();
}