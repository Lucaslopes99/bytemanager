<?php

    // Database injection 

    
    include "config.php";
    $type = $_POST['type'];


    $sql = 'INSERT INTO `type_product`( `type`) 
    VALUES ("'.$type.'")';
    

    

    if(mysqli_query($conn, $sql)){
        echo "$type Cadastrado com sucesso! - ";
        
      
        $idproduct = mysqli_insert_id($conn);    




        header("Location: /bytemanager/estoque.php");
        exit();
    }
    else{
        echo "$type Não cadastrado!";
    }


    // select pegar id apos registrar candidato

    // salvar foto com id do candidato

    // document.getElementById("myImage").src = "landscape.jpg";
    //document.getElementById("demo").value = lat;
