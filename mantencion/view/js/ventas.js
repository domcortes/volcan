// $.ajax({
// 	url: "ajax/datatable-ventas.ajax.php",
// 	success:function(respuesta){
// 		console.log('respuesta', respuesta);
// 	}
// })

if (localStorage.getItem('capturarRango')!=null) {
	$('#daterange-btn span').html(localStorage.getItem('capturarRango'));
} else {
	$('#daterange-btn span').html('<i class="far fa-calendar-alt"></i> Rango fechas');
}

$('.tablaVentas').DataTable({
	"ajax":"ajax/datatable-ventas.ajax.php",
	"deferRender":true,
	"retrieve":true,
	"processing":true,
	"language":{
      	"sProcessing":"Procesando...",
      	"sLengthMenu":"Mostrar_MENU_ registros",
      	"sInfo":"Mostrando  _START_ al _END_ de  _TOTAL_",
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

$('.tablaVentas tbody').on('click','button.agregarProducto', function(){
	var idProducto = $(this).attr('idProducto');
	$(this).removeClass('btn-primary agregarProducto');
	$(this).addClass('btn-default');
	var datos = new FormData();
	datos.append('idProducto', idProducto);
	$.ajax({
		url:'ajax/productos.ajax.php',
	    method:"POST",
	    data:datos,
	    cache:false,
	    contentType:false,
	    processData:false,
	    dataType:'json',
	    success:function(respuesta){
			var descripcion= respuesta['descripcion'];
			var stock = respuesta['stock'];
			var precio= respuesta['precio_venta'];

			if(stock==0){
				swal.fire({
					title:'HEY! parece que estas intentando agregar un producto que no tiene stock',
					icon:'error',
					confirmButtonText:'Cerrar'
				});
				$("button[idProducto='"+idProducto+"']").addClass("btn-primary agregarProducto");
				return;
			}
			$('.nuevoProducto').append(
				'<div class="row" style="padding:5px 15px">'+
                    '<div class="col-6" style="padding-right: 0px">'+
                      '<div class="input-group">'+
                        '<span class="input-group-addon"><button type="button" class="btn btn-danger quitarProducto" idProducto="'+idProducto+'"><i class="fas fa-times"></i></button></span>'+
                        '<input type="text" class="form-control nuevaDescripcionProducto" idProducto="'+idProducto+'" name="agregarProducto" placeholder="Descripcion del producto" value="'+descripcion+'" required readonly>'+
                      '</div>'+
                    '</div>'+
                    '<div class="col-3">'+
                      '<input type="number" class="form-control nuevaCantidadProducto" name="nuevaCantidadProducto" min="1" value="1" stock="'+stock+'" nuevoStock="'+Number(stock-1)+'" required>'+
                    '</div>'+
                    '<div class="col-3 ingresoPrecio" style="padding-left: 0px">'+
                      '<div class="input-group">'+
                        '<input type="text" class="form-control text-center nuevoPrecioProducto" name="nuevoPrecioProducto" precioReal="'+precio+'" value="'+precio+'" readonly required>'+
                      '</div>'+
                    '</div>'+
            	'</div>'
				);
			sumarTotalPrecios();
			agregarImpuesto();
			listarProductos()
			$('.nuevoPrecioProducto').number(true,0);
	    }
	})
})

$('.tablaVentas').on('draw.dt',function(){
	if (localStorage.getItem('quitarProducto')!=null) {
		var listaIdProductos = JSON.parse(localStorage.getItem('quitarProducto'));
		for (var i = 0; i < listaIdProductos.length ; i++) {
			$("button.recuperarBoton[idProducto='"+listaIdProductos[i]["idProducto"]+"']").removeClass('btn-default');
			$("button.recuperarBoton[idProducto='"+listaIdProductos[i]["idProducto"]+"']").addClass('btn-primary agregarProducto');
			sumarTotalPrecios();
			agregarImpuesto();
			listarProductos()
		}
	}
})

//quitar producto y recuperar boton
var idQuitarProducto = [];
localStorage.removeItem('quitarProducto');
$('.formularioVenta').on('click', 'button.quitarProducto', function(){
	$(this).parent().parent().parent().parent().remove();
	var idProducto = $(this).attr('idProducto');
	if (localStorage.getItem('quitarProducto')==null) {
		idQuitarProducto = [];
	} else {
		idQuitarProducto.concat(localStorage.getItem('quitarProducto'));
	}

	idQuitarProducto.push({'idProducto':idProducto});
	localStorage.setItem('quitarProducto',JSON.stringify(idQuitarProducto));
	$("button.recuperarBoton[idProducto='"+idProducto+"']").removeClass('btn-default');
	$("button.recuperarBoton[idProducto='"+idProducto+"']").addClass('btn-primary agregarProducto');
	if ($('.nuevoProducto').children().length ==0) {
		$('#nuevoTotalVenta').val(0);
		$('#totalVenta').val(0);
		$('#nuevoImpuestoVenta').attr('total', 0);
		$('#nuevoTotalVenta').attr('total', 0);
	} else {
		sumarTotalPrecios();
		agregarImpuesto();
		listarProductos()
	}
})
//fin producto y recuperar boton

//agregando boton para dispositivos
var numProducto =0;
$('.btnAgregarProducto').click(function(){
	numProducto++;
	var datos = new FormData();
	datos.append('traerProductos', 'ok');
	$.ajax({
		url:'ajax/productos.ajax.php',
	    method:"POST",
	    data:datos,
	    cache:false,
	    contentType:false,
	    processData:false,
	    dataType:'json',
	    success:function(respuesta){
	    	$('.nuevoProducto').append(
				'<div class="row" style="padding:5px 15px">'+
                    '<div class="col-6" style="padding-right: 0px">'+
                      '<div class="input-group">'+
                        '<span class="input-group-addon"><button type="button" class="btn btn-danger quitarProducto" idProducto=""><i class="fas fa-times"></i></button></span>'+
                        '<select class="custom-select nuevaDescripcionProducto agregarProducto" idProducto id="producto'+numProducto+'" name="nuevaDescripcionProducto" required>'+
                        	'<option>Seleccione el producto</option>'+
                        '</select>'+
                      '</div>'+
                    '</div>'+
                    '<div class="col-3 ingresoCantidad">'+
                      '<input type="number" class="form-control nuevaCantidadProducto" name="nuevaCantidadProducto" min="1" value="1" stock nuevoStock required>'+
                    '</div>'+
                    '<div class="col-3 ingresoPrecio" style="padding-left: 0px">'+
                      '<div class="input-group">'+
                        '<input type="text" class="form-control nuevoPrecioProducto" name="nuevoPrecioProducto" precioReal readonly required>'+
                      '</div>'+
                    '</div>'+
            	'</div>'
				)
	    	respuesta.forEach(funcionForEach);
	    	function funcionForEach(item,index){
	    		if (item.stock!=0) {
					$('#producto'+numProducto).append(
	    				'<option idProducto="'+item.id+'" value="'+item.descripcion+'">'+item.descripcion+'</option>'
	    			)
	    		}
	    	}
	    	sumarTotalPrecios();
	    	agregarImpuesto();
	    	$('.nuevoPrecioProducto').number(true,0);
	    }
	})
})
//fin agregando boton para dispositivos

$('.formularioVenta').on('change', 'select.nuevaDescripcionProducto', function(){
	var nombreProducto = $(this).val();
	var nuevoPrecioProducto = $(this).parent().parent().parent().children('.ingresoPrecio').children().children('.nuevoPrecioProducto');
	var nuevaCantidadProducto = $(this).parent().parent().parent().children('.ingresoCantidad').children('.nuevaCantidadProducto');
	var datos = new FormData();
	datos.append('nombreProducto', nombreProducto);
	$.ajax({
		url:'ajax/productos.ajax.php',
	    method:"POST",
	    data:datos,
	    cache:false,
	    contentType:false,
	    processData:false,
	    dataType:'json',
	    success:function(respuesta){
	    	$(nuevaCantidadProducto).attr('stock', respuesta['stock']);
	    	$(nuevaCantidadProducto).attr('nuevoStock', Number(respuesta['stock']-1));
	    	$(nuevoPrecioProducto).val(respuesta['precio_venta']);
	    	$(nuevoPrecioProducto).attr('precioReal', respuesta['precio_venta']);
	    	listarProductos();
	    }
	})
})

$('.formularioVenta').on('change','input.nuevaCantidadProducto', function(){
	var precio = $(this).parent().parent().children('.ingresoPrecio').children().children('.nuevoPrecioProducto');
	var precioFinal = $(this).val() * precio.attr('precioReal');

	precio.val(precioFinal);
	var nuevoStock = Number($(this).attr('stock')) - $(this).val();
	$(this).attr('nuevoStock', nuevoStock);
	if (Number($(this).val()) > Number($(this).attr('stock'))) {
		$(this).val(1);
		var precioFinal = $(this).val() * precio.attr('precioReal');
		precio.val(precioFinal);
		sumarTotalPrecios();
		agregarImpuesto();
		listarProductos()
		swal.fire({
			title:'La cantidad supera el stock',
			text: "Solo hay "+$(this).attr('stock')+" unidades",
			icon:"warning",
			confirmButtonText:"Cerrar"
		});
	}
	sumarTotalPrecios();
	agregarImpuesto();
	listarProductos()
})

//sumar precios
function sumarTotalPrecios(){
	var precioItem = $('.nuevoPrecioProducto');
	var arraySumaPrecio = [];
	for (var i=0; i<precioItem.length; i++){
		arraySumaPrecio.push(Number($(precioItem[i]).val()));
}

function sumarArrayPrecios(total, numero){
		return total + numero;
	}
	var sumaTotalPrecio = arraySumaPrecio.reduce(sumarArrayPrecios);
	$('#nuevoTotalVenta').val(sumaTotalPrecio);
	$('#totalVenta').val(sumaTotalPrecio);
	$('#nuevoTotalVenta').attr('total', sumaTotalPrecio);
}

function agregarImpuesto(){
	var impuesto = $('#nuevoImpuestoVenta').val();
	var precioTotal = $('#nuevoTotalVenta').attr('total');
	var precioImpuesto = Number(precioTotal * impuesto / 100);
	var totalConImpuesto = Number(precioImpuesto) + Number(precioTotal);
	$('#nuevoTotalVenta').val(totalConImpuesto);
	$('#totalVenta').val(totalConImpuesto);
	$('#nuevoPrecioImpuesto').val(precioImpuesto);
	$('#nuevoPrecioNeto').val(precioTotal);
}

$('#nuevoImpuestoVenta').change(function(){
	sumarTotalPrecios();
	agregarImpuesto();
	listarProductos();
})

$('#nuevoTotalVenta').number(true,0);

//seleccion metodo de pago
$('#nuevoMetodoPago').change(function(){
	var metodo = $(this).val();
	if (metodo == "efectivo") {
		$(this).parent().removeClass('col-12');
		$(this).parent().removeClass('col-8');
		$(this).parent().addClass('col-4');
		$(this).parent().parent().children('.cajasMetodoPago').html(
			'<input type="text" class="form-control" id="nuevoValorEfectivo" name="nuevoValorEfectivo" placeholder="monto efectivo" required>'
		)
		$(this).parent().parent().children('.cajasCambioEfectivo').html(
			' <input type="text" class="form-control"  id="nuevoCambioEfectivo" name="nuevoCambioEfectivo" placeholder="vuelto..." readonly required>'
		)

		$('#nuevoValorEfectivo').number(true,0);
		$('#nuevoCambioEfectivo').number(true,0);
		listarProductos();
	} else {
		$(this).parent().removeClass('col-4');
		$(this).parent().removeClass('col-8');
		$(this).parent().addClass('col-8');

		$(this).parent().parent().children('.cajasMetodoPago').html(
			' <input type="text" class="form-control" name="nuevoCodigoTransaccion" id="nuevoCodigoTransaccion" placeholder="codigo tbk" required>'
		)
		$(this).parent().parent().children('.cajasCambioEfectivo').html(
			' '
		)
	}
	listarMetodos();
})

//vuelto efectivo
$('.formularioVenta').on('change','input#nuevoValorEfectivo', function(){
	var efectivo = $(this).val();
	var vuelto = Number(efectivo)-Number($('#nuevoTotalVenta').val());
	var nuevoCambioEfectivo = $(this).parent().parent().children('.cajasCambioEfectivo').children('#nuevoCambioEfectivo');
	nuevoCambioEfectivo.val(vuelto);
})


//listar productos vendidos
function listarProductos(){
	var listaProductos =[];
	var descripcion = $('.nuevaDescripcionProducto');
	var cantidad = $('.nuevaCantidadProducto');
	var precio = $('.nuevoPrecioProducto');
	for (var i =0; i< descripcion.length; i++){
		listaProductos.push({
			"id" : $(descripcion[i]).attr("idProducto"),
			"descripcion" : $(descripcion[i]).val(),
			"cantidad" : $(cantidad[i]).val(),
			"stock" : $(cantidad[i]).attr("nuevoStock"),
			"precio" : $(precio[i]).attr("precioReal"),
			"total" : $(precio[i]).val(),
		})
	}
	$('#listaProductos').val(JSON.stringify(listaProductos));
}

//listar metodo pago
function listarMetodos(){
	var listaMetodos = '';
	if ($('#nuevoMetodoPago').val()=='efectivo') {
		$('#listaMetodoPago').val('efectivo');
	} else{
		$('#listaMetodoPago').val($('#nuevoMetodoPago').val()+"-"+$("#nuevoCodigoTransaccion").val());
	}
}

$('.formularioVenta').on('change','input#nuevoCodigoTransaccion', function(){
	listarMetodos();
})

$('.formularioVenta').on('change','input#nuevoValorEfectivo', function(){
	listarMetodos();
})

$('.btnEditarVenta').click(function(){
	var idVenta = $(this).attr('idVenta');
	window.location = 'index.php?ruta=editar-venta&idVenta='+idVenta;
})

$('.btnEliminarVenta').click(function(){
	var idVenta = $(this).attr('idVenta');
	swal.fire({
		title:"Estas seguro de borrar la venta?",
		text:"Esta accion es irreversible, ojo! ",
		type:"warning",
		showCancelButton:true,
		confirmButtonColor:"#3085d6",
		cancelButtonColor:"#d33",
		cancelButtonText:"Cancelar",
		confirmButtonText:"Si, borrar esta venta! "
	}).then((result)=>{
		if (result.value) {
			window.location = "index.php?ruta=ventas&idVenta="+idVenta;
		}
	})
})

//imprimir factura
$('.table').on('click', '.btnImprimirFactura', function(){
	var codigoVenta = $(this).attr("codigoVenta");
	window.open('extensions/tcpdf/examples/factura.php?codigo='+codigoVenta,'_blank');
})

//rango de fechas
$('#daterange-btn').daterangepicker(
  {
  	opens:'left',
    ranges   : {
      'Hoy'       : [moment(), moment()],
      'Ayer'   : [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
      'Ultimos 7 dias' : [moment().subtract(6, 'days'), moment()],
      'Ultimos 30 dias': [moment().subtract(29, 'days'), moment()],
      'Este mes'  : [moment().startOf('month'), moment().endOf('month')],
      'Ultimo mes'  : [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
    },
    startDate: moment(),
    endDate  : moment()
  },
  function (start, end) {
    $('#daterange-btn span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'))
    var fechaInicial = start.format('YYYY-MM-DD');
    var fechaFinal = end.format('YYYY-MM-DD');
    var capturarRango = $('#daterange-btn span').html();
    localStorage.setItem('capturarRango', capturarRango);
    window.location = 'index.php?ruta=ventas-click&fechaInicial='+fechaInicial+'&fechaFinal='+fechaFinal;

  }
)

//cancelar rango de fecha
$('#limpiarBusquedaRight').on('click', function(){
	localStorage.removeItem('capturarRango');
	localStorage.clear();
	window.location = 'ventas';
})

$(".opensleft .ranges ul li").on("click", function(){
	 var textoHoy = $(this).attr('data-range-key');
	 if (textoHoy == 'Hoy') {
	 	var d = new Date();
	 	var dia = d.getDate();
	 	var mes = d.getMonth()+1;
	 	var anio = d.getFullYear();

	 	if (dia < 10 ) {
	 		dia = '0'+dia;
	 	} else {
	 		mes = mes;
	 	}

	 	if(mes<10){
	 		mes = '0'+mes;
	 	} else {
	 		mes = mes;
	 	}

	 	var fechaInicial = anio+'-'+mes+'-'+dia;
	 	var fechaFinal = anio+'-'+mes+'-'+dia;

	 	localStorage.setItem("capturarRango", "Hoy");
	 	window.location = "index.php?ruta=ventas&fechaInicial="+fechaInicial+"&fechaFinal="+fechaFinal;
	 }
})

function cargarPrecio(){
  var find = false;
  $.ajax({
    type:"POST",
    url:"ajax/ventas.ajax.php",
    data:"valeTransitorio=" + $('#valeTransitorio').val(),
    success:function(r){
      if (r =="false") {
      	$("#montoventa").html("<div class='input-group-prepend'><span class='input-group-text'><i class='fas fa-money-bill-wave'></i></i></span></div><input type='number' name='montoventa' id='montoventa' class='form-control' placeholder='Monto vale transitorio' disabled>");
        $("#crearlink").attr("disabled","disabled");
        $("#email").attr("disabled","disabled");
        $("#montoventa").attr("disabled","disabled");
        $("#telefono").attr("disabled","disabled");
        $("#empresa").focus();
        insert = false;
          Swal.fire({
            icon: 'error',
            title: 'UPS!',
            text: 'El vale transitorio no es valido o no existe, intenta nuevamente!',
          })
      } else {
      	$('#detailBuy').html('<div class="loading"><img id="loader" width="10%" height="10%" src="https://media.taringa.net/knn/identity/aHR0cHM6Ly9rNDYua24zLm5ldC90YXJpbmdhL0MvNy84L0QvNC9BL3ZhZ29uZXR0YXMvNUM5LmdpZg" alt="loading" /></div>');
      	$("#montoventa").removeAttr("disabled");
        $('#montoventa').html(r);
        find = true;
      }
      if (find == true) {
        $.ajax({
          type:"POST",
          url:"ajax/cargarListaVenta.php",
          data:"valeTransitorio=" + $('#valeTransitorio').val(),
          success:function(response){
						$("#crearlink").removeAttr("disabled");
						$("#email").removeAttr("disabled");
						$("#montoventa").removeAttr("disabled");
						$("#telefono").removeAttr("disabled");
            var jData = response;
            var tabla = ConvertToTable(jData);
          }
        });
      }
    }
  });
}

function ConvertToTable(jData) {
		$('#loader').fadeOut(1000);
    $("#json").val('"'+jData+'"');
    var append = false;
    var item = [11,12,13,14,18,21];
    var arrJSON = typeof jData != 'object' ? JSON.parse(jData) : jData;
    var $table = $('<table/>');
    var $headerTr = $('<tr/>');

    for (var index in arrJSON[0]) {
      $headerTr.append($('<th/>').html(index));
    }
    $table.append($headerTr);
    for (var i = 0; i < arrJSON.length; i++) {
     var $tableTr = $('<tr/>');
      for (var index in arrJSON[i]) {
        $tableTr.append($('<td/>').html(arrJSON[i][index]));
      }
      $table.append($tableTr);
      var append = true;
    }
    $('#detailBuy').append($table).fadeIn(3000);
    $('#detailBuy').addClass("table");
  }
