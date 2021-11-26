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
$PRODUCTOR_ADO = new PRODUCTOR_ADO();
$DESPACHOEX_ADO = new DESPACHOEX_ADO();
$TCALIBRE_ADO = new TCALIBRE_ADO();


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
        $FUMIGADO="Yes";
      }else if($ARRAYICARGA[0]['FUMIGADO_ICARGA']==2){
        $FUMIGADO="No";
      }else{
        $FUMIGADO="Sin Datos";
      }

      $ESTADO = $ARRAYICARGA[0]['ESTADO'];
      if ($ARRAYICARGA[0]['ESTADO'] == 1) {
        $ESTADO = "Open";
      }else if ($ARRAYICARGA[0]['ESTADO'] == 0) {
        $ESTADO = "Closer";
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
              $NOMBRETEMBARQUE="Maritimo";
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
              $NOMBRETEMBARQUE="Aereo";
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
      $RUTAGCARGA=$ARRAYAGCARGA[0]["RUT_AGCARGA"]."-".$ARRAYAADUANA[0]["DV_AGCARGA"];
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
  }else{    
    $NOMBREEMPRESA="Sin Datos";
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
$ARRAYFECHADOCUMENTO =getdate();

//SE OBTIENE INFORMACION RELACIONADA CON LA HORA
$HORA="".$ARRAYFECHADOCUMENTO['hours'];
$MINUTO="".$ARRAYFECHADOCUMENTO['minutes'];
$SEGUNDO="".$ARRAYFECHADOCUMENTO['seconds'];
//EN CASO DE VALORES MENOS A 2 LENGHT, SE LE CONCATENA UN 0
if ($MINUTO < 10) {
    $MINUTO = "0".$MINUTO;
}
if ($SEGUNDO < 10) {
    $SEGUNDO = "0".$SEGUNDO;
}

// SE JUNTA LA INFORMAICON DE LA HORA Y SE LE DA UN FORMATO
$HORAFINAL=$HORA."".$MINUTO."".$SEGUNDO;
$HORAFINAL2=$HORA.":".$MINUTO.":".$SEGUNDO;

//SE OBTIENE INFORMACION RELACIONADA CON LA FECHA
$DIA="".$ARRAYFECHADOCUMENTO['mday'];

$MES="".$ARRAYFECHADOCUMENTO['mon'];
$ANO="".$ARRAYFECHADOCUMENTO['year'];
$NOMBREMES="".$ARRAYFECHADOCUMENTO['month'];
$NOMBREDIA="".$ARRAYFECHADOCUMENTO['weekday'];
//EN CASO DE VALORES MENOS A 2 LENGHT, SE LE CONCATENA UN 0
if ($DIA < 10) {
    $DIA = "0".$DIA;
}
//PARA TRAUDCIR EL MES AL ESPAÑOL
$MESESNOMBRES= array(
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
$DIASNOMBRES= array(
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
$FECHANORMAL=$DIA."".$MES."".$ANO;
$FECHANORMAL2=$DIA."/".$MES."/".$ANO;
$FECHANOMBRE=$NOMBREDIA.", ".$DIA." de ".$NOMBREMES." del ".$ANO;


$html='
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Shipping Instruction Report</title>
  </head>
  <body>
    <header class="clearfix">
      <div id="logo">
           <img src="../vista/img/logo.png" width="150px" height="45px"/>
      </div>
      <div id="company">
        <h2 class="name">Soc. Agrícola El Álamo Ltda.</h2>
        <div>Camino a Antuco, Kilómetro N°13</div>
        <div>Los Ángeles, Chile.</div>
        <div><a href="mailto:ti@fvolcan.com">ti@fvolcan.cl</a></div>
      </div>
    </header>
    <main>
      <h2 class="titulo" style="text-align: center; color: black;">      
        SHIPPING INSTRUCTION REPORT
      <br>
      <b>'.$NUMEROIREFERENCIA.' </b>
      </h2> 
      <div id="details" class="clearfix">
        
        <div id="invoice"> 
          <div class="date"><b>Date Instructive : </b> '.$FECHA.'</div>
          <div class="date"><b>Company: </b> '.$NOMBREEMPRESA.'</div>
          <div class="date"><b>Season: </b> '.$NOMBRETEMPORADA.'</div>
        </div>             
        <div id="client">
          <div class="address"> Instructive Number : '.$NUMEROICARGA.'  </div>
          <div class="address"> Reference Number : '.$NUMEROIREFERENCIA.'  </div>
          <div class="address"> Instructive status: '.$ESTADO.' </div>
        </div>
        
      <div id="client">
          <div class="address">   </div>
          <div class="address">   </div>
      </div>
      </div>
     ';

     $html=$html.'
     <table  border="0" cellspacing="0" cellpadding="0">
       <tbody>
         <tr>
           <th class="color2 right">Consigne: </th>
           <td class="color2 left">'.$NOMBRECONSIGNATARIO.'</td>
           <th class="color2 right">Notifier: </th>
           <td class="color2 left">'.$NOMBRENOTIFICADOR.'</td>
         </tr>    
         <tr>                       
           <td class="color2 right">Address: </td>   
           <td class="color2 left">'.$DIRECCIONCONSIGNATARIO.'</td>    
           <td class="color2 right">Address: </td>
           <td class="color2 left">'.$DIRECCIONNOTIFICADOR.'</td>  
         </tr>  
         <tr>                       
           <td class="color2 right">Email: </td>   
           <td class="color2 left">'.$EMAIL1CONSIGNATARIO.'</td>    
           <td class="color2 right">Email: </td>
           <td class="color2 left">'.$EMAIL1NOTIFICADOR.'</td>      
         </tr>     
       </tbody>
     </table>    
     ';

     $html=$html.'
     <table  border="0" cellspacing="0" cellpadding="0">
       <thead>
         <tr>
           <th colspan="4" class="center">Shipment Info</th>
         </tr>
       </thead>
       <tbody>
         <tr>                       
           <th class="color2 left">Date  dispatch: </th> 
           <td class="color2 left">'.$FECHADESPACHOEX.'</td>      
           <th class="color2 left"> container number: </th>       
           <td class="color2 left">'.$NUMEROCONTENEDOR.'</td>      
         </tr>  
         <tr>                       
           <th class="color2 left">Lugar Carga: </th> 
           <td class="color2 left">'.$LUGARDECARGA.'</td>      
           <th class="color2 left">Seal Number: </th>       
           <td class="color2 left">'.$NUMEROSELLO.';</td>      
         </tr>  
         <tr>
           <th class="color2 left">Date ETD: </th>    
           <td class="color2 left">'.$FECHAETD.'</td>      
           <th class="color2 left">Booking: </th>        
           <td class="color2 left">'.$BOOKINGINSTRUCTIVO.'</td>      
         </tr>    
         <tr>                       
           <th class="color2 left">Date ETA: </th> 
           <td class="color2 left">'.$FECHAETA.'</td>      
           <th class="color2 left">Fumigation: </th>       
           <td class="color2 left">'.$FUMIGADO.'</td>      
         </tr>   
         ';
         if ($TEMBARQUE == "1") {
           $html = $html . '
           
           <tr>
             <th class="color2 left"> Transport Name: </th>    
             <td class="color2 left">'.$NOMBRETRANSPORTE.'</td>     
             <th class="color2 left">CRT: </th> 
             <td class="color2 left">'.$CRT.'</td>     
           </tr>    
           ';
         }
     
         if ($TEMBARQUE == "2") {
           $html = $html . '
           
           <tr>
             <th class="color2 left"> Airline Name: </th>    
             <td class="color2 left">'.$NOMBRETRANSPORTE.'</td>     
             <th class="color2 left">Airplane: </th> 
             <td class="color2 left">'.$NAVE.'</td>     
           </tr>    
           ';
         }
         if ($TEMBARQUE == "3") {
           $html = $html . '
           
           <tr>
             <th class="color2 left">Shipping company name: </th>    
             <td class="color2 left">'.$NOMBRETRANSPORTE.'</td>     
             <th class="color2 left">Vessel: </th> 
             <td class="color2 left">'.$NAVE.'</td>     
           </tr>   
           <tr>
             <th class="color2 left">Closing date Stacking; </th>   
             <td class="color2 left">'.$FECHASTACKING.'</td>    
             <td class="color2 left">&nbsp;</td>     
             <td class="color2 left">&nbsp;</td>     
           </tr>    
           ';
         }
     
     $html = $html . '      
       </tbody>  
     </table>
         
     ';


     $html=$html.'
     <table  border="0" cellspacing="0" cellpadding="0">
       <thead>
         <tr>
           <th colspan="4" class="center">Shipment Conditions</th>
         </tr>
       </thead>
       <tbody>
         <tr>                       
           <th class="color2 left">incoterm: </th> 
           <td class="color2 left">'.$NOMBRECVENTA.'</td>     
           <th class="color2 left">Fraight condition: </th>     
           <td class="color2 left">'.$NOMBRETFLETE.'</td>      
         </tr> 
         <tr>   
           <th class="color2 left">Selling Arragement: </th> 
           <td class="color2 left">'.$NOMBREMVENTA.'</td>    
           <th class="color2 left">BOL/AWB/CRT: </th>   
           <td class="color2 left">'.$BOLAWBCRTINSTRUCTIVO.'</td>        
         </tr>  
         <tr>                       
           <th class="color2 left">Paynebt condition: </th>    
           <td class="color2 left">'.$NOMBREFPAGO.'</td>      
           <th class="color2 left">&nbsp;</th>       
           <td class="color2 left">&nbsp;</td>      
         </tr>  
          
          
       </tbody>  
     </table>    
     ';
     
$html=$html.'
<table  border="0" cellspacing="0" cellpadding="0">
  <thead>
    <tr>
      <th colspan="6" class="center">info The Aerated</th>
    </tr>
  </thead>
  <tbody>
    <tr>                       
      <th class="color2 left">Atmosphere: </th> 
      <td class="color2 left">'.$NOMBREATMOSFERA.'</td>         
      <th class="color2 left">Type container: </th>    
      <td class="color2 left">'.$NOMBRETCONTENEDOR.'</td>          
      <th class="color2 left">Opening Lampa: </th>       
      <td class="color2 left">'.$ALAMPAINSTRUCTIVO.'</td>       
    </tr> 
    <tr>   
      <th class="color2 left">Temperature: </th> 
      <td class="color2 left">'.$TINSTRUCTIVO.'</td>      
      <th class="color2 left">% O2: </th>   
      <td class="color2 left">'.$O2INSTRUCTIVO.'</td>       
      <th class="color2 left">% CO2: </th>   
      <td class="color2 left">'.$CO2INSTRUCTIVO.'</td>              
    </tr>         
  </tbody>  
</table>    
';

$html=$html.'
<table  border="0" cellspacing="0" cellpadding="0">
  <thead>
    <tr>
      <th colspan="4" class="center">Other Shipment Info</th>
    </tr>
  </thead>
  <tbody>
    <tr>                       
      <th class="color2 left">Type of shipment: </th> 
      <td class="color2 left">'.$NOMBRETEMBARQUE.'</td>        
      <th class="color2 left">Final Destination: </th> 
      <td class="color2 left">'.$NOMBREDFINAL.'</td>         
    </tr>     
    ';
    if ($TEMBARQUE == "1") {
      $html = $html . '
      
      <tr>
        <th class="color2 left">Place of Origin: </th>     
        <td class="color2 left">'.$NOMBREORIGEN.'</td>      
        <th class="color2 left">Place of Destination: </th>  
        <td class="color2 left">'.$NOMBREDESTINO.'</td>      
      </tr>    
      ';
    }

    if ($TEMBARQUE == "2") {
      $html = $html . '
      
      <tr>
      <th class="color2 left">Airport of Origin: </th>     
      <td class="color2 left">'.$NOMBREORIGEN.'</td>  
      <th class="color2 left">Airport of Destination: </th>  
      <td class="color2 left">'.$NOMBREDESTINO.'</td>      
      </tr>    
      ';
    }
    if ($TEMBARQUE == "3") {
      $html = $html . '
      
      <tr>
      <th class="color2 left">Port of Origin: </th>     
      <td class="color2 left">'.$NOMBREORIGEN.'</td>  
      <th class="color2 left">Port of Destination: </th>  
      <td class="color2 left">'.$NOMBREDESTINO.'</td>      
      </tr>   
        
      ';
    }

$html = $html . '  
    <tr>                         
      <th class="color2 left">Exporter Rut: </th> 
      <td class="color2 left">'.$RUTEXPPORTADORA.'</td>        
      <th class="color2 left">Exporter Name: </th> 
      <td class="color2 left">'.$NOMBREEXPPORTADORA.'</td>       
    </tr>         
    <tr>                         
      <th class="color2 left">Country of Origin: </th> 
      <td class="color2 left">Chile</td>        
      <th class="color2 left">Country of Destination: </th> 
      <td class="color2 left">'.$NOMBREPAIS.'</td>        
    </tr>      
  </tbody>    
  <tfoot>
    <tr>
      <th colspan="4" class="center"></th>
    </tr>
  </tfoot>
</table>    
';
$html=$html.'
<div class="salto" style=" page-break-after: always; border: none;   margin: 0;   padding: 0;"></div>  
';

$html=$html.'
<table  border="0" cellspacing="0" cellpadding="0">
  <thead>
    <tr>
      <th colspan="6" class="center">Cargo Agent Info</th>
    </tr>
  </thead>
  <tbody>
    <tr>                       
      <th class="color2 left">Rut: </th> 
      <td class="color2 left">'.$RUTAGCARGA.'</td>         
      <th class="color2 left">Name: </th>    
      <td class="color2 left">'.$NOMBREAGCARGA.'</td>            
      <th class="color2 left">Address: </th>       
      <td class="color2 left">'.$DIRECCIONAGCARGA.'</td>        
    </tr> 
    <tr>   
      <th class="color2 left">Contact:</th> 
      <td class="color2 left">'.$CONTACTOAGCARGA.'</td>         
      <th class="color2 left">Contact Phone: </th>  
      <td class="color2 left">'.$TELEFONOAGCARGA.'</td>   
      <th class="color2 left">Contact Email: </th>  
      <td class="color2 left">'.$EMAILAGCARGA.'</td>          
    </tr>           
  </tbody>  
</table>    
';




$html=$html.'
<table  border="0" cellspacing="0" cellpadding="0">
  <thead>
    <tr>
      <th colspan="6" class="center">Customs Agency Info</th>
    </tr>
  </thead>
  <tbody>
    <tr>                       
      <th class="color2 left">Rut: </th> 
      <td class="color2 left">'.$RUTAADUANA.'</td>         
      <th class="color2 left">Name: </th>    
      <td class="color2 left">'.$NOMBREAADUANA.'</td>              
      <th class="color2 left">Address: </th>  
      <td class="color2 left">'.$DIRECCIONAADUANA.'</td>             
    </tr> 
    <tr>   
      <th class="color2 left">Contact: </th> 
      <td class="color2 left">'.$CONTACTOAADUANA.'</td>         
      <th class="color2 left">Contact Phone: </th>   
      <td class="color2 left">'.$TELEFONOAADUANA.'</td>     
      <th class="color2 left">Contact Email : </th>  
      <td class="color2 left">'.$EMAILAADUANA.'</td>           
    </tr>        
  </tbody>  
  
  <tfoot>
    <tr>
      <th colspan="6" class="center"></th>
    </tr>
  </tfoot>
</table>    
';

$html=$html.'
<table  border="0" cellspacing="0" cellpadding="0">
  <thead>
    <tr>
      <th colspan="10" class="center">Instruity Charge</th>
    </tr>
    <tr>                       
      <th class="color center ">Code </th>
      <th class="color center ">Description of goods </th>
      <th class="color center ">Net Weight </th>
      <th class="color center ">Gross Weight </th>
      <th class="color center ">Amount </th>
      <th class="color center ">Net Kilo </th>
      <th class="color center ">Gross Kilo </th>
      <th class="color center ">Caliber </th>
      <th class="color center ">Price  US </th>
      <th class="color center ">Total US </th>    
    </tr> 
  </thead>
  ';
$html = $html . '    
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

      $html = $html . '  
      <tr>   
              <td class="center">'.$CODIGOESTANDAR.'</td>
              <td class="center">'.$NOMBREESTANTAR.'</td>
              <td class="center">'.number_format($NETOESTANTAR, 2, ",", ".").'</td>
              <td class="center">'.number_format($BRUTOESTANTAR, 2, ",", ".").'</td>
              <td class="center">'.$s['ENVASE'].'</td>
              <td class="center">'.$s['NETO'].'</td>
              <td class="center">'.$s['BRUTO'].'</td>
              <td class="center">'.$NOMBRECALIBRE.'</td>
              <td class="center">'.$s['US'].'</td>
              <td class="center">'.$s['TOTALUS'].'</td>
      </tr>
              
  ';
    endforeach; 

$html = $html . '      

        <tr>   
          <td class="color center">&nbsp;</td>
          <td class="color center">&nbsp;</td>
          <td class="color center">&nbsp;</td>
          <th class="color right">Sub total</td>
          <th class="color center">'.$TOTALENVASEV.'</th>
          <th class="color center">'.$TOTALNETOV.'</th>
          <th class="color center">'.$TOTALBRUTOV.'</th>
          <td class="color center">&nbsp;</td>
          <td class="color center">&nbsp;</td>
          <th class="color center">'.$TOTALUSV.'</th>
        </tr>
  </tbody>    
</table>    
';




$html = $html . '  

      <div id="details" class="clearfix">      
        <div id="client">
          <div class="address"><b>observations</b></div>
          <div class="address">  '.$OBSERVACIONES.' </div>
        </div>
        <div id="invoice">
          <div class="date"><b><hr></b></div>
          <div class="date center">  Firm responsible </div>
          <div class="date center">  ' . $NOMBRERESPONSABLE . '</div>
        </div>
      </div>



    </main>
  </body>
</html>

';





//CREACION NOMBRE DEL ARCHIVO
$NOMBREARCHIVO="ShippingInstructionReport_";
$FECHADOCUMENTO = $FECHANORMAL."_".$HORAFINAL;
$TIPODOCUMENTO="Report";
$FORMATO=".pdf";
$NOMBREARCHIVOFINAL=$NOMBREARCHIVO.$FECHADOCUMENTO.$FORMATO;

//CONFIGURACIOND DEL DOCUMENTO
$TIPOPAPEL="LETTER";
$ORIENTACION="P";
$LENGUAJE="ES";
$UNICODE="true";
$ENCODING="UTF-8";

//DETALLE DEL CREADOR DEL INFORME
$TIPOINFORME = "Shipping Instruction Report ";
$CREADOR = "User";
$AUTOR = "User";
$ASUNTO = "Report";

//API DE GENERACION DE PDF
require_once '../../api/mpdf/mpdf/autoload.php';
//$PDF = new \Mpdf\Mpdf();W
$PDF = new \Mpdf\Mpdf(['format'=> 'letter']);

//CONFIGURACION FOOTER Y HEADER DEL PDF//CONFIGURACION FOOTER Y HEADER DEL PDF
$PDF->SetHTMLHeader('
<table width="100%" >
    <tbody>
        <tr>
          <th width="55%" class="left f10">' . $EMPRESA . '</th>
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
