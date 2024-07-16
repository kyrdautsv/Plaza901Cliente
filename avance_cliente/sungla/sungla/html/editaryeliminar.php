<?php
include 'conexion.php';
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
        $(document).ready(function () {
            $(".borrar-boton").click(function () {
                var id_planes = $(this).data("user-id");

                // Crear la estructura de la alerta con HTML
                var customAlert = '<div class="custom-alert-container">';
                customAlert += '<div class="custom-alert">';
                customAlert += '<h2>¿Estás seguro que deseas eliminar este Producto?</h2>';
                customAlert += '<p>No se podrá revertir esta operación.</p>';
                customAlert += '<div class="button-container">';
                customAlert += '<button class="confirm-button">¡Sí, elimínalo!</button>';
                customAlert += '<button class="cancel-button">Cancelar</button>';
                customAlert += '</div></div></div>';

                // Agregar la alerta al cuerpo del documento
                $("body").append(customAlert);

                // Estilos CSS para la alerta
                var styles = '<style>';
                styles += '.custom-alert-container {position: fixed; top: 0; left: 0; width: 100%; height: 100%; background: rgba(0, 0, 0, 0.5); display: flex; justify-content: center; align-items: center;}';
                styles += '.custom-alert {background: #fff; border-radius: 8px; padding: 20px; box-shadow: 0 0 10px rgba(0, 0, 0, 0.2); text-align: center;}';
                styles += '.custom-alert h2 {margin-top: 0; font-size: 24px;}';
                styles += '.custom-alert p {margin-bottom: 20px;}';
                styles += '.button-container {display: flex; justify-content: center;}';
                styles += '.confirm-button, .cancel-button {padding: 10px 20px; margin: 0 10px; border: none; border-radius: 4px; cursor: pointer;}';
                styles += '.confirm-button {background: #f44336; color: #fff;}';
                styles += '.cancel-button {background: #ccc; color: #000;}';
                styles += '</style>';
                $("head").append(styles);

                // Agregar eventos a los botones de confirmación y cancelación
                $(".confirm-button").click(function () {
                    // Lógica para eliminar el usuario
                    $.ajax({
                        type: "POST",
                        url: "php/eliminar.php",
                        data: {
                            id_planes: id_planes
                        },
                        success: function (respuesta) {
                            $('#mensajeborrar').html(respuesta);
                            // Ocultar el producto eliminado
                            $('[data-user-id="' + id_planes + '"]').closest('.dato').hide();
                        }
                    });
                    // Limpiar la alerta personalizada
                    $(".custom-alert-container").remove();
                });

                $(".cancel-button").click(function () {
                    // Limpiar la alerta personalizada
                    $(".custom-alert-container").remove();
                });
            });
        });
    </script>
</head>
<!-- body -->

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
        <a href="agregar.php" class="btn btn-primary">Agregar Plan</a>
        <div id="mensajeborrar"></div>

            <table class="table" style="margin-top: 1px;">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th>Tipo de Plan</th>
                        <th>Precio Y periodo</th>
                        <th>Descripción</th>
                        <th>Acción</th>
                    </tr>
                </thead>
                <tbody>
                    <?php

                    $sql = "SELECT * FROM planes";
                    $resultado = $conn->query($sql);
                    while ($planes = $resultado->fetch_assoc()) {
                    ?>
                    <tr class="dato">
                        <th scope="row"><?php echo $planes['id_planes'] ?></th>
                        <td><?php echo $planes['tipo_plan'] ?></td>
                        <td><?php echo $planes['precio'] ?> / <?php echo $planes['periodo'] ?></td>
                        <td>
                            <li><?php echo $planes['descripcion_1'] ?></li>
                            <li><?php echo $planes['descripcion_2'] ?></li>
                            <li><?php echo $planes['descripcion_3'] ?></li>
                            <li><?php echo $planes['descripcion_4'] ?></li>
                            <li><?php echo $planes['descripcion_5'] ?></li>
                        </td>
                        <td>
                            <a class="borrar-boton btn btn-danger btn-sm" href="#" data-user-id="<?php echo $planes['id_planes'] ?>" data-tipo="admin">
                                Eliminar <i class="fas fa-trash"> </i>
                            </a>

                            <a href="editarplan.php?id_planes=<?php echo $planes['id_planes'] ?>" class="btn btn-success btn-sm">Editar plan</a>
                        </td>
                    </tr>
                    <?php } ?>
 
                </tbody>
            </table>
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