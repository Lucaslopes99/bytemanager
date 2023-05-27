<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Clientes </title>
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


    // List clientes  INNER JOIN orcamento AS orca ON orca.cliente_id_cliente = cli.id_cliente 
    
    $sqlGetAllClientes = "SELECT * 
        FROM cliente AS cli 
        WHERE cli_name LIKE '%$search%'";
    $clientes = mysqli_query($conn, $sqlGetAllClientes);

    // List all products on add orcamento page
    $sqlGetAllProducts = "SELECT * FROM product ";
    $productOrcamentos = mysqli_query($conn, $sqlGetAllProducts);

    // List all types on add product page
    $sqlGetAllProductTypes = "SELECT * FROM type_product ";
    $productTypes = mysqli_query($conn, $sqlGetAllProductTypes);

    // List all types on add type from edit page
    $sqlShowAllTypes = "SELECT * FROM type_product";
    $sqlAllTypes = mysqli_query($conn, $sqlShowAllTypes);

    ?>

    <!--- NAV BAR-->

    <header>
        <nav id="" class="navbar bg- nav-color">
            <div class="mr-sm-2 mt-2 ">
                <a href="index.php"><img class="byte-img" src="img/byte.png" alt="..."></a>
                <a type="button" href="estoque2.php" class="btn btn-outline-info my-2 my-sm-0 ml-5">Estoque</a>

                <div class="btn-group ml-3">
                    <button type="button" class="btn btn-outline-info  dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                        Orçamentos
                    </button>
                    <ul class="dropdown-menu dropdown-menu">
                        <li><a class="dropdown-item" href="orcamento.php">Aguardando</a></li>
                        <li><a class="dropdown-item" href="orcado.php">Orçados</a></li>
                        <li><a class="dropdown-item" href="orcamento.php">Aprovados</a></li>
                    </ul>

                </div>
                <a type="button" href="cliente.php" class="btn btn-outline-info  my-2 my-sm-0 ml-3">Clientes</a>
            </div>
        </nav>
    </header>



    <a data-bs-toggle="modal" data-bs-target="#addClienteModal"><img src="img/addestoque.png" class="add-icon-estoque"> </a>

    <!-- Modal Add Cliente -->

    <div class="modal fade modal-dialog modal-lg" id="addClienteModal" tabindex="-1" aria-labelledby="addClienteModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="addClienteodalLabel">Cadastrar cliente</h1>
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

    <!-- END Modal Add Cliente-->

    <main class="container mt-5">
        <div class="bg-img" style="background-image: url('./img/clientebg.jpg');">
            <div class="overlay"></div>
        </div>

        <main>

            <!-- Clientes Table -->

            <div>
                <form class="input-group" method="POST">
                    <input type="text" class="form-control mt-3" placeholder="Pesquisar em aguardando orçamento" name="search">
                    <button type="submit" href="estoque.php" class="btn btn-primary formatButtonSearch teste ml-1">Confirm</button>
                </form>
            </div>


            <?php ?>


            <div class="card mb-3">

                <table class="table">
                    <thead class="table-dark">
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Cliente</th>
                            <th scope="col">CNPJ</th>
                            <th scope="col">Telefone</th>
                            <th scope="col">Operação</th>
                        </tr>                   
                    </thead>
                    <?php 
                    
                    $i = 0;
                    while ($row = mysqli_fetch_assoc($clientes)) {
                        $i++;
                            $id_cliente = $row['id_cliente'];
                            $cli_name = $row['cli_name'];
                            $cnpj = $row['cnpj'];
                            //$orcamento = $row['cliente_id_cliente'];

                        ?>

                    <tbody>
                        <tr>                           
                            <td><?php echo $i ?></td>
                            <td><?php echo $cli_name ?></td>
                            <td><?php echo $cnpj ?></td>    
                            <td>(18) 3221-5526</td>                       
                            <td>
                                <a type="button" title="Editar cliente" href="editcliente.php?id=<?php echo $id_cliente ?>"><img src="img/edit.png" class="edit-icon"> </a>
                                <a type="button" class="delete-icon" title="Deletar cliente" data-bs-toggle="modal" data-bs-target="#confirmDeleteClienteModal" href="editcliente.php?id=<?php echo $id_cliente ?>"><img src="img/delete.png" class="delete-icon"> </a>
                            </td>
                            
                        </tr>

                    </tbody>
                     <?php
                        }
                     ?>
                </table>
            </div>

            <!-- Paginação -->

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

            <!-- Modal Confirm Delete Cliente-->
            <div class="modal fade" id="confirmDeleteClienteModal" tabindex="-1" aria-labelledby="confirmDeleteClienteModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="confirmDeleteClienteModalLabel">Excluir Cliente</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <h3 class="modal-title fs-6">Deseja Excluir Esse Registro? </h3>
                            <!-- POP UP SIMPLES <a href="excluir.php" onclick="return confirm('Deseja excluir esse registro ?')">Excluir</a> -->
                        </div>

                        <div class="modal-footer">
                            <a type="button" href="deletecliente.php?id=<?php echo $id_cliente ?>" class="btn btn-primary button-modal-type">Confirmar</a></td>
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                        </div>
                       
                    </div>
                </div>
            </div>

        </main>
    </main>


    <!-- Importação do jQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

    <!-- Importação do js do bootstrap -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>

    

    <footer class="">
        <h6 class="text-footer"> © 2023 Allbytes Tecnologia. Todos os direitos reservados. </h6>
    </footer>
        
    

</body>

</html>