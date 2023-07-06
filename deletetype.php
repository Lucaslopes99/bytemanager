<?php

include "config.php";
$id_type = $_GET['id'] ?? '';
$sqlDeleteType = "DELETE FROM type_product WHERE id_type = $id_type";
$result = mysqli_query($conn, $sqlDeleteType);


header("Location: /estoque2.php");
exit();

?>

