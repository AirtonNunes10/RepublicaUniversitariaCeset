<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Funcionario
 *
 * @author myggor
 */
class Funcionario extends Pessoa {

    private $departamento;
    private $profissao;
    private $dataCadastro;
    private $conexao;

    public function __construct($dados, $conexao) {
        parent::__construct($dados);
        $this->conexao = $conexao;
    }
    
    function getDepartamento() {
        return $this->departamento;
    }

    function getProfissao() {
        return $this->profissao;
    }

    function getDataCadastro() {
        return $this->dataCadastro;
    }

    function setDepartamento($departamento) {
        $this->departamento = $departamento;
    }

    function setProfissao($profissao) {
        $this->profissao = $profissao;
    }

    function setDataCadastro($dataCadastro) {
        $this->dataCadastro = $dataCadastro;
    }
    
    public function excluirCadastro() {
        
    }
    
    public function salvarCadastro() {
        
    }

    public function validarDados() {
        
    }

}
