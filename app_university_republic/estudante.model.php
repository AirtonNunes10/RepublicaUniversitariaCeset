<?php 

	require_once "pessoa.model.php";
	require_once "endereco.model.php";
	require_once "telefone.model.php";
	
	class Estudante extends Pessoa{

		private $instituicao;
		private $matricula;
		private $curso;
		private $dataInicioCurso;
		private $dataFinalCurso;
		private $periodo;
		private $escolaridade;

		function __construct($cpf, $nome, $rg, $dataNascimento, $sexo, $estadoCivil, $tipoUsuario, $email, $senha, $cep, $endereco, $numero, $bairro, $cidade, $uf, $complemento, $dddCelular1, $telefoneCelular1, $dddCelular2, $telefoneCelular2, $dddResidencial, $telefoneResidencial) {
            $this->cpf = $cpf;
            $this->nome = $nome;
            $this->rg = $rg;
            $this->dataNascimento = $dataNascimento;
            $this->sexo = $sexo;
            $this->estadoCivil = $estadoCivil;
            $this->tipoUsuario = $tipoUsuario;
            $this->email = $email;
            $this->senha = $senha;
            $this->cep = $cep;
			$this->endereco = $endereco;
			$this->numero = $numero;
			$this->bairro = $bairro;
			$this->cidade = $cidade;
			$this->uf = $uf;
			$this->complemento = $complemento;
			$this->dddCelular1 = $dddCelular1;
			$this->telefoneCelular1 = $telefoneCelular1;
			$this->dddCelular2 = $dddCelular2;
			$this->telefoneCelular2 = $telefoneCelular2;
			$this->dddResidencial = $dddResidencial;
			$this->telefoneResidencial = $telefoneResidencial;
        }

		public function __get($atributo) {
			return $this->$atributo;
		}

		public function __set($atributo, $valor) {
			$this->$atributo = $valor;
		}
	}

?>