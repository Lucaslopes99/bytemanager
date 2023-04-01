<?php

include "config.php";
$id = $_GET['id'] ?? '';
    $name = $_POST['name'];
    $email = $_POST['email'];
    $number = $_POST['number'];
    $state = $_POST['state'];
    $city = $_POST['city'];

    //$sql = "UPDATE `candidates` SET `name` = '$name', `email` = '$email', `number` = '$number', `state` = '$state', `city` = '$city', WHERE `id_candidates` = '$id'";
    $sql = "UPDATE `candidates` SET name = '$name', email = '$email', number = '$number', state = '$state', city = '$city' where id_candidates= 46";
    //$sql = "UPDATE `candidates` SET id = $id, name = '$name', email = '$email', number = '$number', state = '$state', city = '$city' WHERE id_candidate = $id";


    
    if (mysqli_query($conn, $sql)) {
        echo "$name Update feito com sucesso! - ";
        

        $idcandidate = mysqli_insert_id($conn);
    } else {
        echo "$name Update não realizado!";
    }
?>
