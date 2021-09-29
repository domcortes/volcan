$(document).on('click', ".btnEditarUsuario",function(){
	var idUsuario = $(this).attr("idUsuario");
	var formData = new FormData();
	formData.append("idUsuario",idUsuario);
	$.ajax({
		url:"ajax/usuarios.ajax.php",
		method:"POST",
		data: formData,
		cache:false,
		contentType: false,
		processData: false,
		dataType:"json",
		success: function(respuesta){
			$("#editarNombre").val(respuesta[0]['nombreUsuario']);
			$("#editarUsuario").val(respuesta[0]['usuarioAcceso']);
			$("#editarPerfil").html(respuesta[0]['nivelAcceso']);
			$("#editarPerfil").val(respuesta[0]['nivelAcceso']);
			$("#passwordActual").val(respuesta[0]['contrasenna']);
		}
	})
})

// activar usuario
$(document).on('click',".btnActivar",function(){
	var idUsuario = $(this).attr("idUsuario");
	var estadoUsuario = $(this).attr("estadoUsuario");
	var datos = new FormData();
	datos.append("activarId",idUsuario);
	datos.append("activarUsuario",estadoUsuario);
	$.ajax({
		url:"ajax/usuarios.ajax.php",
		method:"POST",
		data: datos,
		cache:false,
		contentType: false,
		processData:false,
		success: function(respuesta){
			if (window.matchMedia("(max-width:767px").matches) {
				Swal.fire({
					title: "Usuario ha sido actualizado",
					type: "success",
					icon: "success",
					confirmButtonText: "Cerrar"
				}).then(function(result){
					if (result.value) {
						window.location = 'usuarios';
					}
				});
			}
		}
	})
	if (estadoUsuario==0) {
		$(this).removeClass('btn-success');
		$(this).addClass('btn-danger');
		$(this).html('Desactivado');
		$(this).attr('estadoUsuario',1)
	} else {
		$(this).removeClass('btn-danger');
		$(this).addClass('btn-success');
		$(this).html('Activado');
		$(this).attr('estadoUsuario',0)
	}
})

//validar usuario unico
$(document).on('change','#nuevoUsuario',function(){
	$('.alert').remove();
	var usuario = $(this).val();
	var datos = new FormData();
	datos.append("validarUsuario",usuario);
	$.ajax({
		url:"ajax/usuarios.ajax.php",
		method:"POST",
		data: datos,
		cache:false,
		contentType: false,
		processData:false,
		dataType:"json",
		success: function(respuesta){
			if (respuesta) {
				$("#nuevoUsuario").parent().after('<div class="alert alert-warning">Este usuario ya existe en la base de datos</div>');
				$("#nuevoUsuario").val("");
				$("#nuevoUsuario").focus();
			}
		}
	})
})

//eliminar usuario
$(document).on('click','.btnEliminarUsuario',function(){
	var idUsuario = $(this).attr("idUsuario");
	swal.fire({
		title: "<strong>Estas seguro de borrar el usuario?</strong>",
		text: "Si no estas seguro, puedes cancelarlo. Esta accion es irreversible",
		icon: "warning",
		showCancelButton: true,
		confirmButtonColor:"#3085d6",
		cancelButtonColor: "#d33",
		cancelButtonText:"Cancelar",
		confirmButtonText:"Si, quiero borrar mi usuario!"
	}).then((result)=>{
		if(result.value){
			window.location = "index.php?ruta=usuarios&idUsuario="+idUsuario;
		}
	});
})