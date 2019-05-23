<?php  
header('Content-Type: text/html; charset=utf-8');
class Conexao{
	
	private $host = 'localhost';
	//private $dbname = 'id9269648_cesert';
	private $dbname = 'cesert';
	//private $user = 'id9269648_cesert';
	private $user = 'root';
	//private $pass = 'cesert2019';
	private $pass = '';
	
	public function conectar(){
		try{

			$conexao = new PDO(
				"mysql:host=$this->host;dbname=$this->dbname;charset=utf8",
				"$this->user",
				"$this->pass"
			);
			$conexao->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
			return $conexao;

		}catch (PDOException $e){
			echo '<p>'.$e->getMessege().'</p>';
		}
	}
}

?>