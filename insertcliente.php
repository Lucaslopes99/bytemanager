<?php

    // Database injection 

    
    include "config.php";
    $name = $_POST['name_cliente'];
    $cnpj = $_POST['cnpj'];
    $email_domain = $_POST['email_domain'];
    $ad_domain = $_POST['ad_domain'];
    $cota_backup = $_POST['cota_backup'];
    $telefone = $_POST['telefone'];
    
    $sql = 'INSERT INTO `cliente`(`cli_name`, `cnpj`, `email_domain`, `ad_domain`, `cota_backup`, `telefone` ) 
    VALUES ("'.$name.'", "'.$cnpj.'", "'.$email_domain.'", "'.$ad_domain.'", "'.$cota_backup.'", "'.$telefone.'")';

    

    if(mysqli_query($conn, $sql)){
        echo "$name Cadastrado com sucesso! - ";
        header("Location: http://localhost/bytemanager/cliente.php");
        exit();
        
    }
    else{
        echo "$name Não cadastrado!";
    }


    // select pegar id apos registrar candidato

    // salvar foto com id do candidato

    // document.getElementById("myImage").src = "landscape.jpg";
    //document.getElementById("demo").value = lat;
