<?php
    include_once "imagem.class.php";
    class imagemDAO{
        public function __construct(){
            $this->conexao = new PDO(
                "mysql:host=localhost; dbname=ecommerceeverton",
                "root", "");
        }
       
        public function inserir(imagem $obj){
            $sql = $this->conexao->prepare(
                "INSERT INTO imagem
                (nome, idproduto)
                VALUES
                (:nome,:idproduto)"
            );
            $sql->bindValue(":nome", $obj->getNome());
            $sql->bindValue(":idproduto", $obj->getIdproduto());
            return $sql->execute();
        }
      
    }
?>