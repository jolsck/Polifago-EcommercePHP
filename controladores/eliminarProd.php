<?php
include("../include/conexion.php");
$result1 = 0;
$result2 = 0;
$id = $mysqli->real_escape_string($_POST['id']);

$consulta = "DELETE FROM $t_productos WHERE id = $id";
if ($resultado = mysqli_query($mysqli, $consulta)) {
			$result1=1;//consulta exitoso
		}else{
			$result1=0;//fallo la consulta
		}

$consulta = "DELETE FROM $t_carrito WHERE id_producto = $id";
if ($resultado = mysqli_query($mysqli, $consulta)) {
			$result2=1;//consulta exitoso
		}else{
			$result2=0;//fallo la consulta
		}

if ($result1 != 1 || $result2 !=1) {
	echo 2;
}else{
	echo 1;
}

?>