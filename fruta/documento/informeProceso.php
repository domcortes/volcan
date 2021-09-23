<?php

//LLAMADA ARCHIVOS NECESARIOS PARA LAS OPERACIONES 
include_once '../controlador/TUSUARIO_ADO.php';
include_once '../controlador/USUARIO_ADO.php';
include_once '../controlador/EMPRESA_ADO.php';
include_once '../controlador/PLANTA_ADO.php';
include_once '../controlador/TEMPORADA_ADO.php';


include_once '../controlador/TPROCESO_ADO.php';
include_once '../controlador/DPEXPORTACION_ADO.php';
include_once '../controlador/DPINDUSTRIAL_ADO.php';
include_once '../controlador/PROCESO_ADO.php';

include_once '../controlador/VESPECIES_ADO.php';
include_once '../controlador/PRODUCTOR_ADO.php';
include_once '../controlador/EXIMATERIAPRIMA_ADO.php';
include_once '../controlador/EEXPORTACION_ADO.php';
include_once '../controlador/ERECEPCION_ADO.php';
include_once '../controlador/EINDUSTRIAL_ADO.php';
include_once '../controlador/TCALIBRE_ADO.php';

//INCIALIZAR LAS VARIBLES
//INICIALIZAR CONTROLADOR
$TUSUARIO_ADO = new TUSUARIO_ADO();
$USUARIO_ADO = new USUARIO_ADO();
$EMPRESA_ADO =  new EMPRESA_ADO();
$PLANTA_ADO =  new PLANTA_ADO();
$TEMPORADA_ADO =  new TEMPORADA_ADO();


$PRODUCTOR_ADO =  new PRODUCTOR_ADO();
$VESPECIES_ADO =  new VESPECIES_ADO();
$EXIMATERIAPRIMA_ADO =  new EXIMATERIAPRIMA_ADO();
$TPROCESO_ADO =  new TPROCESO_ADO();
$EEXPORTACION_ADO =  new EEXPORTACION_ADO();
$ERECEPCION_ADO =  new ERECEPCION_ADO();
$EINDUSTRIAL_ADO =  new EINDUSTRIAL_ADO();
$TCALIBRE_ADO =  new TCALIBRE_ADO();

$DPEXPORTACION_ADO =  new DPEXPORTACION_ADO();
$DPINDUSTRIAL_ADO =  new DPINDUSTRIAL_ADO();

$PROCESO_ADO =  new PROCESO_ADO();


//INCIALIZAR VARIBALES A OCUPAR PARA LA FUNCIONALIDAD
$IDOP = "";
$NUMEROPROCESO = "";
$VARIEDAD = "";
$FECHAPROCESO = "";
$TIPOPROCESO = "";
$TURNO = "";
$EMBOLSADO = "";
$PDEXPORTACION = "";
$PDINDUSTRIAL = "";
$PDTOTAL = "";
$PRODUCTOR = "";
$CSGPRODUCTOR = "";
$NOMBREPRODUCTOR = "";

$TOTALENVASE = "";
$TOTALNETO = "";
$TOTALBRUTO = 0;

$TOTALENVASEDEXPORTACION = "";
$TOTALNETODEXPORTACION = "";
$TOTALBRUTODEXPORTACION = "";
$TOTALDESHIDRATACIONDEXPORTACION = "";

$TOTALENVASEDINDUSTRIAL = "";
$TOTALNETODINDUSTRIAL = "";
$TOTALBRUTODINDUSTRIAL = "";


$TOTALSALIDA = "";
$TOTAL2 = "";
$TOTALDIFERENCIA = "";

$EMPRESA = "";
$EMPRESAURL = "";

$NOMBRE = "";
$html = '';


//INICIALIZAR ARREGLOS

$ARRAYVERTPROCESO = "";
$ARRAYVERPVESPECIES = "";
$ARRAYVERVESPECIES = "";

$ARRAYVESPECIES = "";
$ARRAYPVESPECIES = "";

$ARRAYDEXPORTACION = "";
$ARRAYDEXPORTACION2 = "";
$ARRAYDEXPORTACIONTOTALES = "";

$ARRAYDINDUSTRIAL = "";
$ARRAYDINDUSTRIAL2 = "";
$ARRAYDINDUSTRIALTOTALES = "";

$ARRAYDREPALETIZAJETOTALES = "";
$ARRAYEXISTENCIATOMADA = "";
$ARRAYEXISTENCIATOMADATOTALES = "";
$ARRAYEVEEXPORTACIONID = "";
$ARRAYEVERERECEPCIONID = "";
$ARRAYEVEINDUSTRIALID;

$ARRAYEMPRESA = "";
$ARRAYPROCESO = "";
$ARRAYPROCESOTOTALES = "";
$ARRAYUSUARIO = "";

if (isset($_REQUEST['usuario'])) {
  $USUARIO = $_REQUEST['usuario'];
  $ARRAYUSUARIO = $USUARIO_ADO->ObtenerNombreCompleto($USUARIO);
  $NOMBRE = $ARRAYUSUARIO[0]["NOMBRE_COMPLETO"];
}





if (isset($_REQUEST['parametro'])) {
  $IDOP = $_REQUEST['parametro'];
}

$ARRAYPROCESO = $PROCESO_ADO->verProceso2($IDOP);
$ARRAYPROCESOTOTALES = $PROCESO_ADO->obtenerTotales($IDOP);
$ARRAYEXISTENCIATOMADA = $EXIMATERIAPRIMA_ADO->buscarPorProceso2($IDOP);

$ARRAYDEXPORTACION = $DPEXPORTACION_ADO->buscarPorProceso2($IDOP);
$ARRAYDEXPORTACIONTOTALES = $DPEXPORTACION_ADO->obtenerTotales2($IDOP);

$ARRAYDINDUSTRIAL = $DPINDUSTRIAL_ADO->buscarPorProceso2($IDOP);
$ARRAYDINDUSTRIALTOTALES = $DPINDUSTRIAL_ADO->obtenerTotales2($IDOP);


$TOTALSALIDA = $ARRAYPROCESOTOTALES[0]['SALIDA'];
$TOTALSALIDASF = $ARRAYPROCESOTOTALES[0]['SALIDASF'];
$PDEXPORTACION = $ARRAYPROCESO[0]['PDEXPORTACION_PROCESO'];
$PDINDUSTRIAL = $ARRAYPROCESO[0]['PDINDUSTRIAL_PROCESO'];
$OBSERVACIONES = $ARRAYPROCESO[0]['OBSERVACIONE_PROCESO'];
$PDTOTAL = $PDEXPORTACION + $PDINDUSTRIAL;

$TOTALENVASEDEXPORTACION = $ARRAYDEXPORTACIONTOTALES[0]['ENVASE']; //TOTAL_DESHIDRATACION
$TOTALNETODEXPORTACION = $ARRAYDEXPORTACIONTOTALES[0]['NETO'];
$TOTALDESHIDRATACIONDEXPORTACION = $ARRAYDEXPORTACIONTOTALES[0]['DESHIDRATACION'];
$TOTALBRUTODEXPORTACION = $ARRAYDEXPORTACIONTOTALES[0]['BRUTO'];

$TOTALNETODINDUSTRIAL = $ARRAYDINDUSTRIALTOTALES[0]['NETO'];
$ARRAYEXISTENCIATOMADATOTALES = $EXIMATERIAPRIMA_ADO->obtenerTotalesProceso2($IDOP);

$TOTALENVASE = $ARRAYEXISTENCIATOMADATOTALES[0]['ENVASE'];
$TOTALNETO = $ARRAYEXISTENCIATOMADATOTALES[0]['NETO'];
$TOTALNETOSF = $ARRAYEXISTENCIATOMADATOTALES[0]['NETOSF'];


$TOTAL2 = $TOTALNETOSF - $TOTALSALIDASF;


$ARRAYVERVESPECIES = $VESPECIES_ADO->verVespecies($ARRAYPROCESO[0]['ID_VESPECIES']);
$NUMEROPROCESO = $ARRAYPROCESO[0]['NUMERO_PROCESO'];

$VARIEDAD = $ARRAYVERVESPECIES[0]['NOMBRE_VESPECIES'];
$FECHAPROCESO = $ARRAYPROCESO[0]['FECHA'];

$ARRAYTPROCESO = $TPROCESO_ADO->verTproceso($ARRAYPROCESO[0]['ID_TPROCESO']);

$TIPOPROCESO = $ARRAYTPROCESO[0]['NOMBRE_TPROCESO'];
if ($ARRAYPROCESO[0]['TURNO'] == 1) {
  $TURNO = "DIA";
}
if ($ARRAYPROCESO[0]['TURNO'] == 2) {
  $TURNO = "NOCHE";
}
$PRODUCTOR = $ARRAYPROCESO[0]['ID_PRODUCTOR'];



$ARRAYPRODUCTOR = $PRODUCTOR_ADO->verProductor($PRODUCTOR);
$NOMBREPRODUCTOR = $ARRAYPRODUCTOR[0]['NOMBRE_PRODUCTOR'];
$CSGPRODUCTOR = $ARRAYPRODUCTOR[0]['CSG_PRODUCTOR'];


$ARRAYPLANTA = $PLANTA_ADO->verPlanta($ARRAYPROCESO[0]['ID_PLANTA']);
$ARRAYEMPRESA = $EMPRESA_ADO->verEmpresa($ARRAYPROCESO[0]['ID_EMPRESA']);
$ARRAYTEMPORADA = $TEMPORADA_ADO->verTemporada($ARRAYPROCESO[0]['ID_TEMPORADA']);
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
    <title>Informe Proceso</title>
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
        INFORME PROCESO 
        <br>
        <b> Numero Proceso: ' . $NUMEROPROCESO . '</b>
      </h2>
      <div id="details" class="clearfix">
        
        <div id="invoice">
          <div class="date"><b>Fecha Proceso: </b>' . $FECHAPROCESO . ' </div>    
          <div class="date"><b>Empresa: </b>' . $EMPRESA . '</div>   
          <div class="date"><b>Planta: </b>' . $PLANTA . '</div>
          <div class="date"><b>Temporada: </b>' . $TEMPORADA . '</div>
        </div>

        <div id="client">
          <div class="address"><b>Tipo Proceso: </b>' . $TIPOPROCESO . '</div>
          <div class="address"><b>Nombre Productor: </b>' . $NOMBREPRODUCTOR . '</div>
          <div class="address"><b>CSG: </b>' . $CSGPRODUCTOR . '</div>
          <div class="address"><b>Variedad: </b>' . $VARIEDAD . ' </div>
        </div>
        
      </div>
     ';

$html = $html . '      
      <table border="0" cellspacing="0" cellpadding="0">
        <thead>
          <tr>
            <th colspan="6" class="center">INGRESO.</th>
          </tr>
          <tr>
            <th class="color left">Folio</th>
            <th class="color center">Fecha Ingreso</th>
            <th class="color center">Envase/Estandar</th>
            <th class="color center">Cant. Envase</th>
            <th class="color center">Kilos Neto</th>
            <th class="color center ">Variedad </th>
          </tr>
        </thead>
         <tbody>
        ';
foreach ($ARRAYEXISTENCIATOMADA as $r) :

  $ARRAYVERPRODUCTORID = $PRODUCTOR_ADO->verProductor($r['ID_PRODUCTOR']);
  $ARRAYVERVESPECIESID = $VESPECIES_ADO->verVespecies($r['ID_VESPECIES']);
  $ARRAYEVERERECEPCIONID = $ERECEPCION_ADO->verEstandar($r['ID_ESTANDAR']);

  $html = $html . '    
            <tr>
                <th class=" left">' . $r['FOLIO_AUXILIAR_EXIMATERIAPRIMA'] . '</th>
                <td class=" center">' . $r['COSECHA'] . '</td>
                <td class=" center">' . $ARRAYEVERERECEPCIONID[0]['NOMBRE_ESTANDAR'] . '</td>
                <td class=" center">' . $r['ENVASE'] . '</td>
                <td class=" center">' . $r['NETO'] . '</td>
                <td class=" center ">' . $ARRAYVERVESPECIESID[0]['NOMBRE_VESPECIES'] . ' </td>
            </tr>
';

endforeach;

$html = $html . '
    
        <tr>
            <th class="color left"></th>
            <th class="color center"></th>
            <th class="color right">Sub Total</th>
            <th class="color center">' . $TOTALENVASE . '</th>
            <th class="color center">' . $TOTALNETO . '</th>
            <th class="color center "> </th>
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
            <th colspan="10" class="center">SALIDA.</th>
            </tr>
          <tr>
            <th colspan="10" class="center">PRODUCTO TERMINADO.</th>
          </tr>
          <tr>
            <th class="color left">Folio</th>
            <th class="color center">Fecha Embalado</th>
            <th class="color center">Envase/Estandar</th>
            <th class="color center">Cant. Envase</th>
            <th class="color center">Kilos Neto</th>
            <th class="color center">Kilos Con Deshidratacion</th>
            <th class="color center">%</th>
            <th class="color center">Embolsado</th>
            <th class="color center">Calibre</th>
            <th class="color center ">Variedad </th>
          </tr>
        </thead>
         <tbody>
        ';
foreach ($ARRAYDEXPORTACION as $r) :

  $ARRAYVERPRODUCTORID = $PRODUCTOR_ADO->verProductor($r['ID_PRODUCTOR']);
  $ARRAYVERVESPECIESID = $VESPECIES_ADO->verVespecies($r['ID_VESPECIES']);
  $ARRAYEVEEXPORTACIONID = $EEXPORTACION_ADO->verEstandar($r['ID_ESTANDAR']);   
  $ARRAYTCALIBRE = $TCALIBRE_ADO->verCalibre($r['ID_TCALIBRE']);
  if ($ARRAYTCALIBRE) {
      $NOMBRETCALIBRE = $ARRAYTCALIBRE[0]['NOMBRE_TCALIBRE'];
  } else {
      $NOMBRETCALIBRE = "Sin Datos";
  }
  if ($r['EMBOLSADO'] == "1") {
    $EMBOLSADO = "SI";
  }
  if ($r['EMBOLSADO'] == "0") {
    $EMBOLSADO = "NO";
  }

  $html = $html . '    
        <tr>
            <th class=" left"> ' . $r['FOLIO_DPEXPORTACION'] . '</th>
            <td class=" center"> ' . $r['EMBALADO'] . '</td>
            <td class=" center"> ' . $ARRAYEVEEXPORTACIONID[0]['NOMBRE_ESTANDAR'] . '</td>
            <td class=" center">' . $r['ENVASE'] . ' </td>
            <td class=" center"> ' . $r['NETO'] . '</td>
            <td class=" center "> ' . $r['DESHIDRATACION'] . ' </td>
            <td class=" center"> ' . number_format(($r['KILOS_DESHIDRATACION_DPEXPORTACION']/$TOTALSALIDASF)*100,2, ",",".") . '%</td>
            <td class=" center "> ' . $EMBOLSADO . ' </td>
            <td class=" center "> ' . $NOMBRETCALIBRE . ' </td>
            <td class=" center "> ' . $ARRAYVERVESPECIESID[0]['NOMBRE_VESPECIES'] . ' </td>
        </tr>
        ';

endforeach;
$html = $html . '    
            <tr>
                <th class="color left"> </th>
                <th class="color center"> </th>
                <th class="color right">Sub Total </th>
                <th class="color center"> ' . $TOTALENVASEDEXPORTACION . '</th>
                <th class="color center">' . $TOTALNETODEXPORTACION . ' </th>
                <th class="color center "> ' . $TOTALDESHIDRATACIONDEXPORTACION . ' </th>
                <th class="color center "> ' . $PDEXPORTACION . '% </th>
                <th class="color center ">  </th>
                <th class="color center ">  </th>
                <th class="color center ">  </th>
            </tr>
            ';


$html = $html . '
        </tbody>
      </table>
      ';
$html = $html . '  
      <br>    
      <table border="0" cellspacing="0" cellpadding="0">
        <thead>
           
          <tr>
            <th colspan="6" class="center">PRODUCTO INDUSTRIAL.</th>
          </tr>
          <tr>
            <th class="color left">Folio</th>
            <th class="color center">Fecha Embalado</th>
            <th class="color center">Envase/Estandar</th>
            <th class="color center">Kilos Neto</th>
            <th class="color center">%</th>
            <th class="color center ">Variedad </th>
          </tr>
        </thead>
         <tbody>
        ';
foreach ($ARRAYDINDUSTRIAL as $r) :

  $ARRAYVERPRODUCTORID = $PRODUCTOR_ADO->verProductor($r['ID_PRODUCTOR']);
  $ARRAYVERVESPECIESID = $VESPECIES_ADO->verVespecies($r['ID_VESPECIES']);
  $ARRAYEVEINDUSTRIALID = $EINDUSTRIAL_ADO->verEstandar($r['ID_ESTANDAR']);

  $html = $html . '    
        <tr>
            <th class=" left"> ' . $r['FOLIO_DPINDUSTRIAL'] . '</th>
            <td class=" center"> ' . $r['EMBALADO'] . '</td>
            <td class=" center"> ' . $ARRAYEVEINDUSTRIALID[0]['NOMBRE_ESTANDAR'] . '</td>
            <td class=" center"> ' . $r['NETO'] . '</td>
            <td class=" center"> ' . number_format(($r['KILOS_NETO_DPINDUSTRIAL']/$TOTALSALIDASF)*100,2,",",".") . '%</td>
            <td class=" center "> ' . $ARRAYVERVESPECIESID[0]['NOMBRE_VESPECIES'] . ' </td>
        </tr>
        ';

endforeach;
$html = $html . '    
        <tr>
            <th class="color left"> </th>
            <th class="color center"> </th>
            <th class="color right">Sub Total </th>
            <th class="color center">' . $TOTALNETODINDUSTRIAL . ' </th>
            <th class="color center "> ' . $PDINDUSTRIAL . '% </th>
            <th class="color center ">  </th>
        </tr>
        ';

$html = $html . '
        </tbody>
      </table>
      ';

$html = $html . '
     
    </div>
      <div id="details" >            
        <div id="client">
          <div class="address"><b>PORCENTAJES: </b></div>
          <div class="address">EXPORTACION:  ' . $PDEXPORTACION . '%</div>
          <div class="address">INDUSTRIAL: ' . $PDINDUSTRIAL . '% </div>
          <div class="address">TOTAL: ' . $PDTOTAL . '%</div>
        </div>
        <div id="client">
            <div class="address"><b>DIFERENCIA: </b></div>
            <div class="address">KILOS NETO INGRESO.:  ' . $TOTALNETO . '</div>
            <div class="address">KILOS NETO SALIDA: ' . $TOTALSALIDA . ' </div>
            <div class="address">DIFERENCIA: ' . $TOTAL2 . '</div>
        </div>
      </div>   
      <div id="details" >            
        <div id="client">
          <div class="address"><b>Observaciones: </b></div>
          <div class="address">' . $OBSERVACIONES . '</div>
        </div>
      </div>  
    </main> 
    <footer>
      Informe generado por Departamento TI Fruticola Volcan
      <br>
      <a href="mailto:ti@fvolcan.cl">ti@fvolcan.cl</a>
      <br>
    </footer>
  </body>
</html>

';



//CREACION NOMBRE DEL ARCHIVO
$NOMBREARCHIVO = "InformeProceso_";
$FECHADOCUMENTO = $FECHANORMAL . "_" . $HORAFINAL;
$TIPODOCUMENTO = "INFORME";
$FORMATO = ".pdf";
$NOMBREARCHIVOFINAL = $NOMBREARCHIVO . $FECHADOCUMENTO . $FORMATO;

//CONFIGURACIOND DEL DOCUMENTO
$TIPOPAPEL = "LETTER";
$ORIENTACION = "P";
$LENGUAJE = "ES";
$UNICODE = "true";
$ENCODING = "UTF-8";

//DETALLE DEL CREADOR DEL INFORME
$TIPOINFORME = "INFORME PROCESO";
$CREADOR = "USUARIO";
$AUTOR = "USUARIO";
$ASUNTO = "INFORME";
//API DE GENERACION DE PDF
require_once '../../api/mpdf/mpdf/autoload.php';
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
      <td class="color2  center" style="width: 10%;"> Firma Responsable <br> ' . $NOMBRE . ' </td>
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
