<?php

include "config.php";
    $id_product = $_POST['id_product'] ?? '';
    $name = $_POST['name_product'];
    $price = $_POST['price_product'];
    $quantity = $_POST['quantity'];
    $id_type = $_POST['id_type'] ?? '';


    $filenamec = $_FILES['candidateimg']['name'];
    $ext = pathinfo($filenamec, PATHINFO_EXTENSION);
    $imageName = uniqid().".".$ext;
    $locationc = "candidates_img/".$imageName;


     $sqlSuccess = false;

     // Update sem carregar uma imagem, mantendo a atual

     if($filenamec == null){
        $sqlUpdateProductNoImage = "UPDATE product SET name_product ='$name', price_product = '$price', quantity = '$quantity', type_product_id_type = '$id_type' WHERE id_product = $id_product ";
        $updateProductNoImage = mysqli_query($conn, $sqlUpdateProductNoImage);
        $sqlSuccess = $updateProductNoImage;
     }

     // Update alterando a imagem do produto

     else{
        $sqlUpdateProduct = "UPDATE product SET name_product ='$name', price_product = '$price', quantity = '$quantity', type_product_id_type = '$id_type', image_name = '$imageName' WHERE id_product = $id_product ";
        $updateProduct = mysqli_query($conn, $sqlUpdateProduct);
        $sqlSuccess = $updateProduct;
     }



  
   

    // Checa se o update foi realizado com sucesso, seja feito com ou sem alteração da imagem
    if ($sqlSuccess == true) {
        header("Location: http://localhost/bytemanager/estoque2.php");
       var_dump($sqlUpdateProductNoImage);

       move_uploaded_file($_FILES['candidateimg']['tmp_name'], $locationc);
    }

    else {
        var_dump($sql2);
    }




   

    
?>
