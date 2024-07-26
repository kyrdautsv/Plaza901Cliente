<?php

    $servidor = 'localhost';
    $usuario = 'root';
    $contrasena = '1234';
    $bd = 'sungla';
    $conn = new mysqli($servidor, $usuario, $contrasena, $bd);
    
    if($conn->connect_error){
        echo $error -> $conn->connect_error;
    }

    
?>