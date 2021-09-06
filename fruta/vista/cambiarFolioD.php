<?php

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
        $EXIEXPORTACION->__SET('ID_EXIEXPORTACION', $_REQUEST['IDEXISTENCIA']);
        $EXIEXPORTACION_ADO->cambioFolio($EXIEXPORTACION);

        echo "
           <script type='text/javascript'>
                window.opener.refrescar()
                window.close();
            </script> 
        ";
    }
    if ($SINO == "0") {
    }
}


//OPERACION PARA OBTENER EL ID RECEPCION Y FOLIO BASE, SOLO SE OCUPA PARA CREAR UN REGISTRO NUEVO
if (isset($_REQUEST['IDEXISTENCIA'])) {
    //ALMACENAR DATOS DE VARIABLES DE LA URL
    $IDEXISTENCIA = $_REQUEST['IDEXISTENCIA'];
    $ARRAYVEREXISTENCIA =  $EXIEXPORTACION_ADO->verExiexportacion($IDEXISTENCIA);
    $FOLIO = $ARRAYVEREXISTENCIA[0]["FOLIO_EXIEXPORTACION"];

    $NODATOURL = "1";
} else {

    $NODATOURL = "0";
}

if ($_POST) {
    if (isset($_REQUEST['FOLION'])) {
        $FOLION = $_REQUEST['FOLION'];
    }
}
if ($NODATOURL == "0") {
    header('Location: index.php');
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

                function cerrar() {
                    window.opener.refrescar()
                    window.close();
                }


                //FUNCION PARA CERRAR VENTANA Y ACTUALIZAR PRINCIPAL
            </script>

</head>

<body class="hold-transition light-skin fixed sidebar-mini theme-primary">
    <div class="wrapper">
        <!- LLAMADA AL MENU PRINCIPAL DE LA PAGINA-!>
            <?php //include_once "../config/menu.php"; 
            ?>
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
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Folio Original</label>
                                        <input type="hidden" id="IDEXISTENCIA" name="IDEXISTENCIA" value="<?php echo $IDEXISTENCIA; ?>" />
                                        <input type="hidden" id="FOLIOE" name="FOLIOE" value="<?php echo $FOLIO; ?>" />
                                        <input type="number" class="form-control" placeholder="Folio Original" id="FOLIO" name="FOLIO" value="<?php echo $FOLIO; ?>" disabled style='background-color: #eeeeee;' />
                                        <label id="val_fo" class="validacion"> </label>
                                    </div>
                                </div>
                                <div class="col-sm-6">
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
                                <button type="button" class="btn btn-rounded btn-warning btn-outline" name="CERRAR" value="CERRAR" Onclick="cerrar();">
                                    <i class="ti-trash"></i> Cerrar
                                </button>
                                <button type="submit" class="btn btn-rounded btn-primary btn-outline" name="CAMBIAR" value="CAMBIAR" <?php echo $DISABLED; ?>>
                                    <i class="ti-save-alt"></i> Cambiar
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
                <!--.row -->
            </section>
            <!- LLAMADA ARCHIVO DEL DISEÑO DEL FOOTER Y MENU USUARIO -!>
                <?php //include_once "../config/footer.php";   
                ?>
                <?php include_once "../config/menuExtra.php"; ?>
    </div>
    <!- LLAMADA URL DE ARCHIVOS DE DISEÑO Y JQUERY E OTROS -!>
        <?php include_once "../config/urlBase.php"; ?>
</body>

</html>