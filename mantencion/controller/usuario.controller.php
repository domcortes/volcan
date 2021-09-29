<?php

class UsuarioController {
	static public function ctrIngresoUsuario(){
		if (preg_match('/^[a-zA-Z0-9\.]+$/', $_POST['joinUser']) && preg_match('/^[a-zA-Z0-9]+$/', $_POST['joinPassword'])) {
			$crypt = crypt($_POST['joinPassword'],'$2a$07$asxx54ahjppf45sd87a5a4dDDGsystemdev$');
			$tabla = 'usuarios';
			$item = 'usuarioAcceso';
			$valor = $_POST['joinUser'];
			$respuesta = UsuarioModel::MdlMostrarUsuario($tabla,$item,$valor);
			if ($respuesta[0]['usuarioAcceso']==$_POST['joinUser'] && $respuesta[0]['contrasenna']==$crypt) {
				if ($respuesta[0]['activo']=='1') {
					$_SESSION['iniciarSesion'] = 'ok';
					$_SESSION['idusuario'] = $respuesta[0]['idusuario'];
					$_SESSION['nombreUsuario'] = $respuesta[0]['nombreUsuario'];
					$_SESSION['correoElectronico'] = $respuesta[0]['correoElectronico'];
					$_SESSION['nivelAcceso'] = $respuesta[0]['nivelAcceso'];
					$_SESSION['rutUsuario'] = $respuesta[0]['rutUsuario'];
					$_SESSION['nombreMainEmpresa'] = $respuesta[0]['nombreMainEmpresa'];
					$_SESSION['rutMainEmpresa'] = $respuesta[0]['rutMainEmpresa'];
					$_SESSION['fechaContrato'] = $respuesta[0]['fechaContrato'];
					$_SESSION['usuarioAcceso'] = $respuesta[0]['usuarioAcceso'];
					//registrar fecha y hora ultimo logiin
					date_default_timezone_set('America/Santiago');
					$fecha = new DateTime('NOW');
					// $lastLoginTime = $fecha->format('Y-m-d H:i:s');
					// $item1 = "ultimo_login";
					// $valor1 = $lastLoginTime;
					// $item2 = 'id';
					// $valor2 = $respuesta['id'];
					// $ultimoLogin = UsuarioModel::mdlActualizarUsuario($tabla,$item1,$valor1,$item2,$valor2);
					// if ($ultimoLogin=='ok') {
					// echo $_SESSION['nivelAcceso'].$_SESSION['idusuario'];
						echo '<script>window.location = "home";</script>';
					// }
				} else {
					echo '<br><div class="alert alert-danger">Error al ingresar, el usuario no esta activado</div>';
				}
			} else {
				echo '<br><div class="alert alert-danger">Error al ingresar, vuelve a intentarlo</div>';
			}
		}
	}

	static public function ctrCrearUsuario(){
		if (isset($_POST['nuevoUsuario'])) {
			if (preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST['nombrenuevousuario']) &&
				preg_match('/^[a-zA-Z0-9\.]+$/', $_POST['nuevoUsuario']) &&
				preg_match('/^[a-zA-Z0-9]+$/', $_POST['contrasenna'])) {
					$date = new DateTime('NOW');
					$today = $date->format('Y-m-d H:i:s');
					$tabla = 'usuarios';
					$crypt = crypt($_POST['contrasenna'],'$2a$07$asxx54ahjppf45sd87a5a4dDDGsystemdev$');
					$datos = array(
								'rutUsuario'=>$_POST['rut'],
								'nombreUsuario'=>$_POST['nombrenuevousuario'],
								'usuarioAcceso'=>$_POST['nuevoUsuario'],
								'nivelAcceso'=>$_POST['nivel'],
								'correoElectronico'=>$_POST['correo'],
								'contrasenna'=>$crypt,
								'sucursal'=>$_POST['sucursal'],
								'activo'=>$_POST['activo']);
					$respuesta = UsuarioModel::mdlIngresarUsuario($tabla,$datos);
					if ($respuesta == 'ok') {
						echo
							'<script>
								swal.fire({
									title: "<strong>BIEN HECHO</strong>",
									text: "El usuario fue creado exitosamente",
									icon: "success"
								}).then((result)=>{
									if(result.value){
										window.location = "usuarios";
									}
								});
							</script>';
					} else {
						echo
							'<script>
								swal.fire({
									title: "<strong>RAYOS! </strong>",
									text: "Hay un error en la base de datos '.$respuesta.'",
									icon: "error"
								});
							</script>';
					}
			} else {
				echo
					'<script>
						swal.fire({
							title: "<strong>ATENCION</strong>",
							text: "El usuario no puede estar vacio o contener caracteres especiales",
							icon: "error"
						}).then((result)=>{
							if(result.value){
								window.location = "usuarios";
							}
						});
					</script>';
			}
		}
	}

	static public function ctrMostrarUsuarios($item,$valor){
		$tabla = 'usuarios';
		$respuesta = UsuarioModel::MdlMostrarUsuario($tabla,$item,$valor);
		return $respuesta;
	}

	static public function ctrEditarUsuario(){
		if (isset($_POST['editarUsuario'])) {
			if (preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST['editarNombre'])) {
				$tabla = 'usuarios';
				if ($_POST['editarPassword']!='') {
					if (preg_match('/^[a-zA-Z0-9]+$/', $_POST['editarPassword'])) {
						$crypt = crypt($_POST['editarPassword'],'$2a$07$asxx54ahjppf45sd87a5a4dDDGsystemdev$');
					} else {
						echo
							'<script>
								swal.fire({
									title: "<strong>Ups! </strong>",
									text: "La contraseña no puede estar vacia o llevar caracteres especiales",
									icon: "error"
								});
							</script>';
					}
				} else {
					$crypt = $_POST['passwordActual'];
				}

				$datos = array("nombre"=>$_POST['editarNombre'],
								"usuario"=>$_POST['editarUsuario'],
								"password"=>$crypt,
								"perfil"=>$_POST['editarPerfil']);
				$respuesta = UsuarioModel::mdlEditarUsuario($tabla,$datos);
				if ($respuesta = 'ok') {
						echo
					'<script>
						swal.fire({
							title: "<strong>Yahoo! </strong>",
							icon: "success",
							text: "El usuario fue actualizado con exito",
							type: "success",
							showConfirmButton:"Cerrar",
							closeOnConfirm:false
						}).then((result)=>{
							if(result.value){
								window.location = "usuarios";
							}
						});
					</script>';
				} else {
						echo
						'<script>
							swal.fire({
								title: "<strong>UPS! </strong>",
								icon:"error",
								text: "El usuario fue no pudo ser actualizado, reintente",
								type: "error",
								showConfirmButton:"Cerrar",
								closeOnConfirm:false
							}).then((result)=>{
								if(result.value){
									window.location = "usuarios";
								}
							});
						</script>';
				}
			} else {
				echo
					'<script>
						swal.fire({
							title: "<strong>UN MOMENTO!</strong>",
							text: "No puedes pasar un nombre vacio o con caracteres especiales",
							icon: "error"
						});
					</script>';
			}
		}
	}

	static public function ctrBorrarUsuario(){
		if (isset($_GET['idUsuario'])) {
			$tabla = 'usuarios';
			$datos = $_GET['idUsuario'];

			$respuesta = UsuarioModel::mdlBorrarUsuario($tabla,$datos);
			if ($respuesta=='ok') {
				echo
					'<script>
						swal.fire({
							title: "<strong>Yahoo! </strong>",
							text: "El usuario fue eliminado con exito",
							icon: "success",
							showConfirmButton:"Cerrar",
							closeOnConfirm:false
						}).then((result)=>{
							if(result.value){
								window.location = "usuarios";
							}
						});
					</script>';
			}
		}
	}
}