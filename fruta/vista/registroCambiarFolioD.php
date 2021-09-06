<?php
include_once "../config/validarUsuario.php";

//LLAMADA ARCHIVOS NECESARIOS PARA LAS OPERACIONES

include_once '../controlador/EXIEXPORTACION_ADO.php';
include_once '../modelo/EXIEXPORTACION.php';



//INCIALIZAR LAS VARIBLES
//INICIALIZAR CONTROLADOR

$EXIEXPORTACION_ADO =  new EXIEXPORTACION_ADO();

//INIICIALIZAR MODELO
$EXIEXPORTACION =  new EXIEXPORTACION();

//INICIALIZACION VARIABLES


$FOLIO = "";
$FOLION = "";
$SINO = "";

$MENSAJE = "";
$DISABLED = "";
$DISABLED2 = "disabled";
$DISABLEDSTYLE = "";
$DISABLEDSTYLE2 = "style='background-color: #eeeeee;'";




//INICIALIZAR ARREGLOS
$ARRAYFOLIOPOEXPO = "";



//DEFINIR ARREGLOS CON LOS DATOS OBTENIDOS DE LAS FUNCIONES DE LOS CONTROLADORES


//OPERACIONES
//OPERACION DE REGISTRO DE FILA
if (isset($_REQUEST['CAMBIAR'])) {

    $ARRAYFOLIOPOEXPO = $EXIEXPORTACION_ADO->buscarPorFolio($_REQUEST['FOLION']);
    if ($ARRAYFOLIOPOEXPO) {
        $SINO = "1";
        $MENSAJE = "EL FOLIO INGRESADO EXISTE";
    } else {
        $SINO = "0";
        $$MENSAJE = "";
    }

    if ($SINO == "0") {

        $EXIEXPORTACION->__SET('FOLIO_AUXILIAR_EXIEXPORTACION', $_REQUEST['FOLION']);
        $EXIEXPORTACION->__SET('ID_EXIEXPORTACION', $_REQUEST['ID']);
        $EXIEXPORTACION_ADO->cambioFolio($EXIEXPORTACION);
        echo "<script type='text/javascript'> location.href ='" . $_REQUEST['URLO'] . ".php';</script>";
    }
}


//OPERACION PARA OBTENER EL ID RECEPCION Y FOLIO BASE, SOLO SE OCUPA PARA CREAR UN REGISTRO NUEVO
if (isset($_SESSION['parametro']) && isset($_SESSION['parametro1']) && isset($_SESSION['urlO'])) {
    $ID = $_SESSION['parametro'];
    $OP = $_SESSION['parametro1'];
    $URLO = $_SESSION['urlO'];

    //ALMACENAR DATOS DE VARIABLES DE LA URL
    $ARRAYVEREXISTENCIA =  $EXIEXPORTACION_ADO->verExiexportacion($ID);
    $FOLIO = $ARRAYVEREXISTENCIA[0]["FOLIO_EXIEXPORTACION"];
}

if ($_POST) {
    if (isset($_REQUEST['FOLION'])) {
        $FOLION = $_REQUEST['FOLION'];
    }
}

?>


<!DOCTYPE html>
<html lang="es">

<head>
    <title>Registro Detalle Producto Terminado</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="description" content="">
    <meta name="author" content="">
    <!- LLAMADA DE LOS ARCHIVOS NECESARIOS PARA DISEÑO Y FUNCIONES BASE DE LA VISTA -!>
        <?php include_once "../config/urlHead.php"; ?>
        <!- FUNCIONES BASES -!>
            <script type="text/javascript">
                function validacion() {

                    FOLION = document.getElementById("FOLION").value;
                    document.getElementById('val_fn').innerHTML = "";


                    if (FOLION == null || FOLION.length == 0 || /^\s+$/.test(FOLION)) {
                        document.form_reg_dato.FOLION.focus();
                        document.form_reg_dato.FOLION.style.borderColor = "#FF0000";
                        document.getElementById('val_fn').innerHTML = "NO HA INGRESADO DATOS";
                        return false;
                    }
                    document.form_reg_dato.FOLION.style.borderColor = "#4AF575";


                    if (FOLION.length > 9) {
                        document.form_reg_dato.FOLION.focus();
                        document.form_reg_dato.FOLION.style.borderColor = "#FF0000";
                        document.getElementById('val_fn').innerHTML = "NO SE PUEDEN INGRESAR UN FOLIO CON MAS DE DIES DIJITOS";
                        return false;
                    }
                    document.form_reg_dato.FOLION.style.borderColor = "#4AF575";

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


            <?php include_once "../config/menu.php";
            ?>
            <div class="content-wrapper">
                <div class="container-full">

                    <!-- Content Header (Page header) -->
                    <div class="content-header">
                        <div class="d-flex align-items-center">
                            <div class="mr-auto">
                                <h3 class="page-title">Cambiar Folio PT </h3>
                                <div class="d-inline-block align-items-center">
                                    <nav>
                                        <ol class="breadcrumb">
                                            <li class="breadcrumb-item"><a href="index.php"><i class="mdi mdi-home-outline"></i></a></li>
                                            <li class="breadcrumb-item" aria-current="page">Módulo</li>
                                            <li class="breadcrumb-item" aria-current="page">Frigorifico</li>
                                            <li class="breadcrumb-item active" aria-current="page"> <a href="registroCambiarFolioPT.php"> Cambiar Folio PT </a>
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
                                        <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12 col-xs-12">
                                            <div class="form-group">
                                                <label>Folio Original</label>
                                                <input type="hidden" class="form-control" placeholder="ID EXISTENCIA" id="ID" name="ID" value="<?php echo $ID; ?>" />
                                                <input type="hidden" class="form-control" placeholder="OP EXISTENCIA" id="OP" name="OP" value="<?php echo $OP; ?>" />
                                                <input type="hidden" class="form-control" placeholder="URL EXISTENCIA" id="URLO" name="URLO" value="<?php echo $URLO; ?>" />
                                                <input type="hidden" id="FOLIOE" name="FOLIOE" value="<?php echo $FOLIO; ?>" />
                                                <input type="number" class="form-control" placeholder="Folio Original" id="FOLIO" name="FOLIO" value="<?php echo $FOLIO; ?>" disabled style='background-color: #eeeeee;' />
                                                <label id="val_fo" class="validacion"> </label>
                                            </div>
                                        </div>
                                        <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12 col-xs-12">
                                            <div class="form-group">
                                                <label>Folio Nuevo</label>
                                                <input type="hidden" id="FOLIONE" name="FOLIONE" value="<?php echo $FOLION; ?>" />
                                                <input type="number" class="form-control" placeholder="Folio Nuevo" id="FOLION" name="FOLION" value="<?php echo $FOLION; ?>" />
                                                <label id="val_fn" class="validacion"> <?php echo $MENSAJE; ?></label>
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
                                            <button type="submit" class="btn btn-rounded btn-warning   " data-toggle="tooltip" title="Cambiar" name="CAMBIAR" value="EDCAMBIARITAR" <?php echo $DISABLED; ?>>
                                                <i class="ti-save-alt"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
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
</body>

</html>