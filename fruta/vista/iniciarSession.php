<?php

require_once '../../vendor/autoload.php';
$detect = new Mobile_Detect;
// Any mobile device (phones or tablets).
session_start();
if (isset($_SESSION["NOMBRE_USUARIO"])) {
     header('Location: iniciarSessionSeleccion.php');
}

//LLAMADA ARCHIVOS NECESARIOS PARA LAS OPERACIONES
include_once '../controlador/USUARIO_ADO.php';
//include_once '../controlador/EMPRESA_ADO.php';
//include_once '../controlador/PLANTA_ADO.php';
//include_once '../controlador/TEMPORADA_ADO.php';

//INCIALIZAR LAS VARIBLES
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
<!-- nuevo head -->
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
        <link rel="stylesheet" href="../../loginv2.css">
        <!--sweetalert-->
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    </head>
<!-- fin nuevo head -->

<!-- nuevo body  -->
    <body class="hold-transition sidebar-collapse sidebar-mini login-page">
        <div class="login-box">
            <div class="login-logo">
                <img src="/img/volcan-foods-logo-original.png" alt="" height="50px">
            </div>
            <div class="card border-0">
                <div class="card-header bg-info text-white text-center text-uppercase">
                    <img src="/img/favicon.png" alt="" height="20px">
                    Inicio de sesion <strong id="title_section"></strong>
                </div>

                <div class="card-body login-card-body">
                    <form class="form" role="form" method="post" name="form_reg_dato">
                        <div class="input-group mb-3">
                            <input type="text" class="form-control" placeholder="NOMBRE USUARIO" id="NOMBRE" name="NOMBRE" value="<?php echo $NOMBRE; ?>" autocomplete="on" required>
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-user"></span>
                                </div>
                            </div>
                        </div>
                        <div class="input-group mb-3">
                            <input type="password" class="form-control" placeholder="CONTRASE&ntilde;A" id="CONTRASENA" name="CONTRASENA" value="<?php echo $CONTRASENA; ?>" required>
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-user"></span>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <div class="btn-group col-12 d-flex">
                                    <a href="../../" class="btn btn-danger w-100"> VOLVER</a>
                                    <button type="submit" class="btn btn-success w-100" id="ENTRAR" name="ENTRAR">ENTRAR</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

        </div>

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

    <!-- entrar -->
    <?php
        if (isset($_REQUEST['ENTRAR'])) {
            if ($_REQUEST['NOMBRE']=="" || $_REQUEST['CONTRASENA'] == "") {
                echo '<script>
                    Swal.fire({
                        icon:"info",
                        title:"Alerta de inicio de sesion",
                        text:"El usuario o contraseña se encuentra vacio, por favor llena los datos minimos para iniciar sesion",
                        showConfirmButton:true,
                        confirmButtonText:"OK"
                    }).then((result)=>{
                        if(result.value){
                            location.href = "/fruta/vista/iniciarSession.php";
                        }
                    })
                </script>';
            } else {
                $NOMBRE = $_REQUEST['NOMBRE'];
                $CONTRASENA = $_REQUEST['CONTRASENA'];
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
                                    location.href = "iniciarSession.php";
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
                                location.href = "iniciarSessionSeleccion.php";
                        })
                    </script>';
                }
            }
        }
    ?>
    </body>
<!-- fin nuevo body -->
</html>