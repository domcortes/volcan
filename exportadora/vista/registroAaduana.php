<?php

include_once "../config/validarUsuario.php";

//LLAMADA ARCHIVOS NECESARIOS PARA LAS OPERACIONES

include_once '../controlador/CIUDAD_ADO.php';

include_once '../controlador/AADUANA_ADO.php';
include_once '../modelo/AADUANA.php';

//INCIALIZAR LAS VARIBLES
//INICIALIZAR CONTROLADOR
$CIUDAD_ADO =  new CIUDAD_ADO();

$AADUANA_ADO =  new AADUANA_ADO();
//INIICIALIZAR MODELO
$AADUANA =  new AADUANA();


//INCIALIZAR VARIBALES A OCUPAR PARA LA FUNCIONALIDAD
$IDOP = "";
$OP = "";
$DISABLED = "";

$RUTAADUANA = "";
$DVAADUANA = "";
$NOMBREAADUANA = "";
$DIRECCIONAADUANA = "";
$RAZONSOCIALAADUANA = "";
$GIROAADUANA = "";
$CONTACTOAADUANA = "";
$TELEFONOAADUANA = "";
$EMAILAADUANA = "";
$CIUDAD = "";



$SINO = "";


//INICIALIZAR ARREGLOS
$ARRAYAADUANA = "";
$ARRAYAADUANAID = "";
$ARRAYCIUDAD = "";

//DEFINIR ARREGLOS CON LOS DATOS OBTENIDOS DE LAS FUNCIONES DE LOS CONTROLADORES
$ARRAYAADUANA = $AADUANA_ADO->listarAaduanaPorEmpresaCBX($EMPRESAS);
$ARRAYCIUDAD = $CIUDAD_ADO->listarCiudadCBX();
include_once "../config/validarDatosUrl.php";
include_once "../config/datosUrl.php";



//OPERACIONES
//OPERACION DE REGISTRO DE FILA

if (isset($_REQUEST['GUARDAR'])) {

    $ARRAYNUMERO = $AADUANA_ADO->obtenerNumero($EMPRESAS);
    $NUMERO = $ARRAYNUMERO[0]['NUMERO'] + 1;

    //UTILIZACION METODOS SET DEL MODELO
    //SETEO DE ATRIBUTOS DE LA CLASE, OBTENIDO EN EL FORMULARIO   
    $AADUANA->__SET('NUMERO_AADUANA', $NUMERO);
    $AADUANA->__SET('RUT_AADUANA', $_REQUEST['RUTAADUANA']);
    $AADUANA->__SET('DV_AADUANA', $_REQUEST['DVAADUANA']);
    $AADUANA->__SET('NOMBRE_AADUANA', $_REQUEST['NOMBREAADUANA']);
    $AADUANA->__SET('RAZON_SOCIAL_AADUANA', $_REQUEST['RAZONSOCIALAADUANA']);
    $AADUANA->__SET('GIRO_AADUANA', $_REQUEST['GIROAADUANA']);
    $AADUANA->__SET('DIRECCION_AADUANA', $_REQUEST['DIRECCIONAADUANA']);
    $AADUANA->__SET('CONTACTO_AADUANA', $_REQUEST['CONTACTOAADUANA']);
    $AADUANA->__SET('TELEFONO_AADUANA', $_REQUEST['TELEFONOAADUANA']);
    $AADUANA->__SET('EMAIL_AADUANA', $_REQUEST['EMAILAADUANA']);
    $AADUANA->__SET('ID_CIUDAD', $_REQUEST['CIUDAD']);
    $AADUANA->__SET('ID_EMPRESA', $_REQUEST['EMPRESA']);
    $AADUANA->__SET('ID_USUARIOI', $IDUSUARIOS);
    $AADUANA->__SET('ID_USUARIOM', $IDUSUARIOS);
    //LLAMADA AL METODO DE REGISTRO DEL CONTROLADOR
    $AADUANA_ADO->agregarAaduana($AADUANA);
    //REDIRECCIONAR A PAGINA registroAaduana.php
    echo "<script type='text/javascript'> location.href ='registroAaduana.php';</script>";
}
//OPERACION EDICION DE FILA
if (isset($_REQUEST['EDITAR'])) {
    //UTILIZACION METODOS SET DEL MODELO
    //SETEO DE ATRIBUTOS DE LA CLASE, OBTENIDO EN EL FORMULARIO  
    $AADUANA->__SET('RUT_AADUANA', $_REQUEST['RUTAADUANA']);
    $AADUANA->__SET('DV_AADUANA', $_REQUEST['DVAADUANA']);
    $AADUANA->__SET('NOMBRE_AADUANA', $_REQUEST['NOMBREAADUANA']);
    $AADUANA->__SET('RAZON_SOCIAL_AADUANA', $_REQUEST['RAZONSOCIALAADUANA']);
    $AADUANA->__SET('GIRO_AADUANA', $_REQUEST['GIROAADUANA']);
    $AADUANA->__SET('DIRECCION_AADUANA', $_REQUEST['DIRECCIONAADUANA']);
    $AADUANA->__SET('CONTACTO_AADUANA', $_REQUEST['CONTACTOAADUANA']);
    $AADUANA->__SET('TELEFONO_AADUANA', $_REQUEST['TELEFONOAADUANA']);
    $AADUANA->__SET('EMAIL_AADUANA', $_REQUEST['EMAILAADUANA']);
    $AADUANA->__SET('ID_CIUDAD', $_REQUEST['CIUDAD']);
    $AADUANA->__SET('ID_USUARIOM', $IDUSUARIOS);
    $AADUANA->__SET('ID_AADUANA', $_REQUEST['ID']);
    //LLAMADA AL METODO DE EDICION DEL CONTROLADOR
    $AADUANA_ADO->actualizarAaduana($AADUANA);
    //REDIRECCIONAR A PAGINA registroAaduana.php
    echo "<script type='text/javascript'> location.href ='registroAaduana.php';</script>";
}

//OBTENCION DE DATOS ENVIADOR A LA URL
//PARA OPERACIONES DE EDICION Y VISUALIZACION
if (isset($_SESSION['parametro']) && isset($_SESSION['parametro1'])) {
    //ALMACENAR DATOS DE VARIABLES DE LA URL
    $IDOP = $_SESSION['parametro'];
    $OP = $_SESSION['parametro1'];




    //IDENTIFICACIONES DE OPERACIONES    //OPERACION DE CAMBIO DE ESTADO
    //0 = DESACTIVAR
    if ($OP == "0") {

        $AADUANA->__SET('ID_AADUANA', $IDOP);
        $AADUANA_ADO->deshabilitar($AADUANA);

        echo "<script type='text/javascript'> location.href ='registroAaduana.php';</script>";
    }
    //1 = ACTIVAR
    if ($OP == "1") {

        $AADUANA->__SET('ID_AADUANA', $IDOP);
        $AADUANA_ADO->habilitar($AADUANA);
        echo "<script type='text/javascript'> location.href ='registroAaduana.php';</script>";
    }

    //editar =  OBTENCION DE DATOS PARA LA EDICION DE REGISTRO
    if ($OP == "editar") {

        //OBTENCION DE INFORMACIOND DE LA FILA DEL REGISTRO
        //ALMACENAR INFORMACION EN ARREGLO
        //LLAMADA A LA FUNCION DE CONTROLADOR verPlanta(ID), 
        //SE LE PASE UNO DE LOS DATOS OBTENIDO PREVIAMENTE A TRAVEZ DE LA URL
        $ARRAYAADUANAID = $AADUANA_ADO->verAaduana($IDOP);
        //OBTENCIONS DE LOS DATODS DE LA COLUMNAS DE LA FILA OBTENIDA
        //PASAR DATOS OBTENIDOS A VARIABLES QUE SE VISUALIZAR EN EL FORMULARIO DE LA VISTA

        foreach ($ARRAYAADUANAID as $r) :


            $RUTAADUANA = "" . $r['RUT_AADUANA'];
            $DVAADUANA = "" . $r['DV_AADUANA'];
            $NOMBREAADUANA = "" . $r['NOMBRE_AADUANA'];
            $RAZONSOCIALAADUANA = "" . $r['RAZON_SOCIAL_AADUANA'];
            $GIROAADUANA = "" . $r['GIRO_AADUANA'];
            $DIRECCIONAADUANA = "" . $r['DIRECCION_AADUANA'];
            $CONTACTOAADUANA = "" . $r['CONTACTO_AADUANA'];
            $TELEFONOAADUANA = "" . $r['TELEFONO_AADUANA'];
            $EMAILAADUANA = "" . $r['EMAIL_AADUANA'];
            $CIUDAD = "" . $r['ID_CIUDAD'];

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
        $ARRAYAADUANAID = $AADUANA_ADO->verAaduana($IDOP);
        //OBTENCIONS DE LOS DATODS DE LA COLUMNAS DE LA FILA OBTENIDA
        //PASAR DATOS OBTENIDOS A VARIABLES QUE SE VISUALIZAR EN EL FORMULARIO DE LA VISTA

        foreach ($ARRAYAADUANAID as $r) :
            $RUTAADUANA = "" . $r['RUT_AADUANA'];
            $DVAADUANA = "" . $r['DV_AADUANA'];
            $NOMBREAADUANA = "" . $r['NOMBRE_AADUANA'];
            $RAZONSOCIALAADUANA = "" . $r['RAZON_SOCIAL_AADUANA'];
            $GIROAADUANA = "" . $r['GIRO_AADUANA'];
            $DIRECCIONAADUANA = "" . $r['DIRECCION_AADUANA'];
            $CONTACTOAADUANA = "" . $r['CONTACTO_AADUANA'];
            $TELEFONOAADUANA = "" . $r['TELEFONO_AADUANA'];
            $EMAILAADUANA = "" . $r['EMAIL_AADUANA'];
            $CIUDAD = "" . $r['ID_CIUDAD'];
        endforeach;
    }
}



?>


<!DOCTYPE html>
<html lang="es">

<head>
    <title>Registro Agente Aduana</title>
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




                    RUTAADUANA = document.getElementById("RUTAADUANA").value;
                    DVAADUANA = document.getElementById("DVAADUANA").value;
                    NOMBREAADUANA = document.getElementById("NOMBREAADUANA").value;


                    RAZONSOCIALAADUANA = document.getElementById("RAZONSOCIALAADUANA").value;
                    GIROAADUANA = document.getElementById("GIROAADUANA").value;

                    DIRECCIONAADUANA = document.getElementById("DIRECCIONAADUANA").value;
                    CIUDAD = document.getElementById("CIUDAD").selectedIndex;
                    CONTACTOAADUANA = document.getElementById("CONTACTOAADUANA").value;
                    TELEFONOAADUANA = document.getElementById("TELEFONOAADUANA").value;
                    EMAILAADUANA = document.getElementById("EMAILAADUANA").value;


                    document.getElementById('val_rut').innerHTML = "";
                    document.getElementById('val_dv').innerHTML = "";
                    document.getElementById('val_nombre').innerHTML = "";
                    document.getElementById('val_rsocial').innerHTML = "";
                    document.getElementById('val_giro').innerHTML = "";
                    document.getElementById('val_direccion').innerHTML = "";
                    document.getElementById('val_ciudad').innerHTML = "";
                    document.getElementById('val_contacto').innerHTML = "";
                    document.getElementById('val_telefono').innerHTML = "";
                    document.getElementById('val_email').innerHTML = "";

                    if (RUTAADUANA == null || RUTAADUANA.length == 0 || /^\s+$/.test(RUTAADUANA)) {
                        document.form_reg_dato.RUTAADUANA.focus();
                        document.form_reg_dato.RUTAADUANA.style.borderColor = "#FF0000";
                        document.getElementById('val_rut').innerHTML = "NO A INGRESADO DATO";
                        return false;
                    }
                    document.form_reg_dato.RUTAADUANA.style.borderColor = "#4AF575";

                    if (DVAADUANA == null || DVAADUANA.length == 0 || /^\s+$/.test(DVAADUANA)) {
                        document.form_reg_dato.DVAADUANA.focus();
                        document.form_reg_dato.DVAADUANA.style.borderColor = "#FF0000";
                        document.getElementById('val_dv').innerHTML = "NO A INGRESADO DATO";
                        return false;
                    }
                    document.form_reg_dato.DVAADUANA.style.borderColor = "#4AF575";

                    if (NOMBREAADUANA == null || NOMBREAADUANA.length == 0 || /^\s+$/.test(NOMBREAADUANA)) {
                        document.form_reg_dato.NOMBREAADUANA.focus();
                        document.form_reg_dato.NOMBREAADUANA.style.borderColor = "#FF0000";
                        document.getElementById('val_nombre').innerHTML = "NO A INGRESADO DATO";
                        return false;
                    }
                    document.form_reg_dato.NOMBREAADUANA.style.borderColor = "#4AF575";


                    if (RAZONSOCIALAADUANA == null || RAZONSOCIALAADUANA.length == 0 || /^\s+$/.test(RAZONSOCIALAADUANA)) {
                        document.form_reg_dato.RAZONSOCIALAADUANA.focus();
                        document.form_reg_dato.RAZONSOCIALAADUANA.style.borderColor = "#FF0000";
                        document.getElementById('val_rsocial').innerHTML = "NO A INGRESADO DATO";
                        return false;
                    }
                    document.form_reg_dato.RAZONSOCIALAADUANA.style.borderColor = "#4AF575";


                    if (GIROAADUANA == null || GIROAADUANA.length == 0 || /^\s+$/.test(GIROAADUANA)) {
                        document.form_reg_dato.GIROAADUANA.focus();
                        document.form_reg_dato.GIROAADUANA.style.borderColor = "#FF0000";
                        document.getElementById('val_giro').innerHTML = "NO A INGRESADO DATO";
                        return false;
                    }
                    document.form_reg_dato.GIROAADUANA.style.borderColor = "#4AF575";

                    if (DIRECCIONAADUANA == null || DIRECCIONAADUANA.length == 0 || /^\s+$/.test(DIRECCIONAADUANA)) {
                        document.form_reg_dato.DIRECCIONAADUANA.focus();
                        document.form_reg_dato.DIRECCIONAADUANA.style.borderColor = "#FF0000";
                        document.getElementById('val_direccion').innerHTML = "NO A INGRESADO DATO";
                        return false;
                    }
                    document.form_reg_dato.DIRECCIONAADUANA.style.borderColor = "#4AF575";
                    /*
                        if (CIUDAD == null || CIUDAD == 0) {
                            document.form_reg_dato.CIUDAD.focus();
                            document.form_reg_dato.CIUDAD.style.borderColor = "#FF0000";
                            document.getElementById('val_ciudad').innerHTML = "NO HA SELECCIONADO  NINGUNA ALTERNATIVA";
                            return false;
                        }
                        document.form_reg_dato.CIUDAD.style.borderColor = "#4AF575";



                        if (CONTACTOAADUANA == null || CONTACTOAADUANA.length == 0 || /^\s+$/.test(CONTACTOAADUANA)) {
                            document.form_reg_dato.CONTACTOAADUANA.focus();
                            document.form_reg_dato.CONTACTOAADUANA.style.borderColor = "#FF0000";
                            document.getElementById('val_contacto').innerHTML = "NO A INGRESADO DATO";
                            return false;
                        }
                        document.form_reg_dato.CONTACTOAADUANA.style.borderColor = "#4AF575";


                        if (TELEFONOAADUANA == null || TELEFONOAADUANA == 0) {
                            document.form_reg_dato.TELEFONOAADUANA.focus();
                            document.form_reg_dato.TELEFONOAADUANA.style.borderColor = "#FF0000";
                            document.getElementById('val_telefono').innerHTML = "NO A INGRESADO DATO";
                            return false;
                        }
                        document.form_reg_dato.TELEFONOAADUANA.style.borderColor = "#4AF575";


                        if (EMAILAADUANA == null || EMAILAADUANA.length == 0 || /^\s+$/.test(EMAILAADUANA)) {
                            document.form_reg_dato.EMAILAADUANA.focus();
                            document.form_reg_dato.EMAILAADUANA.style.borderColor = "#FF0000";
                            document.getElementById('val_email').innerHTML = "NO A INGRESADO DATO";
                            return false;
                        }
                        document.form_reg_dato.EMAILAADUANA.style.borderColor = "#4AF575";


                        if (!(/^(([^<>()[\]\.,;:\s@\"]+(\.[^<>()[\]\.,;:\s@\"]+)*)|(\".+\"))@(([^<>()[\]\.,;:\s@\"]+\.)+[^<>()[\]\.,;:\s@\"]{2,})$/i
                                .test(EMAILAADUANA))) {
                            document.form_reg_dato.EMAILAADUANA.focus();
                            document.form_reg_dato.EMAILAADUANA.style.borderColor = "#ff0000";
                            document.getElementById('val_email').innerHTML = "FORMATO DE CORREO INCORRECTO";
                            return false;
                        }
                        document.form_reg_dato.EMAILAADUANA.style.borderColor = "#4AF575";
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
                                <h3 class="page-title">Agente Aduana</h3>
                                <div class="d-inline-block align-items-center">
                                    <nav>
                                        <ol class="breadcrumb">
                                            <li class="breadcrumb-item"><a href="index.php"><i class="mdi mdi-home-outline"></i></a></li>
                                            <li class="breadcrumb-item" aria-current="page">Mantenedores</li>
                                            <li class="breadcrumb-item" aria-current="page">Instructivo</li>
                                            <li class="breadcrumb-item active" aria-current="page"> <a href="registroAaduana.php"> Operaciones Agente Aduana</a>
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
                                                        <input type="text" class="form-control" placeholder="Rut Agente Aduana" id="RUTAADUANA" name="RUTAADUANA" value="<?php echo $RUTAADUANA; ?>" <?php echo $DISABLED; ?> />
                                                        <label id="val_rut" class="validacion"> </label>
                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <div class="form-group">
                                                        <label>DV </label>
                                                        <input type="text" class="form-control" placeholder="DV Agente Aduana" id="DVAADUANA" name="DVAADUANA" value="<?php echo $DVAADUANA; ?>" <?php echo $DISABLED; ?> />
                                                        <label id="val_dv" class="validacion"> </label>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>Nombre </label>
                                                        <input type="text" class="form-control" placeholder="Nombre Agente Aduana" id="NOMBREAADUANA" name="NOMBREAADUANA" value="<?php echo $NOMBREAADUANA; ?>" <?php echo $DISABLED; ?> />
                                                        <label id="val_nombre" class="validacion"> </label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>Razon social </label>
                                                        <input type="text" class="form-control" placeholder="Razon social Agente Aduana" id="RAZONSOCIALAADUANA" name="RAZONSOCIALAADUANA" value="<?php echo $RAZONSOCIALAADUANA; ?>" <?php echo $DISABLED; ?> />
                                                        <label id="val_rsocial" class="validacion"> </label>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>Giro </label>
                                                        <input type="text" class="form-control" placeholder="Giro Agente Aduana" id="GIROAADUANA" name="GIROAADUANA" value="<?php echo $GIROAADUANA; ?>" <?php echo $DISABLED; ?> />
                                                        <label id="val_giro" class="validacion"> </label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>Direccion </label>
                                                        <input type="text" class="form-control" placeholder="Direccion Agente Aduana" id="DIRECCIONAADUANA" name="DIRECCIONAADUANA" value="<?php echo $DIRECCIONAADUANA; ?>" <?php echo $DISABLED; ?> />
                                                        <label id="val_direccion" class="validacion"> </label>
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-12">
                                                    <div class="form-group">
                                                        <label>Ciudad </label>
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


                                            <label>Contacto </label>
                                            <hr class="my-15">
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label>Contacto </label>
                                                        <input type="text" class="form-control" placeholder="Nombre Contacto Agente Aduana" id="CONTACTOAADUANA" name="CONTACTOAADUANA" value="<?php echo $CONTACTOAADUANA; ?>" <?php echo $DISABLED; ?> />
                                                        <label id="val_contacto" class="validacion"> </label>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label>Telefono </label>
                                                        <input type="number" class="form-control" placeholder="Telefono Contacto Agente Aduana" id="TELEFONOAADUANA" name="TELEFONOAADUANA" value="<?php echo $TELEFONOAADUANA; ?>" <?php echo $DISABLED; ?> />
                                                        <label id="val_telefono" class="validacion"> </label>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label>Email </label>
                                                        <input type="text" class="form-control" placeholder="Email Contacto Agente Aduana" id="EMAILAADUANA" name="EMAILAADUANA" value="<?php echo $EMAILAADUANA; ?>" <?php echo $DISABLED; ?> />
                                                        <label id="val_email" class="validacion"> </label>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                        <!-- /.box-body -->
                                        <div class="box-footer">
                                            <button type="button" class="btn btn-rounded btn-warning btn-outline mr-1" name="CANCELAR" value="CANCELAR" Onclick="irPagina('registroAaduana.php'); ">
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
                                        <h4 class="box-title">Registros</h4>
                                    </div>
                                    <div class="box-body">
                                        <div class="table-responsive">
                                            <table id="listar" class="table table-hover " style="width: 100%;">
                                                <thead>
                                                    <tr class="center">
                                                        <th>Numero </th>
                                                        <th>Nombre </th>
                                                        <th>Operaciones</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php foreach ($ARRAYAADUANA as $r) : ?>
                                                        <tr class="center">
                                                            <td>
                                                                <a href="#" class="text-warning hover-warning">
                                                                    <?php echo $r['NUMERO_AADUANA']; ?>
                                                                </a>
                                                            </td>
                                                            <td><?php echo $r['NOMBRE_AADUANA']; ?></td>
                                                            <td class="text-center">
                                                                <form method="post" id="form1">
                                                                    <div class="list-icons d-inline-flex">
                                                                        <div class="list-icons-item dropdown">
                                                                            <a href="#" class="list-icons-item dropdown-toggle" data-toggle="dropdown">
                                                                                <i class="glyphicon glyphicon-cog"></i>
                                                                            </a>
                                                                            <div class="dropdown-menu dropdown-menu-right">
                                                                                <input type="hidden" class="form-control" placeholder="ID" id="ID" name="ID" value="<?php echo $r['ID_AADUANA']; ?>" />
                                                                                <input type="hidden" class="form-control" placeholder="URL" id="URL" name="URL" value="registroAaduana" />
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