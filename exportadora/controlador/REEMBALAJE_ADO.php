<?php

//LLAMADA DE LOS ARCHIVOS NECESAROP PARA LA OPERACION DEL CONTROLADOR
//LLAMADA AL MODELO DE CLASE
include_once '../modelo/REEMBALAJE.php';
//LLAMADA AL CONFIGURACION DE LA BASE DE DATOS
include_once '../config/BDCONFIG.php';

//INICIALIZAR VARIABLES
$HOST = "";
$DBNAME = "";
$USER = "";
$PASS = "";

//ESTRUCTURA DEL CONTROLADOR
class REEMBALAJE_ADO
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
    public function listarReembalaje()
    {
        try {

            $datos = $this->conexion->prepare("SELECT * FROM fruta_reembalaje LIMIT 6;	");
            $datos->execute();
            $resultado = $datos->fetchAll();

            //	print_r($resultado);
            //	VAR_DUMP($resultado);


            return $resultado;
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
    //LISTAR TODO
    public function listarReembalajeCBX()
    {
        try {

            $datos = $this->conexion->prepare("SELECT * FROM fruta_reembalaje ;	");
            $datos->execute();
            $resultado = $datos->fetchAll();

            //	print_r($resultado);
            //	VAR_DUMP($resultado);


            return $resultado;
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }


    //VER LA INFORMACION RELACIONADA EN BASE AL ID INGRESADO A LA FUNCION

    public function verReembalaje($IDREEMBALAJE)
    {
        try {

            $datos = $this->conexion->prepare("SELECT *, 
                                                DATE_FORMAT(INGRESO, '%Y-%m-%d') AS 'INGRESO',
                                                DATE_FORMAT(MODIFICACION, '%Y-%m-%d') AS 'MODIFICACION' 
                                            FROM fruta_reembalaje WHERE ID_REEMBALAJE = '" . $IDREEMBALAJE . "';");
            $datos->execute();
            $resultado = $datos->fetchAll();

            //	print_r($resultado);
            //	VAR_DUMP($resultado);


            return $resultado;
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function verReembalaje2($IDREEMBALAJE)
    {
        try {

            $datos = $this->conexion->prepare("SELECT *, 
                                                DATE_FORMAT(FECHA_REEMBALAJE, '%d-%m-%Y') AS 'FECHA',
                                                DATE_FORMAT(INGRESO, '%d-%m-%Y') AS 'INGRESO',
                                                DATE_FORMAT(MODIFICACION, '%d-%m-%Y') AS 'MODIFICACION' 
                                            FROM fruta_reembalaje WHERE ID_REEMBALAJE = '" . $IDREEMBALAJE . "';");
            $datos->execute();
            $resultado = $datos->fetchAll();

            //	print_r($resultado);
            //	VAR_DUMP($resultado);


            return $resultado;
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }



    //REGISTRO DE UNA NUEVA FILA   
    public function agregarReembalaje(REEMBALAJE $REEMBALAJE)
    {
        try {


            $query =
                "INSERT INTO fruta_reembalaje (
                                                    NUMERO_REEMBALAJE, 
                                                    FECHA_REEMBALAJE,  
                                                    TURNO,

                                                    OBSERVACIONE_REEMBALAJE, 
                                                    ID_VESPECIES, 
                                                    ID_PRODUCTOR,

                                                    ID_TREEMBALAJE,  
                                                    ID_EMPRESA,
                                                    ID_PLANTA,

                                                    ID_TEMPORADA, 
                                                    ID_USUARIOI, 
                                                    ID_USUARIOM, 

                                                    KILOS_NETO_REEMBALAJE, 
                                                    KILOS_EXPORTACION_REEMBALAJE, 
                                                    KILOS_INDUSTRIAL_REEMBALAJE,
                                                    PDEXPORTACION_REEMBALAJE, 
                                                    PDINDUSTRIAL_REEMBALAJE, 
                                                    PORCENTAJE_REEMBALAJE,
                                                    INGRESO, 
                                                    MODIFICACION,
                                                    ESTADO,  
                                                    ESTADO_REGISTRO
                                                ) VALUES
	       	(?, ?, ?,   ?, ?, ?,   ?, ?, ?,   ?, ?, ?,    0, 0, 0, 0, 0, 0,  SYSDATE(),  SYSDATE(), 1, 1 );";
            $this->conexion->prepare($query)
                ->execute(
                    array(

                        $REEMBALAJE->__GET('NUMERO_REEMBALAJE'),
                        $REEMBALAJE->__GET('FECHA_REEMBALAJE'),
                        $REEMBALAJE->__GET('TURNO'),
                        $REEMBALAJE->__GET('OBSERVACIONE_REEMBALAJE'),
                        $REEMBALAJE->__GET('ID_VESPECIES'),
                        $REEMBALAJE->__GET('ID_PRODUCTOR'),
                        $REEMBALAJE->__GET('ID_TREEMBALAJE'),
                        $REEMBALAJE->__GET('ID_EMPRESA'),
                        $REEMBALAJE->__GET('ID_PLANTA'),
                        $REEMBALAJE->__GET('ID_TEMPORADA'),
                        $REEMBALAJE->__GET('ID_USUARIOI'),
                        $REEMBALAJE->__GET('ID_USUARIOM')



                    )

                );
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    //ACTUALIZAR INFORMACION DE LA FILA
    public function actualizarReembalaje(REEMBALAJE $REEMBALAJE)
    {

        try {
            $query = "
                    UPDATE fruta_reembalaje SET
                        MODIFICACION = SYSDATE(), 
                        FECHA_REEMBALAJE=?,
                        TURNO =?,
                        OBSERVACIONE_REEMBALAJE =?,
                        KILOS_NETO_REEMBALAJE =?,
                        KILOS_EXPORTACION_REEMBALAJE =?,
                        KILOS_INDUSTRIAL_REEMBALAJE =?, 
                        PDEXPORTACION_REEMBALAJE =?, 
                        PDINDUSTRIAL_REEMBALAJE =?, 
                        PORCENTAJE_REEMBALAJE =?, 
                        ID_TREEMBALAJE =?,
                        ID_VESPECIES =?,
                        ID_PRODUCTOR =?,
                        ID_EMPRESA =?, 
                        ID_PLANTA =?, 
                        ID_TEMPORADA =?, 
                        ID_USUARIOM =?
                    WHERE ID_REEMBALAJE= ?;";
            $this->conexion->prepare($query)
                ->execute(
                    array(

                        $REEMBALAJE->__GET('FECHA_REEMBALAJE'),
                        $REEMBALAJE->__GET('TURNO'),
                        $REEMBALAJE->__GET('OBSERVACIONE_REEMBALAJE'),
                        $REEMBALAJE->__GET('KILOS_NETO_REEMBALAJE'),
                        $REEMBALAJE->__GET('KILOS_EXPORTACION_REEMBALAJE'),
                        $REEMBALAJE->__GET('KILOS_INDUSTRIAL_REEMBALAJE'),
                        $REEMBALAJE->__GET('PDEXPORTACION_REEMBALAJE'),
                        $REEMBALAJE->__GET('PDINDUSTRIAL_REEMBALAJE'),
                        $REEMBALAJE->__GET('PORCENTAJE_REEMBALAJE'),
                        $REEMBALAJE->__GET('ID_TREEMBALAJE'),
                        $REEMBALAJE->__GET('ID_VESPECIES'),
                        $REEMBALAJE->__GET('ID_PRODUCTOR'),
                        $REEMBALAJE->__GET('ID_EMPRESA'),
                        $REEMBALAJE->__GET('ID_PLANTA'),
                        $REEMBALAJE->__GET('ID_TEMPORADA'),
                        $REEMBALAJE->__GET('ID_USUARIOM'),
                        $REEMBALAJE->__GET('ID_REEMBALAJE')

                    )

                );
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }


    //ELIMINAR FILA, NO SE UTILIZA
    public function eliminarReembalaje($id)
    {
        try {
            $sql = "DELETE FROM fruta_reembalaje WHERE ID_REEMBALAJE=" . $id . ";";
            $statement = $this->conexion->prepare($sql);
            $statement->execute();
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
    //FUNCIONES ESPECIALIZADAS



    //CAMBIO DE ESTADO DE REGISTRO DEL REGISTRO
    //CAMBIO A DESACTIVADO
    public function deshabilitar(REEMBALAJE $REEMBALAJE)
    {

        try {
            $query = "
                UPDATE fruta_reembalaje SET			
                        ESTADO_REGISTRO = 0
                WHERE ID_REEMBALAJE= ?;";
            $this->conexion->prepare($query)
                ->execute(
                    array(
                        $REEMBALAJE->__GET('ID_REEMBALAJE')
                    )

                );
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
    //CAMBIO A ACTIVADO
    public function habilitar(REEMBALAJE $REEMBALAJE)
    {
        try {
            $query = "
                UPDATE fruta_reembalaje SET			
                        ESTADO_REGISTRO = 1
                WHERE ID_REEMBALAJE= ?;";
            $this->conexion->prepare($query)
                ->execute(
                    array(
                        $REEMBALAJE->__GET('ID_REEMBALAJE')
                    )

                );
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    //CAMBIO ESTADO
    //ABIERTO 1
    public function abierto(REEMBALAJE $REEMBALAJE)
    {
        try {
            $query = "
                    UPDATE fruta_reembalaje SET			
                            ESTADO = 1
                    WHERE ID_REEMBALAJE= ?;";
            $this->conexion->prepare($query)
                ->execute(
                    array(
                        $REEMBALAJE->__GET('ID_REEMBALAJE')
                    )
                );
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
    //CERRADO 0
    public function  cerrado(REEMBALAJE $REEMBALAJE)
    {
        try {
            $query = "
                    UPDATE fruta_reembalaje SET			
                            ESTADO = 0
                    WHERE ID_REEMBALAJE= ?;";
            $this->conexion->prepare($query)
                ->execute(
                    array(
                        $REEMBALAJE->__GET('ID_REEMBALAJE')
                    )
                );
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    //LISTAR
    public function listarReembalajeEmpresaPlantaTemporadaCBX($EMPRESA, $PLANTA, $TEMPORADA)
    {
        try {

            $datos = $this->conexion->prepare("SELECT * 
                                        FROM fruta_reembalaje                                                                               
                                        WHERE ID_EMPRESA = '" . $EMPRESA . "' 
                                        AND ID_PLANTA = '" . $PLANTA . "'
                                        AND ID_TEMPORADA = '" . $TEMPORADA . "'
                                        ;	");
            $datos->execute();
            $resultado = $datos->fetchAll();

            //	print_r($resultado);
            //	VAR_DUMP($resultado);


            return $resultado;
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
    public function listarReembalajeEmpresaPlantaTemporadaCBX2($EMPRESA, $PLANTA, $TEMPORADA)
    {
        try {

            $datos = $this->conexion->prepare("SELECT *,    
                                                DATE_FORMAT(INGRESO, '%d-%m-%Y') AS 'INGRESO',
                                                DATE_FORMAT(MODIFICACION, '%d-%m-%Y') AS 'MODIFICACION',      
                                                DATE_FORMAT(FECHA_REEMBALAJE, '%d-%m-%Y') AS 'FECHA',                                                  
                                                FORMAT(IFNULL(KILOS_EXPORTACION_REEMBALAJE,0),2,'de_DE') AS 'EXPORTACION',
                                                FORMAT(IFNULL(KILOS_INDUSTRIAL_REEMBALAJE,0),2,'de_DE') AS 'INDUSTRIAL'  ,
                                                FORMAT(IFNULL(KILOS_NETO_REEMBALAJE,0),2,'de_DE') AS 'NETO'  
                                        FROM fruta_reembalaje                                                                               
                                        WHERE ID_EMPRESA = '" . $EMPRESA . "' 
                                        AND ID_PLANTA = '" . $PLANTA . "'
                                        AND ID_TEMPORADA = '" . $TEMPORADA . "'
                                        ;	");
            $datos->execute();
            $resultado = $datos->fetchAll();

            //	print_r($resultado);
            //	VAR_DUMP($resultado);


            return $resultado;
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
    //TOTLAES

    public function obtenerTotales($IDREEMBALAJE)
    {
        try {

            $datos = $this->conexion->prepare("SELECT
                                             FORMAT(IFNULL(SUM(KILOS_EXPORTACION_REEMBALAJE)+SUM(KILOS_INDUSTRIAL_REEMBALAJE),0),2,'de_DE') AS 'SALIDA',   
                                             IFNULL(SUM(KILOS_EXPORTACION_REEMBALAJE)+SUM(KILOS_INDUSTRIAL_REEMBALAJE),0) AS 'SALIDASF'                                                  
                                         FROM fruta_reembalaje 
                                         WHERE ID_REEMBALAJE = '" . $IDREEMBALAJE . "';");
            $datos->execute();
            $resultado = $datos->fetchAll();

            //	print_r($resultado);
            //	VAR_DUMP($resultado);


            return $resultado;
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
    public function obtenerTotaleLista()
    {
        try {

            $datos = $this->conexion->prepare("SELECT
                                             FORMAT(IFNULL(SUM(KILOS_EXPORTACION_REEMBALAJE),0),2,'de_DE') AS 'EXPORTACION',
                                             FORMAT(IFNULL(SUM(KILOS_INDUSTRIAL_REEMBALAJE),0),2,'de_DE') AS 'INDUSTRIAL'  ,
                                             FORMAT(IFNULL(SUM(KILOS_NETO_REEMBALAJE),0),2,'de_DE') AS 'NETO'                                                   
                                         FROM fruta_reembalaje 
                                         ");
            $datos->execute();
            $resultado = $datos->fetchAll();

            //	print_r($resultado);
            //	VAR_DUMP($resultado);


            return $resultado;
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
    public function obtenerTotalEmpresaPlantaTemporadaCBX2($EMPRESA, $PLANTA, $TEMPORADA)
    {
        try {

            $datos = $this->conexion->prepare("SELECT
                                             FORMAT(IFNULL(SUM(KILOS_EXPORTACION_REEMBALAJE),0),2,'de_DE') AS 'EXPORTACION',
                                             FORMAT(IFNULL(SUM(KILOS_INDUSTRIAL_REEMBALAJE),0),2,'de_DE') AS 'INDUSTRIAL'  ,
                                             FORMAT(IFNULL(SUM(KILOS_NETO_REEMBALAJE),0),2,'de_DE') AS 'NETO'                                                   
                                         FROM fruta_reembalaje                                                                                              
                                         WHERE ID_EMPRESA = '" . $EMPRESA . "' 
                                            AND ID_PLANTA = '" . $PLANTA . "'
                                            AND ID_TEMPORADA = '" . $TEMPORADA . "'
                                         ");
            $datos->execute();
            $resultado = $datos->fetchAll();

            //	print_r($resultado);
            //	VAR_DUMP($resultado);


            return $resultado;
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
    //OTRAS FUNCIONALIADES



    //CONSULTA PARA OBTENER LA FILA EN EL MISMO MOMENTO DE REGISTRAR LA FILA
    public function obtenerId($FECHAREEMBALAJE, $EMPRESA, $PLANTA, $TEMPORADA)
    {
        try {


            $datos = $this->conexion->prepare(" SELECT *
                                            FROM fruta_reembalaje
                                            WHERE   FECHA_REEMBALAJE LIKE '" . $FECHAREEMBALAJE . "'
                                                    AND DATE_FORMAT(INGRESO, '%Y-%m-%d %H:%i') =  DATE_FORMAT(NOW(),'%Y-%m-%d %H:%i') 
                                                    AND DATE_FORMAT(MODIFICACION, '%Y-%m-%d %H:%i') = DATE_FORMAT(NOW(),'%Y-%m-%d %H:%i')                                            
                                                    AND ID_EMPRESA = " . $EMPRESA . " 
                                                    AND ID_PLANTA = " . $PLANTA . " 
                                                    AND ID_TEMPORADA = " . $TEMPORADA . " 
                                            ORDER BY ID_REEMBALAJE DESC
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
    //BUSCAR FECHA ACTUAL DEL SISTEMA
    public function obtenerFecha()
    {
        try {

            $datos = $this->conexion->prepare("SELECT CURDATE() AS 'FECHA';");
            $datos->execute();
            $resultado = $datos->fetchAll();

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
            $datos = $this->conexion->prepare(" SELECT  COUNT(IFNULL(NUMERO_REEMBALAJE,0)) AS 'NUMERO'
                                            FROM fruta_reembalaje
                                            WHERE  
                                                ID_EMPRESA = '" . $EMPRESA . "' 
                                            AND ID_PLANTA = '" . $PLANTA . "'
                                            AND ID_TEMPORADA = '" . $TEMPORADA . "'     
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
