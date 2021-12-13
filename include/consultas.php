<?php
	//Obtener todos los productos
	function get_productos(){
		require("conexion.php");
		$consulta = "SELECT * FROM $t_productos";
		/*salida en array*/
		$resultado = mysqli_query($mysqli, $consulta);
		$data = array();
		if($resultado){
		    while($r = $resultado->fetch_object()){
		        $data[] = $r;
		    }
		}
		return $data;
	}
	//Obtener los productos del carrito por usuario
	function get_car_id_user($idUser){
		require("conexion.php");
		$consulta = "SELECT * FROM $v_carrito WHERE id_usuario = $idUser";
		/*salida en array*/
		$resultado = mysqli_query($mysqli, $consulta);
		$data = array();
		if($resultado){
		    while($r = $resultado->fetch_object()){
		        $data[] = $r;
		    }
		}
		return $data;
	}
?>