<?php

include "config.php";
$id_orcamento = $_POST['id_orcamento'] ?? '';
$id_product = $_POST['id_product'] ?? '';
$descricao = $_POST['descricao'];

$sqlSuccess = false;




if (isset($_POST['updateDescricao'.$id_orcamento])) {

    

    $sqlUpdateDescricao= "UPDATE orcamento SET descricao = '$descricao' WHERE id_orcamento = $id_orcamento ";
    $updateDescricao = mysqli_query($conn, $sqlUpdateDescricao);
    //var_dump($sqlUpdateDescricao);
    
    
    header("Location: http://localhost/bytemanager/orcamento.php");
}

elseif (isset($_POST['confirmOrcamento'.$id_orcamento])) {

    // Se tiver utilizando um produto, envia preço dele
    if ($id_product != null) {

        $priceProduct = $_POST['priceProduct'];
        $sqlUpdateOrcamento= "UPDATE orcamento SET preco ='$priceProduct' WHERE id_orcamento = $id_orcamento ";
        $updateOrcamento = mysqli_query($conn, $sqlUpdateOrcamento);
        header("Location: http://localhost/bytemanager/orcamento.php");
    }
        
        // Senão, pede para informar o preço 
        else{
        
            $price = $_POST['preco'];
        
            $sqlUpdateOrcamento= "UPDATE orcamento SET preco ='$price' WHERE id_orcamento = $id_orcamento ";
            $updateOrcamento = mysqli_query($conn, $sqlUpdateOrcamento);
            header("Location: http://localhost/bytemanager/orcamento.php");
        }
    
}
    
    



   





