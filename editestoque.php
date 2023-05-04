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


    //$sql = "UPDATE product SET name_product = '$name', price_product = '$price', quantity = '$quantity', type_product_id_type = '$type' WHERE id_product= $id";
    //$sql = "UPDATE type_product SET type = '$type' WHERE id_type= $id";

    //$sql = "UPDATE product AS pro INNER JOIN type_product AS tp ON pro.id_product = 1 SET pro.name_product = '$name', 
    //pro.price_product = '$price', pro.quantity = '$quantity', pro.type_product_id_type = '$type', image_name = '$imageName'";


     // Update data in table1
     $sql2 = "UPDATE product SET name_product ='$name', price_product = '$price', quantity = '$quantity', type_product_id_type = '$id_type', image_name = '$imageName' WHERE id_product = $id_product ";
     $result2 = mysqli_query($conn, $sql2);

    // Update data in table2
    //$sql1 = "UPDATE type_product SET type ='$type' WHERE id_type='$id_type'";
    //$result1 = mysqli_query($conn, $sql1);

  
   

    // Check if the updates were successful
    if ($result2 == true) {
       echo "Data updated successfully";
    } else {
        //echo "Error updating data: " . mysqli_error($conn);
        var_dump($sql2);
    }



    //$sql =  "SELECT * FROM product INNER JOIN type_product ON product.id_product = type_product.id_type";

   

    
?>
