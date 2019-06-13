<?php
header("Content-Type: application/json; charset=utf-8");
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Credentials: true");
header("Access-Control-Allow-Methods: GET,HEAD,OPTIONS,POST,PUT");
header("Access-Control-Allow-Headers: Origin,Accept, X-Requested-With, Content-Type, Access-Control-Request-Method, Access-Control-Request-Headers");
ini_set('default_charset', 'UTF-8');

require_once"app_university_republic/model/Quarto.php";
require_once"app_university_republic/quarto.service.php";
require_once"app_university_republic/conexao.php";

$action = $_POST['action'];

$conexao = new Conexao();
$quartoService = new QuartoService($conexao);

if($action === "carregarQuartos"){
    $quartosBD = $quartoService->carregarQuartosObject();
    $quartos = [];
    for($i= 0; $i<count($quartosBD); $i++){
        $quarto = new Quarto($quartosBD[$i]->id_quarto, $quartosBD[$i]->nome_quarto);
        $quarto->setId($quartosBD[$i]->id_quarto);
        array_push($quartos, $quarto->getOwnProperties());
        unset($quarto);
    }
    echo json_encode(["sucesso" => 1, "quartos" => $quartos]);
}
