<?php
header('Content-Type: text/html; charset=utf-8');
class EstudanteService
{

	private $conexao;

	public function __construct(Conexao $conexao)
	{
		$this->conexao = $conexao->conectar();
	}

	public function consultarCadastroEstudante()
	{
		$query = "SELECT tb_usuario.*, tb_estudante.* FROM tb_usuario INNER JOIN tb_estudante ON tb_usuario.id_usuario = tb_estudante.id_usuario";
		$query = $this->conexao->query($query);
		$result = $query->fetchAll(PDO::FETCH_OBJ);
		$tempArray = [];
		$data = array();
		if ($result) {

			for ($i = 0; $i < count($result); $i++) {
				$tempArray[$i][] = $result[$i]->cpf;
				$tempArray[$i][] = $result[$i]->nome;
				$tempArray[$i][] = $result[$i]->email;
				$tempArray[$i][] = $result[$i]->instituicao;
				$tempArray[$i][] = $result[$i]->curso;
				$tempArray[$i][] = $result[$i]->periodo;
				$tempArray[$i][] = $result[$i]->data_inicio_curso;
				$tempArray[$i][] = $result[$i]->data_final_curso;
				$tempArray[$i][] =  '<div style="text-align:center">'
					. '<a href="#" class="input-group" onclick="excluirCadastro(\'' . $result[$i]->id_usuario . '\')"><i class="fa fa-trash"></i></a></div>';
				array_push($data, $tempArray[$i]);
			}
		}
		$retorno['data'] = $data;
		echo json_encode($retorno);
	}

	public function editarCadastro()
	{ }

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
