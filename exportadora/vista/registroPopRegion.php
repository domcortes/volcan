<?php

include_once "../config/validarUsuario.php";


//LLAMADA ARCHIVOS NECESARIOS PARA LAS OPERACIONES

include_once '../controlador/PAIS_ADO.php';
include_once '../controlador/REGION_ADO.php';
include_once '../modelo/REGION.php';

//INCIALIZAR LAS VARIBLES
//INICIALIZAR CONTROLADOR

$REGION_ADO =  new REGION_ADO();
$PAIS_ADO =  new PAIS_ADO();
//INIICIALIZAR MODELO
$REGION =  new REGION();


//INCIALIZAR VARIBALES A OCUPAR PARA LA FUNCIONALIDAD
$IDOP = "";
$OP = "";
$DISABLED = "";


$NOMBREREGION = "";
$PAIS = "";
$FNOMBRE = "";

$NOMBRE = "";
$MENSAJE = "";
$FOCUS = "";
$MENSAJE2 = "";
$FOCUS2 = "";
$BORDER = "";

//INICIALIZAR ARREGLOS
$ARRAYREGION = "";
$ARRAYREGIONID = "";
$ARRAYPAIS = "";



//DEFINIR ARREGLOS CON LOS DATOS OBTENIDOS DE LAS FUNCIONES DE LOS CONTROLADORES
$ARRAYREGION = $REGION_ADO->listarRegionCBX();
$ARRAYPAIS = $PAIS_ADO->listarPaisCBX();
include_once "../config/validarDatosUrl.php";
include_once "../config/datosUrl.php";



//OPERACIONES
//OPERACION DE REGISTRO DE FILA


if (isset($_REQUEST['GUARDAR'])) {

    //UTILIZACION METODOS SET DEL MODELO
    //SETEO DE ATRIBUTOS DE LA CLASE, OBTENIDO EN EL FORMULARIO   
    $REGION->__SET('NOMBRE_REGION', $_REQUEST['NOMBREREGION']);
    $REGION->__SET('ID_PAIS', $_REQUEST['PAIS']);
    //LLAMADA AL METODO DE REGISTRO DEL CONTROLADOR
    $REGION_ADO->agregarRegion($REGION);
    echo "<script type='text/javascript'> location.href ='registroPopProvincia.php';</script>";
    //REDIRECCIONAR A PAGINA registroRegion.php
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

        $REGION->__SET('ID_REGION', $IDOP);
        $REGION_ADO->deshabilitar($REGION);

        echo "<script type='text/javascript'> location.href ='registroRegion.php';</script>";
    }
    //1 = ACTIVAR
    if ($OP == "1") {

        $REGION->__SET('ID_REGION', $IDOP);
        $REGION_ADO->habilitar($REGION);
        echo "<script type='text/javascript'> location.href ='registroRegion.php';</script>";
    }
    //editar =  OBTENCION DE DATOS PARA LA EDICION DE REGISTRO

    if ($OP == "editar") {
        //OBTENCION DE INFORMACIOND DE LA FILA DEL REGISTRO
        //ALMACENAR INFORMACION EN ARREGLO
        //LLAMADA A LA FUNCION DE CONTROLADOR verPlanta(ID), 
        //SE LE PASE UNO DE LOS DATOS OBTENIDO PREVIAMENTE A TRAVEZ DE LA URL
        $ARRAYREGIONID = $REGION_ADO->verRegion($IDOP);
        //OBTENCIONS DE LOS DATODS DE LA COLUMNAS DE LA FILA OBTENIDA
        //PASAR DATOS OBTENIDOS A VARIABLES QUE SE VISUALIZAR EN EL FORMULARIO DE LA VISTA

        foreach ($ARRAYREGIONID as $r) :
            $NOMBREREGION = "" . $r['NOMBRE_REGION'];
            $PAIS = "" . $r['ID_PAIS'];
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
        $ARRAYREGIONID = $REGION_ADO->verRegion($IDOP);
        //OBTENCIONS DE LOS DATODS DE LA COLUMNAS DE LA FILA OBTENIDA
        //PASAR DATOS OBTENIDOS A VARIABLES QUE SE VISUALIZAR EN EL FORMULARIO DE LA VISTA

        foreach ($ARRAYREGIONID as $r) :
            $NOMBREREGION = "" . $r['NOMBRE_REGION'];
            $PAIS = "" . $r['ID_PAIS'];
        endforeach;
    }
}


?>


<!DOCTYPE html>
<html lang="es">

<head>
    <title>Registro Region</title>
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

                    NOMBREREGION = document.getElementById("NOMBREREGION").value;
                    PAIS = document.getElementById("PAIS").selectedIndex;

                    document.getElementById('val_nombre').innerHTML = "";
                    document.getElementById('val_pais').innerHTML = "";


                    if (NOMBREREGION == null || NOMBREREGION.length == 0 || /^\s+$/.test(NOMBREREGION)) {
                        document.form_reg_dato.NOMBREREGION.focus();
                        document.form_reg_dato.NOMBREREGION.style.borderColor = "#FF0000";
                        document.getElementById('val_nombre').innerHTML = "NO A INGRESADO DATO";
                        return false;
                    }
                    document.form_reg_dato.NOMBREREGION.style.borderColor = "#4AF575";




                    if (PAIS == null || PAIS == 0) {
                        document.form_reg_dato.PAIS.focus();
                        document.form_reg_dato.PAIS.style.borderColor = "#FF0000";
                        document.getElementById('val_pais').innerHTML = "NO HA SELECCIONADO  NINGUNA ALTERNATIVA";
                        return false;
                    }
                    document.form_reg_dato.PAIS.style.borderColor = "#4AF575";

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

<body class="hold-transition light-skin fixed sidebar-mini theme-primary">
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
                                                <input type="text" class="form-control" placeholder="Nombre Region" id="NOMBREREGION" name="NOMBREREGION" value="<?php echo $NOMBREREGION; ?>" <?php echo $DISABLED; ?> />
                                                <label id="val_nombre" class="validacion"> </label>
                                            </div>
                                            <div class="form-group">
                                                <label> Pais</label>
                                                <select class="form-control select2" id="PAIS" name="PAIS" style="width: 100%;" value="<?php echo $PAIS; ?>" <?php echo $DISABLED; ?>>

                                                    <option></option>
                                                    <?php foreach ($ARRAYPAIS as $r) : ?>
                                                        <?php if ($ARRAYPAIS) {    ?>
                                                            <option value="<?php echo $r['ID_PAIS']; ?>" <?php if ($PAIS == $r['ID_PAIS']) {
                                                                                                                echo "selected";
                                                                                                            } ?>>
                                                                <?php echo $r['NOMBRE_PAIS'] ?>
                                                            </option>
                                                        <?php } else { ?>
                                                            <option>No Hay Datos Registrados </option>
                                                        <?php } ?>

                                                    <?php endforeach; ?>

                                                </select>
                                                <label id="val_pais" class="validacion"> </label>
                                            </div>

                                        </div>
                                        <!-- /.box-body -->
                                        <div class="box-footer">
                                            <button type="button" class="btn btn-rounded btn-success btn-outline" name="CANCELAR" value="CANCELAR" Onclick="irPagina('registroPopProvincia.php'); ">
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