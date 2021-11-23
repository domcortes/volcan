<?php

include_once "../config/validarUsuario.php";


//LLAMADA ARCHIVOS NECESARIOS PARA LAS OPERACIONES

include_once '../controlador/PROVINCIA_ADO.php';
include_once '../controlador/REGION_ADO.php';
include_once '../modelo/PROVINCIA.php';

//INCIALIZAR LAS VARIBLES
//INICIALIZAR CONTROLADOR

$PROVINCIA_ADO =  new PROVINCIA_ADO();
$REGION_ADO =  new REGION_ADO();
//INIICIALIZAR MODELO
$PROVINCIA =  new PROVINCIA();


//INCIALIZAR VARIBALES A OCUPAR PARA LA FUNCIONALIDAD

$IDOP = "";
$OP = "";
$DISABLED = "";


$NOMBREPROVINCIA = "";
$REGION = "";
$FNOMBRE = "";



$NOMBRE = "";
$MENSAJE = "";
$FOCUS = "";
$MENSAJE2 = "";
$FOCUS2 = "";
$BORDER = "";

//INICIALIZAR ARREGLOS
$ARRAYPROVINCIA = "";
$ARRAYPROVINCIAID = "";
$ARRAYREGION = "";



//DEFINIR ARREGLOS CON LOS DATOS OBTENIDOS DE LAS FUNCIONES DE LOS CONTROLADORES
$ARRAYPROVINCIA = $PROVINCIA_ADO->listarProvinciaCBX();
$ARRAYREGION = $REGION_ADO->listarRegionCBX();
include_once "../config/validarDatosUrl.php";
include_once "../config/datosUrl.php";


//OPERACIONES
//OPERACION DE REGISTRO DE FILA


if (isset($_REQUEST['GUARDAR'])) {

    //UTILIZACION METODOS SET DEL MODELO
    //SETEO DE ATRIBUTOS DE LA CLASE, OBTENIDO EN EL FORMULARIO   
    $PROVINCIA->__SET('NOMBRE_PROVINCIA', $_REQUEST['NOMBREPROVINCIA']);
    $PROVINCIA->__SET('ID_REGION', $_REQUEST['REGION']);
    //LLAMADA AL METODO DE REGISTRO DEL CONTROLADOR
    $PROVINCIA_ADO->agregarProvincia($PROVINCIA);
    //REDIRECCIONAR A PAGINA registroProvincia.php 
    echo "<script type='text/javascript'> location.href ='registroPopComuna.php';</script>";
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

        $PROVINCIA->__SET('ID_PROVINCIA', $IDOP);
        $PROVINCIA_ADO->deshabilitar($PROVINCIA);

        echo "<script type='text/javascript'> location.href ='registroProvincia.php';</script>";
    }
    //1 = ACTIVAR
    if ($OP == "1") {

        $BODEGA->__SET('ID_PROVINCIA', $IDOP);
        $PROVINCIA_ADO->habilitar($PROVINCIA);
        echo "<script type='text/javascript'> location.href ='registroProvincia.php';</script>";
    }
    //editar =  OBTENCION DE DATOS PARA LA EDICION DE REGISTRO
    if ($OP == "editar") {
        //OBTENCION DE INFORMACIOND DE LA FILA DEL REGISTRO
        //ALMACENAR INFORMACION EN ARREGLO
        //LLAMADA A LA FUNCION DE CONTROLADOR verPlanta(ID), 
        //SE LE PASE UNO DE LOS DATOS OBTENIDO PREVIAMENTE A TRAVEZ DE LA URL
        $ARRAYPROVINCIAID = $PROVINCIA_ADO->verProvincia($IDOP);
        //OBTENCIONS DE LOS DATODS DE LA COLUMNAS DE LA FILA OBTENIDA
        //PASAR DATOS OBTENIDOS A VARIABLES QUE SE VISUALIZAR EN EL FORMULARIO DE LA VISTA
        foreach ($ARRAYPROVINCIAID as $r) :
            $NOMBREPROVINCIA = "" . $r['NOMBRE_PROVINCIA'];
            $REGION = "" . $r['ID_REGION'];
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
        $ARRAYPROVINCIAID = $PROVINCIA_ADO->verProvincia($IDOP);
        //OBTENCIONS DE LOS DATODS DE LA COLUMNAS DE LA FILA OBTENIDA
        //PASAR DATOS OBTENIDOS A VARIABLES QUE SE VISUALIZAR EN EL FORMULARIO DE LA VISTA

        foreach ($ARRAYPROVINCIAID as $r) :
            $NOMBREPROVINCIA = "" . $r['NOMBRE_PROVINCIA'];
            $REGION = "" . $r['ID_REGION'];
        endforeach;
    }
}




?>


<!DOCTYPE html>
<html lang="es">

<head>
    <title>Registro Provincia</title>
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

                    NOMBREPROVINCIA = document.getElementById("NOMBREPROVINCIA").value;
                    REGION = document.getElementById("REGION").selectedIndex;

                    document.getElementById('val_nombre').innerHTML = "";
                    document.getElementById('val_region').innerHTML = "";


                    if (NOMBREPROVINCIA == null || NOMBREPROVINCIA.length == 0 || /^\s+$/.test(NOMBREPROVINCIA)) {
                        document.form_reg_dato.NOMBREPROVINCIA.focus();
                        document.form_reg_dato.NOMBREPROVINCIA.style.borderColor = "#FF0000";
                        document.getElementById('val_nombre').innerHTML = "NO A INGRESADO DATO";
                        return false;
                    }
                    document.form_reg_dato.NOMBREPROVINCIA.style.borderColor = "#4AF575";




                    if (REGION == null || REGION == 0) {
                        document.form_reg_dato.REGION.focus();
                        document.form_reg_dato.REGION.style.borderColor = "#FF0000";
                        document.getElementById('val_region').innerHTML = "NO HA SELECCIONADO  NINGUNA ALTERNATIVA";
                        return false;
                    }
                    document.form_reg_dato.REGION.style.borderColor = "#4AF575";


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
                                                <input type="text" class="form-control" placeholder="Nombre Provincia" id="NOMBREPROVINCIA" name="NOMBREPROVINCIA" value="<?php echo $NOMBREPROVINCIA; ?>" <?php echo $DISABLED; ?> />
                                                <label id="val_nombre" class="validacion"> </label>
                                            </div>
                                            
                                            <div class="row">
                                                <div class="col-xxl-10 col-xl-10 col-lg-10 col-md-10 col-sm-9 col-9 col-xs-9">
                                                    <div class="form-group">
                                                        <label> Region</label>
                                                        <select class="form-control select2" id="REGION" name="REGION" style="width: 100%;" value="<?php echo $REGION; ?>" <?php echo $DISABLED; ?>>

                                                            <option></option>
                                                            <?php foreach ($ARRAYREGION as $r) : ?>
                                                                <?php if ($ARRAYREGION) {    ?>
                                                                    <option value="<?php echo $r['ID_REGION']; ?>" <?php if ($REGION == $r['ID_REGION']) {
                                                                                                                        echo "selected";
                                                                                                                    } ?>>
                                                                        <?php echo $r['NOMBRE_REGION'] ?>
                                                                    </option>
                                                                <?php } else { ?>
                                                                    <option>No Hay Datos Registrados </option>
                                                                <?php } ?>

                                                            <?php endforeach; ?>

                                                        </select>
                                                        <label id="val_region" class="validacion"> </label>
                                                    </div>
                                                </div>                     
                                                <div class="col-xxl-2 col-xl-2 col-lg-2 col-md-2 col-sm-3 col-3 col-xs-3">
                                                        <div class="form-group">  
                                                        <label>Agregar</label>                  
                                                            <button type="button" class="btn btn-success btn-block" data-toggle="tooltip" <?php echo $DISABLED; ?>  title="Agregar Ciudad" id="defecto" name="pop" 
                                                            Onclick="irPagina('registroPopRegion.php' ); ">
                                                            <i class="icon-copy fa fa-plus" aria-hidden="true"></i>
                                                            </button>
                                                        </div>
                                                </div>
                                            </div> 

                                        </div>
                                        <!-- /.box-body -->
                                        <div class="box-footer">
                                            <button type="button" class="btn btn-rounded btn-success btn-outline" name="CANCELAR" value="CANCELAR" Onclick="irPagina('registroPopComuna.php'); ">
                                                <i class="ti-back-left "></i> Volver
                                            </button>
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