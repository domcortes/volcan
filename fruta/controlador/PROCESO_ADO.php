<?php

//LLAMADA DE LOS ARCHIVOS NECESAROP PARA LA OPERACION DEL CONTROLADOR
//LLAMADA AL MODELO DE CLASE
include_once '../modelo/PROCESO.php';
//LLAMADA AL CONFIGURACION DE LA BASE DE DATOS
include_once '../config/BDCONFIG.php';

//INICIALIZAR VARIABLES
$HOST="";
$DBNAME="";
$USER="";
$PASS="";

//ESTRUCTURA DEL CONTROLADOR
class PROCESO_ADO {
    
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
 //LISTAR TODO CON LIMITE DE 8 FILAS
    public function listarProceso(){
        try{
            
            $datos=$this->conexion->prepare("SELECT * FROM `fruta_proceso` LIMIT 6;	");
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
    public function listarProcesoCBX(){
        try{
            
            $datos=$this->conexion->prepare("SELECT * FROM `fruta_proceso` ;	");
            $datos->execute();
            $resultado = $datos->fetchAll();
            
            //	print_r($resultado);
            //	VAR_DUMP($resultado);
            
            
            return $resultado;
        }catch(Exception $e){
            die($e->getMessage());
        }
        
    }

    public function listarProcesoEmpresaPlantaTemporadaCBX($EMPRESA,$PLANTA,$TEMPORADA){
        try{
            
            $datos=$this->conexion->prepare("SELECT * FROM `fruta_proceso`                                                        
                                            WHERE ID_EMPRESA = '".$EMPRESA."' 
                                            AND ID_PLANTA = '".$PLANTA."'
                                            AND ID_TEMPORADA = '".$TEMPORADA."' ;	");
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
    public function verProceso($ID){
        try{
            
            $datos=$this->conexion->prepare("SELECT * FROM `fruta_proceso` WHERE `ID_PROCESO`= '".$ID."';");
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
    public function agregarProceso(PROCESO $PROCESO){
        try{
  
            
            $query=
            "INSERT INTO `fruta_proceso` ( `NUMERO_PROCESO`,`FECHA_PROCESO`, `TURNO`,
                                     `OBSERVACIONE_PROCESO`, `KILOS_NETO_PROCESO`, `KILOS_EXPORTACION_PROCESO`, `KILOS_INDUSTRIAL_PROCESO`,
                                     `PDEXPORTACION_PROCESO`, `PDINDUSTRIAL_PROCESO`, `PORCENTAJE_PROCESO`,
                                     `ID_EMPRESA`,`ID_PLANTA`,`ID_TEMPORADA`, `ID_PVESPECIES`, `ID_PRODUCTOR`, `ID_TPROCESO`,
                                     `FECHA_INGRESO_PROCESO`, `FECHA_MODIFICACION_PROCESO`,  `ESTADO`,  `ESTADO_REGISTRO`) VALUES
	       	(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, SYSDATE(),  SYSDATE(), 1, 1 );";
            $this->conexion->prepare($query)
            ->execute(
                array(
                    
                    $PROCESO->__GET('NUMERO_PROCESO'),
                    $PROCESO->__GET('FECHA_PROCESO'),
                    $PROCESO->__GET('TURNO'),
                    $PROCESO->__GET('OBSERVACIONE_PROCESO'),
                    $PROCESO->__GET('KILOS_NETO_PROCESO'),
                    $PROCESO->__GET('KILOS_EXPORTACION_PROCESO'),
                    $PROCESO->__GET('KILOS_INDUSTRIAL_PROCESO'),                    
                    $PROCESO->__GET('PDEXPORTACION_PROCESO'),
                    $PROCESO->__GET('PDINDUSTRIAL_PROCESO'),
                    $PROCESO->__GET('PORCENTAJE_PROCESO'),
                    $PROCESO->__GET('ID_EMPRESA'),
                    $PROCESO->__GET('ID_PLANTA'),
                    $PROCESO->__GET('ID_TEMPORADA'),
                    $PROCESO->__GET('ID_PVESPECIES'),
                    $PROCESO->__GET('ID_PRODUCTOR'),
                    $PROCESO->__GET('ID_TPROCESO')
                    
                    
                    
                )
                
                );
            
        }catch(Exception $e){
            die($e->getMessage());
        }
    }
    
    //ACTUALIZAR INFORMACION DE LA FILA
    public function actualizarProceso(PROCESO $PROCESO){

        try{
            $query = "
		UPDATE `fruta_proceso` SET
            `FECHA_PROCESO`=?,
            `FECHA_MODIFICACION_PROCESO` = SYSDATE(), 
            `TURNO` =?,
            `OBSERVACIONE_PROCESO` =?,
            `KILOS_NETO_PROCESO` =?,
            `KILOS_EXPORTACION_PROCESO` =?,
            `KILOS_INDUSTRIAL_PROCESO` =?, 
            `PDEXPORTACION_PROCESO` =?, 
            `PDINDUSTRIAL_PROCESO` =?, 
            `PORCENTAJE_PROCESO` =?, 
            `ID_EMPRESA` =?, 
            `ID_PLANTA` =?, 
            `ID_TEMPORADA` =?, 
            `ID_PVESPECIES` =?,
            `ID_PRODUCTOR` =?,
            `ID_TPROCESO` =?,
            `ESTADO` = 1 
		WHERE `ID_PROCESO`= ?;";
            $this->conexion->prepare($query)
            ->execute(
                array(
                    
                    $PROCESO->__GET('FECHA_PROCESO'),
                    $PROCESO->__GET('TURNO'),
                    $PROCESO->__GET('OBSERVACIONE_PROCESO'),
                    $PROCESO->__GET('KILOS_NETO_PROCESO'),
                    $PROCESO->__GET('KILOS_EXPORTACION_PROCESO'),
                    $PROCESO->__GET('KILOS_INDUSTRIAL_PROCESO'),
                    $PROCESO->__GET('PDEXPORTACION_PROCESO'),
                    $PROCESO->__GET('PDINDUSTRIAL_PROCESO'),
                    $PROCESO->__GET('PORCENTAJE_PROCESO'),
                    $PROCESO->__GET('ID_EMPRESA'),
                    $PROCESO->__GET('ID_PLANTA'),
                    $PROCESO->__GET('ID_TEMPORADA'),
                    $PROCESO->__GET('ID_PVESPECIES'),
                    $PROCESO->__GET('ID_PRODUCTOR'),
                    $PROCESO->__GET('ID_TPROCESO'),
                    $PROCESO->__GET('ID_PROCESO')
                    
                )
                
                );
            
        }catch(Exception $e){
            die($e->getMessage());
        }
        
    }


    //ELIMINAR FILA, NO SE UTILIZA
    public function eliminarProceso($id){
        try{$sql="DELETE FROM `fruta_proceso` WHERE `ID_PROCESO`=".$id.";";
        $statement=$this->conexion->prepare($sql);
        $statement->execute();
        }catch(Exception $e){
            die($e->getMessage());
            
        }
        
    }
    //FUNCIONES ESPECIALIZADAS
    //CAMBIO DE ESTADO DE REGISTRO DEL REGISTRO
    //CAMBIO A DESACTIVADO
    public function deshabilitar(PROCESO $PROCESO){

        try{
            $query = "
                UPDATE `fruta_proceso` SET			
                        `ESTADO_REGISTRO` = 0
                WHERE `ID_PROCESO`= ?;";
            $this->conexion->prepare($query)
            ->execute(
                array(                 
                    $PROCESO->__GET('ID_PROCESO')                    
                )
                
                );
            
        }catch(Exception $e){
            die($e->getMessage());
        }
        
    }
    //CAMBIO A ACTIVADO
    public function habilitar(PROCESO $PROCESO){
        try{
            $query = "
                UPDATE `fruta_proceso` SET			
                        `ESTADO_REGISTRO` = 1
                WHERE `ID_PROCESO`= ?;";
            $this->conexion->prepare($query)
            ->execute(
                array(                 
                    $PROCESO->__GET('ID_PROCESO')                    
                )
                
                );
            
        }catch(Exception $e){
            die($e->getMessage());
        }
        
    }

        //CAMBIO ESTADO
        //ABIERTO 1
        public function abierto(PROCESO $PROCESO){
            try{
                $query = "
                    UPDATE `fruta_proceso` SET			
                            `ESTADO` = 1
                    WHERE `ID_PROCESO`= ?;";
                $this->conexion->prepare($query)
                ->execute(
                        array(                 
                            $PROCESO->__GET('ID_PROCESO')                   
                        )                    
                    );                
            }catch(Exception $e){
                die($e->getMessage());
            }
            
        }
        //CERRADO 0
        public function  cerrado(PROCESO $PROCESO){
            try{
                $query = "
                    UPDATE `fruta_proceso` SET			
                            `ESTADO` = 0
                    WHERE `ID_PROCESO`= ?;";
                $this->conexion->prepare($query)
                ->execute(
                        array(                 
                            $PROCESO->__GET('ID_PROCESO')                   
                        )                    
                    );                
            }catch(Exception $e){
                die($e->getMessage());
            }
            
        }


    //CONSULTA PARA OBTENER LA FILA EN EL MISMO MOMENTO DE REGISTRAR LA FILA
    public function buscarProcesoID($FECHAPROCESO,$TURNO,$OBSERVACIONPROCESO,$TOTALNETOPROCESO,$TOTALEXPORTACIONPROCESO  ,$TOTALINDUSTRIAPROCESO,
                                    $EMPRESA,$PLANTA,$TEMPORADA,$PVESPECIES, $PRODUCTOR ,$TPROCESO){
        try{
 

            $datos=$this->conexion->prepare(" SELECT *
                                            FROM `fruta_proceso`
                                            WHERE 
                                            FECHA_PROCESO LIKE '".$FECHAPROCESO."'
                                                 AND TURNO = ".$TURNO."
                                                 AND OBSERVACIONE_PROCESO LIKE '".$OBSERVACIONPROCESO."' 
                                                 AND KILOS_NETO_PROCESO  = ".$TOTALNETOPROCESO."  AND KILOS_EXPORTACION_PROCESO  = ".$TOTALEXPORTACIONPROCESO." AND KILOS_INDUSTRIAL_PROCESO  = ".$TOTALINDUSTRIAPROCESO." 
                                                 AND DATE_FORMAT(FECHA_INGRESO_PROCESO, '%Y-%m-%d %H:%i') =  DATE_FORMAT(NOW(),'%Y-%m-%d %H:%i') 
                                                 AND DATE_FORMAT(FECHA_MODIFICACION_PROCESO, '%Y-%m-%d %H:%i') = DATE_FORMAT(NOW(),'%Y-%m-%d %H:%i')
                                                 AND ID_PVESPECIES = ".$PVESPECIES." 
                                                 AND ID_EMPRESA = ".$EMPRESA." 
                                                 AND ID_PLANTA = ".$PLANTA." 
                                                 AND ID_TEMPORADA = ".$TEMPORADA." 
                                                 AND ID_PRODUCTOR = '".$PRODUCTOR."' 
                                                 AND ID_TPROCESO = ".$TPROCESO."
                                                 ORDER BY ID_PROCESO DESC
                                                 ; ");
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
       public function verProceso2($IDPROCESO){
        try{
     
            $datos=$this->conexion->prepare("SELECT *, 
                                                DATE_FORMAT(FECHA_INGRESO_PROCESO, '%Y-%m-%d') AS 'FECHA_INGRESOP',
                                                DATE_FORMAT(FECHA_MODIFICACION_PROCESO, '%Y-%m-%d') AS 'FECHA_MODIFICACIONP' 
                                                FROM `fruta_proceso` WHERE `ID_PROCESO` = '".$IDPROCESO."';");
            $datos->execute();
            $resultado = $datos->fetchAll();
            
            //	print_r($resultado);
            //	VAR_DUMP($resultado);
            
            
            return $resultado;
        }catch(Exception $e){
            die($e->getMessage());
        }
        
    }
    public function verProceso3($IDPROCESO){
        try{
     
            $datos=$this->conexion->prepare("SELECT *,  
                                                DATE_FORMAT(FECHA_PROCESO, '%d-%m-%Y') AS 'FECHA', 
                                                DATE_FORMAT(FECHA_INGRESO_PROCESO, '%d-%m-%Y') AS 'FECHA_INGRESOP', 
                                                DATE_FORMAT(FECHA_MODIFICACION_PROCESO, '%d-%m-%Y') AS 'FECHA_MODIFICACIONP'
                                             FROM `fruta_proceso` WHERE `ID_PROCESO` = '".$IDPROCESO."';");
            $datos->execute();
            $resultado = $datos->fetchAll();
            
            //	print_r($resultado);
            //	VAR_DUMP($resultado);
            
            
            return $resultado;
        }catch(Exception $e){
            die($e->getMessage());
        }
        
    }
    public function obtenerTotales($IDPROCESO){
        try{
     
            $datos=$this->conexion->prepare("SELECT
                                                 FORMAT(IFNULL(SUM(KILOS_EXPORTACION_PROCESO)+SUM(KILOS_INDUSTRIAL_PROCESO),0),2,'de_DE') AS 'TOTAL_SALIDA'                                                 
                                             FROM `fruta_proceso` 
                                             WHERE `ID_PROCESO` = '".$IDPROCESO."';");
            $datos->execute();
            $resultado = $datos->fetchAll();
            
            //	print_r($resultado);
            //	VAR_DUMP($resultado);
            
            
            return $resultado;
        }catch(Exception $e){
            die($e->getMessage());
        }
        
    }
    public function obtenerTotalesLista(){
        try{
     
            $datos=$this->conexion->prepare("SELECT
                                                 FORMAT(IFNULL(SUM(KILOS_EXPORTACION_PROCESO),0),2,'de_DE') AS 'EXPORTACION'   ,                                                 
                                                 FORMAT(IFNULL(SUM(KILOS_INDUSTRIAL_PROCESO),0),2,'de_DE') AS 'INDUSTRIAL'    ,                                                 
                                                 FORMAT(IFNULL(SUM(KILOS_NETO_PROCESO),0),2,'de_DE') AS 'NETO'                                                 
                                             FROM `fruta_proceso` 
                                             ;");
            $datos->execute();
            $resultado = $datos->fetchAll();
            
            //	print_r($resultado);
            //	VAR_DUMP($resultado);
            
            
            return $resultado;
        }catch(Exception $e){
            die($e->getMessage());
        }
        
    }
    public function obtenerTotalesEmpresaPlantaTemporadaLista($EMPRESA,$PLANTA,$TEMPORADA){
        try{
     
            $datos=$this->conexion->prepare("SELECT
                                                 FORMAT(IFNULL(SUM(KILOS_EXPORTACION_PROCESO),0),2,'de_DE') AS 'EXPORTACION'   ,                                                 
                                                 FORMAT(IFNULL(SUM(KILOS_INDUSTRIAL_PROCESO),0),2,'de_DE') AS 'INDUSTRIAL'    ,                                                 
                                                 FORMAT(IFNULL(SUM(KILOS_NETO_PROCESO),0),2,'de_DE') AS 'NETO'                                                 
                                             FROM `fruta_proceso`                                                                                         
                                            WHERE ID_EMPRESA = '".$EMPRESA."' 
                                            AND ID_PLANTA = '".$PLANTA."'
                                            AND ID_TEMPORADA = '".$TEMPORADA."' 
                                            
                                             ;");
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

    public function obtenerNumero($EMPRESA,$PLANTA,$TEMPORADA){
        try{
            $datos=$this->conexion->prepare(" SELECT  COUNT(IFNULL(NUMERO_PROCESO,0)) AS 'NUMERO'
                                                FROM `fruta_proceso`
                                                WHERE  
                                                    ID_EMPRESA = '".$EMPRESA."' 
                                                AND ID_PLANTA = '".$PLANTA."'
                                                AND ID_TEMPORADA = '".$TEMPORADA."'     
                                                    ; ");
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