<?php

//LLAMADA ARCHIVOS NECESARIOS PARA LAS OPERACIONES 
include_once '../controlador/TUSUARIO_ADO.php';
include_once '../controlador/USUARIO_ADO.php';
include_once '../controlador/EMPRESA_ADO.php';
include_once '../controlador/PLANTA_ADO.php';
include_once '../controlador/TEMPORADA_ADO.php';

include_once '../controlador/PRODUCTOR_ADO.php';
include_once '../controlador/PVESPECIES_ADO.php';
include_once '../controlador/VESPECIES_ADO.php';
include_once '../controlador/ERECEPCION_ADO.php';

include_once '../controlador/EXIMATERIAPRIMA_ADO.php';

include_once '../controlador/DREPALETIZAJEMP_ADO.php';
include_once '../controlador/REPALETIZAJEMP_ADO.php';

//INCIALIZAR LAS VARIBLES
//INICIALIZAR CONTROLADOR
$TUSUARIO_ADO = new TUSUARIO_ADO();
$USUARIO_ADO = new USUARIO_ADO();
$EMPRESA_ADO =  new EMPRESA_ADO();
$PLANTA_ADO =  new PLANTA_ADO();
$TEMPORADA_ADO =  new TEMPORADA_ADO();

$PRODUCTOR_ADO =  new PRODUCTOR_ADO();
$PVESPECIES_ADO =  new PVESPECIES_ADO();
$VESPECIES_ADO =  new VESPECIES_ADO();
$ERECEPCION_ADO =  new ERECEPCION_ADO();

$EXIMATERIAPRIMA_ADO =  new EXIMATERIAPRIMA_ADO();

$REPALETIZAJEMP_ADO =  new REPALETIZAJEMP_ADO();
$DREPALETIZAJEMP_ADO =  new DREPALETIZAJEMP_ADO();

//INCIALIZAR VARIBALES A OCUPAR PARA LA FUNCIONALIDAD
$IDOP="";
$NUMEROREPALETIZAJE="";


$EMPRESA="";
$EMPRESAURL="";
$FECHAINGRESO="";
$FECHAMODIFCACION="";
$MOTIVO="";
$TOTALENVASE="";
$TOTALNETO="";


$TOTALENVASEREPA="";
$TOTALNETOREPA="";

$TOTALE="";
$TOTALNE="";

//INICIALIZAR ARREGLOS
$ARRAYEMPRESA="";
$ARRAYREPALETIZAJE="";
$ARRAYDREPALETIZAJE="";
$ARRAYDREPALETIZAJETOTALES = "";
$ARRAYEXISTENCIATOMADA="";

$ARRAYVERPRODUCTORID=""; 
$ARRAYVERVESPECIESID=""; 
$ARRAYEVERERECEPCIONID;
$ARRAYUSUARIO="";

if(isset($_REQUEST['NOMBREUSUARIO'])){
    $NOMBREUSUARIO = $_REQUEST['NOMBREUSUARIO'];
    $ARRAYUSUARIO=$USUARIO_ADO->ObtenerNombreCompleto($NOMBREUSUARIO);
    $NOMBRE = $ARRAYUSUARIO[0]["NOMBRE_COMPLETO"];
    
  }
  

if (isset($_REQUEST['parametro']) ) {
    $IDOP = $_REQUEST['parametro'];
}
$ARRAYREPALETIZAJE=$REPALETIZAJEMP_ADO->verRepaletizaje2($IDOP);
$ARRAYEXISTENCIATOMADA=$EXIMATERIAPRIMA_ADO->buscarPorRepaletizaje2($IDOP);

$ARRAYDREPALETIZAJE=$DREPALETIZAJEMP_ADO->buscarDrepaletizaje($IDOP);
$ARRAYDREPALETIZAJETOTALES=$DREPALETIZAJEMP_ADO->totalesDrepaletizaje2($IDOP);

$ARRAYEMPRESA=$EMPRESA_ADO->verEmpresa($ARRAYREPALETIZAJE[0]['ID_EMPRESA']);

$NUMEROREPALETIZAJE=$ARRAYREPALETIZAJE[0]['NUMERO_REPALETIZAJE'];


$FECHAINGRESO=$ARRAYREPALETIZAJE[0]['INGRESO'];
$FECHAMODIFCACION=$ARRAYREPALETIZAJE[0]['MODIFICACION'];
$MOTIVO=$ARRAYREPALETIZAJE[0]['MOTIVO_REPALETIZAJE'];

$TOTALENVASE=$ARRAYREPALETIZAJE[0]['ENVASE'];
$TOTALNETO=$ARRAYREPALETIZAJE[0]['NETO'];

$TOTALENVASEREPA=$ARRAYDREPALETIZAJETOTALES[0]['TOTAL_ENVASE'];
$TOTALNETOREPA=$ARRAYDREPALETIZAJETOTALES[0]['TOTAL_NETO'];

$TOTALE=$TOTALENVASEREPA-$TOTALENVASE;
$TOTALNE=$TOTALNETOREPA-$TOTALNETO;


$ARRAYPLANTA=$PLANTA_ADO->verPlanta($ARRAYREPALETIZAJE[0]['ID_PLANTA']);
$ARRAYTEMPORADA=$TEMPORADA_ADO->verTemporada($ARRAYREPALETIZAJE[0]['ID_TEMPORADA']);
$TEMPORADA =$ARRAYTEMPORADA[0]['NOMBRE_TEMPORADA'];
$PLANTA=$ARRAYPLANTA[0]['NOMBRE_PLANTA'];


$EMPRESA=$ARRAYEMPRESA[0]['NOMBRE_EMPRESA'];
$EMPRESAURL=$ARRAYEMPRESA[0]['LOGO_EMPRESA'];

if($EMPRESAURL==""){
    $EMPRESAURL="img/empresa/no_disponible.png";
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
$FECHANOMBRE=$NOMBREDIA.", ".$DIA." de ".$NOMBREMES." del ".$ANO;


$html='
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Informe Repaletizaje Materia Prima</title>
  </head>
  <body>
    <header class="clearfix">
      <div id="logo">
          <img src="../vista/img/logo.png" width="100px" height="30px"/>
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
        INFORME REPALETIZAJE MATERIA PRIMA
        <br>
        <b> Numero Repaletizaje: ' . $NUMEROREPALETIZAJE . '</b>
      </h2>
      <div id="details" class="clearfix">
        
        <div id="invoice">
            <div class="date"><b>Empresa: </b>'.$EMPRESA.'</div>
            <div class="date"><b>Planta: </b>'.$PLANTA.'</div>
            <div class="date"><b>Temporada: </b>'.$TEMPORADA.'</div>
        </div>

        <div id="client">
          <div class="address"><b>Fecha Ingreso:  </b>'.$FECHAINGRESO.'</div>
          <div class="address"><b>Motivo: </b>'.$MOTIVO.'</div>
        </div>        
      </div>
    <table border="0" cellspacing="0" cellpadding="0">
            <thead>
                <tr>
                    <th colspan="8" class="center">INGRESO </th>
                </tr>
                <tr>
                    <th class="color left">Folio</th>
                    <th class="color left">Envase/Estandar</th>
                    <th class="color center">Cant. Envase</th>
                    <th class="color center">Kilos Neto</th>
                    <th class="color center ">Variedad </th>
                    <th class="color center ">Productor </th>
                </tr>
            </thead>
            <tbody>
    ';
    foreach ($ARRAYEXISTENCIATOMADA as $r) : 

        $ARRAYVERPRODUCTORID = $PRODUCTOR_ADO->verProductor($r['ID_PRODUCTOR']);    
        $ARRAYVERPVESPECIESID = $PVESPECIES_ADO->verPvespecies($r['ID_PVESPECIES']);
        $ARRAYVERVESPECIESID = $VESPECIES_ADO->verVespecies($ARRAYVERPVESPECIESID[0]['ID_VESPECIES']);  
        $ARRAYEVERERECEPCIONID = $ERECEPCION_ADO->verEstandar($r['ID_ESTANDAR']);
        $html=$html.'
        <tr>
            <th class=" left">'.$r['FOLIO_AUXILIAR_EXIMATERIAPRIMA'].'</th>
            <td class=" left">'.$ARRAYEVERERECEPCIONID[0]['NOMBRE_ESTANDAR'].'</td>
            <td class=" center">'.$r['ENVASE'].'</td>
            <td class=" center">'.$r['NETO'].'</td>
            <td class=" center ">'.$ARRAYVERVESPECIESID[0]['NOMBRE_VESPECIES'].' </td>
            <td class=" center ">'.$ARRAYVERPRODUCTORID[0]['NOMBRE_PRODUCTOR'].' </td>
        </tr>
        ';
    endforeach;
    $html=$html.'
        <tr>
            <th class=" left">&nbsp;</th>
            <th class=" left">Sub Total</th>
            <th class=" center">'.$TOTALENVASE.'</th>
            <th class=" center">'.$TOTALNETO.'</th>
            <th class=" center ">&nbsp; </th>
            <th class=" center ">&nbsp; </th>
        </tr>
    ';    
    $html=$html.'
    </tbody>
  </table>
  ';

$html=$html.'
<table border="0" cellspacing="0" cellpadding="0">
    <thead>
        <tr>
            <th colspan="6" class="center">SALIDA </th>
        </tr>
        <tr>
            <th class="color left">Folio</th>
            <th class="color left">Envase/Estandar</th>
            <th class="color center">Cant. Envase</th>
            <th class="color center">Kilos Neto</th>
            <th class="color center ">Variedad </th>
            <th class="color center ">Productor </th>
        </tr>
    </thead>
    <tbody>
';

foreach ($ARRAYDREPALETIZAJE as $r) : 
$html=$html.'
    <tr>
        <th class=" left">'.$r['FOLIO_NUEVO_DREPALETIZAJE'].'</th>
        <td class=" left">'.$ARRAYEVERERECEPCIONID[0]['NOMBRE_ESTANDAR'].'</td>
        <td class=" center">'.$r['CANTIDAD_ENVASE_DREPALETIZAJE'].'</td>
        <td class=" center">'.$r['KILOS_NETO_DREPALETIZAJE'].'</td>
        <td class=" center ">'.$ARRAYVERVESPECIESID[0]['NOMBRE_VESPECIES'].' </td>
        <td class=" center ">'.$ARRAYVERPRODUCTORID[0]['NOMBRE_PRODUCTOR'].' </td>
    </tr>
    '; 
endforeach;   
$html=$html.'
    <tr>
        <th class=" left">&nbsp;</th>
        <th class=" left">Sub Total</th>
        <th class=" center">'.$TOTALENVASEREPA.'</th>
        <th class=" center">'.$TOTALNETOREPA.'</th>
        <th class=" center ">&nbsp; </th>
        <th class=" center ">&nbsp; </th>
    </tr>
';    
$html=$html.'
    </tbody>
</table>
';
$html=$html.'

<table border="0" cellspacing="0" cellpadding="0">
    <tbody>
        <tr>
            <th colspan="6" class="center color2"> </th>
        </tr>
        <tr>        
            <th class="color left">&nbsp;</th>
            <th class="color left">Diferencia</th>
            <th class="color center">'.$TOTALE.'</th>
            <th class="color center">'.$TOTALNE.'</th>
            <th class="color center">&nbsp; </th>
            <th class="color center">&nbsp; </th>
        </tr>
    </tbody>
</table>
';

  $html=$html.'
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
$NOMBREARCHIVO="InformeRepaletizaje_";
$FECHADOCUMENTO = $FECHANORMAL."_".$HORAFINAL;
$TIPODOCUMENTO="Informe";
$FORMATO=".pdf";
$NOMBREARCHIVOFINAL=$NOMBREARCHIVO.$FECHADOCUMENTO.$FORMATO;

//CONFIGURACIOND DEL DOCUMENTO
$TIPOPAPEL="LETTER";
$ORIENTACION="P";
$LENGUAJE="ES";
$UNICODE="true";
$ENCODING="UTF-8";

//DETALLE DEL CREADOR DEL INFORME
$TIPOINFORME = "Informe Repaletizaje";
$CREADOR = "Usuario";
$AUTOR = "Usuario";
$ASUNTO = "Informe";

//API DE GENERACION DE PDF
require_once '../api/mpdf/mpdf/autoload.php';
//$PDF = new \Mpdf\Mpdf();W
$PDF = new \Mpdf\Mpdf(['format'=> 'letter']);

//CONFIGURACION FOOTER Y HEADER DEL PDF
$PDF->SetHTMLHeader('
    <table width="100%" >
        <tbody>
            <tr>
            <th width="55%" class="left f10">'.$EMPRESA.'</th>
            <td width="45%" class="right f10">'.$FECHANOMBRE.'</td>
            <td width="10%" class="right f10">'.$HORAFINAL2.'</td>
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
                      
                
                        '.$EMPRESA.'
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

?>