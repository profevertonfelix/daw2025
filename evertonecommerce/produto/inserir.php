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
    idcategoria:
    <input type="text" name="idcategoria"/>
        <br>
         Imagem:
        <input type="file" name="imagem[]" multiple/>
        <button type="submit">Enviar</button>
    </form>
</body>
</html>