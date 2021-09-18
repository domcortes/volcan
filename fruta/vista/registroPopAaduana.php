<?php

include_once "../config/validarUsuario.php";

//LLAMADA ARCHIVOS NECESARIOS PARA LAS OPERACIONES
include_once '../controlador/TUSUARIO_ADO.php';
include_once '../controlador/EMPRESA_ADO.php';
include_once '../controlador/PLANTA_ADO.php';
include_once '../controlador/TEMPORADA_ADO.php';

include_once '../controlador/CIUDAD_ADO.php';

include_once '../controlador/AADUANA_ADO.php';
include_once '../modelo/AADUANA.php';

//INCIALIZAR LAS VARIBLES
//INICIALIZAR CONTROLADOR
$TUSUARIO_ADO = new TUSUARIO_ADO();
$EMPRESA_ADO =  new EMPRESA_ADO();
$PLANTA_ADO =  new PLANTA_ADO();
$TEMPORADA_ADO =  new TEMPORADA_ADO();

$CIUDAD_ADO =  new CIUDAD_ADO();

$AADUANA_ADO =  new AADUANA_ADO();
//INIICIALIZAR MODELO
$AADUANA =  new AADUANA();


//INCIALIZAR VARIBALES A OCUPAR PARA LA FUNCIONALIDAD
$IDOP = "";
$OP = "";
$DISABLED = "";

$RUTAADUANA = "";
$NOMBREAADUANA = "";
$DIRECCIONAADUANA = "";
$RAZONSOCIALAADUANA = "";
$GIROAADUANA = "";
$CONTACTOAADUANA = "";
$TELEFONOAADUANA = "";
$EMAILAADUANA = "";
$CIUDAD = "";



$SINO = "";


//INICIALIZAR ARREGLOS
$ARRAYAADUANA = "";
$ARRAYAADUANAID = "";
$ARRAYCIUDAD = "";

//DEFINIR ARREGLOS CON LOS DATOS OBTENIDOS DE LAS FUNCIONES DE LOS CONTROLADORES
$ARRAYAADUANA = $AADUANA_ADO->listarAaduanaCBX();
$ARRAYCIUDAD = $CIUDAD_ADO->listarCiudadCBX();



//OPERACIONES
//OPERACION DE REGISTRO DE FILA

if (isset($_REQUEST['GUARDAR'])) {

    //UTILIZACION METODOS SET DEL MODELO
    //SETEO DE ATRIBUTOS DE LA CLASE, OBTENIDO EN EL FORMULARIO   
    $AADUANA->__SET('RUT_AADUANA', $_REQUEST['RUTAADUANA']);
    $AADUANA->__SET('NOMBRE_AADUANA', $_REQUEST['NOMBREAADUANA']);
    $AADUANA->__SET('RAZON_SOCIAL_AADUANA', $_REQUEST['RAZONSOCIALAADUANA']);
    $AADUANA->__SET('GIRO_AADUANA', $_REQUEST['GIROAADUANA']);
    $AADUANA->__SET('DIRECCION_AADUANA', $_REQUEST['DIRECCIONAADUANA']);
    $AADUANA->__SET('CONTACTO_AADUANA', $_REQUEST['CONTACTOAADUANA']);
    $AADUANA->__SET('TELEFONO_AADUANA', $_REQUEST['TELEFONOAADUANA']);
    $AADUANA->__SET('EMAIL_AADUANA', $_REQUEST['EMAILAADUANA']);
    $AADUANA->__SET('CIUDAD', $_REQUEST['CIUDAD']);
    //LLAMADA AL METODO DE REGISTRO DEL CONTROLADOR
    $AADUANA_ADO->agregarAaduana($AADUANA);
    //REDIRECCIONAR A PAGINA registroAaduana.php
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
    <title>Registro Agente Aduana</title>
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




                    RUTAADUANA = document.getElementById("RUTAADUANA").value;
                    NOMBREAADUANA = document.getElementById("NOMBREAADUANA").value;


                    RAZONSOCIALAADUANA = document.getElementById("RAZONSOCIALAADUANA").value;
                    GIROAADUANA = document.getElementById("GIROAADUANA").value;

                    DIRECCIONAADUANA = document.getElementById("DIRECCIONAADUANA").value;
                    CIUDAD = document.getElementById("CIUDAD").selectedIndex;
                    CONTACTOAADUANA = document.getElementById("CONTACTOAADUANA").value;
                    TELEFONOAADUANA = document.getElementById("TELEFONOAADUANA").value;
                    EMAILAADUANA = document.getElementById("EMAILAADUANA").value;


                    document.getElementById('val_rut').innerHTML = "";
                    document.getElementById('val_nombre').innerHTML = "";
                    document.getElementById('val_rsocial').innerHTML = "";
                    document.getElementById('val_giro').innerHTML = "";
                    document.getElementById('val_direccion').innerHTML = "";
                    document.getElementById('val_ciudad').innerHTML = "";
                    document.getElementById('val_contacto').innerHTML = "";
                    document.getElementById('val_telefono').innerHTML = "";
                    document.getElementById('val_email').innerHTML = "";

                    if (RUTAADUANA == null || RUTAADUANA.length == 0 || /^\s+$/.test(RUTAADUANA)) {
                        document.form_reg_dato.RUTAADUANA.focus();
                        document.form_reg_dato.RUTAADUANA.style.borderColor = "#FF0000";
                        document.getElementById('val_rut').innerHTML = "NO A INGRESADO DATO";
                        return false;
                    }
                    document.form_reg_dato.RUTAADUANA.style.borderColor = "#4AF575";

                    if (NOMBREAADUANA == null || NOMBREAADUANA.length == 0 || /^\s+$/.test(NOMBREAADUANA)) {
                        document.form_reg_dato.NOMBREAADUANA.focus();
                        document.form_reg_dato.NOMBREAADUANA.style.borderColor = "#FF0000";
                        document.getElementById('val_nombre').innerHTML = "NO A INGRESADO DATO";
                        return false;
                    }
                    document.form_reg_dato.NOMBREAADUANA.style.borderColor = "#4AF575";


                    if (RAZONSOCIALAADUANA == null || RAZONSOCIALAADUANA.length == 0 || /^\s+$/.test(RAZONSOCIALAADUANA)) {
                        document.form_reg_dato.RAZONSOCIALAADUANA.focus();
                        document.form_reg_dato.RAZONSOCIALAADUANA.style.borderColor = "#FF0000";
                        document.getElementById('val_rsocial').innerHTML = "NO A INGRESADO DATO";
                        return false;
                    }
                    document.form_reg_dato.RAZONSOCIALAADUANA.style.borderColor = "#4AF575";


                    if (GIROAADUANA == null || GIROAADUANA.length == 0 || /^\s+$/.test(GIROAADUANA)) {
                        document.form_reg_dato.GIROAADUANA.focus();
                        document.form_reg_dato.GIROAADUANA.style.borderColor = "#FF0000";
                        document.getElementById('val_giro').innerHTML = "NO A INGRESADO DATO";
                        return false;
                    }
                    document.form_reg_dato.GIROAADUANA.style.borderColor = "#4AF575";

                    if (DIRECCIONAADUANA == null || DIRECCIONAADUANA.length == 0 || /^\s+$/.test(DIRECCIONAADUANA)) {
                        document.form_reg_dato.DIRECCIONAADUANA.focus();
                        document.form_reg_dato.DIRECCIONAADUANA.style.borderColor = "#FF0000";
                        document.getElementById('val_direccion').innerHTML = "NO A INGRESADO DATO";
                        return false;
                    }
                    document.form_reg_dato.DIRECCIONAADUANA.style.borderColor = "#4AF575";

                    if (CIUDAD == null || CIUDAD == 0) {
                        document.form_reg_dato.CIUDAD.focus();
                        document.form_reg_dato.CIUDAD.style.borderColor = "#FF0000";
                        document.getElementById('val_ciudad').innerHTML = "NO HA SELECCIONADO  NINGUNA ALTERNATIVA";
                        return false;
                    }
                    document.form_reg_dato.CIUDAD.style.borderColor = "#4AF575";



                    if (CONTACTOAADUANA == null || CONTACTOAADUANA.length == 0 || /^\s+$/.test(CONTACTOAADUANA)) {
                        document.form_reg_dato.CONTACTOAADUANA.focus();
                        document.form_reg_dato.CONTACTOAADUANA.style.borderColor = "#FF0000";
                        document.getElementById('val_contacto').innerHTML = "NO A INGRESADO DATO";
                        return false;
                    }
                    document.form_reg_dato.CONTACTOAADUANA.style.borderColor = "#4AF575";


                    if (TELEFONOAADUANA == null || TELEFONOAADUANA == 0) {
                        document.form_reg_dato.TELEFONOAADUANA.focus();
                        document.form_reg_dato.TELEFONOAADUANA.style.borderColor = "#FF0000";
                        document.getElementById('val_telefono').innerHTML = "NO A INGRESADO DATO";
                        return false;
                    }
                    document.form_reg_dato.TELEFONOAADUANA.style.borderColor = "#4AF575";


                    if (EMAILAADUANA == null || EMAILAADUANA.length == 0 || /^\s+$/.test(EMAILAADUANA)) {
                        document.form_reg_dato.EMAILAADUANA.focus();
                        document.form_reg_dato.EMAILAADUANA.style.borderColor = "#FF0000";
                        document.getElementById('val_email').innerHTML = "NO A INGRESADO DATO";
                        return false;
                    }
                    document.form_reg_dato.EMAILAADUANA.style.borderColor = "#4AF575";


                    if (!(/^(([^<>()[\]\.,;:\s@\"]+(\.[^<>()[\]\.,;:\s@\"]+)*)|(\".+\"))@(([^<>()[\]\.,;:\s@\"]+\.)+[^<>()[\]\.,;:\s@\"]{2,})$/i
                            .test(EMAILAADUANA))) {
                        document.form_reg_dato.EMAILAADUANA.focus();
                        document.form_reg_dato.EMAILAADUANA.style.borderColor = "#ff0000";
                        document.getElementById('val_email').innerHTML = "FORMATO DE CORREO INCORRECTO";
                        return false;
                    }
                    document.form_reg_dato.EMAILAADUANA.style.borderColor = "#4AF575";






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
                                        <input type="text" class="form-control" placeholder="Rut Agente Aduana" id="RUTAADUANA" name="RUTAADUANA" value="<?php echo $RUTAADUANA; ?>" <?php echo $DISABLED; ?> />
                                        <label id="val_rut" class="validacion"> </label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Nombre </label>
                                        <input type="text" class="form-control" placeholder="Nombre Agente Aduana" id="NOMBREAADUANA" name="NOMBREAADUANA" value="<?php echo $NOMBREAADUANA; ?>" <?php echo $DISABLED; ?> />
                                        <label id="val_nombre" class="validacion"> </label>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Razon social </label>
                                        <input type="text" class="form-control" placeholder="Razon social Agente Aduana" id="RAZONSOCIALAADUANA" name="RAZONSOCIALAADUANA" value="<?php echo $RAZONSOCIALAADUANA; ?>" <?php echo $DISABLED; ?> />
                                        <label id="val_rsocial" class="validacion"> </label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Giro </label>
                                        <input type="text" class="form-control" placeholder="Giro Agente Aduana" id="GIROAADUANA" name="GIROAADUANA" value="<?php echo $GIROAADUANA; ?>" <?php echo $DISABLED; ?> />
                                        <label id="val_giro" class="validacion"> </label>
                                    </div>
                                </div>
                            </div>



                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Direccion </label>
                                        <input type="text" class="form-control" placeholder="Direccion Agente Aduana" id="DIRECCIONAADUANA" name="DIRECCIONAADUANA" value="<?php echo $DIRECCIONAADUANA; ?>" <?php echo $DISABLED; ?> />
                                        <label id="val_direccion" class="validacion"> </label>
                                    </div>
                                </div>
                                <div class="col-md-6 col-12">
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
                                        <input type="text" class="form-control" placeholder="Nombre Contacto Agente Aduana" id="CONTACTOAADUANA" name="CONTACTOAADUANA" value="<?php echo $CONTACTOAADUANA; ?>" <?php echo $DISABLED; ?> />
                                        <label id="val_contacto" class="validacion"> </label>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Telefono </label>
                                        <input type="number" class="form-control" placeholder="Telefono Contacto Agente Aduana" id="TELEFONOAADUANA" name="TELEFONOAADUANA" value="<?php echo $TELEFONOAADUANA; ?>" <?php echo $DISABLED; ?> />
                                        <label id="val_telefono" class="validacion"> </label>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Email </label>
                                        <input type="text" class="form-control" placeholder="Email Contacto Agente Aduana" id="EMAILAADUANA" name="EMAILAADUANA" value="<?php echo $EMAILAADUANA; ?>" <?php echo $DISABLED; ?> />
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