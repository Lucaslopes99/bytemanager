<?php

include "config.php";
$id_cliente = $_GET['id'] ?? '';
$sqlDeleteCliente = "DELETE FROM cliente WHERE id_cliente = $id_cliente";
$result = mysqli_query($conn, $sqlDeleteCliente);


header("Location: /cliente.php");

exit();

?>

