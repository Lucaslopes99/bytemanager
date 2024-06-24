<?php phpversion() ?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Byte Manager</title>
    <!--Bootstrap -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!--CSS-->
    <link rel="stylesheet" href="css/mycss.css">

</head>

<body>
    <!--HTMLCode-->


    <header>
    
        <div class="bg-img" style="background-image: url('./img/background.jpg');">
            <div class="overlay"></div>
        </div>

    </header>
    <nav class="navbar bg-body-tertiary">
        <div class="container-fluid">
            <a class="navbar-brand"></a>
            <form class="d-flex" role="search">
            <a href="login.php"><p class="navbar-brand logout">Sair</p></a> 
            <a href="login.php"><p class="navbar-brand logout">Sair</p></a> 
            </form>
        </div>
    </nav>

    <div class="container">
        <div class="row">
            <div class="col-sm">
                <div class="card menu-card view overlay zoom">
                    <img class="card-img-top img-fluid menu-img-module" src="https://cdn-icons-png.flaticon.com/512/5166/5166970.png" alt="Card image cap">
                    <div class="card-body mask flex-center">
                        <h5 class="card-title">Estoque</h5>
                        <p class="card-text">Estoque, quantidade e preço de produtos/serviços que podem ser utilizados em orçamentos. </p>
                        <a href="estoque2.php" class="btn btn-primary" title="Continuar para Estoque">Continuar</a>
                    </div>


                </div>
            </div>

            <div class="col-sm">
                <div class="card menu-card">
                    <img class="card-img-top menu-img-module" src="https://cdn-icons-png.flaticon.com/512/2228/2228780.png" alt="Card image cap">
                    <div class="card-body">
                        <h5 class="card-title">Orçamentos</h5>
                        <p class="card-text">Valor de produtos em estoque. Solicitação de orçamentos de produtos e serviços específicos.</p>
                        <a href="orcamento.php" class="btn btn-primary" title="Continuar para Orçamentos">Continuar</a>
                    </div>

                </div>
            </div>


            <div class="col-sm">
                <div class="card menu-card">
                    <img class="card-img-top menu-img-module" src="https://cdn-icons-png.flaticon.com/512/44/44562.png" alt="Card image cap">
                    <div class="card-body">
                        <h5 class="card-title">Clientes</h5>
                        <p class="card-text">Informações gerais de clientes. Produtos e serviços que possuem contratados conosco.</p>
                        <a href="cliente.php" class="btn btn-primary" title="Continuar para Clientes">Continuar</a>
                    </div>
                </div>
            </div>
        </div>

    </div>
    </div>

    <!--Scripts-->

    <script src="js/jquery.slim.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>


    </script>

</body>

</html>