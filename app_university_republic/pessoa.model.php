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
		private $cep;
		private $endereco;
		private $numero;
		private $bairro;
		private $cidade;
		private $uf;
		private $complemento;
		private $celular1;
		private $celular2;
		

		public function __get($atributo){
			return $this->$atributo;
		}

		public function __set($atributo, $valor){
			$this->$atributo = $valor;
		}

		

	}

?>