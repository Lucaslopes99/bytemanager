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
    $id_cliente = $_GET['id'] ?? '';;


    // Get each atribute from products on edit page
    $sqlGetClientes = "SELECT * FROM cliente WHERE id_cliente = '$id_cliente'";
    $clientes = mysqli_query($conn, $sqlGetClientes);
    $rowCliente = mysqli_fetch_assoc($clientes);

    ?>

    <!--HTMLCode-->
    
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


            <div class="card-body  ">
                <h5 class="card-title">Editar cliente</h5>

                


                <form action="updatecliente.php" method="POST" enctype="multipart/form-data" class="mx-md-5">
                    <input type="hidden" name="id_cliente" value="<?php echo $rowCliente['id_cliente']; ?>">
                    <div class="form-group format mx-auto inputbox">
                        <div class=" ">
                        <label for="inputState" class=" form-label fw-medium" >Cliente</label>
                            <input required type="text" class="form-control mx-auto" name="cli_name" placeholder="Nome cliente" required value="<?php echo $rowCliente['cli_name']; ?>">
                        </div>
                    </div>
                    

                    <div class="form-group format mx-auto inputbox">
                        <div class="">
                        <label for="inputState" class=" form-label fw-medium" >CNPJ</label>
                            <input required type="text" class="form-control mx-auto" name="cnpj" placeholder="CNPJ" required value="<?php echo $rowCliente['cnpj']; ?>">
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary ">Confirmar</button>
                        <a href="cliente.php"><button type="button" class="btn btn-secondary">Cancelar</button></a>
                    </div>



                </form>

            </div>
        </div>


    </main>


    <!-- Importando o jQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

    <!-- Importando o js do bootstrap -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>



    <footer class="">
        <h6 class="text-footer"> © 2023 Allbytes Tecnologia. Todos os direitos reservados. </h6>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</body>

</html>