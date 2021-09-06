<?php

include_once "../config/validarUsuario.php";
//LLAMADA ARCHIVOS NECESARIOS PARA LAS OPERACIONES

include_once '../controlador/PRODUCTO_ADO.php';
include_once '../controlador/TUMEDIDA_ADO.php';
include_once '../controlador/FOLIO_ADO.php';


include_once '../controlador/INVENTARIOE_ADO.php';
include_once '../controlador/RECEPCIONE_ADO.php';
include_once '../controlador/DRECEPCIONE_ADO.php';
include_once '../controlador/DOCOMPRA_ADO.php';

include_once '../modelo/INVENTARIOE.php';
include_once '../modelo/DRECEPCIONE.php';


//INCIALIZAR LAS VARIBLES
//INICIALIZAR CONTROLADOR

$PRODUCTO_ADO =  new PRODUCTO_ADO();
$TUMEDIDA_ADO =  new TUMEDIDA_ADO();
$FOLIO_ADO =  new FOLIO_ADO();

$INVENTARIOE_ADO =  new INVENTARIOE_ADO();
$RECEPCIONE_ADO =  new RECEPCIONE_ADO();
$DRECEPCIONE_ADO =  new DRECEPCIONE_ADO();
$DOCOMPRA_ADO =  new DOCOMPRA_ADO();

//INIICIALIZAR MODELO
$INVENTARIOE =  new INVENTARIOE();
$DRECEPCIONE =  new DRECEPCIONE();

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
$CANTIDADDOC = "";

$PRODUCTO = "";
$TUMEDIDA = "";
$TUMEDIDAV = "";

$EMPRESA = "";
$PLANTA = "";
$TEMPORADA = "";
$PLANTA = "";
$FOLIO = "";

$BODEGA = "";
$PLANTA2 = "";
$PLANTA3 = "";
$PROVEEDOR = "";
$PRODUCTOR = "";
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
$IDDOC = "";


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
include_once "../config/validarDatosUrlD.php";




//OPERACIONES
//OPERACION DE REGISTRO DE FILA
if (isset($_REQUEST['EDITAR'])) {
    $ARRAYVERFOLIO = $FOLIO_ADO->verFolioPorEmpresaPlantaTemporadaTMateriales($_REQUEST['EMPRESA'], $_REQUEST['PLANTA'], $_REQUEST['TEMPORADA']);
    $FOLIO = $ARRAYVERFOLIO[0]['ID_FOLIO'];


    if ($_REQUEST['NUMEROFOLIO']) {
        $NUMEROFOLIO = $_REQUEST['NUMEROFOLIO'];
    } else {
        $ARRAYULTIMOFOLIO = $INVENTARIOE_ADO->obtenerFolio($FOLIO);
        if ($ARRAYULTIMOFOLIO) {
            if ($ARRAYULTIMOFOLIO[0]['ULTIMOFOLIO2'] == 0) {
                $FOLIOINVENTARIO = $ARRAYVERFOLIO[0]['NUMERO_FOLIO'];
            } else {
                $FOLIOINVENTARIO =   $ARRAYULTIMOFOLIO[0]['ULTIMOFOLIO2'];
            }
        } else {
            $FOLIOINVENTARIO = $ARRAYVERFOLIO[0]['NUMERO_FOLIO'];
        }
        $NUMEROFOLIO = $FOLIOINVENTARIO + 1;
    }

    $ALIASDINAMICO =  $ARRAYVERFOLIO[0]['ALIAS_DINAMICO_FOLIO'] . $NUMEROFOLIO;
    $ALIASESTACTICO = $NUMEROFOLIO;

    $VALORTOTAL = $_REQUEST['CANTIDAD'] * $_REQUEST['VALORUNITARIO'];

    $DRECEPCIONE->__SET('FOLIO_DRECEPCION', $NUMEROFOLIO);
    $DRECEPCIONE->__SET('ALIAS_DINAMICO_DRECEPCION', $ALIASDINAMICO);
    $DRECEPCIONE->__SET('ALIAS_ESTATICO_DRECEPCION', $ALIASESTACTICO);
    $DRECEPCIONE->__SET('CANTIDAD_DRECEPCION', $_REQUEST['CANTIDAD']);
    $DRECEPCIONE->__SET('VALOR_UNITARIO_DRECEPCION', $_REQUEST['VALORUNITARIO']);
    $DRECEPCIONE->__SET('DESCRIPCION_DRECEPCION', $_REQUEST['DESCRIPCION']);
    $DRECEPCIONE->__SET('ID_RECEPCION', $_REQUEST['IDP']);
    $DRECEPCIONE->__SET('ID_PRODUCTO', $_REQUEST['PRODUCTOE']);
    $DRECEPCIONE->__SET('ID_TUMEDIDA', $_REQUEST['TUMEDIDA']);
    $DRECEPCIONE->__SET('ID_FOLIO', $FOLIO);
    $DRECEPCIONE->__SET('ID_DOCOMPRA', $_REQUEST['IDDOC']);
    $DRECEPCIONE->__SET('ID_DRECEPCION', $_REQUEST['IDD']);
    //LLAMADA AL METODO DE REGISTRO DEL CONTROLADOR
    $DRECEPCIONE_ADO->actualizarDrecepcionDocompra($DRECEPCIONE);

    $ARRAYRECEPCION = $RECEPCIONE_ADO->verRecepcion($_REQUEST['IDP']);
    $ARRAYVERFOLIOVALIDAR = $INVENTARIOE_ADO->buscarPorRecepcionFolio($_REQUEST['IDP'],  $NUMEROFOLIO);

    if (empty($ARRAYVERFOLIOVALIDAR)) {
        $INVENTARIOE->__SET('FOLIO_INVENTARIO', $NUMEROFOLIO);
        $INVENTARIOE->__SET('ALIAS_DINAMICO_FOLIO', $ALIASDINAMICO);
        $INVENTARIOE->__SET('ALIAS_ESTATICO_FOLIO', $ALIASESTACTICO);
        $INVENTARIOE->__SET('TRECEPCION', $ARRAYRECEPCION[0]['TRECEPCION']);
        $INVENTARIOE->__SET('VALOR_UNITARIO', $_REQUEST['CANTIDAD']);
        $INVENTARIOE->__SET('CANTIDAD_INVENTARIO', $_REQUEST['VALORUNITARIO']);
        $INVENTARIOE->__SET('VALOR_TOTAL', $VALORTOTAL);
        $INVENTARIOE->__SET('ID_EMPRESA', $_REQUEST['EMPRESA']);
        $INVENTARIOE->__SET('ID_PLANTA', $_REQUEST['PLANTA']);
        $INVENTARIOE->__SET('ID_TEMPORADA', $_REQUEST['TEMPORADA']);
        $INVENTARIOE->__SET('ID_BODEGA', $ARRAYRECEPCION[0]['ID_BODEGA']);
        $INVENTARIOE->__SET('ID_FOLIO', $FOLIO);
        $INVENTARIOE->__SET('ID_PRODUCTO', $_REQUEST['PRODUCTOE']);
        $INVENTARIOE->__SET('ID_TUMEDIDA', $_REQUEST['TUMEDIDA']);
        $INVENTARIOE->__SET('ID_RECEPCION', $_REQUEST['IDP']);
        $INVENTARIOE->__SET('ID_PLANTA2', $ARRAYRECEPCION[0]['ID_PLANTA2']);
        $INVENTARIOE->__SET('ID_PROVEEDOR', $ARRAYRECEPCION[0]['ID_PROVEEDOR']);
        $INVENTARIOE->__SET('ID_PRODUCTOR', $ARRAYRECEPCION[0]['ID_PRODUCTOR']);
        $INVENTARIOE_ADO->agregarInventarioRecepcion($INVENTARIOE);
    } else {
        $INVENTARIOE->__SET('TRECEPCION', $ARRAYRECEPCION[0]['TRECEPCION']);
        $INVENTARIOE->__SET('VALOR_UNITARIO', $_REQUEST['CANTIDAD']);
        $INVENTARIOE->__SET('CANTIDAD_INVENTARIO', $_REQUEST['VALORUNITARIO']);
        $INVENTARIOE->__SET('VALOR_TOTAL', $VALORTOTAL);
        $INVENTARIOE->__SET('ID_EMPRESA', $_REQUEST['EMPRESA']);
        $INVENTARIOE->__SET('ID_PLANTA', $_REQUEST['PLANTA']);
        $INVENTARIOE->__SET('ID_TEMPORADA', $_REQUEST['TEMPORADA']);
        $INVENTARIOE->__SET('ID_BODEGA', $ARRAYRECEPCION[0]['ID_BODEGA']);
        $INVENTARIOE->__SET('ID_FOLIO', $FOLIO);
        $INVENTARIOE->__SET('ID_PRODUCTO', $_REQUEST['PRODUCTOE']);
        $INVENTARIOE->__SET('ID_TUMEDIDA', $_REQUEST['TUMEDIDA']);
        $INVENTARIOE->__SET('ID_RECEPCION', $_REQUEST['IDP']);
        $INVENTARIOE->__SET('ID_PLANTA2', $ARRAYRECEPCION[0]['ID_PLANTA2']);
        $INVENTARIOE->__SET('ID_PROVEEDOR', $ARRAYRECEPCION[0]['ID_PROVEEDOR']);
        $INVENTARIOE->__SET('ID_PRODUCTOR', $ARRAYRECEPCION[0]['ID_PRODUCTOR']);
        $INVENTARIOE->__SET('ID_INVENTARIO', $ARRAYVERFOLIOVALIDAR[0]['ID_INVENTARIO']);
        $INVENTARIOE_ADO->actualizarInventarioRecepcion($INVENTARIOE);
    }

    $_SESSION["parametro"] =  $_REQUEST['IDP'];
    $_SESSION["parametro1"] =  $_REQUEST['OPP'];
    echo "<script type='text/javascript'> location.href ='" . $_REQUEST['URLP'] . ".php?op';</script>";
}
if (isset($_REQUEST['ELIMINAR'])) {
    $DRECEPCIONE->__SET('ID_DRECEPCION', $_REQUEST['IDD']);
    //LLAMADA AL METODO DE REGISTRO DEL CONTROLADOR
    $DRECEPCIONE_ADO->deshabilitar($DRECEPCIONE);

    $INVENTARIOE->__SET('FOLIO_INVENTARIO', $_REQUEST['NUMEROFOLIO']);
    $INVENTARIOE_ADO->eliminado2($INVENTARIOE);

    $INVENTARIOE->__SET('FOLIO_INVENTARIO', $_REQUEST['NUMEROFOLIO']);
    $INVENTARIOE_ADO->deshabilitar2($INVENTARIOE);

    $_SESSION["parametro"] =  $_REQUEST['IDP'];
    $_SESSION["parametro1"] =  $_REQUEST['OPP'];
    echo "<script type='text/javascript'> location.href ='" . $_REQUEST['URLP'] . ".php?op';</script>";
}



//OBTENCION DE DATOS ENVIADOR A LA URL
if (isset($_SESSION['parametro']) && isset($_SESSION['parametro1']) && isset($_SESSION['urlO'])) {
    $IDP = $_SESSION['parametro'];
    $OPP = $_SESSION['parametro1'];
    $URLP = $_SESSION['urlO'];
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



    //editar =  OBTENCION DE DATOS PARA LA EDICION DE REGISTRO
    if ($OP == "editar") {

        $DISABLED = "";
        $DISABLED2 = "disabled";
        $DISABLEDSTYLE = "";
        $DISABLEDSTYLE2 = "style='background-color: #eeeeee;'";
        $ARRAYDRECEPCION = $DRECEPCIONE_ADO->verDrecepcion($IDOP);
        foreach ($ARRAYDRECEPCION as $r) :
            $NUMEROFOLIO = "" . $r['FOLIO_DRECEPCION'];
            $DESCRIPCION = "" . $r['DESCRIPCION_DRECEPCION'];
            $CANTIDAD = "" . $r['CANTIDAD_DRECEPCION'];
            $VALORUNITARIO = "" . $r['VALOR_UNITARIO_DRECEPCION'];
            $PRODUCTO = "" . $r['ID_PRODUCTO'];
            $TUMEDIDA = "" . $r['ID_TUMEDIDA'];
            $ARRAYVERTUMEDIDA = $TUMEDIDA_ADO->verTumedida($TUMEDIDA);
            if ($ARRAYVERTUMEDIDA) {
                $TUMEDIDAV = $ARRAYVERTUMEDIDA[0]['NOMBRE_TUMEDIDA'];
            }
            $IDDOC = "" . $r['ID_DOCOMPRA'];
            $ARRAYDOCOMPRA = $DOCOMPRA_ADO->verDocompra($IDDOC);
            if ($ARRAYDOCOMPRA) {
                $CANTIDADDOC = $ARRAYDOCOMPRA[0]['CANTIDAD_DOCOMPRA'];
            }

            $ESTADO = "" . $r['ESTADO'];
        endforeach;
    }    //ver =  OBTENCION DE DATOS PARA LA VISUALIZACION DEL REGISTRO
    if ($OP == "ver") {
        $DISABLED = "disabled";
        $DISABLED2 = "disabled";
        $DISABLEDSTYLE = "style='background-color: #eeeeee;'";
        $DISABLEDSTYLE2 = "style='background-color: #eeeeee;'";
        $ARRAYDRECEPCION = $DRECEPCIONE_ADO->verDrecepcion($IDOP);
        foreach ($ARRAYDRECEPCION as $r) :
            $NUMEROFOLIO = "" . $r['FOLIO_DRECEPCION'];
            $DESCRIPCION = "" . $r['DESCRIPCION_DRECEPCION'];
            $CANTIDAD = "" . $r['CANTIDAD_DRECEPCION'];
            $VALORUNITARIO = "" . $r['VALOR_UNITARIO_DRECEPCION'];
            $PRODUCTO = "" . $r['ID_PRODUCTO'];
            $TUMEDIDA = "" . $r['ID_TUMEDIDA'];
            $ARRAYVERTUMEDIDA = $TUMEDIDA_ADO->verTumedida($TUMEDIDA);
            if ($ARRAYVERTUMEDIDA) {
                $TUMEDIDAV = $ARRAYVERTUMEDIDA[0]['NOMBRE_TUMEDIDA'];
            }
            $IDDOC = "" . $r['ID_DOCOMPRA'];
            $ARRAYDOCOMPRA = $DOCOMPRA_ADO->verDocompra($IDDOC);
            if ($ARRAYDOCOMPRA) {
                $CANTIDADDOC = $ARRAYDOCOMPRA[0]['CANTIDAD_DOCOMPRA'];
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
        $ARRAYDRECEPCION = $DRECEPCIONE_ADO->verDrecepcion($IDOP);
        foreach ($ARRAYDRECEPCION as $r) :
            $NUMEROFOLIO = "" . $r['FOLIO_DRECEPCION'];
            $DESCRIPCION = "" . $r['DESCRIPCION_DRECEPCION'];
            $CANTIDAD = "" . $r['CANTIDAD_DRECEPCION'];
            $VALORUNITARIO = "" . $r['VALOR_UNITARIO_DRECEPCION'];
            $PRODUCTO = "" . $r['ID_PRODUCTO'];
            $TUMEDIDA = "" . $r['ID_TUMEDIDA'];
            $ARRAYVERTUMEDIDA = $TUMEDIDA_ADO->verTumedida($TUMEDIDA);
            if ($ARRAYVERTUMEDIDA) {
                $TUMEDIDAV = $ARRAYVERTUMEDIDA[0]['NOMBRE_TUMEDIDA'];
            }
            $IDDOC = "" . $r['ID_DOCOMPRA'];
            $ARRAYDOCOMPRA = $DOCOMPRA_ADO->verDocompra($IDDOC);
            if ($ARRAYDOCOMPRA) {
                $CANTIDADDOC = $ARRAYDOCOMPRA[0]['CANTIDAD_DOCOMPRA'];
            }
            $ESTADO = "" . $r['ESTADO'];
        endforeach;
    }
}
if (isset($_POST)) {
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
                    //TUMEDIDA = document.getElementById("TUMEDIDA").selectedIndex;


                    document.getElementById('val_cantidad').innerHTML = "";
                    document.getElementById('val_producto').innerHTML = "";
                    //document.getElementById('val_tumedida').innerHTML = "";         

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
                                            <li class="breadcrumb-item" aria-current="page">Recepción</li>
                                            <li class="breadcrumb-item" aria-current="page">Recepción Envases</li>
                                            <li class="breadcrumb-item" aria-current="page">Registro Recepción </li>
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

                        <form class="form" role="form" method="post" name="form_reg_dato" id="form_reg_dato" onsubmit="return validacion()">
                            <div class="box">
                                <div class="box-header with-border">
                                    <!--
                                        <h4 class="box-title">Different Width</h4>
                                        -->
                                </div>
                                <div class="box-body ">
                                    <div class="row">
                                        <div class="col-sm-2">
                                            <div class="form-group">
                                                <label>Número Folio</label>
                                                <input type="hidden" class="form-control" placeholder="ID DRECEPCIONE" id="IDD" name="IDD" value="<?php echo $IDOP; ?>" />
                                                <input type="hidden" class="form-control" placeholder="ID RECEPCIONE" id="IDP" name="IDP" value="<?php echo $IDP; ?>" />
                                                <input type="hidden" class="form-control" placeholder="OP RECEPCIONE" id="OPP" name="OPP" value="<?php echo $OPP; ?>" />
                                                <input type="hidden" class="form-control" placeholder="URL RECEPCIONE" id="URLP" name="URLP" value="<?php echo $URLP; ?>" />
                                                <input type="hidden" class="form-control" placeholder="URL RECEPCIONE" id="IDDOC" name="IDDOC" value="<?php echo $IDDOC; ?>" />
                                                <input type="hidden" class="form-control" placeholder="ID EMPRESA" id="EMPRESA" name="EMPRESA" value="<?php echo $EMPRESAS; ?>" />
                                                <input type="hidden" class="form-control" placeholder="ID PLANTA" id="PLANTA" name="PLANTA" value="<?php echo $PLANTAS; ?>" />
                                                <input type="hidden" class="form-control" placeholder="ID TEMPORADA" id="TEMPORADA" name="TEMPORADA" value="<?php echo $TEMPORADAS; ?>" />
                                                <input type="hidden" class="form-control" style="background-color: #eeeeee;" placeholder="Número Folio" id="NUMEROFOLIO" name="NUMEROFOLIO" value="<?php echo $NUMEROFOLIO; ?>" />
                                                <input type="text" class="form-control" style="background-color: #eeeeee;" placeholder="Número Folio" id="NUMEROFOLIOV" name="NUMEROFOLIOV" value="<?php echo $NUMEROFOLIO; ?>" disabled />
                                                <label id="val_folio" class="validacion"> </label>
                                            </div>
                                        </div>
                                        <div class="col-sm-2 col-12">
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
                                        <div class="col-sm-2 col-12">
                                            <label>Unidad Medida</label>
                                            <input type="hidden" class="form-control" placeholder="TUMEDIDA" id="TUMEDIDA" name="TUMEDIDA" value="<?php echo $TUMEDIDA; ?>" />
                                            <input type="text" class="form-control" placeholder="Unidad Medida" id="TUMEDIDAV" name="TUMEDIDAV" value="<?php echo $TUMEDIDAV; ?>" disabled />
                                            <label id="val_tumedida" class="validacion"> </label>
                                        </div>
                                        <div class="col-sm-2">
                                            <div class="form-group">
                                                <label>Valor Unitario </label>
                                                <input type="hidden" class="form-control" placeholder="VALORUNITARIO" id="VALORUNITARIO" name="VALORUNITARIO" value="<?php echo $VALORUNITARIO; ?>" />
                                                <input type="text" class="form-control" placeholder="Valor Unitario" id="VALORUNITARIOV" name="VALORUNITARIOV" value="<?php echo $VALORUNITARIO; ?>" disabled />
                                                <label id="val_vu" class="validacion"> </label>
                                            </div>
                                        </div>
                                        <div class="col-sm-2">
                                            <div class="form-group">
                                                <label>Cantidad Detalle OC</label>
                                                <input type="hidden" class="form-control" placeholder="CANTIDADDOC" id="CANTIDADDOC" name="CANTIDADDOC" value="<?php echo $CANTIDADDOC; ?>" />
                                                <input type="text" class="form-control" placeholder="Cantidad Detalle OC" id="CANTIDADDOCV" name="CANTIDADDOCV" value="<?php echo $CANTIDADDOC; ?>" disabled />
                                                <label id="val_cantidaddoc" class="validacion"> </label>
                                            </div>
                                        </div>
                                        <div class="col-sm-2">
                                            <div class="form-group">
                                                <label>Cantidad Producto</label>
                                                <input type="hidden" class="form-control" placeholder="CANTIDADE" id="CANTIDADE" name="CANTIDADE" value="<?php echo $CANTIDAD; ?>" />
                                                <input type="text" class="form-control" placeholder="Cantidad Producto" id="CANTIDAD" name="CANTIDAD" value="<?php echo $CANTIDAD; ?>" <?php echo $DISABLED; ?> />
                                                <label id="val_cantidad" class="validacion"> </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label>Descripción </label>
                                                <input type="hidden" class="form-control" placeholder="Observaciónes" id="DESCRIPCIONE" name="DESCRIPCIONE" value="<?php echo $DESCRIPCION; ?>" />
                                                <textarea class="form-control" rows="1" placeholder="Ingrese Nota, Observaciones u Otro" id="DESCRIPCION" name="DESCRIPCION" <?php echo $DISABLED; ?>><?php echo $DESCRIPCION; ?></textarea>
                                                <label id="val_observacion" class="validacion"> </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- /.row -->
                                <!-- /.box-body -->
                                <div class="box-footer">
                                    <label id="val_drecepcion" class="validacion center"><?php echo $MENSAJE; ?> </label>
                                    <table class="table ">
                                        <tbody>
                                            <tr>
                                                <td>
                                                    <?php if ($ESTADO == 0) { ?>
                                                        <?php if ($OP == "crear") { ?>
                                                            <button type="button" class="btn btn-rounded btn-success btn-outline " name="CANCELAR" value="CANCELAR" Onclick="irPagina('<?php echo $URLP; ?>.php?op');">
                                                                <i class="ti-back-left "></i> Volver
                                                            </button>
                                                        <?php } ?>
                                                        <?php if ($OP == "") { ?>
                                                            <button type="button" class="btn btn-rounded btn-success btn-outline " name="CANCELAR" value="CANCELAR" Onclick="irPagina('<?php echo $URLP; ?>.php?op');">
                                                                <i class="ti-back-left "></i> Volver
                                                            </button>
                                                        <?php } ?>
                                                    <?php } ?>
                                                    <?php if ($ESTADO != 0) { ?>
                                                        <?php if ($OP == "crear") { ?>
                                                            <button type="button" class="btn btn-rounded btn-success btn-outline " name="CANCELAR" value="CANCELAR" Onclick="irPagina('<?php echo $URLP; ?>.php?op');">
                                                                <i class="ti-back-left "></i> Volver
                                                            </button>
                                                        <?php } ?>
                                                        <?php if ($OP == "") { ?>
                                                            <button type="button" class="btn btn-rounded btn-success btn-outline " name="CANCELAR" value="CANCELAR" Onclick="irPagina('<?php echo $URLP; ?>.php?op');">
                                                                <i class="ti-back-left "></i> Volver
                                                            </button>
                                                        <?php } ?>
                                                    <?php } ?>
                                                    <?php if ($OP == "editar") { ?>
                                                        <button type="button" class="btn btn-rounded btn-success btn-outline " name="CANCELAR" value="CANCELAR" Onclick="irPagina('<?php echo $URLP; ?>.php?op');">
                                                            <i class="ti-back-left "></i> Volver
                                                        </button>
                                                    <?php } ?>
                                                    <?php if ($OP == "ver") { ?>
                                                        <button type="button" class="btn btn-rounded btn-success btn-outline " name="CANCELAR" value="CANCELAR" Onclick="irPagina('<?php echo $URLP; ?>.php?op');">
                                                            <i class="ti-back-left "></i> Volver
                                                        </button>
                                                    <?php } ?>
                                                    <?php if ($OP == "eliminar") { ?>
                                                        <button type="button" class="btn btn-rounded btn-success btn-outline " name="CANCELAR" value="CANCELAR" Onclick="irPagina('<?php echo $URLP; ?>.php?op');">
                                                            <i class="ti-back-left "></i> Volver
                                                        </button>
                                                    <?php } ?>
                                                    <?php if ($OP == "eliminar") { ?>
                                                        <button type=" " class="btn btn-rounded btn-danger btn-outline " name="ELIMINAR" value="ELIMINAR" <?php if ($ESTADO == 0) {
                                                                                                                                                                echo "disabled";
                                                                                                                                                            } ?>>
                                                            <i class="ti-back-left "></i> Eliminar
                                                        </button>
                                                    <?php } ?>
                                                    <?php if ($OP == "") { ?>
                                                        <button type="submit" class="btn btn-rounded btn-primary btn-outline" name="CREAR" value="CREAR" <?php echo $DISABLED; ?>>
                                                            <i class="ti-save-alt"></i> Agregar
                                                        </button>
                                                    <?php } ?>
                                                    <?php if ($OP == "crear") { ?>
                                                        <button type="submit" class="btn btn-rounded btn-primary btn-outline" name="CREAR" value="CREAR" <?php if ($ESTADO == 0) {
                                                                                                                                                                echo "disabled";
                                                                                                                                                            } ?>>
                                                            <i class="ti-save-alt"></i> Agregar
                                                        </button>
                                                    <?php }   ?>
                                                    <?php if ($OP == "editar") { ?>
                                                        <button type="submit" class="btn btn-rounded btn-primary btn-outline" name="EDITAR" value="EDITAR" <?php if ($ESTADO == 0) {
                                                                                                                                                                echo "disabled";
                                                                                                                                                            } ?>>
                                                            <i class="ti-save-alt"></i> Guardar
                                                        </button>
                                                    <?php }   ?>
                                                    <?php if ($OP == "ver") { ?>
                                                        <button type="submit" class="btn btn-rounded btn-primary btn-outline" name="EDITAR" value="EDITAR" <?php echo $DISABLED; ?> <?php if ($ESTADO == 0) {
                                                                                                                                                                                        echo "disabled";
                                                                                                                                                                                    } ?>>
                                                            <i class="ti-save-alt"></i> Guardar
                                                        </button>
                                                    <?php }   ?>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
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