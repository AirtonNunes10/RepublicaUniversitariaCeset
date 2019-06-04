<?php

    class FinancasService {

        private $conexao;

        public function __construct(Conexao $conexao)
        {
            $this->conexao = $conexao->conectar();
        }

        public function salvarPagamento($pagamento){
            
            try {

                $id_usuario = 'select id_usuario from tb_usuario where cpf = "' .  preg_replace('~\D~', '', $pagamento->getCpf()) . '"';
                $get = $this->conexao->query($id_usuario);
                $resultado = $get->fetch(PDO::FETCH_OBJ);
                $idUsuario = $resultado->id_usuario;

                $query = 'insert into tb_pagamento (cpf, nome, tipo_pagamento, valor_pagamento, fk_pagamento_usuario)
                    values(:cpf, :nome, :tipoPagamento, :valorPagamento, :fkPagamentoUsuario)';
        
                $stmt = $this->conexao->prepare($query);

                $valorPagamento =  str_replace(",", ".", $pagamento->getValorPagamento());
        
                $stmt->bindValue('cpf', preg_replace('~\D~', '', $pagamento->getCpf()));
                $stmt->bindValue('nome', $pagamento->getNome());
                $stmt->bindValue('tipoPagamento', $pagamento->getTipoPagamento());
                $stmt->bindValue('valorPagamento', $valorPagamento);
                $stmt->bindValue('fkPagamentoUsuario', $idUsuario);
        
                $result = $stmt->execute();
                $rows = $stmt->rowCount();

                if ($rows > 0) {
                    return true;
                }
            } catch (PDOException $e) {
                return $e->getMessage();
            }
        }

        public function salvarDespesa($despesa){
            
            try {
                $query = 'insert into tb_despesa (codigo_compra, descricao, quantidade, local_compra, data_compra, valor_compra)
                    values(:codigoCompra, :descricao, :quantidade, :localCompra, :dataCompra, :valorCompra)';
    
                $stmt = $this->conexao->prepare($query);

                $valorCompra =  str_replace(",", ".", $despesa->getValorCompra());
    
                $stmt->bindValue('codigoCompra', $despesa->getCodigoCompra());
                $stmt->bindValue('descricao', $despesa->getDescricao());
                $stmt->bindValue('quantidade', $despesa->getQuantidade());
                $stmt->bindValue('localCompra', $despesa->getLocalCompra());
                $stmt->bindValue('dataCompra', $despesa->getDataCompra());
                $stmt->bindValue('valorCompra', $valorCompra);
    
                $result = $stmt->execute();
                $rows = $stmt->rowCount();

				if ($rows > 0) {
					return true;
				}
            } catch (PDOException $e) {
                return $e->getMessage();
			}
		}

        public function consultarPagamento()
        {
            $query = "select * from tb_pagamento";
            $query = $this->conexao->query($query);
            $result = $query->fetchAll(PDO::FETCH_OBJ);
            $tempArray = [];
            if ($result) {
                for ($i = 0; $i < count($result); $i++) {
                    $tempArray[$i][] = $result[$i]->id_pagamento;
                    $tempArray[$i][] = $result[$i]->cpf;
                    $tempArray[$i][] = $result[$i]->nome;
                    $tempArray[$i][] = $result[$i]->tipo_pagamento;
                    $tempArray[$i][] = $result[$i]->data_pagamento;
                    $tempArray[$i][] = $result[$i]->valor_pagamento;
                }
            }
            $retorno['data'] = $tempArray;
            echo json_encode($retorno);
        }

        public function consultarDespesa()
        {
            $query = "select * from tb_despesa";
            $query = $this->conexao->query($query);
            $result = $query->fetchAll(PDO::FETCH_OBJ);
            $tempArray = [];
            if ($result) {
                for ($i = 0; $i < count($result); $i++) {
                    $tempArray[$i][] = $result[$i]->codigo_compra;
                    $tempArray[$i][] = $result[$i]->descricao;
                    $tempArray[$i][] = $result[$i]->quantidade;
                    $tempArray[$i][] = $result[$i]->local_compra;
                    $tempArray[$i][] = $result[$i]->data_compra;
                    $tempArray[$i][] = $result[$i]->valor_compra;
                }
            }
            $retorno['data'] = $tempArray;
            echo json_encode($retorno);
        }

        public function consultarSaldo()
        {
            $query = "select * from tb_saldo";
            $query = $this->conexao->query($query);
            $result = $query->fetchAll(PDO::FETCH_OBJ);
            $tempArray = [];
            if ($result) {
                for ($i = 0; $i < count($result); $i++) {
                    $tempArray[$i][] = $result[$i]->total_pagamento;
                    $tempArray[$i][] = $result[$i]->total_despesa;
                    $tempArray[$i][] = $result[$i]->total_saldo;
                }
            }
            $retorno['data'] = $tempArray;
            echo json_encode($retorno);
        }

    }

?>