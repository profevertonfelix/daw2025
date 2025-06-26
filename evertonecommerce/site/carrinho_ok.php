<?php
session_start();
include_once "../class/venda.class.php";
include_once "../class/vendaDAO.class.php";
$objVenda = new Venda();
$objVenda->setId_usuario($_SESSION["id"]);
$objVenda->setData(date("Y-m-d"));
$objVenda->setPagamento($_POST["pagamento"]);
$objVenda->setEntrega($_POST["endereco"]);
$objVenda->setStatus("processando");
$objDAO = new vendaDAO();
$retorno = $objDAO->inserir($objVenda);
if($retorno>0){
    echo "VEnda inserida";
}
else{
    echo "erro";
}


?>