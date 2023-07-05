<?php

include "config.php";
    $id_cliente = $_POST['id_cliente'] ?? '';
    $name = $_POST['cli_name'];
    $cnpj = $_POST['cnpj'];


     $sqlSuccess = false;

     // Update sem carregar uma imagem, mantendo a atual

        $sqlUpdateCliente= "UPDATE cliente SET cli_name ='$name', cnpj = '$cnpj' WHERE id_cliente = $id_cliente ";
        $updateCliente = mysqli_query($conn, $sqlUpdateCliente);
        $sqlSuccess = $updateCliente;
     


  
   

    // Checa se o update foi realizado com sucesso
    if ($sqlSuccess == true) {
        header("Location: /bytemanager/cliente.php");
    }

    else {
        var_dump($sqlUpdateCliente);
    }




   

    
?>
