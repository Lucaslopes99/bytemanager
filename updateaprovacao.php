<?php

include "config.php";
$id_orcamento = $_POST['id_orcamento'] ?? '';
$id_product = $_POST['id_product'] ?? '';




if (isset($_POST['aprovar'.$id_orcamento])) {

$quantity = $_POST['quantity'];
$quantity = $quantity -1;

$sqlUpdateProduct= "UPDATE product SET quantity = '$quantity' WHERE id_product = $id_product ";
$updateOrcamento = mysqli_query($conn, $sqlUpdateProduct);
//var_dump($sqlUpdateProduct);

$sqlUpdateAprovacao= "UPDATE orcamento SET status = '1' WHERE id_orcamento = $id_orcamento ";
$updateAprovacao = mysqli_query($conn, $sqlUpdateAprovacao);
//var_dump($sqlUpdateAprovacao);

header("Location: /orcado.php");

}

if (isset($_POST['reprovar'.$id_orcamento])) {

    $sqlUpdateReprovacao= "UPDATE orcamento SET status = '0' WHERE id_orcamento = $id_orcamento ";
    $updateAprovacao = mysqli_query($conn, $sqlUpdateReprovacao);
    //var_dump($sqlUpdateReprovacao);
    
    header("Location: /orcado.php");

}



// Senão, pede para informar o preço 



   





