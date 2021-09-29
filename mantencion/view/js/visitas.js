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

$('#pago-cuenta').on('click', function(){
    Swal.fire({
        icon:"info",
        title:"Paga tu consumo con WEBPAY! 😁",
        text:"Si olvidaste tu billetera o no cuentas con tarjeta disponible, puedes pagar con webpay desde aqui",
        showConfirmButton:true,
        showCancelButton:true,
        confirmButtonText:"Ir a pagar",
        cancelButtonText:"Cancelar"
    }).then((result) => {
      if (result.isConfirmed) {
        location.href = "/pagar-cuenta"
      }
  });
})