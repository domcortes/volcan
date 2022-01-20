<?php

include_once "../../assest/config/validarUsuarioFruta.php";

//LLAMADA ARCHIVOS NECESARIOS PARA LAS OPERACIONES
include_once '../../assest/controlador/EEXPORTACION_ADO.php';
include_once '../../assest/controlador/ESPECIES_ADO.php';
include_once '../../assest/controlador/PRODUCTOR_ADO.php';
include_once '../../assest/controlador/TCALIBRE_ADO.php';
include_once '../../assest/controlador/TMONEDA_ADO.php';
include_once '../../assest/controlador/DICARGA_ADO.php';

include_once '../../assest/controlador/NOTADC_ADO.php';
include_once '../../assest/controlador/DNOTADC_ADO.php';


include_once '../../assest/modelo/DNOTADC.php';



//INCIALIZAR LAS VARIBLES
//INICIALIZAR CONTROLADOR

$EEXPORTACION_ADO =  new EEXPORTACION_ADO();
$ESPECIES_ADO =  new ESPECIES_ADO();
$PRODUCTOR_ADO =  new PRODUCTOR_ADO();
$TCALIBRE_ADO =  new TCALIBRE_ADO();
$TMONEDA_ADO =  new TMONEDA_ADO();
$DICARGA_ADO =  new DICARGA_ADO();


$NOTADC_ADO =  new NOTADC_ADO();
$DNOTADC_ADO =  new DNOTADC_ADO();

//INIICIALIZAR MODELO
$DNOTADC =  new DNOTADC();

//INICIALIZACION VARIABLES

$TNOTA="";
$NOTA = "";
$EEXPORTACION = "";
$ESPECIES = "";
$CALIBRE = "";
$EEXPORTACION = "";
$KILOSBRUTO = 0;
$PRECIOUS = 0;
$KILOSNETO = 0;
$KILOSNETO = 0;
$KILOSBRUTO = 0;
$CANTIDADENVASE = 0;
$TOTALPRECIOUS = 0;
$TOTALPRECIOUSNCND = 0;
$PRECIOUSNCND = 0; 
$CANTIDADNOTA=0;
$IDDICARGA = "";
$IDICARGA = "";


$PESOENVASEESTANDAR = 0;
$PESOPALLETEESTANDAR = 0;
$PESOBRUTOEESTANDAR = 0;
$PESONETOEESTANDAR = 0;




$EMPRESA = "";
$PLANTA = "";
$TEMPORADA = "";

$TMANEJO = "";
$FOLIOALIAS = "";
$DISABLED = "";
$DISABLED2 = "";
$DISABLEDSTYLE = "";
$DISABLEDSTYLE2 = "style='background-color: #eeeeee;'";
$MENSAJEELIMINAR = "";


$IDOP = "";
$IDOP2 = "";
$OP = "";
$SINO = "";
$MENSAJE = "";

$NODATOURL = "";

//INICIALIZAR ARREGLOS
$ARRAYESTANDAR = "";
$ARRAYCALIBRE = "";
$ARRAYESTANDARDETALLE = "";




//DEFINIR ARREGLOS CON LOS DATOS OBTENIDOS DE LAS FUNCIONES DE LOS CONTROLADORES

$ARRAYESTANDAR = $EEXPORTACION_ADO->listarEstandarPorEmpresaCBX($EMPRESAS);
$ARRAYCALIBRE = $TCALIBRE_ADO->listarCalibrePorEmpresaCBX($EMPRESAS);
$ARRAYTMONEDA = $TMONEDA_ADO->listarTmonedaPorEmpresaCBX($EMPRESAS);
include_once "../../assest/config/validarDatosUrlD.php";



//OBTENCION DE DATOS ENVIADOR A LA URL
//PARA OPERACIONES DE EDICION , VISUALIZACION Y CREACION
if (isset($_SESSION['parametro']) && isset($_SESSION['parametro1']) && isset($_SESSION['urlO']) && isset($_SESSION['dparametro']) && isset($_SESSION['dparametro1'])) {
    //ALMACENAR DATOS DE VARIABLES DE LA URL
    $IDOP = $_SESSION['dparametro'];
    $OP = $_SESSION['dparametro1'];
    $IDP = $_SESSION['parametro'];
    $OPP = $_SESSION['parametro1'];
    $URLO = $_SESSION['urlO'];
    $ARRAYNOTA=$NOTADC_ADO->verNota($IDP);
    if($ARRAYNOTA){
        $TNOTA=$ARRAYNOTA[0]["TNOTA"];
        if($TNOTA==1){
            $NOMBRETNOTA="Nora de Debito";
        }
        if($TNOTA==2){
            $NOMBRETNOTA="Nota de Credicto";
        }
    }


    //IDENTIFICACIONES DE OPERACIONES

    //crear =  OBTENCION DE DATOS PARA LA CREACION DE REGISTRO
    if ($OP == "crear") {

        $DISABLED = "";
        $DISABLED2 = "disabled";
        $DISABLEDSTYLE = "";
        $DISABLEDSTYLE2 = "style='background-color: #eeeeee;'";
        $ARRAYDICARGA = $DICARGA_ADO->verDicarga($IDOP);
        foreach ($ARRAYDICARGA as $r) :
            $CANTIDADENVASE = "" . $r['CANTIDAD_ENVASE_DICARGA'];
            $KILOSNETO = "" . $r['KILOS_NETO_DICARGA'];
            $KILOSBRUTO = "" . $r['KILOS_BRUTO_DICARGA'];
            $PRECIOUS = "" . $r['PRECIO_US_DICARGA'];
            $TOTALPRECIOUS = "" . $r['TOTAL_PRECIO_US_DICARGA'];
            $EEXPORTACION = "" . $r['ID_ESTANDAR'];
            $CALIBRE = "" . $r['ID_TCALIBRE'];
            $TMONEDA = "" . $r['ID_TMONEDA'];
            $ARRAYVERESTANDAR = $EEXPORTACION_ADO->verEstandar($EEXPORTACION);
            $ARRAYVERESPECIES = $ESPECIES_ADO->verEspecies($ARRAYVERESTANDAR[0]['ID_ESPECIES']);
            $ESPECIES =  $ARRAYVERESPECIES[0]['NOMBRE_ESPECIES'];
            $IDICARGA = "" . $r['ID_ICARGA'];
            $ARRAYDNOTA=$DNOTADC_ADO->buscarPorNotaDicarga($IDP,$IDOP);            
            if($ARRAYDNOTA){
                $TOTALPRECIOUSNCND=$ARRAYDNOTA[0]["TOTAL"];
                $CANTIDADNOTA= ($TOTALPRECIOUSNCND/$CANTIDADENVASE)-$PRECIOUS;
                $TNOTA=$ARRAYDNOTA[0]["TNOTA"];
                if($TNOTA==1){
                    $PRECIOUSNCND = $CANTIDADNOTA+$PRECIOUS ;
                }
                if($TNOTA==2){
                    $PRECIOUSNCND =  $CANTIDADNOTA-$PRECIOUS;
                }
            }else{
                $PRECIOUSNCND = 0;
                $TOTALPRECIOUSNCND = 0;
            }
        endforeach;
    }
    //editar =  OBTENCION DE DATOS PARA LA EDICION DE REGISTRO
    if ($OP == "editar") {

        $DISABLED = "";
        $DISABLED2 = "disabled";
        $DISABLEDSTYLE = "";
        $DISABLEDSTYLE2 = "style='background-color: #eeeeee;'";
        $ARRAYDICARGA = $DICARGA_ADO->verDicarga($IDOP);
        foreach ($ARRAYDICARGA as $r) :
            $CANTIDADENVASE = "" . $r['CANTIDAD_ENVASE_DICARGA'];
            $KILOSNETO = "" . $r['KILOS_NETO_DICARGA'];
            $KILOSBRUTO = "" . $r['KILOS_BRUTO_DICARGA'];
            $PRECIOUS = "" . $r['PRECIO_US_DICARGA'];
            $TOTALPRECIOUS = "" . $r['TOTAL_PRECIO_US_DICARGA'];
            $EEXPORTACION = "" . $r['ID_ESTANDAR'];
            $CALIBRE = "" . $r['ID_TCALIBRE'];
            $TMONEDA = "" . $r['ID_TMONEDA'];
            $ARRAYVERESTANDAR = $EEXPORTACION_ADO->verEstandar($EEXPORTACION);
            $ARRAYVERESPECIES = $ESPECIES_ADO->verEspecies($ARRAYVERESTANDAR[0]['ID_ESPECIES']);
            $ESPECIES =  $ARRAYVERESPECIES[0]['NOMBRE_ESPECIES'];
            $IDICARGA = "" . $r['ID_ICARGA'];
            $ARRAYDNOTA=$DNOTADC_ADO->buscarPorNotaDicarga($IDP,$IDOP);          
            if($ARRAYDNOTA){
                $TOTALPRECIOUSNCND=$ARRAYDNOTA[0]["TOTAL"];
                $CANTIDADNOTA= ($TOTALPRECIOUSNCND/$CANTIDADENVASE)-$PRECIOUS;
                $TNOTA=$ARRAYDNOTA[0]["TNOTA"];
                if($TNOTA==1){
                    $PRECIOUSNCND = $CANTIDADNOTA+$PRECIOUS ;
                }
                if($TNOTA==2){
                    $PRECIOUSNCND =  $CANTIDADNOTA-$PRECIOUS;
                }
            }else{
                $PRECIOUSNCND = 0;
                $TOTALPRECIOUSNCND = 0;
            }
        endforeach;
    }
    //ver =  OBTENCION DE DATOS PARA LA VISUALIZACION DEL REGISTRO
    if ($OP == "ver") {
        $DISABLED = "disabled";
        $DISABLED2 = "disabled";
        $DISABLEDSTYLE = "style='background-color: #eeeeee;'";
        $DISABLEDSTYLE2 = "style='background-color: #eeeeee;'";
        $ARRAYDICARGA = $DICARGA_ADO->verDicarga($IDOP);
        foreach ($ARRAYDICARGA as $r) :
            $CANTIDADENVASE = "" . $r['CANTIDAD_ENVASE_DICARGA'];
            $KILOSNETO = "" . $r['KILOS_NETO_DICARGA'];
            $KILOSBRUTO = "" . $r['KILOS_BRUTO_DICARGA'];
            $PRECIOUS = "" . $r['PRECIO_US_DICARGA'];
            $TOTALPRECIOUS = "" . $r['TOTAL_PRECIO_US_DICARGA'];
            $EEXPORTACION = "" . $r['ID_ESTANDAR'];
            $CALIBRE = "" . $r['ID_TCALIBRE'];
            $TMONEDA = "" . $r['ID_TMONEDA'];
            $ARRAYVERESTANDAR = $EEXPORTACION_ADO->verEstandar($EEXPORTACION);
            $ARRAYVERESPECIES = $ESPECIES_ADO->verEspecies($ARRAYVERESTANDAR[0]['ID_ESPECIES']);
            $ESPECIES =  $ARRAYVERESPECIES[0]['NOMBRE_ESPECIES'];
            $IDICARGA = "" . $r['ID_ICARGA'];
            $ARRAYDNOTA=$DNOTADC_ADO->buscarPorNotaDicarga($IDP,$IDOP);          
            if($ARRAYDNOTA){
                $TOTALPRECIOUSNCND=$ARRAYDNOTA[0]["TOTAL"];
                $CANTIDADNOTA= ($TOTALPRECIOUSNCND/$CANTIDADENVASE)-$PRECIOUS;
                $TNOTA=$ARRAYDNOTA[0]["TNOTA"];
                if($TNOTA==1){
                    $PRECIOUSNCND = $CANTIDADNOTA+$PRECIOUS ;
                }
                if($TNOTA==2){
                    $PRECIOUSNCND =  $CANTIDADNOTA-$PRECIOUS;
                }
            }else{
                $PRECIOUSNCND = 0;
                $TOTALPRECIOUSNCND = 0;
            }
        endforeach;
    }


    //ver =  OBTENCION DE DATOS PARA LA VISUALIZACION DEL REGISTRO
    if ($OP == "eliminar") {
        $DISABLED = "disabled";
        $DISABLED2 = "disabled";
        $DISABLEDSTYLE = "style='background-color: #eeeeee;'";
        $DISABLEDSTYLE2 = "style='background-color: #eeeeee;'";
        $MENSAJEELIMINAR = "ESTA SEGURO DE ELIMINAR EL REGISTRO, PARA CONFIRMAR PRESIONE ELIMINAR";
        $ARRAYDICARGA = $DICARGA_ADO->verDicarga($IDOP);
        foreach ($ARRAYDICARGA as $r) :
            $CANTIDADENVASE = "" . $r['CANTIDAD_ENVASE_DICARGA'];
            $KILOSNETO = "" . $r['KILOS_NETO_DICARGA'];
            $KILOSBRUTO = "" . $r['KILOS_BRUTO_DICARGA'];
            $EEXPORTACION = "" . $r['ID_ESTANDAR'];
            $CALIBRE = "" . $r['ID_TCALIBRE'];
            $TMONEDA = "" . $r['ID_TMONEDA'];
            $ARRAYVERESTANDAR = $EEXPORTACION_ADO->verEstandar($EEXPORTACION);
            $ARRAYVERESPECIES = $ESPECIES_ADO->verEspecies($ARRAYVERESTANDAR[0]['ID_ESPECIES']);
            $ESPECIES =  $ARRAYVERESPECIES[0]['NOMBRE_ESPECIES'];
            $IDICARGA = "" . $r['ID_ICARGA'];
            $ARRAYDNOTA=$DNOTADC_ADO->buscarPorNotaDicarga($IDP,$IDOP);          
            if($ARRAYDNOTA){
                $TOTALPRECIOUSNCND=$ARRAYDNOTA[0]["TOTAL"];
                $CANTIDADNOTA= ($TOTALPRECIOUSNCND/$CANTIDADENVASE)-$PRECIOUS;
                $TNOTA=$ARRAYDNOTA[0]["TNOTA"];
                if($TNOTA==1){
                    $PRECIOUSNCND = $CANTIDADNOTA+$PRECIOUS ;
                }
                if($TNOTA==2){
                    $PRECIOUSNCND =  $CANTIDADNOTA-$PRECIOUS;
                }
            }else{
                $PRECIOUSNCND = 0;
                $TOTALPRECIOUSNCND = 0;
            }
        endforeach;
    }
}
if ($_POST) {
    if (isset($_REQUEST['TOTALPRECIOUSNCND'])) {
        $TOTALPRECIOUSNCND = $_REQUEST['TOTALPRECIOUSNCND'];
    }
}
?>


<!DOCTYPE html>
<html lang="es">

<head>
    <title> Registro Detalle</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="description" content="">
    <meta name="author" content="">
    <!- LLAMADA DE LOS ARCHIVOS NECESARIOS PARA DISEÑO Y FUNCIONES BASE DE LA VISTA -!>
        <?php include_once "../../assest/config/urlHead.php"; ?>
        <!- FUNCIONES BASES -!>
            <script type="text/javascript">
                function validacion() {
                    TOTALPRECIOUSNCND = document.getElementById("TOTALPRECIOUSNCND").value;
                    TOTALPRECIOUS = document.getElementById("TOTALPRECIOUS").value;
                    TNOTA = parseInt(document.getElementById("TNOTA").value);
                    document.getElementById('val_totalusncnd').innerHTML = "";
                

                    if (TOTALPRECIOUSNCND == null || TOTALPRECIOUSNCND.length == 0 || /^\s+$/.test(TOTALPRECIOUSNCND)) {
                        document.form_reg_dato.TOTALPRECIOUSNCND.focus();
                        document.form_reg_dato.TOTALPRECIOUSNCND.style.borderColor = "#FF0000";
                        document.getElementById('val_totalusncnd').innerHTML = "NO HA INGRESADO DATOS";
                        return false;
                    }
                    document.form_reg_dato.CANTIDADENVASE.style.borderColor = "#4AF575";

                    if (TOTALPRECIOUSNCND == 0) {
                        document.form_reg_dato.TOTALPRECIOUSNCND.focus();
                        document.form_reg_dato.TOTALPRECIOUSNCND.style.borderColor = "#FF0000";
                        document.getElementById('val_totalusncnd').innerHTML = "DEBE SER DISTINTO DE CERO";
                        return false;
                    }
                    document.form_reg_dato.TOTALPRECIOUSNCND.style.borderColor = "#4AF575";
                    
                    if (TOTALPRECIOUSNCND <= TOTALPRECIOUS) {                        
                        document.form_reg_dato.TOTALPRECIOUSNCND.focus();                        
                        document.form_reg_dato.TOTALPRECIOUSNCND.style.borderColor = "#FF0000";                        
                        document.getElementById('val_totalusncnd').innerHTML = "DEBE SER MATOR A TOTAL INSTRUCTIVO";                       
                        return false;    
                    }
                    document.form_reg_dato.TOTALPRECIOUSNCND.style.borderColor = "#4AF575";
                    if(TNOTA==1){
                        if (TOTALPRECIOUSNCND <= TOTALPRECIOUS) {                        
                            document.form_reg_dato.TOTALPRECIOUSNCND.focus();                        
                            document.form_reg_dato.TOTALPRECIOUSNCND.style.borderColor = "#FF0000";                        
                            document.getElementById('val_totalusncnd').innerHTML = "DEBE SER MATOR A TOTAL INSTRUCTIVO";                       
                            return false;    
                        } else {
                            document.form_reg_dato.TOTALPRECIOUSNCND.style.borderColor = "#4AF575";
                        }
                    }
                    if(TNOTA==2){
                        if (TOTALPRECIOUSNCND >= TOTALPRECIOUS) {                        
                            document.form_reg_dato.TOTALPRECIOUSNCND.focus();                        
                            document.form_reg_dato.TOTALPRECIOUSNCND.style.borderColor = "#FF0000";                        
                            document.getElementById('val_totalusncnd').innerHTML = "DEBE SER MATOR A TOTAL INSTRUCTIVO";                       
                            return false;    
                        } else {
                            document.form_reg_dato.TOTALPRECIOUSNCND.style.borderColor = "#4AF575";
                        }
                    }
                    
                    
                }
                function precio(){
                    var precio;
                    var valorndnc;
                    var repuesta;

                    TOTALPRECIOUSNCND = document.getElementById("TOTALPRECIOUSNCND").value;
                    TNOTA = parseInt(document.getElementById("TNOTA").value);
                    CANTIDADENVASEE = parseInt(document.getElementById("CANTIDADENVASEE").value);
                    PRECIOUSE = parseFloat(document.getElementById("PRECIOUSE").value);

                    document.getElementById('val_totalusncnd').innerHTML = "";                

                    if (TOTALPRECIOUSNCND == null || TOTALPRECIOUSNCND.length == 0 || /^\s+$/.test(TOTALPRECIOUSNCND)) {
                        document.form_reg_dato.TOTALPRECIOUSNCND.focus();
                        document.form_reg_dato.TOTALPRECIOUSNCND.style.borderColor = "#FF0000";
                        document.getElementById('val_totalusncnd').innerHTML = "NO HA INGRESADO DATOS";
                        repuesta = 1;
                    } else {
                        repuesta = 0;
                        document.form_reg_dato.CANTIDADENVASE.style.borderColor = "#4AF575";
                    }
                    if (TOTALPRECIOUSNCND == 0) {
                        document.form_reg_dato.TOTALPRECIOUSNCND.focus();
                        document.form_reg_dato.TOTALPRECIOUSNCND.style.borderColor = "#FF0000";
                        document.getElementById('val_totalusncnd').innerHTML = "DEBE SER DISTINTO DE CERO";
                        repuesta = 1;
                    } else {
                        repuesta = 0;
                        document.form_reg_dato.TOTALPRECIOUSNCND.style.borderColor = "#4AF575";
                    }                          
                    if (repuesta == 0) {
                        valorndnc =     (TOTALPRECIOUSNCND / CANTIDADENVASEE) - PRECIOUSE;                       
                        if(TNOTA==1){
                            precio =PRECIOUSE+valorndnc;
                        }
                        if(TNOTA==2){
                            precio =PRECIOUSE-valorndnc;
                        } 
                        valorndnc = valorndnc.toFixed(6); 
                        precio = precio.toFixed(6);           
                        document.getElementById('PRECIOUSNCND').value = precio;
                        document.getElementById('CANTIDADNOTA').value = valorndnc;
                        document.getElementById('CANTIDADNOTAE').value = valorndnc;

                    }
                }

                //FUNCION PARA CERRAR VENTANA Y ACTUALIZAR PRINCIPAL
                function cerrar() {
                    window.opener.refrescar()
                    window.close();
                }
                //REDIRECCIONAR A LA PAGINA SELECIONADA
                function irPagina(url) {
                    location.href = "" + url;
                }
            </script>

</head>

<body class="hold-transition light-skin fixed sidebar-mini theme-primary">
    <div class="wrapper">
        <!- LLAMADA AL MENU PRINCIPAL DE LA PAGINA-!>
            <?php include_once "../../assest/config/menuFruta.php";
            ?>

            <div class="content-wrapper">
                <div class="container-full">

                    <!-- Content Header (Page header) -->
                    <div class="content-header">
                        <div class="d-flex align-items-center">
                            <div class="mr-auto">
                                <h3 class="page-title">Exportacion</h3>
                                <div class="d-inline-block align-items-center">
                                    <nav>
                                        <ol class="breadcrumb">
                                            <li class="breadcrumb-item"> <a href="index.php"> <i class="mdi mdi-home-outline"></i></a></li>
                                            <li class="breadcrumb-item" aria-current="page">Módulo</li>
                                            <li class="breadcrumb-item" aria-current="page">Exportación</li>
                                            <li class="breadcrumb-item" aria-current="page">Nota D/C</li>
                                            <li class="breadcrumb-item" aria-current="page">Registro Nota D/C</li>
                                            <li class="breadcrumb-item active" aria-current="page"> <a href="registroICarga.php">Registro Detalle </a>
                                            </li>
                                        </ol>
                                    </nav>
                                </div>
                            </div>
                            <?php include_once "../../assest/config/verIndicadorEconomico.php"; ?>
                        </div>
                    </div>
                    <section class="content">
                        <div class="box">
                            <div class="box-header with-border bg-info">                                   
                                <h4 class="box-title">Registro Detalle</h4>                                        
                            </div>

                            <form class="form" role="form" method="post" name="form_reg_dato">
                                <div class="box-body ">
                                    <div class="row">
                                        <div class="col-xxl-4 col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12 col-xs-12">
                                            <div class="form-group">
                                                <input type="hidden" class="form-control" placeholder="ID DNOTA" id="ID" name="ID" value="<?php echo $IDOP; ?>" />
                                                <input type="hidden" class="form-control" placeholder="ID NOTA" id="IDP" name="IDP" value="<?php echo $IDP; ?>" />
                                                <input type="hidden" class="form-control" placeholder="OP NOTA" id="OPP" name="OPP" value="<?php echo $OPP; ?>" />
                                                <input type="hidden" class="form-control" placeholder="URL NOTA" id="URLO" name="URLO" value="<?php echo $URLO; ?>" />
                                                <input type="hidden" class="form-control" placeholder="TNOTA" id="TNOTA" name="TNOTA" value="<?php echo $TNOTA; ?>" />
                                                <input type="hidden" class="form-control" placeholder="ID EMPRESA" id="EMPRESA" name="EMPRESA" value="<?php echo $EMPRESAS; ?>" />
                                                <input type="hidden" class="form-control" placeholder="ID PLANTA" id="PLANTA" name="PLANTA" value="<?php echo $PLANTAS; ?>" />
                                                <input type="hidden" class="form-control" placeholder="ID TEMPORADA" id="TEMPORADA" name="TEMPORADA" value="<?php echo $TEMPORADAS; ?>" />
                                                <label>Estandar</label>
                                                <input type="hidden" class="form-control" placeholder="EEXPORTACIONE" id="EEXPORTACIONE" name="EEXPORTACIONE" value="<?php echo $EEXPORTACION; ?>" />
                                                <select class="form-control select2" id="EEXPORTACION" name="EEXPORTACION"  style="width: 100%;" disabled>
                                                    <option></option>
                                                    <?php foreach ($ARRAYESTANDAR as $r) : ?>
                                                        <?php if ($ARRAYESTANDAR) {    ?>
                                                            <option value="<?php echo $r['ID_ESTANDAR']; ?>" <?php if ($EEXPORTACION == $r['ID_ESTANDAR']) {  echo "selected"; } ?>>                                                                
                                                               <?php echo $r['CODIGO_ESTANDAR'] ?> <?php echo $r['NOMBRE_ESTANDAR'] ?>
                                                            </option>
                                                        <?php } else { ?>
                                                            <option>No Hay Datos Registrados </option>
                                                        <?php } ?>
                                                    <?php endforeach; ?>
                                                </select>
                                                <label id="val_estandar" class="validacion"> </label>
                                            </div>
                                        </div>
                                        <div class="col-xxl-4 col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12 col-xs-12">
                                            <div class="form-group">
                                                <label>Especies </label>
                                                <input type="hidden" class="form-control" placeholder="ESPECIESE" id="ESPECIESE" name="ESPECIESE" value="<?php echo $ESPECIES; ?>" />
                                                <input type="text" class="form-control" placeholder="ESPECIES" id="ESPECIES" name="ESPECIES" value="<?php echo $ESPECIES; ?>" disabled style="background-color: #eeeeee;" />
                                                <label id="val_especies" class="validacion"> </label>
                                            </div>
                                        </div>

                                        <div class="col-xxl-4 col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12 col-xs-12">
                                            <div class="form-group">
                                                <label>Calibre</label>
                                                <input type="hidden" class="form-control" placeholder="CALIBREE" id="CALIBREE" name="CALIBREE" value="<?php echo $CALIBRE; ?>" />
                                                <select class="form-control select2" id="CALIBRE" name="CALIBRE" style="width: 100%;" disabled>
                                                    <option></option>
                                                    <?php foreach ($ARRAYCALIBRE as $r) : ?>
                                                        <?php if ($ARRAYCALIBRE) {    ?>
                                                            <option value="<?php echo $r['ID_TCALIBRE']; ?>" <?php if ($CALIBRE == $r['ID_TCALIBRE']) {  echo "selected"; } ?>>
                                                                <?php echo $r['NOMBRE_TCALIBRE'] ?>
                                                            </option>
                                                        <?php } else { ?>
                                                            <option>No Hay Datos Registrados </option>
                                                        <?php } ?>
                                                    <?php endforeach; ?>
                                                </select>
                                                <label id="val_calibre" class="validacion"> </label>
                                            </div>
                                        </div>

                                        <div class="col-xxl-4 col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12 col-xs-12">
                                            <div class="form-group">
                                                <label>Tipo Moneda</label>
                                                <input type="hidden" class="form-control" placeholder="TMONEDAE" id="TMONEDAE" name="TMONEDAE" value="<?php echo $TMONEDA; ?>" />
                                                <select class="form-control select2" id="TMONEDA" name="TMONEDA" style="width: 100%;"  disabled >
                                                    <option></option>
                                                    <?php foreach ($ARRAYTMONEDA as $r) : ?>
                                                        <?php if ($ARRAYTMONEDA) {    ?>
                                                            <option value="<?php echo $r['ID_TMONEDA']; ?>" <?php if ($TMONEDA == $r['ID_TMONEDA']) {
                                                                                                                    echo "selected";
                                                                                                                } ?>>
                                                                <?php echo $r['NOMBRE_TMONEDA'] ?>
                                                            </option>
                                                        <?php } else { ?>
                                                            <option>No Hay Datos Registrados </option>
                                                        <?php } ?>
                                                    <?php endforeach; ?>
                                                </select>
                                                <label id="val_tmoneda" class="validacion"> </label>
                                            </div>
                                        </div>
                                        <div class="col-xxl-2 col-xl-4 col-lg-4 col-md-6 col-sm-6 col-6 col-xs-6 ">
                                            <div class="form-group">
                                                <label>Cantidad Envase</label>
                                                <input type="hidden" id="CANTIDADENVASEE" name="CANTIDADENVASEE" value="<?php echo $CANTIDADENVASE; ?>" />
                                                <input type="number" class="form-control" placeholder="Cantidad Envase"  id="CANTIDADENVASE" name="CANTIDADENVASE" value="<?php echo $CANTIDADENVASE; ?>" disabled />
                                                <label id="val_cantidad" class="validacion"> </label>
                                            </div>
                                        </div>
                                        <div class="col-xxl-2 col-xl-4 col-lg-4 col-md-6 col-sm-6 col-6 col-xs-6 ">
                                            <div class="form-group">
                                                <label>Valor NC/ND </label>
                                                <input type="hidden" id="CANTIDADNOTAE" name="CANTIDADNOTAE" value="<?php echo $CANTIDADNOTA; ?>" />
                                                <input type="number" step="0.000001" class="form-control"  placeholder="Valor NC/ND " id="CANTIDADNOTA" name="CANTIDADNOTA"   value="<?php echo number_format($CANTIDADNOTA,6 ); ?>"   disabled />
                                                <label id="val_cantidadnota" class="validacion"> </label>
                                            </div>
                                        </div>
                                        <div class="col-xxl-2 col-xl-4 col-lg-4 col-md-6 col-sm-6 col-6 col-xs-6 ">
                                            <div class="form-group">
                                                <label>Precio Instructivo</label>
                                                <input type="hidden" id="PRECIOUSE" name="PRECIOUSE" value="<?php echo $PRECIOUS; ?>" />
                                                <input type="number" step="0.01" class="form-control"  placeholder="Precio Instructivo" id="PRECIOUS" name="PRECIOUS" value="<?php echo $PRECIOUS; ?>" disabled/>
                                                <label id="val_us" class="validacion"> </label>
                                            </div>
                                        </div>
                                        <div class="col-xxl-2 col-xl-4 col-lg-4 col-md-6 col-sm-6 col-6 col-xs-6 ">
                                            <div class="form-group">
                                                <label>Precio Instru. Con NC/ND</label>                                                
                                                <input type="number" step="0.000001" class="form-control"  placeholder="Precio Instru. Con NC/ND" id="PRECIOUSNCND" name="PRECIOUSNCND" value="<?php echo  number_format($PRECIOUSNCND,6 );  ?>" disabled/>                                                
                                            </div>
                                        </div>
                                        <div class="col-xxl-2 col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12 col-xs-12 ">
                                            <div class="form-group">
                                                <label>Total Instructivo</label>
                                                <input type="hidden" id="TOTALPRECIOUS" name="TOTALPRECIOUS" value="<?php echo $TOTALPRECIOUS; ?>" />
                                                <input type="number" step="0.01" class="form-control" placeholder="Total Instructivo" id="TOTALPRECIOUSV" name="TOTALPRECIOUSV" value="<?php echo $TOTALPRECIOUS; ?>" disabled style="background-color: #eeeeee;" />
                                                <label id="val_totalus" class="validacion"> </label>
                                            </div>
                                        </div>                                        
                                        <div class="col-xxl-2 col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12 col-xs-12 ">
                                            <div class="form-group">
                                                <label>Total Instru. Con NC/ND</label>                                                
                                                <input type="number" step="0.01" class="form-control"  placeholder="Total Instru. Con NC/ND" id="TOTALPRECIOUSNCND" name="TOTALPRECIOUSNCND" onchange="precio()" value="<?php echo $TOTALPRECIOUSNCND; ?>"  <?php echo $DISABLED; ?> />                                                
                                                <label id="val_totalusncnd" class="validacion"> </label>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- /.row -->
                                    <!-- /.box-body -->
                                    <label id=" val_mensaje" class="validacion"><?php echo $MENSAJEELIMINAR; ?> </label>
                                    <div class="box-footer">
                                        <div class="btn-group btn-block   col-xxl-4 col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12 col-xs-12" role="group" aria-label="Acciones generales">
                                            <button type="button" class="btn btn-success  " data-toggle="tooltip" title="Volver" name="CANCELAR" value="CANCELAR" Onclick="irPagina('<?php echo $URLO; ?>.php?op');">
                                                <i class="ti-back-left "></i> Volver
                                            </button>
                                            <?php if ($OP == "") { ?>
                                                <button type="submit" class="btn btn-primary " data-toggle="tooltip" title="Crear" name="CREAR" value="CREAR" <?php echo $DISABLED; ?> onclick="return validacion()">
                                                    <i class="ti-save-alt"></i> Guardar
                                                </button>
                                            <?php } ?>
                                            <?php if ($OP != "") { ?>
                                                <?php if ($OP == "crear") { ?>
                                                    <button type="submit" class="btn btn-primary " data-toggle="tooltip" title="Crear" name="CREAR" value="CREAR" <?php echo $DISABLED; ?> onclick="return validacion()">
                                                        <i class="ti-save-alt"></i> Guardar
                                                    </button>
                                                <?php } ?>
                                                <?php if ($OP == "editar") { ?>
                                                    <button type="submit" class="btn btn-warning   " data-toggle="tooltip" title="Guardar" name="EDITAR" value="EDITAR" <?php echo $DISABLED; ?> onclick="return validacion()">
                                                        <i class="ti-save-alt"></i> Guardar
                                                    </button>
                                                <?php } ?>
                                                <?php if ($OP == "eliminar") { ?>
                                                    <button type="submit" class="btn btn-danger " data-toggle="tooltip" title="Eliminar" name="ELIMINAR" value="ELIMINAR">
                                                        <i class="ti-trash"></i> Eliminar
                                                    </button>
                                                <?php } ?>
                                            <?php } ?>
                                        </div>
                                    </div>
                            </form>
                        </div>
                        <!--.row -->
                    </section>
                </div>
            </div>

            <!- LLAMADA ARCHIVO DEL DISEÑO DEL FOOTER Y MENU USUARIO -!>
                <?php include_once "../../assest/config/footer.php";   ?>
                <?php include_once "../../assest/config/menuExtraFruta.php"; ?>
    </div>
    <!- LLAMADA URL DE ARCHIVOS DE DISEÑO Y JQUERY E OTROS -!>
        <?php include_once "../../assest/config/urlBase.php"; ?>
        
        <?php
            echo
            '<script>
                const Toast = Swal.mixin({
                    toast: true,
                    position: "top-end",
                    showConfirmButton: false,
                    showConfirmButton:true
                })

                Toast.fire({
                  icon: "info",
                  title: "Información Importante",
                  html:"<label>Tipo de Nota NC/ND: '.$NOMBRETNOTA.'</label>"
                })
            </script>';
        ?>
        <?php 
            //OPERACIONES
            //OPERACION DE REGISTRO DE FILA
            if (isset($_REQUEST['CREAR'])) { 
                $DNOTADC->__SET('TNOTA', $_REQUEST['TNOTA']);
                $DNOTADC->__SET('CANTIDAD', $_REQUEST['CANTIDADNOTAE']);
                $DNOTADC->__SET('TOTAL', $_REQUEST['TOTALPRECIOUSNCND']);
                $DNOTADC->__SET('ID_NOTA', $_REQUEST['IDP']);
                $DNOTADC->__SET('ID_DICARGA', $_REQUEST['ID']);
                $DNOTADC_ADO->agregarDnota($DNOTADC);
                
                //REDIRECCIONAR A PAGINA registroICarga.php 
                $_SESSION["parametro"] =  $_REQUEST['IDP'];
                $_SESSION["parametro1"] =  $_REQUEST['OPP'];    
                
                $_SESSION["parametro"] =  $_REQUEST['IDP'];
                $_SESSION["parametro1"] =  $_REQUEST['OPP'];
                echo '<script>
                        Swal.fire({
                            icon:"success",
                            title:"Registro creado",
                            text:"El registro de detalle de nota se ha creado correctamente",
                            showConfirmButton:true,
                            confirmButtonText:"Volver a Nota D/C"
                        }).then((result)=>{
                            location.href ="' . $_REQUEST['URLO'] . '.php?op";                            
                        })
                    </script>';
            }
            if (isset($_REQUEST['EDITAR'])) {
                

                $ARRAYDNOTA=$DNOTADC_ADO->buscarPorNotaDicarga($_REQUEST['IDP'],$_REQUEST['ID']);
                if($ARRAYDNOTA){                    
                    
                    $DNOTADC->__SET('TNOTA', $_REQUEST['TNOTA']);
                    $DNOTADC->__SET('CANTIDAD', $_REQUEST['CANTIDADNOTAE']);
                    $DNOTADC->__SET('TOTAL', $_REQUEST['TOTALPRECIOUSNCND']);
                    $DNOTADC->__SET('ID_NOTA', $_REQUEST['IDP']);
                    $DNOTADC->__SET('ID_DICARGA', $_REQUEST['ID']);
                    $DNOTADC->__SET('ID_DNOTA', $ARRAYDNOTA[0]["ID_DNOTA"]);               
                    $DNOTADC_ADO->actualizarDnota($DNOTADC);

                    
                    $_SESSION["parametro"] =  $_REQUEST['IDP'];
                    $_SESSION["parametro1"] =  $_REQUEST['OPP'];                
                    echo '<script>
                            Swal.fire({
                                icon:"success",
                                title:"Registro Modificada",
                                text:"El registro del detalle de nota se ha modificada correctamente",
                                showConfirmButton:true,
                                confirmButtonText:"Volver a Nota D/C"
                            }).then((result)=>{
                                if(result.value){
                                    location.href ="' . $_REQUEST['URLO'] . '.php?op";
                                }
                            })
                        </script>';
                    
                }            }

            if (isset($_REQUEST['ELIMINAR'])) {
                $ARRAYDNOTA=$DNOTADC_ADO->buscarPorNotaDicarga($_REQUEST['IDP'],$_REQUEST['ID']);
                if($ARRAYDNOTA){      
                    $DNOTADC->__SET('ID_DNOTA', $ARRAYDNOTA[0]["ID_DNOTA"]);   
                    //LLAMADA AL METODO DE EDITAR DEL CONTROLADOR
                    $DNOTADC_ADO->deshabilitar($DNOTADC);
                    
                    $_SESSION["parametro"] =  $_REQUEST['IDP'];
                    $_SESSION["parametro1"] =  $_REQUEST['OPP'];
                    echo '<script>
                            Swal.fire({
                                icon:"error",
                                title:"Registro Eliminado",
                                text:"El registro del detalle nota se ha eliminado correctamente ",
                                showConfirmButton:true,
                                confirmButtonText:"Volver a Nota D/C"
                            }).then((result)=>{
                                location.href ="' . $_REQUEST['URLO'] . '.php?op";                        
                            })
                        </script>';
                }
            }
                    
        
        ?>
</body>

</html>