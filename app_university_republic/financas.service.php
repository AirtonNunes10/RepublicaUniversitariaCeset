<?php

include_once __DIR__."/mascarar.php";
include_once __DIR__."/tipoPagamento.php";

class FinancasService
{

    private $conexao;

    public function __construct(Conexao $conexao)
    {
        $this->conexao = $conexao->conectar();
    }

    public function salvarPagamento($pagamento)
    {

        try {

            $id_usuario = 'select id_usuario from tb_usuario where cpf = "' .  preg_replace('~\D~', '', $pagamento->getCpf()) . '"';
            $get = $this->conexao->query($id_usuario);
            $resultado = $get->fetch(PDO::FETCH_OBJ);
            if (isset($resultado->id_usuario)) {
                $idUsuario = $resultado->id_usuario;
            } else {
                $idTesoureiro = "SELECT id_usuario FROM tb_usuario WHERE tipo_usuario = 4";
                $runQuery = $this->conexao->query($idTesoureiro);
                $resultado = $runQuery->fetch(PDO::FETCH_OBJ);
                if (isset($resultado->id_usuario)) {
                    $idUsuario = $resultado->id_usuario;
                } else {
                    $idUsuario = NULL;
                }
            }
            $query = 'insert into tb_pagamento (cpf, tipo_pagamento, valor_pagamento, fk_pagamento_usuario)
                    values(:cpf, :tipoPagamento, :valorPagamento, :fkPagamentoUsuario)';

            $stmt = $this->conexao->prepare($query);

            $valorPagamento =  str_replace(",", ".", $pagamento->getValorPagamento());

            $stmt->bindValue('cpf', preg_replace('~\D~', '', $pagamento->getCpf()));
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

    public function salvarDespesa($despesa)
    {

        $valorCompra =  str_replace(",", ".", $despesa->getValorCompra());

        $valorQtdDespesa = $despesa->getQuantidade();
        $valorDespesa = $valorCompra;
        $valorTotalCompra = $valorDespesa * $valorQtdDespesa;

        try {
            $query = 'insert into tb_despesa (codigo_compra, descricao, quantidade, local_compra, data_compra, valor_compra, valor_total_compra)
                    values(:codigoCompra, :descricao, :quantidade, :localCompra, :dataCompra, :valorCompra, :valorTotalCompra)';

            $stmt = $this->conexao->prepare($query);

            $stmt->bindValue('codigoCompra', $despesa->getCodigoCompra());
            $stmt->bindValue('descricao', $despesa->getDescricao());
            $stmt->bindValue('quantidade', $despesa->getQuantidade());
            $stmt->bindValue('localCompra', $despesa->getLocalCompra());
            $stmt->bindValue('dataCompra', $despesa->getDataCompra());
            $stmt->bindValue('valorCompra', $valorCompra);
            $stmt->bindValue('valorTotalCompra', $valorTotalCompra);

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
        $query = "SELECT tb_usuario.*, tb_pagamento.* FROM tb_usuario INNER JOIN tb_pagamento ON tb_usuario.id_usuario = tb_pagamento.fk_pagamento_usuario";
        $query = $this->conexao->query($query);
        $result = $query->fetchAll(PDO::FETCH_OBJ);
        $tempArray = [];
        if ($result) {
            for ($i = 0; $i < count($result); $i++) {
                $tempArray[$i][] = $result[$i]->id_pagamento;
                $tempArray[$i][] = mascarar($result[$i]->cpf, "###.###.###-##");
                $tempArray[$i][] = $result[$i]->nome;
                $tempArray[$i][] = tipoPagamento($result[$i]->tipo_pagamento);
                $tempArray[$i][] = date("d/m/Y H:i:s", strtotime($result[$i]->data_pagamento));
                $tempArray[$i][] = "R$ ".$result[$i]->valor_pagamento;
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
                $tempArray[$i][] = $result[$i]->local_compra;
                $tempArray[$i][] = date("d/m/Y", strtotime($result[$i]->data_compra));
                $tempArray[$i][] = $result[$i]->quantidade;
                $tempArray[$i][] = "R$ ".$result[$i]->valor_compra;
                $tempArray[$i][] = "R$ ".$result[$i]->valor_total_compra;
            }
        }
        $retorno['data'] = $tempArray;
        echo json_encode($retorno);
    }

    public function consultarSaldo($periodo)
    {
        try {
            $dataInicial = $periodo->dataInicial;
            $dataFinal = $periodo->dataFinal;

            $somaPagamento = "SELECT sum(valor_pagamento) AS total FROM tb_pagamento WHERE data_pagamento >= :dataInicial "
                .  "AND data_pagamento <= :dataFinal";
            $valorPagamentoStmt = $this->conexao->prepare($somaPagamento);

            $valorPagamentoStmt->bindParam("dataInicial", $dataInicial, PDO::PARAM_STR);
            $valorPagamentoStmt->bindParam("dataFinal", $dataFinal, PDO::PARAM_STR);

            $valorPagamentoStmt->execute();

            $valorTotalRecebidoResult = $valorPagamentoStmt->fetch(PDO::FETCH_OBJ);

            $somaDespesa = "SELECT sum(valor_total_compra) AS total FROM tb_despesa WHERE data_compra >= :dataInicial "
                . " AND data_compra <= :dataFinal";
            $valorDespesaStmt = $this->conexao->prepare($somaDespesa);

            $valorDespesaStmt->bindParam("dataInicial", $dataInicial, PDO::PARAM_STR);
            $valorDespesaStmt->bindParam("dataFinal", $dataFinal, PDO::PARAM_STR);

            $valorDespesaStmt->execute();

            $valorTotalDespesaResult = $valorDespesaStmt->fetch(PDO::FETCH_OBJ);

            $valorTotalRecebido = $valorTotalRecebidoResult->total;
            $valorTotalDespesa = $valorTotalDespesaResult->total;

        } catch (PDOException $e) {
            return $e->getMessage();
        }
        $financaInfo = new stdClass();
        
        $financaInfo->valorTotalRecebido = "R$ ".number_format((float)$valorTotalRecebido, 2);
        $financaInfo->valorTotalDespesa = "R$ ".number_format((float) $valorTotalDespesa, 2);
        $financaInfo->valorTotalSaldo = "R$ ".round(((float)$valorTotalRecebido - (float)$valorTotalDespesa), 2);
        
        echo json_encode(["sucesso"=>1, "financaInfo" => $financaInfo]);

    }
}
