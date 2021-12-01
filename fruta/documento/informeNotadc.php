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
include_once '../controlador/CVENTA_ADO.php';
include_once '../controlador/FPAGO_ADO.php';
include_once '../controlador/MVENTA_ADO.php';
include_once '../controlador/EEXPORTACION_ADO.php';
include_once '../controlador/ESPECIES_ADO.php';
include_once '../controlador/VESPECIES_ADO.php';
include_once '../controlador/TCALIBRE_ADO.php';
include_once '../controlador/PRODUCTOR_ADO.php';
include_once '../controlador/TMONEDA_ADO.php';
include_once '../controlador/DESPACHOEX_ADO.php';
include_once '../controlador/CIUDAD_ADO.php';
 
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
$CVENTA_ADO =  new CVENTA_ADO();
$FPAGO_ADO =  new FPAGO_ADO();
$MVENTA_ADO =  new MVENTA_ADO();
$EEXPORTACION_ADO = new EEXPORTACION_ADO();
$VESPECIES_ADO =  new VESPECIES_ADO();
$ESPECIES_ADO =  new ESPECIES_ADO();
$TCALIBRE_ADO =  new TCALIBRE_ADO();
$PRODUCTOR_ADO = new PRODUCTOR_ADO();
$TCALIBRE_ADO = new TCALIBRE_ADO();
$TMONEDA_ADO = new TMONEDA_ADO();
$DESPACHOEX_ADO = new DESPACHOEX_ADO();
$CIUDAD_ADO = new CIUDAD_ADO();

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
  
  $IDUSUARIOI = $ARRAYVERNOTADCNC[0]['ID_USUARIOI'];  
  $ARRAYUSUARIO2 = $USUARIO_ADO->ObtenerNombreCompleto($IDUSUARIOI);
  $NOMBRERESPONSABLE = $ARRAYUSUARIO2[0]["NOMBRE_COMPLETO"];
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
      
      $TOTALENVASEV = $ARRAYDCARGATOTAL[0]['ENVASE'];
      $TOTALNETOV = $ARRAYDCARGATOTAL[0]['NETO'];
      $TOTALBRUTOV = $ARRAYDCARGATOTAL[0]['BRUTO'];
      $TOTALUSV = $ARRAYDCARGATOTAL[0]['TOTALUS'];

      $NUMEROIREFERENCIA=$ARRAYICARGA[0]["NREFERENCIA_ICARGA"];
      $NUMEROICARGA=$ARRAYICARGA[0]["NUMERO_ICARGA"];
      $BOOKINGINSTRUCTIVO = $ARRAYICARGA[0]['BOOKING_ICARGA'];
      $TEMBARQUE = $ARRAYICARGA[0]['TEMBARQUE_ICARGA'];
      $FECHA=$ARRAYICARGA[0]["FECHA"];
      $FECHAETD = $ARRAYICARGA[0]['FECHAETD'];
      $FECHAETA = $ARRAYICARGA[0]['FECHAETA'];    
      $BOLAWBCRTINSTRUCTIVO = $ARRAYICARGA[0]['BOLAWBCRT_ICARGA'];


      $ARRAYDESPACHOEX=$DESPACHOEX_ADO->buscarDespachoExPorIcarga($ARRAYICARGA[0]["ID_ICARGA"]);
      if($ARRAYDESPACHOEX){
        $FECHADESPACHOEX=$ARRAYDESPACHOEX[0]['FECHA'];
        $NUMEROCONTENEDOR=$ARRAYDESPACHOEX[0]['NUMERO_CONTENEDOR_DESPACHOEX'];
        $NUMEROSELLO=$ARRAYDESPACHOEX[0]['NUMERO_SELLO_DESPACHOEX'];
        $ARRAYVERPLANTA = $PLANTA_ADO->verPlanta($ARRAYDESPACHOEX[0]['ID_PLANTA']);
        if($ARRAYVERPLANTA){
          $LUGARDECARGA=$ARRAYVERPLANTA[0]["NOMBRE_PLANTA"];
          $RAZONSOCIALPLANTA=$ARRAYVERPLANTA[0]["RAZON_SOCIAL_PLANTA"];
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
        $EORICONSIGNATARIO=$ARRAYCONSIGNATARIO[0]["EORI_CONSIGNATARIO"];
        $TELEFONOCONSIGNATARIO=$ARRAYCONSIGNATARIO[0]["TELEFONO_CONSIGNATARIO"];
        $EMAIL1CONSIGNATARIO=$ARRAYCONSIGNATARIO[0]["EMAIL1_CONSIGNATARIO"];
      }else{
        $NOMBRECONSIGNATARIO="Sin Datos";
        $EORICONSIGNATARIO="Sin Datos";
        $TELEFONOCONSIGNATARIO="Sin Datos";
        $DIRECCIONCONSIGNATARIO="Sin Datos";
        $EMAIL1CONSIGNATARIO="Sin Datos";
      }
      
      $ARRAYCVENTA = $CVENTA_ADO->verCventa( $ARRAYICARGA[0]['ID_CVENTA']);        
      if($ARRAYCVENTA){
        $NOMBRECVENTA=$ARRAYCVENTA[0]["NOMBRE_CVENTA"];
      }else{
        $NOMBRECVENTA="Sin Datos";
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
    $RAZONSOCIALEMPRESA =$ARRAYEMPRESA[0]["RAZON_SOCIAL_EMPRESA"];
    $RUTEMPRESA=$ARRAYEMPRESA[0]["RUT_EMPRESA"]."-".$ARRAYEMPRESA[0]["DV_EMPRESA"];
    $DIRECCIONEMPRESA=$ARRAYEMPRESA[0]["DIRECCION_EMPRESA"];
    $ARRAYCIUDAD=$CIUDAD_ADO->listarCiudadeCoProRePACBX($ARRAYEMPRESA[0]["ID_CIUDAD"]);
    if($ARRAYCIUDAD){
      $UBICACION=$ARRAYCIUDAD[0]["UBICACION"];
      $DIRECCIONEMPRESA=$DIRECCIONEMPRESA.", ".$UBICACION;
    }else{
      $DIRECCIONEMPRESA=$DIRECCIONEMPRESA;
    }

  }else{    
    $NOMBREEMPRESA="Sin Datos";
    $RUTEMPRESA="Sin Datos";
    $DIRECCIONEMPRESA="Sin Datos";
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
$FECHANORMAL2 = $DIA . "/" . $MES . "/" . $ANO;
$FECHANOMBRE = $NOMBREDIA . ", " . $DIA . " de " . $NOMBREMES . " del " . $ANO;





$html = '
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Debit or Credit Note</title>
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
        <td class="color2 left" width="70%">
          <b>'.$RAZONSOCIALEMPRESA.'</b> <br>
          '.$RUTEMPRESA.' <br>
          '.$DIRECCIONEMPRESA.' <br>          
        </td>
        <td class="color2 right">
     
        </td>
      </tr>
    </table>    
    </header>
    <main>
    
    <div class="titulo bcolor" >
      <div class="f20 titulo"  style="text-align: left; font-weight: bold;"> '.$NOMBRETNOTA.' NOTE  </div>    
      <div class="f15 titulo"  style="text-align: right;">  <b>  Reference Number: ' . $NUMEROIREFERENCIA . '   </b>  </div>      
    </div>   

    <br>
<div id="details" class="clearfix">
  <div id="client">
    <div class="address"> <b> Date Instructive:  </b> '.$FECHA.'  </div>
    <div class="address"> <b>  Consigne:  </b> '.$NOMBRECONSIGNATARIO.'  </div>
    <div class="address"> <b>  Address Consigne:  </b> '.$DIRECCIONCONSIGNATARIO.'  </div>
    <div class="address"> <b> Tributary id Consigne: </b>'.$EORICONSIGNATARIO.'  </div>
    <div class="address"> <b> Phone / Fax Consigne: </b>'.$TELEFONOCONSIGNATARIO.'  </div>
    <div class="address"> <b>  Email Consigne:  </b> '.$EMAIL1CONSIGNATARIO.'  </div>
    <div class="address"> <b>  Sales method:  </b>  '.$NOMBREMVENTA.' </div>
    <div class="address"> <b>  Incoterm:  </b>   '.$NOMBRECVENTA.'</div>
    <div class="address"> <b>  BL/AWB/CRT:  </b> '.$BOLAWBCRTINSTRUCTIVO.'  </div>
    <div class="address"> <b>  FDA Packing:  </b> '.$FDADESPACHOEX.'  </div>
  </div>
  <div id="client"> 
    ';
    if ($TEMBARQUE == "1") {
      $html = $html . '
        <div class="address"> <b>  Date ETD:   </b>  '.$FECHAETD.'</div>  
        <div class="address"> <b>  Date ETA:  </b>  '.$FECHAETA.' </div>
        <div class="address"> <b>  Container number:  </b> '.$NUMEROCONTENEDOR.'  </div>
        <div class="address"> <b>  Transport Name:  </b> '.$NOMBRETRANSPORTE.'  </div>
        <div class="address"> <b>  CRT:  </b> '.$CRT.'  </div>
        <div class="address"> <b>  Place of Shipment:   </b>'.$NOMBREORIGEN.'  </div>
        <div class="address"> <b>  Place of Destination:  </b> '.$NOMBREDESTINO.'  </div>
        <div class="address"> <b>  Loading place:   </b> '.$LUGARDECARGA.'  </div>
      ';
    }
    if ($TEMBARQUE == "2") {
        $html = $html . '
    
        <div class="address"> <b>  Date ETD:   </b>  '.$FECHAETD.'</div>  
        <div class="address"> <b>  Date ETA:  </b>  '.$FECHAETA.' </div>
        <div class="address"> <b>  Container number:  </b> '.$NUMEROCONTENEDOR.'  </div>
        <div class="address"> <b>  Airline Name:   </b>'.$NOMBRETRANSPORTE.'  </div>
        <div class="address"> <b>  Airplane:   </b>'.$NAVE.'  </div>
        <div class="address"> <b>  Airport of Shipment:  </b> '.$NOMBREORIGEN.'  </div>
        <div class="address"> <b>  Airport of Destination:   </b>'.$NOMBREDESTINO.'  </div>
        <div class="address"> <b>  Loading place:   </b>'.$LUGARDECARGA.'  </div>
    
        ';
     }
    if ($TEMBARQUE == "3") {
        $html = $html . '
    
        <div class="address"> <b>  Date ETD:  </b>   '.$FECHAETD.'</div>  
        <div class="address"> <b>  Date ETA:   </b> '.$FECHAETA.' </div>
        <div class="address"> <b>  Container number:  </b> '.$NUMEROCONTENEDOR.'  </div>
        <div class="address"> <b>  Shipping company name:  </b> '.$NOMBRETRANSPORTE.'  </div>
        <div class="address"> <b>  Vessel:   </b>'.$NAVE.'  </div>
        <div class="address"> <b>  Port of Shipment:   </b>'.$NOMBREORIGEN.'  </div>
        <div class="address"> <b>  Port of Destination:  </b> '.$NOMBREDESTINO.'  </div>
        <div class="address"> <b>  Loading place:   </b>'.$LUGARDECARGA.'  </div>
    
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
              <th colspan="12" class="center">DETAIL.</th>
            </tr>
            <tr>
              <th class="color center ">Amount Boxes</th>
              <th class="color center ">Description of goods </th>
              <th class="color center ">Net Weight </th>
              <th class="color center ">Gross Weight </th>
              <th class="color center ">Net Kilo </th>
              <th class="color center ">Gross Kilo </th>
              <th class="color center ">Type of currency </th>
              <th class="color center"> value CN/DN</th>
              <th class="color center ">Price</th>
              <th class="color center"> New price</th>
              <th class="color center ">Total</th>    
              <th class="color center ">New Total </th>    
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
                  <td class="center">'.$s['ENVASE'].'</td>
                    <td class="center">'.$NOMBREESTANTAR.'</td>
                    <td class="center">'.number_format($NETOESTANTAR, 2, ",", ".").'</td>
                    <td class="center">'.number_format($BRUTOESTANTAR, 2, ",", ".").'</td>
                    <td class="center">'.$s['NETO'].'</td>
                    <td class="center">'.$s['BRUTO'].'</td>
                    <td class="center">'.$NOMBRETMONEDA.'</td>
                    <td class=" center">'.$CANTIDADDNOTA.'</td>
                    <td class="center">'.$s['US'].'</td>
                    <td class=" center">'.$PRECIONUEVO.'</td>
                    <td class="center">'.$s['TOTALUS'].'</td>
                    <td class=" center">'.number_format($TOTALNUEVO, 0, "", ".").'</td>
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
                          <td class="color center">&nbsp;</td>
                          <td class="color center">&nbsp;</td>
                          <th class="color center">'.$TOTALUSV.'</th>
                          <th class="color center">'.number_format($TOTALPRECIOUSNUEVO, 0, "", ".").'</th>
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
$NOMBREARCHIVO = "DebitCreditNote_";
$FECHADOCUMENTO = $FECHANORMAL . "_" . $HORAFINAL;
$TIPODOCUMENTO = "Note";
$FORMATO = ".pdf";
$NOMBREARCHIVOFINAL = $NOMBREARCHIVO . $FECHADOCUMENTO . $FORMATO;

//CONFIGURACIOND DEL DOCUMENTO
$TIPOPAPEL = "LETTER";
$ORIENTACION = "P";
$LENGUAJE = "ES";
$UNICODE = "true";
$ENCODING = "UTF-8";

//DETALLE DEL CREADOR DEL INFORME
$TIPOINFORME = "Debit or Credit Note";
$CREADOR = "Usuario";
$AUTOR = "Usuario";
$ASUNTO = "Note";

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
