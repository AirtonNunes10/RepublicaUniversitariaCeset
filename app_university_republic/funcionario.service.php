<?php 
header('Content-Type: text/html; charset=utf-8');
	class FuncionarioService {

		private $conexao;
		private $conexaoObj;
		
		public function __construct(Conexao $conexao) 
		{
			$this->conexao = $conexao->conectar();
			$this->conexaoObj = $conexao;
		}

		public function consultarFuncionario($idFuncionario)
		{
			$query = "SELECT tb_usuario.*, tb_funcionario.* "
				. "FROM tb_usuario INNER JOIN tb_funcionario ON "
				. "tb_usuario.id_usuario = tb_funcionario.fk_funcionario_usuario "
				. "WHERE tb_usuario.id_usuario = ".$idFuncionario;
			$query = $this->conexao->query($query);
			$result = $query->fetchAll(PDO::FETCH_OBJ);

			if($result){
				
				$funcionarioBD =  $result;
				$tempData = new stdClass();
				$tempData = $funcionarioBD[0];

				$tempData->celular = $funcionarioBD[0]->celular1;
				unset($tempData->celular1);

				$tempData->dataNascimento = $funcionarioBD[0]->data_nascimento;
				unset($tempData->data_nascimento);

				$tempData->estadoCivil = $funcionarioBD[0]->estado_civil;
				unset($tempData->estado_civil);
				
				$tempData->tipoUsuario = $funcionarioBD[0]->tipo_usuario;
				unset($tempData->tipo_usuario);
				unset($funcionarioBD);
				$funcionario = new Funcionario($tempData, $this->conexaoObj);

				$funcionario->setIdFuncionario($tempData->id_funcionario);
				$funcionario->setIdUsuario($tempData->id_usuario);
				unset($tempData);

				echo json_encode(["sucesso" => 1, "funcionario" => (object) $funcionario->getOwnProperties()]);

			}
		}

		public function consultarCadastroFuncionario()
		{
			$query = "SELECT tb_usuario.*, tb_funcionario.* FROM tb_usuario INNER JOIN tb_funcionario ON tb_usuario.id_usuario = tb_funcionario.fk_funcionario_usuario";
			$query = $this->conexao->query($query);
			$result = $query->fetchAll(PDO::FETCH_OBJ);
			$tempArray = [];
			$data = array();
			if ($result) {

				for ($i = 0; $i < count($result); $i++) {
					$tempArray[$i][] = $result[$i]->cpf;
					$tempArray[$i][] = $result[$i]->nome;
					$tempArray[$i][] = $result[$i]->email;
					$tempArray[$i][] = $result[$i]->departamento;
					$tempArray[$i][] = $result[$i]->profissao;
					$tempArray[$i][] = $result[$i]->data_cadastro;
					$tempArray[$i][] = '<div style="text-align:center">'
						. '<a href="#" class="input-group" data-toggle="modal" data-target="#modalEditarUsuario" onclick="carregarUsuario(\'' . $result[$i]->id_usuario . '\', \''. $result[$i]->tipo_usuario .'\')"><i class="fa fa-edit"></i></a>&nbsp'
						. '<a href="#" class="input-group" onclick="excluirCadastro(\'' . $result[$i]->id_usuario . '\')"><i class="fa fa-trash"></i></a></div>';
					array_push($data, $tempArray[$i]);
				}
			}
			$retorno['data'] = $data;
			echo json_encode($retorno);
		}

		public function editarCadastro(){
		
		}

	}

?>