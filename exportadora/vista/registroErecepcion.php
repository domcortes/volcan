<?php

include_once "../config/validarUsuario.php";

//LLAMADA ARCHIVOS NECESARIOS PARA LAS OPERACIONES

include_once '../controlador/ESPECIES_ADO.php';
include_once '../controlador/PRODUCTO_ADO.php';


include_once '../controlador/ERECEPCION_ADO.php';
include_once '../modelo/ERECEPCION.php';


//INCIALIZAR LAS VARIBLES
//INICIALIZAR CONTROLADOR

$ESPECIES_ADO =  new ESPECIES_ADO();
$PRODUCTO_ADO =  new PRODUCTO_ADO();

$ERECEPCION_ADO =  new ERECEPCION_ADO();
//INIICIALIZAR MODELO
$ERECEPCION =  new ERECEPCION();

//INCIALIZAR VARIBALES A OCUPAR PARA LA FUNCIONALIDAD

$NOMBREESTANDAR = "";
$CODIGOESTANDAR = "";
$ENVASEESTANDAR = "";
$PESOENVASEESTANDAR = "";
$PESOPALLETESTANDAR = "";
$ESPECIES = "";
$ESTADO = "";
$PRODUCTO="";
$TRATAMIENTO1="";
$TRATAMIENTO2="";
$IDOP = "";
$OP = "";
$DISABLED = "";

//INICIALIZAR ARREGLOS
$ARRAYESTANDAR = "";
$ARRAYESTANDARID = "";
$ARRAYPRODUCTO="";
$ARRAYESPECIES = "";


//DEFINIR ARREGLOS CON LOS DATOS OBTENIDOS DE LAS FUNCIONES DE LOS CONTROLADORES
$ARRAYESTANDAR = $ERECEPCION_ADO->listarEstandarPorEmpresaCBX($EMPRESAS);
$ARRAYPRODUCTO= $PRODUCTO_ADO->listarProductoPorEmpresaCBX($EMPRESAS);
$ARRAYESPECIES = $ESPECIES_ADO->listarEspeciesCBX();
include_once "../config/validarDatosUrl.php";
include_once "../config/datosUrl.php";



//OPERACIONES
//OPERACION DE REGISTRO DE FILA
if (isset($_REQUEST['GUARDAR'])) {

    //UTILIZACION METODOS SET DEL MODELO
    //SETEO DE ATRIBUTOS DE LA CLASE, OBTENIDO EN EL FORMULARIO     

    $ERECEPCION->__SET('CODIGO_ESTANDAR', $_REQUEST['CODIGOESTANDAR']);
    $ERECEPCION->__SET('NOMBRE_ESTANDAR', $_REQUEST['NOMBREESTANDAR']);
    $ERECEPCION->__SET('CANTIDAD_ENVASE_ESTANDAR', $_REQUEST['ENVASEESTANDAR']);
    $ERECEPCION->__SET('PESO_ENVASE_ESTANDAR', $_REQUEST['PESOENVASEESTANDAR']);
    $ERECEPCION->__SET('PESO_PALLET_ESTANDAR', $_REQUEST['PESOPALLETESTANDAR']);
    $ERECEPCION->__SET('TRATAMIENTO1',$_REQUEST['TRATAMIENTO1']);
    $ERECEPCION->__SET('TRATAMIENTO2',$_REQUEST['TRATAMIENTO2']);
    $ERECEPCION->__SET('ID_ESPECIES', $_REQUEST['ESPECIES']);
    $ERECEPCION->__SET('ID_EMPRESA', $_REQUEST['EMPRESA']);
    $ERECEPCION->__SET('ID_PRODUCTO', $_REQUEST['PRODUCTO']);
    $ERECEPCION->__SET('ID_USUARIOI', $IDUSUARIOS);
    $ERECEPCION->__SET('ID_USUARIOM', $IDUSUARIOS);
    //LLAMADA AL METODO DE REGISTRO DEL CONTROLADOR
    $ERECEPCION_ADO->agregarEstandar($ERECEPCION);
    //REDIRECCIONAR A PAGINA registroErecepcion.php
    echo "<script type='text/javascript'> location.href ='registroErecepcion.php';</script>";
}

//OPERACION DE EDICION DE FILA
if (isset($_REQUEST['EDITAR'])) {

    //UTILIZACION METODOS SET DEL MODELO
    //SETEO DE ATRIBUTOS DE LA CLASE, OBTENIDO EN EL FORMULARIO   

    $ERECEPCION->__SET('CODIGO_ESTANDAR', $_REQUEST['CODIGOESTANDAR']);
    $ERECEPCION->__SET('NOMBRE_ESTANDAR', $_REQUEST['NOMBREESTANDAR']);
    $ERECEPCION->__SET('CANTIDAD_ENVASE_ESTANDAR', $_REQUEST['ENVASEESTANDAR']);
    $ERECEPCION->__SET('PESO_ENVASE_ESTANDAR', $_REQUEST['PESOENVASEESTANDAR']);
    $ERECEPCION->__SET('PESO_PALLET_ESTANDAR', $_REQUEST['PESOPALLETESTANDAR']);
    $ERECEPCION->__SET('TRATAMIENTO1',$_REQUEST['TRATAMIENTO1']);
    $ERECEPCION->__SET('TRATAMIENTO2',$_REQUEST['TRATAMIENTO2']);
    $ERECEPCION->__SET('ID_ESPECIES', $_REQUEST['ESPECIES']);
    $ERECEPCION->__SET('ID_PRODUCTO', $_REQUEST['PRODUCTO']);
    $ERECEPCION->__SET('ID_USUARIOM', $IDUSUARIOS);
    $ERECEPCION->__SET('ID_ESTANDAR', $_REQUEST['ID']);
    //LLAMADA AL METODO DE EDICION DEL CONTROLADOR
    $ERECEPCION_ADO->actualizarEstandar($ERECEPCION);
    //REDIRECCIONAR A PAGINA registroErecepcion.php
    echo "<script type='text/javascript'> location.href ='registroErecepcion.php';</script>";
}

//OBTENCION DE DATOS ENVIADOR A LA URL
//PARA OPERACIONES DE EDICION Y VISUALIZACION
//PREGUNTA SI LA URL VIENE  CON DATOS "parametro" y "parametro1"
if (isset($_SESSION['parametro']) && isset($_SESSION['parametro1'])) {
    //ALMACENAR DATOS DE VARIABLES DE LA URL
    $IDOP = $_SESSION['parametro'];
    $OP = $_SESSION['parametro1'];


    //OBTENCION DE INFORMACIOND DE LA FILA DEL REGISTRO
    //ALMACENAR INFORMACION EN ARREGLO
    //LLAMADA A LA FUNCION DE CONTROLADOR verPlanta(ID), 
    //SE LE PASE UNO DE LOS DATOS OBTENIDO PREVIAMENTE A TRAVEZ DE LA URL
    $ARRAYESTANDARID = $ERECEPCION_ADO->verEstandar($IDOP);


    //IDENTIFICACIONES DE OPERACIONES    //OPERACION DE CAMBIO DE ESTADO
    //0 = DESACTIVAR
    if ($OP == "0") {

        $ERECEPCION->__SET('ID_ESTANDAR', $IDOP);
        $ERECEPCION_ADO->deshabilitar($ERECEPCION);

        echo "<script type='text/javascript'> location.href ='registroErecepcion.php';</script>";
    }
    //1 = ACTIVAR
    if ($OP == "1") {

        $ERECEPCION->__SET('ID_ESTANDAR', $IDOP);
        $ERECEPCION_ADO->habilitar($ERECEPCION);
        echo "<script type='text/javascript'> location.href ='registroErecepcion.php';</script>";
    }
    //editar =  OBTENCION DE DATOS PARA LA EDICION DE REGISTRO
    if ($OP == "editar") {
        //OBTENCIONS DE LOS DATODS DE LA COLUMNAS DE LA FILA OBTENIDA
        //PASAR DATOS OBTENIDOS A VARIABLES QUE SE VISUALIZAR EN EL FORMULARIO DE LA VISTA


        foreach ($ARRAYESTANDARID as $r) :
            $CODIGOESTANDAR = "" . $r['CODIGO_ESTANDAR'];
            $NOMBREESTANDAR = "" . $r['NOMBRE_ESTANDAR'];
            $ENVASEESTANDAR = "" . $r['CANTIDAD_ENVASE_ESTANDAR'];
            $PESOENVASEESTANDAR = "" . $r['PESO_ENVASE_ESTANDAR'];
            $PESOPALLETESTANDAR = "" . $r['PESO_PALLET_ESTANDAR'];
            $TRATAMIENTO1 = "" . $r['TRATAMIENTO1'];
            $TRATAMIENTO2 = "" . $r['TRATAMIENTO2'];
            $ESPECIES = "" . $r['ID_ESPECIES'];
            $PRODUCTO = "" . $r['ID_PRODUCTO'];
        endforeach;
    }

    //ver =  OBTENCION DE DATOS PARA LA VISUALIZAAR INFORMAICON DE REGISTRO
    if ($OP == "ver") {
        //DESABILITAR INPUT DEL FORMULARIO
        //PARA QUE NO MODIFIQUE NIGUNA INFORMACION, OBJETIVO ES VISUALIZAR INFORMACION
        $DISABLED = "disabled";
        //OBTENCIONS DE LOS DATODS DE LA COLUMNAS DE LA FILA OBTENIDA
        //PASAR DATOS OBTENIDOS A VARIABLES QUE SE VISUALIZAR EN EL FORMULARIO DE LA VISTA
        foreach ($ARRAYESTANDARID as $r) :

            $CODIGOESTANDAR = "" . $r['CODIGO_ESTANDAR'];
            $NOMBREESTANDAR = "" . $r['NOMBRE_ESTANDAR'];
            $ENVASEESTANDAR = "" . $r['CANTIDAD_ENVASE_ESTANDAR'];
            $PESOENVASEESTANDAR = "" . $r['PESO_ENVASE_ESTANDAR'];
            $PESOPALLETESTANDAR = "" . $r['PESO_PALLET_ESTANDAR'];
            $TRATAMIENTO1 = "" . $r['TRATAMIENTO1'];
            $TRATAMIENTO2 = "" . $r['TRATAMIENTO2'];
            $ESPECIES = "" . $r['ID_ESPECIES'];
            $PRODUCTO = "" . $r['ID_PRODUCTO'];

        endforeach;
    }
}




?>


<!DOCTYPE html>
<html lang="es">

<head>
    <title>Registro Estandar Recepcion</title>
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

                    CODIGOESTANDAR = document.getElementById("CODIGOESTANDAR").value;
                    NOMBREESTANDAR = document.getElementById("NOMBREESTANDAR").value;
                    ENVASEESTANDAR = document.getElementById("ENVASEESTANDAR").value;
                    PESOPALLETESTANDAR = document.getElementById("PESOPALLETESTANDAR").value;
                    PESOENVASEESTANDAR = document.getElementById("PESOENVASEESTANDAR").value;
                    TRATAMIENTO1 = document.getElementById("TRATAMIENTO1").selectedIndex;
                    TRATAMIENTO2 = document.getElementById("TRATAMIENTO2").selectedIndex;
                    ESPECIES = document.getElementById("ESPECIES").selectedIndex;
                    PRODUCTO = document.getElementById("PRODUCTO").selectedIndex;


                    document.getElementById('val_codigo').innerHTML = "";
                    document.getElementById('val_nombre').innerHTML = "";
                    document.getElementById('val_cajapee').innerHTML = "";
                    document.getElementById('val_envase').innerHTML = "";
                    document.getElementById('val_pallet').innerHTML = "";
                    document.getElementById('val_tratamiento1').innerHTML = "";
                    document.getElementById('val_tratamiento2').innerHTML = "";
                    document.getElementById('val_especies').innerHTML = "";
                    document.getElementById('val_producto').innerHTML = "";

                    if (CODIGOESTANDAR == null || CODIGOESTANDAR == 0) {
                        document.form_reg_dato.CODIGOESTANDAR.focus();
                        document.form_reg_dato.CODIGOESTANDAR.style.borderColor = "#FF0000";
                        document.getElementById('val_codigo').innerHTML = "NO A INGRESADO DATO";
                        return false;
                    }
                    document.form_reg_dato.CODIGOESTANDAR.style.borderColor = "#4AF575";

                    if (NOMBREESTANDAR == null || NOMBREESTANDAR == 0) {
                        document.form_reg_dato.NOMBREESTANDAR.focus();
                        document.form_reg_dato.NOMBREESTANDAR.style.borderColor = "#FF0000";
                        document.getElementById('val_nombre').innerHTML = "NO A INGRESADO DATO";
                        return false;
                    }
                    document.form_reg_dato.NOMBREESTANDAR.style.borderColor = "#4AF575";

                    if (ENVASEESTANDAR == null || ENVASEESTANDAR == "") {
                        document.form_reg_dato.ENVASEESTANDAR.focus();
                        document.form_reg_dato.ENVASEESTANDAR.style.borderColor = "#FF0000";
                        document.getElementById('val_cajapee').innerHTML = "NO A INGRESADO DATO";
                        return false;
                    }
                    document.form_reg_dato.ENVASEESTANDAR.style.borderColor = "#4AF575";


                    if (PESOENVASEESTANDAR == null || PESOENVASEESTANDAR == "" || PESOENVASEESTANDAR < 0) {
                        document.form_reg_dato.PESOENVASEESTANDAR.focus();
                        document.form_reg_dato.PESOENVASEESTANDAR.style.borderColor = "#FF0000";
                        document.getElementById('val_envase').innerHTML = "NO A INGRESADO DATO";
                        return false;
                    }
                    document.form_reg_dato.PESOENVASEESTANDAR.style.borderColor = "#4AF575";


                    if (PESOPALLETESTANDAR == null || PESOPALLETESTANDAR == "" || PESOPALLETESTANDAR < 0) {
                        document.form_reg_dato.PESOPALLETESTANDAR.focus();
                        document.form_reg_dato.PESOPALLETESTANDAR.style.borderColor = "#FF0000";
                        document.getElementById('val_pallet').innerHTML = "NO A INGRESADO DATO";
                        return false;
                    }
                    document.form_reg_dato.PESOPALLETESTANDAR.style.borderColor = "#4AF575";



                    if (TRATAMIENTO1 == null || TRATAMIENTO1 == 0) {
                        document.form_reg_dato.TRATAMIENTO1.focus();
                        document.form_reg_dato.TRATAMIENTO1.style.borderColor = "#FF0000";
                        document.getElementById('val_tratamiento1').innerHTML = "NO HA SELECCIONADO  NINGUNA ALTERNATIVA";
                        return false;
                    }
                    document.form_reg_dato.TRATAMIENTO1.style.borderColor = "#4AF575";

                    if (TRATAMIENTO2 == null || TRATAMIENTO2 == 0) {
                        document.form_reg_dato.TRATAMIENTO2.focus();
                        document.form_reg_dato.TRATAMIENTO2.style.borderColor = "#FF0000";
                        document.getElementById('val_tratamiento2').innerHTML = "NO HA SELECCIONADO  NINGUNA ALTERNATIVA";
                        return false;
                    }
                    document.form_reg_dato.TRATAMIENTO2.style.borderColor = "#4AF575";                      
  
                    if (ESPECIES == null || ESPECIES == 0) {
                        document.form_reg_dato.ESPECIES.focus();
                        document.form_reg_dato.ESPECIES.style.borderColor = "#FF0000";
                        document.getElementById('val_especies').innerHTML = "NO HA SELECCIONADO  NINGUNA ALTERNATIVA";
                        return false;
                    }
                    document.form_reg_dato.ESPECIES.style.borderColor = "#4AF575";
                    
                    if (PRODUCTO == null || PRODUCTO == 0) {
                        document.form_reg_dato.PRODUCTO.focus();
                        document.form_reg_dato.PRODUCTO.style.borderColor = "#FF0000";
                        document.getElementById('val_producto').innerHTML = "NO HA SELECCIONADO  NINGUNA ALTERNATIVA";
                        return false;
                    }
                    document.form_reg_dato.PRODUCTO.style.borderColor = "#4AF575";


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

<body class="hold-transition light-skin  sidebar-mini theme-primary" onload="mueveReloj()">
    <div class="wrapper">
        <!- LLAMADA AL MENU PRINCIPAL DE LA PAGINA-!>
            <?php include_once "../config/menu.php"; ?>

            <!-- Content Wrapper. Contains page content -->
            <div class="content-wrapper">
                <div class="container-full">

                    <!-- Content Header (Page header) -->
                    <div class="content-header">
                        <div class="d-flex align-items-center">
                            <div class="mr-auto">
                                <h3 class="page-title">Estandar Recepcion</h3>
                                <div class="d-inline-block align-items-center">
                                    <nav>
                                        <ol class="breadcrumb">
                                            <li class="breadcrumb-item"><a href="index.php"><i class="mdi mdi-home-outline"></i></a></li>
                                            <li class="breadcrumb-item" aria-current="page">Mantenedores </li>
                                            <li class="breadcrumb-item" aria-current="page">Estandar </li>
                                            <li class="breadcrumb-item active" aria-current="page"> <a href="registroErecepcion.php"> Operaciones Estandar Recepcion </a>
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
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label>Codigo </label>
                                                        <input type="hidden" class="form-control" placeholder="ID" id="ID" name="ID" value="<?php echo $IDOP; ?>" />
                                                        <input type="hidden" class="form-control" placeholder="EMPRESA" id="EMPRESA" name="EMPRESA" value="<?php echo $EMPRESAS; ?>" />
                                                        <input type="text" class="form-control" placeholder="Codigo Estandar" id="CODIGOESTANDAR" name="CODIGOESTANDAR" value="<?php echo $CODIGOESTANDAR; ?>" <?php echo $DISABLED; ?> />
                                                        <label id="val_codigo" class="validacion"> </label>
                                                    </div>
                                                </div>
                                                <div class="col-md-8">
                                                    <div class="form-group">
                                                        <label>Nombre </label>
                                                        <input type="text" class="form-control" placeholder="Nombre Estandar" id="NOMBREESTANDAR" name="NOMBREESTANDAR" value="<?php echo $NOMBREESTANDAR; ?>" <?php echo $DISABLED; ?> />
                                                        <label id="val_nombre" class="validacion"> </label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>Cantidad Envase</label>
                                                        <input type="number" class="form-control" placeholder="Cantidad Envase Estandar" id="ENVASEESTANDAR" name="ENVASEESTANDAR" value="<?php echo $ENVASEESTANDAR ?>" <?php echo $DISABLED; ?> />
                                                        <label id="val_cajapee" class="validacion"> </label>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>Peso Envase</label>
                                                        <input type="number"  step="0.00001" class="form-control" placeholder="Peso Envase Estandar" id="PESOENVASEESTANDAR" name="PESOENVASEESTANDAR" value="<?php echo $PESOENVASEESTANDAR ?>" <?php echo $DISABLED; ?> />
                                                        <label id="val_envase" class="validacion"> </label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>Peso Pallet</label>
                                                        <input type="number" class="form-control" step="0.01" placeholder="Peso Envase Estandar" id="PESOPALLETESTANDAR" name="PESOPALLETESTANDAR" value="<?php echo $PESOPALLETESTANDAR ?>" <?php echo $DISABLED; ?> />
                                                        <label id="val_pallet" class="validacion"> </label>
                                                    </div>
                                                </div>                      
                                                <div class="col-md-6 col-12">
                                                    <div class="form-group">
                                                        <label> Especies</label>
                                                        <select class="form-control select2" id="ESPECIES" name="ESPECIES" style="width: 100%;" value="<?php echo $ESPECIES; ?>" <?php echo $DISABLED; ?>>
                                                            <option></option>
                                                            <?php foreach ($ARRAYESPECIES as $r) : ?>
                                                                <?php if ($ARRAYESPECIES) {    ?>
                                                                    <option value="<?php echo $r['ID_ESPECIES']; ?>" <?php if ($ESPECIES == $r['ID_ESPECIES']) { echo "selected"; } ?>>
                                                                        <?php echo $r['NOMBRE_ESPECIES'] ?>
                                                                    </option>
                                                                <?php } else { ?>
                                                                    <option>No hay Datos Registrados</option>
                                                                <?php } ?>
                                                            <?php endforeach; ?>
                                                        </select>
                                                        <label id="val_especies" class="validacion"> </label>
                                                    </div>
                                                </div> 
                                                <div class="col-md-6 col-12">
                                                    <div class="form-group">
                                                        <label>Tratamiento 1</label>
                                                        <select class="form-control select2" id="TRATAMIENTO1" name="TRATAMIENTO1" style="width: 100%;" <?php echo $DISABLED; ?>>
                                                            <option></option>
                                                            <option value="0" <?php if ($TRATAMIENTO1 == "0") { echo "selected";  } ?>>No</option>
                                                            <option value="1" <?php if ($TRATAMIENTO1 == "1") { echo "selected"; } ?>> Si </option>
                                                        </select>
                                                        <label id="val_tratamiento1" class="validacion"> </label>
                                                    </div>
                                                </div>                                                                      
                                                <div class="col-md-6 col-12">
                                                    <div class="form-group">
                                                        <label>Tratamineto 2</label>
                                                        <select class="form-control select2" id="TRATAMIENTO2" name="TRATAMIENTO2" style="width: 100%;" <?php echo $DISABLED; ?>>
                                                            <option></option>
                                                            <option value="0" <?php if ($TRATAMIENTO2 == "0") { echo "selected";  } ?>>No</option>
                                                            <option value="1" <?php if ($TRATAMIENTO2 == "1") { echo "selected"; } ?>> Si </option>
                                                        </select>
                                                        <label id="val_tratamiento2" class="validacion"> </label>
                                                    </div>
                                                </div>                                               
                                                <div class="col-md-6 col-12">
                                                    <div class="form-group">
                                                        <label> Producto</label>
                                                        <select class="form-control select2" id="PRODUCTO" name="PRODUCTO" style="width: 100%;" value="<?php echo $PRODUCTO; ?>" <?php echo $DISABLED; ?>>
                                                            <option></option>
                                                            <?php foreach ($ARRAYPRODUCTO as $r) : ?>
                                                                <?php if ($ARRAYPRODUCTO) {    ?>
                                                                    <option value="<?php echo $r['ID_PRODUCTO']; ?>" <?php if ($PRODUCTO == $r['ID_PRODUCTO']) { echo "selected"; } ?>>
                                                                        <?php echo $r['NOMBRE_PRODUCTO'] ?>
                                                                    </option>
                                                                <?php } else { ?>
                                                                    <option>No hay Datos Registrados</option>
                                                                <?php } ?>
                                                            <?php endforeach; ?>
                                                        </select>
                                                        <label id="val_producto" class="validacion"> </label>
                                                    </div>
                                                </div>


                                            </div>
                                        </div>
                                        <!-- /.box-body -->
                                        <div class="box-footer">
                                            <button type="button" class="btn btn-rounded btn-warning btn-outline mr-1" name="CANCELAR" value="CANCELAR" Onclick="irPagina('registroErecepcion.php'); ">
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
                                        <h4 class="box-title"> Registros</h4>
                                    </div>
                                    <div class="box-body">


                                        <div class="table-responsive">
                                            <table id="listar" class="table table-hover " style="width: 100%;">
                                                <thead>
                                                    <tr class="center">
                                                        <th>Codigo </th>
                                                        <th>Nombre </th>
                                                        <th>Operaciones</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php foreach ($ARRAYESTANDAR as $r) : ?>
                                                        <tr class="center">
                                                            <td>
                                                                <a href="#" class="text-warning hover-warning">
                                                                    <?php echo $r['CODIGO_ESTANDAR']; ?>
                                                                </a>
                                                            </td>
                                                            <td><?php echo $r['NOMBRE_ESTANDAR']; ?></td>
                                                            <td class="text-center">
                                                                <form method="post" id="form1">
                                                                    <div class="list-icons d-inline-flex">
                                                                        <div class="list-icons-item dropdown">
                                                                            <a href="#" class="list-icons-item dropdown-toggle" data-toggle="dropdown">
                                                                                <i class="glyphicon glyphicon-cog"></i>
                                                                            </a>
                                                                            <div class="dropdown-menu dropdown-menu-right">
                                                                                <input type="hidden" class="form-control" placeholder="ID" id="ID" name="ID" value="<?php echo $r['ID_ESTANDAR']; ?>" />
                                                                                <input type="hidden" class="form-control" placeholder="URL" id="URL" name="URL" value="registroErecepcion" />
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
                                <!-- /.box -->
                            </div>
                        </div>
                        <!--.row -->
                    </section>
                    <!-- /.content -->
                </div>
            </div>
            <!-- /.content-wrapper -->



            <!- LLAMADA ARCHIVO DEL DISEÑO DEL FOOTER Y MENU USUARIO -!>
                <?php include_once "../config/footer.php"; ?>
                <?php include_once "../config/menuExtra.php"; ?>
    </div>
    <!- LLAMADA URL DE ARCHIVOS DE DISEÑO Y JQUERY E OTROS -!>
        <?php include_once "../config/urlBase.php"; ?>
</body>

</html>