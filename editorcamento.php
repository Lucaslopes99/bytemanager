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

    include "config.php";
    $id_orcamento = $_GET['id'] ?? '';
    $id_product = $_GET['id'] ?? '';

    $sqlGetAllOrcamentos = "SELECT DISTINCT orca.id_orcamento orca.name, orca.descricao, orca.preco, orca.product_id_product, orca.cliente_id_cliente, pro.id_product, pro.name_product
                                   pro.quantity, cli.id_cliente, cli.cli_name
        FROM orcamento AS orca 
        INNER JOIN product AS pro ON pro.id_product = orca.product_id_product
        INNER JOIN cliente AS cli ON cli.id_cliente = orca.cliente_id_cliente
        WHERE orca.id_orcamento = '$id_orcamento'";
    $orcamento = mysqli_query($conn, $sqlGetAllOrcamentos);



    $sqlClienteOrcamento = "SELECT * FROM cliente";
    $clientes = mysqli_query($conn, $sqlClienteOrcamento);

    $sqlProductOrcamento = "SELECT * FROM product";
    $products = mysqli_query($conn, $sqlProductOrcamento);

    $sqlEditOrcamentos = "SELECT * FROM orcamento WHERE id_orcamento = '$id_orcamento'";
    $orcamento = mysqli_query($conn, $sqlEditOrcamentos);
    $rowOrcamento = mysqli_fetch_assoc($orcamento);



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


    <main class="container">

        <div class="bg-img" style="background-image: url('./img/background.jpg');">
            <div class="overlay"></div>

        </div>

        <div class="card text-center add-estoque">


           
            <div class="card-body">
                <div class="p-2">
                    <h5 class="card-title">Orçamento</h5>
                    <a type="button" title="Orçar" data-bs-toggle="modal" href="" data-bs-target="#orcarModal"><img src="img/check.png" class="btn-confirm-orcamento btn-effect"></a>

                </div>
                



                <form action="updateorcamento.php" method="POST" enctype="multipart/form-data" class="mx-md-5">
                    <input type="hidden" name="id_orcamento" value="<?php echo $rowOrcamento['id_orcamento']; ?>">

                    <!-- Modal -->
                    <div class="modal fade" id="orcarModal" tabindex="-1" aria-labelledby="orcarModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="orcarModalLabel">Confirmar orçamento</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">

                                    <div class="form-group format mx-auto inputbox">
                                        <div class=" ">
                                            <input readonly type="text" class="form-control mx-auto" name="name" value="<?php echo $rowOrcamento['name']; ?>">                                           
                                        </div>
                                    </div>



                                    <div class="form-group format mx-auto inputbox">
                                        <div class="form-group format mx-auto inputbox">
                                            <select readonly="true" class="form-select form-select-md orcamento-input-add" aria-label=".form-select-sm example" name="id_cliente">
                                                <?php
                                                while ($row = mysqli_fetch_assoc($clientes)) :
                                                    $id_cliente = $row['id_cliente'];
                                                ?>

                                                    <?php if ($rowOrcamento['cliente_id_cliente'] == $id_cliente) : ?>
                                                        <option selected value="<?php echo $row['id_cliente']; ?>"><?php echo $row['cli_name'] ?> </option>

                                                    <?php endif; ?>

                                                <?php endwhile; ?>

                                            </select>
                                        </div>


                                        <div class="form-group format mx-auto inputbox">
                                            <select class="form-select form-select-md orcamento-input-add" aria-label=".form-select-sm example" name="id_product">
                                                <?php
                                                while ($row = mysqli_fetch_assoc($products)) :
                                                    $id_product = $row['id_product'];
                                                    $price = $row['price_product'];



                                                ?>

                                                    <?php if ($rowOrcamento['product_id_product'] == $id_product) : ?>
                                                        <option selected value="<?php echo $row['id_product']; ?>"><?php echo $row['name_product'] ?> </option>
                                                        <input required type="hidden" class="form-control mx-auto" name="quantity" required value="<?php echo $row['quantity']; ?>">
                                                        <input readonly type="text" class="form-control orcamento-input-price" name="priceProduct" value="<?php echo $row['price_product']; ?>">
                                                    <?php endif; ?>




                                                <?php endwhile; ?>

                                                <?php if ($rowOrcamento['product_id_product'] == null) : ?>
                                                    <input required type="text" class="form-control orcamento-input-price" name="preco" placeholder="Digite o preço">

                                                <?php endif; ?>

                                            </select>
                                        </div>

                                    </div>
                                    <div class="modal-footer">
                                        <button type="submit" class="btn btn-primary">Confirmar</button>
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-floating">
                        <textarea class="form-control" placeholder="Leave a comment here" id="floatingTextarea" name="descricao " value="<?php echo $rowOrcamento['descricao']; ?>"><?php echo $rowOrcamento['descricao']; ?></textarea>
                        <label for="floatingTextarea">Descrição</label>
                    </div>

                    <button type="submit" class="btn btn-primary mt-3 ">Enviar</button>
                    <a href="orcamento.php"><button type="button" class="btn btn-secondary mt-3 ml-3">Cancelar</button></a>

                </form>




            </div>
        </div>


        <!-- Importando o jQuery -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
        <!-- Importando o js do bootstrap -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>


        <!-- FOOTER

    <footer class="">
        <h6 class="text-footer"> © 2023 Allbytes Tecnologia. Todos os direitos reservados. </h6>
    </footer>
        
    -->

</body>

</html>