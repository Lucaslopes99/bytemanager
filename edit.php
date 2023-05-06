<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit candidate</title>
    <!--Bootstrap -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <!--CSS-->
    <link rel="stylesheet" href="css/mycss.css">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

</head>

<body>

    <?php

    include "config.php";
    $id_product = $_GET['id'] ?? '';
    $id_type = $_GET['id'] ?? '';


    // Get each atribute from products on edit page
    $sqlGetProducts = "SELECT * FROM product WHERE id_product = '$id_product'";
    $product = mysqli_query($conn, $sqlGetProducts);
    $rowProduct = mysqli_fetch_assoc($product);

    // Get the type from each product on edit page
    $sqlGetProductType = "SELECT type FROM type_product AS tp INNER JOIN product AS pro ON tp.id_type = pro.type_product_id_type where pro.id_product = $id_type ";
    $productType = mysqli_query($conn, $sqlGetProductType);
    $rowType = mysqli_fetch_assoc($productType);

    // Get and show all types registred on edit page from espefic product
    $sqlShowAllTypes = "SELECT * FROM type_product";
    $sqlAllTypes = mysqli_query($conn, $sqlShowAllTypes);

    // List all types on add type from edit page
    $query = "SELECT id_type, type FROM type_product";
    $sqlListTypes = mysqli_query($conn, $query);

    $sqlDeleteType = "SELECT * from type_product WHERE type = '$id_type'";
    $deleteType = mysqli_query($conn, $sqlDeleteType);
    $rowDeleteType = mysqli_fetch_assoc($deleteType);

    







    ?>

    <!--HTMLCode-->
    <header>
        <nav id="" class="navbar bg-dark nav-color">
            <div class="mr-sm-2 mt-4 ">
                <a href="index.php"><img class="byte-img" src="img/byte.png" alt="..."></a>
                <a type="button" href="#" class="btn btn-primary my-2 my-sm-0">Aprovações</a>
                <a type="button" href="#" class="btn btn-primary my-2 my-sm-0">Orçamentos</a>



            </div>


        </nav>

    </header>

    <main class="container">

        <div class="bg-img" style="background-image: url('./img/background.jpg');">
            <div class="overlay"></div>

        </div>

        <div class="card text-center add-estoque">


            <div class="card-body">
                <h5 class="card-title">Editar Item Estoque</h5>


                <form action="editestoque.php" method="POST" enctype="multipart/form-data" class="mx-md-5">
                    <input type="hidden" name="id_product" value="<?php echo $rowProduct['id_product']; ?>">
                    <div class="form-group format mx-auto inputbox">
                        <div class=" ">
                            <input required type="text" class="form-control mx-auto" name="name_product" placeholder="Nome produto" required value="<?php echo $rowProduct['name_product']; ?>">
                        </div>
                    </div>

                    <div class="form-group format mx-auto inputbox">
                        <div class="">
                            <input required type="text" class="form-control mx-auto" name="price_product" placeholder="Preço" required value="<?php echo $rowProduct['price_product']; ?>">
                        </div>
                    </div>

                    <div class="form-group format mx-auto inputbox">
                        <div class="">
                            <input required type="text" class="form-control mx-auto" name="quantity" placeholder="Quantidade" required value="<?php echo $rowProduct['quantity']; ?>">
                        </div>
                    </div>

                    <div class="form-group format mx-auto inputbox">
                        <select required type="text" class="form-control mx-auto input-type-estoque" name="id_type" value="<?php $rowProduct['type_product_id_type']; ?>">

                            <?php
                            while ($row = mysqli_fetch_assoc($sqlAllTypes)) :
                                $type = $row['type'];
                                $id_type = $row['id_type'];
                            ?>
                                <!-- Se o tipo selecionado for o tipo do produto mostra o tipo do produto selecionado -->
                                <?php if ($rowProduct['type_product_id_type'] == $id_type) : ?>
                                    <option selected value="<?php echo $row['id_type']; ?>"><?php echo $row['type'] ?> </option>

                                <?php else : ?>
                                    <!-- Senão mostra todos os tipos para alteração -->
                                    <option value="<?php echo $row['id_type']; ?>"><?php echo $row['type'] ?> </option>
                                <?php endif; ?>

                            <?php endwhile; ?>
                        </select>



                    </div>



                    <div class="form-group format mx-auto inputbox mt-5">
                        <label for="inputState" class=" col-form-label mx-auto">Foto de perfil</label>
                        <div class="">
                            <input class="form-control" type="file" name="candidateimg" />

                        </div>
                    </div>


                    <div class="form-group row text-center format mx-auto inputbox">
                        <label for="inputState" class="col-sm-2 col-form-label mx-auto"></label>
                        <div class="col-sm-10">
                            <!-- <button type="button" onclick="getLocation()" class="form-control formattext" name="location">Geolocalização</button> -->
                        </div>
                    </div>


                    <a data-bs-toggle="modal" data-bs-target="#addTypeModal"><img src="img/addtype.png" class="add-icon-type-edit-page"> </a>

                    <button type="submit" class="btn btn-primary mt-3 ">Confirmar</button>
                    <a href="estoque2.php"><button type="button" class="btn btn-secondary mt-3 ml-3">Cancelar</button></a>

                </form>




            </div>
        </div>



        <div class="modal fade" id="addTypeModal" tabindex="-1" aria-labelledby="addTypeModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="addTypeModalLabel">Adicionar Tipo</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="inserttype.php?<?php echo rawurldecode('redirectUrl=edit.php?id=' . $id_product) ?>" method="POST" enctype="multipart/form-data" class="mx-md-5">
                            <div class="form-group format mx-auto inputbox">
                                <!-- <label for="state" class="col-sm-2 col-form-label mx-auto"></label> -->
                                <div class="">
                                    <input required type="text" class="form-control mx-auto" name="type" placeholder="Adicionar tipo">
                                </div>

                                <br>
                                <div class="">


                                    <table class="table">
                                        <tbody>
                                            <?php


                                            $i = 0;
                                            while ($row = mysqli_fetch_assoc($sqlListTypes)) {
                                                $id_type = $row['id_type'];


                                                $i++;

                                            ?>
                                                <tr>
                                                    <th scope="row"><?php echo $i; ?>
                                                    </th>
                                                    <td><?php echo $row['type']; ?></td>

                                                    <td><a type="button" data-bs-toggle="modal" data-bs-target="#confirmDeleteModal" href="deletetype.php?id=<?php echo $id_type ?>" class="btn btn-danger button-modal-type">Delete</a></td>




                                                </tr>


                                            <?php
                                            }




                                            ?>
                                        </tbody>
                                    </table>
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


        <!-- Modal Confirm Delete Type-->
        <div class="modal fade" id="confirmDeleteModal" tabindex="-1" aria-labelledby="confirmDeleteModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="confirmDeleteModalLabel">Excluir Tipo</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                    <h3 class="modal-title fs-6">Deseja Excluir Esse Registro? </h3>        
                          <!-- POP UP SIMPLES <a href="excluir.php" onclick="return confirm('Deseja excluir esse registro ?')">Excluir</a> -->                     
                    </div>

                    <div class="modal-footer">
                        <a type="button" href="deletetype.php?id=<?php echo $id_type?>&<?php rawurldecode('redirectUrl=edit.php?id='.$id_product) ?>" class="btn btn-primary button-modal-type">Confirmar</a></td>
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    </div>
                </div>
            </div>
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