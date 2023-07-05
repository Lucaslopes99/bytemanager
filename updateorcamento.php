<?php

include "config.php";
$id_orcamento = $_POST['id_orcamento'] ?? '';
$id_product = $_POST['id_product'] ?? '';


$sqlSuccess = false;

// Se tiver utilizando um produto, envia preço do dele
if ($id_product != null) {

$priceProduct = $_POST['priceProduct'];
$sqlUpdateOrcamento= "UPDATE orcamento SET preco ='$priceProduct' WHERE id_orcamento = $id_orcamento ";
$updateOrcamento = mysqli_query($conn, $sqlUpdateOrcamento);
header("Location: /bytemanager/orcamento.php");
}

// Senão, pede para informar o preço 
else{

    $price = $_POST['preco'];

    $sqlUpdateOrcamento= "UPDATE orcamento SET preco ='$price' WHERE id_orcamento = $id_orcamento ";
    $updateOrcamento = mysqli_query($conn, $sqlUpdateOrcamento);
    header("Location: /bytemanager/orcamento.php");
}



   





