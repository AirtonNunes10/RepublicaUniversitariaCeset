<?php

    class Despesa {

        private $codigoCompra;
        private $descricao;
        private $quantidade;
        private $localCompra;
        private $dataCompra;
        private $valorCompra;
        private $conexao;

        function __construct($codigoCompra, $descricao, $quantidade, $localCompra, $dataCompra, $valorCompra, Conexao $conexao){
            $this->codigoCompra = $codigoCompra;
            $this->descricao = $descricao;
            $this->quantidade = $quantidade;
            $this->localCompra = $localCompra;
            $this->dataCompra = $dataCompra;
            $this->valorCompra = $valorCompra;
            $this->conexao = $conexao->conectar();
        }

        public function getCodigoCompra(){
            return $this->codigoCompra;
        }

        public function getDescricao(){
            return $this->descricao;
        }

        public function getQuantidade(){
            return $this->quantidade;
        }

        public function getLocalCompra(){
            return $this->localCompra;
        }

        public function getDataCompra(){
            return $this->dataCompra;
        }

        public function getValorCompra(){
            return $this->valorCompra;
        }

        public function setCodigoCompra($codigoCompra){
            $this->codigoCompra = $codigoCompra;
        }

        public function setDescricao($descricao){
            $this->descricao = $descricao;
        }

        public function setQuantidade($quantidade){
            $this->quantidade = $quantidade;
        }

        public function setLocalCompra($localCompra){
            $this->localCompra = $localCompra;
        }

        public function setDataCompra($dataCompra){
            $this->dataCompra = $dataCompra;
        }

        public function setValorCompra($valorCompra){
            $this->valorCompra = $valorCompra;
        }

        public function salvarDespesa(){
            
            try {
                $query = 'insert into tb_despesa (codigo_compra, descricao, quantidade, local_compra, data_compra, valor_compra)
                    values(:codigoCompra, :descricao, : quantidade, :localCompra, :dataCompra, valorCompra)';
    
                $stmt = $this->conexao->prepare($query);
    
                $stmt->bindValue('codigoCompra', $this->getCodigoCompra());
                $stmt->bindValue('descricao', $this->getDescricao());
                $stmt->bindValue('quantidade', $this->getQuantidade());
                $stmt->bindValue('localCompra', $this->getLocalCompra());
                $stmt->bindValue('dataCompra', $this->getDataCompra());
                $stmt->bindValue('valorCompra', $this->getValorCompra());
    
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