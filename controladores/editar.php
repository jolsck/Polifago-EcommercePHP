<?php
	include("../include/conexion.php");
	$id = $mysqli->real_escape_string($_POST['id']);
	$consulta = "SELECT * FROM $t_productos WHERE id = $id";
	$resultado = mysqli_query($mysqli, $consulta);
	while ($mostrar = mysqli_fetch_array($resultado)) {
		$nombre = $mostrar['nombre'];
		$descripcion = $mostrar['descripcion'];
		$precio = $mostrar['precio'];
		$urlimg = $mostrar['urlimg'];
	}
?>




<!-- CUERPO DEL MODAL REGISTRO NUEVO CLIENTE -->
                        <form action="controladores/actualizarProd.php" method="POST" id="formAgregarProductoE" enctype="multipart/form-data">
                            <input style="display: none;" readonly="" type="" name="idProd" value = <?php echo $id; ?>  >
                            <div class="form-row">
                                <div class="form-group col-md-12">
                                    <label for="tituloProducto">Nombre</label>
                                    <input type="text" class="form-control" id="tituloProductoE" name="nombreE" placeholder="" value="<?php echo $nombre; ?>" />                          
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-12">
                                    <label for="descProducto">Descripción</label>
                                    <input type="text" class="form-control" id="descProductoE" name="descripcionE" placeholder="" value="<?php echo $descripcion; ?>" />                          
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col-md-6">
                                    <label for="costoProducto">Precio</label>
                                    <input type="number" class="form-control" id="costoProductoE" name="precioE" placeholder="" value="<?php echo $precio; ?>" />
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col-md-12">
                                    <label for="precioProducto">Imagen</label>
                                    <img style="height: 80px; margin-top: 10px; margin-bottom: 10px;" src="img/cuadrada.jpeg">
                                    <p><span>Si desea cambiar la imagen del producto, seleccione un nuevo archivo.</span></p>
                                    <input type="file" class="form-control" name="archivoE" id="archivoE"/>
                                </div>
                            </div>
                            <br>
                            <div class="form-row" style="text-align: center;">
                              <input type="submit" name="save" class="btn btn-success" value="actualizar">
                            </div>
                        </form>