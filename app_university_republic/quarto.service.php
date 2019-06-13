<?php

header('Content-Type: text/html; charset=utf-8');

class QuartoService
{

    private $conexao;

    public function __construct(Conexao $conexao)
    {
        $this->conexao = $conexao->conectar();
    }

    public function salvarCadastro($idQuarto, $idEst)
    {

        try {

            $checkCapacidade = "SELECT tb_estudante.fk_estudante_quarto FROM tb_estudante WHERE fk_estudante_quarto = " . $idQuarto;
            //echo $checkCapacidade;
            $query = $this->conexao->query($checkCapacidade);
            $resultQtQuartos = $query->fetchAll(PDO::FETCH_OBJ);
            if (count($resultQtQuartos) > 3) {
               return "O limite de estudantes neste quarto foi atingido.";
            }

            $query = 'update tb_estudante set fk_estudante_quarto = :fkestq where id_estudante = :idest';

            $stmt = $this->conexao->prepare($query);
            $stmt->bindValue('fkestq', $idQuarto);
            $stmt->bindValue('idest', $idEst);

            $result = $stmt->execute();
            $rows = $stmt->rowCount();
            if ($rows > 0) {
                return true;
            }

        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }

    
    public function consultarCadastroQuarto()
    {
        $query = "SELECT tb_usuario.*, tb_estudante.*, tb_quarto.* "
			. "FROM tb_usuario INNER JOIN tb_estudante ON "
			. "tb_usuario.id_usuario = tb_estudante.fk_estudante_usuario "
			. "INNER JOIN tb_quarto ON tb_estudante.fk_estudante_quarto = tb_quarto.id_quarto  "
			. "ORDER BY tb_quarto.id_quarto ASC";
        $query = $this->conexao->query($query);
        $result = $query->fetchAll(PDO::FETCH_OBJ);
        $tempArray = [];
        $data = array();
        if ($result) {

            for ($i = 0; $i < count($result); $i++) {
                $tempArray[$i][] = $result[$i]->nome_quarto;
                $tempArray[$i][] = $result[$i]->nome;
                $tempArray[$i][] =  '<div style="text-align:center">'
                    . '<a href="#" class="input-group" data-toggle="modal" data-target="#modalEditarUsuario"><i class="fa fa-edit"></i></a>&nbsp';
                array_push($data, $tempArray[$i]);
            }
        }
        $retorno['data'] = $data;
        echo json_encode($retorno);
    }
    
    public function carregarQuartosObject()
    {
        $query = "SELECT * FROM tb_quarto";
        $query = $this->conexao->query($query);
        $result = $query->fetchAll(PDO::FETCH_OBJ);
        $quartosRetorno = [];

        for ($i = 0; $i < count($result); $i++) {
            $checCapacidade = "SELECT tb_estudante.fk_estudante_quarto FROM tb_estudante WHERE fk_estudante_quarto = " . $result[$i]->id_quarto;
            $query = $this->conexao->query($checCapacidade);
            $resultQtQuartos = $query->fetchAll(PDO::FETCH_OBJ);
            if (count($resultQtQuartos) < 4) {
                array_push($quartosRetorno, $result[$i]);
            }
        }
        return $quartosRetorno;
    }
}
