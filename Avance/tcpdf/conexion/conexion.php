<?php
	//$mysqli=new mysqli("kyrda.com.mx","kyrda_admin","kyrda2020","kyrda_utsv2022"); 
	$mysqli=new mysqli("localhost","root","1234","sigu4");
	//servidor, usuario de base de datos, contraseña del usuario, nombre de base de datos
	
	if(mysqli_connect_errno()){
		echo 'Conexion Fallida : ', mysqli_connect_error();
		exit();
	}
	$acentos = $mysqli->query("SET NAMES 'utf8'")
?>