<?php

//use ___PHPSTORM_HELPERS\object; //q?

header('Content-Type: text/html; charset=utf-8');

include_once __DIR__."/mascarar.php";
require_once __DIR__ . '/model/Curso.php';

class EstudanteService
{

	private $conexao;
	private $conexaoObj;

	public function __construct(Conexao $conexao)
	{
		$this->conexao = $conexao->conectar();
		$this->conexaoObj = $conexao;
	}

	public function consultarEstudante($idEstudante)
	{
		$query = "SELECT tb_usuario.*, tb_estudante.*, tb_estudante_curso.*, tb_curso.*  "
			. "FROM tb_usuario INNER JOIN tb_estudante ON "
			. "tb_usuario.id_usuario = tb_estudante.fk_estudante_usuario "
			. "INNER JOIN tb_estudante_curso ON tb_estudante.id_estudante = tb_estudante_curso.fk_estudante_curso "
			. "INNER JOIN tb_curso ON tb_estudante_curso.fk_curso_estudante = tb_curso.id_curso "
			. "WHERE tb_usuario.id_usuario = " . $idEstudante . " ORDER BY tb_estudante_curso.id_estudante_curso DESC";
		$query = $this->conexao->query($query);
		$result = $query->fetchAll(PDO::FETCH_OBJ);
		if ($result) {
			$estudanteBD =  $result;
			$tempData = new stdClass();
			$tempData = $estudanteBD[0];
			$cursos = [];

			for ($i = 0; $i < count($estudanteBD); $i++) {
				$curso = new Curso($estudanteBD[$i]->sigla, $estudanteBD[$i]->nome_curso);
				$curso->setId($estudanteBD[$i]->id_curso);
				array_push($cursos, (object)$curso->getOwnProperties());
				unset($curso);
			}
			$tempData->curso = array_reverse($cursos);
			unset($cursos);

			$tempData->dataFinalCurso = $estudanteBD[0]->data_final_curso;
			unset($tempData->data_final_curso);

			$tempData->dataInicioCurso = $estudanteBD[0]->data_inicio_curso;
			unset($tempData->data_inicio_curso);

			$tempData->celular = $estudanteBD[0]->celular1;
			unset($tempData->celular1);

			$tempData->dataNascimento = $estudanteBD[0]->data_nascimento;
			unset($tempData->data_nascimento);

			$tempData->estadoCivil = $estudanteBD[0]->estado_civil;
			unset($tempData->estado_civil);

			$tempData->tipoUsuario = $estudanteBD[0]->tipo_usuario;
			unset($tempData->tipo_usuario);
			unset($estudanteBD);
			$estudante = new Estudante($tempData, $this->conexaoObj);

			$estudante->setIdEstudante($tempData->id_estudante);
			$estudante->setIdUsuario($tempData->id_usuario);
			unset($tempData);

			echo json_encode(["sucesso" => 1, "estudante" => (object)$estudante->getOwnProperties()]);
		}
	}

	public function consultarCadastroEstudante($type)
	{
		//$type:1 = Array para Datatables
		//$type:2 = Array de Objetos tipo Estudante
		$query = "SELECT tb_usuario.*, tb_estudante.*, tb_estudante_curso.*, tb_curso.*  "
			. "FROM tb_usuario INNER JOIN tb_estudante ON "
			. "tb_usuario.id_usuario = tb_estudante.fk_estudante_usuario "
			. "INNER JOIN tb_estudante_curso ON tb_estudante.id_estudante = tb_estudante_curso.fk_estudante_curso "
			. "INNER JOIN tb_curso ON tb_estudante_curso.fk_curso_estudante = tb_curso.id_curso ORDER BY tb_estudante_curso.id_estudante_curso DESC";
		$query = $this->conexao->query($query);
		$result = $query->fetchAll(PDO::FETCH_OBJ);
		$tempArray = [];
		$estudantesObjectArray = [];
		$cursos = [];
		$lastId = "";
		$data = array();
		if ($result) {
			$previous = -78;
			for ($i = 0; $i < count($result); $i++) {
				if ($lastId === $result[$i]->id_usuario) {

					$curso = new Curso($result[$i]->sigla,  $result[$i]->nome_curso);
					$curso->setId($result[$i]->id_curso);
					array_push($cursos, (object)$curso->getOwnProperties());
					unset($curso);

					$tempArray[$previous][4] .= ", " . $result[$i]->nome_curso;
					if (array_key_exists($i + 1, $result)) {

						if ($lastId !== $result[$i + 1]->id_usuario) {

							//datatables
							array_push($data, $tempArray[$previous]);

							//Array de Objetos
							$tempData = $result[$i];
							$tempData->dataFinalCurso = date("d/m/Y", strtotime($result[$i]->data_final_curso));
							unset($tempData->data_final_curso);

							$tempData->dataInicioCurso = date("d/m/Y", strtotime($result[$i]->data_inicio_curso));
							unset($tempData->data_inicio_curso);

							$tempData->celular = $result[$i]->celular1;
							unset($tempData->celular1);

							$tempData->dataNascimento = date("d/m/Y", strtotime($result[$i]->data_nascimento));
							unset($tempData->data_nascimento);

							$tempData->estadoCivil = $result[$i]->estado_civil;
							unset($tempData->estado_civil);

							$tempData->tipoUsuario = $result[$i]->tipo_usuario;
							unset($tempData->tipo_usuario);
							$tempData->curso = $cursos;
							$estudante = new Estudante($tempData, $this->conexaoObj);

							$estudante->setIdEstudante($tempData->id_estudante);
							$estudante->setIdUsuario($tempData->id_usuario);

							array_push($estudantesObjectArray, (object)$estudante->getOwnProperties());
							unset($estudante);
							unset($tempData);

							$cursos = [];
						}
					} else {

						//Datatables
						array_push($data, $tempArray[$previous]);

						//ArrayObjects
						$tempData = $result[$i];
						$tempData->dataFinalCurso = date("d/m/Y", strtotime($result[$i]->data_final_curso));
						unset($tempData->data_final_curso);

						$tempData->dataInicioCurso = date("d/m/Y", strtotime($result[$i]->data_inicio_curso));
						unset($tempData->data_inicio_curso);

						$tempData->celular = $result[$i]->celular1;
						unset($tempData->celular1);

						$tempData->dataNascimento = date("d/m/Y", strtotime($result[$i]->data_nascimento));
						unset($tempData->data_nascimento);

						$tempData->estadoCivil = $result[$i]->estado_civil;
						unset($tempData->estado_civil);

						$tempData->tipoUsuario = $result[$i]->tipo_usuario;
						unset($tempData->tipo_usuario);
						$tempData->curso = $cursos;
						$estudante = new Estudante($tempData, $this->conexaoObj);

						$estudante->setIdEstudante($tempData->id_estudante);
						$estudante->setIdUsuario($tempData->id_usuario);

						array_push($estudantesObjectArray, (object)$estudante->getOwnProperties());
						unset($estudante);
						unset($tempData);

						$cursos = [];
					}

					continue;
				}
				$tempArray[$i][] = mascarar($result[$i]->cpf, "###.###.###-##");
				$tempArray[$i][] = $result[$i]->nome;
				$tempArray[$i][] = $result[$i]->email;
				$tempArray[$i][] = $result[$i]->instituicao;
				$tempArray[$i][] = $result[$i]->nome_curso;
				$tempArray[$i][] = $result[$i]->periodo;
				$tempArray[$i][] = date("d/m/Y", strtotime($result[$i]->data_inicio_curso));
				$tempArray[$i][] = date("d/m/Y", strtotime($result[$i]->data_final_curso));
				$tempArray[$i][] =  '<div style="text-align:center">'
					. '<a href="#" class="input-group" data-toggle="modal" data-target="#modalEditarUsuario" onclick="carregarUsuario(\'' . $result[$i]->id_usuario . '\', \'' . $result[$i]->tipo_usuario . '\')"><i class="fa fa-edit"></i></a>&nbsp'
					. '<a href="#" class="input-group" onclick="excluirCadastro(\'' . $result[$i]->id_usuario . '\')"><i class="fa fa-trash"></i></a>'
					. '</div>';

				$curso = new Curso($result[$i]->sigla,  $result[$i]->nome_curso);
				$curso->setId($result[$i]->id_curso);
				array_push($cursos, (object)$curso->getOwnProperties());
				unset($curso);

				$lastId = $result[$i]->id_usuario;
				$previous = $i;
				
				if (array_key_exists($i + 1, $result)) {
					if ($lastId !== $result[$i + 1]->id_usuario) {
						//Datatables
						array_push($data, $tempArray[$i]);

						//ArrayObjects
						$tempData = $result[$i];
						$tempData->dataFinalCurso = date("d/m/Y", strtotime($result[$i]->data_final_curso));
						unset($tempData->data_final_curso);

						$tempData->dataInicioCurso = date("d/m/Y", strtotime($result[$i]->data_inicio_curso));
						unset($tempData->data_inicio_curso);

						$tempData->celular = $result[$i]->celular1;
						unset($tempData->celular1);

						$tempData->dataNascimento = $result[$i]->data_nascimento;
						unset($tempData->data_nascimento);

						$tempData->estadoCivil = $result[$i]->estado_civil;
						unset($tempData->estado_civil);

						$tempData->tipoUsuario = $result[$i]->tipo_usuario;
						unset($tempData->tipo_usuario);

						$tempData->curso = $cursos;

						$estudante = new Estudante($tempData, $this->conexaoObj);

						$estudante->setIdEstudante($tempData->id_estudante);
						$estudante->setIdUsuario($tempData->id_usuario);

						array_push($estudantesObjectArray, (object)$estudante->getOwnProperties());
						unset($estudante);
						unset($tempData);

						$cursos = [];
					}
				} else {
					//Datatables
					array_push($data, $tempArray[$i]);

					//ArrayObjects
					$tempData = $result[$i];
					$tempData->dataFinalCurso = date("d/m/Y", strtotime($result[$i]->data_final_curso));
					unset($tempData->data_final_curso);

					$tempData->dataInicioCurso = date("d/m/Y", strtotime($result[$i]->data_inicio_curso));
					unset($tempData->data_inicio_curso);

					$tempData->celular = $result[$i]->celular1;
					unset($tempData->celular1);

					$tempData->dataNascimento = date("d/m/Y", strtotime($result[$i]->data_nascimento));
					unset($tempData->data_nascimento);

					$tempData->estadoCivil = $result[$i]->estado_civil;
					unset($tempData->estado_civil);

					$tempData->tipoUsuario = $result[$i]->tipo_usuario;
					unset($tempData->tipo_usuario);

					$tempData->curso = $cursos;

					$estudante = new Estudante($tempData, $this->conexaoObj);

					$estudante->setIdEstudante($tempData->id_estudante);
					$estudante->setIdUsuario($tempData->id_usuario);

					array_push($estudantesObjectArray, (object)$estudante->getOwnProperties());
					unset($estudante);
					unset($tempData);

					$cursos = [];
				}
			}
		}
		if ($type === "1") {
			$retorno['data'] = $data;
			echo json_encode($retorno);
		} else {
			echo json_encode(["sucesso" => 1, "estudantes" => $estudantesObjectArray]);
		}
	}

	public function excluirCadastro($idUser)
	{
		$query = "DELETE FROM tb_usuario WHERE tb_usuario.id_usuario = " . $idUser;
		$query = $this->conexao->query($query);
		if ($query) {
			echo json_encode(["sucesso" => 1, "mensagem" => "Usuário excluído com sucesso!"]);
			exit();
		}

		echo json_encode(["sucesso" => 0, "mensagem" => "Falha ao excluir usuário!"]);
		exit();
	}
}
