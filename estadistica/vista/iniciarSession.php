<?php

require_once '../../api/vendor/autoload.php';
$detect = new Mobile_Detect;
// Any mobile device (phones or tablets).
session_start();
if (isset($_SESSION["NOMBRE_USUARIO"])) {
     header('Location: index.php');
}

//LLAMADA ARCHIVOS NECESARIOS PARA LAS OPERACIONES
include_once '../../assest/controlador/USUARIO_ADO.php';
include_once '../../assest/controlador/TEMPORADA_ADO.php';
include_once '../../assest/controlador/PTUSUARIO_ADO.php';
//include_once '../controlador/EMPRESA_ADO.php';
//include_once '../controlador/PLANTA_ADO.php';
//include_once '../controlador/TEMPORADA_ADO.php';

//INCIALIZAR LAS VARIBLES
//INICIALIZAR CONTROLADOR
$USUARIO_ADO = new USUARIO_ADO();
$TEMPORADA_ADO = new TEMPORADA_ADO();
$PTUSUARIO_ADO = new PTUSUARIO_ADO();



//INCIALIZAR VARIBALES A OCUPAR PARA LA FUNCIONALIDAD

$NOMBRE = "";
$EMPRESA = "";
$PLANTA = "";
$TEMPORADA = "";


$CONTRASENA = "";
$MENSAJE = "";
$MENSAJE2 = "";
$PESTADISTICA="";



//INICIALIZAR ARREGLOS


$ARRAYINICIOSESSION = "";
$ARRAYEMPRESA = "";
$ARRAYPLANTA = "";
$ARRAYTEMPORADA = "";
$ARRAYVERPTUSUARIO="";
//DEFINIR ARREGLOS CON LOS DATOS OBTENIDOS DE LAS FUNCIONES DE LOS CONTROLADORES

$ARRAYTEMPORADA = $TEMPORADA_ADO->listarTemporadaCBX();
if (isset($_SESSION["ID_TEMPORADA"])) {
    $TEMPORADA = $_SESSION["ID_TEMPORADA"];   
} 
?>



<!DOCTYPE html>
<html lang="es">
<!-- nuevo head -->
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Fruticola Volcan</title>
        <link rel="icon" href="../../assest/img/favicon.png">

        <!--Estilo base-->
        <link rel="stylesheet" type="text/css" HREF="../../assest/css/reset.css" />
        <link rel="stylesheet" type="text/css" HREF="../../assest/css/style.css" />

        <!--Custom styles-->
        <link rel="stylesheet" href="../../assest/css/loginv2.css">
        <!--     bootstrap  -->        
        <link rel="stylesheet" href="../../api/bootstrap/css/bootstrap.css" />
        <link rel="stylesheet" href="../../api/bootstrap/css/bootstrap.min.css" />  

        <!--JS -->
        <script src="../../assest/js/jquery.min.js"></script>    
        <!--sweetalert-->
        <script src="../../assest/js/sweetalert2@11.js"></script>

        
        <!- FUNCIONES BASES -!>
            <script type="text/javascript">
                function validacion() {
                    TEMPORADA = document.getElementById("TEMPORADA").selectedIndex;
                    document.getElementById('val_temporada').innerHTML = "";

           
                    if (TEMPORADA == null || TEMPORADA == 0) {
                        document.form_reg_dato.TEMPORADA.focus();
                        document.form_reg_dato.TEMPORADA.style.borderColor = "#FF0000";
                        document.getElementById('val_temporada').innerHTML = "NO HA SELECCIONADO  NINGUNA ALTERNATIVA";
                        return false;
                    }
                    document.form_reg_dato.TEMPORADA.style.borderColor = "#4AF575";

                }
            </script>
    </head>
<!-- fin nuevo head -->

<!-- nuevo body  -->



    <body class="hold-transition sidebar-collapse sidebar-mini login-page">
        <div class="login-box">
            <div class="login-logo">
                <img src="../../assest/img/volcan-foods-logo-original.png" alt="" height="50px">
            </div>
            <div class="card border-0">
                <div class="card-header bg-info text-white text-center text-uppercase">
                    <img src="../../img/favicon.png" alt="" height="20px">
                    Inicio de sesion <strong id="title_section"></strong>
                </div>
                <div class="card-body login-card-body">
                    <form class="form" role="form" method="post" name="form_reg_dato">
                        <div class="input-group mb-3">
                            <input type="text" class="form-control" placeholder="NOMBRE USUARIO" id="NOMBRE" name="NOMBRE" value="<?php echo $NOMBRE; ?>" autocomplete="on" required >
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-user"></span>
                                </div>
                            </div>
                        </div>
                        <div class="input-group mb-3">
                            <input type="password" class="form-control" placeholder="CONTRASE&Ntilde;A" id="CONTRASENA" name="CONTRASENA" value="<?php echo $CONTRASENA; ?>" required>
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-user"></span>
                                </div>
                            </div>
                        </div>                        
                        <div class="input-group mb-3" id="input">
                            <label id="label" for="TEMPORADA">Selecionar Temporada</label>
                            <select class="form-control" id="TEMPORADA" name="TEMPORADA" style="width: 100%;" required>
                                <option></option>
                                <?php foreach ($ARRAYTEMPORADA as $r) : ?>
                                    <?php if ($ARRAYTEMPORADA) {    ?>
                                        <option value="<?php echo $r['ID_TEMPORADA']; ?>" <?php if ($TEMPORADA == $r['ID_TEMPORADA']) { echo "selected"; } ?>> <?php echo $r['NOMBRE_TEMPORADA'] ?> </option>
                                    <?php } else { ?>
                                        <option>No Hay Datos Registrados </option>
                                    <?php } ?>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <label id="val_temporada" class="validacion"> <?php echo  $MENSAJE; ?></label>
                        <div class="row">
                            <div class="col-12">
                                <div class="btn-group col-12 d-flex">
                                    <a href="../../" class="btn btn-danger w-100"> VOLVER</a>
                                    <button type="submit" class="btn btn-success w-100" id="ENTRAR" name="ENTRAR" onclick="return validacion()">ENTRAR</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
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
                            location.href = "iniciarSession.php";
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

                    
                    $ARRAYVERPTUSUARIO  =$PTUSUARIO_ADO->listarPtusuarioPorTusuarioCBX($ARRAYINICIOSESSION[0]['ID_TUSUARIO']);
                    if($ARRAYVERPTUSUARIO){
                        $PESTADISTICA  =$ARRAYVERPTUSUARIO[0]['ESTADISTICA'];      
                        if($PESTADISTICA=="1"){
                            $_SESSION["ID_USUARIO"] = $ARRAYINICIOSESSION[0]['ID_USUARIO'];
                            $_SESSION["NOMBRE_USUARIO"] = $ARRAYINICIOSESSION[0]['NOMBRE_USUARIO'];
                            $_SESSION["TIPO_USUARIO"] = $ARRAYINICIOSESSION[0]['ID_TUSUARIO'];
                            $_SESSION["ID_TEMPORADA"] = $_REQUEST['TEMPORADA'];   
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
                                        location.href = "index.php";
                                })
                            </script>';
                        } else{
                            
                            echo '<script>
                                Swal.fire({
                                    icon:"warning",
                                    title:"Error de acceso",
                                    text:"El Usuario no cuenta con los privilegios para acceder al modulo.",
                                    showConfirmButton: true,
                                    confirmButtonText:"Cerrar",
                                    closeOnConfirm:false
                                }).then((result)=>{
                                    location.href = "../../";                                    
                                })
                            </script>';
                        }

                    }else{      
                        echo '<script>
                            Swal.fire({
                                icon:"warning",
                                title:"Error de acceso",
                                text:"El Usuario no cuenta con los privilegios asociados.",
                                showConfirmButton: true,
                                confirmButtonText:"Cerrar",
                                closeOnConfirm:false
                            }).then((result)=>{
                                location.href = "../../";                                    
                            })
                        </script>';
                    }

                }
            }
        }
    ?>
    </body>
<!-- fin nuevo body -->
</html>