<?php
header("Content-Type: application/json; charset=utf-8");
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Credentials: true");
header("Access-Control-Allow-Methods: GET,HEAD,OPTIONS,POST,PUT");
header("Access-Control-Allow-Headers: Origin,Accept, X-Requested-With, Content-Type, Access-Control-Request-Method, Access-Control-Request-Headers");
ini_set('default_charset', 'UTF-8');

require "app_university_republic/model/Curso.php";
require "app_university_republic/curso.service.php";
require "app_university_republic/conexao.php";

$action = $_POST['action'];

if ($action === "cadastrarCurso") {

    //$dados = json_decode($_POST['user']); 

    $sigla = $_POST['sigla'];
    $curso = $_POST['curso'];
    
    $conexao = new Conexao();

    $curso = new Curso($sigla, $curso, $conexao);
    $success = $curso->salvarCadastro();

    if($success === true){
        echo json_encode(["sucesso" => 1, "mensagem" => "Curso cadastrado com sucesso!"]);
    } else {
        echo json_encode(["sucesso" => 0, "mensagem" => $success]);
    }

    //exit();
    /*
    echo '<pre>';
    print_r($cursoService);
    echo '</pre>';
     */
    header('Location: curso.php?inclusao=1');
} else {

    $conexao = new Conexao();
    
    $cursoService = new CursoService($conexao);
    $cursoService->consultarCadastroCurso();
    unset($cursoService);
    
}
