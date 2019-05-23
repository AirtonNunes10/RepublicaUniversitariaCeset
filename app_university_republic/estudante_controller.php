<?php

header("Content-Type: application/json; charset=utf-8");
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Credentials: true");
header("Access-Control-Allow-Methods: GET,HEAD,OPTIONS,POST,PUT");
header("Access-Control-Allow-Headers: Origin,Accept, X-Requested-With, Content-Type, Access-Control-Request-Method, Access-Control-Request-Headers");
ini_set('default_charset', 'UTF-8');

require "app_university_republic/model/Estudante.php";
require "app_university_republic/estudante.service.php";
require "app_university_republic/model/Funcionario.php";
require "app_university_republic/funcionario.service.php";
require "app_university_republic/conexao.php";

$action = $_POST['action'];

if ($action === "cadastrarEstudante") {

    $dados = json_decode($_POST['user']); 

    $conexao = new Conexao();

    $estudante = new Estudante($dados, $conexao);
    $success = $estudante->salvarCadastro();

    if($success === true){
        echo json_encode(["sucesso" => 1, "mensagem" => "Estudante cadastrado com sucesso!"]);
    } else {
        echo json_encode(["sucesso" => 0, "mensagem" => $success]);
    }

    exit();
} else if ($action === "cadastrarFuncionario") {

    $dados = json_decode($_POST['user']); 

    $conexao = new Conexao();

    $funcionario = new Funcionario($dados, $conexao);
    $success = $funcionario->salvarCadastro();

    if($success){
        echo json_encode(["sucesso" => 1, "mensagem" => "Funcionário cadastrado com sucesso!"]);
    } else {
        echo json_encode(["sucesso" => 0, "mensagem" => "Falha ao cadastrar funcionário."]);
    }

    exit();


} else if ($action === "consultarEstudantesTable") {

    $conexao = new Conexao();
    
    $estudanteService = new EstudanteService($conexao);
    $estudanteService->consultarCadastroEstudante();
    unset($estudanteService);

} else if ($action === "consultarFuncionariosTable") {

    $conexao = new Conexao();
    
    $funcionarioService = new FuncionarioService($conexao);
    $funcionarioService->consultarCadastroFuncionario();
    unset($funcionarioService);
    
} else if ($action === "excluirUsuario"){
    
    $conexao = new Conexao();

    $id = $_POST['userID'];
    $estudanteService = new EstudanteService($conexao);
    $estudanteService->excluirCadastro($id);
    unset($estudanteService);
}