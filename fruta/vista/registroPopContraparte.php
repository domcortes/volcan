<?php

include_once "../config/validarUsuario.php";

//LLAMADA ARCHIVOS NECESARIOS PARA LAS OPERACIONES

include_once '../controlador/CIUDAD_ADO.php';

include_once '../controlador/CONTRAPARTE_ADO.php';
include_once '../modelo/CONTRAPARTE.php';

//INCIALIZAR LAS VARIBLES
//INICIALIZAR CONTROLADOR
$CIUDAD_ADO =  new CIUDAD_ADO();

$CONTRAPARTE_ADO =  new CONTRAPARTE_ADO();
//INIICIALIZAR MODELO
$CONTRAPARTE =  new CONTRAPARTE();


//INCIALIZAR VARIBALES A OCUPAR PARA LA FUNCIONALIDAD
$IDOP = "";
$OP = "";
$DISABLED = "";

$NOMBRECONTRAPARTE = "";
$DIRECCIONCONTRAPARTE = "";
$TELEFONOCONTRAPARTE = "";
$EMAILCONTRAPARTE = "";
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
$ARRAYCONTRAPARTE = "";
$ARRAYCONTRAPARTEID = "";
$ARRAYCIUDAD = "";
$ARRAYTCONTRAPARTE = "";
$ARRAYVERCONTRAPARTE = "";


//DEFINIR ARREGLOS CON LOS DATOS OBTENIDOS DE LAS FUNCIONES DE LOS CONTROLADORES
$ARRAYCIUDAD = $CIUDAD_ADO->listarCiudadCBX();
$ARRAYCONTRAPARTE = $CONTRAPARTE_ADO->listarContraparteCBX();



//OPERACIONES
//OPERACION DE REGISTRO DE FILA

if (isset($_REQUEST['GUARDAR'])) {


    $ARRAYNUMERO = $CONTRAPARTE_ADO->obtenerNumero($EMPRESAS);
    $NUMERO = $ARRAYNUMERO[0]['NUMERO'] + 1;

    //UTILIZACION METODOS SET DEL MODELO
    //SETEO DE ATRIBUTOS DE LA CLASE, OBTENIDO EN EL FORMULARIO   
    $CONTRAPARTE->__SET('NUMERO_CONTRAPARTE', $NUMERO);
    $CONTRAPARTE->__SET('NOMBRE_CONTRAPARTE', $_REQUEST['NOMBRECONTRAPARTE']);
    $CONTRAPARTE->__SET('DIRECCION_CONTRAPARTE', $_REQUEST['DIRECCIONCONTRAPARTE']);
    $CONTRAPARTE->__SET('TELEFONO_CONTRAPARTE', $_REQUEST['TELEFONOCONTRAPARTE']);
    $CONTRAPARTE->__SET('EMAIL_CONTRAPARTE', $_REQUEST['EMAILCONTRAPARTE']);
    $CONTRAPARTE->__SET('ID_CIUDAD', $_REQUEST['CIUDAD']);
    $CONTRAPARTE->__SET('ID_EMPRESA', $_REQUEST['EMPRESA']);
    $CONTRAPARTE->__SET('ID_USUARIOI', $IDUSUARIOS);
    $CONTRAPARTE->__SET('ID_USUARIOM', $IDUSUARIOS);
    //LLAMADA AL METODO DE REGISTRO DEL CONTROLADOR
    $CONTRAPARTE_ADO->agregarContraparte($CONTRAPARTE);
    //REDIRECCIONAR A PAGINA registroContraparte.php
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
    <title>Registro Contraparte</title>
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
                    NOMBRECONTRAPARTE = document.getElementById("NOMBRECONTRAPARTE").value;
                    DIRECCIONCONTRAPARTE = document.getElementById("DIRECCIONCONTRAPARTE").value;
                    TELEFONOCONTRAPARTE = document.getElementById("TELEFONOCONTRAPARTE").value;
                    EMAILCONTRAPARTE = document.getElementById("EMAILCONTRAPARTE").value;
                    CIUDAD = document.getElementById("CIUDAD").selectedIndex;




                    document.getElementById('val_nombre').innerHTML = "";
                    document.getElementById('val_direccion').innerHTML = "";
                    document.getElementById('val_telefono').innerHTML = "";
                    document.getElementById('val_email').innerHTML = "";
                    document.getElementById('val_ciudad').innerHTML = "";


                    if (NOMBRECONTRAPARTE == null || NOMBRECONTRAPARTE.length == 0 || /^\s+$/.test(NOMBRECONTRAPARTE)) {
                        document.form_reg_dato.NOMBRECONTRAPARTE.focus();
                        document.form_reg_dato.NOMBRECONTRAPARTE.style.borderColor = "#FF0000";
                        document.getElementById('val_nombre').innerHTML = "NO A INGRESADO DATO";
                        return false;
                    }
                    document.form_reg_dato.NOMBRECONTRAPARTE.style.borderColor = "#4AF575";

                    if (NOMBRECONTRAPARTE.length > 82) {
                        document.form_reg_dato.NOMBRECONTRAPARTE.focus();
                        document.form_reg_dato.NOMBRECONTRAPARTE.style.borderColor = "#FF0000";
                        document.getElementById('val_nombre').innerHTML = "NO PUEDE SER MAYOR A 82 CARACTERES";
                        return false;
                    }
                    document.form_reg_dato.NOMBRECONTRAPARTE.style.borderColor = "#4AF575";


                    if (DIRECCIONCONTRAPARTE == null || DIRECCIONCONTRAPARTE.length == 0 || /^\s+$/.test(DIRECCIONCONTRAPARTE)) {
                        document.form_reg_dato.DIRECCIONCONTRAPARTE.focus();
                        document.form_reg_dato.DIRECCIONCONTRAPARTE.style.borderColor = "#FF0000";
                        document.getElementById('val_direccion').innerHTML = "NO A INGRESADO DATO";
                        return false;
                    }
                    document.form_reg_dato.DIRECCIONCONTRAPARTE.style.borderColor = "#4AF575";

                    /*
                        if (TELEFONOCONTRAPARTE == null || TELEFONOCONTRAPARTE == 0) {
                            document.form_reg_dato.TELEFONOCONTRAPARTE.focus();
                            document.form_reg_dato.TELEFONOCONTRAPARTE.style.borderColor = "#FF0000";
                            document.getElementById('val_telefono').innerHTML = "NO A INGRESADO DATO";
                            return false;
                        }
                        document.form_reg_dato.TELEFONOCONTRAPARTE.style.borderColor = "#4AF575";


                        if (EMAILCONTRAPARTE == null || EMAILCONTRAPARTE.length == 0 || /^\s+$/.test(EMAILCONTRAPARTE)) {
                            document.form_reg_dato.EMAILCONTRAPARTE.focus();
                            document.form_reg_dato.EMAILCONTRAPARTE.style.borderColor = "#FF0000";
                            document.getElementById('val_email').innerHTML = "NO A INGRESADO DATO";
                            return false;
                        }
                        document.form_reg_dato.EMAILCONTRAPARTE.style.borderColor = "#4AF575";




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
                            <h4 class="box-title text-info"><i class="ti-user mr-15"></i> Registro
                            </h4>
                            <hr class="my-15">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Nombre </label>
                                        <input type="hidden" class="form-control" placeholder="ID" id="ID" name="ID" value="<?php echo $IDOP; ?>" />
                                        <input type="hidden" class="form-control" placeholder="EMPRESA" id="EMPRESA" name="EMPRESA" value="<?php echo $EMPRESAS; ?>" />
                                        <input type="text" class="form-control" placeholder="Nombre Contraparte" id="NOMBRECONTRAPARTE" name="NOMBRECONTRAPARTE" value="<?php echo $NOMBRECONTRAPARTE; ?>" <?php echo $DISABLED; ?> />
                                        <label id="val_nombre" class="validacion"> </label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Dirreccion </label>
                                        <input type="text" class="form-control" placeholder="Dirreccion Contraparte" id="DIRECCIONCONTRAPARTE" name="DIRECCIONCONTRAPARTE" value="<?php echo $DIRECCIONCONTRAPARTE; ?>" <?php echo $DISABLED; ?> />
                                        <label id="val_direccion" class="validacion"> </label>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Telefono </label>
                                        <input type="number" class="form-control" placeholder="Telefono Contraparte" id="TELEFONOCONTRAPARTE" name="TELEFONOCONTRAPARTE" value="<?php echo $TELEFONOCONTRAPARTE; ?>" <?php echo $DISABLED; ?> />
                                        <label id="val_telefono" class="validacion"> </label>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Email </label>
                                        <input type="text" class="form-control" placeholder="Email Contraparte" id="EMAILCONTRAPARTE" name="EMAILCONTRAPARTE" value="<?php echo $EMAILCONTRAPARTE; ?>" <?php echo $DISABLED; ?> />
                                        <label id="val_email" class="validacion"> </label>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12 col-12">
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
                            <div class="row">
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