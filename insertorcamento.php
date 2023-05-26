<?php

    // Database injection 

    
    include "config.php";

    $name = $_POST['name'];
    $product = $_POST['product'];
    $cliente = $_POST['cliente'];
    $descricao = $_POST['descricao'];


    if($product == null){
        $sql = 'INSERT INTO `orcamento`(`name`, `descricao`, `cliente_id_cliente`) 
        VALUES ("'.$name.'", "'.$descricao.'", "'.$cliente.'")';
        
    }
    else{

        $sql = 'INSERT INTO `orcamento`(`name`, `descricao`, `product_id_product`, `cliente_id_cliente`) 
        VALUES ("'.$name.'", "'.$descricao.'", "'.$product.'", "'.$cliente.'")';
    }

    
    if(mysqli_query($conn, $sql)){
        //echo "$name Cadastrado com sucesso! - ";
        header("Location: /bytemanager/orcamento.php");

    }
    else{
        echo "$name Não cadastrado!";
        var_dump($sql);
        
    }

?>