<?php

include_once "../config/validarUsuario.php";


//LLAMADA ARCHIVOS NECESARIOS PARA LAS OPERACIONES

include_once '../controlador/TRANSPORTE_ADO.php';
include_once '../controlador/CIUDAD_ADO.php';
include_once '../modelo/TRANSPORTE.php';

//INCIALIZAR LAS VARIBLES
//INICIALIZAR CONTROLADOR


$TRANSPORTE_ADO =  new TRANSPORTE_ADO();
$CIUDAD_ADO =  new CIUDAD_ADO();
//INIICIALIZAR MODELO
$TRANSPORTE =  new TRANSPORTE();


//INCIALIZAR VARIBALES A OCUPAR PARA LA FUNCIONALIDAD
$IDOP = "";
$OP = "";
$DISABLED = "";

$RUTTRANSPORTE = "";
$DVTRANSPORTE = "";
$NOMBRETRANSPORTE = "";
$GIROTRANSPORTE = "";
$RAZONSOCIALTRANSPORTE = "";
$DIRRECIONTRANSPORTE = "";
$NOTATRANSPORTE = "";
$CONTACTOTRANSPORTE = "";
$TELEFONOTRANSPORTE = "";
$EMAILTRANSPORTE = "";
$CIUDAD = "";



//INICIALIZAR ARREGLOS
$ARRAYTRANSPORTE = "";
$ARRAYTRANSPORTEID = "";
$ARRAYCIUDAD = "";




//DEFINIR ARREGLOS CON LOS DATOS OBTENIDOS DE LAS FUNCIONES DE LOS CONTROLADORES
$ARRAYTRANSPORTE = $TRANSPORTE_ADO->listarTransportePorEmpresaCBX($EMPRESAS);
$ARRAYCIUDAD = $CIUDAD_ADO->listarCiudadCBX();

//OPERACIONES
//OPERACION DE REGISTRO DE FILA
if (isset($_REQUEST['GUARDAR'])) {

    //UTILIZACION METODOS SET DEL MODELO
    //SETEO DE ATRIBUTOS DE LA CLASE, OBTENIDO EN EL FORMULARIO   

    $ARRAYNUMERO = $TRANSPORTE_ADO->obtenerNumero($EMPRESAS);
    $NUMERO = $ARRAYNUMERO[0]['NUMERO'] + 1;
    //UTILIZACION METODOS SET DEL MODELO
    //SETEO DE ATRIBUTOS DE LA CLASE, OBTENIDO EN EL FORMULARIO   

    $TRANSPORTE->__SET('NUMERO_TRANSPORTE', $NUMERO);
    $TRANSPORTE->__SET('RUT_TRANSPORTE', $_REQUEST['RUTTRANSPORTE']);
    $TRANSPORTE->__SET('DV_TRANSPORTE', $_REQUEST['DVTRANSPORTE']);
    $TRANSPORTE->__SET('NOMBRE_TRANSPORTE', $_REQUEST['NOMBRETRANSPORTE']);
    $TRANSPORTE->__SET('GIRO_TRANSPORTE', $_REQUEST['GIROTRANSPORTE']);
    $TRANSPORTE->__SET('RAZON_SOCIAL_TRANSPORTE', $_REQUEST['RAZONSOCIALTRANSPORTE']);
    $TRANSPORTE->__SET('DIRECCION_TRANSPORTE', $_REQUEST['DIRRECIONTRANSPORTE']);
    $TRANSPORTE->__SET('CONTACTO_TRANSPORTE', $_REQUEST['CONTACTOTRANSPORTE']);
    $TRANSPORTE->__SET('TELEFONO_TRANSPORTE', $_REQUEST['TELEFONOTRANSPORTE']);
    $TRANSPORTE->__SET('EMAIL_TRANSPORTE', $_REQUEST['EMAILTRANSPORTE']);
    $TRANSPORTE->__SET('NOTA_TRANSPORTE', $_REQUEST['NOTATRANSPORTE']);
    $TRANSPORTE->__SET('ID_CIUDAD', $_REQUEST['CIUDAD']);
    $TRANSPORTE->__SET('ID_EMPRESA', $_REQUEST['EMPRESA']);
    $TRANSPORTE->__SET('ID_USUARIOI', $IDUSUARIOS);
    $TRANSPORTE->__SET('ID_USUARIOM', $IDUSUARIOS);
    //LLAMADA AL METODO DE REGISTRO DEL CONTROLADOR
    $TRANSPORTE_ADO->agregarTransporte($TRANSPORTE);
    //REDIRECCIONAR A PAGINA registroTransporte.php
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
    <title>Registro Transporte</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="description" content="">
    <meta name="author" content="">
    <!- LLAMADA DE LOS ARCHIVOS NECESARIOS PARA DISEÑO Y FUNCIONES BASE DE LA VISTA -!>
        <?php include_once "../config/urlHead.php"; ?>
        <!- FUNCIONES BASES -!>
            <script type="text/javascript">
                //VALIDACION DE FORMULARIO
                //VALIDACION DE FORMULARIO
                function validacion() {

                    RUTTRANSPORTE = document.getElementById("RUTTRANSPORTE").value;
                    DVTRANSPORTE = document.getElementById("DVTRANSPORTE").value;
                    NOMBRETRANSPORTE = document.getElementById("NOMBRETRANSPORTE").value;
                    GIROTRANSPORTE = document.getElementById("GIROTRANSPORTE").value;
                    RAZONSOCIALTRANSPORTE = document.getElementById("RAZONSOCIALTRANSPORTE").value;
                    DIRRECIONTRANSPORTE = document.getElementById("DIRRECIONTRANSPORTE").value;
                    CIUDAD = document.getElementById("CIUDAD").selectedIndex;
                    CONTACTOTRANSPORTE = document.getElementById("CONTACTOTRANSPORTE").value;
                    TELEFONOTRANSPORTE = document.getElementById("TELEFONOTRANSPORTE").value;
                    EMAILTRANSPORTE = document.getElementById("EMAILTRANSPORTE").value;

                    document.getElementById('val_rut').innerHTML = "";
                    document.getElementById('val_dv').innerHTML = "";
                    document.getElementById('val_nombre').innerHTML = "";
                    document.getElementById('val_giro').innerHTML = "";
                    document.getElementById('val_rsocial').innerHTML = "";
                    document.getElementById('val_dirrecion').innerHTML = "";
                    document.getElementById('val_ciudad').innerHTML = "";
                    document.getElementById('val_contacto').innerHTML = "";
                    document.getElementById('val_telefono').innerHTML = "";
                    document.getElementById('val_email').innerHTML = "";

                    if (RUTTRANSPORTE == null || RUTTRANSPORTE.length == 0 || /^\s+$/.test(RUTTRANSPORTE)) {
                        document.form_reg_dato.RUTTRANSPORTE.focus();
                        document.form_reg_dato.RUTTRANSPORTE.style.borderColor = "#FF0000";
                        document.getElementById('val_rut').innerHTML = "NO A INGRESADO DATO";
                        return false;
                    }
                    document.form_reg_dato.RUTTRANSPORTE.style.borderColor = "#4AF575";

                    if (DVTRANSPORTE == null || DVTRANSPORTE.length == 0 || /^\s+$/.test(DVTRANSPORTE)) {
                        document.form_reg_dato.DVTRANSPORTE.focus();
                        document.form_reg_dato.DVTRANSPORTE.style.borderColor = "#FF0000";
                        document.getElementById('val_dv').innerHTML = "NO A INGRESADO DATO";
                        return false;
                    }
                    document.form_reg_dato.DVTRANSPORTE.style.borderColor = "#4AF575";


                    if (NOMBRETRANSPORTE == null || NOMBRETRANSPORTE.length == 0 || /^\s+$/.test(NOMBRETRANSPORTE)) {
                        document.form_reg_dato.NOMBRETRANSPORTE.focus();
                        document.form_reg_dato.NOMBRETRANSPORTE.style.borderColor = "#FF0000";
                        document.getElementById('val_nombre').innerHTML = "NO A INGRESADO DATO";
                        return false;
                    }
                    document.form_reg_dato.NOMBRETRANSPORTE.style.borderColor = "#4AF575";

                    if (GIROTRANSPORTE == null || GIROTRANSPORTE.length == 0 || /^\s+$/.test(GIROTRANSPORTE)) {
                        document.form_reg_dato.GIROTRANSPORTE.focus();
                        document.form_reg_dato.GIROTRANSPORTE.style.borderColor = "#FF0000";
                        document.getElementById('val_giro').innerHTML = "NO A INGRESADO DATO";
                        return false;
                    }
                    document.form_reg_dato.GIROTRANSPORTE.style.borderColor = "#4AF575";

                    if (RAZONSOCIALTRANSPORTE == null || RAZONSOCIALTRANSPORTE.length == 0 || /^\s+$/.test(RAZONSOCIALTRANSPORTE)) {
                        document.form_reg_dato.RAZONSOCIALTRANSPORTE.focus();
                        document.form_reg_dato.RAZONSOCIALTRANSPORTE.style.borderColor = "#FF0000";
                        document.getElementById('val_rsocial').innerHTML = "NO A INGRESADO DATO";
                        return false;
                    }
                    document.form_reg_dato.RAZONSOCIALTRANSPORTE.style.borderColor = "#4AF575";


                    if (DIRRECIONTRANSPORTE == null || DIRRECIONTRANSPORTE.length == 0 || /^\s+$/.test(DIRRECIONTRANSPORTE)) {
                        document.form_reg_dato.DIRRECIONTRANSPORTE.focus();
                        document.form_reg_dato.DIRRECIONTRANSPORTE.style.borderColor = "#FF0000";
                        document.getElementById('val_dirrecion').innerHTML = "NO A INGRESADO DATO";
                        return false;
                    }
                    document.form_reg_dato.DIRRECIONTRANSPORTE.style.borderColor = "#4AF575";

                    if (CIUDAD == null || CIUDAD == 0) {
                        document.form_reg_dato.CIUDAD.focus();
                        document.form_reg_dato.CIUDAD.style.borderColor = "#FF0000";
                        document.getElementById('val_ciudad').innerHTML = "NO HA SELECCIONADO  NINGUNA ALTERNATIVA";
                        return false;
                    }
                    document.form_reg_dato.CIUDAD.style.borderColor = "#4AF575";
                    /*
                    if (CONTACTOTRANSPORTE == null || CONTACTOTRANSPORTE.length == 0 || /^\s+$/.test(CONTACTOTRANSPORTE)) {
                        document.form_reg_dato.CONTACTOTRANSPORTE.focus();
                        document.form_reg_dato.CONTACTOTRANSPORTE.style.borderColor = "#FF0000";
                        document.getElementById('val_contacto').innerHTML = "NO A INGRESADO DATO";
                        return false;
                    }
                    document.form_reg_dato.CONTACTOTRANSPORTE.style.borderColor = "#4AF575";


                    if (TELEFONOTRANSPORTE == null || TELEFONOTRANSPORTE == 0) {
                        document.form_reg_dato.TELEFONOTRANSPORTE.focus();
                        document.form_reg_dato.TELEFONOTRANSPORTE.style.borderColor = "#FF0000";
                        document.getElementById('val_telefono').innerHTML = "NO A INGRESADO DATO";
                        return false;
                    }
                    document.form_reg_dato.TELEFONOTRANSPORTE.style.borderColor = "#4AF575";

                    if (EMAILTRANSPORTE == null || EMAILTRANSPORTE.length == 0 || /^\s+$/.test(EMAILTRANSPORTE)) {
                        document.form_reg_dato.EMAILTRANSPORTE.focus();
                        document.form_reg_dato.EMAILTRANSPORTE.style.borderColor = "#FF0000";
                        document.getElementById('val_email').innerHTML = "NO A INGRESADO DATO";
                        return false;
                    }
                    document.form_reg_dato.EMAILTRANSPORTE.style.borderColor = "#4AF575";

                    if (!(/^(([^<>()[\]\.,;:\s@\"]+(\.[^<>()[\]\.,;:\s@\"]+)*)|(\".+\"))@(([^<>()[\]\.,;:\s@\"]+\.)+[^<>()[\]\.,;:\s@\"]{2,})$/i.test(EMAILTRANSPORTE))) {
                        document.form_reg_dato.EMAILTRANSPORTE.focus();
                        document.form_reg_dato.EMAILTRANSPORTE.style.borderColor = "#ff0000";
                        document.getElementById('val_email').innerHTML = "FORMATO DE CORREO INCORRECTO";
                        return false;
                    }
                    document.form_reg_dato.EMAILTRANSPORTE.style.borderColor = "#4AF575";
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
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Rut </label>
                                        <input type="hidden" class="form-control" placeholder="ID" id="ID" name="ID" value="<?php echo $IDOP; ?>" />
                                        <input type="hidden" class="form-control" placeholder="EMPRESA" id="EMPRESA" name="EMPRESA" value="<?php echo $EMPRESAS; ?>" />
                                        <input type="text" class="form-control" placeholder="Rut Transporte" id="RUTTRANSPORTE" name="RUTTRANSPORTE" value="<?php echo $RUTTRANSPORTE; ?>" <?php echo $DISABLED; ?> />
                                        <label id="val_rut" class="validacion"> </label>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label>DV </label>
                                        <input type="text" class="form-control" placeholder="DV Transporte" id="DVTRANSPORTE" name="DVTRANSPORTE" value="<?php echo $DVTRANSPORTE; ?>" <?php echo $DISABLED; ?> />
                                        <label id="val_dv" class="validacion"> </label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Nombre </label>
                                        <input type="text" class="form-control" placeholder="Nombre Transporte" id="NOMBRETRANSPORTE" name="NOMBRETRANSPORTE" value="<?php echo $NOMBRETRANSPORTE; ?>" <?php echo $DISABLED; ?> />
                                        <label id="val_nombre" class="validacion"> </label>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Giro </label>
                                        <input type="text" class="form-control" placeholder="Giro Transporte" id="GIROTRANSPORTE" name="GIROTRANSPORTE" value="<?php echo $GIROTRANSPORTE; ?>" <?php echo $DISABLED; ?> />
                                        <label id="val_giro" class="validacion"> </label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Razon Social </label>
                                        <input type="text" class="form-control" placeholder="Razon Social Transporte" id="RAZONSOCIALTRANSPORTE" name="RAZONSOCIALTRANSPORTE" value="<?php echo $RAZONSOCIALTRANSPORTE; ?>" <?php echo $DISABLED; ?> />
                                        <label id="val_rsocial" class="validacion"> </label>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Dirrecion </label>
                                        <input type="text" class="form-control" placeholder="Dirrecion Transporte" id="DIRRECIONTRANSPORTE" name="DIRRECIONTRANSPORTE" value="<?php echo $DIRRECIONTRANSPORTE; ?>" <?php echo $DISABLED; ?> />
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
                                        <textarea class="form-control" rows="1" placeholder="Nota Transporte " id="NOTATRANSPORTE" name="NOTATRANSPORTE" <?php echo $DISABLED; ?>><?php echo $NOTATRANSPORTE; ?></textarea>
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
                                        <input type="text" class="form-control" placeholder="Nombre Contacto Transporte" id="CONTACTOTRANSPORTE" name="CONTACTOTRANSPORTE" value="<?php echo $CONTACTOTRANSPORTE; ?>" <?php echo $DISABLED; ?> />
                                        <label id="val_contacto" class="validacion"> </label>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Telefono </label>
                                        <input type="number" class="form-control" placeholder="Telefono Contacto Transporte" id="TELEFONOTRANSPORTE" name="TELEFONOTRANSPORTE" value="<?php echo $TELEFONOTRANSPORTE; ?>" <?php echo $DISABLED; ?> />
                                        <label id="val_telefono" class="validacion"> </label>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Email </label>
                                        <input type="text" class="form-control" placeholder="Email Contacto Transporte" id="EMAILTRANSPORTE" name="EMAILTRANSPORTE" value="<?php echo $EMAILTRANSPORTE; ?>" <?php echo $DISABLED; ?> />
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