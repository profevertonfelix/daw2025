<?php
session_start();
if(isset($_GET["carrinho"])){
    if(!isset($_SESSION["carrinho"])){
        $_SESSION["carrinho"] = [];
    }
    if(!in_array($_GET["id"], $_SESSION["carrinho"])){
        array_push($_SESSION["carrinho"], $_GET["id"]);
        echo "<h2>Adicionado ao carrinho</h2>";
    }
    else{
        echo "<h2>Produto já adicionado ao carrinho anteriormente</h2>";
    }
    print_r($_SESSION["carrinho"]);

}
//session_destroy();

    //include_once "../class/categoria.class.php";
    //include_once "../class/CategoriaDAO.class.php";
    include_once "../class/produto.class.php";
    include_once "../class/produtoDAO.class.php";
    include_once "../class/imagem.class.php";
    include_once "../class/imagemDAO.class.php";

    //$objCategoriaDAO= new categoriaDAO();
   // $categorias = $objCategoriaDAO->listar();
?>
<ul>
    <?php
   /* foreach($categorias as $linha){
        echo "<li><a href='listar.php?id=".
        $linha["idcategoria"]."'>".$linha["nome"]."</a></li>";
    }*/
    ?>
    <li><a href="carrinho.php">Carrinho de Compras</a></li>
</ul>
<?php
$objDAO = new produtoDAO();
$retorno = $objDAO->listar(" ORDER BY idproduto DESC LIMIT 3");
$objImagemDAO = new imagemDAO();
foreach($retorno as $linha){
    ?>
    <div>
        <h3><?=$linha["nome"]?></h3>
        <h4><?=$linha["preco"]?></h4>
        <h5><?=$linha["categoria"]?></h5>
        <?php
        $retornoImg =  $objImagemDAO->retornarUm($linha["idproduto"]);
        if($retornoImg>0)
            echo "<img src='../img/".$retornoImg["nome"]."'/>";
        ?>
        <a href="?id=<?=$linha['idproduto'];?>&carrinho">
            Adicionar ao Carrinho
        </a>
    </div>
<?php } ?>
