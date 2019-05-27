<?php 
    header('Content-Type: text/html; charset=utf-8');

	class CursoService {

		private $conexao;
	
		public function __construct(Conexao $conexao)
        {
            $this->conexao = $conexao->conectar();
        }

		public function salvarCadastro(){
            
            try {
                $query = 'insert into tb_curso (sigla, nome_curso)
                    values(:sigla, :curso)';
    
                $stmt = $this->conexao->prepare($query);
    
                $stmt->bindValue('sigla', $this->getSigla());
                $stmt->bindValue('curso', $this->getCurso());
    
                $result = $stmt->execute();
                $rows = $stmt->rowCount();
                if ($rows > 0) {
    
                    try {
    
                        $id_curso = 'select id_curso from tb_curso where nome_curso = "' .  $this->getCurso() . '"';
                        $get = $this->conexao->query($id_curso);
                        $resultado = $get->fetch(PDO::FETCH_OBJ);
                        //var_dump($stmt->errorInfo());
                        $idCurso = $resultado->id_curso;
    
                        $query = 'insert into tb_estudante_curso(id_curso)
                        values(:idCurso)';
    
                        $query = $this->conexao->prepare($query);

                        $query->bindParam('idCurso', $idCurso, PDO::PARAM_INT);
    
                        $result = $query->execute();
                        $rows = $query->rowCount();
                        if ($rows > 0) {
                            return true;
                        }
                    } catch (PDOException $e) {
                        return $e->getMessage();
                    }
                }
            } catch (PDOException $e) {
                $codigoErro = $e->getCode();
                if($codigoErro === "23000"){
                    return "Erro ao inserir o curso!";
                }
            }
            
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
                
        public function consultarCadastroCurso()
        {
            $query = "SELECT * FROM tb_curso";
			$query = $this->conexao->query($query);
			$result = $query->fetchAll(PDO::FETCH_OBJ);
            $tempArray = [];
            $data = array();
            if ($result) {

                for ($i = 0; $i < count($result); $i++) {
                    $tempArray[$i][] = $result[$i]->id_curso;
                    $tempArray[$i][] = $result[$i]->sigla;
                    $tempArray[$i][] = $result[$i]->nome_curso;
                    $tempArray[$i][] =  '<div style="text-align:center">'
                        . '<a href="#" class="input-group" onclick="editarCadastro(\'' . $result[$i]->id_curso . '\')"><i class="fa fa-trash"></i></a></div>';
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