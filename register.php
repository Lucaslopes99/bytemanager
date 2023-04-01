<?php

    // Database injection 

    
    include "config.php";
    $name = $_POST['name'];
    $email = $_POST['email'];
    $number = $_POST['number'];
    $state = $_POST['state'];
    $city = $_POST['city'];
    // $latitude = $_POST['latitude'];
    // $longitude = $_POST['longitude'];
         
    
    // Outro método de inserção
    //$sql = 'INSERT INTO `candidates`(`name`, `email`, `number`, `state`, `city`) 
    //VALUES ("'.$name.'", "'.$email.'", "'.$number.'", "'.$state.'", "'.$city.'" , "'.$latitude.'", "'.$longitude.'")'; 

    $sql = "INSERT INTO `candidates` (name, email, number, state, city) 
    VALUES ('$name', '$email','$number', '.$state','$city')";


    if(mysqli_query($conn, $sql)){
        //echo "$name Cadastrado com sucesso! - ";
        header("Location: /bytemanager/estoque.php");
      
        $idcandidate = mysqli_insert_id($conn);       



        // var_dump());
        // exit();

        // Saving candidate img

        $filenamec = $_FILES['candidateimg']['name'];
        $ext = pathinfo($filenamec, PATHINFO_EXTENSION);
        $locationc = "candidates_img/".$idcandidate.".".$ext;

        if(move_uploaded_file($_FILES['candidateimg']['tmp_name'], $locationc)){
            echo "Candidate img uploaded sucessifuly - ";
        }
        else{
            echo "Candidate image not uploaded";
        }

            
        // Saving computer img

        $filenamepc = $_FILES['candidateimg']['name'];
        $ext = pathinfo($filenamepc, PATHINFO_EXTENSION);
        $locationpc = "pc_img/".$idcandidate.".".$ext;
        if(move_uploaded_file($_FILES['computerimg']['tmp_name'], $locationpc)){
            echo "Computer img uploaded sucessifuly - ";
        }
        else{
            echo "file not uploaded";
        }

        // Saving location 
   



    }
    else{
        echo "$name Não cadastrado!";
    }


    // select pegar id apos registrar candidato

    // salvar foto com id do candidato

    // document.getElementById("myImage").src = "landscape.jpg";
    //document.getElementById("demo").value = lat;
