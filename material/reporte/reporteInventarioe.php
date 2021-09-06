
<?php

//LLAMADA ARCHIVOS NECESARIOS PARA LAS OPERACIONES
//LLAMADA ARCHIVOS NECESARIOS PARA LAS OPERACIONES
include_once '../controlador/BODEGA_ADO.php';
include_once '../controlador/PRODUCTO_ADO.php';
include_once '../controlador/TUMEDIDA_ADO.php';

include_once '../controlador/INVENTARIOE_ADO.php';


//INCIALIZAR LAS VARIBLES
//INICIALIZAR CONTROLADOR
$BODEGA_ADO =  new BODEGA_ADO();
$PRODUCTO_ADO =  new PRODUCTO_ADO();
$TUMEDIDA_ADO =  new TUMEDIDA_ADO();

$INVENTARIOE_ADO =  new INVENTARIOE_ADO();


//INCIALIZAR VARIBALES A OCUPAR PARA LA FUNCIONALIDAD

$ESTADO = "";
$TRECEPCION = "";

$ARRAYINVENTARIO = "";
$ARRAYINVENTARIOTOTALES = "";

$ARRAYVERBODEGA = "";
$ARRAYVERTUMEDIDA = "";
$ARRAYVERPRODUCTO = "";

//INICIALIZAR ARREGLOS
$ARRAYINVENTARIO = $INVENTARIOE_ADO->listarInventarioPorEmpresaPlantaTemporada2CBX($EMPRESAS, $PLANTAS, $TEMPORADAS);

//FUNCIONALIDAD


$html = '
<table border="0" cellspacing="0" cellpadding="0">
    <thead>
    <tr>   
        <th class="color center ">Número Folio</th>
        <th class="color center ">Estado </th>
        <th class="color center ">Tipo Recepción </th>
        <th class="color center ">Código Producto  </th>
        <th class="color center ">Producto  </th>
        <th class="color center ">Unidad Medida </th>
        <th class="color center ">Total Cantidad</th>
        <th class="color center ">Valor Unitario</th>
        <th class="color center ">Ingreso</th>
        <th class="color center ">Modificación</th>
        <th class="color center ">Empresa</th>
        <th class="color center ">Planta</th>
        <th class="color center ">Temporada</th>
    </tr>
    </thead>
 <tbody>

';
foreach ($ARRAYINVENTARIO as $r) :



    if ($r['ESTADO'] == "1") {
        $ESTADO = "Ingresando";
    }
    if ($r['ESTADO'] == "2") {
        $ESTADO = "Vigente";
    }
    if ($r['TRECEPCION'] == "1") {
        $TRECEPCION = "Desde Proveedor";
    }
    if ($r['TRECEPCION'] == "2") {
        $TRECEPCION = "Desde Productor";
    }
    if ($r['TRECEPCION'] == "3") {
        $TRECEPCION = "Planta Externa";
    }
    if ($r['TRECEPCION'] == "4") {
        $TRECEPCION = "Inter Externa";
    }

    $ARRAYVERPRODUCTO = $PRODUCTO_ADO->verProducto($r['ID_PRODUCTO']);
    $ARRAYVERTUMEDIDA = $TUMEDIDA_ADO->verTumedida($r['ID_TUMEDIDA']);
    $ARRAYEMPRESA =  $EMPRESA_ADO->verEmpresa($EMPRESAS);
    $ARRAYPLANTA =  $PLANTA_ADO->verplanta($PLANTAS);
    $ARRAYTEMPORADA = $TEMPORADA_ADO->verTemporada($TEMPORADAS);

    $html = $html . '    
            <tr class="center">
                <td class="center">   ' . $r['FOLIO_INVENTARIO'] . '</td> 
                <td class="center">   ' . $ESTADO . '</td> 
                <td class="center">   ' . $TRECEPCION . '</td> 
                <td class="center">   ' . $ARRAYVERPRODUCTO[0]['CODIGO_PRODUCTO'] . '</td>
                <td class="center">   ' . $ARRAYVERPRODUCTO[0]['NOMBRE_PRODUCTO'] . '</td>
                <td class="center">   ' . $ARRAYVERTUMEDIDA[0]['NOMBRE_TUMEDIDA'] . '</td>
                <td class="center">   ' . $r['VALOR_UNITARIO'] . '</td>    
                <td class="center">   ' . $r['CANTIDAD_INVENTARIO'] . '</td>   
                <td class="center">   ' . $r['INGRESOF'] . '</td>  
                <td class="center">   ' . $r['MODIFICACIONF'] . '</td>  
                <td class="center">   ' . $ARRAYEMPRESA[0]['NOMBRE_EMPRESA'] . '</td> 
                <td class="center">   ' . $ARRAYPLANTA[0]['NOMBRE_PLANTA'] . '</td> 
                <td class="center">   ' . $ARRAYTEMPORADA[0]['NOMBRE_TEMPORADA'] . '</td>  
                
            </tr>
            ';
endforeach;

$html = $html . '
        </tbody>
      </table>
      ';




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
$NOMBREARCHIVO = "ReporteInventario_";
$FECHADOCUMENTO = $FECHANORMAL . "_" . $HORAFINAL;
$TIPODOCUMENTO = "Reporte";
$FORMATO = ".xlsx";
$NOMBREARCHIVOFINAL = $NOMBREARCHIVO . $FECHADOCUMENTO . $FORMATO;

//CONFIGURACIOND DEL DOCUMENTO
$TIPOPAPEL = "LETTER";
$ORIENTACION = "P";
$LENGUAJE = "ES";
$UNICODE = "true";
$ENCODING = "UTF-8";

//DETALLE DEL CREADOR DEL INFORME
$TIPOINFORME = "Reporte Inventario ";
$CREADOR = "Usuario";
$AUTOR = "Usuario";
$ASUNTO = "Reporte";
$DESCRIPCION = "Reporte Inventario Generado, " . $FECHANOMBRE . ", " . $HORAFINAL2;
$CATEGORIA = "Reporte";
$ETIQUETA = "Reporte Envases";




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
