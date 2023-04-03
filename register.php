<?php

    // Database injection 

    
    include "config.php";
    $name = $_POST['name_product'];
    $price = $_POST['price_product'];
    $quantity = $_POST['quantity'];
    $type = $_POST['type'];
    // $latitude = $_POST['latitude'];
    // $longitude = $_POST['longitude'];
         
    
    // Outro método de inserção
    //$sql = 'INSERT INTO `candidates`(`name`, `email`, `number`, `state`, `city`) 
    //VALUES ("'.$name.'", "'.$email.'", "'.$number.'", "'.$state.'", "'.$city.'" , "'.$latitude.'", "'.$longitude.'")'; 

    //$sql = "INSERT INTO `product` (name_product, price_product, quantity, type,) 
    //VALUES ('$name, '$price,'$quantity', '$type')";

    $sql = 'INSERT INTO `product`(`name_product`, `price_product`, `quantity`, `type`) 
    VALUES ("'.$name.'", "'.$price.'", "'.$quantity.'", "'.$type.'")';
    


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
            echo "Candidate img uploaded sucessifuly - ";
        }
        else{
            echo "Candidate image not uploaded";
        }




    }
    else{
        echo "$name Não cadastrado!";
    }


    // select pegar id apos registrar candidato

    // salvar foto com id do candidato

    // document.getElementById("myImage").src = "landscape.jpg";
    //document.getElementById("demo").value = lat;
