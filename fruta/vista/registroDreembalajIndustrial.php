<?php


include_once "../config/validarUsuario.php";
//LLAMADA ARCHIVOS NECESARIOS PARA LAS OPERACIONES


include_once '../controlador/EINDUSTRIAL_ADO.php';
include_once '../controlador/VESPECIES_ADO.php';
include_once '../controlador/FOLIO_ADO.php';
include_once '../controlador/PRODUCTOR_ADO.php';
include_once '../controlador/TMANEJO_ADO.php';
include_once '../controlador/REEMBALAJE_ADO.php';

include_once '../controlador/DREXPORTACION_ADO.php';
include_once '../controlador/DRINDUSTRIAL_ADO.php';
include_once '../controlador/EXIEXPORTACION_ADO.php';
include_once '../controlador/EXIINDUSTRIAL_ADO.php';


include_once '../modelo/EXIINDUSTRIAL.php';
include_once '../modelo/DRINDUSTRIAL.php';
//INCIALIZAR LAS VARIBLES
//INICIALIZAR CONTROLADOR

$EINDUSTRIAL_ADO =  new EINDUSTRIAL_ADO();
$VESPECIES_ADO =  new VESPECIES_ADO();
$FOLIO_ADO =  new FOLIO_ADO();
$PRODUCTOR_ADO =  new PRODUCTOR_ADO();
$TMANEJO_ADO =  new TMANEJO_ADO();
$REEMBALAJE_ADO =  new REEMBALAJE_ADO();

$DREXPORTACION_ADO =  new DREXPORTACION_ADO();
$DRINDUSTRIAL_ADO =  new DRINDUSTRIAL_ADO();
$EXIINDUSTRIAL_ADO =  new EXIINDUSTRIAL_ADO();
$EXIEXPORTACION_ADO =  new EXIEXPORTACION_ADO();
//INICIALIZAR MODELO
$EXIINDUSTRIAL =  new EXIINDUSTRIAL();
$DRINDUSTRIAL =  new DRINDUSTRIAL();

//INICIALIZAR VARIABLES

$PROCESO = "";
$FOLIODPINDUSTRIAL = "";
$NUMEROFOLIODINDUSTRIAL = "";
$FECHAEMBALADODINDUSTRIAL = "";
$CANTIDADENVASEDINDUSTRIAL = "";

$IDPROCESO = "";
$IDDPROCESOINDUSTRIAL = "";

$ESTANDAR = "";
$PVESPECIES = "";
$FOLIO = "";
$FOLIOALIAS = "";


$FOLIOBAS2 = "";
$FOLIOAUX = "";
$ULTIMOFOLIO = "";

$PRODUCTORDATOS = "";
$NOMBREVESPECIES = "";

$TOTALDESHIDRATACIONEXV = 0;
$TOTALNETOINDV = 0;
$TOTALDESHIDRATACIONEX = 0;
$TOTALNETOIND = 0;
$DIFERENCIAKILOSNETOEXPO = 0;

$PRODUCTOR = "";
$EMPRESA = "";
$PLANTA = "";
$TEMPORADA = "";
$TMANEJO = "";

$DISABLED = "";
$DISABLEDSTYLE = "";

$DISABLED2 = "disabled";
$DISABLEDSTYLE2 = "style='background-color: #eeeeee;'";
$MENSAJEELIMINAR = "";

$IDOP = "";
$IDOP2 = "";
$OP = "";

$NODATOURL = "";
//INICIALIZAR ARREGLOS

$ARRAYVERFOLIO = "";
$ARRAYULTIMOFOLIO = "";
$ARRAYOBTENERNUMEROLINEA = "";

$ARRAYESTANDAR = "";
$ARRAYPVESPECIES;
$ARRAYVESPECIES;
$ARRAYPRODUCTOR = "";

$ARRAYDPROCESOINDUSTRIAL = "";
$ARRAYDPROCESOINDUSTRIAL2 = "";

$ARRAYVERFOLIOPOIND = "";

$ARRAYESTANDAR = $EINDUSTRIAL_ADO->listarEstandarProcesoPorEmpresaCBX($EMPRESAS);
$ARRAYTMANEJO = $TMANEJO_ADO->listarTmanejoCBX();
$ARRAYFECHAACTUAL = $DRINDUSTRIAL_ADO->obtenerFecha();
$FECHAEMBALADODINDUSTRIAL = $ARRAYFECHAACTUAL[0]['FECHA'];
include_once "../config/validarDatosUrlD.php";





//OPERACION PARA OBTENER EL ID RECEPCION Y FOLIO BASE, SOLO SE OCUPA PARA CREAR UN REGISTRO NUEVO
if (isset($_SESSION['parametro']) && isset($_SESSION['parametro1']) && isset($_SESSION['urlO'])) {
    $IDP = $_SESSION['parametro'];
    $OPP = $_SESSION['parametro1'];
    $URLO = $_SESSION['urlO'];


    $ARRAYEXISTENCIATOTALESREEMBALAJE = $EXIEXPORTACION_ADO->obtenerTotalesReembalaje($IDP);
    $TOTALNETOE = $ARRAYEXISTENCIATOTALESREEMBALAJE[0]['NETO'];
    $ARRATDINDUSTRIALTOTALREEMBALAJE = $DRINDUSTRIAL_ADO->obtenerTotales($IDP);
    $ARRATDINDUSTRIALTOTALREEMBALAJE2 = $DRINDUSTRIAL_ADO->obtenerTotales2($IDP);
    $TOTALNETOIND = $ARRATDINDUSTRIALTOTALREEMBALAJE[0]['NETO'];
    $TOTALNETOINDV = $ARRATDINDUSTRIALTOTALREEMBALAJE2[0]['NETO'];
    $ARRAYDEXPORTACIONTOTALREEMBALAJE = $DREXPORTACION_ADO->obtenerTotales($IDP);
    $ARRAYDEXPORTACIONTOTALREEMBALAJE2 = $DREXPORTACION_ADO->obtenerTotales2($IDP);
    $TOTALDESHIDRATACIONEX = $ARRAYDEXPORTACIONTOTALREEMBALAJE[0]['DESHIDRATACION'];
    $TOTALDESHIDRATACIONEXV = $ARRAYDEXPORTACIONTOTALREEMBALAJE2[0]['DESHIDRATACION'];    
    $DIFERENCIAKILOSNETOEXPO = round($TOTALNETOE - ($TOTALDESHIDRATACIONEX + $TOTALNETOIND), 2);


    $ARRAYREEMBALAJE = $REEMBALAJE_ADO->verReembalaje($IDP);
    foreach ($ARRAYREEMBALAJE as $r) :

        $PRODUCTOR = "" . $r['ID_PRODUCTOR'];
        $FECHAREEMBALAJE = "" . $r['FECHA_REEMBALAJE'];
        $VESPECIES = "" . $r['ID_VESPECIES'];
        $ARRAYVESPECIES = $VESPECIES_ADO->verVespecies($r['ID_VESPECIES']);
        $ARRAYVERPRODUCTOR = $PRODUCTOR_ADO->verProductor($PRODUCTOR);
        if ($ARRAYVERPRODUCTOR) {
            $PRODUCTORDATOS = $ARRAYVERPRODUCTOR[0]["CSG_PRODUCTOR"] . ": "  . $ARRAYVERPRODUCTOR[0]["NOMBRE_PRODUCTOR"];
        }
        if ($ARRAYVESPECIES) {
            $NOMBREVESPECIES = $ARRAYVESPECIES[0]["NOMBRE_VESPECIES"];
        }

    endforeach;
}
//OBTENCION DE DATOS ENVIADOR A LA URL
//PARA OPERACIONES DE EDICION , VISUALIZACION Y CREACION
//OPERACION PARA OBTENER EL ID RECEPCION Y FOLIO BASE, SOLO SE OCUPA PARA CREAR UN REGISTRO NUEVO
if (isset($_SESSION['parametro']) && isset($_SESSION['parametro1']) && isset($_SESSION['urlO']) && isset($_SESSION['dparametro']) && isset($_SESSION['dparametro1'])) {
    //ALMACENAR DATOS DE VARIABLES DE LA URL
    $IDOP = $_SESSION['dparametro'];
    $OP = $_SESSION['dparametro1'];
    $IDP = $_SESSION['parametro'];
    $OPP = $_SESSION['parametro1'];
    $URLO = $_SESSION['urlO'];



    //crear =  OBTENCION DE DATOS PARA LA CREACCION DE REGISTRO
    if ($OP == "crear") {
        $DISABLED = "";
        $DISABLEDSTYLE = "";
        $DISABLED2 = "disabled";
        $DISABLEDSTYLE2 = "style='background-color: #eeeeee;'";
        $ARRAYDPROCESOINDUSTRIAL = $DRINDUSTRIAL_ADO->verDrindustrial($IDOP);
        foreach ($ARRAYDPROCESOINDUSTRIAL as $r) :
            // $NUMEROFOLIODINDUSTRIAL = "" . $r['FOLIO_DRINDUSTRIAL'];
            $FECHAEMBALADODINDUSTRIAL = "" . $r['FECHA_EMBALADO_DRINDUSTRIAL'];
            $KILOSNETO = "" . $r['KILOS_NETO_DRINDUSTRIAL'];
            $TMANEJO = "" . $r['ID_TMANEJO'];
            $ESTANDAR = "" . $r['ID_ESTANDAR'];
            $VESPECIES = "" . $r['ID_VESPECIES'];
            $PRODUCTOR = "" . $r['ID_PRODUCTOR'];
            $ARRAYVESPECIES = $VESPECIES_ADO->verVespecies($r['ID_VESPECIES']);
            $ARRAYVERPRODUCTOR = $PRODUCTOR_ADO->verProductor($PRODUCTOR);
            if ($ARRAYVERPRODUCTOR) {
                $PRODUCTORDATOS = $ARRAYVERPRODUCTOR[0]["CSG_PRODUCTOR"] . ": " . $ARRAYVERPRODUCTOR[0]["NOMBRE_PRODUCTOR"];
            }
            if ($ARRAYVESPECIES) {
                $NOMBREVESPECIES = $ARRAYVESPECIES[0]["NOMBRE_VESPECIES"];
            }
        endforeach;
    }
    //editar =  OBTENCION DE DATOS PARA LA EDICION DE REGISTRO
    if ($OP == "editar") {
        $DISABLED = "";
        $DISABLEDSTYLE = "";
        $DISABLED2 = "disabled";
        $DISABLEDSTYLE2 = "style='background-color: #eeeeee;'";
        $ARRAYDPROCESOINDUSTRIAL = $DRINDUSTRIAL_ADO->verDrindustrial($IDOP);
        foreach ($ARRAYDPROCESOINDUSTRIAL as $r) :
            $NUMEROFOLIODINDUSTRIAL = "" . $r['FOLIO_DRINDUSTRIAL'];
            $FECHAEMBALADODINDUSTRIAL = "" . $r['FECHA_EMBALADO_DRINDUSTRIAL'];
            $KILOSNETO = "" . $r['KILOS_NETO_DRINDUSTRIAL'];
            $TMANEJO = "" . $r['ID_TMANEJO'];
            $ESTANDAR = "" . $r['ID_ESTANDAR'];
            $VESPECIES = "" . $r['ID_VESPECIES'];
            $PRODUCTOR = "" . $r['ID_PRODUCTOR'];
            $ARRAYVESPECIES = $VESPECIES_ADO->verVespecies($r['ID_VESPECIES']);
            $ARRAYVERPRODUCTOR = $PRODUCTOR_ADO->verProductor($PRODUCTOR);
            if ($ARRAYVERPRODUCTOR) {                
                $PRODUCTORDATOS = $ARRAYVERPRODUCTOR[0]["CSG_PRODUCTOR"] . ": " . $ARRAYVERPRODUCTOR[0]["NOMBRE_PRODUCTOR"];
            }
            if ($ARRAYVESPECIES) {
                $NOMBREVESPECIES = $ARRAYVESPECIES[0]["NOMBRE_VESPECIES"];
            }
        endforeach;
    }

    //ver =  OBTENCION DE DATOS PARA LA VISUALIZACION DEL REGISTRO
    if ($OP == "ver") {

        $DISABLED = "disabled";
        $DISABLEDSTYLE = "style='background-color: #eeeeee;'";
        $DISABLED2 = "disabled";
        $DISABLEDSTYLE2 = "style='background-color: #eeeeee;'";
        $ARRAYDPROCESOINDUSTRIAL = $DRINDUSTRIAL_ADO->verDrindustrial($IDOP);
        foreach ($ARRAYDPROCESOINDUSTRIAL as $r) :
            $NUMEROFOLIODINDUSTRIAL = "" . $r['FOLIO_DRINDUSTRIAL'];
            $FECHAEMBALADODINDUSTRIAL = "" . $r['FECHA_EMBALADO_DRINDUSTRIAL'];
            $KILOSNETO = "" . $r['KILOS_NETO_DRINDUSTRIAL'];
            $TMANEJO = "" . $r['ID_TMANEJO'];
            $ESTANDAR = "" . $r['ID_ESTANDAR'];
            $VESPECIES = "" . $r['ID_VESPECIES'];
            $PRODUCTOR = "" . $r['ID_PRODUCTOR'];
            $ARRAYVESPECIES = $VESPECIES_ADO->verVespecies($r['ID_VESPECIES']);
            $ARRAYVERPRODUCTOR = $PRODUCTOR_ADO->verProductor($PRODUCTOR);
            if ($ARRAYVERPRODUCTOR) {                
                $PRODUCTORDATOS = $ARRAYVERPRODUCTOR[0]["CSG_PRODUCTOR"] . ": " . $ARRAYVERPRODUCTOR[0]["NOMBRE_PRODUCTOR"];
            }
            if ($ARRAYVESPECIES) {
                $NOMBREVESPECIES = $ARRAYVESPECIES[0]["NOMBRE_VESPECIES"];
            }
        endforeach;
    }
    //ver =  OBTENCION DE DATOS PARA LA VISUALIZACION DEL REGISTRO
    if ($OP == "eliminar") {

        $DISABLED = "disabled";
        $DISABLEDSTYLE = "style='background-color: #eeeeee;'";
        $DISABLED2 = "disabled";
        $DISABLEDSTYLE2 = "style='background-color: #eeeeee;'";
        $ARRAYDPROCESOINDUSTRIAL = $DRINDUSTRIAL_ADO->verDrindustrial($IDOP);
        $MENSAJEELIMINAR = "ESTA SEGURO DE ELIMINAR EL REGISTRO, PARA CONFIRMAR PRESIONE ELIMINAR";
        foreach ($ARRAYDPROCESOINDUSTRIAL as $r) :
            $NUMEROFOLIODINDUSTRIAL = "" . $r['FOLIO_DRINDUSTRIAL'];
            $FECHAEMBALADODINDUSTRIAL = "" . $r['FECHA_EMBALADO_DRINDUSTRIAL'];
            $KILOSNETO = "" . $r['KILOS_NETO_DRINDUSTRIAL'];
            $TMANEJO = "" . $r['ID_TMANEJO'];
            $ESTANDAR = "" . $r['ID_ESTANDAR'];
            $VESPECIES = "" . $r['ID_VESPECIES'];
            $PRODUCTOR = "" . $r['ID_PRODUCTOR'];
            $ARRAYVESPECIES = $VESPECIES_ADO->verVespecies($r['ID_VESPECIES']);
            $ARRAYVERPRODUCTOR = $PRODUCTOR_ADO->verProductor($PRODUCTOR);
            if ($ARRAYVERPRODUCTOR) {                
                $PRODUCTORDATOS = $ARRAYVERPRODUCTOR[0]["CSG_PRODUCTOR"] . ": " . $ARRAYVERPRODUCTOR[0]["NOMBRE_PRODUCTOR"];
            }
            if ($ARRAYVESPECIES) {
                $NOMBREVESPECIES = $ARRAYVESPECIES[0]["NOMBRE_VESPECIES"];
            }
        endforeach;
    }
}
if ($_POST) {

    if (isset($_REQUEST['FECHAEMBALADODINDUSTRIAL'])) {
        $FECHAEMBALADODINDUSTRIAL = $_REQUEST['FECHAEMBALADODINDUSTRIAL'];
    }
    if (isset($_REQUEST['ESTANDAR'])) {
        $ESTANDAR = $_REQUEST['ESTANDAR'];
    }
    if (isset($_REQUEST['KILOSNETO'])) {
        $KILOSNETO = $_REQUEST['KILOSNETO'];
    }
    if (isset($_REQUEST['TMANEJO'])) {
        $TMANEJO = $_REQUEST['TMANEJO'];
    }
}

?>


<!DOCTYPE html>
<html lang="es">

<head>
    <title>Registro Producto Industrial </title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="description" content="">
    <meta name="author" content="">
    <!- LLAMADA DE LOS ARCHIVOS NECESARIOS PARA DISEÑO Y FUNCIONES BASE DE LA VISTA -!>
        <?php include_once "../config/urlHead.php"; ?>
        <!- FUNCIONES BASES -!>
            <script type="text/javascript">
                function validacion() {
                    FECHAEMBALADODINDUSTRIAL = document.getElementById("FECHAEMBALADODINDUSTRIAL").value;
                    ESTANDAR = document.getElementById("ESTANDAR").selectedIndex;
                    KILOSNETO = document.getElementById("KILOSNETO").value;
                    TMANEJO = document.getElementById("TMANEJO").selectedIndex;

                    document.getElementById('val_fechaembalado').innerHTML = "";
                    document.getElementById('val_estandar').innerHTML = "";
                    document.getElementById('val_neto').innerHTML = "";
                    document.getElementById('val_tmanejo').innerHTML = "";

                    if (FECHAEMBALADODINDUSTRIAL == null || FECHAEMBALADODINDUSTRIAL.length == 0 || /^\s+$/.test(FECHAEMBALADODINDUSTRIAL)) {
                        document.form_reg_dato.FECHAEMBALADODINDUSTRIAL.focus();
                        document.form_reg_dato.FECHAEMBALADODINDUSTRIAL.style.borderColor = "#FF0000";
                        document.getElementById('val_fechaembalado').innerHTML = "NO HA INGRESADO DATOS";
                        return false;
                    }
                    document.form_reg_dato.FECHAEMBALADODINDUSTRIAL.style.borderColor = "#4AF575";

                    if (ESTANDAR == null || ESTANDAR == 0) {
                        document.form_reg_dato.ESTANDAR.focus();
                        document.form_reg_dato.ESTANDAR.style.borderColor = "#FF0000";
                        document.getElementById('val_estandar').innerHTML = "NO HA SELECIONADO ALTERNATIVA";
                        return false;
                    }
                    document.form_reg_dato.ESTANDAR.style.borderColor = "#4AF575";

                    if (KILOSNETO == null || KILOSNETO == 0) {
                        document.form_reg_dato.KILOSNETO.focus();
                        document.form_reg_dato.KILOSNETO.style.borderColor = "#FF0000";
                        document.getElementById('val_neto').innerHTML = "NO HA INGRESADO DATOS";
                        return false;
                    }
                    document.form_reg_dato.KILOSNETO.style.borderColor = "#4AF575";

                    if (TMANEJO == null || TMANEJO == 0) {
                        document.form_reg_dato.TMANEJO.focus();
                        document.form_reg_dato.TMANEJO.style.borderColor = "#FF0000";
                        document.getElementById('val_tmanejo').innerHTML = "NO HA SELECIONADO ALTERNATIVA";
                        return false;
                    }
                    document.form_reg_dato.TMANEJO.style.borderColor = "#4AF575";


                }

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


                //FUNCION PARA CERRAR VENTANA Y ACTUALIZAR PRINCIPAL
                function cerrar() {
                    window.opener.refrescar()
                    window.close();
                }
                //REDIRECCIONAR A LA PAGINA SELECIONADA
                function irPagina(url) {
                    location.href = "" + url;
                }
            </script>

</head>

<body class="hold-transition light-skin fixed sidebar-mini theme-primary" onload="mueveReloj()">
    <div class="wrapper">
        <!- LLAMADA AL MENU PRINCIPAL DE LA PAGINA-!>
            <?php include_once "../config/menu.php";
            ?>
            <div class="content-wrapper">
                <div class="container-full">
                    <!-- Content Header (Page header) -->
                    <div class="content-header">
                        <div class="d-flex align-items-center">
                            <div class="mr-auto">
                                <h3 class="page-title">Reembalaje</h3>
                                <div class="d-inline-block align-items-center">
                                    <nav>
                                        <ol class="breadcrumb">
                                            <li class="breadcrumb-item"><a href="index.php"><i class="mdi mdi-home-outline"></i></a></li>
                                            <li class="breadcrumb-item" aria-current="page">Modulo</li>
                                            <li class="breadcrumb-item" aria-current="page">Packing</li>
                                            <li class="breadcrumb-item" aria-current="page">Reembalaje</li>
                                            <li class="breadcrumb-item" aria-current="page">Registro Reembalaje</li>
                                            <li class="breadcrumb-item active" aria-current="page"> <a href="#"> Registro Producto Industrial </a>
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
                    <section class="content">
                        <form class="form" role="form" method="post" name="form_reg_dato">
                            <div class="box">
                                <div class="box-header with-border bg-success">                                   
                                    <h4 class="box-title">Registro Producto Industrial</h4>                                        
                                </div>
                                <div class="box-body ">
                                    <div class="row">
                                        <div class="col-3">
                                            <div class="form-group">
                                                <input type="hidden" class="form-control" placeholder="ID DINDUSTRIAL" id="ID" name="ID" value="<?php echo $IDOP; ?>" />
                                                <input type="hidden" class="form-control" placeholder="ID PROCESO" id="IDP" name="IDP" value="<?php echo $IDP; ?>" />
                                                <input type="hidden" class="form-control" placeholder="ID PROCESO" id="OPP" name="OPP" value="<?php echo $OPP; ?>" />
                                                <input type="hidden" class="form-control" placeholder="ID PROCESO" id="URLO" name="URLO" value="<?php echo $URLO; ?>" />

                                                <input type="hidden" class="form-control" placeholder="ID EMPRESA" id="EMPRESA" name="EMPRESA" value="<?php echo $EMPRESAS; ?>" />
                                                <input type="hidden" class="form-control" placeholder="ID PLANTA" id="PLANTA" name="PLANTA" value="<?php echo $PLANTAS; ?>" />
                                                <input type="hidden" class="form-control" placeholder="ID TEMPORADA" id="TEMPORADA" name="TEMPORADA" value="<?php echo $TEMPORADAS; ?>" />
                                                <label>Folio</label>
                                                <input type="hidden" class="form-control" placeholder="NUMEROFOLIODINDUSTRIALE" id="NUMEROFOLIODINDUSTRIALE" name="NUMEROFOLIODINDUSTRIALE" value="<?php echo $NUMEROFOLIODINDUSTRIAL; ?>" />
                                                <input type="text" class="form-control" id="NUMEROFOLIODINDUSTRIALV" name="NUMEROFOLIODINDUSTRIALV" value="<?php echo $NUMEROFOLIODINDUSTRIAL; ?>" disabled style="background-color: #eeeeee;" />
                                            </div>
                                        </div>
                                        <div class="col-3">
                                            <div class="form-group">
                                                <label>Fecha Embalado </label>
                                                <input type="date" class="form-control" placeholder="Fecha Embalado" id="FECHAEMBALADODINDUSTRIAL" name="FECHAEMBALADODINDUSTRIAL" value="<?php echo $FECHAEMBALADODINDUSTRIAL; ?>" <?php echo $DISABLED; ?> <?php echo $DISABLEDSTYLE; ?> />
                                                <label id="val_fechaembalado" class="validacion"> </label>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label>Productor </label>
                                                <input type="hidden" class="form-control" placeholder="ID PRODUCTOR" id="PRODUCTOR" name="PRODUCTOR" value="<?php echo $PRODUCTOR; ?>" />
                                                <input type="hidden" class="form-control" placeholder="FECHAREEMBALAJE" id="FECHAREEMBALAJE" name="FECHAREEMBALAJE" value="<?php echo $FECHAREEMBALAJE; ?>" />
                                                <input type="text" class="form-control" placeholder="Nombre Productor" id="NOMBREPRODUCTOR" name="NOMBREPRODUCTOR" value="<?php echo $PRODUCTORDATOS; ?>" disabled style="background-color: #eeeeee;" />
                                                <label id="val_productor" class="validacion"> </label>
                                            </div>
                                        </div>
                                        <div class="col-3">
                                            <div class="form-group">
                                                <label>Variedad</label>
                                                <input type="hidden" class="form-control" placeholder="ID VESPECIES" id="VESPECIES" name="VESPECIES" value="<?php echo $VESPECIES; ?>" />
                                                <input type="text" class="form-control" placeholder="Nombre Variedad" id="NOMBREVARIEDAD" name="NOMBREVARIEDAD" value="<?php echo $NOMBREVESPECIES; ?>" disabled style="background-color: #eeeeee;" />
                                                <label id="val_vespecies" class="validacion"> </label>
                                            </div>
                                        </div>
                                        <div class="col-3">
                                            <div class="form-group">
                                                <label>Estandar </label>
                                                <select class="form-control select2" id="ESTANDAR" name="ESTANDAR" style="width: 100%;" <?php echo $DISABLED; ?> <?php echo $DISABLEDSTYLE; ?>>
                                                    <option></option>
                                                    <?php foreach ($ARRAYESTANDAR as $r) : ?>
                                                        <?php if ($ARRAYESTANDAR) {    ?>
                                                            <option value="<?php echo $r['ID_ESTANDAR']; ?>" <?php if ($ESTANDAR == $r['ID_ESTANDAR']) {
                                                                                                                    echo "selected";
                                                                                                                } ?>> <?php echo $r['CODIGO_ESTANDAR'] ?> :<?php echo $r['NOMBRE_ESTANDAR'] ?> </option>
                                                        <?php } else { ?>
                                                            <option>No Hay Datos Registrados</option>
                                                        <?php } ?>
                                                    <?php endforeach; ?>
                                                </select>
                                                <label id="val_estandar" class="validacion"> </label>
                                            </div>
                                        </div>
                                        <div class="col-3">
                                            <div class="form-group">
                                                <label>Kilos Neto </label>
                                                <input type="number" class="form-control" step="0.01" placeholder="Kilos Neto" id="KILOSNETO" name="KILOSNETO" value="<?php echo $KILOSNETO; ?>" <?php echo $DISABLED; ?> <?php echo $DISABLEDSTYLE; ?> />
                                                <label id="val_neto" class="validacion"> </label>
                                            </div>
                                        </div>
                                        <div class="col-3">
                                            <div class="form-group">
                                                <label>Tipo Manejo</label><br>
                                                <select class="form-control select2" id="TMANEJO" name="TMANEJO" style="width: 100%;" <?php echo $DISABLED; ?>>
                                                    <option></option>
                                                    <?php foreach ($ARRAYTMANEJO as $r) : ?>
                                                        <?php if ($ARRAYTMANEJO) {    ?>
                                                            <option value="<?php echo $r['ID_TMANEJO']; ?>" <?php if ($TMANEJO == $r['ID_TMANEJO']) { echo "selected";} ?>> <?php echo $r['NOMBRE_TMANEJO'];  ?></option>
                                                        <?php } else { ?>
                                                            <option>No Hay Datos Registrados</option>
                                                        <?php } ?>
                                                    <?php endforeach; ?>
                                                </select>
                                                <label id="val_tmanejo" class="validacion"> </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <label id=" val_mensaje" class="validacion"><?php echo $MENSAJEELIMINAR; ?> </label>
                                    </div>
                                    <!-- /.row -->
                                </div>
                                <!-- /.box-body -->
                                <div class="box-footer">
                                    <div class="btn-group btn-block col-6" role="group" aria-label="Acciones generales">
                                        <button type="button" class="btn btn-success  " data-toggle="tooltip" title="Volver" name="CANCELAR" value="CANCELAR" Onclick="irPagina('<?php echo $URLO; ?>.php?op');">
                                            <i class="ti-back-left "></i> Volver
                                        </button>
                                        <?php if ($OP == "") { ?>
                                            <button type="submit" class="btn btn-primary " data-toggle="tooltip" title="Guardar" name="CREAR" value="CREAR" <?php echo $DISABLED; ?> onclick="return validacion()">
                                                <i class="ti-save-alt"></i> Guardar
                                            </button>
                                        <?php } ?>
                                        <?php if ($OP != "") { ?>
                                            <?php if ($OP == "crear") { ?>
                                                <button type="submit" class="btn btn-primary " data-toggle="tooltip" title="Guardar" name="CREAR" value="CREAR" <?php echo $DISABLED; ?> onclick="return validacion()">
                                                    <i class="ti-save-alt"></i> Guardar
                                                </button>
                                            <?php } ?>
                                            <?php if ($OP == "editar") { ?>
                                                <button type="submit" class="btn btn-warning   " data-toggle="tooltip" title="Guardar" name="EDITAR" value="EDITAR" <?php echo $DISABLED; ?> onclick="return validacion()">
                                                    <i class="ti-save-alt"></i> Guardar
                                                </button>
                                            <?php } ?>
                                            <?php if ($OP == "eliminar") { ?>
                                                <button type="submit" class="btn btn-danger " data-toggle="tooltip" title="Eliminar" name="ELIMINAR" value="ELIMINAR">
                                                    <i class="ti-trash"></i> Eliminar
                                                </button>
                                            <?php } ?>
                                        <?php } ?>
                                    </div>
                                </div>

                            </div>
                        </form>
                        <!--.row -->
                    </section>
                </div>
            </div>
            <!- LLAMADA ARCHIVO DEL DISEÑO DEL FOOTER Y MENU USUARIO -!>
                <?php include_once "../config/footer.php"; ?>
                <?php include_once "../config/menuExtra.php"; ?>
    </div>
    <!- LLAMADA URL DE ARCHIVOS DE DISEÑO Y JQUERY E OTROS -!>
        <?php include_once "../config/urlBase.php"; ?>
        <script>
            const Toast = Swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: true,
                timerProgressBar: true,
                didOpen: (toast) => {
                toast.addEventListener('mouseenter', Swal.stopTimer)
                toast.addEventListener('mouseleave', Swal.resumeTimer)
                }
            })

            Toast.fire({
                icon: 'info',
                title: 'Informacion de reembalaje',
                html:"Kilo Exportacion: <?php echo $TOTALDESHIDRATACIONEXV; ?> <br> Kg. Industrial: <?php echo $TOTALNETOINDV;?> <br> Diferencia Kg.: <?php echo $DIFERENCIAKILOSNETOEXPO;?>"
            })
        </script>
         <?php
            //OPERACIONES
            //OPERACION DE REGISTRO DE FILA
            if (isset($_REQUEST['CREAR'])) {
                //OBTENER EL FOLIO DEL DETALLE DE EXPORTACION DEL PROCESO
                $ARRAYVERFOLIO = $FOLIO_ADO->verFolioPorEmpresaPlantaTemporadaTindustrial($_REQUEST['EMPRESA'], $_REQUEST['PLANTA'], $_REQUEST['TEMPORADA']);
                $FOLIO = $ARRAYVERFOLIO[0]['ID_FOLIO'];
                $ARRAYULTIMOFOLIO = $EXIINDUSTRIAL_ADO->obtenerFolio($FOLIO);
                if ($ARRAYULTIMOFOLIO) {
                    if ($ARRAYULTIMOFOLIO[0]['ULTIMOFOLIO'] == 0) {
                        $FOLIODPINDUSTRIAL = $ARRAYVERFOLIO[0]['NUMERO_FOLIO'];
                    } else {
                        $FOLIODPINDUSTRIAL =  $ARRAYULTIMOFOLIO[0]['ULTIMOFOLIO2'];
                    }
                } else {
                    $FOLIODPINDUSTRIAL = $ARRAYVERFOLIO[0]['NUMERO_FOLIO'];
                }
                $NUMEROFOLIODINDUSTRIAL = $FOLIODPINDUSTRIAL + 1;
                $FOLIOALIASESTACTICO = $NUMEROFOLIODINDUSTRIAL;
                $FOLIOALIASDIANAMICO = "EMPRESA:" . $_REQUEST['EMPRESA'] . "_PLANTA:" . $_REQUEST['PLANTA'] . "_TEMPORADA:" . $_REQUEST['TEMPORADA'] ."_TIPO_FOLIO:PRODUCTO INDUSTRIAL_PROCESO:" . $_REQUEST['IDP'] . "_FOLIO:" . $NUMEROFOLIODINDUSTRIAL;
                $ARRAYVERESTANDAR=$EINDUSTRIAL_ADO->verEstandar($_REQUEST['ESTANDAR']);
                if($ARRAYVERESTANDAR){
                    $TCOBRO=$ARRAYVERESTANDAR[0]["COBRO"];
                }


                $DRINDUSTRIAL->__SET('FOLIO_DRINDUSTRIAL', $NUMEROFOLIODINDUSTRIAL);
                $DRINDUSTRIAL->__SET('FECHA_EMBALADO_DRINDUSTRIAL', $_REQUEST['FECHAEMBALADODINDUSTRIAL']);
                $DRINDUSTRIAL->__SET('KILOS_NETO_DRINDUSTRIAL', $_REQUEST['KILOSNETO']);
                $DRINDUSTRIAL->__SET('ID_TMANEJO', $_REQUEST['TMANEJO']);
                $DRINDUSTRIAL->__SET('ID_FOLIO', $FOLIO);
                $DRINDUSTRIAL->__SET('ID_VESPECIES',  $_REQUEST['VESPECIES']);
                $DRINDUSTRIAL->__SET('ID_ESTANDAR', $_REQUEST['ESTANDAR']);
                $DRINDUSTRIAL->__SET('ID_PRODUCTOR', $_REQUEST['PRODUCTOR']);
                $DRINDUSTRIAL->__SET('ID_REEMBALAJE', $_REQUEST['IDP']);
                $DRINDUSTRIAL_ADO->agregarDrindustrial($DRINDUSTRIAL);

                //UTILIZACION METODOS SET DEL MODELO
                //SETEO DE ATRIBUTOS DE LA CLASE, OBTENIDO EN EL FORMULARIO
                $EXIINDUSTRIAL->__SET('FOLIO_EXIINDUSTRIAL', $NUMEROFOLIODINDUSTRIAL);
                $EXIINDUSTRIAL->__SET('FOLIO_AUXILIAR_EXIINDUSTRIAL', $NUMEROFOLIODINDUSTRIAL);
                $EXIINDUSTRIAL->__SET('FECHA_EMBALADO_EXIINDUSTRIAL',  $_REQUEST['FECHAEMBALADODINDUSTRIAL']);
                $EXIINDUSTRIAL->__SET('KILOS_NETO_EXIINDUSTRIAL', $_REQUEST['KILOSNETO']);
                $EXIINDUSTRIAL->__SET('ALIAS_DINAMICO_FOLIO_EXIINDUSTRIAL', $FOLIOALIASESTACTICO);
                $EXIINDUSTRIAL->__SET('ALIAS_ESTATICO_FOLIO_EXIINDUSTRIAL', $FOLIOALIASDIANAMICO);
                $EXIINDUSTRIAL->__SET('FECHA_REEMBALAJE', $_REQUEST['FECHAREEMBALAJE']);
                $EXIINDUSTRIAL->__SET('TCOBRO', $TCOBRO);
                $EXIINDUSTRIAL->__SET('ID_TMANEJO', $_REQUEST['TMANEJO']);
                $EXIINDUSTRIAL->__SET('ID_FOLIO', $FOLIO);
                $EXIINDUSTRIAL->__SET('ID_ESTANDAR', $_REQUEST['ESTANDAR']);
                $EXIINDUSTRIAL->__SET('ID_PRODUCTOR', $_REQUEST['PRODUCTOR']);
                $EXIINDUSTRIAL->__SET('ID_VESPECIES', $_REQUEST['VESPECIES']);
                $EXIINDUSTRIAL->__SET('ID_EMPRESA', $_REQUEST['EMPRESA']);
                $EXIINDUSTRIAL->__SET('ID_PLANTA', $_REQUEST['PLANTA']);
                $EXIINDUSTRIAL->__SET('ID_TEMPORADA', $_REQUEST['TEMPORADA']);
                $EXIINDUSTRIAL->__SET('ID_REEMBALAJE', $_REQUEST['IDP']);
                //LLAMADA AL METODO DE REGISTRO DEL CONTROLADOR
                $EXIINDUSTRIAL_ADO->agregarExiindustrialReembalaje($EXIINDUSTRIAL);

                //REDIRECCIONAR A PAGINA registroReembalaje.php
                $_SESSION["parametro"] =  $_REQUEST['IDP'];
                $_SESSION["parametro1"] =  $_REQUEST['OPP'];
                
                echo '<script>
                    Swal.fire({
                        icon:"success",
                        title:"Registro creado",
                        text:"El registro de producto industrial se ha creado correctamente",
                        showConfirmButton: true,
                        confirmButtonText:"Volver al Reembalaje",
                        closeOnConfirm:false
                    }).then((result)=>{
                        location.href="' . $_REQUEST['URLO'] . '.php?op";                        
                    })
                </script>';
            }
            if (isset($_REQUEST['EDITAR'])) {

                $ARRAYVERESTANDAR=$EINDUSTRIAL_ADO->verEstandar($_REQUEST['ESTANDAR']);
                if($ARRAYVERESTANDAR){
                    $TCOBRO=$ARRAYVERESTANDAR[0]["COBRO"];
                }


                $DRINDUSTRIAL->__SET('FECHA_EMBALADO_DRINDUSTRIAL', $_REQUEST['FECHAEMBALADODINDUSTRIAL']);
                $DRINDUSTRIAL->__SET('KILOS_NETO_DRINDUSTRIAL', $_REQUEST['KILOSNETO']);
                $DRINDUSTRIAL->__SET('ID_TMANEJO', $_REQUEST['TMANEJO']);
                $DRINDUSTRIAL->__SET('ID_VESPECIES',  $_REQUEST['VESPECIES']);
                $DRINDUSTRIAL->__SET('ID_ESTANDAR', $_REQUEST['ESTANDAR']);
                $DRINDUSTRIAL->__SET('ID_PRODUCTOR', $_REQUEST['PRODUCTOR']);
                $DRINDUSTRIAL->__SET('ID_REEMBALAJE', $_REQUEST['IDP']);
                $DRINDUSTRIAL->__SET('ID_DRINDUSTRIAL', $_REQUEST['ID']);
                //LLAMADA AL METODO DE REGISTRO DEL CONTROLADOR
                $DRINDUSTRIAL_ADO->actualizarDrindustrial($DRINDUSTRIAL);


                $ARRAYVERFOLIOEXISTENCIA = $EXIINDUSTRIAL_ADO->buscarPorReembalajeNumeroFolio($_REQUEST['IDP'],  $_REQUEST["NUMEROFOLIODINDUSTRIALE"]);

                if ($ARRAYVERFOLIOEXISTENCIA) {
                    $EXIINDUSTRIAL->__SET('FECHA_EMBALADO_EXIINDUSTRIAL',  $_REQUEST['FECHAEMBALADODINDUSTRIAL']);
                    $EXIINDUSTRIAL->__SET('KILOS_NETO_EXIINDUSTRIAL', $_REQUEST['KILOSNETO']);
                    $EXIINDUSTRIAL->__SET('FECHA_REEMBALAJE', $_REQUEST['FECHAREEMBALAJE']);
                    $EXIINDUSTRIAL->__SET('TCOBRO', $TCOBRO);
                    $EXIINDUSTRIAL->__SET('ID_TMANEJO', $_REQUEST['TMANEJO']);
                    $EXIINDUSTRIAL->__SET('ID_ESTANDAR', $_REQUEST['ESTANDAR']);
                    $EXIINDUSTRIAL->__SET('ID_PRODUCTOR', $_REQUEST['PRODUCTOR']);
                    $EXIINDUSTRIAL->__SET('ID_VESPECIES', $_REQUEST['VESPECIES']);
                    $EXIINDUSTRIAL->__SET('ID_EMPRESA', $_REQUEST['EMPRESA']);
                    $EXIINDUSTRIAL->__SET('ID_PLANTA', $_REQUEST['PLANTA']);
                    $EXIINDUSTRIAL->__SET('ID_TEMPORADA', $_REQUEST['TEMPORADA']);
                    $EXIINDUSTRIAL->__SET('ID_REEMBALAJE', $_REQUEST['IDP']);
                    $EXIINDUSTRIAL->__SET('ID_EXIINDUSTRIAL', $ARRAYVERFOLIOEXISTENCIA[0]['ID_EXIINDUSTRIAL']);
                    //LLAMADA AL METODO DE REGISTRO DEL CONTROLADOR
                    $EXIINDUSTRIAL_ADO->actualizarExiindustrialReembalaje($EXIINDUSTRIAL);
                } else {
                    $ARRAYVERFOLIO = $FOLIO_ADO->verFolioPorEmpresaPlantaTemporadaTindustrial($_REQUEST['EMPRESA'], $_REQUEST['PLANTA'], $_REQUEST['TEMPORADA']);
                    $FOLIO = $ARRAYVERFOLIO[0]['ID_FOLIO'];
                    $NUMEROFOLIODINDUSTRIAL = $_REQUEST["NUMEROFOLIODINDUSTRIALE"];
                    $FOLIOALIASESTACTICO = $NUMEROFOLIODINDUSTRIAL;
                    $FOLIOALIASDIANAMICO = "EMPRESA:" . $_REQUEST['EMPRESA'] . "_PLANTA:" . $_REQUEST['PLANTA'] . "_TEMPORADA:" . $_REQUEST['TEMPORADA'] .
                        "_TIPO_FOLIO:PRODUCTO INDUSTRIAL_PROCESO:" . $_REQUEST['IDP'] . "_FOLIO:" . $NUMEROFOLIODINDUSTRIAL;
                    $EXIINDUSTRIAL->__SET('FOLIO_EXIINDUSTRIAL', $NUMEROFOLIODINDUSTRIAL);
                    $EXIINDUSTRIAL->__SET('FOLIO_AUXILIAR_EXIINDUSTRIAL', $NUMEROFOLIODINDUSTRIAL);
                    $EXIINDUSTRIAL->__SET('FECHA_EMBALADO_EXIINDUSTRIAL',  $_REQUEST['FECHAEMBALADODINDUSTRIAL']);
                    $EXIINDUSTRIAL->__SET('KILOS_NETO_EXIINDUSTRIAL', $_REQUEST['KILOSNETO']);
                    $EXIINDUSTRIAL->__SET('ALIAS_DINAMICO_FOLIO_EXIINDUSTRIAL', $FOLIOALIASESTACTICO);
                    $EXIINDUSTRIAL->__SET('ALIAS_ESTATICO_FOLIO_EXIINDUSTRIAL', $FOLIOALIASDIANAMICO);
                    $EXIINDUSTRIAL->__SET('FECHA_REEMBALAJE', $_REQUEST['FECHAREEMBALAJE']);
                    $EXIINDUSTRIAL->__SET('TCOBRO', $TCOBRO);
                    $EXIINDUSTRIAL->__SET('ID_TMANEJO', $_REQUEST['TMANEJO']);
                    $EXIINDUSTRIAL->__SET('ID_FOLIO', $FOLIO);
                    $EXIINDUSTRIAL->__SET('ID_ESTANDAR', $_REQUEST['ESTANDAR']);
                    $EXIINDUSTRIAL->__SET('ID_PRODUCTOR', $_REQUEST['PRODUCTOR']);
                    $EXIINDUSTRIAL->__SET('ID_VESPECIES', $_REQUEST['VESPECIES']);
                    $EXIINDUSTRIAL->__SET('ID_EMPRESA', $_REQUEST['EMPRESA']);
                    $EXIINDUSTRIAL->__SET('ID_PLANTA', $_REQUEST['PLANTA']);
                    $EXIINDUSTRIAL->__SET('ID_TEMPORADA', $_REQUEST['TEMPORADA']);
                    $EXIINDUSTRIAL->__SET('ID_REEMBALAJE', $_REQUEST['IDP']);
                    //LLAMADA AL METODO DE REGISTRO DEL CONTROLADOR
                    $EXIINDUSTRIAL_ADO->agregarExiindustrialReembalaje($EXIINDUSTRIAL);
                }


                //REDIRECCIONAR A PAGINA registroProceso.php 
                $_SESSION["parametro"] =  $_REQUEST['IDP'];
                $_SESSION["parametro1"] =  $_REQUEST['OPP'];
                echo '<script>
                    Swal.fire({
                        icon:"success",
                        title:"Registro Modificado",
                        text:"El registro de producto industrial se ha modificada correctamente",
                        showConfirmButton: true,
                        confirmButtonText:"Volver al reembalaje",
                        closeOnConfirm:false
                    }).then((result)=>{
                        location.href="' . $_REQUEST['URLO'] . '.php?op";                        
                    })
                </script>';
            }
            if (isset($_REQUEST['ELIMINAR'])) {
                $IDELIMINAR = $_REQUEST['ID'];
                $FOLIOELIMINAR = $_REQUEST['NUMEROFOLIODINDUSTRIALE'];
                $DRINDUSTRIAL->__SET('ID_DRINDUSTRIAL', $IDELIMINAR);
                $DRINDUSTRIAL_ADO->deshabilitar($DRINDUSTRIAL);

                $EXIINDUSTRIAL->__SET('ID_REEMBALAJE', $_REQUEST['IDP']);
                $EXIINDUSTRIAL->__SET('FOLIO_AUXILIAR_EXIINDUSTRIAL', $FOLIOELIMINAR);
                $EXIINDUSTRIAL_ADO->deshabilitarReembalaje($EXIINDUSTRIAL);

                $EXIINDUSTRIAL->__SET('ID_REEMBALAJE', $_REQUEST['IDP']);
                $EXIINDUSTRIAL->__SET('FOLIO_AUXILIAR_EXIINDUSTRIAL', $FOLIOELIMINAR);
                $EXIINDUSTRIAL_ADO->eliminadoReembaleaje($EXIINDUSTRIAL);
                //REDIRECCIONAR A PAGINA registroProceso.php 
                $_SESSION["parametro"] =  $_REQUEST['IDP'];
                $_SESSION["parametro1"] =  $_REQUEST['OPP'];
                echo '<script>
                        Swal.fire({
                            icon:"error",
                            title:"Registro Eliminado",
                            text:"El registro de producto industrial se ha eliminado correctamente ",
                            showConfirmButton:true,
                            confirmButtonText:"Volver al reembalaje"
                        }).then((result)=>{
                            location.href ="' . $_REQUEST['URLO'] . '.php?op";                        
                        })
                    </script>';
            }

        ?>
</body>


</html>