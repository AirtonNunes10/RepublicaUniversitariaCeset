<?php
header("Content-Type: application/json; charset=utf-8");
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Credentials: true");
header("Access-Control-Allow-Methods: GET,HEAD,OPTIONS,POST,PUT");
header("Access-Control-Allow-Headers: Origin,Accept, X-Requested-With, Content-Type, Access-Control-Request-Method, Access-Control-Request-Headers");
ini_set('default_charset', 'UTF-8');

require_once"app_university_republic/login.service.php";
require_once"app_university_republic/conexao.php";

session_start();

$action = $_POST['action'];

$conexao = new Conexao();
$loginService = new LoginService($conexao);

if($action === "loginUsuario"){

	$usuario_autenticado = false;

    $email = $_POST['email'];
    $senha = $_POST['senha'];

	$usuarioBD = $loginService->loginUsuario($email, $senha);

    if ($usuarioBD){

		if ($usuarioBD != 3){
			$usuario_autenticado = true;
		} else {
			header('Location: login.php?login=erro3');
			exit();
		}
        
    }

    if($usuario_autenticado) {
		$_SESSION['autenticado'] = 'SIM';
		$_SESSION['usuario_perfil'] = $usuarioBD;
		header('Location: principal.php');
	} else {
		$_SESSION['autenticado'] = 'NAO';
		header('Location: login.php?login=erro');
	}

    exit();

}
