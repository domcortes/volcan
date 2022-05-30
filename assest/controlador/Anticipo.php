<?php

class AnticipoController{
    static public function ctrCrearAnticipo(){
        if (isset($_POST['id_broker'])) {
            if (preg_match('/^[0-9]+$/', $_POST['id_broker'])) {

                $date = new DateTime('NOW');
                $today = $date->format('Y-m-d');
                $hash = time();

                $datos = [
                    'id_empresa' => $_SESSION['ID_EMPRESA'],
                    'hash' => $hash,
                    'id_broker' => $_POST['id_broker'],
                    'estado_registro' => 1,
                    'estado' => 1,
                    'id_usuario' => $_SESSION['ID_USUARIO'],
                    'id_perfil_usuario' => 1,
                    'observacion' => $_POST['observacion_anticipo'],
                    'fecha_ingreso' => $today,
                    'fecha_modificacion' => $today,
                ];

                $tabla = 'liquidacion_anticipo';

                $respuesta = AnticiposModel::mdlCrearAnticipo($tabla,$datos);
                if ($respuesta == 'ok') {
                    echo
                    '<script>
								swal.fire({
									title: "<strong>BIEN HECHO</strong>",
									text: "El anticipo fue creado exitosamente",
									icon: "success"
								}).then((result)=>{
									if(result.value){
										window.location = "/exportadora/vista/registroAnticipo.php?hash='.$hash.'";
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
							text: "El anticipo no puede estar vacio o contener caracteres especiales",
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
}

?>