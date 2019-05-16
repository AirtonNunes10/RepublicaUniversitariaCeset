<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Estudante
 *
 * @author myggor
 */

require_once __DIR__.'/Pessoa.php';

class Estudante extends Pessoa {
    
    private $instituicao;
    private $matricula;
    private $curso;
    private $dataInicioCurso;
    private $dataFinalCurso;
    private $periodo;
    private $escolaridade;
    private $conexao;
    
    function __construct($dados, $conexao) {
        parent::__construct($dados);
        $this->conexao = $conexao;
        $this->setCurso($dados->curso);
        $this->setDataFinalCurso($dados->dataFinalCurso);
        $this->setDataInicioCurso($dados->dataInicioCurso);
        $this->setEscolaridade($dados->escolaridade);
        $this->setMatricula($dados->matricula);
        $this->setPeriodo($dados->periodo);
    }
    
    function getInstituicao() {
        return $this->instituicao;
    }

    function getMatricula() {
        return $this->matricula;
    }

    function getCurso() {
        return $this->curso;
    }

    function getDataInicioCurso() {
        return $this->dataInicioCurso;
    }

    function getDataFinalCurso() {
        return $this->dataFinalCurso;
    }

    function getPeriodo() {
        return $this->periodo;
    }

    function getEscolaridade() {
        return $this->escolaridade;
    }

    function setInstituicao($instituicao) {
        $this->instituicao = $instituicao;
    }

    function setMatricula($matricula) {
        $this->matricula = $matricula;
    }

    function setCurso($curso) {
        $this->curso = $curso;
    }

    function setDataInicioCurso($dataInicioCurso) {
        $this->dataInicioCurso = $dataInicioCurso;
    }

    function setDataFinalCurso($dataFinalCurso) {
        $this->dataFinalCurso = $dataFinalCurso;
    }

    function setPeriodo($periodo) {
        $this->periodo = $periodo;
    }

    function setEscolaridade($escolaridade) {
        $this->escolaridade = $escolaridade;
    }

    
    public function excluirCadastro() {
        var_dump($this->getCelular());
        var_dump($this->getCelularClean());
        exit();
    }

    public function salvarCadastro() {
        $query = 'insert into tb_estudante(cpf, nome, rg, data_nascimento, sexo, estado_civil, tipo_usuario, email, senha, instituicao, matricula, curso, data_inicio_curso, data_final_curso, periodo, escolaridade)
				values(:cpf, :nome, :rg, :dataNascimento, :sexo, :estadoCivil, :tipoUsuario, :email, :senha, :instituicao, :matricula, :curso, :dataInicioCurso, :dataFinalCurso, :periodo, :escolaridade)';

        $stmt = $this->conexao->prepare($query);

        $stmt->bindValue('cpf', preg_replace('~\D~', '', $this->getCpf()));
        $stmt->bindValue('nome', $this->getNome());
        $stmt->bindValue('rg', preg_replace('~\D~', '', $this->getRg()));
        $stmt->bindValue('dataNascimento', $this->getDataNascimento());
        $stmt->bindValue('sexo', $this->getSexo());
        $stmt->bindValue('estadoCivil', $this->getEstadoCivel());
        $stmt->bindValue('tipoUsuario', $this->getTipoUsuario());
        $stmt->bindValue('email', $this->getEmail());
        $stmt->bindValue('senha', $this->getSenha());
        $stmt->bindValue('instituicao', $this->getInstituicao());
        $stmt->bindValue('matricula', $this->getMatricula());
        $stmt->bindValue('curso', $this->getCurso());
        $stmt->bindValue('dataInicioCurso', $this->getDataInicioCurso());
        $stmt->bindValue('dataFinalCurso', $this->getDataFinalCurso());
        $stmt->bindValue('periodo', $this->getPeriodo());
        $stmt->bindValue('escolaridade', $this->getEscolaridade());
        
        $stmt->execute();

        $id_estudante = 'select id_estudante from tb_estudante where cpf = "'. $this->estudante->__get('cpf') . '"';

        $resultado = $this->conexao->query($id_estudante);
        $idEstudante = $resultado->fetch(PDO::FETCH_OBJ);
        /*
        echo '<pre>';
            print_r($idEstudante);
        echo '</pre>';

        echo $idEstudante->id_estudante;
        */
        $query = 'insert into tb_endereco(cep, endereco, numero, bairro, cidade, uf, complemento, id_estudante)
            values(:cep, :endereco, :numero, :bairro, :cidade, :uf, :complemento, '. $idEstudante->id_estudante.')';

        $query = $this->conexao->prepare($query);

        $query->bindValue('cep', preg_replace('~\D~', '', $this->getCep()));
        $query->bindValue('endereco', $this->getEndereco());
        $query->bindValue('numero', $this->getNumero());
        $query->bindValue('bairro',  $this->getBairro());
        $query->bindValue('cidade', $this->getCidade());
        $query->bindValue('uf', $this->getUf());
        $query->bindValue('complemento', $this->getComplemento());

        $query->execute();

        $query = 'insert into tb_telefone(ddd_celular1, telefone_celular1, ddd_celular2, telefone_celular2, ddd_residencial, telefone_residencial, id_estudante)
            values(:dddCelular1, :telefoneCelular1, :dddCelular2, :telefoneCelular2, :dddResidencial, :telefoneResidencial, '. $idEstudante->id_estudante.')';

        $query = $this->conexao->prepare($query);

        $query->bindValue(':dddCelular1', preg_replace('~\D~', '', $this->estudante->__get('dddCelular1')));
        $query->bindValue(':telefoneCelular1', preg_replace('~\D~', '', $this->estudante->__get('telefoneCelular1')));
        $query->bindValue(':dddCelular2', preg_replace('~\D~', '', $this->estudante->__get('dddCelular2')));
        $query->bindValue(':telefoneCelular2', preg_replace('~\D~', '', $this->estudante->__get('telefoneCelular2')));
        $query->bindValue(':dddResidencial', preg_replace('~\D~', '', $this->estudante->__get('dddResidencial')));
        $query->bindValue(':telefoneResidencial', preg_replace('~\D~', '', $this->estudante->__get('telefoneResidencial')));

        $query->execute(array(
            ':dddCelular1' => $this->estudante->__get('dddCelular1'),
            ':telefoneCelular1' => $this->estudante->__get('telefoneCelular1'),
            ':dddCelular2' => $this->estudante->__get('dddCelular2'),
            ':telefoneCelular2' => $this->estudante->__get('telefoneCelular2'),
            ':dddResidencial' => $this->estudante->__get('dddResidencial'),
            ':telefoneResidencial' => $this->estudante->__get('telefoneResidencial')
        ));
        
    }

    public function validarDados() { //O QUE ESSA FUNÇÃO VALIDA?
        $selfVars = get_object_vars($this);

        foreach ($selfVars as $currentKey => $currentVal) {
            if (!is_null($currentVal)) {
                continue;
            } else {
                $mensagemErro = $currentKey. " com valor ".$currentVal;
                break;
            }
        }
        if(!empty($mensagemErro)){
            throw new Exception($mensagemErro);
        }
        
        return true;
    
    }

}