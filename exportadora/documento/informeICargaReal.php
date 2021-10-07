<?php

//LLAMADA ARCHIVOS NECESARIOS PARA LAS OPERACIONES 
include_once '../controlador/TUSUARIO_ADO.php';
include_once '../controlador/USUARIO_ADO.php';
include_once '../controlador/EMPRESA_ADO.php';
include_once '../controlador/PLANTA_ADO.php';
include_once '../controlador/TEMPORADA_ADO.php';


include_once '../controlador/FOLIO_ADO.php';
include_once '../controlador/VESPECIES_ADO.php';
include_once '../controlador/PRODUCTOR_ADO.php';
include_once '../controlador/EEXPORTACION_ADO.php';
include_once '../controlador/DESPACHOEX_ADO.php';
include_once '../controlador/TCALIBRE_ADO.php';



include_once '../controlador/ICARGA_ADO.php';
//INCIALIZAR LAS VARIBLES
//INICIALIZAR CONTROLADOR
$TUSUARIO_ADO = new TUSUARIO_ADO();
$USUARIO_ADO = new USUARIO_ADO();
$EMPRESA_ADO =  new EMPRESA_ADO();
$PLANTA_ADO =  new PLANTA_ADO();
$TEMPORADA_ADO =  new TEMPORADA_ADO();

$FOLIO_ADO =  new FOLIO_ADO();
$EMPRESA_ADO = new EMPRESA_ADO();
$PLANTA_ADO = new PLANTA_ADO();
$VESPECIES_ADO = new VESPECIES_ADO();
$PRODUCTOR_ADO =  new PRODUCTOR_ADO();
$EEXPORTACION_ADO =  new EEXPORTACION_ADO();
$DESPACHOEX_ADO =  new DESPACHOEX_ADO();
$TCALIBRE_ADO =  new TCALIBRE_ADO();


$ICARGA_ADO =  new ICARGA_ADO();

//INCIALIZAR VARIBALES A OCUPAR PARA LA FUNCIONALIDAD

$TOTALBRUTO = "";
$TOTALNETO = "";
$TOTALENVASE = "";
$IDOP="";
$NOMBREUSUARIO="";
$NOMBRE="";


//INICIALIZAR ARREGLOS
$ARRAYCARGAREAL = "";
$ARRAYCARGAREALTOTALES = "";

$ARRAYVEREMPRESA = "";
$ARRAYVERPRODUCTOR = "";
$ARRAYFECHA = "";
$ARRAYPRODUCTOR = "";
$ARRAYUSUARIO="";
$ARRAYCALIBRE="";


if(isset($_REQUEST['NOMBREUSUARIO'])){
  $NOMBREUSUARIO = $_REQUEST['NOMBREUSUARIO'];
  $ARRAYUSUARIO=$USUARIO_ADO->ObtenerNombreCompleto($NOMBREUSUARIO);
  $NOMBRE = $ARRAYUSUARIO[0]["NOMBRE_COMPLETO"];  
}

if($_REQUEST['parametro']){         
 $IDOP = $_REQUEST['parametro'];
}

$ARRAYCARGAREAL = $DESPACHOEX_ADO->DespachoExistencia($IDOP);
$ARRAYCARGAREALTOTALES = $DESPACHOEX_ADO->obtenerTotalesDespachoExistencia($IDOP);
$TOTALENVASE = $ARRAYCARGAREALTOTALES[0]['ENVASE'];
$TOTALNETO = $ARRAYCARGAREALTOTALES[0]['NETO'];
$TOTALBRUTO = $ARRAYCARGAREALTOTALES[0]['BRUTO'];
$TOTALDESHIDRATACION= $ARRAYCARGAREALTOTALES[0]['DESHIDRATACION'];


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
    <title>Informe Carga Real</title>
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
        INFORME CARGA REAL
      </h2>      
    </div>
     
      </div>
      <table border="0" cellspacing="0" cellpadding="0">
        <thead>
          <tr>
            <th colspan="11" class="center"></th>
          </tr>
          <tr>            
            <th class="color left">Folio</th>
            <th class="color center">Fecha Embalado</th>
            <th class="color center ">CSG </th>
            <th class="color center ">Productor </th>
            <th class="color center">Envase/Estandar</th>
            <th class="color center ">Variedad </th>
            <th class="color center">Embolsado</th>
            <th class="color center">Calibre</th>
            <th class="color center">Cant. Envase</th>
            <th class="color center">Kilos Neto</th>
            <th class="color center">Kilos Con Deshi.</th>
          </tr>
        </thead>
         <tbody>
        ';

        
        foreach ($ARRAYCARGAREAL as $r) : 
            
            $ARRAYVEREMPRESA = $EMPRESA_ADO->verEmpresa($r['ID_EMPRESA']);
            $ARRAYVERPRODUCTOR = $PRODUCTOR_ADO->verProductor($r['ID_PRODUCTOR']);
            $ARRAYVERVESPECIESID = $VESPECIES_ADO->verVespecies($r['ID_VESPECIES']);   
            $ARRAYEVEEXPORTACIONID = $EEXPORTACION_ADO->verEstandar($r['ID_ESTANDAR']);
            if($r['EMBOLSADO']=="1"){
              $EMBOLSADO="SI";
          }
          if($r['EMBOLSADO']=="0"){
              $EMBOLSADO="NO";
          }

          
    $ARRAYCALIBRE = $TCALIBRE_ADO->verCalibre($r['ID_CALIBRE']);
    if ($ARRAYCALIBRE) {
      $CALIBRE = $ARRAYCALIBRE[0]['NOMBRE_CALIBRE'];
    } else {
      $CALIBRE  = "Sin Calibre";
    }

        $html=$html.'    
            <tr class="center">      
                <td>'. $r['FOLIO_AUXILIAR_EXIEXPORTACION'].'</td>
                <td>'. $r['FECHA_EMBALADO_EXIEXPORTACION'].'</td>              
                <td> '. $ARRAYVERPRODUCTOR[0]['CSG_PRODUCTOR'].' </td>
                <td>  '. $ARRAYVERPRODUCTOR[0]['NOMBRE_PRODUCTOR'].'</td>
                <td> '.$ARRAYEVEEXPORTACIONID[0]['NOMBRE_ESTANDAR'].'</td>
                <td> '.$ARRAYVERVESPECIESID[0]['NOMBRE_VESPECIES'].' </td>
                <td>'. $EMBOLSADO.'</td>
                <td>'. $CALIBRE.'</td>
                <td>'. $r['CANTIDAD_ENVASE_EXIEXPORTACION'].'</td>
                <td>'. $r['KILOS_NETO_EXIEXPORTACION'].'</td>
                <td>'. $r['KILOS_DESHIRATACION_EXIEXPORTACION'].'</td>
            </tr>
            ';
        endforeach; 
        $html=$html.'    
        <tr>
            <th class="color left"> </th>
            <th class="color center"> </th>
            <th class="color center ">  </th>
            <th class="color center ">  </th>
            <th class="color center ">  </th>
            <th class="color center ">  </th>
            <th class="color center ">  </th>
            <th class="color right">Sub Total </th>
            <th class="color right"> '.$TOTALENVASE.'</th>
            <th class="color right">'.$TOTALNETO.' </th>
            <th class="color right "> '.$TOTALDESHIDRATACION.' </th>
        </tr>
        ';
        

$html=$html.'
        </tbody>
      </table>

    </main>
    <footer>
    Informe generado por Departamento TI Fruticola Volcan <a href="mailto:ti@fvolcan.cl">ti@fvolcan.cl</a>
    <br>
    Impreso Por: <b>' . $NOMBRE . '</b>
     
    </footer>
  </body>
</html>

';






//CREACION NOMBRE DEL ARCHIVO
$NOMBREARCHIVO="InformeCargaReal_";
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
$TIPOINFORME = "Informe Carga Real ";
$CREADOR = "Usuario";
$AUTOR = "Usuario";
$ASUNTO = "Informe";

//API DE GENERACION DE PDF
require_once '../../api/mpdf/mpdf/autoload.php';
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
