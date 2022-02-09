<?php
//LLAMADA DE LOS ARCHIVOS NECESAROP PARA LA OPERACION DEL CONTROLADOR
//LLAMADA AL MODELO DE CLASE
include_once '../../assest/modelo/AUSUARIO.php';
//LLAMADA AL CONFIGURACION DE LA BASE DE DATOS
include_once '../../assest/config/BDCONFIG.php';


//INICIALIZAR VARIABLES
$HOST="";
$DBNAME="";
$USER="";
$PASS="";

//ESTRUCTURA DEL CONTROLADOR
class AUSUARIO_ADO {
    
    
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
    public function listarAusuario(){
        try{
            
            $datos=$this->conexion->prepare("SELECT * FROM  usuario_ausuario  limit 8;	");
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
    public function listarAusuarioCBX(){
        try{
            
            $datos=$this->conexion->prepare("SELECT * FROM  usuario_ausuario  ;	");
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
    public function verAusuario($ID){
        try{
            
            $datos=$this->conexion->prepare("SELECT * FROM  usuario_ausuario  WHERE  ID_AUSUARIO = '".$ID."';");
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

    public function agregarAusuario(AUSUARIO $AUSUARIO){
        try{
            
            if ($AUSUARIO->__GET('ID_EMPRESA') == NULL) {
                $AUSUARIO->__SET('ID_EMPRESA', NULL);
            }
            if ($AUSUARIO->__GET('ID_PLANTA') == NULL) {
                $AUSUARIO->__SET('ID_PLANTA', NULL);
            }
            if ($AUSUARIO->__GET('ID_TEMPORADA') == NULL) {
                $AUSUARIO->__SET('ID_TEMPORADA', NULL);
            }


            
            $query=
            "INSERT INTO  usuario_ausuario  (   
                                                NUMERO_REGISTRO , 
                                                TMODULO ,
                                                TOPERACION ,

                                                TABLA ,
                                                ID_REGISTRO ,
                                                
                                                ID_USUARIO ,
                                                ID_EMPRESA ,
                                                ID_PLANTA ,
                                                ID_TEMPORADA ,

                                                INGRESO 
                                            ) VALUES
	       	( ?, ?, ?,   ?, ?,   ?, ?, ?, ?, SYSDATE() );";
            $this->conexion->prepare($query)
            ->execute(
                array(                    
                    $AUSUARIO->__GET('NUMERO_REGISTRO')  ,
                    $AUSUARIO->__GET('TMODULO') ,
                    $AUSUARIO->__GET('TOPERACION') ,

                    $AUSUARIO->__GET('TABLA') ,
                    $AUSUARIO->__GET('ID_REGISTRO') ,

                    $AUSUARIO->__GET('ID_USUARIO')  ,
                    $AUSUARIO->__GET('ID_EMPRESA') ,
                    $AUSUARIO->__GET('ID_PLANTA') ,
                    $AUSUARIO->__GET('ID_TEMPORADA')              
                )
                
                );
            
        }catch(Exception $e){
            die($e->getMessage());
        }
    } 

    public function agregarAusuario2($NUMERO,$TMODULO,$TOPERACION,$TABLA, $IDREGISTRO, $USUARIO,$EMPRESA,$PLANTA,$TEMPORADA){
        try{                   
            $query=
                                            "INSERT INTO  usuario_ausuario  
                                            (   
                                                NUMERO_REGISTRO , 
                                                TMODULO ,
                                                TOPERACION ,

                                                TABLA ,
                                                ID_REGISTRO ,
                                                
                                                ID_USUARIO ,
                                                ID_EMPRESA ,
                                                ID_PLANTA ,
                                                ID_TEMPORADA ,

                                                INGRESO 
                                            ) VALUES
                                            ( 
                                                '".$NUMERO."',
                                                '".$TMODULO."', 
                                                '".$TOPERACION."',  

                                                '".$TABLA."', 
                                                '".$IDREGISTRO."',

                                                '".$USUARIO."', 
                                                '".$EMPRESA."', 
                                                '".$PLANTA."', 
                                                '".$TEMPORADA."', 
                                                
                                                SYSDATE()
                                            );";
            $this->conexion->prepare($query)
            ->execute( );
            
        }catch(Exception $e){
            die($e->getMessage());
        }
    } 
    //FUNCIONES ESPECIALIZADAS 
    //BUSCADE DE LA EMPRESAS ASOACIADAS A USUARIOS

    //VER LA INFORMACION RELACIONADA EN BASE AL ID INGRESADO A LA FUNCION
    public function buscarAusuarioPorNombreUsuario($NOMBREUSUARIO){
        try{
            
            $datos=$this->conexion->prepare("SELECT * 
                                             FROM  usuario_ausuario 
                                             WHERE  ID_USUARIO = '".$NOMBREUSUARIO."';");
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
    public function buscarAusuarioPorNombreUsuarioUltimasCinco($NOMBREUSUARIO){
        try{
            
            $datos=$this->conexion->prepare("SELECT * 
                                            FROM  usuario_ausuario  
                                            WHERE  ID_USUARIO = '".$NOMBREUSUARIO."' 
                                            ORDER BY  FECHA_AUSUARIO  DESC LIMIT 5 ; ");
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
}
?>