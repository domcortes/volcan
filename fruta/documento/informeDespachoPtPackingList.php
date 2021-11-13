<?php

//LLAMADA ARCHIVOS NECESARIOS PARA LAS OPERACIONES 
include_once '../controlador/TUSUARIO_ADO.php';
include_once '../controlador/USUARIO_ADO.php';
include_once '../controlador/EMPRESA_ADO.php';
include_once '../controlador/PLANTA_ADO.php';
include_once '../controlador/TEMPORADA_ADO.php';

include_once '../controlador/EEXPORTACION_ADO.php';
include_once '../controlador/EXIEXPORTACION_ADO.php';
include_once '../controlador/DESPACHOEX_ADO.php';
include_once '../controlador/ICARGA_ADO.php';

include_once '../controlador/EXPORTADORA_ADO.php';
include_once '../controlador/TINPSAG_ADO.php';
include_once '../controlador/VESPECIES_ADO.php';
include_once '../controlador/PRODUCTOR_ADO.php';
include_once '../controlador/INPECTOR_ADO.php';
include_once '../controlador/CONTRAPARTE_ADO.php';
include_once '../controlador/PAIS_ADO.php';
include_once '../controlador/TMANEJO_ADO.php';
include_once '../controlador/PROVINCIA_ADO.php';
include_once '../controlador/COMUNA_ADO.php';
include_once '../controlador/CIUDAD_ADO.php';
include_once '../controlador/TCALIBRE_ADO.php';



include_once '../modelo/INPSAG.php';
include_once '../modelo/EXIEXPORTACION.php';


//INCIALIZAR LAS VARIBLES
//INICIALIZAR CONTROLADOR
$TUSUARIO_ADO = new TUSUARIO_ADO();
$USUARIO_ADO = new USUARIO_ADO();
$EMPRESA_ADO =  new EMPRESA_ADO();
$PLANTA_ADO =  new PLANTA_ADO();
$TEMPORADA_ADO =  new TEMPORADA_ADO();



$EEXPORTACION_ADO = new EEXPORTACION_ADO();
$EXIEXPORTACION_ADO = new EXIEXPORTACION_ADO();
$DESPACHOEX_ADO =  new DESPACHOEX_ADO();

$ICARGA_ADO =  new ICARGA_ADO();
$EXPORTADORA_ADO =  new EXPORTADORA_ADO();
$TINPSAG_ADO =  new TINPSAG_ADO();
$VESPECIES_ADO =  new VESPECIES_ADO();
$PRODUCTOR_ADO = new PRODUCTOR_ADO();
$INPECTOR_ADO =  new INPECTOR_ADO();
$CONTRAPARTE_ADO =  new CONTRAPARTE_ADO();
$PAIS_ADO =  new PAIS_ADO();
$TMANEJO_ADO =  new TMANEJO_ADO();
$PROVINCIA_ADO =  new PROVINCIA_ADO();
$COMUNA_ADO =  new COMUNA_ADO();
$CIUDAD_ADO =  new CIUDAD_ADO();
$TCALIBRE_ADO =  new TCALIBRE_ADO();


//INCIALIZAR VARIBALES A OCUPAR PARA LA FUNCIONALIDAD
$NUMERO = "";
$NUMEROVER = "";
$IDDESPACHOEX = "";
$FECHADESPACHOEX = "";
$FECHAINGRESODESPACHOEX = "";
$FECHAMODIFCIACIONDESPACHOEX = "";
$TINPSAG = "";
$EMBARQUE = "";
$NOMBRETINPSAG = "";
$NOMBRETESTADOSAG = "";

$OBSERVACIONDESPACHOEX = "";
$INPECTOR = "";
$CONTRAPARTE = "";
$PAIS = "";
$EMPRESA = "";
$TEMPORADA = "";
$PLANTA = "";
$CALIBRE = "";
$TMANEJO = "";
$EMPRESAURL = "";

$CIF = "";

$TOTALENVASE = "";
$TOTALNETO = "";
$TOTALBRUTO = "";

$TOTALENVASE2 = "";
$TOTALNETO2 = "";
$TOTALBRUTO2 = "";

$CSGPRODUCTOR = "";
$NOMBREPRODUCTOR = "";
$COMUNAPRODUCTOR = "";
$PROVINCIAPRODUCTOR = "";

$CODIGOESTANDAR = "";
$NOMBREESTANDAR = "";
$NOMBREVARIEDAD = "";


$CSPPLANTA = "";
$RAZONPLANTA = "";
$COMUNAPLANTA = "";
$CIUDADPLANTA = "";

$CSPPLANTA2 = "";
$NOMBREPLANTA2 = "";
$COMUNAPLANTA2 = "";
$PROVINCIAPLANTA2 = "";


$CSPPLANTA3 = "";
$NOMBREPLANTA3 = "";
$COMUNAPLANTA3 = "";
$PROVINCIAPLANTA3 = "";
$NOMBRENAVE = "";
$NOMBREEXPORTADORA = "";
$NOMBRECONTRAPARTE = "";

$FECHAETA = "";
$FECHAETD = "";

//INICIALIZAR ARREGLOS
$ARRAYDESPACHOEX = "";
$ARRAYEXIEXPORTACION = "";
$ARRAYEXIEXPORTACION2 = "";
$ARRAYEXIEXPORTACIONBOLSA = "";
$ARRAYEXIEXPORTACIONBOLSA2 = "";
$ARRAYEXIEXPORTACIONBOLSA3 = "";

$ARRAYEXIEXPORTACIONPRODUCTOR = "";
$ARRAYEXIEXPORTACIONPRODUCTORESTANDAR = "";
$ARRAYEXIEXPORTACIONPRODUCTORESTANDARPVARIEDAD = "";

$ARRAYEXIEXPORTACIONPRODUCTORTOTAL = "";
$ARRAYEXIEXPORTACIONPRODUCTORESTANDARTOTAL = "";
$ARRAYEXIEXPORTACIONPRODUCTORESTANDARPVARIEDADTOTAL = "";

$ARRAYEXIEXPORTACIONTOTAL = "";
$ARRAYEXIEXPORTACIONTOTAL2 = "";
$ARRAYEXIEXPORTACIONBOLSATOTAL = "";

$ARRAYINPECTOR = "";
$ARRAYCONTRAPARTE = "";
$ARRAYPAIS = "";
$ARRAYCIUDAD = "";
$ARRAYCOMUNA = "";
$ARRAYPROVINCIA = "";


$ARRAYCIUDAD3 = "";
$ARRAYCOMUNA3 = "";
$ARRAYCIUDAD2 = "";
$ARRAYCOMUNA2 = "";
$ARRAYNAVE = "";

$ARRAYEXPORTADORA = "";
$ARRAYFOLIO = "";
$ARRAYEMPRESA = "";
$ARRAYPLANTA = "";
$ARRAYPLANTA2 = "";
$ARRAYTEMPORADA = "";
$ARRAYVESPECIES = "";
$ARRAYPVESPECIES = "";
$ARRAYEEXPORTACION = "";
$ARRAYPRODUCTOR = "";
$ARRAYCALIBRE = "";
$ARRAYTMANEJO = "";
$ARRAYUSUARIO = "";
$ARRAYICARGA = "";
$ARRAYCALIBRE="";



if (isset($_REQUEST['usuario'])) {
  $USUARIO = $_REQUEST['usuario'];
  $ARRAYUSUARIO = $USUARIO_ADO->ObtenerNombreCompleto($USUARIO);
  $NOMBRE = $ARRAYUSUARIO[0]["NOMBRE_COMPLETO"];
}




if (isset($_REQUEST['parametro'])) {
  $IDOP = $_REQUEST['parametro'];
}

$ARRAYDESPACHOEX = $DESPACHOEX_ADO->verDespachoex2($IDOP);
if($ARRAYDESPACHOEX){

  $ARRAYEXIEXPORTACION = $EXIEXPORTACION_ADO->buscarPorDespachoex2AgrupadoFolio($IDOP);
  $ARRAYEXIEXPORTACIONTOTAL = $EXIEXPORTACION_ADO->obtenerTotalesDespachoEx2($IDOP);
  $TOTALENVASE = $ARRAYEXIEXPORTACIONTOTAL[0]['ENVASE'];
  $TOTALNETO = $ARRAYEXIEXPORTACIONTOTAL[0]['NETO'];
  $TOTALBRUTO = $ARRAYEXIEXPORTACIONTOTAL[0]['BRUTO'];
  
  $ARRAYEXIEXPORTACIONBOLSA = $EXIEXPORTACION_ADO->buscarExistenciaDespachoexInspeccion2($IDOP);
  $ARRAYEXIEXPORTACIONBOLSATOTAL = $EXIEXPORTACION_ADO->obtenerTotalesExistenciaBolsaDespachoeEx2($IDOP);
  $TOTALENVASEBOLSA = $ARRAYEXIEXPORTACIONBOLSATOTAL[0]['ENVASE'];
  
  $NUMERODESPACHOEX = $ARRAYDESPACHOEX[0]['NUMERO_DESPACHOEX'];
  $FECHADESPACHOEX = $ARRAYDESPACHOEX[0]['FECHA'];
  $EMBARQUE = $ARRAYDESPACHOEX[0]['TEMBARQUE_DESPACHOEX'];
  $NUMEROGUIA = $ARRAYDESPACHOEX[0]['NUMERO_DESPACHOEX'];
  $NUMEROCONTENEDOR = $ARRAYDESPACHOEX[0]['NUMERO_CONTENEDOR_DESPACHOEX'];
  $FECHAETA = $ARRAYDESPACHOEX[0]['ETA'];
  $FECHAETD = $ARRAYDESPACHOEX[0]['ETD'];  
  $ESTADO = $ARRAYDESPACHOEX[0]['ESTADO'];
  if ($ARRAYDESPACHOEX[0]['ESTADO'] == 1) {
    $ESTADO = "Abierto";
  }else if ($ARRAYDESPACHOEX[0]['ESTADO'] == 0) {
    $ESTADO = "Cerrado";
  }else{
    $ESTADO="Sin Datos";
  }  
  
  
  $ARRAYCONTRAPARTE = $CONTRAPARTE_ADO->verContraparte($ARRAYDESPACHOEX[0]['ID_CONTRAPARTE']);
  if ($ARRAYCONTRAPARTE) {
    $NOMBRECONTRAPARTE = $ARRAYCONTRAPARTE[0]['ID_CONTRAPARTE'];
  }
  
  
  $ARRAYEXPORTADORA =$EXPORTADORA_ADO->verExportadora( $ARRAYDESPACHOEX[0]['ID_EXPPORTADORA']);
  if ($ARRAYEXPORTADORA) {
    $NOMBREEXPORTADORA = $ARRAYEXPORTADORA[0]['RAZON_SOCIAL_EXPORTADORA'];
  }
  
  if ($ARRAYDESPACHOEX[0]['ID_ICARGA']) {
    $ARRAYICARGA = $ICARGA_ADO->verIcarga($ARRAYDESPACHOEX[0]['ID_ICARGA']);
    if ($ARRAYICARGA) {
  
      $NUMEROICARGA = $ARRAYICARGA[0]['NUMERO_ICARGA'];
      $NUMEROICARGAFINAL = $ARRAYICARGA[0]['NREFERENCIA_ICARGA'];
    }
  } else {
    $NUMEROICARGA = "Sin Datos";
    $NUMEROICARGAFINAL = "Sin Datos";
  }
  
  $NOMBRENAVE = $ARRAYDESPACHOEX[0]['NAVE_DESPACHOEX'];
  
  
  if ($EMBARQUE == null || $EMBARQUE == "0") {
    $NOMBRETEMBARQUE = "Sin Tipo";
  }
  if ($EMBARQUE == "1") {
    $NOMBRETEMBARQUE = "Terrestre";
  }
  if ($EMBARQUE == "2") {
    $NOMBRETEMBARQUE = "Aereo";
  }
  if ($EMBARQUE == "3") {
    $NOMBRETEMBARQUE = "Maritimo";
  }
  
  
  
  
  
  $ARRAYPLANTA = $PLANTA_ADO->verPlanta($ARRAYDESPACHOEX[0]['ID_PLANTA']);
  $ARRAYEMPRESA = $EMPRESA_ADO->verEmpresa($ARRAYDESPACHOEX[0]['ID_EMPRESA']);
  $ARRAYTEMPORADA = $TEMPORADA_ADO->verTemporada($ARRAYDESPACHOEX[0]['ID_TEMPORADA']);
  $TEMPORADA = $ARRAYTEMPORADA[0]['NOMBRE_TEMPORADA'];
  $PLANTA = $ARRAYPLANTA[0]['NOMBRE_PLANTA'];
  
  
  
  
  $CSPPLANTA = $ARRAYPLANTA[0]['CODIGO_SAG_PLANTA'];
  $RAZONPLANTA = $ARRAYPLANTA[0]['RAZON_SOCIAL_PLANTA'];
  
  
  $ARRAYCIUDAD3 = $CIUDAD_ADO->verCiudad($ARRAYPLANTA[0]['ID_CIUDAD']);
  $CIUDADPLANTA = $ARRAYCIUDAD3[0]['NOMBRE_CIUDAD'];
  
  
  $ARRAYCOMUNA3 = $COMUNA_ADO->verComuna($ARRAYCIUDAD3[0]['ID_COMUNA']);
  $COMUNAPLANTA = $ARRAYCOMUNA3[0]['NOMBRE_COMUNA'];;
  
  $EMPRESA = $ARRAYEMPRESA[0]['NOMBRE_EMPRESA'];
  $EMPRESAURL = $ARRAYEMPRESA[0]['LOGO_EMPRESA'];
  
  if ($EMPRESAURL == "") {
    $EMPRESAURL = "img/empresa/no_disponible.png";
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
    <title>Informe Despacho</title>
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
        INFORME DESPACHO EXPORTACION
        <br>
        <b> Número Despacho: ' . $NUMERODESPACHOEX . '</b>
      </h2>
      <div id="details" class="clearfix">        
        <div id="invoice">
          <div class="date"><b>Código BRC: </b>REP-DESPTPL </div>  
          <div class="date"><b>Fecha Despacho: </b>' . $FECHADESPACHOEX . ' </div>
          <div class="date"><b>Empresa: </b>' . $EMPRESA . '</div>
          <div class="date"><b>Planta: </b>' . $PLANTA . '</div>
          <div class="date"><b>Temporada: </b>' . $TEMPORADA . '</div>
        </div>
        <div id="client">
           <div class="address"><b>Exportadora: </b>' . $NOMBREEXPORTADORA . '</div>
           <div class="address"><b>Establecimiento: </b>' . $RAZONPLANTA . '</div>
           <div class="address"><b>Comuna: </b>' . $COMUNAPLANTA . '</div>
           <div class="address"><b>Ciudad: </b>' . $CIUDADPLANTA . '</div>
           <div class="address"><b>CSP: </b>' . $CSPPLANTA . '</div>
           <div class="address"><b>Estado Despacho: </b> ' . $ESTADO . ' </div>
        </div>   
        <div id="client">
           <div class="address">
                <b>Número Intructivo: </b>' . $NUMEROICARGA . ' 
                <b>Número Final: </b>' . $NUMEROICARGAFINAL . '
            </div>
           <div class="address"><b>Número Guía: </b>' . $NUMEROGUIA . '</div>
           <div class="address"><b>Número Contenedor: </b>' . $NUMEROCONTENEDOR . '</div>
           <div class="address"><b>Nave : </b>' . $NOMBRENAVE . '</div>
           <div class="address"><b>Fecha ETD: </b>' . $FECHAETD . '</div>
           <div class="address"><b>Fecha ETA: </b>' . $FECHAETA . '</div>
        </div>            
      </div>     
      <table border="0" cellspacing="0" cellpadding="0">
        <thead>
          <tr>
            <th colspan="15" class="center">DETALLE DE DESPACHO.</th>
          </tr>
          <tr>
            <th class="color left">Folio</th>
            <th class="color center ">CSG </th>
            <th class="color center ">Productor </th>
            <th class="color center ">Comuna  </th>
            <th class="color center ">Provincia  </th>            
            <th class="color center ">CSP </th>            
            <th class="color center ">Planta </th>
            <th class="color center ">Comuna  </th>
            <th class="color center ">Provincia  </th>   
            <th class="color center">Fecha Embalado</th>
            <th class="color center">Código Estandar</th>
            <th class="color center">Envase/Estandar</th>
            <th class="color center ">Variedad </th>
            <th class="color center">Calibre</th>
            <th class="color center">Cantidad Envase</th>

          </tr>
        </thead>
         <tbody>
        ';


foreach ($ARRAYEXIEXPORTACION as $d) :



  $ARRAYEXIEXPORTACION2 = $EXIEXPORTACION_ADO->buscarPorFolio2Activo2DespachoEX($d['FOLIO_AUXILIAR_EXIEXPORTACION'], $IDOP);
  $ARRAYEXIEXPORTACIONTOTAL2 = $EXIEXPORTACION_ADO->obtenerTotalesFolio2DespachoExActivo2($d['FOLIO_AUXILIAR_EXIEXPORTACION'], $IDOP);

  $TOTALENVASE2 = $ARRAYEXIEXPORTACIONTOTAL2[0]['ENVASE'];
  $TOTALNETO2 = $ARRAYEXIEXPORTACIONTOTAL2[0]['NETO'];
  $TOTALBRUTO2 = $ARRAYEXIEXPORTACIONTOTAL2[0]['BRUTO'];


  foreach ($ARRAYEXIEXPORTACION2 as $d) :
    $ARRAYVERPRODUCTORID = $PRODUCTOR_ADO->verProductor($d['ID_PRODUCTOR']);
    $ARRAYCIUDAD = $CIUDAD_ADO->verCiudad($ARRAYVERPRODUCTORID[0]["ID_CIUDAD"]);
    $ARRAYCOMUNA = $COMUNA_ADO->verComuna($ARRAYCIUDAD[0]["ID_COMUNA"]);
    $COMUNAPRODUCTOR = $ARRAYCOMUNA[0]["NOMBRE_COMUNA"];
    $ARRAYPROVINCIA = $PROVINCIA_ADO->verProvincia($ARRAYCOMUNA[0]["ID_PROVINCIA"]);
    $PROVINCIAPRODUCTOR = $ARRAYPROVINCIA[0]["NOMBRE_PROVINCIA"];

    $ARRAYPLANTA2 = $PLANTA_ADO->verPlanta($d['ID_PLANTA']);
    if ($ARRAYPLANTA2) {
      $CSPPLANTA2 = $ARRAYPLANTA2[0]["CODIGO_SAG_PLANTA"];
      $NOMBREPLANTA2 = $ARRAYPLANTA2[0]["NOMBRE_PLANTA"];

      $ARRAYCIUDAD = $CIUDAD_ADO->verCiudad($ARRAYPLANTA2[0]["ID_CIUDAD"]);
      $ARRAYCOMUNA = $COMUNA_ADO->verComuna($ARRAYCIUDAD[0]["ID_COMUNA"]);
      $COMUNAPLANTA2 = $ARRAYCOMUNA[0]["NOMBRE_COMUNA"];
      $ARRAYPROVINCIA = $PROVINCIA_ADO->verProvincia($ARRAYCOMUNA[0]["ID_PROVINCIA"]);
      $PROVINCIAPLANTA2 = $ARRAYPROVINCIA[0]["NOMBRE_PROVINCIA"];
    }


    $ARRAYVESPECIES = $VESPECIES_ADO->verVespecies($d['ID_VESPECIES']);
    $ARRAYEEXPORTACION = $EEXPORTACION_ADO->verEstandar($d['ID_ESTANDAR']);
    $ARRAYTMANEJO = $TMANEJO_ADO->verTmanejo($d['ID_TMANEJO']);
    $TMANEJO = $ARRAYTMANEJO[0]['NOMBRE_TMANEJO'];

    if ($d['STOCK']) {
      $STOCK = $d['STOCK'];
    } else {
      $STOCK = "-";
    }
    if ($d['EMBOLSADO'] == "1") {
      $EMBOLSADO = "SI";
    }
    if ($d['EMBOLSADO'] == "0") {
      $EMBOLSADO = "NO";
    }

    $ARRAYCALIBRE = $TCALIBRE_ADO->verCalibre($d['ID_TCALIBRE']);
    if ($ARRAYCALIBRE) {
      $CALIBRE = $ARRAYCALIBRE[0]['NOMBRE_TCALIBRE'];
    } else {
      $CALIBRE  = "Sin Calibre";
    }

    $html = $html . '
          
                      <tr >
                          <th class=" left">' . $d['FOLIO_AUXILIAR_EXIEXPORTACION'] . '</th>
                          <td class="center">' . $ARRAYVERPRODUCTORID[0]['CSG_PRODUCTOR'] . '</td>
                          <td class="center">' . $ARRAYVERPRODUCTORID[0]['NOMBRE_PRODUCTOR'] . '</td>       
                          <td class="center">' . $COMUNAPRODUCTOR . '</td>          
                          <td class="center">' . $PROVINCIAPRODUCTOR . '</td>      
                          <td class="center">' . $CSPPLANTA2 . '</td>     
                          <td class="center">' . $NOMBREPLANTA2 . '</td>   
                          <td class="center">' . $COMUNAPLANTA2 . '</td>   
                          <td class="center">' . $PROVINCIAPLANTA2 . '</td>   
                          <td class=" center">' . $d['EMBALADO'] . '</td>
                          <td class="center">' . $ARRAYEEXPORTACION[0]['CODIGO_ESTANDAR'] . '</td>
                          <td class="center">' . $ARRAYEEXPORTACION[0]['NOMBRE_ESTANDAR'] . '</td>
                          <td class="center">' . $ARRAYVESPECIES[0]['NOMBRE_VESPECIES'] . '</td>
                          <td class="center">' . $CALIBRE . '</td>
                          <td class="center">' . $d['ENVASE'] . '</td>
                      </tr>
              ';



  endforeach;

  $html = $html . '
              
          <tr class="bt">
              <th class="color3 left">&nbsp;</th>
              <th class="color3 center">&nbsp;</th>
              <th class="color3 center">&nbsp;</th>
              <th class="color3 center">&nbsp;</th>
              <th class="color3 center">&nbsp;</th>
              <th class="color3 center">&nbsp;</th>
              <th class="color3 center">&nbsp;</th>
              <th class="color3 center">&nbsp;</th>
              <th class="color3 center">&nbsp;</th>
              <th class="color3 center">&nbsp;</th>
              <th class="color3 center">&nbsp;</th>
              <th class="color3 center">&nbsp;</th>
              <th class="color3 center">&nbsp;</th>
              <th class="color3 right"> Total </th>
              <th class="color3 center">' . $TOTALENVASE2 . '</th>
          </tr>
      ';

endforeach;

$html = $html . '
              
          <tr class="bt">
              <th class="color left">&nbsp;</th>
              <th class="color center">&nbsp;</th>
              <th class="color center">&nbsp;</th>
              <th class="color center">&nbsp;</th>
              <th class="color center">&nbsp;</th>
              <th class="color center">&nbsp;</th>
              <th class="color center">&nbsp;</th>
              <th class="color center">&nbsp;</th>
              <th class="color center">&nbsp;</th>
              <th class="color center">&nbsp;</th>
              <th class="color center">&nbsp;</th>
              <th class="color center">&nbsp;</th>
              <th class="color center">&nbsp;</th>
              <th class="color right"> Total </th>
              <th class="color center">' . $TOTALENVASE . '</th>
          </tr>
      ';



$html = $html . '
        </tbody>
      </table>

      ';


$html = $html . '
      <table border="0" cellspacing="0" cellpadding="0">
        <thead>
          <tr>
            <th colspan="6" class="center">RESUMEN.</th>
          </tr>
          <tr>
            <th class="color left">CSG</th>
            <th class="color center ">Nombre Productor </th>
            <th class="color center ">Comuna </th>
            <th class="color center">Envase/Estandar</th>
            <th class="color center ">Variedad </th>
            <th class="color center">Cantidad Envase</th>
          </tr>
        </thead>
         <tbody>
';

foreach ($ARRAYEXIEXPORTACIONBOLSA as $a) :

  $ARRAYEXIEXPORTACIONPRODUCTOR = $EXIEXPORTACION_ADO->buscarExistenciaBolsaDespachoEx2DiferenciadoProductor($IDOP, $a['ID_PRODUCTOR']);
  $ARRAYEXIEXPORTACIONPRODUCTORTOTAL = $EXIEXPORTACION_ADO->obtenerTotalesExistenciaBolsaDespachoeExnDiferenciadoProductor2($IDOP, $a['ID_PRODUCTOR']);
  $TOTALENVASEPRODUCTOR = $ARRAYEXIEXPORTACIONPRODUCTORTOTAL[0]['ENVASE'];

  foreach ($ARRAYEXIEXPORTACIONPRODUCTOR as $b) :
    $ARRAYVERPRODUCTORID = $PRODUCTOR_ADO->verProductor($b['ID_PRODUCTOR']);
    $ARRAYCIUDAD = $CIUDAD_ADO->verCiudad($ARRAYVERPRODUCTORID[0]["ID_CIUDAD"]);
    $ARRAYCOMUNA = $COMUNA_ADO->verComuna($ARRAYCIUDAD[0]["ID_COMUNA"]);

    $CSGPRODUCTOR = $ARRAYVERPRODUCTORID[0]["CSG_PRODUCTOR"];
    $NOMBREPRODUCTOR = $ARRAYVERPRODUCTORID[0]["NOMBRE_PRODUCTOR"];
    $COMUNAPRODUCTOR = $ARRAYCOMUNA[0]["NOMBRE_COMUNA"];


    $ARRAYEXIEXPORTACIONBOLSA2 = $EXIEXPORTACION_ADO->buscarExistenciaBolsaDespachoEx2ProductorDiferenciadoProductorEstandar($IDOP, $b['ID_PRODUCTOR']);
    foreach ($ARRAYEXIEXPORTACIONBOLSA2 as $c) :

      $ARRAYEXIEXPORTACIONPRODUCTORESTANDAR = $EXIEXPORTACION_ADO->buscarExistenciaBolsaDespachoEx2ProductorEstandarDiferenciadoProductorEstandar($IDOP, $c['ID_PRODUCTOR'], $c['ID_ESTANDAR']);
      $ARRAYEXIEXPORTACIONPRODUCTORESTANDARTOTAL = $EXIEXPORTACION_ADO->obtenerTotalesExistenciaBolsaDespachoEx2ProductorEstandarDiferenciadoProductorEstandar($IDOP, $c['ID_PRODUCTOR'], $c['ID_ESTANDAR']);
      $TOTALENVASEESTANDAR = $ARRAYEXIEXPORTACIONPRODUCTORESTANDARTOTAL[0]['ENVASE'];


      foreach ($ARRAYEXIEXPORTACIONPRODUCTORESTANDAR as $d) :
        $ARRAYEEXPORTACION = $EEXPORTACION_ADO->verEstandar($d['ID_ESTANDAR']);
        $CODIGOESTANDAR = $ARRAYEEXPORTACION[0]["CODIGO_ESTANDAR"];
        $NOMBREESTANDAR = $ARRAYEEXPORTACION[0]["NOMBRE_ESTANDAR"];

        $ARRAYEXIEXPORTACIONBOLSA3 = $EXIEXPORTACION_ADO->buscarExistenciaBolsaDespachoEx2ProductorEstandarDiferenciadoProductorEstandarVariedad($IDOP, $d['ID_PRODUCTOR'], $d['ID_ESTANDAR']);
        foreach ($ARRAYEXIEXPORTACIONBOLSA3 as $e) :

          $ARRAYEXIEXPORTACIONPRODUCTORESTANDARPVARIEDAD = $EXIEXPORTACION_ADO->buscarExistenciaBolsaDespachoeEx2ProductorEstandarVariedadDiferenciadoProductorEstandarVariedad($IDOP, $e['ID_PRODUCTOR'], $e['ID_ESTANDAR'], $e['ID_VESPECIES']);
          $ARRAYEXIEXPORTACIONPRODUCTORESTANDARPVARIEDADTOTAL = $EXIEXPORTACION_ADO->obtenerTotalesExistenciaBolsaDespachoeEx2ProductorEstandarVariedadDiferenciadoProductorEstandarVariedad($IDOP, $e['ID_PRODUCTOR'], $e['ID_ESTANDAR'], $e['ID_VESPECIES']);
          $TOTALENVASEVARIEDAD = $ARRAYEXIEXPORTACIONPRODUCTORESTANDARPVARIEDADTOTAL[0]['ENVASE'];

          foreach ($ARRAYEXIEXPORTACIONPRODUCTORESTANDARPVARIEDAD as $f) :

            $ARRAYVESPECIES = $VESPECIES_ADO->verVespecies($f['ID_VESPECIES']);
            $NOMBREVARIEDAD = $ARRAYVESPECIES[0]["NOMBRE_VESPECIES"];

            $html = $html . '              
            <tr >
                <td class="left">' .  $CSGPRODUCTOR . '</td>
                <td class="center">' . $NOMBREPRODUCTOR . '</td>
                <td class="center">' . $COMUNAPRODUCTOR . '</td>
                <td class="center">' . $NOMBREESTANDAR . '</td>
                <td class="center">' . $NOMBREVARIEDAD . '</td>
                <th class="center">' . $TOTALENVASEVARIEDAD . '</th>
            </tr>
            ';


          endforeach;


        endforeach;


      endforeach;

      $html = $html . '              
        <tr class="bt">
            <th class="color2 center">&nbsp;</th>
            <th class="color2 center">&nbsp;</th>
            <th class="color2 center">&nbsp;</th>
            <th class="color2 center">&nbsp;</th>
            <th class="color2 right"> Total Estandar </th>
            <th class="color2 center">' . $TOTALENVASEESTANDAR . '</th>¿
        </tr>
      ';

    endforeach;



  endforeach;
  $html = $html . '              
  <tr class="bt">
      <th class="color2 center">&nbsp;</th>
      <th class="color2 center">&nbsp;</th>
      <th class="color2 center">&nbsp;</th>
      <th class="color2 center">&nbsp;</th>
      <th class="color2 right"> Total Productor </th>
      <th class="color2 center">' . $TOTALENVASEPRODUCTOR . '</th>¿
  </tr>
';


endforeach;
$html = $html . '              
<tr class="bt">
    <th class="color center">&nbsp;</th>
    <th class="color center">&nbsp;</th>
    <th class="color center">&nbsp;</th>
    <th class="color center">&nbsp;</th>
    <th class="color right"> Total  </th>
    <th class="color center">' . $TOTALENVASEBOLSA . '</th>¿
</tr>
';


$html = $html . '
        </tbody>
      </table>

      ';

$html = $html . '
      <div id="details" class="clearfix">
        <div id="client">
          <div class="address"><b></b></div>
          <div class="address"> </div>
          <div class="address"></div>
          <div class="address"></div>
          <div class="address"></div>
        </div>
      </div>
   

    </main>
  </body>
</html>

';






//CREACION NOMBRE DEL ARCHIVO
$NOMBREARCHIVO = "InformeDespachoexPackingList_";
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
$TIPOINFORME = "Informe Despacho Exportación Packing List";
$CREADOR = "Usuario";
$AUTOR = "Usuario";
$ASUNTO = "Informe";

//API DE GENERACION DE PDF
require_once '../../api/mpdf/mpdf/autoload.php';
//$PDF = new \Mpdf\Mpdf();W
$PDF = new \Mpdf\Mpdf(['format' => 'letter-L']);

//CONFIGURACION FOOTER Y HEADER DEL PDF
//CONFIGURACION FOOTER Y HEADER DEL PDF
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
