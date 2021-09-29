  const codemaps = CodeMirror.fromTextArea(document.getElementById("codeMaps"), {
    mode: "htmlmixed",
    lineNumbers:true,
    theme: "monokai",
    styleActiveLine: true,
    matchBrackets: true
  });

// activar facebook messenger
$(document).on('click',".actualizarMapa",function(){
	var empresa = $(this).attr("empresa");
	var scriptMSN = codemaps.getValue();
	var datos = new FormData();
	datos.append("updmap",empresa);
	datos.append("scriptMSN",scriptMSN);
	$.ajax({
		url:"ajax/maps.ajax.php",
		method:"POST",
		data: datos,
		cache:false,
		contentType: false,
		processData:false,
		success: function(respuesta){
			console.log("respuesta", respuesta);
			Swal.fire({
				title: "Se ha actualizado las propiedades de tu ubicacion",
				icon: "success",
				confirmButtonText: "Cerrar"
			}).then(function(result){
				if (result.value) {
					window.location = 'mapa-establecimiento';
				}
			});
		}
	})
})