$(document).ready(function(){
	$('#telefono_whatsapp').change(function(){
		var telwhat = $(this).val();
		var comcode = $(this).attr('comcode');
		var formdata = new FormData();
		formdata.append('telefono_whatsapp', telwhat);
		formdata.append('comcode', comcode);
		$.ajax({
			url:"ajax/contacto.ajax.php",
			method:"POST",
			data: formdata,
			cache:false,
			contentType: false,
			processData: false,
			dataType:"json",
			success: function(respuesta){
				console.log("respuesta", respuesta);
				if (respuesta) {
					Swal.fire({
						position: 'top-end',
						title: "Telefono de whatsapp actualizado 📲</i>",
						icon: "success",
						confirmButtonText: "Cerrar"
					}).then(function(result){
						if (result.value) {
							window.location = 'contacto';
						}
					});
				}
			}
		})
	})

	$('#telefono_fijo').change(function(){
		var telfijo = $(this).val();
		var comcode = $(this).attr('comcode');
		var formdata = new FormData();
		formdata.append('telefono_fijo', telfijo);
		formdata.append('comcode', comcode);
		$.ajax({
			url:"ajax/contacto.ajax.php",
			method:"POST",
			data: formdata,
			cache:false,
			contentType: false,
			processData: false,
			dataType:"json",
			success: function(respuesta){
				console.log("respuesta", respuesta);
				if (respuesta) {
					Swal.fire({
						position: 'top-end',
						title: "Telefono fijo actualizado ☎️",
						icon: "success",
						confirmButtonText: "Cerrar"
					}).then(function(result){
						if (result.value) {
							window.location = 'contacto';
						}
					});
				}
			}
		})
	})


})