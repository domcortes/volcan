<?php

//LLAMADA ARCHIVOS NECESARIOS PARA LAS OPERACIONES 
include_once '../controlador/TUSUARIO_ADO.php';
include_once '../controlador/USUARIO_ADO.php';
include_once '../controlador/EMPRESA_ADO.php';
include_once '../controlador/PLANTA_ADO.php';
include_once '../controlador/TEMPORADA_ADO.php';


include_once '../controlador/EEXPORTACION_ADO.php';
include_once '../controlador/EXIEXPORTACION_ADO.php';
include_once '../controlador/INPSAG_ADO.php';
include_once '../controlador/TINPSAG_ADO.php';

include_once '../controlador/VESPECIES_ADO.php';
include_once '../controlador/PVESPECIES_ADO.php';
include_once '../controlador/PRODUCTOR_ADO.php';
include_once '../controlador/INPECTOR_ADO.php';
include_once '../controlador/CONTRAPARTE_ADO.php';
include_once '../controlador/PAIS_ADO.php';
include_once '../controlador/TMANEJO_ADO.php';



include_once '../modelo/INPSAG.php';
include_once '../modelo/EXIEXPORTACION.php';


//INCIALIZAR LAS VARIBLES
//INICIALIZAR CONTROLADOR
$TUSUARIO_ADO = new TUSUARIO_ADO();
$USUARIO_ADO = new USUARIO_ADO();
$EMPRESA_ADO =  new EMPRESA_ADO();
$PLANTA_ADO =  new PLANTA_ADO();
$TEMPORADA_ADO =  new TEMPORADA_ADO();


$VESPECIES_ADO =  new VESPECIES_ADO();
$PVESPECIES_ADO =  new PVESPECIES_ADO();
$PRODUCTOR_ADO = new PRODUCTOR_ADO();

$EEXPORTACION_ADO = new EEXPORTACION_ADO();
$EXIEXPORTACION_ADO = new EXIEXPORTACION_ADO();
$INPSAG_ADO =  new INPSAG_ADO();
$TINPSAG_ADO =  new TINPSAG_ADO();
$INPECTOR_ADO =  new INPECTOR_ADO();
$CONTRAPARTE_ADO =  new CONTRAPARTE_ADO();
$PAIS_ADO =  new PAIS_ADO();
$TMANEJO_ADO =  new TMANEJO_ADO();

//INCIALIZAR VARIBALES A OCUPAR PARA LA FUNCIONALIDAD
$NUMERO = "";
$NUMEROVER = "";
$IDINPSAG = "";
$FECHAINPSAG = "";
$FECHAINGRESOINPSAG = "";
$FECHAMODIFCIACIONINPSAG = "";
$TINPSAG = "";
$TESTADOSAG = "";
$NOMBRETINPSAG = "";
$NOMBRETESTADOSAG = "";

$OBSERVACIONINPSAG = "";
$INPECTOR="";
$CONTRAPARTE="";
$PAIS="";
$EMPRESA = "";
$TEMPORADA = "";
$PLANTA = "";
$CALIBRE = "";
$TMANEJO = "";
$EMPRESAURL = "";
$CIF="";
$NOMBREUSUARIO="";
$NOMBRE="";


$TOTALENVASE = "";
$TOTALNETO = "";
$TOTALBRUTO = "";



//INICIALIZAR ARREGLOS
$ARRAYINPSAGPT = "";
$ARRAYEXIEXPORTACION = "";
$ARRAYEXIEXPORTACIONTOTAL = "";
$ARRAYINPECTOR="";
$ARRAYCONTRAPARTE="";
$ARRAYPAIS="";

$ARRAYFOLIO = "";
$ARRAYEMPRESA = "";
$ARRAYPLANTA = "";
$ARRAYTEMPORADA = "";
$ARRAYVESPECIES = "";
$ARRAYPVESPECIES = "";
$ARRAYEEXPORTACION = "";
$ARRAYPRODUCTOR = "";
$ARRAYCALIBRE = "";
$ARRAYTMANEJO = "";
$ARRAYUSUARIO="";



if(isset($_REQUEST['NOMBREUSUARIO'])){
  $NOMBREUSUARIO = $_REQUEST['NOMBREUSUARIO'];
  $ARRAYUSUARIO=$USUARIO_ADO->ObtenerNombreCompleto($NOMBREUSUARIO);
  $NOMBRE = $ARRAYUSUARIO[0]["NOMBRE_COMPLETO"];
  
}
if (isset($_REQUEST['parametro'])) {
  $IDOP = $_REQUEST['parametro'];
}

$ARRAYINPSAGPT = $INPSAG_ADO->verInpsag2($IDOP);
$ARRAYEXIEXPORTACION = $EXIEXPORTACION_ADO->buscarPorSag2($IDOP);
$ARRAYEXIEXPORTACIONTOTAL = $EXIEXPORTACION_ADO->obtenerTotalesInspSag2($IDOP);

$TOTALENVASE = $ARRAYEXIEXPORTACIONTOTAL[0]['TOTAL_ENVASE'];
$TOTALNETO = $ARRAYEXIEXPORTACIONTOTAL[0]['TOTAL_NETO'];
$TOTALBRUTO = $ARRAYEXIEXPORTACIONTOTAL[0]['TOTAL_BRUTO'];





$NUMEROINPSAG = $ARRAYINPSAGPT[0]['NUMERO_INPSAG'];
$FECHAINPSAG = $ARRAYINPSAGPT[0]['FECHA'];
$ARRAYTINPSAG = $TINPSAG_ADO->verTinpsag($ARRAYINPSAGPT[0]['ID_TINPSAG']);
$NOMBRETINPSAG = $ARRAYTINPSAG[0]['NOMBRE_TINPSAG'];
$TESTADOSAG = $ARRAYINPSAGPT[0]['TESTADOSAG'];
$CIF=$ARRAYINPSAGPT[0]['CIF_INPSAG'];

if ($TESTADOSAG== null || $TESTADOSAG == "0") {
  $NOMBRETESTADOSAG = "Sin Condición";
}
if ($TESTADOSAG == "1") {
  $NOMBRETESTADOSAG = "En Inspección";
}
if ($TESTADOSAG == "2") {
  $NOMBRETESTADOSAG = "Aprobado Origen";
}
if ($TESTADOSAG == "3") {
  $NOMBRETESTADOSAG = "Aprobado USLA";
}
if ($TESTADOSAG == "4") {
  $NOMBRETESTADOSAG = "Fumigado";
}
if ($TESTADOSAG == "5") {
  $NOMBRETESTADOSAG = "Rechazado";
}

$ARRAYINPECTOR=$INPECTOR_ADO->verInpector($ARRAYINPSAGPT[0]['ID_INPECTOR']);
if($ARRAYINPECTOR){
  $INPECTOR=$ARRAYINPECTOR[0]['NOMBRE_INPECTOR'];
}
$ARRAYCONTRAPARTE=$CONTRAPARTE_ADO->verContraparte($ARRAYINPSAGPT[0]['ID_CONTRAPARTE']);
if($ARRAYCONTRAPARTE){
  $CONTRAPARTE=$ARRAYCONTRAPARTE[0]['NOMBRE_CONTRAPARTE'];
}

$ARRAYPAIS=$PAIS_ADO->verPais($ARRAYINPSAGPT[0]['ID_PAIS1']);
if($ARRAYPAIS){
  $PAIS=$ARRAYPAIS[0]['NOMBRE_PAIS'];
}
$ARRAYPAIS=$PAIS_ADO->verPais($ARRAYINPSAGPT[0]['ID_PAIS2']);
if($ARRAYPAIS){
  $PAIS=$PAIS.", ".$ARRAYPAIS[0]['NOMBRE_PAIS'];
}
$ARRAYPAIS=$PAIS_ADO->verPais($ARRAYINPSAGPT[0]['ID_PAIS3']);
if($ARRAYPAIS){
  $PAIS=$PAIS.", ".$ARRAYPAIS[0]['NOMBRE_PAIS'];
}
$ARRAYPAIS=$PAIS_ADO->verPais($ARRAYINPSAGPT[0]['ID_PAIS4']);
if($ARRAYPAIS){
  $PAIS=$PAIS.", ".$ARRAYPAIS[0]['NOMBRE_PAIS'];
}


/*

$TOTALENVASE = $ARRAYINPSAGPT[0]['CANTIDAD_ENVASE_INPSAGPT'];
$TOTALNETO = $ARRAYINPSAGPT[0]['KILOS_NETO_INPSAGPT'];
$TOTALBRUTO = $ARRAYINPSAGPT[0]['KILOS_BRUTO_INPSAGPT'];


*/

$ARRAYPLANTA = $PLANTA_ADO->verPlanta($ARRAYINPSAGPT[0]['ID_PLANTA']);
$ARRAYEMPRESA = $EMPRESA_ADO->verEmpresa($ARRAYINPSAGPT[0]['ID_EMPRESA']);
$ARRAYTEMPORADA = $TEMPORADA_ADO->verTemporada($ARRAYINPSAGPT[0]['ID_TEMPORADA']);
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
    <title>Informe Inspección SAG</title>
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
        INFORME INSPECCIÓN SAG
        <br>
        <b> Número Inspección: ' . $NUMEROINPSAG . '</b>
      </h2>
      <div id="details" class="clearfix">
        
        <div id="invoice">
          <div class="date"><b>Fecha Inspección: </b>' . $FECHAINPSAG . ' </div>
          <div class="date"><b>Empresa: </b>' . $EMPRESA . '</div>
          <div class="address"><b> Planta: </b>' . $PLANTA . '</div>
          <div class="date"><b>Temporada: </b>' . $TEMPORADA . '</div>
        </div>

        <div id="client">
          <div class="address"><b>Tipo Inspección: </b>' . $NOMBRETINPSAG . '</div>
          <div class="address"><b>Condición: </b>' . $NOMBRETESTADOSAG . '</div>
          <div class="address"><b>Inpector: </b>' . $INPECTOR . '</div>
          <div class="address"><b>Contraparte: </b>' . $CONTRAPARTE . '</div>
          <div class="address"><b>Valor CIF: </b>' . $CIF . '</div>
          <div class="address"><b>Paises: </b>' . $PAIS . '</div>
        </div>
        
      </div>
      <table border="0" cellspacing="0" cellpadding="0">
        <thead>
          <tr>
            <th colspan="13" class="center">DETALLE DE INSPECCIÓN.</th>
          </tr>
          <tr>
            <th class="color left">Folio</th>
            <th class="color center">Fecha Embalado</th>
            <th class="color center">Código Estandar</th>
            <th class="color center">Envase/Estandar</th>
            <th class="color center ">CSG </th>
            <th class="color center ">Nombre Productor </th>
            <th class="color center ">Variedad </th>
            <th class="color center">Cantidad Envase</th>
            <th class="color center">Kilos Neto</th>
            <th class="color center">Kilos Bruto</th>
            <th class="color center">Embolsado</th>    
            <th class="color center">Tipo Manejo</th>            
            <th class="color center">Stock</th>

          </tr>
        </thead>
         <tbody>
        ';


foreach ($ARRAYEXIEXPORTACION as $d) :
  $ARRAYVERPRODUCTORID = $PRODUCTOR_ADO->verProductor($d['ID_PRODUCTOR']);
  $ARRAYPVESPECIES = $PVESPECIES_ADO->verPvespecies($d['ID_PVESPECIES']);
  $ARRAYVESPECIES = $VESPECIES_ADO->verVespecies($ARRAYPVESPECIES[0]['ID_VESPECIES']);
  $ARRAYEEXPORTACION = $EEXPORTACION_ADO->verEstandar($d['ID_ESTANDAR']);
  $ARRAYTMANEJO = $TMANEJO_ADO->verTmanejo($d['ID_TMANEJO']);
  $TMANEJO = $ARRAYTMANEJO[0]['NOMBRE_TMANEJO'];

  if ($d['STOCK']) {
    $STOCK = $d['STOCK'];
  } else {
    $STOCK = "Sin Stock";
  }
  if ($d['EMBOLSADO'] == "1") {
    $EMBOLSADO = "SI";
  }
  if ($d['EMBOLSADO'] == "0") {
    $EMBOLSADO = "NO";
  }

  $html = $html . '
          
                      <tr >
                          <th class=" left">' . $d['FOLIO_AUXILIAR_EXIEXPORTACION'] . '</th>
                          <td class=" center">' . $d['FECHA'] . '</td>
                          <td class="center">' . $ARRAYEEXPORTACION[0]['CODIGO_ESTANDAR'] . '</td>
                          <td class="center">' . $ARRAYEEXPORTACION[0]['NOMBRE_ESTANDAR'] . '</td>
                          <td class="center">' . $ARRAYVERPRODUCTORID[0]['CSG_PRODUCTOR'] . '</td>
                          <td class="center">' . $ARRAYVERPRODUCTORID[0]['NOMBRE_PRODUCTOR'] . '</td>
                          <td class="center">' . $ARRAYVESPECIES[0]['NOMBRE_VESPECIES'] . '</td>
                          <td class="center">' . $d['ENVASE'] . '</td>¿
                          <td class="center">' . $d['NETO'] . '</td>
                          <td class="center">' . $d['BRUTO'] . '</td>           
                          <td class="center">' . $EMBOLSADO . '</td>     
                          <td class="center">' . $ARRAYTMANEJO[0]['NOMBRE_TMANEJO'] . '</td>
                          <td class="center">' . $STOCK . '</td>
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
              <th class="color left"> Total </th>
              <th class="color center">' . $TOTALENVASE . '</th>
              <th class="color center">' . $TOTALNETO . '</th>
              <th class="color center">' . $TOTALBRUTO . '</th>
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
          <div class="address"><b></b></div>
          <div class="address"> </div>
          <div class="address"></div>
          <div class="address"></div>
          <div class="address"></div>
        </div>
      </div>
      <br>
      <br> 
      <div id="notices">
        <div>IMPORTANTE:</div>
        <div class="notice">Este informe muestra información del momento en que fue generado, si tiene algun inconveniente por favor contactar a <a href="mailto:ti@fvolcan.cl">ti@fvolcan.cl</a>.</div>
      </div>

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
$NOMBREARCHIVO = "InformeRecepionPt_";
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
$TIPOINFORME = "Informe Recepcion PT";
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
