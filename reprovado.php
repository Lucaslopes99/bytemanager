<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Orçamentos </title>
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
    $id_orcamento = $_GET['id'] ?? '';

    include "config.php";


    // List all Products, types and search for the name
    $sqlGetAllOrcamentos = "SELECT * 
        FROM orcamento AS orca 
        LEFT JOIN product AS pro ON pro.id_product = orca.product_id_product
        LEFT JOIN cliente AS cli ON cli.id_cliente = orca.cliente_id_cliente
        WHERE orca.name LIKE '%$search%'";
    $orcamentos = mysqli_query($conn, $sqlGetAllOrcamentos);

    $sqlEditOrcamentos = "SELECT * FROM orcamento WHERE id_orcamento = '$id_orcamento'";
    $orcament = mysqli_query($conn, $sqlEditOrcamentos);
    $rowOrcamento = mysqli_fetch_assoc($orcament);

    // List all products on add orcamento page
    $sqlGetAllProducts = "SELECT * FROM product ";
    $productOrcamentos = mysqli_query($conn, $sqlGetAllProducts);

    // List all clientes on add orcamento page
    $sqlGetAllClientes = "SELECT * FROM cliente ";
    $clientes = mysqli_query($conn, $sqlGetAllClientes);

    // List all types on add product page
    $sqlGetAllProductTypes = "SELECT * FROM type_product ";
    $productTypes = mysqli_query($conn, $sqlGetAllProductTypes);



    // List all types on add type from edit page
    $sqlShowAllTypes = "SELECT * FROM type_product";
    $sqlAllTypes = mysqli_query($conn, $sqlShowAllTypes);

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



    <a data-bs-toggle="modal" data-bs-target="#addOrcamentoModal"><img src="img/addestoque.png" class="add-icon-estoque"> </a>

    <!-- [[ Modal Add Orçamentos ]] -->

    <div class="modal fade modal-dialog modal-lg" id="addOrcamentoModal" tabindex="-1" aria-labelledby="addOrcamentoModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="addOrcamentoModalLabel">Criar orçamento</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                    <form action="insertorcamento.php" method="POST" enctype="multipart/form-data" class="mx-md-5">
                        <input type="hidden" name="id_orcamento" value=""></input>
                        <div class="form-group format mx-auto inputbox">
                            <!-- <label for="name" class="col-sm-2 col-form-label mx-auto"></label> -->
                            <div class=" ">
                                <input required type="text" class="form-control mx-auto" name="name" placeholder="#0523-000240 - ALLBYTES">
                            </div>
                        </div>


                        <div class="form-group format mx-auto inputbox">

                            <div class="">
                                <select class="form-select form-select-md orcamento-input-add" aria-label=".form-select-sm example" name="product">
                                    <option selected disabled>Produto</option>
                                    <?php
                                    while ($row = mysqli_fetch_assoc($productOrcamentos)) {
                                        $name_product = $row['name_product'];
                                        $id_product = $row['id_product'];
                                    ?>
                                        <option value="<?= $row['id_product'] ?>"><?php echo $name_product ?> </option>
                                    <?php
                                    }
                                    ?>
                                </select>


                                <a data-bs-toggle="modal" data-bs-target="#addEstoqueModal"><img src="img/addtype.png" class="orcamento-product-add-icon"> </a>
                            </div>
                        </div>

                        <div class="form-group format mx-auto inputbox">

                            <div class="">
                                <select required class="form-select form-select-md orcamento-input-add" aria-label=".form-select-sm example" name="cliente">
                                    <option selected disabled>Cliente</option>
                                    <?php
                                    while ($row = mysqli_fetch_assoc($clientes)) {
                                        $cliente_name = $row['cli_name'];
                                        $id_cliente = $row['id_cliente'];
                                    ?>
                                        <option value="<?= $row['id_cliente'] ?>"><?php echo $cliente_name ?> </option>
                                    <?php
                                    }
                                    ?>
                                </select>
                                <a data-bs-toggle="modal" data-bs-target="#addClienteModal"><img src="img/addtype.png" class="orcamento-client-add-icon"> </a>
                            </div>
                        </div>

                        <div class="form-floating">
                            <textarea class="form-control" placeholder="Leave a comment here" id="floatingTextarea" name="descricao"></textarea>
                            <label for="floatingTextarea">Descrição</label>
                        </div>



                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary ">Confirmar</button>
                            <button href="orcamento.php" type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- [[ END Modal Add Oramento ]]-->

    <!-- [[ Modal Add Product ]] -->

    <div class="modal fade modal-dialog modal-lg" id="addEstoqueModal" tabindex="-1" aria-labelledby="addEstoqueModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="addEstoqueModalLabel">Adicionar item Ao Estoque</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
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

                            <div class="">
                                <table class="table">
                                    <tbody>
                                        <?php

                                        $i = 0;
                                        while ($row = $sqlAllTypes->fetch_assoc()) {
                                            $i++;
                                        ?>
                                            <tr>
                                                <th scope="row"><?php echo $i; ?></th>
                                                <td><?php echo $row['type']; ?></td>
                                                <td><a type="button" data-bs-toggle="modal" data-bs-target="#confirmDeleteTypeModal" href="deletetype.php?id=<?php echo $id_type ?>" class="btn btn-danger button-modal-type">Delete</a></td>


                                            </tr>
                                        <?php
                                        }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
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

    <!-- [[ Modal Add Cliente ]] -->

    <div class="modal fade modal-dialog modal-lg" id="addClienteModal" tabindex="-1" aria-labelledby="addClienteModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="addClienteModalLabel">Cadastrar cliente</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                    <form action="insertcliente.php" method="POST" enctype="multipart/form-data" class="mx-md-5">
                        <input type="hidden" name="id_orcamento" value=""></input>
                        <div class="form-group format mx-auto inputbox">
                            <div class=" ">
                                <input required type="text" class="form-control mx-auto" name="name_cliente" placeholder="Nome fantasia">
                            </div>
                        </div>

                        <div class="form-group format mx-auto inputbox">
                            <div class=" ">
                                <input required type="text" class="form-control  cliente-input-cnpj" name="cnpj" placeholder="CNPJ">
                            </div>
                        </div>

                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary ">Confirmar</button>
                            <button href="orcamento.php" type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- [[ End Modal Add Cliente ]]  -->

    <main class="container mt-5">
        <div class="bg-img" style="background-image: url('./img/orcamentobg.jpg');">
            <div class="overlay"></div>
        </div>


        <main>

            <!-- [[ Orcamentos Cards ]] -->

            <div>
                <form class="input-group" method="POST">
                    <input type="text" class="form-control mt-3" placeholder="Pesquisar orçamentos aprovados" name="search">

                    <button type="submit" href="estoque.php" class="btn btn-primary formatButtonSearch teste ml-1">Confirm</button>
                </form>
            </div>
        
        
            <?php while ($row = mysqli_fetch_assoc($orcamentos)) {
                $id_orcamento = $row['id_orcamento'];
                $name = $row['name'];
                $descricao = $row['descricao'];
                $product = $row['name_product'];
                $cliente = $row['cli_name'];
                $preco = $row['preco'];
                $status = $row['status'];

            ?>



                <?php if ($status == 0 && $preco != null) : ?>

                    <div class="card mb-3">
                        <div class="row g-0">
                            <div class="col-md-12">
                                <div class="card-body ">
                                    <div class="row ">
                                        <div class="mt-2 col btn-orcamento">
                                            <h5> <?php echo $name ?>
                                                <!-- Quantidade em estoque < ?php echo "$id_candidates" ?> -->

                                            </h5>
                                        </div>

                                        <div class="formatbtn ">
                                            <div class="text-right">
                                            <a type="button" title="Aprovado"><!--<img src="img/cross.png" class="btn-confirm-orcamento">--></a>
                                            </div>
                                        </div>


                                    </div>


                                    <hr class="">
                                    <div class="">


                                        <img src="img/down-arrow.png" type="button" class="dropdown-icon btn-orcamento btn-effect" data-bs-toggle="collapse" href="#verMais<?php echo $id_orcamento ?>" role="button" aria-expanded="false" aria-controls="#verMais" data-bs-toggle="dropdown" aria-expanded="false" data-bs-auto-close="outside" title="Ver mais...">
                                        <br>
                                        <br>
                                        <div class="collapse" id="verMais<?php echo $id_orcamento ?>">
                                            <div class="card card-body border border-danger">
                                                <div class="form-check">

                                                    <span class="fw-medium">Cliente: </span> <span class="fw-normal"> <?php echo "$cliente" ?> </span> <br>
                                                    <span class="fw-medium">Produto utilizado: </span> <span class="fw-normal"> <?php echo "$product" ?> </span> <br>
                                                    <span class="fw-medium">Preço: </span> <span class="fw-normal"> <?php echo "$preco" ?> </span> <br>
                                                    <hr class="">
                                                    <span class="fw-medium">Descrição orçamento: </span> <br><br> <span class="fw-normal"> <?php echo "$descricao" ?> </span><br>

                                                </div>
                                            </div>
                                        </div>

                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endif; ?>







            <?php
            }
            ?>




            <!-- [[ Paginação ]] -->

            <nav aria-label="Page navigation example">
                <ul class="pagination justify-content-end">
                    <li class="page-item disabled">
                        <a class="page-link">Previous</a>
                    </li>
                    <li class="page-item"><a class="page-link" href="#">1</a></li>
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
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>


    </script>
   

    <footer >
        <span class="text-footer"> © 2023 Allbytes Tecnologia. Todos os direitos reservados. </span>
    </footer>
        

</body>

</html>