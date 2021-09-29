$('#empresaSelector').change(function(){
	var empresa = $('#empresaSelector').val();
	console.log("empresa", empresa);
	var formData = new FormData();
	formData.append("empresa",empresa);
	$.ajax({
		url:"ajax/empresa.ajax.php",
		method:"POST",
		data: formData,
		cache:false,
		contentType: false,
		processData: false,
		dataType:"json",
		success: function(respuesta){
			Swal.fire({
				title:"Empresa cargada con exito",
				text:"Se ha cargado el establecimiento "+respuesta[0]['nombre_fantasia']+" exitosamente",
				icon:"success",
				confirmButtonText:"Ir a mi establecimiento"
			}).then(function(result){
				if (result.value) {
					window.location = 'home'
				}
			});
		}
	})

})