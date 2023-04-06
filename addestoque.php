<?php phpversion() ?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <!--Bootstrap -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!--CSS-->
    <link rel="stylesheet" href="css/mycss.css">

</head>

<body>
    <!--HTMLCode-->

    <?php

    include "config.php";

    $sql = "SELECT * FROM type_product";

    $result = mysqli_query($conn, $sql);




    ?>

    <header>
        <nav id="" class="navbar bg-dark nav-color">
            <div class="mr-sm-2 mt-4 ">
                <a href="index.php"><img class="byte-img" src="img/byte.png" alt="..."></a>
                <a type="button" href="#" class="btn btn-primary my-2 my-sm-0 ml-5">Aprovações</a>



            </div>


        </nav>
    </header>



    <main class="container">

        <div class="bg-img" style="background-image: url('./img/background.jpg');">
            <div class="overlay"></div>
            <!-- <img src="" class="formatimg" alt="contest"> -->

        </div>

        <div class="card text-center add-estoque">



            <div class="card-body">


                <h5 class="card-title">Adicionar Item Ao Estoque</h5>

                <form action="insertestoque.php" method="POST" enctype="multipart/form-data" class="mx-md-5">
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
                            <select required type="text" class="form-control mx-auto input-type-estoque mt-1" name="type">                         
                                <option selected disabled>Tipo Produto</option>

                                <?php
                                while ($row = mysqli_fetch_assoc($result)) {
                                    $type = $row['type'];
      


                                ?>

                                <option value=""><?php echo $type ?> </option>

                                <?php
                                    }
                                ?>

                            </select>
                            <a href="addtype.php"><img src="img/addtype.png" class="add-icon-type mt-1"> </a>
                        </div>
                    </div>

                    <div class="form-group format mx-auto inputbox">

                        <label for="inputState" class=" col-form-label mx-auto mt-5">Carregar Produto</label>
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

                    <button type="submit" class="btn btn-primary mt-3">Confirmar</button>
                    <a href="insertestoque.php"><button type="button" class="btn btn-primary mt-3 ml-3">Cancelar</button></a>
                </form>

            </div>
        </div>
        </div>
    </main>


</body>

</html>