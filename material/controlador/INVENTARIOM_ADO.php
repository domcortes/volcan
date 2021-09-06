<?php
//LLAMADA DE LOS ARCHIVOS NECESAROP PARA LA OPERACION DEL CONTROLADOR
//LLAMADA AL MODELO DE CLASE
include_once '../modelo/INVENTARIOM.php';
//LLAMADA AL CONFIGURACION DE LA BASE DE DATOS
include_once '../config/BDCONFIG.php';


//INICIALIZAR VARIABLES
$HOST="";
$DBNAME="";
$USER="";
$PASS="";

//ESTRUCTURA DEL CONTROLADOR
class INVENTARIOM_ADO {
    
    
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
    public function listarInventario(){
        try{
            
            $datos=$this->conexion->prepare("SELECT * FROM `material_inventariom` limit 8 WHERE ESTADO_REGISTRO = 1;	");
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
    public function listarInventarioCBX(){
        try{
            
            $datos=$this->conexion->prepare("SELECT * FROM `material_inventariom` WHERE ESTADO_REGISTRO = 1;	");
            $datos->execute();
            $resultado = $datos->fetchAll();
            
            //	print_r($resultado);
            //	VAR_DUMP($resultado);
            
            
            return $resultado;
        }catch(Exception $e){
            die($e->getMessage());
        }
        
    }

    public function listarInventario2CBX(){
        try{
            
            $datos=$this->conexion->prepare("SELECT * FROM `material_inventariom` WHERE ESTADO_REGISTRO = 0;	");
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
    public function verInventario($ID){
        try{
            
            $datos=$this->conexion->prepare("SELECT * FROM `material_inventariom` WHERE `ID_INVENTARIO`= '".$ID."';");
            $datos->execute();
            $resultado = $datos->fetchAll();
            
            //	print_r($resultado);
            //	VAR_DUMP($resultado);
            
            
            return $resultado;
        }catch(Exception $e){
            die($e->getMessage());
        }
        
    }

    public function verInventario2($ID){
        try{
            
            $datos=$this->conexion->prepare("SELECT * , 
                                                DATE_FORMAT(INGRESO, '%Y-%m-%d') AS 'INGRESO',
                                                DATE_FORMAT(MODIFICACION, '%Y-%m-%d') AS 'MODIFICACION' 
                                            FROM `material_inventariom` 
                                                WHERE `ID_INVENTARIO`= '".$ID."';");
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
    public function agregarInventarioRecepcion(INVENTARIOM $INVENTARIOM){
        try{      
            if($INVENTARIOM->__GET('ID_PROVEEDOR')==NULL){
                $INVENTARIOM->__SET('ID_PROVEEDOR', NULL);
            }
            if($INVENTARIOM->__GET('ID_PLANTA2')==NULL){
                $INVENTARIOM->__SET('ID_PLANTA2', NULL);
            }
            if($INVENTARIOM->__GET('ID_PLANTA3')==NULL){
                $INVENTARIOM->__SET('ID_PLANTA3', NULL);
            }
            if($INVENTARIOM->__GET('ID_PRODUCTOR')==NULL){
                $INVENTARIOM->__SET('ID_PRODUCTOR', NULL);
            }
            $query=
                "INSERT INTO `material_inventariom` (   
                                                        `FOLIO_INVENTARIO`,
                                                        `FOLIO_AUXILIAR_INVENTARIO`,
                                                        `ALIAS_DINAMICO_FOLIO`,
                                                        `ALIAS_ESTATICO_FOLIO`,
                                                        `TRECEPCION`,
                                                        `VALOR_UNITARIO`,   
                                                        `CANTIDAD_INVENTARIO`, 
                                                        `ID_EMPRESA`,
                                                        `ID_PLANTA`,
                                                        `ID_TEMPORADA`,
                                                        `ID_BODEGA`,
                                                        `ID_FOLIO`,
                                                        `ID_PRODUCTO`,
                                                        `ID_TCONTENEDOR`,
                                                        `ID_TUMEDIDA`,
                                                        `ID_RECEPCION`,
                                                        `ID_PLANTA2`,
                                                        `ID_PLANTA3`,
                                                        `ID_PROVEEDOR`,
                                                        `ID_PRODUCTOR`,
                                                        `INGRESO`,
                                                        `MODIFICACION`,     
                                                        `ESTADO`,
                                                        `ESTADO_REGISTRO`
                                                    ) VALUES
	       	( ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?,  SYSDATE() , SYSDATE(),  1, 1);";
            $this->conexion->prepare($query)
            ->execute(
                array(                 
                    $INVENTARIOM->__GET('FOLIO_INVENTARIO') , 
                    $INVENTARIOM->__GET('FOLIO_AUXILIAR_INVENTARIO') ,  
                    $INVENTARIOM->__GET('ALIAS_DINAMICO_FOLIO') ,    
                    $INVENTARIOM->__GET('ALIAS_ESTATICO_FOLIO') ,    
                    $INVENTARIOM->__GET('TRECEPCION') ,  
                    $INVENTARIOM->__GET('VALOR_UNITARIO') ,   
                    $INVENTARIOM->__GET('CANTIDAD_INVENTARIO') ,
                    $INVENTARIOM->__GET('ID_EMPRESA') ,  
                    $INVENTARIOM->__GET('ID_PLANTA') ,  
                    $INVENTARIOM->__GET('ID_TEMPORADA') ,  
                    $INVENTARIOM->__GET('ID_BODEGA') ,     
                    $INVENTARIOM->__GET('ID_FOLIO') ,     
                    $INVENTARIOM->__GET('ID_PRODUCTO') ,     
                    $INVENTARIOM->__GET('ID_TCONTENEDOR') ,     
                    $INVENTARIOM->__GET('ID_TUMEDIDA') ,     
                    $INVENTARIOM->__GET('ID_RECEPCION') ,     
                    $INVENTARIOM->__GET('ID_PLANTA2') ,     
                    $INVENTARIOM->__GET('ID_PLANTA3') ,     
                    $INVENTARIOM->__GET('ID_PROVEEDOR') ,     
                    $INVENTARIOM->__GET('ID_PRODUCTOR')      
                )
                
                );
            
        }catch(Exception $e){
            die($e->getMessage());
        }
    }   
    
    //ELIMINAR FILA, NO SE UTILIZA
    public function eliminarInventario($id){
        try{$sql="DELETE FROM `material_inventariom` WHERE `ID_INVENTARIO`=".$id.";";
        $statement=$this->conexion->prepare($sql);
        $statement->execute();
        }catch(Exception $e){
            die($e->getMessage());
            
        }
        
    }      
    //ACTUALIZAR INFORMACION DE LA FILA
    public function actualizarInventarioRecepcion(INVENTARIOM $INVENTARIOM){
        try{    
            if($INVENTARIOM->__GET('ID_PROVEEDOR')==NULL){
                $INVENTARIOM->__SET('ID_PROVEEDOR', NULL);
            }
            if($INVENTARIOM->__GET('ID_PLANTA2')==NULL){
                $INVENTARIOM->__SET('ID_PLANTA2', NULL);
            }
            if($INVENTARIOM->__GET('ID_PLANTA3')==NULL){
                $INVENTARIOM->__SET('ID_PLANTA3', NULL);
            }
            if($INVENTARIOM->__GET('ID_PRODUCTOR')==NULL){
                $INVENTARIOM->__SET('ID_PRODUCTOR', NULL);
            }            
            $query = "
		UPDATE `material_inventariom` SET
            `MODIFICACION`= SYSDATE(),
            `TRECEPCION`= ?,
            `VALOR_UNITARIO`= ?,
            `CANTIDAD_INVENTARIO`= ?,
            `ID_EMPRESA`= ?,
            `ID_PLANTA`= ?,
            `ID_TEMPORADA`= ?,
            `ID_BODEGA`= ?,
            `ID_FOLIO`= ? ,
            `ID_PRODUCTO`= ?  ,
            `ID_TCONTENEDOR`= ?  ,
            `ID_TUMEDIDA`= ?  ,
            `ID_RECEPCION`= ?  ,
            `ID_PLANTA2`= ?  ,
            `ID_PLANTA3`= ?  ,
            `ID_PROVEEDOR`= ?  ,
            `ID_PRODUCTOR`= ?       
		WHERE `ID_INVENTARIO`= ?;";
            $this->conexion->prepare($query)
            ->execute(
                    array(         
                        $INVENTARIOM->__GET('TRECEPCION') ,  
                        $INVENTARIOM->__GET('VALOR_UNITARIO') ,   
                        $INVENTARIOM->__GET('CANTIDAD_INVENTARIO') ,  
                        $INVENTARIOM->__GET('ID_EMPRESA') ,  
                        $INVENTARIOM->__GET('ID_PLANTA') ,  
                        $INVENTARIOM->__GET('ID_TEMPORADA') ,  
                        $INVENTARIOM->__GET('ID_BODEGA') ,     
                        $INVENTARIOM->__GET('ID_FOLIO') ,     
                        $INVENTARIOM->__GET('ID_PRODUCTO') ,     
                        $INVENTARIOM->__GET('ID_TCONTENEDOR') ,     
                        $INVENTARIOM->__GET('ID_TUMEDIDA') ,     
                        $INVENTARIOM->__GET('ID_RECEPCION') ,     
                        $INVENTARIOM->__GET('ID_PLANTA2') ,     
                        $INVENTARIOM->__GET('ID_PLANTA3') ,     
                        $INVENTARIOM->__GET('ID_PROVEEDOR') ,     
                        $INVENTARIOM->__GET('ID_PRODUCTOR')  ,      
                        $INVENTARIOM->__GET('ID_INVENTARIO')                    
                    )                
                );
            
        }catch(Exception $e){
            die($e->getMessage());
        }
        
    }
    
    
    //FUNCIONES ESPECIALIZADAS 

    //CAMBIO DE ESTADO 
    //CAMBIO A CERRADO
    public function eliminado(INVENTARIOM $INVENTARIOM){

        try{
            $query = "
    UPDATE `material_inventariom` SET			
            `MODIFICACION`= SYSDATE(),		
            `ESTADO` = 0
    WHERE `ID_INVENTARIO`= ?;";
            $this->conexion->prepare($query)
            ->execute(
                    array(                 
                        $INVENTARIOM->__GET('ID_INVENTARIO')                    
                    )                    
                );
            
        }catch(Exception $e){
            die($e->getMessage());
        }
        
    }
    public function eliminado2(INVENTARIOM $INVENTARIOM){

        try{
            $query = "
    UPDATE `material_inventariom` SET			
            `MODIFICACION`= SYSDATE(),		
            `ESTADO` = 0
    WHERE `FOLIO_INVENTARIO`= ?;";
            $this->conexion->prepare($query)
            ->execute(
                    array(                 
                        $INVENTARIOM->__GET('FOLIO_INVENTARIO')                    
                    )                    
                );
            
        }catch(Exception $e){
            die($e->getMessage());
        }
        
    }
    //CAMBIO A ABIERTO
    public function ingresando(INVENTARIOM $INVENTARIOM){
        try{
            $query = "
    UPDATE `material_inventariom` SET				
            `MODIFICACION`= SYSDATE(),	
            `ESTADO` = 1
    WHERE `ID_INVENTARIO`= ?;";
            $this->conexion->prepare($query)
            ->execute(
                    array(                 
                        $INVENTARIOM->__GET('ID_INVENTARIO')                    
                    )                
                );
            
        }catch(Exception $e){
            die($e->getMessage());
        }
        
    }

    public function disponible(INVENTARIOM $INVENTARIOM){
        try{
            $query = "
    UPDATE `material_inventariom` SET				
            `MODIFICACION`= SYSDATE(),	
            `ESTADO` = 2
    WHERE `ID_INVENTARIO`= ?;";
            $this->conexion->prepare($query)
            ->execute(
                    array(                 
                        $INVENTARIOM->__GET('ID_INVENTARIO')                    
                    )                
                );
            
        }catch(Exception $e){
            die($e->getMessage());
        }
        
    }
    //CAMBIO DE ESTADO DE REGISTRO DEL REGISTRO
    //CAMBIO A DESACTIVADO
    public function deshabilitar(INVENTARIOM $INVENTARIOM){

        try{
            $query = "
    UPDATE `material_inventariom` SET			
            `MODIFICACION`= SYSDATE(),		
            `ESTADO_REGISTRO` = 0
    WHERE `ID_INVENTARIO`= ?;";
            $this->conexion->prepare($query)
            ->execute(
                array(                 
                    $INVENTARIOM->__GET('ID_INVENTARIO')                    
                )
                
                );
            
        }catch(Exception $e){
            die($e->getMessage());
        }
        
    }
    public function deshabilitar2(INVENTARIOM $INVENTARIOM){

        try{
            $query = "
    UPDATE `material_inventariom` SET			
            `MODIFICACION`= SYSDATE(),		
            `ESTADO_REGISTRO` = 0
    WHERE `FOLIO_INVENTARIO`= ?;";
            $this->conexion->prepare($query)
            ->execute(
                array(                 
                    $INVENTARIOM->__GET('FOLIO_INVENTARIO')                    
                )
                
                );
            
        }catch(Exception $e){
            die($e->getMessage());
        }
        
    }
    //CAMBIO A ACTIVADO
    public function habilitar(INVENTARIOM $INVENTARIOM){
        try{
            $query = "
    UPDATE `material_inventariom` SET				
            `MODIFICACION`= SYSDATE(),	
            `ESTADO_REGISTRO` = 1
    WHERE `ID_INVENTARIO`= ?;";
            $this->conexion->prepare($query)
            ->execute(
                array(                 
                    $INVENTARIOM->__GET('ID_INVENTARIO')                    
                )
                
                );
            
        }catch(Exception $e){
            die($e->getMessage());
        }
        
    }




    //LISTAS



    public function listarInventariotCBX(){
        try{
            
            $datos=$this->conexion->prepare("SELECT * FROM `material_inventariom` ;	");
            $datos->execute();
            $resultado = $datos->fetchAll();
            
            //	print_r($resultado);
            //	VAR_DUMP($resultado);
            
            
            return $resultado;
        }catch(Exception $e){
            die($e->getMessage());
        }
        
    }
    public function listarInventariot2CBX(){
        try{
            
            $datos=$this->conexion->prepare("SELECT * ,
                                                DATE_FORMAT(INGRESO, '%d-%m-%Y %H:%i') AS 'INGRESOF',
                                                DATE_FORMAT(MODIFICACION, '%d-%m-%Y %H:%i') AS 'MODIFICACIONF',
                                                FORMAT(IFNULL(`CANTIDAD_INVENTARIO`,0),0,'de_DE') AS 'CANTIDAD', 
                                                FORMAT(IFNULL(`VALOR_UNITARIO`,0),0,'de_DE') AS 'VALOR'  
                                             FROM `material_inventariom` ;	");
            $datos->execute();
            $resultado = $datos->fetchAll();
            
            //	print_r($resultado);
            //	VAR_DUMP($resultado);
            
            
            return $resultado;
        }catch(Exception $e){
            die($e->getMessage());
        }
    }

    public function listarInventarioPorRecepcionCBX($IDINVENTARIO){
        try{
            
            $datos=$this->conexion->prepare("SELECT * 
                                            FROM `material_inventariom`
                                                WHERE ESTADO_REGISTRO = 1 
                                                AND ID_RECEPCION = '".$IDINVENTARIO."'  ;
                                        	");
            $datos->execute();
            $resultado = $datos->fetchAll();
            
            //	print_r($resultado);
            //	VAR_DUMP($resultado);
            
            
            return $resultado;
        }catch(Exception $e){
            die($e->getMessage());
        }
        
    }
    public function listarInventarioPorRecepcion2CBX($IDINVENTARIO){
        try{
            
            $datos=$this->conexion->prepare("SELECT * ,
                                                DATE_FORMAT(INGRESO, '%d-%m-%Y %H:%i') AS 'INGRESOF',
                                                DATE_FORMAT(MODIFICACION, '%d-%m-%Y %H:%i') AS 'MODIFICACIONF',
                                                FORMAT(IFNULL(`CANTIDAD_INVENTARIO`,0),0,'de_DE') AS 'CANTIDAD', 
                                                FORMAT(IFNULL(`VALOR_UNITARIO`,0),0,'de_DE') AS 'VALOR' 
                                             FROM `material_inventariom`
                                                WHERE ESTADO_REGISTRO = 1 
                                                AND ID_RECEPCION = '".$IDINVENTARIO."'  ;	");
            $datos->execute();
            $resultado = $datos->fetchAll();
            
            //	print_r($resultado);
            //	VAR_DUMP($resultado);
            
            
            return $resultado;
        }catch(Exception $e){
            die($e->getMessage());
        }
        
    }



    

    public function listarInventarioPorEmpresaPlantaTemporadaCBX($IDEMPRESA,$IDPLANTA,$IDTEMPORADA){
        try{
            
            $datos=$this->conexion->prepare("SELECT 
                                                * 
                                            FROM `material_inventariom`
                                                WHERE ESTADO_REGISTRO = 1 
                                                AND ESTADO = 2
                                                AND ID_EMPRESA = '".$IDEMPRESA."' 
                                                AND ID_PLANTA = '".$IDPLANTA."'
                                                AND ID_TEMPORADA = '".$IDTEMPORADA."'  ;	");
            $datos->execute();
            $resultado = $datos->fetchAll();
            
            //	print_r($resultado);
            //	VAR_DUMP($resultado);
            
            
            return $resultado;
        }catch(Exception $e){
            die($e->getMessage());
        }
        
    }
    public function listarInventarioPorEmpresaPlantaTemporada2CBX($IDEMPRESA,$IDPLANTA,$IDTEMPORADA){
        try{
            
            $datos=$this->conexion->prepare("SELECT * ,
                                                DATE_FORMAT(INGRESO, '%d-%m-%Y %H:%i') AS 'INGRESOF',
                                                DATE_FORMAT(MODIFICACION, '%d-%m-%Y %H:%i') AS 'MODIFICACIONF',
                                                FORMAT(IFNULL(`CANTIDAD_INVENTARIO`,0),0,'de_DE') AS 'CANTIDAD', 
                                                FORMAT(IFNULL(`VALOR_UNITARIO`,0),0,'de_DE') AS 'VALOR'   
                                             FROM `material_inventariom`
                                                WHERE ESTADO_REGISTRO = 1 
                                                AND ESTADO = 2
                                                AND ID_EMPRESA = '".$IDEMPRESA."' 
                                                AND ID_PLANTA = '".$IDPLANTA."'
                                                AND ID_TEMPORADA = '".$IDTEMPORADA."'  ;	");
            $datos->execute();
            $resultado = $datos->fetchAll();
            
            //	print_r($resultado);
            //	VAR_DUMP($resultado);
            
            
            return $resultado;
        }catch(Exception $e){
            die($e->getMessage());
        }
        
    }
    //TOTALES

    public function obtenerTotalesInventariotCBX(){
        try{
            
            $datos=$this->conexion->prepare("SELECT * 
                                                IFNULL(SUM(`CANTIDAD_INVENTARIO`),0) AS 'CANTIDAD'
                                            FROM `material_inventariom`  ;	");
            $datos->execute();
            $resultado = $datos->fetchAll();
            
            //	print_r($resultado);
            //	VAR_DUMP($resultado);
            
            
            return $resultado;
        }catch(Exception $e){
            die($e->getMessage());
        }
        
    }
    public function obtenerTotalesInventariot2CBX(){
        try{
            
            $datos=$this->conexion->prepare("SELECT 
                                                FORMAT(IFNULL(SUM(`CANTIDAD_INVENTARIO`),0),0,'de_DE') AS 'CANTIDAD'
                                             FROM `material_inventariom` ;	");
            $datos->execute();
            $resultado = $datos->fetchAll();
            
            //	print_r($resultado);
            //	VAR_DUMP($resultado);
            
            
            return $resultado;
        }catch(Exception $e){
            die($e->getMessage());
        }
        
    }

    public function obtenerTotalesInventarioPorRecepcionCBX($IDINVENTARIO){
        try{
            
            $datos=$this->conexion->prepare("SELECT 
                                                IFNULL(SUM(`CANTIDAD_INVENTARIO`),0) AS 'CANTIDAD'
                                            FROM `material_inventariom`
                                                WHERE ESTADO_REGISTRO = 1 
                                                AND ID_RECEPCION = '".$IDINVENTARIO."'  ;	");
            $datos->execute();
            $resultado = $datos->fetchAll();
            
            //	print_r($resultado);
            //	VAR_DUMP($resultado);
            
            
            return $resultado;
        }catch(Exception $e){
            die($e->getMessage());
        }
        
    }
    public function obtenerTotalesInventarioPorRecepcion2CBX($IDINVENTARIO){
        try{
            
            $datos=$this->conexion->prepare("SELECT 
                                                FORMAT(IFNULL(SUM(`CANTIDAD_INVENTARIO`),0),0,'de_DE') AS 'CANTIDAD'
                                             FROM `material_inventariom`
                                                WHERE ESTADO_REGISTRO = 1 
                                                AND ID_RECEPCION = '".$IDINVENTARIO."'  ;	");
            $datos->execute();
            $resultado = $datos->fetchAll();
            
            //	print_r($resultado);
            //	VAR_DUMP($resultado);
            
            
            return $resultado;
        }catch(Exception $e){
            die($e->getMessage());
        }
        
    }


    public function obtenerTotalesInventarioPorEmpresaPlantaTemporadaCBX($IDEMPRESA,$IDPLANTA,$IDTEMPORADA){
        try{
            
            $datos=$this->conexion->prepare("SELECT * 
                                                IFNULL(SUM(`CANTIDAD_INVENTARIO`),0) AS 'CANTIDAD'
                                            FROM `material_inventariom`
                                                WHERE ESTADO_REGISTRO = 1 
                                                AND ESTADO = 2
                                                AND ID_EMPRESA = '".$IDEMPRESA."' 
                                                AND ID_PLANTA = '".$IDPLANTA."'
                                                AND ID_TEMPORADA = '".$IDTEMPORADA."'  ;	");
            $datos->execute();
            $resultado = $datos->fetchAll();
            
            //	print_r($resultado);
            //	VAR_DUMP($resultado);
            
            
            return $resultado;
        }catch(Exception $e){
            die($e->getMessage());
        }
        
    }
    public function obtenerTotalesInventarioPorEmpresaPlantaTemporada2CBX($IDEMPRESA,$IDPLANTA,$IDTEMPORADA){
        try{
            
            $datos=$this->conexion->prepare("SELECT 
                                                FORMAT(IFNULL(SUM(`CANTIDAD_INVENTARIO`),0),0,'de_DE') AS 'CANTIDAD'
                                             FROM `material_inventariom`
                                                WHERE ESTADO_REGISTRO = 1 
                                                AND ESTADO = 2
                                                AND ID_EMPRESA = '".$IDEMPRESA."' 
                                                AND ID_PLANTA = '".$IDPLANTA."'
                                                AND ID_TEMPORADA = '".$IDTEMPORADA."'  ;	");
            $datos->execute();
            $resultado = $datos->fetchAll();
            
            //	print_r($resultado);
            //	VAR_DUMP($resultado);
            
            
            return $resultado;
        }catch(Exception $e){
            die($e->getMessage());
        }
        
    }

    
    public function obtenerFolio($IDFOLIO)
    {
        try {
            $datos = $this->conexion->prepare("SELECT 
                                                IFNULL(COUNT(FOLIO_INVENTARIO),0) AS 'ULTIMOFOLIO',
                                                IFNULL(MAX(FOLIO_INVENTARIO),0) AS 'ULTIMOFOLIO2' 
                                            FROM `material_inventariom` 
                                                 WHERE  `ID_FOLIO` = '" . $IDFOLIO . "' 
                                            AND ESTADO_REGISTRO = 1
                                            AND ESTADO !=0
                                            GROUP BY FOLIO_INVENTARIO
                                            ORDER BY `ULTIMOFOLIO2` DESC
                                            ");
            $datos->execute();
            $resultado = $datos->fetchAll();

            //	print_r($resultado);
            //	var_dump($resultado);


            return $resultado;
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
    public function buscarPorRecepcion($IDRECEPCION)
    {
        try {

            $datos = $this->conexion->prepare(" SELECT 
                                                    * 
                                                FROM `material_inventariom` 
                                                    WHERE `ID_RECEPCION`= '" . $IDRECEPCION . "' 
                                                    AND ESTADO_REGISTRO = 1
                                                    ;");
            $datos->execute();
            $resultado = $datos->fetchAll();

            //	print_r($resultado);
            //	var_dump($resultado);


            return $resultado;
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
    public function buscarPorRecepcionFolio($IDRECEPCION, $FOLIOINVENTARIO)
    {
        try {

            $datos = $this->conexion->prepare(" SELECT 
                                                    * 
                                                FROM `material_inventariom` 
                                                    WHERE `ID_RECEPCION`= '" . $IDRECEPCION . "' 
                                                    AND `FOLIO_INVENTARIO` = '" . $FOLIOINVENTARIO . "'
                                                    AND ESTADO_REGISTRO = 1;");
            $datos->execute();
            $resultado = $datos->fetchAll();

            //	print_r($resultado);
            //	var_dump($resultado);


            return $resultado;
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

}
?>