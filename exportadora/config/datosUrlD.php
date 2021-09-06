<?php

if (isset($_REQUEST['SELECIONOCDURL'])) {

    $_SESSION["parametro"] = $_REQUEST['IDP'];
    $_SESSION["parametro1"] = $_REQUEST['OPP'];
    $_SESSION["urlO"] = $_REQUEST['URLP'];
    $_SESSION["dparametro"] = "";
    $_SESSION["dparametro1"] = "";
    echo "<script type='text/javascript'> location.href ='" . $_REQUEST['URLD'] . ".php?op';</script>";
}

if (isset($_REQUEST['CREARDURL'])) {
    $_SESSION["parametro"] = $_REQUEST['IDP'];
    $_SESSION["parametro1"] = $_REQUEST['OPP'];
    $_SESSION["urlO"] = $_REQUEST['URLP'];
    $_SESSION["dparametro"] = "";
    $_SESSION["dparametro1"] = "";
    echo "<script type='text/javascript'> location.href ='" . $_REQUEST['URLD'] . ".php?op';</script>";
}
if (isset($_REQUEST['VERDURL'])) {
    $_SESSION["parametro"] = $_REQUEST['IDP'];
    $_SESSION["parametro1"] = $_REQUEST['OPP'];
    $_SESSION["urlO"] = $_REQUEST['URLP'];
    $_SESSION["dparametro"] = $_REQUEST['IDD'];
    $_SESSION["dparametro1"] = "ver";
    echo "<script type='text/javascript'> location.href ='" . $_REQUEST['URLD'] . ".php?op';</script>";
}
if (isset($_REQUEST['EDITARDURL'])) {
    $_SESSION["parametro"] = $_REQUEST['IDP'];
    $_SESSION["parametro1"] = $_REQUEST['OPP'];
    $_SESSION["urlO"] = $_REQUEST['URLP'];
    $_SESSION["dparametro"] = $_REQUEST['IDD'];
    $_SESSION["dparametro1"] = "editar";
    echo "<script type='text/javascript'> location.href ='" . $_REQUEST['URLD'] . ".php?op';</script>";
}
if (isset($_REQUEST['DUPLICARDURL'])) {
    $_SESSION["parametro"] = $_REQUEST['IDP'];
    $_SESSION["parametro1"] = $_REQUEST['OPP'];
    $_SESSION["urlO"] = $_REQUEST['URLP'];
    $_SESSION["dparametro"] = $_REQUEST['IDD'];
    $_SESSION["dparametro1"] = "crear";
    echo "<script type='text/javascript'> location.href ='" . $_REQUEST['URLD'] . ".php?op';</script>";
}
if (isset($_REQUEST['ELIMINARDURL'])) {
    $_SESSION["parametro"] = $_REQUEST['IDP'];
    $_SESSION["parametro1"] = $_REQUEST['OPP'];
    $_SESSION["urlO"] = $_REQUEST['URLP'];
    $_SESSION["dparametro"] = $_REQUEST['IDD'];
    $_SESSION["dparametro1"] = "eliminar";
    echo "<script type='text/javascript'> location.href ='" . $_REQUEST['URLD'] . ".php?op';</script>";
}


