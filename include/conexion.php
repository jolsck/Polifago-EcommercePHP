<?php
error_reporting(E_ALL);
ini_set('display_errors',1);


	$servidor = "localhost";
	$bd = "polifago";
	$usuario_db = "root";
	$pass_serv = "";


	//TABLAS
	$t_usuarios = "usuarios";
	$t_productos = "productos";
	$t_carrito = "carrito";
	$v_carrito = "v_carrito";

$mysqli = new mysqli($servidor,$usuario_db,$pass_serv,$bd);

	if ($mysqli->connect_errno) {
		echo "Falló la Conexión";
		return false;
	}//if conexion

//echo $mysqli->host_info . "\n";

?>