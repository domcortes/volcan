
<?php

//LLAMADA ARCHIVOS NECESARIOS PARA LAS OPERACIONES 
include_once '../controlador/TUSUARIO_ADO.php';
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
$NUMERORECEPCION="";

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
$ARRAYEMBALEJE="";
$ARRAYRECEPCIONPT="";


$ARRAYDATOS = "";

//FUNCIONALIDAD
if (isset($_REQUEST['EMPRESA']) && isset($_REQUEST['PLANTA']) && isset($_REQUEST['TEMPORADA'])) {
    $EMPRESA = $_REQUEST['EMPRESA'];
    $PLANTA = $_REQUEST['PLANTA'];
    $TEMPORADA = $_REQUEST['TEMPORADA'];

    $ARRAYEXIEXPORTACION = $EXIEXPORTACION_ADO->listarExiexportacionEmpresaPlantaTemporadaDisponible2Excel($EMPRESA, $PLANTA, $TEMPORADA);
    $ARRAYEXIEXPORTACIONTOTALES = $EXIEXPORTACION_ADO->obtenerTotalesEmpresaPlantaTemporadaDisponible($EMPRESA, $PLANTA, $TEMPORADA);

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
    $ARRAYEXIEXPORTACION = $EXIEXPORTACION_ADO->listarExiexportacionDisponible();
    $ARRAYEXIEXPORTACIONTOTALES = $EXIEXPORTACION_ADO->obtenerTotalesDisponible();
}

//print_r($ARRAYEXIEXPORTACIONTOTALES);

$TOTALNETO = $ARRAYEXIEXPORTACIONTOTALES[0]['NETO'];
$TOTALENVASE = $ARRAYEXIEXPORTACIONTOTALES[0]['ENVASE'];
$TOTALBRUTO = $ARRAYEXIEXPORTACIONTOTALES[0]['BRUTO'];


$html = '
<table border="0" cellspacing="0" cellpadding="0">
    <thead>
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
    if(empty($ARRAYRECEPCIONPT)){
      $NUMERORECEPCION = "Sin Recepción";
    }else{
      $NUMERORECEPCION = $ARRAYRECEPCIONPT[0]["NUMERO_RECEPCIONPT"];
    }
  

    $ARRAYEMBALAJE = $TEMBALAJE_ADO->verEmbalaje($r['ID_EMBALAJE']);
    if (empty($ARRAYEMBALAJE)) {
        $EMBALAJE = "Sin Embalaje";
    } else {
        $EMBALAJE = $ARRAYEMBALAJE[0]['NOMBRE_EMBALAJE'];
    }


    $ARRAYCALIBRE = $TCALIBRE_ADO->verCalibre($r['ID_CALIBRE']);
    if (empty($ARRAYCALIBRE)) {
        $CALIBRE = "Sin Calibre";
    } else {
        $CALIBRE = $ARRAYCALIBRE[0]['NOMBRE_CALIBRE'];
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
      ';
//echo $html;
/*
$CONTADOR = count($ARRAYEXIEXPORTACION);
$CONTADOR2 = $CONTADOR + 1;
$ARRAYDATOS = array();
for ($I = 0; $I < $CONTADOR2; $I++) {
    //$ARRAYDATOS[$I] = $I;
    if ($I == 0) {
        $ARRAYDATOS[$I] = array(
            'Folio', 'Fecha Embalado', 'Fecha Ingreso', 'CSG Productor', 'Nombre Productor',
            'Estandar', 'Especies', 'Variedad', 'Condicion',
            'Canitdad Envase', 'Kilos Neto', 'Kilos Deshidratacion', 'Kilos Bruto',
            'Dias', 'Tipo Manejo', 'Stock'
        );
    }
    if ($I > 0) {
        $CONTADO3 = $I - 1;
        $ARRAYVERPRODUCTOR = $PRODUCTOR_ADO->verProductor($ARRAYEXIEXPORTACION[$CONTADO3]['ID_PRODUCTOR']);
        $ARRAYVERPRODUCTORID = $PRODUCTOR_ADO->verProductor($ARRAYEXIEXPORTACION[$CONTADO3]['ID_PRODUCTOR']);
        $ARRAYPVESPECIES = $PVESPECIES_ADO->verPvespecies($ARRAYEXIEXPORTACION[$CONTADO3]['ID_PVESPECIES']);
        $ARRAYVESPECIES = $VESPECIES_ADO->verVespecies($ARRAYPVESPECIES[0]['ID_VESPECIES']);
        $ARRAYVERESPECIES = $ESPECIES_ADO->verEspecies($ARRAYVESPECIES[0]['ID_ESPECIES']);
        $ARRAYEEXPORTACION = $EEXPORTACION_ADO->verEstandar($ARRAYEXIEXPORTACION[$CONTADO3]['ID_ESTANDAR']);
        $ARRAYTMANEJO = $TMANEJO_ADO->verTmanejo($ARRAYEXIEXPORTACION[$CONTADO3]['ID_TMANEJO']);
        $TMANEJO = $ARRAYTMANEJO[0]['NOMBRE_TMANEJO'];

        if ($r['TESTADOSAG'] == null || $r['TESTADOSAG'] == "0") {
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

        if ($ARRAYEXIEXPORTACION[$CONTADO3]['STOCK']) {
            $STOCK = $ARRAYEXIEXPORTACION[$CONTADO3]['STOCK'];
        } else {
            $STOCK = "-";
        }
        $ARRAYDATOS[$I] = array(
            $ARRAYEXIEXPORTACION[$CONTADO3]['FOLIO_AUXILIAR_EXIEXPORTACION'],
            $ARRAYEXIEXPORTACION[$CONTADO3]['FECHA_EMBALADO'],
            $ARRAYEXIEXPORTACION[$CONTADO3]['FECHA_INGRESO'],
            $ARRAYVERPRODUCTOR[0]['CSG_PRODUCTOR'],
            $ARRAYVERPRODUCTOR[0]['NOMBRE_PRODUCTOR'],
            $ARRAYEEXPORTACION[0]['NOMBRE_ESTANDAR'],
            $ARRAYVERESPECIES[0]['NOMBRE_ESPECIES'],
            $ARRAYVESPECIES[0]['NOMBRE_VESPECIES'],
            $CONDICION,
            $ARRAYEXIEXPORTACION[$CONTADO3]['NETO'],
            $ARRAYEXIEXPORTACION[$CONTADO3]['ENVASE'],
            $ARRAYEXIEXPORTACION[$CONTADO3]['DESHIRATACION'],
            $ARRAYEXIEXPORTACION[$CONTADO3]['BRUTO'],
            $ARRAYEXIEXPORTACION[$CONTADO3]['DIAS'],
            $TMANEJO,
            $STOCK
        );

        //$ARRAYEXIEXPORTACION[$I-1];
    }
}

*/






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







//CREACION NOMBRE DEL ARCHIVO
$NOMBREARCHIVO = "ReporteExistencia_";
$FECHADOCUMENTO = $FECHANORMAL . "_" . $HORAFINAL;
$TIPODOCUMENTO = "Informe";
$FORMATO = ".xlsx";
$NOMBREARCHIVOFINAL = $NOMBREARCHIVO . $FECHADOCUMENTO . $FORMATO;

//CONFIGURACIOND DEL DOCUMENTO
$TIPOPAPEL = "LETTER";
$ORIENTACION = "P";
$LENGUAJE = "ES";
$UNICODE = "true";
$ENCODING = "UTF-8";

//DETALLE DEL CREADOR DEL INFORME
$TIPOINFORME = "Reporte Existencia ";
$CREADOR = "Usuario";
$AUTOR = "Usuario";
$ASUNTO = "Reporte";
$DESCRIPCION = "Reporte Existencia Generado, " . $FECHANOMBRE . ", " . $HORAFINAL2;
$CATEGORIA = "Reporte";
$ETIQUETA = "Reporte PT";




//API DE GENERACION DE PDF
require_once '../api/phpoffice/vendor/autoload.php';
//require 'vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

$EXCEL = new Spreadsheet();
$FORMATO = $EXCEL->getActiveSheet();

//PROPIEDADES DEL DOCUMENTO
$EXCEL->getProperties()->setCreator($CREADOR);
$EXCEL->getProperties()->setLastModifiedBy($CREADOR);
$EXCEL->getProperties()->setTitle($TIPOINFORME);
$EXCEL->getProperties()->setSubject($ASUNTO);
$EXCEL->getProperties()->setDescription($DESCRIPCION);
$EXCEL->getProperties()->setKeywords($ETIQUETA);
$EXCEL->getProperties()->setCategory($CATEGORIA);
$HOJA = $EXCEL->getActiveSheet();

//CARGAR DATOS DESDE UN ARREGLO
//$HOJA->fromArray($ARRAYDATOS);


$reader = new \PhpOffice\PhpSpreadsheet\Reader\Html();
$EXCEL = $reader->loadFromString($html);
//$reader->setSheetIndex(1);
//$EXCEL = $reader->loadFromString($secondHtmlString, $EXCEL);


$EXCEL->getActiveSheet()->setAutoFilter(
    $EXCEL->getActiveSheet()
        ->calculateWorksheetDimension()
);

//$FORMATO->setCellValue('1', 'Hello World !');
/**
 * Los siguientes encabezados son necesarios para que
 * el navegador entienda que no le estamos mandando
 * simple HTML
 * Por cierto: no hagas ningún echo ni cosas de esas; es decir, no imprimas nada
 */

// Redirect output to a client’s web browser (Xlsx)
header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment; filename="' . $NOMBREARCHIVOFINAL . '"');
header('Cache-Control: max-age=0');
// If you're serving to IE 9, then the following may be needed
header('Cache-Control: max-age=1');

// If you're serving to IE over SSL, then the following may be needed
header('Expires: Mon, 26 Jul 1997 05:00:00 GMT'); // Date in the past
header('Last-Modified: ' . gmdate('D, d M Y H:i:s') . ' GMT'); // always modified
header('Cache-Control: cache, must-revalidate'); // HTTP/1.1
header('Pragma: public'); // HTTP/1.0


//GENERACION DEL ARCHIVO EXCEL
$writer = new Xlsx($EXCEL);
$writer = \PhpOffice\PhpSpreadsheet\IOFactory::createWriter($EXCEL, "Xlsx");
ob_end_clean();
$writer->save("php://output");
exit;

?>
