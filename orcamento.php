<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Orçamentos </title>
    <!--Bootstrap -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!--CSS-->
    <link rel="stylesheet" href="css/mycss.css">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>




</head>

<body>

    <!-- Php -->

    <?php
    $search = $_POST['search'] ?? '';

    include "config.php";

    $sql = "SELECT * FROM candidates WHERE name LIKE '%$search%'";
    // var_dump($search);
    // exit();

    $result = mysqli_query($conn, $sql);

    ?>

    <!---codigo html-->

    <nav id="" class="navbar bg-dark nav-color">
        <div class="mr-sm-2 mt-4 ">
            <a href="index.php"><img class="byte-img" src="img/byte.png" alt="..."></a>
            <a type="button" href="#" class="btn btn-primary my-2 my-sm-0 ml-5">Aguardando</a>
            <a type="button" href="#" class="btn btn-primary my-2 my-sm-0 ml-5">Orçados</a>



        </div>


    </nav>






    <main class="container mt-5">
        <div class="bg-img" style="background-image: url('./img/background.jpg');">


            <div class="overlay"></div>
            <!-- <img src="" class="formatimg" alt="contest"> -->
        </div>






        <main>


            <div>

                <form class="input-group" method="POST">
                    <input type="text" class="form-control mt-3" placeholder="Pesquisar Em Orçamentos" name="search">
                    <button type="submit" href="estoque.php" class="btn btn-primary formatpc teste">Confirm</button>
                    <a type="button" href="addestoque.php" class="btn btn-primary formatpc teste"> + </a>


                </form>

            </div>

            <?php ?>
            <?php while ($row = mysqli_fetch_assoc($result)) {
                $id_candidates = $row['id_candidates'];
                $name = $row['name'];
                $email = $row['email'];
                $number = $row['number'];
                $state = $row['state'];
                $city = $row['city'];
                $latitude = $row['latitude'];
                $longitude = $row['longitude'];

            ?>



                <div class="card mb-3 formatcard">
                    <div class="row g-0">
                        <div class="col-md-4">


                            <img class="formatavatar" src="candidates_img/<?php echo "$id_candidates" ?>.jpg" class="img-fluid rounded-start" alt="...">



                        </div>


                        <div class="col-md-8">
                            <div class="card-body">
                                <div class="row">

                                    <div class="card-title formatid">
                                        <h5> <?php echo "$name" ?>
                                            <!-- Quantidade em estoque < ?php echo "$id_candidates" ?> -->


                                        </h5>
                                    </div>



                                    <div class="card-title">

                                        <div class="formatbtn">
                                            <a type="button" href="edit.php?id=<?php echo $id_candidates ?>" class="btn btn-success">Edit</a>
                                            <a type="button" href="delete.php?id=<?php echo $id_candidates ?>" class="btn btn-danger">Delete</a>



                                        </div>
                                    </div>


                                </div>
                                <hr class=""><?php echo "$email", "<br>", "$number", "<br>", "$city", " - ", "$state", "<br>" ?>

                            </div>



                        </div>




                    </div>



                </div>

            <?php
            }
            ?>


        </main>





        </div>
    </main>


    <footer class="bg-dark text-center text-white">
        <!-- Grid container -->
        <!-- Grid container -->

    
    </footer>


</body>

</html>