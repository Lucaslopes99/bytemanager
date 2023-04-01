<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Candidates </title>
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

    $dados = mysqli_query($conn, $sql);



    ?>

    <!---codigo html-->

    <main class="container">
        <img src="img/registerimg.jpg" class="formatimg" alt="contest">
        <div class="card">
            <div class="card-header">
                <ul class="nav nav-tabs card-header-tabs">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="true" href="index.php">Register</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="candidates.php">Candidates</a>
                    </li>
                </ul>
            </div>
            <div class="card-body">

                <h5 class="card-title text-center">List Of Candidates</h5>
                <p class="card-text">
                <nav>

                    <div>
                        <form class="input-group" action="candidates.php" method="POST">
                            <input type="text" class="form-control mt-3" placeholder="Pesquisar candidato" name="search">
                            <button type="submit" class="btn btn-primary formatpc teste">Confirm</button>
                            <a href="#demo" class="btn btn-primary formatpc teste" data-toggle="collapse">Show PC</a>

                        </form>
                    </div>


                </nav>
            </div>


            <main>



                <?php ?>
                <?php while ($linha = mysqli_fetch_assoc($dados)) {
                    $id_candidates = $linha['id_candidates'];
                    $name = $linha['name'];
                    $email = $linha['email'];
                    $number = $linha['number'];
                    $state = $linha['state'];
                    $city = $linha['city'];
                    $latitude = $linha['latitude'];
                    $longitude = $linha['longitude'];

                ?>


                    <div class="card mb-3 formatcard">
                        <div class="row g-0">
                            <div class="col-md-4">


                                <img class="formatavatar" src="candidates_img/<?php echo "$id_candidates" ?>.png" class="img-fluid rounded-start" alt="...">



                            </div>


                            <div class="col-md-8">
                                <div class="card-body">
                                    <div class="row">

                                        <div class="card-title formatid">
                                            <h5> <?php echo "$name" ?>
                                                <?php echo "$id_candidates" ?>
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
                                    <div id="demo" class="collaps formatpc">
                                        <img class="formatavatar" src="pc_img/<?php echo "$id_candidates" ?>.jpg" class="img-fluid rounded-start" alt="...">
                                    </div>
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

    <script src="js/jquery.slim.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script async src="https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY&libraries=visualization&callback=initMap">
    </script>


    <div id="map"> </div>

    <script>
        var heatmapData = [
            new google.maps.LatLng(-22.1442751, -51.3824454),
        ];

        var oestePaulista = new google.maps.LatLng(-22.1442751, -51.3824454);

        map = new google.maps.Map(document.getElementById('map'), {
            center: oestePaullista,
            zoom: 13,
            mapTypeId: 'satellite'
        });

        var heatmap = new google.maps.visualization.HeatmapLayer({
            data: heatmapData
        });
        heatmap.setMap(map);
    </script>



</body>

</html>