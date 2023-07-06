<?php

    // Database injection 

    
    include "config.php";
    $name = $_POST['name_cliente'];
    $cnpj = $_POST['cnpj'];
    
    $sql = 'INSERT INTO `cliente`(`cli_name`, `cnpj`) 
    VALUES ("'.$name.'", "'.$cnpj.'")';

    

    if(mysqli_query($conn, $sql)){
        echo "$name Cadastrado com sucesso! - ";
        header("Location: /cliente.php");
        exit();
        
    }
    else{
        echo "$name Não cadastrado!";
    }


    // select pegar id apos registrar candidato

    // salvar foto com id do candidato

    // document.getElementById("myImage").src = "landscape.jpg";
    //document.getElementById("demo").value = lat;
