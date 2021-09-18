<?php

include_once "../config/validarUsuario.php";

//LLAMADA ARCHIVOS NECESARIOS PARA LAS OPERACIONES
include_once '../controlador/TUSUARIO_ADO.php';
include_once '../controlador/EMPRESA_ADO.php';
include_once '../controlador/PLANTA_ADO.php';
include_once '../controlador/TEMPORADA_ADO.php';

include_once '../controlador/LAEREA_ADO.php';
include_once '../controlador/CIUDAD_ADO.php';
include_once '../modelo/LAEREA.php';

//INCIALIZAR LAS VARIBLES
//INICIALIZAR CONTROLADOR

$TUSUARIO_ADO = new TUSUARIO_ADO();
$EMPRESA_ADO =  new EMPRESA_ADO();
$PLANTA_ADO =  new PLANTA_ADO();
$TEMPORADA_ADO =  new TEMPORADA_ADO();

$LAEREA_ADO =  new LAEREA_ADO();
$CIUDAD_ADO =  new CIUDAD_ADO();
//INIICIALIZAR MODELO
$LAEREA =  new LAEREA();


//INCIALIZAR VARIBALES A OCUPAR PARA LA FUNCIONALIDAD
$IDOP = "";
$OP = "";
$DISABLED = "";

$RUTLAEREA = "";
$NOMBRELAEREA = "";
$GIROLAEREA = "";
$RAZONSOCIALLAEREA = "";
$DIRRECIONLAEREA = "";
$NOTALAEREA = "";
$CONTACTOLAEREA = "";
$TELEFONOLAEREA = "";
$EMAILLAEREA = "";
$CIUDAD = "";



//INICIALIZAR ARREGLOS
$ARRAYLAEREA = "";
$ARRAYLAEREAID = "";
$ARRAYCIUDAD = "";




//DEFINIR ARREGLOS CON LOS DATOS OBTENIDOS DE LAS FUNCIONES DE LOS CONTROLADORES
$ARRAYLAEREA = $LAEREA_ADO->listarLaereaCBX();
$ARRAYCIUDAD = $CIUDAD_ADO->listarCiudadCBX();

//OPERACIONES
//OPERACION DE REGISTRO DE FILA
if (isset($_REQUEST['GUARDAR'])) {


    //UTILIZACION METODOS SET DEL MODELO
    //SETEO DE ATRIBUTOS DE LA CLASE, OBTENIDO EN EL FORMULARIO   

    $LAEREA->__SET('RUT_LAEREA', $_REQUEST['RUTLAEREA']);
    $LAEREA->__SET('NOMBRE_LAEREA', $_REQUEST['NOMBRELAEREA']);
    $LAEREA->__SET('GIRO_LAEREA', $_REQUEST['GIROLAEREA']);
    $LAEREA->__SET('RAZON_SOCIAL_LAEREA', $_REQUEST['RAZONSOCIALLAEREA']);
    $LAEREA->__SET('DIRECCION_LAEREA', $_REQUEST['DIRRECIONLAEREA']);
    $LAEREA->__SET('CONTACTO_LAEREA', $_REQUEST['CONTACTOLAEREA']);
    $LAEREA->__SET('TELEFONO_LAEREA', $_REQUEST['TELEFONOLAEREA']);
    $LAEREA->__SET('EMAIL_LAEREA', $_REQUEST['EMAILLAEREA']);
    $LAEREA->__SET('NOTA_LAEREA', $_REQUEST['NOTALAEREA']);
    $LAEREA->__SET('CIUDAD', $_REQUEST['CIUDAD']);
    //LLAMADA AL METODO DE REGISTRO DEL CONTROLADOR
    $LAEREA_ADO->agregarLaerea($LAEREA);
    //REDIRECCIONAR A PAGINA registroLaerea.php
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
    <title>Registro Laerea</title>
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

                    RUTLAEREA = document.getElementById("RUTLAEREA").value;
                    NOMBRELAEREA = document.getElementById("NOMBRELAEREA").value;
                    GIROLAEREA = document.getElementById("GIROLAEREA").value;
                    RAZONSOCIALLAEREA = document.getElementById("RAZONSOCIALLAEREA").value;
                    DIRRECIONLAEREA = document.getElementById("DIRRECIONLAEREA").value;
                    CIUDAD = document.getElementById("CIUDAD").selectedIndex;
                    CONTACTOLAEREA = document.getElementById("CONTACTOLAEREA").value;
                    TELEFONOLAEREA = document.getElementById("TELEFONOLAEREA").value;
                    EMAILLAEREA = document.getElementById("EMAILLAEREA").value;

                    document.getElementById('val_rut').innerHTML = "";
                    document.getElementById('val_nombre').innerHTML = "";
                    document.getElementById('val_giro').innerHTML = "";
                    document.getElementById('val_rsocial').innerHTML = "";
                    document.getElementById('val_dirrecion').innerHTML = "";
                    document.getElementById('val_ciudad').innerHTML = "";
                    document.getElementById('val_contacto').innerHTML = "";
                    document.getElementById('val_telefono').innerHTML = "";
                    document.getElementById('val_email').innerHTML = "";

                    if (RUTLAEREA == null || RUTLAEREA.length == 0 || /^\s+$/.test(RUTLAEREA)) {
                        document.form_reg_dato.RUTLAEREA.focus();
                        document.form_reg_dato.RUTLAEREA.style.borderColor = "#FF0000";
                        document.getElementById('val_rut').innerHTML = "NO A INGRESADO DATO";
                        return false;
                    }
                    document.form_reg_dato.RUTLAEREA.style.borderColor = "#4AF575";


                    if (NOMBRELAEREA == null || NOMBRELAEREA.length == 0 || /^\s+$/.test(NOMBRELAEREA)) {
                        document.form_reg_dato.NOMBRELAEREA.focus();
                        document.form_reg_dato.NOMBRELAEREA.style.borderColor = "#FF0000";
                        document.getElementById('val_nombre').innerHTML = "NO A INGRESADO DATO";
                        return false;
                    }
                    document.form_reg_dato.NOMBRELAEREA.style.borderColor = "#4AF575";

                    if (GIROLAEREA == null || GIROLAEREA.length == 0 || /^\s+$/.test(GIROLAEREA)) {
                        document.form_reg_dato.GIROLAEREA.focus();
                        document.form_reg_dato.GIROLAEREA.style.borderColor = "#FF0000";
                        document.getElementById('val_giro').innerHTML = "NO A INGRESADO DATO";
                        return false;
                    }
                    document.form_reg_dato.GIROLAEREA.style.borderColor = "#4AF575";

                    if (RAZONSOCIALLAEREA == null || RAZONSOCIALLAEREA.length == 0 || /^\s+$/.test(RAZONSOCIALLAEREA)) {
                        document.form_reg_dato.RAZONSOCIALLAEREA.focus();
                        document.form_reg_dato.RAZONSOCIALLAEREA.style.borderColor = "#FF0000";
                        document.getElementById('val_rsocial').innerHTML = "NO A INGRESADO DATO";
                        return false;
                    }
                    document.form_reg_dato.RAZONSOCIALLAEREA.style.borderColor = "#4AF575";


                    if (DIRRECIONLAEREA == null || DIRRECIONLAEREA.length == 0 || /^\s+$/.test(DIRRECIONLAEREA)) {
                        document.form_reg_dato.DIRRECIONLAEREA.focus();
                        document.form_reg_dato.DIRRECIONLAEREA.style.borderColor = "#FF0000";
                        document.getElementById('val_dirrecion').innerHTML = "NO A INGRESADO DATO";
                        return false;
                    }
                    document.form_reg_dato.DIRRECIONLAEREA.style.borderColor = "#4AF575";

                    if (CIUDAD == null || CIUDAD == 0) {
                        document.form_reg_dato.CIUDAD.focus();
                        document.form_reg_dato.CIUDAD.style.borderColor = "#FF0000";
                        document.getElementById('val_ciudad').innerHTML = "NO HA SELECCIONADO  NINGUNA ALTERNATIVA";
                        return false;
                    }
                    document.form_reg_dato.CIUDAD.style.borderColor = "#4AF575";


                    if (CONTACTOLAEREA == null || CONTACTOLAEREA.length == 0 || /^\s+$/.test(CONTACTOLAEREA)) {
                        document.form_reg_dato.CONTACTOLAEREA.focus();
                        document.form_reg_dato.CONTACTOLAEREA.style.borderColor = "#FF0000";
                        document.getElementById('val_contacto').innerHTML = "NO A INGRESADO DATO";
                        return false;
                    }
                    document.form_reg_dato.CONTACTOLAEREA.style.borderColor = "#4AF575";


                    if (TELEFONOLAEREA == null || TELEFONOLAEREA == 0) {
                        document.form_reg_dato.TELEFONOLAEREA.focus();
                        document.form_reg_dato.TELEFONOLAEREA.style.borderColor = "#FF0000";
                        document.getElementById('val_telefono').innerHTML = "NO A INGRESADO DATO";
                        return false;
                    }
                    document.form_reg_dato.TELEFONOLAEREA.style.borderColor = "#4AF575";

                    if (EMAILLAEREA == null || EMAILLAEREA.length == 0 || /^\s+$/.test(EMAILLAEREA)) {
                        document.form_reg_dato.EMAILLAEREA.focus();
                        document.form_reg_dato.EMAILLAEREA.style.borderColor = "#FF0000";
                        document.getElementById('val_email').innerHTML = "NO A INGRESADO DATO";
                        return false;
                    }
                    document.form_reg_dato.EMAILLAEREA.style.borderColor = "#4AF575";

                    if (!(/^(([^<>()[\]\.,;:\s@\"]+(\.[^<>()[\]\.,;:\s@\"]+)*)|(\".+\"))@(([^<>()[\]\.,;:\s@\"]+\.)+[^<>()[\]\.,;:\s@\"]{2,})$/i.test(EMAILLAEREA))) {
                        document.form_reg_dato.EMAILLAEREA.focus();
                        document.form_reg_dato.EMAILLAEREA.style.borderColor = "#ff0000";
                        document.getElementById('val_email').innerHTML = "FORMATO DE CORREO INCORRECTO";
                        return false;
                    }
                    document.form_reg_dato.EMAILLAEREA.style.borderColor = "#4AF575";




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
                                        <input type="text" class="form-control" placeholder="Rut Laerea" id="RUTLAEREA" name="RUTLAEREA" value="<?php echo $RUTLAEREA; ?>" <?php echo $DISABLED; ?> />
                                        <label id="val_rut" class="validacion"> </label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Nombre </label>
                                        <input type="text" class="form-control" placeholder="Nombre Laerea" id="NOMBRELAEREA" name="NOMBRELAEREA" value="<?php echo $NOMBRELAEREA; ?>" <?php echo $DISABLED; ?> />
                                        <label id="val_nombre" class="validacion"> </label>
                                    </div>
                                </div>

                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Giro </label>
                                        <input type="text" class="form-control" placeholder="Giro Laerea" id="GIROLAEREA" name="GIROLAEREA" value="<?php echo $GIROLAEREA; ?>" <?php echo $DISABLED; ?> />
                                        <label id="val_giro" class="validacion"> </label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Razon Social </label>
                                        <input type="text" class="form-control" placeholder="Razon Social Laerea" id="RAZONSOCIALLAEREA" name="RAZONSOCIALLAEREA" value="<?php echo $RAZONSOCIALLAEREA; ?>" <?php echo $DISABLED; ?> />
                                        <label id="val_rsocial" class="validacion"> </label>
                                    </div>
                                </div>

                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Dirrecion </label>
                                        <input type="text" class="form-control" placeholder="Dirrecion Laerea" id="DIRRECIONLAEREA" name="DIRRECIONLAEREA" value="<?php echo $DIRRECIONLAEREA; ?>" <?php echo $DISABLED; ?> />
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
                                        <textarea class="form-control" rows="1" placeholder="Nota Laerea " id="NOTALAEREA" name="NOTALAEREA" <?php echo $DISABLED; ?>><?php echo $NOTALAEREA; ?></textarea>
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
                                        <input type="text" class="form-control" placeholder="Nombre Contacto Laerea" id="CONTACTOLAEREA" name="CONTACTOLAEREA" value="<?php echo $CONTACTOLAEREA; ?>" <?php echo $DISABLED; ?> />
                                        <label id="val_contacto" class="validacion"> </label>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Telefono </label>
                                        <input type="number" class="form-control" placeholder="Telefono Contacto Laerea" id="TELEFONOLAEREA" name="TELEFONOLAEREA" value="<?php echo $TELEFONOLAEREA; ?>" <?php echo $DISABLED; ?> />
                                        <label id="val_telefono" class="validacion"> </label>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Email </label>
                                        <input type="text" class="form-control" placeholder="Email Contacto Laerea" id="EMAILLAEREA" name="EMAILLAEREA" value="<?php echo $EMAILLAEREA; ?>" <?php echo $DISABLED; ?> />
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