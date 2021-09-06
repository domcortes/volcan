<?php

include_once "../config/validarUsuario.php";
//LLAMADA ARCHIVOS NECESARIOS PARA LAS OPERACIONES

include_once '../controlador/PRODUCTO_ADO.php';
include_once '../controlador/FAMILIA_ADO.php';
include_once '../controlador/SUBFAMILIA_ADO.php';
include_once '../controlador/TUMEDIDA_ADO.php';
include_once '../controlador/EEXPORTACION_ADO.php';


include_once '../controlador/FICHA_ADO.php';
include_once '../controlador/DFICHA_ADO.php';

include_once '../modelo/DFICHA.php';

//INCIALIZAR LAS VARIBLES
//INICIALIZAR CONTROLADOR

$EEXPORTACION_ADO =  new EEXPORTACION_ADO();
$PRODUCTO_ADO =  new PRODUCTO_ADO();
$FAMILIA_ADO =  new FAMILIA_ADO();
$SUBFAMILIA_ADO =  new SUBFAMILIA_ADO();
$TUMEDIDA_ADO =  new TUMEDIDA_ADO();

$FICHA_ADO =  new FICHA_ADO();
$DFICHA_ADO =  new DFICHA_ADO();

//INIICIALIZAR MODELO
$DFICHA =  new DFICHA();

//INICIALIZACION VARIABLES
$PRODUCTO = "";

$TUMEDIDA = "";
$FAMILIA = "";
$SUBFAMILIA = "";

$TUMEDIDAV = "";
$FAMILIAV = "";
$SUBFAMILIAV = "";
$CONSUMOCONTENEDOR = 0;
$CONSUMOPORENVASE = 0;
$CONSUMOPORPALLET = 0;
$PALLETCARGA = 0;
$FACTORCONSUMO = 0;
$ENVASEESTANDAR = "";
$DESCRIPCION = "";


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
$ARRAYDFICHA = "";
$ARRAYFICHA = "";

$ARRAYEEXPORTACION = "";
$ARRAYPRODUCTO = "";
$ARRAYVERFAMILIA = "";
$ARRAYVERSUBFAMILIA = "";
$ARRAYVERTUMEDIDA = "";



//DEFINIR ARREGLOS CON LOS DATOS OBTENIDOS DE LAS FUNCIONES DE LOS CONTROLADORES


$ARRAYPRODUCTO = $PRODUCTO_ADO->listarProductoPorEmpresaCBX($EMPRESAS);
include_once "../config/validarDatosUrlD.php";



//OPERACIONES
//OPERACION DE REGISTRO DE FILA
if (isset($_REQUEST['CREAR'])) {


    $DFICHA->__SET('FACTOR_CONSUMO_DFICHA', $_REQUEST['FACTORCONSUMO']);
    $DFICHA->__SET('CONSUMO_ENVASE_DFICHA', $_REQUEST['CONSUMOPORENVASE']);
    $DFICHA->__SET('CONSUMO_PALLET_DFICHA', $_REQUEST['CONSUMOPORPALLET']);
    $DFICHA->__SET('PALLET_CARGA_DFICHA', $_REQUEST['PALLETCARGA']);
    $DFICHA->__SET('CONSUMO_CONTENEDOR_DFICHA', $_REQUEST['CONSUMOCONTENEDOR']);
    $DFICHA->__SET('OBSERVACIONES_DFICHA', $_REQUEST['PRODUCTO']);
    $DFICHA->__SET('ID_PRODUCTO', $_REQUEST['PRODUCTO']);
    $DFICHA->__SET('ID_FICHA', $_REQUEST['IDP']);
    //LLAMADA AL METODO DE REGISTRO DEL CONTROLADOR
    $DFICHA_ADO->agregarDFicha($DFICHA);

    //REDIRECCIONAR A PAGINA registroRecepcion.php 
    $_SESSION["parametro"] =  $_REQUEST['IDP'];
    $_SESSION["parametro1"] =  $_REQUEST['OPP'];
    echo "<script type='text/javascript'> location.href ='" . $_REQUEST['URLO'] . ".php?op';</script>";
}
if (isset($_REQUEST['EDITAR'])) {

    $DFICHA->__SET('FACTOR_CONSUMO_DFICHA', $_REQUEST['FACTORCONSUMO']);
    $DFICHA->__SET('CONSUMO_ENVASE_DFICHA', $_REQUEST['CONSUMOPORENVASE']);
    $DFICHA->__SET('CONSUMO_PALLET_DFICHA', $_REQUEST['CONSUMOPORPALLET']);
    $DFICHA->__SET('PALLET_CARGA_DFICHA', $_REQUEST['PALLETCARGA']);
    $DFICHA->__SET('CONSUMO_CONTENEDOR_DFICHA', $_REQUEST['CONSUMOCONTENEDOR']);
    $DFICHA->__SET('OBSERVACIONES_DFICHA', $_REQUEST['PRODUCTO']);
    $DFICHA->__SET('ID_PRODUCTO', $_REQUEST['PRODUCTO']);
    $DFICHA->__SET('ID_FICHA', $_REQUEST['IDP']);
    $DFICHA->__SET('ID_DFICHA', $_REQUEST['ID']);
    //LLAMADA AL METODO DE REGISTRO DEL CONTROLADOR
    $DFICHA_ADO->actualizarDFicha($DFICHA);

    $_SESSION["parametro"] =  $_REQUEST['IDP'];
    $_SESSION["parametro1"] =  $_REQUEST['OPP'];
    echo "<script type='text/javascript'> location.href ='" . $_REQUEST['URLO'] . ".php?op';</script>";
}
if (isset($_REQUEST['ELIMINAR'])) {

    $DFICHA->__SET('ID_DFICHA', $_REQUEST['ID']);
    //LLAMADA AL METODO DE REGISTRO DEL CONTROLADOR
    $DFICHA_ADO->deshabilitar($DFICHA);
    $_SESSION["parametro"] =  $_REQUEST['IDP'];
    $_SESSION["parametro1"] =  $_REQUEST['OPP'];
    echo "<script type='text/javascript'> location.href ='" . $_REQUEST['URLO'] . ".php?op';</script>";
}



//OBTENCION DE DATOS ENVIADOR A LA URL
if (isset($_SESSION['parametro']) && isset($_SESSION['parametro1']) && isset($_SESSION['urlO'])) {
    $IDP = $_SESSION['parametro'];
    $OPP = $_SESSION['parametro1'];
    $URLO = $_SESSION['urlO'];
    $ARRAYFICHA = $FICHA_ADO->verFicha($IDP);
    if ($ARRAYFICHA) {
        $ARRAYEEXPORTACION = $EEXPORTACION_ADO->verEstandar($ARRAYFICHA[0]["ID_ESTANDAR"]);
        if ($ARRAYEEXPORTACION) {
            $ENVASEESTANDAR = $ARRAYEEXPORTACION[0]["CANTIDAD_ENVASE_ESTANDAR"];
        }
    }
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

    $ARRAYFICHA = $FICHA_ADO->verFicha($IDP);
    if ($ARRAYFICHA) {
        $ARRAYEEXPORTACION = $EEXPORTACION_ADO->verEstandar($ARRAYFICHA[0]["ID_ESTANDAR"]);
        if ($ARRAYEEXPORTACION) {
            $ENVASEESTANDAR = $ARRAYEEXPORTACION[0]["CANTIDAD_ENVASE_ESTANDAR"];
        }
    }

    //IDENTIFICACIONES DE OPERACIONES
    //crear =  OBTENCION DE DATOS PARA LA CREACION DE REGISTRO
    if ($OP == "crear") {
        $DISABLED = "";
        $DISABLED2 = "";
        $DISABLEDSTYLE = "";
        $DISABLEDSTYLE2 = "";
        $ARRAYDFICHA = $DFICHA_ADO->verDFicha($IDOP);
        foreach ($ARRAYDFICHA as $r) :
            $PRODUCTO = "" . $r['ID_PRODUCTO'];
            $ARRAYVERPRODUCTO = $PRODUCTO_ADO->verProducto($PRODUCTO);
            if ($ARRAYVERPRODUCTO) {
                $ARRAYVERFAMILIA = $FAMILIA_ADO->verFamilia($ARRAYVERPRODUCTO[0]["ID_FAMILIA"]);
                if ($ARRAYVERFAMILIA) {
                    $FAMILIAV = $ARRAYVERFAMILIA[0]["NOMBRE_FAMILIA"];
                }
                $ARRAYVERSUBFAMILIA = $SUBFAMILIA_ADO->verSubfamilia($ARRAYVERPRODUCTO[0]["ID_SUBFAMILIA"]);
                if ($ARRAYVERSUBFAMILIA) {
                    $SUBFAMILIAV = $ARRAYVERSUBFAMILIA[0]["NOMBRE_SUBFAMILIA"];
                }
                $ARRAYVERTUMEDIDA = $TUMEDIDA_ADO->verTumedida($ARRAYVERPRODUCTO[0]["ID_TUMEDIDA"]);
                if ($ARRAYVERTUMEDIDA) {
                    $TUMEDIDAV = $ARRAYVERTUMEDIDA[0]["NOMBRE_TUMEDIDA"];
                }
            }
            $FACTORCONSUMO = "" . $r['FACTOR_CONSUMO_DFICHA'];
            $CONSUMOPORENVASE = "" . $r['CONSUMO_ENVASE_DFICHA'];
            $CONSUMOPORPALLET = "" . $r['CONSUMO_PALLET_DFICHA'];
            $PALLETCARGA = "" . $r['PALLET_CARGA_DFICHA'];
            $CONSUMOCONTENEDOR = "" . $r['CONSUMO_CONTENEDOR_DFICHA'];
            $ESTADO = "" . $r['ESTADO'];
        endforeach;
    }
    //editar =  OBTENCION DE DATOS PARA LA EDICION DE REGISTRO
    if ($OP == "editar") {

        $DISABLED = "";
        $DISABLED2 = "disabled";
        $DISABLEDSTYLE = "";
        $DISABLEDSTYLE2 = "style='background-color: #eeeeee;'";
        $ARRAYDFICHA = $DFICHA_ADO->verDFicha($IDOP);
        foreach ($ARRAYDFICHA as $r) :
            $PRODUCTO = "" . $r['ID_PRODUCTO'];
            $ARRAYVERPRODUCTO = $PRODUCTO_ADO->verProducto($PRODUCTO);
            if ($ARRAYVERPRODUCTO) {
                $ARRAYVERFAMILIA = $FAMILIA_ADO->verFamilia($ARRAYVERPRODUCTO[0]["ID_FAMILIA"]);
                if ($ARRAYVERFAMILIA) {
                    $FAMILIAV = $ARRAYVERFAMILIA[0]["NOMBRE_FAMILIA"];
                }
                $ARRAYVERSUBFAMILIA = $SUBFAMILIA_ADO->verSubfamilia($ARRAYVERPRODUCTO[0]["ID_SUBFAMILIA"]);
                if ($ARRAYVERSUBFAMILIA) {
                    $SUBFAMILIAV = $ARRAYVERSUBFAMILIA[0]["NOMBRE_SUBFAMILIA"];
                }
                $ARRAYVERTUMEDIDA = $TUMEDIDA_ADO->verTumedida($ARRAYVERPRODUCTO[0]["ID_TUMEDIDA"]);
                if ($ARRAYVERTUMEDIDA) {
                    $TUMEDIDAV = $ARRAYVERTUMEDIDA[0]["NOMBRE_TUMEDIDA"];
                }
            }
            $FACTORCONSUMO = "" . $r['FACTOR_CONSUMO_DFICHA'];
            $CONSUMOPORENVASE = "" . $r['CONSUMO_ENVASE_DFICHA'];
            $CONSUMOPORPALLET = "" . $r['CONSUMO_PALLET_DFICHA'];
            $PALLETCARGA = "" . $r['PALLET_CARGA_DFICHA'];
            $CONSUMOCONTENEDOR = "" . $r['CONSUMO_CONTENEDOR_DFICHA'];
            $ESTADO = "" . $r['ESTADO'];
        endforeach;
    }    //ver =  OBTENCION DE DATOS PARA LA VISUALIZACION DEL REGISTRO
    if ($OP == "ver") {
        $DISABLED = "disabled";
        $DISABLED2 = "disabled";
        $DISABLEDSTYLE = "style='background-color: #eeeeee;'";
        $DISABLEDSTYLE2 = "style='background-color: #eeeeee;'";
        $ARRAYDFICHA = $DFICHA_ADO->verDFicha($IDOP);
        foreach ($ARRAYDFICHA as $r) :
            $PRODUCTO = "" . $r['ID_PRODUCTO'];
            $ARRAYVERPRODUCTO = $PRODUCTO_ADO->verProducto($PRODUCTO);
            if ($ARRAYVERPRODUCTO) {
                $ARRAYVERFAMILIA = $FAMILIA_ADO->verFamilia($ARRAYVERPRODUCTO[0]["ID_FAMILIA"]);
                if ($ARRAYVERFAMILIA) {
                    $FAMILIAV = $ARRAYVERFAMILIA[0]["NOMBRE_FAMILIA"];
                }
                $ARRAYVERSUBFAMILIA = $SUBFAMILIA_ADO->verSubfamilia($ARRAYVERPRODUCTO[0]["ID_SUBFAMILIA"]);
                if ($ARRAYVERSUBFAMILIA) {
                    $SUBFAMILIAV = $ARRAYVERSUBFAMILIA[0]["NOMBRE_SUBFAMILIA"];
                }
                $ARRAYVERTUMEDIDA = $TUMEDIDA_ADO->verTumedida($ARRAYVERPRODUCTO[0]["ID_TUMEDIDA"]);
                if ($ARRAYVERTUMEDIDA) {
                    $TUMEDIDAV = $ARRAYVERTUMEDIDA[0]["NOMBRE_TUMEDIDA"];
                }
            }
            $FACTORCONSUMO = "" . $r['FACTOR_CONSUMO_DFICHA'];
            $CONSUMOPORENVASE = "" . $r['CONSUMO_ENVASE_DFICHA'];
            $CONSUMOPORPALLET = "" . $r['CONSUMO_PALLET_DFICHA'];
            $PALLETCARGA = "" . $r['PALLET_CARGA_DFICHA'];
            $CONSUMOCONTENEDOR = "" . $r['CONSUMO_CONTENEDOR_DFICHA'];
            $ESTADO = "" . $r['ESTADO'];
        endforeach;
    }
    if ($OP == "eliminar") {
        $DISABLED = "disabled";
        $DISABLED2 = "disabled";
        $DISABLEDSTYLE = "style='background-color: #eeeeee;'";
        $DISABLEDSTYLE2 = "style='background-color: #eeeeee;'";
        $MENSAJE = "ESTA SEGURO DE ELIMINAR EL REGISTRO, PARA CONFIRMAR PRESIONE ELIMINAR";
        $ARRAYDFICHA = $DFICHA_ADO->verDFicha($IDOP);
        foreach ($ARRAYDFICHA as $r) :
            $PRODUCTO = "" . $r['ID_PRODUCTO'];
            $ARRAYVERPRODUCTO = $PRODUCTO_ADO->verProducto($PRODUCTO);
            if ($ARRAYVERPRODUCTO) {
                $ARRAYVERFAMILIA = $FAMILIA_ADO->verFamilia($ARRAYVERPRODUCTO[0]["ID_FAMILIA"]);
                if ($ARRAYVERFAMILIA) {
                    $FAMILIAV = $ARRAYVERFAMILIA[0]["NOMBRE_FAMILIA"];
                }
                $ARRAYVERSUBFAMILIA = $SUBFAMILIA_ADO->verSubfamilia($ARRAYVERPRODUCTO[0]["ID_SUBFAMILIA"]);
                if ($ARRAYVERSUBFAMILIA) {
                    $SUBFAMILIAV = $ARRAYVERSUBFAMILIA[0]["NOMBRE_SUBFAMILIA"];
                }
                $ARRAYVERTUMEDIDA = $TUMEDIDA_ADO->verTumedida($ARRAYVERPRODUCTO[0]["ID_TUMEDIDA"]);
                if ($ARRAYVERTUMEDIDA) {
                    $TUMEDIDAV = $ARRAYVERTUMEDIDA[0]["NOMBRE_TUMEDIDA"];
                }
            }
            $FACTORCONSUMO = "" . $r['FACTOR_CONSUMO_DFICHA'];
            $CONSUMOPORENVASE = "" . $r['CONSUMO_ENVASE_DFICHA'];
            $CONSUMOPORPALLET = "" . $r['CONSUMO_PALLET_DFICHA'];
            $PALLETCARGA = "" . $r['PALLET_CARGA_DFICHA'];
            $CONSUMOCONTENEDOR = "" . $r['CONSUMO_CONTENEDOR_DFICHA'];
            $ESTADO = "" . $r['ESTADO'];
        endforeach;
    }
}
if (isset($_POST)) {

    if (isset($_REQUEST['PRODUCTO'])) {
        $PRODUCTO = "" . $_REQUEST['PRODUCTO'];
        $ARRAYVERPRODUCTO = $PRODUCTO_ADO->verProducto($PRODUCTO);
        if ($ARRAYVERPRODUCTO) {
            $ARRAYVERFAMILIA = $FAMILIA_ADO->verFamilia($ARRAYVERPRODUCTO[0]["ID_FAMILIA"]);
            if ($ARRAYVERFAMILIA) {
                $FAMILIAV = $ARRAYVERFAMILIA[0]["NOMBRE_FAMILIA"];
            }
            $ARRAYVERSUBFAMILIA = $SUBFAMILIA_ADO->verSubfamilia($ARRAYVERPRODUCTO[0]["ID_SUBFAMILIA"]);
            if ($ARRAYVERSUBFAMILIA) {
                $SUBFAMILIAV = $ARRAYVERSUBFAMILIA[0]["NOMBRE_SUBFAMILIA"];
            }
            $ARRAYVERTUMEDIDA = $TUMEDIDA_ADO->verTumedida($ARRAYVERPRODUCTO[0]["ID_TUMEDIDA"]);
            if ($ARRAYVERTUMEDIDA) {
                $TUMEDIDAV = $ARRAYVERTUMEDIDA[0]["NOMBRE_TUMEDIDA"];
            }
        }
    }
    if (isset($_REQUEST['FACTORCONSUMO'])) {
        $FACTORCONSUMO = "" . $_REQUEST['FACTORCONSUMO'];
        $CONSUMOPORENVASE = $FACTORCONSUMO * 1;
        $CONSUMOPORPALLET = $CONSUMOPORENVASE * $ENVASEESTANDAR;
    }
    if (isset($_REQUEST['ENVASEESTANDAR'])) {
        $ENVASEESTANDAR = "" . $_REQUEST['ENVASEESTANDAR'];
    }
    if (isset($_REQUEST['PALLETCARGA'])) {
        $PALLETCARGA = "" . $_REQUEST['PALLETCARGA'];
        $CONSUMOCONTENEDOR = $CONSUMOPORPALLET * $PALLETCARGA;
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
                function validacion() {


                    PRODUCTO = document.getElementById("PRODUCTO").selectedIndex;
                    FACTORCONSUMO = document.getElementById("FACTORCONSUMO").value;
                    PALLETCARGA = document.getElementById("PALLETCARGA").value;


                    document.getElementById('val_producto').innerHTML = "";
                    document.getElementById('val_fconsumo').innerHTML = "";
                    document.getElementById('val_palletcarga').innerHTML = "";

                    if (PRODUCTO == null || PRODUCTO == 0) {
                        document.form_reg_dato.PRODUCTO.focus();
                        document.form_reg_dato.PRODUCTO.style.borderColor = "#FF0000";
                        document.getElementById('val_producto').innerHTML = "NO HA SELECIONADO ALTERNATIVA";
                        return false;
                    }
                    document.form_reg_dato.PRODUCTO.style.borderColor = "#4AF575";

                    if (FACTORCONSUMO == null || FACTORCONSUMO.length == 0 || /^\s+$/.test(FACTORCONSUMO)) {
                        document.form_reg_dato.FACTORCONSUMO.focus();
                        document.form_reg_dato.FACTORCONSUMO.style.borderColor = "#FF0000";
                        document.getElementById('val_fconsumo').innerHTML = "NO HA INGRESADO DATOS";
                        return false;
                    }
                    document.form_reg_dato.FACTORCONSUMO.style.borderColor = "#4AF575";

                    if (FACTORCONSUMO == 0) {
                        document.form_reg_dato.FACTORCONSUMO.focus();
                        document.form_reg_dato.FACTORCONSUMO.style.borderColor = "#FF0000";
                        document.getElementById('val_fconsumo').innerHTML = "TIENE QUE SER MAYOR A CERO";
                        return false;
                    }
                    document.form_reg_dato.FACTORCONSUMO.style.borderColor = "#4AF575";

                    if (PALLETCARGA == null || PALLETCARGA.length == 0 || /^\s+$/.test(PALLETCARGA)) {
                        document.form_reg_dato.PALLETCARGA.focus();
                        document.form_reg_dato.PALLETCARGA.style.borderColor = "#FF0000";
                        document.getElementById('val_palletcarga').innerHTML = "NO HA INGRESADO DATOS";
                        return false;
                    }
                    document.form_reg_dato.PALLETCARGA.style.borderColor = "#4AF575";


                    if (PALLETCARGA == 0) {
                        document.form_reg_dato.PALLETCARGA.focus();
                        document.form_reg_dato.PALLETCARGA.style.borderColor = "#FF0000";
                        document.getElementById('val_palletcarga').innerHTML = "TIENE QUE SER MAYOR A CERO";
                        return false;
                    }
                    document.form_reg_dato.PALLETCARGA.style.borderColor = "#4AF575";

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
                                            <li class="breadcrumb-item" aria-current="page">Consumo</li>
                                            <li class="breadcrumb-item" aria-current="page">Ficha</li>
                                            <li class="breadcrumb-item" aria-current="page">Detalle</li>
                                            <li class="breadcrumb-item active" aria-current="page">
                                                <a href="#"> Registro Detalle </a>
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
                                        <div class="col-sm-4 col-12">
                                            <label>Producto</label>
                                            <input type="hidden" class="form-control" placeholder="ID DFICHA" id="ID" name="ID" value="<?php echo $IDOP; ?>" />
                                            <input type="hidden" class="form-control" placeholder="ID FICHA" id="IDP" name="IDP" value="<?php echo $IDP; ?>" />
                                            <input type="hidden" class="form-control" placeholder="OP FICHA" id="OPP" name="OPP" value="<?php echo $OPP; ?>" />
                                            <input type="hidden" class="form-control" placeholder="URL FICHA" id="URLO" name="URLO" value="<?php echo $URLO; ?>" />
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
                                        <div class="col-sm-2 col-12">
                                            <label>Familia</label>
                                            <input type="hidden" class="form-control" placeholder="FAMILIA" id="FAMILIA" name="FAMILIA" value="<?php echo $FAMILIA; ?>" />
                                            <input type="text" class="form-control" placeholder="Familia" id="FAMILIAV" name="FAMILIAV" value="<?php echo $FAMILIAV; ?>" disabled />
                                            <label id="val_familia" class="validacion"> </label>
                                        </div>
                                        <div class="col-sm-2 col-12">
                                            <label>Sub Familia</label>
                                            <input type="hidden" class="form-control" placeholder="SUBFAMILIA" id="SUBFAMILIA" name="PRODUCTOE" value="<?php echo $SUBFAMILIA; ?>" />
                                            <input type="text" class="form-control" placeholder="Sub Familia" id="SUBFAMILIAV" name="SUBFAMILIAV" value="<?php echo $SUBFAMILIAV; ?>" disabled />
                                            <label id="val_subfamilia" class="validacion"> </label>
                                        </div>
                                        <div class="col-sm-2 col-12">
                                            <label>Unidad Medida </label>
                                            <input type="hidden" class="form-control" placeholder="TUMEDIDA" id="TUMEDIDA" name="TUMEDIDA" value="<?php echo $TUMEDIDA; ?>" />
                                            <input type="text" class="form-control" placeholder="Unidad Medida" id="TUMEDIDAV" name="TUMEDIDAV" value="<?php echo $TUMEDIDAV; ?>" disabled />
                                            <label id="val_umedida" class="validacion"> </label>
                                        </div>
                                        <div class="col-sm-2 col-12">
                                            <label>Factor Consumo </label>
                                            <input type="hidden" class="form-control" placeholder="FACTORCONSUMOE" id="FACTORCONSUMOE" name="FACTORCONSUMOE" value="<?php echo $FACTORCONSUMO; ?>" />
                                            <input type="number" step="0.01" class="form-control" placeholder="Factor Consumo" onchange="this.form.submit()" id="FACTORCONSUMO" name="FACTORCONSUMO" value="<?php echo $FACTORCONSUMO; ?>"  <?php echo $DISABLED; ?>/>
                                            <label id="val_fconsumo" class="validacion"> </label>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-2 col-12">
                                            <label>Consumo Por Envase </label>
                                            <input type="hidden" class="form-control" placeholder="CONSUMOPORENVASE" id="CONSUMOPORENVASE" name="CONSUMOPORENVASE" value="<?php echo $CONSUMOPORENVASE; ?>" />
                                            <input type="number" step="0.01" class="form-control" placeholder="Consumo Por Envase" id="CONSUMOPORENVASEV" name="CONSUMOPORENVASEV" value="<?php echo $CONSUMOPORENVASE; ?>" disabled />
                                            <label id="val_consumocaja" class="validacion"> </label>
                                        </div>
                                        <div class="col-sm-2 col-12">
                                            <label>Envase Estandar</label>
                                            <input type="hidden" class="form-control" placeholder="ENVASEESTANDAR" id="ENVASEESTANDAR" name="ENVASEESTANDAR" value="<?php echo $ENVASEESTANDAR; ?>" />
                                            <input type="number" step="0.01" class="form-control" placeholder="Envase Estandar" id="ENVASEESTANDARV" name="ENVASEESTANDARV" value="<?php echo $ENVASEESTANDAR; ?>" disabled />
                                            <label id="val_envaseestandar" class="validacion"> </label>
                                        </div>
                                        <div class="col-sm-2 col-12">
                                            <label>Consumo Por Pallet </label>
                                            <input type="hidden" class="form-control" placeholder="CONSUMOPORPALLET" id="CONSUMOPORPALLET" name="CONSUMOPORPALLET" value="<?php echo $CONSUMOPORPALLET; ?>" />
                                            <input type="number" step="0.01" class="form-control" placeholder="Consumo Por Pallet" id="CONSUMOPORPALLETV" name="CONSUMOPORPALLETV" value="<?php echo $CONSUMOPORPALLET; ?>" disabled />
                                            <label id="val_consumopallet" class="validacion"> </label>
                                        </div>
                                        <div class="col-sm-2 col-12">
                                            <label>Pallet Por Carga </label>
                                            <input type="hidden" class="form-control" placeholder="PALLETCARGAE" id="PALLETCARGAE" name="PALLETCARGAE" value="<?php echo $PALLETCARGA; ?>" />
                                            <input type="number" step="0.01" class="form-control" placeholder="Factor Consumo" onchange="this.form.submit()" id="PALLETCARGA" name="PALLETCARGA" value="<?php echo $PALLETCARGA; ?>" <?php echo $DISABLED; ?> />
                                            <label id="val_palletcarga" class="validacion"> </label>
                                        </div>
                                        <div class="col-sm-2 col-12">
                                            <label>Consumo Por Contenedor </label>
                                            <input type="hidden" class="form-control" placeholder="CONSUMOPORPALLET" id="CONSUMOCONTENEDOR" name="CONSUMOCONTENEDOR" value="<?php echo $CONSUMOCONTENEDOR; ?>" />
                                            <input type="number" step="0.01" class="form-control" placeholder="Consumo Por Pallet" id="CONSUMOCONTENEDORV" name="CONSUMOCONTENEDORV" value="<?php echo $CONSUMOCONTENEDOR; ?>" disabled />
                                            <label id="val_consumocontenedor" class="validacion"> </label>
                                        </div>

                                    </div>
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label>Requerimientos Especiales </label>
                                                <input type="hidden" class="form-control" placeholder="Observaciónes" id="DESCRIPCIONE" name="DESCRIPCIONE" value="<?php echo $DESCRIPCION; ?>" />
                                                <textarea class="form-control" rows="1" placeholder="Ingrese Nota, Observaciones u Otro" id="DESCRIPCION" name="DESCRIPCION" <?php echo $DISABLED; ?> ><?php echo $DESCRIPCION; ?></textarea>
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
                                                            <button type="button" class="btn btn-rounded btn-success btn-outline " name="CANCELAR" value="CANCELAR" Onclick="irPagina('<?php echo $URLO; ?>.php?op');">
                                                                <i class="ti-back-left "></i> Volver
                                                            </button>
                                                        <?php } ?>
                                                        <?php if ($OP == "") { ?>
                                                            <button type="button" class="btn btn-rounded btn-success btn-outline " name="CANCELAR" value="CANCELAR" Onclick="irPagina('<?php echo $URLO; ?>.php?op');">
                                                                <i class="ti-back-left "></i> Volver
                                                            </button>
                                                        <?php } ?>
                                                    <?php } ?>
                                                    <?php if ($ESTADO != 0) { ?>
                                                        <?php if ($OP == "crear") { ?>
                                                            <button type="button" class="btn btn-rounded btn-success btn-outline " name="CANCELAR" value="CANCELAR" Onclick="irPagina('<?php echo $URLO; ?>.php?op');">
                                                                <i class="ti-back-left "></i> Volver
                                                            </button>
                                                        <?php } ?>
                                                        <?php if ($OP == "") { ?>
                                                            <button type="button" class="btn btn-rounded btn-success btn-outline " name="CANCELAR" value="CANCELAR" Onclick="irPagina('<?php echo $URLO; ?>.php?op');">
                                                                <i class="ti-back-left "></i> Volver
                                                            </button>
                                                        <?php } ?>
                                                    <?php } ?>
                                                    <?php if ($OP == "editar") { ?>
                                                        <button type="button" class="btn btn-rounded btn-success btn-outline " name="CANCELAR" value="CANCELAR" Onclick="irPagina('<?php echo $URLO; ?>.php?op');">
                                                            <i class="ti-back-left "></i> Volver
                                                        </button>
                                                    <?php } ?>
                                                    <?php if ($OP == "ver") { ?>
                                                        <button type="button" class="btn btn-rounded btn-success btn-outline " name="CANCELAR" value="CANCELAR" Onclick="irPagina('<?php echo $URLO; ?>.php?op');">
                                                            <i class="ti-back-left "></i> Volver
                                                        </button>
                                                    <?php } ?>
                                                    <?php if ($OP == "eliminar") { ?>
                                                        <button type="button" class="btn btn-rounded btn-success btn-outline " name="CANCELAR" value="CANCELAR" Onclick="irPagina('<?php echo $URLO; ?>.php?op');">
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