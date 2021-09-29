$(document).on('click', '#btnshp',function(){
	var url = $('#url').attr('url');
	var item = $(this).attr('item');
	var cod = $(this).attr('obj');
	const swalBootstrap = Swal.mixin({
		customClass:{
			confirmButton:"btn btn-warning",
			cancelButton: "btn btn-secondary"
		},
		buttonsStyling:false
	})

	swalBootstrap.fire({
		input:"select",
		inputOptions:{
			1:'1',
			2:'2',
			3:'3',
			4:'4',
			5:'5',
			6:'6',
			7:'7',
			8:'8',
			9:'9',
			10:'10',
		},
		inputPlaceholder:"Cantidad",
		showCancelButton:true,
		cancelButtonText:"Cancelar",
		confirmButtonText:"Agregar al carrito 🛒",
		icon:"question",
		title:"OK, vamos por "+item+" 😊",
		text:"Cuantas unidades quieres comprar?",
		inputValidator: (value) => {
			return new Promise((resolve)=>{
				if (value=='') {
					resolve('Necesitamos que nos digas la cantidad')
				} else {
					resolve();
					var q = value;
					var fd = new FormData();
					fd.append('cod', cod);
					fd.append('q',q);
					$.ajax({
						url:"../ajax/shop.ajax.php",
						method:"POST",
						data:fd,
						cache:false,
						contentType:false,
						processData:false,
						success:function(respuesta){
							if (respuesta) {
								Swal.fire({
								  // position: 'top-end',
								  icon: 'success',
								  title: 'Agregado al carrito de compra! 🛒',
								  showConfirmButton: true,
								}).then((result)=>{
									if (result.value) {
										$('#cart-icon').html('');
										$('#cart-icon').html("<a class='cart' href='/carrito/"+url+"'><i class='fas fa-cart-arrow-down cart-icon'></i></a>")
									}
								})
							} else {
								console.log("respuesta", respuesta.value);
								Swal.fire({
								  position: 'top-end',
								  icon: 'error',
								  title: 'No pudimos agregar ! 🛒',
								  showConfirmButton: false,
								  timer: 1500
								})
							}
						},

					})
				}
			})

		}
	})
})

$(document).ready(function(){
	$("#paytbk").attr('disabled','disabled');
	$('input[name=emacus]').change(function(){
		var emacus = $(this).val();
		validate();
	})

	$('input[name=cusadd]').change(function(){
		var cusadd = $(this).val();
		validate();
	})

	$('input[name=custel]').change(function(){
		var custel = $(this).val();
		validate();
	})

})

function validate(){
	if ( custel.value != '' && cusadd.value != '' && emacus.value  != '') {
		var sid = $('#sid').val();
		console.log("sid", sid);
		var vercustel = custel.value;
		var vercusadd = cusadd.value;
		var veremacus = emacus.value;
		var formdata = new FormData();
		formdata.append("sid", sid);
		formdata.append("custel", vercustel);
		formdata.append("cusadd", vercusadd);
		formdata.append("emacus", veremacus);
		$.ajax({
			url:"/ajax/compras.ajax.php",
			method:"POST",
			data: formdata,
			cache:false,
			contentType: false,
			processData: false,
			dataType:"json",
			success:function(respuesta){
				if (respuesta =='ok') {
					$('#paytbk').removeAttr('disabled');
				}
			}
		})
	}
}

