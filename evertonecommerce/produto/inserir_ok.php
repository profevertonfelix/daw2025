<?php
//echo "<pre>";
//print_r($_POST);
include_once "../class/produto.class.php";
include_once "../class/produtoDAO.class.php";
//print_r($_POST);
include_once "../class/imagem.class.php";
include_once "../class/imagemDAO.class.php";

$obj = new produto();
$obj->setNome($_POST["nome"]);
$obj->setPreco($_POST["preco"]);
$obj->setIdcategoria($_POST["idcategoria"]);

$objDAO = new produtoDAO();
$retorno = $objDAO->inserir($obj);
$obj = new imagem();
$obj->setIdproduto($retorno);
$objDAO = new imagemDAO();

for($i=0; $i<count($_FILES["imagem"]["name"]); $i++){
    $nome = $_FILES["imagem"]["name"][$i];
    $nomeTmp = $_FILES["imagem"]["tmp_name"][$i];
    $diretorio = "../img/".$nome;
    if(move_uploaded_file($nomeTmp, $diretorio)){
        $obj->setNome($nome);
        $objDAO->inserir($obj);
    }

}


if($retorno)
    echo "Adicionado com sucesso";
else
    echo "Erro! Por favor, consulte um adm";
?>