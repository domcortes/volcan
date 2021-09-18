<?php

include_once "../config/validarUsuario.php";

//LLAMADA ARCHIVOS NECESARIOS PARA LAS OPERACIONES
include_once '../controlador/TUSUARIO_ADO.php';
include_once '../controlador/EMPRESA_ADO.php';
include_once '../controlador/PLANTA_ADO.php';
include_once '../controlador/TEMPORADA_ADO.php';

include_once '../controlador/CIUDAD_ADO.php';

include_once '../controlador/RFINAL_ADO.php';
include_once '../modelo/RFINAL.php';

//INCIALIZAR LAS VARIBLES
//INICIALIZAR CONTROLADOR
$TUSUARIO_ADO = new TUSUARIO_ADO();
$EMPRESA_ADO =  new EMPRESA_ADO();
$PLANTA_ADO =  new PLANTA_ADO();
$TEMPORADA_ADO =  new TEMPORADA_ADO();

$CIUDAD_ADO =  new CIUDAD_ADO();

$RFINAL_ADO =  new RFINAL_ADO();
//INIICIALIZAR MODELO
$RFINAL =  new RFINAL();


//INCIALIZAR VARIBALES A OCUPAR PARA LA FUNCIONALIDAD
$IDOP = "";
$OP = "";
$DISABLED = "";

$NOMBRERFINAL = "";
$DIRECCIONRFINAL = "";
$CONTACTORFINAL1 = "";
$CARGORFINAL1 = "";
$EMAILRFINAL1 = "";
$CONTACTORFINAL2 = "";
$CARGORFINAL2 = "";
$EMAILRFINAL2 = "";
$CONTACTORFINAL3 = "";
$CARGORFINAL3 = "";
$EMAILRFINAL3 = "";
$CIUDAD = "";



$SINO = "";


//INICIALIZAR ARREGLOS
$ARRAYRFINAL = "";
$ARRAYRFINALID = "";
$ARRAYCIUDAD = "";

//DEFINIR ARREGLOS CON LOS DATOS OBTENIDOS DE LAS FUNCIONES DE LOS CONTROLADORES
$ARRAYRFINAL = $RFINAL_ADO->listarRfinalCBX();
$ARRAYCIUDAD = $CIUDAD_ADO->listarCiudadCBX();



//OPERACIONES
//OPERACION DE REGISTRO DE FILA

if (isset($_REQUEST['GUARDAR'])) {

    //UTILIZACION METODOS SET DEL MODELO
    //SETEO DE ATRIBUTOS DE LA CLASE, OBTENIDO EN EL FORMULARIO   
    $RFINAL->__SET('NOMBRE_RFINAL', $_REQUEST['NOMBRERFINAL']);
    $RFINAL->__SET('DIRECCION_RFINAL', $_REQUEST['DIRECCIONRFINAL']);
    $RFINAL->__SET('CONTACTO1_RFINAL', $_REQUEST['CONTACTORFINAL1']);
    $RFINAL->__SET('CARGO1_RFINAL', $_REQUEST['CARGORFINAL1']);
    $RFINAL->__SET('EMAIL1_RFINAL', $_REQUEST['EMAILRFINAL1']);
    $RFINAL->__SET('CONTACTO2_RFINAL', $_REQUEST['CONTACTORFINAL2']);
    $RFINAL->__SET('CARGO2_RFINAL', $_REQUEST['CARGORFINAL2']);
    $RFINAL->__SET('EMAIL2_RFINAL', $_REQUEST['EMAILRFINAL2']);
    $RFINAL->__SET('CONTACTO3_RFINAL', $_REQUEST['CONTACTORFINAL3']);
    $RFINAL->__SET('CARGO3_RFINAL', $_REQUEST['CARGORFINAL3']);
    $RFINAL->__SET('EMAIL3_RFINAL', $_REQUEST['EMAILRFINAL3']);
    $RFINAL->__SET('CIUDAD', $_REQUEST['CIUDAD']);
    //LLAMADA AL METODO DE REGISTRO DEL CONTROLADOR
    $RFINAL_ADO->agregarRfinal($RFINAL);
    //REDIRECCIONAR A PAGINA registroRfinal.php
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
    <title>Registro Recibidor final</title>
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

                    NOMBRERFINAL = document.getElementById("NOMBRERFINAL").value;
                    DIRECCIONRFINAL = document.getElementById("DIRECCIONRFINAL").value;
                    CONTACTORFINAL1 = document.getElementById("CONTACTORFINAL1").value;
                    CARGORFINAL1 = document.getElementById("CARGORFINAL1").value;
                    EMAILRFINAL1 = document.getElementById("EMAILRFINAL1").value;
                    CONTACTORFINAL2 = document.getElementById("CONTACTORFINAL2").value;
                    CARGORFINAL2 = document.getElementById("CARGORFINAL2").value;
                    EMAILRFINAL2 = document.getElementById("EMAILRFINAL2").value;
                    CONTACTORFINAL3 = document.getElementById("CONTACTORFINAL3").value;
                    CARGORFINAL3 = document.getElementById("CARGORFINAL3").value;
                    EMAILRFINAL3 = document.getElementById("EMAILRFINAL3").value;
                    CIUDAD = document.getElementById("CIUDAD").selectedIndex;


                    document.getElementById('val_nombre').innerHTML = "";
                    document.getElementById('val_direccion').innerHTML = "";
                    document.getElementById('val_contacto1').innerHTML = "";
                    document.getElementById('val_cargo1').innerHTML = "";
                    document.getElementById('val_email1').innerHTML = "";
                    document.getElementById('val_contacto2').innerHTML = "";
                    document.getElementById('val_cargo2').innerHTML = "";
                    document.getElementById('val_email2').innerHTML = "";
                    document.getElementById('val_contacto3').innerHTML = "";
                    document.getElementById('val_cargo3').innerHTML = "";
                    document.getElementById('val_email3').innerHTML = "";
                    document.getElementById('val_ciudad').innerHTML = "";



                    if (NOMBRERFINAL == null || NOMBRERFINAL.length == 0 || /^\s+$/.test(NOMBRERFINAL)) {
                        document.form_reg_dato.NOMBRERFINAL.focus();
                        document.form_reg_dato.NOMBRERFINAL.style.borderColor = "#FF0000";
                        document.getElementById('val_nombre').innerHTML = "NO A INGRESADO DATO";
                        return false;
                    }
                    document.form_reg_dato.NOMBRERFINAL.style.borderColor = "#4AF575";



                    if (DIRECCIONRFINAL == null || DIRECCIONRFINAL.length == 0 || /^\s+$/.test(DIRECCIONRFINAL)) {
                        document.form_reg_dato.DIRECCIONRFINAL.focus();
                        document.form_reg_dato.DIRECCIONRFINAL.style.borderColor = "#FF0000";
                        document.getElementById('val_direccion').innerHTML = "NO A INGRESADO DATO";
                        return false;
                    }
                    document.form_reg_dato.DIRECCIONRFINAL.style.borderColor = "#4AF575";

                    if (CIUDAD == null || CIUDAD == 0) {
                        document.form_reg_dato.CIUDAD.focus();
                        document.form_reg_dato.CIUDAD.style.borderColor = "#FF0000";
                        document.getElementById('val_ciudad').innerHTML = "NO HA SELECCIONADO  NINGUNA ALTERNATIVA";
                        return false;
                    }
                    document.form_reg_dato.CIUDAD.style.borderColor = "#4AF575";


                    if (CONTACTORFINAL1 == null || CONTACTORFINAL1.length == 0 || /^\s+$/.test(CONTACTORFINAL1)) {
                        document.form_reg_dato.CONTACTORFINAL1.focus();
                        document.form_reg_dato.CONTACTORFINAL1.style.borderColor = "#FF0000";
                        document.getElementById('val_contacto1').innerHTML = "NO A INGRESADO DATO";
                        return false;
                    }
                    document.form_reg_dato.CONTACTORFINAL1.style.borderColor = "#4AF575";



                    if (CARGORFINAL1 == null || CARGORFINAL1.length == 0 || /^\s+$/.test(CARGORFINAL1)) {
                        document.form_reg_dato.CARGORFINAL1.focus();
                        document.form_reg_dato.CARGORFINAL1.style.borderColor = "#FF0000";
                        document.getElementById('val_cargo1').innerHTML = "NO A INGRESADO DATO";
                        return false;
                    }
                    document.form_reg_dato.CARGORFINAL1.style.borderColor = "#4AF575";



                    if (EMAILRFINAL1 == null || EMAILRFINAL1.length == 0 || /^\s+$/.test(EMAILRFINAL1)) {
                        document.form_reg_dato.EMAILRFINAL1.focus();
                        document.form_reg_dato.EMAILRFINAL1.style.borderColor = "#FF0000";
                        document.getElementById('val_email1').innerHTML = "NO A INGRESADO DATO";
                        return false;
                    }
                    document.form_reg_dato.EMAILRFINAL1.style.borderColor = "#4AF575";


                    if (!(/^(([^<>()[\]\.,;:\s@\"]+(\.[^<>()[\]\.,;:\s@\"]+)*)|(\".+\"))@(([^<>()[\]\.,;:\s@\"]+\.)+[^<>()[\]\.,;:\s@\"]{2,})$/i
                            .test(EMAILRFINAL1))) {
                        document.form_reg_dato.EMAILRFINAL1.focus();
                        document.form_reg_dato.EMAILRFINAL1.style.borderColor = "#ff0000";
                        document.getElementById('val_email1').innerHTML = "FORMATO DE CORREO INCORRECTO";
                        return false;
                    }
                    document.form_reg_dato.EMAILRFINAL1.style.borderColor = "#4AF575";



                    if (CONTACTORFINAL2 == null || CONTACTORFINAL2.length == 0 || /^\s+$/.test(CONTACTORFINAL2)) {
                        document.form_reg_dato.CONTACTORFINAL2.focus();
                        document.form_reg_dato.CONTACTORFINAL2.style.borderColor = "#FF0000";
                        document.getElementById('val_contacto2').innerHTML = "NO A INGRESADO DATO";
                        return false;
                    }
                    document.form_reg_dato.CONTACTORFINAL2.style.borderColor = "#4AF575";



                    if (CARGORFINAL2 == null || CARGORFINAL2.length == 0 || /^\s+$/.test(CARGORFINAL2)) {
                        document.form_reg_dato.CARGORFINAL2.focus();
                        document.form_reg_dato.CARGORFINAL2.style.borderColor = "#FF0000";
                        document.getElementById('val_cargo2').innerHTML = "NO A INGRESADO DATO";
                        return false;
                    }
                    document.form_reg_dato.CARGORFINAL2.style.borderColor = "#4AF575";



                    if (EMAILRFINAL2 == null || EMAILRFINAL2.length == 0 || /^\s+$/.test(EMAILRFINAL2)) {
                        document.form_reg_dato.EMAILRFINAL2.focus();
                        document.form_reg_dato.EMAILRFINAL2.style.borderColor = "#FF0000";
                        document.getElementById('val_email2').innerHTML = "NO A INGRESADO DATO";
                        return false;
                    }
                    document.form_reg_dato.EMAILRFINAL2.style.borderColor = "#4AF575";


                    if (!(/^(([^<>()[\]\.,;:\s@\"]+(\.[^<>()[\]\.,;:\s@\"]+)*)|(\".+\"))@(([^<>()[\]\.,;:\s@\"]+\.)+[^<>()[\]\.,;:\s@\"]{2,})$/i
                            .test(EMAILRFINAL2))) {
                        document.form_reg_dato.EMAILRFINAL2.focus();
                        document.form_reg_dato.EMAILRFINAL2.style.borderColor = "#ff0000";
                        document.getElementById('val_email2').innerHTML = "FORMATO DE CORREO INCORRECTO";
                        return false;
                    }
                    document.form_reg_dato.EMAILRFINAL2.style.borderColor = "#4AF575";

                    if (CONTACTORFINAL3 == null || CONTACTORFINAL3.length == 0 || /^\s+$/.test(CONTACTORFINAL3)) {
                        document.form_reg_dato.CONTACTORFINAL3.focus();
                        document.form_reg_dato.CONTACTORFINAL3.style.borderColor = "#FF0000";
                        document.getElementById('val_contacto3').innerHTML = "NO A INGRESADO DATO";
                        return false;
                    }
                    document.form_reg_dato.CONTACTORFINAL3.style.borderColor = "#4AF575";



                    if (CARGORFINAL3 == null || CARGORFINAL3.length == 0 || /^\s+$/.test(CARGORFINAL3)) {
                        document.form_reg_dato.CARGORFINAL3.focus();
                        document.form_reg_dato.CARGORFINAL3.style.borderColor = "#FF0000";
                        document.getElementById('val_cargo3').innerHTML = "NO A INGRESADO DATO";
                        return false;
                    }
                    document.form_reg_dato.CARGORFINAL3.style.borderColor = "#4AF575";



                    if (EMAILRFINAL3 == null || EMAILRFINAL3.length == 0 || /^\s+$/.test(EMAILRFINAL3)) {
                        document.form_reg_dato.EMAILRFINAL3.focus();
                        document.form_reg_dato.EMAILRFINAL3.style.borderColor = "#FF0000";
                        document.getElementById('val_email3').innerHTML = "NO A INGRESADO DATO";
                        return false;
                    }
                    document.form_reg_dato.EMAILRFINAL3.style.borderColor = "#4AF575";


                    if (!(/^(([^<>()[\]\.,;:\s@\"]+(\.[^<>()[\]\.,;:\s@\"]+)*)|(\".+\"))@(([^<>()[\]\.,;:\s@\"]+\.)+[^<>()[\]\.,;:\s@\"]{2,})$/i
                            .test(EMAILRFINAL3))) {
                        document.form_reg_dato.EMAILRFINAL3.focus();
                        document.form_reg_dato.EMAILRFINAL3.style.borderColor = "#ff0000";
                        document.getElementById('val_email3').innerHTML = "FORMATO DE CORREO INCORRECTO";
                        return false;
                    }
                    document.form_reg_dato.EMAILRFINAL3.style.borderColor = "#4AF575";





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
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Nombre </label>
                                        <input type="text" class="form-control" placeholder="Nombre Rfinal" id="NOMBRERFINAL" name="NOMBRERFINAL" value="<?php echo $NOMBRERFINAL; ?>" <?php echo $DISABLED; ?> />
                                        <label id="val_nombre" class="validacion"> </label>
                                    </div>
                                </div>
                            </div>


                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Direccion </label>
                                        <input type="text" class="form-control" placeholder="Direccion Rfinal" id="DIRECCIONRFINAL" name="DIRECCIONRFINAL" value="<?php echo $DIRECCIONRFINAL; ?>" <?php echo $DISABLED; ?> />
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
                                        <label>Contacto 1</label>
                                        <input type="text" class="form-control" placeholder="Nombre Contacto 1 Rfinal" id="CONTACTORFINAL1" name="CONTACTORFINAL1" value="<?php echo $CONTACTORFINAL1; ?>" <?php echo $DISABLED; ?> />
                                        <label id="val_contacto1" class="validacion"> </label>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Cargo 1</label>
                                        <input type="text" class="form-control" placeholder="Cargo Contacto 1 Rfinal" id="CARGORFINAL1" name="CARGORFINAL1" value="<?php echo $CARGORFINAL1; ?>" <?php echo $DISABLED; ?> />
                                        <label id="val_cargo1" class="validacion"> </label>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Email 1</label>
                                        <input type="text" class="form-control" placeholder="Email Contacto 1 Rfinal" id="EMAILRFINAL1" name="EMAILRFINAL1" value="<?php echo $EMAILRFINAL1; ?>" <?php echo $DISABLED; ?> />
                                        <label id="val_email1" class="validacion"> </label>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Contacto 2</label>
                                        <input type="text" class="form-control" placeholder="Nombre Contacto 2 Rfinal" id="CONTACTORFINAL2" name="CONTACTORFINAL2" value="<?php echo $CONTACTORFINAL2; ?>" <?php echo $DISABLED; ?> />
                                        <label id="val_contacto2" class="validacion"> </label>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Cargo 2</label>
                                        <input type="text" class="form-control" placeholder="Cargo Contacto 2 Rfinal" id="CARGORFINAL2" name="CARGORFINAL2" value="<?php echo $CARGORFINAL2; ?>" <?php echo $DISABLED; ?> />
                                        <label id="val_cargo2" class="validacion"> </label>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Email 2</label>
                                        <input type="text" class="form-control" placeholder="Email Contacto 2 Rfinal" id="EMAILRFINAL2" name="EMAILRFINAL2" value="<?php echo $EMAILRFINAL2; ?>" <?php echo $DISABLED; ?> />
                                        <label id="val_email2" class="validacion"> </label>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Contacto 3</label>
                                        <input type="text" class="form-control" placeholder="Nombre Contacto 3 Rfinal" id="CONTACTORFINAL3" name="CONTACTORFINAL3" value="<?php echo $CONTACTORFINAL3; ?>" <?php echo $DISABLED; ?> />
                                        <label id="val_contacto3" class="validacion"> </label>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Cargo 3</label>
                                        <input type="text" class="form-control" placeholder="Cargo Contacto 3 Rfinal" id="CARGORFINAL3" name="CARGORFINAL3" value="<?php echo $CARGORFINAL3; ?>" <?php echo $DISABLED; ?> />
                                        <label id="val_cargo3" class="validacion"> </label>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Email 3</label>
                                        <input type="text" class="form-control" placeholder="Email Contacto 3 Rfinal" id="EMAILRFINAL3" name="EMAILRFINAL3" value="<?php echo $EMAILRFINAL3; ?>" <?php echo $DISABLED; ?> />
                                        <label id="val_email3" class="validacion"> </label>
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
            </section>
            <!-- /.content -->

            <!- LLAMADA ARCHIVO DEL DISEÑO DEL FOOTER Y MENU USUARIO -!>
                <?php include_once "../config/menuExtra.php"; ?>
    </div>
    <!- LLAMADA URL DE ARCHIVOS DE DISEÑO Y JQUERY E OTROS -!>
        <?php include_once "../config/urlBase.php"; ?>
</body>

</html>