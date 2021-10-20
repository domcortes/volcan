<?php
//LLAMADA DE LOS ARCHIVOS NECESAROP PARA LA OPERACION DEL CONTROLADOR
//LLAMADA AL MODELO DE CLASE
include_once '../modelo/TMONEDA.php';
//LLAMADA AL CONFIGURACION DE LA BASE DE DATOS
include_once '../config/BDCONFIG.php';


//INICIALIZAR VARIABLES
$HOST="";
$DBNAME="";
$USER="";
$PASS="";

//ESTRUCTURA DEL CONTROLADOR
class TMONEDA_ADO {
    
    
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
    public function listarTmoneda(){
        try{
            
            $datos=$this->conexion->prepare("SELECT * FROM `material_tmoneda` limit 8 WHERE ESTADO_REGISTRO = 1;	");
            $datos->execute();
            $resultado = $datos->fetchAll();
            $datos=null;
            
            //	print_r($resultado);
            //	VAR_DUMP($resultado);
            
            
            return $resultado;
        }catch(Exception $e){
            die($e->getMessage());
        }
        
    }
    //LISTAR TODO
    public function listarTmonedaCBX(){
        try{
            
            $datos=$this->conexion->prepare("SELECT * FROM `material_tmoneda` WHERE ESTADO_REGISTRO = 1;	");
            $datos->execute();
            $resultado = $datos->fetchAll();
            $datos=null;
            
            //	print_r($resultado);
            //	VAR_DUMP($resultado);
            
            
            return $resultado;
        }catch(Exception $e){
            die($e->getMessage());
        }
        
    }

    public function listarTmoneda2CBX(){
        try{
            
            $datos=$this->conexion->prepare("SELECT * FROM `material_tmoneda` WHERE ESTADO_REGISTRO = 0;	");
            $datos->execute();
            $resultado = $datos->fetchAll();
            $datos=null;
            
            //	print_r($resultado);
            //	VAR_DUMP($resultado);
            
            
            return $resultado;
        }catch(Exception $e){
            die($e->getMessage());
        }
        
    }


    //VER LA INFORMACION RELACIONADA EN BASE AL ID INGRESADO A LA FUNCION
    public function verTmoneda($ID){
        try{
            
            $datos=$this->conexion->prepare("SELECT * FROM `material_tmoneda` WHERE `ID_TMONEDA`= '".$ID."';");
            $datos->execute();
            $resultado = $datos->fetchAll();
            $datos=null;
            
            //	print_r($resultado);
            //	VAR_DUMP($resultado);
            
            
            return $resultado;
        }catch(Exception $e){
            die($e->getMessage());
        }
        
    }

  
    
    //REGISTRO DE UNA NUEVA FILA    

    public function agregarTmoneda(TMONEDA $TMONEDA){
        try{
            
            
            $query=
            "INSERT INTO `material_tmoneda` (
                                                `NUMERO_TMONEDA`, 
                                                `NOMBRE_TMONEDA`, 
                                                `ID_EMPRESA`,
                                                `ID_USUARIOI`,
                                                `ID_USUARIOM`,
                                                `INGRESO`,
                                                `MODIFICACION`, 
                                                `ESTADO_REGISTRO`
                                            ) VALUES
	       	( ?, ?, ?, ?, ?, SYSDATE() , SYSDATE(), 1);";
            $this->conexion->prepare($query)
            ->execute(
                array(                 
                    $TMONEDA->__GET('NUMERO_TMONEDA')  ,
                    $TMONEDA->__GET('NOMBRE_TMONEDA')  ,
                    $TMONEDA->__GET('ID_EMPRESA')      ,
                    $TMONEDA->__GET('ID_USUARIOI')      ,
                    $TMONEDA->__GET('ID_USUARIOM')                
                )
                
                );
            
        }catch(Exception $e){
            die($e->getMessage());
        }
    }
    
    
    //ELIMINAR FILA, NO SE UTILIZA
    public function eliminarTmoneda($id){
        try{$sql="DELETE FROM `material_tmoneda` WHERE `ID_TMONEDA`=".$id.";";
        $statement=$this->conexion->prepare($sql);
        $statement->execute();
        }catch(Exception $e){
            die($e->getMessage());
            
        }
        
    }
    
    
  
    
    //ACTUALIZAR INFORMACION DE LA FILA
    public function actualizarTmoneda(TMONEDA $TMONEDA){
        try{
            $query = "
		UPDATE `material_tmoneda` SET
            `MODIFICACION`= SYSDATE(),
            `NOMBRE_TMONEDA`= ?,
            `ID_EMPRESA`= ?,
            `ID_USUARIOM`= ?            
		WHERE `ID_TMONEDA`= ?;";
            $this->conexion->prepare($query)
            ->execute(
                array(   
                    $TMONEDA->__GET('NOMBRE_TMONEDA'), 
                    $TMONEDA->__GET('ID_EMPRESA') ,      
                    $TMONEDA->__GET('ID_USUARIOM') ,             
                    $TMONEDA->__GET('ID_TMONEDA')
                    
                )
                
                );
            
        }catch(Exception $e){
            die($e->getMessage());
        }
        
    }
    
    
    //FUNCIONES ESPECIALIZADAS 
    //CAMBIO DE ESTADO DE REGISTRO DEL REGISTRO
    //CAMBIO A DESACTIVADO
    public function deshabilitar(TMONEDA $TMONEDA){

        try{
            $query = "
    UPDATE `material_tmoneda` SET			
            `MODIFICACION`= SYSDATE(),		
            `ESTADO_REGISTRO` = 0
    WHERE `ID_TMONEDA`= ?;";
            $this->conexion->prepare($query)
            ->execute(
                array(                 
                    $TMONEDA->__GET('ID_TMONEDA')                    
                )
                
                );
            
        }catch(Exception $e){
            die($e->getMessage());
        }
        
    }
    //CAMBIO A ACTIVADO
    public function habilitar(TMONEDA $TMONEDA){
        try{
            $query = "
    UPDATE `material_tmoneda` SET			
            `MODIFICACION`= SYSDATE(),		
            `ESTADO_REGISTRO` = 1
    WHERE `ID_TMONEDA`= ?;";
            $this->conexion->prepare($query)
            ->execute(
                array(                 
                    $TMONEDA->__GET('ID_TMONEDA')                    
                )
                
                );
            
        }catch(Exception $e){
            die($e->getMessage());
        }
        
    }
    public function listarTmonedaPorEmpresaCBX($IDEMPRESA){
        try{
            
            $datos=$this->conexion->prepare("SELECT * FROM `material_tmoneda` WHERE ESTADO_REGISTRO = 1 AND ID_EMPRESA = '".$IDEMPRESA."' ;	");
            $datos->execute();
            $resultado = $datos->fetchAll();
            $datos=null;
            
            //	print_r($resultado);
            //	VAR_DUMP($resultado);
            
            
            return $resultado;
        }catch(Exception $e){
            die($e->getMessage());
        }
        
    }
    
    public function obtenerNumero()
    {
        try {
            $datos = $this->conexion->prepare(" SELECT  
                                                    IFNULL(COUNT(NUMERO_TMONEDA),0) AS 'NUMERO'
                                                FROM `material_tmoneda`  ; ");
            $datos->execute();
            $resultado = $datos->fetchAll();
            $datos=null;

            //	print_r($resultado);
            //	VAR_DUMP($resultado);


            return $resultado;
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
}
?>