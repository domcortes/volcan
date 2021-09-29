//editarUsuario
$(document).on('click', ".btnEditarCliente",function(){
	var idCliente = $(this).attr("idCliente");
	console.log(idCliente);
	var formData = new FormData();
	formData.append("idCliente",idCliente);
	$.ajax({
		url:"ajax/clientes.ajax.php",
		method:"POST",
		data: formData,
		cache:false,
		contentType: false,
		processData: false,
		dataType:"json",
		success:function(respuesta){
			$('#idCliente').val(respuesta['id']);
			$('#editarCliente').val(respuesta['nombre']);
			$('#editarDocumentoId').val(respuesta['documento']);
			$('#editarEmail').val(respuesta['email']);
			$('#editarTelefono').val(respuesta['telefono']);
			$('#editarDireccion').val(respuesta['direccion']);
			$('#editarFechaNacimiento').val(respuesta['fecha_nacimiento']);
		}
	})
})

//editarUsuario
$(document).on('click', ".btnEliminarCliente",function(){
	var idCliente = $(this).attr("idCliente");
	console.log(idCliente);
	swal.fire({
		title: "Estas seguro de borrar el cliente?",
		text: "Sino estas seguro, puedes cancelar la accion!!",
		icon: "warning",
		showCancelButton:true,
		confirmButtonColor:'#3085d6',
		cancelButtonColor:"#d33",
		cancelButtonText:"Cancelar",
		confirmButtonText:'Si, borrar al cliente'
	}).then((result)=>{
		if(result.value){
			window.location = "index.php?ruta=clientes&idCliente="+idCliente;
		}
	});
})