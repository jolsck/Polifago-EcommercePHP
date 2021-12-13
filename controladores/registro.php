<?php
	include("../include/conexion.php");
	$usuario = $mysqli->real_escape_string($_POST['usuario']);
	$pass = $mysqli->real_escape_string($_POST['pass']);

	$consulta = "SELECT * FROM $t_usuarios WHERE usuario = '" . $usuario . "'";
	$numrows = $mysqli->query($consulta);
	$row_cont = $numrows->num_rows; //1 coincidencias 0 no hay coincidencias
	if ($row_cont == 0) {
		$sql="INSERT INTO $t_usuarios (usuario,pass,rol) VALUES ('$usuario','$pass','normal')";
		if ($resultado = mysqli_query($mysqli, $sql)) {
			echo 1;//registro exitoso
		}else{
			echo 2;//fallo la insercion
		}
	}else{
		echo 3;//registro repetido
	} //if1
?>