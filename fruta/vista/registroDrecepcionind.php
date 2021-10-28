<?php


include_once "../config/validarUsuario.php";
//LLAMADA ARCHIVOS NECESARIOS PARA LAS OPERACIONES


include_once '../controlador/EINDUSTRIAL_ADO.php';
include_once '../controlador/VESPECIES_ADO.php';
include_once '../controlador/FOLIO_ADO.php';
include_once '../controlador/PRODUCTOR_ADO.php';
include_once '../controlador/TMANEJO_ADO.php';
include_once '../controlador/RECEPCIONIND_ADO.php';

include_once '../controlador/DRECEPCIONIND_ADO.php';
include_once '../controlador/DPEXPORTACION_ADO.php';
include_once '../controlador/EXIINDUSTRIAL_ADO.php';
include_once '../controlador/EXIMATERIAPRIMA_ADO.php';

include_once '../modelo/EXIINDUSTRIAL.php';
include_once '../modelo/DRECEPCIONIND.php';

//INCIALIZAR LAS VARIBLES
//INICIALIZAR CONTROLADOR

$EINDUSTRIAL_ADO =  new EINDUSTRIAL_ADO();
$VESPECIES_ADO =  new VESPECIES_ADO();
$FOLIO_ADO =  new FOLIO_ADO();
$PRODUCTOR_ADO =  new PRODUCTOR_ADO();
$TMANEJO_ADO =  new TMANEJO_ADO();
$RECEPCIONIND_ADO =  new RECEPCIONIND_ADO();

$DPEXPORTACION_ADO =  new DPEXPORTACION_ADO();
$DRECEPCIONIND_ADO =  new DRECEPCIONIND_ADO();
$EXIINDUSTRIAL_ADO =  new EXIINDUSTRIAL_ADO();
$EXIMATERIAPRIMA_ADO =  new EXIMATERIAPRIMA_ADO();

//INIICIALIZAR MODELO
$EXIINDUSTRIAL =  new EXIINDUSTRIAL();
$DRECEPCIONIND =  new DRECEPCIONIND();

//INICIALIZAR VARIABLES

$PROCESO = "";
$FOLIODRECEPCIONIND = "";
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

$ARRAYESTANDAR = $EINDUSTRIAL_ADO->listarEstandarPorEmpresaCBX($EMPRESAS);
$ARRAYPRODUCTOR = $PRODUCTOR_ADO->listarProductorPorEmpresaCBX($EMPRESAS);
$ARRAYTMANEJO = $TMANEJO_ADO->listarTmanejoCBX();
$ARRAYFECHAACTUAL = $DRECEPCIONIND_ADO->obtenerFecha();
$FECHAEMBALADODINDUSTRIAL = $ARRAYFECHAACTUAL[0]['FECHA'];
include_once "../config/validarDatosUrlD.php";



//OPERACIONES


//OPERACION PARA OBTENER EL ID RECEPCION Y FOLIO BASE, SOLO SE OCUPA PARA CREAR UN REGISTRO NUEVO
if (isset($_SESSION['parametro']) && isset($_SESSION['parametro1']) && isset($_SESSION['urlO'])) {
    $IDP = $_SESSION['parametro'];
    $OPP = $_SESSION['parametro1'];
    $URLO = $_SESSION['urlO'];

    $ARRAYRECEPCION = $RECEPCIONIND_ADO->verRecepcion($IDP);
    foreach ($ARRAYRECEPCION as $r) :
        $TRECEPCION = "" . $r['TRECEPCION'];
        $FECHARECEPCION = "" . $r['FECHA_RECEPCION'];
        if ($TRECEPCION == "1") {
            $PRODUCTOR = "" . $r['ID_PRODUCTOR'];
            $ARRAYVERPRODUCTOR = $PRODUCTOR_ADO->verProductor($PRODUCTOR);
            if ($ARRAYVERPRODUCTOR) {
                $PRODUCTORDATOS = $ARRAYVERPRODUCTOR[0]["CSG_PRODUCTOR"] . ": "  . $ARRAYVERPRODUCTOR[0]["NOMBRE_PRODUCTOR"];
            }
        }
        if ($TRECEPCION == "2") {
            $PLANTA2 = "" . $r['ID_PLANTA2'];
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
        $ARRAYDPROCESOINDUSTRIAL = $DRECEPCIONIND_ADO->verDrecepcion($IDOP);
        foreach ($ARRAYDPROCESOINDUSTRIAL as $r) :
            // $NUMEROFOLIODINDUSTRIAL = "" . $r['FOLIO_DRECEPCION'];
            $FECHAEMBALADODINDUSTRIAL = "" . $r['FECHA_EMBALADO_DRECEPCION'];
            $KILOSNETO = "" . $r['KILOS_NETO_DRECEPCION'];
            $TMANEJO = "" . $r['ID_TMANEJO'];
            $ESTANDAR = "" . $r['ID_ESTANDAR'];
            $VESPECIES = "" . $r['ID_VESPECIES'];
            $ESTANDAR = "" . $r['ID_ESTANDAR'];
            $ARRAYVERESTANDAR = $EINDUSTRIAL_ADO->verEstandar($ESTANDAR);
            if ($ARRAYVERESTANDAR) {
                $ARRAYVESPECIES = $VESPECIES_ADO->buscarVespeciesPorEspeciesCBX($ARRAYVERESTANDAR[0]['ID_ESPECIES']);
            }
            $ARRAYVESPECIES = $VESPECIES_ADO->verVespecies($r['ID_VESPECIES']);
            $PRODUCTOR = "" . $r['ID_PRODUCTOR'];
            $ARRAYVERPRODUCTOR = $PRODUCTOR_ADO->verProductor($PRODUCTOR);
            if ($ARRAYVERPRODUCTOR) {
                $PRODUCTORDATOS = $ARRAYVERPRODUCTOR[0]["CSG_PRODUCTOR"] .  ":" . $ARRAYVERPRODUCTOR[0]["NOMBRE_PRODUCTOR"];
            }
        endforeach;
    }
    //editar =  OBTENCION DE DATOS PARA LA EDICION DE REGISTRO
    if ($OP == "editar") {
        $DISABLED = "";
        $DISABLEDSTYLE = "";
        $DISABLED2 = "disabled";
        $DISABLEDSTYLE2 = "style='background-color: #eeeeee;'";
        $ARRAYDPROCESOINDUSTRIAL = $DRECEPCIONIND_ADO->verDrecepcion($IDOP);
        foreach ($ARRAYDPROCESOINDUSTRIAL as $r) :
            $NUMEROFOLIODINDUSTRIAL = "" . $r['FOLIO_DRECEPCION'];
            $FECHAEMBALADODINDUSTRIAL = "" . $r['FECHA_EMBALADO_DRECEPCION'];
            $KILOSNETO = "" . $r['KILOS_NETO_DRECEPCION'];
            $TMANEJO = "" . $r['ID_TMANEJO'];
            $ESTANDAR = "" . $r['ID_ESTANDAR'];
            $VESPECIES = "" . $r['ID_VESPECIES'];
            $ESTANDAR = "" . $r['ID_ESTANDAR'];
            $ARRAYVERESTANDAR = $EINDUSTRIAL_ADO->verEstandar($ESTANDAR);
            if ($ARRAYVERESTANDAR) {
                $ARRAYVESPECIES = $VESPECIES_ADO->buscarVespeciesPorEspeciesCBX($ARRAYVERESTANDAR[0]['ID_ESPECIES']);
            }
            $ARRAYVESPECIES = $VESPECIES_ADO->verVespecies($r['ID_VESPECIES']);
            $PRODUCTOR = "" . $r['ID_PRODUCTOR'];
            $ARRAYVERPRODUCTOR = $PRODUCTOR_ADO->verProductor($PRODUCTOR);
            if ($ARRAYVERPRODUCTOR) {
                $PRODUCTORDATOS = $ARRAYVERPRODUCTOR[0]["CSG_PRODUCTOR"] .  ":" . $ARRAYVERPRODUCTOR[0]["NOMBRE_PRODUCTOR"];
            }

        endforeach;
    }

    //ver =  OBTENCION DE DATOS PARA LA VISUALIZACION DEL REGISTRO
    if ($OP == "ver") {

        $DISABLED = "disabled";
        $DISABLEDSTYLE = "style='background-color: #eeeeee;'";
        $DISABLED2 = "disabled";
        $DISABLEDSTYLE2 = "style='background-color: #eeeeee;'";
        $ARRAYDPROCESOINDUSTRIAL = $DRECEPCIONIND_ADO->verDrecepcion($IDOP);
        foreach ($ARRAYDPROCESOINDUSTRIAL as $r) :
            $NUMEROFOLIODINDUSTRIAL = "" . $r['FOLIO_DRECEPCION'];
            $FECHAEMBALADODINDUSTRIAL = "" . $r['FECHA_EMBALADO_DRECEPCION'];
            $KILOSNETO = "" . $r['KILOS_NETO_DRECEPCION'];
            $TMANEJO = "" . $r['ID_TMANEJO'];
            $ESTANDAR = "" . $r['ID_ESTANDAR'];
            $VESPECIES = "" . $r['ID_VESPECIES'];
            $ESTANDAR = "" . $r['ID_ESTANDAR'];
            $ARRAYVERESTANDAR = $EINDUSTRIAL_ADO->verEstandar($ESTANDAR);
            if ($ARRAYVERESTANDAR) {
                $ARRAYVESPECIES = $VESPECIES_ADO->buscarVespeciesPorEspeciesCBX($ARRAYVERESTANDAR[0]['ID_ESPECIES']);
            }
            $ARRAYVESPECIES = $VESPECIES_ADO->verVespecies($r['ID_VESPECIES']);
            $PRODUCTOR = "" . $r['ID_PRODUCTOR'];
            $ARRAYVERPRODUCTOR = $PRODUCTOR_ADO->verProductor($PRODUCTOR);
            if ($ARRAYVERPRODUCTOR) {
                $PRODUCTORDATOS = $ARRAYVERPRODUCTOR[0]["CSG_PRODUCTOR"] .  ":" . $ARRAYVERPRODUCTOR[0]["NOMBRE_PRODUCTOR"];
            }
        endforeach;
    }
    //ver =  OBTENCION DE DATOS PARA LA VISUALIZACION DEL REGISTRO
    if ($OP == "eliminar") {

        $DISABLED = "disabled";
        $DISABLEDSTYLE = "style='background-color: #eeeeee;'";
        $DISABLED2 = "disabled";
        $DISABLEDSTYLE2 = "style='background-color: #eeeeee;'";
        $ARRAYDPROCESOINDUSTRIAL = $DRECEPCIONIND_ADO->verDrecepcion($IDOP);
        $MENSAJEELIMINAR = "ESTA SEGURO DE ELIMINAR EL REGISTRO, PARA CONFIRMAR PRESIONE ELIMINAR";
        foreach ($ARRAYDPROCESOINDUSTRIAL as $r) :
            $NUMEROFOLIODINDUSTRIAL = "" . $r['FOLIO_DRECEPCION'];
            $FECHAEMBALADODINDUSTRIAL = "" . $r['FECHA_EMBALADO_DRECEPCION'];
            $KILOSNETO = "" . $r['KILOS_NETO_DRECEPCION'];
            $TMANEJO = "" . $r['ID_TMANEJO'];
            $ESTANDAR = "" . $r['ID_ESTANDAR'];
            $VESPECIES = "" . $r['ID_VESPECIES'];
            $ESTANDAR = "" . $r['ID_ESTANDAR'];
            $ARRAYVERESTANDAR = $EINDUSTRIAL_ADO->verEstandar($ESTANDAR);
            if ($ARRAYVERESTANDAR) {
                $ARRAYVESPECIES = $VESPECIES_ADO->buscarVespeciesPorEspeciesCBX($ARRAYVERESTANDAR[0]['ID_ESPECIES']);
            }
            $ARRAYVESPECIES = $VESPECIES_ADO->verVespecies($r['ID_VESPECIES']);
            $PRODUCTOR = "" . $r['ID_PRODUCTOR'];
            $ARRAYVERPRODUCTOR = $PRODUCTOR_ADO->verProductor($PRODUCTOR);
            if ($ARRAYVERPRODUCTOR) {
                $PRODUCTORDATOS = $ARRAYVERPRODUCTOR[0]["CSG_PRODUCTOR"] .  ":" . $ARRAYVERPRODUCTOR[0]["NOMBRE_PRODUCTOR"];
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
        $ARRAYVERESTANDAR = $EINDUSTRIAL_ADO->verEstandar($ESTANDAR);
        if ($ARRAYVERESTANDAR) {
            $ARRAYVESPECIES = $VESPECIES_ADO->buscarVespeciesPorEspeciesCBX($ARRAYVERESTANDAR[0]['ID_ESPECIES']);
        }
    }
    if (isset($_REQUEST['VESPECIES'])) {
        $VESPECIES = $_REQUEST['VESPECIES'];
    }
    if (isset($_REQUEST['PRODUCTOR'])) {
        $PRODUCTOR = $_REQUEST['PRODUCTOR'];
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
    <title>Detalle Recepcion</title>
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
                TRECEPCION = document.getElementById("TRECEPCION").value;
                ESTANDAR = document.getElementById("ESTANDAR").selectedIndex;
                VESPECIES = document.getElementById("VESPECIES").selectedIndex;
                KILOSNETO = document.getElementById("KILOSNETO").value;
                TMANEJO = document.getElementById("TMANEJO").selectedIndex;

                document.getElementById('val_fechaembalado').innerHTML = "";
                document.getElementById('val_estandar').innerHTML = "";
                document.getElementById('val_vespecies').innerHTML = "";
                document.getElementById('val_neto').innerHTML = "";
                document.getElementById('val_tmanejo').innerHTML = "";

                if (FECHAEMBALADODINDUSTRIAL == null || FECHAEMBALADODINDUSTRIAL.length == 0 || /^\s+$/.test(FECHAEMBALADODINDUSTRIAL)) {
                    document.form_reg_dato.FECHAEMBALADODINDUSTRIAL.focus();
                    document.form_reg_dato.FECHAEMBALADODINDUSTRIAL.style.borderColor = "#FF0000";
                    document.getElementById('val_fechaembalado').innerHTML = "NO HA INGRESADO DATOS";
                    return false;
                }
                document.form_reg_dato.FECHAEMBALADODINDUSTRIAL.style.borderColor = "#4AF575";

                if (TRECEPCION == 2) {
                    PRODUCTOR = document.getElementById("PRODUCTOR").selectedIndex;
                    document.getElementById('val_productor').innerHTML = "";

                    if (PRODUCTOR == null || PRODUCTOR == 0) {
                        document.form_reg_dato.PRODUCTOR.focus();
                        document.form_reg_dato.PRODUCTOR.style.borderColor = "#FF0000";
                        document.getElementById('val_productor').innerHTML = "NO HA SELECIONADO ALTERNATIVA";
                        return false;
                    }
                    document.form_reg_dato.PRODUCTOR.style.borderColor = "#4AF575";

                }

                if (ESTANDAR == null || ESTANDAR == 0) {
                    document.form_reg_dato.ESTANDAR.focus();
                    document.form_reg_dato.ESTANDAR.style.borderColor = "#FF0000";
                    document.getElementById('val_estandar').innerHTML = "NO HA SELECIONADO ALTERNATIVA";
                    return false;
                }
                document.form_reg_dato.ESTANDAR.style.borderColor = "#4AF575";

                if (VESPECIES == null || VESPECIES == 0) {
                    document.form_reg_dato.VESPECIES.focus();
                    document.form_reg_dato.VESPECIES.style.borderColor = "#FF0000";
                    document.getElementById('val_vespecies').innerHTML = "NO HA SELECIONADO ALTERNATIVA";
                    return false;
                }
                document.form_reg_dato.VESPECIES.style.borderColor = "#4AF575";

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
                                <h3 class="page-title">Registro Detalle</h3>
                                <div class="d-inline-block align-items-center">
                                    <nav>
                                        <ol class="breadcrumb">
                                            <li class="breadcrumb-item"><a href="index.php"><i class="mdi mdi-home-outline"></i></a></li>
                                            <li class="breadcrumb-item" aria-current="page">Modulo</li>
                                            <li class="breadcrumb-item" aria-current="page">Granel</li>
                                            <li class="breadcrumb-item" aria-current="page">Recepcion</li>
                                            <li class="breadcrumb-item" aria-current="page">Industrial</li>
                                            <li class="breadcrumb-item active" aria-current="page"> <a href="#"> Operaciones Registro Detalle </a>
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
                                <div class="box-header with-border">
                                    <!--
                                        <h4 class="box-title">Different Width</h4>
                                        -->
                                </div>
                                <div class="box-body ">
                                    <div class="row">
                                        <div class="col-2">
                                            <div class="form-group">
                                                <input type="hidden" class="form-control" placeholder="ID DRECEPCION" id="ID" name="ID" value="<?php echo $IDOP; ?>" />
                                                <input type="hidden" class="form-control" placeholder="ID RECEPCION" id="IDP" name="IDP" value="<?php echo $IDP; ?>" />
                                                <input type="hidden" class="form-control" placeholder="ID RECEPCION" id="OPP" name="OPP" value="<?php echo $OPP; ?>" />
                                                <input type="hidden" class="form-control" placeholder="ID RECEPCION" id="URLO" name="URLO" value="<?php echo $URLO; ?>" />

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
                                        <div class="col-7">
                                            <div class="form-group">
                                                <input type="hidden" class="form-control" placeholder="TRECEPCION" id="TRECEPCION" name="TRECEPCION" value="<?php echo $TRECEPCION; ?>" />
                                                <input type="hidden" class="form-control" placeholder="FOLIO" id="FOLIO" name="FOLIO" value="<?php echo $FOLIO; ?>" />
                                                <input type="hidden" class="form-control" placeholder="FECHARECEPCION" id="FECHARECEPCION" name="FECHARECEPCION" value="<?php echo $FECHARECEPCION; ?>" />
                                                <label>Productor </label>
                                                <?php if ($TRECEPCION == 1) { ?>
                                                    <input type="hidden" class="form-control" placeholder="PRODUCTOR" id="PRODUCTOR" name="PRODUCTOR" value="<?php echo $PRODUCTOR; ?>" />
                                                    <input type="text" class="form-control" placeholder="Productor" id="PRODUCTORV" name="PRODUCTORV" value="<?php echo $PRODUCTORDATOS; ?>" disabled style='background-color: #eeeeee;'"/>
                                                 <?php } ?>
                                                <?php if ($TRECEPCION == 2) { ?>                                                    
                                                    <select class=" form-control select2" id="PRODUCTOR" name="PRODUCTOR" style="width: 100%;" <?php echo $DISABLED; ?> <?php echo $DISABLEDSTYLE; ?>>
                                                    <option></option>
                                                    <?php foreach ($ARRAYPRODUCTOR as $r) : ?>
                                                        <?php if ($ARRAYPRODUCTOR) {    ?>
                                                            <option value="<?php echo $r['ID_PRODUCTOR']; ?>" <?php if ($PRODUCTOR == $r['ID_PRODUCTOR']) { echo "selected"; } ?>>
                                                                <?php echo $r['CSG_PRODUCTOR'] ?> : <?php echo $r['NOMBRE_PRODUCTOR'] ?>
                                                            </option>
                                                        <?php } else { ?>
                                                            <option>No Hay Datos Registrados </option>
                                                        <?php } ?>
                                                    <?php endforeach; ?>
                                                    </select>
                                                <?php } ?>
                                                <label id="val_productor" class="validacion"> </label>
                                            </div>
                                        </div>
                                        <div class="col-3">
                                            <div class="form-group">
                                                <label>Estandar </label>
                                                <select class="form-control select2" id="ESTANDAR" name="ESTANDAR" style="width: 100%;" onchange="this.form.submit()" <?php echo $DISABLED; ?> <?php echo $DISABLEDSTYLE; ?>>
                                                    <option></option>
                                                    <?php foreach ($ARRAYESTANDAR as $r) : ?>
                                                        <?php if ($ARRAYESTANDAR) {    ?>
                                                            <option value="<?php echo $r['ID_ESTANDAR']; ?>" <?php if ($ESTANDAR == $r['ID_ESTANDAR']) { echo "selected"; } ?>> <?php echo $r['NOMBRE_ESTANDAR'] ?> </option>
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
                                                <label>Variedad</label><br>
                                                <select class="form-control select2" id="VESPECIES" name="VESPECIES" style="width: 100%;" <?php echo $DISABLED; ?>>
                                                    <option></option>
                                                    <?php foreach ($ARRAYVESPECIES as $r) : ?>
                                                        <?php if ($ARRAYVESPECIES) {    ?>
                                                            <option value="<?php echo $r['ID_VESPECIES']; ?>" <?php if ($VESPECIES == $r['ID_VESPECIES']) { echo "selected";} ?>>
                                                                <?php echo $r['NOMBRE_VESPECIES'];?>
                                                            </option>
                                                        <?php } else { ?>
                                                            <option>No Hay Datos Registrados</option>
                                                        <?php } ?>
                                                    <?php endforeach; ?>
                                                </select>
                                                <label id="val_vespecies" class="validacion"> </label>
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
                                                            <option value="<?php echo $r['ID_TMANEJO']; ?>" <?php if ($TMANEJO == $r['ID_TMANEJO']) {
                                                                                                                echo "selected";
                                                                                                            } ?>> <?php echo $r['NOMBRE_TMANEJO'];  ?>
                                                            </option>
                                                        <?php } else { ?>
                                                            <option>No Hay Datos Registrados</option>
                                                        <?php } ?>
                                                    <?php endforeach; ?>
                                                </select>
                                                <label id="val_tmanejo" class="validacion"> </label>
                                            </div>
                                        </div>
                                    </div>
                                    <label id=" val_mensaje" class="validacion"><?php echo $MENSAJEELIMINAR; ?> </label>
                                    <!-- /.row -->
                                </div>
                                <!-- /.box-body -->
                                <div class="box-footer">
                                    <div class="btn-group col-6" role="group" aria-label="Acciones generales">
                                        <button type="button" class="btn btn-success  " data-toggle="tooltip" title="Volver" name="CANCELAR" value="CANCELAR" Onclick="irPagina('<?php echo $URLO; ?>.php?op');">
                                            <i class="ti-back-left "></i> Cancelar
                                        </button>
                                        <?php if ($OP == "") { ?>
                                            <button type="submit" class="btn btn-primary " data-toggle="tooltip" title="Crear" name="CREAR" value="CREAR" <?php echo $DISABLED; ?> onclick="return validacion()">
                                                <i class="ti-save-alt"></i> Crear
                                            </button>
                                        <?php } ?>
                                        <?php if ($OP != "") { ?>
                                            <?php if ($OP == "crear") { ?>
                                                <button type="submit" class="btn btn-primary " data-toggle="tooltip" title="Crear" name="CREAR" value="CREAR" <?php echo $DISABLED; ?> onclick="return validacion()">
                                                    <i class="ti-save-alt"></i> Crear
                                                </button>
                                            <?php } ?>
                                            <?php if ($OP == "editar") { ?>
                                                <button type="submit" class="btn btn-warning   " data-toggle="tooltip" title="Editar" name="EDITAR" value="EDITAR" <?php echo $DISABLED; ?> onclick="return validacion()">
                                                    <i class="ti-save-alt"></i> Editar
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
        <?php 
            if (isset($_REQUEST['CREAR'])){
            //OPERACION DE REGISTRO DE FILA
            //OBTENER EL FOLIO DEL DETALLE DE EXPORTACION DEL PROCESO
                $ARRAYVERFOLIO = $FOLIO_ADO->verFolioPorEmpresaPlantaTemporadaTindustrial($_REQUEST['EMPRESA'], $_REQUEST['PLANTA'], $_REQUEST['TEMPORADA']);
                $FOLIO = $ARRAYVERFOLIO[0]['ID_FOLIO'];
                $ARRAYULTIMOFOLIO = $EXIINDUSTRIAL_ADO->obtenerFolio($FOLIO);
                if ($ARRAYULTIMOFOLIO) {
                    if ($ARRAYULTIMOFOLIO[0]['ULTIMOFOLIO'] == 0) {
                        $FOLIODRECEPCIONIND = $ARRAYVERFOLIO[0]['NUMERO_FOLIO'];
                    } else {
                        $FOLIODRECEPCIONIND =  $ARRAYULTIMOFOLIO[0]['ULTIMOFOLIO2'];
                    }
                } else {
                    $FOLIODRECEPCIONIND = $ARRAYVERFOLIO[0]['NUMERO_FOLIO'];
                }
                $NUMEROFOLIODINDUSTRIAL = $FOLIODRECEPCIONIND + 1;


                $FOLIOALIASESTACTICO = $NUMEROFOLIODINDUSTRIAL;
                $FOLIOALIASDIANAMICO = "EMPRESA:" . $_REQUEST['EMPRESA'] . "_PLANTA:" . $_REQUEST['PLANTA'] . "_TEMPORADA:" . $_REQUEST['TEMPORADA'] .
                    "_TIPO_FOLIO:PRODUCTO INDUSTRIAL_PROCESO:" . $_REQUEST['IDP'] . "_FOLIO:" . $NUMEROFOLIODINDUSTRIAL;

                $DRECEPCIONIND->__SET('FOLIO_DRECEPCION', $NUMEROFOLIODINDUSTRIAL);
                $DRECEPCIONIND->__SET('FECHA_EMBALADO_DRECEPCION', $_REQUEST['FECHAEMBALADODINDUSTRIAL']);
                $DRECEPCIONIND->__SET('KILOS_NETO_DRECEPCION', $_REQUEST['KILOSNETO']);
                $DRECEPCIONIND->__SET('ID_TMANEJO', $_REQUEST['TMANEJO']);
                $DRECEPCIONIND->__SET('ID_FOLIO', $FOLIO);
                $DRECEPCIONIND->__SET('ID_ESTANDAR', $_REQUEST['ESTANDAR']);
                $DRECEPCIONIND->__SET('ID_PRODUCTOR', $_REQUEST['PRODUCTOR']);
                $DRECEPCIONIND->__SET('ID_VESPECIES',  $_REQUEST['VESPECIES']);
                $DRECEPCIONIND->__SET('ID_RECEPCION', $_REQUEST['IDP']);
                $DRECEPCIONIND_ADO->agregarDrecepcion($DRECEPCIONIND);

                //UTILIZACION METODOS SET DEL MODELO
                //SETEO DE ATRIBUTOS DE LA CLASE, OBTENIDO EN EL FORMULARIO
                $EXIINDUSTRIAL->__SET('FOLIO_EXIINDUSTRIAL', $NUMEROFOLIODINDUSTRIAL);
                $EXIINDUSTRIAL->__SET('FOLIO_AUXILIAR_EXIINDUSTRIAL', $NUMEROFOLIODINDUSTRIAL);
                $EXIINDUSTRIAL->__SET('FECHA_EMBALADO_EXIINDUSTRIAL',  $_REQUEST['FECHAEMBALADODINDUSTRIAL']);
                $EXIINDUSTRIAL->__SET('KILOS_NETO_EXIINDUSTRIAL', $_REQUEST['KILOSNETO']);
                $EXIINDUSTRIAL->__SET('ALIAS_DINAMICO_FOLIO_EXIINDUSTRIAL', $FOLIOALIASESTACTICO);
                $EXIINDUSTRIAL->__SET('ALIAS_ESTATICO_FOLIO_EXIINDUSTRIAL', $FOLIOALIASDIANAMICO);
                $EXIINDUSTRIAL->__SET('FECHA_RECEPCION', $_REQUEST['FECHARECEPCION']);
                $EXIINDUSTRIAL->__SET('ID_TMANEJO', $_REQUEST['TMANEJO']);
                $EXIINDUSTRIAL->__SET('ID_FOLIO', $FOLIO);
                $EXIINDUSTRIAL->__SET('ID_ESTANDAR', $_REQUEST['ESTANDAR']);
                $EXIINDUSTRIAL->__SET('ID_PRODUCTOR', $_REQUEST['PRODUCTOR']);
                $EXIINDUSTRIAL->__SET('ID_VESPECIES', $_REQUEST['VESPECIES']);
                $EXIINDUSTRIAL->__SET('ID_EMPRESA', $_REQUEST['EMPRESA']);
                $EXIINDUSTRIAL->__SET('ID_PLANTA', $_REQUEST['PLANTA']);
                $EXIINDUSTRIAL->__SET('ID_TEMPORADA', $_REQUEST['TEMPORADA']);
                $EXIINDUSTRIAL->__SET('ID_RECEPCION', $_REQUEST['IDP']);
                //LLAMADA AL METODO DE REGISTRO DEL CONTROLADOR
                $EXIINDUSTRIAL_ADO->agregarExiindustrialRecepcion($EXIINDUSTRIAL);

                //REDIRECCIONAR A PAGINA registroProceso.php
                $_SESSION["parametro"] =  $_REQUEST['IDP'];
                $_SESSION["parametro1"] =  $_REQUEST['OPP'];
                echo '
                    <script>
                    Swal.fire({
                        icon:"success",
                        title:"Registro creado",
                        text:"Se ha creado una fila para el detalle de recepcion",
                        showConfirmButton:true,
                        confirmButtonText:"Volver a Recepción"
                    }).then((result)=>{
                        if (result.value) {
                            location.href = "'.$_REQUEST['URLO'].'.php?op";
                        }
                    })
                </script>
                ';


                // echo "<script type='text/javascript'> location.href ='" . $_REQUEST['URLO'] . ".php?op';</script>";
        
         } 
        ?>
        <?php         
            if (isset($_REQUEST['EDITAR'])) {

                $DRECEPCIONIND->__SET('FECHA_EMBALADO_DRECEPCION', $_REQUEST['FECHAEMBALADODINDUSTRIAL']);
                $DRECEPCIONIND->__SET('KILOS_NETO_DRECEPCION', $_REQUEST['KILOSNETO']);
                $DRECEPCIONIND->__SET('ID_TMANEJO', $_REQUEST['TMANEJO']);
                $DRECEPCIONIND->__SET('ID_VESPECIES',  $_REQUEST['VESPECIES']);
                $DRECEPCIONIND->__SET('ID_ESTANDAR', $_REQUEST['ESTANDAR']);
                $DRECEPCIONIND->__SET('ID_PRODUCTOR', $_REQUEST['PRODUCTOR']);
                $DRECEPCIONIND->__SET('ID_RECEPCION', $_REQUEST['IDP']);
                $DRECEPCIONIND->__SET('ID_DRECEPCION', $_REQUEST['ID']);
                //LLAMADA AL METODO DE REGISTRO DEL CONTROLADOR
                $DRECEPCIONIND_ADO->actualizarDrecepcion($DRECEPCIONIND);

                $ARRAYVERFOLIOEXISTENCIA = $EXIINDUSTRIAL_ADO->buscarPorRecepcionNumeroFolio($_REQUEST['IDP'],  $_REQUEST["NUMEROFOLIODINDUSTRIALE"]);

                if ($ARRAYVERFOLIOEXISTENCIA) {
                    $EXIINDUSTRIAL->__SET('FECHA_EMBALADO_EXIINDUSTRIAL',  $_REQUEST['FECHAEMBALADODINDUSTRIAL']);
                    $EXIINDUSTRIAL->__SET('KILOS_NETO_EXIINDUSTRIAL', $_REQUEST['KILOSNETO']);
                    $EXIINDUSTRIAL->__SET('FECHA_RECEPCION', $_REQUEST['FECHARECEPCION']);
                    $EXIINDUSTRIAL->__SET('ID_TMANEJO', $_REQUEST['TMANEJO']);
                    $EXIINDUSTRIAL->__SET('ID_ESTANDAR', $_REQUEST['ESTANDAR']);
                    $EXIINDUSTRIAL->__SET('ID_PRODUCTOR', $_REQUEST['PRODUCTOR']);
                    $EXIINDUSTRIAL->__SET('ID_VESPECIES', $_REQUEST['VESPECIES']);
                    $EXIINDUSTRIAL->__SET('ID_EMPRESA', $_REQUEST['EMPRESA']);
                    $EXIINDUSTRIAL->__SET('ID_PLANTA', $_REQUEST['PLANTA']);
                    $EXIINDUSTRIAL->__SET('ID_TEMPORADA', $_REQUEST['TEMPORADA']);
                    $EXIINDUSTRIAL->__SET('ID_RECEPCION', $_REQUEST['IDP']);
                    $EXIINDUSTRIAL->__SET('ID_EXIINDUSTRIAL', $ARRAYVERFOLIOEXISTENCIA[0]['ID_EXIINDUSTRIAL']);
                    //LLAMADA AL METODO DE REGISTRO DEL CONTROLADOR
                    $EXIINDUSTRIAL_ADO->actualizarExiindustrialRecepcion($EXIINDUSTRIAL);
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
                    $EXIINDUSTRIAL->__SET('FECHA_RECEPCION', $_REQUEST['FECHARECEPCION']);
                    $EXIINDUSTRIAL->__SET('ID_TMANEJO', $_REQUEST['TMANEJO']);
                    $EXIINDUSTRIAL->__SET('ID_FOLIO', $FOLIO);
                    $EXIINDUSTRIAL->__SET('ID_ESTANDAR', $_REQUEST['ESTANDAR']);
                    $EXIINDUSTRIAL->__SET('ID_PRODUCTOR', $_REQUEST['PRODUCTOR']);
                    $EXIINDUSTRIAL->__SET('ID_VESPECIES', $_REQUEST['VESPECIES']);
                    $EXIINDUSTRIAL->__SET('ID_EMPRESA', $_REQUEST['EMPRESA']);
                    $EXIINDUSTRIAL->__SET('ID_PLANTA', $_REQUEST['PLANTA']);
                    $EXIINDUSTRIAL->__SET('ID_TEMPORADA', $_REQUEST['TEMPORADA']);
                    $EXIINDUSTRIAL->__SET('ID_RECEPCION', $_REQUEST['IDP']);
                    //LLAMADA AL METODO DE REGISTRO DEL CONTROLADOR
                    $EXIINDUSTRIAL_ADO->agregarExiindustrialRecepcion($EXIINDUSTRIAL);
                }
                //REDIRECCIONAR A PAGINA registroProceso.php 
                $_SESSION["parametro"] =  $_REQUEST['IDP'];
                $_SESSION["parametro1"] =  $_REQUEST['OPP'];
                //echo "<script type='text/javascript'> location.href ='" . $_REQUEST['URLO'] . ".php?op';</script>";
                    echo '                
                    <script>
                        Swal.fire({
                            icon:"success",
                            title:"Registro Modificado",
                            text:"Se ha Modificado una fila en el detalle de recepcion",
                            showConfirmButton:true,
                            confirmButtonText:"Volver a Recepción",
                        }).then((result)=>{
                            if (result.value) {
                                location.href = "'. $_REQUEST['URLO'].'.php?op";
                            }
                        })
                    </script>
                ';
            }
        ?>
        <?php
            if (isset($_REQUEST['ELIMINAR'])) {
                $IDELIMINAR = $_REQUEST['ID'];
                $FOLIOELIMINAR = $_REQUEST['NUMEROFOLIODINDUSTRIALE'];
                $DRECEPCIONIND->__SET('ID_DRECEPCION', $IDELIMINAR);
                $DRECEPCIONIND_ADO->deshabilitar($DRECEPCIONIND);
                $EXIINDUSTRIAL->__SET('ID_RECEPCION', $_REQUEST['IDP']);
                $EXIINDUSTRIAL->__SET('FOLIO_AUXILIAR_EXIINDUSTRIAL', $FOLIOELIMINAR);
                $EXIINDUSTRIAL_ADO->deshabilitarRecepcion($EXIINDUSTRIAL);
                $EXIINDUSTRIAL->__SET('ID_RECEPCION', $_REQUEST['IDP']);
                $EXIINDUSTRIAL->__SET('FOLIO_AUXILIAR_EXIINDUSTRIAL', $FOLIOELIMINAR);
                $EXIINDUSTRIAL_ADO->eliminadoRecepcion($EXIINDUSTRIAL);
                //REDIRECCIONAR A PAGINA registroProceso.php
                $_SESSION["parametro"] =  $_REQUEST['IDP'];
                $_SESSION["parametro1"] =  $_REQUEST['OPP'];
                    echo '  
                    <script>
                    Swal.fire({
                        icon:"success",
                        title:"Registro eliminado",
                        text:"Se ha eliminado una fila en el detalle de recepcion",
                        showConfirmButton:true,
                        confirmButtonText:"Volver a Recepción"
                    }).then((result)=>{
                        if (result.value) {
                            location.href = "'. $_REQUEST['URLO'].'.php?op";
                        }
                    })
                </script>'

                // echo "<script type='text/javascript'> location.href ='" . $_REQUEST['URLO'] . ".php?op';</script>";
                ?>
        
        <?php } ?>


</body>


</html>