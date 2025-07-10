<?php
    include_once "venda_has_produto.class.php";
    class venda_has_produtoDAO{
        public function __construct(){
            $this->conexao = new PDO(
                "mysql:host=localhost; dbname=ecommerceeverton",
                "root", "");
        }
       
        public function inserir(venda_has_produto $obj){
            $sql = $this->conexao->prepare(
                "INSERT INTO venda_has_produto
                (id_venda, id_produto, preco, quantidade)
                VALUES
                (:id_venda, :id_produto, :preco, :quantidade)"
            );
            $sql->bindValue(":id_venda", $obj->getId_venda());
            $sql->bindValue(":id_produto", $obj->getId_produto());
            $sql->bindValue(":preco", $obj->getPreco());
            $sql->bindValue(":quantidade", $obj->getQuantidade());
            return $sql->execute();
        }
       
    }
?>