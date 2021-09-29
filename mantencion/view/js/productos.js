//cargar tabla dinamica productos

// $.ajax({
// 	url: "ajax/datatable-productos.ajax.php",
// 	success:function(respuesta){
// 		console.log('respuesta', respuesta);
// 	}
// })
var perfilOculto = $("#hiddenProfile").val();
$('.tablaProductos').DataTable({
	"ajax":"ajax/datatable-productos.ajax.php",
	"deferRender":true,
	"retrieve":true,
	"processing":true,
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
      	}
     },
     "oAria":{
      	"sSortAscending":":Activar para ordenar la columna de manera ascendente",
      	"sSortDescending":":Activar para ordenar la columna de manera descendente",
      }
})

//categoria para asignar codigo
$("#nuevaCategoria").change(function(){
  var idCategoria = $(this).val();
  var datos = new FormData();
  datos.append('idCategoria', idCategoria);
  $.ajax({
    url:"ajax/productos.ajax.php",
    method:"POST",
    data:datos,
    cache:false,
    contentType:false,
    processData:false,
    dataType:"json",
    success:function(respuesta){
      if (!respuesta) {
        var nuevoCodigo = idCategoria+"000001";
        $('#nuevoCodigo').val(nuevoCodigo);
      } else {
        var nuevoCodigo = Number(respuesta['codigo'])+1;
        $('#nuevoCodigo').val(nuevoCodigo);
      }
    }
  })
})

$('#nuevoPrecioCompra, #editarPrecioCompra').change(function(){
  if ($('#toggle-event').prop('checked')) {
    var valorPorcentaje = $('.nuevoPorcentaje').val();
    var porcentaje = Number(($('#nuevoPrecioCompra').val()*valorPorcentaje/100))+Number($('#nuevoPrecioCompra').val());
    var editarPorcentaje = Number(($('#editarPrecioCompra').val()*valorPorcentaje/100))+Number($('#editarPrecioCompra').val());
    $('#nuevoPrecioVenta').val(porcentaje);
    $('#nuevoPrecioVenta').prop("readonly",true);
    $('#editarPrecioVenta').val(editarPorcentaje);
    $('#editarPrecioVenta').prop("readonly",true);
  }
})

$('.nuevoPorcentaje').change(function(){
  if ($('#toggle-event').prop('checked')) {
    var valorPorcentaje = $(this).val();
    var porcentaje = Number(($('#nuevoPrecioCompra').val()*valorPorcentaje/100))+Number($('#nuevoPrecioCompra').val());
    var editarPorcentaje = Number(($('#editarPrecioCompra').val()*valorPorcentaje/100))+Number($('#editarPrecioCompra').val());
    $('#nuevoPrecioVenta').val(porcentaje);
    $('#nuevoPrecioVenta').prop("readonly",true);
    $('#editarPrecioVenta').val(editarPorcentaje);
    $('#editarPrecioVenta').prop("readonly",true);
  }
})

$('#toggle-event').change(function(){
  var propiedad = $(this).prop('checked');
  console.log("valor de propiedad",propiedad);
  if ($(this).prop('checked')==true) {
    $('#nuevoPrecioVenta').prop("readonly",true);
    $('.nuevoPorcentaje').prop('readonly',false);
  } else {
    $('#nuevoPrecioVenta').prop("readonly",false);
    $('.nuevoPorcentaje').prop('readonly',true);
  }
})

$('#toggle-event2').change(function(){
  var propiedad2 = $(this).prop('checked');
  if ($(this).prop('checked')==true) {
    $('#editarPrecioVenta').prop("readonly",true);
    $('.editarPorcentaje').prop('readonly',false);
  } else {
    $('#editarPrecioVenta').prop("readonly",false);
    $('.editarPorcentaje').prop('readonly',true);
  }
})

$('.tablaProductos tbody').on('click', 'button.btnEditarProducto', function(){
  var idProducto = $(this).attr('idProducto');
  var datos = new FormData();
  datos.append('idProducto',idProducto);
  $.ajax({
    url:'ajax/productos.ajax.php',
    method:"POST",
    data:datos,
    cache:false,
    contentType:false,
    processData:false,
    dataType:'json',
    success:function(respuesta){
      var datosCategoria = new FormData();
      datosCategoria.append('idCategoria',respuesta['id_categoria']);
      $.ajax({
        url:'ajax/categorias.ajax.php',
        method:"POST",
        data:datosCategoria,
        cache:false,
        contentType:false,
        processData:false,
        dataType:'json',
        success:function(respuesta){
          $('#editarCategoria').val(respuesta['id']);
          $('#editarCategoria').html(respuesta['categoria']);
        }
      })
        $('#editarCodigo').val(respuesta['codigo']);
        $('#editarCodigoMia').val(respuesta['codigoMia']);
        $('#editarDescripcion').val(respuesta['descripcion']);
        $('#editarStock').val(respuesta['stock']);
        $('#editarPrecioCompra').val(respuesta['precio_compra']);
        $('#editarPrecioVenta').val(respuesta['precio_venta']);
        $('#editarImagen').val(respuesta['imagen']);
    }
  })
})

$('.tablaProductos tbody').on('click', 'button.btnEliminarProducto', function(){
  var idProducto = $(this).attr('idProducto');
  var codigo = $(this).attr('codigo');
  var imagen = $(this).attr('imagen');
  swal.fire({
    title:'Estas seguro que quieres borrar este producto?',
    text:'Si no lo estas, puedes cancelar la accion, ya que es irreversible si lo haces.',
    icon:'warning',
    showCancelButton:true,
    confirmButtonColor:'#3085d6',
    cancelButtonColor:'#000',
    cancelButtonText:'Cancelar',
    confirmButtonText:'Si, borra el producto!'
  }).then((result)=>{
      if (result.value) {
        window.location = 'index.php?ruta=productos&idProducto='+idProducto+'&codigo='+codigo;
      }
    })
})

$(document).on('click', ".btnActualizarProducto",function(){
  var idproducto = $(this).attr('code');
  var formulario = new FormData();
  formulario.append('updprod', idproducto);
  $.ajax({
    url:"ajax/productos.ajax.php",
    method:"POST",
    data: formulario,
    cache:false,
    contentType: false,
    processData: false,
    dataType:"json",
    success: function(respuesta){
      $("#nombreProductoEspanolEditado").val(respuesta[0]['nombreProductoEspanol']);
      $("#nombreProductoInglesEditado").val(respuesta[0]['nombreProductoIngles']);
      $("#editarPrecioCLP").val(respuesta[0]['precioProductoCLP']);
      $("#editarPrecioUSD").val(respuesta[0]['precioProductoUSD']);
      $("#editarDescripcionEsp").val(respuesta[0]['descripcionProductoEspanol']);
      $("#editarDescripcionEng").val(respuesta[0]['descripcionProductoIngles']);
      $("#prodedit").val(respuesta[0]['idProducto']);
    }
  })
})

$(document).on('click', ".btnEliminarProducto",function(){
  var idproducto = $(this).attr('code');
  var formulario = new FormData();
  formulario.append('delprod', idproducto);
  swal.fire({
    icon:"question",
    title:"Advertencia",
    text:"Esta accion es irreversible, desea continuar?",
    showConfirmButton:true,
    showCancelButton:true,
    cancelButtonText:"CANCELAR",
    confirmButtonText:"ELIMINAR"
  }).then((result)=>{
    if (result.isConfirmed) {
      $.ajax({
        url:"ajax/productos.ajax.php",
        method:"POST",
        data: formulario,
        cache:false,
        contentType: false,
        processData: false,
        dataType:"json",
        success: function(respuesta){
          swal.fire({
            icon:"success",
            title:"Accion realizada!",
            text:"El producto fue eliminado correctamente"
          }).then((result)=>{
            window.location = 'productos';
          })
        }
      })
    } else if (result.isDismissed){
      swal.fire({
        icon:"info",
        title:"Accion cancelada",
        text:"Se ha cancelado la eliminacion del registro"
      })
    }
  })
})


