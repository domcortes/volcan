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
    $TRANSPORTE->__SET('NOMBRE_TRANSPORTE', $_REQUEST['NOMBRETRANSPORTE']);
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
                    NOMBRETRANSPORTE = document.getElementById("NOMBRETRANSPORTE").value;
                    document.getElementById('val_nombre').innerHTML = "";


                    if (NOMBRETRANSPORTE == null || NOMBRETRANSPORTE.length == 0 || /^\s+$/.test(NOMBRETRANSPORTE)) {
                        document.form_reg_dato.NOMBRETRANSPORTE.focus();
                        document.form_reg_dato.NOMBRETRANSPORTE.style.borderColor = "#FF0000";
                        document.getElementById('val_nombre').innerHTML = "NO A INGRESADO DATO";
                        return false;
                    }
                    document.form_reg_dato.NOMBRETRANSPORTE.style.borderColor = "#4AF575";

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
                     
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Nombre </label>
                                        <input type="hidden" class="form-control" placeholder="EMPRESA" id="EMPRESA" name="EMPRESA" value="<?php echo $EMPRESAS; ?>" />
                                        <input type="text" class="form-control" placeholder="Nombre Transporte" id="NOMBRETRANSPORTE" name="NOMBRETRANSPORTE" value="<?php echo $NOMBRETRANSPORTE; ?>" <?php echo $DISABLED; ?> />
                                        <label id="val_nombre" class="validacion"> </label>
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