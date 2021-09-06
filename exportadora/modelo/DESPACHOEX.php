<?php

    /*
    * MODELO DE CLASE DE LA ENTIDAD  PLANTA
    */

    //ESTRUCTURA DE LA CLASE
    class DESPACHOEX {
        
        //ATRIBUTOS DE LA CLASE
        private	  $ID_DESPACHO; 
        private   $FECHA_DESPACHO;
        private   $SNICARGA;
        private   $FECHA_INGRESO_DESPACHO;
        private   $FECHA_MODIFICACION_DESPACHO;
        private   $NUMERO_SELLO_DESPACHO;
        private   $FECHA_GUIA_DESPACHO;
        private   $NUMERO_GUIA_DESPACHO;
        private   $NUMERO_CONTENEDOR_DESPACHO;
        private   $NUMERO_PLANILLA_DESPACHO;
        private   $CANTIDAD_ENVASE_DESPACHO;
        private   $KILOS_NETO_DESPACHO;
        private   $KILOS_BRUTO_DESPACHO;
        private	  $TERMOGRAFO_DESPACHO;
        private	  $VGM;
        private   $TEMBARQUE_DESPACHOEX;
        private   $BOOKING_DESPACHOEX;
        private   $FECHAETD_DESPACHOEX;
        private   $FECHAETA_DESPACHOEX;
        private   $CRT_DESPACHOEX;
        private   $NVUELO_DESPACHOEX;
        private   $FECHASTACKING_DESPACHOEX;
        private   $NVIAJE_DESPACHOEX;
        private   $PATENTE;
        private   $PATENTE_CARRO;
        private	  $OBSERVACION_DESPACHO;
        private   $ESTADO;
        private   $ESTADO_REGISTRO;
        private   $ID_ICARGA;
        private   $ID_INPECTOR;
        private   $ID_DFINAL;
        private   $ID_EXPPORTADORA;
        private   $ID_RFINAL;
        private   $ID_AGCARGA;
        private   $ID_MERCADO;
        private   $ID_PAIS;
        private   $ID_TRANSPORTE2;
        private   $ID_TVEHICULO;
        private   $ID_LCARGA;
        private   $ID_LDESTINO;
        private   $ID_LAREA;
        private   $ID_AEROLINEA;
        private   $ID_AERONAVE;
        private   $ID_ACARGA;
        private   $ID_ADESTINO;
        private   $ID_NAVIERA;
        private   $ID_NAVE;
        private   $ID_PCARGA;
        private   $ID_PDESTINO;
        private   $ID_TRANSPORTE;
        private   $ID_CONDUCTOR;
        private   $ID_CONTRAPARTE;
        private   $ID_EMPRESA;
        private   $ID_PLANTA;
        private   $ID_TEMPORADA;


        //FUNCIONES GET Y SET
        public function __GET($k){ return $this->$k; }
        public function __SET($k, $v){ return $this->$k = $v; }
    }
?>