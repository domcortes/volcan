<?php

//LLAMADA ARCHIVOS NECESARIOS PARA LAS OPERACIONES 
include_once '../controlador/TUSUARIO_ADO.php';
include_once '../controlador/USUARIO_ADO.php';
include_once '../controlador/EMPRESA_ADO.php';
include_once '../controlador/PLANTA_ADO.php';
include_once '../controlador/TEMPORADA_ADO.php';

include_once '../controlador/EXIEXPORTACION_ADO.php';
include_once '../controlador/EEXPORTACION_ADO.php';
include_once '../controlador/PRODUCTOR_ADO.php';
include_once '../controlador/VESPECIES_ADO.php';
include_once '../controlador/ESPECIES_ADO.php';
include_once '../controlador/FOLIO_ADO.php';
include_once '../controlador/TMANEJO_ADO.php';
include_once '../controlador/TCALIBRE_ADO.php';
include_once '../controlador/TEMBALAJE_ADO.php';

include_once '../controlador/RECEPCIONPT_ADO.php';





//INCIALIZAR LAS VARIBLES
//INICIALIZAR CONTROLADOR
$TUSUARIO_ADO = new TUSUARIO_ADO();
$USUARIO_ADO = new USUARIO_ADO();
$EMPRESA_ADO =  new EMPRESA_ADO();
$PLANTA_ADO =  new PLANTA_ADO();
$TEMPORADA_ADO =  new TEMPORADA_ADO();

$EXIEXPORTACION_ADO =  new EXIEXPORTACION_ADO();
$EEXPORTACION_ADO =  new EEXPORTACION_ADO();

$PRODUCTOR_ADO =  new PRODUCTOR_ADO();
$VESPECIES_ADO =  new VESPECIES_ADO();
$ESPECIES_ADO =  new ESPECIES_ADO();
$FOLIO_ADO =  new FOLIO_ADO();
$TMANEJO_ADO =  new TMANEJO_ADO();
$TCALIBRE_ADO =  new TCALIBRE_ADO();
$TEMBALAJE_ADO =  new TEMBALAJE_ADO();

$RECEPCIONPT_ADO =  new RECEPCIONPT_ADO();

//INCIALIZAR VARIBALES A OCUPAR PARA LA FUNCIONALIDAD
$TOTALENVASE = "";
$TOTALBRUTO = "";
$TOTALNETO = "";
$TOTALDESHIRATACION = "";
$NOMBREUSUARIO="";
$NOMBRE="";

$EMPRESA = "";
$PLANTA = "";
$TEMPORADA = "";

//INICIALIZAR ARREGLOS

$ARRAYEMPRESA = "";
$ARRAYPLANTA = "";
$ARRAYTEMPORADA = "";
$ARRAYEXIEXPORTACION = "";
$ARRAYEXIEXPORTACIONTOTALES = "";
$ARRAYVERPRODUCTOR = "";
$ARRAYVERTRANSPORTE = "";
$ARRAYVERCONDUCTOR = "";
$ARRAYFECHA = "";
$ARRAYPRODUCTOR = "";
$ARRAYTMANEJO = "";
$ARRAYCALIBRE = "";
$ARRAYEMBALEJE = "";
$ARRAYRECEPCIONPT = "";
$ARRAYUSUARIO="";


//FUNCIONALIDAD
if(isset($_REQUEST['NOMBREUSUARIO'])){
  $NOMBREUSUARIO = $_REQUEST['NOMBREUSUARIO'];
  $ARRAYUSUARIO=$USUARIO_ADO->ObtenerNombreCompleto($NOMBREUSUARIO);
  $NOMBRE = $ARRAYUSUARIO[0]["NOMBRE_COMPLETO"];
  
}
if (isset($_REQUEST['EMPRESA']) && isset($_REQUEST['PLANTA']) && isset($_REQUEST['TEMPORADA'])) {

  $EMPRESA = $_REQUEST['EMPRESA'];
  $PLANTA = $_REQUEST['PLANTA'];
  $TEMPORADA = $_REQUEST['TEMPORADA'];

  $ARRAYEXIEXPORTACION = $EXIEXPORTACION_ADO->listarExiexportacionEmpresaPlantaTemporadaDisponible2($EMPRESA, $PLANTA, $TEMPORADA);
  $ARRAYEXIEXPORTACIONTOTALES = $EXIEXPORTACION_ADO->obtenerTotalesEmpresaPlantaTemporadaDisponible2($EMPRESA, $PLANTA, $TEMPORADA);

  $ARRAYEMPRESA = $EMPRESA_ADO->verEmpresa($EMPRESA);
  $ARRAYPLANTA = $PLANTA_ADO->verPlanta($PLANTA);
  $ARRAYTEMPORADA = $TEMPORADA_ADO->verTemporada($TEMPORADA);

  $NOMBRETEMPORADA = $ARRAYTEMPORADA[0]['NOMBRE_TEMPORADA'];
  $NOMBREPLANTA = $ARRAYPLANTA[0]['NOMBRE_PLANTA'];
  $NOMBREEMPRESA = $ARRAYEMPRESA[0]['NOMBRE_EMPRESA'];

  $EMPRESAURL = $ARRAYEMPRESA[0]['LOGO_EMPRESA'];
  if ($EMPRESAURL == "") {
    $EMPRESAURL = "img/empresa/no_disponible.png";
  }
} else {
  $ARRAYEXIEXPORTACION = $EXIEXPORTACION_ADO->listarExiexportacionDisponible2();
  $ARRAYEXIEXPORTACIONTOTALES = $EXIEXPORTACION_ADO->obtenerTotalesDisponible2();
}


$TOTALNETO = $ARRAYEXIEXPORTACIONTOTALES[0]['NETO'];
$TOTALENVASE = $ARRAYEXIEXPORTACIONTOTALES[0]['ENVASE'];
$TOTALBRUTO = $ARRAYEXIEXPORTACIONTOTALES[0]['BRUTO'];




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
    <title>Informe  Existencia Producto Terminado</title>
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
      <h1 class="titulo" style="text-align: center; color: black;">
        INFORME EXISTENCIA PRODUCTO TERMINADO
      </h1>
      <div id="details" class="clearfix">
      <div id="invoice">
        <div class="date"> <b>Empresa: </b> ' . $NOMBREEMPRESA . '  </div>
        <div class="date"> <b>Planta: </b> ' . $NOMBREPLANTA . '  </div>
        <div class="date"> <b>Temporada: </b>' . $NOMBRETEMPORADA . '  </div>
      </div>
      <div id="client">
        <div class="address"><b>Total Envase: </b> ' . $TOTALENVASE . ' </div>
        <div class="address"><b>Total Neto: </b> ' . $TOTALNETO . '  </div>
        <div class="address"><b>Total Deshidratación: </b> ' . $TOTALNETO . '  </div>
        <div class="address"><b>Total Bruto: </b> ' . $TOTALBRUTO . '  </div>
      </div>
      </div>

      <table border="0" cellspacing="0" cellpadding="0">
        <thead>
          <tr>
            <th colspan="22" class="center"></th>
          </tr>
          <tr>            
          
            <th class="color left ">Folio </th>
            <th class="color center ">Fecha Embalado </th>
            <th class="color center ">Código Estandar </th>
            <th class="color center ">Envase/Estandar </th>
            <th class="color center ">CSG Productor </th>
            <th class="color center ">Nombre Productor </th>
            <th class="color center ">Especies </th>
            <th class="color center ">Variedad </th>
            <th class="color center ">Condición </th>
            <th class="color center ">Cantidad Envase</th>
            <th class="color center ">Kilos Neto</th>
            <th class="color center ">Kilos Deshidratación</th>
            <th class="color center ">Kilos Bruto</th>
            <th class="color center ">Tipo Manejo</th>
            <th class="color center ">Calibre</th>
            <th class="color center ">Embalaje</th>
            <th class="color center ">Stock</th>
            <th class="color center ">Días </th>
            <th class="color center ">Fecha Ingreso </th>
            <th class="color center ">Fecha Modificación </th>
            <th class="color center ">Número Recepción </th>
            <th class="color center ">Empresa</th>
            <th class="color center ">Planta</th>
          </tr>
        </thead>
         <tbody>
        ';


foreach ($ARRAYEXIEXPORTACION as $r) :

  $ARRAYVERPRODUCTOR = $PRODUCTOR_ADO->verProductor($r['ID_PRODUCTOR']);
  $ARRAYVERPRODUCTORID = $PRODUCTOR_ADO->verProductor($r['ID_PRODUCTOR']);
  $ARRAYVESPECIES = $VESPECIES_ADO->verVespecies($r['ID_VESPECIES']);
  $ARRAYVERESPECIES = $ESPECIES_ADO->verEspecies($ARRAYVESPECIES[0]['ID_ESPECIES']);
  $ARRAYEEXPORTACION = $EEXPORTACION_ADO->verEstandar($r['ID_ESTANDAR']);
  $ARRAYTMANEJO = $TMANEJO_ADO->verTmanejo($r['ID_TMANEJO']);
  $TMANEJO = $ARRAYTMANEJO[0]['NOMBRE_TMANEJO'];

  $ARRAYRECEPCIONPT = $RECEPCIONPT_ADO->verRecepcionpt($r['ID_RECEPCIONPT']);
  if (empty($ARRAYRECEPCIONPT)) {
    $NUMERORECEPCION = "Sin Recepción";
  } else {
    $NUMERORECEPCION = $ARRAYRECEPCIONPT[0]["NUMERO_RECEPCIONPT"];
  }

  $ARRAYCALIBRE = $TCALIBRE_ADO->verCalibre($r['ID_CALIBRE']);
  if (empty($ARRAYCALIBRE)) {
    $CALIBRE = "Sin Calibre";
  } else {
    $CALIBRE = $ARRAYCALIBRE[0]['NOMBRE_CALIBRE'];
  }

  $ARRAYEMBALAJE = $TEMBALAJE_ADO->verEmbalaje($r['ID_EMBALAJE']);
  if (empty($ARRAYEMBALAJE)) {
    $EMBALAJE = "Sin Embalaje";
  } else {
    $EMBALAJE = $ARRAYEMBALAJE[0]['NOMBRE_EMBALAJE'];
  }


  if ($r['TESTADOSAG'] == null || $r['TESTADOSAG'] == "0" || $r['TESTADOSAG'] = "" || $r['TESTADOSAG'] = " ") {
    $CONDICION  =  "Sin Condición";
  }
  if ($r['TESTADOSAG'] == "1") {
    $CONDICION  =  "En Inspección";
  }
  if ($r['TESTADOSAG'] == "2") {
    $CONDICION  =  "Aprobado Origen";
  }
  if ($r['TESTADOSAG'] == "3") {
    $CONDICION  =  "Aprobado USLA";
  }
  if ($r['TESTADOSAG'] == "4") {
    $CONDICION  =  "Fumigado";
  }
  if ($r['TESTADOSAG'] == "5") {
    $CONDICION  =  "Rechazado";
  }


  if (isset($r['STOCK'])) {
    $STOCK = $r['STOCK'];
  } else {
    $STOCK = "Sin Stock";
  }

  $html = $html . '    
            <tr class="center"> 
                <td class="center">   ' . $r['FOLIO_AUXILIAR_EXIEXPORTACION'] . '</td>  
                <td class="center">' . $r['EMBALADO'] . '</td>
                <td class="center">' . $ARRAYEEXPORTACION[0]['CODIGO_ESTANDAR'] . '</td>
                <td class="center">' . $ARRAYEEXPORTACION[0]['NOMBRE_ESTANDAR'] . '</td>
                <td class="center">' . $ARRAYVERPRODUCTOR[0]['CSG_PRODUCTOR'] . ' </td>
                <td class="center">' . $ARRAYVERPRODUCTOR[0]['NOMBRE_PRODUCTOR'] . '</td>
                <td class="center">' . $ARRAYVERESPECIES[0]['NOMBRE_ESPECIES'] . '</td>
                <td class="center">' . $ARRAYVESPECIES[0]['NOMBRE_VESPECIES'] . '</td>
                <td class="center">' . $CONDICION . '</td>
                <td class="center">' . $r['ENVASE'] . '</td>
                <td class="center">' . $r['NETO'] . '</td>
                <td class="center">' . $r['DESHIRATACION'] . '</td>
                <td class="center">' . $r['BRUTO'] . '</td>
                <td class="center">' . $TMANEJO . '</td>
                <td class="center">' . $CALIBRE  . '</td>
                <td class="center">' . $EMBALAJE  . '</td>
                <td class="center">' . $STOCK . '</td>
                <td class="center">' . $r['DIAS'] . '</td>
                <td class="center">' . $r['INGRESO'] . '</td>
                <td class="center">' . $r['MODIFICACION'] . '</td>
                <td class="center">' . $NUMERORECEPCION . '</td>
                <td class="center">' . $NOMBREEMPRESA . '</td>                
                <td class="center">' . $NOMBREPLANTA . '</td>
                
            </tr>
            ';
endforeach;


$html = $html . '
        </tbody>
      </table>
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
$NOMBREARCHIVO = "InformeExistencia_";
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
$TIPOINFORME = "Informe Existencia ";
$CREADOR = "Usuario";
$AUTOR = "Usuario";
$ASUNTO = "Informe";

//API DE GENERACION DE PDF
require_once '../api/mpdf/mpdf/autoload.php';
//$PDF = new \Mpdf\Mpdf();W
$PDF = new \Mpdf\Mpdf(['format' => 'letter-L']);

//CONFIGURACION FOOTER Y HEADER DEL PDF
$PDF->SetHTMLHeader('
    <table width="100%" >
        <tbody>
            <tr>
                <th width="55%" class="left f10">' . $NOMBREEMPRESA . '</th>
                <td width="45%" class="right f10">' . $FECHANOMBRE . '</td>
                <td width="10%" class="right f10">' . $HORAFINAL2 . '</td>
            </tr>
        </tbody>
    </table>
    <br>
    
');

$PDF->SetHTMLFooter('
<table width="100%" >    
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
                       
                        ' . $NOMBREEMPRESA . '
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
