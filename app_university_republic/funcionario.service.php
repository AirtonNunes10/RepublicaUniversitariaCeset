<?php 
header('Content-Type: text/html; charset=utf-8');
	class FuncionarioService {

		private $conexao;
		
		public function __construct(Conexao $conexao) 
		{
			$this->conexao = $conexao->conectar();
		}

		public function consultarCadastroFuncionario()
		{
			$query = "SELECT tb_usuario.*, tb_funcionario.* FROM tb_usuario INNER JOIN tb_funcionario ON tb_usuario.id_usuario = tb_funcionario.id_usuario";
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
									  .'<a href="#" class="input-group" onclick="excluirCadastro(\'' . $result[$i]->id_usuario . '\')"><i class="fa fa-trash"></i></a></div>';
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