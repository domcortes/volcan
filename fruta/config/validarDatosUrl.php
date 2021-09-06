<?php


$ACTUALURL = "";
$OPURL = "";
$OPURL = $_SERVER['QUERY_STRING'];
$ACTUALURL = $_SERVER['PHP_SELF'];

if ($OPURL == "") {
    $_SESSION["parametro"] = "";
    $_SESSION["parametro1"] = "";
    $_SESSION["urlo"] = "";   
}
if ($OPURL != "") {
    if ($_SESSION["parametro"] == "" && $_SESSION["parametro1"] == "") {
        echo "<script type='text/javascript'> location.href ='" . $ACTUALURL . "';</script>";
    }
}
