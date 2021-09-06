<?php

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


if (isset($_REQUEST['ENTRAR'])) {
    $NOMBRE = $_REQUEST['NOMBRE'];
    $CONTRASENA = $_REQUEST['CONTRASENA'];
    $ARRAYINICIOSESSION = $USUARIO_ADO->iniciarSession($NOMBRE, $CONTRASENA);

    if (empty($ARRAYINICIOSESSION) ||  sizeof($ARRAYINICIOSESSION) == 0) {

        $MENSAJE2 = "NOMBRE USUARIO O CONTRASE&Ntilde;A INVALIDO";
        $MENSAJE = "";
    } else {
        $_SESSION["ID_USUARIO"] = $ARRAYINICIOSESSION[0]['ID_USUARIO'];
        $_SESSION["NOMBRE_USUARIO"] = $ARRAYINICIOSESSION[0]['NOMBRE_USUARIO'];
        $_SESSION["TIPO_USUARIO"] = $ARRAYINICIOSESSION[0]['ID_TUSUARIO'];
        $MENSAJE = "DATOS CORRECTOS ";
        $MENSAJE2 = "";
        header('Location: iniciarSessionSeleccion.php');
    }
}


?>



<!DOCTYPE html>
<html lang="es">

<head>
    <title>INICIAR SESSION</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <!- LLAMADA DE LOS ARCHIVOS NECESARIOS PARA DISEÑO Y FUNCIONES BASE DE LA VISTA -!>
        <?php include_once "../config/urlHead.php"; ?>

        <!- FUNCIONES BASES -!>
            <script type="text/javascript">
                function validacion() {

                    NOMBRE = document.getElementById("NOMBRE").value;
                    CONTRASENA = document.getElementById("CONTRASENA").value;



                    document.getElementById('val_nombre').innerHTML = "";
                    document.getElementById('val_contrasena').innerHTML = "";




                    if (NOMBRE == null || NOMBRE.length == 0 || /^\s+$/.test(NOMBRE)) {
                        document.form_reg_dato.NOMBRE.focus();
                        document.form_reg_dato.NOMBRE.style.borderColor = "#FF0000";
                        document.getElementById('val_nombre').innerHTML = "NO A INGRESADO DATO";
                        return false;
                    }
                    document.form_reg_dato.NOMBRE.style.borderColor = "#4AF575";

                    if (CONTRASENA == null || CONTRASENA.length == 0 || /^\s+$/.test(CONTRASENA)) {
                        document.form_reg_dato.CONTRASENA.focus();
                        document.form_reg_dato.CONTRASENA.style.borderColor = "#FF0000";
                        document.getElementById('val_contrasena').innerHTML = "NO A INGRESADO DATO";
                        return false;
                    }
                    document.form_reg_dato.CONTRASENA.style.borderColor = "#4AF575";

                }
            </script>

</head>

<body class="hold-transition theme-primary bg-gradient-primary">
    <div class="container h-p100">
        <div class="row align-items-center justify-content-md-center h-p100">
            <div class="col-12">
                <div class="row justify-content-center no-gutters">
                    <div class="col-lg-4 col-md-5 col-12">
                        <div class="bg-white-10 rounded5">
                            <div class="content-top-agile p-10 pb-0">
                                <h2 class="text-white">INICIO SESSION</h2>
                                <p class="text-white-50 mb-0">USUARIO</p>
                            </div>
                            <form class="form" role="form" method="post" onsubmit="return validacion()" name="form_reg_dato">
                                <div class="p-30">
                                    <div class="form-group">
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text bg-transparent text-white"><i class="ti-user"></i></span>
                                            </div>
                                            <input type="text" class="form-control pl-15 bg-transparent text-white plc-white" placeholder="NOMBRE USUARIO" id="NOMBRE" name="NOMBRE" value="<?php echo $NOMBRE; ?>" autocomplete="on">
                                            <br>
                                        </div>
                                        <label id="val_nombre" class="validacion"> </label>
                                    </div>
                                    <div class="form-group">
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text  bg-transparent text-white"><i class="ti-lock"></i></span>
                                            </div>
                                            <input type="password" class="form-control pl-15 bg-transparent text-white plc-white" placeholder="CONTRASE&ntilde;A" id="CONTRASENA" name="CONTRASENA" value="<?php echo $CONTRASENA; ?>" autocomplete="on">

                                        </div>
                                        <label id="val_contrasena" class="validacion"> </label>
                                        <label id="validacion2" class="validacion2"><?php echo  $MENSAJE; ?> </label>
                                        <label id="validacion" class="validacion"><?php echo  $MENSAJE2; ?> </label>
                                    </div>
                                    <!-- /.col -->
                                    <div class="col-12 text-center">
                                        <button type="submit" class="btn btn-danger btn-rounded mt-10" id="ENTRAR" name="ENTRAR">ENTRAR</button>
                                    </div>
                                    <!-- /.col -->
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php //include_once "../config/footer.php";     
        ?>
    </div>

    <?php include_once "../config/urlBaseLogin.php"; ?>
</body>

</html>