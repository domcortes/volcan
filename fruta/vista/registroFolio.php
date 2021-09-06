<?php

include_once "../config/validarUsuario.php";

//LLAMADA ARCHIVOS NECESARIOS PARA LAS OPERACIONES

include_once '../controlador/FOLIO_ADO.php';
include_once '../modelo/FOLIO.php';

//INCIALIZAR LAS VARIBLES
//INICIALIZAR CONTROLADOR

$FOLIO_ADO =  new FOLIO_ADO();

//INIICIALIZAR MODELO
$FOLIO =  new FOLIO();


//INCIALIZAR VARIBALES A OCUPAR PARA LA FUNCIONALIDAD
$IDOP = "";
$OP = "";
$DISABLED = "";


$NUMEROFOLIO = "";
$NUMEROFOLIO2 = "";
$ALIASFOLIODINAMICO = "";
$ALIASFOLIOESTACTICO = "";
$EMPRESA = "";
$PLANTA = "";
$TFOLIO = "";
$NOMBRETFOLIO = "";
$AFOLIO = "";
$AFOLIO2 = "";
$TEMPORADA = "";


$FNOMBRE = "";
$SINO = "";



$NOMBRE = "";
$MENSAJE = "";
$FOCUS = "";
$MENSAJE2 = "";
$FOCUS2 = "";
$BORDER = "";

//INICIALIZAR ARREGLOS
$ARRAYFOLIO = "";
$ARRAYFOLIOID = "";
$ARRAYPLANTA = "";
$ARRAYPLANTA2 = "";
$ARRAYEMPRESA = "";
$ARRAYEMPRESA2 = "";
$ARRAYTFOLIO = "";
$ARRAYTFOLIO2 = "";
$ARRAYAFOLIO = "";
$ARRAYAFOLIO2 = "";
$ARRAYVEREMPRESA = "";
$ARRAYVERPLANTA = "";
$ARRAYVERTIPOFOLIO = "";
$ARRAYVERAUTOFOLIO = "";
$ARRAYTEMPORADA = "";
$ARRAYVERTEMPORADA = "";

$ARRAYVALIDARFOLIO = "";
$ARRAYVALIDARFOLIO2 = "";

$ARRAYVEREMPRESA2 = "";
$ARRAYVERPLANTA2 = "";
$ARRAYVERTIPOFOLIO2 = "";
$ARRAYVERAUTOFOLIO2 = "";
$ARRAYVERTEMPORADA2 = "";


//DEFINIR ARREGLOS CON LOS DATOS OBTENIDOS DE LAS FUNCIONES DE LOS CONTROLADORES
$ARRAYFOLIO = $FOLIO_ADO->listarFolioCBX();
$ARRAYEMPRESA = $EMPRESA_ADO->listarEmpresaCBX();
$ARRAYPLANTA = $PLANTA_ADO->listarPlantaPropiaCBX();
$ARRAYTEMPORADA = $TEMPORADA_ADO->listarTemporadaCBX();
include_once "../config/validarDatosUrl.php";
include_once "../config/datosUrl.php";


//OPERACIONES
//OPERACION DE REGISTRO DE FILA

if (isset($_REQUEST['GUARDAR'])) {
    $ARRAYVALIDARFOLIO = $FOLIO_ADO->validarFolio($_REQUEST['EMPRESA'], $_REQUEST['PLANTA'], $_REQUEST['TEMPORADA'], $_REQUEST['TFOLIO']);
    if ($ARRAYVALIDARFOLIO) {
        $SINO = 1;
        $MENSAJE = "EXISTE UN REGISTRO ASOCIADOS A LOS DATOS SELECIONADOS";
        $EMPRESA = $_REQUEST['EMPRESA'];
        $PLANTA = $_REQUEST['PLANTA'];
        $TFOLIO = $_REQUEST['TFOLIO'];
        $TEMPORADA = $_REQUEST['TEMPORADA'];
    } else {
        $SINO = 0;
    }

    if ($SINO == 0) {
        //FUNCION PARA GENERAR EL FOLIO
        $NUMEROFOLIO2 = (int)$_REQUEST['EMPRESA'] . $_REQUEST['PLANTA'] . $_REQUEST['TFOLIO'] . $_REQUEST['TEMPORADA'];
        $NUMEROFOLIO = $NUMEROFOLIO2 * 10000;

        //OBTENCIONS ALIAS FOLIO
        //OBTENER INFORMACION DE LAS TABLAS RELACIONADAS
        $ARRAYVEREMPRESA2 = $EMPRESA_ADO->verEmpresa($_REQUEST['EMPRESA']);
        $ARRAYVERPLANTA2 = $PLANTA_ADO->verPlanta($_REQUEST['PLANTA']);
        $ARRAYVERTEMPORADA2 = $TEMPORADA_ADO->verTemporada($_REQUEST['TEMPORADA']);

        //GENERACION DE ALIAS
        $ALIASFOLIO = (int) $ARRAYVEREMPRESA2[0]['ID_EMPRESA'] . $ARRAYVERPLANTA2[0]['ID_PLANTA'] . $_REQUEST['TFOLIO'] . $ARRAYVERTEMPORADA2[0]['ID_TEMPORADA'];
        $ALIASFOLIO = $ALIASFOLIO *  10000;

        $ALIASFOLIO = $ALIASFOLIO . "_EMPRESA:" . $ARRAYVEREMPRESA2[0]['NOMBRE_EMPRESA'];
        $ALIASFOLIO = $ALIASFOLIO . "_PLANTA:" . $ARRAYVERPLANTA2[0]['NOMBRE_PLANTA'];
        if ($_REQUEST['TFOLIO'] == 1) {
            $NOMBRETFOLIO = "MATERIA PRIMA";
        }
        if ($_REQUEST['TFOLIO'] == 2) {
            $NOMBRETFOLIO = "EXPORTACION";
        }
        if ($_REQUEST['TFOLIO'] == 3) {
            $NOMBRETFOLIO = "INDUSTRIAL";
        }

        $ALIASFOLIO = $ALIASFOLIO . "_TIPO_FOLIO:" . $NOMBRETFOLIO;
        $ALIASFOLIO = $ALIASFOLIO . "_TEMPORADA:" . $ARRAYVERTEMPORADA2[0]['NOMBRE_TEMPORADA'];



        $ALIASFOLIODINAMICO = "";
        $ALIASFOLIOESTACTICO = "";


        //UTILIZACION METODOS SET DEL MODELO
        //SETEO DE ATRIBUTOS DE LA CLASE, OBTENIDO EN EL FORMULARIO   

        $FOLIO->__SET('NUMERO_FOLIO', $NUMEROFOLIO);
        $FOLIO->__SET('TFOLIO', $_REQUEST['TFOLIO']);
        $FOLIO->__SET('ID_EMPRESA', $_REQUEST['EMPRESA']);
        $FOLIO->__SET('ID_PLANTA', $_REQUEST['PLANTA']);
        $FOLIO->__SET('ID_TEMPORADA', $_REQUEST['TEMPORADA']);
        $FOLIO->__SET('ALIAS_DINAMICO_FOLIO', $ALIASFOLIO);
        $FOLIO->__SET('ALIAS_ESTATICO_FOLIO', $NUMEROFOLIO);
        $FOLIO->__SET('ID_USUARIOI', $IDUSUARIOS);
        $FOLIO->__SET('ID_USUARIOM', $IDUSUARIOS);
        //LLAMADA AL METODO DE REGISTRO DEL CONTROLADOR
        $FOLIO_ADO->agregarFolio($FOLIO);
        //REDIRECCIONAR A PAGINA registroFolio.php
        echo "<script type='text/javascript'> location.href ='registroFolio.php';</script>";
    }
}
//OPERACION EDICION DE FILA
if (isset($_REQUEST['EDITAR'])) {

    $ARRAYFOLIOID = $FOLIO_ADO->verFolio($_REQUEST['ID']);

    //FUNCION PARA GENERAR EL FOLIO
    $NUMEROFOLIO2 = (int)$_REQUEST['EMPRESA'] . $_REQUEST['PLANTA'] . $_REQUEST['TFOLIO'] . $_REQUEST['TEMPORADA'];
    $NUMEROFOLIO = $NUMEROFOLIO2 * 10000;

    //OBTENCIONS ALIAS FOLIO
    $ARRAYVEREMPRESA2 = $EMPRESA_ADO->verEmpresa($_REQUEST['EMPRESA']);
    $ARRAYVERPLANTA2 = $PLANTA_ADO->verPlanta($_REQUEST['PLANTA']);
    $ARRAYVERTEMPORADA2 = $TEMPORADA_ADO->verTemporada($_REQUEST['TEMPORADA']);

    $ALIASFOLIO = (int) $ARRAYVEREMPRESA2[0]['ID_EMPRESA'] . $ARRAYVERPLANTA2[0]['ID_PLANTA'] . $_REQUEST['TFOLIO'] . $ARRAYVERTEMPORADA2[0]['ID_TEMPORADA'];
    $ALIASFOLIO = $ALIASFOLIO * 10000;

    $ALIASFOLIO = $ALIASFOLIO . "_EMPRESA:" . $ARRAYVEREMPRESA2[0]['NOMBRE_EMPRESA'];
    $ALIASFOLIO = $ALIASFOLIO . "_PLANTA:" . $ARRAYVERPLANTA2[0]['NOMBRE_PLANTA'];


    if ($_REQUEST['TFOLIO'] == 1) {
        $NOMBRETFOLIO = "MATERIA PRIMA";
    }
    if ($_REQUEST['TFOLIO'] == 2) {
        $NOMBRETFOLIO = "EXPORTACION";
    }
    if ($_REQUEST['TFOLIO'] == 3) {
        $NOMBRETFOLIO = "INDUSTRIAL";
    }

    $ALIASFOLIO = $ALIASFOLIO . "_TIPO_FOLIO:" . $NOMBRETFOLIO;
    $ALIASFOLIO = $ALIASFOLIO . "_TEMPORADA:" . $ARRAYVERTEMPORADA2[0]['NOMBRE_TEMPORADA'];



    //UTILIZACION METODOS SET DEL MODELO
    //SETEO DE ATRIBUTOS DE LA CLASE, OBTENIDO EN EL FORMULARIO   
    $FOLIO->__SET('NUMERO_FOLIO',  $NUMEROFOLIO);
    $FOLIO->__SET('TFOLIO', $_REQUEST['TFOLIO']);
    $FOLIO->__SET('ID_EMPRESA', $_REQUEST['EMPRESA']);
    $FOLIO->__SET('ID_PLANTA', $_REQUEST['PLANTA']);
    $FOLIO->__SET('ID_TEMPORADA', $_REQUEST['TEMPORADA']);
    $FOLIO->__SET('ALIAS_DINAMICO_FOLIO', $ALIASFOLIO);
    $FOLIO->__SET('ALIAS_ESTATICO_FOLIO', $NUMEROFOLIO);
    $FOLIO->__SET('ID_USUARIOM', $IDUSUARIOS);
    $FOLIO->__SET('ID_FOLIO', $_REQUEST['ID']);
    //LLAMADA AL METODO DE EDICION DEL CONTROLADOR
    $FOLIO_ADO->actualizarFolio($FOLIO);
    //REDIRECCIONAR A PAGINA registroFolio.php
    echo "<script type='text/javascript'> location.href ='registroFolio.php';</script>";
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

        $FOLIO->__SET('ID_FOLIO', $IDOP);
        $FOLIO_ADO->deshabilitar($FOLIO);

        echo "<script type='text/javascript'> location.href ='registroFolio.php';</script>";
    }
    //1 = ACTIVAR
    if ($OP == "1") {

        $FOLIO->__SET('ID_FOLIO', $IDOP);
        $FOLIO_ADO->habilitar($FOLIO);
        echo "<script type='text/javascript'> location.href ='registroFolio.php';</script>";
    }
    //editar =  OBTENCION DE DATOS PARA LA EDICION DE REGISTRO
    if ($OP == "editar") {
        //OBTENCION DE INFORMACIOND DE LA FILA DEL REGISTRO
        //ALMACENAR INFORMACION EN ARREGLO
        //LLAMADA A LA FUNCION DE CONTROLADOR verPlanta(ID), 
        //SE LE PASE UNO DE LOS DATOS OBTENIDO PREVIAMENTE A TRAVEZ DE LA URL
        $ARRAYFOLIOID = $FOLIO_ADO->verFolio($IDOP);
        //OBTENCIONS DE LOS DATODS DE LA COLUMNAS DE LA FILA OBTENIDA
        //PASAR DATOS OBTENIDOS A VARIABLES QUE SE VISUALIZAR EN EL FORMULARIO DE LA VISTA
        foreach ($ARRAYFOLIOID as $r) :

            $NUMEROFOLIO = "" . $r['NUMERO_FOLIO'];
            $EMPRESA = "" . $r['ID_EMPRESA'];
            $PLANTA = "" . $r['ID_PLANTA'];
            $TFOLIO = "" . $r['TFOLIO'];
            $TEMPORADA = "" . $r['ID_TEMPORADA'];

        endforeach;
    }

    //ver =  OBTENCION DE DATOS PARA LA VISUALIZAAR INFORMAICON DE REGISTRO
    if ($OP == "ver") {
        //DESABILITAR INPUT DEL FORMULARIO
        //PARA QUE NO MODIFIQUE NIGUNA INFORMACION, OBJETIVO ES VISUALIZAR INFORMACION
        $DISABLED = "disabled";   //OBTENCION DE INFORMACIOND DE LA FILA DEL REGISTRO
        //ALMACENAR INFORMACION EN ARREGLO
        //LLAMADA A LA FUNCION DE CONTROLADOR verPlanta(ID), 
        //SE LE PASE UNO DE LOS DATOS OBTENIDO PREVIAMENTE A TRAVEZ DE LA URL
        $ARRAYFOLIOID = $FOLIO_ADO->verFolio($IDOP);

        //OBTENCIONS DE LOS DATODS DE LA COLUMNAS DE LA FILA OBTENIDA
        //PASAR DATOS OBTENIDOS A VARIABLES QUE SE VISUALIZAR EN EL FORMULARIO DE LA VISTA

        foreach ($ARRAYFOLIOID as $r) :

            $NUMEROFOLIO = "" . $r['NUMERO_FOLIO'];
            $EMPRESA = "" . $r['ID_EMPRESA'];
            $PLANTA = "" . $r['ID_PLANTA'];
            $TFOLIO = "" . $r['TFOLIO'];
            $TEMPORADA = "" . $r['ID_TEMPORADA'];

        endforeach;
    }
}





?>


<!DOCTYPE html>
<html lang="es">

<head>
    <title>Registro Folio</title>
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




                    EMPRESA = document.getElementById("EMPRESA").selectedIndex;
                    PLANTA = document.getElementById("PLANTA").selectedIndex;
                    TEMPORADA = document.getElementById("TEMPORADA").selectedIndex;
                    TFOLIO = document.getElementById("TFOLIO").selectedIndex;

                    document.getElementById('val_empresa').innerHTML = "";
                    document.getElementById('val_planta').innerHTML = "";
                    document.getElementById('val_temporada').innerHTML = "";
                    document.getElementById('val_tfolio').innerHTML = "";



                    document.form_reg_dato.NUMEROFOLIO.style.borderColor = "#4AF575";

                    if (EMPRESA == null || EMPRESA == 0) {
                        document.form_reg_dato.EMPRESA.focus();
                        document.form_reg_dato.EMPRESA.style.borderColor = "#FF0000";
                        document.getElementById('val_empresa').innerHTML = "NO HA SELECCIONADO  NINGUNA ALTERNATIVA";
                        return false;
                    }
                    document.form_reg_dato.EMPRESA.style.borderColor = "#4AF575";

                    if (PLANTA == null || PLANTA == 0) {
                        document.form_reg_dato.PLANTA.focus();
                        document.form_reg_dato.PLANTA.style.borderColor = "#FF0000";
                        document.getElementById('val_planta').innerHTML = "NO HA SELECCIONADO  NINGUNA ALTERNATIVA";
                        return false;
                    }
                    document.form_reg_dato.PLANTA.style.borderColor = "#4AF575";


                    if (TFOLIO == null || TFOLIO == 0) {
                        document.form_reg_dato.TFOLIO.focus();
                        document.form_reg_dato.TFOLIO.style.borderColor = "#FF0000";
                        document.getElementById('val_tfolio').innerHTML = "NO HA SELECCIONADO  NINGUNA ALTERNATIVA";
                        return false;
                    }
                    document.form_reg_dato.TFOLIO.style.borderColor = "#4AF575";

                    if (TEMPORADA == null || TEMPORADA == 0) {
                        document.form_reg_dato.TEMPORADA.focus();
                        document.form_reg_dato.TEMPORADA.style.borderColor = "#FF0000";
                        document.getElementById('val_temporada').innerHTML = "NO HA SELECCIONADO  NINGUNA ALTERNATIVA";
                        return false;
                    }
                    document.form_reg_dato.AFOLIO.style.borderColor = "#4AF575";

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
            <?php include_once "../config/menu.php"; ?>

            <!-- Content Wrapper. Contains page content -->
            <div class="content-wrapper">
                <div class="container-full">

                    <!-- Content Header (Page header) -->
                    <div class="content-header">
                        <div class="d-flex align-items-center">
                            <div class="mr-auto">
                                <h3 class="page-title">Folio</h3>
                                <div class="d-inline-block align-items-center">
                                    <nav>
                                        <ol class="breadcrumb">
                                            <li class="breadcrumb-item"><a href="index.php"><i class="mdi mdi-home-outline"></i></a></li>
                                            <li class="breadcrumb-item" aria-current="page">Mantenedores</li>
                                            <li class="breadcrumb-item" aria-current="page">Folio</li>
                                            <li class="breadcrumb-item active" aria-current="page"> <a href="registroFolio.php"> Operaciones Folio </a>
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
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>Numero </label>
                                                        <input type="hidden" class="form-control" placeholder="ID" id="ID" name="ID" value="<?php echo $IDOP; ?>" />
                                                        <input type="text" class="form-control" placeholder="Numero Folio" id="NUMEROFOLIO" name="NUMEROFOLIO" value="<?php echo $NUMEROFOLIO; ?>" disabled />
                                                        <label id="val_numero" class="validacion"> </label>
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-12">
                                                    <div class="form-group">
                                                        <label>Empresa</label>
                                                        <select class="form-control select2" id="EMPRESA" name="EMPRESA" style="width: 100%;" value="<?php echo $EMPRESA; ?>" <?php echo $DISABLED; ?>>
                                                            <option></option>
                                                            <?php foreach ($ARRAYEMPRESA as $r) : ?>
                                                                <?php if ($ARRAYEMPRESA) {    ?>
                                                                    <option value="<?php echo $r['ID_EMPRESA']; ?>" <?php if ($EMPRESA == $r['ID_EMPRESA']) {
                                                                                                                        echo "selected";
                                                                                                                    } ?>>
                                                                        <?php echo $r['NOMBRE_EMPRESA'] ?>
                                                                    </option>
                                                                <?php } else { ?>
                                                                    <option>No Hay Datos Registrados </option>
                                                                <?php } ?>

                                                            <?php endforeach; ?>
                                                        </select>
                                                        <label id="val_empresa" class="validacion"> </label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6 col-12">
                                                    <div class="form-group">
                                                        <label>Planta</label>
                                                        <select class="form-control select2" id="PLANTA" name="PLANTA" style="width: 100%;" value="<?php echo $PLANTA; ?>" <?php echo $DISABLED; ?>>
                                                            <option></option>
                                                            <?php foreach ($ARRAYPLANTA as $r) : ?>
                                                                <?php if ($ARRAYPLANTA) {    ?>
                                                                    <option value="<?php echo $r['ID_PLANTA']; ?>" <?php if ($PLANTA == $r['ID_PLANTA']) {
                                                                                                                        echo "selected";
                                                                                                                    } ?>>
                                                                        <?php echo $r['NOMBRE_PLANTA'] ?>
                                                                    </option>
                                                                <?php } else { ?>
                                                                    <option>No Hay Datos Registrados </option>
                                                                <?php } ?>

                                                            <?php endforeach; ?>


                                                        </select>
                                                        <label id="val_planta" class="validacion"> </label>
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-12">
                                                    <div class="form-group">
                                                        <label>Tipo Folio</label>
                                                        <select class="form-control select2" id="TFOLIO" name="TFOLIO" style="width: 100%;" value="<?php echo $TFOLIO; ?>" <?php echo $DISABLED; ?>>
                                                            <option></option>
                                                            <option value="1" <?php if ($TFOLIO == 1) {
                                                                                    echo "selected";
                                                                                } ?>>
                                                                Materia Prima
                                                            </option>
                                                            <option value="2" <?php if ($TFOLIO == 2) {
                                                                                    echo "selected";
                                                                                } ?>>
                                                                Exportacion
                                                            </option>
                                                            <option value="3" <?php if ($TFOLIO == 3) {
                                                                                    echo "selected";
                                                                                } ?>>
                                                                Industrial
                                                            </option>


                                                        </select>
                                                        <label id="val_tfolio" class="validacion"> </label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6 col-12">
                                                    <div class="form-group">
                                                        <label>Temporada</label>
                                                        <select class="form-control select2" id="TEMPORADA" name="TEMPORADA" style="width: 100%;" value="<?php echo $TEMPORADA; ?>" <?php echo $DISABLED; ?>>
                                                            <option></option>
                                                            <?php foreach ($ARRAYTEMPORADA as $r) : ?>
                                                                <?php if ($ARRAYTEMPORADA) {    ?>
                                                                    <option value="<?php echo $r['ID_TEMPORADA']; ?>" <?php if ($TEMPORADA == $r['ID_TEMPORADA']) {
                                                                                                                            echo "selected";
                                                                                                                        } ?>>
                                                                        <?php echo $r['NOMBRE_TEMPORADA'] ?>
                                                                    </option>
                                                                <?php } else { ?>
                                                                    <option>No Hay Datos Registrados </option>
                                                                <?php } ?>

                                                            <?php endforeach; ?>
                                                        </select>
                                                        <label id="val_temporada" class="validacion"> </label>
                                                    </div>
                                                </div>
                                            </div>


                                            <label id="mensaje" class="validacion"> <?php echo $MENSAJE; ?> </label>
                                        </div>
                                        <!-- /.box-body -->
                                        <div class="box-footer">
                                            <button type="button" class="btn btn-rounded btn-warning btn-outline mr-1" name="CANCELAR" value="CANCELAR" Onclick="irPagina('registroFolio.php'); ">
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
                                                        <th>Numero </th>
                                                        <th>Empresa</th>
                                                        <th>Planta</th>
                                                        <th>Tipo Folio</th>
                                                        <th>Temporada</th>
                                                        <th>Operaciones</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php foreach ($ARRAYFOLIO as $r) : ?>
                                                        <tr class="center">
                                                            <td>
                                                                <a href="#" class="text-warning hover-warning">
                                                                    <?php echo $r['NUMERO_FOLIO']; ?>
                                                                </a>
                                                            </td>

                                                            <td>
                                                                <?php
                                                                $ARRAYVEREMPRESA = $EMPRESA_ADO->verEmpresa($r['ID_EMPRESA']);
                                                                echo  $ARRAYVEREMPRESA[0]['NOMBRE_EMPRESA'];
                                                                ?>
                                                            </td>
                                                            <td>
                                                                <?php
                                                                $ARRAYVERPLANTA = $PLANTA_ADO->verPlanta($r['ID_PLANTA']);
                                                                echo $ARRAYVERPLANTA[0]['NOMBRE_PLANTA'];
                                                                ?>
                                                            </td>
                                                            <td>
                                                                <?php
                                                                if ($r['TFOLIO'] == 1) {
                                                                    echo "Materia Prima";
                                                                }
                                                                if ($r['TFOLIO'] == 2) {
                                                                    echo  "Exportacion";
                                                                }
                                                                if ($r['TFOLIO'] == 3) {
                                                                    echo "Industrial";
                                                                }
                                                                ?>
                                                            </td>
                                                            <td>
                                                                <?php
                                                                $ARRAYVERTEMPORADA = $TEMPORADA_ADO->verTemporada($r['ID_TEMPORADA']);
                                                                echo $ARRAYVERTEMPORADA[0]['NOMBRE_TEMPORADA'];
                                                                ?>
                                                            </td>
                                                            <td class="text-center">
                                                                <form method="post" id="form1">
                                                                    <div class="list-icons d-inline-flex">
                                                                        <div class="list-icons-item dropdown">
                                                                            <a href="#" class="list-icons-item dropdown-toggle" data-toggle="dropdown">
                                                                                <i class="glyphicon glyphicon-cog"></i>
                                                                            </a>
                                                                            <div class="dropdown-menu dropdown-menu-right">
                                                                                <input type="hidden" class="form-control" placeholder="ID" id="ID" name="ID" value="<?php echo $r['ID_FOLIO']; ?>" />
                                                                                <input type="hidden" class="form-control" placeholder="URL" id="URL" name="URL" value="registroFolio" />
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