<?php

include_once "../config/validarUsuario.php";

//LLAMADA ARCHIVOS NECESARIOS PARA LAS OPERACIONES
include_once '../controlador/EEXPORTACION_ADO.php';
include_once '../controlador/ESPECIES_ADO.php';
include_once '../controlador/PRODUCTOR_ADO.php';
include_once '../controlador/TCALIBRE_ADO.php';

include_once '../controlador/DICARGA_ADO.php';
include_once '../modelo/DICARGA.php';



//INCIALIZAR LAS VARIBLES
//INICIALIZAR CONTROLADOR

$EEXPORTACION_ADO =  new EEXPORTACION_ADO();
$ESPECIES_ADO =  new ESPECIES_ADO();
$PRODUCTOR_ADO =  new PRODUCTOR_ADO();
$TCALIBRE_ADO =  new TCALIBRE_ADO();


$DICARGA_ADO =  new DICARGA_ADO();

//INIICIALIZAR MODELO
$DICARGA =  new DICARGA();

//INICIALIZACION VARIABLES


$CANTIDADENVASE = "";
$KILOSBRUTO = "";
$PRECIOUS = "";
$KILOSNETO = "";
$NOTA = "";
$EEXPORTACION = "";
$ESPECIES = "";
$CALIBRE = "";
$EEXPORTACION = "";

$IDDICARGA = "";
$IDICARGA = "";


$PESOENVASEESTANDAR = "";
$PESOPALLETEESTANDAR = "";
$PESOBRUTOEESTANDAR = "";
$PESONETOEESTANDAR = "";




$EMPRESA = "";
$PLANTA = "";
$TEMPORADA = "";

$TMANEJO = "";
$FOLIOALIAS = "";
$DISABLED = "";
$DISABLED2 = "disabled";
$DISABLEDSTYLE = "";
$DISABLEDSTYLE2 = "style='background-color: #eeeeee;'";



$IDOP = "";
$IDOP2 = "";
$OP = "";
$SINO = "";
$MENSAJE = "";

$NODATOURL = "";

//INICIALIZAR ARREGLOS
$ARRAYESTANDAR = "";
$ARRAYCALIBRE = "";
$ARRAYESTANDARDETALLE = "";




//DEFINIR ARREGLOS CON LOS DATOS OBTENIDOS DE LAS FUNCIONES DE LOS CONTROLADORES

$ARRAYESTANDAR = $EEXPORTACION_ADO->listarEstandarPorEmpresaCBX($EMPRESAS);
$ARRAYCALIBRE = $TCALIBRE_ADO->listarCalibrePorEmpresaCBX($EMPRESAS);
include_once "../config/validarDatosUrlD.php";

//OPERACIONES
//OPERACION DE REGISTRO DE FILA
if (isset($_REQUEST['GUARDAR'])) {
    $ARRAYVERESTANDARID = $EEXPORTACION_ADO->verEstandar($_REQUEST['EEXPORTACION']);
    $PESONETOEESTANDAR = $ARRAYVERESTANDARID[0]['PESO_NETO_ESTANDAR'];
    $PESOBRUTOEESTANDAR = $ARRAYVERESTANDARID[0]['PESO_BRUTO_ESTANDAR'];
    $PESOENVASEESTANDAR = $ARRAYVERESTANDARID[0]['PESO_ENVASE_ESTANDAR'];
    $PESOPALLETEESTANDAR = $ARRAYVERESTANDARID[0]['PESO_PALLET_ESTANDAR'];
    $PDESHIDRATACIONEESTANDAR = $ARRAYVERESTANDARID[0]['PDESHIDRATACION_ESTANDAR'];


    $KILOSNETO = $_REQUEST['CANTIDADENVASE'] * $PESONETOEESTANDAR;
    $KILOSDESHIDRATACION = $KILOSNETO * (1 + ($PDESHIDRATACIONEESTANDAR / 100));
    $KILOSBRUTO = (($_REQUEST['CANTIDADENVASE'] * $PESOENVASEESTANDAR) + $KILOSDESHIDRATACION) + $PESOPALLETEESTANDAR;
    $TOTALPRECIOUS = $_REQUEST['PRECIOUS'] * $_REQUEST['CANTIDADENVASE'];



    $DICARGA->__SET('CANTIDAD_ENVASE_DICARGA', $_REQUEST['CANTIDADENVASE']);
    $DICARGA->__SET('KILOS_NETO_DICARGA', $KILOSNETO);
    $DICARGA->__SET('KILOS_BRUTO_DICARGA', $KILOSBRUTO);
    $DICARGA->__SET('PRECIO_US_DICARGA', $_REQUEST['PRECIOUS']);
    $DICARGA->__SET('TOTAL_PRECIO_US_DICARGA', $TOTALPRECIOUS);
    $DICARGA->__SET('ID_ESTANDAR', $_REQUEST['EEXPORTACION']);
    $DICARGA->__SET('ID_TCALIBRE', $_REQUEST['CALIBRE']);
    $DICARGA->__SET('ID_ICARGA', $_REQUEST['IDICARGA']);
    // $DICARGA_ADO->agregarDicarga($DICARGA);

    //REDIRECCIONAR A PAGINA registroICarga.php 
    //   $_SESSION["parametro"] =  $_REQUEST['IDP'];
    //   $_SESSION["parametro1"] =  $_REQUEST['OPP'];
    //   echo "<script type='text/javascript'> location.href ='" . $_REQUEST['URLO'] . ".php?op';</script>";
}
if (isset($_REQUEST['EDITAR'])) {
    $ARRAYVERESTANDARID = $EEXPORTACION_ADO->verEstandar($_REQUEST['EEXPORTACION']);
    $PESONETOEESTANDAR = $ARRAYVERESTANDARID[0]['PESO_NETO_ESTANDAR'];
    $PESOBRUTOEESTANDAR = $ARRAYVERESTANDARID[0]['PESO_BRUTO_ESTANDAR'];
    $PESOENVASEESTANDAR = $ARRAYVERESTANDARID[0]['PESO_ENVASE_ESTANDAR'];
    $PESOPALLETEESTANDAR = $ARRAYVERESTANDARID[0]['PESO_PALLET_ESTANDAR'];
    $PDESHIDRATACIONEESTANDAR = $ARRAYVERESTANDARID[0]['PDESHIDRATACION_ESTANDAR'];

    $KILOSNETO = $_REQUEST['CANTIDADENVASE'] * $PESONETOEESTANDAR;
    $KILOSDESHIDRATACION = $KILOSNETO * (1 + ($PDESHIDRATACIONEESTANDAR / 100));
    $KILOSBRUTO = (($_REQUEST['CANTIDADENVASE'] * $PESOENVASEESTANDAR) + $KILOSDESHIDRATACION) + $PESOPALLETEESTANDAR;
    $TOTALPRECIOUS = $_REQUEST['PRECIOUS'] * $_REQUEST['CANTIDADENVASE'];

    $DICARGA->__SET('CANTIDAD_ENVASE_DICARGA', $_REQUEST['CANTIDADENVASE']);
    $DICARGA->__SET('KILOS_NETO_DICARGA', $KILOSNETO);
    $DICARGA->__SET('KILOS_BRUTO_DICARGA', $KILOSBRUTO);
    $DICARGA->__SET('PRECIO_US_DICARGA', $_REQUEST['PRECIOUS']);
    $DICARGA->__SET('TOTAL_PRECIO_US_DICARGA', $TOTALPRECIOUS);
    $DICARGA->__SET('ID_ESTANDAR', $_REQUEST['EEXPORTACION']);
    $DICARGA->__SET('ID_TCALIBRE', $_REQUEST['CALIBRE']);
    $DICARGA->__SET('ID_DICARGA', $_REQUEST['ID']);
    // $DICARGA_ADO->actualizarDicarga($DICARGA);

    //REDIRECCIONAR A PAGINA registroICarga.php 
    //   $_SESSION["parametro"] =  $_REQUEST['IDP'];
    //   $_SESSION["parametro1"] =  $_REQUEST['OPP'];
    //   echo "<script type='text/javascript'> location.href ='" . $_REQUEST['URLO'] . ".php?op';</script>";
}
//OPERACION PARA OBTENER EL ID RECEPCION Y FOLIO BASE, SOLO SE OCUPA PARA CREAR UN REGISTRO NUEVO
if (isset($_SESSION['parametro']) && isset($_SESSION['parametro1']) && isset($_SESSION['urlO'])) {
    $IDP = $_SESSION['parametro'];
    $OPP = $_SESSION['parametro1'];
    $URLO = $_SESSION['urlO'];
}
//OBTENCION DE DATOS ENVIADOR A LA URL
//PARA OPERACIONES DE EDICION , VISUALIZACION Y CREACION
//OPERACION PARA IDICARGA EL ID RECEPCION Y FOLIO BASE, SOLO SE OCUPA PARA CREAR UN REGISTRO NUEVO
//OBTENCION DE DATOS ENVIADOR A LA URL
//PARA OPERACIONES DE EDICION , VISUALIZACION Y CREACION
if (isset($_SESSION['parametro']) && isset($_SESSION['parametro1']) && isset($_SESSION['urlO']) && isset($_SESSION['dparametro']) && isset($_SESSION['dparametro1'])) {
    //ALMACENAR DATOS DE VARIABLES DE LA URL
    $IDOP = $_SESSION['dparametro'];
    $OP = $_SESSION['dparametro1'];
    $IDP = $_SESSION['parametro'];
    $OPP = $_SESSION['parametro1'];
    $URLO = $_SESSION['urlO'];



    //IDENTIFICACIONES DE OPERACIONES

    //crear =  OBTENCION DE DATOS PARA LA CREACION DE REGISTRO
    if ($OP == "crear") {

        $DISABLED = "";
        $DISABLED2 = "disabled";
        $DISABLEDSTYLE = "";
        $DISABLEDSTYLE2 = "style='background-color: #eeeeee;'";
        $ARRAYDICARGA = $DICARGA_ADO->verDicarga($IDDICARGA);
        foreach ($ARRAYDICARGA as $r) :
            $CANTIDADENVASE = "" . $r['CANTIDAD_ENVASE_DICARGA'];
            $PRECIOUS = "" . $r['PRECIO_US_DICARGA'];
            $EEXPORTACION = "" . $r['ID_ESTANDAR'];
            $CALIBRE = "" . $r['ID_TCALIBRE'];
            $ARRAYVERESTANDAR = $EEXPORTACION_ADO->verEstandar($EEXPORTACION);
            $ARRAYVERESPECIES = $ESPECIES_ADO->verEspecies($ARRAYVERESTANDAR[0]['ID_ESPECIES']);
            $ESPECIES =  $ARRAYVERESPECIES[0]['NOMBRE_ESPECIES'];
            $IDICARGA = "" . $r['ID_ICARGA'];

        endforeach;
    }
    //editar =  OBTENCION DE DATOS PARA LA EDICION DE REGISTRO
    if ($OP == "editar") {

        $DISABLED = "";
        $DISABLED2 = "disabled";
        $DISABLEDSTYLE = "";
        $DISABLEDSTYLE2 = "style='background-color: #eeeeee;'";
        $ARRAYDICARGA = $DICARGA_ADO->verDicarga($IDDICARGA);
        foreach ($ARRAYDICARGA as $r) :
            $CANTIDADENVASE = "" . $r['CANTIDAD_ENVASE_DICARGA'];
            $PRECIOUS = "" . $r['PRECIO_US_DICARGA'];
            $EEXPORTACION = "" . $r['ID_ESTANDAR'];
            $CALIBRE = "" . $r['ID_TCALIBRE'];
            $ARRAYVERESTANDAR = $EEXPORTACION_ADO->verEstandar($EEXPORTACION);
            $ARRAYVERESPECIES = $ESPECIES_ADO->verEspecies($ARRAYVERESTANDAR[0]['ID_ESPECIES']);
            $ESPECIES =  $ARRAYVERESPECIES[0]['NOMBRE_ESPECIES'];
            $IDICARGA = "" . $r['ID_ICARGA'];

        endforeach;
    }
    //ver =  OBTENCION DE DATOS PARA LA VISUALIZACION DEL REGISTRO
    if ($OP == "ver") {
        $DISABLED = "disabled";
        $DISABLED2 = "disabled";
        $DISABLEDSTYLE = "style='background-color: #eeeeee;'";
        $DISABLEDSTYLE2 = "style='background-color: #eeeeee;'";
        $ARRAYDICARGA = $DICARGA_ADO->verDicarga($IDDICARGA);
        foreach ($ARRAYDICARGA as $r) :
            $CANTIDADENVASE = "" . $r['CANTIDAD_ENVASE_DICARGA'];
            $PRECIOUS = "" . $r['PRECIO_US_DICARGA'];
            $EEXPORTACION = "" . $r['ID_ESTANDAR'];
            $CALIBRE = "" . $r['ID_TCALIBRE'];
            $ARRAYVERESTANDAR = $EEXPORTACION_ADO->verEstandar($EEXPORTACION);
            $ARRAYVERESPECIES = $ESPECIES_ADO->verEspecies($ARRAYVERESTANDAR[0]['ID_ESPECIES']);
            $ESPECIES =  $ARRAYVERESPECIES[0]['NOMBRE_ESPECIES'];
            $IDICARGA = "" . $r['ID_ICARGA'];
        endforeach;
    }
}
if ($_POST) {
    if (isset($_REQUEST['EEXPORTACION'])) {
        $EEXPORTACION = $_REQUEST['EEXPORTACION'];
        if ($EEXPORTACION) {
            $ARRAYVERESTANDAR = $EEXPORTACION_ADO->verEstandar($EEXPORTACION);
            $ARRAYVERESPECIES = $ESPECIES_ADO->verEspecies($ARRAYVERESTANDAR[0]['ID_ESPECIES']);
            $ESPECIES =  $ARRAYVERESPECIES[0]['NOMBRE_ESPECIES'];
        }
    }
    if (isset($_REQUEST['CALIBRE'])) {
        $CALIBRE = $_REQUEST['CALIBRE'];
    }
    if (isset($_REQUEST['CANTIDADENVASE'])) {
        $CANTIDADENVASE = $_REQUEST['CANTIDADENVASE'];
    }
    if (isset($_REQUEST['PRECIOUS'])) {
        $PRECIOUS = $_REQUEST['PRECIOUS'];
    }
    if (isset($_REQUEST['NOTA'])) {
        $NOTA = $_REQUEST['NOTA'];
    }
}
?>


<!DOCTYPE html>
<html lang="es">

<head>
    <title> Registro Detalle</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="description" content="">
    <meta name="author" content="">
    <!- LLAMADA DE LOS ARCHIVOS NECESARIOS PARA DISEÑO Y FUNCIONES BASE DE LA VISTA -!>
        <?php include_once "../config/urlHead.php"; ?>
        <!- FUNCIONES BASES -!>
            <script type="text/javascript">
                function validacion() {

                    EEXPORTACION = document.getElementById("EEXPORTACION").selectedIndex;
                    CALIBRE = document.getElementById("CALIBRE").selectedIndex;
                    CANTIDADENVASE = document.getElementById("CANTIDADENVASE").value;
                    PRECIOUS = document.getElementById("PRECIOUS").value;

                    document.getElementById('val_estandar').innerHTML = "";
                    document.getElementById('val_calibre').innerHTML = "";
                    document.getElementById('val_cantidad').innerHTML = "";
                    document.getElementById('val_us').innerHTML = "";

                    if (EEXPORTACION == null || EEXPORTACION == 0) {
                        document.form_reg_dato.EEXPORTACION.focus();
                        document.form_reg_dato.EEXPORTACION.style.borderColor = "#FF0000";
                        document.getElementById('val_estandar').innerHTML = "NO HA SELECIONADO ALTERNATIVA";
                        return false;
                    }
                    document.form_reg_dato.EEXPORTACION.style.borderColor = "#4AF575";

                    if (CALIBRE == null || CALIBRE == 0) {
                        document.form_reg_dato.CALIBRE.focus();
                        document.form_reg_dato.CALIBRE.style.borderColor = "#FF0000";
                        document.getElementById('val_calibre').innerHTML = "NO HA SELECIONADO ALTERNATIVA";
                        return false;
                    }
                    document.form_reg_dato.CALIBRE.style.borderColor = "#4AF575";


                    if (CANTIDADENVASE == null || CANTIDADENVASE.length == 0 || /^\s+$/.test(CANTIDADENVASE)) {
                        document.form_reg_dato.CANTIDADENVASE.focus();
                        document.form_reg_dato.CANTIDADENVASE.style.borderColor = "#FF0000";
                        document.getElementById('val_cantidad').innerHTML = "NO HA INGRESADO DATOS";
                        return false;
                    }
                    document.form_reg_dato.CANTIDADENVASE.style.borderColor = "#4AF575";

                    if (PRECIOUS == null || PRECIOUS.length == 0 || /^\s+$/.test(PRECIOUS)) {
                        document.form_reg_dato.PRECIOUS.focus();
                        document.form_reg_dato.PRECIOUS.style.borderColor = "#FF0000";
                        document.getElementById('val_us').innerHTML = "NO HA INGRESADO DATOS";
                        return false;
                    }
                    document.form_reg_dato.PRECIOUS.style.borderColor = "#4AF575";


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

<body class="hold-transition light-skin fixed sidebar-mini theme-primary">
    <div class="wrapper">
        <!- LLAMADA AL MENU PRINCIPAL DE LA PAGINA-!>
            <?php //include_once "../config/menu.php"; 
            ?>

            <div class="content-wrapper">
                <div class="container-full">

                    <!-- Content Header (Page header) -->
                    <div class="content-header">
                        <div class="d-flex align-items-center">
                            <div class="mr-auto">
                                <h3 class="page-title"> Registro Detalle</h3>
                                <div class="d-inline-block align-items-center">
                                    <nav>
                                        <ol class="breadcrumb">
                                            <li class="breadcrumb-item"> <a href="index.php"> <i class="mdi mdi-home-outline"></i></a></li>
                                            <li class="breadcrumb-item" aria-current="page">Módulo</li>
                                            <li class="breadcrumb-item" aria-current="page">Logistica</li>
                                            <li class="breadcrumb-item" aria-current="page">Instructivo Carga</li>
                                            <li class="breadcrumb-item active" aria-current="page"> <a href="registroICarga.php">Operaciones Registro Detalle </a>
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
                        <div class="box">
                            <div class="box-header with-border">
                                <!--
                                        <h4 class="box-title">Different Width</h4>
                                        -->
                            </div>

                            <form class="form" role="form" method="post" name="form_reg_dato" onsubmit="return validacion()">
                                <div class="box-body form-element">
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <input type="hidden" class="form-control" placeholder="ID DICARGA" id="ID" name="ID" value="<?php echo $IDOP; ?>" />
                                                <input type="hidden" class="form-control" placeholder="ID ICARGA" id="IDP" name="IDP" value="<?php echo $IDP; ?>" />
                                                <input type="hidden" class="form-control" placeholder="OP ICARGA" id="OPP" name="OPP" value="<?php echo $OPP; ?>" />
                                                <input type="hidden" class="form-control" placeholder="URL ICARGA" id="URLO" name="URLO" value="<?php echo $URLO; ?>" />
                                                <input type="hidden" class="form-control" placeholder="ID EMPRESA" id="EMPRESA" name="EMPRESA" value="<?php echo $EMPRESAS; ?>" />
                                                <input type="hidden" class="form-control" placeholder="ID PLANTA" id="PLANTA" name="PLANTA" value="<?php echo $PLANTAS; ?>" />
                                                <input type="hidden" class="form-control" placeholder="ID TEMPORADA" id="TEMPORADA" name="TEMPORADA" value="<?php echo $TEMPORADAS; ?>" />
                                                <label>Estandar</label>
                                                <input type="hidden" class="form-control" placeholder="EEXPORTACIONE" id="EEXPORTACIONE" name="EEXPORTACIONE" value="<?php echo $EEXPORTACION; ?>" />
                                                <select class="form-control select2" id="EEXPORTACION" name="EEXPORTACION" onchange="this.form.submit();" style="width: 100%;" <?php echo $DISABLED; ?>>
                                                    <option></option>
                                                    <?php foreach ($ARRAYESTANDAR as $r) : ?>
                                                        <?php if ($ARRAYESTANDAR) {    ?>
                                                            <option value="<?php echo $r['ID_ESTANDAR']; ?>" <?php if ($EEXPORTACION == $r['ID_ESTANDAR']) {
                                                                                                                    echo "selected";
                                                                                                                } ?>>
                                                                <?php echo $r['NOMBRE_ESTANDAR'] ?>
                                                            </option>
                                                        <?php } else { ?>
                                                            <option>No Hay Datos Registrados </option>
                                                        <?php } ?>
                                                    <?php endforeach; ?>
                                                </select>
                                                <label id="val_estandar" class="validacion"> </label>
                                            </div>
                                        </div>
                                        <div class="col-sm-4 col-12">
                                            <div class="form-group">
                                                <label>Especies </label>
                                                <input type="hidden" class="form-control" placeholder="ESPECIESE" id="ESPECIESE" name="ESPECIESE" value="<?php echo $ESPECIES; ?>" />
                                                <input type="text" class="form-control" placeholder="ESPECIES" id="ESPECIES" name="ESPECIES" value="<?php echo $ESPECIES; ?>" disabled style="background-color: #eeeeee;" />
                                                <label id="val_especies" class="validacion"> </label>
                                            </div>
                                        </div>
                                        <div class="col-sm-4 col-12">
                                            <div class="form-group">
                                                <label>Calibre</label>
                                                <input type="hidden" class="form-control" placeholder="CALIBREE" id="CALIBREE" name="CALIBREE" value="<?php echo $CALIBRE; ?>" />
                                                <select class="form-control select2" id="CALIBRE" name="CALIBRE" style="width: 100%;" <?php echo $DISABLED; ?>>
                                                    <option></option>
                                                    <?php foreach ($ARRAYCALIBRE as $r) : ?>
                                                        <?php if ($ARRAYCALIBRE) {    ?>
                                                            <option value="<?php echo $r['ID_TCALIBRE']; ?>" <?php if ($CALIBRE == $r['ID_TCALIBRE']) {
                                                                                                                    echo "selected";
                                                                                                                } ?>>
                                                                <?php echo $r['NOMBRE_TCALIBRE'] ?>
                                                            </option>
                                                        <?php } else { ?>
                                                            <option>No Hay Datos Registrados </option>
                                                        <?php } ?>
                                                    <?php endforeach; ?>
                                                </select>
                                                <label id="val_calibre" class="validacion"> </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label>Cantidad Envase</label>
                                                <input type="hidden" id="CANTIDADENVASEE" name="CANTIDADENVASEE" value="<?php echo $CANTIDADENVASE; ?>" />
                                                <input type="number" class="form-control" placeholder="Cantidad Envase" id="CANTIDADENVASE" name="CANTIDADENVASE" value="<?php echo $CANTIDADENVASE; ?>" <?php echo $DISABLED; ?> <?php echo $DISABLEDSTYLE; ?> />
                                                <label id="val_cantidad" class="validacion"> </label>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label>Precio $US</label>
                                                <input type="hidden" id="PRECIOUSE" name="PRECIOUSE" value="<?php echo $PRECIOUS; ?>" />
                                                <input type="number" class="form-control" placeholder="Kilos Netos" id="PRECIOUS" name="PRECIOUS" value="<?php echo $PRECIOUS; ?>" />
                                                <label id="val_us" class="validacion"> </label>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- /.row -->
                                    <!-- /.box-body -->
                                    <div class="box-footer">
                                        <div class="btn-group btn-rounded btn-block col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12 col-xs-12" role="group" aria-label="Acciones generales">
                                            <button type="button" class="btn btn-rounded btn-success  " data-toggle="tooltip" title="Volver" name="CANCELAR" value="CANCELAR" Onclick="irPagina('<?php echo $URLO; ?>.php?op');">
                                                <i class="ti-back-left "></i>
                                            </button>
                                            <?php if ($OP == "") { ?>
                                                <button type="submit" class="btn btn-rounded btn-primary " data-toggle="tooltip" title="Crear" name="CREAR" value="CREAR" <?php echo $DISABLED; ?>>
                                                    <i class="ti-save-alt"></i>
                                                </button>
                                            <?php } ?>
                                            <?php if ($OP != "") { ?>
                                                <?php if ($OP == "crear") { ?>
                                                    <button type="submit" class="btn btn-rounded btn-primary " data-toggle="tooltip" title="Crear" name="CREAR" value="CREAR" <?php echo $DISABLED; ?>>
                                                        <i class="ti-save-alt"></i>
                                                    </button>
                                                <?php } ?>
                                                <?php if ($OP == "editar") { ?>
                                                    <button type="submit" class="btn btn-rounded btn-warning   " data-toggle="tooltip" title="Editar" name="EDITAR" value="EDITAR" <?php echo $DISABLED; ?>>
                                                        <i class="ti-save-alt"></i>
                                                    </button>
                                                <?php } ?>
                                                <?php if ($OP == "eliminar") { ?>
                                                    <button type="submit" class="btn btn-rounded btn-danger " data-toggle="tooltip" title="Eliminar" name="ELIMINAR" value="ELIMINAR">
                                                        <i class="ti-trash"></i>
                                                    </button>
                                                <?php } ?>
                                            <?php } ?>
                                        </div>
                                    </div>
                            </form>
                        </div>
                        <!--.row -->
                    </section>
                </div>
            </div>

            <!- LLAMADA ARCHIVO DEL DISEÑO DEL FOOTER Y MENU USUARIO -!>
                <?php include_once "../config/footer.php";   ?>
                <?php include_once "../config/menuExtra.php"; ?>
    </div>
    <!- LLAMADA URL DE ARCHIVOS DE DISEÑO Y JQUERY E OTROS -!>
        <?php include_once "../config/urlBase.php"; ?>
</body>

</html>