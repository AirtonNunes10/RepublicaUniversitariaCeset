<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 *
 * @author myggor
 */
abstract class Pessoa {

    private $cpf;
    private $nome;
    private $rg;
    private $dataNascimento;
    private $sexo;
    private $estadoCivil;
    private $tipoUsuario;
    private $email;
    private $senha;
    private $cep;
    private $numero;
    private $bairro;
    private $cidade;
    private $uf;
    private $complemento;
    private $celular;

    function __construct($dados) {
        $this->setBairro($dados->bairro);
        $this->setCep($dados->cep);
        $this->setCidade($dados->cidade);
        $this->setComplemento($dados->complemento);
        $this->setNumero($dados->numero);
        $this->setUf($dados->uf);
                
        $this->setEmail($dados->email);
        $this->setNome($dados->nome);
        $this->setDataNascimento($dados->dataNascimento);
        $this->setCpf($dados->cpf);
        $this->setRg($dados->rg);
        $this->setCelular($dados->celular);
        $this->setTelefoneResidencial($dados->telefoneResidencial);
    }

    public function getCpf() {
        return $this->cpf;
    }

    public function getNome() {
        return $this->nome;
    }

    public function getRg() {
        return $this->rg;
    }

    public function getDataNascimento() {
        return $this->dataNascimento;
    }

    public function getSexo() {
        return $this->sexo;
    }

    public function getEstadoCivil() {
        return $this->estadoCivil;
    }

    public function getTipoUsuario() {
        return $this->tipoUsuario;
    }

    public function getEmail() {
        return $this->email;
    }

    public function getSenha() {
        return $this->senha;
    }

    public function getCep() {
        return $this->cep;
    }

    public function getNumero() {
        return $this->numero;
    }

    public function getBairro() {
        return $this->bairro;
    }

    public function getCidade() {
        return $this->cidade;
    }

    public function getUf() {
        return $this->uf;
    }

    public function getComplemento() {
        return $this->complemento;
    }

    public function getCelular() {
        return $this->celular;
    }

    public function getCelularClean() {
        $return = [];
        $thisCelular = $this->getCelular();
        if(is_array($thisCelular)){
            foreach($thisCelular as $numeroCel){
                $return[] = preg_replace('~\D~', '', $numeroCel);
            }
            //$return = $thisCelular;
        }
        return $return;
    }

    public function setCpf($cpf) {
        $this->cpf = $cpf;
    }

    public function setNome($nome) {
        $this->nome = $nome;
    }

    public function setRg($rg) {
        $this->rg = $rg;
    }

    public function setDataNascimento($dataNascimento) {
        $this->dataNascimento = $dataNascimento;
    }

    public function setSexo($sexo) {
        $this->sexo = $sexo;
    }

    public function setEstadoCivil($estadoCivil) {
        $this->estadoCivil = $estadoCivil;
    }

    public function setTipoUsuario($tipoUsuario) {
        $this->tipoUsuario = $tipoUsuario;
    }

    public function setEmail($email) {
        $this->email = $email;
    }

    public function setSenha($senha) {
        $this->senha = $senha;
    }

    public function setCep($cep) {
        $this->cep = $cep;
    }

    public function setNumero($numero) {
        $this->numero = $numero;
    }

    public function setBairro($bairro) {
        $this->bairro = $bairro;
    }

    public function setCidade($cidade) {
        $this->cidade = $cidade;
    }

    public function setUf($uf) {
        $this->uf = $uf;
    }

    public function setComplemento($complemento) {
        $this->complemento = $complemento;
    }

    public function setCelular($celular) {
        $this->celular = $celular;
    }
    
    function cpfValido(){
        $cpf = preg_replace('/[^0-9]/is', '', $cpf);

        if (strlen($cpf) != 11) {
            return false;
        }
        
        if (preg_match('/(\d)\1{10}/', $cpf)) {
            return false;
        }
        
        for ($t = 9; $t < 11; $t++) {
            for ($d = 0, $c = 0; $c < $t; $c++) {
                $d += $cpf{$c} * (($t + 1) - $c);
            }
            $d = ((10 * $d) % 11) % 10;
            if ($cpf{$c} != $d) {
                return false;
            }
        }
        return true;
    }

    abstract function salvarCadastro();

    abstract function excluirCadastro();
    
    abstract function validarDados();
}
