<?php
if (isset($_REQUEST['CAMBIARFOLIO'])) {
    $_SESSION["parametro"] = $_REQUEST['ID'];
    $_SESSION["parametro1"] = "cambiarfolio";
    $_SESSION["urlO"] = $_REQUEST['URLO'];
    echo "<script type='text/javascript'> location.href ='" . $_REQUEST['URL'] . ".php?op';</script>";
}
