<?php
header('Content-Type: text/html; charset=utf-8');

class LoginService
{
    private $conexao;

    public function __construct(Conexao $conexao)
    {
        $this->conexao = $conexao->conectar();
    }

    public function loginUsuario($email, $senha)
    {
        $query = 'SELECT tipo_usuario FROM tb_usuario WHERE email = "' . $email . '" AND senha = "' . $senha . '"';
        $query = $this->conexao->query($query);
        $result = $query->fetchAll(PDO::FETCH_OBJ);
        
        for ($i = 0; $i < count($result); $i++) {
            $tempTipoUsuario = $result[$i]->tipo_usuario;
        }

        if ($result) {
            return $tempTipoUsuario;
        } else {
            return false;
        }
    }

}
