<?php

//LLAMADA DE LOS ARCHIVOS NECESAROP PARA LA OPERACION DEL CONTROLADOR
//LLAMADA AL MODELO DE CLASE
include_once '../modelo/DPINDUSTRIAL.php';
//LLAMADA AL CONFIGURACION DE LA BASE DE DATOS
include_once '../config/BDCONFIG.php';

//INICIALIZAR VARIABLES
$HOST="";
$DBNAME="";
$USER="";
$PASS="";

//ESTRUCTURA DEL CONTROLADOR
class DPINDUSTRIAL_ADO {
   
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
    public function listarDpindustrial(){
        try{
            
            $datos=$this->conexion->prepare("SELECT * FROM `fruta_dpindustrial` limit 8;	");
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
    public function listarDpindustrialCBX(){
        try{
            
            $datos=$this->conexion->prepare("SELECT * FROM `fruta_dpindustrial` ;	");
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
    public function verDpindustrial($ID){
        try{
            
            $datos=$this->conexion->prepare("SELECT * FROM `fruta_dpindustrial` WHERE `ID_DPINDUSTRIAL`= '".$ID."';");
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
    public function agregarDpindustrial(DPINDUSTRIAL $DPINDUSTRIAL){
        try{
            
            
            $query=
            "INSERT INTO `fruta_dpindustrial` (`FOLIO_DPINDUSTRIAL`,
                                        `NUMERO_LINEA`,`FOLIO_AUX_DPINDUSTRIAL`,
                                        `FECHA_EMBALADO_DPINDUSTRIAL`,  `KILOS_NETO_DPINDUSTRIAL`,
                                        `ALIAS_FOLIO_DPINDUSTRIAL`,
                                        `ID_FOLIO`,`ID_PVESPECIES`,`ID_ESTANDAR`,`ID_PROCESO`,`ID_PRODUCTOR`,
                                         `ESTADO_REGISTRO`,`ESTADO`) VALUES
	       	( ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, 1, 1);";
            $this->conexion->prepare($query)
            ->execute(
                array(
                    
                    $DPINDUSTRIAL->__GET('FOLIO_DPINDUSTRIAL'),
                    $DPINDUSTRIAL->__GET('NUMERO_LINEA'),
                    $DPINDUSTRIAL->__GET('FOLIO_AUX_DPINDUSTRIAL'),                    
                    $DPINDUSTRIAL->__GET('FECHA_EMBALADO_DPINDUSTRIAL'),
                    $DPINDUSTRIAL->__GET('KILOS_NETO_DPINDUSTRIAL'),
                    $DPINDUSTRIAL->__GET('ALIAS_FOLIO_DPINDUSTRIAL'),
                    $DPINDUSTRIAL->__GET('ID_FOLIO'),
                    $DPINDUSTRIAL->__GET('ID_PVESPECIES'),
                    $DPINDUSTRIAL->__GET('ID_ESTANDAR'),
                    $DPINDUSTRIAL->__GET('ID_PROCESO'),
                    $DPINDUSTRIAL->__GET('ID_PRODUCTOR')
                    
                )
                
                );
            
        }catch(Exception $e){
            die($e->getMessage());
        }
    }
    
    //ELIMINAR FILA, NO SE UTILIZA
    public function eliminarDpindustrial($id){
        try{$sql="DELETE FROM `fruta_dpindustrial` WHERE `ID_DPINDUSTRIAL`=".$id.";";
        $statement=$this->conexion->prepare($sql);
        $statement->execute();
        }catch(Exception $e){
            die($e->getMessage());
            
        }
        
    }
    
    
  
    
    //ACTUALIZAR INFORMACION DE LA FILA
    public function actualizarDpindustrial(DPINDUSTRIAL $DPINDUSTRIAL){
        try{
            $query = "
		UPDATE `fruta_dpindustrial` SET
          `FOLIO_DPINDUSTRIAL` = ? ,
          `FECHA_EMBALADO_DPINDUSTRIAL` = ? ,
          `KILOS_NETO_DPINDUSTRIAL` = ? ,
          `ID_FOLIO` = ? ,
          `ID_PVESPECIES` = ? ,
          `ID_ESTANDAR` = ? ,
          `ID_PROCESO` = ?,
          `ID_PRODUCTOR` = ?
            
		WHERE `ID_DPINDUSTRIAL`= ?;";
            $this->conexion->prepare($query)
            ->execute(
                array(
                    $DPINDUSTRIAL->__GET('FOLIO_DPINDUSTRIAL'),
                    $DPINDUSTRIAL->__GET('FECHA_EMBALADO_DPINDUSTRIAL'),
                    $DPINDUSTRIAL->__GET('KILOS_NETO_DPINDUSTRIAL'),
                    $DPINDUSTRIAL->__GET('ID_FOLIO'),
                    $DPINDUSTRIAL->__GET('ID_PVESPECIES'),
                    $DPINDUSTRIAL->__GET('ID_ESTANDAR'),
                    $DPINDUSTRIAL->__GET('ID_PROCESO'),    
                    $DPINDUSTRIAL->__GET('ID_PRODUCTOR'),     
                    $DPINDUSTRIAL->__GET('ID_DPINDUSTRIAL')
                    
                )
                
                );
            
        }catch(Exception $e){
            die($e->getMessage());
        }
        
    }
    
  //FUNCIONE ESPECIALIZADAS
    //CAMBIO DE ESTADO DE REGISTRO DEL REGISTRO
    //CAMBIO A DESACTIVADO
    public function deshabilitar(DPINDUSTRIAL $DPINDUSTRIAL){

        try{
            $query = "
                UPDATE `fruta_dpindustrial` SET			
                        `ESTADO_REGISTRO` = 0
                WHERE `ID_DPINDUSTRIAL`= ?;";
            $this->conexion->prepare($query)
            ->execute(
                array(                 
                    $DPINDUSTRIAL->__GET('ID_DPINDUSTRIAL')                    
                )
                
                );
            
        }catch(Exception $e){
            die($e->getMessage());
        }
        
    }
    //CAMBIO A ACTIVADO
    public function habilitar(DPINDUSTRIAL $DPINDUSTRIAL){
        try{
            $query = "
            UPDATE `fruta_dpindustrial` SET			
                    `ESTADO_REGISTRO` = 1
            WHERE `ID_DPINDUSTRIAL`= ?;";
            $this->conexion->prepare($query)
            ->execute(
                array(                 
                    $DPINDUSTRIAL->__GET('ID_DPINDUSTRIAL')                    
                )
                
                );
            
        }catch(Exception $e){
            die($e->getMessage());
        }
        
    }
    public function deshabilitar2(DPINDUSTRIAL $DPINDUSTRIAL){

        try{
            $query = "
                UPDATE `fruta_dpindustrial` SET			
                        `ESTADO_REGISTRO` = 0
                WHERE `FOLIO_DPINDUSTRIAL`= ?;";
            $this->conexion->prepare($query)
            ->execute(
                array(                 
                    $DPINDUSTRIAL->__GET('FOLIO_DPINDUSTRIAL')                    
                )
                
                );
            
        }catch(Exception $e){
            die($e->getMessage());
        }
        
    }
    //CAMBIO A ACTIVADO
    public function habilitar2(DPINDUSTRIAL $DPINDUSTRIAL){
        try{
            $query = "
            UPDATE `fruta_dpindustrial` SET			
                    `ESTADO_REGISTRO` = 1
            WHERE `FOLIO_DPINDUSTRIAL`= ?;";
            $this->conexion->prepare($query)
            ->execute(
                array(                 
                    $DPINDUSTRIAL->__GET('FOLIO_DPINDUSTRIAL')                    
                )
                
                );
            
        }catch(Exception $e){
            die($e->getMessage());
        }
        
    }



       //CAMBIO ESTADO
        //ABIERTO 1
        public function abierto(DPINDUSTRIAL $DPINDUSTRIAL){
            try{
                $query = "
                    UPDATE `fruta_dpindustrial` SET			
                            `ESTADO` = 1
                    WHERE `ID_DPINDUSTRIAL`= ?;";
                $this->conexion->prepare($query)
                ->execute(
                        array(                 
                            $DPINDUSTRIAL->__GET('ID_DPINDUSTRIAL')                   
                        )                    
                    );                
            }catch(Exception $e){
                die($e->getMessage());
            }
            
        }
        //CERRADO 0
        public function  cerrado(DPINDUSTRIAL $DPINDUSTRIAL){
            try{
                $query = "
                    UPDATE `fruta_dpindustrial` SET			
                            `ESTADO` = 0
                    WHERE `ID_DPINDUSTRIAL`= ?;";
                $this->conexion->prepare($query)
                ->execute(
                        array(                 
                            $DPINDUSTRIAL->__GET('ID_DPINDUSTRIAL')                   
                        )                    
                    );                
            }catch(Exception $e){
                die($e->getMessage());
            }
            
        }

    //OBTENER EL NUMERO LINEA DE ACUERDO A LOS REGISTROA ASOCIADOS A UNA RECEPCION
    public function obtenerNumeroLinea($IDPROCESO){
        try{
            
            $datos=$this->conexion->prepare("SELECT IFNULL(COUNT(NUMERO_LINEA),0) AS 'NUMEROLINEAN' FROM `fruta_dpindustrial` WHERE  `ID_PROCESO`= '".$IDPROCESO."';");
            $datos->execute();
            $resultado = $datos->fetchAll();
            
            //	print_r($resultado);
            //	VAR_DUMP($resultado);
            
            
            return $resultado;
        }catch(Exception $e){
            die($e->getMessage());
        }
        
    }
    


  //OBTENER EL ULTIMO FOLIO OCUPADO DEL DETALLE DE  RECEPCIONS
  public function obtenerFolio($IDFOLIO){
    try{
        
        $datos=$this->conexion->prepare("SELECT IFNULL(COUNT(FOLIO_DPINDUSTRIAL),0) AS 'ULTIMOFOLIO',IFNULL(MAX(FOLIO_DPINDUSTRIAL),0) AS 'ULTIMOFOLIO2' FROM `fruta_dpindustrial`  WHERE  `ID_FOLIO`= '".$IDFOLIO."';");
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
        
        $datos=$this->conexion->prepare("SELECT * FROM `fruta_dpindustrial` WHERE `ID_PROCESO`= '".$IDPROCESO."' AND  `ESTADO_REGISTRO` = 1;");
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
        
        $datos=$this->conexion->prepare("SELECT *  ,DATE_FORMAT(FECHA_EMBALADO_DPINDUSTRIAL, '%d-%m-%Y') AS 'FECHA_EMBALADO',
                                                    FORMAT(KILOS_NETO_DPINDUSTRIAL,2,'de_DE') AS 'NETO'
                                        FROM `fruta_dpindustrial` 
                                        WHERE `ID_PROCESO`= '".$IDPROCESO."' 
                                        AND  `ESTADO_REGISTRO` = 1;");
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
        
        $datos=$this->conexion->prepare("SELECT  IFNULL(SUM(KILOS_NETO_DPINDUSTRIAL),0) AS 'TOTAL_NETO' 
                                          FROM `fruta_dpindustrial`
                                          WHERE ID_PROCESO = '".$IDPROCESO."' 
                                          AND  `ESTADO_REGISTRO` = 1;");
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
        
        $datos=$this->conexion->prepare("SELECT  
                                            FORMAT(IFNULL(SUM(KILOS_NETO_DPINDUSTRIAL),0),2,'de_DE') AS 'TOTAL_NETO' 
                                          FROM `fruta_dpindustrial`
                                          WHERE ID_PROCESO = '".$IDPROCESO."' 
                                          AND  `ESTADO_REGISTRO` = 1;");
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
    
}
?>