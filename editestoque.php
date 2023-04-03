<?php

include "config.php";
    $id = $_POST['id'] ?? '';
    $name = $_POST['name_product'];
    $price = $_POST['price_product'];
    $quantity = $_POST['quantity'];
    $type = $_POST['type'];

    //$sql = "UPDATE `candidates` SET `name` = '$name', `email` = '$email', `number` = '$number', `state` = '$state', `city` = '$city', WHERE `id_candidates` = '$id'";
    //$sql = "UPDATE `candidates` SET name = '$name', email = '$email', number = '$number', state = '$state', city = '$city' where id_candidates= 46";
    //$sql = "UPDATE `candidates` SET id = $id, name = '$name', email = '$email', number = '$number', state = '$state', city = '$city' WHERE id_candidate = $id";
    //$sql = 'UPDATE `product` SET `name_product`, `price_product`, `quantity`, `type`   
    //VALUES ("'.$name.'", "'.$price.'", "'.$quantity.'", "'.$type.'")';

    //$sql = "UPDATE products SET name_product='$name' WHERE id_product=12";
    $sql = "UPDATE `product` SET name_product = '$name', price_product = '$price', quantity = '$quantity', type = '$type', where id_product= 12";
    
    if (mysqli_query($conn, $sql)) {
        echo "$name Update feito com sucesso! - ";
        

        $id_product = mysqli_insert_id($conn);
    } else {
        echo "$name Update não realizado!";
    }
?>
