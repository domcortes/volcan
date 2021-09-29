$('#fechainicio').change(function(){
	if($('#fechainicio').val()!=''){
		$('#fechatermino').removeAttr('disabled');
		$('#rutcliente').removeAttr('disabled')
		$('#budope').removeAttr('disabled');
		$('#fechatermino').focus();
	} else {
		$('#fechatermino').prop('disabled', true);
		$('#rutcliente').prop('disabled', true);
		$('#budope').prop('disabled', true);
		$('#empresa').focus();
	}
})


	$("#docspending").DataTable({
		"responsive": true,
		"lengthChange": false,
		"autoWidth": false,
		"language":{
			"sProcessing":"Procesando...",
	      	"sLengthMenu":"Mostrar_MENU_ registros",
	      	"sInfo":"Mostrando registros del _START_ al _END_ de un total de _TOTAL_",
	      	"sInfoEmpty":"Mostrando 0 registros de un total de _TOTAL_",
	      	"sInfoFiltered":"(filtrado de un total de _MAX_ registros)",
	      	"sSearch":"Buscar",
	      	"sLoadingRecords":"Cargando...",
	      	"oPaginate":{
	      		"sFirst":"Primero",
		      	"sLast":"Ultimo",
		      	"sNext":"Siguiente",
		      	"sPrevious":"Anterior"
	      	},
            "buttons":{
                  "colvis":"Mostrar / Ocultar columnas",
                  "print":"Imprimir",
                  "excel":"Excel",
                  "pdf":"PDF",
            }
		},
		"responsive": true, "lengthChange": false, "autoWidth": false,
		"buttons": ["excel", "pdf", "print", "colvis"]
	}).buttons().container().appendTo('#docspending_wrapper .col-md-6:eq(0)');

	$('#example2').DataTable({
	"paging": true,
	"lengthChange": false,
	"searching": false,
	"ordering": true,
	"info": true,
	"autoWidth": false,
	"responsive": true,
	});
