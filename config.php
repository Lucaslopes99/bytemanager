
<?php
    
    // Database connection

    $server = "localhost";
    $user = "root";
    $password = "";
    $database = "db_contest";

    

    if($conn = mysqli_connect($server, $user, $password, $database, 3306)) {
        echo "";
        
    }
    else{
        echo "Erro!";

    }

?>


                                                               