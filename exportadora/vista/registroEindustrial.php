<?php

include_once "../../assest/config/validarUsuarioExpo.php";

//LLAMADA ARCHIVOS NECESARIOS PARA LAS OPERACIONES
include_once '../../assest/controlador/ESPECIES_ADO.php';
include_once '../../assest/controlador/PRODUCTO_ADO.php';



include_once '../../assest/controlador/EINDUSTRIAL_ADO.php';
include_once '../../assest/modelo/EINDUSTRIAL.php';


//INCIALIZAR LAS VARIBLES
//INICIALIZAR CONTROLADOR

$ESPECIES_ADO =  new ESPECIES_ADO();
$EINDUSTRIAL_ADO =  new EINDUSTRIAL_ADO();

$PRODUCTO_ADO =  new PRODUCTO_ADO();
//INIICIALIZAR MODELO
$EINDUSTRIAL =  new EINDUSTRIAL();

//INCIALIZAR VARIBALES A OCUPAR PARA LA FUNCIONALIDAD



$CODIGOESTANDAR = "";
$NOMBRESTANDAR = "";
$ESPECIES = "";
$TAINDUSTRIAL = "";
$ESTADO = "";
$PRODUCTO="";

$COBRO="";
$TESTANDAR="";
$ENVASEESTANDAR = "";
$PESOENVASESTANDAR = "";
$PESOPALLETESTANDAR = "";

$IDOP = "";
$OP = "";
$DISABLED = "";

$NOMBRE = "";
$MENSAJE = "";
$FOCUS = "";
$MENSAJE2 = "";
$FOCUS2 = "";
$BORDER = "";

//INICIALIZAR ARREGLOS
$ARRAYESTANDAR = "";
$ARRAYESTANDARID = "";

$ARRAYESPECIES = "";
$ARRAYPRODUCTO = "";
$ARRAYTAINDUSTRIAL = "";


//DEFINIR ARREGLOS CON LOS DATOS OBTENIDOS DE LAS FUNCIONES DE LOS CONTROLADORES
$ARRAYESTANDAR = $EINDUSTRIAL_ADO->listarEstandarPorEmpresaCBX($EMPRESAS);
$ARRAYPRODUCTO= $PRODUCTO_ADO->listarProductoPorEmpresaCBX($EMPRESAS);
$ARRAYESPECIES = $ESPECIES_ADO->listarEspeciesCBX();
include_once "../../assest/config/validarDatosUrl.php";
include_once "../../assest/config/datosUrl.php";




//OBTENCION DE DATOS ENVIADOR A LA URL
//PARA OPERACIONES DE EDICION Y VISUALIZACION
//PREGUNTA SI LA URL VIENE  CON DATOS "parametro" y "parametro1"
if (isset($_SESSION['parametro']) && isset($_SESSION['parametro1'])) {
    //ALMACENAR DATOS DE VARIABLES DE LA URL
    $IDOP = $_SESSION['parametro'];
    $OP = $_SESSION['parametro1'];


    //IDENTIFICACIONES DE OPERACIONES    //OPERACION DE CAMBIO DE ESTADO
    //0 = DESACTIVAR
    if ($OP == "0") {

        $EINDUSTRIAL->__SET('ID_ESTANDAR', $IDOP);
        $EINDUSTRIAL_ADO->deshabilitar($EINDUSTRIAL);

        echo "<script type='text/javascript'> location.href ='registroEindustrial.php';</script>";
    }
    //1 = ACTIVAR
    if ($OP == "1") {

        $EINDUSTRIAL->__SET('ID_ESTANDAR', $IDOP);
        $EINDUSTRIAL_ADO->habilitar($EINDUSTRIAL);
        echo "<script type='text/javascript'> location.href ='registroEindustrial.php';</script>";
    }
    //editar =  OBTENCION DE DATOS PARA LA EDICION DE REGISTRO
    if ($OP == "editar") {
        //OBTENCION DE INFORMACIOND DE LA FILA DEL REGISTRO
        //ALMACENAR INFORMACION EN ARREGLO
        //LLAMADA A LA FUNCION DE CONTROLADOR verPlanta(ID), 
        //SE LE PASE UNO DE LOS DATOS OBTENIDO PREVIAMENTE A TRAVEZ DE LA URL
        $ARRAYESTANDARID = $EINDUSTRIAL_ADO->verEstandar($IDOP);
        //OBTENCIONS DE LOS DATODS DE LA COLUMNAS DE LA FILA OBTENIDA
        //PASAR DATOS OBTENIDOS A VARIABLES QUE SE VISUALIZAR EN EL FORMULARIO DE LA VISTA


        foreach ($ARRAYESTANDARID as $r) :

            $CODIGOESTANDAR = "" . $r['CODIGO_ESTANDAR'];
            $NOMBRESTANDAR = "" . $r['NOMBRE_ESTANDAR'];
            $ENVASEESTANDAR = "" . $r['CANTIDAD_ENVASE_ESTANDAR'];
            $PESOENVASEESTANDAR = "" . $r['PESO_ENVASE_ESTANDAR'];
            $PESOPALLETESTANDAR = "" . $r['PESO_PALLET_ESTANDAR'];
            $TESTANDAR = "" . $r['TESTANDAR'];
            $COBRO = "" . $r['COBRO'];
            $ESPECIES = "" . $r['ID_ESPECIES'];
            $PRODUCTO = "" . $r['ID_PRODUCTO'];

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
        $ARRAYESTANDARID = $EINDUSTRIAL_ADO->verEstandar($IDOP);
        //OBTENCIONS DE LOS DATODS DE LA COLUMNAS DE LA FILA OBTENIDA
        //PASAR DATOS OBTENIDOS A VARIABLES QUE SE VISUALIZAR EN EL FORMULARIO DE LA VISTA
        foreach ($ARRAYESTANDARID as $r) :

            $CODIGOESTANDAR = "" . $r['CODIGO_ESTANDAR'];
            $NOMBRESTANDAR = "" . $r['NOMBRE_ESTANDAR'];
            $ENVASEESTANDAR = "" . $r['CANTIDAD_ENVASE_ESTANDAR'];
            $PESOENVASESTANDAR = "" . $r['PESO_ENVASE_ESTANDAR'];
            $PESOPALLETESTANDAR = "" . $r['PESO_PALLET_ESTANDAR'];
            $TESTANDAR = "" . $r['TESTANDAR'];
            $COBRO = "" . $r['COBRO'];
            $ESPECIES = "" . $r['ID_ESPECIES'];
            $PRODUCTO = "" . $r['ID_PRODUCTO'];


        endforeach;
    }
}

if (isset($_POST)) {

    if (isset($_REQUEST['CODIGOESTANDAR'])) {
        $CODIGOESTANDAR = "" . $_REQUEST['CODIGOESTANDAR'];
    }
    if (isset($_REQUEST['NOMBRESTANDAR'])) {
        $NOMBRESTANDAR = "" . $_REQUEST['NOMBRESTANDAR'];
    }
    if (isset($_REQUEST['TESTANDAR'])) {
        $TESTANDAR = "" . $_REQUEST['TESTANDAR'];
        if($TESTANDAR==0){            
            if (isset($_REQUEST['COBRO'])) {
                $COBRO = "" . $_REQUEST['COBRO'];
            }
        }
        if($TESTANDAR==1){
            if (isset($_REQUEST['PESOENVASEESTANDAR'])) {
                $PESOENVASEESTANDAR = "" . $_REQUEST['PESOENVASEESTANDAR'];
            }
            if (isset($_REQUEST['ENVASEESTANDAR'])) {
                $ENVASEESTANDAR = "" . $_REQUEST['ENVASEESTANDAR'];
            }
            if (isset($_REQUEST['PESOPALLETESTANDAR'])) {
                $PESOPALLETESTANDAR = "" . $_REQUEST['PESOPALLETESTANDAR'];
            }
        }        
    }    
    if (isset($_REQUEST['PRODUCTO'])) {
        $PRODUCTO = "" . $_REQUEST['PRODUCTO'];
    }
    if (isset($_REQUEST['ESPECIES'])) {
        $ESPECIES = "" . $_REQUEST['ESPECIES'];
    }



}





?>


<!DOCTYPE html>
<html lang="es">

<head>
    <title>Registro Estandar Industrial</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="description" content="">
    <meta name="author" content="">
    <!- LLAMADA DE LOS ARCHIVOS NECESARIOS PARA DISEÑO Y FUNCIONES BASE DE LA VISTA -!>
        <?php include_once "../../assest/config/urlHead.php"; ?>
        <!- FUNCIONES BASES -!>
            <script type="text/javascript">
                //VALIDACION DE FORMULARIO


               

                function validacion() {




                    CODIGOESTANDAR = document.getElementById("CODIGOESTANDAR").value;
                    NOMBRESTANDAR = document.getElementById("NOMBRESTANDAR").value;
                    TESTANDAR = document.getElementById("TESTANDAR").selectedIndex;
                    ESPECIES = document.getElementById("ESPECIES").selectedIndex;
                 //   PRODUCTO = document.getElementById("PRODUCTO").selectedIndex;


                    document.getElementById('val_codigo').innerHTML = "";
                    document.getElementById('val_nombre').innerHTML = "";
                    document.getElementById('val_testandar').innerHTML = "";
                    document.getElementById('val_especies').innerHTML = "";
                 //   document.getElementById('val_producto').innerHTML = "";


                    if (CODIGOESTANDAR == null || CODIGOESTANDAR == 0) {
                        document.form_reg_dato.CODIGOESTANDAR.focus();
                        document.form_reg_dato.CODIGOESTANDAR.style.borderColor = "#FF0000";
                        document.getElementById('val_codigo').innerHTML = "NO A INGRESADO DATO";
                        return false;
                    }
                    document.form_reg_dato.CODIGOESTANDAR.style.borderColor = "#4AF575";

                    if (NOMBRESTANDAR == null || NOMBRESTANDAR == 0) {
                        document.form_reg_dato.NOMBRESTANDAR.focus();
                        document.form_reg_dato.NOMBRESTANDAR.style.borderColor = "#FF0000";
                        document.getElementById('val_nombre').innerHTML = "NO A INGRESADO DATO";
                        return false;
                    }
                    document.form_reg_dato.NOMBRESTANDAR.style.borderColor = "#4AF575";
                    if(TESTANDAR==0){                        
                        COBRO = document.getElementById("COBRO").selectedIndex;
                        document.getElementById('val_cobro').innerHTML = "";
                    
                        if (COBRO == null ) {
                            document.form_reg_dato.COBRO.focus();
                            document.form_reg_dato.COBRO.style.borderColor = "#FF0000";
                            document.getElementById('val_cobro').innerHTML = "NO HA SELECCIONADO  NINGUNA ALTERNATIVA";
                            return false;
                        }
                        document.form_reg_dato.COBRO.style.borderColor = "#4AF575";
                    }
                    if(TESTANDAR==1){
                        ENVASEESTANDAR = document.getElementById("ENVASEESTANDAR").value;
                        PESOPALLETESTANDAR = document.getElementById("PESOPALLETESTANDAR").value;
                        PESOENVASEESTANDAR = document.getElementById("PESOENVASEESTANDAR").value;
                        
                        document.getElementById('val_cajapee').innerHTML = "";
                        document.getElementById('val_envase').innerHTML = "";
                        document.getElementById('val_pallet').innerHTML = "";

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

                    }
                    
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

            </script>
</head>

<body class="hold-transition light-skin  sidebar-mini theme-primary" >
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
                                <h3 class="page-title">Estandar</h3>
                                <div class="d-inline-block align-items-center">
                                    <nav>
                                        <ol class="breadcrumb">
                                            <li class="breadcrumb-item"><a href="index.php"><i class="mdi mdi-home-outline"></i></a></li>
                                            <li class="breadcrumb-item" aria-current="page">Mantenedores </li>
                                            <li class="breadcrumb-item" aria-current="page">Estandar </li>
                                            <li class="breadcrumb-item active" aria-current="page"> <a href="registroEindustrial.php">Registro Estandar Industrial </a> </li>
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
                                        <h4 class="box-title">Registro Estandar Industria</h4>                                        
                                    </div>
                                    <!-- /.box-header -->
                                    <form class="form" role="form" method="post" name="form_reg_dato" id="form_reg_dato">
                                        <div class="box-body">
                                            <hr class="my-15">
                                            <div class="row">
                                                 <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6 col-xs-6">
                                                    <div class="form-group">
                                                        <label>Codigo </label>
                                                        <input type="hidden" class="form-control" placeholder="ID" id="ID" name="ID" value="<?php echo $IDOP; ?>" />
                                                        <input type="hidden" class="form-control" placeholder="EMPRESA" id="EMPRESA" name="EMPRESA" value="<?php echo $EMPRESAS; ?>" />
                                                        <input type="text" class="form-control" placeholder="Codigo Estandar" id="CODIGOESTANDAR" name="CODIGOESTANDAR" value="<?php echo $CODIGOESTANDAR; ?>" <?php echo $DISABLED; ?> />
                                                        <label id="val_codigo" class="validacion"> </label>
                                                    </div>
                                                </div>
                                                 <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6 col-xs-6">
                                                    <div class="form-group">
                                                        <label>Nombre </label>
                                                        <input type="text" class="form-control" placeholder="Nombre Estandar " id="NOMBRESTANDAR" name="NOMBRESTANDAR" value="<?php echo $NOMBRESTANDAR; ?>" <?php echo $DISABLED; ?> />
                                                        <label id="val_nombre" class="validacion"> </label>
                                                    </div>
                                                </div>
                                                 <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6 col-xs-6">
                                                    <div class="form-group">
                                                        <label>Tipo Estandar</label>
                                                        <select class="form-control select2" id="TESTANDAR" name="TESTANDAR" style="width: 100%;" onchange="this.form.submit()" value="<?php echo $TESTANDAR; ?>" <?php echo $DISABLED; ?>>                                                            
                                                            <option value="0" <?php if ($TESTANDAR == 0) { echo "selected";  } ?>>  Proceso  </option>              
                                                            <option value="1" <?php if ($TESTANDAR == 1) { echo "selected";  } ?>>  Recepción  </option>                                                                                                                 
                                                        </select>  
                                                        <label id="val_testandar" class="validacion"> </label>
                                                    </div>
                                                </div>   
                                                <?php if ($TESTANDAR==0) {    ?> 
                                                 <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6 col-xs-6">
                                                        <div class="form-group">
                                                            <label>Cobro</label>
                                                            <select class="form-control select2" id="COBRO" name="COBRO" style="width: 100%;"  value="<?php echo $COBRO; ?>" <?php echo $DISABLED; ?>>                                                            
                                                                <option value="0" <?php if ($COBRO == 0) { echo "selected";  } ?>>  No  </option>              
                                                                <option value="1" <?php if ($COBRO == 1) { echo "selected";  } ?>>  Si  </option>                                                                                                                 
                                                            </select>  
                                                            <label id="val_cobro" class="validacion"> </label>
                                                        </div>
                                                </div>   
                                                <?php } ?>
                                                <?php if ($TESTANDAR==1) {    ?>    
                                                    <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6 col-xs-6">
                                                        <div class="form-group">
                                                            <label>Cantidad Envase</label>
                                                            <input type="number" class="form-control" placeholder="Cantidad Envase Estandar" id="ENVASEESTANDAR" name="ENVASEESTANDAR" value="<?php echo $ENVASEESTANDAR ?>" <?php echo $DISABLED; ?> />
                                                            <label id="val_cajapee" class="validacion"> </label>
                                                        </div>
                                                    </div>
                                                    <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6 col-xs-6">
                                                        <div class="form-group">
                                                            <label>Peso Envase</label>
                                                            <input type="number"  step="0.00001" class="form-control" placeholder="Peso Envase Estandar" id="PESOENVASEESTANDAR" name="PESOENVASEESTANDAR" value="<?php echo $PESOENVASEESTANDAR ?>" <?php echo $DISABLED; ?> />
                                                            <label id="val_envase" class="validacion"> </label>
                                                        </div>
                                                    </div>
                                                    <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6 col-xs-6">
                                                        <div class="form-group">
                                                            <label>Peso Pallet</label>
                                                            <input type="number" class="form-control" step="0.01" placeholder="Peso Envase Estandar" id="PESOPALLETESTANDAR" name="PESOPALLETESTANDAR" value="<?php echo $PESOPALLETESTANDAR ?>" <?php echo $DISABLED; ?> />
                                                            <label id="val_pallet" class="validacion"> </label>
                                                        </div>
                                                    </div>   
                                                <?php } ?>          
                                                 <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6 col-xs-6">
                                                    <div class="form-group">
                                                        <label> Especies</label>
                                                        <select class="form-control select2" id="ESPECIES" name="ESPECIES" style="width: 100%;" value="<?php echo $ESPECIES; ?>" <?php echo $DISABLED; ?>>
                                                            <option></option>
                                                            <?php foreach ($ARRAYESPECIES as $r) : ?>
                                                                <?php if ($ARRAYESPECIES) {    ?>
                                                                    <option value="<?php echo $r['ID_ESPECIES']; ?>" <?php if ($ESPECIES == $r['ID_ESPECIES']) { echo "selected";  } ?>>
                                                                        <?php echo $r['NOMBRE_ESPECIES'] ?>
                                                                    </option>
                                                                <?php } else { ?>
                                                                    <option>No Hay Datos Registrados </option>
                                                                <?php } ?>
                                                            <?php endforeach; ?>
                                                        </select>
                                                        <label id="val_especies" class="validacion"> </label>
                                                    </div>
                                                </div>                           
                                                 <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6 col-xs-6">
                                                    <div class="form-group">
                                                        <label> Producto</label>
                                                        <select class="form-control select2" id="PRODUCTO" name="PRODUCTO" style="width: 100%;" value="<?php echo $PRODUCTO; ?>" <?php echo $DISABLED; ?>>
                                                            <option></option>
                                                            <?php foreach ($ARRAYPRODUCTO as $r) : ?>
                                                                <?php if ($ARRAYPRODUCTO) {    ?>
                                                                    <option value="<?php echo $r['ID_PRODUCTO']; ?>" <?php if ($PRODUCTO == $r['ID_PRODUCTO']) {
                                                                                                                            echo "selected";
                                                                                                                        } ?>>
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
                                            <div class="btn-group   col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12 col-xs-12 " role="group" aria-label="Acciones generales">                                    
                                                <button type="button" class="btn  btn-warning " data-toggle="tooltip" title="Cancelar" name="CANCELAR" value="CANCELAR" Onclick="irPagina('registroEindustrial.php');">
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
                                        <h4 class="box-title"> Agrupado Estandar Industrial</h4>
                                    </div>
                                    <div class="box-body">
                                        <div class="table-responsive">
                                            <table id="listar" class="table-hover " style="width: 100%;">
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
                                                                            <button class="btn btn-secondary" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                                <span class="icon-copy ti-settings"></span>
                                                                            </button>
                                                                            <div class="dropdown-menu dropdown-menu-right">
                                                                                <input type="hidden" class="form-control" placeholder="ID" id="ID" name="ID" value="<?php echo $r['ID_ECOMERCIAL']; ?>" />
                                                                                <input type="hidden" class="form-control" placeholder="URL" id="URL" name="URL" value="registroEcomercial" />
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

                //UTILIZACION METODOS SET DEL MODELO
                //SETEO DE ATRIBUTOS DE LA CLASE, OBTENIDO EN EL FORMULARIO  
                $EINDUSTRIAL->__SET('CODIGO_ESTANDAR', $_REQUEST['CODIGOESTANDAR']);
                $EINDUSTRIAL->__SET('NOMBRE_ESTANDAR', $_REQUEST['NOMBRESTANDAR']);
                $EINDUSTRIAL->__SET('TESTANDAR', $_REQUEST['TESTANDAR']); 
                if($_REQUEST['TESTANDAR']==0){
                    $EINDUSTRIAL->__SET('COBRO', $_REQUEST['COBRO']); 
                }
                if($_REQUEST['TESTANDAR']==1){
                    $EINDUSTRIAL->__SET('COBRO', 1); 
                    $EINDUSTRIAL->__SET('CANTIDAD_ENVASE_ESTANDAR', $_REQUEST['ENVASEESTANDAR']);
                    $EINDUSTRIAL->__SET('PESO_ENVASE_ESTANDAR', $_REQUEST['PESOENVASEESTANDAR']);
                    $EINDUSTRIAL->__SET('PESO_PALLET_ESTANDAR', $_REQUEST['PESOPALLETESTANDAR']);
                }   
                $EINDUSTRIAL->__SET('ID_ESPECIES', $_REQUEST['ESPECIES']);
                $EINDUSTRIAL->__SET('ID_EMPRESA', $_REQUEST['EMPRESA']);
                $EINDUSTRIAL->__SET('ID_PRODUCTO', $_REQUEST['PRODUCTO']);
                $EINDUSTRIAL->__SET('ID_USUARIOI', $IDUSUARIOS);
                $EINDUSTRIAL->__SET('ID_USUARIOM', $IDUSUARIOS);
                //LLAMADA AL METODO DE REGISTRO DEL CONTROLADOR
                $EINDUSTRIAL_ADO->agregarEstandar($EINDUSTRIAL);
                //REDIRECCIONAR A PAGINA registroEexportacion.php
                echo '<script>
                    Swal.fire({
                        icon:"success",
                        title:"Registro Creado",
                        text:"El registro del mantenedor se ha creado correctamente",
                        showConfirmButton: true,
                        confirmButtonText:"Cerrar",
                        closeOnConfirm:false
                    }).then((result)=>{
                        location.href = "registroEindustrial.php";                            
                    })
                </script>';
            }

            //OPERACION DE EDICION DE FILA
            if (isset($_REQUEST['EDITAR'])) {

                //UTILIZACION METODOS SET DEL MODELO
                //SETEO DE ATRIBUTOS DE LA CLASE, OBTENIDO EN EL FORMULARIO   
                $EINDUSTRIAL->__SET('CODIGO_ESTANDAR', $_REQUEST['CODIGOESTANDAR']);
                $EINDUSTRIAL->__SET('NOMBRE_ESTANDAR', $_REQUEST['NOMBRESTANDAR']);
                $EINDUSTRIAL->__SET('TESTANDAR', $_REQUEST['TESTANDAR']);
                if($_REQUEST['TESTANDAR']==0){
                    $EINDUSTRIAL->__SET('COBRO', $_REQUEST['COBRO']); 
                }
                if($_REQUEST['TESTANDAR']==1){
                    $EINDUSTRIAL->__SET('COBRO', 1); 
                    $EINDUSTRIAL->__SET('CANTIDAD_ENVASE_ESTANDAR', $_REQUEST['ENVASEESTANDAR']);
                    $EINDUSTRIAL->__SET('PESO_ENVASE_ESTANDAR', $_REQUEST['PESOENVASEESTANDAR']);
                    $EINDUSTRIAL->__SET('PESO_PALLET_ESTANDAR', $_REQUEST['PESOPALLETESTANDAR']);
                }
                $EINDUSTRIAL->__SET('ID_ESPECIES', $_REQUEST['ESPECIES']);
                $EINDUSTRIAL->__SET('ID_EMPRESA', $_REQUEST['EMPRESA']);
                $EINDUSTRIAL->__SET('ID_PRODUCTO', $_REQUEST['PRODUCTO']);
                $EINDUSTRIAL->__SET('ID_USUARIOM', $IDUSUARIOS);
                $EINDUSTRIAL->__SET('ID_ESTANDAR', $_REQUEST['ID']);
                //LLAMADA AL METODO DE EDICION DEL CONTROLADOR
                $EINDUSTRIAL_ADO->actualizarEstandar($EINDUSTRIAL);
                //REDIRECCIONAR A PAGINA registroEexportacion.php
                echo '<script>
                    Swal.fire({
                        icon:"success",
                        title:"Registro Modificado",
                        text:"El registro del mantenedor se ha Modificado correctamente",
                        showConfirmButton: true,
                        confirmButtonText:"Cerrar",
                        closeOnConfirm:false
                    }).then((result)=>{
                        location.href = "registroEindustrial.php";                            
                    })
                </script>';
            }

        
        ?>
</body>

</html>