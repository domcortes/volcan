<?php

include_once '../../assest/modelo/BROKER.php';

class BrokerController {

    static public function ctrIndexBroker($empresa){
        $tabla = 'fruta_broker';
        $item = 'ID_EMPRESA';
        return BROKER::mdlIndexBroker($tabla, $item, $empresa);
    }
}

?>