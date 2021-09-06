<?php


//LLAMADA ARCHIVOS NECESARIOS PARA LAS OPERACIONES


include_once '../controlador/EINDUSTRIAL_ADO.php';
include_once '../controlador/PVESPECIES_ADO.php';
include_once '../controlador/VESPECIES_ADO.php';
include_once '../controlador/FOLIO_ADO.php';
include_once '../controlador/PRODUCTOR_ADO.php';

include_once '../controlador/DRINDUSTRIAL_ADO.php';
include_once '../modelo/DRINDUSTRIAL.php';

include_once '../controlador/EXIINDUSTRIAL_ADO.php';
include_once '../modelo/EXIINDUSTRIAL.php';

//INCIALIZAR LAS VARIBLES
//INICIALIZAR CONTROLADOR

$EINDUSTRIAL_ADO =  new EINDUSTRIAL_ADO();
$PVESPECIES_ADO =  new PVESPECIES_ADO();
$VESPECIES_ADO =  new VESPECIES_ADO();
$FOLIO_ADO =  new FOLIO_ADO();
$PRODUCTOR_ADO =  new PRODUCTOR_ADO();

$DRINDUSTRIAL_ADO =  new DRINDUSTRIAL_ADO();
$DRINDUSTRIAL =  new DRINDUSTRIAL();

$EXIINDUSTRIAL_ADO =  new EXIINDUSTRIAL_ADO();
$EXIINDUSTRIAL =  new EXIINDUSTRIAL();



//INIICIALIZAR MODELO

$PROCESO="";
$FOLIODRINDUSTRIAL="";
$NUMEROFOLIODINDUSTRIAL="";
$FECHAEMBALADODINDUSTRIAL="";
$CANTIDADENVASEDINDUSTRIAL="";

$IDREEMBALAJE="";
$IDDPROCESOINDUSTRIAL="";

$EEXPORTACION="";
$PVESPECIES = "";
$FOLIO="";



$FOLIOBAS2="";
$FOLIOAUX="";
$ULTIMOFOLIO="";

$NOMBREPRODUCTOR="";
$NOMBREVARIEDAD="";

$PRODUCTOR="";
$EMPRESA="";
$PLANTA="";
$TEMPORADA="";

$DISABLED = "";
$DISABLEDSTYLE = "";

$DISABLED2 = "disabled";
$DISABLEDSTYLE2 = "style='background-color: #eeeeee;'";
$FOCUS = "";
$BORDER = "";


$IDOP = "";
$IDOP2 = "";
$OP = "";

$NODATOURL="";
//INICIALIZAR ARREGLOS

$ARRAYVERFOLIO="";
$ARRAYULTIMOFOLIO = "";
$ARRAYOBTENERNUMEROLINEA="";

$ARRAYESTANDAR="";
$ARRAYPVESPECIES;
$ARRAYVESPECIES;
$ARRAYPRODUCTOR="";

$ARRAYDPROCESOINDUSTRIAL="";
$ARRAYDPROCESOINDUSTRIAL2="";

$ARRAYVERFOLIOPOIND="";

$ARRAYESTANDAR = $EINDUSTRIAL_ADO->listarEstandarCBX();
$ARRAYFECHAACTUAL = $DRINDUSTRIAL_ADO->obtenerFecha();

$FECHAEMBALADODINDUSTRIAL = $ARRAYFECHAACTUAL[0]['FECHA'];


//OPERACIONES
//OPERACION DE REGISTRO DE FILA
if (isset($_REQUEST['GUARDAR'])) {

    //OBTENER EL FOLIO DEL DETALLE DE EXPORTACION DEL PROCESO
    $DISABLED="disabled";
    
    $ARRAYOBTENERNUMEROLINEA = $DRINDUSTRIAL_ADO->obtenerNumeroLinea($_REQUEST['IDDPROCESOINDUSTRIAL']);
    $ARRAYVERFOLIO = $FOLIO_ADO->verFolioPorEmpresaPlantaTemporadaTindustrial($_REQUEST['EMPRESA'],$_REQUEST['PLANTA'],$_REQUEST['TEMPORADA']);    
    
    $FOLIO=$ARRAYVERFOLIO[0]['ID_FOLIO'];
    $ARRAYULTIMOFOLIO = $EXIINDUSTRIAL_ADO->obtenerFolio($FOLIO);    

    $NUMEROLINEA = ($ARRAYOBTENERNUMEROLINEA[0]['NUMEROLINEAN']) + 1;
    if ($ARRAYULTIMOFOLIO[0]['ULTIMOFOLIO'] == 0) {
        $FOLIODRINDUSTRIAL = $ARRAYVERFOLIO[0]['NUMERO_FOLIO'];
        $ULTIMOFOLIO=0;
    }else{        
        $FOLIODRINDUSTRIAL = $ARRAYVERFOLIO[0]['NUMERO_FOLIO'] + $ARRAYULTIMOFOLIO[0]['ULTIMOFOLIO'];     
        $ULTIMOFOLIO = $ARRAYULTIMOFOLIO[0]['ULTIMOFOLIO'];   
    }
    $NUMEROFOLIODINDUSTRIAL =$FOLIODRINDUSTRIAL +1;
    $ULTIMOFOLIO = $ULTIMOFOLIO+1;

    //CONSULTA PARA LA OBTENCION DE LOS PARAMETROS DEL ESTANDAR DE EXPORTACION
    $ARRAYESTANDARDETALLE=$EINDUSTRIAL_ADO->verEstandar($_REQUEST['EEXPORTACION']);

    $PESONETOEESTANDAR=$ARRAYESTANDARDETALLE[0]['PESO_NETO_ESTANDAR'];

    $KILOSNETO=$_REQUEST['CANTIDADENVASEDINDUSTRIAL']*$PESONETOEESTANDAR;    
    $FOLIOALIAS =  "EMPRESA:".$_REQUEST['EMPRESA']."_PLANTA:".$_REQUEST['PLANTA']."_TEMPORADA:".$_REQUEST['TEMPORADA']."_TIPO_FOLIO:PRODUCTO INDUSTRIAL_NUMEROLINEA:".$NUMEROLINEA."REEMBALAJE:".$_REQUEST['IDREEMBALAJE'];     
    $ARRAYVERFOLIOPOIND = $EXIINDUSTRIAL_ADO->buscarPorReembalajeNumeroLinea($_REQUEST['IDREEMBALAJE'], $NUMEROLINEA ,$NUMEROFOLIODINDUSTRIAL);

 
    $DRINDUSTRIAL->__SET('FOLIO_DRINDUSTRIAL', $NUMEROFOLIODINDUSTRIAL);
    $DRINDUSTRIAL->__SET('NUMERO_LINEA', $NUMEROLINEA);
    $DRINDUSTRIAL->__SET('FOLIO_AUX_DRINDUSTRIAL', $ULTIMOFOLIO);
    $DRINDUSTRIAL->__SET('FECHA_EMBALADO_DRINDUSTRIAL', $_REQUEST['FECHAEMBALADODINDUSTRIAL']);
    $DRINDUSTRIAL->__SET('KILOS_NETO_DRINDUSTRIAL', $KILOSNETO);
    $DRINDUSTRIAL->__SET('ALIAS_FOLIO_DRINDUSTRIAL', $FOLIOALIAS);
    $DRINDUSTRIAL->__SET('ID_ESTANDAR', $_REQUEST['EEXPORTACION']);
    $DRINDUSTRIAL->__SET('ID_FOLIO', $FOLIO); 
    $DRINDUSTRIAL->__SET('ID_PVESPECIES',  $_REQUEST['PVESPECIES']); 
    $DRINDUSTRIAL->__SET('ID_REEMBALAJE', $_REQUEST['IDREEMBALAJE']);
    $DRINDUSTRIAL->__SET('ID_PRODUCTOR', $_REQUEST['PRODUCTOR']);
    //LLAMADA AL METODO DE REGISTRO DEL CONTROLADOR
    $DRINDUSTRIAL_ADO->agregarDrindustrial($DRINDUSTRIAL);
    
    if(empty($ARRAYVERFOLIOPOIND)){       
        //UTILIZACION METODOS SET DEL MODELO
        //SETEO DE ATRIBUTOS DE LA CLASE, OBTENIDO EN EL FORMULARIO   
        $EXIINDUSTRIAL->__SET('FOLIO_EXIINDUSTRIAL',$NUMEROFOLIODINDUSTRIAL);
        $EXIINDUSTRIAL->__SET('NUMERO_LINEA', $NUMEROLINEA);        
        $EXIINDUSTRIAL->__SET('FOLIO_AUXILIAR_EXIINDUSTRIAL', $NUMEROFOLIODINDUSTRIAL); 
        $EXIINDUSTRIAL->__SET('KILOS_NETO_EXIINDUSTRIAL', $KILOSNETO);     
        $EXIINDUSTRIAL->__SET('ALIAS_FOLIO_EXIINDUSTRIAL', $FOLIOALIAS);     
        $EXIINDUSTRIAL->__SET('FECHA_EMBALADO_EXIINDUSTRIAL', $_REQUEST['FECHAEMBALADODINDUSTRIAL']);     
        $EXIINDUSTRIAL->__SET('ID_ESTANDAR', $_REQUEST['EEXPORTACION']);
        $EXIINDUSTRIAL->__SET('ID_PRODUCTOR', $_REQUEST['PRODUCTOR']);
        $EXIINDUSTRIAL->__SET('ID_PVESPECIES', $_REQUEST['PVESPECIES']);
        $EXIINDUSTRIAL->__SET('ID_FOLIO', $FOLIO);
        $EXIINDUSTRIAL->__SET('ID_EMPRESA', $_REQUEST['EMPRESA']);
        $EXIINDUSTRIAL->__SET('ID_PLANTA', $_REQUEST['PLANTA']);
        $EXIINDUSTRIAL->__SET('ID_TEMPORADA', $_REQUEST['TEMPORADA']);
        $EXIINDUSTRIAL->__SET('ID_REEMBALAJE', $_REQUEST['IDREEMBALAJE']);
        //LLAMADA AL METODO DE REGISTRO DEL CONTROLADOR
        $EXIINDUSTRIAL_ADO->agregarExiindustrialReembalaje($EXIINDUSTRIAL);

   }

   if($ARRAYVERFOLIOPOIND){ 
    //UTILIZACION METODOS SET DEL MODELO
    //SETEO DE ATRIBUTOS DE LA CLASE, OBTENIDO EN EL FORMULARIO   
        //UTILIZACION METODOS SET DEL MODELO
        //SETEO DE ATRIBUTOS DE LA CLASE, OBTENIDO EN EL FORMULARIO   
        $EXIINDUSTRIAL->__SET('FOLIO_AUXILIAR_EXIINDUSTRIAL', $NUMEROFOLIODINDUSTRIAL);
        $EXIINDUSTRIAL->__SET('KILOS_NETO_EXIINDUSTRIAL', $KILOSNETO); 
        $EXIINDUSTRIAL->__SET('FECHA_EMBALADO_EXIINDUSTRIAL', $_REQUEST['FECHAEMBALADODINDUSTRIAL']);     
        $EXIINDUSTRIAL->__SET('ID_ESTANDAR', $_REQUEST['EEXPORTACION']);
        $EXIINDUSTRIAL->__SET('ID_PRODUCTOR', $_REQUEST['PRODUCTOR']);
        $EXIINDUSTRIAL->__SET('ID_PVESPECIES', $_REQUEST['PVESPECIES']);
        $EXIINDUSTRIAL->__SET('ID_FOLIO', $FOLIO);
        $EXIINDUSTRIAL->__SET('ID_REEMBALAJE', $_REQUEST['IDREEMBALAJE']);
        $EXIINDUSTRIAL->__SET('ID_EXIINDUSTRIAL', $ARRAYVERFOLIOPOIND[0]['ID_EXIINDUSTRIAL']);
        $EXIINDUSTRIAL->__SET('ID_EMPRESA', $_REQUEST['EMPRESA']);
        $EXIINDUSTRIAL->__SET('ID_PLANTA', $_REQUEST['PLANTA']);
        $EXIINDUSTRIAL->__SET('ID_TEMPORADA', $_REQUEST['TEMPORADA']);
        //LLAMADA AL METODO DE REGISTRO DEL CONTROLADOR
       $EXIINDUSTRIAL_ADO->actualizarExiindustrialReembalaje($EXIINDUSTRIAL);

   }
   
    echo "
    <script type='text/javascript'>
        window.opener.refrescar()
        window.close();
        </script> 
    ";

}

if (isset($_REQUEST['EDITAR'])) {
    //OBTENER EL FOLIO DEL DETALLE DE EXPORTACION DEL PROCESO
    $ARRAYDPROCESOINDUSTRIAL2 = $DRINDUSTRIAL_ADO->verDrindustrial($_REQUEST['IDDPROCESOINDUSTRIAL']);
    $ARRAYVERFOLIO = $FOLIO_ADO->verFolioPorEmpresaPlantaTemporadaTindustrial($_REQUEST['EMPRESA'],$_REQUEST['PLANTA'],$_REQUEST['TEMPORADA']);    
    
    $FOLIO=$ARRAYVERFOLIO[0]['ID_FOLIO'];
  
    $NUMEROLINEA = ($ARRAYDPROCESOINDUSTRIAL2[0]['NUMERO_LINEA']);
    $NUMEROFOLIODINDUSTRIAL = $ARRAYVERFOLIO[0]['NUMERO_FOLIO']+$ARRAYDPROCESOINDUSTRIAL2[0]['FOLIO_AUX_DRINDUSTRIAL'];   



    //CONSULTA PARA LA OBTENCION DE LOS PARAMETROS DEL ESTANDAR DE EXPORTACION
    $ARRAYESTANDARDETALLE=$EINDUSTRIAL_ADO->verEstandar($_REQUEST['EEXPORTACION']);

    $PESONETOEESTANDAR=$ARRAYESTANDARDETALLE[0]['PESO_NETO_ESTANDAR'];

    $KILOSNETO=$_REQUEST['CANTIDADENVASEDINDUSTRIAL']*$PESONETOEESTANDAR;   
    
    //$NUMEROFOLIODINDUSTRIAL=$_REQUEST['NUMEROFOLIODINDUSTRIAL'];
    $FOLIOALIAS =  "EMPRESA:".$_REQUEST['EMPRESA']."_PLANTA:".$_REQUEST['PLANTA']."_TEMPORADA:".$_REQUEST['TEMPORADA']."_TIPO_FOLIO:PRODUCTO INDUSTRIAL_NUMEROLINEA:".$NUMEROLINEA."REEMBALAJE:".$_REQUEST['IDREEMBALAJE'];        
    $ARRAYVERFOLIOPOIND = $EXIINDUSTRIAL_ADO->buscarPorReembalajeNumeroLinea($_REQUEST['IDREEMBALAJE'], $NUMEROLINEA ,$NUMEROFOLIODINDUSTRIAL);
    
    $DRINDUSTRIAL->__SET('FOLIO_DRINDUSTRIAL', $NUMEROFOLIODINDUSTRIAL);
    $DRINDUSTRIAL->__SET('FECHA_EMBALADO_DRINDUSTRIAL', $_REQUEST['FECHAEMBALADODINDUSTRIAL']);
    $DRINDUSTRIAL->__SET('KILOS_NETO_DRINDUSTRIAL', $KILOSNETO);
    $DRINDUSTRIAL->__SET('ID_ESTANDAR', $_REQUEST['EEXPORTACION']);
    $DRINDUSTRIAL->__SET('ID_FOLIO', $FOLIO); 
    $DRINDUSTRIAL->__SET('ID_PVESPECIES',  $_REQUEST['PVESPECIES']); 
    $DRINDUSTRIAL->__SET('ID_REEMBALAJE', $_REQUEST['IDREEMBALAJE']);
    $DRINDUSTRIAL->__SET('ID_PRODUCTOR', $_REQUEST['PRODUCTOR']);
    $DRINDUSTRIAL->__SET('ID_DRINDUSTRIAL', $_REQUEST['IDDPROCESOINDUSTRIAL']);
    //LLAMADA AL METODO DE REGISTRO DEL CONTROLADOR
    $DRINDUSTRIAL_ADO->actualizarDrindustrial($DRINDUSTRIAL);

    if(empty($ARRAYVERFOLIOPOIND)){       
        //UTILIZACION METODOS SET DEL MODELO
        //SETEO DE ATRIBUTOS DE LA CLASE, OBTENIDO EN EL FORMULARIO   
        $EXIINDUSTRIAL->__SET('FOLIO_EXIINDUSTRIAL',$NUMEROFOLIODINDUSTRIAL);
        $EXIINDUSTRIAL->__SET('NUMERO_LINEA', $NUMEROLINEA);        
        $EXIINDUSTRIAL->__SET('FOLIO_AUXILIAR_EXIINDUSTRIAL', $NUMEROFOLIODINDUSTRIAL); 
        $EXIINDUSTRIAL->__SET('KILOS_NETO_EXIINDUSTRIAL', $KILOSNETO);     
        $EXIINDUSTRIAL->__SET('ALIAS_FOLIO_EXIINDUSTRIAL', $FOLIOALIAS);     
        $EXIINDUSTRIAL->__SET('ID_ESTANDAR', $_REQUEST['EEXPORTACION']);
        $EXIINDUSTRIAL->__SET('ID_PRODUCTOR', $_REQUEST['PRODUCTOR']);
        $EXIINDUSTRIAL->__SET('ID_PVESPECIES', $_REQUEST['PVESPECIES']);
        $EXIINDUSTRIAL->__SET('ID_FOLIO', $FOLIO);
        $EXIINDUSTRIAL->__SET('ID_EMPRESA', $_REQUEST['EMPRESA']);
        $EXIINDUSTRIAL->__SET('ID_PLANTA', $_REQUEST['PLANTA']);
        $EXIINDUSTRIAL->__SET('ID_TEMPORADA', $_REQUEST['TEMPORADA']);
        $EXIINDUSTRIAL->__SET('ID_REEMBALAJE', $_REQUEST['IDREEMBALAJE']);
        //LLAMADA AL METODO DE REGISTRO DEL CONTROLADOR
        $EXIINDUSTRIAL_ADO->agregarExiindustrialReembalaje($EXIINDUSTRIAL);

   }

   if($ARRAYVERFOLIOPOIND){ 
    //UTILIZACION METODOS SET DEL MODELO
    //SETEO DE ATRIBUTOS DE LA CLASE, OBTENIDO EN EL FORMULARIO   
        //UTILIZACION METODOS SET DEL MODELO
        //SETEO DE ATRIBUTOS DE LA CLASE, OBTENIDO EN EL FORMULARIO   
        $EXIINDUSTRIAL->__SET('FOLIO_AUXILIAR_EXIINDUSTRIAL', $NUMEROFOLIODINDUSTRIAL);
        $EXIINDUSTRIAL->__SET('KILOS_NETO_EXIINDUSTRIAL', $KILOSNETO);  
        $EXIINDUSTRIAL->__SET('ID_ESTANDAR', $_REQUEST['EEXPORTACION']);
        $EXIINDUSTRIAL->__SET('ID_PRODUCTOR', $_REQUEST['PRODUCTOR']);
        $EXIINDUSTRIAL->__SET('ID_PVESPECIES', $_REQUEST['PVESPECIES']);
        $EXIINDUSTRIAL->__SET('ID_FOLIO', $FOLIO);
        $EXIINDUSTRIAL->__SET('ID_REEMBALAJE', $_REQUEST['IDREEMBALAJE']);
        $EXIINDUSTRIAL->__SET('ID_EXIINDUSTRIAL', $ARRAYVERFOLIOPOIND[0]['ID_EXIINDUSTRIAL']);
        $EXIINDUSTRIAL->__SET('ID_EMPRESA', $_REQUEST['EMPRESA']);
        $EXIINDUSTRIAL->__SET('ID_PLANTA', $_REQUEST['PLANTA']);
        $EXIINDUSTRIAL->__SET('ID_TEMPORADA', $_REQUEST['TEMPORADA']);
        //LLAMADA AL METODO DE REGISTRO DEL CONTROLADOR
       $EXIINDUSTRIAL_ADO->actualizarExiindustrialReembalaje($EXIINDUSTRIAL);

   }

   
    echo "
    <script type='text/javascript'>
        window.opener.refrescar()
        window.close();
        </script> 
    ";

}




//OPERACION PARA OBTENER EL ID RECEPCION Y FOLIO BASE, SOLO SE OCUPA PARA CREAR UN REGISTRO NUEVO
if (isset($_REQUEST['IDREEMBALAJE'])  && isset($_REQUEST['PRODUCTOR'])&& isset($_REQUEST['PVESPECIES']) && isset($_REQUEST['EMPRESA']) && isset($_REQUEST['PLANTA']) && isset($_REQUEST['TEMPORADA'])) {
    //ALMACENAR DATOS DE VARIABLES DE LA URL
    $IDREEMBALAJE = $_REQUEST['IDREEMBALAJE'];
    $PRODUCTOR = $_REQUEST['PRODUCTOR'];
    $PVESPECIES = $_REQUEST['PVESPECIES'];
    $EMPRESA = $_REQUEST['EMPRESA'];    
    $PLANTA = $_REQUEST['PLANTA'];    
    $TEMPORADA = $_REQUEST['TEMPORADA'];    
    $ARRAYPRODUCTOR = $PRODUCTOR_ADO->verProductor($PRODUCTOR);
    $NOMBREPRODUCTOR = $ARRAYPRODUCTOR[0]['CSG_PRODUCTOR']." - ".$ARRAYPRODUCTOR[0]['NOMBRE_PRODUCTOR'];

    
    $ARRAYPVESPECIES = $PVESPECIES_ADO->verPvespecies($PVESPECIES);
    $ARRAYVESPECIES = $VESPECIES_ADO->verVespecies($ARRAYPVESPECIES[0]['ID_VESPECIES']);
    $NOMBREVARIEDAD=$ARRAYVESPECIES[0]['NOMBRE_VESPECIES'];

    $NODATOURL="1";
}else{
    $NODATOURL="0";

}
//OBTENCION DE DATOS ENVIADOR A LA URL
//PARA OPERACIONES DE EDICION , VISUALIZACION Y CREACION
//OPERACION PARA OBTENER EL ID RECEPCION Y FOLIO BASE, SOLO SE OCUPA PARA CREAR UN REGISTRO NUEVO
if (isset($_REQUEST['IDDPROCESOINDUSTRIAL'])   && isset($_REQUEST['PRODUCTOR'])&& isset($_REQUEST['PVESPECIES']) && isset($_REQUEST['EMPRESA']) && isset($_REQUEST['PLANTA']) && isset($_REQUEST['TEMPORADA'])&& isset($_REQUEST['OP'])) {
    //ALMACENAR DATOS DE VARIABLES DE LA URL
    $IDDPROCESOINDUSTRIAL = $_REQUEST['IDDPROCESOINDUSTRIAL'];
    $PRODUCTOR = $_REQUEST['PRODUCTOR'];
    $PVESPECIES = $_REQUEST['PVESPECIES'];
    $EMPRESA = $_REQUEST['EMPRESA'];    
    $PLANTA = $_REQUEST['PLANTA'];    
    $TEMPORADA = $_REQUEST['TEMPORADA'];    
    $ARRAYPRODUCTOR = $PRODUCTOR_ADO->verProductor($PRODUCTOR);
    $NOMBREPRODUCTOR = $ARRAYPRODUCTOR[0]['CSG_PRODUCTOR']." - ".$ARRAYPRODUCTOR[0]['NOMBRE_PRODUCTOR'];

    
    $ARRAYPVESPECIES = $PVESPECIES_ADO->verPvespecies($PVESPECIES);
    $ARRAYVESPECIES = $VESPECIES_ADO->verVespecies($ARRAYPVESPECIES[0]['ID_VESPECIES']);
    $NOMBREVARIEDAD=$ARRAYVESPECIES[0]['NOMBRE_VESPECIES'];
    $NODATOURL="1";
    
    $OP = $_REQUEST['OP'];
     //IDENTIFICACIONES DE OPERACIONES

    //crear =  OBTENCION DE DATOS PARA LA CREACCION DE REGISTRO
    if ($OP == "crear") {
        $DISABLED = "";    
        $DISABLEDSTYLE = "";
        $DISABLED2 = "disabled";
        $DISABLEDSTYLE2 = "style='background-color: #eeeeee;'";
        $ARRAYDPROCESOINDUSTRIAL=$DRINDUSTRIAL_ADO->verDrindustrial($IDDPROCESOINDUSTRIAL);
        foreach ($ARRAYDPROCESOINDUSTRIAL as $r) :

            $NUMEROFOLIODINDUSTRIAL="" . $r['FOLIO_DRINDUSTRIAL'];
            $FECHAEMBALADODINDUSTRIAL="" . $r['FECHA_EMBALADO_DRINDUSTRIAL'];
            $CANTIDADENVASEDINDUSTRIAL="" . $r['KILOS_NETO_DRINDUSTRIAL'];
            
            $EEXPORTACION="" . $r['ID_ESTANDAR'];
            $PVESPECIES = "" . $r['ID_PVESPECIES'];
            $IDREEMBALAJE = "" . $r['ID_REEMBALAJE'];
            
            if(isset($r['ID_EMPRESA'])){
                $EMPRESA = "" . $r['ID_EMPRESA'];
            }else{
                $EMPRESA = "" . $_REQUEST['EMPRESA'];
            }
            if(isset($r['ID_PLANTA'])){
                $PLANTA = "" . $r['ID_PLANTA'];
            }else{
                $PLANTA = "" . $_REQUEST['PLANTA'];
            }
            if(isset($r['ID_TEMPORADA'])){
                $TEMPORADA = "" . $r['ID_TEMPORADA'];
            }else{
                $TEMPORADA = "" . $_REQUEST['TEMPORADA'];
            }
    
        endforeach;
    }
    //editar =  OBTENCION DE DATOS PARA LA EDICION DE REGISTRO
    if ($OP == "editar") {
        $DISABLED = "";    
        $DISABLEDSTYLE = "";
        $DISABLED2 = "disabled";
        $DISABLEDSTYLE2 = "style='background-color: #eeeeee;'";
        $ARRAYDPROCESOINDUSTRIAL=$DRINDUSTRIAL_ADO->verDrindustrial($IDDPROCESOINDUSTRIAL);
        foreach ($ARRAYDPROCESOINDUSTRIAL as $r) :

            $NUMEROFOLIODINDUSTRIAL="" . $r['FOLIO_DRINDUSTRIAL'];
            $FECHAEMBALADODINDUSTRIAL="" . $r['FECHA_EMBALADO_DRINDUSTRIAL'];
            $CANTIDADENVASEDINDUSTRIAL="" . $r['KILOS_NETO_DRINDUSTRIAL'];
            
            $EEXPORTACION="" . $r['ID_ESTANDAR'];
            $PVESPECIES = "" . $r['ID_PVESPECIES'];
            $IDREEMBALAJE = "" . $r['ID_REEMBALAJE'];
            
            if(isset($r['ID_EMPRESA'])){
                $EMPRESA = "" . $r['ID_EMPRESA'];
            }else{
                $EMPRESA = "" . $_REQUEST['EMPRESA'];
            }
            if(isset($r['ID_PLANTA'])){
                $PLANTA = "" . $r['ID_PLANTA'];
            }else{
                $PLANTA = "" . $_REQUEST['PLANTA'];
            }
            if(isset($r['ID_TEMPORADA'])){
                $TEMPORADA = "" . $r['ID_TEMPORADA'];
            }else{
                $TEMPORADA = "" . $_REQUEST['TEMPORADA'];
            }
    
        endforeach;
    }

    //ver =  OBTENCION DE DATOS PARA LA VISUALIZACION DEL REGISTRO
    if ($OP == "ver") {

        $DISABLED = "disabled";
        $DISABLEDSTYLE = "style='background-color: #eeeeee;'";
        $DISABLED2 = "disabled";
        $DISABLEDSTYLE2 = "style='background-color: #eeeeee;'";
        $ARRAYDPROCESOINDUSTRIAL=$DRINDUSTRIAL_ADO->verDrindustrial($IDDPROCESOINDUSTRIAL);
        foreach ($ARRAYDPROCESOINDUSTRIAL as $r) :

            $NUMEROFOLIODINDUSTRIAL="" . $r['FOLIO_DRINDUSTRIAL'];
            $FECHAEMBALADODINDUSTRIAL="" . $r['FECHA_EMBALADO_DRINDUSTRIAL'];
            $CANTIDADENVASEDINDUSTRIAL="" . $r['KILOS_NETO_DRINDUSTRIAL'];
            $EEXPORTACION="" . $r['ID_ESTANDAR'];
            $PVESPECIES = "" . $r['ID_PVESPECIES'];
            $IDREEMBALAJE = "" . $r['ID_REEMBALAJE'];

            if(isset($r['ID_EMPRESA'])){
                $EMPRESA = "" . $r['ID_EMPRESA'];
            }else{
                $EMPRESA = "" . $_REQUEST['EMPRESA'];
            }
            if(isset($r['ID_PLANTA'])){
                $PLANTA = "" . $r['ID_PLANTA'];
            }else{
                $PLANTA = "" . $_REQUEST['PLANTA'];
            }
            if(isset($r['ID_TEMPORADA'])){
                $TEMPORADA = "" . $r['ID_TEMPORADA'];
            }else{
                $TEMPORADA = "" . $_REQUEST['TEMPORADA'];
            }
    
        endforeach;
    }

}
if($_POST){

    

    $FECHAEMBALADODINDUSTRIAL= $_REQUEST['FECHAEMBALADODINDUSTRIAL'];
    $CANTIDADENVASEDINDUSTRIAL= $_REQUEST['CANTIDADENVASEDINDUSTRIAL'];
    
    $EEXPORTACION= $_REQUEST['EEXPORTACION'];
    $PVESPECIES =  $_REQUEST['PVESPECIES'];
    
    $EMPRESA = "" . $_REQUEST['EMPRESA'];
    $PLANTA = "" . $_REQUEST['PLANTA'];
    $TEMPORADA = "" . $_REQUEST['TEMPORADA'];
}
if($NODATOURL=="0"){

    header('Location: index.php');
}
?>


<!DOCTYPE html>
<html lang="es">

<head>
    <title>DETALLE PROCESO INDUSTRIAL</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="description" content="">
    <meta name="author" content="">
    <!- LLAMADA DE LOS ARCHIVOS NECESARIOS PARA DISEÑO Y FUNCIONES BASE DE LA VISTA -!>
        <?php include_once "../config/urlHead.php"; ?>
        <!- FUNCIONES BASES -!>
            <script type="text/javascript">
           function validacion() {

                FECHAEMBALADODINDUSTRIAL = document.getElementById("FECHAEMBALADODINDUSTRIAL").value;
                
                //PVESPECIES = document.getElementById("PVESPECIES").value;
                EEXPORTACION = document.getElementById("EEXPORTACION").selectedIndex;
                CANTIDADENVASEDINDUSTRIAL = document.getElementById("CANTIDADENVASEDINDUSTRIAL").value;

                document.getElementById('val_fechaembalado').innerHTML = "";                
                //document.getElementById('val_pvespecies').innerHTML = "";
                document.getElementById('val_eindustrial').innerHTML = "";
                document.getElementById('val_cantidadenvase').innerHTML = "";

                if (FECHAEMBALADODINDUSTRIAL == null || FECHAEMBALADODINDUSTRIAL.length == 0 || /^\s+$/.test(FECHAEMBALADODINDUSTRIAL)) {
                    document.form_reg_dato.FECHAEMBALADODINDUSTRIAL.focus();
                    document.form_reg_dato.FECHAEMBALADODINDUSTRIAL.style.borderColor = "#FF0000";
                    document.getElementById('val_fechaembalado').innerHTML = "NO HA INGRESADO DATOS";
                    return false;
                }
                document.form_reg_dato.FECHAEMBALADODINDUSTRIAL.style.borderColor = "#4AF575";
/*
                if (PVESPECIES == null || PVESPECIES == 0) {
                    document.form_reg_dato.PVESPECIES.focus();
                    document.form_reg_dato.PVESPECIES.style.borderColor = "#FF0000";
                    document.getElementById('val_pvespecies').innerHTML = "NO HA INGRESADO DATOS";
                    return false;
                }
                document.form_reg_dato.PVESPECIES.style.borderColor = "#4AF575";*/

                if (EEXPORTACION == null || EEXPORTACION == 0) {
                    document.form_reg_dato.EEXPORTACION.focus();
                    document.form_reg_dato.EEXPORTACION.style.borderColor = "#FF0000";
                    document.getElementById('val_eindustrial').innerHTML = "NO HA SELECIONADO ALTERNATIVA";
                    return false;
                }
                document.form_reg_dato.EEXPORTACION.style.borderColor = "#4AF575";

                if (CANTIDADENVASEDINDUSTRIAL == null || CANTIDADENVASEDINDUSTRIAL == 0) {
                    document.form_reg_dato.CANTIDADENVASEDINDUSTRIAL.focus();
                    document.form_reg_dato.CANTIDADENVASEDINDUSTRIAL.style.borderColor = "#FF0000";
                    document.getElementById('val_cantidadenvase').innerHTML = "NO HA INGRESADO DATOS";
                    return false;
                }
                document.form_reg_dato.CANTIDADENVASEDINDUSTRIAL.style.borderColor = "#4AF575";           



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
        <?php //include_once "../config/menu.php"; ?>
        <section class="content">
                <div class="box">
                    <div class="box-header with-border">
                        <!--
                                        <h4 class="box-title">Different Width</h4>
                                        -->
                    </div>

                    <form class="form" role="form" method="post" name="form_reg_dato" onsubmit="return validacion()">
                        <div class="box-body form-element">
                        
                             
                              <input type="hidden" id="EMPRESA" name="EMPRESA" value="<?php echo $EMPRESA; ?>" />
                               <input type="hidden" id="PLANTA" name="PLANTA" value="<?php echo $PLANTA; ?>" />
                               <input type="hidden" id="TEMPORADA" name="TEMPORADA" value="<?php echo $TEMPORADA; ?>" />
                               <input type="hidden" id="NUMEROFOLIODINDUSTRIAL" name="NUMEROFOLIODINDUSTRIAL" value="<?php echo $NUMEROFOLIODINDUSTRIAL; ?>" />
                               <input type="hidden" id="IDREEMBALAJE" name="IDREEMBALAJE" value="<?php echo $IDREEMBALAJE; ?>" />
                               <input type="hidden" id="IDDPROCESOINDUSTRIAL" name="IDDPROCESOINDUSTRIAL" value="<?php echo $IDDPROCESOINDUSTRIAL; ?>" />
                               <label>Folio</label>
                               <input type="text" id="NUMEROFOLIODINDUSTRIALV" name="NUMEROFOLIODINDUSTRIALV" value="<?php echo $NUMEROFOLIODINDUSTRIAL; ?>" disabled />
                    
                            <div class="row">
                           

                                <div class="col-sm-3">
                                    <div class="form-group">
                                        
                                    <label>Fecha Embalado </label>
                                        <input type="date" class="form-control" placeholder="Fecha Embalado" id="FECHAEMBALADODINDUSTRIAL" name="FECHAEMBALADODINDUSTRIAL" value="<?php echo $FECHAEMBALADODINDUSTRIAL; ?>" <?php echo $FOCUS; ?> <?php echo  $BORDER; ?> <?php echo $DISABLED; ?>   <?php echo $DISABLEDSTYLE; ?>/>
                                        <label id="val_fechaembalado" class="validacion"> </label>
                                    </div>
                                </div>   

                                <div class="col-sm-5">

                                    <div class="form-group">
                                    
                                    <label>Productor </label>
                                    <input type="text" class="form-control" placeholder="Nombre Productor" id="NOMBREPRODUCTOR" name="NOMBREPRODUCTOR" value="<?php echo $NOMBREPRODUCTOR; ?>" disabled style="background-color: #eeeeee;"/>
                                  
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                     <div class="form-group">
                                        <label>VARIEDAD</label>
                                        <input type="text" class="form-control" placeholder="Nombre Variedad" id="NOMBREVARIEDAD" name="NOMBREVARIEDAD" value="<?php echo $NOMBREVARIEDAD; ?>" disabled  style="background-color: #eeeeee;"/>                                    
                                        <label id="val_pvespecies" class="validacion"> </label>
                                    </div>
                                </div>

                            </div>

                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">                                        
                                        <label>Estandar </label>
                                            <select class="form-control select2" id="EEXPORTACION" name="EEXPORTACION" <?php echo $FOCUS; ?> <?php echo  $BORDER; ?> <?php echo $DISABLED; ?>   <?php echo $DISABLEDSTYLE; ?>>
                                                <option></option>
                                                <?php foreach ($ARRAYESTANDAR as $r) : ?>
                                                    <?php if ($ARRAYESTANDAR) {    ?>
                                                        <option value="<?php echo $r['ID_ESTANDAR']; ?>" <?php if ($EEXPORTACION == $r['ID_ESTANDAR']) {
                                                                                                                    echo "selected";
                                                                                                                } ?>> <?php echo $r['NOMBRE_ESTANDAR'] ?> </option>
                                                    <?php } else { ?>
                                                        <option>No Hay Datos Registrados  </option>
                                                    <?php } ?>
                                                <?php endforeach; ?>
                                            </select>
                                        <label id="val_eindustrial" class="validacion"> </label>
                                    </div>
                                </div>
                                
                                <div class="col-sm-6">
                                    <div class="form-group">
                                             <label>Kilos Neto</label>
                                            <input type="text" class="form-control" placeholder="Kilos Neto" id="CANTIDADENVASEDINDUSTRIAL" name="CANTIDADENVASEDINDUSTRIAL" value="<?php echo $CANTIDADENVASEDINDUSTRIAL; ?>" <?php echo $FOCUS; ?> <?php echo  $BORDER; ?> <?php echo $DISABLED; ?>   <?php echo $DISABLEDSTYLE; ?>/>
                                            <label id="val_cantidadenvase" class="validacion"> </label>
                                    </div>
                                </div>

                            </div>

                            <!-- /.row -->


                            <!-- /.box-body -->
                            <div class="box-footer">
                                <button type="button" class="btn btn-rounded btn-warning btn-outline mr-1" name="CERRAR" value="CERRAR" Onclick="cerrar();">
                                    <i class="ti-trash"></i> CERRAR
                                </button>
                                <?php if ($OP != "editar") { ?>
                                    <button type="submit" class="btn btn-rounded btn-primary btn-outline" name="GUARDAR" value="GUARDAR" <?php echo $DISABLED; ?>>
                                        <i class="ti-save-alt"></i> GUARDAR
                                    </button>
                                <?php } else { ?>
                                    <button type="submit" class="btn btn-rounded btn-primary btn-outline" name="EDITAR" value="EDITAR">
                                        <i class="ti-save-alt"></i> EDITAR
                                    </button>
                                <?php } ?>


                            </div>
                        </div>
                    </form>
                </div>


                <!--.row -->
        </section>
       
       



        <!- LLAMADA ARCHIVO DEL DISEÑO DEL FOOTER Y MENU USUARIO -!>
                <?php //include_once "../config/footer.php"; ?>
                <?php include_once "../config/menuExtra.php"; ?>
    </div>
    <!- LLAMADA URL DE ARCHIVOS DE DISEÑO Y JQUERY E OTROS -!>
        <?php include_once "../config/urlBase.php"; ?>
</body>

</html>