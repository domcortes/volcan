<?php

    /*
    * MODELO DE CLASE DE LA ENTIDAD  PLANTA
    */

    //ESTRUCTURA DE LA CLASE
    class DESPACHOPT {
        
        //ATRIBUTOS DE LA CLASE
        private	  $ID_DESPACHO; 
        private	  $NUMERO_DESPACHO; 
        private   $FECHA_DESPACHO;
        private   $FECHA_INGRESO_DESPACHO;
        private   $FECHA_MODIFICACION_DESPACHO;
        private   $NUMERO_GUIA_DESPACHO;
        private   $CANTIDAD_ENVASE_DESPACHO;
        private   $KILOS_NETO_DESPACHO;
        private   $KILOS_BRUTO_DESPACHO;
        private   $NUMERO_SELLO_DESPACHO;
        private   $PATENTE_CAMION;
        private   $PATENTE_CARRO;
        private	  $TDESPACHO;
        private	  $OBSERVACION_DESPACHO;
        private   $ESTADO;
        private   $ESTADO_DESPACHO;
        private   $ESTADO_REGISTRO;
        private   $REGALO_DESPACHO;
        private   $TOTAL_PRECIO;
        private   $VGM;
        private   $ID_PLANTA2;
        private   $ID_PLANTA3;
        private   $ID_COMPRADOR;
        private   $ID_PRODUCTOR;
        private   $ID_TRANSPORTE;
        private   $ID_CONDUCTOR;
        private   $ID_EMPRESA;
        private   $ID_PLANTA;
        private   $ID_TEMPORADA;


        //FUNCIONES GET Y SET
        public function __GET($k){ return $this->$k; }
        public function __SET($k, $v){ return $this->$k = $v; }
    }
?>