<?php
    include_once "../class/usuario.class.php";
    include_once "../class/usuarioDAO.class.php";
    $id = $_GET["id"];
    $objDAO = new usuarioDAO();
    $retorno = $objDAO->retornarUm($id);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="editar_ok.php" method="post">
        <input type="hidden" name="idusuario" value="<?=$retorno["idusuario"]?>"/>
        Nome:
        <input type="text" name="nome" value="<?=$retorno["nome"]?>"/>
        <br>
        Email:
        <input type="email" name="email" value="<?=$retorno["email"]?>"/>
        <br>
        Senha:
        <input type="password" name="senha" value="<?=$retorno["senha"]?>"/>
        <br>
        <button type="submit">Enviar</button>
    </form>
</body>
</html>