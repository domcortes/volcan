<?php
/*
* MODELO DE CLASE DE LA ENTIDAD  INVENTARIO
 */

 //ESTRUCTURA DE LA CLASE
class INVENTARIOE {
    
    //ATRIBUTOS DE LA CLASE
    private	  $ID_INVENTARIO;
    private	  $TRECEPCION; 
    private	  $VALOR_UNITARIO; 
    private	  $CANTIDAD_INVENTARIO; 
    private	  $FECHA_RECEPCION; 
    private	  $FECHA_DESPACHO; 
    private   $ESTADO; 
    private   $ESTADO_REGISTRO; 
    private   $INGRESO;
    private   $MODIFICACION;    
    private   $ID_EMPRESA;
    private   $ID_PLANTA;
    private   $ID_TEMPORADA;
    private   $ID_BODEGA;
    private   $ID_PRODUCTO;
    private   $ID_TUMEDIDA;
    private   $ID_RECEPCION;
    private   $ID_PLANTA2;
    private   $ID_PLANTA3;
    private   $ID_PROVEEDOR;
    private   $ID_DOCOMPRA;
    private   $ID_PRODUCTOR;
    private   $ID_DESOPACHO;
    
    
    //FUNCIONES GET Y SET
    public function __GET($k){ return $this->$k; }
    public function __SET($k, $v){ return $this->$k = $v; }
}
?>