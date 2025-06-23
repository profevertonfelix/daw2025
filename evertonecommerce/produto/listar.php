<?php
    include_once "../class/produto.class.php";
    include_once "../class/produtoDAO.class.php";
    include_once "../class/imagem.class.php";
    include_once "../class/imagemDAO.class.php";

if(isset($_POST["editarOk"]))
    echo "<h2>Editado com sucesso!</h2>";
if(isset($_POST["editarErro"]))
    echo "<h2>Erro ao editar!</h2>";

    echo "<a href='inserir.php'>Inserir</a><br />";


    $objDAO = new produtoDAO();
    $retorno = $objDAO->listar();

    $objImagemDAO = new imagemDAO();


foreach($retorno as $linha){
    echo "Nome: ".$linha["nome"];
    
    echo "<br />Categoria: ".$linha["categoria"];

    echo "<br />Preço: ".$linha["preco"];
   
    $retornoImg =  $objImagemDAO->retornarUm($linha["idproduto"]);
    if($retornoImg>0)
        echo "<img src='../img/".$retornoImg["nome"]."'/>";

    echo "<br />Preço: ".$linha["preco"];

    echo "<br />
        <a href='editar.php?id=".$linha["idproduto"]."'>
         Editar</a>  
         <a href='excluir.php?id=".$linha["idproduto"]."'>
         Excluir</a>
         <br /><br />";
}
?>