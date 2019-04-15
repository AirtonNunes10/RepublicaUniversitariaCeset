var pessoasModulo = angular.module('pessoasModulo',[]);

pessoasModulo.controller("pessoasController", function ($scope, $http){
	$http.get('controller/pessoa.json').then(function(response){
		$scope.pessoa = response.data.pessoa;
	})
});