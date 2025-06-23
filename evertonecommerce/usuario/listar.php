<?php
    session_start();
    if(!isset($_SESSION["login"]))
        header("location:../site/login.php");
    
    include_once "../class/usuario.class.php";
    include_once "../class/usuarioDAO.class.php";

    $objusuarioDAO = new usuarioDAO();
    $retorno = $objusuarioDAO->listar();

    /*
    echo "<pre>";
    print_r($retorno);
*/
if(isset($_POST["editarOk"]))
    echo "<h2>Editado com sucesso!</h2>";
if(isset($_POST["editarErro"]))
    echo "<h2>Erro ao editar!</h2>";

echo "<a href='inserir.php'>Inserir</a><br />";
foreach($retorno as $linha){
    echo "Nome: ".$linha["nome"];
    echo "<br />Email: ".$linha["email"];
    echo "<br />
        <a href='editar.php?id=".$linha["idusuario"]."'>
         Editar</a>  
         <a href='excluir.php?id=".$linha["idusuario"]."'>
         Excluir</a>
         <br /><br />";
}
?>