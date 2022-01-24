<?php

include_once "../../assest/config/validarUsuarioMaterial.php";

//LLAMADA ARCHIVOS NECESARIOS PARA LAS OPERACIONES

include_once '../../assest/controlador/COMUNA_ADO.php';
include_once '../../assest/controlador/CIUDAD_ADO.php';


include_once '../../assest/modelo/PLANTA.php';

//INCIALIZAR LAS VARIBLES
//INICIALIZAR CONTROLADOR
$COMUNA_ADO =  new COMUNA_ADO();
$CIUDAD_ADO =  new CIUDAD_ADO();

//INIICIALIZAR MODELO
$PLANTA =  new PLANTA();


//INCIALIZAR VARIBALES A OCUPAR PARA LA FUNCIONALIDAD
$IDOP = "";
$OP = "";
$DISABLED = "";

$NOMBREPLANTA = "";
$RAZONSOCIAL = "";
$DIRECCION = "";
$CODIGOSAG = "";
$COMUNA = "";
$FDA = "";
$TPLANTA = "";
$CIUDAD = "";
$EMPRESA = "";

$NOMBRE = "";
$MENSAJE = "";
$FOCUS = "";
$MENSAJE2 = "";
$FOCUS2 = "";
$BORDER = "";

//INICIALIZAR ARREGLOS
$ARRAYPLANTA = "";
$ARRAYPLANTAID = "";
$ARRAYCOMUNA = "";
$ARRAYCIUDAD = "";
$ARRAYBODEGA = "";
$ARRAYEMPRESA = "";



//DEFINIR ARREGLOS CON LOS DATOS OBTENIDOS DE LAS FUNCIONES DE LOS CONTROLADORES
$ARRAYPLANTA = $PLANTA_ADO->listarPlantaCBX();
$ARRAYCOMUNA = $COMUNA_ADO->listarComunaCBX();
$ARRAYCIUDAD = $CIUDAD_ADO->listarCiudad3CBX();
$ARRAYEMPRESA = $EMPRESA_ADO->listarEmpresaCBX();
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

        $PLANTA->__SET('ID_PLANTA', $IDOP);
        $PLANTA_ADO->deshabilitar($PLANTA);

        echo "<script type='text/javascript'> location.href ='registroPlanta.php';</script>";
    }
    //1 = ACTIVAR
    if ($OP == "1") {

        $PLANTA->__SET('ID_PLANTA', $IDOP);
        $PLANTA_ADO->habilitar($PLANTA);
        echo "<script type='text/javascript'> location.href ='registroPlanta.php';</script>";
    }

    //editar =  OBTENCION DE DATOS PARA LA EDICION DE REGISTRO
    if ($OP == "editar") {
        //OBTENCION DE INFORMACIOND DE LA FILA DEL REGISTRO
        //ALMACENAR INFORMACION EN ARREGLO
        //LLAMADA A LA FUNCION DE CONTROLADOR verPlanta(ID), 
        //SE LE PASE UNO DE LOS DATOS OBTENIDO PREVIAMENTE A TRAVEZ DE LA URL
        $ARRAYPLANTAID = $PLANTA_ADO->verPlanta($IDOP);
        //OBTENCIONS DE LOS DATODS DE LA COLUMNAS DE LA FILA OBTENIDA
        //PASAR DATOS OBTENIDOS A VARIABLES QUE SE VISUALIZAR EN EL FORMULARIO DE LA VISTA
        foreach ($ARRAYPLANTAID as $r) :
            $NOMBREPLANTA = "" . $r['NOMBRE_PLANTA'];
            $RAZONSOCIAL = "" . $r['RAZON_SOCIAL_PLANTA'];
            $DIRECCION = "" . $r['DIRECCION_PLANTA'];
            $CODIGOSAG = "" . $r['CODIGO_SAG_PLANTA'];
            $FDA = "" . $r['FDA_PLANTA'];
            $CIUDAD = "" . $r['ID_CIUDAD'];
            $TPLANTA = "" . $r['TPLANTA'];
        endforeach;
    }
    //ver =  OBTENCION DE DATOS PARA LA VISUALIZAAR INFORMAICON DE REGISTRO

    if ($OP == "ver") {
        //DESABILITAR INPUT DEL FORMULARIO
        //PARA QUE NO MODIFIQUE NIGUNA INFORMACION, OBJETIVO ES VISUALIZAR INFORMACION
        $DISABLED = "disabled";
        //OBTENCION DE INFORMACIOND DE LA FILA DEL REGISTRO S
        //ALMACENAR INFORMACION EN ARREGLO
        //LLAMADA A LA FUNCION DE CONTROLADOR verPlanta(ID), 
        //SE LE PASE UNO DE LOS DATOS OBTENIDO PREVIAMENTE A TRAVEZ DE LA URL
        $ARRAYPLANTAID = $PLANTA_ADO->verPlanta($IDOP);
        //OBTENCIONS DE LOS DATODS DE LA COLUMNAS DE LA FILA OBTENIDA
        //PASAR DATOS OBTENIDOS A VARIABLES QUE SE VISUALIZAR EN EL FORMULARIO DE LA VISTA
        foreach ($ARRAYPLANTAID as $r) :
            $NOMBREPLANTA = "" . $r['NOMBRE_PLANTA'];
            $RAZONSOCIAL = "" . $r['RAZON_SOCIAL_PLANTA'];
            $DIRECCION = "" . $r['DIRECCION_PLANTA'];
            $CODIGOSAG = "" . $r['CODIGO_SAG_PLANTA'];
            $FDA = "" . $r['FDA_PLANTA'];
            $CIUDAD = "" . $r['ID_CIUDAD'];
            $TPLANTA = "" . $r['TPLANTA'];
        endforeach;
    }
}


?>



<!DOCTYPE html>
<html lang="es">

<head>
    <title>Registrar Planta</title>
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

                    NOMBREPLANTA = document.getElementById("NOMBREPLANTA").value;
                    RAZONSOCIAL = document.getElementById("RAZONSOCIAL").value;
                    DIRECCION = document.getElementById("DIRECCION").value;
                    CODIGOSAG = document.getElementById("CODIGOSAG").value;
                    TPLANTA = document.getElementById("TPLANTA").selectedIndex;
                    CIUDAD = document.getElementById("CIUDAD").selectedIndex;
                    FDA = document.getElementById("FDA").value;

                    document.getElementById('val_nombre').innerHTML = "";
                    document.getElementById('val_razonsocial').innerHTML = "";
                    document.getElementById('val_direccion').innerHTML = "";
                    document.getElementById('val_codigosag').innerHTML = "";
                    document.getElementById('val_tplanta').innerHTML = "";
                    document.getElementById('val_ciudad').innerHTML = "";
                    document.getElementById('val_fda').innerHTML = "";

                    if (NOMBREPLANTA == null || NOMBREPLANTA.length == 0 || /^\s+$/.test(NOMBREPLANTA)) {
                        document.form_reg_dato.NOMBREPLANTA.focus();
                        document.form_reg_dato.NOMBREPLANTA.style.borderColor = "#FF0000";
                        document.getElementById('val_nombre').innerHTML = "NO A INGRESADO DATO";
                        return false;
                    }
                    document.form_reg_dato.NOMBREPLANTA.style.borderColor = "#4AF575";
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
                    if (CODIGOSAG == null || CODIGOSAG.length == 0 || /^\s+$/.test(CODIGOSAG)) {
                        document.form_reg_dato.CODIGOSAG.focus();
                        document.form_reg_dato.CODIGOSAG.style.borderColor = "#FF0000";
                        document.getElementById('val_codigosag').innerHTML = "NO A INGRESADO DATO";
                        return false;
                    }
                    document.form_reg_dato.CODIGOSAG.style.borderColor = "#4AF575";

                    if (TPLANTA == null || TPLANTA == 0) {
                        document.form_reg_dato.TPLANTA.focus();
                        document.form_reg_dato.TPLANTA.style.borderColor = "#FF0000";
                        document.getElementById('val_tplanta').innerHTML = "NO HA SELECCIONADO  NINGUNA ALTERNATIVA";
                        return false;
                    }
                    document.form_reg_dato.TPLANTA.style.borderColor = "#4AF575";

                    if (CIUDAD == null || CIUDAD == 0) {
                        document.form_reg_dato.CIUDAD.focus();
                        document.form_reg_dato.CIUDAD.style.borderColor = "#FF0000";
                        document.getElementById('val_ciudad').innerHTML = "NO HA SELECCIONADO  NINGUNA ALTERNATIVA";
                        return false;
                    }
                    document.form_reg_dato.CIUDAD.style.borderColor = "#4AF575";


                    if (FDA == null || FDA.length == 0 || /^\s+$/.test(FDA)) {
                        document.form_reg_dato.FDA.focus();
                        document.form_reg_dato.FDA.style.borderColor = "#FF0000";
                        document.getElementById('val_fda').innerHTML = "NO A INGRESADO DATO";
                        return false;
                    }
                    document.form_reg_dato.FDA.style.borderColor = "#4AF575";
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
            <?php include_once "../../assest/config/menuMaterial.php"; ?>
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
                                            <li class="breadcrumb-item"><a href="index.php"><i class="mdi mdi-home-outline"></i></a> </li>
                                            <li class="breadcrumb-item" aria-current="page">Mantenedores</li>
                                            <li class="breadcrumb-item" aria-current="page">Principal</li>
                                            <li class="breadcrumb-item active" aria-current="page"> <a href="#"> Registro Planta </a> </li>
                                        </ol>
                                    </nav>
                                </div>
                            </div>
                            <?php include_once "../../assest/config/verIndicadorEconomico.php"; ?>
                        </div>
                    </div>
                    <!-- Main content -->
                    <section class="content">
                        <div class="row">
                            <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12 col-xs-12">
                                <div class="box">
                                    <div class="box-header with-border bg-primary">                                        
                                        <h4 class="box-title">Registro Planta</h4>                                    
                                    </div>
                                    <!-- /.box-header -->
                                    <form class="form" role="form" method="post" name="form_reg_dato" id="form_reg_dato">
                                        <div class="box-body">
                                            <hr class="my-15">
                                            <div class="row">
                                                <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6 col-xs-6">    
                                                    <div class="form-group">
                                                        <label>Nombre </label>
                                                        <input type="hidden" class="form-control" placeholder="ID" id="ID" name="ID" value="<?php echo $IDOP; ?>" />
                                                        <input type="text" class="form-control" placeholder="Nombre Planta" id="NOMBREPLANTA" name="NOMBREPLANTA" value="<?php echo $NOMBREPLANTA; ?>" <?php echo $DISABLED; ?> />
                                                        <label id="val_nombre" class="validacion"> </label>
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
                                                        <label>Dirreccion</label>
                                                        <input type="text" class="form-control" placeholder="Dirreccion" id="DIRECCION" name="DIRECCION" value="<?php echo $DIRECCION; ?>" <?php echo $DISABLED; ?> />
                                                        <label id="val_direccion" class="validacion"> </label>
                                                    </div>
                                                </div>
                                                <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6 col-xs-6">    
                                                    <div class="form-group">
                                                        <label>Codigo SAG</label>
                                                        <input type="number" class="form-control" placeholder="Codigo SAG" id="CODIGOSAG" name="CODIGOSAG" value="<?php echo $CODIGOSAG; ?>" <?php echo $DISABLED; ?> />
                                                        <label id="val_codigosag" class="validacion"> </label>
                                                    </div>
                                                </div>
                                                <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6 col-xs-6">    
                                                    <div class="form-group">
                                                        <label>Tipo Planta</label>
                                                        <select class="form-control select2" id="TPLANTA" name="TPLANTA" style="width: 100%;" value="<?php echo $TPLANTA; ?>" <?php echo $DISABLED; ?>>
                                                            <option></option>
                                                            <option value="1" <?php if ($TPLANTA == "1") {
                                                                                    echo "selected";
                                                                                } ?>> Propia </option>
                                                            <option value="2" <?php if ($TPLANTA == "2") {
                                                                                    echo "selected";
                                                                                } ?>> Externa </option>
                                                        </select>
                                                        <label id="val_tplanta" class="validacion"> </label>
                                                    </div>
                                                </div>
                                                <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6 col-xs-6">    
                                                    <div class="form-group">
                                                        <label>Ciudad</label>
                                                        <select class="form-control select2" id="CIUDAD" name="CIUDAD" style="width: 100%;" value="<?php echo $CIUDAD; ?>" <?php echo $DISABLED; ?>>
                                                            <option></option>
                                                            <?php foreach ($ARRAYCIUDAD as $r) : ?>
                                                                <?php if ($ARRAYCIUDAD) {    ?>
                                                                    <option value="<?php echo $r['ID_CIUDAD']; ?>" 
                                                                    <?php if ($CIUDAD == $r['ID_CIUDAD']) {   echo "selected";    } ?>>
                                                                        <?php echo $r['CIUDAD'] ?>, <?php echo $r['COMUNA'] ?>, <?php echo $r['PROVINCIA'] ?>, <?php echo $r['REGION'] ?>, <?php echo $r['PAIS'] ?>
                                                                    </option>
                                                                <?php } else { ?>
                                                                    <option>No Hay Datos Registrados </option>
                                                                <?php } ?>

                                                            <?php endforeach; ?>
                                                        </select>
                                                        <label id="val_ciudad" class="validacion"> </label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6 col-xs-6">    
                                                <div class="form-group">
                                                    <label>FDA</label>
                                                    <input type="number" class="form-control" placeholder="FDA" id="FDA" name="FDA" value="<?php echo $FDA; ?>" <?php echo $DISABLED; ?> />
                                                    <label id="val_fda" class="validacion"> </label>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- /.box-body -->                             
                                        <div class="box-footer">
                                            <div class="btn-group   col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12 col-xs-12 " role="group" aria-label="Acciones generales">                                    
                                                <button type="button" class="btn  btn-warning " data-toggle="tooltip" title="Cancelar" name="CANCELAR" value="CANCELAR" Onclick="irPagina('registroPlanta.php');">
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
                                        <h4 class="box-title"> Agrupado Planta</h4>
                                    </div>
                                    <div class="box-body">
                                        <div class="table-responsive">
                                            <table id="listar" class="table-hover " style="width: 100%;">
                                                <thead>
                                                    <tr>
                                                        <th>Id</th>
                                                        <th>Nombre </th>
                                                        <th>Codigo SAG </th>
                                                        <th class="text-center">Operaciónes</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php foreach ($ARRAYPLANTA as $r) : ?>
                                                        <tr class="center">
                                                            <td>
                                                                <a href="#" class="text-warning hover-warning">
                                                                    <?php echo $r['ID_PLANTA']; ?>
                                                                </a>
                                                            </td>
                                                            <td><?php echo $r['NOMBRE_PLANTA']; ?></td>
                                                            <td><?php echo $r['CODIGO_SAG_PLANTA']; ?></td>                                                                              
                                                            <td class="text-center">
                                                                <form method="post" id="form1">
                                                                    <div class="list-icons d-inline-flex">
                                                                        <div class="list-icons-item dropdown">
                                                                            <button class="btn btn-secondary" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                                <span class="icon-copy ti-settings"></span>
                                                                            </button>
                                                                            <div class="dropdown-menu dropdown-menu-right">
                                                                                <input type="hidden" class="form-control" placeholder="ID" id="ID" name="ID" value="<?php echo $r['ID_PLANTA']; ?>" />
                                                                                <input type="hidden" class="form-control" placeholder="URL" id="URL" name="URL" value="registroPlanta" />
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
                <?php include_once "../../assest/config/menuExtraMaterial.php"; ?>
    </div>
    <!- LLAMADA URL DE ARCHIVOS DE DISEÑO Y JQUERY E OTROS -!>
        <?php include_once "../../assest/config/urlBase.php"; ?>
        <?php 
            //OPERACIONES
            //OPERACION DE REGISTRO DE FILA
            if (isset($_REQUEST['GUARDAR'])) {

                //UTILIZACION METODOS SET DEL MODELO
                //SETEO DE ATRIBUTOS DE LA CLASE, OBTENIDO EN EL FORMULARIO   
                $PLANTA->__SET('NOMBRE_PLANTA', $_REQUEST['NOMBREPLANTA']);
                $PLANTA->__SET('RAZON_SOCIAL_PLANTA', $_REQUEST['RAZONSOCIAL']);
                $PLANTA->__SET('DIRECCION_PLANTA', $_REQUEST['DIRECCION']);
                $PLANTA->__SET('CODIGO_SAG_PLANTA', $_REQUEST['CODIGOSAG']);
                $PLANTA->__SET('FDA_PLANTA', $_REQUEST['FDA']);
                $PLANTA->__SET('TPLANTA', $_REQUEST['TPLANTA']);
                $PLANTA->__SET('ID_USUARIOI', $IDUSUARIOS);
                $PLANTA->__SET('ID_USUARIOM', $IDUSUARIOS);
                $PLANTA->__SET('ID_CIUDAD', $_REQUEST['CIUDAD']);
                //LLAMADA AL METODO DE REGISTRO DEL CONTROLADOR
                $PLANTA_ADO->agregarPlanta($PLANTA);
                //REDIRECCIONAR A PAGINA registroPlanta.php
                echo '<script>
                    Swal.fire({
                        icon:"success",
                        title:"Registro Creado",
                        text:"El registro del mantenedor se ha creado correctamente",
                        showConfirmButton: true,
                        confirmButtonText:"Cerrar",
                        closeOnConfirm:false
                    }).then((result)=>{
                        location.href = "registroPlanta.php";                            
                    })
                </script>';
            }

            //OPERACION DE EDICION DE FILA
            if (isset($_REQUEST['EDITAR'])) {
                //UTILIZACION METODOS SET DEL MODELO
                //SETEO DE ATRIBUTOS DE LA CLASE, OBTENIDO EN EL FORMULARIO   

                $PLANTA->__SET('NOMBRE_PLANTA', $_REQUEST['NOMBREPLANTA']);
                $PLANTA->__SET('RAZON_SOCIAL_PLANTA', $_REQUEST['RAZONSOCIAL']);
                $PLANTA->__SET('DIRECCION_PLANTA', $_REQUEST['DIRECCION']);
                $PLANTA->__SET('CODIGO_SAG_PLANTA', $_REQUEST['CODIGOSAG']);
                $PLANTA->__SET('FDA_PLANTA', $_REQUEST['FDA']);
                $PLANTA->__SET('TPLANTA', $_REQUEST['TPLANTA']);
                $PLANTA->__SET('ID_CIUDAD', $_REQUEST['CIUDAD']);
                $PLANTA->__SET('ID_USUARIOM', $IDUSUARIOS);
                $PLANTA->__SET('ID_PLANTA', $_REQUEST['ID']);
                //LLAMADA AL METODO DE EDICION DEL CONTROLADOR
                $PLANTA_ADO->actualizarPlanta($PLANTA);
                //REDIRECCIONAR A PAGINA registroPlanta.php
                echo '<script>
                    Swal.fire({
                        icon:"success",
                        title:"Registro Modificado",
                        text:"El registro del mantenedor se ha Modificado correctamente",
                        showConfirmButton: true,
                        confirmButtonText:"Cerrar",
                        closeOnConfirm:false
                    }).then((result)=>{
                        location.href = "registroPlanta.php";                            
                    })
                </script>';
            }

        
        ?>
</body>

</html>