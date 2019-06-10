<?php

require_once __DIR__ . '/Pessoa.php';
require_once __DIR__ . '/../estudante.service.php';

class Estudante extends Pessoa
{
	private $instituicao;
	private $matricula;
	private $curso;
	private $dataInicioCurso;
	private $dataFinalCurso;
	private $periodo;
	private $escolaridade;
	private $conexao;
	private $auxService;
	private $idEstudante;

	function __construct($dados, $conexao)
	{
		parent::__construct($dados);
		$this->conexao = $conexao->conectar();
		$this->setCurso($dados->curso);
		$this->setDataFinalCurso($dados->dataFinalCurso);
		$this->setDataInicioCurso($dados->dataInicioCurso);
		$this->setEscolaridade($dados->escolaridade);
		$this->setMatricula($dados->matricula);
		$this->setPeriodo($dados->periodo);
		$this->setInstituicao($dados->instituicao);
		$this->auxService = new EstudanteService($conexao);
	}


	function getIdEstudante()
	{
		return $this->idEstudante;
	}

	function setIdEstudante($idEstudante)
	{
		$this->idEstudante = $idEstudante;
	}

	function getInstituicao()
	{
		return $this->instituicao;
	}

	function getMatricula()
	{
		return $this->matricula;
	}

	function getCurso()
	{
		return $this->curso;
	}

	function getDataInicioCurso()
	{
		return $this->dataInicioCurso;
	}

	function getDataFinalCurso()
	{
		return $this->dataFinalCurso;
	}

	function getPeriodo()
	{
		return $this->periodo;
	}

	function getEscolaridade()
	{
		return $this->escolaridade;
	}

	function setInstituicao($instituicao)
	{
		$this->instituicao = $instituicao;
	}

	function setMatricula($matricula)
	{
		$this->matricula = $matricula;
	}

	function setCurso($curso)
	{
		$this->curso = $curso;
	}

	function setDataInicioCurso($dataInicioCurso)
	{
		$this->dataInicioCurso = $dataInicioCurso;
	}

	function setDataFinalCurso($dataFinalCurso)
	{
		$this->dataFinalCurso = $dataFinalCurso;
	}

	function setPeriodo($periodo)
	{
		$this->periodo = $periodo;
	}

	function setEscolaridade($escolaridade)
	{
		$this->escolaridade = $escolaridade;
	}


	public function excluirCadastro($idUser)
	{
		$this->auxService->excluirCadastro($idUser);
	}

	public function salvarCadastro()
	{
		try {
			$query = 'insert into tb_usuario (cpf, nome, rg, data_nascimento, sexo, estado_civil, tipo_usuario, email, senha, 
                cep, endereco, numero, bairro, cidade, uf, complemento, celular1, celular2)
                values(:cpf, :nome, :rg, :dataNascimento, :sexo, :estadoCivil, :tipoUsuario, :email, :senha, 
                :cep, :endereco, :numero, :bairro, :cidade, :uf, :complemento, :cel, :cel2)';

			$stmt = $this->conexao->prepare($query);

			$stmt->bindValue('cpf', preg_replace('~\D~', '', $this->getCpf()));
			$stmt->bindValue('nome', $this->getNome());
			$stmt->bindValue('rg', preg_replace('~\D~', '', $this->getRg()));
			$stmt->bindValue('dataNascimento', $this->getDataNascimento());
			$stmt->bindValue('sexo', $this->getSexo());
			$stmt->bindValue('estadoCivil', $this->getEstadoCivil());
			$stmt->bindValue('tipoUsuario', $this->getTipoUsuario());
			$stmt->bindValue('email', $this->getEmail());
			$stmt->bindValue('senha', $this->getSenha());
			$stmt->bindValue('cep', preg_replace('~\D~', '', $this->getCep()));
			$stmt->bindValue('endereco', $this->getEndereco());
			$stmt->bindValue('numero', $this->getNumero());
			$stmt->bindValue('bairro',  $this->getBairro());
			$stmt->bindValue('cidade', $this->getCidade());
			$stmt->bindValue('uf', $this->getUf());
			$stmt->bindValue('complemento', $this->getComplemento());
			$stmt->bindValue('cel', $this->getCelularClean());
			$stmt->bindValue('cel2', $this->getCelular2Clean());

			$stmt->execute();
			$rows = $stmt->rowCount();
			if ($rows > 0) {
				try {
					$stmt->closeCursor();
					$cleanCPF = preg_replace('~\D~', '', $this->getCpf());
					$stmt = $this->conexao->prepare("SELECT `id_usuario` FROM `tb_usuario` WHERE `tb_usuario`.`cpf`= :cpf");
					$stmt->bindParam('cpf', $cleanCPF, PDO::PARAM_STR);
					$stmt->execute();
					$rows = $stmt->rowCount();
					if ($rows > 0) {
						$resultado = $stmt->fetch(PDO::FETCH_OBJ);
						//var_dump($stmt->errorInfo());
						$idUsuario = $resultado->id_usuario;

						$query = 'INSERT INTO tb_estudante(escolaridade, fk_estudante_usuario) VALUES(:escolaridade, :iduser)';

						$query = $this->conexao->prepare($query);
						$query->bindValue('escolaridade', $this->getEscolaridade());
						$query->bindParam('iduser', $idUsuario, PDO::PARAM_INT);

						$result = $query->execute();
						$rows = $query->rowCount();

						$cursos = $this->getCurso();
						$sucesso = false;
						for ($i = 0; $i < count($cursos); $i++) {
							if ($rows > 0) {
								$getIdEstudante = 'SELECT id_estudante FROM tb_estudante WHERE fk_estudante_usuario = ' . $idUsuario;
								$get = $this->conexao->query($getIdEstudante);
								$resultado = $get->fetch(PDO::FETCH_OBJ);
								//var_dump($stmt->errorInfo());
								$idEstudante = $resultado->id_estudante;
								$query = 'insert into tb_estudante_curso(fk_estudante_curso, fk_curso_estudante, '
									. 'data_inicio_curso, data_final_curso, periodo, matricula, instituicao) '
									. 'values(:idEst, :idCurso,  :dataInicioCurso, :dataFinalCurso, :periodo, :matricula, :instituicao)';

								$query = $this->conexao->prepare($query);

								$query->bindValue('instituicao', $this->getInstituicao());
								$query->bindValue('matricula', $this->getMatricula());
								$query->bindValue('idCurso', $cursos[$i]);
								$query->bindValue('dataInicioCurso', $this->getDataInicioCurso());
								$query->bindValue('dataFinalCurso', $this->getDataFinalCurso());
								$query->bindValue('periodo', $this->getPeriodo());
								$query->bindParam('idEst', $idEstudante, PDO::PARAM_INT);

								$result = $query->execute();

								$rows = $query->rowCount();
								if ($rows > 0) {
									$sucesso = true;
								} else {
									$this->excluirCadastro($idUsuario);
									break;
								}
							}
						}
						return $sucesso;
					}
				} catch (PDOException $e) {
					$this->excluirCadastro($idUsuario);
					return $e->getMessage();
				}
			}
		} catch (PDOException $e) {
			$codigoErro = $e->getCode();
			if ($codigoErro === "23000") {
				return "CPF, RG ou email já cadastrado(s)";
			} else {
				return $e->getMessage();
			}
		}
	}

	public function atualizarCadastro()
	{
		try {
			$senha = $this->getSenha();
			if (!empty($senha)) {
				$query = 'UPDATE tb_usuario SET cpf=:cpf, nome=:nome, rg=:rg, data_nascimento=:dataNascimento, '
					. 'sexo=:sexo, estado_civil=:estadoCivil, tipo_usuario=:tipoUsuario, email=:email, senha=:senha, '
					. 'cep=:cep, endereco=:endereco, numero=:numero, bairro=:bairro, cidade=:cidade, '
					. 'uf=:uf, complemento=:complemento, celular1=:cel, celular2=:cel2 WHERE id_usuario=:iduser';


				$stmt = $this->conexao->prepare($query);
				$stmt->bindValue('senha', $this->getSenha());
			} else {
				$query = 'UPDATE tb_usuario SET cpf=:cpf, nome=:nome, rg=:rg, data_nascimento=:dataNascimento, '
					. 'sexo=:sexo, estado_civil=:estadoCivil, tipo_usuario=:tipoUsuario, email=:email, '
					. 'cep=:cep, endereco=:endereco, numero=:numero, bairro=:bairro, cidade=:cidade, '
					. 'uf=:uf, complemento=:complemento, celular1=:cel, celular2=:cel2 WHERE id_usuario=:iduser';


				$stmt = $this->conexao->prepare($query);
			}

			$stmt->bindValue('cpf', preg_replace('~\D~', '', $this->getCpf()));
			$stmt->bindValue('nome', $this->getNome());
			$stmt->bindValue('rg', preg_replace('~\D~', '', $this->getRg()));
			$stmt->bindValue('dataNascimento', $this->getDataNascimento());
			$stmt->bindValue('sexo', $this->getSexo());
			$stmt->bindValue('estadoCivil', $this->getEstadoCivil());
			$stmt->bindValue('tipoUsuario', $this->getTipoUsuario());
			$stmt->bindValue('email', $this->getEmail());
			$stmt->bindValue('cep', preg_replace('~\D~', '', $this->getCep()));
			$stmt->bindValue('endereco', $this->getEndereco());
			$stmt->bindValue('numero', $this->getNumero());
			$stmt->bindValue('bairro',  $this->getBairro());
			$stmt->bindValue('cidade', $this->getCidade());
			$stmt->bindValue('uf', $this->getUf());
			$stmt->bindValue('complemento', $this->getComplemento());
			$stmt->bindValue('cel', $this->getCelularClean());
			$stmt->bindValue('cel2', $this->getCelular2Clean());
			$stmt->bindValue('iduser', $this->getIdUsuario());

			$stmt->execute();

			try {
				$stmt->closeCursor();

				$idUsuario = $this->getIdUsuario();
				$getIdEstudante = 'SELECT id_estudante FROM tb_estudante WHERE fk_estudante_usuario = ' . $idUsuario;
				$get = $this->conexao->query($getIdEstudante);
				$resultado = $get->fetch(PDO::FETCH_OBJ);
				$idEstudante = $resultado->id_estudante;

				$query = 'UPDATE tb_estudante SET escolaridade=:escolaridade WHERE fk_estudante_usuario = :iduser';
				$query = $this->conexao->prepare($query);
				$query->bindValue('escolaridade', $this->getEscolaridade());
				$query->bindValue('iduser', $idUsuario);

				$result = $query->execute();


				$stmt = $this->conexao->prepare("DELETE FROM `tb_estudante_curso` WHERE `fk_estudante_curso`=:idEstudante");
				$stmt->bindParam('idEstudante', $idEstudante, PDO::PARAM_INT);
				$stmt->execute();
				$rows = $stmt->rowCount();

				$cursos = $this->getCurso();
				$sucesso = false;
				for ($i = 0; $i < count($cursos); $i++) {

					$query = 'insert into tb_estudante_curso(fk_estudante_curso, fk_curso_estudante, '
						. 'data_inicio_curso, data_final_curso, periodo, matricula, instituicao) '
						. 'values(:idEst, :idCurso,  :dataInicioCurso, :dataFinalCurso, :periodo, :matricula, :instituicao)';

					$query = $this->conexao->prepare($query);

					$query->bindValue('instituicao', $this->getInstituicao());
					$query->bindValue('matricula', $this->getMatricula());
					$query->bindValue('idCurso', $cursos[$i]);
					$query->bindValue('dataInicioCurso', $this->getDataInicioCurso());
					$query->bindValue('dataFinalCurso', $this->getDataFinalCurso());
					$query->bindValue('periodo', $this->getPeriodo());
					$query->bindParam('idEst', $idEstudante, PDO::PARAM_INT);

					$result = $query->execute();

					$rows = $query->rowCount();
					if ($rows > 0) {
						$sucesso = true;
					} else {
						$sucesso = false;
						break;
					}
				}
				return $sucesso;
			} catch (PDOException $e) {
				return $e->getMessage();
			}
		} catch (PDOException $e) {
			$codigoErro = $e->getCode();
			if ($codigoErro === "23000") {
				return "CPF, RG ou email já cadastrado(s)";
			} else {
				return $e->getMessage();
			}
		}
	}

	public function getOwnProperties()
	{
		$thisVars = get_object_vars($this);
		$parentVars = parent::getProperties();
		$selfVars = array_merge_recursive($parentVars, $thisVars);
		$return = [];
		foreach ($selfVars as $currentKey => $currentVal) {
			$return[$currentKey] = $currentVal;
		}
		return $return;
	}

	public function validarDados()
	{ // Valida os dados preenchidos se são vazios ou nulos
		$selfVars = get_object_vars($this);

		foreach ($selfVars as $currentKey => $currentVal) {
			if (!is_null($currentVal)) {
				if (!empty($currentVal)) {
					continue;
				} else {
					$mensagemErro = $currentKey . " não possui valor atribuído";
					break;
				}
			} else {
				$mensagemErro = $currentKey . " com valor " . $currentVal;
				break;
			}
		}
		if (!empty($mensagemErro)) {
			throw new Exception($mensagemErro);
		}

		return true;
	}
}
