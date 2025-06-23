<?php
$id = $_GET["id"];
include_once "../class/produto.class.php";
include_once "../class/produtoDAO.class.php";

$objDAO = new produtoDAO();
$retorno = $objDAO->retornarUnico($id);

include_once "../class/categoria.class.php";
include_once "../class/categoriaDAO.class.php";
$objCategoria = new categoriaDAO();
$categorias = $objCategoria->listar();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h2>Editar produto</h2>
    <form action="editar_ok.php" method="POST">
        Nome: <input type="text" name="nome" id="nome" 
        value="<?=$retorno['nome']?>">
        <br>
        Categoria:
        <select name="idcategoria">
        <?php
            foreach($categorias as $linha){
                if($linha["id"] == $retorno["idcategoria"])
                    echo "<option selected value='".$linha["id"]."'>".$linha["nome"]."</option>";
                else
                    echo "<option value='".$linha["id"]."'>".$linha["nome"]."</option>";
            }
        ?>
        <br>
        <input type="hidden" name="id"   
          value="<?=$retorno['id']?>">    
        <button type="submit">Enviar</button>
    </form>
</body>
</html>