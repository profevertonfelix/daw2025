<?php
    include_once "produto.class.php";
    class produtoDAO{
        public function __construct(){
            $this->conexao = new PDO(
                "mysql:host=localhost; dbname=ecommerceeverton",
                "root", "");
        }
       
        public function inserir(produto $obj){
            $sql = $this->conexao->prepare(
                "INSERT INTO produto
                (nome, preco, idcategoria)
                VALUES
                (:nome, :preco,:idcategoria)"
            );
            $sql->bindValue(":nome", $obj->getNome());
            $sql->bindValue(":preco", $obj->getPreco());
            $sql->bindValue(":idcategoria", $obj->getIdcategoria());
            $sql->execute();
            return $this->conexao->lastInsertId();
        }
        public function listar($complemento = ""){
            $sql = $this->conexao->prepare(
                "SELECT produto.*, categoria.nome as categoria FROM produto
                INNER JOIN categoria 
                ON produto.idcategoria = categoria.idcategoria ".$complemento
            );
            $sql->execute();
            return $sql->fetchAll();
        }
        public function retornarUm($id){
            $sql = $this->conexao->prepare("
            SELECT * FROM produto WHERE idproduto=:id
            ");
            $sql->bindValue(":id", $id);
            $sql->execute();
            return $sql->fetch();
        }
    }
?>