<?php

//BASE
include_once '../controlador/TUSUARIO_ADO.php';
include_once '../controlador/USUARIO_ADO.php';
include_once '../controlador/EMPRESA_ADO.php';
include_once '../controlador/PLANTA_ADO.php';
include_once '../controlador/TEMPORADA_ADO.php';

// OPERACION
include_once '../controlador/MERCADO_ADO.php';
include_once '../controlador/TSERVICIO_ADO.php';

include_once '../controlador/EXPORTADORA_ADO.php';
include_once '../controlador/CONSIGNATARIO_ADO.php';
include_once '../controlador/NOTIFICADOR_ADO.php';
include_once '../controlador/BROKER_ADO.php';
include_once '../controlador/RFINAL_ADO.php';

include_once '../controlador/AGCARGA_ADO.php';
include_once '../controlador/AADUANA_ADO.php';
include_once '../controlador/DFINAL_ADO.php';


include_once '../controlador/TRANSPORTE_ADO.php';
include_once '../controlador/LCARGA_ADO.php';
include_once '../controlador/LDESTINO_ADO.php';

include_once '../controlador/LAEREA_ADO.php';
include_once '../controlador/AERONAVE_ADO.php';
include_once '../controlador/ACARGA_ADO.php';
include_once '../controlador/ADESTINO_ADO.php';

include_once '../controlador/NAVIERA_ADO.php';
include_once '../controlador/PCARGA_ADO.php';
include_once '../controlador/PDESTINO_ADO.php';


include_once '../controlador/FPAGO_ADO.php';
include_once '../controlador/MVENTA_ADO.php';
include_once '../controlador/CVENTA_ADO.php';
include_once '../controlador/TFLETE_ADO.php';

include_once '../controlador/TCONTENEDOR_ADO.php';
include_once '../controlador/ATMOSFERA_ADO.php';
include_once '../controlador/PAIS_ADO.php';
include_once '../controlador/SEGURO_ADO.php';

include_once '../controlador/EEXPORTACION_ADO.php';
include_once '../controlador/ESPECIES_ADO.php';
include_once '../controlador/VESPECIES_ADO.php';
include_once '../controlador/TCALIBRE_ADO.php';
include_once '../controlador/TMONEDA_ADO.php';


include_once '../controlador/PRODUCTOR_ADO.php';
include_once '../controlador/DESPACHOEX_ADO.php';



include_once '../controlador/ICARGA_ADO.php';
include_once '../controlador/DICARGA_ADO.php';

//INCIALIZAR LAS VARIBLES
//INICIALIZAR CONTROLADOR

$USUARIO_ADO = new USUARIO_ADO();
$EMPRESA_ADO =  new EMPRESA_ADO();
$PLANTA_ADO =  new PLANTA_ADO();
$TEMPORADA_ADO =  new TEMPORADA_ADO();


$MERCADO_ADO =  new MERCADO_ADO();
$TSERVICIO_ADO =  new TSERVICIO_ADO();
$EXPORTADORA_ADO =  new EXPORTADORA_ADO();
$CONSIGNATARIO_ADO =  new CONSIGNATARIO_ADO();
$NOTIFICADOR_ADO =  new NOTIFICADOR_ADO();
$BROKER_ADO =  new BROKER_ADO();
$RFINAL_ADO =  new RFINAL_ADO();
$AGCARGA_ADO =  new AGCARGA_ADO();
$AADUANA_ADO =  new AADUANA_ADO();
$DFINAL_ADO =  new DFINAL_ADO();
$TRANSPORTE_ADO =  new TRANSPORTE_ADO();
$LCARGA_ADO =  new LCARGA_ADO();
$LDESTINO_ADO =  new LDESTINO_ADO();
$LAEREA_ADO =  new LAEREA_ADO();
$AERONAVE_ADO =  new AERONAVE_ADO();
$ACARGA_ADO =  new ACARGA_ADO();
$ADESTINO_ADO =  new ADESTINO_ADO();
$NAVIERA_ADO =  new NAVIERA_ADO();
$PCARGA_ADO =  new PCARGA_ADO();
$PDESTINO_ADO =  new PDESTINO_ADO();
$FPAGO_ADO =  new FPAGO_ADO();
$MVENTA_ADO =  new MVENTA_ADO();
$CVENTA_ADO =  new CVENTA_ADO();
$TFLETE_ADO =  new TFLETE_ADO();
$TCONTENEDOR_ADO =  new TCONTENEDOR_ADO();
$ATMOSFERA_ADO =  new ATMOSFERA_ADO();
$SEGURO_ADO =  new SEGURO_ADO();

$EEXPORTACION_ADO = new EEXPORTACION_ADO();
$VESPECIES_ADO =  new VESPECIES_ADO();
$ESPECIES_ADO =  new ESPECIES_ADO();
$TCALIBRE_ADO =  new TCALIBRE_ADO();
$PAIS_ADO =  new PAIS_ADO();
$TCALIBRE_ADO = new TCALIBRE_ADO();
$TMONEDA_ADO = new TMONEDA_ADO();

$PRODUCTOR_ADO = new PRODUCTOR_ADO();
$DESPACHOEX_ADO = new DESPACHOEX_ADO();

$ICARGA_ADO =  new ICARGA_ADO();
$DICARGA_ADO =  new DICARGA_ADO();
//INCIALIZAR VARIBALES A OCUPAR PARA LA FUNCIONALIDAD

$NUMERO = "";
$NUMEROVER = "";
$FECHAINGRESO = "";
$FECHAMODIFCIACION = "";
$IDINOTA = "";
$FECHAINOTA = "";
$TNOTA = "";
$OBSERVACIONINOTA = "";
$ICARGAD="";
$BOOKINGINSTRUCTIVO = "";
$BOLAWBCRTINSTRUCTIVO="";
$CONSIGNATARIO = "";
$FECHAETD = "";
$FECHAETA = "";
$TEMBARQUE = "";
$TRANSPORTE = "";
$LCARGA = "";
$LDESTINO = "";
$LAEREA = "";
$ACARGA = "";
$ADESTINO = "";
$NAVIERA = "";
$PCARGA = "";
$PDESTINO = "";
$FPAGO = "";
$CVENTA = "";
$ESTADO = "";
$ESTANDAR = "";
$ESPECIES = "";
$VESPECIES = "";
$ENVASE = "";
$PRECIOUS = "";
$CALIBRE = "";
$EMPRESA = "";
$PLANTA = "";
$TEMPORADA = "";
$TOTALPRECIOUSNUEVO=0;

//INICIALIZAR ARREGLOS
$ARRAYEMPRESA = "";
$ARRAYPLANTA = "";
$ARRAYTEMPORADA = "";
$ARRAYFECHAACTUAL = "";
$ARRAYICARGA = "";
$ARRAYDICARGA = "";
$ARRAYCONSIGNATARIO = "";
$ARRAYTRANSPORTE = "";
$ARRAYLCARGA = "";
$ARRAYLDESTINO = "";
$ARRAYLAEREA = "";
$ARRAYACARGA = "";
$ARRAYADESTINO = "";
$ARRAYNAVIERA = "";
$ARRAYPCARGA = "";
$ARRAYPDESTINO = "";
$ARRAYFPAGO = "";
$ARRAYMVENTA = "";
$ARRAYICARGA2 = "";
$ARRAYPAIS = "";
$ARRAYVERPLANTA = "";
$ARRAYVERDCARGA = "";
$ARRAYSEGURO = "";
$ARRAYPRODUCTOR = "";
$ARRAYDCARGA = "";
$ARRAYCALIBRE = "";
$ARRAYNUMERO = "";
$ARRAYVERNOTADCNC="";


if (isset($_REQUEST['usuario'])) {
  $USUARIO = $_REQUEST['usuario'];
  $ARRAYUSUARIO = $USUARIO_ADO->ObtenerNombreCompleto($USUARIO);
  $NOMBRE = $ARRAYUSUARIO[0]["NOMBRE_COMPLETO"];
}


if (isset($_REQUEST['parametro'])) {
  $IDOP = $_REQUEST['parametro'];
}


  
$ARRAYICARGA=$ICARGA_ADO->verIcarga2($IDOP);
if($ARRAYICARGA){
      
    $ARRAYDCARGA = $DICARGA_ADO->buscarPorIcarga2($IDOP);
    $ARRAYDCARGATOTAL2 = $DICARGA_ADO->totalesPorIcarga2($IDOP);
    $ARRAYCONSOLIDADODESPACHO =  $DESPACHOEX_ADO->consolidadoDespachoExistencia2($IDOP);
    $ARRAYCONSOLIDADODESPACHOTOTAL =  $DESPACHOEX_ADO->obtenerTotalconsolidadoDespachoExistencia2($IDOP);

    $TOTALENVASECONSOLIADO=$ARRAYCONSOLIDADODESPACHOTOTAL[0]['ENVASE'];
    $TOTALNETOCONSOLIADO=$ARRAYCONSOLIDADODESPACHOTOTAL[0]['NETO'];
    $TOTALBRUTOCONSOLIADO=$ARRAYCONSOLIDADODESPACHOTOTAL[0]['BRUTO'];

    
    $ARRAYDESPACHOEX=$DESPACHOEX_ADO->buscarDespachoExPorIcarga($IDOP);
    if($ARRAYDESPACHOEX){
      $FECHADESPACHOEX=$ARRAYDESPACHOEX[0]['FECHA'];
      $NUMEROCONTENEDOR=$ARRAYDESPACHOEX[0]['NUMERO_CONTENEDOR_DESPACHOEX'];
      $NUMEROSELLO=$ARRAYDESPACHOEX[0]['NUMERO_SELLO_DESPACHOEX'];
      $ARRAYVERPLANTA = $PLANTA_ADO->verPlanta($ARRAYDESPACHOEX[0]['ID_PLANTA']);
      if($ARRAYVERPLANTA){
        $LUGARDECARGA=$ARRAYVERPLANTA[0]["NOMBRE_PLANTA"];
        $FDADESPACHOEX=$ARRAYVERPLANTA[0]["FDA_PLANTA"];
      }else{
        $FECHADESPACHOEX="Sin Datos";
        $LUGARDECARGA="Sin Datos";
      }
    }else{
      $FDADESPACHOEX="Sin Datos";
      $NUMEROCONTENEDOR="Sin Datos";
      $NUMEROSELLO="Sin Datos";
      $FECHADESPACHOEX="Sin Datos";
      $LUGARDECARGA="Sin Datos";
    }
    
      $TOTALENVASEV = $ARRAYDCARGATOTAL2[0]['ENVASE'];
      $TOTALNETOV = $ARRAYDCARGATOTAL2[0]['NETO'];
      $TOTALBRUTOV = $ARRAYDCARGATOTAL2[0]['BRUTO'];
      $TOTALUSV = $ARRAYDCARGATOTAL2[0]['TOTALUS'];
      
      $NUMEROICARGA=$ARRAYICARGA[0]["NUMERO_ICARGA"];
      $NUMEROIREFERENCIA=$ARRAYICARGA[0]["NREFERENCIA_ICARGA"];
      $FECHA=$ARRAYICARGA[0]["FECHA"];
      $BOOKINGINSTRUCTIVO = $ARRAYICARGA[0]['BOOKING_ICARGA'];
      $TEMBARQUE = $ARRAYICARGA[0]['TEMBARQUE_ICARGA'];
      $FECHAETD = $ARRAYICARGA[0]['FECHAETD'];
      $FECHAETA = $ARRAYICARGA[0]['FECHAETA'];    
      $BOLAWBCRTINSTRUCTIVO = $ARRAYICARGA[0]['BOLAWBCRT_ICARGA'];


      $TINSTRUCTIVO = $ARRAYICARGA[0]['T_ICARGA'];
      $O2INSTRUCTIVO = $ARRAYICARGA[0]['O2_ICARGA'];
      $CO2INSTRUCTIVO = $ARRAYICARGA[0]['C02_ICARGA'];
      $ALAMPAINSTRUCTIVO = $ARRAYICARGA[0]['ALAMPA_ICARGA'];

      $OBSERVACIONES = $ARRAYICARGA[0]['OBSERVACION_ICARGA'];
      if($ARRAYICARGA[0]['FUMIGADO_ICARGA']==1){
        $FUMIGADO="Si";
      }else if($ARRAYICARGA[0]['FUMIGADO_ICARGA']==2){
        $FUMIGADO="No";
      }else{
        $FUMIGADO="Sin Datos";
      }

      $ESTADO = $ARRAYICARGA[0]['ESTADO'];
      if ($ARRAYICARGA[0]['ESTADO'] == 1) {
        $ESTADO = "Abierto";
      }else if ($ARRAYICARGA[0]['ESTADO'] == 0) {
        $ESTADO = "Cerrado";
      }else{
        $ESTADO="Sin Datos";
      }  
      $ARRAYRFINAL=$RFINAL_ADO->verRfinal($ARRAYICARGA[0]["ID_RFINAL"]);
      if($ARRAYRFINAL){
          $NOMBRERFINAL=$ARRAYRFINAL[0]["NOMBRE_RFINAL"];
      }else{
          $NOMBRERFINAL="Sin Datos";
      }
      $ARRYANOTIFICADOR=$NOTIFICADOR_ADO->verNotificador($ARRAYICARGA[0]['ID_NOTIFICADOR']);   
      if($ARRYANOTIFICADOR){
        $NOMBRENOTIFICADOR=$ARRYANOTIFICADOR[0]["NOMBRE_NOTIFICADOR"];
        $DIRECCIONNOTIFICADOR=$ARRYANOTIFICADOR[0]["DIRECCION_NOTIFICADOR"];
        $EMAIL1NOTIFICADOR=$ARRYANOTIFICADOR[0]["EMAIL1_NOTIFICADOR"];
      }else{
        $NOMBRENOTIFICADOR="Sin Datos";
        $DIRECCIONNOTIFICADOR="Sin Datos";
        $EMAIL1NOTIFICADOR="Sin Datos";
      }
      $ARRAYCONSIGNATARIO = $CONSIGNATARIO_ADO->verConsignatorio($ARRAYICARGA[0]['ID_CONSIGNATARIO']);            
      if($ARRAYCONSIGNATARIO){
        $NOMBRECONSIGNATARIO=$ARRAYCONSIGNATARIO[0]["NOMBRE_CONSIGNATARIO"];
        $DIRECCIONCONSIGNATARIO=$ARRAYCONSIGNATARIO[0]["DIRECCION_CONSIGNATARIO"];
        $EMAIL1CONSIGNATARIO=$ARRAYCONSIGNATARIO[0]["EMAIL1_CONSIGNATARIO"];
      }else{
        $NOMBRECONSIGNATARIO="Sin Datos";
        $DIRECCIONCONSIGNATARIO="Sin Datos";
        $EMAIL1CONSIGNATARIO="Sin Datos";
      }
      $ARRAYFPAGO = $FPAGO_ADO->verFpago(  $ARRAYICARGA[0]['ID_FPAGO']);         
      if($ARRAYFPAGO){
        $NOMBREFPAGO=$ARRAYFPAGO[0]["NOMBRE_FPAGO"];
      }else{
        $NOMBREFPAGO="Sin Datos";
      }
      $ARRAYMVENTA = $MVENTA_ADO->verMventa( $ARRAYICARGA[0]['ID_MVENTA']);        
      if($ARRAYMVENTA){
        $NOMBREMVENTA=$ARRAYMVENTA[0]["NOMBRE_MVENTA"];
      }else{
        $NOMBREMVENTA="Sin Datos";
      }
      $ARRAYCVENTA = $CVENTA_ADO->verCventa( $ARRAYICARGA[0]['ID_CVENTA']);        
      if($ARRAYMVENTA){
        $NOMBRECVENTA=$ARRAYCVENTA[0]["NOMBRE_CVENTA"];
      }else{
        $NOMBRECVENTA="Sin Datos";
      }
      $ARRAYTFLETE= $TFLETE_ADO->verTflete( $ARRAYICARGA[0]['ID_TFLETE']);        
      if($ARRAYTFLETE){
        $NOMBRETFLETE=$ARRAYTFLETE[0]["NOMBRE_TFLETE"];
      }else{
        $NOMBRETFLETE="Sin Datos";
      }      
      $ARRAYATMOSFERA =$ATMOSFERA_ADO->verAtmosfera( $ARRAYICARGA[0]['ID_ATMOSFERA']);
      if($ARRAYATMOSFERA){
        $NOMBREATMOSFERA=$ARRAYATMOSFERA[0]["NOMBRE_ATMOSFERA"];
      }else{
        $NOMBREATMOSFERA="Sin Datos";
      }
      $ARRAYTCONTENEDOR =$TCONTENEDOR_ADO->verTcontenedor( $ARRAYICARGA[0]['ID_TCONTENEDOR']);
      if($ARRAYTCONTENEDOR){
        $NOMBRETCONTENEDOR=$ARRAYTCONTENEDOR[0]["NOMBRE_TCONTENEDOR"];
      }else{
        $NOMBRETCONTENEDOR="Sin Datos";
      }      
      $ARRAYPAIS =$PAIS_ADO->verPais( $ARRAYICARGA[0]['ID_PAIS']);
      if($ARRAYPAIS){
        $NOMBREPAIS=$ARRAYPAIS[0]["NOMBRE_PAIS"];
      }else{
        $NOMBREPAIS="Sin Datos";
      }
      $ARRAYEXPORTADORA = $EXPORTADORA_ADO->verExportadora( $ARRAYICARGA[0]['ID_EXPPORTADORA']);
      if($ARRAYEXPORTADORA){
        $RUTEXPPORTADORA=$ARRAYEXPORTADORA[0]["RUT_EXPORTADORA"]."-".$ARRAYEXPORTADORA[0]["DV_EXPORTADORA"];
        $NOMBREEXPPORTADORA=$ARRAYEXPORTADORA[0]["NOMBRE_EXPORTADORA"];
      }else{
        $RUTEXPPORTADORA="Sin Datos";
        $NOMBREEXPPORTADORA="Sin Datos";
      }
      $ARRAYDFINAL =$DFINAL_ADO->verDfinal( $ARRAYICARGA[0]['ID_DFINAL']);
      if($ARRAYDFINAL){
        $NOMBREDFINAL=$ARRAYDFINAL[0]["NOMBRE_DFINAL"];
      }else{
        $NOMBREDFINAL="Sin Datos";
      }

    if($TEMBARQUE){
          if ($TEMBARQUE == "1") {
              $NOMBRETEMBARQUE="Terrestre";
              $CRT=$ARRAYICARGA[0]['CRT_ICARGA'];
              $ARRAYTRANSPORTE =$TRANSPORTE_ADO->verTransporte( $ARRAYICARGA[0]['ID_TRANSPORTE']);        
              if($ARRAYTRANSPORTE){
                $NOMBRETRANSPORTE=$ARRAYTRANSPORTE[0]["NOMBRE_TRANSPORTE"];
              }else{
                $NOMBRETRANSPORTE="Sin Datos";
              }            
              $ARRAYLCARGA =$LCARGA_ADO->verLcarga(  $ARRAYICARGA[0]['ID_LCARGA']);       
              if($ARRAYLCARGA){
                $NOMBREORIGEN=$ARRAYLCARGA[0]["NOMBRE_LCARGA"];
              }else{
                $NOMBREORIGEN="Sin Datos";
              }
              $ARRAYLDESTINO =$LDESTINO_ADO->verLdestino( $ARRAYICARGA[0]['ID_LDESTINO']);     
              if($ARRAYLDESTINO){
                $NOMBREDESTINO=$ARRAYLDESTINO[0]["NOMBRE_LDESTINO"];
              }else{
                $NOMBREDESTINO="Sin Datos";
              }
          }
          if ($TEMBARQUE == "2") {
              $NOMBRETEMBARQUE="Aereo";
              $NAVE=$ARRAYICARGA[0]['NAVE_ICARGA'];
              $NVIAJE = $ARRAYICARGA[0]['NVIAJE_ICARGA'];
             
              $ARRAYLAEREA = $LAEREA_ADO->verLaerea( $ARRAYICARGA[0]['ID_LAREA']);      
              if($ARRAYLAEREA){
                $NOMBRETRANSPORTE=$ARRAYLAEREA[0]["NOMBRE_LAEREA"];
              }else{
                $NOMBRETRANSPORTE="Sin Datos";
              }            
              $ARRAYACARGA =$ACARGA_ADO->verAcarga(  $ARRAYICARGA[0]['ID_ACARGA']);  
              if($ARRAYACARGA){
                $NOMBREORIGEN=$ARRAYACARGA[0]["NOMBRE_ACARGA"];
              }else{
                $NOMBREORIGEN="Sin Datos";
              }
              $ARRAYADESTINO =$ADESTINO_ADO->verAdestino( $ARRAYICARGA[0]['ID_ADESTINO']);  
              if($ARRAYADESTINO){
                $NOMBREDESTINO=$ARRAYADESTINO[0]["NOMBRE_ADESTINO"];
              }else{
                $NOMBREDESTINO="Sin Datos";
              }
          }
          if ($TEMBARQUE == "3") {
              $NOMBRETEMBARQUE="Maritimo";
              $NAVE  = $ARRAYICARGA[0]['NAVE_ICARGA'];
              $NVIAJE = $ARRAYICARGA[0]['NVIAJE_ICARGA'];
              $FECHASTACKING = $ARRAYICARGA[0]['FECHAESTACKING'];
              $ARRAYNAVIERA =$NAVIERA_ADO->verNaviera( $ARRAYICARGA[0]['ID_NAVIERA']);   
              if($ARRAYNAVIERA){
                $NOMBRETRANSPORTE=$ARRAYNAVIERA[0]["NOMBRE_NAVIERA"];
              }else{
                $NOMBRETRANSPORTE="Sin Datos";
              }            
              $ARRAYPCARGA =$PCARGA_ADO->verPcarga(  $ARRAYICARGA[0]['ID_PCARGA']);
              if($ARRAYPCARGA){
                $NOMBREORIGEN=$ARRAYPCARGA[0]["NOMBRE_PCARGA"];
              }else{
                $NOMBREORIGEN="Sin Datos";
              }
              $ARRAYPDESTINO =$PDESTINO_ADO->verPdestino( $ARRAYICARGA[0]['ID_PDESTINO']);
              if($ARRAYPDESTINO){
                $NOMBREDESTINO=$ARRAYPDESTINO[0]["NOMBRE_PDESTINO"];
              }else{
                $NOMBREDESTINO="Sin Datos";
              }
          }
    }      
  
    $ARRAYAGCARGA = $AGCARGA_ADO->verAgcarga(  $ARRAYICARGA[0]['ID_AGCARGA']); 
    if($ARRAYAGCARGA){
      $RUTAGCARGA=$ARRAYAGCARGA[0]["RUT_AGCARGA"]."-".$ARRAYAGCARGA[0]["DV_AGCARGA"];
      $NOMBREAGCARGA=$ARRAYAGCARGA[0]["NOMBRE_AGCARGA"];
      $DIRECCIONAGCARGA=$ARRAYAGCARGA[0]["DIRECCION_AGCARGA"];
      $CONTACTOAGCARGA=$ARRAYAGCARGA[0]["CONTACTO_AGCARGA"];
      $EMAILAGCARGA=$ARRAYAGCARGA[0]["EMAIL_AGCARGA"];
      $TELEFONOAGCARGA=$ARRAYAGCARGA[0]["TELEFONO_AGCARGA"];
    }else{
      $RUTAGCARGA="Sin Datos";
      $NOMBREAGCARGA="Sin Datos";
      $DIRECCIONAGCARGA="Sin Datos";
      $CONTACTOAGCARGA="Sin Datos";
      $EMAILAGCARGA="Sin Datos";
      $TELEFONOAGCARGA="Sin Datos";
    } 
    $ARRAYAADUANA = $AADUANA_ADO->verAaduana( $ARRAYICARGA[0]['ID_AADUANA']);
    if($ARRAYAADUANA){
      $RUTAADUANA=$ARRAYAADUANA[0]["RUT_AADUANA"]."-".$ARRAYAADUANA[0]["DV_AADUANA"];
      $NOMBREAADUANA=$ARRAYAADUANA[0]["NOMBRE_AADUANA"];
      $DIRECCIONAADUANA=$ARRAYAADUANA[0]["DIRECCION_AADUANA"];
      $CONTACTOAADUANA=$ARRAYAADUANA[0]["CONTACTO_AADUANA"];
      $EMAILAADUANA=$ARRAYAADUANA[0]["EMAIL_AADUANA"];
      $TELEFONOAADUANA=$ARRAYAADUANA[0]["TELEFONO_AADUANA"];
    }else{
      $RUTAADUANA="Sin Datos";
      $NOMBREAADUANA="Sin Datos";
      $DIRECCIONAADUANA="Sin Datos";
      $CONTACTOAADUANA="Sin Datos";
      $EMAILAADUANA="Sin Datos";
      $TELEFONOAADUANA="Sin Datos";
    }



  $ARRAYEMPRESA = $EMPRESA_ADO->verEmpresa($ARRAYICARGA[0]['ID_EMPRESA']);
  if($ARRAYEMPRESA){
    $NOMBREEMPRESA=$ARRAYEMPRESA[0]["NOMBRE_EMPRESA"];
    $RAZONSOCIALEMPRESA = $ARRAYEMPRESA[0]["RAZON_SOCIAL_EMPRESA"];
    $RUTEMPRESA=$ARRAYEMPRESA[0]["RUT_EMPRESA"]."-".$ARRAYEMPRESA[0]["DV_EMPRESA"];
    $DIRECCIONEMPRESA=$ARRAYEMPRESA[0]["DIRECCION_EMPRESA"];
  }else{    
    $NOMBREEMPRESA="Sin Datos";
    $RAZONSOCIALEMPRESA="Sin Datos";
    $RUTEMPRESA="Sin Datos";
    $DIRECCIONEMPRESA="Sin Datos";
  }
  $ARRAYTEMPORADA = $TEMPORADA_ADO->verTemporada($ARRAYICARGA[0]['ID_TEMPORADA']);  
  if($ARRAYTEMPORADA){
    $NOMBRETEMPORADA=$ARRAYTEMPORADA[0]["NOMBRE_TEMPORADA"];
  }else{
    $NOMBRETEMPORADA="Sin Datos";
  }

} 






//OBTENCION DE LA FECHA
date_default_timezone_set('America/Santiago');
//SE LE PASA LA FECHA ACTUAL A UN ARREGLO
$ARRAYFECHADOCUMENTO = getdate();

//SE OBTIENE INFORMACION RELACIONADA CON LA HORA
$HORA = "" . $ARRAYFECHADOCUMENTO['hours'];
$MINUTO = "" . $ARRAYFECHADOCUMENTO['minutes'];
$SEGUNDO = "" . $ARRAYFECHADOCUMENTO['seconds'];
//EN CASO DE VALORES MENOS A 2 LENGHT, SE LE CONCATENA UN 0
if ($MINUTO < 10) {
  $MINUTO = "0" . $MINUTO;
}
if ($SEGUNDO < 10) {
  $SEGUNDO = "0" . $SEGUNDO;
}

// SE JUNTA LA INFORMAICON DE LA HORA Y SE LE DA UN FORMATO
$HORAFINAL = $HORA . "" . $MINUTO . "" . $SEGUNDO;
$HORAFINAL2 = $HORA . ":" . $MINUTO . ":" . $SEGUNDO;

//SE OBTIENE INFORMACION RELACIONADA CON LA FECHA
$DIA = "" . $ARRAYFECHADOCUMENTO['mday'];

$MES = "" . $ARRAYFECHADOCUMENTO['mon'];
$ANO = "" . $ARRAYFECHADOCUMENTO['year'];
$NOMBREMES = "" . $ARRAYFECHADOCUMENTO['month'];
$NOMBREDIA = "" . $ARRAYFECHADOCUMENTO['weekday'];
//EN CASO DE VALORES MENOS A 2 LENGHT, SE LE CONCATENA UN 0
if ($DIA < 10) {
  $DIA = "0" . $DIA;
}
//PARA TRAUDCIR EL MES AL ESPAÑOL
$MESESNOMBRES = array(
  "January" => "Enero",
  "February" => "Febrero",
  "March" => "Marzo",
  "April" => "Abril",
  "May" => "Mayo",
  "June" => "Junio",
  "July" => "Julio",
  "August" => "Agosto",
  "September" => "Septiembre",
  "October" => "Octubre",
  "November" => "Noviembre",
  "December" => "Diciembre"
);
//PARA TRAUDCIR EL DIA AL ESPAÑOL
$DIASNOMBRES = array(
  "Monday" => "Lunes",
  "Tuesday" => "Martes",
  "Wednesday" => "Miércoles",
  "Thursday" => "Jueves",
  "Friday" => "Viernes",
  "Saturday" => "Sábado",
  "Sunday" => "Domingo"
);

$NOMBREDIA = $DIASNOMBRES[$NOMBREDIA];
$NOMBREMES = $MESESNOMBRES[$NOMBREMES];
// SE JUNTA LA INFORMAICON DE LA FECHA Y SE LE DA UN FORMATO
$FECHANORMAL = $DIA . "" . $MES . "" . $ANO;
$FECHANORMA2 = $DIA . "/" . $MES . "/" . $ANO;
$FECHANOMBRE = $NOMBREDIA . ", " . $DIA . " de " . $NOMBREMES . " del " . $ANO;



$html = '
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Invoice</title>
  </head>
  <body>
    <header class="clearfix">
    <table>
      <tr>
        <td class="color2 left">
          <div id="logo">
              <img src="../vista/img/logo2.png" width="150px" height="45px"/>
          </div>
        </td>
        <td class="color2 left" width="50%">
          <b>'.$RAZONSOCIALEMPRESA.'</b> <br>
          '.$RUTEMPRESA.' <br>
          '.$DIRECCIONEMPRESA.' <br>          
        </td>
        <td class="color2 right">
          <div id="company">
            <h2 class="name">Soc. Agrícola El Álamo Ltda.</h2>
            <div>Camino a Antuco, Kilómetro N°13</div>
            <div>Los Ángeles, Chile.</div>
            <div><a href="mailto:ti@fvolcan.com">ti@fvolcan.cl</a></div>
          </div>
        </td>
      </tr>
    </table>    
    </header>
    <main>
    
    <div class="titulo bcolor" >
      <div class="f20 titulo"  style="text-align: left; font-weight: bold;">  INVOICE  </div>    
      <div class="f15 titulo"  style="text-align: right;">  <b>  Reference Number: ' . $NUMEROIREFERENCIA . '   </b>  </div>      
    </div>   

    <br><br><br>





<div id="details" class="clearfix">
  <div id="client">
    <div class="address"> Date Instructive : '.$FECHA.'  </div>
    <div class="address"> Consigne : '.$NOMBRECONSIGNATARIO.'  </div>
    <div class="address"> address Consigne : '.$DIRECCIONCONSIGNATARIO.'  </div>
    <div class="address"> Email Consigne : '.$EMAIL1CONSIGNATARIO.'  </div>
    <div class="address">Sales method:  '.$NOMBREMVENTA.' </div>
    <div class="address">Incoterm:   '.$NOMBRECVENTA.'</div>
    <div class="address"> BL/AWB/CRT: : '.$BOLAWBCRTINSTRUCTIVO.'  </div>
  </div>
  <div id="client"> 
    ';
    if ($TEMBARQUE == "1") {
      $html = $html . '
        <div class="address">Date ETD:   '.$FECHAETD.'</div>  
        <div class="address">Date ETA:  '.$FECHAETA.' </div>
        <div class="address"> container number:: : '.$NUMEROCONTENEDOR.'  </div>
        <div class="address"> transport : '.$NOMBRETRANSPORTE.'  </div>
        <div class="address"> Place of Shipment : '.$NOMBREORIGEN.'  </div>
        <div class="address"> Place of Destination : '.$NOMBREDESTINO.'  </div>
      ';
    }
    if ($TEMBARQUE == "2") {
        $html = $html . '
    
        <div class="address">Date ETD:   '.$FECHAETD.'</div>  
        <div class="address">Date ETA:  '.$FECHAETA.' </div>
        <div class="address"> container number:: : '.$NUMEROCONTENEDOR.'  </div>
        <div class="address"> Airplane : '.$NOMBRETRANSPORTE.'  </div>
        <div class="address"> Airport of Shipment : '.$NOMBREORIGEN.'  </div>
        <div class="address"> Airport of Destination : '.$NOMBREDESTINO.'  </div>
    
        ';
     }
    if ($TEMBARQUE == "3") {
        $html = $html . '
    
        <div class="address">Date ETD:   '.$FECHAETD.'</div>  
        <div class="address">Date ETA:  '.$FECHAETA.' </div>
        <div class="address"> container number:: : '.$NUMEROCONTENEDOR.'  </div>
        <div class="address"> Vessel : '.$NOMBRETRANSPORTE.'  </div>
        <div class="address"> Port of Shipment : '.$NOMBREORIGEN.'  </div>
        <div class="address"> Port of Destination : '.$NOMBREDESTINO.'  </div>
    
        ';
    }    

$html = $html . '
        </div>          
      </div>
        ';

        $html = $html . '        
        <table border="0" cellspacing="0" cellpadding="0">
          <thead>
            <tr>
              <th colspan="10" class="center">DETAIL.</th>
            </tr>
            <tr>
              <th class="color center ">Amount Boxes</th>
              <th class="color center ">Description of goods </th>
              <th class="color center ">Net Weight </th>
              <th class="color center ">Gross Weight </th>
              <th class="color center ">Net Kilo </th>
              <th class="color center ">Gross Kilo </th>
              <th class="color center ">Type of currency </th>
              <th class="color center ">Price</th>
              <th class="color center ">Total</th>    
            </tr>
          </thead>
           <tbody>
          ';
          foreach ($ARRAYDCARGA as $s) :

            $ARRAYEEXPORTACION = $EEXPORTACION_ADO->verEstandar($s['ID_ESTANDAR']);
            if ($ARRAYEEXPORTACION) {
            $CODIGOESTANDAR = $ARRAYEEXPORTACION[0]['CODIGO_ESTANDAR'];
            $NOMBREESTANTAR = $ARRAYEEXPORTACION[0]['NOMBRE_ESTANDAR'];
            $NETOESTANTAR = $ARRAYEEXPORTACION[0]['PESO_NETO_ESTANDAR'];
            $BRUTOESTANTAR = $ARRAYEEXPORTACION[0]['PESO_BRUTO_ESTANDAR'];
            } else {
            $CODIGOESTANDAR = "Sin Datos";
            $NOMBREESTANTAR = "Sin Datos";
            $NETOESTANTAR = "Sin Datos";
            $BRUTOESTANTAR = "Sin Datos";
            }
            
            $ARRAYCALIBRE = $TCALIBRE_ADO->verCalibre($s['ID_TCALIBRE']);
            if ($ARRAYCALIBRE) {
            $NOMBRECALIBRE = $ARRAYCALIBRE[0]['NOMBRE_TCALIBRE'];
            } else {
            $NOMBRECALIBRE = "Sin Datos";
            }
            $ARRAYTMONEDA = $TMONEDA_ADO->verTmoneda($s['ID_TMONEDA']);
            if ($ARRAYTMONEDA) {
            $NOMBRETMONEDA = $ARRAYTMONEDA[0]['NOMBRE_TMONEDA'];
            } else {
            $NOMBRETMONEDA = "Sin Datos";
            }
            
            $html = $html . '              
              <tr class="">
                  <td class="center">'.$s['ENVASE'].'</td>
                    <td class="center">'.$NOMBREESTANTAR.'</td>
                    <td class="center">'.number_format($NETOESTANTAR, 2, ",", ".").'</td>
                    <td class="center">'.number_format($BRUTOESTANTAR, 2, ",", ".").'</td>
                    <td class="center">'.$s['NETO'].'</td>
                    <td class="center">'.$s['BRUTO'].'</td>
                    <td class="center">'.$NOMBRETMONEDA.'</td>
                    <td class="center">'.$s['US'].'</td>
                    <td class="center">'.$s['TOTALUS'].'</td>
              </tr>
            ';
            endforeach;
            $html = $html . '
                    
                        <tr class="bt">
                          <th class="color center">'.$TOTALENVASEV.'</th>
                          <td class="color center">&nbsp;</td>
                          <td class="color center">&nbsp;</td>
                          <th class="color right">Sub total</td>
                          <th class="color center">'.$TOTALNETOV.'</th>
                          <th class="color center">'.$TOTALBRUTOV.'</th>
                          <td class="color center">&nbsp;</td>
                          <td class="color center">&nbsp;</td>
                          <th class="color center">'.$TOTALUSV.'</th>
                        </tr>
                    ';
            
            
            

$html = $html . '
    
  </tbody>
  </table>
<br><br><br><br><br>
  <div id="details" class="clearfix">

        <div id="client">
          <div class="address"><b>observations</b></div>
          <div class="address">  ' . $OBSERVACIONES . ' </div>
        </div>
        
        <div id="invoice">
          <div class="date "><b><hr></b></div>
          <div class="date  center"> Firm responsible</div>
          <div class="date  center">  ' . $NOMBRERESPONSABLE . '</div>
        </div>
      </div>

    </main>
  </body>
</html>

';







//CREACION NOMBRE DEL ARCHIVO
$NOMBREARCHIVO = "reportInvoice_";
$FECHADOCUMENTO = $FECHANORMAL . "_" . $HORAFINAL;
$TIPODOCUMENTO = "Report";
$FORMATO = ".pdf";
$NOMBREARCHIVOFINAL = $NOMBREARCHIVO . $FECHADOCUMENTO . $FORMATO;

//CONFIGURACIOND DEL DOCUMENTO
$TIPOPAPEL = "LETTER";
$ORIENTACION = "P";
$LENGUAJE = "ES";
$UNICODE = "true";
$ENCODING = "UTF-8";

//DETALLE DEL CREADOR DEL INFORME
$TIPOINFORME = "Report Invoice";
$CREADOR = "Usuario";
$AUTOR = "Usuario";
$ASUNTO = "Report";

//API DE GENERACION DE PDF
require_once '../../api/mpdf/mpdf/autoload.php';
//$PDF = new \Mpdf\Mpdf();W
$PDF = new \Mpdf\Mpdf(['format' => 'letter']);

//CONFIGURACION FOOTER Y HEADER DEL PDF
$PDF->SetHTMLHeader('


<table width="100%" >
<tbody>
    <tr>
      <th width="55%" class="left f10"></th>
      <td width="45%" class="right f10">' . $FECHANORMAL2 . '</td>
      <td width="5%"  class="right f10"><span>{PAGENO}/{nbpg}</span></td>
    </tr>
</tbody>
</table>
<br>

');

$PDF->SetHTMLFooter('

<footer>
  Report generated by IT Department Frutícola Volcán<a href="mailto:ti@fvolcan.cl">ti@fvolcan.cl.</a>
  <br>
  Printed by: <b>' . $NOMBREEMPRESA . '.</b> print time: <b>' . $HORAFINAL2 . '</b>
</footer>
    
');



$PDF->SetTitle($TIPOINFORME); //titulo pdf
$PDF->SetCreator($CREADOR); //CREADOR PDF
$PDF->SetAuthor($AUTOR); //AUTOR PDF
$PDF->SetSubject($ASUNTO); //ASUNTO PDF


//CONFIGURACION

//$PDF->simpleTables = true; 
//$PDF->packTableData = true;

//INICIALIZACION DEL CSS
$stylesheet = file_get_contents('../vista/css/stylePdf.css'); // carga archivo css
$stylesheet2 = file_get_contents('../vista/css/reset.css'); // carga archivo css

//ENLASAR CSS CON LA VISTA DEL PDF
$PDF->WriteHTML($stylesheet, 1);
$PDF->WriteHTML($stylesheet2, 1);

//GENERAR PDF
$PDF->WriteHTML($html);
//METODO DE SALIDA
$PDF->Output($NOMBREARCHIVOFINAL, \Mpdf\Output\Destination::INLINE);
