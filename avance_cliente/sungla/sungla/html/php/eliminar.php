<?php
    include_once '../conexion.php'; //Conexion a BD

    if (!isset($conn) || !$conn instanceof mysqli || $conn->connect_error) {
        echo '<div class="alert alert-warning" role="alert">No hay conexión a la base de datos</div>';
    } else {
        sleep(1);
        $id_planes = $_POST["id_planes"];
        $borrarvideo = mysqli_query($conn, "DELETE FROM planes WHERE id_planes = $id_planes");
        if ($borrarvideo) {
            echo '<div class="alert alert-success" role="alert">Plan eliminado con el id: '. $id_planes .'</div>' ;
        } else {
            echo '<div class="alert alert-danger" role="alert">Error al eliminar el plan: ' , $conn->error ,'</div>' ;
        }
    }
?>
