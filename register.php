<!DOCTYPE html>
<html lang="en">

<head>
    <!-- basic -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- mobile metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="viewport" content="initial-scale=1, maximum-scale=1">
    <!-- site metas -->
    <title>sungla</title>
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="author" content="">

    <!--CDN Style-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <!-- bootstrap css -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- style css -->
    <link rel="stylesheet" href="css/style.css">
    <!-- Responsive-->
    <link rel="stylesheet" href="css/responsive.css">
    <!-- fevicon -->
    <link rel="icon" href="images/fevicon.png" type="image/gif" />
    <!-- Scrollbar Custom CSS -->
    <link rel="stylesheet" href="css/jquery.mCustomScrollbar.min.css">
    <!-- Tweaks for older IEs-->
    <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.css"
        media="screen">
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->

    <link rel="stylesheet" href="./css/register.css">
</head>
<!-- body -->

<body class="main-layout">
    <!-- loader  -->
    <div class="loader_bg">
        <div class="loader"><img src="images/loading.gif" alt="#" /></div>
    </div>
    <!-- end loader -->
    <!-- header -->
    <header>
        <?php
        include 'nav.php';
        ?>
    </header>
    <!-- end header inner -->
    <!-- end header -->
    <section>
        <div class="container py-5">
            <div class="row d-flex justify-content-center align-items-center"
                style="margin-top: 15%; margin-bottom: 5%;">
                <div class="col">
                    <div class="card card-registration my-4">
                        <div class="row g-0">
                            <div class="col-xl-6 d-none d-xl-block">
                                <img src="./images/centro-comercial2.jpg" alt="Sample photo" class="img-fluid"
                                    style="border-radius: 1rem 1rem 1rem 1rem;" />
                            </div>
                            <div class="col-xl-6">

                                <form action="">
                                    <div class="card-body p-md-5 text-black">
                                        <h1 class="mb-5 text-uppercase fw-bold">Registro PlazaUTSV</h1>

                                        <div class="row">

                                            <div class="col-md-6 mb-4">
                                                <div class="form-floating form-outline">
                                                    <input type="text" class="form-control" id="nombre"
                                                        placeholder="nombre" required>
                                                    <label for="nombre">Nombre</label>
                                                </div>
                                            </div>

                                            <div class="col-md-6 mb-4">
                                                <div class="form-floating form-outline">
                                                    <input type="text" class="form-control" id="edad" placeholder="edad"
                                                        required>
                                                    <label for="edad">Edad</label>
                                                </div>
                                            </div>

                                        </div>

                                        <div class="row">

                                            <div class="col-md-6 mb-4">
                                                <div class="form-floating form-outline">
                                                    <input type="text" class="form-control" id="apellidoPaterno"
                                                        placeholder="apellidoPaterno" required>
                                                    <label for="apellidoPaterno">Apellido Paterno</label>
                                                </div>
                                            </div>

                                            <div class="col-md-6 mb-4">
                                                <div class="form-floating form-outline">
                                                    <input type="text" class="form-control" id="apellidoMaterno"
                                                        placeholder="apellidoMaterno" required>
                                                    <label for="apellidoMaterno">Apellido Materno</label>
                                                </div>
                                            </div>

                                        </div>

                                        <div class="mb-4">
                                            <div class="form-floating form-outline">
                                                <input type="text" class="form-control" id="telefono"
                                                    placeholder="telefono" required>
                                                <label for="telefono">Telefono</label>
                                            </div>
                                        </div>

                                        <div class="d-md-flex justify-content-start align-items-center mb-4 py-2">

                                            <h4 class="mb-0 me-5">Genero:</h4>

                                            <div class="form-check form-check-inline mb-2 me-5">
                                                <input class="form-check-input" type="radio" name="flexRadioDefault"
                                                    id="mujer">
                                                <label class="form-check-label" for="mujer">Mujer</label>
                                            </div>

                                            <div class="form-check form-check-inline mb-2 me-5">
                                                <input class="form-check-input" type="radio" name="flexRadioDefault"
                                                    id="hombre" checked>
                                                <label class="form-check-label" for="hombre">Hombre</label>
                                            </div>

                                            <div class="form-check form-check-inline mb-2">
                                                <input class="form-check-input" type="radio" name="flexRadioDefault"
                                                    id="otro" checked>
                                                <label class="form-check-label" for="otro">Otro</label>
                                            </div>

                                        </div>

                                        <div class="row">
                                            <div class="mb-4">

                                                <select class="form-select" aria-label="Default select example">
                                                    <option selected>Tipo De Usuario</option>
                                                    <option value="1">Cliente</option>
                                                    <option value="2">Empresario</option>
                                                </select>

                                            </div>
                                        </div>

                                        <div class="mb-4">
                                            <div class="form-floating form-outline">
                                                <input type="text" class="form-control" id="correo" placeholder="correo"
                                                    required>
                                                <label for="correo">Correo</label>
                                            </div>
                                        </div>

                                        <div class="mb-4">
                                            <div class="form-floating form-outline">
                                                <input type="password" class="form-control" id="pass01"
                                                    placeholder="pass01" required>
                                                <label for="pass01">Contraseña</label>
                                            </div>
                                        </div>

                                        <div class="mb-4">
                                            <div class="form-floating form-outline">
                                                <input type="password" class="form-control" id="pass02"
                                                    placeholder="pass02" required>
                                                <label for="pass02">Confirmar Contraseña</label>
                                            </div>
                                        </div>

                                        <div class="d-flex justify-content-end pt-3">
                                            <button type="reset" data-mdb-button-init data-mdb-ripple-init
                                                class="btn btn-light btn-lg"
                                                style="margin-right: 10px;">Deshacer</button>
                                            <button type="submit" data-mdb-button-init data-mdb-ripple-init
                                                class="btn btn-warning btn-lg ms-2">Registrarse</button>
                                        </div>

                                    </div>
                                </form>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--  footer -->
    <footer>
        <div class="footer">
            <div class="container">
                <div class="row">
                    <div class="col-md-8 offset-md-2">
                        <ul class="location_icon">
                            <li><a href="#"><i class="fa fa-map-marker" aria-hidden="true"></i></a><br> Location</li>
                            <li><a href="#"><i class="fa fa-phone" aria-hidden="true"></i></a><br> +01 1234567890</li>
                            <li><a href="#"><i class="fa fa-envelope" aria-hidden="true"></i></a><br> demo@gmail.com
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="copyright">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <p>© 2019 All Rights Reserved. Design by<a href="https://html.design/"> Free Html
                                    Templates</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- end footer -->
    <!-- Javascript files-->
    <script src="js/jquery.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="js/jquery-3.0.0.min.js"></script>
    <!-- sidebar -->
    <script src="js/jquery.mCustomScrollbar.concat.min.js"></script>
    <script src="js/custom.js"></script>
    <script>
        // This example adds a marker to indicate the position of Bondi Beach in Sydney,
        // Australia.
        function initMap() {
            var map = new google.maps.Map(document.getElementById('map'), {
                zoom: 11,
                center: { lat: 40.645037, lng: -73.880224 },
            });

            var image = 'images/maps-and-flags.png';
            var beachMarker = new google.maps.Marker({
                position: { lat: 40.645037, lng: -73.880224 },
                map: map,
                icon: image
            });
        }
    </script>
    <!-- google map js -->
    <script
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA8eaHt9Dh5H57Zh0xVTqxVdBFCvFMqFjQ&callback=initMap"></script>
    <!-- end google map js -->

    <!--CDN JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
</body>

</html>