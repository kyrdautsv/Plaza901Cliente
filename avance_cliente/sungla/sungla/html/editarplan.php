<?php
include 'conexion.php';

$id_planes = $_GET['id_planes'];
?>
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
    <script src="js/jquery.min.js"></script>

    <script src="js/jquery-3.0.0.min.js"></script>

    <script>
        $(document).ready(function() {
            $('#actualizarform').submit(function(e) {
                e.preventDefault();
                document.getElementById("mensajeplanactualizar").innerHTML = "";
                var BtnActualizar = $("#BtnActualizar");
                $.ajax({
                    data: $('#actualizarform').serialize(),
                    url: 'php/actualizar.php',
                    type: 'post',
                    beforeSend: function() {
                        $("#BtnActualizar").text("Actualizando Plan...");
                    },
                    complete: function(data) {
                        var resp = data.responseText;
                        BtnActualizar.text("Actualizar Datos");
                    },
                    success: function(respuesta) {
                        setTimeout(function() {
                            document.getElementById('resultadoplanactualizar').style.display = 'none';
                            }, 2000);
                        document.getElementById('resultadoplanactualizar').style.display = 'block';
                        $('#mensajeplanactualizar').html(respuesta);
                    }
                });
            });
        });
    </script>
</head>
<!-- body -->
    <?php

        $sql = "SELECT * FROM planes WHERE id_planes=$id_planes";
        $resultado2 = $conn->query($sql);
        $planes2 = $resultado2->fetch_assoc();
    ?>
<body class="main-layout position_head">
    <!-- loader  -->
    <div class="loader_bg">
        <div class="loader"><img src="images/loading.gif" alt="#" /></div>
    </div>
    <!-- end loader -->
    <!-- header -->
    <?php include 'templates/barra.php';   ?>
    <!-- end header inner -->
    <!-- end header -->
    <!-- Our  Glasses section -->
    <div class="glasses">
        <div class="container mt-4">

            <div class="row justify-content-center">
                <div class="col-md-8">
                    <h1 class="text-center">Formulario de Editar Plan</h1>
                    <form id="actualizarform">
                        <div class="form-group">
                            <label for="tipo_plan">Tipo de Plan</label>
                            <input type="text" class="form-control" id="tipo_plan" name="tipo_plan" required value="<?php echo $planes2['tipo_plan'] ?>">
                        </div>
                        <div class="form-group">
                            <label for="precio">Precio</label>
                            <input type="number" class="form-control" id="precio" name="precio" required value="<?php echo $planes2['precio'] ?>">
                        </div>
                        <div class="form-group">
                            <label for="periodo">Periodo</label>
                            <input type="text" class="form-control" id="periodo" name="periodo" required value="<?php echo $planes2['periodo'] ?>">
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="descripcion_1">Descripción 1</label>
                                <textarea class="form-control" id="descripcion_1" name="descripcion_1" rows="3" required><?php echo $planes2['descripcion_1'] ?></textarea>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="descripcion_2">Descripción 2</label>
                                <textarea class="form-control" id="descripcion_2" name="descripcion_2" rows="3" required><?php echo $planes2['descripcion_2'] ?></textarea>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="descripcion_3">Descripción 3</label>
                                <textarea class="form-control" id="descripcion_3" name="descripcion_3" rows="3" required><?php echo $planes2['descripcion_3'] ?></textarea>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="descripcion_4">Descripción 4</label>
                                <textarea class="form-control" id="descripcion_4" name="descripcion_4" rows="3" required><?php echo $planes2['descripcion_4'] ?></textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="descripcion_5">Descripción 5</label>
                            <textarea class="form-control" id="descripcion_5" name="descripcion_5" rows="3" required><?php echo $planes2['descripcion_5'] ?></textarea>
                        </div>
                        <button type="submit" id="BtnActualizar" class="btn btn-primary btn-block">Actualizar Datos</button>

                        <input type="hidden" class="form-control" id="id" name="id" required value="<?php echo $planes2['id_planes'] ?>">

                        <!-- ALERTA -->
                        <div id="resultadoplanactualizar" style="display:none; margin-top:1rem;">
                            <div id="mensajeplanactualizar"></div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- end Our  Glasses section -->
    <!--  footer -->
    <footer>
        <div class="footer">
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
        </div>
    </footer>
    <!-- end footer -->
    <!-- Javascript files-->
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>
    <!-- sidebar -->
    <script src="js/jquery.mCustomScrollbar.concat.min.js"></script>
    <script src="js/custom.js"></script>
</body>

</html>