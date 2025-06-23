<?php
    include_once "../class/categoria.class.php";
    include_once "../class/CategoriaDAO.class.php";
    include_once "../class/produto.class.php";
    include_once "../class/produtoDAO.class.php";
    include_once "../class/imagem.class.php";
    include_once "../class/imagemDAO.class.php";

    $objCategoriaDAO= new categoriaDAO();
    $categorias = $objCategoriaDAO->listar();
?>
<ul>
    <?php
    foreach($categorias as $linha){
        echo "<li><a href='listar.php?id=".
        $linha["idcategoria"]."'>".$linha["nome"]."</a></li>";
    }
    ?>
</ul>
<?php
$objDAO = new produtoDAO();
$retorno = $objDAO->listar(" ORDER BY id DESC LIMIT 3");
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
    </div>
<?php } ?>
