<?php

include_once "../config/validarUsuario.php";


//LLAMADA ARCHIVOS NECESARIOS PARA LAS OPERACIONES

include_once '../controlador/LDESTINO_ADO.php';
include_once '../modelo/LDESTINO.php';

//INCIALIZAR LAS VARIBLES

//INICIALIZAR CONTROLADOR

$LDESTINO_ADO =  new LDESTINO_ADO();
//INIICIALIZAR MODELO
$LDESTINO =  new LDESTINO();


//INCIALIZAR VARIBALES A OCUPAR PARA LA FUNCIONALIDAD

$NOMBRELDESTINO = "";
$NOTALDESTINO = "";

$IDOP = "";
$OP = "";
$DISABLED = "";


//INICIALIZAR ARREGLOS
$ARRAYLDESTINO = "";
$ARRAYLDESTINOID = "";



//DEFINIR ARREGLOS CON LOS DATOS OBTENIDOS DE LAS FUNCIONES DE LOS CONTROLADORES
$ARRAYLDESTINO = $LDESTINO_ADO->listarLdestinoCBX();



//OPERACIONES
//OPERACION DE REGISTRO DE FILA
if (isset($_REQUEST['GUARDAR'])) {


    $ARRAYNUMERO = $LDESTINO_ADO->obtenerNumero($_REQUEST['EMPRESA']);
    $NUMERO = $ARRAYNUMERO[0]['NUMERO'] + 1;



    //UTILIZACION METODOS SET DEL MODELO
    //SETEO DE ATRIBUTOS DE LA CLASE, OBTENIDO EN EL FORMULARIO   
    $LDESTINO->__SET('NUMERO_LDESTINO', $NUMERO);
    $LDESTINO->__SET('NOMBRE_LDESTINO', $_REQUEST['NOMBRELDESTINO']);
    $LDESTINO->__SET('ID_EMPRESA', $_REQUEST['EMPRESA']);
    $LDESTINO->__SET('ID_USUARIOI', $IDUSUARIOS);
    $LDESTINO->__SET('ID_USUARIOM', $IDUSUARIOS);
    //LLAMADA AL METODO DE EDICION DEL CONTROLADOR
    $LDESTINO_ADO->agregarLdestino($LDESTINO);
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
    <title>Registro Lugar Destino</title>
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



                    NOMBRELDESTINO = document.getElementById("NOMBRELDESTINO").value;
                    document.getElementById('val_nombre').innerHTML = "";
                    document.getElementById('val_notatf').innerHTML = "";

                    if (NOMBRELDESTINO == null || NOMBRELDESTINO.length == 0 || /^\s+$/.test(NOMBRELDESTINO)) {
                        document.form_reg_dato.NOMBRELDESTINO.focus();
                        document.form_reg_dato.NOMBRELDESTINO.style.borderColor = "#FF0000";
                        document.getElementById('val_nombre').innerHTML = "NO A INGRESADO DATO";
                        return false;
                    }
                    document.form_reg_dato.NOMBRELDESTINO.style.borderColor = "#4AF575";



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
                                <input type="text" class="form-control" placeholder="Nombre Lugar Destino" id="NOMBRELDESTINO" name="NOMBRELDESTINO" value="<?php echo $NOMBRELDESTINO; ?>" <?php echo $DISABLED; ?> />
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

            <!- LLAMADA ARCHIVO DEL DISEÑO DEL FOOTER Y MENU USUARIO -!>
                <?php include_once "../config/menuExtra.php"; ?>
    </div>
    <!- LLAMADA URL DE ARCHIVOS DE DISEÑO Y JQUERY E OTROS -!>
        <?php include_once "../config/urlBase.php"; ?>
</body>

</html>