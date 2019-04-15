<?php  

	abstract class Pessoa {
		
		private $cpf;
		private $nome;
		private $rg;
		private $dataNascimento;
		private $sexo;
		private $estadoCivil;
		private $tipoUsuario;
		private $email;
		private $senha;

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