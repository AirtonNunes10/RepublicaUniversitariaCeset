<?php

	class Curso {
		
		private $sigla;
		private $curso;
		private $conexao;
        
        function __construct($sigla, $curso, Conexao $conexao) {
            $this->sigla = $sigla;
			$this->curso = $curso;
			$this->conexao = $conexao->conectar();
        }

		public function getSigla(){
			return $this->sigla;
        }
        
        public function getCurso(){
			return $this->curso;
		}

		public function setSigla($sigla){
			$this->sigla = $sigla;
        }
        
        public function setCurso($curso){
			$this->curso = $curso;
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
                /*if ($rows > 0) {
    
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
				}*/
				if ($rows > 0) {
					return true;
				}
            } catch (PDOException $e) {
                $codigoErro = $e->getCode();
                if($codigoErro === "23000"){
                    return "Erro ao cadastrar o curso!";
                }
			}
		}

	}

?>