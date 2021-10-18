<?php
//LLAMADA DE LOS ARCHIVOS NECESAROP PARA LA OPERACION DEL CONTROLADOR
//LLAMADA AL MODELO DE CLASE
include_once '../modelo/DRECEPCIONIND.php';
include_once '../config/BDCONFIG.php';

//INICIALIZAR VARIABLES
$HOST = "";
$DBNAME = "";
$USER = "";
$PASS = "";

//ESTRUCTURA DEL CONTROLADOR
class DRECEPCIONIND_ADO
{


    //ATRIBUTO
    private $conexion;

    //LLAMADO A LA BD Y CONFIGURAR PARAMETROS
    public function __CONSTRUCT()
    {
        try {
            $BDCONFIG = new BDCONFIG();
            $HOST = $BDCONFIG->__GET('HOST');
            $DBNAME = $BDCONFIG->__GET('DBNAME');
            $USER = $BDCONFIG->__GET('USER');
            $PASS = $BDCONFIG->__GET('PASS');


            $this->conexion = new PDO('mysql:host=' . $HOST . ';dbname=' . $DBNAME, $USER, $PASS);
            $this->conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }



    //FUNCIONES BASICAS 
    //LISTAR TODO CON LIMITE DE 6 FILAS   
    public function listarDrecepcion()
    {
        try {

            $datos = $this->conexion->prepare("SELECT * FROM fruta_drecepcionind limit 6;	");
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
    //LISTAR TODO
    public function listarDrecepcionCBX()
    {
        try {

            $datos = $this->conexion->prepare("SELECT * FROM fruta_drecepcionind ;	");
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
    //LISTAR DETTALLE DE RECEPCION POR ID DE RECEPCION
    public function listarDrecepcionPorRecepcion($IDRECEPCION)
    {
        try {

            $datos = $this->conexion->prepare("SELECT * FROM fruta_drecepcionind WHERE ID_RECEPCION= '" . $IDRECEPCION . "' AND ESTADO_REGISTRO = 1;	");
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
    //VER DATOS DE DETALLE DE RECEPCION
    public function verDrecepcion($IDDRECEPCION)
    {
        try {

            $datos = $this->conexion->prepare("SELECT * FROM fruta_drecepcionind WHERE ID_DRECEPCION = " . $IDDRECEPCION . "  ;");
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




    //REGISTRO DE UNA NUEVA FILA      
    public function agregarDrecepcion(DRECEPCIONIND $DRECEPCIONIND)
    {
        try {      
            $query =
                "INSERT INTO fruta_drecepcionind 
                                            (
                                                FOLIO_DRECEPCION, 
                                                FECHA_EMBALADO_DRECEPCION, 
                                                KILOS_NETO_DRECEPCION, 
                                                ID_TMANEJO,
                                                ID_FOLIO,    
                                                ID_ESTANDAR, 
                                                ID_PRODUCTOR, 
                                                ID_VESPECIES, 
                                                ID_RECEPCION,  
                                                INGRESO,
                                                MODIFICACION,
                                                ESTADO,
                                                ESTADO_REGISTRO
                                            ) 
             VALUES
               (?, ?, ?, ?, ?,    ?, ?, ?, ?,  SYSDATE(), SYSDATE(), 1, 1);";

            $this->conexion->prepare($query)
                ->execute(
                    array(
                        $DRECEPCIONIND->__GET('FOLIO_DRECEPCION'),
                        $DRECEPCIONIND->__GET('FECHA_EMBALADO_DRECEPCION'),
                        $DRECEPCIONIND->__GET('KILOS_NETO_DRECEPCION'),
                        $DRECEPCIONIND->__GET('ID_TMANEJO'),
                        $DRECEPCIONIND->__GET('ID_FOLIO'),                        
                        $DRECEPCIONIND->__GET('ID_ESTANDAR'),
                        $DRECEPCIONIND->__GET('ID_PRODUCTOR'),
                        $DRECEPCIONIND->__GET('ID_VESPECIES'),
                        $DRECEPCIONIND->__GET('ID_RECEPCION')
                    )

                );
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    //ELIMINAR FILA, NO SE UTILIZA
    public function eliminarDrecepcion($id)
    {
        try {
            $sql = "DELETE FROM fruta_drecepcionind WHERE ID_DRECEPCION=" . $id . ";";
            $statement = $this->conexion->prepare($sql);
            $statement->execute();
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    //ACTUALIZAR FILA
    public function actualizarDrecepcion(DRECEPCIONIND $DRECEPCIONIND)
    {
        try {
            $query = "
                        UPDATE fruta_drecepcionind SET                             
                                MODIFICACION = SYSDATE(), 
                                FECHA_EMBALADO_DRECEPCION  = ?,
                                KILOS_NETO_DRECEPCION  = ?  ,
                                ID_TMANEJO = ? ,
                                ID_ESTANDAR = ?,   
                                ID_PRODUCTOR = ?,  
                                ID_VESPECIES = ?,     
                                ID_RECEPCION = ?
                        WHERE  ID_DRECEPCION= ?";
            $this->conexion->prepare($query)
                ->execute(
                    array(
                        $DRECEPCIONIND->__GET('FECHA_EMBALADO_DRECEPCION'),
                        $DRECEPCIONIND->__GET('KILOS_NETO_DRECEPCION'),
                        $DRECEPCIONIND->__GET('ID_TMANEJO'),                        
                        $DRECEPCIONIND->__GET('ID_ESTANDAR'),
                        $DRECEPCIONIND->__GET('ID_PRODUCTOR'),
                        $DRECEPCIONIND->__GET('ID_VESPECIES'),
                        $DRECEPCIONIND->__GET('ID_RECEPCION'),
                        $DRECEPCIONIND->__GET('ID_DRECEPCION')

                    )

                );
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    //FUNCIONES ESPECIALIZADAS




    //BUSCAR
    public function buscarPorRecepcion($IDRECEPCION)
    {
        try {

            $datos = $this->conexion->prepare("SELECT * ,
                                                        DATE_FORMAT(FECHA_EMBALADO_DRECEPCION, '%d-%m-%Y') AS 'EMBALADO',
                                                        IFNULL(KILOS_NETO_DRECEPCION,0) AS 'NETO'
                                            FROM fruta_drecepcionind 
                                            WHERE ID_RECEPCION = '" . $IDRECEPCION . "' 
                                            AND ESTADO_REGISTRO = 1 ;");
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
    public function buscarPorRecepcion2($IDRECEPCION)
    {
        try {

            $datos = $this->conexion->prepare("SELECT * , 
                                                        DATE_FORMAT(FECHA_EMBALADO_DRECEPCION, '%d-%m-%Y') AS 'EMBALADO',
                                                        FORMAT(IFNULL(KILOS_NETO_DRECEPCION,0),2,'de_DE') AS 'NETO'
                                             FROM fruta_drecepcionind
                                             WHERE ID_RECEPCION = '" . $IDRECEPCION . "' 
                                             AND ESTADO_REGISTRO = 1 ;");
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
    public function buscarPorRecepcionaAgrupadoVariedad2($IDRECEPCION)
    {
        try {

            $datos = $this->conexion->prepare("SELECT * ,   
                                                        DATE_FORMAT(FECHA_EMBALADO_DRECEPCION, '%d-%m-%Y') AS 'EMBALADO',
                                                        FORMAT(IFNULL(KILOS_NETO_DRECEPCION,0),2,'de_DE') AS 'NETO'
                                             FROM fruta_drecepcionind
                                             WHERE ID_RECEPCION = '" . $IDRECEPCION . "' 
                                             AND ESTADO_REGISTRO = 1                                              
                                             GROUP  BY ID_VESPECIES; ;");
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
    public function buscarPorIdRecepcionPorVespecies2($IDRECEPCION, $IDVESPECIES){
        try{
            
            $datos=$this->conexion->prepare("SELECT *,
                                                FORMAT(KILOS_NETO_DRECEPCION, 2,'de_DE') AS 'NETO'
                                            FROM fruta_drecepcionind
                                            WHERE  ID_RECEPCION = '".$IDRECEPCION."'
                                                AND  ID_VESPECIES = '".$IDVESPECIES."'
                                                AND ESTADO_REGISTRO = '1'");
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


    
    public function obtenerTotalPorRecepcionVariedad2($IDRECEPCION){
        try{
            
            $datos=$this->conexion->prepare("SELECT 
                                                FORMAT(IFNULL(SUM(KILOS_NETO_DRECEPCION),0),2,'de_DE') AS 'NETO'
                                            FROM fruta_drecepcionind
                                            WHERE ID_RECEPCION = '".$IDRECEPCION."'
                                                  AND ESTADO_REGISTRO = '1'
                                            GROUP BY ID_VESPECIES;
                                            ");
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


    public function buscarPorRecepcionFolio($IDRECEPCION, $FOLIODRECEPCION)
    {
        try {

            $datos = $this->conexion->prepare("SELECT * FROM fruta_drecepcionind WHERE ID_RECEPCION = '" . $IDRECEPCION . "' AND FOLIO_DRECEPCION='" . $FOLIODRECEPCION . "' ");
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

    public function buscarPorRecepcionFolio2($FOLIODRECEPCION)
    {
        try {

            $datos = $this->conexion->prepare("SELECT * , DATE_FORMAT(FECHA_EMBALADO_DRECEPCION, '%d-%m-%Y') AS 'EMBALADO',
                                                        FORMAT(IFNULL(KILOS_NETO_DRECEPCION,0),2,'de_DE') AS 'NETO'
                                             FROM fruta_drecepcionind
                                             WHERE FOLIO_DRECEPCION = '" . $FOLIODRECEPCION . "' 
                                             AND ESTADO_REGISTRO = 1 ;");
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

    //TOTALES
    //OBTENER LOS TOTALES DEL CONSOLIDAD DEL DETALLE DE RECEPCION ASOCIADO A UNA RECEPCION
    public function obtenerTotales($IDRECEPCION)
    {
        try {

            $datos = $this->conexion->prepare("SELECT 
                                                  IFNULL(SUM(KILOS_NETO_DRECEPCION),0) AS 'NETO'
                                           FROM fruta_drecepcionind 
                                           WHERE ID_RECEPCION = '" . $IDRECEPCION . "' 
                                           AND ESTADO_REGISTRO = 1;");
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
    public function obtenerTotales2($IDRECEPCION)
    {
        try {

            $datos = $this->conexion->prepare("SELECT 
                                                  FORMAT(IFNULL(SUM(KILOS_NETO_DRECEPCION),0),2,'de_DE') AS 'NETO'  
                                           FROM fruta_drecepcionind
                                            WHERE ID_RECEPCION = '" . $IDRECEPCION . "' 
                                            AND ESTADO_REGISTRO = 1;");
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

    //CAMBIO DE ESTADO DE REGISTRO DEL REGISTRO
    //CAMBIO A DESACTIVADO
    public function deshabilitar(DRECEPCIONIND $DRECEPCIONIND)
    {

        try {
            $query = "
                UPDATE fruta_drecepcionind SET		
                        MODIFICACION = SYSDATE(), 	
                        ESTADO_REGISTRO = 0
                WHERE ID_DRECEPCION= ?;";
            $this->conexion->prepare($query)
                ->execute(
                    array(
                        $DRECEPCIONIND->__GET('ID_DRECEPCION')
                    )

                );
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
    //CAMBIO A ACTIVADO
    public function habilitar(DRECEPCIONIND $DRECEPCIONIND)
    {
        try {
            $query = "
                        UPDATE fruta_drecepcionind SET		
                                MODIFICACION = SYSDATE(), 	
                                ESTADO_REGISTRO = 1
                        WHERE ID_DRECEPCION= ?;";
            $this->conexion->prepare($query)
                ->execute(
                    array(
                        $DRECEPCIONIND->__GET('ID_DRECEPCION')
                    )

                );
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
    //CAMBIO ESTADO
    //ABIERTO 1
    public function abierto(DRECEPCIONIND $DRECEPCIONIND)
    {
        try {
            $query = "
                            UPDATE fruta_drecepcionind SET	
                                    MODIFICACION = SYSDATE(), 		
                                    ESTADO = 1
                            WHERE ID_DRECEPCION= ?;";
            $this->conexion->prepare($query)
                ->execute(
                    array(
                        $DRECEPCIONIND->__GET('ID_DRECEPCION')
                    )
                );
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
    //CERRADO 0
    public function  cerrado(DRECEPCIONIND $DRECEPCIONIND)
    {
        try {
            $query = "
                            UPDATE fruta_drecepcionind SET	
                                    MODIFICACION = SYSDATE(), 		
                                    ESTADO = 0
                            WHERE ID_DRECEPCION= ?;";
            $this->conexion->prepare($query)
                ->execute(
                    array(
                        $DRECEPCIONIND->__GET('ID_DRECEPCION')
                    )
                );
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }


    //OTRAS FUNCIONES
    //BUSCAR FECHA ACTUAL DEL SISTEMA
    public function obtenerFecha()
    {
        try {

            $datos = $this->conexion->prepare("SELECT CURDATE() AS 'FECHA';");
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

    //OBTENER EL ULTIMO FOLIO OCUPADO DEL DETALLE DE  RECEPCIONS
    public function obtenerFolio($IDFOLIO)
    {
        try {

            $datos = $this->conexion->prepare("SELECT 
                                                        IFNULL(COUNT(FOLIO_DRECEPCION),0) AS 'ULTIMOFOLIO',
                                                        IFNULL(MAX(FOLIO_DRECEPCION),0) AS 'ULTIMOFOLIO2' 
                                                FROM fruta_drecepcionind  
                                                WHERE  ID_FOLIO= '" . $IDFOLIO . "';");
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
