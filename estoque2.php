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


    // List all Products, types and search for the name
    $sqlGetALLProducts = "SELECT DISTINCT pro.id_product, pro.name_product, pro.price_product, pro.quantity, pro.type_product_id_type,
                                          pro.image_name, tp.id_type, tp.type, orca.product_id_product
        FROM product AS pro
        INNER JOIN type_product AS tp ON tp.id_type = pro.type_product_id_type
        LEFT JOIN orcamento AS orca ON pro.id_product = orca.product_id_product
        WHERE pro.name_product LIKE '%$search%'";

    $products = mysqli_query($conn, $sqlGetALLProducts);

    // Lista todos os tipos no select para adicionar um produto
    $sqlGetAllProductTypes = "SELECT * FROM type_product ";
    $productTypes = mysqli_query($conn, $sqlGetAllProductTypes);

    // Lista todos os tipos no modal add/delete type
    $sqlShowAllTypes = "SELECT DISTINCT tp.id_type, tp.type, pro.type_product_id_type 
    FROM type_product AS tp
    LEFT JOIN product AS pro ON pro.type_product_id_type = tp.id_type";
    $sqlAllTypes = mysqli_query($conn, $sqlShowAllTypes);

    // Paginação estoque GPT ______________________________________________________________________________

    // Determine how many records to display per page
    $records_per_page = 10;

    // Get the total number of records in your database
    $query = "SELECT COUNT(*) as total FROM product";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_assoc($result);
    $total_records = $row['total'];

    // Calculate the total number of pages
    $total_pages = ceil($total_records / $records_per_page);

    // Determine the current page number
    $current_page = isset($_GET['page']) ? $_GET['page'] : 1;

    // Calculate the starting point for the query
    $start_from = ($current_page - 1) * $records_per_page;

    // Retrieve data for current page
    $query = "SELECT * FROM product LIMIT $start_from, $records_per_page";
    $result = mysqli_query($conn, $query);


    ?>

    <!---codigo html-->

    <header>
        <nav id="" class="navbar nav-color">
            <div class="mr-sm-2  ">
                <a href="index.php"><img class="byte-img" src="img/byte.png" alt="..."></a>
                <a type="button" href="estoque2.php" class="btn btn-primary my-2 my-sm-0 ml-5">Estoque</a>

                <div class="btn-group ml-3">
                    <button type="button" class="btn btn-primary  dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                        Orçamentos
                    </button>
                    <ul class="dropdown-menu ">
                        <li><a class="dropdown-item" href="orcamento.php">Pendente</a></li>
                        <li><a class="dropdown-item" href="orcado.php">Orçados</a></li>
                        <li><a class="dropdown-item" href="aprovado.php">Aprovados</a></li>
                        <li><a class="dropdown-item" href="reprovado.php">Reprovados</a></li>
                    </ul>

                </div>
                <a type="button" href="cliente.php" class="btn btn-primary  my-2 my-sm-0 ml-3">Clientes</a>
            </div>
        </nav>
    </header>



    <a href="addestoque.php" data-bs-toggle="modal" data-bs-target="#addEstoqueModal"><img src="img/addestoque.png" class="add-icon-estoque"> </a>

    <!-- [[ Modal Add Product ]] -->

    <div class="modal fade modal-dialog modal-lg" id="addEstoqueModal" tabindex="-1" aria-labelledby="addEstoqueModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="addEstoqueModalLabel">Adicionar item Ao Estoque</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">

                    </button>
                </div>
                <div class="modal-body">

                    <form action="insertestoque.php" method="POST" enctype="multipart/form-data" class="mx-md-5">
                        <input type="hidden" name="id_product" value=""></input>
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
                                <select required type="text" class="form-control mx-auto input-type-estoque" name="type">
                                    <option selected disabled required>Tipo Produto</option>
                                    <?php
                                    while ($row = mysqli_fetch_assoc($productTypes)) {
                                        $type = $row['type'];
                                        $id_type = $row['id_type'];
                                    ?>
                                        <option value="<?= $row['id_type'] ?>"><?php echo $type ?> </option>
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
                            <button href="estoque2.php" type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                        </div>

                    </form>
                </div>



            </div>
        </div>
    </div>

    <!-- [[ END Modal Add Product ]] -->


    <!-- [[ Modal Add Type ]]-->

    <div class="modal fade" id="addTypeModal" tabindex="-1" aria-labelledby="addTypeModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="addTypeModalLabel">Adicionar Tipo</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="inserttype.php" method="POST" enctype="multipart/form-data" class="mx-md-5">
                        <input type="hidden" name="id_type" value="cadastrar"></input>
                        <div class="form-group format mx-auto inputbox">
                            <!-- <label for="state" class="col-sm-2 col-form-label mx-auto"></label> -->
                            <div class="">
                                <input required type="text" class="form-control mx-auto" name="type" placeholder="Adicionar tipo">
                            </div>
                            <br>


                            <?php
                            $i = 0;
                            while ($row = $sqlAllTypes->fetch_assoc()) {
                                $i++;
                                $id_type = $row['id_type'];
                            ?>
                                <table class="table">
                                    <tbody>
                                        <tr>
                                            <th scope="row"><?php echo $i; ?></th>
                                            <td><?php echo $row['type']; ?></td>
                                            <td><a type="button" data-bs-toggle="modal" data-bs-target="#confirmDeleteTypeModal" href="" class="btn btn-danger button-modal-type">Delete</a></td>

                                        </tr>
                                    </tbody>
                                </table>



                                <!-- Modal Confirm Delete Type-->
                                <div class="modal fade" id="confirmDeleteTypeModal" tabindex="-1" aria-labelledby="confirmDeleteTypeModalLabel<?php echo $id_type ?>" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h1 class="modal-title fs-5" id="confirmDeleteTypeModalLabel<?php echo $id_type ?>">Excluir Tipo</h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <h3 class="modal-title fs-6">Deseja Excluir Esse Tipo?</h3>
                                                <!-- Aqui você pode adicionar mais detalhes sobre o tipo que está sendo excluído, se desejar -->
                                            </div>
                                            <div class="modal-footer">
                                                <a type="button" href="deletetype.php?id=<?php echo $id_type ?>" class="btn btn-primary button-modal-type">Confirmar</a>
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- END Modal Confirm Delete Type-->

                            <?php } ?>



                        </div>

                        <div class="modal-footer">
                            <a><button type="submit" class="btn btn-primary">Confirmar</button></a>
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


    <main class="container mt-5">
        <div class="bg-img" style="background-image: url('./img/estoquebg.jpg');">
            <div class="overlay"></div>
        </div>

        <main>

            <!-- Products Card -->

            <div>
                <form class="input-group" method="POST">
                    <input type="text" class="form-control mt-3" placeholder="Pesquisar em estoque" name="search">
                    <button type="submit" href="estoque.php" class="btn btn-primary formatButtonSearch teste ml-1">Confirm</button>
                </form>
            </div>


            <?php ?>


            <?php while ($row = mysqli_fetch_assoc($products)) {
                $id_product = $row['id_product'];
                $name_product = $row['name_product'];
                $price_product = $row['price_product'];
                $quantity = $row['quantity'];
                $type = $row['type'];
                $imageName = $row['image_name'];
                $producType = $row['type_product_id_type'];
                $orcamentoProduct = $row['product_id_product'];





            ?>



                <!-- Cards estoque -->

                <div class="card mb-3">
                    <div class="row g-0">
                        <div class="col-md-4">
                            <img class="formatavatar" src="candidates_img/<?= $imageName ?>" class="img-fluid rounded-start" alt="Product">
                        </div>

                        <div class="col-md-8">
                            <div class="card-body">
                                <div class="row ">
                                    <div class="mt-2 col">
                                        <h5> <?php echo "$name_product" ?>

                                            <?php
                                            if ($quantity <= 2) {
                                            ?>
                                                <img class="attention-icon mb-1" src="img/attention.png" alt="" title="Produto em baixa">

                                            <?php

                                            }
                                            ?>
                                        </h5>
                                    </div>

                                    <div class="buttons-estoque col">

                                        <a type="button" class="mr-3" title="Editar produto" href="edit.php?id=<?php echo $id_product ?>"><img src="img/edit.png" class="edit-icon-estoque btn-effect"></a>
                                        <a type="button" title="Deletar produto" data-bs-toggle="modal" href="" data-bs-target="#confirmDeleteProductModal<?php echo $id_product ?>"><img src="img/delete.png" class="delete-icon-estoque btn-effect"></a>
                                    </div>

                                    <!-- Modal Confirm Delete Product-->
                                    <div class="modal fade" id="confirmDeleteProductModal<?php echo $id_product ?>" tabindex="-1" aria-labelledby="confirmDeleteProductModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h1 class="modal-title fs-5" id="confirmDeleteProductModalLabel">Excluir Produto</h1>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <h3 class="modal-title fs-6">Deseja Excluir Esse Registro? </h3>
                                                    <!-- POP UP SIMPLES <a href="excluir.php" onclick="return confirm('Deseja excluir esse registro ?')">Excluir</a> -->
                                                </div>



                                                <div class="modal-footer">
                                                    <?php

                                                    if ($id_product == $orcamentoProduct) {
                                                    ?>
                                                        <a type="button" href="deleteproduct.php?id=<?php echo "$id_product" ?>" class="btn btn-primary button-modal-type" onclick="return confirm('Ainda existem orçamentos com este produto')">Confirmar</a></td>
                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>

                                                    <?php
                                                    } else {
                                                    ?>
                                                        <a type="button" href="deleteproduct.php?id=<?php echo "$id_product" ?>" class="btn btn-primary button-modal-type">Confirmar</a></td>
                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                                                    <?php
                                                    }
                                                    ?>


                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <hr class="mt-1 mb-1">
                                <span class="fw-medium">Tipo: </span> <span class="fw-normal"> <?php echo "$type" ?> </span> <br>
                                <span class="fw-medium">Quantidade: </span> <span class="fw-normal"> <?php echo "$quantity" ?> </span> <br>
                                <span class="fw-medium">Preço: </span> <span class="fw-normal">R$ <?php echo "$price_product" ?> </span> <br>

                            </div>
                        </div>
                    </div>
                </div>

            <?php
            }
            ?>



            <!-- Paginação -->


            <nav aria-label="Page navigation example">
                <ul class="pagination justify-content-end">
                    <li class="page-item disabled">
                        <a class="page-link">Previous</a>
                    </li>
                    <li class="page-item"><a class="page-link" href="estoque2.php?page=">1</a></li>
                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                    <li class="page-item">
                        <a class="page-link" href="#">Next</a>
                    </li>
                </ul>
            </nav>

        </main>
    </main>


    <!-- Importando o jQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <!-- Importando o js do bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- Footer
                        
    <footer class="">
        <h6 class="text-footer"> © 2023 Allbytes Tecnologia. Todos os direitos reservados. </h6>
    </footer>

    -->

</body>

</html>