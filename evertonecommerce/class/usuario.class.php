<?php
    class usuario{
        private $idusuario;
        private $nome;
        private $email;
        private $senha;

        public function getIdusuario(){
            return $this->idusuario;
        }
        public function setIdusuario($valor){
            $this->idusuario = $valor;
        }
        public function getNome(){
            return $this->nome;
        }
        public function setNome($valor){
            $this->nome = $valor;
        }
        public function getEmail(){
            return $this->email;
        }
        public function setEmail($valor){
            $this->email = $valor;
        }
        
        public function getSenha(){
            return $this->senha;
        }
        public function setSenha($valor){
            $this->senha = $valor;
        }
    }
?>