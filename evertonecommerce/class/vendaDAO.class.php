<?php
    include_once "venda.class.php";
    class vendaDAO{
        public function __construct(){
            $this->conexao = new PDO(
                "mysql:host=localhost; dbname=ecommerceeverton",
                "root", "");
        }
       
        public function inserir(venda $obj){
            $sql = $this->conexao->prepare(
                "INSERT INTO venda
                (id_usuario, status, pagamento, entrega, data)
                VALUES
                (:id_usuario, :status,:pagamento, :entrega, :data)"
            );
            $sql->bindValue(":id_usuario", $obj->getId_usuario());
            $sql->bindValue(":status", $obj->getStatus());
            $sql->bindValue(":pagamento", $obj->getPagamento());
            $sql->bindValue(":entrega", $obj->getEntrega());
            $sql->bindValue(":data", $obj->getData());
            $sql->execute();
            return $this->conexao->lastInsertId();
        }
       
    }
?>