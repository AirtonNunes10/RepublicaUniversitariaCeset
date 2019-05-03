<?php

require "app_university_republic/curso.model.php";
require "app_university_republic/curso.service.php";
require "app_university_republic/conexao.php";

$action = $_POST['action'];

if ($action === "cadastrarCurso") {
	$curso = new Curso('sigla', 'curso');
    $curso->__set('sigla', $_POST['sigla']);
    $curso->__set('curso', $_POST['curso']);

    $conexao = new Conexao();

    $cursoService = new CursoService($conexao, $curso);
    $cursoService->salvarCadastro();
    /*
    echo '<pre>';
    print_r($cursoService);
    echo '</pre>';
     */
    header('Location: curso.php?inclusao=1');
} else {
    $conexao = new Conexao();
    $curso = new Curso('sigla', 'curso');
    
    $cursoService = new CursoService($conexao, $curso);
    $cursoService->consultarCadastro();
}
