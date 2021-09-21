<?php
if (isset($_REQUEST['CREARDURL'])) {
    $_SESSION["parametro"] = $_REQUEST['IDP'];
    $_SESSION["parametro1"] = $_REQUEST['OPP'];
    $_SESSION["urlO"] = $_REQUEST['URLP'];
    $_SESSION["dparametro"] = $_REQUEST['IDD'];
    $_SESSION["dparametro1"] = $_REQUEST['OPD'];
    $_SESSION["durlO"] = $_REQUEST['URLD'];
    $_SESSION["dtparametro"] = "";
    $_SESSION["dtparametro1"] = "";
    echo "<script type='text/javascript'> location.href ='" . $_REQUEST['URLT'] . ".php?op';</script>";
}
if (isset($_REQUEST['VERDURL'])) {
    $_SESSION["parametro"] = $_REQUEST['IDP'];
    $_SESSION["parametro1"] = $_REQUEST['OPP'];
    $_SESSION["urlO"] = $_REQUEST['URLP'];
    $_SESSION["dparametro"] = $_REQUEST['IDD'];
    $_SESSION["dparametro1"] = $_REQUEST['OPD'];
    $_SESSION["durlO"] = $_REQUEST['URLD'];
    $_SESSION["dtparametro"] = $_REQUEST['IDT'];
    $_SESSION["dtparametro1"] = "ver";
    echo "<script type='text/javascript'> location.href ='" . $_REQUEST['URLT'] . ".php?op';</script>";
}
if (isset($_REQUEST['EDITARDURL'])) {
    $_SESSION["parametro"] = $_REQUEST['IDP'];
    $_SESSION["parametro1"] = $_REQUEST['OPP'];
    $_SESSION["urlO"] = $_REQUEST['URLP'];
    $_SESSION["dparametro"] = $_REQUEST['IDD'];
    $_SESSION["dparametro1"] = $_REQUEST['OPD'];
    $_SESSION["durlO"] = $_REQUEST['URLD'];
    $_SESSION["dtparametro"] = $_REQUEST['IDT'];
    $_SESSION["dtparametro1"] = "editar";
    echo "<script type='text/javascript'> location.href ='" . $_REQUEST['URLT'] . ".php?op';</script>";
}
if (isset($_REQUEST['DUPLICARDURL'])) {
    $_SESSION["parametro"] = $_REQUEST['IDP'];
    $_SESSION["parametro1"] = $_REQUEST['OPP'];
    $_SESSION["urlO"] = $_REQUEST['URLP'];
    $_SESSION["dparametro"] = $_REQUEST['IDD'];
    $_SESSION["dparametro1"] = $_REQUEST['OPD'];
    $_SESSION["durlO"] = $_REQUEST['URLD'];
    $_SESSION["dtparametro"] = $_REQUEST['IDT'];
    $_SESSION["dtparametro1"] = "crear";
    echo "<script type='text/javascript'> location.href ='" . $_REQUEST['URLT'] . ".php?op';</script>";
}
if (isset($_REQUEST['ELIMINARDURL'])) {
    $_SESSION["parametro"] = $_REQUEST['IDP'];
    $_SESSION["parametro1"] = $_REQUEST['OPP'];
    $_SESSION["urlO"] = $_REQUEST['URLP'];
    $_SESSION["dparametro"] = $_REQUEST['IDD'];
    $_SESSION["dparametro1"] = $_REQUEST['OPD'];
    $_SESSION["durlO"] = $_REQUEST['URLD'];
    $_SESSION["dtparametro"] = $_REQUEST['IDT'];
    $_SESSION["dtparametro1"] = "eliminar";
    echo "<script type='text/javascript'> location.href ='" . $_REQUEST['URLT'] . ".php?op';</script>";
}
