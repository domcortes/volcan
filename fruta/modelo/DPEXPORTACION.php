<?php

    /*
    * MODELO DE CLASE DE LA ENTIDAD  PLANTA
    */

    //ESTRUCTURA DE LA CLASE
    class DPEXPORTACION {
        
        //ATRIBUTOS DE LA CLASE
        private	  $ID_DPEXPORTACION; 
        private	  $FOLIO_DPEXPORTACION; 
        private	  $FOLIO_AUX_DPEXPORTACION; 
        private	  $NUMERO_LINEA; 
        private   $FECHA_EMBALADO_DPEXPORTACION;
        private   $CANTIDAD_ENVASE_DPEXPORTACION;
        private   $KILOS_NETO_DPEXPORTACION;
        private   $KILOS_BRUTO_DPEXPORTACION;
        private   $KILOS_DESHIDRATACION_DPEXPORTACION;
        private   $PDESHIDRATACION_DPEXPORTACION;
        private   $ALIAS_FOLIO_DPEXPORTACION;
        private   $EMBOLSADO;
        private   $ESTADO; 
        private   $ESTADO_REGISTRO; 
        private   $ID_ESTANDAR;
        private   $ID_CALIBRE;
        private   $ID_FOLIO;
        private   $ID_PVESPECIES;
        private   $ID_PROCESO;
        private   $ID_PRODUCTOR;
        private   $ID_TMANEJO;
        
        
        //FUNCIONES GET Y SET
        public function __GET($k){ return $this->$k; }
        public function __SET($k, $v){ return $this->$k = $v; }
    }
?>