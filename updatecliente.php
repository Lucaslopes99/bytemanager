<?php

include "config.php";
    $id_cliente = $_POST['id_cliente'] ?? '';
    $name = $_POST['cli_name'];
    $cnpj = $_POST['cnpj'];
    $telefone = $_POST['telefone'];
    $email = $_POST['email_domain'];
    $ad_domain = $_POST['ad_domain'];
    $cota_backup = $_POST['cota_backup'];

     $sqlSuccess = false;

     // Update sem carregar uma imagem, mantendo a atual

        $sqlUpdateCliente= "UPDATE cliente SET cli_name ='$name', cnpj = '$cnpj', telefone = '$telefone', email_domain = '$email', ad_domain = '$ad_domain', cota_backup = '$cota_backup'
          WHERE id_cliente = $id_cliente ";
        $updateCliente = mysqli_query($conn, $sqlUpdateCliente);
        $sqlSuccess = $updateCliente;
     


  
   

    // Checa se o update foi realizado com sucesso
    if ($sqlSuccess == true) {
        header("Location: http://localhost/bytemanager/cliente.php");
    }

    else {
        var_dump($sqlUpdateCliente);
    }




   

    
?>
