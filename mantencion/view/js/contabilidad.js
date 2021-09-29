$('.tablaCambioFolioFCC').DataTable({
	"ajax":"ajax/datatable-cambiofcc.ajax.php",
	"deferRender":true,
	"retrieve":true,
	"processing":true,
	"language":{
      	"sProcessing":"Procesando...",
      	"sLengthMenu":"Mostrar_MENU_ documentos",
      	"sInfo":"Mostrando  _START_ al _END_ de  _TOTAL_",
      	"sInfoEmpty":"Mostrando 0 registros de un total de _TOTAL_",
      	"sInfoFiltered":"(filtrado de un total de _MAX_ documentos)",
      	"sSearch":"Buscar",
      	"sLoadingRecords":"Cargando...",
      	"oPaginate":{
      		"sFirst":"Primero",
	      	"sLast":"Ultimo",
	      	"sNext":"Siguiente",
	      	"sPrevious":"Anterior"
      	}
     },
     "oAria":{
      	"sSortAscending":":Activar para ordenar la columna de manera ascendente",
      	"sSortDescending":":Activar para ordenar la columna de manera descendente",
      }
})