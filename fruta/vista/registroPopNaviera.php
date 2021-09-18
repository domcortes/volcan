<?php

include_once "../config/validarUsuario.php";

//LLAMADA ARCHIVOS NECESARIOS PARA LAS OPERACIONES
include_once '../controlador/TUSUARIO_ADO.php';
include_once '../controlador/EMPRESA_ADO.php';
include_once '../controlador/PLANTA_ADO.php';
include_once '../controlador/TEMPORADA_ADO.php';

include_once '../controlador/NAVIERA_ADO.php';
include_once '../controlador/CIUDAD_ADO.php';
include_once '../modelo/NAVIERA.php';

//INCIALIZAR LAS VARIBLES
//INICIALIZAR CONTROLADOR

$TUSUARIO_ADO = new TUSUARIO_ADO();
$EMPRESA_ADO =  new EMPRESA_ADO();
$PLANTA_ADO =  new PLANTA_ADO();
$TEMPORADA_ADO =  new TEMPORADA_ADO();

$NAVIERA_ADO =  new NAVIERA_ADO();
$CIUDAD_ADO =  new CIUDAD_ADO();
//INIICIALIZAR MODELO
$NAVIERA =  new NAVIERA();


//INCIALIZAR VARIBALES A OCUPAR PARA LA FUNCIONALIDAD
$IDOP = "";
$OP = "";
$DISABLED = "";

$RUTNAVIERA = "";
$NOMBRENAVIERA = "";
$GIRONAVIERA = "";
$RAZONSOCIALNAVIERA = "";
$DIRRECIONNAVIERA = "";
$NOTANAVIERA = "";
$CONTACTONAVIERA = "";
$TELEFONONAVIERA = "";
$EMAILNAVIERA = "";
$CIUDAD = "";



//INICIALIZAR ARREGLOS
$ARRAYNAVIERA = "";
$ARRAYNAVIERAID = "";
$ARRAYCIUDAD = "";




//DEFINIR ARREGLOS CON LOS DATOS OBTENIDOS DE LAS FUNCIONES DE LOS CONTROLADORES
$ARRAYNAVIERA = $NAVIERA_ADO->listarNavieraCBX();
$ARRAYCIUDAD = $CIUDAD_ADO->listarCiudadCBX();

//OPERACIONES
//OPERACION DE REGISTRO DE FILA
if (isset($_REQUEST['GUARDAR'])) {


    //UTILIZACION METODOS SET DEL MODELO
    //SETEO DE ATRIBUTOS DE LA CLASE, OBTENIDO EN EL FORMULARIO   

    $NAVIERA->__SET('RUT_NAVIERA', $_REQUEST['RUTNAVIERA']);
    $NAVIERA->__SET('NOMBRE_NAVIERA', $_REQUEST['NOMBRENAVIERA']);
    $NAVIERA->__SET('GIRO_NAVIERA', $_REQUEST['GIRONAVIERA']);
    $NAVIERA->__SET('RAZON_SOCIAL_NAVIERA', $_REQUEST['RAZONSOCIALNAVIERA']);
    $NAVIERA->__SET('DIRECCION_NAVIERA', $_REQUEST['DIRRECIONNAVIERA']);
    $NAVIERA->__SET('CONTACTO_NAVIERA', $_REQUEST['CONTACTONAVIERA']);
    $NAVIERA->__SET('TELEFONO_NAVIERA', $_REQUEST['TELEFONONAVIERA']);
    $NAVIERA->__SET('EMAIL_NAVIERA', $_REQUEST['EMAILNAVIERA']);
    $NAVIERA->__SET('NOTA_NAVIERA', $_REQUEST['NOTANAVIERA']);
    $NAVIERA->__SET('CIUDAD', $_REQUEST['CIUDAD']);
    //LLAMADA AL METODO DE REGISTRO DEL CONTROLADOR
    $NAVIERA_ADO->agregarNaviera($NAVIERA);
    //REDIRECCIONAR A PAGINA registroNaviera.php
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
    <title>Registro Naviera</title>
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

                    RUTNAVIERA = document.getElementById("RUTNAVIERA").value;
                    NOMBRENAVIERA = document.getElementById("NOMBRENAVIERA").value;
                    GIRONAVIERA = document.getElementById("GIRONAVIERA").value;
                    RAZONSOCIALNAVIERA = document.getElementById("RAZONSOCIALNAVIERA").value;
                    DIRRECIONNAVIERA = document.getElementById("DIRRECIONNAVIERA").value;
                    CIUDAD = document.getElementById("CIUDAD").selectedIndex;
                    CONTACTONAVIERA = document.getElementById("CONTACTONAVIERA").value;
                    TELEFONONAVIERA = document.getElementById("TELEFONONAVIERA").value;
                    EMAILNAVIERA = document.getElementById("EMAILNAVIERA").value;

                    document.getElementById('val_rut').innerHTML = "";
                    document.getElementById('val_nombre').innerHTML = "";
                    document.getElementById('val_giro').innerHTML = "";
                    document.getElementById('val_rsocial').innerHTML = "";
                    document.getElementById('val_dirrecion').innerHTML = "";
                    document.getElementById('val_ciudad').innerHTML = "";
                    document.getElementById('val_contacto').innerHTML = "";
                    document.getElementById('val_telefono').innerHTML = "";
                    document.getElementById('val_email').innerHTML = "";

                    if (RUTNAVIERA == null || RUTNAVIERA.length == 0 || /^\s+$/.test(RUTNAVIERA)) {
                        document.form_reg_dato.RUTNAVIERA.focus();
                        document.form_reg_dato.RUTNAVIERA.style.borderColor = "#FF0000";
                        document.getElementById('val_rut').innerHTML = "NO A INGRESADO DATO";
                        return false;
                    }
                    document.form_reg_dato.RUTNAVIERA.style.borderColor = "#4AF575";


                    if (NOMBRENAVIERA == null || NOMBRENAVIERA.length == 0 || /^\s+$/.test(NOMBRENAVIERA)) {
                        document.form_reg_dato.NOMBRENAVIERA.focus();
                        document.form_reg_dato.NOMBRENAVIERA.style.borderColor = "#FF0000";
                        document.getElementById('val_nombre').innerHTML = "NO A INGRESADO DATO";
                        return false;
                    }
                    document.form_reg_dato.NOMBRENAVIERA.style.borderColor = "#4AF575";

                    if (GIRONAVIERA == null || GIRONAVIERA.length == 0 || /^\s+$/.test(GIRONAVIERA)) {
                        document.form_reg_dato.GIRONAVIERA.focus();
                        document.form_reg_dato.GIRONAVIERA.style.borderColor = "#FF0000";
                        document.getElementById('val_giro').innerHTML = "NO A INGRESADO DATO";
                        return false;
                    }
                    document.form_reg_dato.GIRONAVIERA.style.borderColor = "#4AF575";

                    if (RAZONSOCIALNAVIERA == null || RAZONSOCIALNAVIERA.length == 0 || /^\s+$/.test(RAZONSOCIALNAVIERA)) {
                        document.form_reg_dato.RAZONSOCIALNAVIERA.focus();
                        document.form_reg_dato.RAZONSOCIALNAVIERA.style.borderColor = "#FF0000";
                        document.getElementById('val_rsocial').innerHTML = "NO A INGRESADO DATO";
                        return false;
                    }
                    document.form_reg_dato.RAZONSOCIALNAVIERA.style.borderColor = "#4AF575";


                    if (DIRRECIONNAVIERA == null || DIRRECIONNAVIERA.length == 0 || /^\s+$/.test(DIRRECIONNAVIERA)) {
                        document.form_reg_dato.DIRRECIONNAVIERA.focus();
                        document.form_reg_dato.DIRRECIONNAVIERA.style.borderColor = "#FF0000";
                        document.getElementById('val_dirrecion').innerHTML = "NO A INGRESADO DATO";
                        return false;
                    }
                    document.form_reg_dato.DIRRECIONNAVIERA.style.borderColor = "#4AF575";

                    if (CIUDAD == null || CIUDAD == 0) {
                        document.form_reg_dato.CIUDAD.focus();
                        document.form_reg_dato.CIUDAD.style.borderColor = "#FF0000";
                        document.getElementById('val_ciudad').innerHTML = "NO HA SELECCIONADO  NINGUNA ALTERNATIVA";
                        return false;
                    }
                    document.form_reg_dato.CIUDAD.style.borderColor = "#4AF575";


                    if (CONTACTONAVIERA == null || CONTACTONAVIERA.length == 0 || /^\s+$/.test(CONTACTONAVIERA)) {
                        document.form_reg_dato.CONTACTONAVIERA.focus();
                        document.form_reg_dato.CONTACTONAVIERA.style.borderColor = "#FF0000";
                        document.getElementById('val_contacto').innerHTML = "NO A INGRESADO DATO";
                        return false;
                    }
                    document.form_reg_dato.CONTACTONAVIERA.style.borderColor = "#4AF575";


                    if (TELEFONONAVIERA == null || TELEFONONAVIERA == 0) {
                        document.form_reg_dato.TELEFONONAVIERA.focus();
                        document.form_reg_dato.TELEFONONAVIERA.style.borderColor = "#FF0000";
                        document.getElementById('val_telefono').innerHTML = "NO A INGRESADO DATO";
                        return false;
                    }
                    document.form_reg_dato.TELEFONONAVIERA.style.borderColor = "#4AF575";

                    if (EMAILNAVIERA == null || EMAILNAVIERA.length == 0 || /^\s+$/.test(EMAILNAVIERA)) {
                        document.form_reg_dato.EMAILNAVIERA.focus();
                        document.form_reg_dato.EMAILNAVIERA.style.borderColor = "#FF0000";
                        document.getElementById('val_email').innerHTML = "NO A INGRESADO DATO";
                        return false;
                    }
                    document.form_reg_dato.EMAILNAVIERA.style.borderColor = "#4AF575";

                    if (!(/^(([^<>()[\]\.,;:\s@\"]+(\.[^<>()[\]\.,;:\s@\"]+)*)|(\".+\"))@(([^<>()[\]\.,;:\s@\"]+\.)+[^<>()[\]\.,;:\s@\"]{2,})$/i.test(EMAILNAVIERA))) {
                        document.form_reg_dato.EMAILNAVIERA.focus();
                        document.form_reg_dato.EMAILNAVIERA.style.borderColor = "#ff0000";
                        document.getElementById('val_email').innerHTML = "FORMATO DE CORREO INCORRECTO";
                        return false;
                    }
                    document.form_reg_dato.EMAILNAVIERA.style.borderColor = "#4AF575";




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
                                        <label>Rut </label>
                                        <input type="text" class="form-control" placeholder="Rut Naviera" id="RUTNAVIERA" name="RUTNAVIERA" value="<?php echo $RUTNAVIERA; ?>" <?php echo $DISABLED; ?> />
                                        <label id="val_rut" class="validacion"> </label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Nombre </label>
                                        <input type="text" class="form-control" placeholder="Nombre Naviera" id="NOMBRENAVIERA" name="NOMBRENAVIERA" value="<?php echo $NOMBRENAVIERA; ?>" <?php echo $DISABLED; ?> />
                                        <label id="val_nombre" class="validacion"> </label>
                                    </div>
                                </div>

                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Giro </label>
                                        <input type="text" class="form-control" placeholder="Giro Naviera" id="GIRONAVIERA" name="GIRONAVIERA" value="<?php echo $GIRONAVIERA; ?>" <?php echo $DISABLED; ?> />
                                        <label id="val_giro" class="validacion"> </label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Razon Social </label>
                                        <input type="text" class="form-control" placeholder="Razon Social Naviera" id="RAZONSOCIALNAVIERA" name="RAZONSOCIALNAVIERA" value="<?php echo $RAZONSOCIALNAVIERA; ?>" <?php echo $DISABLED; ?> />
                                        <label id="val_rsocial" class="validacion"> </label>
                                    </div>
                                </div>

                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Dirrecion </label>
                                        <input type="text" class="form-control" placeholder="Dirrecion Naviera" id="DIRRECIONNAVIERA" name="DIRRECIONNAVIERA" value="<?php echo $DIRRECIONNAVIERA; ?>" <?php echo $DISABLED; ?> />
                                        <label id="val_dirrecion" class="validacion"> </label>
                                    </div>
                                </div>

                                <div class="col-md-6">
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
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Nota </label>
                                        <textarea class="form-control" rows="1" placeholder="Nota Naviera " id="NOTANAVIERA" name="NOTANAVIERA" <?php echo $DISABLED; ?>><?php echo $NOTANAVIERA; ?></textarea>
                                        <label id="val_nota" class="validacion"> </label>
                                    </div>
                                </div>
                            </div>

                            <labe>Contacto</labe>
                            <hr class="my-15">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Nombre </label>
                                        <input type="text" class="form-control" placeholder="Nombre Contacto Naviera" id="CONTACTONAVIERA" name="CONTACTONAVIERA" value="<?php echo $CONTACTONAVIERA; ?>" <?php echo $DISABLED; ?> />
                                        <label id="val_contacto" class="validacion"> </label>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Telefono </label>
                                        <input type="number" class="form-control" placeholder="Telefono Contacto Naviera" id="TELEFONONAVIERA" name="TELEFONONAVIERA" value="<?php echo $TELEFONONAVIERA; ?>" <?php echo $DISABLED; ?> />
                                        <label id="val_telefono" class="validacion"> </label>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Email </label>
                                        <input type="text" class="form-control" placeholder="Email Contacto Naviera" id="EMAILNAVIERA" name="EMAILNAVIERA" value="<?php echo $EMAILNAVIERA; ?>" <?php echo $DISABLED; ?> />
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