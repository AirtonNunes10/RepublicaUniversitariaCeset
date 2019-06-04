<?php

    class Pagamento {

        private $cpf;
        private $nome;
        private $tipoPagamento;
        private $valorPagamento;

        function __construct($cpf, $nome, $tipoPagamento, $valorPagamento){
            $this->cpf = $cpf;
            $this->nome = $nome;
            $this->tipoPagamento = $tipoPagamento;
            $this->valorPagamento = $valorPagamento;
        }

        public function getCpf(){
            return $this->cpf;
        }

        public function getNome(){
            return $this->nome;
        }

        public function getTipoPagamento(){
            return $this->tipoPagamento;
        }

        public function getValorPagamento(){
            return $this->valorPagamento;
        }

        public function setCpf($cpf){
            $this->cpf = $cpf;
        }

        public function setNome($nome){
            $this->nome = $nome;
        }

        public function setTipoPagamento($tipoPagamento){
            $this->tipoPagamento = $tipoPagamento;
        }

        public function setValorPagamento($valorPagamento){
            $this->valorPagamento = $valorPagamento;
        }
    }

?>