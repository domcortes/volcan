<?php
if (isset($_REQUEST['VERURL'])) {
    $_SESSION["parametro"] = $_REQUEST['ID'];
    $_SESSION["parametro1"] = "ver";
    $_SESSION["urlO"] = $_REQUEST['URLO'];
    echo "<script type='text/javascript'> location.href ='" . $_REQUEST['URL'] . ".php?op';</script>";
}
if (isset($_REQUEST['EDITARURL'])) {
    $_SESSION["parametro"] = $_REQUEST['ID'];
    $_SESSION["parametro1"] = "editar";
    $_SESSION["urlO"] = $_REQUEST['URLO'];
    echo "<script type='text/javascript'> location.href ='" . $_REQUEST['URL'] . ".php?op';</script>";
}
if (isset($_REQUEST['ELIMINARURL'])) {
    $_SESSION["parametro"] = $_REQUEST['ID'];
    $_SESSION["parametro1"] = "0";
    $_SESSION["urlO"] = $_REQUEST['URLO'];
    echo "<script type='text/javascript'> location.href ='" . $_REQUEST['URL'] . ".php?op';</script>";
}
if (isset($_REQUEST['HABILITARURL'])) {
    $_SESSION["parametro"] = $_REQUEST['ID'];
    $_SESSION["parametro1"] = "1";
    $_SESSION["urlO"] = $_REQUEST['URLO'];
    echo "<script type='text/javascript'> location.href ='" . $_REQUEST['URL'] . ".php?op';</script>";
}

if (isset($_REQUEST['APROBARURLPT'])) {

    $DESPACHOPT->__SET('ID_DESPACHO', $_REQUEST['ID']);
    //LLAMADA AL METODO DE EDITAR DEL CONTROLADOR
    $DESPACHOPT_ADO->cerrado($DESPACHOPT);

    $DESPACHOPT->__SET('ID_DESPACHO', $_REQUEST['ID']);
    //LLAMADA AL METODO DE EDITAR DEL CONTROLADOR
    $DESPACHOPT_ADO->Aprobado($DESPACHOPT);

    $ARRAYEXISENCIADESPACHOMP = $EXIEXPORTACION_ADO->verExistenciaPorDespachoEnTransito($_REQUEST['ID']);
    foreach ($ARRAYEXISENCIADESPACHOMP as $r) :
        $EXIEXPORTACION->__SET('ID_EXIEXPORTACION', $r['ID_EXIEXPORTACION']);
        //LLAMADA AL METODO DE EDITAR DEL CONTROLADOR
        $EXIEXPORTACION_ADO->despachadoInterplanta($EXIEXPORTACION);
    endforeach;

    $ARRAYVERFOLIO = $FOLIO_ADO->verFolioPorEmpresaPlantaTemporadaTexportacion($EMPRESAS, $PLANTAS, $TEMPORADAS);
    $FOLIO = $ARRAYVERFOLIO[0]['ID_FOLIO'];

    foreach ($ARRAYEXISENCIADESPACHOMP as $r) :
        $EXIEXPORTACION->__SET('FOLIO_EXIEXPORTACION',  $r['FOLIO_EXIEXPORTACION']);
        $EXIEXPORTACION->__SET('FOLIO_AUXILIAR_EXIEXPORTACION', $r['FOLIO_AUXILIAR_EXIEXPORTACION']);
        $EXIEXPORTACION->__SET('FOLIO_MANUAL', $r['FOLIO_MANUAL']);
        $EXIEXPORTACION->__SET('FECHA_EMBALADO_EXIEXPORTACION', $r['FECHA_EMBALADO_EXIEXPORTACION']);
        $EXIEXPORTACION->__SET('CANTIDAD_ENVASE_EXIEXPORTACION', $r['CANTIDAD_ENVASE_EXIEXPORTACION']);
        $EXIEXPORTACION->__SET('KILOS_NETO_EXIEXPORTACION', $r['KILOS_NETO_EXIEXPORTACION']);
        $EXIEXPORTACION->__SET('KILOS_BRUTO_EXIEXPORTACION', $r['KILOS_BRUTO_EXIEXPORTACION']);
        $EXIEXPORTACION->__SET('PDESHIDRATACION_EXIEXPORTACION', $r['PDESHIDRATACION_EXIEXPORTACION']);
        $EXIEXPORTACION->__SET('KILOS_DESHIRATACION_EXIEXPORTACION', $r['KILOS_DESHIRATACION_EXIEXPORTACION']);
        $EXIEXPORTACION->__SET('OBSERVACION_EXIESPORTACION', $r['OBSERVACION_EXIESPORTACION']);
        $EXIEXPORTACION->__SET('ALIAS_DINAMICO_FOLIO_EXIESPORTACION', $r['ALIAS_DINAMICO_FOLIO_EXIESPORTACION']);
        $EXIEXPORTACION->__SET('ALIAS_ESTATICO_FOLIO_EXIESPORTACION', $r['ALIAS_ESTATICO_FOLIO_EXIESPORTACION']);
        $EXIEXPORTACION->__SET('STOCK', $r['STOCK']);
        $EXIEXPORTACION->__SET('EMBOLSADO', $r['EMBOLSADO']);
        $EXIEXPORTACION->__SET('GASIFICADO', $r['GASIFICADO']);
        $EXIEXPORTACION->__SET('PREFRIO', $r['PREFRIO']);
        $EXIEXPORTACION->__SET('TESTADOSAG', $r['TESTADOSAG']);
        $EXIEXPORTACION->__SET('VGM', $r['VGM']);
        $EXIEXPORTACION->__SET('INGRESO', $r['INGRESO']);
        $EXIEXPORTACION->__SET('ID_TCALIBRE', $r['ID_TCALIBRE']);
        $EXIEXPORTACION->__SET('ID_TEMBALAJE', $r['ID_TEMBALAJE']);
        $EXIEXPORTACION->__SET('ID_TMANEJO', $r['ID_TMANEJO']);
        $EXIEXPORTACION->__SET('ID_FOLIO', $FOLIO);
        $EXIEXPORTACION->__SET('ID_ESTANDAR', $r['ID_ESTANDAR']);
        $EXIEXPORTACION->__SET('ID_PRODUCTOR', $r['ID_PRODUCTOR']);
        $EXIEXPORTACION->__SET('ID_VESPECIES', $r['ID_VESPECIES']);
        $EXIEXPORTACION->__SET('ID_PLANTA2', $r['ID_PLANTA']);
        $EXIEXPORTACION->__SET('ID_DESPACHO2', $_REQUEST['ID']);
        $EXIEXPORTACION->__SET('ID_EMPRESA', $EMPRESAS);
        $EXIEXPORTACION->__SET('ID_PLANTA', $PLANTAS);
        $EXIEXPORTACION->__SET('ID_TEMPORADA', $TEMPORADAS);
        //LLAMADA AL METODO DE REGISTRO DEL CONTROLADOR
        $EXIEXPORTACION_ADO->agregarExiexportacionGuia($EXIEXPORTACION);
    endforeach;
    echo "<script type='text/javascript'> location.href ='" . $_REQUEST['URLO'] . ".php?op';</script>";
}

if (isset($_REQUEST['RECHAZARURLPT'])) {
    $_SESSION["parametro"] = $_REQUEST['ID'];
    $_SESSION["parametro1"] = "rechazar";
    $_SESSION["urlO"] = $_REQUEST['URLO'];
    echo "<script type='text/javascript'> location.href ='" . $_REQUEST['URLM'] . ".php?op';</script>";
}
if (isset($_REQUEST['VERMOTIVOSRURLPT'])) {

    $_SESSION["parametro"] = $_REQUEST['ID'];
    $_SESSION["parametro1"] = "motivo";
    $_SESSION["urlO"] = $_REQUEST['URLO'];
    echo "<script type='text/javascript'> location.href ='" . $_REQUEST['URLMR'] . ".php?op';</script>";
}
