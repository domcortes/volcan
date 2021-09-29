$('.ver-qr').on('click', function(){
	var qr = $(this).attr('qr');
	var mesa = $(this).attr('mesa');
	var monto = $(this).attr('monto');
	var host = $(this).attr('h');
	console.log("host", host);
	Swal.fire({
		title: 'QR de pago mesa ' + mesa + ' por $'+ monto,
		html:'<p>Este codigo QR pagara tu comanda en webpay</p>',
		imageUrl: 'https://api.qrserver.com/v1/create-qr-code/?data=https://'+host+'/pagar-cuenta/'+qr+' &amp;size=150x150',
		imageWidth: 200,
		imageHeight: 200,
		imageAlt: 'QR pago',
		confirmButtonText: 'OK'
	})
})