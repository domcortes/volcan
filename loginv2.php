<?php
	require_once 'vendor/autoload.php';
	$detect = new Mobile_Detect;
	session_start();
	// if (isset($_SESSION["NOMBRE_USUARIO"])) {
 //     	header('Location: iniciarSessionSeleccion.php');
	// }

	//LLAMADA ARCHIVOS NECESARIOS PARA LAS OPERACIONES
	include_once 'fruta/controlador/USUARIO_ADO.php';
	//include_once '../controlador/EMPRESA_ADO.php';
	//include_once '../controlador/PLANTA_ADO.php';
	//include_once '../controlador/TEMPORADA_ADO.php';

	//INICIALIZAR CONTROLADOR
	$USUARIO_ADO = new USUARIO_ADO();
	//INCIALIZAR VARIBALES A OCUPAR PARA LA FUNCIONALIDAD
	$NOMBRE = "";
	$EMPRESA = "";
	$PLANTA = "";
	$TEMPORADA = "";
	$CONTRASENA = "";
	$MENSAJE = "";
	$MENSAJE2 = "";
	//INICIALIZAR ARREGLOS
	$ARRAYINICIOSESSION = "";
	$ARRAYEMPRESA = "";
	$ARRAYPLANTA = "";
	$ARRAYTEMPORADA = "";

	//DEFINIR ARREGLOS CON LOS DATOS OBTENIDOS DE LAS FUNCIONES DE LOS CONTROLADORES
?>

<!DOCTYPE html>
<html lang="es">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Fruticola El Volcan</title>

		<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
		<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
		<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

		<!--Bootsrap 4 CDN-->
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

		<!--Fontawesome CDN-->
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">

		<!--Custom styles-->
		<link rel="stylesheet" type="text/css" href="loginv2.css">
		<!--sweetalert-->
		<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
	</head>
	<body class="hold-transition sidebar-collapse sidebar-mini login-page">
		<div class="login-box">
			<div class="login-logo">
				<img src="/img/volcan-foods-logo-original.png" alt="" height="50px">
			</div>
			<!-- /.login-logo -->
			<div class="card border-0">
				<div class="card-header bg-info text-white text-center text-uppercase">
					<img src="/img/favicon.png" alt="" height="20px">
					Inicio de sesion <strong id="title_section"></strong>
				</div>
				<div class="card-body login-card-body">
					<p class="login-box-msg" id="description_text">Selecciona una seccion</p>

					<div class="btn-group-vertical col-12" id="selector_botones">
						<button class="btn btn-primary" id="btn_fruta">Fruta</button>
						<button class="btn btn-info" id="btn_materiales">Materiales</button>
						<button class="btn btn-success" id="btn_exportadora">Exportadora</button>
					</div>

					<!-- formularios de login -->
						<form method="post" id="login1">
							<div class="input-group mb-3">
								<input type="text" class="form-control" placeholder="Usuario" name="usuariofruta" id="usuariofruta" required>
								<div class="input-group-append">
									<div class="input-group-text">
										<span class="fas fa-user"></span>
									</div>
								</div>
							</div>
							<div class="input-group mb-3">
								<input type="password" class="form-control" placeholder="Contraseña" name="contrasenafruta" id="contrasenafruta" required>
								<div class="input-group-append">
									<div class="input-group-text">
										<span class="fas fa-lock"></span>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-12">
									<div class="btn-group col-12 d-flex">
										<button type="button" class="btn btn-danger w-100" id="btn_volver_fruta">Volver</button>
										<button type="submit" class="btn btn-primary w-100" name="entrar_fruta" id="entrar_fruta">Iniciar Sesion</button>
									</div>
								</div>
							</div>
						</form>

						<form method="post" id="login2">
							<div class="input-group mb-3">
								<input type="text" class="form-control" placeholder="Usuario" name="usuariomaterial" required>
								<div class="input-group-append">
									<div class="input-group-text">
										<span class="fas fa-user"></span>
									</div>
								</div>
							</div>
							<div class="input-group mb-3">
								<input type="password" class="form-control" placeholder="Contraseña" name="contrasenamaterial" required>
								<div class="input-group-append">
									<div class="input-group-text">
										<span class="fas fa-lock"></span>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-12">
									<div class="btn-group col-12 d-flex">
										<button type="button" class="btn btn-danger w-100" id="btn_volver_materiales">Volver</button>
										<button type="submit" class="btn btn-primary w-100" name="entrar_materiales" id="entrar_materiales">Iniciar Sesion</button>
									</div>
								</div>
							</div>
						</form>

						<form method="post" id="login3">
							<div class="input-group mb-3">
								<input type="text" class="form-control" placeholder="Usuario" name="usuarioexportadora" required>
								<div class="input-group-append">
									<div class="input-group-text">
										<span class="fas fa-user"></span>
									</div>
								</div>
							</div>
							<div class="input-group mb-3">
								<input type="password" class="form-control" placeholder="Contraseña" name="contrasenaexportadora" required>
								<div class="input-group-append">
									<div class="input-group-text">
										<span class="fas fa-lock"></span>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-12">
									<div class="btn-group col-12 d-flex">
										<button type="button" class="btn btn-danger w-100" id="btn_volver_exportadora">Volver</button>
										<button type="submit" class="btn btn-primary w-100" name="entrar_exportadora" id="entrar_exportadora">Iniciar Sesion</button>
									</div>
								</div>
							</div>
						</form>
					<!-- /formularios de login -->
				</div>
			</div>
		</div>
	</div>
	<script src="loginv2.js"></script>
	<!-- deteccion celular -->
    <?php if ($detect->isMobile() && $detect->isiOS() ): ?>
        <script>
            const Toast = Swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timerProgressBar: true,
                didOpen: (toast) => {
                    toast.addEventListener('mouseenter', Swal.stopTimer)
                    toast.addEventListener('mouseleave', Swal.resumeTimer)
                }
            })

            Toast.fire({
                icon: 'info',
                title: 'Celular iPhone detectado',
                html:"Hemos detectado que estas desde un iPhone 📱<br>De momento algunas vistas no estan adaptadas, por lo que sugerimos que te conectes desde un tablet Android / iPad o un computador",
                showConfirmButton:true,
                confirmButtonText:"Vale! 😉"
            })
        </script>
    <?php endif ?>

    <!-- deteccion Android -->
    <?php if ($detect->isMobile() && $detect->isAndroidOS()): ?>
        <script>
            const Toast = Swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timerProgressBar: true,
                didOpen: (toast) => {
                    toast.addEventListener('mouseenter', Swal.stopTimer)
                    toast.addEventListener('mouseleave', Swal.resumeTimer)
                }
            })

            Toast.fire({
                icon: 'info',
                title: 'Celular Android detectado',
                html:"Hemos detectado que estas desde un telefono Android 🤖<br>De momento algunas vistas no estan adaptadas, por lo que sugerimos que te conectes desde un tablet Android / iPad o un computador",
                showConfirmButton:true,
                confirmButtonText:"Vale! 😉"
            })
        </script>
    <?php endif ?>
	<?php
		//include_once "../config/urlBaseLogin.php";
		if (isset($_REQUEST['entrar_fruta'])) {
			$NOMBRE = $_REQUEST['usuariofruta'];
			$CONTRASENA = $_REQUEST['contrasenafruta'];
			$ARRAYINICIOSESSION = $USUARIO_ADO->iniciarSession($NOMBRE, $CONTRASENA);
			if (empty($ARRAYINICIOSESSION) ||  sizeof($ARRAYINICIOSESSION) == 0) {
				echo
				'<script>
					Swal.fire({
						icon:"warning",
						title:"Error de acceso",
						text:"Los datos ingresados no coinciden con nuestros registros, reintenta"
						}).then((result)=>{
							if(result.value){
								location.href = "/loginv2.php";
							}
					})
				</script>';
				// $MENSAJE2 = "NOMBRE USUARIO O CONTRASE&Ntilde;A INVALIDO";
				// $MENSAJE = "";
			} else {
				$_SESSION["ID_USUARIO"] = $ARRAYINICIOSESSION[0]['ID_USUARIO'];
				$_SESSION["NOMBRE_USUARIO"] = $ARRAYINICIOSESSION[0]['NOMBRE_USUARIO'];
				$_SESSION["TIPO_USUARIO"] = $ARRAYINICIOSESSION[0]['ID_TUSUARIO'];
				//$MENSAJE = "DATOS CORRECTOS ";
				//$MENSAJE2 = "";
				echo
				'<script>
					const Toast = Swal.mixin({
						position: "top-end",
						showConfirmButton: false,
						timer: 2000,
						timerProgressBar: true,
						didOpen: (toast) => {
							toast.addEventListener("mouseenter", Swal.stopTimer);
							toast.addEventListener("mouseleave", Swal.resumeTimer);
						}
					});

					Toast.fire({
						icon: "success",
						title: "Credenciales correctas",
						text:"cargando modulo selector"
					}).then((result)=>{
						location.href = "/fruta/vista/iniciarSessionSeleccion.php";
					})
				</script>';
			}
		}

		if (isset($_REQUEST['entrar_materiales'])) {
			$NOMBRE = $_REQUEST['usuariomaterial'];
			$CONTRASENA = $_REQUEST['contrasenamaterial'];
			$ARRAYINICIOSESSION = $USUARIO_ADO->iniciarSession($NOMBRE, $CONTRASENA);
			if (empty($ARRAYINICIOSESSION) ||  sizeof($ARRAYINICIOSESSION) == 0) {
				echo
				'<script>
					Swal.fire({
						icon:"warning",
						title:"Error de acceso",
						text:"Los datos ingresados no coinciden con nuestros registros, reintenta"
						}).then((result)=>{
							if(result.value){
								location.href = "/loginv2.php";
							}
					})
				</script>';
				// $MENSAJE2 = "NOMBRE USUARIO O CONTRASE&Ntilde;A INVALIDO";
				// $MENSAJE = "";
			} else {
				$_SESSION["ID_USUARIO"] = $ARRAYINICIOSESSION[0]['ID_USUARIO'];
				$_SESSION["NOMBRE_USUARIO"] = $ARRAYINICIOSESSION[0]['NOMBRE_USUARIO'];
				$_SESSION["TIPO_USUARIO"] = $ARRAYINICIOSESSION[0]['ID_TUSUARIO'];
				//$MENSAJE = "DATOS CORRECTOS ";
				//$MENSAJE2 = "";
				echo
				'<script>
					const Toast = Swal.mixin({
						position: "top-end",
						showConfirmButton: false,
						timer: 2000,
						timerProgressBar: true,
						didOpen: (toast) => {
							toast.addEventListener("mouseenter", Swal.stopTimer);
							toast.addEventListener("mouseleave", Swal.resumeTimer);
						}
					});

					Toast.fire({
						icon: "success",
						title: "Credenciales correctas",
						text:"cargando modulo selector"
					}).then((result)=>{
						location.href = "material/vista/iniciarSessionSeleccion.php";
					})
				</script>';
			}
		}

		if (isset($_REQUEST['entrar_exportadora'])) {
			$NOMBRE = $_REQUEST['usuarioexportadora'];
			$CONTRASENA = $_REQUEST['contrasenaexportadora'];
			$ARRAYINICIOSESSION = $USUARIO_ADO->iniciarSession($NOMBRE, $CONTRASENA);
			if (empty($ARRAYINICIOSESSION) ||  sizeof($ARRAYINICIOSESSION) == 0) {
				echo
				'<script>
					Swal.fire({
						icon:"warning",
						title:"Error de acceso",
						text:"Los datos ingresados no coinciden con nuestros registros, reintenta"
						}).then((result)=>{
							if(result.value){
								location.href = "/loginv2.php";
							}
					})
				</script>';
				// $MENSAJE2 = "NOMBRE USUARIO O CONTRASE&Ntilde;A INVALIDO";
				// $MENSAJE = "";
			} else {
				$_SESSION["ID_USUARIO"] = $ARRAYINICIOSESSION[0]['ID_USUARIO'];
				$_SESSION["NOMBRE_USUARIO"] = $ARRAYINICIOSESSION[0]['NOMBRE_USUARIO'];
				$_SESSION["TIPO_USUARIO"] = $ARRAYINICIOSESSION[0]['ID_TUSUARIO'];
				//$MENSAJE = "DATOS CORRECTOS ";
				//$MENSAJE2 = "";
				echo
				'<script>
					const Toast = Swal.mixin({
						position: "top-end",
						showConfirmButton: false,
						timer: 2000,
						timerProgressBar: true,
						didOpen: (toast) => {
							toast.addEventListener("mouseenter", Swal.stopTimer);
							toast.addEventListener("mouseleave", Swal.resumeTimer);
						}
					});

					Toast.fire({
						icon: "success",
						title: "Credenciales correctas",
						text:"cargando modulo selector"
					}).then((result)=>{
						location.href = "exportadora/vista/iniciarSessionSeleccion.php";
					})
				</script>';
			}
		}
	?>
	</body>
</html>
