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

