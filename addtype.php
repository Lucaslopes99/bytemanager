<?php phpversion() ?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <!--Bootstrap -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!--CSS-->
    <link rel="stylesheet" href="css/mycss.css">

</head>

<body>
    <!--HTMLCode-->
    <header>
    <nav id="" class="navbar bg-dark nav-color">
        <div class="mr-sm-2 mt-4 ">
            <a href="index.php"><img class="byte-img" src="img/byte.png" alt="..."></a>
            <a type="button" href="#" class="btn btn-primary my-2 my-sm-0 ml-5">Aprovações</a>



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
                <h5 class="card-title">Adicionar Tipo</h5>
                
                <form action="inserttype.php" method="POST" enctype="multipart/form-data" class="mx-md-5">
                    <input type="hidden" name="idtype" value="cadastrar"></input>              
                    <div class="form-group format mx-auto inputbox">
                        <!-- <label for="state" class="col-sm-2 col-form-label mx-auto"></label> -->
                        <div class="">
                            <input required type="text" class="form-control mx-auto" name="type" placeholder="Adicionar tipo"> 
                        </div>
                    </div>

                   
                    
                    <button type="submit" class="btn btn-primary mt-3">Confirmar</button>
                    <a href="estoque2.php"><button type="button"  class="btn btn-primary mt-3 ml-3">Cancelar</button></a>
                </form>
            
            </div>
        </div>
        </div>
    </main>

</body>

</html>