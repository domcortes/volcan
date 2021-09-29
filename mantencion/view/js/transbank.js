
$(document).on('click',".borrarKeyTBK",function(){
	Swal.fire({
		title: 'Quieres realmente eliminar tu llave secreta?',
		text:"con esto tambien eliminaremos tu codigo de comercio",
		icon:"info",
		showCancelButton: true,
		showConfirmButton:true,
		confirmButtonText: `Si,deseo eliminarla`,
		cancelButtonText: `Cancelar`,
	}).then((result) => {
		if (result.isConfirmed) {
			var empresa = $(this).attr("empresa");
			var datos = new FormData();
			datos.append("empresa",empresa);
			$.ajax({
				url:"ajax/transbank.ajax.php",
				method:"POST",
				data: datos,
				cache:false,
				contentType: false,
				processData:false,
			});
			Swal.fire('OK! eliminamos tu clave secreta!', '', 'success').then(function(result){if(result.value){window.location='transbank-webpay-plus';}});
		} else if (result.isDismissed) {
			Swal.fire('OK! mantendremos tu llave secreta', '', 'info')
		}
	})
})

$(document).on('click','.btnActivarTBK',function(){
	var secret = $('#secret').val();
	var commerceCode = $('#commerce').val();
	var habilitar = $('#estadoTBK').val();
	var empresa = $(this).attr("empresa");

	if (habilitar == 1) {
		if(secret == '' || commerceCode == ''){
			Swal.fire({
				title:"Error activando Webpay Plus 😭",
				text:"No puedes activar sin ingresar ambos datos y seleccionando la opción 'ACTIVADO' para guardar los cambios.\n Por favor verifica que esten con los datos requeridos para activar",
				icon:"warning",
				showConfirmButton:true,
				confirmButtonText:"Ok, lo intentare nuevamente"
			}).then(function(result){
				if(result.value){
					window.location='transbank-webpay-plus';
				}
			});
		} else {
			var datos = new FormData();
			datos.append("secret",secret);
			datos.append("empresa",empresa);
			datos.append("commerceCode", commerceCode);
			datos.append("habilitar",habilitar);
			$.ajax({
				url:"ajax/transbank.ajax.php",
				method:"POST",
				data: datos,
				cache:false,
				contentType: false,
				processData:false,
			});
			Swal.fire({
				title:"Activacion Webpay Plus Exitosa!💪🏼",
				text:"Se ha registrado el codigo de comercio "+commerceCode+" correctamente ",
				icon:"success"
			}).then(function(result){
				if(result.value){
					window.location='transbank-webpay-plus';
				}
			});
		}
	} else if (habilitar == 0){
		Swal.fire({
			title:"Algo no concuerda🤔",
			text:"Quieres activar pero estas seleccionando la opcion de desactivado. Intenta nuevamente pero esta vez selecciona la opcion correcta",
			footer:"Lo siento, tendras que llenar los datos nuevamente",
			icon:"warning",
			showConfirmButton:true,
			confirmButtonText:"Ok, lo intentare nuevamente"
		}).then(function(result){
			if(result.value){
				window.location='transbank-webpay-plus';
			}
		});
	}
});

$(document).on('click', '.btnActualizarTbk', function(){
	var habilitar = $('#estadoTBK').val();
	var empresa = $(this).attr("empresa");
	if (habilitar == 0) {
		Swal.fire({
			title: 'Quieres realmente desactivar tu cuenta webpay plus?',
			text:"Solamente actualizaremos el estado, sin tocar tu llave y codigo de comercio. Si aceptas, no podras vender en linea",
			icon:"info",
			showCancelButton: true,
			showConfirmButton:true,
			confirmButtonText: `Si,deseo deshabilitar temporalmente.`,
			cancelButtonText: `Cancelar`,
		}).then((result) => {
			if (result.isConfirmed) {
				var datos = new FormData();
				datos.append("empresaSuspendida",empresa);
				datos.append("estado", habilitar);
				$.ajax({
					url:"ajax/transbank.ajax.php",
					method:"POST",
					data: datos,
					cache:false,
					contentType: false,
					processData:false,
				});
				Swal.fire('OK! Cuenta suspendida!', 'Por el momento no podras vender en linea hasta activarla nuevamente', 'success').then(function(result){if(result.value){window.location='transbank-webpay-plus';}});
			} else if (result.isDismissed) {
				Swal.fire('OK! mantendremos tu llave secreta', '', 'info')
			}
		})
	} else {
		Swal.fire({
			title: 'Quieres activar tu cuenta webpay plus?',
			text:"Al activar, se habilitara el carrito de compras y podras vender en linea",
			icon:"info",
			showCancelButton: true,
			showConfirmButton:true,
			confirmButtonText: `Si,deseo activar Webpay Plus`,
			cancelButtonText: `Cancelar`,
		}).then((result) => {
			if (result.isConfirmed) {
				var datos = new FormData();
				datos.append("empresaSuspendida",empresa);
				datos.append("estado", habilitar);
				$.ajax({
					url:"ajax/transbank.ajax.php",
					method:"POST",
					data: datos,
					cache:false,
					contentType: false,
					processData:false,
				});
				Swal.fire('OK! Cuenta activada!', 'Desde ahora podras vender en linea con tu carrito de compras', 'success').then(function(result){if(result.value){window.location='transbank-webpay-plus';}});
			} else if (result.isDismissed) {
				Swal.fire('OK!', 'Dejaremos la configuracion tal como esta', 'info')
			}
		})
	}
});