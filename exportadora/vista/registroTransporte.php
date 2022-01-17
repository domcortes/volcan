<?php

include_once "../../assest/config/validarUsuarioExpo.php";


//LLAMADA ARCHIVOS NECESARIOS PARA LAS OPERACIONES

include_once '../../assest/controlador/TRANSPORTE_ADO.php';
include_once '../../assest/controlador/CIUDAD_ADO.php';
include_once '../../assest/modelo/TRANSPORTE.php';

//INCIALIZAR LAS VARIBLES
//INICIALIZAR CONTROLADOR

$TRANSPORTE_ADO =  new TRANSPORTE_ADO();
$CIUDAD_ADO =  new CIUDAD_ADO();
//INIICIALIZAR MODELO
$TRANSPORTE =  new TRANSPORTE();


//INCIALIZAR VARIBALES A OCUPAR PARA LA FUNCIONALIDAD
$IDOP = "";
$OP = "";
$DISABLED = "";

$RUTTRANSPORTE = "";
$DVTRANSPORTE = "";
$NOMBRETRANSPORTE = "";
$GIROTRANSPORTE = "";
$RAZONSOCIALTRANSPORTE = "";
$DIRRECIONTRANSPORTE = "";
$NOTATRANSPORTE = "";
$CONTACTOTRANSPORTE = "";
$TELEFONOTRANSPORTE = "";
$EMAILTRANSPORTE = "";
$CIUDAD = "";
$EMPRESA = "";
$NUMERO = "";


//INICIALIZAR ARREGLOS
$ARRAYTRANSPORTE = "";
$ARRAYTRANSPORTEID = "";
$ARRAYCIUDAD = "";
$ARRAYEMPRESA = "";
$ARRAYNUMERO = "";




//DEFINIR ARREGLOS CON LOS DATOS OBTENIDOS DE LAS FUNCIONES DE LOS CONTROLADORES
$ARRAYTRANSPORTE = $TRANSPORTE_ADO->listarTransportePorEmpresaCBX($EMPRESAS);
$ARRAYCIUDAD = $CIUDAD_ADO->listarCiudad3CBX();
$ARRAYEMPRESA = $EMPRESA_ADO->listarEmpresaCBX();
include_once "../../assest/config/validarDatosUrl.php";
include_once "../../assest/config/datosUrl.php";


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

        $TRANSPORTE->__SET('ID_TRANSPORTE', $IDOP);
        $TRANSPORTE_ADO->deshabilitar($TRANSPORTE);

        echo "<script type='text/javascript'> location.href ='registroTransporte.php';</script>";
    }
    //1 = ACTIVAR
    if ($OP == "1") {

        $TRANSPORTE->__SET('ID_TRANSPORTE', $IDOP);
        $TRANSPORTE_ADO->habilitar($TRANSPORTE);
        echo "<script type='text/javascript'> location.href ='registroTransporte.php';</script>";
    }
    //editar =  OBTENCION DE DATOS PARA LA EDICION DE REGISTRO
    if ($OP == "editar") {
        //OBTENCION DE INFORMACIOND DE LA FILA DEL REGISTRO
        //ALMACENAR INFORMACION EN ARREGLO
        //LLAMADA A LA FUNCION DE CONTROLADOR verPlanta(ID), 
        //SE LE PASE UNO DE LOS DATOS OBTENIDO PREVIAMENTE A TRAVEZ DE LA URL
        $ARRAYTRANSPORTEID = $TRANSPORTE_ADO->verTransporte($IDOP);
        //OBTENCIONS DE LOS DATODS DE LA COLUMNAS DE LA FILA OBTENIDA
        //PASAR DATOS OBTENIDOS A VARIABLES QUE SE VISUALIZAR EN EL FORMULARIO DE LA VISTA

        foreach ($ARRAYTRANSPORTEID as $r) :
            $RUTTRANSPORTE = "" . $r['RUT_TRANSPORTE'];
            $DVTRANSPORTE = "" . $r['RUT_TRANSPORTE'];
            $NOMBRETRANSPORTE = "" . $r['NOMBRE_TRANSPORTE'];
            $GIROTRANSPORTE = "" . $r['GIRO_TRANSPORTE'];
            $RAZONSOCIALTRANSPORTE = "" . $r['RAZON_SOCIAL_TRANSPORTE'];
            $DIRRECIONTRANSPORTE = "" . $r['DIRECCION_TRANSPORTE'];
            $NOTATRANSPORTE = "" . $r['NOTA_TRANSPORTE'];
            $CONTACTOTRANSPORTE = "" . $r['CONTACTO_TRANSPORTE'];
            $TELEFONOTRANSPORTE = "" . $r['TELEFONO_TRANSPORTE'];
            $EMAILTRANSPORTE = "" . $r['EMAIL_TRANSPORTE'];
            $CIUDAD = "" . $r['ID_CIUDAD'];
            $EMPRESA = "" . $r['ID_EMPRESA'];
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
        $ARRAYTRANSPORTEID = $TRANSPORTE_ADO->verTransporte($IDOP);
        //OBTENCIONS DE LOS DATODS DE LA COLUMNAS DE LA FILA OBTENIDA
        //PASAR DATOS OBTENIDOS A VARIABLES QUE SE VISUALIZAR EN EL FORMULARIO DE LA VISTA        
        foreach ($ARRAYTRANSPORTEID as $r) :
            $RUTTRANSPORTE = "" . $r['RUT_TRANSPORTE'];
            $DVTRANSPORTE = "" . $r['RUT_TRANSPORTE'];
            $NOMBRETRANSPORTE = "" . $r['NOMBRE_TRANSPORTE'];
            $GIROTRANSPORTE = "" . $r['GIRO_TRANSPORTE'];
            $RAZONSOCIALTRANSPORTE = "" . $r['RAZON_SOCIAL_TRANSPORTE'];
            $DIRRECIONTRANSPORTE = "" . $r['DIRECCION_TRANSPORTE'];
            $NOTATRANSPORTE = "" . $r['NOTA_TRANSPORTE'];
            $CONTACTOTRANSPORTE = "" . $r['CONTACTO_TRANSPORTE'];
            $TELEFONOTRANSPORTE = "" . $r['TELEFONO_TRANSPORTE'];
            $EMAILTRANSPORTE = "" . $r['EMAIL_TRANSPORTE'];
            $CIUDAD = "" . $r['ID_CIUDAD'];
            $EMPRESA = "" . $r['ID_EMPRESA'];
        endforeach;
    }
}


?>


<!DOCTYPE html>
<html lang="es">

<head>
    <title>Registro Transporte</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="description" content="">
    <meta name="author" content="">
    <!- LLAMADA DE LOS ARCHIVOS NECESARIOS PARA DISEÑO Y FUNCIONES BASE DE LA VISTA -!>
        <?php include_once "../../assest/config/urlHead.php"; ?>
        <!- FUNCIONES BASES -!>
            <script type="text/javascript">
                //VALIDACION DE FORMULARIO
                function validacion() {

                    RUTTRANSPORTE = document.getElementById("RUTTRANSPORTE").value;
                    DVTRANSPORTE = document.getElementById("DVTRANSPORTE").value;
                    NOMBRETRANSPORTE = document.getElementById("NOMBRETRANSPORTE").value;
                    GIROTRANSPORTE = document.getElementById("GIROTRANSPORTE").value;
                    RAZONSOCIALTRANSPORTE = document.getElementById("RAZONSOCIALTRANSPORTE").value;
                    DIRRECIONTRANSPORTE = document.getElementById("DIRRECIONTRANSPORTE").value;
                    CIUDAD = document.getElementById("CIUDAD").selectedIndex;
                    CONTACTOTRANSPORTE = document.getElementById("CONTACTOTRANSPORTE").value;
                    TELEFONOTRANSPORTE = document.getElementById("TELEFONOTRANSPORTE").value;
                    EMAILTRANSPORTE = document.getElementById("EMAILTRANSPORTE").value;

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

                    if (RUTTRANSPORTE == null || RUTTRANSPORTE.length == 0 || /^\s+$/.test(RUTTRANSPORTE)) {
                        document.form_reg_dato.RUTTRANSPORTE.focus();
                        document.form_reg_dato.RUTTRANSPORTE.style.borderColor = "#FF0000";
                        document.getElementById('val_rut').innerHTML = "NO A INGRESADO DATO";
                        return false;
                    }
                    document.form_reg_dato.RUTTRANSPORTE.style.borderColor = "#4AF575";

                    if (DVTRANSPORTE == null || DVTRANSPORTE.length == 0 || /^\s+$/.test(DVTRANSPORTE)) {
                        document.form_reg_dato.DVTRANSPORTE.focus();
                        document.form_reg_dato.DVTRANSPORTE.style.borderColor = "#FF0000";
                        document.getElementById('val_dv').innerHTML = "NO A INGRESADO DATO";
                        return false;
                    }
                    document.form_reg_dato.DVTRANSPORTE.style.borderColor = "#4AF575";


                    if (NOMBRETRANSPORTE == null || NOMBRETRANSPORTE.length == 0 || /^\s+$/.test(NOMBRETRANSPORTE)) {
                        document.form_reg_dato.NOMBRETRANSPORTE.focus();
                        document.form_reg_dato.NOMBRETRANSPORTE.style.borderColor = "#FF0000";
                        document.getElementById('val_nombre').innerHTML = "NO A INGRESADO DATO";
                        return false;
                    }
                    document.form_reg_dato.NOMBRETRANSPORTE.style.borderColor = "#4AF575";
                    /*
                    if (GIROTRANSPORTE == null || GIROTRANSPORTE.length == 0 || /^\s+$/.test(GIROTRANSPORTE)) {
                        document.form_reg_dato.GIROTRANSPORTE.focus();
                        document.form_reg_dato.GIROTRANSPORTE.style.borderColor = "#FF0000";
                        document.getElementById('val_giro').innerHTML = "NO A INGRESADO DATO";
                        return false;
                    }
                    document.form_reg_dato.GIROTRANSPORTE.style.borderColor = "#4AF575";

                    if (RAZONSOCIALTRANSPORTE == null || RAZONSOCIALTRANSPORTE.length == 0 || /^\s+$/.test(RAZONSOCIALTRANSPORTE)) {
                        document.form_reg_dato.RAZONSOCIALTRANSPORTE.focus();
                        document.form_reg_dato.RAZONSOCIALTRANSPORTE.style.borderColor = "#FF0000";
                        document.getElementById('val_rsocial').innerHTML = "NO A INGRESADO DATO";
                        return false;
                    }
                    document.form_reg_dato.RAZONSOCIALTRANSPORTE.style.borderColor = "#4AF575";
                    */

                    if (DIRRECIONTRANSPORTE == null || DIRRECIONTRANSPORTE.length == 0 || /^\s+$/.test(DIRRECIONTRANSPORTE)) {
                        document.form_reg_dato.DIRRECIONTRANSPORTE.focus();
                        document.form_reg_dato.DIRRECIONTRANSPORTE.style.borderColor = "#FF0000";
                        document.getElementById('val_dirrecion').innerHTML = "NO A INGRESADO DATO";
                        return false;
                    }
                    document.form_reg_dato.DIRRECIONTRANSPORTE.style.borderColor = "#4AF575";
                    /*
                    if (CIUDAD == null || CIUDAD == 0) {
                        document.form_reg_dato.CIUDAD.focus();
                        document.form_reg_dato.CIUDAD.style.borderColor = "#FF0000";
                        document.getElementById('val_ciudad').innerHTML = "NO HA SELECCIONADO  NINGUNA ALTERNATIVA";
                        return false;
                    }
                    document.form_reg_dato.CIUDAD.style.borderColor = "#4AF575";*/
                    /*

                    if (CONTACTOTRANSPORTE == null || CONTACTOTRANSPORTE.length == 0 || /^\s+$/.test(CONTACTOTRANSPORTE)) {
                        document.form_reg_dato.CONTACTOTRANSPORTE.focus();
                        document.form_reg_dato.CONTACTOTRANSPORTE.style.borderColor = "#FF0000";
                        document.getElementById('val_contacto').innerHTML = "NO A INGRESADO DATO";
                        return false;
                    }
                    document.form_reg_dato.CONTACTOTRANSPORTE.style.borderColor = "#4AF575";


                    if (TELEFONOTRANSPORTE == null || TELEFONOTRANSPORTE == 0) {
                        document.form_reg_dato.TELEFONOTRANSPORTE.focus();
                        document.form_reg_dato.TELEFONOTRANSPORTE.style.borderColor = "#FF0000";
                        document.getElementById('val_telefono').innerHTML = "NO A INGRESADO DATO";
                        return false;
                    }
                    document.form_reg_dato.TELEFONOTRANSPORTE.style.borderColor = "#4AF575";

                    if (EMAILTRANSPORTE == null || EMAILTRANSPORTE.length == 0 || /^\s+$/.test(EMAILTRANSPORTE)) {
                        document.form_reg_dato.EMAILTRANSPORTE.focus();
                        document.form_reg_dato.EMAILTRANSPORTE.style.borderColor = "#FF0000";
                        document.getElementById('val_email').innerHTML = "NO A INGRESADO DATO";
                        return false;
                    }
                    document.form_reg_dato.EMAILTRANSPORTE.style.borderColor = "#4AF575";

                    if (!(/^(([^<>()[\]\.,;:\s@\"]+(\.[^<>()[\]\.,;:\s@\"]+)*)|(\".+\"))@(([^<>()[\]\.,;:\s@\"]+\.)+[^<>()[\]\.,;:\s@\"]{2,})$/i.test(EMAILTRANSPORTE))) {
                        document.form_reg_dato.EMAILTRANSPORTE.focus();
                        document.form_reg_dato.EMAILTRANSPORTE.style.borderColor = "#ff0000";
                        document.getElementById('val_email').innerHTML = "FORMATO DE CORREO INCORRECTO";
                        return false;
                    }
                    document.form_reg_dato.EMAILTRANSPORTE.style.borderColor = "#4AF575";*/




                }


                //REDIRECCIONAR A LA PAGINA SELECIONADA
                function irPagina(url) {
                    location.href = "" + url;
                }
            </script>

</head>

<body class="hold-transition light-skin fixed sidebar-mini theme-primary" >
    <div class="wrapper">
        <!- LLAMADA AL MENU PRINCIPAL DE LA PAGINA-!>
            <?php include_once "../../assest/config/menuExpo.php"; ?>
            <!-- Content Wrapper. Contains page content -->
            <div class="content-wrapper">
                <div class="container-full">
                    <!-- Content Header (Page header) -->
                    <div class="content-header">
                        <div class="d-flex align-items-center">
                            <div class="mr-auto">
                                <h3 class="page-title">Transporte</h3>
                                <div class="d-inline-block align-items-center">
                                    <nav>
                                        <ol class="breadcrumb">
                                            <li class="breadcrumb-item"><a href="index.php"><i class="mdi mdi-home-outline"></i></a></li>
                                            <li class="breadcrumb-item" aria-current="page">Mantenedores</li>
                                            <li class="breadcrumb-item" aria-current="page">Transporte</li>
                                            <li class="breadcrumb-item" aria-current="page">Terrestre</li>
                                            <li class="breadcrumb-item active" aria-current="page"> <a href="#"> Registro Transporte </a> </li>
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
                            <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12 col-xs-12">
                                <div class="box">
                                    <div class="box-header with-border bg-primary">                                        
                                        <h4 class="box-title">Registro Transporte</h4>                                
                                    </div>
                                    <!-- /.box-header -->
                                    <form class="form" role="form" method="post" name="form_reg_dato" id="form_reg_dato"  >
                                        <div class="box-body">
                                            <hr class="my-15">
                                            <div class="row">
                                                 <div class="col-xxl-4 col-xl-4 col-lg-4 col-md-4 col-sm-4 col-4 col-xs-4">
                                                    <div class="form-group">
                                                        <label>Rut </label>
                                                        <input type="hidden" class="form-control" placeholder="ID" id="ID" name="ID" value="<?php echo $IDOP; ?>" />
                                                        <input type="hidden" class="form-control" placeholder="EMPRESA" id="EMPRESA" name="EMPRESA" value="<?php echo $EMPRESAS; ?>" />
                                                        <input type="text" class="form-control" placeholder="Rut Transporte" id="RUTTRANSPORTE" name="RUTTRANSPORTE" value="<?php echo $RUTTRANSPORTE; ?>" <?php echo $DISABLED; ?> />
                                                        <label id="val_rut" class="validacion"> </label>
                                                    </div>
                                                </div>
                                                 <div class="col-xxl-2 col-xl-2 col-lg-2 col-md-2 col-sm-2 col-2 col-xs-2">
                                                    <div class="form-group">
                                                        <label>DV </label>
                                                        <input type="text" class="form-control" placeholder="DV Transporte" id="DVTRANSPORTE" name="DVTRANSPORTE" value="<?php echo $DVTRANSPORTE; ?>" <?php echo $DISABLED; ?> />
                                                        <label id="val_dv" class="validacion"> </label>
                                                    </div>
                                                </div>
                                                 <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6 col-xs-6">
                                                    <div class="form-group">
                                                        <label>Nombre </label>
                                                        <input type="text" class="form-control" placeholder="Nombre Transporte" id="NOMBRETRANSPORTE" name="NOMBRETRANSPORTE" value="<?php echo $NOMBRETRANSPORTE; ?>" <?php echo $DISABLED; ?> />
                                                        <label id="val_nombre" class="validacion"> </label>
                                                    </div>
                                                </div>
                                                 <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6 col-xs-6">
                                                    <div class="form-group">
                                                        <label>Giro </label>
                                                        <input type="text" class="form-control" placeholder="Giro Transporte" id="GIROTRANSPORTE" name="GIROTRANSPORTE" value="<?php echo $GIROTRANSPORTE; ?>" <?php echo $DISABLED; ?> />
                                                        <label id="val_giro" class="validacion"> </label>
                                                    </div>
                                                </div>
                                                 <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6 col-xs-6">
                                                    <div class="form-group">
                                                        <label>Razon Social </label>
                                                        <input type="text" class="form-control" placeholder="Razon Social Transporte" id="RAZONSOCIALTRANSPORTE" name="RAZONSOCIALTRANSPORTE" value="<?php echo $RAZONSOCIALTRANSPORTE; ?>" <?php echo $DISABLED; ?> />
                                                        <label id="val_rsocial" class="validacion"> </label>
                                                    </div>
                                                </div>
                                                 <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6 col-xs-6">
                                                    <div class="form-group">
                                                        <label>Dirrecion </label>
                                                        <input type="text" class="form-control" placeholder="Dirrecion Transporte" id="DIRRECIONTRANSPORTE" name="DIRRECIONTRANSPORTE" value="<?php echo $DIRRECIONTRANSPORTE; ?>" <?php echo $DISABLED; ?> />
                                                        <label id="val_dirrecion" class="validacion"> </label>
                                                    </div>
                                                </div>
                                                <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6 col-xs-6">
                                                    <div class="form-group">
                                                        <label>Ciudad</label>
                                                        <select class="form-control select2" id="CIUDAD" name="CIUDAD" style="width: 100%;" value="<?php echo $CIUDAD; ?>" <?php echo $DISABLED; ?>>
                                                            <option></option>
                                                            <?php foreach ($ARRAYCIUDAD as $r) : ?>
                                                                <?php if ($ARRAYCIUDAD) {    ?>
                                                                    <option value="<?php echo $r['ID_CIUDAD']; ?>"
                                                                     <?php if ($CIUDAD == $r['ID_CIUDAD']) {   echo "selected";  } ?>>
                                                                     <?php echo $r['CIUDAD'] ?>, <?php echo $r['COMUNA'] ?>, <?php echo $r['PROVINCIA'] ?>, <?php echo $r['REGION'] ?>, <?php echo $r['PAIS'] ?>
                                                                    </option>
                                                                <?php } else { ?>
                                                                    <option>No Hay Datos Registrados </option>
                                                                <?php } ?>
                                                            <?php endforeach; ?>
                                                        </select>
                                                        <label id="val_ciudad" class="validacion"> </label>
                                                    </div>
                                                </div>
                                                 <div class="col-xxl-12 col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 col-xs-12">
                                                    <div class="form-group">
                                                        <label>Nota </label>
                                                        <textarea class="form-control" rows="1" placeholder="Nota Transporte " id="NOTATRANSPORTE" name="NOTATRANSPORTE" <?php echo $DISABLED; ?>><?php echo $NOTATRANSPORTE; ?></textarea>
                                                        <label id="val_nota" class="validacion"> </label>
                                                    </div>
                                                </div>
                                            </div>
                                            <labe>Contacto</labe>
                                            <hr class="my-15">
                                            <div class="row">
                                                 <div class="col-xxl-12 col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 col-xs-12">
                                                    <div class="form-group">
                                                        <label>Nombre </label>
                                                        <input type="text" class="form-control" placeholder="Nombre Contacto Transporte" id="CONTACTOTRANSPORTE" name="CONTACTOTRANSPORTE" value="<?php echo $CONTACTOTRANSPORTE; ?>" <?php echo $DISABLED; ?> />
                                                        <label id="val_contacto" class="validacion"> </label>
                                                    </div>
                                                </div>
                                                 <div class="col-xxl-12 col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 col-xs-12">
                                                    <div class="form-group">
                                                        <label>Telefono </label>
                                                        <input type="number" class="form-control" placeholder="Telefono Contacto Transporte" id="TELEFONOTRANSPORTE" name="TELEFONOTRANSPORTE" value="<?php echo $TELEFONOTRANSPORTE; ?>" <?php echo $DISABLED; ?> />
                                                        <label id="val_telefono" class="validacion"> </label>
                                                    </div>
                                                </div>
                                                 <div class="col-xxl-12 col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 col-xs-12">
                                                    <div class="form-group">
                                                        <label>Email </label>
                                                        <input type="text" class="form-control" placeholder="Email Contacto Transporte" id="EMAILTRANSPORTE" name="EMAILTRANSPORTE" value="<?php echo $EMAILTRANSPORTE; ?>" <?php echo $DISABLED; ?> />
                                                        <label id="val_email" class="validacion"> </label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- /.box-body -->                        
                                        <div class="box-footer">
                                            <div class="btn-group   col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12 col-xs-12 " role="group" aria-label="Acciones generales">                                    
                                                <button type="button" class="btn  btn-warning " data-toggle="tooltip" title="Cancelar" name="CANCELAR" value="CANCELAR" Onclick="irPagina('registroTransporte.php');">
                                                <i class="ti-trash"></i>Cancelar
                                                </button>
                                                <?php if ($OP != "editar") { ?>
                                                    <button type="submit" class="btn btn-primary" name="GUARDAR" value="GUARDAR"  data-toggle="tooltip" title="Guardar"  <?php echo $DISABLED; ?> Onclick="return validacion()">
                                                        <i class="ti-save-alt"></i> Guardar
                                                    </button>
                                                <?php } else { ?>
                                                    <button type="submit" class="btn btn-primary" name="EDITAR" value="EDITAR"   data-toggle="tooltip" title="Guardar" Onclick="return validacion()">
                                                        <i class="ti-save-alt"></i> Guardar
                                                    </button>
                                                <?php } ?>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <!-- /.box -->
                            </div>
                            <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12 col-xs-12">
                                <div class="box">
                                    <div class="box-header with-border bg-info">
                                        <h4 class="box-title">Agrupado Trasnporte</h4>
                                    </div>
                                    <div class="box-body">
                                        <div class="table-responsive">
                                            <table id="listar" class="table-hover " style="width: 100%;">
                                                <thead>
                                                    <tr class="center">
                                                        <th>Número </th>
                                                        <th>Nombe </th>
                                                        <th class="text-center">Operaciónes</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php foreach ($ARRAYTRANSPORTE as $r) : ?>
                                                        <tr class="center">
                                                            <td>
                                                                <a href="#" class="text-warning hover-warning">
                                                                    <?php echo $r['NUMERO_TRANSPORTE']; ?>
                                                                </a>
                                                            </td>
                                                            <td><?php echo $r['NOMBRE_TRANSPORTE']; ?></td>                                                                                                                                                
                                                            <td class="text-center">
                                                                <form method="post" id="form1">
                                                                    <div class="list-icons d-inline-flex">
                                                                        <div class="list-icons-item dropdown">
                                                                            <button class="btn btn-secondary" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                                <span class="icon-copy ti-settings"></span>
                                                                            </button>
                                                                            <div class="dropdown-menu dropdown-menu-right">
                                                                                <input type="hidden" class="form-control" placeholder="ID" id="ID" name="ID" value="<?php echo $r['ID_TRANSPORTE']; ?>" />
                                                                                <input type="hidden" class="form-control" placeholder="URL" id="URL" name="URL" value="registroTransporte" />
                                                                                <span href="#" class="dropdown-item" data-toggle="tooltip" title="Ver">
                                                                                    <button type="submit" class="btn btn-info btn-block  btn-sm" id="VERURL" name="VERURL">
                                                                                        <i class="ti-eye"></i> Ver
                                                                                    </button>
                                                                                </span> 
                                                                                <span href="#" class="dropdown-item" data-toggle="tooltip" title="Editar">
                                                                                    <button type="submit" class="btn  btn-warning btn-block   btn-sm" id="EDITARURL" name="EDITARURL">
                                                                                        <i class="ti-pencil-alt"></i> Editar
                                                                                    </button>
                                                                                </span>
                                                                                <?php if ($r['ESTADO_REGISTRO'] == 1) { ?>
                                                                                    <span href="#" class="dropdown-item" data-toggle="tooltip" title="Desahabilitar">
                                                                                        <button type="submit" class="btn btn-block btn-danger btn-sm" id="ELIMINARURL" name="ELIMINARURL">
                                                                                            <i class="ti-na "></i> Desahabilitar
                                                                                        </button>
                                                                                    </span>
                                                                                <?php } ?>
                                                                                <?php if ($r['ESTADO_REGISTRO'] == 0) { ?>
                                                                                    <span href="#" class="dropdown-item" data-toggle="tooltip" title="Habilitar">
                                                                                        <button type="submit" class="btn btn-block btn-success btn-sm" id="HABILITARURL" name="HABILITARURL">
                                                                                            <i class="ti-check "></i> Habilitar
                                                                                        </button>
                                                                                    </span>
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
                <?php include_once "../../assest/config/footer.php"; ?>
                <?php include_once "../../assest/config/menuExtraExpo.php"; ?>
    </div>
    <!- LLAMADA URL DE ARCHIVOS DE DISEÑO Y JQUERY E OTROS -!>
        <?php include_once "../../assest/config/urlBase.php"; ?>
        <?php 
            //OPERACIONES
            //OPERACION DE REGISTRO DE FILA
            if (isset($_REQUEST['GUARDAR'])) {
                $ARRAYNUMERO = $TRANSPORTE_ADO->obtenerNumero($_REQUEST['EMPRESA']);
                $NUMERO = $ARRAYNUMERO[0]['NUMERO'] + 1;


                //UTILIZACION METODOS SET DEL MODELO
                //SETEO DE ATRIBUTOS DE LA CLASE, OBTENIDO EN EL FORMULARIO   

                $TRANSPORTE->__SET('NUMERO_TRANSPORTE', $NUMERO);
                $TRANSPORTE->__SET('RUT_TRANSPORTE', $_REQUEST['RUTTRANSPORTE']);
                $TRANSPORTE->__SET('DV_TRANSPORTE', $_REQUEST['DVTRANSPORTE']);
                $TRANSPORTE->__SET('NOMBRE_TRANSPORTE', $_REQUEST['NOMBRETRANSPORTE']);
                $TRANSPORTE->__SET('GIRO_TRANSPORTE', $_REQUEST['GIROTRANSPORTE']);
                $TRANSPORTE->__SET('RAZON_SOCIAL_TRANSPORTE', $_REQUEST['RAZONSOCIALTRANSPORTE']);
                $TRANSPORTE->__SET('DIRECCION_TRANSPORTE', $_REQUEST['DIRRECIONTRANSPORTE']);
                $TRANSPORTE->__SET('CONTACTO_TRANSPORTE', $_REQUEST['CONTACTOTRANSPORTE']);
                $TRANSPORTE->__SET('TELEFONO_TRANSPORTE', $_REQUEST['TELEFONOTRANSPORTE']);
                $TRANSPORTE->__SET('EMAIL_TRANSPORTE', $_REQUEST['EMAILTRANSPORTE']);
                $TRANSPORTE->__SET('NOTA_TRANSPORTE', $_REQUEST['NOTATRANSPORTE']);
                $TRANSPORTE->__SET('ID_CIUDAD', $_REQUEST['CIUDAD']);
                $TRANSPORTE->__SET('ID_EMPRESA', $_REQUEST['EMPRESA']);
                $TRANSPORTE->__SET('ID_USUARIOI', $IDUSUARIOS);
                $TRANSPORTE->__SET('ID_USUARIOM', $IDUSUARIOS);
                //LLAMADA AL METODO DE REGISTRO DEL CONTROLADOR
                $TRANSPORTE_ADO->agregarTransporte($TRANSPORTE);
                //REDIRECCIONAR A PAGINA registroTransporte.php
                echo '<script>
                    Swal.fire({
                        icon:"success",
                        title:"Registro Creado",
                        text:"El registro del mantenedor se ha creado correctamente",
                        showConfirmButton: true,
                        confirmButtonText:"Cerrar",
                        closeOnConfirm:false
                    }).then((result)=>{
                        location.href = "registroTransporte.php";                            
                    })
                </script>';
            }
            //OPERACION DE EDICION DE FILA
            if (isset($_REQUEST['EDITAR'])) {
                //UTILIZACION METODOS SET DEL MODELO
                //SETEO DE ATRIBUTOS DE LA CLASE, OBTENIDO EN EL FORMULARIO   

                $TRANSPORTE->__SET('RUT_TRANSPORTE', $_REQUEST['RUTTRANSPORTE']);
                $TRANSPORTE->__SET('DV_TRANSPORTE', $_REQUEST['DVTRANSPORTE']);
                $TRANSPORTE->__SET('NOMBRE_TRANSPORTE', $_REQUEST['NOMBRETRANSPORTE']);
                $TRANSPORTE->__SET('GIRO_TRANSPORTE', $_REQUEST['GIROTRANSPORTE']);
                $TRANSPORTE->__SET('RAZON_SOCIAL_TRANSPORTE', $_REQUEST['RAZONSOCIALTRANSPORTE']);
                $TRANSPORTE->__SET('DIRECCION_TRANSPORTE', $_REQUEST['DIRRECIONTRANSPORTE']);
                $TRANSPORTE->__SET('CONTACTO_TRANSPORTE', $_REQUEST['CONTACTOTRANSPORTE']);
                $TRANSPORTE->__SET('TELEFONO_TRANSPORTE', $_REQUEST['TELEFONOTRANSPORTE']);
                $TRANSPORTE->__SET('EMAIL_TRANSPORTE', $_REQUEST['EMAILTRANSPORTE']);
                $TRANSPORTE->__SET('NOTA_TRANSPORTE', $_REQUEST['NOTATRANSPORTE']);
                $TRANSPORTE->__SET('ID_CIUDAD', $_REQUEST['CIUDAD']);
                $TRANSPORTE->__SET('ID_EMPRESA', $_REQUEST['EMPRESA']);
                $TRANSPORTE->__SET('ID_USUARIOM', $IDUSUARIOS);
                $TRANSPORTE->__SET('ID_TRANSPORTE', $_REQUEST['ID']);
                //LLAMADA AL METODO DE EDICION DEL CONTROLADOR
                $TRANSPORTE_ADO->actualizarTransporte($TRANSPORTE);
                //REDIRECCIONAR A PAGINA registroTransporte.php
                echo '<script>
                    Swal.fire({
                        icon:"success",
                        title:"Registro Modificado",
                        text:"El registro del mantenedor se ha Modificado correctamente",
                        showConfirmButton: true,
                        confirmButtonText:"Cerrar",
                        closeOnConfirm:false
                    }).then((result)=>{
                        location.href = "registroTransporte.php";                            
                    })
                </script>';
            }

        ?>
</body>
</html>