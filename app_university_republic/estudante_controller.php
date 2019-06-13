<?php

header("Content-Type: application/json; charset=utf-8");
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Credentials: true");
header("Access-Control-Allow-Methods: GET,HEAD,OPTIONS,POST,PUT");
header("Access-Control-Allow-Headers: Origin,Accept, X-Requested-With, Content-Type, Access-Control-Request-Method, Access-Control-Request-Headers");
ini_set('default_charset', 'UTF-8');

require_once "app_university_republic/model/Estudante.php";
require_once "app_university_republic/estudante.service.php";
require_once "app_university_republic/model/Funcionario.php";
require_once "app_university_republic/funcionario.service.php";
require_once "app_university_republic/quarto.service.php";
require_once "app_university_republic/conexao.php";

define("DATATABLES", "1");
define("ARRAY_OBJECTS", "2");

$action = $_POST['action'];

if ($action === "cadastrarEstudante") {

    //$dados = json_decode($_POST['user']); 
    $dados = $_POST['user'];
    $arrayParaReceberDadosDaString = [];
    parse_str(htmlspecialchars_decode($dados), $arrayParaReceberDadosDaString);
    $obj = json_decode(json_encode($arrayParaReceberDadosDaString));

    $conexao = new Conexao();

    $estudante = new Estudante($obj, $conexao);
    $success = $estudante->salvarCadastro();

    if ($success === true) {
        echo json_encode(["sucesso" => 1, "mensagem" => "Estudante cadastrado com sucesso!"]);
    } else {
        echo json_encode(["sucesso" => 0, "mensagem" => $success]);
    }

    exit();

} else if ($action === "cadastrarFuncionario") {

    //$dados = json_decode($_POST['user']); 
    $dados = $_POST['user'];
    $arrayParaReceberDadosDaString = [];
    parse_str(htmlspecialchars_decode($dados), $arrayParaReceberDadosDaString);
    $obj = json_decode(json_encode($arrayParaReceberDadosDaString));

    $conexao = new Conexao();

    $funcionario = new Funcionario($obj, $conexao);
    $success = $funcionario->salvarCadastro();

    if ($success === true) {
        echo json_encode(["sucesso" => 1, "mensagem" => "Funcionário cadastrado com sucesso!"]);
    } else {
        echo json_encode(["sucesso" => 0, "mensagem" => $success]);
    }

    exit();
    
} else if ($action === "consultarEstudantesTable") {

    $conexao = new Conexao();

    $estudanteService = new EstudanteService($conexao);
    $estudanteService->consultarCadastroEstudante(DATATABLES);
    unset($estudanteService);

} else if ($action === "carregarEstudantesOBJ") {

    $conexao = new Conexao();

    $estudanteService = new EstudanteService($conexao);
    $estudanteService->consultarCadastroEstudante(ARRAY_OBJECTS);
    unset($estudanteService);

} 

else if ($action === "consultarFuncionariosTable") {

    $conexao = new Conexao();

    $funcionarioService = new FuncionarioService($conexao);
    $funcionarioService->consultarCadastroFuncionario();
    unset($funcionarioService);

} else if ($action === "carregarUsuario") {

    $conexao = new Conexao();

    $id = $_POST['userID'];

    $tipoUsuario = $_POST['tipoUsuario'];
    if ($tipoUsuario === "3") {
        $funcionarioService = new FuncionarioService($conexao);
        $funcionarioService->consultarFuncionario($id);
        unset($funcionarioService);
    } else {
        $estudanteService = new EstudanteService($conexao);
        $estudanteService->consultarEstudante($id);
        unset($estudanteService);
    }

} else if ($action === "excluirUsuario") {

    $conexao = new Conexao();

    $id = $_POST['userID'];
    $estudanteService = new EstudanteService($conexao);
    $estudanteService->excluirCadastro($id);
    unset($estudanteService);

} else if ($action === "atualizarEstudante") {

    $dados = $_POST['user'];
    $arrayParaReceberDadosDaString = [];
    parse_str(htmlspecialchars_decode($dados), $arrayParaReceberDadosDaString);
    $obj = json_decode(json_encode($arrayParaReceberDadosDaString));

    $conexao = new Conexao();
    $estudanteReference = json_decode(json_encode($_POST['reference']));

    $estudante = new Estudante($obj, $conexao);
    $estudante->setIdEstudante($estudanteReference->idEstudante);
    $estudante->setIdUsuario($estudanteReference->idUsuario);
    $success = $estudante->atualizarCadastro();

    if ($success === true) {
        echo json_encode(["sucesso" => 1, "mensagem" => "Estudante atualizado com sucesso!"]);
    } else {
        echo json_encode(["sucesso" => 0, "mensagem" => $success]);
    }

    exit();

} else if ($action === "atualizarFuncionario") {

    $dados = $_POST['user'];
    $arrayParaReceberDadosDaString = [];
    parse_str(htmlspecialchars_decode($dados), $arrayParaReceberDadosDaString);
    $obj = json_decode(json_encode($arrayParaReceberDadosDaString));

    $conexao = new Conexao();
    $funcionarioReference = json_decode(json_encode($_POST['reference']));

    $funcionario = new Funcionario($obj, $conexao);
    $funcionario->setIdFuncionario($funcionarioReference->idFuncionario);
    $funcionario->setIdUsuario($funcionarioReference->idUsuario);
    $success = $funcionario->atualizarCadastro();

    if ($success === true) {
        echo json_encode(["sucesso" => 1, "mensagem" => "Funcionario atualizado com sucesso!"]);
    } else {
        echo json_encode(["sucesso" => 0, "mensagem" => $success]);
    }

    exit();

} else if ($action === "locarEstudante") {

    $dados = $_POST['user'];
    $arrayParaReceberDadosDaString = [];
    parse_str(htmlspecialchars_decode($dados), $arrayParaReceberDadosDaString);
    $dados = json_decode(json_encode($arrayParaReceberDadosDaString));
    $estudanteId = $dados->estudante;
    $quartoId = $dados->quarto;

    $conexao = new Conexao(); 

    $quartoService = new QuartoService($conexao);
    $success = $quartoService->salvarCadastro($quartoId, $estudanteId);

    if($success === true){
        echo json_encode(["sucesso" => 1, "mensagem" => "Estudante alocado com sucesso!"]);
    } else {
        echo json_encode(["sucesso" => 0, "mensagem" => $success]);
    }

    exit();

}else if ($action === "consultarLocacoesTable") {

    $conexao = new Conexao();

    $quartoService = new QuartoService($conexao);
    $quartoService->consultarCadastroQuarto(DATATABLES);
    unset($quartoService);

}
