<?php
include '../conexion.php';
    sleep(1);

    // Recoger los datos del formulario
    $tipo_plan = $_POST['tipo_plan'];
    $precio = $_POST['precio'];
    $periodo = $_POST['periodo'];
    $descripcion_1 = $_POST['descripcion_1'];
    $descripcion_2 = $_POST['descripcion_2'];
    $descripcion_3 = $_POST['descripcion_3'];
    $descripcion_4 = $_POST['descripcion_4'];
    $descripcion_5 = $_POST['descripcion_5'];

    // Validar los datos (puedes agregar más validaciones según necesites)
    if (!empty($tipo_plan) && !empty($precio) && !empty($periodo) && !empty($descripcion_1) && !empty($descripcion_2) && !empty($descripcion_3) && !empty($descripcion_4) && !empty($descripcion_5)) {
                // Preparar la sentencia SQL
                $sql = "INSERT INTO planes (tipo_plan, precio, periodo, descripcion_1, descripcion_2, descripcion_3, descripcion_4, descripcion_5) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";

                // Preparar y vincular
                $stmt = $conn->prepare($sql);
                $stmt->bind_param("ssssssss", $tipo_plan, $precio, $periodo, $descripcion_1, $descripcion_2, $descripcion_3, $descripcion_4, $descripcion_5);
        
                // Ejecutar la consulta
                if ($stmt->execute()) {
                    echo "Nuevo registro creado exitosamente";
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