<?php

include_once "../config/validarUsuario.php";

//LLAMADA ARCHIVOS NECESARIOS PARA LAS OPERACIONES

include_once '../controlador/CIUDAD_ADO.php';

include_once '../controlador/INPECTOR_ADO.php';
include_once '../modelo/INPECTOR.php';

//INCIALIZAR LAS VARIBLES
//INICIALIZAR CONTROLADOR

$CIUDAD_ADO =  new CIUDAD_ADO();

$INPECTOR_ADO =  new INPECTOR_ADO();
//INIICIALIZAR MODELO
$INPECTOR =  new INPECTOR();



//INCIALIZAR VARIBALES A OCUPAR PARA LA FUNCIONALIDAD
$IDOP = "";
$OP = "";
$DISABLED = "";

$NOMBREINPECTOR = "";
$DIRECCIONINPECTOR = "";
$TELEFONOINPECTOR = "";
$EMAILINPECTOR = "";
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
$ARRAYINPECTOR = "";
$ARRAYINPECTORID = "";
$ARRAYCIUDAD = "";
$ARRAYTINPECTOR = "";
$ARRAYVERINPECTOR = "";


//DEFINIR ARREGLOS CON LOS DATOS OBTENIDOS DE LAS FUNCIONES DE LOS CONTROLADORES
$ARRAYCIUDAD = $CIUDAD_ADO->listarCiudadCBX();
$ARRAYINPECTOR = $INPECTOR_ADO->listarInpectorCBX();



//OPERACIONES
//OPERACION DE REGISTRO DE FILA

if (isset($_REQUEST['GUARDAR'])) {


    $ARRAYNUMERO = $INPECTOR_ADO->obtenerNumero($EMPRESAS);
    $NUMERO = $ARRAYNUMERO[0]['NUMERO'] + 1;


    //UTILIZACION METODOS SET DEL MODELO
    //SETEO DE ATRIBUTOS DE LA CLASE, OBTENIDO EN EL FORMULARIO   
    $INPECTOR->__SET('NUMERO_INPECTOR', $NUMERO);
    $INPECTOR->__SET('NOMBRE_INPECTOR', $_REQUEST['NOMBREINPECTOR']);
    $INPECTOR->__SET('DIRECCION_INPECTOR', $_REQUEST['DIRECCIONINPECTOR']);
    $INPECTOR->__SET('TELEFONO_INPECTOR', $_REQUEST['TELEFONOINPECTOR']);
    $INPECTOR->__SET('EMAIL_INPECTOR', $_REQUEST['EMAILINPECTOR']);
    $INPECTOR->__SET('ID_CIUDAD', $_REQUEST['CIUDAD']);
    $INPECTOR->__SET('ID_EMPRESA', $_REQUEST['EMPRESA']);
    $INPECTOR->__SET('ID_USUARIOI', $IDUSUARIOS);
    $INPECTOR->__SET('ID_USUARIOM', $IDUSUARIOS);
    //LLAMADA AL METODO DE REGISTRO DEL CONTROLADOR
    //LLAMADA AL METODO DE REGISTRO DEL CONTROLADOR
    $INPECTOR_ADO->agregarInpector($INPECTOR);
    //REDIRECCIONAR A PAGINA registroInpector.php
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
    <title>Registro Inpector</title>
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
                    NOMBREINPECTOR = document.getElementById("NOMBREINPECTOR").value;
                    DIRECCIONINPECTOR = document.getElementById("DIRECCIONINPECTOR").value;
                    TELEFONOINPECTOR = document.getElementById("TELEFONOINPECTOR").value;
                    EMAILINPECTOR = document.getElementById("EMAILINPECTOR").value;
                    CIUDAD = document.getElementById("CIUDAD").selectedIndex;




                    document.getElementById('val_nombre').innerHTML = "";
                    document.getElementById('val_direccion').innerHTML = "";
                    document.getElementById('val_telefono').innerHTML = "";
                    document.getElementById('val_email').innerHTML = "";
                    document.getElementById('val_ciudad').innerHTML = "";


                    if (NOMBREINPECTOR == null || NOMBREINPECTOR.length == 0 || /^\s+$/.test(NOMBREINPECTOR)) {
                        document.form_reg_dato.NOMBREINPECTOR.focus();
                        document.form_reg_dato.NOMBREINPECTOR.style.borderColor = "#FF0000";
                        document.getElementById('val_nombre').innerHTML = "NO A INGRESADO DATO";
                        return false;
                    }
                    document.form_reg_dato.NOMBREINPECTOR.style.borderColor = "#4AF575";

                    if (NOMBREINPECTOR.length > 82) {
                        document.form_reg_dato.NOMBREINPECTOR.focus();
                        document.form_reg_dato.NOMBREINPECTOR.style.borderColor = "#FF0000";
                        document.getElementById('val_nombre').innerHTML = "NO PUEDE SER MAYOR A 82 CARACTERES";
                        return false;
                    }
                    document.form_reg_dato.NOMBREINPECTOR.style.borderColor = "#4AF575";


                    if (DIRECCIONINPECTOR == null || DIRECCIONINPECTOR.length == 0 || /^\s+$/.test(DIRECCIONINPECTOR)) {
                        document.form_reg_dato.DIRECCIONINPECTOR.focus();
                        document.form_reg_dato.DIRECCIONINPECTOR.style.borderColor = "#FF0000";
                        document.getElementById('val_direccion').innerHTML = "NO A INGRESADO DATO";
                        return false;
                    }
                    document.form_reg_dato.DIRECCIONINPECTOR.style.borderColor = "#4AF575";
                    /*
                                          if (TELEFONOINPECTOR == null || TELEFONOINPECTOR == 0) {
                                              document.form_reg_dato.TELEFONOINPECTOR.focus();
                                              document.form_reg_dato.TELEFONOINPECTOR.style.borderColor = "#FF0000";
                                              document.getElementById('val_telefono').innerHTML = "NO A INGRESADO DATO";
                                              return false;
                                          }
                                          document.form_reg_dato.TELEFONOINPECTOR.style.borderColor = "#4AF575";


                                          if (EMAILINPECTOR == null || EMAILINPECTOR.length == 0 || /^\s+$/.test(EMAILINPECTOR)) {
                                              document.form_reg_dato.EMAILINPECTOR.focus();
                                              document.form_reg_dato.EMAILINPECTOR.style.borderColor = "#FF0000";
                                              document.getElementById('val_email').innerHTML = "NO A INGRESADO DATO";
                                              return false;
                                          }
                                          document.form_reg_dato.EMAILINPECTOR.style.borderColor = "#4AF575";




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
                                        <input type="text" class="form-control" placeholder="Nombre Inpector" id="NOMBREINPECTOR" name="NOMBREINPECTOR" value="<?php echo $NOMBREINPECTOR; ?>" <?php echo $DISABLED; ?> />
                                        <label id="val_nombre" class="validacion"> </label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Dirreccion </label>
                                        <input type="text" class="form-control" placeholder="Dirreccion Inpector" id="DIRECCIONINPECTOR" name="DIRECCIONINPECTOR" value="<?php echo $DIRECCIONINPECTOR; ?>" <?php echo $DISABLED; ?> />
                                        <label id="val_direccion" class="validacion"> </label>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Telefono </label>
                                        <input type="number" class="form-control" placeholder="Telefono Inpector" id="TELEFONOINPECTOR" name="TELEFONOINPECTOR" value="<?php echo $TELEFONOINPECTOR; ?>" <?php echo $DISABLED; ?> />
                                        <label id="val_telefono" class="validacion"> </label>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Email </label>
                                        <input type="text" class="form-control" placeholder="Email Inpector" id="EMAILINPECTOR" name="EMAILINPECTOR" value="<?php echo $EMAILINPECTOR; ?>" <?php echo $DISABLED; ?> />
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