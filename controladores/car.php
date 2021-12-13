<?php
	include("../include/conexion.php");
	$idProd = $mysqli->real_escape_string($_POST['idProd']);
	$idUsuario = $mysqli->real_escape_string($_POST['idUser']);

	$sql="INSERT INTO $t_carrito (id_usuario,id_producto,estatus) VALUES ($idProd,$idUsuario,'carrito')";
	if ($resultado = mysqli_query($mysqli, $sql)) {
		echo 1;//registro exitoso
	}else{
		echo 2;//fallo la insercion
	}
?>