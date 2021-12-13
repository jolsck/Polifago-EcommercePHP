<?php
	error_reporting(E_ALL);
 	ini_set('display_errors',1);
	include("../include/conexion.php");
 	  $usuario =  $mysqli->real_escape_string($_POST['usuario']);
  	$pass = $mysqli->real_escape_string($_POST['pass']);

	 $query =  "SELECT * FROM $t_usuarios WHERE usuario = '".$usuario."'";
  	$db = mysqli_query($mysqli, $query);
    $numrows = mysqli_num_rows($db); //1 coincidencias 0 no hay coincidencias
  //Validacion para verificar si se encontraron coincidencias de las variables en la base de datos************************
    if($numrows != 0){
      while($row = mysqli_fetch_assoc($db)){
      	$dbid = $row['id'];
        $dbusuario = $row['usuario'];
        $dbpass = $row['pass'];
        $dbrol = $row['rol'];
        //$dbstatus = $row['estatus'];
      }//While
      if($usuario == $dbusuario and $pass == $dbpass){
        session_start();
        $_SESSION['sess_user']=$dbusuario;
        $_SESSION['sess_id']=$dbid;
        $_SESSION['sess_rol']=$dbrol;
        echo 1;
        //header('location: ../index.php');
      }//if verify
    }//if numrows
      else{
        //echo 2;
      }//else num rows
?>