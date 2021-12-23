<?php

include_once "../config/validarUsuario.php";

//LLAMADA ARCHIVOS NECESARIOS PARA LAS OPERACIONES
include_once '../controlador/TEMPORADA_ADO.php';
include_once '../controlador/TUSUARIO_ADO.php';

include_once '../controlador/PLANTA_ADO.php';
include_once '../controlador/COMUNA_ADO.php';
include_once '../controlador/CIUDAD_ADO.php';
include_once '../controlador/EMPRESA_ADO.php';
include_once '../modelo/PLANTA.php';

//INCIALIZAR LAS VARIBLES
//INICIALIZAR CONTROLADOR

$TUSUARIO_ADO = new TUSUARIO_ADO();

$EMPRESA_ADO =  new EMPRESA_ADO();
$TEMPORADA_ADO =  new TEMPORADA_ADO();

$PLANTA_ADO =  new PLANTA_ADO();
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
$CONTRAPARTE = "";
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
$ARRAYCIUDAD = $CIUDAD_ADO->listarCiudadCBX();
$ARRAYEMPRESA = $EMPRESA_ADO->listarEmpresaCBX();

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
    $PLANTA->__SET('TPLANTA', "1");
    $PLANTA->__SET('CIUDAD', $_REQUEST['CIUDAD']);
    //LLAMADA AL METODO DE REGISTRO DEL CONTROLADOR
    $PLANTA_ADO->agregarPlanta($PLANTA);
    //REDIRECCIONAR A PAGINA registroPlanta.php
    echo "
    <script type='text/javascript'>
        window.opener.refrescar()
        window.close();
        </script> 
    ";
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
        <?php include_once "../config/urlHead.php"; ?>

        <!- FUNCIONES BASES -!>
            <script type="text/javascript">
                //VALIDACION DE FORMULARIO
                function validacion() {

                    NOMBREPLANTA = document.getElementById("NOMBREPLANTA").value;
                    RAZONSOCIAL = document.getElementById("RAZONSOCIAL").value;
                    DIRECCION = document.getElementById("DIRECCION").value;
                    CONTRAPARTE = document.getElementById("CONTRAPARTE").value;
                    CODIGOSAG = document.getElementById("CODIGOSAG").value;
                    CIUDAD = document.getElementById("CIUDAD").selectedIndex;
                    FDA = document.getElementById("FDA").value;

                    document.getElementById('val_nombre').innerHTML = "";
                    document.getElementById('val_razonsocial').innerHTML = "";
                    document.getElementById('val_direccion').innerHTML = "";
                    document.getElementById('val_contraparte').innerHTML = "";
                    document.getElementById('val_codigosag').innerHTML = "";
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

                //FUNCION PARA CERRAR VENTANA Y ACTUALIZAR PRINCIPAL
                function cerrar() {
                    window.opener.refrescar()
                    window.close();
                }
            </script>

</head>

<body class="hold-transition light-skin fixed sidebar-mini theme-primary">
    <div class="wrapper">
        <!- LLAMADA AL MENU PRINCIPAL DE LA PAGINA-!>

            <!-- Main content -->
            <section class="content">
                <div class="box">
                    <div class="box-header with-border">
                        <!--  
                                            <h4 class="box-title">Sample form 1</h4>
                                        -->
                    </div>
                    <!-- /.box-header -->
                    <form class="form" role="form" method="post" name="form_reg_dato" onsubmit="return validacion()">
                        <div class="box-body">

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Nombre </label>
                                        <input type="text" class="form-control" placeholder="Nombre Planta" id="NOMBREPLANTA" name="NOMBREPLANTA" value="<?php echo $NOMBREPLANTA; ?>" <?php echo $DISABLED; ?> />
                                        <label id="val_nombre" class="validacion"> </label>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Razon Social</label>
                                        <input type="text" class="form-control" placeholder="Razon Social" id="RAZONSOCIAL" name="RAZONSOCIAL" value="<?php echo $RAZONSOCIAL; ?>" <?php echo $DISABLED; ?> />
                                        <label id="val_razonsocial" class="validacion"> </label>
                                    </div>
                                </div>

                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Dirreccion</label>
                                        <input type="text" class="form-control" placeholder="Dirreccion" id="DIRECCION" name="DIRECCION" value="<?php echo $DIRECCION; ?>" <?php echo $DISABLED; ?> />
                                        <label id="val_direccion" class="validacion"> </label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Codigo SAG</label>
                                        <input type="number" class="form-control" placeholder="Codigo SAG" id="CODIGOSAG" name="CODIGOSAG" value="<?php echo $CODIGOSAG; ?>" <?php echo $DISABLED; ?> />
                                        <label id="val_codigosag" class="validacion"> </label>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12 col-12">
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
                            </div>
                            <hr class="my-15">
                            <div class="form-group">
                                <label>FDA</label>
                                <input type="number" class="form-control" placeholder="FDA" id="FDA" name="FDA" value="<?php echo $FDA; ?>" <?php echo $DISABLED; ?> />
                                <label id="val_fda" class="validacion"> </label>
                            </div>
                        </div>
                        <!-- /.box-body -->
                        <div class="box-footer">
                            <button type="button" class="btn btn-rounded btn-warning btn-outline mr-1" name="CANCELAR" value="CANCELAR" Onclick="cerrar();">
                                <i class="ti-trash"></i> Cancelar
                            </button>
                            <button type="submit" class="btn btn-rounded btn-primary btn-outline" name="GUARDAR" value="GUARDAR" <?php echo $DISABLED; ?>>
                                <i class="ti-save-alt"></i> Crear
                            </button>
                        </div>
                    </form>
                </div>
                <!-- /.box -->
            </section>
            <!-- /.content -->


            <!- LLAMADA ARCHIVO DEL DISEÑO DEL FOOTER Y MENU USUARIO -!>
                <?php include_once "../config/menuExtra.php"; ?>
    </div>
    <!- LLAMADA URL DE ARCHIVOS DE DISEÑO Y JQUERY E OTROS -!>
        <?php include_once "../config/urlBase.php"; ?>
</body>

</html>