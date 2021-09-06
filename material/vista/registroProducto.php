<?php


include_once "../config/validarUsuario.php";


//LLAMADA ARCHIVOS NECESARIOS PARA LAS OPERACIONES
include_once '../controlador/PRODUCTO_ADO.php';
include_once '../controlador/FAMILIA_ADO.php';
include_once '../controlador/SUBFAMILIA_ADO.php';
include_once '../controlador/TUMEDIDA_ADO.php';
include_once '../controlador/ESPECIES_ADO.php';


include_once '../modelo/PRODUCTO.php';

//INCIALIZAR LAS VARIBLES
//INICIALIZAR CONTROLADOR
$FAMILIA_ADO =  new FAMILIA_ADO();
$SUBFAMILIA_ADO =  new SUBFAMILIA_ADO();
$TUMEDIDA_ADO =  new TUMEDIDA_ADO();
$ESPECIES_ADO =  new ESPECIES_ADO();

$PRODUCTO_ADO =  new PRODUCTO_ADO();

//INIICIALIZAR MODELO
$PRODUCTOS =  new PRODUCTO();


//INCIALIZAR VARIBALES A OCUPAR PARA LA FUNCIONALIDAD
$CODIGOPRODUCTO = "";
$NOMBREPRODUCTO = "";
$DESCRIPCIONPRODUCTO = "";
$MODELO = "";
$OPTIMO = "";
$BAJO = "";
$CRITICO = "";
$NUMERO = "";
$NUMEROVER = "";

$FAMILIA = "";
$SUBFAMILIA = "";
$TUMEDIDA = "";
$EMPRESA = "";
$ESPECIES = "";
$AUXILIARCODIGOPRODUCTO1 = "";
$AUXILIARCODIGOPRODUCTO2 = 0;


$FOCUS = "";
$BORDER = "";
$DISABLED = "";
$OP = "";

//INICIALIZAR ARREGLOS
$ARRAYPRODUCTOID = "";
$ARRAYPRODUCTO = "";
$ARRAYEMPRESA = "";
$ARRAYTEMPORADA = "";
$ARRAYFAMILIA = "";
$ARRAYSUBFAMILIA = "";
$ARRAYTUMEDIDA = "";
$ARRAYESPECIES = "";
$ARRAYNUMERO = "";


//DEFINIR ARREGLOS CON LOS DATOS OBTENIDOS DE LAS FUNCIONES DE LOS CONTROLADORES
$ARRAYPRODUCTO = $PRODUCTO_ADO->listarProductoPorEmpresaPorTemporadaCBX($EMPRESAS, $TEMPORADAS);
$ARRAYFAMILIA = $FAMILIA_ADO->listarFamiliaPorEmpresaCBX($EMPRESAS);
$ARRAYTUMEDIDA = $TUMEDIDA_ADO->listarTumedidaPorEmpresaCBX($EMPRESAS);
$ARRAYEMPRESA = $EMPRESA_ADO->listarEmpresaCBX();
$ARRAYTEMPORADA = $TEMPORADA_ADO->listarTemporadaCBX();
$ARRAYESPECIES = $ESPECIES_ADO->listarEspeciesCBX();
include_once "../config/validarDatosUrl.php";
include_once "../config/datosUrl.php";
include_once "../config/reporteUrl.php";


//OPERACIONES
//OPERACION DE REGISTRO DE FILA
if (isset($_REQUEST['GUARDAR'])) {
    $ARRAYNUMERO = $PRODUCTO_ADO->obtenerNumero();
    $NUMERO = $ARRAYNUMERO[0]['NUMERO'] + 1;

    $AUXILIARCODIGOPRODUCTO1 = "F" . $_REQUEST['FAMILIA'] . "S" . $_REQUEST['SUBFAMILIA'] . "C";
    $AUXILIARCODIGOPRODUCTO12 = (1000) + $NUMERO;
    $CODIGOPRODUCTO = $AUXILIARCODIGOPRODUCTO1 . $AUXILIARCODIGOPRODUCTO12;


    //UTILIZACION METODOS SET DEL MODELO
    //SETEO DE ATRIBUTOS DE LA CLASE, OBTENIDO EN EL FORMULARIO   
    $PRODUCTOS->__SET('CODIGO_PRODUCTO', $CODIGOPRODUCTO);
    $PRODUCTOS->__SET('NUMERO_PRODUCTO', $NUMERO);
    $PRODUCTOS->__SET('NOMBRE_PRODUCTO', $_REQUEST['NOMBREPRODUCTO']);
    $PRODUCTOS->__SET('OPTIMO', $_REQUEST['OPTIMO']);
    $PRODUCTOS->__SET('BAJO', $_REQUEST['BAJO']);
    $PRODUCTOS->__SET('CRITICO', $_REQUEST['CRITICO']);
    $PRODUCTOS->__SET('ID_EMPRESA', $_REQUEST['EMPRESA']);
    $PRODUCTOS->__SET('ID_TEMPORADA', $_REQUEST['TEMPORADA']);
    $PRODUCTOS->__SET('ID_TUMEDIDA', $_REQUEST['TUMEDIDA']);
    $PRODUCTOS->__SET('ID_FAMILIA', $_REQUEST['FAMILIA']);
    $PRODUCTOS->__SET('ID_SUBFAMILIA', $_REQUEST['SUBFAMILIA']);
    $PRODUCTOS->__SET('ID_ESPECIES', $_REQUEST['ESPECIES']);
    $PRODUCTOS->__SET('ID_USUARIOI', $IDUSUARIOS);
    $PRODUCTOS->__SET('ID_USUARIOM', $IDUSUARIOS);
    //LLAMADA AL METODO DE REGISTRO DEL CONTROLADOR
    $PRODUCTO_ADO->agregarProducto($PRODUCTOS);
    //REDIRECCIONAR A PAGINA registroEcomercial.php
    echo "<script type='text/javascript'> location.href ='registroProducto.php';</script>";
}
//OPERACION DE EDICION DE FILA
if (isset($_REQUEST['EDITAR'])) {
    //UTILIZACION METODOS SET DEL MODELO
    //SETEO DE ATRIBUTOS DE LA CLASE, OBTENIDO EN EL FORMULARIO 

    $AUXILIARCODIGOPRODUCTO1 = "F" . $_REQUEST['FAMILIA'] . "S" . $_REQUEST['SUBFAMILIA'] . "C";
    $AUXILIARCODIGOPRODUCTO12 = (1000) + $_REQUEST['NUMERO'];
    $CODIGOPRODUCTO = $AUXILIARCODIGOPRODUCTO1 . $AUXILIARCODIGOPRODUCTO12;


    $PRODUCTOS->__SET('CODIGO_PRODUCTO', $CODIGOPRODUCTO);
    $PRODUCTOS->__SET('NOMBRE_PRODUCTO', $_REQUEST['NOMBREPRODUCTO']);
    $PRODUCTOS->__SET('OPTIMO', $_REQUEST['OPTIMO']);
    $PRODUCTOS->__SET('BAJO', $_REQUEST['BAJO']);
    $PRODUCTOS->__SET('CRITICO', $_REQUEST['CRITICO']);
    $PRODUCTOS->__SET('ID_EMPRESA', $_REQUEST['EMPRESA']);
    $PRODUCTOS->__SET('ID_TEMPORADA', $_REQUEST['TEMPORADA']);
    $PRODUCTOS->__SET('ID_TUMEDIDA', $_REQUEST['TUMEDIDA']);
    $PRODUCTOS->__SET('ID_FAMILIA', $_REQUEST['FAMILIA']);
    $PRODUCTOS->__SET('ID_SUBFAMILIA', $_REQUEST['SUBFAMILIA']);
    $PRODUCTOS->__SET('ID_ESPECIES', $_REQUEST['ESPECIES']);
    $PRODUCTOS->__SET('ID_USUARIOM', $IDUSUARIOS);
    $PRODUCTOS->__SET('ID_PRODUCTO', $_REQUEST['ID']);
    //LLAMADA AL METODO DE EDICION DEL CONTROLADOR   
    $PRODUCTO_ADO->actualizarProducto($PRODUCTOS);
    //REDIRECCIONAR A PAGINA registroEcomercial.php
    echo "<script type='text/javascript'> location.href ='registroProducto.php';</script>";
}


//OBTENCION DE DATOS ENVIADOR A LA URL
//PARA OPERACIONES DE EDICION Y VISUALIZACION
//PREGUNTA SI LA URL VIENE  CON DATOS "parametro" y "parametro1"
if (isset($_SESSION['parametro']) && isset($_SESSION['parametro1'])) {
    //ALMACENAR DATOS DE VARIABLES DE LA URL
    $IDOP = $_SESSION['parametro'];
    $OP = $_SESSION['parametro1'];


    //IDENTIFICACIONES DE OPERACIONES
    //OPERACION DE CAMBIO DE ESTADO
    //0 = DESACTIVAR
    if ($OP == "0") {

        $PRODUCTOS->__SET('ID_PRODUCTO', $IDOP);
        $PRODUCTO_ADO->deshabilitar($PRODUCTOS);

        echo "<script type='text/javascript'> location.href ='registroProducto.php';</script>";
    }
    //1 = ACTIVAR
    if ($OP == "1") {

        $PRODUCTOS->__SET('ID_PRODUCTO', $IDOP);
        $PRODUCTO_ADO->habilitar($PRODUCTOS);

        echo "<script type='text/javascript'> location.href ='registroProducto.php';</script>";
    }

    //editar =  OBTENCION DE DATOS PARA LA EDICION DE REGISTRO
    if ($OP == "editar") {
        //OBTENCION DE INFORMACIOND DE LA FILA DEL REGISTRO
        //ALMACENAR INFORMACION EN ARREGLO
        //LLAMADA A LA FUNCION DE CONTROLADOR verPlanta(ID), 
        //SE LE PASE UNO DE LOS DATOS OBTENIDO PREVIAMENTE A TRAVEZ DE LA URL
        $ARRAYPRODUCTOID = $PRODUCTO_ADO->verProducto($IDOP);
        //OBTENCIONS DE LOS DATODS DE LA COLUMNAS DE LA FILA OBTENIDA
        //PASAR DATOS OBTENIDOS A VARIABLES QUE SE VISUALIZAR EN EL FORMULARIO DE LA VISTA        
        foreach ($ARRAYPRODUCTOID as $r) :
            $CODIGOPRODUCTO = "" . $r['CODIGO_PRODUCTO'];
            $NUMEROVER = "" . $r['NUMERO_PRODUCTO'];
            $NOMBREPRODUCTO = "" . $r['NOMBRE_PRODUCTO'];
            $OPTIMO = "" . $r['OPTIMO'];
            $BAJO = "" . $r['BAJO'];
            $CRITICO = "" . $r['CRITICO'];
            $EMPRESA = "" . $r['ID_EMPRESA'];
            $FAMILIA = "" . $r['ID_FAMILIA'];
            $ARRAYSUBFAMILIA = $SUBFAMILIA_ADO->listarSubfamiliaPorEmpresaFamiliaCBX($EMPRESAS, $FAMILIA);
            $SUBFAMILIA = "" . $r['ID_SUBFAMILIA'];
            $TUMEDIDA = "" . $r['ID_TUMEDIDA'];
            $ESPECIES = "" . $r['ID_ESPECIES'];
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
        $ARRAYPRODUCTOID = $PRODUCTO_ADO->verProducto($IDOP);
        //OBTENCIONS DE LOS DATODS DE LA COLUMNAS DE LA FILA OBTENIDA
        //PASAR DATOS OBTENIDOS A VARIABLES QUE SE VISUALIZAR EN EL FORMULARIO DE LA VISTA
        foreach ($ARRAYPRODUCTOID as $r) :
            $CODIGOPRODUCTO = "" . $r['CODIGO_PRODUCTO'];
            $NUMEROVER = "" . $r['NUMERO_PRODUCTO'];
            $NOMBREPRODUCTO = "" . $r['NOMBRE_PRODUCTO'];
            $OPTIMO = "" . $r['OPTIMO'];
            $BAJO = "" . $r['BAJO'];
            $CRITICO = "" . $r['CRITICO'];
            $EMPRESA = "" . $r['ID_EMPRESA'];
            $FAMILIA = "" . $r['ID_FAMILIA'];
            $ARRAYSUBFAMILIA = $SUBFAMILIA_ADO->listarSubfamiliaPorEmpresaFamiliaCBX($EMPRESAS, $FAMILIA);
            $SUBFAMILIA = "" . $r['ID_SUBFAMILIA'];
            $TUMEDIDA = "" . $r['ID_TUMEDIDA'];
            $ESPECIES = "" . $r['ID_ESPECIES'];
        endforeach;
    }
}

if (isset($_POST)) {
    if (isset($_REQUEST['CODIGOPRODUCTO'])) {
        $CODIGOPRODUCTO = $_REQUEST['CODIGOPRODUCTO'];
    }
    if (isset($_REQUEST['NOMBREPRODUCTO'])) {
        $NOMBREPRODUCTO = $_REQUEST['NOMBREPRODUCTO'];
    }
    if (isset($_REQUEST['OPTIMO'])) {
        $OPTIMO = $_REQUEST['OPTIMO'];
    }
    if (isset($_REQUEST['BAJO'])) {
        $BAJO = $_REQUEST['BAJO'];
    }
    if (isset($_REQUEST['CRITICO'])) {
        $CRITICO = $_REQUEST['CRITICO'];
    }
    if (isset($_REQUEST['EMPRESA'])) {
        $EMPRESA = $_REQUEST['EMPRESA'];
    }
    if (isset($_REQUEST['FAMILIA'])) {
        $FAMILIA = $_REQUEST['FAMILIA'];
        $ARRAYSUBFAMILIA = $SUBFAMILIA_ADO->listarSubfamiliaPorEmpresaFamiliaCBX($EMPRESAS, $FAMILIA);
    }
    if (isset($_REQUEST['SUBFAMILIA'])) {
        $SUBFAMILIA = $_REQUEST['SUBFAMILIA'];
    }
    if (isset($_REQUEST['TUMEDIDA'])) {
        $TUMEDIDA = $_REQUEST['TUMEDIDA'];
    }
    if (isset($_REQUEST['ESPECIES'])) {
        $ESPECIES = $_REQUEST['ESPECIES'];
    }
}

?>


<!DOCTYPE html>
<html lang="es">

<head>
    <title>Registro Tipo Producto</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="description" content="">
    <meta name="author" content="">
    <!- LLAMADA DE LOS ARCHIVOS NECESARIOS PARA DISEÑO Y FUNCIONES BASE DE LA VISTA -!>
        <?php include_once "../config/urlHead.php"; ?>
        <!- FUNCIONES BASES -!>
            <script type="text/javascript">
                //VALIDACION DE FORMULARIO
                function validacion() {

                    NOMBREPRODUCTO = document.getElementById("NOMBREPRODUCTO").value;
                    ESPECIES = document.getElementById("ESPECIES").selectedIndex;
                    TUMEDIDA = document.getElementById("TUMEDIDA").selectedIndex;
                    FAMILIA = document.getElementById("FAMILIA").selectedIndex;
                    SUBFAMILIA = document.getElementById("SUBFAMILIA").selectedIndex;
                    OPTIMO = document.getElementById("OPTIMO").value;
                    BAJO = document.getElementById("BAJO").value;
                    CRITICO = document.getElementById("CRITICO").value;

                    document.getElementById('val_nombre').innerHTML = "";
                    document.getElementById('val_especies').innerHTML = "";
                    document.getElementById('val_tumedida').innerHTML = "";
                    document.getElementById('val_familia').innerHTML = "";
                    document.getElementById('val_subfamilia').innerHTML = "";
                    document.getElementById('val_optimo').innerHTML = "";
                    document.getElementById('val_bajo').innerHTML = "";
                    document.getElementById('val_critico').innerHTML = "";

                    if (NOMBREPRODUCTO == null || NOMBREPRODUCTO.length == 0 || /^\s+$/.test(NOMBREPRODUCTO)) {
                        document.form_reg_dato.NOMBREPRODUCTO.focus();
                        document.form_reg_dato.NOMBREPRODUCTO.style.borderColor = "#FF0000";
                        document.getElementById('val_nombre').innerHTML = "NO A INGRESADO DATO";
                        return false;
                    }
                    document.form_reg_dato.NOMBREPRODUCTO.style.borderColor = "#4AF575";

                    if (ESPECIES == null || ESPECIES == 0) {
                        document.form_reg_dato.ESPECIES.focus();
                        document.form_reg_dato.ESPECIES.style.borderColor = "#FF0000";
                        document.getElementById('val_especies').innerHTML = "NO HA SELECCIONADO  NINGUNA ALTERNATIVA";
                        return false;
                    }
                    document.form_reg_dato.ESPECIES.style.borderColor = "#4AF575";



                    if (TUMEDIDA == null || TUMEDIDA == 0) {
                        document.form_reg_dato.TUMEDIDA.focus();
                        document.form_reg_dato.TUMEDIDA.style.borderColor = "#FF0000";
                        document.getElementById('val_tumedida').innerHTML = "NO HA SELECCIONADO  NINGUNA ALTERNATIVA";
                        return false;
                    }
                    document.form_reg_dato.TUMEDIDA.style.borderColor = "#4AF575";

                    if (FAMILIA == null || FAMILIA == 0) {
                        document.form_reg_dato.FAMILIA.focus();
                        document.form_reg_dato.FAMILIA.style.borderColor = "#FF0000";
                        document.getElementById('val_familia').innerHTML = "NO HA SELECCIONADO  NINGUNA ALTERNATIVA";
                        return false;
                    }
                    document.form_reg_dato.FAMILIA.style.borderColor = "#4AF575";

                    if (SUBFAMILIA == null || SUBFAMILIA == 0) {
                        document.form_reg_dato.SUBFAMILIA.focus();
                        document.form_reg_dato.SUBFAMILIA.style.borderColor = "#FF0000";
                        document.getElementById('val_subfamilia').innerHTML = "NO HA SELECCIONADO  NINGUNA ALTERNATIVA";
                        return false;
                    }
                    document.form_reg_dato.SUBFAMILIA.style.borderColor = "#4AF575";

                    if (OPTIMO == null || OPTIMO.length == 0 || /^\s+$/.test(OPTIMO)) {
                        document.form_reg_dato.OPTIMO.focus();
                        document.form_reg_dato.OPTIMO.style.borderColor = "#FF0000";
                        document.getElementById('val_optimo').innerHTML = "NO A INGRESADO DATO";
                        return false;
                    }
                    document.form_reg_dato.OPTIMO.style.borderColor = "#4AF575";

                    if (BAJO == null || BAJO.length == 0 || /^\s+$/.test(BAJO)) {
                        document.form_reg_dato.BAJO.focus();
                        document.form_reg_dato.BAJO.style.borderColor = "#FF0000";
                        document.getElementById('val_bajo').innerHTML = "NO A INGRESADO DATO";
                        return false;
                    }
                    document.form_reg_dato.BAJO.style.borderColor = "#4AF575";

                    if (CRITICO == null || CRITICO.length == 0 || /^\s+$/.test(CRITICO)) {
                        document.form_reg_dato.CRITICO.focus();
                        document.form_reg_dato.CRITICO.style.borderColor = "#FF0000";
                        document.getElementById('val_critico').innerHTML = "NO A INGRESADO DATO";
                        return false;
                    }
                    document.form_reg_dato.CRITICO.style.borderColor = "#4AF575";

                }




                //REDIRECCIONAR A LA PAGINA SELECIONADA
                function irPagina(url) {
                    location.href = "" + url;
                }
                //FUNCION PARA OBTENER HORA Y FECHA
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
                                <h3 class="page-title">Tipo Producto</h3>
                                <div class="d-inline-block align-items-center">
                                    <nav>
                                        <ol class="breadcrumb">
                                            <li class="breadcrumb-item"><a href="index.php"><i class="mdi mdi-home-outline"></i></a></li>
                                            <li class="breadcrumb-item" aria-current="page">Mantenedores</li>
                                            <li class="breadcrumb-item" aria-current="page">Producto </li>
                                            <li class="breadcrumb-item active" aria-current="page"> <a href="registroProducto.php"> Operaciónes Tipo Producto </a>
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
                        <div class="row">
                            <div class="col-lg-6 col-12">
                                <div class="box">
                                    <div class="box-header with-border">
                                        <!--  
                                    <h4 class="box-title">Sample form 1</h4>
                                -->
                                    </div>
                                    <!-- /.box-header -->
                                    <form class="form" role="form" method="post" name="form_reg_dato" onsubmit="return validacion()">
                                        <div class="box-body">
                                            <h4 class="box-title text-info"><i class="ti-user mr-15"></i> Registro
                                            </h4>
                                            <hr class="my-15">
                                            <div class="row">
                                                <div class="col-md-6 col-12">
                                                    <div class="form-group">
                                                        <label>Codigo </label>
                                                        <input type="hidden" class="form-control" placeholder="ID" id="ID" name="ID" value="<?php echo $IDOP; ?>" />
                                                        <input type="hidden" class="form-control" placeholder="NUMERO" id="NUMERO" name="NUMERO" value="<?php echo $NUMEROVER; ?>" />
                                                        <input type="hidden" class="form-control" placeholder="EMPRESA" id="EMPRESA" name="EMPRESA" value="<?php echo $EMPRESAS; ?>" />
                                                        <input type="hidden" class="form-control" placeholder="TEMPORADA" id="TEMPORADA" name="TEMPORADA" value="<?php echo $TEMPORADAS; ?>" />
                                                        <input type="text" class="form-control" placeholder=" Codigo  Producto" id="CODIGOPRODUCTO" name="CODIGOPRODUCTO" value="<?php echo $CODIGOPRODUCTO; ?>" disabled />
                                                        <label id="val_codigo" class="validacion"> </label>
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-12">
                                                    <div class="form-group">
                                                        <label>Nombre </label>
                                                        <input type="text" class="form-control" placeholder=" Nombre  Producto" id="NOMBREPRODUCTO" name="NOMBREPRODUCTO" value="<?php echo $NOMBREPRODUCTO; ?>" <?php echo $DISABLED; ?> />
                                                        <label id="val_nombre" class="validacion"> </label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6 col-12">
                                                    <div class="form-group">
                                                        <label>Especies</label>
                                                        <select class="form-control select2" id="ESPECIES" name="ESPECIES" style="width: 100%;" value="<?php echo $ESPECIES; ?>" <?php echo $DISABLED; ?>>
                                                            <option></option>
                                                            <?php foreach ($ARRAYESPECIES  as $r) : ?>
                                                                <?php if ($ARRAYESPECIES) {    ?>
                                                                    <option value="<?php echo $r['ID_ESPECIES']; ?>" <?php if ($ESPECIES == $r['ID_ESPECIES']) {
                                                                                                                            echo "selected";
                                                                                                                        } ?>>
                                                                        <?php echo $r['NOMBRE_ESPECIES'] ?>
                                                                    </option>
                                                                <?php } else { ?>
                                                                    <option>No Hay Datos Registados </option>
                                                                <?php } ?>
                                                            <?php endforeach; ?>
                                                        </select>
                                                        <label id="val_especies" class="validacion"> </label>
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-12">
                                                    <div class="form-group">
                                                        <label> Unidad Medida</label>
                                                        <select class="form-control select2" id="TUMEDIDA" name="TUMEDIDA" style="width: 100%;" value="<?php echo $TUMEDIDA; ?>" <?php echo $DISABLED; ?>>
                                                            <option></option>
                                                            <?php foreach ($ARRAYTUMEDIDA as $r) : ?>
                                                                <?php if ($ARRAYTUMEDIDA) {    ?>
                                                                    <option value="<?php echo $r['ID_TUMEDIDA']; ?>" <?php if ($TUMEDIDA == $r['ID_TUMEDIDA']) {
                                                                                                                            echo "selected";
                                                                                                                        } ?>>
                                                                        <?php echo $r['NOMBRE_TUMEDIDA'] ?>
                                                                    </option>
                                                                <?php } else { ?>
                                                                    <option>No Hay Datos Registados </option>
                                                                <?php } ?>
                                                            <?php endforeach; ?>
                                                        </select>
                                                        <label id="val_tumedida" class="validacion"> </label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6 col-12">
                                                    <div class="form-group">
                                                        <label>Familia</label>
                                                        <select class="form-control select2" id="FAMILIA" name="FAMILIA" style="width: 100%;" onchange="this.form.submit()" value="<?php echo $FAMILIA; ?>" <?php echo $DISABLED; ?>>
                                                            <option></option>
                                                            <?php foreach ($ARRAYFAMILIA as $r) : ?>
                                                                <?php if ($ARRAYFAMILIA) {    ?>
                                                                    <option value="<?php echo $r['ID_FAMILIA']; ?>" <?php if ($FAMILIA == $r['ID_FAMILIA']) {
                                                                                                                        echo "selected";
                                                                                                                    } ?>>
                                                                        <?php echo $r['NOMBRE_FAMILIA'] ?>
                                                                    </option>
                                                                <?php } else { ?>
                                                                    <option>No Hay Datos Registados </option>
                                                                <?php } ?>
                                                            <?php endforeach; ?>
                                                        </select>
                                                        <label id="val_familia" class="validacion"> </label>
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-12">
                                                    <div class="form-group">
                                                        <label>Sub Familia</label>
                                                        <select class="form-control select2" id="SUBFAMILIA" name="SUBFAMILIA" style="width: 100%;" value="<?php echo $SUBFAMILIA; ?>" <?php echo $DISABLED; ?>>
                                                            <option></option>
                                                            <?php foreach ($ARRAYSUBFAMILIA  as $r) : ?>
                                                                <?php if ($ARRAYSUBFAMILIA) {    ?>
                                                                    <option value="<?php echo $r['ID_SUBFAMILIA']; ?>" <?php if ($SUBFAMILIA == $r['ID_SUBFAMILIA']) {
                                                                                                                            echo "selected";
                                                                                                                        } ?>>
                                                                        <?php echo $r['NOMBRE_SUBFAMILIA'] ?>
                                                                    </option>
                                                                <?php } else { ?>
                                                                    <option>No Hay Datos Registados </option>
                                                                <?php } ?>
                                                            <?php endforeach; ?>
                                                        </select>
                                                        <label id="val_subfamilia" class="validacion"> </label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-4 col-12">
                                                    <div class="form-group">
                                                        <label>Optimo </label>
                                                        <input type="number" class="form-control" placeholder=" Optimo  Producto" id="OPTIMO" name="OPTIMO" value="<?php echo $OPTIMO; ?>" <?php echo $DISABLED; ?> />
                                                        <label id="val_optimo" class="validacion"> </label>
                                                    </div>
                                                </div>
                                                <div class="col-md-4 col-12">
                                                    <div class="form-group">
                                                        <label>Bajo </label>
                                                        <input type="number" class="form-control" placeholder=" Bajo  Producto" id="BAJO" name="BAJO" value="<?php echo $BAJO; ?>" <?php echo $DISABLED; ?> />
                                                        <label id="val_bajo" class="validacion"> </label>
                                                    </div>
                                                </div>
                                                <div class="col-md-4 col-12">
                                                    <div class="form-group">
                                                        <label>Crítico </label>
                                                        <input type="number" class="form-control" placeholder=" Crítico  Producto" id="CRITICO" name="CRITICO" value="<?php echo $CRITICO; ?>" <?php echo $DISABLED; ?> />
                                                        <label id="val_critico" class="validacion"> </label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- /.box-body -->
                                        <div class="box-footer">
                                            <button type="button" class="btn btn-rounded btn-warning btn-outline mr-1" name="CANCELAR" value="CANCELAR" Onclick="irPagina('registroProducto.php'); ">
                                                <i class="ti-trash"></i> Cancelar
                                            </button>
                                            <?php if ($OP != "editar") { ?>
                                                <button type="submit" class="btn btn-rounded btn-primary btn-outline" name="GUARDAR" value="GUARDAR" <?php echo $DISABLED; ?>>
                                                    <i class="ti-save-alt"></i> Crear
                                                </button>
                                            <?php } else { ?>
                                                <button type="submit" class="btn btn-rounded btn-primary btn-outline" name="EDITAR" value="EDITAR">
                                                    <i class="ti-save-alt"></i> Guardar
                                                </button>
                                            <?php } ?>
                                        </div>
                                    </form>
                                </div>
                                <!-- /.box -->
                            </div>
                            <div class="col-lg-6 col-12">
                                <div class="box">
                                    <div class="box-header with-border">
                                        <h4 class="box-title">Registros</h4>
                                    </div>
                                    <div class="box-body">
                                        <div class="row">
                                            <div class="col-md-10 col-10">
                                            </div>
                                            <div class="col-md-2 col-2">
                                                <form method="post" id="form2">
                                                    <div class="row">
                                                        <div class="col-md-1 col-1">
                                                            <div class="form-group">
                                                                <label>Exportar</label>
                                                                <br>
                                                                <input type="hidden" class="form-control" placeholder="URLEXCEL" id="URLEXCEL" name="URLEXCEL" value="reporteProducto" />
                                                                <button type="submit" class="btn btn-rounded btn-success btn-outline" id="EXPORTAR" name="EXPORTAR" title="Exportar Excel">
                                                                    <i class="fa fa-file-excel-o"></i>
                                                                </button>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-11 col-11">
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12 col-12">
                                                <div class="table-responsive">
                                                    <table id="listar" class="table table-hover " style="width: 100%;">
                                                        <thead>
                                                            <tr class="center">
                                                                <th>Número</th>
                                                                <th>Código</th>
                                                                <th>Nombre</th>
                                                                <th class="text-center">Operaciónes</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <?php foreach ($ARRAYPRODUCTO as $r) : ?>
                                                                <tr class="center">
                                                                    <td>
                                                                        <a href="#" class="text-warning hover-warning">
                                                                            <?php echo $r['NUMERO_PRODUCTO']; ?>
                                                                        </a>
                                                                    </td>
                                                                    <td> <?php echo $r['CODIGO_PRODUCTO']; ?></td>
                                                                    <td> <?php echo $r['NOMBRE_PRODUCTO']; ?></td>
                                                                    <td class="text-center">
                                                                        <form method="post" id="form1">
                                                                            <div class="list-icons d-inline-flex">
                                                                                <div class="list-icons-item dropdown">
                                                                                    <a href="#" class="list-icons-item dropdown-toggle" data-toggle="dropdown">
                                                                                        <i class="glyphicon glyphicon-cog"></i>
                                                                                    </a>
                                                                                    <div class="dropdown-menu dropdown-menu-right">
                                                                                        <input type="hidden" class="form-control" placeholder="ID" id="ID" name="ID" value="<?php echo $r['ID_PRODUCTO']; ?>" />
                                                                                        <input type="hidden" class="form-control" placeholder="URL" id="URL" name="URL" value="registroProducto" />
                                                                                        <button type="submit" class="btn btn-rounded btn-outline-info btn-sm " id="VERURL" name="VERURL">
                                                                                            <i class="ti-eye"></i>
                                                                                        </button>Ver
                                                                                        <br>
                                                                                        <button type="submit" class="btn btn-rounded btn-outline-warning btn-sm" id="EDITARURL" name="EDITARURL">
                                                                                            <i class="ti-pencil-alt"></i>
                                                                                        </button>Editar
                                                                                        <br>
                                                                                        <?php if ($r['ESTADO_REGISTRO'] == 1) { ?>
                                                                                            <button type="submit" class="btn btn-rounded btn-outline-danger btn-sm" id="ELIMINARURL" name="ELIMINARURL">
                                                                                                <i class="ti-na "></i>
                                                                                            </button>Desahabilitar
                                                                                            <br>
                                                                                        <?php } ?>
                                                                                        <?php if ($r['ESTADO_REGISTRO'] == 0) { ?>
                                                                                            <button type="submit" class="btn btn-rounded btn-outline-success btn-sm" id="HABILITARURL" name="HABILITARURL">
                                                                                                <i class="ti-check "></i>
                                                                                            </button>Habilitar
                                                                                            <br>
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


            <!- LLAMADA ARCHIVO DEL DISEÑO DEL FOOTER Y MENU USUARIO -!>
                <?php include_once "../config/footer.php"; ?>
                <?php include_once "../config/menuExtra.php"; ?>
    </div>
    <!- LLAMADA URL DE ARCHIVOS DE DISEÑO Y JQUERY E OTROS -!>
        <?php include_once "../config/urlBase.php"; ?>
</body>

</html>