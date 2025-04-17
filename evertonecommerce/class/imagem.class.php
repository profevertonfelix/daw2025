<?php
    class imagem{
        private $idproduto;
        private $nome;
        private $idimagem;

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
      
        
        public function getIdimagem(){
            return $this->idimagem;
        }
        public function setIdimagem($valor){
            $this->idimagem = $valor;
        }
    }
?>