<?php
//echo "<pre>";
//print_r($_POST);
include_once "../class/usuario.class.php";
include_once "../class/usuarioDAO.class.php";

$obj = new usuario();
$obj->setIdusuario($_POST["idusuario"]);
$obj->setNome($_POST["nome"]);
$obj->setEmail($_POST["email"]);
$obj->setSenha($_POST["senha"]);
$objDAO = new usuarioDAO();
$retorno = $objDAO->editar($obj);
if($retorno)
    header("location:listar.php?editarOk");
else
    header("location:listar.php?editarErro");
?>