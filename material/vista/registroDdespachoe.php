<?php

include_once "../config/validarUsuario.php";
//LLAMADA ARCHIVOS NECESARIOS PARA LAS OPERACIONES

include_once '../controlador/PRODUCTO_ADO.php';
include_once '../controlador/TUMEDIDA_ADO.php';
include_once '../controlador/FOLIO_ADO.php';
include_once '../controlador/BODEGA_ADO.php';


include_once '../controlador/INVENTARIOE_ADO.php';
include_once '../controlador/DESPACHOE_ADO.php';

include_once '../modelo/INVENTARIOE.php';


//INCIALIZAR LAS VARIBLES
//INICIALIZAR CONTROLADOR

$PRODUCTO_ADO =  new PRODUCTO_ADO();
$TUMEDIDA_ADO =  new TUMEDIDA_ADO();
$FOLIO_ADO =  new FOLIO_ADO();
$BODEGA_ADO =  new BODEGA_ADO();

$INVENTARIOE_ADO =  new INVENTARIOE_ADO();
$DESPACHOE_ADO =  new DESPACHOE_ADO();

//INIICIALIZAR MODELO
$INVENTARIOE =  new INVENTARIOE();

//INICIALIZACION VARIABLES
$NUMEROFOLIO = "";
$FOLIOINVENTARIO = "";
$DESCRIPCION = "";
$CANTIDAD = "";
$VALORUNITARIO = 0;

$ALIASDINAMICO = "";
$ALIASESTACTICO = "";
$VALORTOTAL = 0;
$CANTIDADINGRESADO = 0;
$CANTIDADRESTANTE = 0;

$PRODUCTO = "";
$TUMEDIDA = "";
$TUMEDIDAV = "";

$EMPRESA = "";
$PLANTA = "";
$TEMPORADA = "";
$PLANTA = "";
$FOLIO = "";



$PLANTA3 = "";

$PROVEEDOR = "";
$PRODUCTOR = "";
$PLANTA2 = "";
$BODEGA = "";
$TRECEPCION = "";

$ESTADO = "";

$DISABLED = "";
$DISABLED2 = "";

$IDOP = "";
$OP = "";
$IDPOP = "";
$OPP = "";
$URLP = "";
$SINO = "";
$MENSAJE = "";


//INICIALIZAR ARREGLOS
$ARRAYPRODUCTO = "";
$ARRAYVERPRODUCTO = "";
$ARRAYTCONTENEDOR = "";
$ARRAYTUMEDIDA = "";
$ARRAYVERTUMEDIDA = "";
$ARRAYDTARJA = "";
$ARRAYDRECEPCION = "";
$ARRAYRECEPCION = "";
$ARRAYVERFOLIOVALIDAR = "";
$ARRAYVERFOLIO;



//DEFINIR ARREGLOS CON LOS DATOS OBTENIDOS DE LAS FUNCIONES DE LOS CONTROLADORES


$ARRAYPRODUCTO = $PRODUCTO_ADO->listarProductoPorEmpresaCBX($EMPRESAS);
$ARRAYTUMEDIDA = $TUMEDIDA_ADO->listarTumedidaPorEmpresaCBX($EMPRESAS);
$ARRAYBODEGA = $BODEGA_ADO->listarBodegaPorEmpresaPlantaCBX($EMPRESAS, $PLANTAS);
include_once "../config/validarDatosUrlD.php";




//OPERACIONES
//OPERACION DE REGISTRO DE FILA
if (isset($_REQUEST['CREAR'])) {

    $INVENTARIOE->__SET('CANTIDAD_SALIDA', $_REQUEST['CANTIDAD']);
    $INVENTARIOE->__SET('ID_EMPRESA', $_REQUEST['EMPRESA']);
    $INVENTARIOE->__SET('ID_PLANTA', $_REQUEST['PLANTA']);
    $INVENTARIOE->__SET('ID_TEMPORADA', $_REQUEST['TEMPORADA']);
    $INVENTARIOE->__SET('ID_BODEGA',  $_REQUEST['BODEGA']);
    $INVENTARIOE->__SET('ID_PRODUCTO', $_REQUEST['PRODUCTO']);
    $INVENTARIOE->__SET('ID_TUMEDIDA', $_REQUEST['TUMEDIDA']);
    $INVENTARIOE->__SET('ID_DESPACHO', $_REQUEST['IDP']);
    $INVENTARIOE_ADO->agregarInventarioDespacho($INVENTARIOE);

    //REDIRECCIONAR A PAGINA registroRecepcion.php     
    $_SESSION["parametro"] =  $_REQUEST['IDP'];
    $_SESSION["parametro1"] =  $_REQUEST['OPP'];
    echo "<script type='text/javascript'> location.href ='" . $_REQUEST['URLP'] . ".php?op';</script>";
}
if (isset($_REQUEST['EDITAR'])) {

    $INVENTARIOE->__SET('CANTIDAD_SALIDA', $_REQUEST['CANTIDAD']);
    $INVENTARIOE->__SET('ID_EMPRESA', $_REQUEST['EMPRESA']);
    $INVENTARIOE->__SET('ID_PLANTA', $_REQUEST['PLANTA']);
    $INVENTARIOE->__SET('ID_TEMPORADA', $_REQUEST['TEMPORADA']);
    $INVENTARIOE->__SET('ID_BODEGA',  $_REQUEST['BODEGA']);
    $INVENTARIOE->__SET('ID_TUMEDIDA', $_REQUEST['TUMEDIDA']);
    $INVENTARIOE->__SET('ID_PRODUCTO', $_REQUEST['PRODUCTOE']);
    $INVENTARIOE->__SET('ID_DESPACHO', $_REQUEST['IDP']);
    $INVENTARIOE->__SET('ID_INVENTARIO', $_REQUEST['IDD']);
    $INVENTARIOE_ADO->actualizarInventarioDespacho($INVENTARIOE);

    $_SESSION["parametro"] =  $_REQUEST['IDP'];
    $_SESSION["parametro1"] =  $_REQUEST['OPP'];
    echo "<script type='text/javascript'> location.href ='" . $_REQUEST['URLP'] . ".php?op';</script>";
}
if (isset($_REQUEST['ELIMINAR'])) {

    $INVENTARIOE->__SET('ID_INVENTARIO', $_REQUEST['IDD']);
    $INVENTARIOE_ADO->eliminado($INVENTARIOE);
    $INVENTARIOE->__SET('ID_INVENTARIO', $_REQUEST['IDD']);
    $INVENTARIOE_ADO->deshabilitar($INVENTARIOE);

    if ($_REQUEST["TDESPACHO"] == "1") {
        $ARRAYVALIDARINGRESO = $INVENTARIOE_ADO->verInventario($_REQUEST['IDD']);
        $ARRAYVALIDARINGRESO2 = $INVENTARIOE_ADO->buscarPorDespachoIngresoBodega($_REQUEST['IDP'], $ARRAYVALIDARINGRESO[0]['INGRESO'], $ARRAYVALIDARINGRESO[0]['ID_BODEGA']);
        if ($ARRAYVALIDARINGRESO2) {
            $INVENTARIOE->__SET('ID_INVENTARIO', $ARRAYVALIDARINGRESO2[0]['ID_INVENTARIO']);
            $INVENTARIOE_ADO->eliminado($INVENTARIOE);
            $INVENTARIOE->__SET('ID_INVENTARIO', $ARRAYVALIDARINGRESO2[0]['ID_INVENTARIO']);
            $INVENTARIOE_ADO->deshabilitar($INVENTARIOE);
        }
    }

    $_SESSION["parametro"] =  $_REQUEST['IDP'];
    $_SESSION["parametro1"] =  $_REQUEST['OPP'];
    echo "<script type='text/javascript'> location.href ='" . $_REQUEST['URLP'] . ".php?op';</script>";
}
//OBTENCION DE DATOS ENVIADOR A LA URL
if (isset($_SESSION['parametro']) && isset($_SESSION['parametro1']) && isset($_SESSION['urlO'])) {
    $IDP = $_SESSION['parametro'];
    $OPP = $_SESSION['parametro1'];
    $URLP = $_SESSION['urlO'];

    $ARRAYRECEPCION = $DESPACHOE_ADO->verDespachoe($IDP);
    foreach ($ARRAYRECEPCION as $r) :
        $TDESPACHO = $r["TDESPACHO"];

    endforeach;
}
//PARA OPERACIONES DE EDICION , VISUALIZACION Y CREACION
//OPERACION PARA OBTENER EL ID RECEPCION Y FOLIO BASE, SOLO SE OCUPA PARA CREAR UN REGISTRO NUEVO
if (isset($_SESSION['parametro']) && isset($_SESSION['parametro1']) && isset($_SESSION['urlO']) && isset($_SESSION['dparametro']) && isset($_SESSION['dparametro1'])) {
    //ALMACENAR DATOS DE VARIABLES DE LA URL
    $IDOP = $_SESSION['dparametro'];
    $OP = $_SESSION['dparametro1'];
    $IDP = $_SESSION['parametro'];
    $OPP = $_SESSION['parametro1'];
    $URLP = $_SESSION['urlO'];

    //IDENTIFICACIONES DE OPERACIONES
    //$VALORTOTAL = "";
    //$CANTIDADINGRESADO = "";
    //$CANTIDADRESTANTE = "";


    //crear =  OBTENCION DE DATOS PARA LA CREACION DE REGISTRO
    if ($OP == "crear") {
        $DISABLED = "";
        $DISABLED2 = "";
        $DISABLEDSTYLE = "";
        $DISABLEDSTYLE2 = "";
        $ARRAYDRECEPCION = $INVENTARIOE_ADO->verInventario($IDOP);
        foreach ($ARRAYDRECEPCION as $r) :
            $BODEGA = "" . $r['ID_BODEGA'];
            $CANTIDAD = "" . $r['CANTIDAD_SALIDA'];
            $PRODUCTO = "" . $r['ID_PRODUCTO'];
            $TUMEDIDA = "" . $r['ID_TUMEDIDA'];
            $ARRAYVERTUMEDIDA = $TUMEDIDA_ADO->verTumedida($TUMEDIDA);
            if ($ARRAYVERTUMEDIDA) {
                $TUMEDIDAV = $ARRAYVERTUMEDIDA[0]['NOMBRE_TUMEDIDA'];
            }
        endforeach;
    }
    //editar =  OBTENCION DE DATOS PARA LA EDICION DE REGISTRO
    if ($OP == "editar") {

        $DISABLED = "";
        $DISABLED2 = "disabled";
        $DISABLEDSTYLE = "";
        $DISABLEDSTYLE2 = "style='background-color: #eeeeee;'";
        $ARRAYDRECEPCION = $INVENTARIOE_ADO->verInventario($IDOP);
        foreach ($ARRAYDRECEPCION as $r) :
            $BODEGA = "" . $r['ID_BODEGA'];
            $CANTIDAD = "" . $r['CANTIDAD_SALIDA'];
            $VALORUNITARIO = "" . $r['VALOR_UNITARIO'];
            $PRODUCTO = "" . $r['ID_PRODUCTO'];
            $TUMEDIDA = "" . $r['ID_TUMEDIDA'];
            $ARRAYVERTUMEDIDA = $TUMEDIDA_ADO->verTumedida($TUMEDIDA);
            if ($ARRAYVERTUMEDIDA) {
                $TUMEDIDAV = $ARRAYVERTUMEDIDA[0]['NOMBRE_TUMEDIDA'];
            }
        endforeach;
    }    //ver =  OBTENCION DE DATOS PARA LA VISUALIZACION DEL REGISTRO
    if ($OP == "ver") {
        $DISABLED = "disabled";
        $DISABLED2 = "disabled";
        $DISABLEDSTYLE = "style='background-color: #eeeeee;'";
        $DISABLEDSTYLE2 = "style='background-color: #eeeeee;'";
        $ARRAYDRECEPCION = $INVENTARIOE_ADO->verInventario($IDOP);
        foreach ($ARRAYDRECEPCION as $r) :
            $BODEGA = "" . $r['ID_BODEGA'];
            $CANTIDAD = "" . $r['CANTIDAD_SALIDA'];
            $PRODUCTO = "" . $r['ID_PRODUCTO'];
            $TUMEDIDA = "" . $r['ID_TUMEDIDA'];
            $ARRAYVERTUMEDIDA = $TUMEDIDA_ADO->verTumedida($TUMEDIDA);
            if ($ARRAYVERTUMEDIDA) {
                $TUMEDIDAV = $ARRAYVERTUMEDIDA[0]['NOMBRE_TUMEDIDA'];
            }
        endforeach;
    }
    if ($OP == "eliminar") {
        $DISABLED = "disabled";
        $DISABLED2 = "disabled";
        $DISABLEDSTYLE = "style='background-color: #eeeeee;'";
        $DISABLEDSTYLE2 = "style='background-color: #eeeeee;'";
        $MENSAJE = "ESTA SEGURO DE ELIMINAR EL REGISTRO, PARA CONFIRMAR PRESIONE ELIMINAR";
        $ARRAYDRECEPCION = $INVENTARIOE_ADO->verInventario($IDOP);
        foreach ($ARRAYDRECEPCION as $r) :
            $BODEGA = "" . $r['ID_BODEGA'];
            $CANTIDAD = "" . $r['CANTIDAD_SALIDA'];
            $PRODUCTO = "" . $r['ID_PRODUCTO'];
            $TUMEDIDA = "" . $r['ID_TUMEDIDA'];
            $ARRAYVERTUMEDIDA = $TUMEDIDA_ADO->verTumedida($TUMEDIDA);
            if ($ARRAYVERTUMEDIDA) {
                $TUMEDIDAV = $ARRAYVERTUMEDIDA[0]['NOMBRE_TUMEDIDA'];
            }
        endforeach;
    }
}
if (isset($_POST)) {
    if (isset($_REQUEST['BODEGA'])) {
        $BODEGA = "" . $_REQUEST['BODEGA'];
    }
    if (isset($_REQUEST['CANTIDAD'])) {
        $CANTIDAD = "" . $_REQUEST['CANTIDAD'];
    }
    if (isset($_REQUEST['VALORUNITARIO'])) {
        $VALORUNITARIO = "" . $_REQUEST['VALORUNITARIO'];
    }
    if (isset($_REQUEST['PRODUCTO'])) {
        $PRODUCTO = "" . $_REQUEST['PRODUCTO'];
        $ARRAYVERPRODUCTO = $PRODUCTO_ADO->verProducto($PRODUCTO);
        if ($ARRAYVERPRODUCTO) {
            $TUMEDIDA = $ARRAYVERPRODUCTO[0]['ID_TUMEDIDA'];
            $ARRAYVERTUMEDIDA = $TUMEDIDA_ADO->verTumedida($TUMEDIDA);
            if ($ARRAYVERTUMEDIDA) {
                $TUMEDIDAV = $ARRAYVERTUMEDIDA[0]['NOMBRE_TUMEDIDA'];
            }
        }
    }
    if (isset($_REQUEST['DESCRIPCION'])) {
        $DESCRIPCION = "" . $_REQUEST['DESCRIPCION'];
    }
}

?>


<!DOCTYPE html>
<html lang="es">

<head>
    <title>Registro Detalle Recepción </title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="description" content="">
    <meta name="author" content="">
    <!- LLAMADA DE LOS ARCHIVOS NECESARIOS PARA DISEÑO Y FUNCIONES BASE DE LA VISTA -!>
        <?php include_once "../config/urlHead.php"; ?>
        <!- FUNCIONES BASES -!>
            <script type="text/javascript">
                function validacion() {


                    CANTIDAD = document.getElementById("CANTIDAD").value;
                    PRODUCTO = document.getElementById("PRODUCTO").selectedIndex;
                    BODEGA = document.getElementById("BODEGA").selectedIndex;
                    //TUMEDIDA = document.getElementById("TUMEDIDA").selectedIndex;


                    document.getElementById('val_cantidad').innerHTML = "";
                    document.getElementById('val_producto').innerHTML = "";
                    document.getElementById('val_bodega').innerHTML = "";
                    //document.getElementById('val_tumedida').innerHTML = "";         

                    if (BODEGA == null || BODEGA == 0) {
                        document.form_reg_dato.BODEGA.focus();
                        document.form_reg_dato.BODEGA.style.borderColor = "#FF0000";
                        document.getElementById('val_bodega').innerHTML = "NO HA SELECIONADO ALTERNATIVA";
                        return false
                    }
                    document.form_reg_dato.BODEGA.style.borderColor = "#4AF575";

                    if (PRODUCTO == null || PRODUCTO == 0) {
                        document.form_reg_dato.PRODUCTO.focus();
                        document.form_reg_dato.PRODUCTO.style.borderColor = "#FF0000";
                        document.getElementById('val_producto').innerHTML = "NO HA SELECIONADO ALTERNATIVA";
                        return false;
                    }
                    document.form_reg_dato.PRODUCTO.style.borderColor = "#4AF575";



                    if (CANTIDAD == null || CANTIDAD.length == 0 || /^\s+$/.test(CANTIDAD)) {
                        document.form_reg_dato.CANTIDAD.focus();
                        document.form_reg_dato.CANTIDAD.style.borderColor = "#FF0000";
                        document.getElementById('val_cantidad').innerHTML = "NO HA INGRESADO DATOS";
                        return false;
                    }
                    document.form_reg_dato.CANTIDAD.style.borderColor = "#4AF575";

                    if (CANTIDAD == 0) {
                        document.form_reg_dato.CANTIDAD.focus();
                        document.form_reg_dato.CANTIDAD.style.borderColor = "#FF0000";
                        document.getElementById('val_cantidad').innerHTML = "DEBE SER MAYOR A ZERO";
                        return false;
                    }
                    document.form_reg_dato.CANTIDAD.style.borderColor = "#4AF575";

                }
                //REDIRECCIONAR A LA PAGINA SELECIONADA
                function irPagina(url) {
                    location.href = "" + url;
                }

                //FUNCION PARA CERRAR VENTANA Y ACTUALIZAR PRINCIPAL
                function cerrar() {
                    window.opener.refrescar()
                    window.close();
                }
            </script>

</head>

<body class="hold-transition light-skin fixed sidebar-mini theme-primary" onload="mueveReloj()">
    <div class="wrapper">
        <!- LLAMADA AL MENU PRINCIPAL DE LA PAGINA-!>
            <?php  include_once "../config/menu.php";
            ?>
            <div class="content-wrapper">
                <div class="container-full">
                    <!-- Content Header (Page header) -->
                    <div class="content-header">
                        <div class="d-flex align-items-center">
                            <div class="mr-auto">
                                <h3 class="page-title">Registro Detalle </h3>
                                <div class="d-inline-block align-items-center">
                                    <nav>
                                        <ol class="breadcrumb">
                                            <li class="breadcrumb-item"><a href="index.php"><i class="mdi mdi-home-outline"></i></a></li>
                                            <li class="breadcrumb-item" aria-current="page">Módulo</li>
                                            <li class="breadcrumb-item" aria-current="page">Despacho</li>
                                            <li class="breadcrumb-item" aria-current="page">Depsacho Envases </li>
                                            <li class="breadcrumb-item" aria-current="page">Registro Depsacho </li>
                                            <li class="breadcrumb-item active" aria-current="page"> <a href="#">Registro Detalle </a>
                                            </li>
                                        </ol>
                                    </nav>
                                </div>
                            </div>
                            <?php include_once "../config/verIndicadorEconomico.php"; ?>
                        </div>
                    </div>
                    <!-- Main content -->
                    <section class="content">

                        <form class="form" role="form" method="post" name="form_reg_dato" id="form_reg_dato">
                            <div class="box">
                                <div class="box-header with-border">
                                    <!--
                                        <h4 class="box-title">Different Width</h4>
                                        -->
                                </div>
                                <div class="box-body ">
                                    <div class="row">
                                        <div class="col-xxl-2 col-xl-4 col-lg-6 col-md-6 col-sm-6 col-6 col-xs-6">
                                            <div class="form-group">
                                                <label>Bodega Origen</label>
                                                <input type="hidden" class="form-control" placeholder="BODEGAE" id="BODEGAE" name="BODEGAE" value="<?php echo $BODEGA; ?>" />
                                                <select class="form-control select2" id="BODEGA" name="BODEGA" style="width: 100%;" <?php echo $DISABLED; ?> <?php echo $DISABLED3; ?> <?php echo $DISABLEDFOLIO; ?>>
                                                    <option></option>
                                                    <?php foreach ($ARRAYBODEGA as $r) : ?>
                                                        <?php if ($ARRAYBODEGA) {    ?>
                                                            <option value="<?php echo $r['ID_BODEGA']; ?>" <?php if ($BODEGA == $r['ID_BODEGA']) {
                                                                                                                echo "selected";
                                                                                                            } ?>> <?php echo $r['NOMBRE_BODEGA'] ?> </option>
                                                        <?php } else { ?>
                                                            <option>No Hay Datos Registrados </option>
                                                        <?php } ?>
                                                    <?php endforeach; ?>
                                                </select>
                                                <label id="val_bodega" class="validacion"> </label>
                                            </div>
                                        </div>

                                        <div class="col-xxl-2 col-xl-4 col-lg-6 col-md-6 col-sm-6 col-6 col-xs-6">
                                            <div class="form-group">
                                                <input type="hidden" class="form-control" placeholder="ID TDESPACHO" id="TDESPACHO" name="TDESPACHO" value="<?php echo $TDESPACHO; ?>" />

                                                <input type="hidden" class="form-control" placeholder="ID DDESPACHOE" id="IDD" name="IDD" value="<?php echo $IDOP; ?>" />
                                                <input type="hidden" class="form-control" placeholder="ID DESPACHOE" id="IDP" name="IDP" value="<?php echo $IDP; ?>" />
                                                <input type="hidden" class="form-control" placeholder="OP DESPACHOE" id="OPP" name="OPP" value="<?php echo $OPP; ?>" />
                                                <input type="hidden" class="form-control" placeholder="URL DESPACHOE" id="URLP" name="URLP" value="<?php echo $URLP; ?>" />
                                                <input type="hidden" class="form-control" placeholder="ID EMPRESA" id="EMPRESA" name="EMPRESA" value="<?php echo $EMPRESAS; ?>" />
                                                <input type="hidden" class="form-control" placeholder="ID PLANTA" id="PLANTA" name="PLANTA" value="<?php echo $PLANTAS; ?>" />
                                                <input type="hidden" class="form-control" placeholder="ID TEMPORADA" id="TEMPORADA" name="TEMPORADA" value="<?php echo $TEMPORADAS; ?>" />

                                                <label>Producto</label>
                                                <input type="hidden" class="form-control" placeholder="PRODUCTOE" id="PRODUCTOE" name="PRODUCTOE" value="<?php echo $PRODUCTO; ?>" />
                                                <select class="form-control select2" id="PRODUCTO" name="PRODUCTO" style="width: 100%;" onchange="this.form.submit()" <?php echo $DISABLED; ?> <?php echo $DISABLED2; ?>>
                                                    <option></option>
                                                    <?php foreach ($ARRAYPRODUCTO as $r) : ?>
                                                        <?php if ($ARRAYPRODUCTO) {    ?>
                                                            <option value="<?php echo $r['ID_PRODUCTO']; ?>" <?php if ($PRODUCTO == $r['ID_PRODUCTO']) {
                                                                                                                    echo "selected";
                                                                                                                } ?>> <?php echo $r['NOMBRE_PRODUCTO'] ?> </option>
                                                        <?php } else { ?>
                                                            <option>No Hay Datos Registrados </option>
                                                        <?php } ?>
                                                    <?php endforeach; ?>
                                                </select>
                                                <label id="val_producto" class="validacion"> </label>
                                            </div>
                                        </div>
                                        <div class="col-xxl-2 col-xl-4 col-lg-6 col-md-6 col-sm-6 col-6 col-xs-6">
                                            <div class="form-group">
                                                <label>Unidad Medida</label>
                                                <input type="hidden" class="form-control" placeholder="TUMEDIDA" id="TUMEDIDA" name="TUMEDIDA" value="<?php echo $TUMEDIDA; ?>" />
                                                <input type="text" class="form-control" placeholder="Unidad Medida" id="TUMEDIDAV" name="TUMEDIDAV" value="<?php echo $TUMEDIDAV; ?>" disabled />
                                                <label id="val_tumedida" class="validacion"> </label>
                                            </div>
                                        </div>
                                        <div class="col-xxl-2 col-xl-4 col-lg-6 col-md-6 col-sm-6 col-6 col-xs-6">
                                            <div class="form-group">
                                                <label>Cantidad Producto</label>
                                                <input type="hidden" class="form-control" placeholder="CANTIDADE" id="CANTIDADE" name="CANTIDADE" value="<?php echo $CANTIDAD; ?>" />
                                                <input type="text" class="form-control" placeholder="Canitdad Producto" id="CANTIDAD" name="CANTIDAD" value="<?php echo $CANTIDAD; ?>" <?php echo $DISABLED; ?> />
                                                <label id="val_cantidad" class="validacion"> </label>
                                            </div>
                                        </div>
                                    </div>
                                    <label id="val_drecepcion" class="validacion center"><?php echo $MENSAJE; ?> </label>
                                </div>
                                <!-- /.row -->
                                <!-- /.box-body -->
                                <div class="box-footer">
                                    <div class="btn-group  col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12 col-xs-12" role="group" aria-label="Acciones generales">
                                        <button type="button" class="btn  btn-success  " data-toggle="tooltip" title="Volver" name="CANCELAR" value="CANCELAR" Onclick="irPagina('<?php echo $URLP; ?>.php?op');">
                                            <i class="ti-back-left "></i> Volver
                                        </button>
                                        <?php if ($OP == "") { ?>
                                            <button type="submit" class="btn  btn-primary " data-toggle="tooltip" title="Crear" name="CREAR" value="CREAR" <?php echo $DISABLED; ?> onclick="return validacion()">
                                                <i class="ti-save-alt"></i> Agregar
                                            </button>
                                        <?php } ?>
                                        <?php if ($OP != "") { ?>
                                            <?php if ($OP == "crear") { ?>
                                                <button type="submit" class="btn  btn-primary " data-toggle="tooltip" title="Crear" name="CREAR" value="CREAR" <?php echo $DISABLED; ?> onclick="return validacion()">
                                                    <i class="ti-save-alt"></i> Duplicar
                                                </button>
                                            <?php } ?>
                                            <?php if ($OP == "editar") { ?>
                                                <button type="submit" class="btn  btn-warning   " data-toggle="tooltip" title="Editar" name="EDITAR" value="EDITAR" <?php echo $DISABLED; ?> onclick="return validacion()">
                                                    <i class="ti-save-alt"></i> Editar
                                                </button>
                                            <?php } ?>
                                            <?php if ($OP == "eliminar") { ?>
                                                <button type="submit" class="btn  btn-danger " data-toggle="tooltip" title="Eliminar" name="ELIMINAR" value="ELIMINAR">
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
                    <!-- /.content -->
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