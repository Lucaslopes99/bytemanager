<?php

    // Database injection 

    
    include "config.php";

    $name = $_POST['name_product'];
    $price = $_POST['price_product'];
    $quantity = $_POST['quantity'];
    //$type = $_GET['id_type'];


    //$sql = 'INSERT INTO `product`(`name_product`, `price_product`, `quantity`, `type_product_id_type`) 
    //VALUES ("'.$name.'", "'.$price.'", "'.$quantity.'", "'.$type.'")';

    $sql = 'INSERT INTO `product`(`name_product`, `price_product`, `quantity`) 
    VALUES ("'.$name.'", "'.$price.'", "'.$quantity.'"';

    
    


    if(mysqli_query($conn, $sql)){
        echo "$name Cadastrado com sucesso! - ";
        
      
        $idproduct = mysqli_insert_id($conn);       



        // var_dump());
        // exit();

        // Saving candidate img

        $filenamec = $_FILES['candidateimg']['name'];
        $ext = pathinfo($filenamec, PATHINFO_EXTENSION);
        $locationc = "candidates_img/".$idproduct.".".$ext;

        if(move_uploaded_file($_FILES['candidateimg']['tmp_name'], $locationc)){
            //header("Location: /bytemanager/estoque2.php");
            echo "$name Cadstrado";
            exit();
        }
        else{
            echo "Não foi otario";
        }




    }
    else{
        echo "$name Não cadastrado!";
    }


    // select pegar id apos registrar candidato

    // salvar foto com id do candidato

    // document.getElementById("myImage").src = "landscape.jpg";
    //document.getElementById("demo").value = lat;
