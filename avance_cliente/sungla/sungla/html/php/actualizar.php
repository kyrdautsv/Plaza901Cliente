<?php
include '../conexion.php';
sleep(1);

// Recoger los datos del formulario
$id = $_POST['id'];  // Suponiendo que estás recibiendo el ID del plan a actualizar
$tipo_plan = $_POST['tipo_plan'];
$precio = $_POST['precio'];
$periodo = $_POST['periodo'];
$descripcion_1 = $_POST['descripcion_1'];
$descripcion_2 = $_POST['descripcion_2'];
$descripcion_3 = $_POST['descripcion_3'];
$descripcion_4 = $_POST['descripcion_4'];
$descripcion_5 = $_POST['descripcion_5'];

// Validar los datos (puedes agregar más validaciones según necesites)
if (!empty($id) && !empty($tipo_plan) && !empty($precio) && !empty($periodo) && !empty($descripcion_1) && !empty($descripcion_2) && !empty($descripcion_3) && !empty($descripcion_4) && !empty($descripcion_5)) {
    // Preparar la sentencia SQL para actualizar
    $sql = "UPDATE planes SET tipo_plan = ?, precio = ?, periodo = ?, descripcion_1 = ?, descripcion_2 = ?, descripcion_3 = ?, descripcion_4 = ?, descripcion_5 = ? WHERE id_planes = ?";

    // Preparar y vincular
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssssssss", $tipo_plan, $precio, $periodo, $descripcion_1, $descripcion_2, $descripcion_3, $descripcion_4, $descripcion_5, $id);

    // Ejecutar la consulta
    if ($stmt->execute()) {
        echo '<div class="alert alert-success" role="alert">Registro actualizado exitosamente</div>';
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    // Cerrar la conexión
    $stmt->close();
    $conn->close();

} else {
    echo "Por favor, completa todos los campos.";
}
?>
