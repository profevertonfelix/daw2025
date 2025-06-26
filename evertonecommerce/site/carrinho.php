<?php
session_start();
//verifica se o usuario está logado
if(!isset($_SESSION["login"]))
    header("location:login.php");

if(!isset($_SESSION["carrinho"])){
    echo "<h2>Carrinho vazio! Vá as compras!</h2>";
}
else{
    ?>
    <form action="carrinho_ok.php" method="POST">
    <table border>
        <thead>
            <th>Nome</th>
            <th>Preço</th>
            <th>Quantidade</th>
        </thead>
        <tbody>
            <?php
                include_once "../class/produto.class.php";
                include_once "../class/produtoDAO.class.php";
                $objProdutoDAO = new produtoDAO();

                foreach($_SESSION["carrinho"] as $id){
                    $retorno = $objProdutoDAO->retornarUm($id);
                    ?>
                        <tr>
                            <td>
                                <?=$retorno["nome"];?>
                            </td>
                            <td>
                                <?=$retorno["preco"];?>
                            </td>
                            <td>
                                <input type="number" name="quantidade<?=$id;?>" id="">
                            </td>
                        </tr>
                    <?php
                }
            ?>
        </tbody>
    </table>
    Forma de pagamento:
    <input type="text" name="pagamento" />
    <br>
    Endereço de entrega:
    <input type="text" name="endereco"/>            
    <button type="submit">Finalizar compra</button>
    </form>
    <?php
}
