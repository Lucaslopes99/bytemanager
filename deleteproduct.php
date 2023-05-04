 <?php

    include "config.php";
    $id_product = $_GET['id'] ?? '';
    $sqlDeleteProduct = "DELETE FROM product WHERE id_product = $id_product";
    $result = mysqli_query($conn, $sqlDeleteProduct);

    header("Location: /bytemanager/estoque2.php");
    exit();

?>

