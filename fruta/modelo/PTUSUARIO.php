<?php
/*
* MODELO DE CLASE DE LA ENTIDAD  PTUSUARIO
 */

 //ESTRUCTURA DE LA CLASE
class PTUSUARIO {
    
    //ATRIBUTOS DE LA CLASE
    private	$ID_PTUSUARIO;    
    private $FRUTA; 
    private $FGRANEL; 
    private $FGRECEPCION;
    private $FGRMP;
    private $FGRIND;
    private $FGR_CONSOLIDADO;        
    private $FGDESPACHO ;
    private $FGDMP;   
    private $FGDIND;   
    private $FGD_CONSOLIDADO;  
    private $FGGUIA;   
    private $FGGMP;   
    private $FGGIND;
    private $FG_EXISTENCIAMP;   
    private $FG_EXISTENCIAIND;    
    private $FPACKING;
    private $FPPROCESO;
    private $FPREEMBALAJE;
    private $FP_EXISTENCIAMP;
    private $FP_EXISTENCIAIND;
    private $FP_EXISTENCIAPT;
    private $FLOGISTICA;
    private $FLICARGA;
    private $FL_EXISTENCIAPT;
    private $FSAG;
    private $FSINSPECCION;
    private $FS_EXISTENCIAPT;
    private $FFRIGORIFICO;
    private $FFRECEPCIONPT;
    private $FFDESPACHO;
    private $FFDPT;
    private $FFDEX;
    private $FFD_CONSOLIDADO;
    private $FFGUIA;
    private $FFGPT;
    private $FFPC;
    private $FFREPALETIZAJE;    
    private $FF_EXISTENCIAPT;
    private $MATERIAL;
    private $MMATERIAL;
    private $MMRECEPCION;
    private $MMDESPACHO;
    private $MMGUIA;
    private $MMEXISTENCIA;
    private $MENVASE;
    private $MERECEPCION;
    private $MEDESPACHO;
    private $MEEXISTENCIA;
    private $MEGUIA;    
    private $MCONSOLIDADO;    
    private $MCRECEPCION;
    private $MCDESPACHO;
    private $MADMINISTRACION;
    private $MAOC;
    private $MAOC_AR;
    private $MAOC_EXISTENCIAM;
    private $MAOC_EXISTENCIAE;    
    private $MKARDEX;
    private $MKMATERIAL;
    private $MKENVASE;
    private $EXPORTADORA;
    private $ELOGISTICA;
    private $ELICARGA;
    private $EMATERIAL;
    private $EMFICHA;
    private $EINFORME;
    private $EIGRANEL;
    private $EIPT;
    private $EIGESTION;
    private $MANTENEDORES;
    private $M_REGISTRO;
    private $M_EDITAR;
    private $M_VER;
    private $M_INFORME;
    private $M_REPORTE;
    private $M_AGRUPADO;
    private $FHISTORIAL;
    private $FENVASES;
    private $FGENVASES;
    private $AREGISTRO;
    private $INGRESO; 
    private $MODIFICACION; 
    private $ESTADO_REGISTRO; 
    private	$ID_TUSUARIO;
    
    //FUNCIONES GET Y SET
    public function __GET($k){ return $this->$k; }
    public function __SET($k, $v){ return $this->$k = $v; }
}
?>