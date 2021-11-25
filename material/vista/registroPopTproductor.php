<?php

include_once "../config/validarUsuario.php";

//LLAMADA ARCHIVOS NECESARIOS PARA LAS OPERACIONES


include_once '../controlador/TPRODUCTOR_ADO.php';
include_once '../modelo/TPRODUCTOR.php';

//INCIALIZAR LAS VARIBLES

//INICIALIZAR CONTROLADOR

$TPRODUCTOR_ADO =  new TPRODUCTOR_ADO();
//INIICIALIZAR MODELO
$TPRODUCTOR =  new TPRODUCTOR();


//INCIALIZAR VARIBALES A OCUPAR PARA LA FUNCIONALIDAD
$IDOP = "";
$OP = "";
$DISABLED = "";


$NOMBRETPRODUCTOR = "";
$NUMERO="";



$NOMBRE = "";
$MENSAJE = "";
$FOCUS = "";
$MENSAJE2 = "";
$FOCUS2 = "";
$BORDER = "";

//INICIALIZAR ARREGLOS
$ARRAYTPRODUCTOR = "";
$ARRAYTPRODUCTORID = "";
$ARRAYNUMERO = "";




//DEFINIR ARREGLOS CON LOS DATOS OBTENIDOS DE LAS FUNCIONES DE LOS CONTROLADORES
$ARRAYTPRODUCTOR = $TPRODUCTOR_ADO->listarTproductorPorEmpresaCBX($EMPRESAS);
$ARRAYEMPRESA = $EMPRESA_ADO->listarEmpresaCBX();
include_once "../config/validarDatosUrl.php";
include_once "../config/datosUrl.php";


//OPERACIONES
//OPERACION DE REGISTRO DE FILA
if (isset($_REQUEST['GUARDAR'])) {

    $ARRAYNUMERO = $TPRODUCTOR_ADO->obtenerNumero($_REQUEST['EMPRESA']);
    $NUMERO = $ARRAYNUMERO[0]['NUMERO'] + 1;

    //UTILIZACION METODOS SET DEL MODELO
    //SETEO DE ATRIBUTOS DE LA CLASE, OBTENIDO EN EL FORMULARIO 
    $TPRODUCTOR->__SET('NUMERO_TPRODUCTOR', $NUMERO);
    $TPRODUCTOR->__SET('NOMBRE_TPRODUCTOR', $_REQUEST['NOMBRETPRODUCTOR']);
    $TPRODUCTOR->__SET('ID_USUARIOI', $IDUSUARIOS);
    $TPRODUCTOR->__SET('ID_USUARIOM', $IDUSUARIOS);
    $TPRODUCTOR->__SET('ID_EMPRESA', $_REQUEST['EMPRESA']);
    //LLAMADA AL METODO DE REGISTRO DEL CONTROLADOR
    $TPRODUCTOR_ADO->agregarTproductor($TPRODUCTOR);
    //REDIRECCIONAR A PAGINA registroTproductor.php
    echo "
    <script type='text/javascript'>
        window.opener.refrescar()
        window.close();
        </script> 
    ";
}


//OBTENCION DE DATOS ENVIADOR A LA URL
//PARA OPERACIONES DE EDICION Y VISUALIZACION
if (isset($_SESSION['parametro']) && isset($_SESSION['parametro1'])) {
    //ALMACENAR DATOS DE VARIABLES DE LA URL
    $IDOP = $_SESSION['parametro'];
    $OP = $_SESSION['parametro1'];


    //IDENTIFICACIONES DE OPERACIONES
    //OPERACION DE CAMBIO DE ESTADO
    //0 = DESACTIVAR
    if ($OP == "0") {

        $TPRODUCTOR->__SET('ID_TPRODUCTOR', $IDOP);
        $TPRODUCTOR_ADO->deshabilitar($TPRODUCTOR);

        echo "<script type='text/javascript'> location.href ='registroTproductor.php';</script>";
    }
    //1 = ACTIVAR
    if ($OP == "1") {

        $TPRODUCTOR->__SET('ID_TPRODUCTOR', $IDOP);
        $TPRODUCTOR_ADO->habilitar($TPRODUCTOR);
        echo "<script type='text/javascript'> location.href ='registroTproductor.php';</script>";
    }

    //IDENTIFICACIONES DE OPERACIONES
    //editar =  OBTENCION DE DATOS PARA LA EDICION DE REGISTRO
    if ($OP == "editar") {

        //OBTENCION DE INFORMACIOND DE LA FILA DEL REGISTRO
        //ALMACENAR INFORMACION EN ARREGLO
        //LLAMADA A LA FUNCION DE CONTROLADOR verPlanta(ID), 
        //SE LE PASE UNO DE LOS DATOS OBTENIDO PREVIAMENTE A TRAVEZ DE LA URL
        $ARRAYTPRODUCTORID = $TPRODUCTOR_ADO->verTproductor($IDOP);

        //OBTENCIONS DE LOS DATODS DE LA COLUMNAS DE LA FILA OBTENIDA
        //PASAR DATOS OBTENIDOS A VARIABLES QUE SE VISUALIZAR EN EL FORMULARIO DE LA VISTA
        foreach ($ARRAYTPRODUCTORID as $r) :
            $NOMBRETPRODUCTOR = "" . $r['NOMBRE_TPRODUCTOR'];
            $EMPRESA = "" . $r['ID_EMPRESA'];
        endforeach;
    }

    //ver =  OBTENCION DE DATOS PARA LA VISUALIZAAR INFORMAICON DE REGISTRO
    if ($OP == "ver") {
        //DESABILITAR INPUT DEL FORMULARIO
        //PARA QUE NO MODIFIQUE NIGUNA INFORMACION, OBJETIVO ES VISUALIZAR INFORMACION
        $DISABLED = "disabled";
        //OBTENCION DE INFORMACIOND DE LA FILA DEL REGISTRO
        //ALMACENAR INFORMACION EN ARREGLO
        //LLAMADA A LA FUNCION DE CONTROLADOR verPlanta(ID), 
        //SE LE PASE UNO DE LOS DATOS OBTENIDO PREVIAMENTE A TRAVEZ DE LA URL
        $ARRAYTPRODUCTORID = $TPRODUCTOR_ADO->verTproductor($IDOP);
        //OBTENCIONS DE LOS DATODS DE LA COLUMNAS DE LA FILA OBTENIDA
        //PASAR DATOS OBTENIDOS A VARIABLES QUE SE VISUALIZAR EN EL FORMULARIO DE LA VISTA

        foreach ($ARRAYTPRODUCTORID as $r) :
            $NOMBRETPRODUCTOR = "" . $r['NOMBRE_TPRODUCTOR'];
            $EMPRESA = "" . $r['ID_EMPRESA'];
        endforeach;
    }
}



?>


<!DOCTYPE html>
<html lang="es">

<head>
    <title>Registro Tipo Productor</title>
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

                    NOMBRETPRODUCTOR = document.getElementById("NOMBRETPRODUCTOR").value;
                    document.getElementById('val_nombre').innerHTML = "";

                    if (NOMBRETPRODUCTOR == null || NOMBRETPRODUCTOR.length == 0 || /^\s+$/.test(NOMBRETPRODUCTOR)) {
                        document.form_reg_dato.NOMBRETPRODUCTOR.focus();
                        document.form_reg_dato.NOMBRETPRODUCTOR.style.borderColor = "#FF0000";
                        document.getElementById('val_nombre').innerHTML = "NO A INGRESADO DATO";
                        return false;
                    }
                    document.form_reg_dato.NOMBRETPRODUCTOR.style.borderColor = "#4AF575";

                }




                //REDIRECCIONAR A LA PAGINA SELECIONADA
                function irPagina(url) {
                    location.href = "" + url;
                }
               
                //FUNCION PARA CERRAR VENTANA Y ACTUALIZAR PRINCIPAL
                function cerrar() {
                    window.opener.refrescar()
                    window.close();
                }
            </script>

</head>

<body class="hold-transition light-skin fixed sidebar-mini theme-primary" >
    <div class="wrapper">
        <!- LLAMADA AL MENU PRINCIPAL DE LA PAGINA-!>
            <?php //include_once "../config/menu.php"; ?>

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
                                            <h4 class="box-title text-info"><i class="ti-user mr-15"></i> Registro
                                            </h4>
                                            <hr class="my-15">
                                            <div class="form-group">
                                                <label>Nombre </label>
                                                <input type="hidden" class="form-control" placeholder="ID" id="ID" name="ID" value="<?php echo $IDOP; ?>" />
                                                <input type="hidden" class="form-control" placeholder="EMPRESA" id="EMPRESA" name="EMPRESA" value="<?php echo $EMPRESAS; ?>" />
                                                <input type="text" class="form-control" placeholder="Nombre Tipo Productor" id="NOMBRETPRODUCTOR" name="NOMBRETPRODUCTOR" value="<?php echo $NOMBRETPRODUCTOR; ?>" <?php echo $DISABLED; ?> />
                                                <label id="val_nombre" class="validacion"> </label>
                                            </div>
                                        </div>
                                        <!-- /.box-body -->
                                        <div class="box-footer">
                                            <?php if ($OP != "editar") { ?>
                                                <button type="submit" class="btn btn-rounded btn-primary btn-outline" name="GUARDAR" value="GUARDAR" <?php echo $DISABLED; ?>>
                                                    <i class="ti-save-alt"></i> Crear
                                                </button>
                                            <?php } else { ?>
                                                <button type="submit" class="btn btn-rounded btn-primary btn-outline" name="EDITAR" value="EDITAR">
                                                    <i class="ti-save-alt"></i> Guardar
                                                </button>
                                            <?php } ?>
                                        </div>
                                    </form>
                                </div>
                                <!-- /.box -->
                        </div>
                        <!--.row -->
                    </section>
                    <!-- /.content -->

            <!- LLAMADA ARCHIVO DEL DISEÑO DEL FOOTER Y MENU USUARIO -!>
                <?php //include_once "../config/footer.php"; ?>
                <?php include_once "../config/menuExtra.php"; ?>
    </div>
    <!- LLAMADA URL DE ARCHIVOS DE DISEÑO Y JQUERY E OTROS -!>
        <?php include_once "../config/urlBase.php"; ?>
</body>

</html>