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

    </header>


    <main class="container">

        <div class="bg-img" style="background-image: url('./img/background.jpg');">
                <div class="overlay"></div>	
                <!-- <img src="" class="formatimg" alt="contest"> -->
                
        </div>
        
        <div class="card text-center add-estoque">
           

            <div class="card-body">
                <h5 class="card-title">Adicionar Item Ao Estoque</h5>
                
                <form action="register.php" method="POST" enctype="multipart/form-data" class="mx-md-5">
                    <input type="hidden" name="acao" value="cadastrar"></input>
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
                            <input required type="text" class="form-control mx-auto" name="quantity" placeholder="Quantidade produto">
                        </div>
                    </div>

                    <div class="form-group format mx-auto inputbox">
                        <!-- <label for="state" class="col-sm-2 col-form-label mx-auto"></label> -->
                        <div class="">
                            <select required type="text" class="form-control mx-auto" name="type">
                                <option selected>Item...</option disabled>
                                <option>Memória RAM</option>
                                <option>SSD</option>
                                <option>Outro</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group format mx-auto inputbox">
                        <label for="inputState" class=" col-form-label mx-auto">Foto Produto</label>
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
                    
                    <button type="submit" class="btn btn-primary mt-3">Confirmar</button>
                    <a href="estoque.php"><button type="button"  class="btn btn-primary mt-3 ml-3">Cancelar</button></a>
                </form>
            
            </div>
        </div>
        </div>
    </main>

        
    <!--Scripts-->

    <script src="js/jquery.slim.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>


    <div id="mapholder"></div>
    <script src="http://maps.google.com/maps/api/js?sensor=false"></script>
    <script>
        var x = document.getElementById("demo");
       

        function getLocation() {
            if (navigator.geolocation) {
                navigator.geolocation.getCurrentPosition(showPosition, showError);
            } else {
                x.innerHTML = "Geolocalização não é suportada nesse browser.";
            }
        }

        function showPosition(position) {
            lat = position.coords.latitude;
            lon = position.coords.longitude;
            document.getElementById("maplat").value = lat;
            document.getElementById("maplong").value = lon;

            latlon = new google.maps.LatLng(lat, lon)
            mapholder = document.getElementById('mapholder')
            mapholder.style.height = '250px';
            mapholder.style.width = '100%';
            

            var myOptions = {
                center: latlon,
                zoom: 14,
                mapTypeId: google.maps.MapTypeId.ROADMAP,
                mapTypeControl: false,
                navigationControlOptions: {
                    style: google.maps.NavigationControlStyle.SMALL
                }
            };
            var map = new google.maps.Map(document.getElementById("mapholder"), myOptions);
            var marker = new google.maps.Marker({
                position: latlon,
                map: map,
                title: "Você está Aqui!"
            });
        }
        getLocation();

        function showError(error) {
            switch (error.code) {
                case error.PERMISSION_DENIED:
                    x.innerHTML = "Usuário rejeitou a solicitação de Geolocalização."
                    break;
                case error.POSITION_UNAVAILABLE:
                    x.innerHTML = "Localização indisponível."
                    break;
                case error.TIMEOUT:
                    x.innerHTML = "O tempo da requisição expirou."

                    .innerHTML
                    break;
                case error.UNKNOWN_ERROR:
                    x.innerHTML = "Algum erro desconhecido aconteceu."
                    break;
            }
        }
    </script>

</body>

</html>