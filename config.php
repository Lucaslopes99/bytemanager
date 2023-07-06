
<?php
    
    // Database connection

    $server = "localhost";
    $user = "root";
    $password = "root";
    $database = "db_bytemanager";

    

    if($conn = mysqli_connect($server, $user, $password, $database, 3306)) {
        echo "";
        
    }
    else{
        echo "Erro!";

    }

?>


                                                               