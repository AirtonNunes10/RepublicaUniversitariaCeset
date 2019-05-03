<?php 
	header('Content-Type: text/html; charset=utf-8');
	class CursoService {

		private $conexao;
		private $curso;
		
		public function __construct(Conexao $conexao, Curso $curso) {
			$this->conexao = $conexao->conectar();
			$this->curso = $curso;
		}

		public function salvarCadastro(){
			$query = 'insert into tb_curso(sigla, nome_curso)
				values(:sigla, :curso)';

			$stmt = $this->conexao->prepare($query);

			$stmt->bindValue(':sigla', $this->curso->__get('sigla'));
			$stmt->bindValue(':curso', $this->curso->__get('curso'));
			
			$stmt->execute(array(
				':sigla' => $this->curso->__get('sigla'),
				':curso' => $this->curso->__get('curso')
				
			));
            /*
			$id_curso = 'select id_curso from tb_curso where nome_curso = "'. $this->estudante->__get('curso') . '"';

			$resultado = $this->conexao->query($id_curso);
            $idCurso = $resultado->fetch(PDO::FETCH_OBJ);
            
            $id_estudante = 'select id_estudante from tb_estudante where cpf = "'. $this->estudante->__get('cpf') . '"';

			$resultado = $this->conexao->query($id_estudante);
            $idEstudante = $resultado->fetch(PDO::FETCH_OBJ);
            
			/*
			echo '<pre>';
				print_r($idCurso);
			echo '</pre>';

			echo $idCurso->id_curso;
			
			$query = 'insert into tb_estudante_curso(id_estudante, id_curso)
				values('. $idEstudante->id_estudante.','.$idCurso->id_curso')';

			$query = $this->conexao->prepare($query);

			$query->bindValue(':idEstudante', $idEstudante->id_estudante);
            $query->bindValue(':idCurso', $idCurso->id_curso);

			$query->execute();*/

		}

		public function consultarCadastro(){
			$query = "SELECT * FROM tb_curso";
			$query = $this->conexao->query($query);
			$result = $query->fetchAll(PDO::FETCH_OBJ);
			if($result){
				$tempArray = [];
				$data = array();
				for($i = 0; $i<count($result); $i++){
					$tempArray[$i][] = $result[$i]->id_curso;
					$tempArray[$i][] = $result[$i]->sigla;
					$tempArray[$i][] = $result[$i]->nome_curso;
					array_push($data, $tempArray[$i]);
				}
				$retorno['data'] = $data;
				echo json_encode($retorno);
				return;
			}
		}

		public function editarCadastro(){
		
		}

		public function excluirCadastro(){
			
		}
	}

?>