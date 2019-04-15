<?php  

class Conexao{
	
	private $host = 'localhost';
	private $dbname = 'id9269648_cesert';
	//private $dbname = 'cesert';
	private $user = 'id9269648_cesert';
	//private $user = 'root';
	private $pass = 'cesert2019';

	public function conectar(){
		try{

			$conexao = new PDO(
				"mysql:host=$this->host;dbname=$this->dbname",
				"$this->user",
				"$this->pass"
			);

			return $conexao;

		}catch (PDOException $e){
			echo '<p>'.$e->getMessege().'</p>';
		}
	}
}

?>