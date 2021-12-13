//Funcion para crear un nuevo usuario
	function registrarse(){
		var x = $("#form_registro").serialize();
		$.ajax({
			url: 'controladores/registro.php',
			type: 'POST',
			data: x,
			success: function(data) {
				console.log(data);
				if (data == 1) {
					alert("Registro exitoso");
					location.reload();
				}else if(data == 3){
					alert("El usuario ya se encuentra registrado");
				}else{
					alert("fallo la conexión, comunicarse con desarrollador");
				}
		    }// succes
		}); //ajax
	}//end function
//Funcion para iniciar sesion
	function login(){
		var x = $("#form_login").serialize();
		$.ajax({
			url: 'controladores/login.php',
			type: 'POST',
			data: x,
			success: function(data) {
				console.log(data);
				if (data == 1) {
					location.reload();
				}else{
					alert("El usuario y/o la contraseña son incorrectos");
				}
		    }// succes
		}); //ajax
	}
//Funcion para agregar a car
	function addCar(idUser,idProd){
		$.ajax({
			url: 'controladores/car.php',
			type: 'POST',
			data: "idProd=" + idProd + "&idUser=" + idUser,
			success: function(data) {
				//console.log(data);
				location.reload();
		    }// succes
		}); //ajax
	}
//funcion para agregar producto
	function agregarProducto(){
		var x = $("#formAgregarProducto").serialize();
		$.ajax({
			url: 'controladores/nuevoProducto.php',
			type: 'POST',
			data: x,
			success: function(data) {
				console.log(data);
		    }// succes
		}); //ajax
	}
//Funcion para eliminar un producto
	function eliminar(id){
		$.ajax({
			url: 'controladores/eliminarProd.php',
			type: 'POST',
			data: "id="+id,
			success: function(data) {
				console.log(data);
				if (data == 1) {
					alert("Registro eliminado");
					location.reload();
				}else{
					alert("Falló al eliminar");
				}
		    }// succes
		}); //ajax
	}
//Funcion para eliminar un producto del carrito
	function eliminarCar(idProd, idUser){
		$.ajax({
			url: 'controladores/eliminarProdCar.php',
			type: 'POST',
			data: "idProd="+idProd+"&idUser="+idUser,
			success: function(data) {
				console.log(data);
				if (data == 1) {
					alert("Articulo eliminado");
					location.reload();
				}else{
					alert("Falló al eliminar");
				}
		    }// succes
		}); //ajax
	}
//Funcion para abrir modal de editar un articulo en admin
	function editar(id){
		$.ajax({
			url: 'controladores/editar.php',
			type: 'POST',
			data: "id="+id,
			success: function(data) {
				console.log(data);
				$("#modal-body-E").empty();
				$("#modal-body-E").append(data);
				$("#PexampleModalCenterE").modal('show');
		    }// succes
		}); //ajax
	}