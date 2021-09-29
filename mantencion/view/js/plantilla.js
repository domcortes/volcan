$("#example1").DataTable({
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
      },
      "oAria":{
      	"sSortAscending":":Activar para ordenar la columna de manera ascendente",
      	"sSortDescending":":Activar para ordenar la columna de manera descendente",
      }
      // "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
}).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
$('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });

    //Datemask dd/mm/yyyy
    $('#datemask').inputmask('dd/mm/yyyy', { 'placeholder': 'dd/mm/yyyy' })
    //Datemask2 mm/dd/yyyy
    $('#datemask2').inputmask('mm/dd/yyyy', { 'placeholder': 'mm/dd/yyyy' })
    //Money Euro
    $('[data-mask]').inputmask()


function mueveReloj(){
    momentoActual = new Date()
    hora = momentoActual.getHours()
    minuto = momentoActual.getMinutes()
    segundo = momentoActual.getSeconds()
    if (segundo < 10 ) {
        segundo = '0'+segundo
    }
    if (minuto < 10) {
        minuto = '0'+minuto
    }
    horaImprimible = hora + " : " + minuto + " : " + segundo
    document.form_reloj.reloj.value = horaImprimible
    setTimeout(mueveReloj,1000)
}

$(function () {
  $('[data-toggle="popover"]').popover({html:true})
})

$(function () {
  $('[data-toggle="tooltip"]').tooltip()
})
