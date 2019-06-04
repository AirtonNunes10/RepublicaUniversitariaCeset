<?php

class Funcionario extends Pessoa
{

    private $departamento;
    private $profissao;
    private $conexao;

    public function __construct($dados, $conexao)
    {
        parent::__construct($dados);
        $this->conexao = $conexao->conectar();
        $this->setDepartamento($dados->departamento);
        $this->setProfissao($dados->profissao);
    }

    function getDepartamento()
    {
        return $this->departamento;
    }

    function getProfissao()
    {
        return $this->profissao;
    }

    function setDepartamento($departamento)
    {
        $this->departamento = $departamento;
    }

    function setProfissao($profissao)
    {
        $this->profissao = $profissao;
    }

    public function excluirCadastro($idUser)
    { }

    public function salvarCadastro()
    {
        try {
            $query = 'insert into tb_usuario (cpf, nome, rg, data_nascimento, sexo, estado_civil, tipo_usuario, email, senha, 
                cep, endereco, numero, bairro, cidade, uf, complemento, celular1, celular2)
                values(:cpf, :nome, :rg, :dataNascimento, :sexo, :estadoCivil, :tipoUsuario, :email, :senha, 
                :cep, :endereco, :numero, :bairro, :cidade, :uf, :complemento, :cel, :cel2)';

            $stmt = $this->conexao->prepare($query);

            $stmt->bindValue('cpf', preg_replace('~\D~', '', $this->getCpf()));
            $stmt->bindValue('nome', $this->getNome());
            $stmt->bindValue('rg', preg_replace('~\D~', '', $this->getRg()));
            $stmt->bindValue('dataNascimento', $this->getDataNascimento());
            $stmt->bindValue('sexo', $this->getSexo());
            $stmt->bindValue('estadoCivil', $this->getEstadoCivil());
            $stmt->bindValue('tipoUsuario', $this->getTipoUsuario());
            $stmt->bindValue('email', $this->getEmail());
            $stmt->bindValue('senha', $this->getSenha());
            $stmt->bindValue('cep', preg_replace('~\D~', '', $this->getCep()));
            $stmt->bindValue('endereco', $this->getEndereco());
            $stmt->bindValue('numero', $this->getNumero());
            $stmt->bindValue('bairro',  $this->getBairro());
            $stmt->bindValue('cidade', $this->getCidade());
            $stmt->bindValue('uf', $this->getUf());
            $stmt->bindValue('complemento', $this->getComplemento());
            $stmt->bindValue('cel', $this->getCelularClean());
            $stmt->bindValue('cel2', $this->getCelular2Clean());

            $result = $stmt->execute();
            $rows = $stmt->rowCount();
            if ($rows > 0) {

                try {

                    $id_usuario = 'select id_usuario from tb_usuario where cpf = "' .  preg_replace('~\D~', '', $this->getCpf()) . '"';
                    $get = $this->conexao->query($id_usuario);
                    $resultado = $get->fetch(PDO::FETCH_OBJ);
                    //var_dump($stmt->errorInfo());
                    $idUsuario = $resultado->id_usuario;

                    $query = 'insert into tb_funcionario(departamento, profissao, id_usuario)
                    values(:departamento, :profissao, :iduser)';

                    $query = $this->conexao->prepare($query);

                    $query->bindValue('departamento', $this->getDepartamento());
                    $query->bindValue('profissao', $this->getProfissao());
                    $query->bindParam('iduser', $idUsuario, PDO::PARAM_INT);

                    $result = $query->execute();
                    $rows = $query->rowCount();
                    if ($rows > 0) {
                        return true;
                    }
                } catch (PDOException $e) {
                    return $e->getMessage();
                }
            }
        } catch (PDOException $e) {
            $codigoErro = $e->getCode();
            if($codigoErro === "23000"){
                return "CPF, RG ou email já cadastrado(s)";
            } else {
                return $e->getMessage();
            }
        }
    }

    public function validarDados()
    { // Valida os dados preenchidos se são vazios ou nulos
        $selfVars = get_object_vars($this);

        foreach ($selfVars as $currentKey => $currentVal) {
            if (!is_null($currentVal)) {
                if (!empty($currentVal)) {
                    continue;
                } else {
                    $mensagemErro = $currentKey . " não possui valor atribuído";
                    break;
                }
            } else {
                $mensagemErro = $currentKey . " com valor " . $currentVal;
                break;
            }
        }
        if (!empty($mensagemErro)) {
            throw new Exception($mensagemErro);
        }

        return true;
    }
}
