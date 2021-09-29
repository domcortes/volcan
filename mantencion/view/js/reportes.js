//
	if (localStorage.getItem('capturarRango2')!=null) {
		$('#daterange-btn2 span').html(localStorage.getItem('capturarRango2'));
	} else {
		$('#daterange-btn2 span').html('<i class="far fa-calendar-alt"></i> Rango fechas');
	}

	$('#daterange-btn2').daterangepicker(
	  {
	  	opens:'right',
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
	    $('#daterange-btn2 span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'))
	    var fechaInicial = start.format('YYYY-MM-DD');
	    var fechaFinal = end.format('YYYY-MM-DD');
	    var capturarRango2 = $('#daterange-btn2 span').html();
	    localStorage.setItem('capturarRango2', capturarRango2);
	    window.location = 'index.php?ruta=reporte-ventas&fechaInicial='+fechaInicial+'&fechaFinal='+fechaFinal;
	  }
	)

	//cancelar rango de fecha
	$('#limpiarBusquedaLeft').on('click', function(){
		localStorage.removeItem('capturarRango2');
		localStorage.clear();
		window.location = 'reporte-ventas';
	})

	$(".datarangepicker .opensright .ranges ul li").on("click", function(){
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

		 	localStorage.setItem("capturarRango2", "Hoy");
		 	window.location = "index.php?ruta=reporte-ventas&fechaInicial="+fechaInicial+"&fechaFinal="+fechaFinal;
		 }
	})
//

// reporte por sucursal
	// if (localStorage.getItem('capturarRango2')!=null) {
	// 	$('#daterange-sucursal span').html(localStorage.getItem('capturarRango2'));
	// } else {
	// 	$('#daterange-sucursal span').html('<i class="far fa-calendar-alt"></i> Rango fechas');
	// }
	$('#daterange-sucursal span').html('<i class="far fa-calendar-alt"></i> Rango fechas');

	$('#daterange-sucursal').daterangepicker(
	  {
	  	opens:'right',
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
	    $('#daterange-sucursal span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'))
	    var sucursal = $('#selectorSucursal').val();
	    console.log("sucursal", sucursal);
	    var fechaInicial = start.format('YYYY-MM-DD');
	    var fechaFinal = end.format('YYYY-MM-DD');
	    // var capturarRango2 = $('#daterange-sucursal span').html();
	    // localStorage.setItem('capturarRango2', capturarRango2);
	    window.location = 'index.php?ruta=reporte-sucursal&sucursal='+sucursal+'&fechaInicial='+fechaInicial+'&fechaFinal='+fechaFinal;
	  }
	)

	//cancelar rango de fecha
	$('#limpiarBusquedaSucursal').on('click', function(){
		localStorage.removeItem('capturarRango2');
		localStorage.clear();
		window.location = 'index.php?ruta=reporte-sucursal&sucursal=null';
	})

	$(".datarangepicker .opensright .ranges ul li").on("click", function(){
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

		 	localStorage.setItem("capturarRango2", "Hoy");
		 	window.location = "index.php?ruta=reporte-sucursal&fechaInicial="+fechaInicial+"&fechaFinal="+fechaFinal;
		 }
	})
// fin


