<?php
    class produto{
        private $idproduto;
        private $nome;
        private $preco;
        private $idcategoria;

        public function getIdproduto(){
            return $this->idproduto;
        }
        public function setIdproduto($valor){
            $this->idproduto = $valor;
        }
        public function getNome(){
            return $this->nome;
        }
        public function setNome($valor){
            $this->nome = $valor;
        }
        public function getPreco(){
            return $this->preco;
        }
        public function setPreco($valor){
            $this->preco = $valor;
        }
        
        public function getIdcategoria(){
            return $this->idcategoria;
        }
        public function setIdcategoria($valor){
            $this->idcategoria = $valor;
        }
    }
?>