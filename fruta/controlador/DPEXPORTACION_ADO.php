<?php

//LLAMADA DE LOS ARCHIVOS NECESAROP PARA LA OPERACION DEL CONTROLADOR
//LLAMADA AL MODELO DE CLASE
include_once '../modelo/DPEXPORTACION.php';
//LLAMADA AL CONFIGURACION DE LA BASE DE DATOS
include_once '../config/BDCONFIG.php';

//INICIALIZAR VARIABLES
$HOST="";
$DBNAME="";
$USER="";
$PASS="";

//ESTRUCTURA DEL CONTROLADOR
class DPEXPORTACION_ADO {
   
    //ATRIBUTO
    private $conexion;
    
    //LLAMADO A LA BD Y CONFIGURAR PARAMETROS
    public function __CONSTRUCT()
    {
        try
        {
            $BDCONFIG = new BDCONFIG();
            $HOST = $BDCONFIG->__GET('HOST');
            $DBNAME = $BDCONFIG->__GET('DBNAME');
            $USER = $BDCONFIG->__GET('USER');
            $PASS = $BDCONFIG->__GET('PASS');

            
            $this->conexion = new PDO('mysql:host='.$HOST.';dbname='.$DBNAME, $USER ,$PASS);
            $this->conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            
        }
        catch(Exception $e)
        {
            die($e->getMessage());
        }
    }
    
    
    
 //FUNCIONES BASICAS 
 //LISTAR TODO CON LIMITE DE 6 FILAS   
    public function listarDpexportacion(){
        try{
            
            $datos=$this->conexion->prepare("SELECT * FROM `fruta_dpexportacion` limit 8;	");
            $datos->execute();
            $resultado = $datos->fetchAll();
            
            //	print_r($resultado);
            //	VAR_DUMP($resultado);
            
            
            return $resultado;
        }catch(Exception $e){
            die($e->getMessage());
        }
        
    }
    //LISTAR TODO
    public function listarDpexportacionCBX(){
        try{
            
            $datos=$this->conexion->prepare("SELECT * FROM `fruta_dpexportacion` ;	");
            $datos->execute();
            $resultado = $datos->fetchAll();
            
            //	print_r($resultado);
            //	VAR_DUMP($resultado);
            
            
            return $resultado;
        }catch(Exception $e){
            die($e->getMessage());
        }
        
    }



    //VER LA INFORMACION RELACIONADA EN BASE AL ID INGRESADO A LA FUNCION
    public function verDpexportacion($ID){
        try{
            
            $datos=$this->conexion->prepare("SELECT * FROM `fruta_dpexportacion` WHERE `ID_DPEXPORTACION`= '".$ID."';");
            $datos->execute();
            $resultado = $datos->fetchAll();
            
            //	print_r($resultado);
            //	VAR_DUMP($resultado);
            
            
            return $resultado;
        }catch(Exception $e){
            die($e->getMessage());
        }
        
    }

  
    
  
    //REGISTRO DE UNA NUEVA FILA    
    public function agregarDpexportacion(DPEXPORTACION $DPEXPORTACION){
        try{
            
            
            $query=
            "INSERT INTO `fruta_dpexportacion` (`FOLIO_DPEXPORTACION`,
                                          `NUMERO_LINEA`,`FOLIO_AUX_DPEXPORTACION`,
                                          `FECHA_EMBALADO_DPEXPORTACION`,
                                          `CANTIDAD_ENVASE_DPEXPORTACION`,`KILOS_NETO_DPEXPORTACION`,`KILOS_BRUTO_DPEXPORTACION`,`KILOS_DESHIDRATACION_DPEXPORTACION`,
                                          `PDESHIDRATACION_DPEXPORTACION`, `EMBOLSADO`,
                                          `ALIAS_FOLIO_DPEXPORTACION`,
                                          `ID_ESTANDAR`, `ID_CALIBRE`,`ID_FOLIO`, `ID_PVESPECIES`,`ID_PROCESO`,`ID_PRODUCTOR`, `ID_TMANEJO`, 
                                          `ESTADO_REGISTRO`,`ESTADO`)
             VALUES
	       	    ( ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, 1, 1);";
            $this->conexion->prepare($query)
            ->execute(
                array(
                    
                    $DPEXPORTACION->__GET('FOLIO_DPEXPORTACION'),
                    $DPEXPORTACION->__GET('NUMERO_LINEA'),
                    $DPEXPORTACION->__GET('FOLIO_AUX_DPEXPORTACION'),
                    $DPEXPORTACION->__GET('FECHA_EMBALADO_DPEXPORTACION'),
                    $DPEXPORTACION->__GET('CANTIDAD_ENVASE_DPEXPORTACION'),
                    $DPEXPORTACION->__GET('KILOS_NETO_DPEXPORTACION'),
                    $DPEXPORTACION->__GET('KILOS_BRUTO_DPEXPORTACION'),
                    $DPEXPORTACION->__GET('KILOS_DESHIDRATACION_DPEXPORTACION'),
                    $DPEXPORTACION->__GET('PDESHIDRATACION_DPEXPORTACION'),
                    $DPEXPORTACION->__GET('EMBOLSADO'),
                    $DPEXPORTACION->__GET('ALIAS_FOLIO_DPEXPORTACION'),
                    $DPEXPORTACION->__GET('ID_ESTANDAR'),
                    $DPEXPORTACION->__GET('ID_CALIBRE'),
                    $DPEXPORTACION->__GET('ID_FOLIO'),
                    $DPEXPORTACION->__GET('ID_PVESPECIES'),
                    $DPEXPORTACION->__GET('ID_PROCESO'),
                    $DPEXPORTACION->__GET('ID_PRODUCTOR'),
                    $DPEXPORTACION->__GET('ID_TMANEJO')
                    
                )
                
                );
            
        }catch(Exception $e){
            die($e->getMessage());
        }
    }
    
    //ELIMINAR FILA, NO SE UTILIZA
    public function eliminarDpexportacion($id){
        try{$sql="DELETE FROM `fruta_dpexportacion` WHERE `ID_DPEXPORTACION`=".$id.";";
        $statement=$this->conexion->prepare($sql);
        $statement->execute();
        }catch(Exception $e){
            die($e->getMessage());
            
        }
        
    }
    
    
  
    
    //ACTUALIZAR INFORMACION DE LA FILA
    public function actualizarDpexportacion(DPEXPORTACION $DPEXPORTACION){
        try{
            $query = "
		UPDATE `fruta_dpexportacion` SET
          `FOLIO_DPEXPORTACION` = ? ,
          `FECHA_EMBALADO_DPEXPORTACION` = ? ,
          `CANTIDAD_ENVASE_DPEXPORTACION` = ? ,
          `KILOS_NETO_DPEXPORTACION` = ? ,
          `KILOS_BRUTO_DPEXPORTACION` = ? ,
          `KILOS_DESHIDRATACION_DPEXPORTACION` = ? ,
          `PDESHIDRATACION_DPEXPORTACION` = ? ,
          `EMBOLSADO` = ? ,
          `ID_ESTANDAR` = ? ,
          `ID_CALIBRE` = ? ,
          `ID_FOLIO` = ? , 
          `ID_PVESPECIES` = ? ,
          `ID_PROCESO` = ? ,
          `ID_PRODUCTOR` = ?,
          `ID_TMANEJO` = ?            
		WHERE `ID_DPEXPORTACION`= ?;";
            $this->conexion->prepare($query)
            ->execute(
                array(
                    $DPEXPORTACION->__GET('FOLIO_DPEXPORTACION'),
                    $DPEXPORTACION->__GET('FECHA_EMBALADO_DPEXPORTACION'),
                    $DPEXPORTACION->__GET('CANTIDAD_ENVASE_DPEXPORTACION'),
                    $DPEXPORTACION->__GET('KILOS_NETO_DPEXPORTACION'),
                    $DPEXPORTACION->__GET('KILOS_BRUTO_DPEXPORTACION'),
                    $DPEXPORTACION->__GET('KILOS_DESHIDRATACION_DPEXPORTACION'),
                    $DPEXPORTACION->__GET('PDESHIDRATACION_DPEXPORTACION'),
                    $DPEXPORTACION->__GET('EMBOLSADO'),
                    $DPEXPORTACION->__GET('ID_ESTANDAR'),
                    $DPEXPORTACION->__GET('ID_CALIBRE'),
                    $DPEXPORTACION->__GET('ID_FOLIO'),
                    $DPEXPORTACION->__GET('ID_PVESPECIES'),
                    $DPEXPORTACION->__GET('ID_PROCESO'),
                    $DPEXPORTACION->__GET('ID_PRODUCTOR'),
                    $DPEXPORTACION->__GET('ID_TMANEJO'),
                    $DPEXPORTACION->__GET('ID_DPEXPORTACION')
                    
                )
                
                );
            
        }catch(Exception $e){
            die($e->getMessage());
        }
        
    }
    //FUNCIONE ESPECIALIZADAS
    //CAMBIO DE ESTADO DE REGISTRO DEL REGISTRO
    //CAMBIO A DESACTIVADO
    public function deshabilitar(DPEXPORTACION $DPEXPORTACION){

        try{
            $query = "
                UPDATE `fruta_dpexportacion` SET			
                        `ESTADO_REGISTRO` = 0
                WHERE `ID_DPEXPORTACION`= ?;";
            $this->conexion->prepare($query)
            ->execute(
                array(                 
                    $DPEXPORTACION->__GET('ID_DPEXPORTACION')                    
                )
                
                );
            
        }catch(Exception $e){
            die($e->getMessage());
        }
        
    }
    //CAMBIO A ACTIVADO
    public function habilitar(DPEXPORTACION $DPEXPORTACION){
        try{
            $query = "
                UPDATE `fruta_dpexportacion` SET			
                        `ESTADO_REGISTRO` = 1
                WHERE `ID_DPEXPORTACION`= ?;";
            $this->conexion->prepare($query)
            ->execute(
                array(                 
                    $DPEXPORTACION->__GET('ID_DPEXPORTACION')                    
                )
                
                );
            
        }catch(Exception $e){
            die($e->getMessage());
        }
        
    }

    public function deshabilitar2(DPEXPORTACION $DPEXPORTACION){

        try{
            $query = "
                UPDATE `fruta_dpexportacion` SET			
                        `ESTADO_REGISTRO` = 0
                WHERE `FOLIO_DPEXPORTACION`= ?;";
            $this->conexion->prepare($query)
            ->execute(
                array(                 
                    $DPEXPORTACION->__GET('FOLIO_DPEXPORTACION')                    
                )
                
                );
            
        }catch(Exception $e){
            die($e->getMessage());
        }
        
    }
    //CAMBIO A ACTIVADO
    public function habilitar2(DPEXPORTACION $DPEXPORTACION){
        try{
            $query = "
                UPDATE `fruta_dpexportacion` SET			
                        `ESTADO_REGISTRO` = 1
                WHERE `FOLIO_DPEXPORTACION`= ?;";
            $this->conexion->prepare($query)
            ->execute(
                array(                 
                    $DPEXPORTACION->__GET('FOLIO_DPEXPORTACION')                    
                )
                
                );
            
        }catch(Exception $e){
            die($e->getMessage());
        }
        
    }

      //CAMBIO ESTADO
        //ABIERTO 1
        public function abierto(DPEXPORTACION $DPEXPORTACION){
            try{
                $query = "
                    UPDATE `fruta_dpexportacion` SET			
                            `ESTADO` = 1
                    WHERE `ID_DPEXPORTACION`= ?;";
                $this->conexion->prepare($query)
                ->execute(
                        array(                 
                            $DPEXPORTACION->__GET('DPEXPORTACION')                   
                        )                    
                    );                
            }catch(Exception $e){
                die($e->getMessage());
            }
            
        }
        //CERRADO 0
        public function  cerrado(DPEXPORTACION $DPEXPORTACION){
            try{
                $query = "
                    UPDATE `fruta_dpexportacion` SET			
                            `ESTADO` = 0
                    WHERE `ID_DPEXPORTACION`= ?;";
                $this->conexion->prepare($query)
                ->execute(
                        array(                 
                            $DPEXPORTACION->__GET('ID_DPEXPORTACION')                   
                        )                    
                    );                
            }catch(Exception $e){
                die($e->getMessage());
            }
            
        }



    //OBTENER EL NUMERO LINEA DE ACUERDO A LOS REGISTROA ASOCIADOS A UNA RECEPCION
    public function obtenerNumeroLinea($IDPROCESO){
        try{
            
            $datos=$this->conexion->prepare("SELECT IFNULL(COUNT(NUMERO_LINEA),0) AS 'NUMEROLINEAN' FROM `fruta_dpexportacion` WHERE  `ID_PROCESO`= '".$IDPROCESO."';");
            $datos->execute();
            $resultado = $datos->fetchAll();
            
            //	print_r($resultado);
            //	VAR_DUMP($resultado);
            
            
            return $resultado;
        }catch(Exception $e){
            die($e->getMessage());
        }
        
    }
    
  //OBTENER EL ULTIMO FOLIO OCUPADO DEL DETALLE DE  PROCESO
  public function obtenerFolio($IDFOLIO){
    try{
        
        $datos=$this->conexion->prepare("SELECT IFNULL(COUNT(FOLIO_DPEXPORTACION),0) AS 'ULTIMOFOLIO',IFNULL(MAX(FOLIO_DPEXPORTACION),0) AS 'ULTIMOFOLIO2' FROM `fruta_dpexportacion`  WHERE  `ID_FOLIO`= '".$IDFOLIO."';");
        $datos->execute();
        $resultado = $datos->fetchAll();
        
        //	print_r($resultado);
        //	VAR_DUMP($resultado);
        
        
        return $resultado;
    }catch(Exception $e){
        die($e->getMessage());
    }
    
}
///BUSQUEDA POR ID PROCESO ASOCIADO AL REGISTRO
    public function buscarPorProceso($IDPROCESO){
        try{
            
            $datos=$this->conexion->prepare("SELECT * 
                                            FROM `fruta_dpexportacion` 
                                            WHERE `ID_PROCESO`= '".$IDPROCESO."' AND  `ESTADO_REGISTRO` = 1;");
            $datos->execute();
            $resultado = $datos->fetchAll();
            
            //	print_r($resultado);
            //	VAR_DUMP($resultado);
            
            
            return $resultado;
        }catch(Exception $e){
            die($e->getMessage());
        }
        
    }
    public function buscarPorProceso2($IDPROCESO){
        try{
            
            $datos=$this->conexion->prepare("SELECT * ,DATE_FORMAT(FECHA_EMBALADO_DPEXPORTACION, '%d-%m-%Y') AS 'FECHA_EMBALADO',
                                                    FORMAT(CANTIDAD_ENVASE_DPEXPORTACION,0,'de_DE') AS 'ENVASE',
                                                    FORMAT(KILOS_NETO_DPEXPORTACION,2,'de_DE') AS 'NETO',
                                                    FORMAT(KILOS_BRUTO_DPEXPORTACION,2,'de_DE') AS 'BRUTO',
                                                    FORMAT(KILOS_DESHIDRATACION_DPEXPORTACION,2,'de_DE') AS 'DESHIDRATACION'
                                            FROM `fruta_dpexportacion` 
                                            WHERE `ID_PROCESO`= '".$IDPROCESO."' AND  `ESTADO_REGISTRO` = 1;");
            $datos->execute();
            $resultado = $datos->fetchAll();
            
            //	print_r($resultado);
            //	VAR_DUMP($resultado);
            
            
            return $resultado;
        }catch(Exception $e){
            die($e->getMessage());
        }
        
    }
//BUSQUEDA DE LOS TOTALES ASOCIADOS AL ID PROCESO
public function obtenerTotales($IDPROCESO){
    try{
        
        $datos=$this->conexion->prepare("SELECT IFNULL(SUM(CANTIDAD_ENVASE_DPEXPORTACION),0) AS 'TOTAL_ENVASE', 
                                                IFNULL(SUM(KILOS_NETO_DPEXPORTACION),0) AS 'TOTAL_NETO' , 
                                                IFNULL(SUM(KILOS_BRUTO_DPEXPORTACION),0) AS 'TOTAL_BRUTO' , 
                                                IFNULL(SUM(KILOS_DESHIDRATACION_DPEXPORTACION),0) AS 'TOTAL_DESHIDRATACION' 
                                         FROM `fruta_dpexportacion` 
                                         WHERE ID_PROCESO = '".$IDPROCESO."' AND  `ESTADO_REGISTRO` = 1;");
        $datos->execute();
        $resultado = $datos->fetchAll();
        
        //	print_r($resultado);
        //	VAR_DUMP($resultado);
        
        
        return $resultado;
    }catch(Exception $e){
        die($e->getMessage());
    }
    
}
public function obtenerTotales2($IDPROCESO){
    try{
        
        $datos=$this->conexion->prepare("SELECT FORMAT(IFNULL(SUM(CANTIDAD_ENVASE_DPEXPORTACION),0),0,'de_DE') AS 'TOTAL_ENVASE', 
                                                FORMAT(IFNULL(SUM(KILOS_NETO_DPEXPORTACION),0),2,'de_DE') AS 'TOTAL_NETO' , 
                                                FORMAT(IFNULL(SUM(KILOS_BRUTO_DPEXPORTACION),0),2,'de_DE') AS 'TOTAL_BRUTO' , 
                                                FORMAT(IFNULL(SUM(KILOS_DESHIDRATACION_DPEXPORTACION),0),2,'de_DE') AS 'TOTAL_DESHIDRATACION' 
                                         FROM `fruta_dpexportacion` 
                                         WHERE ID_PROCESO = '".$IDPROCESO."' AND  `ESTADO_REGISTRO` = 1;");
        $datos->execute();
        $resultado = $datos->fetchAll();
        
        //	print_r($resultado);
        //	VAR_DUMP($resultado);
        
        
        return $resultado;
    }catch(Exception $e){
        die($e->getMessage());
    }
    
}
//BUSCAR FECHA ACTUAL DEL SISTEMA
public function obtenerFecha(){
    try{
        
        $datos=$this->conexion->prepare("SELECT CURDATE() AS 'FECHA';");
        $datos->execute();
        $resultado = $datos->fetchAll();
        
        //	print_r($resultado);
        //	VAR_DUMP($resultado);
        
        
        return $resultado;
    }catch(Exception $e){
        die($e->getMessage());
    }
}



public function buscarPorFolio($FOLIODPEXPORTACION){
    try{
        
        $datos=$this->conexion->prepare("SELECT * FROM `fruta_dpexportacion` 
                                        WHERE `FOLIO_DPEXPORTACION`= '".$FOLIODPEXPORTACION."';");
        $datos->execute();
        $resultado = $datos->fetchAll();
        
        //	print_r($resultado);
        //	VAR_DUMP($resultado);
        
        
        return $resultado;
    }catch(Exception $e){
        die($e->getMessage());
    }
    
}



public function obtenerTotales2AgrupadoFolio2($FOLIONUEVODREPALETIZAJE){
    try{
        
        $datos=$this->conexion->prepare("SELECT
                                            FORMAT(IFNULL(SUM(`CANTIDAD_ENVASE_DPEXPORTACION`),0),0,'de_DE') AS 'TOTAL_ENVASE', 
                                            FORMAT(IFNULL(SUM(`KILOS_NETO_DPEXPORTACION`),0),2,'de_DE') AS 'TOTAL_NETO'
                                         FROM `fruta_dpexportacion`
                                         WHERE `FOLIO_DPEXPORTACION`= '".$FOLIONUEVODREPALETIZAJE."'
                                         AND `ESTADO_REGISTRO` = 1
                                         GROUP BY FOLIO_DPEXPORTACION;");
        $datos->execute();
        $resultado = $datos->fetchAll();
        
        //	print_r($resultado);
        //	VAR_DUMP($resultado);
        
        
        return $resultado;
    }catch(Exception $e){
        die($e->getMessage());
    }       

}
    
}




?>