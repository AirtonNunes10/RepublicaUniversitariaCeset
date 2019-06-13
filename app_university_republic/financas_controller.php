<?php

header("Content-Type: application/json; charset=utf-8");
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Credentials: true");
header("Access-Control-Allow-Methods: GET,HEAD,OPTIONS,POST,PUT");
header("Access-Control-Allow-Headers: Origin,Accept, X-Requested-With, Content-Type, Access-Control-Request-Method, Access-Control-Request-Headers");
ini_set('default_charset', 'UTF-8');

require_once"app_university_republic/model/Pagamento.php";
require_once"app_university_republic/model/Despesa.php";
require_once"app_university_republic/financas.service.php";
require_once"app_university_republic/conexao.php";

$action = $_POST['action'];

if ($action === "cadastrarPagamento") {

    $dados = json_decode($_POST['pagamento']); 

    $cpf = $dados->cpf;
    $nome = $dados->nome;
    $tipoPagamento = $dados->tipoPagamento;
    $valorPagamento = $dados->valorPagamento;

    $conexao = new Conexao();
    $financasService = new FinancasService($conexao);

    $pagamento = new Pagamento($cpf, $nome, $tipoPagamento, $valorPagamento);
    $success = $financasService->salvarPagamento($pagamento);

    if($success === true){
        echo json_encode(["sucesso" => 1, "mensagem" => "Pagamento cadastrado com sucesso!"]);
    } else {
        echo json_encode(["sucesso" => 0, "mensagem" => $success]);
    }

    exit();
    
} else if ($action === "cadastrarDespesa") {

    $dados = json_decode($_POST['despesa']); 

    $codigoCompra = $dados->codigoCompra;
    $descricao = $dados->descricao;
    $quantidade = $dados->quantidade;
    $localCompra = $dados->localCompra;
    $dataCompra = $dados->dataCompra;
    $valorCompra = $dados->valorCompra;

    $conexao = new Conexao();
    $financasService = new FinancasService($conexao);

    $despesa = new Despesa($codigoCompra, $descricao, $quantidade, $localCompra, $dataCompra, $valorCompra);
    $success = $financasService->salvarDespesa($despesa);

    if($success === true){
        echo json_encode(["sucesso" => 1, "mensagem" => "Despesa cadastrada com sucesso!"]);
    } else {
        echo json_encode(["sucesso" => 0, "mensagem" => $success]);
    }

    exit();
    
} else if ($action === "consultarPagamentoTable") {

    $conexao = new Conexao();
    
    $financasService = new FinancasService($conexao);
    $financasService->consultarPagamento();
    unset($financasService);

} else if ($action === "consultarDespesaTable") {

    $conexao = new Conexao();
    
    $financasService = new FinancasService($conexao);
    $financasService->consultarDespesa();
    unset($financasService);

}

else if ($action === "consultarSaldoTable") {

    $conexao = new Conexao();
    
    $financasService = new FinancasService($conexao);
    $financasService->consultarSaldo();
    unset($financasService);

}
?>