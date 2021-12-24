<?php

include_once "../config/validarUsuario.php";

//LLAMADA ARCHIVOS NECESARIOS PARA LAS OPERACIONES

//LLAMADA ARCHIVOS NECESARIOS PARA LAS OPERACIONES

include_once '../controlador/MERCADO_ADO.php';
include_once '../modelo/MERCADO.php';

//INCIALIZAR LAS VARIBLES

//INICIALIZAR CONTROLADOR

$MERCADO_ADO =  new MERCADO_ADO();
//INIICIALIZAR MODELO
$MERCADO =  new MERCADO();


//INCIALIZAR VARIBALES A OCUPAR PARA LA FUNCIONALIDAD
$IDOP = "";
$OP = "";
$DISABLED = "";


$NOMBREMERCADO = "";



$NOMBRE = "";
$MENSAJE = "";
$FOCUS = "";
$MENSAJE2 = "";
$FOCUS2 = "";
$BORDER = "";

//INICIALIZAR ARREGLOS
$ARRAYMERCADO = "";
$ARRAYMERCADOID = "";



//DEFINIR ARREGLOS CON LOS DATOS OBTENIDOS DE LAS FUNCIONES DE LOS CONTROLADORES
$ARRAYMERCADO = $MERCADO_ADO->listarMercadoCBX();



//OPERACIONES
//OPERACION DE REGISTRO DE FILA
if (isset($_REQUEST['GUARDAR'])) {

    $ARRAYNUMERO = $MERCADO_ADO->obtenerNumero($EMPRESAS);
    $NUMERO = $ARRAYNUMERO[0]['NUMERO'] + 1;

    //UTILIZACION METODOS SET DEL MODELO
    //SETEO DE ATRIBUTOS DE LA CLASE, OBTENIDO EN EL FORMULARIO   
    $MERCADO->__SET('NUMERO_MERCADO', $NUMERO);
    $MERCADO->__SET('NOMBRE_MERCADO', $_REQUEST['NOMBREMERCADO']);
    $MERCADO->__SET('ID_EMPRESA', $_REQUEST['EMPRESA']);
    $MERCADO->__SET('ID_USUARIOI', $IDUSUARIOS);
    $MERCADO->__SET('ID_USUARIOM', $IDUSUARIOS);
    //LLAMADA AL METODO DE REGISTRO DEL CONTROLADOR
    $MERCADO_ADO->agregarMercado($MERCADO);
    //REDIRECCIONAR A PAGINA registroRmercado.php
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
    <title> Registro Mercado</title>
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

                    NOMBREMERCADO = document.getElementById("NOMBREMERCADO").value;

                    document.getElementById('val_nombre').innerHTML = "";


                    if (NOMBREMERCADO == null || NOMBREMERCADO == 0 || /^\s+$/.test(NOMBREMERCADO)) {
                        document.form_reg_dato.NOMBREMERCADO.focus();
                        document.form_reg_dato.NOMBREMERCADO.style.borderColor = "#FF0000";
                        document.getElementById('val_nombre').innerHTML = "NO HA SELECCIONADO  NINGUNA ALTERNATIVA";
                        return false;
                    }
                    document.form_reg_dato.NOMBREMERCADO.style.borderColor = "#4AF575";




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
                    <form class="form" role="form" method="post" name="form_reg_dato" >
                        <div class="box-body">
                            <h4 class="box-title text-info"><i class="ti-user mr-15"></i> Registro
                            </h4>
                            <hr class="my-15">
                            <div class="form-group">
                                <label>Nombre </label>
                                <input type="hidden" class="form-control" placeholder="ID" id="ID" name="ID" value="<?php echo $IDOP; ?>" />
                                <input type="hidden" class="form-control" placeholder="EMPRESA" id="EMPRESA" name="EMPRESA" value="<?php echo $EMPRESAS; ?>" />
                                <input type="text" class="form-control" placeholder="Nombre Mercado" id="NOMBREMERCADO" name="NOMBREMERCADO" value="<?php echo $NOMBREMERCADO; ?>" <?php echo $DISABLED; ?> />
                                <label id="val_nombre" class="validacion"> </label>
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
    </div>
    </div>
    <!-- /.content-wrapper -->

    <!- LLAMADA ARCHIVO DEL DISEÑO DEL FOOTER Y MENU USUARIO -!>
        <?php include_once "../config/menuExtra.php"; ?>
        </div>
        <!- LLAMADA URL DE ARCHIVOS DE DISEÑO Y JQUERY E OTROS -!>
            <?php include_once "../config/urlBase.php"; ?>
</body>

</html>