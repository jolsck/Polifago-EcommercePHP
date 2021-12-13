<?php
  include("include/consultas.php");
  $usuario = 0;
  $idusuario = "";
  $nombreUsuario = "";
  session_start();
  if(isset($_SESSION['sess_rol'])){
    if ($_SESSION['sess_rol'] == "normal")  {
      $usuario = 1;
      $idusuario = $_SESSION['sess_id'];
      $nombreUsuario = $_SESSION['sess_user'];
    }else if ($_SESSION['sess_rol'] == "admin") {
      header('location: admin.php');
    }
  }else{
    header("Location:index.php");
  }

  $carrito = get_car_id_user($idusuario);
  $catCar = count($carrito);

?>
<!DOCTYPE html>
<html>
<title>Polifago Homestudio</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet" crossorigin="anonymous" />
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Inconsolata">
<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">

<style>
body, html {
  height: 100%;
  font-family: "Inconsolata", sans-serif;
}

</style>
<body>

<!-- Links (sit on top) -->
<div class="w3-top">
  <div class="w3-row w3-padding w3-black">
    <div class="w3-col s2">
      <a href="index.php" class="w3-button w3-block w3-black">INICIO</a>
    </div>
    <div class="w3-col s1">
      <a href="#menu" class="w3-button w3-block w3-black">MACETAS</a>
    </div>
    <div class="w3-col s2">
      <a href="#about" class="w3-button w3-block w3-black">NOSOTROS</a>
    </div>
    <div class="w3-col s2">
      <a href="#where" class="w3-button w3-block w3-black">CONTACTO</a>
    </div>
    <div class="w3-col s2">
      <a onclick="document.getElementById('LoginModal').style.display='block'" href="#" class="w3-button w3-block w3-black">INICIAR SESIÓN</a>
    </div>
    <?php if ($usuario == 1) {
      ?>
    <div class="w3-col s2">
      <a href="controladores/logout.php" class="w3-button w3-block w3-black">Cerrar Sesión</a>
    </div>
      <?php
    } ?>
    <?php if ($usuario == 1) {
      ?>
    <div class="w3-col s1">
      <a style="cursor: pointer;" href="micarrito.php"><img style="height: 60px;" src="img/car.png"></a>
      <span style="margin-left: -5px;">(<?php echo $catCar; ?>)</span>
    </div>
      <?php
    } ?>
  </div>
</div>

<div class="container-fluid" style="height: 100%;">
  <div style="margin-top: 100px;">
    <div class="row">
      <div class="col-md-12">
        <table class="table">
          <thead class="thead-dark">
            <tr>
              <th scope="col">#</th>
              <th scope="col">Nombre</th>
              <th scope="col">Descripcion</th>
              <th scope="col">Precio</th>
              <th scope="col">Imagen</th>
              <th scope="col">Acciones</th>
            </tr>
          </thead>
          <tbody>
  <?php
  $productos = get_car_id_user($idusuario);
  foreach ($productos as $key) {
  ?>
            <tr>
              <th scope="row"><?php echo $key->id_producto; ?></th>
              <td><?php echo $key->nombre_producto; ?></td>
              <td><?php echo $key->descripcion; ?></td>
              <td><?php echo "$ ".$key->precio; ?></td>
              <td><img style="height: 80px;"<?php echo "src='img/".$key->urlimg."'" ?>></td>
              <td><a style="cursor: pointer;" onclick='eliminarCar(<?php echo $key->id_producto; ?>,<?php echo $idusuario; ?>)'><img style="height: 30px;" src="img/delete.png"></a></td>
            </tr>
  <?php
  }
  ?>

          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>


  <div align = "center">
    <img src = "img/logo.png" height = "250" width = "250"></img>
  </div>

 
<!-- Footer -->
<footer class="w3-container w3-padding-64 w3-center w3-opacity w3-light-grey w3-xlarge">
  <p class="w3-medium">Powered by <a href="https://www.w3schools.com/w3css/default.asp" target="_blank">w3.css</a></p>
</footer>

<script type="text/javascript" src="js/jquery-3.5.1.js"></script>
<script type="text/javascript" src="js/popper.min.js"></script>
<script type="text/javascript" src="js/bootstrap.min.js"></script>
<script type="text/javascript" src="js/myjs.js"></script>


</body>
</html>
