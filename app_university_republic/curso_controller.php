<?php
header("Content-Type: application/json; charset=utf-8");
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Credentials: true");
header("Access-Control-Allow-Methods: GET,HEAD,OPTIONS,POST,PUT");
header("Access-Control-Allow-Headers: Origin,Accept, X-Requested-With, Content-Type, Access-Control-Request-Method, Access-Control-Request-Headers");
ini_set('default_charset', 'UTF-8');

require_once"app_university_republic/model/Curso.php";
require_once"app_university_republic/curso.service.php";
require_once"app_university_republic/conexao.php";

$action = $_POST['action'];

$conexao = new Conexao();
$cursoService = new CursoService($conexao);

if ($action === "cadastrarCurso") {

    $dados = json_decode($_POST['curso']); 

    $sigla = $dados->sigla;
    $curso = $dados->curso;

    $curso = new Curso($sigla, $curso);
    $success = $cursoService->salvarCadastro($curso);

    if($success === true){
        echo json_encode(["sucesso" => 1, "mensagem" => "Curso cadastrado com sucesso!"]);
    } else {
        echo json_encode(["sucesso" => 0, "mensagem" => $success]);
    }

    //header('Location: curso.php');

    exit();

} else if($action === "carregarCursos"){

    $cursosBD = $cursoService->carregarCursosObject();
    $cursos = [];
    for($i= 0; $i<count($cursosBD); $i++){
        $curso = new Curso($cursosBD[$i]->sigla, $cursosBD[$i]->nome_curso);
        $curso->setId($cursosBD[$i]->id_curso);
        array_push($cursos, $curso->getOwnProperties());
        unset($curso);
    }

    echo json_encode(["sucesso" => 1, "cursos" => $cursos]);
}

else {

    $conexao = new Conexao();
    
    $cursoService = new CursoService($conexao);
    $cursoService->consultarCadastroCurso();
    unset($cursoService);
    
}
