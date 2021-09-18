<?php

include_once "../config/validarUsuario.php";

//LLAMADA ARCHIVOS NECESARIOS PARA LAS OPERACIONES
include_once '../controlador/TUSUARIO_ADO.php';
include_once '../controlador/EMPRESA_ADO.php';
include_once '../controlador/PLANTA_ADO.php';
include_once '../controlador/TEMPORADA_ADO.php';

include_once '../controlador/FPAGO_ADO.php';
include_once '../modelo/FPAGO.php';

//INCIALIZAR LAS VARIBLES

//INICIALIZAR CONTROLADOR
$TUSUARIO_ADO = new TUSUARIO_ADO();
$EMPRESA_ADO =  new EMPRESA_ADO();
$PLANTA_ADO =  new PLANTA_ADO();
$TEMPORADA_ADO =  new TEMPORADA_ADO();

$FPAGO_ADO =  new FPAGO_ADO();
//INIICIALIZAR MODELO
$FPAGO =  new FPAGO();


//INCIALIZAR VARIBALES A OCUPAR PARA LA FUNCIONALIDAD

$NOMBREFPAGO = "";
$FECHAPAGO = "";

$IDOP = "";
$OP = "";
$DISABLED = "";


//INICIALIZAR ARREGLOS
$ARRAYFPAGO = "";
$ARRAYFPAGOID = "";
$ARRAYFECHA = "";



//DEFINIR ARREGLOS CON LOS DATOS OBTENIDOS DE LAS FUNCIONES DE LOS CONTROLADORES
$ARRAYFPAGO = $FPAGO_ADO->listarFpagoCBX();
$ARRAYFECHA = $FPAGO_ADO->obtenerFecha();
$FECHAPAGO = $ARRAYFECHA[0]['FECHA'];


//OPERACIONES
//OPERACION DE REGISTRO DE FILA
if (isset($_REQUEST['GUARDAR'])) {

    //UTILIZACION METODOS SET DEL MODELO
    //SETEO DE ATRIBUTOS DE LA CLASE, OBTENIDO EN EL FORMULARIO   
    $FPAGO->__SET('NOMBRE_FPAGO', $_REQUEST['NOMBREFPAGO']);
    $FPAGO->__SET('FECHA_PAGO_FPAGO', $_REQUEST['FECHAPAGO']);
    //LLAMADA AL METODO DE EDICION DEL CONTROLADOR
    $FPAGO_ADO->agregarFpago($FPAGO);
    //REDIRECCIONAR A PAGINA registroTfruta.php
    //REDIRECCIONAR A PAGINA registroTfruta.php
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
    <title>Registro Formato Pago</title>
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



                    NOMBREFPAGO = document.getElementById("NOMBREFPAGO").value;
                    FECHAPAGO = document.getElementById("FECHAPAGO").value;
                    document.getElementById('val_nombre').innerHTML = "";
                    document.getElementById('val_fecha').innerHTML = "";

                    if (NOMBREFPAGO == null || NOMBREFPAGO.length == 0 || /^\s+$/.test(NOMBREFPAGO)) {
                        document.form_reg_dato.NOMBREFPAGO.focus();
                        document.form_reg_dato.NOMBREFPAGO.style.borderColor = "#FF0000";
                        document.getElementById('val_nombre').innerHTML = "NO A INGRESADO DATO";
                        return false;
                    }
                    document.form_reg_dato.NOMBREFPAGO.style.borderColor = "#4AF575";


                    if (FECHAPAGO == null || FECHAPAGO.length == 0 || /^\s+$/.test(FECHAPAGO)) {
                        document.form_reg_dato.FECHAPAGO.focus();
                        document.form_reg_dato.FECHAPAGO.style.borderColor = "#FF0000";
                        document.getElementById('val_fecha').innerHTML = "NO A INGRESADO DATO";
                        return false;
                    }
                    document.form_reg_dato.FECHAPAGO.style.borderColor = "#4AF575";




                }




                //FUNCION PARA CERRAR VENTANA Y ACTUALIZAR PRINCIPAL
                function cerrar() {
                    window.opener.refrescar()
                    window.close();
                }
            </script>

</head>

<body class="hold-transition light-skin fixed sidebar-mini theme-primary" onload="mueveReloj()">
    <div class="wrapper">
        <!- LLAMADA AL MENU PRINCIPAL DE LA PAGINA-!>
            <!-- Main content -->
            <section class="content">
                <div class="row">
                    <div class="box">
                        <div class="box-header with-border">
                            <!--  
                                            <h4 class="box-title">Sample form 1</h4>
                                        -->
                        </div>
                        <!-- /.box-header -->
                        <form class="form" role="form" method="post" name="form_reg_dato" onsubmit="return validacion()">
                            <div class="box-body">

                                <div class="form-group">
                                    <label>Nombre </label>
                                    <input type="text" class="form-control" placeholder="Nombre Formato  Pago" id="NOMBREFPAGO" name="NOMBREFPAGO" value="<?php echo $NOMBREFPAGO; ?>" <?php echo $DISABLED; ?> />
                                    <label id="val_nombre" class="validacion"> </label>
                                </div>

                                <div class="form-group">
                                    <label>Fecha </label>
                                    <input type="date" class="form-control" placeholder="Fecha Formato  Pago" id="FECHAPAGO" name="FECHAPAGO" value="<?php echo $FECHAPAGO; ?>" <?php echo $DISABLED; ?> />
                                    <label id="val_fecha" class="validacion"> </label>
                                </div>
                            </div>
                            <!-- /.box-body -->
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
                </div>
                <!--.row -->
            </section>
            <!-- /.content -->

            <!- LLAMADA ARCHIVO DEL DISEÑO DEL FOOTER Y MENU USUARIO -!>
                <?php include_once "../config/menuExtra.php"; ?>
    </div>
    <!- LLAMADA URL DE ARCHIVOS DE DISEÑO Y JQUERY E OTROS -!>
        <?php include_once "../config/urlBase.php"; ?>
</body>

</html>