<?php

//LLAMADA ARCHIVOS NECESARIOS PARA LAS OPERACIONES 
include_once '../controlador/TUSUARIO_ADO.php';
include_once '../controlador/USUARIO_ADO.php';
include_once '../controlador/EMPRESA_ADO.php';
include_once '../controlador/PLANTA_ADO.php';
include_once '../controlador/TEMPORADA_ADO.php';


include_once '../controlador/DRECEPCION_ADO.php';
include_once '../controlador/RECEPCION_ADO.php';
include_once '../controlador/TRECEPCION_ADO.php';
include_once '../controlador/FOLIO_ADO.php';
include_once '../controlador/PVESPECIES_ADO.php';
include_once '../controlador/VESPECIES_ADO.php';
include_once '../controlador/ERECEPCION_ADO.php';
include_once '../controlador/PRODUCTOR_ADO.php';
include_once '../controlador/TRANSPORTE_ADO.php';
include_once '../controlador/CONDUCTOR_ADO.php';
include_once '../controlador/TMANEJO_ADO.php';



//INCIALIZAR LAS VARIBLES
//INICIALIZAR CONTROLADOR
$TUSUARIO_ADO = new TUSUARIO_ADO();
$USUARIO_ADO = new USUARIO_ADO();
$EMPRESA_ADO =  new EMPRESA_ADO();
$PLANTA_ADO =  new PLANTA_ADO();
$TEMPORADA_ADO =  new TEMPORADA_ADO();

$DRECEPCION_ADO = new DRECEPCION_ADO();
$TRECEPCION_ADO = new TRECEPCION_ADO();
$RECEPCION_ADO = new RECEPCION_ADO();
$FOLIO_ADO =  new FOLIO_ADO();
$ERECEPCION_ADO =  new ERECEPCION_ADO();
$PVESPECIES_ADO = new PVESPECIES_ADO();
$VESPECIES_ADO = new VESPECIES_ADO();
$PRODUCTOR_ADO =  new PRODUCTOR_ADO();
$TRANSPORTE_ADO =  new TRANSPORTE_ADO();
$CONDUCTOR_ADO =  new CONDUCTOR_ADO();
$TMANEJO_ADO = new TMANEJO_ADO();

//INCIALIZAR VARIBALES A OCUPAR PARA LA FUNCIONALIDAD
$IDOP = "";
$NUMERORECEPCION = "";
$FECHARECEPCION = "";
$NUMEROGUIA = "";
$HORARECEPCION = "";
$TOTALGUIA = "";
$FECHAGUIA = "";
$FOLIO = "";
$PRODUCTOR = "";
$CSGPRODUCTOR = "";
$TRANSPORTE = "";
$CONDUCTOR = "";
$PATENTE = "";



$CODIGOPRODUCTOR = "";
$NOMBREPRODUCTOR = "";
$NOMBRETIPO = "";
$EMPRESA = "";
$TEMPORADA = "";
$PLANTA = "";
$EMPRESAURL = "";
$FOLIOBASE = "";
$TOTALENVASE = "";
$TOTALNETO = "";
$TOTALBRUTO = "";

$TOTALENVASEGENERAL = "";
$TOTALNETOGENERAL = "";
$TOTALBRUTOGENERAL = "";


//INICIALIZAR ARREGLOS
$ARRAYRECEPCION = "";
$ARRAYTRECEPCION = "";
$ARRAYDRECEPCION = "";
$ARRAYDRECEPCION2 = "";
$ARRAYDRECEPCIONTOTAL = "";
$ARRAYFOLIO = "";
$ARRAYEMPRESA = "";
$ARRAYPLANTA = "";
$ARRAYTEMPORADA = "";
$ARRAYVESPECIES = "";
$ARRAYPVESPECIES = "";
$ARRAYEEXPORTACION = "";
$ARRAYPRODUCTOR = "";

$ARRAYTRANSPORTE = "";
$ARRAYCONDUCTOR = "";
$ARRAYTMANEJO="";
$ARRAYUSUARIO="";

if(isset($_REQUEST['NOMBREUSUARIO'])){
  $NOMBREUSUARIO = $_REQUEST['NOMBREUSUARIO'];
  $ARRAYUSUARIO=$USUARIO_ADO->ObtenerNombreCompleto($NOMBREUSUARIO);
  $NOMBRE = $ARRAYUSUARIO[0]["NOMBRE_COMPLETO"];
  
}

if (isset($_REQUEST['parametro'])) {
  $IDOP = $_REQUEST['parametro'];
}

$ARRAYRECEPCION = $RECEPCION_ADO->verRecepcion2($IDOP);
$ARRAYDRECEPCION = $DRECEPCION_ADO->obtenerTotalPorVariedadDrecepcion2($IDOP);
$ARRAYDRECEPCIONTOTAL = $DRECEPCION_ADO->obtenerTotales2($IDOP);

$TOTALENVASEGENERAL = $ARRAYDRECEPCIONTOTAL[0]['TOTAL_ENVASE'];
$TOTALNETOGENERAL = $ARRAYDRECEPCIONTOTAL[0]['TOTAL_NETO'];
$TOTALBRUTOGENERAL = $ARRAYDRECEPCIONTOTAL[0]['TOTAL_BRUTO'];

$ARRAYTRECEPCION = $TRECEPCION_ADO->verTrecepcion($ARRAYRECEPCION[0]['ID_TRECEPCION']);
$NOMBRETIPO = $ARRAYTRECEPCION[0]['NOMBRE_TRECEPCION'];

$NUMERORECEPCION = $ARRAYRECEPCION[0]['NUMERO_RECEPCION'];
$FECHARECEPCION = $ARRAYRECEPCION[0]['FECHA_RECEPCIONR'];
$HORARECEPCION = $ARRAYRECEPCION[0]['HORA_RECEPCION'];
$NUMEROGUIA = $ARRAYRECEPCION[0]['NUMERO_GUIA_RECEPCION'];
$FECHAGUIA = $ARRAYRECEPCION[0]['FECHA_GUIA_RECEPCION'];
$TOTALGUIA = $ARRAYRECEPCION[0]['TOTAL_GUIA'];
$PRODUCTOR = $ARRAYRECEPCION[0]['ID_PRODUCTOR'];
$PATENTE = $ARRAYRECEPCION[0]['PATENTE_VEHICULO'];


$ARRAYTRANSPORTE = $TRANSPORTE_ADO->verTransporte($ARRAYRECEPCION[0]['ID_TRANSPORTE']);
$ARRAYCONDUCTOR = $CONDUCTOR_ADO->verConductor($ARRAYRECEPCION[0]['ID_CONDUCTOR']);;

$TRANSPORTE = $ARRAYTRANSPORTE[0]['NOMBRE_TRANSPORTE'];
$CONDUCTOR = $ARRAYCONDUCTOR[0]['NOMBRE_CONDUCTOR'];



$TOTALENVASE = $ARRAYRECEPCION[0]['CANTIDAD_ENVASE_RECEPCION'];
$TOTALNETO = $ARRAYRECEPCION[0]['KILOS_NETO_RECEPCION'];
$TOTALBRUTO = $ARRAYRECEPCION[0]['KILOS_BRUTO_RECEPCION'];



$ARRAYPRODUCTOR = $PRODUCTOR_ADO->verProductor($PRODUCTOR);
$NOMBREPRODUCTOR = $ARRAYPRODUCTOR[0]['NOMBRE_PRODUCTOR'];
$CSGPRODUCTOR = $ARRAYPRODUCTOR[0]['CSG_PRODUCTOR'];

$ARRAYFOLIO = $FOLIO_ADO->verFolio($FOLIO);

$ARRAYEMPRESA = $EMPRESA_ADO->verEmpresa($ARRAYRECEPCION[0]['ID_EMPRESA']);

$ARRAYPLANTA = $PLANTA_ADO->verPlanta($ARRAYRECEPCION[0]['ID_PLANTA']);
$ARRAYTEMPORADA = $TEMPORADA_ADO->verTemporada($ARRAYRECEPCION[0]['ID_TEMPORADA']);
$TEMPORADA = $ARRAYTEMPORADA[0]['NOMBRE_TEMPORADA'];
$PLANTA = $ARRAYPLANTA[0]['NOMBRE_PLANTA'];

$EMPRESA = $ARRAYEMPRESA[0]['NOMBRE_EMPRESA'];
$EMPRESAURL = $ARRAYEMPRESA[0]['LOGO_EMPRESA'];

if ($EMPRESAURL == "") {
  $EMPRESAURL = "img/empresa/no_disponible.png";
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
$FECHANOMBRE = $NOMBREDIA . ", " . $DIA . " de " . $NOMBREMES . " del " . $ANO;


$html = '
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Informe Recepcion</title>
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
        INFORME RECEPCION GRANEL
        <br>
        <b> Numero Recepcion: ' . $NUMERORECEPCION . '</b>
      </h2>
      <div id="details" class="clearfix">
        
        <div id="invoice">
          <div class="date"><b>Fecha Recepcion: </b>' . $FECHARECEPCION . ' </div>
          <div class="date"><b>Hora Recepcion: </b>' . $HORARECEPCION . '  </div>
          <div class="date"><b>Empresa: </b>' . $EMPRESA . '</div>
          <div class="date"><b>Planta: </b>' . $PLANTA . '</div>
          <div class="date"><b>Temporada: </b>' . $TEMPORADA . '</div>
        </div>

        <div id="client">
          <div class="address"><b>Tipo Recepcion: </b>' . $NOMBRETIPO . '</div>
          <div class="address"><b>Numero Guia: </b>' . $NUMEROGUIA . ' </div>
          <div class="address"><b>Kilos Guia: </b>' . $TOTALGUIA . '  </div>
          <div class="address"><b>Nombre Productor: </b>' . $NOMBREPRODUCTOR . '</div>
          <div class="address"><b>CSG: </b>' . $CSGPRODUCTOR . '</div>
        </div>
        
      </div>
      <table border="0" cellspacing="0" cellpadding="0">
        <thead>
          <tr>
            <th colspan="8" class="center">DETALLE DE RECEPCIÓN.</th>
          </tr>
          <tr>
            <th class="color left">Folio</th>
            <th class="color left">Envase/Estandar</th>
            <th class="color center">Cant. Envase</th>
            <th class="color center">Kilos Neto</th>
            <th class="color center">Kilos Bruto</th>
            <th class="color center ">Variedad </th>
            <th class="color center ">Gasificacion </th>
            <th class="color center ">Tipo Manejo </th>
          </tr>
        </thead>
         <tbody>
        ';
foreach ($ARRAYDRECEPCION as $d) :

  //$ARRAYPVESPECIES=$PVESPECIES_ADO->verPvespecies($s['ID_PVESPECIES']);
  // $ARRAYVESPECIES=$VESPECIES_ADO->verVespecies($ARRAYPVESPECIES[0]['ID_VESPECIES']);
  $ARRAYDRECEPCION2 = $DRECEPCION_ADO->buscarPorIdRecepcionParaPvespeciesVespecies2($IDOP, $d['ID_VESPECIES']);


  foreach ($ARRAYDRECEPCION2 as $s) :
    $ARRAYEEXPORTACION = $ERECEPCION_ADO->verEstandar($s['ID_ESTANDAR']);
    if ($s['GASIFICADO_DRECEPCION'] == "1") {
      $GASIFICACION = "SI";
    }
    if ($s['GASIFICADO_DRECEPCION'] == "0") {
      $GASIFICACION =  "NO";
    }

    $ARRAYTMANEJO=$TMANEJO_ADO->verTmanejo($s['ID_TMANEJO']);

    $html = $html . '
          
                      <tr >
                          <th class=" left">' . $s['FOLIO_DRECEPCION'] . '</th>
                          <td class="left">' . $ARRAYEEXPORTACION[0]['NOMBRE_ESTANDAR'] . '</td>
                          <td class="center">' . $s['ENVASE_VARIEDADDR'] . '</td>
                          <td class="center">' . $s['NETO_VARIEDADDR'] . '</td>
                          <td class="center">' . $s['BRUTO_VARIEDADDR'] . '</td>
                          <td class=" center">' . $s['NOMBRE_VESPECIES'] . '</td>
                          <td class=" center">' . $GASIFICACION . '</td>
                          <td class=" center">' . $ARRAYTMANEJO[0]['NOMBRE_TMANEJO'] . '</td>
                      </tr>
              ';

  endforeach;
  
  $html = $html . '
              
                  <tr class="bt">
                      <th class=" left">&nbsp;</th>
                      <th class=" left">SUB TOTAL</th>
                      <th class="center">' . $d['TOTAL_ENVASE_VARIEDAD'] . '</th>
                      <th class="center">' . $d['TOTAL_NETO_VARIEDAD'] . '</th>
                      <th class="center">' . $d['TOTAL_BRUTO_VARIEDAD'] . '</th>
                      <th class=" center">&nbsp;</th>
                      <th class=" center">&nbsp;</th>
                      <th class=" center">&nbsp;</th>
                  </tr>
              ';


endforeach;
$html = $html . '
              
          <tr class="bt">
              <th class="color left">&nbsp;</th>
              <th class="color left"> TOTAL RECEPCION</th>
              <th class="color center">' . $TOTALENVASEGENERAL . '</th>
              <th class="color center">' . $TOTALNETOGENERAL . '</th>
              <th class="color center">' . $TOTALBRUTOGENERAL . '</th>
              <th class="color center">&nbsp;</th>
              <th class="color center">&nbsp;</th>
              <th class="color center">&nbsp;</th>
          </tr>
      ';



$html = $html . '
        </tbody>
      </table>
      <div id="details" class="clearfix">
        <div id="client">
          <div class="address"><b>INFORMACION DE TRANSPORTE</b></div>
          <div class="address">EMPRESA TRANSPORTE:  ' . $TRANSPORTE . ' </div>
          <div class="address">CONDUCTOR: ' . $CONDUCTOR . '</div>
          <div class="address">PATENTE: ' . $PATENTE . '</div>
        </div>
      </div>
      <div id="notices">
        <div>IMPORTANTE:</div>
        <div class="notice">Este informe muestra información del momento en que fue generado, si tiene algun inconveniente por favor contactar a <a href="mailto:ti@fvolcan.cl">ti@fvolcan.cl</a>.</div>
      </div>
      <br>
      <br>    
              <table >      
                <tr>
                  <td class="color2 center" style="width: 30%;" > </td>
                  <td class="color2  center" style="width: 10%;"> <hr> </td>
                  <td class="color2 right" style="width: 30%;"> </td>
                </tr>
                <tr>
                  <td class="color2 center" style="width: 30%;" > </td>
                  <td class="color2  center" style="width: 10%;"> Firma Responsable <br> '.$NOMBRE.' </td>
                  <td class="color2 center" style="width: 30%;"> </td>
                </tr>    
              </table>
      
    </main>
    <footer>
      Informe generado por Departamento TI Fruticola Volcan
      <br>
      <a href="mailto:ti@fvolcan.cl">ti@fvolcan.cl</a>
      
    </footer>
  </body>
</html>

';






//CREACION NOMBRE DEL ARCHIVO
$NOMBREARCHIVO = "InformeRecepionGranel_";
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
$TIPOINFORME = "Informe Recepcion Granel";
$CREADOR = "Usuario";
$AUTOR = "Usuario";
$ASUNTO = "Informe";

//API DE GENERACION DE PDF
require_once '../api/mpdf/mpdf/autoload.php';
//$PDF = new \Mpdf\Mpdf();W
$PDF = new \Mpdf\Mpdf(['format' => 'letter']);

//CONFIGURACION FOOTER Y HEADER DEL PDF
$PDF->SetHTMLHeader('
    <table width="100%" >
        <tbody>
            <tr>
                <th width="55%" class="left f10">' . $EMPRESA . '</th>
                <td width="45%" class="right f10">' . $FECHANOMBRE . '</td>
                <td width="10%" class="right f10">' . $HORAFINAL2 . '</td>
            </tr>
        </tbody>
    </table>
    <br>
    
');

$PDF->SetHTMLFooter('
    <table width="100%" >
        <tbody>
            <tr>
                <td width="35%" class="left"><span>{PAGENO}/{nbpg}</span></td>
                <td width="30%"  class="center f10">
                       
                        ' . $EMPRESA . '
                </td>
                <td width="35%"  class="right">{DATE j-m-Y}</td>
            </tr>
        </tbody>
    </table>
    
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
