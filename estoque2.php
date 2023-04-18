<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Estoque </title>
    <!--Bootstrap -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">


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


    //$sql = "SELECT * FROM product WHERE name_product LIKE '%$search%'";
    $sql = "SELECT * 
    FROM product AS pro
    INNER JOIN type_product AS tp ON tp.id_type = pro.type_product_id_type
    WHERE pro.name_product LIKE '%$search%'";




    // var_dump($search);
    // exit();

    $result = mysqli_query($conn, $sql);

    ?>

    <!---codigo html-->

    <header>
        <nav id="" class="navbar bg-dark nav-color">
            <div class="mr-sm-2 mt-4 ">
                <a href="index.php"><img class="byte-img" src="img/byte.png" alt="..."></a>
                <a type="button" href="#" class="btn btn-primary my-2 my-sm-0 ml-5">Aprovações</a>



            </div>




        </nav>
    </header>



    <a  href="addestoque.php" data-bs-toggle="modal" data-bs-target="#addEstoqueModal"><img src="img/addestoque.png" class="add-icon-estoque"> </a>

    <!-- Modal -->

    <div class="modal fade modal-dialog modal-lg" id="addEstoqueModal" tabindex="-1" aria-labelledby="addEstoqueModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="addEstoqueModalLabel">Adicionar item Ao Estoque</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                    <form action="addestoque.php" method="POST" enctype="multipart/form-data" class="mx-md-5">
                        <input type="hidden" name="acao" value="cadastrar"></input>
                        <div class="form-group format mx-auto inputbox">
                            <!-- <label for="name" class="col-sm-2 col-form-label mx-auto"></label> -->
                            <div class=" ">
                                <input required type="text" class="form-control mx-auto" name="name_product" placeholder="Produto">
                            </div>
                        </div>

                        <div class="form-group format mx-auto inputbox">
                            <!-- <label for="inputEmail3" class="col-sm-2 col-form-label mx-auto"></label> -->
                            <div class="">
                                <input required type="text" class="form-control mx-auto" name="price_product" placeholder="Preço produto">
                            </div>
                        </div>

                        <div class="form-group format mx-auto inputbox">
                            <!-- <label for="inputEmail3" class="col-sm-2 col-form-label mx-auto"></label> -->
                            <div class="">
                                <input required type="number" class="form-control mx-auto" name="quantity" placeholder="Quantidade produto">

                            </div>
                        </div>

                        <div class="form-group format mx-auto inputbox">
                            <!-- <label for="state" class="col-sm-2 col-form-label mx-auto"></label> -->
                            <div class="">

                                <input type="hidden" name="idtype"></input>
                                <select required type="text" class="form-control mx-auto input-type-estoque" name="type">
                                    <option selected disabled required>Tipo Produto</option>

                                    <?php
                                    while ($row = mysqli_fetch_assoc($result)) {
                                        $type = $row['type'];



                                    ?>

                                        <option value=""><?php echo $type ?> </option>

                                    <?php
                                    }
                                    ?>

                                </select>

                                <a data-bs-toggle="modal" data-bs-target="#addTypeModal"><img src="img/addtype.png" class="add-icon-type"> </a>
                            </div>
                        </div>

                        <div class="form-group format mx-auto inputbox">

                            <label for="inputState" class=" col-form-label mx-auto mt-5">Foto Produto</label>
                            <div class="">
                                <input required class="form-control" type="file" name="candidateimg" />

                            </div>
                        </div>

                        <div class="form-group row text-center format mx-auto inputbox">
                            <label for="inputState" class="col-sm-2 col-form-label mx-auto"></label>
                            <div class="col-sm-10">
                                <!-- <button type="button" onclick="getLocation()" class="form-control formattext" name="location">Geolocalização</button> -->
                            </div>
                        </div>


                        <div class="modal-footer">
                    <button type="submit" class="btn btn-primary ">Confirmar</button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    </div>

                    </form>

                </div>

            </div>
        </div>
    </div>

    <!-- End Modal -->


    <div class="modal fade" id="addTypeModal" tabindex="-1" aria-labelledby="addTypeModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="addTypeModalLabel">Adicionar Tipo</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                <form action="inserttype.php" method="POST" enctype="multipart/form-data" class="mx-md-5">
                    <input type="hidden" name="idtype" value="cadastrar"></input>              
                    <div class="form-group format mx-auto inputbox">
                        <!-- <label for="state" class="col-sm-2 col-form-label mx-auto"></label> -->
                        <div class="">
                            <input required type="text" class="form-control mx-auto" name="type" placeholder="Adicionar tipo"> 
                        </div>
                    </div>


                    <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Confirmar</button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    </div>

                </form>
                </div>
            </div>
        </div>
    </div>




    <main class="container mt-5">
        <div class="bg-img" style="background-image: url('./img/background.jpg');">


            <div class="overlay"></div>
            <!-- <img src="" class="formatimg" alt="contest"> -->
        </div>






        <main>


            <div>

                <form class="input-group" method="POST">
                    <input type="text" class="form-control mt-3" placeholder="Pesquisar Em Estoque" name="search">
                    <button type="submit" href="estoque.php" class="btn btn-primary formatButtonSearch teste ml-1">Confirm</button>





                </form>



            </div>

            <?php ?>
            <?php while ($row = mysqli_fetch_assoc($result)) {
                $id_product = $row['id_product'];
                $name_product = $row['name_product'];
                $price_product = $row['price_product'];
                $quantity = $row['quantity'];



            ?>



                <div class="card mb-3">
                    <div class="row g-0">
                        <div class="col-md-4">


                            <img class="formatavatar" src="candidates_img/<?php echo "$id_product" ?>.jpg" class="img-fluid rounded-start" alt="Product">



                        </div>


                        <div class="col-md-8">
                            <div class="card-body">
                                <div class="row ">

                                    <div class="card-title formatid">
                                        <h5> <?php echo "$name_product" ?>
                                            <!-- Quantidade em estoque < ?php echo "$id_candidates" ?> -->


                                        </h5>
                                    </div>



                                    <div class="formatbtn mr-sm-2">

                                        <div class="">
                                            <a type="button" href="edit.php?id=<?php echo $id_product ?>" class="btn btn-success">Edit</a>
                                            <a type="button" href="delete.php?id=<?php echo $id_product ?>" class="btn btn-danger ">Delete</a>



                                        </div>
                                    </div>


                                </div>
                                <hr class="">
                                <span>Tipo: <?php echo "$type" ?> </span> <br>
                                <span>Quantidade: <?php echo "$quantity" ?> </span> <br>
                                <span>Preço: R$ <?php echo "$price_product" ?> </span> <br>


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


    <!-- Importando o jQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

    <!-- Importando o js do bootstrap -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>



    <footer class="bg-dark text-center text-white">
        <!-- Grid container -->
        <!-- Grid container -->


    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</body>

</html>