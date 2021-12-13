<?php	
	error_reporting(E_ALL);
 	ini_set('display_errors',1);
	include("../include/conexion.php");

	$id = $mysqli->real_escape_string($_POST['idProd']);
	$nombre = $mysqli->real_escape_string($_POST['nombreE']);
	$descripcion = $mysqli->real_escape_string($_POST['descripcionE']);
	$precio = $mysqli->real_escape_string($_POST['precioE']);


	 $archivo = $_FILES['archivoE']['name'];
	 if (isset($archivo) && $archivo != "") {
	 	 $tipo = $_FILES['archivoE']['type'];
	      $tamano = $_FILES['archivoE']['size'];
	      $temp = $_FILES['archivoE']['tmp_name'];
	      	if (    !(     (strpos($tipo, "gif") || strpos($tipo, "jpeg") || strpos($tipo, "jpg") || strpos($tipo, "png")    )  )     ) {
	      		echo '<div><b>Error. La extensión o el tamaño de los archivos no es correcta.<br/>
	      		- Se permiten archivos .gif, .jpg, .png. y de 200 kb como máximo.</b></div>';
			}
	    else {
	        //Si la imagen es correcta en tamaño y tipo
	        //Se intenta subir al servidor
			if (move_uploaded_file($temp, '../img/'.$archivo)) {
	            //Mostramos el mensaje de que se ha subido co éxito
	            //echo '<div><b>Se ha subido correctamente la imagen.</b></div>';
	            //Mostramos la imagen subida
	            //echo '<p><img style="height: 340px;" src="../img/'.$archivo.'"></p>';
	            header("Location:../admin.php");
	        }
	        else {
	           //Si no se ha podido subir la imagen, mostramos un mensaje de error
	           echo '<div><b>Ocurrió algún error al subir el fichero. No pudo guardarse.</b></div>';
	        }
	    }
	}else{
		$archivo = "null";
	}


//echo $id." ".$nombre." ".$descripcion." ".$precio." ".$archivo;
			
		if ($archivo != "null") {
			$consulta = "UPDATE $t_productos SET nombre = '$nombre', descripcion = '$descripcion', precio = $precio, urlimg = '$archivo' WHERE id = $id";
			$resultado = mysqli_query($mysqli, $consulta);
			var_dump($consulta);
		}else{
			$consulta = "UPDATE $t_productos SET nombre = '$nombre', descripcion = '$descripcion', precio = $precio WHERE id = $id";
			$resultado = mysqli_query($mysqli, $consulta);
			var_dump($consulta);
		}


	header("Location:../admin.php");


?>