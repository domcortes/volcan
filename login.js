
$('#inicio_sesion_fruta').toggle();
$('#inicio_sesion_materiales').toggle();
$('#inicio_sesion_exportadora').toggle();
$('#btn_volver').toggle();

// mostrar y ocultar botones y formularios al volver
	$('#btn_volver').on('click', function(){
		$('#btn_volver').fadeOut(1000);
		$('#presentacion').html('Inicio Sesion');
		$('#inicio_sesion_materiales').hide();
		$('#inicio_sesion_exportadora').hide();
		$('#inicio_sesion_fruta').hide();
		$('#selector_botones').fadeIn(3000);
	})
// fin de mostrar y ocultar botones y formularios al volver

// mostar formulario
	$('#btn_fruta').on('click', function(){
		$('#selector_botones').fadeOut("fast");
		$('#btn_volver').fadeIn(3000);
		$('#inicio_sesion_fruta').fadeIn(3000);
		$('#presentacion').html('Inicio Sesion Fruta');
	});
// fin de mostrar formulario

$('#btn_material').on('click', function(){
	$('#selector_botones').fadeOut("fast");
	$('#btn_volver').fadeIn(3000);
	$('#inicio_sesion_materiales').fadeIn(3000);
	$('#presentacion').html('Inicio Sesion Materiales');
});

$('#btn_exportadora').on('click', function(){
	$('#selector_botones').fadeOut("fast");
	$('#btn_volver').fadeIn(3000);
	$('#inicio_sesion_exportadora').fadeIn(3000);
	$('#presentacion').html('Inicio Sesion Exportadora');
});
