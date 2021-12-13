<?php
include("../include/conexion.php");
$idProd = $mysqli->real_escape_string($_POST['idProd']);
$idUser = $mysqli->real_escape_string($_POST['idUser']);

$consulta = "DELETE FROM $t_carrito WHERE id_producto = $idProd AND id_usuario = $idUser";
if ($resultado = mysqli_query($mysqli, $consulta)) {
			echo 1;//consulta exitoso
		}else{
			echo 2;//fallo la consulta
		}
?>