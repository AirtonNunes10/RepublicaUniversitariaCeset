var cursosModulo = angular.module('cursosModulo',[]);

cursosModulo.controller("cursosController", function($scope, $http) {
	
	urlCurso = 'http://localhost:8080/RepublicaUniversitaria/rest/cursos';
	
	$scope.listarCursos = function() {
		$http.get(urlCurso).success(function (curso) {
			$scope.curso = curso;	
		}).error (function (erro) {
			alert(erro);
		});	
	}
	
	$scope.selecionaCurso = function(cursoSelecionado) {
		$scope.curso = cursoSelecionado;
	}

	$scope.limparCampos = function() {
		$scope.curso = "";
	}
	
	$scope.salvarCurso = function() {
		alert($scope.curso.codigo);
		console.log($scope.curso.codigo);
		if ($scope.curso.codigo == undefined) {
			alert("POST - codigo vazio = novo registro");
			console.log("POST - codigo vazio = novo registro");
		   $http.post(urlCurso,$scope.curso).success(function(curso) {
		        $scope.cursos.push($scope.curso);
		        $scope.limparCampos();
		   }).error (function (erro) {
				alert(erro);
			});
		  	
		} else {
			alert("PUT - codigo nao vazio = altera registro");
			console.log("PUT - codigo nao vazio = altera registro");
			  $http.put(urlCurso,$scope.curso).success(function(curso) {
				  $scope.listarCursos();
			      $scope.limparCampos();
			   }).error (function (erro) {
					alert(erro);
				});	
		}
		

	}
	
	$scope.excluir = function() {
		if ($scope.curso.codigo == undefined) {
			alert("Favor selecionar um registro para poder excluir");
			console.log("Favor selecionar um registro para poder excluir");
		} else {
			$http.delete(urlCurso+'/'+$scope.curso.codigo).success(function () {
				 $scope.listarCursos();
			     $scope.limparCampos();
			  }).error (function (erro) {
					alert(erro);
				});	
		}
	}
	
	//executa
	$scope.listarCursos();
	
});
