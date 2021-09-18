<?php

include_once "../config/validarUsuario.php";

//LLAMADA ARCHIVOS NECESARIOS PARA LAS OPERACIONES
include_once '../controlador/CIUDAD_ADO.php';

include_once '../controlador/NOTIFICADOR_ADO.php';
include_once '../modelo/NOTIFICADOR.php';

//INCIALIZAR LAS VARIBLES
//INICIALIZAR CONTROLADOR


$CIUDAD_ADO =  new CIUDAD_ADO();

$NOTIFICADOR_ADO =  new NOTIFICADOR_ADO();
//INIICIALIZAR MODELO
$NOTIFICADOR =  new NOTIFICADOR();


//INCIALIZAR VARIBALES A OCUPAR PARA LA FUNCIONALIDAD
$IDOP = "";
$OP = "";
$DISABLED = "";

$NOMBRENOTIFICADOR = "";
$EORINOTIFICADOR = "";
$DIRECCIONNOTIFICADOR = "";
$CONTACTONOTIFICADOR1 = "";
$CARGONOTIFICADOR1 = "";
$EMAILNOTIFICADOR1 = "";
$CONTACTONOTIFICADOR2 = "";
$CARGONOTIFICADOR2 = "";
$EMAILNOTIFICADOR2 = "";
$CONTACTONOTIFICADOR3 = "";
$CARGONOTIFICADOR3 = "";
$EMAILNOTIFICADOR3 = "";
$CIUDAD = "";



$SINO = "";


//INICIALIZAR ARREGLOS
$ARRAYNOTIFICADOR = "";
$ARRAYNOTIFICADORID = "";
$ARRAYCIUDAD = "";

//DEFINIR ARREGLOS CON LOS DATOS OBTENIDOS DE LAS FUNCIONES DE LOS CONTROLADORES
$ARRAYNOTIFICADOR = $NOTIFICADOR_ADO->listarNotificadorCBX();
$ARRAYCIUDAD = $CIUDAD_ADO->listarCiudadCBX();



//OPERACIONES
//OPERACION DE REGISTRO DE FILA

if (isset($_REQUEST['GUARDAR'])) {

    $ARRAYNUMERO = $NOTIFICADOR_ADO->obtenerNumero($EMPRESAS);
    $NUMERO = $ARRAYNUMERO[0]['NUMERO'] + 1;


    //UTILIZACION METODOS SET DEL MODELO
    //SETEO DE ATRIBUTOS DE LA CLASE, OBTENIDO EN EL FORMULARIO   
    $NOTIFICADOR->__SET('NUMERO_NOTIFICADOR', $NUMERO);
    $NOTIFICADOR->__SET('NOMBRE_NOTIFICADOR', $_REQUEST['NOMBRENOTIFICADOR']);
    $NOTIFICADOR->__SET('EORI_NOTIFICADOR', $_REQUEST['EORINOTIFICADOR']);
    $NOTIFICADOR->__SET('DIRECCION_NOTIFICADOR', $_REQUEST['DIRECCIONNOTIFICADOR']);
    $NOTIFICADOR->__SET('CONTACTO1_NOTIFICADOR', $_REQUEST['CONTACTONOTIFICADOR1']);
    $NOTIFICADOR->__SET('CARGO1_NOTIFICADOR', $_REQUEST['CARGONOTIFICADOR1']);
    $NOTIFICADOR->__SET('EMAIL1_NOTIFICADOR', $_REQUEST['EMAILNOTIFICADOR1']);
    $NOTIFICADOR->__SET('CONTACTO2_NOTIFICADOR', $_REQUEST['CONTACTONOTIFICADOR2']);
    $NOTIFICADOR->__SET('CARGO2_NOTIFICADOR', $_REQUEST['CARGONOTIFICADOR2']);
    $NOTIFICADOR->__SET('EMAIL2_NOTIFICADOR', $_REQUEST['EMAILNOTIFICADOR2']);
    $NOTIFICADOR->__SET('CONTACTO3_NOTIFICADOR', $_REQUEST['CONTACTONOTIFICADOR3']);
    $NOTIFICADOR->__SET('CARGO3_NOTIFICADOR', $_REQUEST['CARGONOTIFICADOR3']);
    $NOTIFICADOR->__SET('EMAIL3_NOTIFICADOR', $_REQUEST['EMAILNOTIFICADOR3']);
    $NOTIFICADOR->__SET('ID_CIUDAD', $_REQUEST['CIUDAD']);
    $NOTIFICADOR->__SET('ID_EMPRESA', $_REQUEST['EMPRESA']);
    $NOTIFICADOR->__SET('ID_USUARIOI', $IDUSUARIOS);
    $NOTIFICADOR->__SET('ID_USUARIOM', $IDUSUARIOS);
    //LLAMADA AL METODO DE REGISTRO DEL CONTROLADOR
    $NOTIFICADOR_ADO->agregarNotificador($NOTIFICADOR);
    //REDIRECCIONAR A PAGINA registroNotificador.php
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
    <title>Registro Notificador</title>
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

                    NOMBRENOTIFICADOR = document.getElementById("NOMBRENOTIFICADOR").value;
                    EORINOTIFICADOR = document.getElementById("EORINOTIFICADOR").value;
                    DIRECCIONNOTIFICADOR = document.getElementById("DIRECCIONNOTIFICADOR").value;
                    CONTACTONOTIFICADOR1 = document.getElementById("CONTACTONOTIFICADOR1").value;
                    CARGONOTIFICADOR1 = document.getElementById("CARGONOTIFICADOR1").value;
                    EMAILNOTIFICADOR1 = document.getElementById("EMAILNOTIFICADOR1").value;
                    CONTACTONOTIFICADOR2 = document.getElementById("CONTACTONOTIFICADOR2").value;
                    CARGONOTIFICADOR2 = document.getElementById("CARGONOTIFICADOR2").value;
                    EMAILNOTIFICADOR2 = document.getElementById("EMAILNOTIFICADOR2").value;
                    CONTACTONOTIFICADOR3 = document.getElementById("CONTACTONOTIFICADOR3").value;
                    CARGONOTIFICADOR3 = document.getElementById("CARGONOTIFICADOR3").value;
                    EMAILNOTIFICADOR3 = document.getElementById("EMAILNOTIFICADOR3").value;
                    CIUDAD = document.getElementById("CIUDAD").selectedIndex;


                    document.getElementById('val_nombre').innerHTML = "";
                    document.getElementById('val_eori').innerHTML = "";
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



                    if (NOMBRENOTIFICADOR == null || NOMBRENOTIFICADOR.length == 0 || /^\s+$/.test(NOMBRENOTIFICADOR)) {
                        document.form_reg_dato.NOMBRENOTIFICADOR.focus();
                        document.form_reg_dato.NOMBRENOTIFICADOR.style.borderColor = "#FF0000";
                        document.getElementById('val_nombre').innerHTML = "NO A INGRESADO DATO";
                        return false;
                    }
                    document.form_reg_dato.NOMBRENOTIFICADOR.style.borderColor = "#4AF575";


                    if (EORINOTIFICADOR == null || EORINOTIFICADOR.length == 0 || /^\s+$/.test(EORINOTIFICADOR)) {
                        document.form_reg_dato.EORINOTIFICADOR.focus();
                        document.form_reg_dato.EORINOTIFICADOR.style.borderColor = "#FF0000";
                        document.getElementById('val_eori').innerHTML = "NO A INGRESADO DATO";
                        return false;
                    }
                    document.form_reg_dato.EORINOTIFICADOR.style.borderColor = "#4AF575";


                    if (DIRECCIONNOTIFICADOR == null || DIRECCIONNOTIFICADOR.length == 0 || /^\s+$/.test(DIRECCIONNOTIFICADOR)) {
                        document.form_reg_dato.DIRECCIONNOTIFICADOR.focus();
                        document.form_reg_dato.DIRECCIONNOTIFICADOR.style.borderColor = "#FF0000";
                        document.getElementById('val_direccion').innerHTML = "NO A INGRESADO DATO";
                        return false;
                    }
                    document.form_reg_dato.DIRECCIONNOTIFICADOR.style.borderColor = "#4AF575";

                    /*
                                        if (CIUDAD == null || CIUDAD == 0) {
                                            document.form_reg_dato.CIUDAD.focus();
                                            document.form_reg_dato.CIUDAD.style.borderColor = "#FF0000";
                                            document.getElementById('val_ciudad').innerHTML = "NO HA SELECCIONADO  NINGUNA ALTERNATIVA";
                                            return false;
                                        }
                                        document.form_reg_dato.CIUDAD.style.borderColor = "#4AF575";





                                        if (CONTACTONOTIFICADOR1 == null || CONTACTONOTIFICADOR1.length == 0 || /^\s+$/.test(CONTACTONOTIFICADOR1)) {
                                            document.form_reg_dato.CONTACTONOTIFICADOR1.focus();
                                            document.form_reg_dato.CONTACTONOTIFICADOR1.style.borderColor = "#FF0000";
                                            document.getElementById('val_contacto1').innerHTML = "NO A INGRESADO DATO";
                                            return false;
                                        }
                                        document.form_reg_dato.CONTACTONOTIFICADOR1.style.borderColor = "#4AF575";



                                        if (CARGONOTIFICADOR1 == null || CARGONOTIFICADOR1.length == 0 || /^\s+$/.test(CARGONOTIFICADOR1)) {
                                            document.form_reg_dato.CARGONOTIFICADOR1.focus();
                                            document.form_reg_dato.CARGONOTIFICADOR1.style.borderColor = "#FF0000";
                                            document.getElementById('val_cargo1').innerHTML = "NO A INGRESADO DATO";
                                            return false;
                                        }
                                        document.form_reg_dato.CARGONOTIFICADOR1.style.borderColor = "#4AF575";



                                        if (EMAILNOTIFICADOR1 == null || EMAILNOTIFICADOR1.length == 0 || /^\s+$/.test(EMAILNOTIFICADOR1)) {
                                            document.form_reg_dato.EMAILNOTIFICADOR1.focus();
                                            document.form_reg_dato.EMAILNOTIFICADOR1.style.borderColor = "#FF0000";
                                            document.getElementById('val_email1').innerHTML = "NO A INGRESADO DATO";
                                            return false;
                                        }
                                        document.form_reg_dato.EMAILNOTIFICADOR1.style.borderColor = "#4AF575";


                                        if (!(/^(([^<>()[\]\.,;:\s@\"]+(\.[^<>()[\]\.,;:\s@\"]+)*)|(\".+\"))@(([^<>()[\]\.,;:\s@\"]+\.)+[^<>()[\]\.,;:\s@\"]{2,})$/i
                                                .test(EMAILNOTIFICADOR1))) {
                                            document.form_reg_dato.EMAILNOTIFICADOR1.focus();
                                            document.form_reg_dato.EMAILNOTIFICADOR1.style.borderColor = "#ff0000";
                                            document.getElementById('val_email1').innerHTML = "FORMATO DE CORREO INCORRECTO";
                                            return false;
                                        }
                                        document.form_reg_dato.EMAILNOTIFICADOR1.style.borderColor = "#4AF575";



                                        if (CONTACTONOTIFICADOR2 == null || CONTACTONOTIFICADOR2.length == 0 || /^\s+$/.test(CONTACTONOTIFICADOR2)) {
                                            document.form_reg_dato.CONTACTONOTIFICADOR2.focus();
                                            document.form_reg_dato.CONTACTONOTIFICADOR2.style.borderColor = "#FF0000";
                                            document.getElementById('val_contacto2').innerHTML = "NO A INGRESADO DATO";
                                            return false;
                                        }
                                        document.form_reg_dato.CONTACTONOTIFICADOR2.style.borderColor = "#4AF575";



                                        if (CARGONOTIFICADOR2 == null || CARGONOTIFICADOR2.length == 0 || /^\s+$/.test(CARGONOTIFICADOR2)) {
                                            document.form_reg_dato.CARGONOTIFICADOR2.focus();
                                            document.form_reg_dato.CARGONOTIFICADOR2.style.borderColor = "#FF0000";
                                            document.getElementById('val_cargo2').innerHTML = "NO A INGRESADO DATO";
                                            return false;
                                        }
                                        document.form_reg_dato.CARGONOTIFICADOR2.style.borderColor = "#4AF575";



                                        if (EMAILNOTIFICADOR2 == null || EMAILNOTIFICADOR2.length == 0 || /^\s+$/.test(EMAILNOTIFICADOR2)) {
                                            document.form_reg_dato.EMAILNOTIFICADOR2.focus();
                                            document.form_reg_dato.EMAILNOTIFICADOR2.style.borderColor = "#FF0000";
                                            document.getElementById('val_email2').innerHTML = "NO A INGRESADO DATO";
                                            return false;
                                        }
                                        document.form_reg_dato.EMAILNOTIFICADOR2.style.borderColor = "#4AF575";


                                        if (!(/^(([^<>()[\]\.,;:\s@\"]+(\.[^<>()[\]\.,;:\s@\"]+)*)|(\".+\"))@(([^<>()[\]\.,;:\s@\"]+\.)+[^<>()[\]\.,;:\s@\"]{2,})$/i
                                                .test(EMAILNOTIFICADOR2))) {
                                            document.form_reg_dato.EMAILNOTIFICADOR2.focus();
                                            document.form_reg_dato.EMAILNOTIFICADOR2.style.borderColor = "#ff0000";
                                            document.getElementById('val_email2').innerHTML = "FORMATO DE CORREO INCORRECTO";
                                            return false;
                                        }
                                        document.form_reg_dato.EMAILNOTIFICADOR2.style.borderColor = "#4AF575";

                                        if (CONTACTONOTIFICADOR3 == null || CONTACTONOTIFICADOR3.length == 0 || /^\s+$/.test(CONTACTONOTIFICADOR3)) {
                                            document.form_reg_dato.CONTACTONOTIFICADOR3.focus();
                                            document.form_reg_dato.CONTACTONOTIFICADOR3.style.borderColor = "#FF0000";
                                            document.getElementById('val_contacto3').innerHTML = "NO A INGRESADO DATO";
                                            return false;
                                        }
                                        document.form_reg_dato.CONTACTONOTIFICADOR3.style.borderColor = "#4AF575";



                                        if (CARGONOTIFICADOR3 == null || CARGONOTIFICADOR3.length == 0 || /^\s+$/.test(CARGONOTIFICADOR3)) {
                                            document.form_reg_dato.CARGONOTIFICADOR3.focus();
                                            document.form_reg_dato.CARGONOTIFICADOR3.style.borderColor = "#FF0000";
                                            document.getElementById('val_cargo3').innerHTML = "NO A INGRESADO DATO";
                                            return false;
                                        }
                                        document.form_reg_dato.CARGONOTIFICADOR3.style.borderColor = "#4AF575";



                                        if (EMAILNOTIFICADOR3 == null || EMAILNOTIFICADOR3.length == 0 || /^\s+$/.test(EMAILNOTIFICADOR3)) {
                                            document.form_reg_dato.EMAILNOTIFICADOR3.focus();
                                            document.form_reg_dato.EMAILNOTIFICADOR3.style.borderColor = "#FF0000";
                                            document.getElementById('val_email3').innerHTML = "NO A INGRESADO DATO";
                                            return false;
                                        }
                                        document.form_reg_dato.EMAILNOTIFICADOR3.style.borderColor = "#4AF575";


                                        if (!(/^(([^<>()[\]\.,;:\s@\"]+(\.[^<>()[\]\.,;:\s@\"]+)*)|(\".+\"))@(([^<>()[\]\.,;:\s@\"]+\.)+[^<>()[\]\.,;:\s@\"]{2,})$/i
                                                .test(EMAILNOTIFICADOR3))) {
                                            document.form_reg_dato.EMAILNOTIFICADOR3.focus();
                                            document.form_reg_dato.EMAILNOTIFICADOR3.style.borderColor = "#ff0000";
                                            document.getElementById('val_email3').innerHTML = "FORMATO DE CORREO INCORRECTO";
                                            return false;
                                        }
                                        document.form_reg_dato.EMAILNOTIFICADOR3.style.borderColor = "#4AF575";
                    */



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
                    <form class="form" role="form" method="post" name="form_reg_dato">
                        <div class="box-body">
                            <h4 class="box-title text-info"><i class="ti-user mr-15"></i> Registro
                            </h4>
                            <hr class="my-15">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Nombre </label>
                                        <input type="hidden" class="form-control" placeholder="ID" id="ID" name="ID" value="<?php echo $IDOP; ?>" />
                                        <input type="hidden" class="form-control" placeholder="EMPRESA" id="EMPRESA" name="EMPRESA" value="<?php echo $EMPRESAS; ?>" />
                                        <input type="text" class="form-control" placeholder="Nombre Notificador" id="NOMBRENOTIFICADOR" name="NOMBRENOTIFICADOR" value="<?php echo $NOMBRENOTIFICADOR; ?>" <?php echo $DISABLED; ?> />
                                        <label id="val_nombre" class="validacion"> </label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>EORI </label>
                                        <input type="text" class="form-control" placeholder="EORI Notificador" id="EORINOTIFICADOR" name="EORINOTIFICADOR" value="<?php echo $EORINOTIFICADOR; ?>" <?php echo $DISABLED; ?> />
                                        <label id="val_eori" class="validacion"> </label>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Direccion </label>
                                        <input type="text" class="form-control" placeholder="Direccion Notificador" id="DIRECCIONNOTIFICADOR" name="DIRECCIONNOTIFICADOR" value="<?php echo $DIRECCIONNOTIFICADOR; ?>" <?php echo $DISABLED; ?> />
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
                                        <input type="text" class="form-control" placeholder="Nombre Contacto 1 Notificador" id="CONTACTONOTIFICADOR1" name="CONTACTONOTIFICADOR1" value="<?php echo $CONTACTONOTIFICADOR1; ?>" <?php echo $DISABLED; ?> />
                                        <label id="val_contacto1" class="validacion"> </label>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Cargo 1</label>
                                        <input type="text" class="form-control" placeholder="Cargo Contacto 1 Notificador" id="CARGONOTIFICADOR1" name="CARGONOTIFICADOR1" value="<?php echo $CARGONOTIFICADOR1; ?>" <?php echo $DISABLED; ?> />
                                        <label id="val_cargo1" class="validacion"> </label>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Email 1</label>
                                        <input type="text" class="form-control" placeholder="Email Contacto 1 Notificador" id="EMAILNOTIFICADOR1" name="EMAILNOTIFICADOR1" value="<?php echo $EMAILNOTIFICADOR1; ?>" <?php echo $DISABLED; ?> />
                                        <label id="val_email1" class="validacion"> </label>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Contacto 2</label>
                                        <input type="text" class="form-control" placeholder="Nombre Contacto 2 Notificador" id="CONTACTONOTIFICADOR2" name="CONTACTONOTIFICADOR2" value="<?php echo $CONTACTONOTIFICADOR2; ?>" <?php echo $DISABLED; ?> />
                                        <label id="val_contacto2" class="validacion"> </label>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Cargo 2</label>
                                        <input type="text" class="form-control" placeholder="Cargo Contacto 2 Notificador" id="CARGONOTIFICADOR2" name="CARGONOTIFICADOR2" value="<?php echo $CARGONOTIFICADOR2; ?>" <?php echo $DISABLED; ?> />
                                        <label id="val_cargo2" class="validacion"> </label>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Email 2</label>
                                        <input type="text" class="form-control" placeholder="Email Contacto 2 Notificador" id="EMAILNOTIFICADOR2" name="EMAILNOTIFICADOR2" value="<?php echo $EMAILNOTIFICADOR2; ?>" <?php echo $DISABLED; ?> />
                                        <label id="val_email2" class="validacion"> </label>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Contacto 3</label>
                                        <input type="text" class="form-control" placeholder="Nombre Contacto 3 Notificador" id="CONTACTONOTIFICADOR3" name="CONTACTONOTIFICADOR3" value="<?php echo $CONTACTONOTIFICADOR3; ?>" <?php echo $DISABLED; ?> />
                                        <label id="val_contacto3" class="validacion"> </label>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Cargo 3</label>
                                        <input type="text" class="form-control" placeholder="Cargo Contacto 3 Notificador" id="CARGONOTIFICADOR3" name="CARGONOTIFICADOR3" value="<?php echo $CARGONOTIFICADOR3; ?>" <?php echo $DISABLED; ?> />
                                        <label id="val_cargo3" class="validacion"> </label>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Email 3</label>
                                        <input type="text" class="form-control" placeholder="Email Contacto 3 Notificador" id="EMAILNOTIFICADOR3" name="EMAILNOTIFICADOR3" value="<?php echo $EMAILNOTIFICADOR3; ?>" <?php echo $DISABLED; ?> />
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
                            <button type="submit" class="btn btn-rounded btn-primary btn-outline" name="GUARDAR" value="GUARDAR" <?php echo $DISABLED; ?> onclick="return validacion()">
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