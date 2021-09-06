<?php

//LLAMADA DE LOS ARCHIVOS NECESAROP PARA LA OPERACION DEL CONTROLADOR
//LLAMADA AL MODELO DE CLASE
include_once '../modelo/REPALETIZAJEEX.php';
//LLAMADA AL CONFIGURACION DE LA BASE DE DATOS
include_once '../config/BDCONFIG.php';

//INICIALIZAR VARIABLES
$HOST="";
$DBNAME="";
$USER="";
$PASS="";

//ESTRUCTURA DEL CONTROLADOR
class REPALETIZAJEEX_ADO {
    
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
    public function listarRepaletizaje(){
        try{
            
            $datos=$this->conexion->prepare("SELECT * FROM `fruta_repaletizajeex` limit 8;	");
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
    public function listarRepaletizajeCBX(){
        try{
            
            $datos=$this->conexion->prepare("SELECT * ,
                                                FORMAT(IFNULL(`KILOS_NETO_ORIGINAL`,0),2,'de_DE') AS 'NETOO',   
                                                FORMAT(IFNULL(`KILOS_NETO_REPALETIZAJE`,0),2,'de_DE') AS 'NETOR' 
                                            FROM `fruta_repaletizajeex` WHERE `ESTADO_REGISTRO` = 1;	");
            $datos->execute();
            $resultado = $datos->fetchAll();
            
            //	print_r($resultado);
            //	VAR_DUMP($resultado);
            
            
            return $resultado;
        }catch(Exception $e){
            die($e->getMessage());
        }
        
    }
    public function listarRepaletizajeCBX3(){
        try{
            
            $datos=$this->conexion->prepare("SELECT * FROM `fruta_repaletizajeex`WHERE  `ESTADO_REGISTRO` = 0;;	");
            $datos->execute();
            $resultado = $datos->fetchAll();
            
            //	print_r($resultado);
            //	VAR_DUMP($resultado);
            
            
            return $resultado;
        }catch(Exception $e){
            die($e->getMessage());
        }
        
    }
    public function listarRepaletizajeCBX2(){
        try{
            
            $datos=$this->conexion->prepare("SELECT * ,
                                                FORMAT(IFNULL(`KILOS_NETO_ORIGINAL`,0),2,'de_DE') AS 'NETOO',   
                                                FORMAT(IFNULL(`KILOS_NETO_REPALETIZAJE`,0),2,'de_DE') AS 'NETOR' 
                                                FROM `fruta_repaletizajeex` WHERE `ESTADO_REGISTRO` = 1;	");
            $datos->execute();
            $resultado = $datos->fetchAll();
            
            //	print_r($resultado);
            //	VAR_DUMP($resultado);
            
            
            return $resultado;
        }catch(Exception $e){
            die($e->getMessage());
        }
        
    }
    public function listarRepaletizajeEmpresaPlantaTemporadaCBX($EMPRESA,$PLANTA,$TEMPORADA){
        try{
            
            $datos=$this->conexion->prepare("SELECT *,
                                            IFNULL(`KILOS_NETO_ORIGINAL`,0) AS 'NETOO',   
                                            IFNULL(`KILOS_NETO_REPALETIZAJE`,0) AS 'NETOR' 
                                            FROM `fruta_repaletizajeex`
                                             WHERE `ESTADO_REGISTRO` = 1                                                                                                      
                                            AND ID_EMPRESA = '".$EMPRESA."' 
                                            AND ID_PLANTA = '".$PLANTA."'
                                            AND ID_TEMPORADA = '".$TEMPORADA."' 
                                             ;	");
            $datos->execute();
            $resultado = $datos->fetchAll();
            
            //	print_r($resultado);
            //	VAR_DUMP($resultado);
            
            
            return $resultado;
        }catch(Exception $e){
            die($e->getMessage());
        }
        
    }
    public function listarRepaletizajeEmpresaPlantaTemporadaCBX2($EMPRESA,$PLANTA,$TEMPORADA){
        try{
            
            $datos=$this->conexion->prepare("SELECT *  ,
                                                FORMAT(IFNULL(`KILOS_NETO_ORIGINAL`,0),2,'de_DE') AS 'NETOO',   
                                                FORMAT(IFNULL(`KILOS_NETO_REPALETIZAJE`,0),2,'de_DE') AS 'NETOR' 
                                            FROM `fruta_repaletizajeex`
                                             WHERE `ESTADO_REGISTRO` = 1                                                                                                      
                                            AND ID_EMPRESA = '".$EMPRESA."' 
                                            AND ID_PLANTA = '".$PLANTA."'
                                            AND ID_TEMPORADA = '".$TEMPORADA."' 
                                             ;	");
            $datos->execute();
            $resultado = $datos->fetchAll();
            
            //	print_r($resultado);
            //	VAR_DUMP($resultado);
            
            
            return $resultado;
        }catch(Exception $e){
            die($e->getMessage());
        }
        
    }
    public function obtenerTotalesRepaletizajeCBX(){
        try{
            
            $datos=$this->conexion->prepare("SELECT   
                                                   IFNULL(SUM(`CANTIDAD_ENVASE_REPALETIZAJE`),0) AS 'ENVASE',   
                                                    IFNULL(SUM(`KILOS_NETO_REPALETIZAJE`),0) AS 'NETO' 
                                            FROM `fruta_repaletizajeex` ;	");
            $datos->execute();
            $resultado = $datos->fetchAll();
            
            //	print_r($resultado);
            //	VAR_DUMP($resultado);
            
            
            return $resultado;
        }catch(Exception $e){
            die($e->getMessage());
        }
        
    }
    public function obtenerTotalesRepaletizajeCBX2(){
        try{
            
            $datos=$this->conexion->prepare("SELECT  
                                                     FORMAT(IFNULL(SUM(`CANTIDAD_ENVASE_REPALETIZAJE`),0),0,'de_DE') AS 'ENVASE',   
                                                     FORMAT(IFNULL(SUM(`KILOS_NETO_REPALETIZAJE`),0),2,'de_DE') AS 'NETO' 
                                            FROM `fruta_repaletizajeex` ;	");
            $datos->execute();
            $resultado = $datos->fetchAll();
            
            //	print_r($resultado);
            //	VAR_DUMP($resultado);
            
            
            return $resultado;
        }catch(Exception $e){
            die($e->getMessage());
        }
        
    }
    
    public function obtenerTotalesRepaletizajeEmpresaPlantaTemporadaCBX($EMPRESA,$PLANTA,$TEMPORADA){
        try{
            
            $datos=$this->conexion->prepare("SELECT  FORMAT(IFNULL(SUM(`CANTIDAD_ENVASE_REPALETIZAJE`),0),0,'de_DE') AS 'ENVASE',   
                                                     FORMAT(IFNULL(SUM(`KILOS_NETO_REPALETIZAJE`),0),2,'de_DE') AS 'NETO' 
                                            FROM `fruta_repaletizajeex`                                                                                                                                    
                                            WHERE ID_EMPRESA = '".$EMPRESA."' 
                                            AND ID_PLANTA = '".$PLANTA."'
                                            AND ID_TEMPORADA = '".$TEMPORADA."'  ;	");
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
  


    //VER LA INFORMACION RELACIONADA EN BASE AL ID INGRESADO A LA FUNCION
    public function verRepaletizaje($ID){
        try{
            
            $datos=$this->conexion->prepare("SELECT *, DATE_FORMAT(FECHA_INGRESO, '%Y-%m-%d') AS 'INGRESO' ,
                                                DATE_FORMAT(FECHA_MODIFICACION, '%Y-%m-%d')  AS 'MODIFICACION'  
                                                FROM `fruta_repaletizajeex` 
                                                WHERE `ID_REPALETIZAJE`= '".$ID."';");
            $datos->execute();
            $resultado = $datos->fetchAll();
            
            //	print_r($resultado);
            //	VAR_DUMP($resultado);
            
            
            return $resultado;
        }catch(Exception $e){
            die($e->getMessage());
        }
        
    }

    public function verRepaletizaje2($ID){
        try{
            
            $datos=$this->conexion->prepare("SELECT *, DATE_FORMAT(FECHA_INGRESO, '%d-%m-%Y') AS 'INGRESO' ,
                                                       DATE_FORMAT(FECHA_MODIFICACION, '%d-%m-%Y')  AS 'MODIFICACION'  ,
                                                       FORMAT(CANTIDAD_ENVASE_REPALETIZAJE,0,'de_DE') AS 'ENVASE',
                                                       FORMAT(KILOS_NETO_REPALETIZAJE,2,'de_DE') AS 'NETO'
                                                FROM `fruta_repaletizajeex` 
                                                WHERE `ID_REPALETIZAJE`= '".$ID."';");
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
    public function agregarRepaletizaje(REPALETIZAJEEX $REPALETIZAJEEX){
        try{
             $query=
            "INSERT INTO `fruta_repaletizajeex` ( `NUMERO_REPALETIZAJE`,
                                            `CANTIDAD_ENVASE_REPALETIZAJE`,  `KILOS_NETO_REPALETIZAJE`,
                                            `CANTIDAD_ENVASE_ORIGINAL`,  `KILOS_NETO_ORIGINAL`,
                                            `MOTIVO_REPALETIZAJE`,
                                            `ID_EMPRESA`, `ID_PLANTA`, `ID_TEMPORADA`,
                                            `FECHA_INGRESO`,`FECHA_MODIFICACION`,
                                            `ESTADO`, `ESTADO_REGISTRO`  ) 
            VALUES
	       	( ?, ?, ?, ?, ?, ?, ?, ?, ?, SYSDATE(), SYSDATE(),  1, 1 );";
            $this->conexion->prepare($query)
            ->execute(
                array(
                    
                    $REPALETIZAJEEX->__GET('NUMERO_REPALETIZAJE'),
                    $REPALETIZAJEEX->__GET('CANTIDAD_ENVASE_REPALETIZAJE'),
                    $REPALETIZAJEEX->__GET('KILOS_NETO_REPALETIZAJE'),
                    $REPALETIZAJEEX->__GET('CANTIDAD_ENVASE_ORIGINAL'),
                    $REPALETIZAJEEX->__GET('KILOS_NETO_ORIGINAL'),
                    $REPALETIZAJEEX->__GET('MOTIVO_REPALETIZAJE'),
                    $REPALETIZAJEEX->__GET('ID_EMPRESA'),
                    $REPALETIZAJEEX->__GET('ID_PLANTA'),
                    $REPALETIZAJEEX->__GET('ID_TEMPORADA')
                    
                )
                
                );
            
        }catch(Exception $e){
            die($e->getMessage());
        }
    }
    
    //ELIMINAR FILA, NO SE UTILIZA
    public function eliminarRepaletizaje($id){
        try{$sql="DELETE FROM `fruta_repaletizajeex` WHERE `ID_REPALETIZAJE`=".$id.";";
        $statement=$this->conexion->prepare($sql);
        $statement->execute();
        }catch(Exception $e){
            die($e->getMessage());
            
        }
        
    }
    
    
  
    
    //ACTUALIZAR INFORMACION DE LA FILA
    public function actualizarRepaletizaje(REPALETIZAJEEX $REPALETIZAJEEX){
        try{
            $query = "
		UPDATE `fruta_repaletizajeex` SET
            `FECHA_MODIFICACION` = SYSDATE(),    
            `CANTIDAD_ENVASE_REPALETIZAJE`= ?,
            `KILOS_NETO_REPALETIZAJE`= ?,
            `CANTIDAD_ENVASE_ORIGINAL`= ?,
            `KILOS_NETO_ORIGINAL`= ?,
            `MOTIVO_REPALETIZAJE`= ?,        
            `ID_EMPRESA` = ?,
            `ID_PLANTA` = ?, 
            `ID_TEMPORADA` = ?
            
		WHERE `ID_REPALETIZAJE`= ?;";
            $this->conexion->prepare($query)
            ->execute(
                array(
                    $REPALETIZAJEEX->__GET('CANTIDAD_ENVASE_REPALETIZAJE'),
                    $REPALETIZAJEEX->__GET('KILOS_NETO_REPALETIZAJE'),
                    $REPALETIZAJEEX->__GET('CANTIDAD_ENVASE_ORIGINAL'),
                    $REPALETIZAJEEX->__GET('KILOS_NETO_ORIGINAL'),
                    $REPALETIZAJEEX->__GET('MOTIVO_REPALETIZAJE'),
                    $REPALETIZAJEEX->__GET('ID_EMPRESA'),
                    $REPALETIZAJEEX->__GET('ID_PLANTA'),
                    $REPALETIZAJEEX->__GET('ID_TEMPORADA'),   
                    $REPALETIZAJEEX->__GET('ID_REPALETIZAJE')
                    
                )
                
                );
            
        }catch(Exception $e){
            die($e->getMessage());
        }
        
    }
    
//ACTUALIZAR INFORMACION DE LA FILA
public function actualizarRepaletizajeExistenciaExportacion(REPALETIZAJEEX $REPALETIZAJEEX){
    try{
        $query = "
    UPDATE `fruta_repaletizajeex` SET
        `CANTIDAD_ENVASE_REPALETIZAJE`= ?,
        `KILOS_NETO_REPALETIZAJE`= ?,
        `FECHA_MODIFICACION` = SYSDATE()
        
    WHERE `ID_REPALETIZAJE`= ?;";
        $this->conexion->prepare($query)
        ->execute(
            array(
                $REPALETIZAJEEX->__GET('CANTIDAD_ENVASE_REPALETIZAJE'),
                $REPALETIZAJEEX->__GET('KILOS_NETO_REPALETIZAJE'),
                $REPALETIZAJEEX->__GET('ID_REPALETIZAJE')
                
            )
            
            );
        
    }catch(Exception $e){
        die($e->getMessage());
    }
    
}
//ACTUALIZAR INFORMACION DE LA FILA
public function actualizarRepaletizajeQuitarExistenciaExportacion(REPALETIZAJEEX $REPALETIZAJEEX){
    try{
        $query = "
    UPDATE `fruta_repaletizajeex` SET
        `CANTIDAD_ENVASE_REPALETIZAJE`= ?,
        `KILOS_NETO_REPALETIZAJE`= ?,
        `FECHA_MODIFICACION` = SYSDATE()
        
    WHERE `ID_REPALETIZAJE`= ?;";
        $this->conexion->prepare($query)
        ->execute(
            array(  
                $REPALETIZAJEEX->__GET('CANTIDAD_ENVASE_REPALETIZAJE'),
                $REPALETIZAJEEX->__GET('KILOS_NETO_REPALETIZAJE'),
                $REPALETIZAJEEX->__GET('ID_REPALETIZAJE')
                
            )
            
            );
        
    }catch(Exception $e){
        die($e->getMessage());
    }
    
}



    //FUNCIONES ESPECIALIZADAS
//CONSULTA PARA OBTENER LA FILA EN EL MISMO MOMENTO DE REGISTRAR LA FILA
    public function buscarID(  $CANTIDADENVASEORIGINALREPALETIZAJE, $KILOSNETOORGINALREPALETIZAJE,$MOTIVOREPALETIZAJE,
                              $EMPRESA,$PLANTA,$TEMPORADA ){
        try{
            $datos=$this->conexion->prepare(" SELECT *
                                            FROM `fruta_repaletizajeex`
                                            WHERE 
                                                 CANTIDAD_ENVASE_REPALETIZAJE = ".$CANTIDADENVASEORIGINALREPALETIZAJE."
                                                 AND KILOS_NETO_REPALETIZAJE = ".$KILOSNETOORGINALREPALETIZAJE."    
                                                 AND MOTIVO_REPALETIZAJE LIKE '".$MOTIVOREPALETIZAJE."'   
                                                 AND DATE_FORMAT(FECHA_INGRESO, '%Y-%m-%d %H:%i') =  DATE_FORMAT(NOW(),'%Y-%m-%d %H:%i') 
                                                 AND DATE_FORMAT(FECHA_MODIFICACION, '%Y-%m-%d %H:%i') = DATE_FORMAT(NOW(),'%Y-%m-%d %H:%i')   
                                                 AND ID_EMPRESA = '".$EMPRESA."'                                      
                                                 AND ID_PLANTA = '".$PLANTA ."'                                      
                                                 AND ID_TEMPORADA = '".$TEMPORADA."'
                                                 ORDER BY ID_REPALETIZAJE DESC
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
  





    //CAMBIO DE ESTADO DE REGISTRO DEL REGISTRO
    //CAMBIO A DESACTIVADO
    public function deshabilitar(REPALETIZAJEEX $REPALETIZAJEEX){

        try{
            $query = "
                UPDATE `fruta_repaletizajeex` SET			
                        `ESTADO_REGISTRO` = 0
                WHERE `ID_REPALETIZAJE`= ?;";
            $this->conexion->prepare($query)
            ->execute(
                array(                 
                    $REPALETIZAJEEX->__GET('ID_REPALETIZAJE')                    
                )
                
                );
            
        }catch(Exception $e){
            die($e->getMessage());
        }
        
    }
    //CAMBIO A ACTIVADO
    public function habilitar(REPALETIZAJEEX $REPALETIZAJEEX){
        try{
            $query = "
                UPDATE `fruta_repaletizajeex` SET			
                        `ESTADO_REGISTRO` = 1
                WHERE `ID_REPALETIZAJE`= ?;";
            $this->conexion->prepare($query)
            ->execute(
                array(                 
                    $REPALETIZAJEEX->__GET('ID_REPALETIZAJE')                    
                )
                
                );
            
        }catch(Exception $e){
            die($e->getMessage());
        }
        
    }

    //CAMBIO ESTADO
    //ABIERTO 1

    public function abierto(REPALETIZAJEEX $REPALETIZAJEEX){

        try{
            $query = "
                UPDATE `fruta_repaletizajeex` SET			
                        `ESTADO` = 1
                WHERE `ID_REPALETIZAJE`= ?;";
            $this->conexion->prepare($query)
            ->execute(
                array(                 
                    $REPALETIZAJEEX->__GET('ID_REPALETIZAJE')                    
                )
                
                );
            
        }catch(Exception $e){
            die($e->getMessage());
        }
        
    }
    //CERRADO 0
    public function cerrado(REPALETIZAJEEX $REPALETIZAJEEX){
        try{
            $query = "
                UPDATE `fruta_repaletizajeex` SET			
                        `ESTADO` = 0
                WHERE `ID_REPALETIZAJE`= ?;";
            $this->conexion->prepare($query)
            ->execute(
                array(                 
                    $REPALETIZAJEEX->__GET('ID_REPALETIZAJE')                    
                )
                
                );
            
        }catch(Exception $e){
            die($e->getMessage());
        }
        
    }

//FILTRO


    

public function obtenerNumero($EMPRESA,$PLANTA,$TEMPORADA){
    try{
        $datos=$this->conexion->prepare(" SELECT  COUNT(IFNULL(NUMERO_REPALETIZAJE,0)) AS 'NUMERO'
                                            FROM `fruta_repaletizajeex`
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