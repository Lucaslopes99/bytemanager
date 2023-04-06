<?php

include "config.php";
    $id = $_POST['id'] ?? '';
    $name = $_POST['name_product'];
    $price = $_POST['price_product'];
    $quantity = $_POST['quantity'];

    $sql = "UPDATE `product` SET name_product = '$name', price_product = '$price', quantity = '$quantity',  where id_product= 12";
    
    if (mysqli_query($conn, $sql)) {
        echo "$name Update feito com sucesso! - ";
        

        $id_product = mysqli_insert_id($conn);
    } else {
        echo "$name Update não realizado!";
    }
?>
