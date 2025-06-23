<?php
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
    <form action="inserir_ok.php" method="post" 
    enctype="multipart/form-data">
    Nome:
    <input type="text" name="nome"/> 
    Preco:
    <input type="text" name="preco"/> 
    Categoria:
    <select name="idcategoria">
    <?php
        foreach($categorias as $linha){
            echo "<option value='".$linha["id"]."'>".$linha["nome"]."</option>";
        }
    ?>
    </select>
        <br>
         Imagem:
        <input type="file" name="imagem[]" multiple/>
        <button type="submit">Enviar</button>
    </form>
</body>
</html>