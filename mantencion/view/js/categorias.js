//validar categoria unica
$(document).on('change','#nuevaCategoria',function(){
	$('.alert').remove();
	var categoria = $(this).val();
	var datos = new FormData();
	datos.append("validarCategoria",categoria);
	$.ajax({
		url:"ajax/categorias.ajax.php",
		method:"POST",
		data: datos,
		cache:false,
		contentType: false,
		processData:false,
		dataType:"json",
		success: function(respuesta){
			if (respuesta) {
				$("#nuevaCategoria").parent().after('<div class="alert alert-warning">La categoria '+ categoria +' ya existe en nuestros registros</div>');
				$("#nuevaCategoria").val("");
				$("#nuevaCategoria").focus();
			}
		}
	})
})

//editar categoria
$(document).on('click', ".btnEditarCategoria",function(){
	var idCategoria = $(this).attr("idCategoria");
	var formData = new FormData();
	formData.append("idCategoria",idCategoria);
	$.ajax({
		url:"ajax/categorias.ajax.php",
		method:"POST",
		data: formData,
		cache:false,
		contentType: false,
		processData: false,
		dataType:"json",
		success: function(respuesta){
			$("#editarCategoria").val(respuesta['categoria']);
			$("#idCategoria").val(respuesta['id']);
		}
	})
})

//eliminar categoria
$(document).on('click','.btnEliminarCategoria',function(){
	var idCategoria = $(this).attr("idCategoria");
	swal.fire({
		title: "<strong>Estas seguro de borrar esta categoria?</strong>",
		text: "Si no estas seguro, puedes cancelarlo. Esta accion es irreversible",
		icon: "warning",
		showCancelButton: true,
		confirmButtonColor:"#3085d6",
		cancelButtonColor: "#d33",
		cancelButtonText:"Cancelar",
		confirmButtonText:"Si, quiero borrar mi esta categoria"
	}).then((result)=>{
		if(result.value){
			window.location = "index.php?ruta=categorias&idCategoria="+idCategoria;
		}
	});
})


$(document).on('click', '#avisoBorradoCategoria', function(){
	var cantidad = $(this).attr('cantidadprod');
	Swal.fire({
		title: "<strong>Aviso importante</strong>",
		text: "No puedes borrar esta categoria porque tiene "+cantidad+" productos asociados. Intenta borrar los productos de esta categoria y vuelve a intentarlo",
		icon: "info",
		confirmButtonText:"Ok!"
	})
})