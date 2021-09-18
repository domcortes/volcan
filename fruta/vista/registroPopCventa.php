<?php

include_once "../config/validarUsuario.php";

//LLAMADA ARCHIVOS NECESARIOS PARA LAS OPERACIONES
include_once '../controlador/TUSUARIO_ADO.php';
include_once '../controlador/EMPRESA_ADO.php';
include_once '../controlador/PLANTA_ADO.php';
include_once '../controlador/TEMPORADA_ADO.php';

include_once '../controlador/CVENTA_ADO.php';
include_once '../modelo/CVENTA.php';

//INCIALIZAR LAS VARIBLES

//INICIALIZAR CONTROLADOR
$TUSUARIO_ADO = new TUSUARIO_ADO();
$EMPRESA_ADO =  new EMPRESA_ADO();
$PLANTA_ADO =  new PLANTA_ADO();
$TEMPORADA_ADO =  new TEMPORADA_ADO();

$CVENTA_ADO =  new CVENTA_ADO();
//INIICIALIZAR MODELO
$CVENTA =  new CVENTA();


//INCIALIZAR VARIBALES A OCUPAR PARA LA FUNCIONALIDAD

$NOMBRECVENTA = "";
$NOTACVENTA = "";

$IDOP = "";
$OP = "";
$DISABLED = "";


//INICIALIZAR ARREGLOS
$ARRAYCVENTA = "";
$ARRAYCVENTAID = "";



//DEFINIR ARREGLOS CON LOS DATOS OBTENIDOS DE LAS FUNCIONES DE LOS CONTROLADORES
$ARRAYCVENTA = $CVENTA_ADO->listarCventaCBX();



//OPERACIONES
//OPERACION DE REGISTRO DE FILA
if (isset($_REQUEST['GUARDAR'])) {

    //UTILIZACION METODOS SET DEL MODELO
    //SETEO DE ATRIBUTOS DE LA CLASE, OBTENIDO EN EL FORMULARIO   
    $CVENTA->__SET('NOMBRE_CVENTA', $_REQUEST['NOMBRECVENTA']);
    $CVENTA->__SET('NOTA_CVENTA', $_REQUEST['NOTACVENTA']);
    //LLAMADA AL METODO DE EDICION DEL CONTROLADOR
    $CVENTA_ADO->agregarCventa($CVENTA);
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
    <title>Registro Clausula Venta</title>
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



                    NOMBRECVENTA = document.getElementById("NOMBRECVENTA").value;
                    document.getElementById('val_nombre').innerHTML = "";

                    if (NOMBRECVENTA == null || NOMBRECVENTA.length == 0 || /^\s+$/.test(NOMBRECVENTA)) {
                        document.form_reg_dato.NOMBRECVENTA.focus();
                        document.form_reg_dato.NOMBRECVENTA.style.borderColor = "#FF0000";
                        document.getElementById('val_nombre').innerHTML = "NO A INGRESADO DATO";
                        return false;
                    }
                    document.form_reg_dato.NOMBRECVENTA.style.borderColor = "#4AF575";




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
                                    <input type="text" class="form-control" placeholder="Nombre Clausula  Venta" id="NOMBRECVENTA" name="NOMBRECVENTA" value="<?php echo $NOMBRECVENTA; ?>" <?php echo $DISABLED; ?> />
                                    <label id="val_nombre" class="validacion"> </label>
                                </div>
                                <div class="form-group">
                                    <label>Nota </label>
                                    <textarea class="form-control" rows="1" placeholder="Nota Clausula  Venta" id="NOTACVENTA" name="NOTACVENTA" <?php echo $DISABLED; ?>><?php echo $NOTACVENTA; ?></textarea>
                                    <label id="val_notat" class="validacion"> </label>
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