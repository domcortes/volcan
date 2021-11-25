<?php

include_once "../config/validarUsuario.php";
//LLAMADA ARCHIVOS NECESARIOS PARA LAS OPERACIONES

include_once '../controlador/PRODUCTO_ADO.php';
include_once '../controlador/TCONTENEDOR_ADO.php';
include_once '../controlador/TUMEDIDA_ADO.php';


include_once '../controlador/OCOMPRA_ADO.php';
include_once '../controlador/DOCOMPRA_ADO.php';

include_once '../modelo/DOCOMPRA.php';


//INCIALIZAR LAS VARIBLES
//INICIALIZAR CONTROLADOR

$PRODUCTO_ADO =  new PRODUCTO_ADO();
$TCONTENEDOR_ADO =  new TCONTENEDOR_ADO();
$TUMEDIDA_ADO =  new TUMEDIDA_ADO();

$OCOMPRA_ADO =  new OCOMPRA_ADO();
$DOCOMPRA_ADO =  new DOCOMPRA_ADO();

//INIICIALIZAR MODELO
$DOCOMPRA =  new DOCOMPRA();

//INICIALIZACION VARIABLES
$NUMEROFOLIO = "";
$FOLIOINVENTARIO = "";
$DESCRIPCION = "";
$CANTIDAD = 0;
$VALORUNITARIO = 0;

$VALORTOTAL = 0;
$CANTIDADINGRESADO = 0;
$CANTIDADRESTANTE = 0;

$PRODUCTO = "";
$TCONTENEDOR = "";
$TUMEDIDA = "";
$TUMEDIDAV = "";

$EMPRESA = "";
$PLANTA = "";
$TEMPORADA = "";
$PLANTA = "";

$PROVEEDOR = "";
$PRODUCTOR = "";
$ESTADO = "";

$DISABLED = "";
$DISABLED2 = "";

$IDOP = "";
$OP = "";
$IDPOP = "";
$OPP = "";
$URLO = "";
$SINO = "";
$MENSAJE = "";


//INICIALIZAR ARREGLOS
$ARRAYPRODUCTO = "";
$ARRAYVERPRODUCTO = "";
$ARRAYTCONTENEDOR = "";
$ARRAYTUMEDIDA = "";
$ARRAYVERTUMEDIDA = "";
$ARRAYDOCOMPRA = "";
$ARRAYOCOMPRA = "";



//DEFINIR ARREGLOS CON LOS DATOS OBTENIDOS DE LAS FUNCIONES DE LOS CONTROLADORES


$ARRAYPRODUCTO = $PRODUCTO_ADO->listarProductoPorEmpresaCBX($EMPRESAS);
$ARRAYTCONTENEDOR = $TCONTENEDOR_ADO->listarTcontenedorPorEmpresaCBX($EMPRESAS);
$ARRAYTUMEDIDA = $TUMEDIDA_ADO->listarTumedidaPorEmpresaCBX($EMPRESAS);
include_once "../config/validarDatosUrlD.php";



//OPERACIONES
//OPERACION DE REGISTRO DE FILA
if (isset($_REQUEST['CREAR'])) {



    //$VALORTOTAL = $_REQUEST['CANTIDAD'] * $_REQUEST['VALORUNITARIO'];
    $DOCOMPRA->__SET('CANTIDAD_DOCOMPRA', $_REQUEST['CANTIDAD']);
    $DOCOMPRA->__SET('VALOR_UNITARIO_DOCOMPRA', $_REQUEST['VALORUNITARIO']);
    $DOCOMPRA->__SET('DESCRIPCION_DOCOMPRA', $_REQUEST['DESCRIPCION']);
    $DOCOMPRA->__SET('ID_PRODUCTO', $_REQUEST['PRODUCTO']);
    $DOCOMPRA->__SET('ID_TUMEDIDA', $_REQUEST['TUMEDIDA']);
    $DOCOMPRA->__SET('ID_OCOMPRA', $_REQUEST['IDP']);
    //LLAMADA AL METODO DE REGISTRO DEL CONTROLADOR
    $DOCOMPRA_ADO->agregarDocompra($DOCOMPRA);


    //REDIRECCIONAR A PAGINA registroRecepcion.php 
    $_SESSION["parametro"] =  $_REQUEST['IDP'];
    $_SESSION["parametro1"] =  $_REQUEST['OPP'];
    echo "<script type='text/javascript'> location.href ='" . $_REQUEST['URLO'] . ".php?op';</script>";
}
if (isset($_REQUEST['EDITAR'])) {

    //$VALORTOTAL = $_REQUEST['CANTIDAD'] * $_REQUEST['VALORUNITARIO'];
    $DOCOMPRA->__SET('CANTIDAD_DOCOMPRA', $_REQUEST['CANTIDAD']);
    $DOCOMPRA->__SET('VALOR_UNITARIO_DOCOMPRA', $_REQUEST['VALORUNITARIO']);
    $DOCOMPRA->__SET('DESCRIPCION_DOCOMPRA', $_REQUEST['DESCRIPCION']);
    $DOCOMPRA->__SET('ID_PRODUCTO', $_REQUEST['PRODUCTO']);
    $DOCOMPRA->__SET('ID_TUMEDIDA', $_REQUEST['TUMEDIDA']);
    $DOCOMPRA->__SET('ID_OCOMPRA', $_REQUEST['IDP']);
    $DOCOMPRA->__SET('ID_DOCOMPRA', $_REQUEST['ID']);
    //LLAMADA AL METODO DE REGISTRO DEL CONTROLADOR
    $DOCOMPRA_ADO->actualizarDocompra($DOCOMPRA);

    $_SESSION["parametro"] =  $_REQUEST['IDP'];
    $_SESSION["parametro1"] =  $_REQUEST['OPP'];
    echo "<script type='text/javascript'> location.href ='" . $_REQUEST['URLO'] . ".php?op';</script>";
}
if (isset($_REQUEST['ELIMINAR'])) {
    $DOCOMPRA->__SET('ID_DOCOMPRA', $_REQUEST['ID']);
    //LLAMADA AL METODO DE REGISTRO DEL CONTROLADOR
    $DOCOMPRA_ADO->deshabilitar($DOCOMPRA);
    $_SESSION["parametro"] =  $_REQUEST['IDP'];
    $_SESSION["parametro1"] =  $_REQUEST['OPP'];
    echo "<script type='text/javascript'> location.href ='" . $_REQUEST['URLO'] . ".php?op';</script>";
}



//OBTENCION DE DATOS ENVIADOR A LA URL
if (isset($_SESSION['parametro']) && isset($_SESSION['parametro1']) && isset($_SESSION['urlO'])) {
    $IDP = $_SESSION['parametro'];
    $OPP = $_SESSION['parametro1'];
    $URLO = $_SESSION['urlO'];
}
//PARA OPERACIONES DE EDICION , VISUALIZACION Y CREACION
//OPERACION PARA OBTENER EL ID OCOMPRA Y FOLIO BASE, SOLO SE OCUPA PARA CREAR UN REGISTRO NUEVO
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
        $DISABLED2 = "";
        $DISABLEDSTYLE = "";
        $DISABLEDSTYLE2 = "";
        $ARRAYDOCOMPRA = $DOCOMPRA_ADO->verDocompra($IDOP);
        foreach ($ARRAYDOCOMPRA as $r) :
            $CANTIDAD = "" . $r['CANTIDAD_DOCOMPRA'];
            $VALORUNITARIO = "" . $r['VALOR_UNITARIO_DOCOMPRA'];
            $DESCRIPCION = "" . $r['DESCRIPCION_DOCOMPRA'];
            $PRODUCTO = "" . $r['ID_PRODUCTO'];
            $TUMEDIDA = "" . $r['ID_TUMEDIDA'];
            $ARRAYVERTUMEDIDA = $TUMEDIDA_ADO->verTumedida($TUMEDIDA);
            if ($ARRAYVERTUMEDIDA) {
                $TUMEDIDAV = $ARRAYVERTUMEDIDA[0]['NOMBRE_TUMEDIDA'];
            }
            $ESTADO = "" . $r['ESTADO'];
        endforeach;
    }
    //editar =  OBTENCION DE DATOS PARA LA EDICION DE REGISTRO
    if ($OP == "editar") {

        $DISABLED = "";
        $DISABLED2 = "disabled";
        $DISABLEDSTYLE = "";
        $DISABLEDSTYLE2 = "style='background-color: #eeeeee;'";
        $ARRAYDOCOMPRA = $DOCOMPRA_ADO->verDocompra($IDOP);
        foreach ($ARRAYDOCOMPRA as $r) :
            $CANTIDAD = "" . $r['CANTIDAD_DOCOMPRA'];
            $VALORUNITARIO = "" . $r['VALOR_UNITARIO_DOCOMPRA'];
            $VALORTOTAL = $CANTIDAD * $VALORUNITARIO;
            $DESCRIPCION = "" . $r['DESCRIPCION_DOCOMPRA'];
            $PRODUCTO = "" . $r['ID_PRODUCTO'];
            $TUMEDIDA = "" . $r['ID_TUMEDIDA'];
            $ARRAYVERTUMEDIDA = $TUMEDIDA_ADO->verTumedida($TUMEDIDA);
            if ($ARRAYVERTUMEDIDA) {
                $TUMEDIDAV = $ARRAYVERTUMEDIDA[0]['NOMBRE_TUMEDIDA'];
            }
            $ESTADO = "" . $r['ESTADO'];
        endforeach;
    }    //ver =  OBTENCION DE DATOS PARA LA VISUALIZACION DEL REGISTRO
    if ($OP == "ver") {
        $DISABLED = "disabled";
        $DISABLED2 = "disabled";
        $DISABLEDSTYLE = "style='background-color: #eeeeee;'";
        $DISABLEDSTYLE2 = "style='background-color: #eeeeee;'";
        $ARRAYDOCOMPRA = $DOCOMPRA_ADO->verDocompra($IDOP);
        foreach ($ARRAYDOCOMPRA as $r) :
            $CANTIDAD = "" . $r['CANTIDAD_DOCOMPRA'];
            $VALORUNITARIO = "" . $r['VALOR_UNITARIO_DOCOMPRA'];
            $VALORTOTAL = $CANTIDAD * $VALORUNITARIO;
            $DESCRIPCION = "" . $r['DESCRIPCION_DOCOMPRA'];
            $PRODUCTO = "" . $r['ID_PRODUCTO'];
            $TUMEDIDA = "" . $r['ID_TUMEDIDA'];
            $ARRAYVERTUMEDIDA = $TUMEDIDA_ADO->verTumedida($TUMEDIDA);
            if ($ARRAYVERTUMEDIDA) {
                $TUMEDIDAV = $ARRAYVERTUMEDIDA[0]['NOMBRE_TUMEDIDA'];
            }
            $ESTADO = "" . $r['ESTADO'];
        endforeach;
    }
    if ($OP == "eliminar") {
        $DISABLED = "disabled";
        $DISABLED2 = "disabled";
        $DISABLEDSTYLE = "style='background-color: #eeeeee;'";
        $DISABLEDSTYLE2 = "style='background-color: #eeeeee;'";
        $MENSAJE = "ESTA SEGURO DE ELIMINAR EL REGISTRO, PARA CONFIRMAR PRESIONE ELIMINAR";
        $ARRAYDOCOMPRA = $DOCOMPRA_ADO->verDocompra($IDOP);
        foreach ($ARRAYDOCOMPRA as $r) :
            $CANTIDAD = "" . $r['CANTIDAD_DOCOMPRA'];
            $VALORUNITARIO = "" . $r['VALOR_UNITARIO_DOCOMPRA'];
            $VALORTOTAL = $CANTIDAD * $VALORUNITARIO;
            $DESCRIPCION = "" . $r['DESCRIPCION_DOCOMPRA'];
            $PRODUCTO = "" . $r['ID_PRODUCTO'];
            $TUMEDIDA = "" . $r['ID_TUMEDIDA'];
            $ARRAYVERTUMEDIDA = $TUMEDIDA_ADO->verTumedida($TUMEDIDA);
            if ($ARRAYVERTUMEDIDA) {
                $TUMEDIDAV = $ARRAYVERTUMEDIDA[0]['NOMBRE_TUMEDIDA'];
            }
            $ESTADO = "" . $r['ESTADO'];
        endforeach;
    }
}
if (isset($_POST)) {
    if (isset($_REQUEST['CANTIDAD'])) {
        $CANTIDAD = "" . $_REQUEST['CANTIDAD'];
    }
    
    if (isset($_REQUEST['DESCRIPCION'])) {
        $DESCRIPCION = "" . $_REQUEST['DESCRIPCION'];
    }    
    if (isset($_REQUEST['VALORUNITARIO'])) {
        $VALORUNITARIO = "" . $_REQUEST['VALORUNITARIO'];
        $VALORTOTAL = $VALORUNITARIO * $CANTIDAD;
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
}

?>


<!DOCTYPE html>
<html lang="es">

<head>
    <title>Registro Detalle Orden </title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="description" content="">
    <meta name="author" content="">
    <!- LLAMADA DE LOS ARCHIVOS NECESARIOS PARA DISEÑO Y FUNCIONES BASE DE LA VISTA -!>
        <?php include_once "../config/urlHead.php"; ?>
        <!- FUNCIONES BASES -!>
            <script type="text/javascript">
                function total() {

                    var total;
                    var repuesta;

                    CANTIDAD = document.getElementById("CANTIDAD").value;
                    VALORUNITARIO = document.getElementById("VALORUNITARIO").value;

                    document.getElementById('val_cantidad').innerHTML = "";
                    document.getElementById('val_vu').innerHTML = "";


                    if (VALORUNITARIO == null || VALORUNITARIO.length == 0 || /^\s+$/.test(VALORUNITARIO)) {
                        document.form_reg_dato.VALORUNITARIO.focus();
                        document.form_reg_dato.VALORUNITARIO.style.borderColor = "#FF0000";
                        document.getElementById('val_vu').innerHTML = "NO HA INGRESADO DATOS";
                        repuesta = 1;
                    } else {
                        repuesta = 0;
                        document.form_reg_dato.VALORUNITARIO.style.borderColor = "#4AF575";
                    }

                    if (VALORUNITARIO == 0) {
                        document.form_reg_dato.VALORUNITARIO.focus();
                        document.form_reg_dato.VALORUNITARIO.style.borderColor = "#FF0000";
                        document.getElementById('val_vu').innerHTML = "TIENE QUE SER MAYOR A CERO";
                        repuesta = 1;
                    } else {
                        repuesta = 0;
                        document.form_reg_dato.VALORUNITARIO.style.borderColor = "#4AF575";
                    }

                    if (CANTIDAD == null || CANTIDAD.length == 0 || /^\s+$/.test(CANTIDAD)) {
                        document.form_reg_dato.CANTIDAD.focus();
                        document.form_reg_dato.CANTIDAD.style.borderColor = "#FF0000";
                        document.getElementById('val_cantidad').innerHTML = "NO HA INGRESADO DATOS";
                        repuesta = 1;
                    } else {
                        repuesta = 0;
                        document.form_reg_dato.CANTIDAD.style.borderColor = "#4AF575";
                    }

                                   
                    if (repuesta == 0) {
                        total=CANTIDAD*VALORUNITARIO;
                    }
                    document.getElementById('VALORTOTALV').value = total;

                }

                function validacion() {


                    CANTIDAD = document.getElementById("CANTIDAD").value;
                    VALORUNITARIO = document.getElementById("VALORUNITARIO").value;
                    PRODUCTO = document.getElementById("PRODUCTO").selectedIndex;
                    //TUMEDIDA = document.getElementById("TUMEDIDA").selectedIndex;


                    document.getElementById('val_cantidad').innerHTML = "";
                    document.getElementById('val_vu').innerHTML = "";
                    document.getElementById('val_producto').innerHTML = "";
                    //document.getElementById('val_tumedida').innerHTML = "";         

                    if (PRODUCTO == null || PRODUCTO == 0) {
                        document.form_reg_dato.PRODUCTO.focus();
                        document.form_reg_dato.PRODUCTO.style.borderColor = "#FF0000";
                        document.getElementById('val_producto').innerHTML = "NO HA SELECIONADO ALTERNATIVA";
                        return false;
                    }
                    document.form_reg_dato.PRODUCTO.style.borderColor = "#4AF575";

                    if (VALORUNITARIO == null || VALORUNITARIO.length == 0 || /^\s+$/.test(VALORUNITARIO)) {
                        document.form_reg_dato.VALORUNITARIO.focus();
                        document.form_reg_dato.VALORUNITARIO.style.borderColor = "#FF0000";
                        document.getElementById('val_vu').innerHTML = "NO HA INGRESADO DATOS";
                        return false;
                    }
                    document.form_reg_dato.VALORUNITARIO.style.borderColor = "#4AF575";
                    
                    if (VALORUNITARIO == 0) {
                        document.form_reg_dato.VALORUNITARIO.focus();
                        document.form_reg_dato.VALORUNITARIO.style.borderColor = "#FF0000";
                        document.getElementById('val_vu').innerHTML = "TIENE QUE SER MAYOR A CERO";
                        return false;
                    }
                    document.form_reg_dato.VALORUNITARIO.style.borderColor = "#4AF575";

                    if (CANTIDAD == null || CANTIDAD.length == 0 || /^\s+$/.test(CANTIDAD)) {
                        document.form_reg_dato.CANTIDAD.focus();
                        document.form_reg_dato.CANTIDAD.style.borderColor = "#FF0000";
                        document.getElementById('val_cantidad').innerHTML = "NO HA INGRESADO DATOS";
                        return false;
                    }
                    document.form_reg_dato.CANTIDAD.style.borderColor = "#4AF575";
                    /*
                    if (CANTIDAD == 0) {
                        document.form_reg_dato.CANTIDAD.focus();
                        document.form_reg_dato.CANTIDAD.style.borderColor = "#FF0000";
                        document.getElementById('val_cantidad').innerHTML = "TIENE QUE SER MAYOR A CERO";
                        return false;
                    }
                    document.form_reg_dato.CANTIDAD.style.borderColor = "#4AF575";*/
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
            <?php include_once "../config/menu.php";
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
                                            <li class="breadcrumb-item" aria-current="page">Orden Compra</li>
                                            <li class="breadcrumb-item" aria-current="page">Envases</li>
                                            <li class="breadcrumb-item" aria-current="page">Registro Orden </li>
                                            <li class="breadcrumb-item active" aria-current="page"> <a href="#">Registro Detalle </a>
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

                        <form class="form" role="form" method="post" name="form_reg_dato" id="form_reg_dato" onsubmit="return validacion()">
                            <div class="box">
                                <div class="box-header with-border">
                                    <!--
                                        <h4 class="box-title">Different Width</h4>
                                        -->
                                </div>
                                <div class="box-body ">
                                    <div class="row">
                                        <div class="col-xxl-2 col-xl-4 col-lg-6 col-md-6 col-sm-6 col-6 col-xs-6">
                                            <label>Producto</label>
                                            <input type="hidden" class="form-control" placeholder="ID DOCOMPRA" id="ID" name="ID" value="<?php echo $IDOP; ?>" />
                                            <input type="hidden" class="form-control" placeholder="ID OCOMPRA" id="IDP" name="IDP" value="<?php echo $IDP; ?>" />
                                            <input type="hidden" class="form-control" placeholder="ID OCOMPRA" id="OPP" name="OPP" value="<?php echo $OPP; ?>" />
                                            <input type="hidden" class="form-control" placeholder="ID OCOMPRA" id="URLO" name="URLO" value="<?php echo $URLO; ?>" />
                                            <input type="hidden" class="form-control" placeholder="ID EMPRESA" id="EMPRESA" name="EMPRESA" value="<?php echo $EMPRESAS; ?>" />
                                            <input type="hidden" class="form-control" placeholder="ID PLANTA" id="PLANTA" name="PLANTA" value="<?php echo $PLANTAS; ?>" />
                                            <input type="hidden" class="form-control" placeholder="ID TEMPORADA" id="TEMPORADA" name="TEMPORADA" value="<?php echo $TEMPORADAS; ?>" />
                                            <input type="hidden" class="form-control" placeholder="PRODUCTOE" id="PRODUCTOE" name="PRODUCTOE" value="<?php echo $PRODUCTO; ?>" />
                                            <select class="form-control select2" id="PRODUCTO" name="PRODUCTO" style="width: 100%;" onchange="this.form.submit()" <?php echo $DISABLED; ?>>
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
                                        <div class="col-xxl-2 col-xl-4 col-lg-6 col-md-6 col-sm-6 col-6 col-xs-6">
                                            <label>Unidad Medida</label>
                                            <input type="hidden" class="form-control" placeholder="TUMEDIDA" id="TUMEDIDA" name="TUMEDIDA" value="<?php echo $TUMEDIDA; ?>" />
                                            <input type="text" class="form-control" placeholder="Unidad Medida" id="TUMEDIDAV" name="TUMEDIDAV" value="<?php echo $TUMEDIDAV; ?>" disabled />
                                            <label id="val_tumedida" class="validacion"> </label>
                                        </div>
                                        <div class="col-xxl-2 col-xl-4 col-lg-6 col-md-6 col-sm-6 col-6 col-xs-6">
                                            <div class="form-group">
                                                <label>Cantidad Producto</label>
                                                <input type="hidden" class="form-control" placeholder="CANTIDADE" id="CANTIDADE" name="CANTIDADE" value="<?php echo $CANTIDAD; ?>" />
                                                <input type="number" class="form-control" placeholder="Canitdad Producto" id="CANTIDAD" name="CANTIDAD" onchange="total()" value="<?php echo $CANTIDAD; ?>" <?php echo $DISABLED; ?> />
                                                <label id="val_cantidad" class="validacion"> </label>
                                            </div>
                                        </div>
                                        <div class="col-xxl-2 col-xl-4 col-lg-6 col-md-6 col-sm-6 col-6 col-xs-6">
                                            <div class="form-group">
                                                <label>Valor Unitario </label>
                                                <input type="hidden" class="form-control" placeholder="VALORUNITARIOE" id="VALORUNITARIOE" name="VALORUNITARIOE" value="<?php echo $VALORUNITARIO; ?>" />
                                                <input type="number" step="any" class="form-control" placeholder="Valor Unitario" onchange="total()" id="VALORUNITARIO" name="VALORUNITARIO" value="<?php echo $VALORUNITARIO; ?>" <?php echo $DISABLED; ?> />
                                                <label id="val_vu" class="validacion"> </label>
                                            </div>
                                        </div>
                                        <div class="col-xxl-2 col-xl-4 col-lg-6 col-md-6 col-sm-6 col-6 col-xs-6">
                                            <div class="form-group">
                                                <label>Valor Total </label>
                                                <input type="hidden" class="form-control" placeholder="VALORTOTAL" id="VALORTOTAL" name="VALORTOTAL" value="<?php echo $VALORTOTAL; ?>" />
                                                <input type="number" step="any" class="form-control" placeholder="Valor Total" id="VALORTOTALV" name="VALORTOTALV" value="<?php echo $VALORTOTAL; ?>" disabled />
                                                <label id="val_vt" class="validacion"> </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-xxl-12 col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 col-xs-12">
                                            <div class="form-group">
                                                <label>Nota </label>
                                                <input type="hidden" class="form-control" placeholder="Observaciónes" id="DESCRIPCIONE" name="DESCRIPCIONE" value="<?php echo $DESCRIPCION; ?>" />
                                                <textarea class="form-control" rows="1" placeholder="Ingrese Nota, Observaciones u Otro" id="DESCRIPCION" name="DESCRIPCION" <?php echo $DISABLED; ?>><?php echo $DESCRIPCION; ?></textarea>
                                                <label id="val_observacion" class="validacion"> </label>
                                            </div>
                                        </div>
                                    </div>
                                    <label id="val_drecepcion" class="validacion center"><?php echo $MENSAJE; ?> </label>
                                </div>
                                <!-- /.row -->
                                <!-- /.box-body -->
                                <div class="box-footer">
                                    <div class="btn-group  col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12 col-xs-12" role="group" aria-label="Acciones generales">
                                        <button type="button" class="btn  btn-success  " data-toggle="tooltip" title="Volver" name="CANCELAR" value="CANCELAR" Onclick="irPagina('<?php echo $URLO; ?>.php?op');">
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