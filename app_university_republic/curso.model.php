<?php

	class Curso {
		
		private $sigla;
        private $curso;
        
        function __construct($sigla, $curso) {
            $this->cpf = $sigla;
            $this->nome = $curso;
        }

		public function __get($atributo){
			return $this->$atributo;
		}

		public function __set($atributo, $valor){
			$this->$atributo = $valor;
		}

		public function salvarCadastro(){
			
		}

		public function consultarCadastro(){

		}

		public function editarCadastro(){
		
		}

		public function excluirCadastro(){
			
		}

	}

?>