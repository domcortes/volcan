<?php


$DOPURL = "";
$DOPURL = $_SERVER['QUERY_STRING'];

if ($DOPURL == "") {
    $_SESSION["dparametro"] = "";
    $_SESSION["dparametro1"] = "";
    if ($_SESSION["dparametro"] == "" && $_SESSION["dparametro1"] == "") {
        if (isset($_SESSION["parametro"]) && isset($_SESSION["parametro1"]) && isset($_SESSION["urlO"])) {
            echo "<script type='text/javascript'> location.href ='" . $_SESSION['urlO'] . ".php?op';</script>";
        }
    }
}

