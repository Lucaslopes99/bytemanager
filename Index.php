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

        <div class="container">
            <div class="row">
                <div class="col-sm" >
                    <div class="card menu-card view overlay zoom" >
                        <img class="card-img-top img-fluid menu-img-module" src="https://cdn-icons-png.flaticon.com/512/5166/5166970.png" alt="Card image cap">
                            <div class="card-body mask flex-center">
                                <h5 class="card-title">Estoque</h5>
                                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                <a href="estoque.php" class="btn btn-primary">Go somewhere</a>
                            </div>
                            
                            
                    </div>           
                </div> 

                <div class="col-sm" >
                    <div class="card menu-card">
                        <img class="card-img-top menu-img-module" src="https://cdn-icons-png.flaticon.com/512/2228/2228780.png" alt="Card image cap">
                            <div class="card-body">
                                <h5 class="card-title">Orçamentos</h5>
                                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                <a href="orcamento.php" class="btn btn-primary">Go somewhere</a>
                            </div>
                            
                    </div>
                </div> 

                

                <div class="col-sm" >
                    <div class="card menu-card">
                        <img class="card-img-top menu-img-module" src="https://cdn-icons-png.flaticon.com/512/1/1284.png" alt="Card image cap">
                            <div class="card-body">
                                <h5 class="card-title">Aprovações</h5>
                                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                <a href="aprovacao.php" class="btn btn-primary">Go somewhere</a>
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