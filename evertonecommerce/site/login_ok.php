<?php
include_once "../class/usuario.class.php";
include_once "../class/usuarioDAO.class.php";

$obj = new usuario();
$obj->setEmail($_POST["email"]);
$obj->setSenha($_POST["senha"]);
$objDAO = new usuarioDAO();
$retorno = $objDAO->login($obj);
if($retorno == 2)
    echo "email n cadastrado";
else if($retorno == 1)
    echo "senha incorreta";
else{
    session_start();
    $_SESSION["id"] = $retorno["id"];
    $_SESSION["login"] = true;
    header("location:index.php?loginOk");
}
?>