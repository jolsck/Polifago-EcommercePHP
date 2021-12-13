<?php
include("include/consultas.php");
session_start();
if(isset($_SESSION['sess_rol'])){  
    if ($_SESSION['sess_rol'] == "admin")  {
    ?>
<!DOCTYPE html>
<html>
<title>Polifago Homestudio</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Inconsolata">
<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/js/all.min.js" crossorigin="anonymous"></script>
<style>
body, html {
  height: 100%;
  font-family: "Inconsolata", sans-serif;
}

.bgimg {
  background-position: center;
  background-size: cover;
  background-image: url("img/logo2.png");
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
      <a href="controladores/logout.php" class="w3-button w3-block w3-black">Cerrar Sesión</a>
    </div>
  </div>
</div>

<div class="container-fluid" style="height: 100%;margin-top: 100px;">

  <div class="row">
    <div class="col-md-12">
      <div class="col-md-4">
          <a href="" data-toggle="modal" data-target="#PexampleModalCenter"><i class="fas fa-plus"></i> Nuevo Producto</a>
      </div>
    </div>
  </div>


  <div class="row">
    <div class="col-md-12" style="text-align: center;">
      PRODUCTOS
    </div>
  </div>
  <br>
  <div class="row">
    <div class="col-md-12">
      <table class="table">
        <thead>
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
$productos = get_productos();
foreach ($productos as $key) {
?>
          <tr>
            <th scope="row"><?php echo $key->id; ?></th>
            <td><?php echo $key->nombre; ?></td>
            <td><?php echo $key->descripcion; ?></td>
            <td><?php echo "$ ".$key->precio; ?></td>
            <td><img style="height: 80px;"<?php echo "src='img/".$key->urlimg."'" ?>></td>
            <td>
              <a style="cursor: pointer;" onclick='eliminar(<?php echo $key->id; ?>)'><img style="height: 25px; margin-right: 20px;" src="img/delete.png"></a>
              <a style="cursor: pointer;" onclick='editar(<?php echo $key->id; ?>)'><img style="height: 25px;" src="img/edit.svg"></a>
            </td>
          </tr>
<?php
}
?>

        </tbody>
      </table>
    </div>
  </div>
</div>

<!-- MODALES -->
    <!-- Modal Nuevo Registro -->
        <div class="modal fade" id="PexampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="PexampleModalLongTitle">Nuevo Registro</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <!-- CUERPO DEL MODAL REGISTRO NUEVO CLIENTE -->
                        <form action="controladores/nuevoProducto.php" method="POST" id="formAgregarProducto" enctype="multipart/form-data">
                            <div class="form-row">
                                <div class="form-group col-md-12">
                                    <label for="tituloProducto">Nombre</label>
                                    <input type="text" class="form-control" id="tituloProducto" name="nombre" placeholder="" />                          
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-12">
                                    <label for="descProducto">Descripción</label>
                                    <input type="text" class="form-control" id="descProducto" name="descripcion" placeholder="" />                          
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col-md-6">
                                    <label for="costoProducto">Precio</label>
                                    <input type="number" class="form-control" id="costoProducto" name="precio" placeholder="" />
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col-md-12">
                                    <label for="precioProducto">Imagen</label>
                                    <input type="file" class="form-control" name="archivo" id="archivo" />
                                </div>
                            </div>
                            <br>
                            <div class="form-row" style="text-align: center;">
                              <input type="submit" name="save" class="btn btn-success">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    <!-- MODAL PARA EDITAR PRODUCTO -->
        <div class="modal fade" id="PexampleModalCenterE" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div id="modal-body-E" class="modal-body">
                        
                    </div>
                </div>
            </div>
        </div>

<!-- Footer -->
<footer class="w3-container w3-padding-64 w3-center w3-opacity w3-light-grey w3-xlarge">
  <p class="w3-medium">Hecho Para <a href="https://www.w3schools.com/w3css/default.asp" target="_blank">Programacion Web 2020A</a></p>
</footer>

<script type="text/javascript" src="js/jquery-3.5.1.js"></script>
<script type="text/javascript" src="js/popper.min.js"></script>
<script type="text/javascript" src="js/bootstrap.min.js"></script>
<script type="text/javascript" src="js/myjs.js"></script>


</body>
</html>
   <?php
        }else{
            header("Location: index.php");
        }
    }else{
        header("Location: index.php");
    }
    ?>