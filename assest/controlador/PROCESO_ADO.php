<?php

//LLAMADA DE LOS ARCHIVOS NECESAROP PARA LA OPERACION DEL CONTROLADOR
//LLAMADA AL MODELO DE CLASE
include_once '../../assest/modelo/PROCESO.php';
//LLAMADA AL CONFIGURACION DE LA BASE DE DATOS
include_once '../../assest/config/BDCONFIG.php';

//INICIALIZAR VARIABLES
$HOST = "";
$DBNAME = "";
$USER = "";
$PASS = "";

//ESTRUCTURA DEL CONTROLADOR
class PROCESO_ADO
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
    //LISTAR TODO CON LIMITE DE 8 FILAS
    public function listarProceso()
    {
        try {

            $datos = $this->conexion->prepare("SELECT * FROM fruta_proceso LIMIT 6;	");
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
    public function listarProcesoCBX()
    {
        try {

            $datos = $this->conexion->prepare("SELECT * FROM fruta_proceso ;	");
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


    //VER LA INFORMACION RELACIONADA EN BASE AL ID INGRESADO A LA FUNCION
    public function verProceso($ID)
    {
        try {

            $datos = $this->conexion->prepare(" SELECT *,
                                                    DATE_FORMAT(INGRESO, '%Y-%m-%d') AS 'INGRESO',
                                                    DATE_FORMAT(MODIFICACION, '%Y-%m-%d') AS 'MODIFICACION' 
                                                    FROM fruta_proceso 
                                                    WHERE ID_PROCESO= '" . $ID . "';");
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
    public function verProceso2($IDPROCESO)
    {
        try {

            $datos = $this->conexion->prepare("SELECT *,  
                                                DATE_FORMAT(FECHA_PROCESO, '%d-%m-%Y') AS 'FECHA', 
                                                DATE_FORMAT(INGRESO, '%d-%m-%Y') AS 'INGRESO', 
                                                DATE_FORMAT(MODIFICACION, '%d-%m-%Y') AS 'MODIFICACION'
                                             FROM fruta_proceso WHERE ID_PROCESO = '" . $IDPROCESO . "';");
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
    public function agregarProceso(PROCESO $PROCESO)
    {
        try {


            $query =
                "INSERT INTO fruta_proceso ( 
                                                NUMERO_PROCESO,
                                                FECHA_PROCESO, 
                                                TURNO,
                                                OBSERVACIONE_PROCESO,
                                                ID_VESPECIES, 
                                                ID_PRODUCTOR, 
                                                ID_TPROCESO,
                                                ID_EMPRESA,
                                                ID_PLANTA,
                                                ID_TEMPORADA, 
                                                ID_USUARIOI, 
                                                ID_USUARIOM, 
                                                KILOS_NETO_ENTRADA, 
                                                KILOS_NETO_PROCESO,                                           
                                                KILOS_INDUSTRIAL_PROCESO,                                               
                                                KILOS_INDUSTRIALSC_PROCESO,                                               
                                                KILOS_INDUSTRIALNC_PROCESO,
                                                KILOS_EXPORTACION_PROCESO,       
                                                PDEXPORTACION_PROCESO, 
                                                PDEXPORTACIONCD_PROCESO, 
                                                PDINDUSTRIAL_PROCESO, 
                                                PDINDUSTRIALSC_PROCESO, 
                                                PDINDUSTRIALNC_PROCESO, 
                                                PORCENTAJE_PROCESO,
                                                INGRESO, 
                                                MODIFICACION,  
                                                ESTADO,  
                                                ESTADO_REGISTRO
                                            ) VALUES
	       	(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, SYSDATE(),  SYSDATE(), 1, 1 );";
            $this->conexion->prepare($query)
                ->execute(
                    array(

                        $PROCESO->__GET('NUMERO_PROCESO'),
                        $PROCESO->__GET('FECHA_PROCESO'),
                        $PROCESO->__GET('TURNO'),
                        $PROCESO->__GET('OBSERVACIONE_PROCESO'),
                        $PROCESO->__GET('ID_VESPECIES'),
                        $PROCESO->__GET('ID_PRODUCTOR'),
                        $PROCESO->__GET('ID_TPROCESO'),
                        $PROCESO->__GET('ID_EMPRESA'),
                        $PROCESO->__GET('ID_PLANTA'),
                        $PROCESO->__GET('ID_TEMPORADA'),
                        $PROCESO->__GET('ID_USUARIOI'),
                        $PROCESO->__GET('ID_USUARIOM')
                    )

                );
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    //ACTUALIZAR INFORMACION DE LA FILA
    public function actualizarProceso(PROCESO $PROCESO)
    {

        try {
            $query = "
		UPDATE fruta_proceso SET
            MODIFICACION = SYSDATE(), 

            FECHA_PROCESO=?,
            TURNO =?,
            OBSERVACIONE_PROCESO =?,

            KILOS_NETO_ENTRADA =?,
            KILOS_NETO_PROCESO =?,
            KILOS_INDUSTRIAL_PROCESO =?,    
            KILOS_INDUSTRIALSC_PROCESO =?,   
            KILOS_INDUSTRIALNC_PROCESO =?,   
            KILOS_EXPORTACION_PROCESO =?,           

            PDEXPORTACION_PROCESO =?, 
            PDEXPORTACIONCD_PROCESO =?, 
            PDINDUSTRIAL_PROCESO =?, 
            PDINDUSTRIALSC_PROCESO =?, 
            PDINDUSTRIALNC_PROCESO =?, 
            PORCENTAJE_PROCESO =?, 

            ID_VESPECIES =?,
            ID_PRODUCTOR =?,
            ID_TPROCESO =?,
            ID_EMPRESA =?, 
            ID_PLANTA =?, 
            ID_TEMPORADA =?, 
            ID_USUARIOM =?

		WHERE ID_PROCESO= ?;";
            $this->conexion->prepare($query)
                ->execute(
                    array(

                        $PROCESO->__GET('FECHA_PROCESO'),
                        $PROCESO->__GET('TURNO'),
                        $PROCESO->__GET('OBSERVACIONE_PROCESO'),

                        $PROCESO->__GET('KILOS_NETO_ENTRADA'),
                        $PROCESO->__GET('KILOS_NETO_PROCESO'),
                        $PROCESO->__GET('KILOS_INDUSTRIAL_PROCESO'),
                        $PROCESO->__GET('KILOS_INDUSTRIALSC_PROCESO'),
                        $PROCESO->__GET('KILOS_INDUSTRIALNC_PROCESO'),
                        $PROCESO->__GET('KILOS_EXPORTACION_PROCESO'),

                        $PROCESO->__GET('PDEXPORTACION_PROCESO'),
                        $PROCESO->__GET('PDEXPORTACIONCD_PROCESO'),
                        $PROCESO->__GET('PDINDUSTRIAL_PROCESO'),
                        $PROCESO->__GET('PDINDUSTRIALSC_PROCESO'),
                        $PROCESO->__GET('PDINDUSTRIALNC_PROCESO'),
                        $PROCESO->__GET('PORCENTAJE_PROCESO'),

                        $PROCESO->__GET('ID_VESPECIES'),
                        $PROCESO->__GET('ID_PRODUCTOR'),
                        $PROCESO->__GET('ID_TPROCESO'),
                        $PROCESO->__GET('ID_EMPRESA'),
                        $PROCESO->__GET('ID_PLANTA'),
                        $PROCESO->__GET('ID_TEMPORADA'),
                        $PROCESO->__GET('ID_USUARIOM'),

                        $PROCESO->__GET('ID_PROCESO')

                    )

                );
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }


    //ELIMINAR FILA, NO SE UTILIZA
    public function eliminarProceso($id)
    {
        try {
            $sql = "DELETE FROM fruta_proceso WHERE ID_PROCESO=" . $id . ";";
            $statement = $this->conexion->prepare($sql);
            $statement->execute();
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
    //FUNCIONES ESPECIALIZADAS
    //CAMBIO DE ESTADO DE REGISTRO DEL REGISTRO
    //CAMBIO A DESACTIVADO
    public function deshabilitar(PROCESO $PROCESO)
    {

        try {
            $query = "
                UPDATE fruta_proceso SET			
                        ESTADO_REGISTRO = 0
                WHERE ID_PROCESO= ?;";
            $this->conexion->prepare($query)
                ->execute(
                    array(
                        $PROCESO->__GET('ID_PROCESO')
                    )

                );
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
    //CAMBIO A ACTIVADO
    public function habilitar(PROCESO $PROCESO)
    {
        try {
            $query = "
                UPDATE fruta_proceso SET			
                        ESTADO_REGISTRO = 1
                WHERE ID_PROCESO= ?;";
            $this->conexion->prepare($query)
                ->execute(
                    array(
                        $PROCESO->__GET('ID_PROCESO')
                    )

                );
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    //CAMBIO ESTADO
    //ABIERTO 1
    public function abierto(PROCESO $PROCESO)
    {
        try {
            $query = "
                    UPDATE fruta_proceso SET			
                            ESTADO = 1
                    WHERE ID_PROCESO= ?;";
            $this->conexion->prepare($query)
                ->execute(
                    array(
                        $PROCESO->__GET('ID_PROCESO')
                    )
                );
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
    //CERRADO 0
    public function  cerrado(PROCESO $PROCESO)
    {
        try {
            $query = "
                    UPDATE fruta_proceso SET			
                            ESTADO = 0
                    WHERE ID_PROCESO= ?;";
            $this->conexion->prepare($query)
                ->execute(
                    array(
                        $PROCESO->__GET('ID_PROCESO')
                    )
                );
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    //LISTAR
    public function listarProcesoEmpresaPlantaTemporadaCBX($EMPRESA, $PLANTA, $TEMPORADA)
    {
        try {

            $datos = $this->conexion->prepare("SELECT * ,  
                                                    IFNULL(KILOS_EXPORTACION_PROCESO,0) AS 'EXPORTACION'   ,                                                 
                                                    IFNULL(KILOS_INDUSTRIAL_PROCESO,0) AS 'INDUSTRIAL'    ,                                                
                                                    IFNULL(KILOS_INDUSTRIALSC_PROCESO,0) AS 'INDUSTRIALSC'    ,                                               
                                                    IFNULL(KILOS_INDUSTRIALNC_PROCESO,0) AS 'INDUSTRIALNC'    ,                                                
                                                    IFNULL(KILOS_NETO_PROCESO,0) AS 'NETO',                                        
                                                    IFNULL(KILOS_NETO_ENTRADA,0) AS 'ENTRADA',
                                                    DATE_FORMAT(FECHA_PROCESO, '%d-%m-%Y') AS 'FECHA', 
                                                    DATE_FORMAT(INGRESO, '%d-%m-%Y') AS 'INGRESO', 
                                                    DATE_FORMAT(MODIFICACION, '%d-%m-%Y') AS 'MODIFICACION'
                                                FROM fruta_proceso                                                        
                                                WHERE ID_EMPRESA = '" . $EMPRESA . "' 
                                                AND ID_PLANTA = '" . $PLANTA . "'
                                                AND ID_TEMPORADA = '" . $TEMPORADA . "' ;	");
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

    public function listarProcesoEmpresaPlantaTemporadaCBX2($EMPRESA, $PLANTA, $TEMPORADA)
    {
        try {

            $datos = $this->conexion->prepare("SELECT * ,  
                                                    FORMAT(IFNULL(KILOS_EXPORTACION_PROCESO,0),2,'de_DE') AS 'EXPORTACION'   ,                                                 
                                                    FORMAT(IFNULL(KILOS_INDUSTRIAL_PROCESO,0),2,'de_DE') AS 'INDUSTRIAL'    ,                                                 
                                                    FORMAT(IFNULL(KILOS_NETO_PROCESO,0),2,'de_DE') AS 'NETO',                                                
                                                    FORMAT(IFNULL(KILOS_NETO_ENTRADA,0),2,'de_DE') AS 'ENTRADA',
                                                    DATE_FORMAT(FECHA_PROCESO, '%d-%m-%Y') AS 'FECHA', 
                                                    DATE_FORMAT(INGRESO, '%d-%m-%Y') AS 'INGRESO', 
                                                    DATE_FORMAT(MODIFICACION, '%d-%m-%Y') AS 'MODIFICACION'
                                                FROM fruta_proceso                                                        
                                                WHERE ID_EMPRESA = '" . $EMPRESA . "' 
                                                AND ID_PLANTA = '" . $PLANTA . "'
                                                AND ID_TEMPORADA = '" . $TEMPORADA . "' ;	");
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
    public function listarProcesoEmpresaPlantaTemporadaCerradoCBX2($EMPRESA, $PLANTA, $TEMPORADA)
    {
        try {

            $datos = $this->conexion->prepare("SELECT * ,  
                                                    FORMAT(IFNULL(KILOS_EXPORTACION_PROCESO,0),2,'de_DE') AS 'EXPORTACION'   ,                                                 
                                                    FORMAT(IFNULL(KILOS_INDUSTRIAL_PROCESO,0),2,'de_DE') AS 'INDUSTRIAL'    ,                                                 
                                                    FORMAT(IFNULL(KILOS_NETO_PROCESO,0),2,'de_DE') AS 'NETO',                                       
                                                    FORMAT(IFNULL(KILOS_NETO_ENTRADA,0),2,'de_DE') AS 'ENTRADA',
                                                    DATE_FORMAT(FECHA_PROCESO, '%d-%m-%Y') AS 'FECHA', 
                                                    DATE_FORMAT(INGRESO, '%d-%m-%Y') AS 'INGRESO', 
                                                    DATE_FORMAT(MODIFICACION, '%d-%m-%Y') AS 'MODIFICACION'
                                                FROM fruta_proceso                                                        
                                                WHERE ID_EMPRESA = '" . $EMPRESA . "' 
                                                AND ID_PLANTA = '" . $PLANTA . "'
                                                AND ID_TEMPORADA = '" . $TEMPORADA . "' 
                                                AND ESTADO = 0;	");
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


    //VER LA INFORMACION RELACIONADA EN BASE AL ID INGRESADO A LA FUNCION


    //OBTENER TOTALES
    public function obtenerTotales($IDPROCESO)
    {
        try {

            $datos = $this->conexion->prepare("SELECT
                                                 FORMAT(IFNULL(SUM(KILOS_EXPORTACION_PROCESO)+SUM(KILOS_INDUSTRIAL_PROCESO),0),2,'de_DE') AS 'SALIDA'   , 
                                                 IFNULL(SUM(KILOS_EXPORTACION_PROCESO)+SUM(KILOS_INDUSTRIAL_PROCESO),0) AS 'SALIDASF'                                                  
                                             FROM fruta_proceso 
                                             WHERE ID_PROCESO = '" . $IDPROCESO . "';");
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

    public function obtenerTotalesEmpresaPlantaTemporadaCBX($EMPRESA, $PLANTA, $TEMPORADA)
    {
        try {

            $datos = $this->conexion->prepare("SELECT
                                                 IFNULL(SUM(KILOS_EXPORTACION_PROCESO),0) AS 'EXPORTACION'   ,                                                 
                                                 IFNULL(SUM(KILOS_INDUSTRIAL_PROCESO),0) AS 'INDUSTRIAL'   ,                                                 
                                                 IFNULL(SUM(KILOS_NETO_PROCESO),0) AS 'NETO'                ,                                                 
                                                 IFNULL(SUM(KILOS_NETO_ENTRADA),0) AS 'ENTRADA'                                                 
                                             FROM fruta_proceso                                                                                         
                                            WHERE ID_EMPRESA = '" . $EMPRESA . "' 
                                            AND ID_PLANTA = '" . $PLANTA . "'
                                            AND ID_TEMPORADA = '" . $TEMPORADA . "' 
                                            
                                             ;");
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

    public function obtenerTotalesEmpresaPlantaTemporadaCBX2($EMPRESA, $PLANTA, $TEMPORADA)
    {
        try {

            $datos = $this->conexion->prepare("SELECT
                                                 FORMAT(IFNULL(SUM(KILOS_EXPORTACION_PROCESO),0),2,'de_DE') AS 'EXPORTACION'   ,                                                 
                                                 FORMAT(IFNULL(SUM(KILOS_INDUSTRIAL_PROCESO),0),2,'de_DE') AS 'INDUSTRIAL'   ,                                                 
                                                 FORMAT(IFNULL(SUM(KILOS_NETO_PROCESO),0),2,'de_DE') AS 'NETO'                ,                                                 
                                                 FORMAT(IFNULL(SUM(KILOS_NETO_ENTRADA),0),2,'de_DE') AS 'ENTRADA'                                                 
                                             FROM fruta_proceso                                                                                         
                                            WHERE ID_EMPRESA = '" . $EMPRESA . "' 
                                            AND ID_PLANTA = '" . $PLANTA . "'
                                            AND ID_TEMPORADA = '" . $TEMPORADA . "' 
                                            
                                             ;");
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

    //OTRAS FUNCIONALIDADES

    //CONSULTA PARA OBTENER LA FILA EN EL MISMO MOMENTO DE REGISTRAR LA FILA
    public function obtenerId($FECHAPROCESO, $EMPRESA, $PLANTA, $TEMPORADA)
    {
        try {
            $datos = $this->conexion->prepare(" SELECT *
                                                FROM fruta_proceso
                                                WHERE 
                                                    FECHA_PROCESO LIKE '" . $FECHAPROCESO . "'
                                                    AND DATE_FORMAT(INGRESO, '%Y-%m-%d %H:%i') =  DATE_FORMAT(NOW(),'%Y-%m-%d %H:%i') 
                                                    AND DATE_FORMAT(MODIFICACION, '%Y-%m-%d %H:%i') = DATE_FORMAT(NOW(),'%Y-%m-%d %H:%i')             
                                                    AND ID_EMPRESA = " . $EMPRESA . " 
                                                    AND ID_PLANTA = " . $PLANTA . " 
                                                    AND ID_TEMPORADA = " . $TEMPORADA . "  
                                                ORDER BY ID_PROCESO DESC
                                            ; ");
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

    public function obtenerNumero($EMPRESA, $PLANTA, $TEMPORADA)
    {
        try {
            $datos = $this->conexion->prepare(" SELECT  COUNT(IFNULL(NUMERO_PROCESO,0)) AS 'NUMERO'
                                                FROM fruta_proceso
                                                WHERE  
                                                    ID_EMPRESA = '" . $EMPRESA . "' 
                                                AND ID_PLANTA = '" . $PLANTA . "'
                                                AND ID_TEMPORADA = '" . $TEMPORADA . "'     
                                                    ; ");
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
