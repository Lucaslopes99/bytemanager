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






    <!--CSS-->
    <link rel="stylesheet" href="css/mycss.css">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>


</head>

<body>
    <!--HTMLCode-->


    <header>

        <div class="bg-img" style="background-image: url('./img/login-wpp.png');">
            <div class="overlay"></div>
        </div>

    </header>

    <form action="Index.php">
    <br>
    <br>
    <br>
    <br>
    <section class="vh-100 gradient-custom ">
        <div class="container py-5 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                    <div class="card bg-white text-dark" style="border-radius: 1rem;">
                        <div class="card-body p-5 text-center">

                            <div class="mb-md-5 mt-md-4">

                                <h2 class="fw-bold mb-2 text-uppercase">Login</h2>
                                <p class="text-dark-50 mb-5">Por favor faça Login para utilizar o sistema ALLBYTES!</p>

                                <div data-mdb-input-init class="form-outline form-dark mb-4">
                                    <input type="email" id="typeEmailX" class="form-control form-control-lg" placeholder="Login" />

                                </div>

                                <div data-mdb-input-init class="form-outline form-dark mb-4">
                                    <input type="password" id="typePasswordX" class="form-control form-control-lg" placeholder="Senha" />

                                </div>

                                

                                <button data-mdb-button-init data-mdb-ripple-init class="btn btn-outline-dark btn-lg px-5" type="submit">Login</button>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    </form>




    <!--Scripts-->

    <script src="js/jquery.slim.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>


</body>

</html>