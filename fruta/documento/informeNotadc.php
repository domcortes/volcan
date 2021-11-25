<?php

//LLAMADA ARCHIVOS NECESARIOS PARA LAS OPERACIONES 
include_once '../controlador/USUARIO_ADO.php';
include_once '../controlador/EMPRESA_ADO.php';
include_once '../controlador/PLANTA_ADO.php';
include_once '../controlador/TEMPORADA_ADO.php';


include_once '../controlador/CONSIGNATARIO_ADO.php';
include_once '../controlador/RFINAL_ADO.php';
include_once '../controlador/TRANSPORTE_ADO.php';
include_once '../controlador/LCARGA_ADO.php';
include_once '../controlador/LDESTINO_ADO.php';
include_once '../controlador/LAEREA_ADO.php';
include_once '../controlador/ACARGA_ADO.php';
include_once '../controlador/ADESTINO_ADO.php';
include_once '../controlador/NAVIERA_ADO.php';
include_once '../controlador/PCARGA_ADO.php';
include_once '../controlador/PDESTINO_ADO.php';
include_once '../controlador/FPAGO_ADO.php';
include_once '../controlador/MVENTA_ADO.php';
include_once '../controlador/EEXPORTACION_ADO.php';
include_once '../controlador/ESPECIES_ADO.php';
include_once '../controlador/VESPECIES_ADO.php';
include_once '../controlador/TCALIBRE_ADO.php';
include_once '../controlador/PRODUCTOR_ADO.php';
include_once '../controlador/ICARGA_ADO.php';
include_once '../controlador/DICARGA_ADO.php';
include_once '../controlador/NOTADC_ADO.php';
include_once '../controlador/DNOTADC_ADO.php';



//INCIALIZAR LAS VARIBLES
//INICIALIZAR CONTROLADOR

$USUARIO_ADO = new USUARIO_ADO();
$EMPRESA_ADO =  new EMPRESA_ADO();
$PLANTA_ADO =  new PLANTA_ADO();
$TEMPORADA_ADO =  new TEMPORADA_ADO();



$CONSIGNATARIO_ADO =  new CONSIGNATARIO_ADO();
$RFINAL_ADO =  new RFINAL_ADO();
$TRANSPORTE_ADO =  new TRANSPORTE_ADO();
$LCARGA_ADO =  new LCARGA_ADO();
$LDESTINO_ADO =  new LDESTINO_ADO();
$LAEREA_ADO =  new LAEREA_ADO();
$ACARGA_ADO =  new ACARGA_ADO();
$ADESTINO_ADO =  new ADESTINO_ADO();
$NAVIERA_ADO =  new NAVIERA_ADO();
$PCARGA_ADO =  new PCARGA_ADO();
$PDESTINO_ADO =  new PDESTINO_ADO();
$FPAGO_ADO =  new FPAGO_ADO();
$MVENTA_ADO =  new MVENTA_ADO();
$EEXPORTACION_ADO = new EEXPORTACION_ADO();
$VESPECIES_ADO =  new VESPECIES_ADO();
$ESPECIES_ADO =  new ESPECIES_ADO();
$TCALIBRE_ADO =  new TCALIBRE_ADO();
$PRODUCTOR_ADO = new PRODUCTOR_ADO();
$TCALIBRE_ADO = new TCALIBRE_ADO();
$ICARGA_ADO =  new ICARGA_ADO();
$DICARGA_ADO =  new DICARGA_ADO();
$NOTADC_ADO =  new NOTADC_ADO();
$DNOTADC_ADO =  new DNOTADC_ADO();
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


$ARRAYVERNOTADCNC = $NOTADC_ADO->verNota2($IDOP);
if ($ARRAYVERNOTADCNC) {


  $NUMERO = $ARRAYVERNOTADCNC[0]["NUMERO_NOTA"];
  $FECHAINOTA = $ARRAYVERNOTADCNC[0]["FECHA"];
  $TNOTA = $ARRAYVERNOTADCNC[0]["TNOTA"];
  $ICARGA = $ARRAYVERNOTADCNC[0]["ID_ICARGA"];
  if($TNOTA==1){
      $NOMBRETNOTA="DEBIT";
  }else  if($TNOTA==2){
      $NOMBRETNOTA="CREDIT";
  }else{
      $NOMBRETNOTA="Sin Datos";
  }
  $ESTADO = $ARRAYVERNOTADCNC[0]['ESTADO'];
  if ($ARRAYVERNOTADCNC[0]['ESTADO'] == 1) {
    $ESTADO = "Abierto";
  }else if ($ARRAYVERNOTADCNC[0]['ESTADO'] == 0) {
    $ESTADO = "Cerrado";
  }else{
    $ESTADO="Sin Datos";
  }    
  $ARRAYICARGA=$ICARGA_ADO->verIcarga2($ICARGA);
  if($ARRAYICARGA){
      $ARRAYDCARGA = $DICARGA_ADO->buscarPorIcarga2($ARRAYICARGA[0]["ID_ICARGA"]);
      $ARRAYDCARGATOTAL = $DICARGA_ADO->totalesPorIcarga2($ARRAYICARGA[0]["ID_ICARGA"]);
      $TOTALENVASE=$ARRAYDCARGATOTAL[0]["ENVASE"];
      $TOTALUS=$ARRAYDCARGATOTAL[0]["TOTALUS"];
      $NUMEROIREFERENCIA=$ARRAYICARGA[0]["NREFERENCIA_ICARGA"];
      $NUMEROICARGA=$ARRAYICARGA[0]["NUMERO_ICARGA"];
      $BOOKINGINSTRUCTIVO = $ARRAYICARGA[0]['BOOKING_ICARGA'];
      $TEMBARQUE = $ARRAYICARGA[0]['TEMBARQUE_ICARGA'];
      $FECHAETD = $ARRAYICARGA[0]['FECHAETD'];
      $FECHAETA = $ARRAYICARGA[0]['FECHAETA'];    
      $BOLAWBCRTINSTRUCTIVO = $ARRAYICARGA[0]['BOLAWBCRT_ICARGA'];

      $ARRAYRFINAL=$RFINAL_ADO->verRfinal($ARRAYICARGA[0]["ID_RFINAL"]);
      if($ARRAYRFINAL){
          $NOMBRERFINAL=$ARRAYRFINAL[0]["NOMBRE_RFINAL"];
      }else{
          $NOMBRERFINAL="Sin Datos";
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
      if ($TEMBARQUE) {
          if ($TEMBARQUE == "1") {
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
              $ARRAYLAEREA = $LAEREA_ADO->verLaerea( $ARRAYICARGA[0]['ID_LAREA']);      
              if($ARRAYLAEREA){
                $NOMBRETRANSPORTE=$ARRAYLAEREA[0]["NOMBRE_LAREA"];
              }else{
                $NOMBRETRANSPORTE="Sin Datos";
              }            
              $ARRAYACARGA =$ACARGA_ADO->verAcarga(  $ARRAYICARGA[0]['ID_ACARGA']);  
              if($ARRAYACARGA){
                $NOMBREORIGEN=$ARRAYACARGA[0]["NOMBRE_ACARGA"];
              }else{
                $NOMBREORIGEN="Sin Datos";
              }
              $ARRAYADESTINO =$LDESTINO_ADO->verLdestino( $ARRAYICARGA[0]['ID_ADESTINO']);  
              if($ARRAYADESTINO){
                $NOMBREDESTINO=$ARRAYADESTINO[0]["NOMBRE_ADESTINO"];
              }else{
                $NOMBREDESTINO="Sin Datos";
              }
          }
          if ($TEMBARQUE == "3") {
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
    
  }else{
      $NOMBRETRANSPORTE="Sin Datos";
      $NOMBREMVENTA="Sin Datos";
      $NOMBREFPAGO="Sin Datos";
      $NOMBREORIGEN="Sin Datos";
      $NOMBREDESTINO="Sin Datos";
      $BOOKINGINSTRUCTIVO="Sin Datos";
      $TEMBARQUE="Sin Datos";
      $FECHAETD="Sin Datos";
      $FECHAETA="Sin Datos";
      $BOLAWBCRTINSTRUCTIVO="Sin Datos";
      $NUMEROIREFERENCIA="Sin Datos";
      $NUMEROICARGA="Sin Datos";
      $NOMBRERFINAL="Sin Datos";
  } 

  $ARRAYEMPRESA = $EMPRESA_ADO->verEmpresa($ARRAYVERNOTADCNC[0]['ID_EMPRESA']);
  if($ARRAYEMPRESA){
    $NOMBREEMPRESA=$ARRAYEMPRESA[0]["NOMBRE_EMPRESA"];
    $RUTEMPRESA=$ARRAYEMPRESA[0]["RUT_EMPRESA"]."-".$ARRAYEMPRESA[0]["DV_EMPRESA"];
    $DIRECCIONEMPRESA=$ARRAYEMPRESA[0]["DIRECCION_EMPRESA"];
  }else{    
    $NOMBREEMPRESA="Sin Datos";
    $RUTEMPRESA="Sin Datos";
    $DIRECCIONEMPRESA="Sin Datos";
  }
  $ARRAYPLANTA = $PLANTA_ADO->verPlanta($ARRAYVERNOTADCNC[0]['ID_PLANTA']);
  if($ARRAYPLANTA){
    $NOMBREPLANTA=$ARRAYPLANTA[0]["NOMBRE_PLANTA"];
    $FDAPLANTA=$ARRAYPLANTA[0]["FDA_PLANTA"];
  }else{    
    $NOMBREPLANTA="Sin Datos";
    $FDAPLANTA="Sin Datos";
  }
  $ARRAYTEMPORADA = $TEMPORADA_ADO->verTemporada($ARRAYVERNOTADCNC[0]['ID_TEMPORADA']);  
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
    <title>Informe Nota Credicto o debito</title>
  </head>
  <body>

    <main>
      <h2 class="titulo" style="text-align: center; color: black;">
        
        <br>
        <b> </b>
      </h2>
      <br>
      <table  border="0" cellspacing="0" cellpadding="0">
        <thead>
          <tr>
            <th colspan="6" class="center"></th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <th class="color2 left">Date: </th>
            <td class="color2 left">'.$FECHAINOTA.'</td>
            <td class="color2 left">&nbsp;</td>
            <td class="color2 left">&nbsp;</td>
            <td class="color2 left">&nbsp;</td>
            <td class="color2 left">&nbsp;</td>
          </tr>
          <tr>            
            <th class="color2 left">Consigne: </th>
            <td class="color2 left">
                <b>'.$NOMBRECONSIGNATARIO.'</b>  
            </td>            
            <td class="color2 left">&nbsp;</td>
            <td class="color2 left">&nbsp;</td>
            <th class="color2 left">Sales method: </th>
            <td class="color2 left">'.$NOMBREMVENTA.'</td>
          </tr>          
          <tr>            
            <th class="color2 left">&nbsp; </th>
            <td class="color2 left">                
                '.$DIRECCIONCONSIGNATARIO.'                     
            </td>            
            <td class="color2 left">&nbsp;</td>
            <td class="color2 left">&nbsp;</td>
            <th class="color2 left">Incoterm: </th>
            <td class="color2 left">incoterms valor</td>
          </tr>          
          <tr>            
            <th class="color2 left">&nbsp; </th>
            <td class="color2 left">      
            '.$EMAIL1CONSIGNATARIO.'            
            </td>            
            <td class="color2 left">&nbsp;</td>
            <td class="color2 left">&nbsp;</td>
            <th class="color2 left">BL/AWB/CRT: </th>
            <td class="color2 left">'.$BOLAWBCRTINSTRUCTIVO.'</td>
          </tr>
          <tr>                       
            <td class="color2 left">&nbsp;</td>   
            <td class="color2 left">&nbsp;</td>         
            <td class="color2 left">&nbsp;</td>
            <td class="color2 left">&nbsp;</td>
            <th class="color2 left">N° Container: </th>
            <td class="color2 left">'.$BOOKINGINSTRUCTIVO.'</td>
          </tr>    
          
';
if ($TEMBARQUE == "1") {
$html = $html . '
          
          <tr>                       
            <th class="color2 left">&nbsp;</th>   
            <td class="color2 left">&nbsp;</td>         
            <td class="color2 left">&nbsp;</td>
            <td class="color2 left">&nbsp;</td>
            <th class="color2 left">transport: </th>
            <td class="color2 left">'.$NOMBRETRANSPORTE.'</td>
          </tr> 
          
          <tr>                       
            <th class="color2 left">Place of Shipment: </th>   
            <td class="color2 left">'.$NOMBREORIGEN.'</td>         
            <td class="color2 left">&nbsp;</td>
            <td class="color2 left">&nbsp;</td>
            <th class="color2 left">ETD: </th>
            <td class="color2 left">'.$FECHAETD.'</td>
          </tr> 
          
          <tr>                       
            <th class="color2 left">Place of Destination: </th>   
            <td class="color2 left">'.$NOMBREDESTINO.'</td>      
            <td class="color2 left">&nbsp;</td>
            <td class="color2 left">&nbsp;</td>
            <th class="color2 left">ETA: </th>
            <td class="color2 left">'.$FECHAETA.'</td>
          </tr> 
';
}

if ($TEMBARQUE == "2") {

$html = $html . '
          <tr>                       
            <td class="color2 left">&nbsp;</td>   
            <td class="color2 left">&nbsp;</td>         
            <td class="color2 left">&nbsp;</td>
            <td class="color2 left">&nbsp;</td>
            <th class="color2 left">Airplane: </th>
            <td class="color2 left">'.$NOMBRETRANSPORTE.'</td>
          </tr> 
          
          <tr>                       
            <th class="color2 left">Airport of Shipment: </th>   
            <td class="color2 left">'.$NOMBREORIGEN.'</td>         
            <td class="color2 left">&nbsp;</td>
            <td class="color2 left">&nbsp;</td>
            <th class="color2 left">ETD: </th>
            <td class="color2 left">'.$FECHAETD.'</td>
          </tr> 
          
          <tr>                       
            <th class="color2 left">Airport of Destination: </th>   
            <td class="color2 left">'.$NOMBREDESTINO.'</td>      
            <td class="color2 left">&nbsp;</td>
            <td class="color2 left">&nbsp;</td>
            <th class="color2 left">ETA: </th>
            <td class="color2 left">'.$FECHAETA.'</td>
          </tr> 
';
}

if ($TEMBARQUE == "3") {

$html = $html . '
          <tr>                       
            <td class="color2 left">&nbsp;</td>   
            <td class="color2 left">&nbsp;</td>         
            <td class="color2 left">&nbsp;</td>
            <td class="color2 left">&nbsp;</td>
            <th class="color2 left">Vessel: </th>
            <td class="color2 left">'.$NOMBRETRANSPORTE.'</td>
          </tr>           
          <tr>                       
            <th class="color2 left">Port of Shipment: </th>   
            <td class="color2 left">'.$NOMBREORIGEN.'</td>         
            <td class="color2 left">&nbsp;</td>
            <td class="color2 left">&nbsp;</td>
            <th class="color2 left">ETD: </th>
            <td class="color2 left">'.$FECHAETD.'</td>
          </tr>           
          <tr>                       
            <th class="color2 left">Port of Destination: </th>   
            <td class="color2 left">'.$NOMBREDESTINO.'</td>      
            <td class="color2 left">&nbsp;</td>
            <td class="color2 left">&nbsp;</td>
            <th class="color2 left">ETA: </th>
            <td class="color2 left">'.$FECHAETA.'</td>
          </tr> 
';
}

$html = $html . '

          <tr>            
            <td class="color2 left">FDA packing </td>
            <td class="color2 left"> '.$FDAPLANTA.' </td>            
            <td class="color2 left">&nbsp;</td>
            <td class="color2 left">&nbsp;</td>
            <td class="color2 left">&nbsp;</td>
            <td class="color2 left">&nbsp;</td>
          </tr>
        </tbody>
        <tfoot>
          <tr>
            <th colspan="6" class="center"></th>
          </tr>
        </tfoot>
      </table>


          
';





$html = $html . '        
      <table border="0" cellspacing="0" cellpadding="0">
        <thead>
          <tr>
            <th colspan="7" class="center">DETAIL.</th>
          </tr>
          <tr>
            <th class="color left">Amount</th>
            <th class="color left">Description of goods</th>
            <th class="color left">value CN/DN</th>
            <th class="color left">instructive price</th>
            <th class="color left">instructive price with CN/DN</th>
            <th class="color left">total instructive</th>
            <th class="color left">total instructive with CN/DN</th>
          </tr>
        </thead>
         <tbody>
        ';

foreach ($ARRAYDCARGA as $s) :

  $ARRAYEEXPORTACION = $EEXPORTACION_ADO->verEstandar($s['ID_ESTANDAR']);
  if ($ARRAYEEXPORTACION) {
      $NOMBREESTANTAR = $ARRAYEEXPORTACION[0]['NOMBRE_ESTANDAR'];
  } else {
      $NOMBREESTANTAR = "Sin Datos";
  }
  $ARRAYCALIBRE = $TCALIBRE_ADO->verCalibre($s['ID_TCALIBRE']);
  if ($ARRAYCALIBRE) {
      $NOMBRECALIBRE = $ARRAYCALIBRE[0]['NOMBRE_TCALIBRE'];
  } else {
      $NOMBRECALIBRE = "Sin Datos";
  }
  $ARRAYDNOTA=$DNOTADC_ADO->buscarPorNotaDicarga($IDOP,$s['ID_DICARGA']);
  if($ARRAYDNOTA){
      $CANTIDADDNOTA=$ARRAYDNOTA[0]["CANTIDAD"];
      if($ARRAYDNOTA[0]["TNOTA"] ==1){                                                                        
          $PRECIONUEVO=$s['PRECIO_US_DICARGA']+$CANTIDADDNOTA;
          $TOTALNUEVO=$s['CANTIDAD_ENVASE_DICARGA']*$PRECIONUEVO;
      }else  if($ARRAYDNOTA[0]["TNOTA"] ==2){
          $PRECIONUEVO=$s['PRECIO_US_DICARGA']-$CANTIDADDNOTA;
          $TOTALNUEVO=$s['CANTIDAD_ENVASE_DICARGA']*$PRECIONUEVO;
      }else{
          $PRECIONUEVO="Sin Datos";
          $TOTALNUEVO=0;
      }
  }else{
      $CANTIDADDNOTA="Sin Datos";
      $PRECIONUEVO="Sin Datos";
      $TOTALNUEVO=0;
  }
  
$TOTALPRECIOUSNUEVO=$TOTALPRECIOUSNUEVO+$TOTALNUEVO;

$html = $html . '              
        <tr class="">
            <td class=" left">'.$s['ENVASE'].'</td>
            <td class=" left">'.$NOMBREESTANTAR.'</td>
            <td class=" left">'.$CANTIDADDNOTA.'</td>
            <td class=" left">'.$s['US'].'</td>
            <td class=" left">'.$PRECIONUEVO.'</td>
            <td class=" left">'.$s['TOTALUS'].'</td>
            <td class=" left">'.number_format($TOTALNUEVO, 0, "", ".").'</td>
        </tr>
    ';
 endforeach;
$html = $html . '
              
                  <tr class="bt">
                      <th class="color left">'.$TOTALENVASE.'</th>
                      <th class="color left">&nbsp;</th>
                      <th class="color left">&nbsp;</th>
                      <th class="color left">&nbsp;</th>
                      <th class="color left">&nbsp;</th>
                      <th class="color left">'.$TOTALUS.'</th>
                      <th class="color left">'.number_format($TOTALPRECIOUSNUEVO, 0, "", ".").'</th>
                  </tr>
              ';





$html = $html . '
        </tbody>
      </table>
    
        
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
$NOMBREARCHIVO = "InformeNotaNCDC_";
$FECHADOCUMENTO = $FECHANORMAL . "_" . $HORAFINAL;
$TIPODOCUMENTO = "Informe";
$FORMATO = ".pdf";
$NOMBREARCHIVOFINAL = $NOMBREARCHIVO . $FECHADOCUMENTO . $FORMATO;

//CONFIGURACIOND DEL DOCUMENTO
$TIPOPAPEL = "LETTER";
$ORIENTACION = "P";
$LENGUAJE = "ES";
$UNICODE = "true";
$ENCODING = "UTF-8";

//DETALLE DEL CREADOR DEL INFORME
$TIPOINFORME = "Informe Nota NC/ND";
$CREADOR = "Usuario";
$AUTOR = "Usuario";
$ASUNTO = "Informe";

//API DE GENERACION DE PDF
require_once '../../api/mpdf/mpdf/autoload.php';
//$PDF = new \Mpdf\Mpdf();W
$PDF = new \Mpdf\Mpdf(['format' => 'letter']);

//CONFIGURACION FOOTER Y HEADER DEL PDF
$PDF->SetHTMLHeader('

<table style=" width:100%; "  border="0" cellspacing="0" cellpadding="0">
  <tr >
    <td class=" color2 left " style="width:20%;">
      <div id="logo">
        <img src="../vista/img/logo.png" width="150px" height="45px"/>
      </div>
    </td>
    <td  class=" color2 left " style="width:40%;">
          <b>'.$NOMBREEMPRESA.' </b><br>
          <b>'.$RUTEMPRESA.' </b><br>
            '.$DIRECCIONEMPRESA.'
    </td>
    <td class=" color2 left  pp20" style="width:30%; ">
      <table class="bor">
        <tr>
          <td class=" color2 center ">
            '.$NOMBRETNOTA.' NOTE
          </td>
        </tr>
        <tr>¿
          <td class=" color2 center ">
            N° '.$NUMEROIREFERENCIA.'
          </td>
        </tr>
      </table> 
    </td>
  </tr>  
</table>  
');

$PDF->SetHTMLFooter('

<footer>
Informe generado por Departamento TI Fruticola Volcan <a href="mailto:ti@fvolcan.cl">ti@fvolcan.cl.</a>
<br>
Impreso por: <b>' . $NOMBRE . '.</b> Hora impresión: <b>' . $HORAFINAL2 . '</b>
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
