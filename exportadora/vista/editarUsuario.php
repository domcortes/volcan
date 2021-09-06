

<?php

include_once "../config/validarUsuario.php";

//LLAMADA ARCHIVOS NECESARIOS PARA LAS OPERACIONES
include_once '../controlador/AUSUARIO_ADO.php';
include_once '../modelo/USUARIO.php';

//INICIALIZAR CONTROLADOR


//INIICIALIZAR MODELO
$USUARIO =  new USUARIO();
$AUSUARIO_ADO =  new AUSUARIO_ADO();

//INCIALIZAR VARIBALES A OCUPAR PARA LA FUNCIONALIDAD

$RUTUSUARIO = "";
$NOMBREUSUARIO = "";
$PNOMBREUSUARIO = "";
$SNOMBREUSUARIO = "";
$PAPELLIDOUSUARIO = "";
$SAPELLIDOUSUARIO = "";
$CORREO = "";
$TELEFONO = "";


$MENSAJE = "";
$FOCUS = "";
$BORDER = "";

$IDOP = "";
$OP = "";
$DISABLED = "";

//INICIALIZAR ARREGLOS
$ARRAYYVERUSUARIOID = "";

//DEFINIR ARREGLOS CON LOS DATOS OBTENIDOS DE LAS FUNCIONES DE LOS CONTROLADORES





//OPERACION DE EDICION DE FILA
if (isset($_REQUEST['EDITAR'])) {
    $USUARIO->__SET('RUT_USUARIO', $_REQUEST['RUTUSUARIO']);
    $USUARIO->__SET('PNOMBRE_USUARIO', $_REQUEST['PNOMBREUSUARIO']);
    $USUARIO->__SET('SNOMBRE_USUARIO', $_REQUEST['SNOMBREUSUARIO']);
    $USUARIO->__SET('PAPELLIDO_USUARIO', $_REQUEST['PAPELLIDOUSUARIO']);
    $USUARIO->__SET('SAPELLIDO_USUARIO', $_REQUEST['SAPELLIDOUSUARIO']);
    $USUARIO->__SET('EMAIL_USUARIO', $_REQUEST['CORREO']);
    $USUARIO->__SET('TELEFONO_USUARIO', $_REQUEST['TELEFONO']);
    $USUARIO->__SET('ID_USUARIO', $IDUSUARIOS);
    $USUARIO_ADO->actualizarPerfil($USUARIO);
    echo "<script type='text/javascript'> location.href ='editarUsuario.php';</script>";
}



if (isset($NOMBREUSUARIOS)) {
    //$DISABLED="disabled";
    $ARRAYYVERUSUARIOID = $USUARIO_ADO->verUsuario($IDUSUARIOS);
    $ARRAYYVERAUSUARIOIDMAX5 = $AUSUARIO_ADO->buscarAusuarioPorNombreUsuarioUltimasCinco($IDUSUARIOS);

    foreach ($ARRAYYVERUSUARIOID as $r) :
        $RUTUSUARIO = "" . $r['RUT_USUARIO'];
        $NOMBREUSUARIO = "" . $r['NOMBRE_USUARIO'];

        $PNOMBREUSUARIO = "" . $r['PNOMBRE_USUARIO'];
        $SNOMBREUSUARIO = "" . $r['SNOMBRE_USUARIO'];
        $PAPELLIDOUSUARIO = "" . $r['PAPELLIDO_USUARIO'];
        $SAPELLIDOUSUARIO = "" . $r['SAPELLIDO_USUARIO'];

        $CORREO = "" . $r['EMAIL_USUARIO'];
        $TELEFONO = "" . $r['TELEFONO_USUARIO'];
    endforeach;
}



?>


<!DOCTYPE html>
<html lang="es">

<head>
    <title>Editar Perfil</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="description" content="">
    <meta name="author" content="">
    <!- LLAMADA DE LOS ARCHIVOS NECESARIOS PARA DISEÑO Y FUNCIONES BASE DE LA VISTA -!>
        <?php include_once "../config/urlHead.php"; ?>
        <!- FUNCIONES BASES -!>
            <script type="text/javascript">
                function validacion() {

                    NOMBREUSUARIO = document.getElementById("NOMBREUSUARIO").value;

                    PNOMBREUSUARIO = document.getElementById("PNOMBREUSUARIO").value;
                    SNOMBREUSUARIO = document.getElementById("SNOMBREUSUARIO").value;
                    PAPELLIDOUSUARIO = document.getElementById("PAPELLIDOUSUARIO").value;
                    SAPELLIDOUSUARIO = document.getElementById("SAPELLIDOUSUARIO").value;

                    RUTUSUARIO = document.getElementById("RUTUSUARIO").value;
                    TELEFONO = document.getElementById("TELEFONO").value;
                    CORREO = document.getElementById("CORREO").value;


                    document.getElementById('val_nombre').innerHTML = "";

                    document.getElementById('val_pnombre').innerHTML = "";
                    document.getElementById('val_snombre').innerHTML = "";
                    document.getElementById('val_papellido').innerHTML = "";
                    document.getElementById('val_sapellido').innerHTML = "";

                    document.getElementById('val_rutusuario').innerHTML = "";
                    document.getElementById('val_telefono').innerHTML = "";
                    document.getElementById('val_correo').innerHTML = "";

                    if (NOMBREUSUARIO == null || NOMBREUSUARIO.length == 0 || /^\s+$/.test(NOMBREUSUARIO)) {
                        document.form_reg_dato.NOMBREUSUARIO.focus();
                        document.form_reg_dato.NOMBREUSUARIO.style.borderColor = "#FF0000";
                        document.getElementById('val_nombre').innerHTML = "NO A INGRESADO DATO";
                        return false;
                    }
                    document.form_reg_dato.NOMBREUSUARIO.style.borderColor = "#4AF575";



                    if (RUTUSUARIO == null || RUTUSUARIO.length == 0 || /^\s+$/.test(RUTUSUARIO)) {
                        document.form_reg_dato.RUTUSUARIO.focus();
                        document.form_reg_dato.RUTUSUARIO.style.borderColor = "#FF0000";
                        document.getElementById('val_rutusuario').innerHTML = "NO A INGRESADO DATO";
                        return false;
                    }
                    document.form_reg_dato.RUTUSUARIO.style.borderColor = "#4AF575";


                    if (PNOMBREUSUARIO == null || PNOMBREUSUARIO.length == 0 || /^\s+$/.test(PNOMBREUSUARIO)) {
                        document.form_reg_dato.PNOMBREUSUARIO.focus();
                        document.form_reg_dato.PNOMBREUSUARIO.style.borderColor = "#FF0000";
                        document.getElementById('val_pnombre').innerHTML = "NO A INGRESADO DATO";
                        return false;
                    }
                    document.form_reg_dato.PNOMBREUSUARIO.style.borderColor = "#4AF575";

                    if (SNOMBREUSUARIO == null || SNOMBREUSUARIO.length == 0 || /^\s+$/.test(SNOMBREUSUARIO)) {
                        document.form_reg_dato.SNOMBREUSUARIO.focus();
                        document.form_reg_dato.SNOMBREUSUARIO.style.borderColor = "#FF0000";
                        document.getElementById('val_snombre').innerHTML = "NO A INGRESADO DATO";
                        return false;
                    }
                    document.form_reg_dato.SNOMBREUSUARIO.style.borderColor = "#4AF575";


                    if (PAPELLIDOUSUARIO == null || PAPELLIDOUSUARIO.length == 0 || /^\s+$/.test(PAPELLIDOUSUARIO)) {
                        document.form_reg_dato.PAPELLIDOUSUARIO.focus();
                        document.form_reg_dato.PAPELLIDOUSUARIO.style.borderColor = "#FF0000";
                        document.getElementById('val_papellido').innerHTML = "NO A INGRESADO DATO";
                        return false;
                    }
                    document.form_reg_dato.PAPELLIDOUSUARIO.style.borderColor = "#4AF575";

                    if (SAPELLIDOUSUARIO == null || SAPELLIDOUSUARIO.length == 0 || /^\s+$/.test(SAPELLIDOUSUARIO)) {
                        document.form_reg_dato.SAPELLIDOUSUARIO.focus();
                        document.form_reg_dato.SAPELLIDOUSUARIO.style.borderColor = "#FF0000";
                        document.getElementById('val_sapellido').innerHTML = "NO A INGRESADO DATO";
                        return false;
                    }
                    document.form_reg_dato.SAPELLIDOUSUARIO.style.borderColor = "#4AF575";



                    if (TELEFONO == null || TELEFONO == 0) {
                        document.form_reg_dato.TELEFONO.focus();
                        document.form_reg_dato.TELEFONO.style.borderColor = "#FF0000";
                        document.getElementById('val_telefono').innerHTML = "NO A INGRESADO DATO";
                        return false;
                    }
                    document.form_reg_dato.TELEFONO.style.borderColor = "#4AF575";

                    if (CORREO == null || CORREO.length == 0 || /^\s+$/.test(CORREO)) {
                        document.form_reg_dato.CORREO.focus();
                        document.form_reg_dato.CORREO.style.borderColor = "#FF0000";
                        document.getElementById('val_correo').innerHTML = "NO A INGRESADO DATO";
                        return false;
                    }
                    document.form_reg_dato.CORREO.style.borderColor = "#4AF575";

                    if (!(/^(([^<>()[\]\.,;:\s@\"]+(\.[^<>()[\]\.,;:\s@\"]+)*)|(\".+\"))@(([^<>()[\]\.,;:\s@\"]+\.)+[^<>()[\]\.,;:\s@\"]{2,})$/i
                            .test(CORREO))) {
                        document.form_reg_dato.CORREO.focus();
                        document.form_reg_dato.CORREO.style.borderColor = "#ff0000";
                        document.getElementById('val_correo').innerHTML = "FORMATO DE CORREO INCORRECTO";
                        return false;
                    }
                    document.form_reg_dato.CORREO.style.borderColor = "#4AF575";

                }

                //REDIRECCIONAR A LA PAGINA SELECIONADA
                function irPagina(url) {
                    location.href = "" + url;
                }
                //FUNCION PARA OBTENER HORA Y FECHA
                function mueveReloj() {


                    momentoActual = new Date();

                    dia = momentoActual.getDate();
                    mes = momentoActual.getMonth() + 1;
                    ano = momentoActual.getFullYear();

                    hora = momentoActual.getHours();
                    minuto = momentoActual.getMinutes();
                    segundo = momentoActual.getSeconds();

                    if (dia < 10) {
                        dia = "0" + dia;
                    }

                    if (mes < 10) {
                        mes = "0" + mes;
                    }
                    if (hora < 10) {
                        hora = "0" + hora;
                    }
                    if (minuto < 10) {
                        minuto = "0" + minuto;
                    }
                    if (segundo < 10) {
                        segundo = "0" + segundo;
                    }

                    horaImprimible = hora + " : " + minuto ;
                    fechaImprimible = dia + "-" + mes + "-" + ano;


                    //     document.form_reg_dato.HORARECEPCION.value = horaImprimible;
                    document.fechahora.fechahora.value = fechaImprimible + " " + horaImprimible;
                    setTimeout("mueveReloj()", 1000);
                }
            </script>

</head>

<body class="hold-transition light-skin fixed sidebar-mini theme-primary" onload="mueveReloj()">
    <div class="wrapper">
        <!- LLAMADA AL MENU PRINCIPAL DE LA PAGINA-!>
            <?php include_once "../config/menu.php"; ?>
            <div class="content-wrapper">
                <div class="container-full">

                    <!-- Content Header (Page header) -->
                    <div class="content-header">
                        <div class="d-flex align-items-center">
                            <div class="mr-auto">
                                <h3 class="page-title">Editar Perfil</h3>
                                <div class="d-inline-block align-items-center">
                                    <nav>
                                        <ol class="breadcrumb">
                                            <li class="breadcrumb-item"><a href="index.php"><i class="mdi mdi-home-outline"></i></a></li>
                                            <li class="breadcrumb-item" aria-current="page">Perfil</li>
                                            <li class="breadcrumb-item active" aria-current="page"> <a href="editarUsuario.php"> Editar Perfil </a>
                                            </li>
                                        </ol>
                                    </nav>
                                </div>
                            </div>
                            <div class="right-title">
                                <div class="d-flex mt-10 justify-content-end">
                                    <div class="d-lg-flex mr-20 ml-10 d-none">
                                        <div class="chart-text mr-10">
                                            <!--
                                        <h6 class="mb-0"><small>THIS MONTH</small></h6>
                                        <h4 class="mt-0 text-primary">$12,125</h4>-->
                                        </div>
                                    </div>
                                    <div class="d-lg-flex mr-20 ml-10 d-none">
                                        <div class="chart-text mr-10">
                                            <!--
                                        <h6 class="mb-0"><small>LAST YEAR</small></h6>
                                        <h4 class="mt-0 text-danger">$22,754</h4>-->
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Main content -->
                    <section class="content">

                        <div class="row">
                            <div class="col-xl-4 col-lg-5">

                                <!-- Profile Image -->
                                <div class="box">
                                    <div class="box-body box-profile">
                                        <!--
                                            <img class="rounded img-fluid mx-auto d-block max-w-150" src="#" alt="User profile picture">
                                        -->
                                        <h3 class="profile-username text-center mb-0"> <?php echo $NOMBREUSUARIOS; ?> </h3>
                                        <h4 class="text-center mt-0">
                                            <i class="fa fa-envelope-o mr-10"></i>
                                            <?php
                                            $ARRAYTUSUARIO = $TUSUARIO_ADO->verTusuario($_SESSION["TIPO_USUARIO"]);

                                            if ($ARRAYTUSUARIO) {
                                                echo $ARRAYTUSUARIO[0]['NOMBRE_TUSUARIO'];
                                            }

                                            ?>
                                        </h4>
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="media-list media-list-hover media-list-divided w-p100 mt-30">
                                                    <h4 class="media media-single p-15">
                                                        <i class="fa fa-arrow-circle-o-right mr-10"></i>
                                                        <span class="title">
                                                            <a href="verUsuario.php">
                                                                Mi Perfil
                                                            </a>
                                                        </span>
                                                    </h4>
                                                    <h4 class="media media-single p-15">
                                                        <i class="fa fa-arrow-circle-o-right mr-10"></i>
                                                        <span class="title">
                                                            <a href="editarUsuario.php">
                                                                Editar Perfil
                                                            </a>
                                                        </span>
                                                    </h4>
                                                    <h4 class="media media-single p-15">
                                                        <i class="fa fa-arrow-circle-o-right mr-10"></i>
                                                        <span class="title">
                                                            <a href="editarUsuarioClave.php">
                                                                Cambiar Contrasena
                                                            </a>
                                                        </span>
                                                    </h4>

                                                    <h4 class="media media-single p-15">
                                                        <i class="fa fa-arrow-circle-o-right mr-10"></i>
                                                        <span class="title">
                                                            <a href="verUsuarioActividad.php">
                                                                Mi Actividad
                                                            </a>
                                                        </span>
                                                    </h4>
                                                </div>
                                            </div>

                                            <h3 class="title w-p100 mt-10 mb-0 p-20">ULTIMAS 5 OPERACIONES</h3>
                                            <div class="col-12">
                                                <div class="media-list media-list-hover w-p100 mt-0">
                                                    <?php foreach ($ARRAYYVERAUSUARIOIDMAX5 as $r) : ?>
                                                        <h5 class="media media-single py-10 px-0 w-p100 justify-content-between">
                                                            <p>
                                                                <i class="fa fa-circle text-success pr-10 font-size-12"></i> <?php echo $r['TABLA_OBJETIVO_AUSUARIO']; ?>
                                                                <span class="subtitle pl-20 mt-10"> ID
                                                                    <span class="text-success">
                                                                        <?php echo $r['ID_AUSUARIO']; ?>
                                                                    </span>
                                                                </span>
                                                            </p>
                                                            <p class="text-right pull-right">

                                                                <?php if ($r['TIPO_OPERACION_AUSUARIO'] == "1") { ?>
                                                                    <span class="badge badge-sm badge-success mb-10">
                                                                        <?php echo "REGISTRO"; ?>
                                                                    </span>
                                                                <?php     } ?>

                                                                <?php if ($r['TIPO_OPERACION_AUSUARIO'] == "2") { ?>
                                                                    <span class="badge badge-sm badge-Warning  mb-10">
                                                                        <?php echo "MODIFICACION"; ?>
                                                                    </span>
                                                                <?php     } ?>

                                                                <?php if ($r['TIPO_OPERACION_AUSUARIO'] == "3") { ?>
                                                                    <span class="badge badge-sm badge-Danger   mb-10">
                                                                        <?php echo "DESACTIVAR"; ?>
                                                                    </span>
                                                                <?php     } ?>

                                                                <?php if ($r['TIPO_OPERACION_AUSUARIO'] == "4") { ?>
                                                                    <span class="badge badge-sm badge-primary    mb-10">
                                                                        <?php echo "ACTIVAR"; ?>
                                                                    </span>
                                                                <?php     } ?>
                                                                <br>
                                                                <?php echo $r['FECHA_AUSUARIO||']; ?>
                                                            </p>
                                                        </h5>
                                                    <?php endforeach; ?>


                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- /.box-body -->
                                </div>
                                <!-- /.box -->
                            </div>
                            <!-- /.col -->
                            <div class="col-xl-8 col-lg-7">
                                <div class="box">
                                    <div class="box-header with-border">
                                        <h3 class="box-title">Editar Perfil </h3>
                                    </div>
                                    <!-- /.box-header -->

                                    <form class="form" role="form" method="post" name="form_reg_dato" onsubmit="return validacion()">
                                        <div class="box-body">
                                            <div class="row">
                                                <div class="col-12">
                                                    <div class="form-group row">
                                                        <label class="col-sm-2 col-form-label">Nombre Usuario</label>
                                                        <div class="col-sm-10">
                                                            <input type="hidden" class="form-control" placeholder="Nombre Usuario" id="NOMBREUSUARIOV" name="NOMBREUSUARIOV" value="<?php echo $NOMBREUSUARIO; ?>" <?php echo $FOCUS; ?> <?php echo  $BORDER; ?> />
                                                            <input type="text" class="form-control" placeholder="Nombre Usuario" id="NOMBREUSUARIO" name="NOMBREUSUARIO" value="<?php echo $NOMBREUSUARIO; ?>" <?php echo $FOCUS; ?> <?php echo  $BORDER; ?> disabled />
                                                        </div>
                                                        <label id="val_nombre" class="validacion"> </label>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-sm-2 col-form-label">Rut</label>
                                                        <div class="col-sm-10">
                                                            <input type="text" class="form-control" placeholder="Rut " id="RUTUSUARIO" name="RUTUSUARIO" value="<?php echo $RUTUSUARIO; ?>" <?php echo $FOCUS; ?> <?php echo  $BORDER; ?> <?php echo $DISABLED; ?> />
                                                        </div>
                                                        <label id="val_rutusuario" class="validacion"> </label>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-sm-2 col-form-label">Primer Nombre</label>
                                                        <div class="col-sm-10">
                                                            <input type="text" class="form-control" placeholder="Primer Nombre" id="PNOMBREUSUARIO" name="PNOMBREUSUARIO" value="<?php echo $PNOMBREUSUARIO; ?>" <?php echo $FOCUS; ?> <?php echo  $BORDER; ?> <?php echo $DISABLED; ?> />
                                                        </div>
                                                        <label id="val_snombre" class="validacion"> </label>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-sm-2 col-form-label">Segundo Nombre</label>
                                                        <div class="col-sm-10">
                                                            <input type="text" class="form-control" placeholder="Segundo Nombre" id="SNOMBREUSUARIO" name="SNOMBREUSUARIO" value="<?php echo $SNOMBREUSUARIO; ?>" <?php echo $FOCUS; ?> <?php echo  $BORDER; ?> <?php echo $DISABLED; ?> />
                                                        </div>
                                                        <label id="val_snombre" class="validacion"> </label>
                                                    </div>

                                                    <div class="form-group row">
                                                        <label class="col-sm-2 col-form-label">Primer Apellido</label>
                                                        <div class="col-sm-10">
                                                            <input type="text" class="form-control" placeholder="Primer Apellido" id="PAPELLIDOUSUARIO" name="PAPELLIDOUSUARIO" value="<?php echo $PAPELLIDOUSUARIO; ?>" <?php echo $FOCUS; ?> <?php echo  $BORDER; ?> <?php echo $DISABLED; ?> />
                                                        </div>
                                                        <label id="val_papellido" class="validacion"> </label>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-sm-2 col-form-label">Segundo Apellido</label>
                                                        <div class="col-sm-10">
                                                            <input type="text" class="form-control" placeholder="Segundo Apellido" id="SAPELLIDOUSUARIO" name="SAPELLIDOUSUARIO" value="<?php echo $SAPELLIDOUSUARIO; ?>" <?php echo $FOCUS; ?> <?php echo  $BORDER; ?> <?php echo $DISABLED; ?> />
                                                        </div>
                                                        <label id="val_sapellido" class="validacion"> </label>
                                                    </div>


                                                    <div class="form-group row">
                                                        <label class="col-sm-2 col-form-label">Telefono </label>
                                                        <div class="col-sm-10">
                                                            <input type="text" class="form-control" placeholder="Telefono" id="TELEFONO" name="TELEFONO" value="<?php echo $TELEFONO; ?>" <?php echo $FOCUS; ?> <?php echo  $BORDER; ?> <?php echo $DISABLED; ?> />
                                                        </div>
                                                        <label id="val_telefono" class="validacion"> </label>
                                                    </div>

                                                    <div class="form-group row">
                                                        <label class="col-sm-2 col-form-label">Correo </label>
                                                        <div class="col-sm-10">
                                                            <input type="text" class="form-control" placeholder="Correo" id="CORREO" name="CORREO" value="<?php echo $CORREO; ?>" <?php echo $FOCUS; ?> <?php echo  $BORDER; ?> <?php echo $DISABLED; ?> />
                                                        </div>
                                                        <label id="val_correo" class="validacion"> </label>
                                                    </div>
                                                </div>
                                                <!-- /.col -->
                                            </div>
                                            <!-- /.row -->
                                        </div>
                                        <div class="box-footer">
                                            <button type="button" class="btn btn-rounded  btn-success btn-outline mr-1" name="CANCELAR" value="CANCELAR" Onclick="irPagina('index.php'); ">
                                                <i class="ti-back-left "></i> Volver
                                            </button>

                                            <button type="submit" class="btn btn-rounded btn-primary btn-outline" name="EDITAR" value="EDITAR">
                                                <i class="ti-save-alt"></i> Guardar
                                            </button>
                                        </div>
                                    </form>
                                    <!-- /.box-body -->
                                </div>
                                <!-- /.box -->
                            </div>
                            <!-- /.col -->
                        </div>



                    </section>
                    <!-- /.content -->

                </div>
            </div>






            <!- LLAMADA ARCHIVO DEL DISEÑO DEL FOOTER Y MENU USUARIO -!>
                <?php include_once "../config/footer.php"; ?>
                <?php include_once "../config/menuExtra.php"; ?>
    </div>
    <!- LLAMADA URL DE ARCHIVOS DE DISEÑO Y JQUERY E OTROS -!>
        <?php include_once "../config/urlBase.php"; ?>
</body>

</html>