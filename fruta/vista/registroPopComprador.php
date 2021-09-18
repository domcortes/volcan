<?php

include_once "../config/validarUsuario.php";

//LLAMADA ARCHIVOS NECESARIOS PARA LAS OPERACIONES

include_once '../controlador/CIUDAD_ADO.php';

include_once '../controlador/COMPRADOR_ADO.php';
include_once '../modelo/COMPRADOR.php';

//INCIALIZAR LAS VARIBLES
//INICIALIZAR CONTROLADOR

$CIUDAD_ADO =  new CIUDAD_ADO();

$COMPRADOR_ADO =  new COMPRADOR_ADO();
//INIICIALIZAR MODELO
$COMPRADOR =  new COMPRADOR();



//INCIALIZAR VARIBALES A OCUPAR PARA LA FUNCIONALIDAD
$IDOP = "";
$OP = "";
$DISABLED = "";

$RUTCOMPRADOR = "";
$DVCOMPRADOR = "";
$NOMBRECOMPRADOR = "";
$DIRECCIONCOMPRADOR = "";
$TELEFONOCOMPRADOR = "";
$EMAILCOMPRADOR = "";
$CIUDAD = "";


$FNOMBRE = "";

$SINO = "";

$NOMBRE = "";
$MENSAJE = "";
$FOCUS = "";
$MENSAJE2 = "";
$FOCUS2 = "";
$BORDER = "";
$BORDER2 = "";

//INICIALIZAR ARREGLOS
$ARRAYCOMPRADOR = "";
$ARRAYCOMPRADORID = "";
$ARRAYCIUDAD = "";





//DEFINIR ARREGLOS CON LOS DATOS OBTENIDOS DE LAS FUNCIONES DE LOS CONTROLADORES
$ARRAYCOMPRADOR = $COMPRADOR_ADO->listarCompradorCBX();
$ARRAYCIUDAD = $CIUDAD_ADO->listarCiudadCBX();



//OPERACIONES
//OPERACION DE REGISTRO DE FILA

if (isset($_REQUEST['GUARDAR'])) {

    //UTILIZACION METODOS SET DEL MODELO
    $ARRAYNUMERO = $COMPRADOR_ADO->obtenerNumero($EMPRESAS);
    $NUMERO = $ARRAYNUMERO[0]['NUMERO'] + 1;


    //UTILIZACION METODOS SET DEL MODELO
    //SETEO DE ATRIBUTOS DE LA CLASE, OBTENIDO EN EL FORMULARIO   
    $COMPRADOR->__SET('NUMERO_COMPRADOR', $NUMERO);
    $COMPRADOR->__SET('RUT_COMPRADOR', $_REQUEST['RUTCOMPRADOR']);
    $COMPRADOR->__SET('DV_COMPRADOR', $_REQUEST['DVCOMPRADOR']);
    $COMPRADOR->__SET('NOMBRE_COMPRADOR', $_REQUEST['NOMBRECOMPRADOR']);
    $COMPRADOR->__SET('DIRECCION_COMPRADOR', $_REQUEST['DIRECCIONCOMPRADOR']);
    $COMPRADOR->__SET('TELEFONO_COMPRADOR', $_REQUEST['TELEFONOCOMPRADOR']);
    $COMPRADOR->__SET('EMAIL_COMPRADOR', $_REQUEST['EMAILCOMPRADOR']);
    $COMPRADOR->__SET('ID_CIUDAD', $_REQUEST['CIUDAD']);
    $COMPRADOR->__SET('ID_EMPRESA', $_REQUEST['EMPRESA']);
    $COMPRADOR->__SET('ID_USUARIOI', $IDUSUARIOS);
    $COMPRADOR->__SET('ID_USUARIOM', $IDUSUARIOS);
    //LLAMADA AL METODO DE REGISTRO DEL CONTROLADOR
    $COMPRADOR_ADO->agregarComprador($COMPRADOR);
    //REDIRECCIONAR A PAGINA registroComprador.php
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
    <title>Registro Comprador</title>
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

                    RUTCOMPRADOR = document.getElementById("RUTCOMPRADOR").value;
                    DVCOMPRADOR = document.getElementById("DVCOMPRADOR").value;
                    NOMBRECOMPRADOR = document.getElementById("NOMBRECOMPRADOR").value;
                    DIRECCIONCOMPRADOR = document.getElementById("DIRECCIONCOMPRADOR").value;
                    TELEFONOCOMPRADOR = document.getElementById("TELEFONOCOMPRADOR").value;
                    EMAILCOMPRADOR = document.getElementById("EMAILCOMPRADOR").value;
                    CIUDAD = document.getElementById("CIUDAD").selectedIndex;




                    document.getElementById('val_nombre').innerHTML = "";
                    document.getElementById('val_dv').innerHTML = "";
                    document.getElementById('val_rut').innerHTML = "";
                    document.getElementById('val_direccion').innerHTML = "";
                    document.getElementById('val_telefono').innerHTML = "";
                    document.getElementById('val_email').innerHTML = "";
                    document.getElementById('val_ciudad').innerHTML = "";


                    if (RUTCOMPRADOR == null || RUTCOMPRADOR.length == 0 || /^\s+$/.test(RUTCOMPRADOR)) {
                        document.form_reg_dato.RUTCOMPRADOR.focus();
                        document.form_reg_dato.RUTCOMPRADOR.style.borderColor = "#FF0000";
                        document.getElementById('val_rut').innerHTML = "NO A INGRESADO DATO";
                        return false;
                    }
                    document.form_reg_dato.RUTCOMPRADOR.style.borderColor = "#4AF575";

                    if (DVCOMPRADOR == null || DVCOMPRADOR.length == 0 || /^\s+$/.test(DVCOMPRADOR)) {
                        document.form_reg_dato.DVCOMPRADOR.focus();
                        document.form_reg_dato.DVCOMPRADOR.style.borderColor = "#FF0000";
                        document.getElementById('val_dv').innerHTML = "NO A INGRESADO DATO";
                        return false;
                    }
                    document.form_reg_dato.DVCOMPRADOR.style.borderColor = "#4AF575";

                    if (NOMBRECOMPRADOR == null || NOMBRECOMPRADOR.length == 0 || /^\s+$/.test(NOMBRECOMPRADOR)) {
                        document.form_reg_dato.NOMBRECOMPRADOR.focus();
                        document.form_reg_dato.NOMBRECOMPRADOR.style.borderColor = "#FF0000";
                        document.getElementById('val_nombre').innerHTML = "NO A INGRESADO DATO";
                        return false;
                    }
                    document.form_reg_dato.NOMBRECOMPRADOR.style.borderColor = "#4AF575";

                    if (NOMBRECOMPRADOR.length > 82) {
                        document.form_reg_dato.NOMBRECOMPRADOR.focus();
                        document.form_reg_dato.NOMBRECOMPRADOR.style.borderColor = "#FF0000";
                        document.getElementById('val_nombre').innerHTML = "NO PUEDE SER MAYOR A 82 CARACTERES";
                        return false;
                    }
                    document.form_reg_dato.NOMBRECOMPRADOR.style.borderColor = "#4AF575";

                    /*
                                        if (EMAILCOMPRADOR == null || EMAILCOMPRADOR.length == 0 || /^\s+$/.test(EMAILCOMPRADOR)) {
                                            document.form_reg_dato.EMAILCOMPRADOR.focus();
                                            document.form_reg_dato.EMAILCOMPRADOR.style.borderColor = "#FF0000";
                                            document.getElementById('val_email').innerHTML = "NO A INGRESADO DATO";
                                            return false;
                                        }
                                        document.form_reg_dato.EMAILCOMPRADOR.style.borderColor = "#4AF575";

                                        if (!(/^(([^<>()[\]\.,;:\s@\"]+(\.[^<>()[\]\.,;:\s@\"]+)*)|(\".+\"))@(([^<>()[\]\.,;:\s@\"]+\.)+[^<>()[\]\.,;:\s@\"]{2,})$/i
                                                .test(EMAILCOMPRADOR))) {
                                            document.form_reg_dato.EMAILCOMPRADOR.focus();
                                            document.form_reg_dato.EMAILCOMPRADOR.style.borderColor = "#ff0000";
                                            document.getElementById('val_email').innerHTML = "FORMATO DE CORREO INCORRECTO";
                                            return false;
                                        }
                                        document.form_reg_dato.EMAILCOMPRADOR.style.borderColor = "#4AF575";

                                        if (TELEFONOCOMPRADOR == null || TELEFONOCOMPRADOR == 0) {
                                            document.form_reg_dato.TELEFONOCOMPRADOR.focus();
                                            document.form_reg_dato.TELEFONOCOMPRADOR.style.borderColor = "#FF0000";
                                            document.getElementById('val_telefono').innerHTML = "NO A INGRESADO DATO";
                                            return false;
                                        }
                                        document.form_reg_dato.TELEFONOCOMPRADOR.style.borderColor = "#4AF575";


                                        if (DIRECCIONCOMPRADOR == null || DIRECCIONCOMPRADOR.length == 0 || /^\s+$/.test(DIRECCIONCOMPRADOR)) {
                                            document.form_reg_dato.DIRECCIONCOMPRADOR.focus();
                                            document.form_reg_dato.DIRECCIONCOMPRADOR.style.borderColor = "#FF0000";
                                            document.getElementById('val_direccion').innerHTML = "NO A INGRESADO DATO";
                                            return false;
                                        }
                                        document.form_reg_dato.DIRECCIONCOMPRADOR.style.borderColor = "#4AF575";



                                        if (CIUDAD == null || CIUDAD == 0) {
                                            document.form_reg_dato.CIUDAD.focus();
                                            document.form_reg_dato.CIUDAD.style.borderColor = "#FF0000";
                                            document.getElementById('val_ciudad').innerHTML = "NO HA SELECCIONADO  NINGUNA ALTERNATIVA";
                                            return false;
                                        }
                                        document.form_reg_dato.CIUDAD.style.borderColor = "#4AF575";

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
                    <form class="form" role="form" method="post" name="form_reg_dato">
                        <div class="box-body">
                            <h4 class="box-title text-info"><i class="ti-user mr-15"></i> Registro
                            </h4>
                            <hr class="my-15">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Rut </label>
                                        <input type="hidden" class="form-control" placeholder="ID" id="ID" name="ID" value="<?php echo $IDOP; ?>" />
                                        <input type="hidden" class="form-control" placeholder="EMPRESA" id="EMPRESA" name="EMPRESA" value="<?php echo $EMPRESAS; ?>" />
                                        <input type="text" class="form-control" placeholder="Rut Comprador" id="RUTCOMPRADOR" name="RUTCOMPRADOR" value="<?php echo $RUTCOMPRADOR; ?>" <?php echo $FOCUS2; ?> <?php echo  $BORDER2; ?> <?php echo $DISABLED; ?> />
                                        <label id="val_rut" class="validacion"> <?php echo $MENSAJE; ?> </label>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label>DV </label>
                                        <input type="text" class="form-control" placeholder="DV Comprador" id="DVCOMPRADOR" name="DVCOMPRADOR" value="<?php echo $DVCOMPRADOR; ?>" <?php echo $FOCUS2; ?> <?php echo  $BORDER2; ?> <?php echo $DISABLED; ?> />
                                        <label id="val_dv" class="validacion"> <?php echo $MENSAJE; ?> </label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Nombre </label>
                                        <input type="text" class="form-control" placeholder="Nombre Comprador" id="NOMBRECOMPRADOR" name="NOMBRECOMPRADOR" value="<?php echo $NOMBRECOMPRADOR; ?>" <?php echo $DISABLED; ?> />
                                        <label id="val_nombre" class="validacion"> </label>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Email </label>
                                        <input type="text" class="form-control" placeholder="Telefono Comprador" id="EMAILCOMPRADOR" name="EMAILCOMPRADOR" value="<?php echo $EMAILCOMPRADOR; ?>" <?php echo $DISABLED; ?> />
                                        <label id="val_email" class="validacion"> </label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Telefono </label>
                                        <input type="text" class="form-control" placeholder="Telefono Comprador" id="TELEFONOCOMPRADOR" name="TELEFONOCOMPRADOR" value="<?php echo $TELEFONOCOMPRADOR; ?>" <?php echo $DISABLED; ?> />
                                        <label id="val_telefono" class="validacion"> </label>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Dirreccion </label>
                                        <input type="text" class="form-control" placeholder="Dirreccion Comprador" id="DIRECCIONCOMPRADOR" name="DIRECCIONCOMPRADOR" value="<?php echo $DIRECCIONCOMPRADOR; ?>" <?php echo $DISABLED; ?> />
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