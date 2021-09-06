<?php

include_once "../config/validarUsuario.php";

//LLAMADA ARCHIVOS NECESARIOS PARA LAS OPERACIONES
include_once '../controlador/NAVIERA_ADO.php';
include_once '../controlador/CIUDAD_ADO.php';
include_once '../modelo/NAVIERA.php';

//INCIALIZAR LAS VARIBLES
//INICIALIZAR CONTROLADOR

$NAVIERA_ADO =  new NAVIERA_ADO();
$CIUDAD_ADO =  new CIUDAD_ADO();
//INIICIALIZAR MODELO
$NAVIERA =  new NAVIERA();


//INCIALIZAR VARIBALES A OCUPAR PARA LA FUNCIONALIDAD
$IDOP = "";
$OP = "";
$DISABLED = "";

$RUTNAVIERA = "";
$DVNAVIERA = "";
$NOMBRENAVIERA = "";
$GIRONAVIERA = "";
$RAZONSOCIALNAVIERA = "";
$DIRRECIONNAVIERA = "";
$NOTANAVIERA = "";
$CONTACTONAVIERA = "";
$TELEFONONAVIERA = "";
$EMAILNAVIERA = "";
$CIUDAD = "";
$NUMERO="";


//INICIALIZAR ARREGLOS
$ARRAYNAVIERA = "";
$ARRAYNAVIERAID = "";
$ARRAYCIUDAD = "";
$ARRAYNAVIERA="";




//DEFINIR ARREGLOS CON LOS DATOS OBTENIDOS DE LAS FUNCIONES DE LOS CONTROLADORES
$ARRAYNAVIERA = $NAVIERA_ADO->listarNavierPorEmpresaCBX($EMPRESAS);
$ARRAYCIUDAD = $CIUDAD_ADO->listarCiudadCBX();
include_once "../config/validarDatosUrl.php";
include_once "../config/datosUrl.php";

//OPERACIONES
//OPERACION DE REGISTRO DE FILA
if (isset($_REQUEST['GUARDAR'])) {



    $ARRAYNUMERO = $NAVIERA_ADO->obtenerNumero($EMPRESAS);
    $NUMERO = $ARRAYNUMERO[0]['NUMERO'] + 1;


    //UTILIZACION METODOS SET DEL MODELO
    //SETEO DE ATRIBUTOS DE LA CLASE, OBTENIDO EN EL FORMULARIO   
    $NAVIERA->__SET('NUMERO_NAVIERA', $NUMERO);
    $NAVIERA->__SET('RUT_NAVIERA', $_REQUEST['RUTNAVIERA']);
    $NAVIERA->__SET('DV_NAVIERA', $_REQUEST['DVNAVIERA']);
    $NAVIERA->__SET('NOMBRE_NAVIERA', $_REQUEST['NOMBRENAVIERA']);
    $NAVIERA->__SET('GIRO_NAVIERA', $_REQUEST['GIRONAVIERA']);
    $NAVIERA->__SET('RAZON_SOCIAL_NAVIERA', $_REQUEST['RAZONSOCIALNAVIERA']);
    $NAVIERA->__SET('DIRECCION_NAVIERA', $_REQUEST['DIRRECIONNAVIERA']);
    $NAVIERA->__SET('CONTACTO_NAVIERA', $_REQUEST['CONTACTONAVIERA']);
    $NAVIERA->__SET('TELEFONO_NAVIERA', $_REQUEST['TELEFONONAVIERA']);
    $NAVIERA->__SET('EMAIL_NAVIERA', $_REQUEST['EMAILNAVIERA']);
    $NAVIERA->__SET('NOTA_NAVIERA', $_REQUEST['NOTANAVIERA']);
    $NAVIERA->__SET('ID_CIUDAD', $_REQUEST['CIUDAD']);
    $NAVIERA->__SET('ID_EMPRESA', $_REQUEST['EMPRESA']);
    $NAVIERA->__SET('ID_USUARIOI', $IDUSUARIOS);
    $NAVIERA->__SET('ID_USUARIOM', $IDUSUARIOS);
    //LLAMADA AL METODO DE REGISTRO DEL CONTROLADOR
    $NAVIERA_ADO->agregarNaviera($NAVIERA);
    //REDIRECCIONAR A PAGINA registroNaviera.php
    echo "<script type='text/javascript'> location.href ='registroNaviera.php';</script>";
}
//OPERACION DE EDICION DE FILA
if (isset($_REQUEST['EDITAR'])) {
    //UTILIZACION METODOS SET DEL MODELO
    //SETEO DE ATRIBUTOS DE LA CLASE, OBTENIDO EN EL FORMULARIO   



    $NAVIERA->__SET('RUT_NAVIERA', $_REQUEST['RUTNAVIERA']);
    $NAVIERA->__SET('DV_NAVIERA', $_REQUEST['DVNAVIERA']);
    $NAVIERA->__SET('NOMBRE_NAVIERA', $_REQUEST['NOMBRENAVIERA']);
    $NAVIERA->__SET('GIRO_NAVIERA', $_REQUEST['GIRONAVIERA']);
    $NAVIERA->__SET('RAZON_SOCIAL_NAVIERA', $_REQUEST['RAZONSOCIALNAVIERA']);
    $NAVIERA->__SET('DIRECCION_NAVIERA', $_REQUEST['DIRRECIONNAVIERA']);
    $NAVIERA->__SET('CONTACTO_NAVIERA', $_REQUEST['CONTACTONAVIERA']);
    $NAVIERA->__SET('TELEFONO_NAVIERA', $_REQUEST['TELEFONONAVIERA']);
    $NAVIERA->__SET('EMAIL_NAVIERA', $_REQUEST['EMAILNAVIERA']);
    $NAVIERA->__SET('NOTA_NAVIERA', $_REQUEST['NOTANAVIERA']);
    $NAVIERA->__SET('CIUDAD', $_REQUEST['CIUDAD']);
    $NAVIERA->__SET('ID_USUARIOM', $IDUSUARIOS);
    $NAVIERA->__SET('ID_NAVIERA', $_REQUEST['ID']);
    //LLAMADA AL METODO DE EDICION DEL CONTROLADOR
    $NAVIERA_ADO->actualizarNaviera($NAVIERA);
    //REDIRECCIONAR A PAGINA registroNaviera.php
    echo "<script type='text/javascript'> location.href ='registroNaviera.php';</script>";
}

//OBTENCION DE DATOS ENVIADOR A LA URL
//PARA OPERACIONES DE EDICION Y VISUALIZACION
//PREGUNTA SI LA URL VIENE  CON DATOS "parametro" y "parametro1"
if (isset($_SESSION['parametro']) && isset($_SESSION['parametro1'])) {
    //ALMACENAR DATOS DE VARIABLES DE LA URL
    $IDOP = $_SESSION['parametro'];
    $OP = $_SESSION['parametro1'];


    //IDENTIFICACIONES DE OPERACIONES    //OPERACION DE CAMBIO DE ESTADO
    //0 = DESACTIVAR
    if ($OP == "0") {

        $NAVIERA->__SET('ID_NAVIERA', $IDOP);
        $NAVIERA_ADO->deshabilitar($NAVIERA);

        echo "<script type='text/javascript'> location.href ='registroNaviera.php';</script>";
    }
    //1 = ACTIVAR
    if ($OP == "1") {

        $NAVIERA->__SET('ID_NAVIERA', $IDOP);
        $NAVIERA_ADO->habilitar($NAVIERA);
        echo "<script type='text/javascript'> location.href ='registroNaviera.php';</script>";
    }
    //editar =  OBTENCION DE DATOS PARA LA EDICION DE REGISTRO
    if ($OP == "editar") {
        //OBTENCION DE INFORMACIOND DE LA FILA DEL REGISTRO
        //ALMACENAR INFORMACION EN ARREGLO
        //LLAMADA A LA FUNCION DE CONTROLADOR verPlanta(ID), 
        //SE LE PASE UNO DE LOS DATOS OBTENIDO PREVIAMENTE A TRAVEZ DE LA URL
        $ARRAYNAVIERAID = $NAVIERA_ADO->verNaviera($IDOP);
        //OBTENCIONS DE LOS DATODS DE LA COLUMNAS DE LA FILA OBTENIDA
        //PASAR DATOS OBTENIDOS A VARIABLES QUE SE VISUALIZAR EN EL FORMULARIO DE LA VISTA

        foreach ($ARRAYNAVIERAID as $r) :
            $RUTNAVIERA = "" . $r['RUT_NAVIERA'];
            $DVNAVIERA = "" . $r['DV_NAVIERA'];
            $NOMBRENAVIERA = "" . $r['NOMBRE_NAVIERA'];
            $GIRONAVIERA = "" . $r['GIRO_NAVIERA'];
            $RAZONSOCIALNAVIERA = "" . $r['RAZON_SOCIAL_NAVIERA'];
            $DIRRECIONNAVIERA = "" . $r['DIRECCION_NAVIERA'];
            $CIUDAD = "" . $r['CIUDAD'];
            $NOTANAVIERA = "" . $r['NOTA_NAVIERA'];
            $CONTACTONAVIERA = "" . $r['CONTACTO_NAVIERA'];
            $TELEFONONAVIERA = "" . $r['TELEFONO_NAVIERA'];
            $EMAILNAVIERA = "" . $r['EMAIL_NAVIERA'];
        endforeach;
    }

    //ver =  OBTENCION DE DATOS PARA LA VISUALIZAAR INFORMAICON DE REGISTRO
    if ($OP == "ver") {
        //DESABILITAR INPUT DEL FORMULARIO
        //PARA QUE NO MODIFIQUE NIGUNA INFORMACION, OBJETIVO ES VISUALIZAR INFORMACION
        $DISABLED = "disabled";
        //OBTENCION DE INFORMACIOND DE LA FILA DEL REGISTRO
        //ALMACENAR INFORMACION EN ARREGLO
        //LLAMADA A LA FUNCION DE CONTROLADOR verPlanta(ID), 
        //SE LE PASE UNO DE LOS DATOS OBTENIDO PREVIAMENTE A TRAVEZ DE LA URL
        $ARRAYNAVIERAID = $NAVIERA_ADO->verNaviera($IDOP);
        //OBTENCIONS DE LOS DATODS DE LA COLUMNAS DE LA FILA OBTENIDA
        //PASAR DATOS OBTENIDOS A VARIABLES QUE SE VISUALIZAR EN EL FORMULARIO DE LA VISTA        
        foreach ($ARRAYNAVIERAID as $r) :
            $RUTNAVIERA = "" . $r['RUT_NAVIERA'];
            $DVNAVIERA = "" . $r['DV_NAVIERA'];
            $NOMBRENAVIERA = "" . $r['NOMBRE_NAVIERA'];
            $GIRONAVIERA = "" . $r['GIRO_NAVIERA'];
            $RAZONSOCIALNAVIERA = "" . $r['RAZON_SOCIAL_NAVIERA'];
            $DIRRECIONNAVIERA = "" . $r['DIRECCION_NAVIERA'];
            $CIUDAD = "" . $r['CIUDAD'];
            $NOTANAVIERA = "" . $r['NOTA_NAVIERA'];
            $CONTACTONAVIERA = "" . $r['CONTACTO_NAVIERA'];
            $TELEFONONAVIERA = "" . $r['TELEFONO_NAVIERA'];
            $EMAILNAVIERA = "" . $r['EMAIL_NAVIERA'];
        endforeach;
    }
}


?>


<!DOCTYPE html>
<html lang="es">

<head>
    <title>Registro Naviera</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="description" content="">
    <meta name="author" content="">
    <!- LLAMADA DE LOS ARCHIVOS NECESARIOS PARA DISEÑO Y FUNCIONES BASE DE LA VISTA -!>
        <?php include_once "../config/urlHead.php"; ?>
        <!- FUNCIONES BASES -!>
            <script type="text/javascript">
                //VALIDACION DE FORMULARIO
                function validacion() {

                    RUTNAVIERA = document.getElementById("RUTNAVIERA").value;
                    DVNAVIERA = document.getElementById("DVNAVIERA").value;
                    NOMBRENAVIERA = document.getElementById("NOMBRENAVIERA").value;
                    GIRONAVIERA = document.getElementById("GIRONAVIERA").value;
                    RAZONSOCIALNAVIERA = document.getElementById("RAZONSOCIALNAVIERA").value;
                    DIRRECIONNAVIERA = document.getElementById("DIRRECIONNAVIERA").value;
                    CIUDAD = document.getElementById("CIUDAD").selectedIndex;
                    CONTACTONAVIERA = document.getElementById("CONTACTONAVIERA").value;
                    TELEFONONAVIERA = document.getElementById("TELEFONONAVIERA").value;
                    EMAILNAVIERA = document.getElementById("EMAILNAVIERA").value;

                    document.getElementById('val_rut').innerHTML = "";
                    document.getElementById('val_dv').innerHTML = "";
                    document.getElementById('val_nombre').innerHTML = "";
                    document.getElementById('val_giro').innerHTML = "";
                    document.getElementById('val_rsocial').innerHTML = "";
                    document.getElementById('val_dirrecion').innerHTML = "";
                    document.getElementById('val_ciudad').innerHTML = "";
                    document.getElementById('val_contacto').innerHTML = "";
                    document.getElementById('val_telefono').innerHTML = "";
                    document.getElementById('val_email').innerHTML = "";

                    if (RUTNAVIERA == null || RUTNAVIERA.length == 0 || /^\s+$/.test(RUTNAVIERA)) {
                        document.form_reg_dato.RUTNAVIERA.focus();
                        document.form_reg_dato.RUTNAVIERA.style.borderColor = "#FF0000";
                        document.getElementById('val_rut').innerHTML = "NO A INGRESADO DATO";
                        return false;
                    }
                    document.form_reg_dato.RUTNAVIERA.style.borderColor = "#4AF575";

                    if (DVNAVIERA == null || DVNAVIERA.length == 0 || /^\s+$/.test(DVNAVIERA)) {
                        document.form_reg_dato.DVNAVIERA.focus();
                        document.form_reg_dato.DVNAVIERA.style.borderColor = "#FF0000";
                        document.getElementById('val_dv').innerHTML = "NO A INGRESADO DATO";
                        return false;
                    }
                    document.form_reg_dato.DVNAVIERA.style.borderColor = "#4AF575";

                    if (NOMBRENAVIERA == null || NOMBRENAVIERA.length == 0 || /^\s+$/.test(NOMBRENAVIERA)) {
                        document.form_reg_dato.NOMBRENAVIERA.focus();
                        document.form_reg_dato.NOMBRENAVIERA.style.borderColor = "#FF0000";
                        document.getElementById('val_nombre').innerHTML = "NO A INGRESADO DATO";
                        return false;
                    }
                    document.form_reg_dato.NOMBRENAVIERA.style.borderColor = "#4AF575";

                    if (GIRONAVIERA == null || GIRONAVIERA.length == 0 || /^\s+$/.test(GIRONAVIERA)) {
                        document.form_reg_dato.GIRONAVIERA.focus();
                        document.form_reg_dato.GIRONAVIERA.style.borderColor = "#FF0000";
                        document.getElementById('val_giro').innerHTML = "NO A INGRESADO DATO";
                        return false;
                    }
                    document.form_reg_dato.GIRONAVIERA.style.borderColor = "#4AF575";

                    if (RAZONSOCIALNAVIERA == null || RAZONSOCIALNAVIERA.length == 0 || /^\s+$/.test(RAZONSOCIALNAVIERA)) {
                        document.form_reg_dato.RAZONSOCIALNAVIERA.focus();
                        document.form_reg_dato.RAZONSOCIALNAVIERA.style.borderColor = "#FF0000";
                        document.getElementById('val_rsocial').innerHTML = "NO A INGRESADO DATO";
                        return false;
                    }
                    document.form_reg_dato.RAZONSOCIALNAVIERA.style.borderColor = "#4AF575";


                    if (DIRRECIONNAVIERA == null || DIRRECIONNAVIERA.length == 0 || /^\s+$/.test(DIRRECIONNAVIERA)) {
                        document.form_reg_dato.DIRRECIONNAVIERA.focus();
                        document.form_reg_dato.DIRRECIONNAVIERA.style.borderColor = "#FF0000";
                        document.getElementById('val_dirrecion').innerHTML = "NO A INGRESADO DATO";
                        return false;
                    }
                    document.form_reg_dato.DIRRECIONNAVIERA.style.borderColor = "#4AF575";

                    /*
                    if (CIUDAD == null || CIUDAD == 0) {
                        document.form_reg_dato.CIUDAD.focus();
                        document.form_reg_dato.CIUDAD.style.borderColor = "#FF0000";
                        document.getElementById('val_ciudad').innerHTML = "NO HA SELECCIONADO  NINGUNA ALTERNATIVA";
                        return false;
                    }
                    document.form_reg_dato.CIUDAD.style.borderColor = "#4AF575";


                    if (CONTACTONAVIERA == null || CONTACTONAVIERA.length == 0 || /^\s+$/.test(CONTACTONAVIERA)) {
                        document.form_reg_dato.CONTACTONAVIERA.focus();
                        document.form_reg_dato.CONTACTONAVIERA.style.borderColor = "#FF0000";
                        document.getElementById('val_contacto').innerHTML = "NO A INGRESADO DATO";
                        return false;
                    }
                    document.form_reg_dato.CONTACTONAVIERA.style.borderColor = "#4AF575";


                    if (TELEFONONAVIERA == null || TELEFONONAVIERA == 0) {
                        document.form_reg_dato.TELEFONONAVIERA.focus();
                        document.form_reg_dato.TELEFONONAVIERA.style.borderColor = "#FF0000";
                        document.getElementById('val_telefono').innerHTML = "NO A INGRESADO DATO";
                        return false;
                    }
                    document.form_reg_dato.TELEFONONAVIERA.style.borderColor = "#4AF575";

                    if (EMAILNAVIERA == null || EMAILNAVIERA.length == 0 || /^\s+$/.test(EMAILNAVIERA)) {
                        document.form_reg_dato.EMAILNAVIERA.focus();
                        document.form_reg_dato.EMAILNAVIERA.style.borderColor = "#FF0000";
                        document.getElementById('val_email').innerHTML = "NO A INGRESADO DATO";
                        return false;
                    }
                    document.form_reg_dato.EMAILNAVIERA.style.borderColor = "#4AF575";

                    if (!(/^(([^<>()[\]\.,;:\s@\"]+(\.[^<>()[\]\.,;:\s@\"]+)*)|(\".+\"))@(([^<>()[\]\.,;:\s@\"]+\.)+[^<>()[\]\.,;:\s@\"]{2,})$/i.test(EMAILNAVIERA))) {
                        document.form_reg_dato.EMAILNAVIERA.focus();
                        document.form_reg_dato.EMAILNAVIERA.style.borderColor = "#ff0000";
                        document.getElementById('val_email').innerHTML = "FORMATO DE CORREO INCORRECTO";
                        return false;
                    }
                    document.form_reg_dato.EMAILNAVIERA.style.borderColor = "#4AF575";

                    */


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

                    horaImprimible = hora + " : " + minuto;
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

            <!-- Content Wrapper. Contains page content -->
            <div class="content-wrapper">
                <div class="container-full">

                    <!-- Content Header (Page header) -->
                    <div class="content-header">
                        <div class="d-flex align-items-center">
                            <div class="mr-auto">
                                <h3 class="page-title">Naviera</h3>
                                <div class="d-inline-block align-items-center">
                                    <nav>
                                        <ol class="breadcrumb">
                                            <li class="breadcrumb-item"><a href="index.php"><i class="mdi mdi-home-outline"></i></a></li>
                                            <li class="breadcrumb-item" aria-current="page">Mantenedores</li>
                                            <li class="breadcrumb-item" aria-current="page">Transporte</li>
                                            <li class="breadcrumb-item" aria-current="page">Maritimo</li>
                                            <li class="breadcrumb-item" aria-current="page">Naviera</li>
                                            <li class="breadcrumb-item active" aria-current="page"> <a href="registroNaviera.php"> Operaciones Naviera </a>
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
                            <div class="col-lg-6 col-12">
                                <div class="box">
                                    <div class="box-header with-border">
                                        <!--  
                                    <h4 class="box-title">Sample form 1</h4>
                                -->
                                    </div>
                                    <!-- /.box-header -->
                                    <form class="form" role="form" method="post" name="form_reg_dato" onsubmit="return validacion()">
                                        <div class="box-body">
                                            <h4 class="box-title text-info"><i class="ti-user mr-15"></i> Registro
                                            </h4>
                                            <hr class="my-15">


                                            <div class="row">
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label>Rut </label>
                                                        <input type="hidden" class="form-control" placeholder="ID" id="ID" name="ID" value="<?php echo $IDOP; ?>" />
                                                        <input type="hidden" class="form-control" placeholder="EMPRESA" id="EMPRESA" name="EMPRESA" value="<?php echo $EMPRESAS; ?>" />
                                                        <input type="text" class="form-control" placeholder="Rut Naviera" id="RUTNAVIERA" name="RUTNAVIERA" value="<?php echo $RUTNAVIERA; ?>" <?php echo $DISABLED; ?> />
                                                        <label id="val_rut" class="validacion"> </label>
                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <div class="form-group">
                                                        <label>DV </label>
                                                        <input type="text" class="form-control" placeholder="DV Naviera" id="DVNAVIERA" name="DVNAVIERA" value="<?php echo $DVNAVIERA; ?>" <?php echo $DISABLED; ?> />
                                                        <label id="val_dv" class="validacion"> </label>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>Nombre </label>
                                                        <input type="text" class="form-control" placeholder="Nombre Naviera" id="NOMBRENAVIERA" name="NOMBRENAVIERA" value="<?php echo $NOMBRENAVIERA; ?>" <?php echo $DISABLED; ?> />
                                                        <label id="val_nombre" class="validacion"> </label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>Giro </label>
                                                        <input type="text" class="form-control" placeholder="Giro Naviera" id="GIRONAVIERA" name="GIRONAVIERA" value="<?php echo $GIRONAVIERA; ?>" <?php echo $DISABLED; ?> />
                                                        <label id="val_giro" class="validacion"> </label>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>Razon Social </label>
                                                        <input type="text" class="form-control" placeholder="Razon Social Naviera" id="RAZONSOCIALNAVIERA" name="RAZONSOCIALNAVIERA" value="<?php echo $RAZONSOCIALNAVIERA; ?>" <?php echo $DISABLED; ?> />
                                                        <label id="val_rsocial" class="validacion"> </label>
                                                    </div>
                                                </div>

                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>Dirrecion </label>
                                                        <input type="text" class="form-control" placeholder="Dirrecion Naviera" id="DIRRECIONNAVIERA" name="DIRRECIONNAVIERA" value="<?php echo $DIRRECIONNAVIERA; ?>" <?php echo $DISABLED; ?> />
                                                        <label id="val_dirrecion" class="validacion"> </label>
                                                    </div>
                                                </div>

                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>Ciudad</label>
                                                        <select class="form-control select2" id="CIUDAD" name="CIUDAD" style="width: 100%;" value="<?php echo $CIUDAD; ?>" <?php echo $DISABLED; ?>>
                                                            <option></option>
                                                            <?php foreach ($ARRAYCIUDAD as $r) : ?>
                                                                <?php if ($ARRAYCIUDAD) {    ?>
                                                                    <option value="<?php echo $r['ID_CIUDAD']; ?>" <?php if ($CIUDAD == $r['ID_CIUDAD']) {
                                                                                                                        echo "selected";
                                                                                                                    } ?>>
                                                                        <?php echo $r['NOMBRE_CIUDAD'] ?>
                                                                    </option>
                                                                <?php } else { ?>
                                                                    <option>No Hay Datos Registrados </option>
                                                                <?php } ?>
                                                            <?php endforeach; ?>
                                                        </select>
                                                        <label id="val_ciudad" class="validacion"> </label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label>Nota </label>
                                                        <textarea class="form-control" rows="1" placeholder="Nota Naviera " id="NOTANAVIERA" name="NOTANAVIERA" <?php echo $DISABLED; ?>><?php echo $NOTANAVIERA; ?></textarea>
                                                        <label id="val_nota" class="validacion"> </label>
                                                    </div>
                                                </div>
                                            </div>

                                            <labe>Contacto</labe>
                                            <hr class="my-15">
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label>Nombre </label>
                                                        <input type="text" class="form-control" placeholder="Nombre Contacto Naviera" id="CONTACTONAVIERA" name="CONTACTONAVIERA" value="<?php echo $CONTACTONAVIERA; ?>" <?php echo $DISABLED; ?> />
                                                        <label id="val_contacto" class="validacion"> </label>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label>Telefono </label>
                                                        <input type="number" class="form-control" placeholder="Telefono Contacto Naviera" id="TELEFONONAVIERA" name="TELEFONONAVIERA" value="<?php echo $TELEFONONAVIERA; ?>" <?php echo $DISABLED; ?> />
                                                        <label id="val_telefono" class="validacion"> </label>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label>Email </label>
                                                        <input type="text" class="form-control" placeholder="Email Contacto Naviera" id="EMAILNAVIERA" name="EMAILNAVIERA" value="<?php echo $EMAILNAVIERA; ?>" <?php echo $DISABLED; ?> />
                                                        <label id="val_email" class="validacion"> </label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- /.box-body -->
                                        <div class="box-footer">
                                            <button type="button" class="btn btn-rounded btn-warning btn-outline mr-1" name="CANCELAR" value="CANCELAR" Onclick="irPagina('registroNaviera.php'); ">
                                                <i class="ti-trash"></i> Cancelar
                                            </button>
                                            <?php if ($OP != "editar") { ?>
                                                <button type="submit" class="btn btn-rounded btn-primary btn-outline" name="GUARDAR" value="GUARDAR" <?php echo $DISABLED; ?>>
                                                    <i class="ti-save-alt"></i> Crear
                                                </button>
                                            <?php } else { ?>
                                                <button type="submit" class="btn btn-rounded btn-primary btn-outline" name="EDITAR" value="EDITAR">
                                                    <i class="ti-save-alt"></i> Guardar
                                                </button>
                                            <?php } ?>
                                        </div>
                                    </form>
                                </div>
                                <!-- /.box -->
                            </div>
                            <div class="col-lg-6 col-12">
                                <div class="box">
                                    <div class="box-header with-border">
                                        <h4 class="box-title">Registro</h4>
                                    </div>
                                    <div class="box-body">
                                        <div class="table-responsive">
                                            <table id="listar" class="table table-hover " style="width: 100%;">
                                                <thead>
                                                    <tr class="center">
                                                        <th>Numero </th>
                                                        <th>Nombe </th>
                                                        <th>Operaciones</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php foreach ($ARRAYNAVIERA as $r) : ?>
                                                        <tr class="center">
                                                            <td>
                                                                <a href="#" class="text-warning hover-warning">
                                                                    <?php echo $r['NUMERO_NAVIERA']; ?>
                                                                </a>
                                                            </td>
                                                            <td><?php echo $r['NOMBRE_NAVIERA']; ?></td>
                                                            <td class="text-center">
                                                                <form method="post" id="form1">
                                                                    <div class="list-icons d-inline-flex">
                                                                        <div class="list-icons-item dropdown">
                                                                            <a href="#" class="list-icons-item dropdown-toggle" data-toggle="dropdown">
                                                                                <i class="glyphicon glyphicon-cog"></i>
                                                                            </a>
                                                                            <div class="dropdown-menu dropdown-menu-right">
                                                                                <input type="hidden" class="form-control" placeholder="ID" id="ID" name="ID" value="<?php echo $r['ID_NAVIERA']; ?>" />
                                                                                <input type="hidden" class="form-control" placeholder="URL" id="URL" name="URL" value="registroNaviera" />
                                                                                <button type="submit" class="btn btn-rounded btn-outline-info btn-sm " id="VERURL" name="VERURL">
                                                                                    <i class="ti-eye"></i>
                                                                                </button>Ver
                                                                                <br>
                                                                                <button type="submit" class="btn btn-rounded btn-outline-warning btn-sm" id="EDITARURL" name="EDITARURL">
                                                                                    <i class="ti-pencil-alt"></i>
                                                                                </button>Editar
                                                                                <br>
                                                                                <?php if ($r['ESTADO_REGISTRO'] == 1) { ?>
                                                                                    <button type="submit" class="btn btn-rounded btn-outline-danger btn-sm" id="ELIMINARURL" name="ELIMINARURL">
                                                                                        <i class="ti-na "></i>
                                                                                    </button>Desahabilitar
                                                                                    <br>
                                                                                <?php } ?>
                                                                                <?php if ($r['ESTADO_REGISTRO'] == 0) { ?>
                                                                                    <button type="submit" class="btn btn-rounded btn-outline-success btn-sm" id="HABILITARURL" name="HABILITARURL">
                                                                                        <i class="ti-check "></i>
                                                                                    </button>Habilitar
                                                                                    <br>
                                                                                <?php } ?>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </form>
                                                            </td>
                                                        </tr>

                                                    <?php endforeach; ?>

                                                </tbody>

                                            </table>



                                        </div>


                                    </div>

                                </div>
                                <!-- /.box -->

                            </div>

                        </div>
                        <!--.row -->

                    </section>
                    <!-- /.content -->

                </div>
            </div>
            <!-- /.content-wrapper -->


            <!- LLAMADA ARCHIVO DEL DISEÑO DEL FOOTER Y MENU USUARIO -!>
                <?php include_once "../config/footer.php"; ?>
                <?php include_once "../config/menuExtra.php"; ?>
    </div>
    <!- LLAMADA URL DE ARCHIVOS DE DISEÑO Y JQUERY E OTROS -!>
        <?php include_once "../config/urlBase.php"; ?>
</body>

</html>