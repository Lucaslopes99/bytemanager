 <?php

    include "config.php";
    $id_product = $_GET['id'] ?? '';
    $sql = "DELETE FROM product
    WHERE id_product = $id_product";

    
    

    $result = mysqli_query($conn, $sql);

    header("Location: /bytemanager/estoque.php");
    exit();

?>

