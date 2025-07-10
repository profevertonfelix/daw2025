<?php
session_start();
include_once "../class/venda.class.php";
include_once "../class/vendaDAO.class.php";
include_once "../class/produtoDAO.class.php";
include_once "../class/venda_has_produto.class.php";
include_once "../class/venda_has_produtoDAO.class.php";
$objVenda = new Venda();
$objVenda->setId_usuario($_SESSION["id"]);
$objVenda->setData(date("Y-m-d"));
$objVenda->setPagamento($_POST["pagamento"]);
$objVenda->setEntrega($_POST["endereco"]);
$objVenda->setStatus("processando");
$objDAO = new vendaDAO();
$retorno = $objDAO->inserir($objVenda);
if($retorno>0){
    echo "Venda inserida";
    $objVP = new venda_has_produto();
    $objProdutoDAO = new produtoDAO();
    $objVPDAO = new venda_has_produtoDAO();

    $objVP->setId_venda($retorno);
    foreach($_SESSION["carrinho"] as $linha){
        $objVP->setId_produto($linha);
        //pedir preco do produto para o bd
        $objProduto = $objProdutoDAO->retornarUm($linha);
        $objVP->setPreco($objProduto["preco"]);
        $objVP->setQuantidade($_POST["quantidade$linha"]);

        $objVPDAO->inserir($objVP);

    }
}
else{
    echo "erro";
}


?>