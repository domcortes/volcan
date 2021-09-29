
  const codemirror = CodeMirror.fromTextArea(document.getElementById("codeMirrorDemo"), {
    mode: "htmlmixed",
    lineNumbers:true,
    theme: "monokai",
    styleActiveLine: true,
    matchBrackets: true
  });

// activar facebook messenger
$(document).on('click',".btnActivarFBMessenger",function(){
	var empresa = $(this).attr("empresa");
	var estadofbm = $(this).attr("estadoFBM");
	console.log("estadofbm", estadofbm);
	var scriptMSN = codemirror.getValue();
	console.log("scriptMSN", scriptMSN);
	var datos = new FormData();
	datos.append("activarId",empresa);
	datos.append("activarUsuario",estadofbm);
	datos.append("scriptMSN",scriptMSN);
	$.ajax({
		url:"ajax/facebook.ajax.php",
		method:"POST",
		data: datos,
		cache:false,
		contentType: false,
		processData:false,
		success: function(respuesta){
			Swal.fire({
				title: "Se ha actualizado las propiedades de Facebook Messenger",
				icon: "success",
				confirmButtonText: "Cerrar"
			}).then(function(result){
				if (result.value) {
					window.location = 'facebook-messenger';
				}
			});
		}
	})
	if (estadofbm==0) {
		$(this).removeClass('btn-danger');
		$(this).addClass('btn-success');
		$(this).html('<i class="fab fa-facebook-messenger"></i> Activar Facebook Messenger');
		$(this).attr('estadoFBM',0)
	} else {
		$(this).removeClass('btn-success');
		$(this).addClass('btn-danger');
		$(this).html('<i class="fab fa-facebook-messenger"></i> Desactivar Facebook Messenger');
		$(this).attr('estadoFBM',1)
	}

})
