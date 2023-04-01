 <?php

    include "config.php";
    $id = $_GET['id_candidates'] ?? '';
    $sql = "DELETE FROM candidates
    WHERE id_candidates = $id";

    
    

    $result = mysqli_query($conn, $sql);

    header("Location: /bytemanager/estoque.php");
    exit();

?>

