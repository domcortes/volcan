<?php

include_once "../config/validarUsuario.php";


//LLAMADA ARCHIVOS NECESARIOS PARA LAS OPERACIONES
include_once '../controlador/TUSUARIO_ADO.php';
include_once '../controlador/EMPRESA_ADO.php';
include_once '../controlador/PLANTA_ADO.php';
include_once '../controlador/TEMPORADA_ADO.php';

include_once '../controlador/CIUDAD_ADO.php';

include_once '../controlador/AGCARGA_ADO.php';
include_once '../modelo/AGCARGA.php';

//INCIALIZAR LAS VARIBLES
//INICIALIZAR CONTROLADOR
$TUSUARIO_ADO = new TUSUARIO_ADO();
$EMPRESA_ADO =  new EMPRESA_ADO();
$PLANTA_ADO =  new PLANTA_ADO();
$TEMPORADA_ADO =  new TEMPORADA_ADO();

$CIUDAD_ADO =  new CIUDAD_ADO();

$AGCARGA_ADO =  new AGCARGA_ADO();
//INIICIALIZAR MODELO
$AGCARGA =  new AGCARGA();


//INCIALIZAR VARIBALES A OCUPAR PARA LA FUNCIONALIDAD
$IDOP = "";
$OP = "";
$DISABLED = "";

$RUTAGCARGA = "";
$NOMBREAGCARGA = "";
$DIRECCIONAGCARGA = "";
$RAZONSOCIALAGCARGA = "";
$GIROAGCARGA = "";
$SAGAGCARGA = "";
$CONTACTOAGCARGA = "";
$TELEFONOAGCARGA = "";
$EMAILAGCARGA = "";
$CIUDAD = "";



$SINO = "";


//INICIALIZAR ARREGLOS
$ARRAYAGCARGA = "";
$ARRAYAGCARGAID = "";
$ARRAYCIUDAD = "";

//DEFINIR ARREGLOS CON LOS DATOS OBTENIDOS DE LAS FUNCIONES DE LOS CONTROLADORES
$ARRAYAGCARGA = $AGCARGA_ADO->listarAgcargaCBX();
$ARRAYCIUDAD = $CIUDAD_ADO->listarCiudadCBX();



//OPERACIONES
//OPERACION DE REGISTRO DE FILA

if (isset($_REQUEST['GUARDAR'])) {

    //UTILIZACION METODOS SET DEL MODELO
    //SETEO DE ATRIBUTOS DE LA CLASE, OBTENIDO EN EL FORMULARIO   
    $AGCARGA->__SET('RUT_AGCARGA', $_REQUEST['RUTAGCARGA']);
    $AGCARGA->__SET('NOMBRE_AGCARGA', $_REQUEST['NOMBREAGCARGA']);
    $AGCARGA->__SET('RAZON_SOCIAL_AGCARGA', $_REQUEST['RAZONSOCIALAGCARGA']);
    $AGCARGA->__SET('GIRO_AGCARGA', $_REQUEST['GIROAGCARGA']);
    $AGCARGA->__SET('CODIGO_SAG_AGCARGA', $_REQUEST['SAGAGCARGA']);
    $AGCARGA->__SET('DIRECCION_AGCARGA', $_REQUEST['DIRECCIONAGCARGA']);
    $AGCARGA->__SET('CONTACTO_AGCARGA', $_REQUEST['CONTACTOAGCARGA']);
    $AGCARGA->__SET('TELEFONO_AGCARGA', $_REQUEST['TELEFONOAGCARGA']);
    $AGCARGA->__SET('EMAIL_AGCARGA', $_REQUEST['EMAILAGCARGA']);
    $AGCARGA->__SET('CIUDAD', $_REQUEST['CIUDAD']);
    //LLAMADA AL METODO DE REGISTRO DEL CONTROLADOR
    $AGCARGA_ADO->agregarAgcarga($AGCARGA);
    //REDIRECCIONAR A PAGINA registroAgcarga.php
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
    <title>Registro Agente Carga</title>
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

                    RUTAGCARGA = document.getElementById("RUTAGCARGA").value;
                    NOMBREAGCARGA = document.getElementById("NOMBREAGCARGA").value;
                    RAZONSOCIALAGCARGA = document.getElementById("RAZONSOCIALAGCARGA").value;
                    GIROAGCARGA = document.getElementById("GIROAGCARGA").value;
                    SAGAGCARGA = document.getElementById("SAGAGCARGA").value;
                    DIRECCIONAGCARGA = document.getElementById("DIRECCIONAGCARGA").value;
                    CIUDAD = document.getElementById("CIUDAD").selectedIndex;
                    CONTACTOAGCARGA = document.getElementById("CONTACTOAGCARGA").value;
                    TELEFONOAGCARGA = document.getElementById("TELEFONOAGCARGA").value;
                    EMAILAGCARGA = document.getElementById("EMAILAGCARGA").value;


                    document.getElementById('val_rut').innerHTML = "";
                    document.getElementById('val_nombre').innerHTML = "";
                    document.getElementById('val_rsocial').innerHTML = "";
                    document.getElementById('val_giro').innerHTML = "";
                    document.getElementById('val_sag').innerHTML = "";
                    document.getElementById('val_direccion').innerHTML = "";
                    document.getElementById('val_ciudad').innerHTML = "";
                    document.getElementById('val_contacto').innerHTML = "";
                    document.getElementById('val_telefono').innerHTML = "";
                    document.getElementById('val_email').innerHTML = "";

                    if (RUTAGCARGA == null || RUTAGCARGA.length == 0 || /^\s+$/.test(RUTAGCARGA)) {
                        document.form_reg_dato.RUTAGCARGA.focus();
                        document.form_reg_dato.RUTAGCARGA.style.borderColor = "#FF0000";
                        document.getElementById('val_rut').innerHTML = "NO A INGRESADO DATO";
                        return false;
                    }
                    document.form_reg_dato.RUTAGCARGA.style.borderColor = "#4AF575";

                    if (NOMBREAGCARGA == null || NOMBREAGCARGA.length == 0 || /^\s+$/.test(NOMBREAGCARGA)) {
                        document.form_reg_dato.NOMBREAGCARGA.focus();
                        document.form_reg_dato.NOMBREAGCARGA.style.borderColor = "#FF0000";
                        document.getElementById('val_nombre').innerHTML = "NO A INGRESADO DATO";
                        return false;
                    }
                    document.form_reg_dato.NOMBREAGCARGA.style.borderColor = "#4AF575";


                    if (RAZONSOCIALAGCARGA == null || RAZONSOCIALAGCARGA.length == 0 || /^\s+$/.test(RAZONSOCIALAGCARGA)) {
                        document.form_reg_dato.RAZONSOCIALAGCARGA.focus();
                        document.form_reg_dato.RAZONSOCIALAGCARGA.style.borderColor = "#FF0000";
                        document.getElementById('val_rsocial').innerHTML = "NO A INGRESADO DATO";
                        return false;
                    }
                    document.form_reg_dato.RAZONSOCIALAGCARGA.style.borderColor = "#4AF575";


                    if (GIROAGCARGA == null || GIROAGCARGA.length == 0 || /^\s+$/.test(GIROAGCARGA)) {
                        document.form_reg_dato.GIROAGCARGA.focus();
                        document.form_reg_dato.GIROAGCARGA.style.borderColor = "#FF0000";
                        document.getElementById('val_giro').innerHTML = "NO A INGRESADO DATO";
                        return false;
                    }
                    document.form_reg_dato.GIROAGCARGA.style.borderColor = "#4AF575";



                    if (SAGAGCARGA == null || SAGAGCARGA == 0) {
                        document.form_reg_dato.SAGAGCARGA.focus();
                        document.form_reg_dato.SAGAGCARGA.style.borderColor = "#FF0000";
                        document.getElementById('val_sag').innerHTML = "NO A INGRESADO DATO";
                        return false;
                    }
                    document.form_reg_dato.SAGAGCARGA.style.borderColor = "#4AF575";


                    if (DIRECCIONAGCARGA == null || DIRECCIONAGCARGA.length == 0 || /^\s+$/.test(DIRECCIONAGCARGA)) {
                        document.form_reg_dato.DIRECCIONAGCARGA.focus();
                        document.form_reg_dato.DIRECCIONAGCARGA.style.borderColor = "#FF0000";
                        document.getElementById('val_direccion').innerHTML = "NO A INGRESADO DATO";
                        return false;
                    }
                    document.form_reg_dato.DIRECCIONAGCARGA.style.borderColor = "#4AF575";

                    if (CIUDAD == null || CIUDAD == 0) {
                        document.form_reg_dato.CIUDAD.focus();
                        document.form_reg_dato.CIUDAD.style.borderColor = "#FF0000";
                        document.getElementById('val_ciudad').innerHTML = "NO HA SELECCIONADO  NINGUNA ALTERNATIVA";
                        return false;
                    }
                    document.form_reg_dato.CIUDAD.style.borderColor = "#4AF575";



                    if (CONTACTOAGCARGA == null || CONTACTOAGCARGA.length == 0 || /^\s+$/.test(CONTACTOAGCARGA)) {
                        document.form_reg_dato.CONTACTOAGCARGA.focus();
                        document.form_reg_dato.CONTACTOAGCARGA.style.borderColor = "#FF0000";
                        document.getElementById('val_contacto').innerHTML = "NO A INGRESADO DATO";
                        return false;
                    }
                    document.form_reg_dato.CONTACTOAGCARGA.style.borderColor = "#4AF575";


                    if (TELEFONOAGCARGA == null || TELEFONOAGCARGA == 0) {
                        document.form_reg_dato.TELEFONOAGCARGA.focus();
                        document.form_reg_dato.TELEFONOAGCARGA.style.borderColor = "#FF0000";
                        document.getElementById('val_telefono').innerHTML = "NO A INGRESADO DATO";
                        return false;
                    }
                    document.form_reg_dato.TELEFONOAGCARGA.style.borderColor = "#4AF575";


                    if (EMAILAGCARGA == null || EMAILAGCARGA.length == 0 || /^\s+$/.test(EMAILAGCARGA)) {
                        document.form_reg_dato.EMAILAGCARGA.focus();
                        document.form_reg_dato.EMAILAGCARGA.style.borderColor = "#FF0000";
                        document.getElementById('val_email').innerHTML = "NO A INGRESADO DATO";
                        return false;
                    }
                    document.form_reg_dato.EMAILAGCARGA.style.borderColor = "#4AF575";


                    if (!(/^(([^<>()[\]\.,;:\s@\"]+(\.[^<>()[\]\.,;:\s@\"]+)*)|(\".+\"))@(([^<>()[\]\.,;:\s@\"]+\.)+[^<>()[\]\.,;:\s@\"]{2,})$/i
                            .test(EMAILAGCARGA))) {
                        document.form_reg_dato.EMAILAGCARGA.focus();
                        document.form_reg_dato.EMAILAGCARGA.style.borderColor = "#ff0000";
                        document.getElementById('val_email').innerHTML = "FORMATO DE CORREO INCORRECTO";
                        return false;
                    }
                    document.form_reg_dato.EMAILAGCARGA.style.borderColor = "#4AF575";






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
            <!-- Content Wrapper. Contains page content -->


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
                                        <label>Rut </label>
                                        <input type="text" class="form-control" placeholder="Rut Agente Carga" id="RUTAGCARGA" name="RUTAGCARGA" value="<?php echo $RUTAGCARGA; ?>" <?php echo $DISABLED; ?> />
                                        <label id="val_rut" class="validacion"> </label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Nombre </label>
                                        <input type="text" class="form-control" placeholder="Nombre Agente Carga" id="NOMBREAGCARGA" name="NOMBREAGCARGA" value="<?php echo $NOMBREAGCARGA; ?>" <?php echo $DISABLED; ?> />
                                        <label id="val_nombre" class="validacion"> </label>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Razon social </label>
                                        <input type="text" class="form-control" placeholder="Razon social Agente Carga" id="RAZONSOCIALAGCARGA" name="RAZONSOCIALAGCARGA" value="<?php echo $RAZONSOCIALAGCARGA; ?>" <?php echo $DISABLED; ?> />
                                        <label id="val_rsocial" class="validacion"> </label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Giro </label>
                                        <input type="text" class="form-control" placeholder="Giro Agente Carga" id="GIROAGCARGA" name="GIROAGCARGA" value="<?php echo $GIROAGCARGA; ?>" <?php echo $DISABLED; ?> />
                                        <label id="val_giro" class="validacion"> </label>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Codigo Sag </label>
                                        <input type="number" class="form-control" placeholder="Codigo Sag Agente Carga" id="SAGAGCARGA" name="SAGAGCARGA" value="<?php echo $SAGAGCARGA; ?>" <?php echo $DISABLED; ?> />
                                        <label id="val_sag" class="validacion"> </label>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Direccion </label>
                                        <input type="text" class="form-control" placeholder="Direccion Agente Carga" id="DIRECCIONAGCARGA" name="DIRECCIONAGCARGA" value="<?php echo $DIRECCIONAGCARGA; ?>" <?php echo $DISABLED; ?> />
                                        <label id="val_direccion" class="validacion"> </label>
                                    </div>
                                </div>
                                <div class="col-md-4 col-12">
                                    <div class="form-group">
                                        <label>Ciudad </label>
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


                            <label>Contacto </label>
                            <hr class="my-15">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Contacto </label>
                                        <input type="text" class="form-control" placeholder="Nombre Contacto Agente Carga" id="CONTACTOAGCARGA" name="CONTACTOAGCARGA" value="<?php echo $CONTACTOAGCARGA; ?>" <?php echo $DISABLED; ?> />
                                        <label id="val_contacto" class="validacion"> </label>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Telefono </label>
                                        <input type="number" class="form-control" placeholder="Telefono Contacto Agente Carga" id="TELEFONOAGCARGA" name="TELEFONOAGCARGA" value="<?php echo $TELEFONOAGCARGA; ?>" <?php echo $DISABLED; ?> />
                                        <label id="val_telefono" class="validacion"> </label>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Email </label>
                                        <input type="text" class="form-control" placeholder="Email Contacto Agente Carga" id="EMAILAGCARGA" name="EMAILAGCARGA" value="<?php echo $EMAILAGCARGA; ?>" <?php echo $DISABLED; ?> />
                                        <label id="val_email" class="validacion"> </label>
                                    </div>
                                </div>

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