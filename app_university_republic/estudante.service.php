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
		$query = "SELECT tb_usuario.*, tb_estudante.*, tb_estudante_curso.*, tb_curso.*  "
			. "FROM tb_usuario INNER JOIN tb_estudante ON "
			. "tb_usuario.id_usuario = tb_estudante.fk_estudante_usuario "
			. "INNER JOIN tb_estudante_curso ON tb_estudante.id_estudante = tb_estudante_curso.fk_estudante_curso "
			. "INNER JOIN tb_curso ON tb_estudante_curso.fk_curso_estudante = tb_curso.id_curso ORDER BY tb_estudante_curso.id_estudante_curso DESC";
		$query = $this->conexao->query($query);
		$result = $query->fetchAll(PDO::FETCH_OBJ);
		$tempArray = [];
		$lastId = "";
		$data = array();
		if ($result) {
			$current = 0;
			for ($i = 0; $i < count($result); $i++) {
				if ($lastId === $result[$i]->id_usuario) {
					@$tempArray[$i - 1][4] = $tempArray[$i - 1][4] . ", " . $result[$i]->nome_curso;
					if (array_key_exists($i + 1, $result)) {
						if ($lastId !== $result[$i + 1]->id_usuario) {
							array_push($data, $tempArray[$current]);
						}
					}
					continue;
				}
				$tempArray[$i][] = $result[$i]->cpf;
				$tempArray[$i][] = $result[$i]->nome;
				$tempArray[$i][] = $result[$i]->email;
				$tempArray[$i][] = $result[$i]->instituicao;
				$tempArray[$i][] = $result[$i]->nome_curso;
				$tempArray[$i][] = $result[$i]->periodo;
				$tempArray[$i][] = $result[$i]->data_inicio_curso;
				$tempArray[$i][] = $result[$i]->data_final_curso;
				$tempArray[$i][] =  '<div style="text-align:center">'
					. '<a href="#" class="input-group" onclick="excluirCadastro(\'' . $result[$i]->id_usuario . '\')"><i class="fa fa-trash"></i></a></div>';
				$lastId = $result[$i]->id_usuario;
				$current = $i;
				if (array_key_exists($i + 1, $result)) {
					if ($lastId !== $result[$i + 1]->id_usuario) {
						array_push($data, $tempArray[$i]);
					}
				} else {
					array_push($data, $tempArray[$i]);
				}
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
