<?php  

	class EnderecoResidencial{

		private $cep;
		private $endereco;
		private $numero;
		private $bairro;
		private $cidade;
		private $uf;
		private $complemento;

		public function __get($atributo){
			return $this->$atributo;
		}

		public function __set($atributo, $valor){
			$this->$atributo = $valor;
		}
	}

?>