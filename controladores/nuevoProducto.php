<?php
	include("../include/conexion.php");

	$nombre = $mysqli->real_escape_string($_POST['nombre']);
	$descripcion = $mysqli->real_escape_string($_POST['descripcion']);
	$precio = $mysqli->real_escape_string($_POST['precio']);


 $archivo = $_FILES['archivo']['name'];
 if (isset($archivo) && $archivo != "") {
 	 $tipo = $_FILES['archivo']['type'];
      $tamano = $_FILES['archivo']['size'];
      $temp = $_FILES['archivo']['tmp_name'];
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
   }

	$consulta = "SELECT * FROM $t_productos WHERE nombre = '" . $nombre . "'";
	$numrows = $mysqli->query($consulta);
	$row_cont = $numrows->num_rows; //1 coincidencias 0 no hay coincidencias
	if ($row_cont == 0) {
		$sql="INSERT INTO $t_productos (nombre,descripcion,precio,urlimg) VALUES ('$nombre','$descripcion',$precio,'$archivo')";
		if ($resultado = mysqli_query($mysqli, $sql)) {
			echo 1;//registro exitoso
		}else{
			echo 2;//fallo la insercion
		}
	}else{
		echo 3;//registro repetido
	} //if1

?>