<?php

abstract class Pessoa
{

    private $cpf;
    private $idUsuario;
    private $nome;
    private $rg;
    private $dataNascimento;
    private $sexo;
    private $estadoCivil;
    private $tipoUsuario;
    private $email;
    private $senha;
    private $cep;
    private $endereco;
    private $numero;
    private $bairro;
    private $cidade;
    private $uf;
    private $complemento;
    private $celular;
    private $celular2;

    function __construct($dados)
    {
        $this->setCpf($dados->cpf);
        $this->setNome($dados->nome);
        $this->setRg($dados->rg);
        $this->setDataNascimento($dados->dataNascimento);
        $this->setEstadoCivil($dados->estadoCivil);
        $this->setTipoUsuario($dados->tipoUsuario);
        $this->seTsexo($dados->sexo);
        $this->setEmail($dados->email);
        $this->setSenha($dados->senha);
        $this->setCep($dados->cep);
        $this->setEndereco($dados->endereco);
        $this->setNumero($dados->numero);
        $this->setBairro($dados->bairro);
        $this->setCidade($dados->cidade);
        $this->setUf($dados->uf);
        $this->setComplemento($dados->complemento);
        $this->setCelular($dados->celular);
        $this->setCelular2($dados->celular2);
    }

    public function setIdUsuario($idUsuario)
    {
        $this->idUsuario = $idUsuario;
    }

    public function getIdUsuario()
    {
        return $this->idUsuario;
    }

    public function getCpf()
    {
        return $this->cpf;
    }

    public function getNome()
    {
        return $this->nome;
    }

    public function getRg()
    {
        return $this->rg;
    }

    public function getDataNascimento()
    {
        return $this->dataNascimento;
    }

    public function getSexo()
    {
        return $this->sexo;
    }

    public function getEstadoCivil()
    {
        return $this->estadoCivil;
    }

    public function getTipoUsuario()
    {
        return $this->tipoUsuario;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function getSenha()
    {
        return $this->senha;
    }

    public function getCep()
    {
        return $this->cep;
    }

    public function getEndereco()
    {
        return $this->endereco;
    }

    public function getNumero()
    {
        return $this->numero;
    }

    public function getBairro()
    {
        return $this->bairro;
    }

    public function getCidade()
    {
        return $this->cidade;
    }

    public function getUf()
    {
        return $this->uf;
    }

    public function getComplemento()
    {
        return $this->complemento;
    }

    public function getCelular()
    {
        return $this->celular;
    }

    public function getCelular2()
    {
        return $this->celular2;
    }

    public function getCelularClean()
    {
        $thisCelular = preg_replace('~\D~', '', $this->getCelular());
        return $thisCelular;
    }

    public function getCelular2Clean()
    {
        $thisCelular = preg_replace('~\D~', '', $this->getCelular2());
        return $thisCelular;
    }

    public function setCpf($cpf)
    {
        $this->cpf = $cpf;
    }

    public function setNome($nome)
    {
        $this->nome = $nome;
    }

    public function setRg($rg)
    {
        $this->rg = $rg;
    }

    public function setDataNascimento($dataNascimento)
    {
        $this->dataNascimento = $dataNascimento;
    }

    public function setSexo($sexo)
    {
        $this->sexo = $sexo;
    }

    public function setEstadoCivil($estadoCivil)
    {
        $this->estadoCivil = $estadoCivil;
    }

    public function setTipoUsuario($tipoUsuario)
    {
        $this->tipoUsuario = $tipoUsuario;
    }

    public function setEmail($email)
    {
        $this->email = $email;
    }

    public function setSenha($senha)
    {
        $this->senha = $senha;
    }

    public function setCep($cep)
    {
        $this->cep = $cep;
    }

    public function setEndereco($endereco)
    {
        $this->endereco = $endereco;
    }

    public function setNumero($numero)
    {
        $this->numero = $numero;
    }

    public function setBairro($bairro)
    {
        $this->bairro = $bairro;
    }

    public function setCidade($cidade)
    {
        $this->cidade = $cidade;
    }

    public function setUf($uf)
    {
        $this->uf = $uf;
    }

    public function setComplemento($complemento)
    {
        $this->complemento = $complemento;
    }

    public function setCelular($celular)
    {
        $this->celular = $celular;
    }

    public function setCelular2($celular)
    {
        $this->celular2 = $celular;
    }

    function cpfValido()
    {
        $cpf = preg_replace('/[^0-9]/is', '', $cpf);

        if (strlen($cpf) != 11) {
            return false;
        }

        if (preg_match('/(\d)\1{10}/', $cpf)) {
            return false;
        }

        for ($t = 9; $t < 11; $t++) {
            for ($d = 0, $c = 0; $c < $t; $c++) {
                $d += $cpf{
                $c} * (($t + 1) - $c);
            }
            $d = ((10 * $d) % 11) % 10;
            if ($cpf{
            $c} != $d) {
                return false;
            }
        }
        return true;
    }

    public function getProperties(){
        return get_object_vars($this);
    }

    abstract function salvarCadastro();

    abstract function excluirCadastro($idUser);

    abstract function validarDados();
}
