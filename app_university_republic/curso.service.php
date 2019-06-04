<?php
header('Content-Type: text/html; charset=utf-8');

class CursoService
{

    private $conexao;

    public function __construct(Conexao $conexao)
    {
        $this->conexao = $conexao->conectar();
    }

    public function salvarCadastro($curso)
    {

        try {
            $query = 'insert into tb_curso (sigla, nome_curso)
                    values(:sigla, :curso)';

            $stmt = $this->conexao->prepare($query);

            $stmt->bindValue('sigla', $curso->getSigla());
            $stmt->bindValue('curso', $curso->getCurso());

            $result = $stmt->execute();
            $rows = $stmt->rowCount();
            if ($rows > 0) {
                return true;
            }
        } catch (PDOException $e) {
            return $e->getMessage();
        }
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

    public function carregarCursosObject()
    {
        //melhor dar um nome decente pra essas funçoes dps
        $query = "SELECT * FROM tb_curso";
        $query = $this->conexao->query($query);
        $result = $query->fetchAll(PDO::FETCH_OBJ);

        if ($result) {
            return $result;
        }
    }
}
