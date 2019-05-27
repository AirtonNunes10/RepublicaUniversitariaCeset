<?php

    class Pagamento {

        private $cpf;
        private $nome;
        private $tipoPagamento;
        private $valorPagamento;
        private $conexao;

        function __construct($cpf, $nome, $tipoPagamento, $valorPagamento, Conexao $conexao){
            $this->cpf = $cpf;
            $this->nome = $nome;
            $this->tipoPagamento = $tipoPagamento;
            $this->valorPagamento = $valorPagamento;
            $this->conexao = $conexao->conectar();
        }

        public function getCpf(){
            return $this->cpf;
        }

        public function getNome(){
            return $this->nome;
        }

        public function getTipoPagamento(){
            return $this->tipoPagamento;
        }

        public function getValorPagamento(){
            return $this->valorPagamento;
        }

        public function setCpf($cpf){
            $this->cpf = $cpf;
        }

        public function setNome($nome){
            $this->nome = $nome;
        }

        public function setTipoPagamento($tipoPagamento){
            $this->tipoPagamento = $tipoPagamento;
        }

        public function setValorPagamento($valorPagamento){
            $this->valorPagamento = $valorPagamento;
        }

        public function salvarPagamento(){
            
            try {
                $query = 'insert into tb_pagamento (cpf, nome, tipo_pagamento, valor_pagamento)
                    values(:cpf, :nome, : tipoPagamento, :valorPagamento)';
    
                $stmt = $this->conexao->prepare($query);
    
                $stmt->bindValue('cpf', $this->getCpf());
                $stmt->bindValue('nome', $this->getNome());
                $stmt->bindValue('tipoPagamento', $this->getTipoPagamento());
                $stmt->bindValue('valorPagamento', $this->getValorPagamento());
    
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
                    return "Erro ao efetuar o pagamento!";
                }
			}
		}

    }

?>