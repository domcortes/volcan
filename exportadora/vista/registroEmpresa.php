<?php

include_once "../../assest/config/validarUsuarioExpo.php";

//LLAMADA ARCHIVOS NECESARIOS PARA LAS OPERACIONES
include_once '../../assest/controlador/COMUNA_ADO.php';
include_once '../../assest/controlador/CIUDAD_ADO.php';

include_once '../../assest/modelo/EMPRESA.php';
include_once '../../assest/config/SUBIR.php';

//INCIALIZAR LAS VARIBLES
//INICIALIZAR CONTROLADOR

$COMUNA_ADO =  new COMUNA_ADO();
$CIUDAD_ADO =  new CIUDAD_ADO();

//INIICIALIZAR MODELO
$EMPRESA =  new EMPRESA();
$SUBIR = new SUBIR();

//INCIALIZAR VARIBALES A OCUPAR PARA LA FUNCIONALIDAD
$IDOP = "";
$OP = "";
$DISABLED = "";
$ID = "";

$DIRECTORIODESTINO = "img/empresa/";

$NOMBREMPRESA = "";
$RAZONSOCIAL = "";
$DIRECCION    = "";
$DVEMPRESA = "";
$RUTEMPRESA = "";
$COMUNA = "";
$GIRO = "";
$CIUDAD = "";
$TELEFONO = "";
$ENCARGADODECOMPRA = "";
$LOGOEMPRESA = "";


$URL_IMG = "";
$URL = "";

$NOMBRE = "";
$MENSAJE = "";
$FOCUS = "";
$MENSAJE2 = "";
$FOCUS2 = "";
$BORDER = "";

//INICIALIZAR ARREGLOS
$ARRAYEMPRESA = "";
$ARRAYEMPRESASID = "";
$ARRAYCOMUNA = "";
$ARRAYCIUDAD = "";



//DEFINIR ARREGLOS CON LOS DATOS OBTENIDOS DE LAS FUNCIONES DE LOS CONTROLADORES
$ARRAYEMPRESA = $EMPRESA_ADO->listarEmpresaCBX();
$ARRAYCOMUNA = $COMUNA_ADO->listarComunaCBX();
$ARRAYCIUDAD = $CIUDAD_ADO->listarCiudadCBX();
include_once "../../assest/config/validarDatosUrl.php";
include_once "../../assest/config/datosUrl.php";



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

        $EMPRESA->__SET('ID_EMPRESA', $IDOP);
        $EMPRESA_ADO->deshabilitar($EMPRESA);

        echo "<script type='text/javascript'> location.href ='registroEmpresa.php';</script>";
    }
    //1 = ACTIVAR
    if ($OP == "1") {

        $EMPRESA->__SET('ID_EMPRESA', $IDOP);
        $EMPRESA_ADO->habilitar($EMPRESA);

        echo "<script type='text/javascript'> location.href ='registroEmpresa.php';</script>";
    }
    //editar =  OBTENCION DE DATOS PARA LA EDICION DE REGISTRO
    if ($OP == "editar") {

        //OBTENCION DE INFORMACIOND DE LA FILA DEL REGISTRO
        //ALMACENAR INFORMACION EN ARREGLO
        //LLAMADA A LA FUNCION DE CONTROLADOR verPlanta(ID), 
        //SE LE PASE UNO DE LOS DATOS OBTENIDO PREVIAMENTE A TRAVEZ DE LA URL
        $ARRAYEMPRESASID = $EMPRESA_ADO->verEmpresa($IDOP);
        //OBTENCIONS DE LOS DATODS DE LA COLUMNAS DE LA FILA OBTENIDA
        //PASAR DATOS OBTENIDOS A VARIABLES QUE SE VISUALIZAR EN EL FORMULARIO DE LA VISTA
        foreach ($ARRAYEMPRESASID as $r) :
            $RUTEMPRESA = "" . $r['RUT_EMPRESA'];
            $DVEMPRESA = "" . $r['DV_EMPRESA'];
            $NOMBREMPRESA = "" . $r['NOMBRE_EMPRESA'];
            $RAZONSOCIAL = "" . $r['RAZON_SOCIAL_EMPRESA'];
            $DIRECCION = "" . $r['DIRECCION_EMPRESA'];
            $GIRO = "" . $r['GIRO_EMPRESA'];
            $TELEFONO = "" . $r['TELEFONO_EMPRESA'];
            $URL_IMG = "" . $r['LOGO_EMPRESA'];
            $ENCARGADODECOMPRA = "" . $r['ENCARGADO_COMPRA_EMPRESA'];
            $CIUDAD = "" . $r['ID_CIUDAD'];
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
        $ARRAYEMPRESASID = $EMPRESA_ADO->verEmpresa($IDOP);
        //OBTENCIONS DE LOS DATODS DE LA COLUMNAS DE LA FILA OBTENIDA
        //PASAR DATOS OBTENIDOS A VARIABLES QUE SE VISUALIZAR EN EL FORMULARIO DE LA VISTA
        foreach ($ARRAYEMPRESASID as $r) :
            $RUTEMPRESA = "" . $r['RUT_EMPRESA'];
            $DVEMPRESA = "" . $r['DV_EMPRESA'];
            $NOMBREMPRESA = "" . $r['NOMBRE_EMPRESA'];
            $RAZONSOCIAL = "" . $r['RAZON_SOCIAL_EMPRESA'];
            $DIRECCION = "" . $r['DIRECCION_EMPRESA'];
            $GIRO = "" . $r['GIRO_EMPRESA'];
            $TELEFONO = "" . $r['TELEFONO_EMPRESA'];
            $URL_IMG = "" . $r['LOGO_EMPRESA'];
            $ENCARGADODECOMPRA = "" . $r['ENCARGADO_COMPRA_EMPRESA'];
            $CIUDAD = "" . $r['ID_CIUDAD'];
        endforeach;
    }
}




?>



<!DOCTYPE html>
<html lang="es">

<head>
    <title>Registrar Empresa</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="description" content="">
    <meta name="author" content="">
    <!- LLAMADA DE LOS ARCHIVOS NECESARIOS PARA DISEÑO Y FUNCIONES BASE DE LA VISTA -!>

        <?php include_once "../../assest/config/urlHead.php"; ?>
        <script type="text/javascript">
            //VALIDACION DE FORMULARIO
            function validacion() {

                RUTEMPRESA = document.getElementById("RUTEMPRESA").value;
                DVEMPRESA = document.getElementById("DVEMPRESA").value;
                NOMBREMPRESA = document.getElementById("NOMBREMPRESA").value;
                RAZONSOCIAL = document.getElementById("RAZONSOCIAL").value;
                GIRO = document.getElementById("GIRO").value;
                DIRECCION = document.getElementById("DIRECCION").value;

                CIUDAD = document.getElementById("CIUDAD").selectedIndex;
                TELEFONO = document.getElementById("TELEFONO").value;
                ENCARGADODECOMPRA = document.getElementById("ENCARGADODECOMPRA").value;

                document.getElementById('val_rut_empresa').innerHTML = "";
                document.getElementById('val_dv_empresa').innerHTML = "";
                document.getElementById('val_nombree').innerHTML = "";
                document.getElementById('val_giro').innerHTML = "";
                document.getElementById('val_razonsocial').innerHTML = "";
                document.getElementById('val_direccion').innerHTML = "";
                document.getElementById('val_ciudad').innerHTML = "";
                document.getElementById('val_telefono').innerHTML = "";
                document.getElementById('val_encargado_compra').innerHTML = "";

                document.getElementById('val_img_empresa').innerHTML = "";


                if (RUTEMPRESA == null || RUTEMPRESA.length == 0 || /^\s+$/.test(RUTEMPRESA)) {
                    document.form_reg_dato.RUTEMPRESA.focus();
                    document.form_reg_dato.RUTEMPRESA.style.borderColor = "#FF0000";
                    document.getElementById('val_rut_empresa').innerHTML = "NO A INGRESADO DATO";
                    return false;
                }
                document.form_reg_dato.RUTEMPRESA.style.borderColor = "#4AF575";


                if (DVEMPRESA == null || DVEMPRESA.length == 0 || /^\s+$/.test(DVEMPRESA)) {
                    document.form_reg_dato.DVEMPRESA.focus();
                    document.form_reg_dato.DVEMPRESA.style.borderColor = "#FF0000";
                    document.getElementById('val_dv_empresa').innerHTML = "NO A INGRESADO DATO";
                    return false;
                }
                document.form_reg_dato.DVEMPRESA.style.borderColor = "#4AF575";


                if (NOMBREMPRESA == null || NOMBREMPRESA.length == 0 || /^\s+$/.test(NOMBREMPRESA)) {
                    document.form_reg_dato.NOMBREMPRESA.focus();
                    document.form_reg_dato.NOMBREMPRESA.style.borderColor = "#FF0000";
                    document.getElementById('val_nombree').innerHTML = "NO A INGRESADO DATO";
                    return false;
                }
                document.form_reg_dato.NOMBREMPRESA.style.borderColor = "#4AF575";



                if (GIRO == null || GIRO.length == 0 || /^\s+$/.test(GIRO)) {
                    document.form_reg_dato.GIRO.focus();
                    document.form_reg_dato.GIRO.style.borderColor = "#FF0000";
                    document.getElementById('val_giro').innerHTML = "NO A INGRESADO DATO";
                    return false;
                }
                document.form_reg_dato.GIRO.style.borderColor = "#4AF575";


                if (RAZONSOCIAL == null || RAZONSOCIAL.length == 0 || /^\s+$/.test(RAZONSOCIAL)) {
                    document.form_reg_dato.RAZONSOCIAL.focus();
                    document.form_reg_dato.RAZONSOCIAL.style.borderColor = "#FF0000";
                    document.getElementById('val_razonsocial').innerHTML = "NO A INGRESADO DATO";
                    return false;
                }
                document.form_reg_dato.RAZONSOCIAL.style.borderColor = "#4AF575";

                if (DIRECCION == null || DIRECCION.length == 0 || /^\s+$/.test(DIRECCION)) {
                    document.form_reg_dato.DIRECCION.focus();
                    document.form_reg_dato.DIRECCION.style.borderColor = "#FF0000";
                    document.getElementById('val_direccion').innerHTML = "NO A INGRESADO DATO";
                    return false;
                }
                document.form_reg_dato.DIRECCION.style.borderColor = "#4AF575";



                if (CIUDAD == null || CIUDAD == 0) {
                    document.form_reg_dato.CIUDAD.focus();
                    document.form_reg_dato.CIUDAD.style.borderColor = "#FF0000";
                    document.getElementById('val_ciudad').innerHTML = "NO HA SELECCIONADO  NINGUNA ALTERNATIVA";
                    return false;
                }
                document.form_reg_dato.CIUDAD.style.borderColor = "#4AF575";


                if (TELEFONO == null || TELEFONO == 0) {
                    document.form_reg_dato.TELEFONO.focus();
                    document.form_reg_dato.TELEFONO.style.borderColor = "#FF0000";
                    document.getElementById('val_telefono').innerHTML = "NO A INGRESADO DATO";
                    return false;
                }
                document.form_reg_dato.TELEFONO.style.borderColor = "#4AF575";

                if (ENCARGADODECOMPRA == null || ENCARGADODECOMPRA.length == 0 || /^\s+$/.test(ENCARGADODECOMPRA)) {
                    document.form_reg_dato.ENCARGADODECOMPRA.focus();
                    document.form_reg_dato.ENCARGADODECOMPRA.style.borderColor = "#FF0000";
                    document.getElementById('val_encargado_compra').innerHTML = "NO A INGRESADO DATO";
                    return false;
                }
                document.form_reg_dato.ENCARGADODECOMPRA.style.borderColor = "#4AF575";

            }


            //REDIRECCIONAR A LA PAGINA SELECIONADA
            function irPagina(url) {
                location.href = "" + url;
            }

        </script>
</head>

<body class="hold-transition light-skin fixed sidebar-mini theme-primary" >
    <div class="wrapper">
        <!- LLAMADA AL MENU PRINCIPAL DE LA PAGINA-!>
            <?php include_once "../../assest/config/menuExpo.php"; ?>

            <!-- Content Wrapper. Contains page content -->
            <div class="content-wrapper">
                <div class="container-full">

                    <!-- Content Header (Page header) -->
                    <div class="content-header">
                        <div class="d-flex align-items-center">
                            <div class="mr-auto">
                                <h3 class="page-title">Principal</h3>
                                <div class="d-inline-block align-items-center">
                                    <nav>
                                        <ol class="breadcrumb">
                                            <li class="breadcrumb-item"><a href="index.php"><i class="mdi mdi-home-outline"></i></a></li>
                                            <li class="breadcrumb-item" aria-current="page">Mantenedores</li>
                                            <li class="breadcrumb-item" aria-current="page">Principal</li>
                                            <li class="breadcrumb-item active" aria-current="page"> <a href="#">Registro Empresa </a>
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
                            <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12 col-xs-12">
                                <div class="box">
                                    <div class="box-header with-border bg-primary">                                
                                        <h4 class="box-title">Registro Empresa</h4>                                
                                    </div>
                                    <!-- /.box-header -->
                                    <form class="form" role="form" method="post" id="form_reg_dato" name="form_reg_dato" enctype="multipart/form-data">
                                        <div class="box-body">
                                            <hr class="my-15">
                                            <div class="row">
                                                 <div class="col-xxl-4 col-xl-4 col-lg-4 col-md-4 col-sm-4 col-4 col-xs-4">
                                                    <div class="form-group">
                                                        <label>Rut </label>
                                                        <input type="hidden" class="form-control" placeholder="ID" id="ID" name="ID" value="<?php echo $IDOP; ?>" />
                                                        <input type="text" class="form-control" placeholder="Rut Empresa" id="RUTEMPRESA" name="RUTEMPRESA" value="<?php echo $RUTEMPRESA; ?>" <?php echo $DISABLED; ?> />
                                                        <label id="val_rut_empresa" class="validacion"> </label>
                                                    </div>
                                                </div>
                                                 <div class="col-xxl-2 col-xl-2 col-lg-2 col-md-2 col-sm-2 col-2 col-xs-2">
                                                    <div class="form-group">
                                                        <label>DV </label>
                                                        <input type="text" class="form-control" placeholder="DV Empresa" id="DVEMPRESA" name="DVEMPRESA" value="<?php echo $DVEMPRESA; ?>" <?php echo $DISABLED; ?> />
                                                        <label id="val_dv_empresa" class="validacion"> </label>
                                                    </div>
                                                </div>
                                                 <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6 col-xs-6">
                                                    <div class="form-group">
                                                        <label> Nombre </label>
                                                        <input type="text" class="form-control" placeholder="Nombre Empresa a Mostrar " id="NOMBREMPRESA" name="NOMBREMPRESA" value="<?php echo $NOMBREMPRESA; ?>" <?php echo $DISABLED; ?> />
                                                        <label id="val_nombree" class="validacion"> </label>
                                                    </div>
                                                </div>
                                                 <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6 col-xs-6">
                                                    <div class="form-group">
                                                        <label>Giro</label>
                                                        <input type="text" class="form-control" placeholder="Giro" id="GIRO" name="GIRO" value="<?php echo $GIRO; ?>" <?php echo $DISABLED; ?> />
                                                        <label id="val_giro" class="validacion"> </label>
                                                    </div>
                                                </div>
                                                 <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6 col-xs-6">
                                                    <div class="form-group">
                                                        <label>Razon Social</label>
                                                        <input type="text" class="form-control" placeholder="Razon Social" id="RAZONSOCIAL" name="RAZONSOCIAL" value="<?php echo $RAZONSOCIAL; ?>" <?php echo $DISABLED; ?> />
                                                        <label id="val_razonsocial" class="validacion"> </label>
                                                    </div>
                                                </div>
                                                 <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6 col-xs-6">
                                                    <div class="form-group">
                                                        <label>Direccion</label>
                                                        <input type="text" class="form-control" placeholder="Direccion" id="DIRECCION" name="DIRECCION" value="<?php echo $DIRECCION; ?>" <?php echo $DISABLED; ?> />
                                                        <label id="val_direccion" class="validacion"> </label>
                                                    </div>
                                                </div>
                                                 <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6 col-xs-6">
                                                    <div class="form-group">
                                                        <label>Ciudad</label>
                                                        <select class="form-control select2" id="CIUDAD" name="CIUDAD" style="width: 100%;" value="<?php echo $CIUDAD; ?>" <?php echo $DISABLED; ?>>
                                                            <option></option>
                                                            <?php foreach ($ARRAYCIUDAD as $r) : ?>
                                                                <?php if ($ARRAYCIUDAD) {    ?>
                                                                    <option value="<?php echo $r['ID_CIUDAD']; ?>" <?php if ($CIUDAD == $r['ID_CIUDAD']) {
                                                                                                                        echo "selected";
                                                                                                                    } ?>>
                                                                        <?php echo $r['NOMBRE_CIUDAD'] ?>
                                                                    </option>
                                                                <?php } else { ?>
                                                                    <option>No Hay Datos Registrados </option>
                                                                <?php } ?>
                                                            <?php endforeach; ?>
                                                        </select>
                                                        <label id="val_ciudad" class="validacion"> </label>
                                                    </div>
                                                </div>
                                                <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6 col-xs-6">                                            
                                                    <div class="form-group">
                                                        <label>Telefono</label>
                                                        <input type="number" class="form-control" placeholder="Telefono" id="TELEFONO" name="TELEFONO" value="<?php echo $TELEFONO; ?>" <?php echo $DISABLED; ?> />
                                                        <label id="val_telefono" class="validacion"> </label>
                                                    </div>
                                                </div>
                                                <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6 col-xs-6">
                                                    <div class="form-group">
                                                        <label>Encargado de Compra</label>
                                                        <input type="text" class="form-control" placeholder="Encargado de Compra" id="ENCARGADODECOMPRA" name="ENCARGADODECOMPRA" value="<?php echo $ENCARGADODECOMPRA; ?>" <?php echo $DISABLED; ?> />
                                                        <label id="val_encargado_compra" class="validacion"> </label>
                                                    </div>
                                                </div>  
                                                <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6 col-xs-6">     
                                                    <div class="form-group">
                                                        <label>Seleccion Imagen</label>
                                                        <label class="file">
                                                            <input type="file" placeholder="IMG" id="LOGOEMPRESA" name="LOGOEMPRESA" values="<?php echo $LOGOEMPRESA; ?>"  />
                                                        </label>
                                                        <label id="val_img_empresa" class="validacion"><?php echo $MENSAJE2; ?> </label>
                                                        <?php if ($URL_IMG) { ?>
                                                            <img src="<?php echo  $URL_IMG; ?>" alt="Logo Empresa" class="rounded mx-auto d-block" style="max-width:100px; max-height:100px;width: auto;height: auto;">
                                                        <?php } else { ?>
                                                            <img src="../../assest/img/empresa/no_disponible.png" alt="Logo Empresa" class="rounded mx-auto d-block" style="max-width:100px; max-height:100px;width: auto;height: auto;">
                                                        <?php } ?>
                                                        <input type="hidden" id="URLIMG" name="URLIMG" value="<?php echo $URL_IMG; ?>" />
                                                    </div>
                                                </div>                                                                                      
                                            </div>
                                        </div>
                                        <!-- /.box-body -->                                        
                                        <div class="box-footer">
                                            <div class="btn-group   col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12 col-xs-12 " role="group" aria-label="Acciones generales">                                    
                                                <button type="button" class="btn  btn-warning " data-toggle="tooltip" title="Cancelar" name="CANCELAR" value="CANCELAR" Onclick="irPagina('registroEmpresa.php');">
                                                <i class="ti-trash"></i>Cancelar
                                                </button>
                                                <?php if ($OP != "editar") { ?>
                                                    <button type="submit" class="btn btn-primary" name="GUARDAR" value="GUARDAR"  data-toggle="tooltip" title="Guardar"  <?php echo $DISABLED; ?> Onclick="return validacion()">
                                                        <i class="ti-save-alt"></i> Guardar
                                                    </button>
                                                <?php } else { ?>
                                                    <button type="submit" class="btn btn-primary" name="EDITAR" value="EDITAR"   data-toggle="tooltip" title="Guardar" Onclick="return validacion()">
                                                        <i class="ti-save-alt"></i> Guardar
                                                    </button>
                                                <?php } ?>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <!-- /.box -->
                            </div>
                            <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12 col-xs-12">
                                <div class="box">
                                    <div class="box-header with-border bg-info">
                                        <h4 class="box-title"> Agrupado Empresa</h4>
                                    </div>
                                    <div class="box-body">
                                        <div class="table-responsive">
                                            <table id="listar" class="table-hover " style="width: 100%;">
                                                <thead>
                                                    <tr>
                                                        <th>Rut Empresa</th>
                                                        <th>Nombre Empresa</th>
                                                        <th class="text-center">Operaciónes</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php foreach ($ARRAYEMPRESA as $r) : ?>
                                                        <tr class="center">
                                                            <td>
                                                                <a href="#" class="text-warning hover-warning">
                                                                    <?php echo $r['RUT_EMPRESA']; ?>-<?php echo $r['DV_EMPRESA']; ?>
                                                                </a>
                                                            </td>
                                                            <td><?php echo $r['NOMBRE_EMPRESA']; ?></td>                                                                                       
                                                            <td class="text-center">
                                                                <form method="post" id="form1">
                                                                    <div class="list-icons d-inline-flex">
                                                                        <div class="list-icons-item dropdown">
                                                                            <button class="btn btn-secondary" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                                <span class="icon-copy ti-settings"></span>
                                                                            </button>
                                                                            <div class="dropdown-menu dropdown-menu-right">
                                                                                <input type="hidden" class="form-control" placeholder="ID" id="ID" name="ID" value="<?php echo $r['ID_EMPRESA']; ?>" />
                                                                                <input type="hidden" class="form-control" placeholder="URL" id="URL" name="URL" value="registroEmpresa" />
                                                                                <span href="#" class="dropdown-item" data-toggle="tooltip" title="Ver">
                                                                                    <button type="submit" class="btn btn-info btn-block  btn-sm" id="VERURL" name="VERURL">
                                                                                        <i class="ti-eye"></i> Ver
                                                                                    </button>
                                                                                </span> 
                                                                                <span href="#" class="dropdown-item" data-toggle="tooltip" title="Editar">
                                                                                    <button type="submit" class="btn  btn-warning btn-block   btn-sm" id="EDITARURL" name="EDITARURL">
                                                                                        <i class="ti-pencil-alt"></i> Editar
                                                                                    </button>
                                                                                </span>
                                                                                <?php if ($r['ESTADO_REGISTRO'] == 1) { ?>
                                                                                    <span href="#" class="dropdown-item" data-toggle="tooltip" title="Desahabilitar">
                                                                                        <button type="submit" class="btn btn-block btn-danger btn-sm" id="ELIMINARURL" name="ELIMINARURL">
                                                                                            <i class="ti-na "></i> Desahabilitar
                                                                                        </button>
                                                                                    </span>
                                                                                <?php } ?>
                                                                                <?php if ($r['ESTADO_REGISTRO'] == 0) { ?>
                                                                                    <span href="#" class="dropdown-item" data-toggle="tooltip" title="Habilitar">
                                                                                        <button type="submit" class="btn btn-block btn-success btn-sm" id="HABILITARURL" name="HABILITARURL">
                                                                                            <i class="ti-check "></i> Habilitar
                                                                                        </button>
                                                                                    </span>
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
                <?php include_once "../../assest/config/footer.php"; ?>
                <?php include_once "../../assest/config/menuExtraExpo.php"; ?>
    </div>
    <!- LLAMADA URL DE ARCHIVOS DE DISEÑO Y JQUERY E OTROS -!>
        <?php include_once "../../assest/config/urlBase.php"; ?>
        <?php 
            
            //OPERACIONES
            //OPERACION DE REGISTRO DE FILA
            if (isset($_REQUEST['GUARDAR'])) {


                //OPERACION DE SUBIR IMAGEN AL SERVIDOR
                if ($_FILES['LOGOEMPRESA']) {
                    $SUBIRIMG = $SUBIR->subirImg($_FILES['LOGOEMPRESA'], $_REQUEST['RUTEMPRESA'], $DIRECTORIODESTINO);
                    $URL_IMG = $SUBIRIMG['UBICACION'] . $SUBIRIMG['NOMBREARCHIVO'] . $SUBIRIMG['FORMATO'];
                    $MENSAJE2 = $SUBIRIMG['MENSAJE'];
                }
                if ($URL_IMG == "") {
                    $URL_IMG = "";
                }



                //UTILIZACION METODOS SET DEL MODELO
                //SETEO DE ATRIBUTOS DE LA CLASE, OBTENIDO EN EL FORMULARIO   
                $EMPRESA->__SET('RUT_EMPRESA', $_REQUEST['RUTEMPRESA']);
                $EMPRESA->__SET('DV_EMPRESA', $_REQUEST['DVEMPRESA']);
                $EMPRESA->__SET('NOMBRE_EMPRESA', $_REQUEST['NOMBREMPRESA']);
                $EMPRESA->__SET('RAZON_SOCIAL_EMPRESA', $_REQUEST['RAZONSOCIAL']);
                $EMPRESA->__SET('DIRECCION_EMPRESA', $_REQUEST['DIRECCION']);
                $EMPRESA->__SET('GIRO_EMPRESA', $_REQUEST['GIRO']);
                $EMPRESA->__SET('TELEFONO_EMPRESA', $_REQUEST['TELEFONO']);
                $EMPRESA->__SET('ENCARGADO_COMPRA_EMPRESA', $_REQUEST['ENCARGADODECOMPRA']);
                $EMPRESA->__SET('LOGO_EMPRESA', $URL_IMG);
                $EMPRESA->__SET('ID_CIUDAD', $_REQUEST['CIUDAD']);
                $EMPRESA->__SET('ID_USUARIOI', $IDUSUARIOS);
                $EMPRESA->__SET('ID_USUARIOM', $IDUSUARIOS);
                //LLAMADA AL METODO DE EDICION DEL CONTROLADOR
                $EMPRESA_ADO->agregarEmpresa($EMPRESA);
                //REDIRECCIONAR A PAGINA registroEmpresa.php
                echo '<script>
                    Swal.fire({
                        icon:"success",
                        title:"Registro Creado",
                        text:"El registro del mantenedor se ha creado correctamente",
                        showConfirmButton: true,
                        confirmButtonText:"Cerrar",
                        closeOnConfirm:false
                    }).then((result)=>{
                         location.href = "registroEmpresa.php";                            
                    })
                </script>';
            }
            //OPERACION DE EDICION DE FILA
            if (isset($_REQUEST['EDITAR'])) {

                //OPERACION DE SUBIR IMAGEN AL SERVIDOR
                if ($_FILES['LOGOEMPRESA']) {
                    $SUBIRIMG = $SUBIR->subirImg($_FILES['LOGOEMPRESA'], $_REQUEST['RUTEMPRESA'], $DIRECTORIODESTINO);
                    $URL_IMG = $SUBIRIMG['UBICACION'] . $SUBIRIMG['NOMBREARCHIVO'] . $SUBIRIMG['FORMATO'];
                    $MENSAJE2 = $SUBIRIMG['MENSAJE'];
                }

                if ($URL_IMG == "") {

                    $URL_IMG = $_REQUEST['URLIMG'];
                }

                //UTILIZACION METODOS SET DEL MODELO
                //SETEO DE ATRIBUTOS DE LA CLASE, OBTENIDO EN EL FORMULARIO  

                $EMPRESA->__SET('RUT_EMPRESA', $_REQUEST['RUTEMPRESA']);
                $EMPRESA->__SET('DV_EMPRESA', $_REQUEST['DVEMPRESA']);
                $EMPRESA->__SET('NOMBRE_EMPRESA', $_REQUEST['NOMBREMPRESA']);
                $EMPRESA->__SET('RAZON_SOCIAL_EMPRESA', $_REQUEST['RAZONSOCIAL']);
                $EMPRESA->__SET('DIRECCION_EMPRESA', $_REQUEST['DIRECCION']);
                $EMPRESA->__SET('GIRO_EMPRESA', $_REQUEST['GIRO']);
                $EMPRESA->__SET('TELEFONO_EMPRESA', $_REQUEST['TELEFONO']);
                $EMPRESA->__SET('ENCARGADO_COMPRA_EMPRESA', $_REQUEST['ENCARGADODECOMPRA']);
                $EMPRESA->__SET('LOGO_EMPRESA', $URL_IMG);
                $EMPRESA->__SET('ID_CIUDAD', $_REQUEST['CIUDAD']);
                $EMPRESA->__SET('ID_USUARIOM', $IDUSUARIOS);
                $EMPRESA->__SET('ID_EMPRESA', $_REQUEST['ID']);
                //LLAMADA AL METODO DE EDICION DEL CONTROLADOR
                $EMPRESA_ADO->actualizarEmpresa($EMPRESA);
                //REDIRECCIONAR A PAGINA registroEmpresa.php
                echo '<script>
                    Swal.fire({
                        icon:"success",
                        title:"Registro Modificado",
                        text:"El registro del mantenedor se ha Modificado correctamente",
                        showConfirmButton: true,
                        confirmButtonText:"Cerrar",
                        closeOnConfirm:false
                    }).then((result)=>{
                        location.href = "registroEmpresa.php";                            
                    })
                </script>';
            }

        
        ?>
</body>
</html>