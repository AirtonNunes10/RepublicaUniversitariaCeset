<?php

    class Despesa {

        private $codigoCompra;
        private $descricao;
        private $quantidade;
        private $localCompra;
        private $dataCompra;
        private $valorCompra;

        function __construct($codigoCompra, $descricao, $quantidade, $localCompra, $dataCompra, $valorCompra){
            $this->codigoCompra = $codigoCompra;
            $this->descricao = $descricao;
            $this->quantidade = $quantidade;
            $this->localCompra = $localCompra;
            $this->dataCompra = $dataCompra;
            $this->valorCompra = $valorCompra;
        }

        public function getCodigoCompra(){
            return $this->codigoCompra;
        }

        public function getDescricao(){
            return $this->descricao;
        }

        public function getQuantidade(){
            return $this->quantidade;
        }

        public function getLocalCompra(){
            return $this->localCompra;
        }

        public function getDataCompra(){
            return $this->dataCompra;
        }

        public function getValorCompra(){
            return $this->valorCompra;
        }

        public function setCodigoCompra($codigoCompra){
            $this->codigoCompra = $codigoCompra;
        }

        public function setDescricao($descricao){
            $this->descricao = $descricao;
        }

        public function setQuantidade($quantidade){
            $this->quantidade = $quantidade;
        }

        public function setLocalCompra($localCompra){
            $this->localCompra = $localCompra;
        }

        public function setDataCompra($dataCompra){
            $this->dataCompra = $dataCompra;
        }

        public function setValorCompra($valorCompra){
            $this->valorCompra = $valorCompra;
        }

    }

?>