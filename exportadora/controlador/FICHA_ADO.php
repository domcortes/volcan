<?php
//LLAMADA DE LOS ARCHIVOS NECESAROP PARA LA OPERACION DEL CONTROLADOR
//LLAMADA AL MODELO DE CLASE
include_once '../modelo/FICHA.php';
//LLAMADA AL CONFIGURACION DE LA BASE DE DATOS
include_once '../config/BDCONFIG.php';

//INICIALIZAR VARIABLES
$HOST="";
$DBNAME="";
$USER="";
$PASS="";

//ESTRUCTURA DEL CONTROLADOR
class FICHA_ADO {
    
    
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
    public function listarFicha(){
        try{
            
            $datos=$this->conexion->prepare("SELECT * FROM `material_ficha` limit 8;	");
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
    public function listarFichaCBX(){
        try{
            
            $datos=$this->conexion->prepare("SELECT * FROM `material_ficha` WHERE `ESTADO_REGISTRO` = 1;	");
            $datos->execute();
            $resultado = $datos->fetchAll();
            
            //	print_r($resultado);
            //	VAR_DUMP($resultado);
            
            
            return $resultado;
        }catch(Exception $e){
            die($e->getMessage());
        }
        
    }


    public function listarFicha2CBX(){
        try{
            
            $datos=$this->conexion->prepare("SELECT * FROM `material_ficha` WHERE `ESTADO_REGISTRO` = 0;	");
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
    public function verFicha($ID){
        try{
            
            $datos=$this->conexion->prepare("SELECT * ,            
                                                    DATE_FORMAT(INGRESO, '%Y-%m-%d') AS 'INGRESO',
                                                    DATE_FORMAT(MODIFICACION, '%Y-%m-%d') AS 'MODIFICACION'  
                                            FROM `material_ficha` 
                                            WHERE `ID_FICHA`= '".$ID."';");
            $datos->execute();
            $resultado = $datos->fetchAll();
            
            //	print_r($resultado);
            //	VAR_DUMP($resultado);
            
            
            return $resultado;
        }catch(Exception $e){
            die($e->getMessage());
        }
        
    }

    public function verFicha2($ID){
        try{
            
            $datos=$this->conexion->prepare("SELECT * ,            
                                                    DATE_FORMAT(INGRESO, '%d-%m-%Y') AS 'INGRESOF',
                                                    DATE_FORMAT(MODIFICACION, '%d-%m-%Y') AS 'MODIFICACIONF'  
                                            FROM `material_ficha` 
                                            WHERE `ID_FICHA`= '".$ID."';");
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
    public function agregarFicha(FICHA $FICHA){
        try{
           

            
            $query=
            "INSERT INTO `material_ficha` (
                                            `NUMERO_FICHA`,
                                            `OBSERVACIONES_FICHA`,                                            
                                            `ID_ESTANDAR`, 
                                            `ID_EMPRESA`, 
                                            `ID_TEMPORADA`,  
                                            `ID_USUARIOI`, 
                                            `ID_USUARIOM`, 
                                            `INGRESO`, 
                                            `MODIFICACION`,  
                                            `ESTADO`,
                                            `ESTADO_REGISTRO`
                                           )  VALUES
	       	( ?, ?, ?, ?, ?, ?, ?,  SYSDATE() , SYSDATE(), 1, 1 );";
            $this->conexion->prepare($query)
            ->execute(
                array(                     
                    $FICHA->__GET('NUMERO_FICHA'),
                    $FICHA->__GET('OBSERVACIONES_FICHA') ,
                    $FICHA->__GET('ID_ESTANDAR') ,
                    $FICHA->__GET('ID_EMPRESA'),
                    $FICHA->__GET('ID_TEMPORADA')  ,
                    $FICHA->__GET('ID_USUARIOI'),
                    $FICHA->__GET('ID_USUARIOM')           
                )
                
                );
            
        }catch(Exception $e){
            die($e->getMessage());
        }
    }
    
    //ELIMINAR FILA, NO SE UTILIZA
    public function eliminarFicha($id){
        try{$sql="DELETE FROM `material_ficha` WHERE `ID_FICHA`=".$id.";";
        $statement=$this->conexion->prepare($sql);
        $statement->execute();
        }catch(Exception $e){
            die($e->getMessage());
            
        }
        
    }
    
    
    //ACTUALIZAR INFORMACION DE LA FILA
    public function actualizarFicha(FICHA $FICHA){
        try{
            $query = "
                UPDATE `material_ficha` SET
                    `MODIFICACION`= SYSDATE(),
                    `OBSERVACIONES_FICHA`= ?,
                    `ID_ESTANDAR`= ?,
                    `ID_EMPRESA`= ?,
                    `ID_TEMPORADA`= ? ,
                    `ID_USUARIOM`= ?   
                WHERE `ID_FICHA`= ?;";
            $this->conexion->prepare($query)
            ->execute(
                array(
                    $FICHA->__GET('OBSERVACIONES_FICHA') ,
                    $FICHA->__GET('ID_ESTANDAR') ,
                    $FICHA->__GET('ID_EMPRESA'),
                    $FICHA->__GET('ID_TEMPORADA')  ,
                    $FICHA->__GET('ID_USUARIOM'),
                    $FICHA->__GET('ID_FICHA')
                    
                )
                
                );
            
        }catch(Exception $e){
            die($e->getMessage());
        }
        
    }

    //FUNCIONES ESPECIALIZADAS
    //CAMBIO DE ESTADO DE REGISTRO DEL REGISTRO
    //CAMBIO A DESACTIVADO
    public function deshabilitar(FICHA $FICHA){

        try{
            $query = "
    UPDATE `material_ficha` SET			
            `ESTADO_REGISTRO` = 0
    WHERE `ID_FICHA`= ?;";
            $this->conexion->prepare($query)
            ->execute(
                array(                 
                    $FICHA->__GET('ID_FICHA')                    
                )
                
                );
            
        }catch(Exception $e){
            die($e->getMessage());
        }
        
    }
    //CAMBIO A ACTIVADO
    public function habilitar(FICHA $FICHA){
        try{
            $query = "
    UPDATE `material_ficha` SET			
            `ESTADO_REGISTRO` = 1
    WHERE `ID_FICHA`= ?;";
            $this->conexion->prepare($query)
            ->execute(
                array(                 
                    $FICHA->__GET('ID_FICHA')                    
                )
                
                );
            
        }catch(Exception $e){
            die($e->getMessage());
        }
        
    }

    //CAMBIO DE ESTADO 
    //CAMBIO A CERRADO
    public function cerrado(FICHA $FICHA){

        try{
            $query = "
    UPDATE `material_ficha` SET			
            `MODIFICACION`= SYSDATE(),		
            `ESTADO` = 0
    WHERE `ID_FICHA`= ?;";
            $this->conexion->prepare($query)
            ->execute(
                array(                 
                    $FICHA->__GET('ID_FICHA')                    
                )
                
                );
            
        }catch(Exception $e){
            die($e->getMessage());
        }
        
    }
    //CAMBIO A ABIERTO
    public function abierto(FICHA $FICHA){
        try{
            $query = "
    UPDATE `material_ficha` SET				
            `MODIFICACION`= SYSDATE(),	
            `ESTADO` = 1
    WHERE `ID_FICHA`= ?;";
            $this->conexion->prepare($query)
            ->execute(
                array(                 
                    $FICHA->__GET('ID_FICHA')                    
                )
                
                );
            
        }catch(Exception $e){
            die($e->getMessage());
        }
        
    }

    public function buscarID($ESTANDAR, $OBSERVACIONESRECEPCION,  $EMPRESA,  $TEMPORADA)
    {
        try {


            $datos = $this->conexion->prepare(" SELECT *
                                            FROM `material_ficha`
                                            WHERE 
                                                 ID_ESTANDAR = '" . $ESTANDAR . "'
                                                 AND OBSERVACIONES_FICHA LIKE '" . $OBSERVACIONESRECEPCION . "'  
                                                 AND DATE_FORMAT(INGRESO, '%Y-%m-%d %H:%i') =  DATE_FORMAT(NOW(),'%Y-%m-%d %H:%i') 
                                                 AND DATE_FORMAT(MODIFICACION, '%Y-%m-%d %H:%i') = DATE_FORMAT(NOW(),'%Y-%m-%d %H:%i')  
                                                 AND ID_EMPRESA = " . $EMPRESA . " 
                                                 AND ID_TEMPORADA = " . $TEMPORADA . " 
                                            ORDER BY ID_FICHA DESC
                                                 ; ");
            $datos->execute();
            $resultado = $datos->fetchAll();

            //	print_r($resultado);
            //	VAR_DUMP($resultado);


            return $resultado;
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }


    public function listarFichaPorEmpresaTemporadaCBX($IDEMPRESA,$IDTEMPORADA){
        try{
            
            $datos=$this->conexion->prepare("SELECT *,           
                                                DATE_FORMAT(INGRESO, '%Y-%m-%d') AS 'INGRESOF',
                                                DATE_FORMAT(MODIFICACION, '%Y-%m-%d') AS 'MODIFICACIONF'  
                                            FROM `material_ficha` 
                                            WHERE `ESTADO_REGISTRO` = 1
                                            AND ID_EMPRESA = '" . $IDEMPRESA . "'     
                                            AND  ID_TEMPORADA = '" . $IDTEMPORADA . "' ;	");
            $datos->execute();
            $resultado = $datos->fetchAll();
            
            //	print_r($resultado);
            //	VAR_DUMP($resultado);
            
            
            return $resultado;
        }catch(Exception $e){
            die($e->getMessage());
        }
        
    }

    public function listarFichaPorEmpresaTemporada2CBX($IDEMPRESA,$IDTEMPORADA){
        try{
            
            $datos=$this->conexion->prepare("SELECT *,           
                                                DATE_FORMAT(INGRESO, '%d-%m-%Y') AS 'INGRESOF',
                                                DATE_FORMAT(MODIFICACION, '%d-%m-%Y') AS 'MODIFICACIONF'  
                                            FROM `material_ficha` 
                                            WHERE `ESTADO_REGISTRO` = 1
                                            AND ID_EMPRESA = '" . $IDEMPRESA . "'     
                                            AND  ID_TEMPORADA = '" . $IDTEMPORADA . "' ;	");
            $datos->execute();
            $resultado = $datos->fetchAll();
            
            //	print_r($resultado);
            //	VAR_DUMP($resultado);
            
            
            return $resultado;
        }catch(Exception $e){
            die($e->getMessage());
        }
        
    }

    
    public function obtenerNumero($IDEMPRESA, $IDTEMPORADA)
    {
        try {
            $datos = $this->conexion->prepare(" SELECT  
                                                    IFNULL(COUNT(NUMERO_FICHA),0) AS 'NUMERO'
                                                FROM `material_ficha`
                                                WHERE ID_EMPRESA = '" . $IDEMPRESA . "'     
                                                AND  ID_TEMPORADA = '" . $IDTEMPORADA . "'  
                                                    ; ");
            $datos->execute();
            $resultado = $datos->fetchAll();
    
            //	print_r($resultado);
            //	VAR_DUMP($resultado);
    
    
            return $resultado;
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
    
}
?>