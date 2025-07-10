<?php
    class venda_has_produto{
        private $id_produto;
        private $id_venda;
        private $preco;
        private $quantidade;


        public function getId_produto(){
            return $this->id_produto;
        }
        public function setId_produto($valor){
            $this->id_produto = $valor;
        }
        public function getId_venda(){
            return $this->id_venda;
        }
        public function setId_venda($valor){
            $this->id_venda = $valor;
        }
        public function getPreco(){
            return $this->preco;
        }
        public function setPreco($valor){
            $this->preco = $valor;
        }
        public function geQuantidade(){
            return $this->quantidade;
        }
        public function setQuantidade($valor){
            $this->quantidade = $valor;
        }
        
    }
?>