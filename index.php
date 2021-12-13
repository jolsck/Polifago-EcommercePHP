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
  }

  $carrito = get_car_id_user($idusuario);
  $catCar = count($carrito);

?>
<!DOCTYPE html>
<html>
<link rel="shortcut icon" href="img/logosl.png" />
<title>Polifago Homestudio</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet" crossorigin="anonymous" />
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Inconsolata">

<style>
body, html {
  height: 100%;
  font-family: "Inconsolata", sans-serif;
}

.bgimg {
  background-position: center;
  background-size: cover;
  background-image: url("img/logo5.png");
  min-height: 85%;
}

.menu {
  display: none;
}
</style>
<body>

<!-- Links (sit on top) -->
<div class="w3-top">
  <div class="w3-row w3-padding w3-black">
    <div class="w3-col s2">
      <a href="#" class="w3-button w3-block w3-black">INICIO</a>
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
      <a href="controladores/logout.php" class="w3-button w3-block w3-black">CERRAR SESIÓN</a>
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

<!-- Header with image -->
<header class="bgimg w3-display-container w3-grayscale-min" id="home">
  <div class="w3-display-bottomleft w3-center w3-padding-large w3-hide-small">
    <span class="w3-tag">Pedidos 24/7</span>
    <span>Usuario: <?php echo $nombreUsuario; ?></span>
  </div>
  <div class="w3-display-bottomright w3-center w3-padding-large">
    <span class="w3-text-white">Zapopan,Jalisco. MX</span>
  </div>
</header>

<!-- Macetas -->
  <div class="w3-black" id="menu">
    <div class="w3-container w3-content w3-padding-64" style="max-width:800px">
      <h2 class="w3-wide w3-center">MACETAS</h2>
      <p class="w3-opacity w3-center"><i>¡Haz tu Pedido!</i></p><br>

      <div class="w3-row-padding w3-padding-32" style="margin:0 -16px">

      <?php 
        $productos = get_productos();

        foreach ($productos as $key) {
          ?>
            <div class="w3-third w3-margin-bottom">
              <img  <?php echo "src='img/".$key->urlimg."'" ?>  alt="Base de 3" style="width:100%" class="w3-hover-opacity">
              <div class="w3-container w3-white">
                <p><b><?php echo $key->nombre; ?></b></p>
                <p class="w3-opacity">Maceta de Concreto</p>
                <p><?php echo $key->descripcion; ?></p>
                <button class="w3-button w3-black w3-margin-bottom" 
      
                  <?php  
                    if ($usuario == 1) {
                      echo "onclick='addCar(".$key->id.",".$idusuario.")'";
                    }else{
                      ?>
                        onclick="document.getElementById('LoginModal').style.display='block'"      
                      <?php
                    }
                  ?>
                  >Agregar a Carrito</button>
              </div>
            </div>
          <?php
        }


      ?>

      </div>
    </div>
  </div>



  <!-- Login Modal -->
  <div id="LoginModal" class="w3-modal">
    <div class="w3-modal-content w3-animate-top w3-card-4">
      <header class="w3-container w3-teal w3-center w3-padding-32"> 
        <h2 class="w3-wide">Inicia Sesion</h2>
      </header>
      <div class="w3-container">
        <form id="form_login">
          <p><label> Usuario</label></p>
          <input class="w3-input w3-border" type="text" placeholder="Introduce Tu Usuario" name="usuario">
          <p><label> Contraseña </label></p>
          <input class="w3-input w3-border" type="password" placeholder="Introduce Contraseña" name="pass">
        </form>
        <button onclick='login();'> INICIAR <i class="fa fa-check"></i></button>
        <button class="w3-button w3-red w3-section" onclick="document.getElementById('LoginModal').style.display='none'">Cerrar <i class="fa fa-remove"></i></button>
        <p class="w3-right">Registrate <a href="registro.html" class="w3-text-blue">Aqui</a></p>
      </div>
    </div>
  </div>


<!-- Add a background color and large text to the whole page -->
<div class="w3-sand w3-grayscale w3-large">

<!-- Seccion: NOSOTROS -->
<div class="w3-container" id="about">
  <div class="w3-content" style="max-width:700px">
    <h5 class="w3-center w3-padding-64"><span class="w3-tag w3-wide">NOSOTROS</span></h5>
    <p>Polifago Homestudio es una empresa creada en Zapopan Jalisco que fue concebida por Hector Hernandez en forma de pasatiempo y evolouciono a una microempresa.</p>
    <p>Para la elaboracion de cada una de las macetas se utiliza un molde unico y plantas cultivadas por el dueño .</p>
    <div class="w3-panel w3-leftbar w3-light-grey">
      <p><i>"Utilizamos productos de la maxima calidad y plantas cultivados por nosotros." Agrega un poco de verde a tu gris.</i></p>
      <p>Dueño y creador: Hector Hernandez</p>
    </div>
    <img src="img/logo2.png" style="width:100%;max-width:1000px" class="w3-margin-top">
    <p><strong>Horario:</strong> ¡Haz tu pedido 24/7!</p>
    <p><strong>Ubicacion:</strong> Zapopan, Jalisco</p>
  </div>
</div>




<!-- Contacto -->
<div class="w3-container" id="where" style="padding-bottom:32px;">
  <div class="w3-content" style="max-width:700px">
    <h5 class="w3-center w3-padding-48"><span class="w3-tag w3-wide">CONTACTO</span></h5>
    <img src = "img/logosf.png" height = "250" width = "250" align="left"></img><br>
    <p>Encuentranos en nuestras redes sociales y haz tu pedido</p>
      <div class="w3-col m6 w3-large w3-margin-bottom">
        <i class="fa fa-map-marker" style="width:30px"></i> Zapopan, Jalisco, Mexico<br>
        <i class="fa fa-phone" style="width:30px"></i> Telefono: +52 6691960707<br>
        <i class="fa fa-envelope" style="width:30px"> </i> Correo Electronico: polifagohs@gmail.com<br>
      </div>
           
      <div align = "center">
          <img src="img/cubo.jpg" class="w3-image" style="width:100%">
      </div>

  

<!-- End page content -->
</div>


<!-- Footer -->
<footer class="w3-container w3-padding-64 w3-center w3-opacity w3-light-grey w3-xlarge">
  <p class="w3-medium">Hecho para: <a href="https://www.w3schools.com/w3css/default.asp" target="_blank">Programacion Web - 20A</a></p>
</footer>

<script src="https://code.jquery.com/jquery-3.4.1.min.js" crossorigin="anonymous"></script>
<script type="text/javascript" src="js/jquery-3.5.1.js"></script>
<script type="text/javascript" src="js/popper.min.js"></script>
<script type="text/javascript" src="js/bootstrap.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
<script type="text/javascript" src="js/myjs.js"></script>


<script>
// Tabbed Menu
function openMenu(evt, menuName) {
  var i, x, tablinks;
  x = document.getElementsByClassName("menu");
  for (i = 0; i < x.length; i++) {
    x[i].style.display = "none";
  }
  tablinks = document.getElementsByClassName("tablink");
  for (i = 0; i < x.length; i++) {
    tablinks[i].className = tablinks[i].className.replace(" w3-dark-grey", "");
  }
  document.getElementById(menuName).style.display = "block";
  evt.currentTarget.firstElementChild.className += " w3-dark-grey";
}
document.getElementById("myLink").click();
</script>

</body>
</html>
