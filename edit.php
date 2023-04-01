<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit candidate</title>
    <!--Bootstrap -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!--CSS-->
    <link rel="stylesheet" href="css/mycss.css">

</head>

<body>

    <?php

    include "config.php";
    $id = $_GET['id'] ?? '';


        $sql = "SELECT * FROM candidates WHERE id_candidates = '$id'";  
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($result);



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
                <!-- <img src="" class="formatimg" alt="contest"> -->
                
        </div>
        
        <div class="card text-center add-estoque">
           

            <div class="card-body">
                <h5 class="card-title">Adicionar Item Ao Estoque</h5>
                

                <form action="editestoque.php" method="POST" enctype="multipart/form-data" class="mx-md-5">
                    <input type="hidden" name="acao" value="cadastrar"></input>
                    <div class="form-group format mx-auto inputbox">
                        <!-- <label for="name" class="col-sm-2 col-form-label mx-auto"></label> -->
                        <div class=" ">
                        <input required type="text" class="form-control mx-auto" name="name" placeholder="Name" required value="<?php echo $row['name']; ?>">
                        </div>
                    </div>

                    <div class="form-group format mx-auto inputbox">
                        <!-- <label for="email" class="col-sm-2 col-form-label mx-auto"></label> -->
                        <div class="">
                            <input required type="email" class="form-control mx-auto" name="email" placeholder="Email" required value="<?php echo $row['email']; ?>">
                        </div>
                    </div>

                    <div class="form-group format mx-auto inputbox">
                        <!-- <label for="inputEmail3" class="col-sm-2 col-form-label mx-auto"></label> -->
                        <div class="">
                            <input required type="text" class="form-control mx-auto" name="number" placeholder="Phone Number" required value="<?php echo $row['number']; ?>">
                        </div>
                    </div>

                    <div class="form-group format mx-auto inputbox">
                        <!-- <label for="state" class="col-sm-2 col-form-label mx-auto"></label> -->
                        <div class="">
                        <select required class="form-control mx-auto" name="state" required value="<?php echo $row['state']; ?>">
                                <option selected>State...</option disabled>
                                <option>SP</option>
                                <option>RJ</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group format mx-auto inputbox">
                        <!-- <label for="city" class="col-sm-2 col-form-label mx-auto"></label> -->
                        <div class="">
                            <select required  class="form-control mx-auto" name="city" required value="<?php echo $row['city']; ?>">
                                <option selected>City...</option disabled>
                                <option>Presidente Prudente</option>
                                <option>Pirapózinho</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group format mx-auto inputbox">
                        <label for="inputState" class=" col-form-label mx-auto">Foto de perfil</label>
                        <div class="">
                            <input class="form-control" type="file" name="candidateimg" />

                        </div>
                    </div>

                    <div class="form-group format mx-auto inputbox">
                        <label for="inputState" class="col-form-label mx-auto">Foto computador</label>
                        <div class="">
                            <input class="form-control" type="file" name="computerimg" placeholder="asasas">

                        </div>
                    </div>

                    <div class="form-group row text-center format mx-auto inputbox">
                        <label for="inputState" class="col-sm-2 col-form-label mx-auto"></label>
                        <div class="col-sm-10">
                            <!-- <button type="button" onclick="getLocation()" class="form-control formattext" name="location">Geolocalização</button> -->
                        </div>
                    </div>
                    
                    <button type="submit" class="btn btn-primary mt-3">Salvar alterações</button>
                </form>

            </div>
        </div>
        </div>
    </main>


    <!--Scripts-->

    <script src="js/jquery.slim.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>



</body>

</html>