<?php  

	class TelefoneContato {
		
		private $dddCelular1;
		private $telefoneCelular1;
		private $dddCelular2;
		private $telefoneCelular2;
		private $dddResidencial;
		private $telefoneResidencial;

		public function __get($atributo){
			return $this->$atributo;
		}

		public function __set($atributo, $valor){
			$this->$atributo = $valor;
		}

	}

?>