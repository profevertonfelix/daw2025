<?php
//echo "<pre>";
//print_r($_POST);
include_once "../class/usuario.class.php";
include_once "../class/usuarioDAO.class.php";

$obj = new usuario();
$obj->setNome($_POST["nome"]);
$obj->setEmail($_POST["email"]);
$obj->setSenha($_POST["senha"]);
$objDAO = new usuarioDAO();
$retorno = $objDAO->inserir($obj);
if($retorno)
    echo "Adicionado com sucesso";
else
    echo "Erro! Por favor, consulte um adm";
?>