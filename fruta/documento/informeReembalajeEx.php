<?php 

//LLAMADA ARCHIVOS NECESARIOS PARA LAS OPERACIONES 
include_once '../controlador/TUSUARIO_ADO.php';
include_once '../controlador/USUARIO_ADO.php';
include_once '../controlador/EMPRESA_ADO.php';
include_once '../controlador/PLANTA_ADO.php';
include_once '../controlador/TEMPORADA_ADO.php';

include_once '../controlador/TREEMBALAJE_ADO.php';
include_once '../controlador/DREXPORTACION_ADO.php';
include_once '../controlador/DRINDUSTRIAL_ADO.php';
include_once '../controlador/REEMBALAJE_ADO.php';

include_once '../controlador/PVESPECIES_ADO.php';
include_once '../controlador/VESPECIES_ADO.php';
include_once '../controlador/PRODUCTOR_ADO.php';
include_once '../controlador/EXIEXPORTACION_ADO.php';
include_once '../controlador/EEXPORTACION_ADO.php';
include_once '../controlador/ERECEPCION_ADO.php';
include_once '../controlador/EINDUSTRIAL_ADO.php';
include_once '../controlador/TMANEJO_ADO.php';

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
$EXIEXPORTACION_ADO =  new EXIEXPORTACION_ADO();
$TREEMBALAJE_ADO =  new TREEMBALAJE_ADO();
$EEXPORTACION_ADO =  new EEXPORTACION_ADO();
$ERECEPCION_ADO =  new ERECEPCION_ADO();
$EINDUSTRIAL_ADO =  new EINDUSTRIAL_ADO();
$TMANEJO_ADO =  new TMANEJO_ADO();

$DREXPORTACION_ADO =  new DREXPORTACION_ADO();
$DRINDUSTRIAL_ADO =  new DRINDUSTRIAL_ADO();

$REEMBALAJE_ADO =  new REEMBALAJE_ADO();


//INCIALIZAR VARIBALES A OCUPAR PARA LA FUNCIONALIDAD
$IDOP="";
$NUMEROREEMBALAJE="";
$VARIEDAD="";
$FECHAREEMBALAJE="";
$TIPOREEMBALAJE="";
$TURNO="";
$EMBOLSADO="";

$PRODUCTOR="";
$CSGPRODUCTOR="";
$NOMBREPRODUCTOR="";
$PLANTA="";

$TOTALENVASE="";
$TOTALNETO="";
$TOTALBRUTO=0;

$TOTALENVASEDEXPORTACION="";
$TOTALNETODEXPORTACION="";
$TOTALBRUTODEXPORTACION="";
$TOTALDESHIDRATACIONDEXPORTACION="";

$TOTALENVASEDINDUSTRIAL="";
$TOTALNETODINDUSTRIAL="";
$TOTALBRUTODINDUSTRIAL="";

$PDEXPORTACION="";
$PDINDUSTRIAL="";
$PDTOTAL="";

$TOTALSALIDA="";
$TOTAL2="";
$TOTALDIFERENCIA="";

$EMPRESA="";
$EMPRESAURL="";


$html='';


//INICIALIZAR ARREGLOS

$ARRAYVERTREEMBALAJE="";
$ARRAYVERPVESPECIES="";
$ARRAYVERVESPECIES="";

$ARRAYVESPECIES="";
$ARRAYPVESPECIES="";

$ARRAYDEXPORTACION="";
$ARRAYDEXPORTACION2="";
$ARRAYDEXPORTACIONTOTALES = "";

$ARRAYDINDUSTRIAL="";
$ARRAYDINDUSTRIAL2="";
$ARRAYDINDUSTRIALTOTALES = "";

$ARRAYDREPALETIZAJETOTALES = "";
$ARRAYEXISTENCIATOMADA="";
$ARRAYEXISTENCIATOMADATOTALES="";
$ARRAYEVEEXPORTACIONID="";
$ARRAYEVERERECEPCIONID="";
$ARRAYEVEINDUSTRIALID;

$ARRAYEMPRESA="";
$ARRAYREEMBALAJE="";
$ARRAYREEMBALAJETOTALES="";
$ARRAYUSUARIO="";

if(isset($_REQUEST['NOMBREUSUARIO'])){
    $NOMBREUSUARIO = $_REQUEST['NOMBREUSUARIO'];
    $ARRAYUSUARIO=$USUARIO_ADO->ObtenerNombreCompleto($NOMBREUSUARIO);
    $NOMBRE = $ARRAYUSUARIO[0]["NOMBRE_COMPLETO"];
    
  }
  

if (isset($_REQUEST['parametro']) ) {
    $IDOP = $_REQUEST['parametro'];
}

$ARRAYREEMBALAJE = $REEMBALAJE_ADO->verReembalaje3($IDOP);
$ARRAYREEMBALAJETOTALES = $REEMBALAJE_ADO->obtenerTotales($IDOP);
$ARRAYEXISTENCIATOMADA=$EXIEXPORTACION_ADO->buscarPorProcesoReembalajeEnReembalaje2($IDOP);

$ARRAYDEXPORTACION=$DREXPORTACION_ADO->buscarPorReembalaje2($IDOP);
$ARRAYDEXPORTACIONTOTALES = $DREXPORTACION_ADO->obtenerTotales2($IDOP);

$ARRAYDINDUSTRIAL=$DRINDUSTRIAL_ADO->buscarPorReembalaje2($IDOP);
$ARRAYDINDUSTRIALTOTALES = $DRINDUSTRIAL_ADO->obtenerTotales2($IDOP);

$PDEXPORTACION=$ARRAYREEMBALAJE[0]['PDEXPORTACION_REEMBALAJE'];
$PDINDUSTRIAL=$ARRAYREEMBALAJE[0]['PDINDUSTRIAL_REEMBALAJE'];
$NUMEROREEMBALAJE=$ARRAYREEMBALAJE[0]['NUMERO_REEMBALAJE'];
$PDTOTAL=$PDEXPORTACION+$PDINDUSTRIAL;

$TOTALSALIDA=$ARRAYREEMBALAJETOTALES[0]['TOTAL_SALIDA'];

$TOTALENVASEDEXPORTACION=$ARRAYDEXPORTACIONTOTALES[0]['TOTAL_ENVASE']; //TOTAL_DESHIDRATACION
$TOTALNETODEXPORTACION=$ARRAYDEXPORTACIONTOTALES[0]['TOTAL_NETO'];
$TOTALDESHIDRATACIONDEXPORTACION=$ARRAYDEXPORTACIONTOTALES[0]['TOTAL_DESHIDRATACION'];
$TOTALBRUTODEXPORTACION=$ARRAYDEXPORTACIONTOTALES[0]['TOTAL_BRUTO'];

$TOTALNETODINDUSTRIAL=$ARRAYDINDUSTRIALTOTALES[0]['TOTAL_NETO'];
//$TOTALBRUTODINDUSTRIAL=$ARRAYDINDUSTRIALTOTALES[0]['TOTAL_BRUTO'];

$ARRAYEXISTENCIATOMADATOTALES=$EXIEXPORTACION_ADO->obtenerTotales2($IDOP);

$TOTALENVASE=$ARRAYEXISTENCIATOMADATOTALES[0]['TOTAL_ENVASE'];
$TOTALNETO=$ARRAYEXISTENCIATOMADATOTALES[0]['TOTAL_NETO'];

$TOTAL2=$TOTALNETO-$TOTALSALIDA;

$ARRAYVERPVESPECIES=$PVESPECIES_ADO->verPvespecies($ARRAYREEMBALAJE[0]['ID_PVESPECIES']);
$ARRAYVERVESPECIES=$VESPECIES_ADO->verVespecies($ARRAYVERPVESPECIES[0]['ID_VESPECIES']);

$VARIEDAD=$ARRAYVERVESPECIES[0]['NOMBRE_VESPECIES'];
$FECHAREEMBALAJE=$ARRAYREEMBALAJE[0]['FECHA'];

$ARRAYTREEMBALAJE=$TREEMBALAJE_ADO->verTreembalaje($ARRAYREEMBALAJE[0]['ID_TREEMBALAJE']);

$TIPOREEMBALAJE=$ARRAYTREEMBALAJE[0]['NOMBRE_TREEMBALAJE'];
if($ARRAYREEMBALAJE[0]['TURNO']==1){
    $TURNO="DIA";
}
if($ARRAYREEMBALAJE[0]['TURNO']==2){
    $TURNO="NOCHE";
}
$PRODUCTOR=$ARRAYREEMBALAJE[0]['ID_PRODUCTOR'];



$ARRAYPRODUCTOR=$PRODUCTOR_ADO->verProductor($PRODUCTOR);
$NOMBREPRODUCTOR=$ARRAYPRODUCTOR[0]['NOMBRE_PRODUCTOR'];
$CSGPRODUCTOR=$ARRAYPRODUCTOR[0]['CSG_PRODUCTOR'];


$ARRAYPLANTA=$PLANTA_ADO->verPlanta($ARRAYREEMBALAJE[0]['ID_PLANTA']);
$ARRAYEMPRESA=$EMPRESA_ADO->verEmpresa($ARRAYREEMBALAJE[0]['ID_EMPRESA']);
$ARRAYTEMPORADA=$TEMPORADA_ADO->verTemporada($ARRAYREEMBALAJE[0]['ID_TEMPORADA']);
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
    <title>Informe Reembalaje</title>
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
        INFORME REEMBALAJE 
        <br>
        <b> Numero Reembalaje: ' . $NUMEROREEMBALAJE . '</b>
      </h2>
      <div id="details" class="clearfix">
        
        <div id="invoice">
          <div class="date"><b>Fecha Reembalaje: </b>'.$FECHAREEMBALAJE.' </div>
          <div class="date"><b>Empresa: </b>'.$EMPRESA.'</div>
          <div class="date"><b>Planta: </b>'.$PLANTA.'</div>
          <div class="date"><b>Temporada: </b>'.$TEMPORADA.'</div>
        </div>

        <div id="client">
          <div class="address"><b>Tipo Reembalaje: </b>'.$TIPOREEMBALAJE.'</div>
          <div class="address"><b>Nombre Productor: </b>'.$NOMBREPRODUCTOR.'</div>
          <div class="address"><b>CSG: </b>'.$CSGPRODUCTOR.'</div>
          <div class="address"><b>Variedad: </b>'.$VARIEDAD.' </div>
        </div>
        
      </div>
     ';
  
$html=$html.'      
      <table border="0" cellspacing="0" cellpadding="0">
        <thead>
          <tr>
            <th colspan="9" class="center">INGRESO.</th>
          </tr>
          <tr>
            <th class="color left">Folio</th>
            <th class="color center">Fecha Ingreso</th>
            <th class="color center">Envase/Estandar</th>
            <th class="color center">Cant. Envase</th>
            <th class="color center">Kilos Neto</th>
            <th class="color center">Kilos Con Deshidratacion</th>
            <th class="color center">Embolsado</th>
            <th class="color center ">Variedad </th>
            <th class="color center">Tipo Manejo</th>       
          </tr>
        </thead>
         <tbody>
        ';
        foreach ($ARRAYEXISTENCIATOMADA as $r) : 

            $ARRAYVERPRODUCTORID = $PRODUCTOR_ADO->verProductor($r['ID_PRODUCTOR']);    
            $ARRAYVERPVESPECIESID = $PVESPECIES_ADO->verPvespecies($r['ID_PVESPECIES']);
            $ARRAYVERVESPECIESID = $VESPECIES_ADO->verVespecies($ARRAYVERPVESPECIESID[0]['ID_VESPECIES']);  
            $ARRAYEVERERECEPCIONID = $EEXPORTACION_ADO->verEstandar($r['ID_ESTANDAR']);
            $ARRAYTMANEJO = $TMANEJO_ADO->verTmanejo($r['ID_TMANEJO']);
            $TMANEJO = $ARRAYTMANEJO[0]['NOMBRE_TMANEJO'];
            if($r['EMBOLSADO']=="1"){
                $EMBOLSADO="SI";
            }
            if($r['EMBOLSADO']=="0"){
                $EMBOLSADO="NO";
            }
$html=$html.'    
            <tr>
                <th class=" left">'.$r['FOLIO_AUXILIAR_EXIEXPORTACION'].'</th>
                <td class=" center">'.$r['EMBALADO'].'</td>
                <td class=" center">'.$ARRAYEVERERECEPCIONID[0]['NOMBRE_ESTANDAR'].'</td>
                <td class=" center">'.$r['ENVASE'].'</td>
                <td class=" center">'.$r['NETO'].'</td>
                <td class=" center">'.$r['DESHIDRATACION'].'</td>
                <td class=" center">'.$EMBOLSADO.'</td>
                <td class=" center">'.$TMANEJO.'</td>
                <td class=" center ">'.$ARRAYVERVESPECIESID[0]['NOMBRE_VESPECIES'].' </td>
            </tr>
';

        endforeach;

        $html=$html.'
    
        <tr>
            <th class=" left"></th>
            <th class=" center"></th>
            <th class=" center"></th>
            <th class=" right">Sub Total</th>
            <th class=" center">'.$TOTALENVASE.'</th>
            <th class=" center">'.$TOTALNETO.'</th>
            <th class=" center"></th>
            <th class=" center "> </th>
            <th class=" center "> </th>
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
            <th colspan="9" class="center">SALIDA.</th>
            </tr>
          <tr>
            <th colspan="9" class="center">PRODUCTO TERMINADO.</th>
          </tr>
          <tr>
            <th class="color left">Folio</th>
            <th class="color center">Fecha Embalado</th>
            <th class="color center">Envase/Estandar</th>
            <th class="color center">Cant. Envase</th>
            <th class="color center">Kilos Neto</th>
            <th class="color center">Kilos Con Deshidratacion</th>
            <th class="color center">Embolsado</th>
            <th class="color center ">Variedad </th>
            <th class="color center">Tipo Manejo</th>       
          </tr>
        </thead>
         <tbody>
        ';
        foreach ($ARRAYDEXPORTACION as $r) : 
    
            $ARRAYVERPRODUCTORID = $PRODUCTOR_ADO->verProductor($r['ID_PRODUCTOR']);    
            $ARRAYVERPVESPECIESID = $PVESPECIES_ADO->verPvespecies($r['ID_PVESPECIES']);
            $ARRAYVERVESPECIESID = $VESPECIES_ADO->verVespecies($ARRAYVERPVESPECIESID[0]['ID_VESPECIES']);  
            $ARRAYEVEEXPORTACIONID = $EEXPORTACION_ADO->verEstandar($r['ID_ESTANDAR']);
            $ARRAYTMANEJO = $TMANEJO_ADO->verTmanejo($r['ID_TMANEJO']);
            $TMANEJO = $ARRAYTMANEJO[0]['NOMBRE_TMANEJO'];
            if($r['EMBOLSADO']=="1"){
                $EMBOLSADO="SI";
            }
            if($r['EMBOLSADO']=="0"){
                $EMBOLSADO="NO";
            }
        $html=$html.'    
        <tr>
            <th class=" left"> '.$r['FOLIO_DREXPORTACION'].'</th>
            <td class=" center"> '.$r['FECHA'].'</td>
            <td class=" center"> '.$ARRAYEVEEXPORTACIONID[0]['NOMBRE_ESTANDAR'].'</td>
            <td class=" center">'.$r['ENVASE'].' </td>
            <td class=" center"> '.$r['NETO'].'</td>
            <td class=" center "> '.$r['DESHIDRATACION'].' </td>
            <td class=" center "> '.$EMBOLSADO.' </td>
            <td class=" center "> '.$TMANEJO.' </td>
            <td class=" center "> '.$ARRAYVERVESPECIESID[0]['NOMBRE_VESPECIES'].' </td>
        </tr>
        ';
        
    endforeach;
            $html=$html.'    
            <tr>
                <th class=" left"> </th>
                <th class=" center"> </th>
                <th class=" center"> </th>
                <th class=" right">Sub Total </th>
                <th class=" center"> '.$TOTALENVASEDEXPORTACION.'</th>
                <th class=" center">'.$TOTALNETODEXPORTACION.' </th>
                <th class=" center "> '.$TOTALDESHIDRATACIONDEXPORTACION.' </th>
                <th class=" center ">  </th>
                <th class=" center ">  </th>
            </tr>
            ';


        $html=$html.'
        </tbody>
      </table>
      ';
      $html=$html.'  
      <br>    
      <table border="0" cellspacing="0" cellpadding="0">
        <thead>
           
          <tr>
            <th colspan="5" class="center">PRODUCTO INDUSTRIAL.</th>
          </tr>
          <tr>
            <th class="color left">Folio</th>
            <th class="color center">Fecha Embalado</th>
            <th class="color center">Envase/Estandar</th>
            <th class="color center">Kilos Neto</th>
            <th class="color center ">Variedad </th>
          </tr>
        </thead>
         <tbody>
        ';
        foreach ($ARRAYDINDUSTRIAL as $r) : 
    
            $ARRAYVERPRODUCTORID = $PRODUCTOR_ADO->verProductor($r['ID_PRODUCTOR']);    
            $ARRAYVERPVESPECIESID = $PVESPECIES_ADO->verPvespecies($r['ID_PVESPECIES']);
            $ARRAYVERVESPECIESID = $VESPECIES_ADO->verVespecies($ARRAYVERPVESPECIESID[0]['ID_VESPECIES']);  
            $ARRAYEVEINDUSTRIALID = $EINDUSTRIAL_ADO->verEstandar($r['ID_ESTANDAR']);
                 
        $html=$html.'    
        <tr>
            <th class=" left"> '.$r['FOLIO_DRINDUSTRIAL'].'</th>
            <td class=" center"> '.$r['FECHA'].'</td>
            <td class=" center"> '.$ARRAYEVEINDUSTRIALID[0]['NOMBRE_ESTANDAR'].'</td>
            <td class=" center"> '.$r['KILOS_NETO_DRINDUSTRIAL'].'</td>
            <td class=" center "> '.$ARRAYVERVESPECIESID[0]['NOMBRE_VESPECIES'].' </td>
        </tr>
        ';

        endforeach;
        $html=$html.'    
        <tr>
            <th class=" left"> </th>
            <th class=" center"> </th>
            <th class=" right">Sub Total </th>
            <th class=" center">'.$TOTALNETODINDUSTRIAL.' </th>
            <th class=" center ">  </th>
        </tr>
        ';

        $html=$html.'
        </tbody>
      </table>
      ';

$html=$html.'
     
    </div>
      <div id="details" >
            
        <div id="client">
          <div class="address"><b>PORCENTAJES: </b></div>
          <div class="address">EXPORTACION:  '.$PDEXPORTACION.'</div>
          <div class="address">INDUSTRIAL: '.$PDINDUSTRIAL.' </div>
          <div class="address">TOTAL: '.$PDTOTAL.'</div>
        </div>
        <div id="client">
            <div class="address"><b>DIFERENCIA: </b></div>
            <div class="address">KILOS NETO INGRESO.:  '.$TOTALNETO.'</div>
            <div class="address">KILOS NETO SALIDA: '.$TOTALSALIDA.' </div>
            <div class="address">TOTAL: '.$TOTAL2.'</div>
        </div>
      </div>
      <br>
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
$NOMBREARCHIVO="InformeReembalaje_";
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
$TIPOINFORME = "Informe Reembalaje";
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