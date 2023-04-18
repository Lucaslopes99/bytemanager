<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Estoque </title>
    <!--Bootstrap -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
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
  

    //$sql = "SELECT * FROM product WHERE name_product LIKE '%$search%'";
    $sql = "SELECT * 
    FROM product AS pro
    INNER JOIN type_product AS tp ON tp.id_type = pro.type_product_id_type
    WHERE pro.name_product LIKE '%$search%'";


   

    // var_dump($search);
    // exit();

    $result = mysqli_query($conn, $sql);

    ?>

    <!---codigo html-->

    <header>
    <nav id="" class="navbar bg-dark nav-color">
        <div class="mr-sm-2 mt-4 ">
            <a href="index.php"><img class="byte-img" src="img/byte.png" alt="..."></a>
            <a type="button" href="#" class="btn btn-primary my-2 my-sm-0 ml-5">Aprovações</a>



        </div>


    </nav>
    </header>
    


    
        <div class="col-sm-12">
                <a href="addestoque.php"><img src="img/addestoque.png" class="add-icon-estoque"> </a>

                


        </div>


   
    

    <main class="container mt-5">
        <div class="bg-img" style="background-image: url('./img/background.jpg');">


            <div class="overlay"></div>
            <!-- <img src="" class="formatimg" alt="contest"> -->
        </div>






        <main>


            <div>

                <form class="input-group" method="POST">
                    <input type="text" class="form-control mt-3" placeholder="Pesquisar Em Estoque" name="search">
                    <button type="submit" href="estoque.php" class="btn btn-primary formatpc teste">Confirm</button>
                    


                </form>

            </div>

            <?php ?>
            <?php while ($row = mysqli_fetch_assoc($result)) {
                $id_product = $row['id_product'];
                $name_product = $row['name_product'];
                $price_product = $row['price_product'];
                $quantity = $row['quantity'];
                $type = $row['type'];  
    


            ?>



                <div class="card mb-3">
                    <div class="row g-0">
                        <div class="col-md-4">


                            <img class="formatavatar" src="candidates_img/<?php echo "$id_product" ?>.jpg" class="img-fluid rounded-start" alt="Product">



                        </div>


                        <div class="col-md-8">
                            <div class="card-body">
                                <div class="row ">

                                    <div class="card-title formatid">
                                        <h5> <?php echo "$name_product" ?>
                                            <!-- Quantidade em estoque < ?php echo "$id_candidates" ?> -->


                                        </h5>
                                    </div>



                                    <div class="formatbtn mr-sm-2">

                                        <div class="">
                                            <a type="button" href="edit.php?id=<?php echo $id_product ?>" class="btn btn-success">Edit</a>
                                            <a type="button" href="delete.php?id=<?php echo $id_product ?>" class="btn btn-danger ">Delete</a>



                                        </div>
                                    </div>


                                </div>
                                <hr class="">
                                <span>Tipo: <?php echo "$type" ?> </span> <br>
                                <span>Quantidade: <?php echo "$quantity" ?> </span> <br>
                                <span>Preço: R$ <?php echo "$price_product" ?> </span> <br>
                                
                            
                            </div>



                        </div>




                    </div>



                </div>

            <?php
            }
            ?>



            

        </main>





        </div>
    </main>

    


    <footer class="bg-dark text-center text-white">
        <!-- Grid container -->
        <!-- Grid container -->

    
    </footer>


</body>

</html>

