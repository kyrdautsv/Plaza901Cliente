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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.css" media="screen">
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->
    <style>
        body {
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }

        .content {
            flex: 1;
        }

        .registro {
            background-color: #ffffff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px #ffffff;
            max-width: 500px;
            width: 100%;
            margin: 0 auto;
            /* Centra horizontalmente */
            display: flex;
            justify-content: center;
            /* Centra horizontalmente */
        }
        

        .main_form {
            width: 100%;
            /* Asegura que el formulario ocupe todo el ancho del contenedor */
        }

        .main_form {
            margin: 0 auto;
            /* Centra horizontalmente */
            max-width: 600px;
            /* Ajusta el ancho máximo */
            width: 200%;
            /* Asegura que el formulario ocupe todo el ancho disponible */
            padding: 20px;
            /* Ajusta el relleno para que el formulario se vea más ancho */
        }


    </style>
</head>
<!-- body -->

<body class="main-layout position_head">
    <!-- loader  -->
    <div class="loader_bg">
        <div class="loader"><img src="images/loading.gif" alt="#" /></div>
    </div>
    <!-- end loader -->
    <!-- header -->
    <header>
        <?php include 'nav.php'; ?>
    </header>
    <!-- end header inner -->
    <!-- end header -->
    <!-- register section -->
    <div class="content">
        <div id="registro" class="registro">
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                    <form id="request" class="main_form" onsubmit="showModal(event)">
                            <div class="row">
                                <div class="col-md-12 ">
                                    <h3>Registro De Emprendedor</h3>
                                </div>
                                <div class="col-md-12 ">
                                    <input class="registro" placeholder="Nombre del Negocio" type="type" name="Name">
                                </div>
                                <div class="col-md-12">
                                    <input class="registro" placeholder="Numero de Teléfono" type="type" name="Phone Number">
                                </div>
                                <div class="col-md-12">
                                    <input class="registro" placeholder="Descripción" type="type" name="Descripcion">
                                </div>
                                <div class="col-md-12">
                                    <input class="registro" placeholder="Ubicación" type="type" name="Ubicacion">
                                </div>
                                <div class="col-md-12">
                                <button class="send_btn" type="submit">Registrar</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end register section -->
        <!-- Modal -->
        <div class="modal fade" id="successModal" tabindex="-1" role="dialog" aria-labelledby="successModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="successModalLabel">Registro Exitoso</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body" id="successModalBody">
                    <!-- El mensaje de éxito se insertará aquí -->
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-dismiss="modal">Cerrar</button>
                </div>
            </div>
        </div>
    </div>
    <!-- footer -->
    <footer class="footer">
        <div class="container">
            <div class="row">
                <div class="col-md-8 offset-md-2">
                    <ul class="location_icon">
                        <li><a href="#"><i class="fa fa-map-marker" aria-hidden="true"></i></a><br> Location</li>
                        <li><a href="#"><i class="fa fa-phone" aria-hidden="true"></i></a><br> +01 1234567890</li>
                        <li><a href="#"><i class="fa fa-envelope" aria-hidden="true"></i></a><br> demo@gmail.com</li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="copyright">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <p>© 2019 All Rights Reserved. Design by<a href="https://html.design/"> Free Html Templates</a></p>
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
        function showModal(event) {
            event.preventDefault(); // Prevenir el envío del formulario

            // Obtener el nombre del negocio
            var nombreNegocio = document.querySelector('input[name="Name"]').value;

            // Insertar el mensaje en el cuerpo del modal
            document.getElementById('successModalBody').textContent = 'Felicidades ' + nombreNegocio + ', has sido registrado con éxito';

            // Mostrar el modal
            $('#successModal').modal('show');
        }
    </script>
</body>

</html>