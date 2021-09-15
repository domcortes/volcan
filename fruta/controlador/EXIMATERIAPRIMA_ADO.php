<?php

//LLAMADA DE LOS ARCHIVOS NECESAROP PARA LA OPERACION DEL CONTROLADOR
//LLAMADA AL MODELO DE CLASE
include_once '../modelo/EXIMATERIAPRIMA.php';
//LLAMADA AL CONFIGURACION DE LA BASE DE DATOS
include_once '../config/BDCONFIG.php';

//INICIALIZAR VARIABLES
$HOST = "";
$DBNAME = "";
$USER = "";
$PASS = "";

//ESTRUCTURA DEL CONTROLADOR
class EXIMATERIAPRIMA_ADO
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
    public function listarEximateriaprima()
    {
        try {

            $datos = $this->conexion->prepare("SELECT * FROM fruta_eximateriaprima limit 8;	");
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
    public function listarEximateriaprimaCBX()
    {
        try {

            $datos = $this->conexion->prepare("SELECT *, DATEDIFF(SYSDATE(), FECHA_COSECHA_EXIMATERIAPRIMA) AS 'DIAS'
                                                FROM fruta_eximateriaprima
                                                WHERE ESTADO_REGISTRO = 1;
                                                ORDER BY FOLIO_EXIMATERIAPRIMA ASC; ");
            $datos->execute();
            $resultado = $datos->fetchAll();

            //	print_r($resultado);
            //	VAR_DUMP($resultado);


            return $resultado;
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
    public function listarEximateriaprimaHCBX()
    {
        try {

            $datos = $this->conexion->prepare("SELECT *, 
                                                    DATEDIFF(SYSDATE(), FECHA_COSECHA_EXIMATERIAPRIMA) AS 'DIAS' 
                                             FROM fruta_eximateriaprima
                                             ORDER BY FOLIO_EXIMATERIAPRIMA ASC; ");
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
    public function verEximateriaprima($ID)
    {
        try {

            $datos = $this->conexion->prepare("SELECT * FROM fruta_eximateriaprima WHERE ID_EXIMATERIAPRIMA= '" . $ID . "';");
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
    public function agregarEximateriaprimaRecepcion(EXIMATERIAPRIMA $EXIMATERIAPRIMA)
    {
        try {

            $query =
                "INSERT INTO fruta_eximateriaprima ( 


                                                            FOLIO_EXIMATERIAPRIMA,
                                                            FOLIO_AUXILIAR_EXIMATERIAPRIMA,
                                                            FOLIO_MANUAL,
                                                            FECHA_COSECHA_EXIMATERIAPRIMA,
                                                            CANTIDAD_ENVASE_EXIMATERIAPRIMA,
                                                            KILOS_NETO_EXIMATERIAPRIMA,
                                                            KILOS_BRUTO_EXIMATERIAPRIMA,
                                                            KILOS_PROMEDIO_EXIMATERIAPRIMA,
                                                            PESO_PALLET_EXIMATERIAPRIMA,
                                                            ALIAS_DINAMICO_FOLIO_EXIMATERIAPRIMA,
                                                            ALIAS_ESTATICO_FOLIO_EXIMATERIAPRIMA,
                                                            GASIFICADO,
                                                            FECHA_RECEPCION,
                                                            ID_TMANEJO,
                                                            ID_FOLIO,
                                                            ID_ESTANDAR,
                                                            ID_PRODUCTOR,
                                                            ID_VESPECIES,
                                                            ID_RECEPCION,
                                                            ID_EMPRESA, 
                                                            ID_PLANTA, 
                                                            ID_TEMPORADA,
                                                            INGRESO,
                                                            MODIFICACION,
                                                            ESTADO,  
                                                            ESTADO_REGISTRO
                                                    ) VALUES
	       	( ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, SYSDATE(), SYSDATE(), 1, 1);";
            $this->conexion->prepare($query)
                ->execute(
                    array(

                        $EXIMATERIAPRIMA->__GET('FOLIO_EXIMATERIAPRIMA'),
                        $EXIMATERIAPRIMA->__GET('FOLIO_AUXILIAR_EXIMATERIAPRIMA'),
                        $EXIMATERIAPRIMA->__GET('FOLIO_MANUAL'),
                        $EXIMATERIAPRIMA->__GET('FECHA_COSECHA_EXIMATERIAPRIMA'),
                        $EXIMATERIAPRIMA->__GET('CANTIDAD_ENVASE_EXIMATERIAPRIMA'),
                        $EXIMATERIAPRIMA->__GET('KILOS_NETO_EXIMATERIAPRIMA'),
                        $EXIMATERIAPRIMA->__GET('KILOS_BRUTO_EXIMATERIAPRIMA'),
                        $EXIMATERIAPRIMA->__GET('KILOS_PROMEDIO_EXIMATERIAPRIMA'),
                        $EXIMATERIAPRIMA->__GET('PESO_PALLET_EXIMATERIAPRIMA'),
                        $EXIMATERIAPRIMA->__GET('ALIAS_DINAMICO_FOLIO_EXIMATERIAPRIMA'),
                        $EXIMATERIAPRIMA->__GET('ALIAS_ESTATICO_FOLIO_EXIMATERIAPRIMA'),
                        $EXIMATERIAPRIMA->__GET('GASIFICADO'),
                        $EXIMATERIAPRIMA->__GET('FECHA_RECEPCION'),
                        $EXIMATERIAPRIMA->__GET('ID_TMANEJO'),
                        $EXIMATERIAPRIMA->__GET('ID_FOLIO'),
                        $EXIMATERIAPRIMA->__GET('ID_ESTANDAR'),
                        $EXIMATERIAPRIMA->__GET('ID_PRODUCTOR'),
                        $EXIMATERIAPRIMA->__GET('ID_VESPECIES'),
                        $EXIMATERIAPRIMA->__GET('ID_RECEPCION'),
                        $EXIMATERIAPRIMA->__GET('ID_EMPRESA'),
                        $EXIMATERIAPRIMA->__GET('ID_PLANTA'),
                        $EXIMATERIAPRIMA->__GET('ID_TEMPORADA')

                    )

                );
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    //REGISTRO DE UNA NUEVA FILA    


    //ELIMINAR FILA, NO SE UTILIZA
    public function eliminarEximateriaprima($id)
    {
        try {
            $sql = "DELETE FROM fruta_eximateriaprima WHERE ID_EXIMATERIAPRIMA=" . $id . ";";
            $statement = $this->conexion->prepare($sql);
            $statement->execute();
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }





    //ACTUALIZAR INFORMACION DE LA FILA
    public function actualizarEximateriaprimaRecepcion(EXIMATERIAPRIMA $EXIMATERIAPRIMA)
    {
        try {
            $query = "
		UPDATE fruta_eximateriaprima SET
            MODIFICACION = SYSDATE(),
            FECHA_COSECHA_EXIMATERIAPRIMA = ?,
            CANTIDAD_ENVASE_EXIMATERIAPRIMA = ?,
            KILOS_NETO_EXIMATERIAPRIMA = ?,
            KILOS_BRUTO_EXIMATERIAPRIMA = ?,
            KILOS_PROMEDIO_EXIMATERIAPRIMA = ?,
            PESO_PALLET_EXIMATERIAPRIMA = ?,
            GASIFICADO = ?,
            FECHA_RECEPCION = ?,
            ID_TMANEJO = ?, 
            ID_ESTANDAR = ?,
            ID_PRODUCTOR = ?,
            ID_VESPECIES = ?   ,
            ID_RECEPCION = ?   ,
            ID_EMPRESA = ?,
            ID_PLANTA = ?, 
            ID_TEMPORADA = ?       
		WHERE ID_EXIMATERIAPRIMA= ?;";
            $this->conexion->prepare($query)
                ->execute(
                    array(
                        $EXIMATERIAPRIMA->__GET('FECHA_COSECHA_EXIMATERIAPRIMA'),
                        $EXIMATERIAPRIMA->__GET('CANTIDAD_ENVASE_EXIMATERIAPRIMA'),
                        $EXIMATERIAPRIMA->__GET('KILOS_NETO_EXIMATERIAPRIMA'),
                        $EXIMATERIAPRIMA->__GET('KILOS_BRUTO_EXIMATERIAPRIMA'),
                        $EXIMATERIAPRIMA->__GET('KILOS_PROMEDIO_EXIMATERIAPRIMA'),
                        $EXIMATERIAPRIMA->__GET('PESO_PALLET_EXIMATERIAPRIMA'),
                        $EXIMATERIAPRIMA->__GET('GASIFICADO'),
                        $EXIMATERIAPRIMA->__GET('FECHA_RECEPCION'),
                        $EXIMATERIAPRIMA->__GET('ID_TMANEJO'),
                        $EXIMATERIAPRIMA->__GET('ID_ESTANDAR'),
                        $EXIMATERIAPRIMA->__GET('ID_PRODUCTOR'),
                        $EXIMATERIAPRIMA->__GET('ID_VESPECIES'),
                        $EXIMATERIAPRIMA->__GET('ID_RECEPCION'),
                        $EXIMATERIAPRIMA->__GET('ID_EMPRESA'),
                        $EXIMATERIAPRIMA->__GET('ID_PLANTA'),
                        $EXIMATERIAPRIMA->__GET('ID_TEMPORADA'),
                        $EXIMATERIAPRIMA->__GET('ID_EXIMATERIAPRIMA')

                    )

                );
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }







    ///FUNCIONES ESPECIALIZADAS


    //LISTAS 
    //BUSCAR POR LA RECEPCION ASOCIADA A LA EXIMATERIAPRIMA

    public function listarEximateriaprimaEmpresaPlantaTemporadaDisponible($EMPRESA,  $PLANTA, $TEMPORADA)
    {
        try {

            $datos = $this->conexion->prepare("SELECT *,  
                                                    DATEDIFF(SYSDATE(), INGRESO) AS 'DIAS',
                                                    IFNULL(DATE_FORMAT(INGRESO, '%d-%m-%Y'),'Sin Datos') AS 'INGRESO',
                                                    IFNULL(DATE_FORMAT(MODIFICACION, '%d-%m-%Y'),'Sin Datos') AS 'MODIFICACION',
                                                    IFNULL(DATE_FORMAT(FECHA_RECEPCION, '%d-%m-%Y'),'Sin Datos') AS 'RECEPCION',
                                                    IFNULL(DATE_FORMAT(FECHA_REPALETIZAJE, '%d-%m-%Y'),'Sin Datos') AS 'REPALETIZAJE',
                                                    IFNULL(DATE_FORMAT(FECHA_DESPACHO, '%d-%m-%Y'),'Sin Datos') AS 'DESPACHO'
                                                    FROM fruta_eximateriaprima
                                                    WHERE ESTADO_REGISTRO = 1
                                                    AND ESTADO = 2
                                                    AND ID_EMPRESA = '" . $EMPRESA . "' 
                                                    AND ID_PLANTA = '" . $PLANTA . "'
                                                    AND ID_TEMPORADA = '" . $TEMPORADA . "';  ");
            $datos->execute();
            $resultado = $datos->fetchAll();

            //	print_r($resultado);
            //	VAR_DUMP($resultado);


            return $resultado;
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function listarEximateriaprimaEmpresaPlantaTemporadaDisponible2($EMPRESA,  $PLANTA, $TEMPORADA)
    {
        try {

            $datos = $this->conexion->prepare("SELECT *,  
                                                    DATEDIFF(SYSDATE(), INGRESO) AS 'DIAS',
                                                    IFNULL(DATE_FORMAT(INGRESO, '%d-%m-%Y'),'Sin Datos') AS 'INGRESO',
                                                    IFNULL(DATE_FORMAT(MODIFICACION, '%d-%m-%Y'),'Sin Datos') AS 'MODIFICACION',
                                                    IFNULL(DATE_FORMAT(FECHA_COSECHA_EXIMATERIAPRIMA, '%d-%m-%Y'),'Sin Datos') AS 'COSECHA',
                                                    IFNULL(DATE_FORMAT(FECHA_RECEPCION, '%d-%m-%Y'),'Sin Datos') AS 'RECEPCION',
                                                    IFNULL(DATE_FORMAT(FECHA_REPALETIZAJE, '%d-%m-%Y'),'Sin Datos') AS 'REPALETIZAJE',
                                                    IFNULL(DATE_FORMAT(FECHA_DESPACHO, '%d-%m-%Y'),'Sin Datos') AS 'DESPACHO',
                                                    FORMAT(IFNULL(CANTIDAD_ENVASE_EXIMATERIAPRIMA,0),0,'de_DE') AS 'ENVASE',
                                                    FORMAT(IFNULL(KILOS_NETO_EXIMATERIAPRIMA,0),2,'de_DE') AS 'NETO',
                                                    FORMAT(IFNULL(KILOS_BRUTO_EXIMATERIAPRIMA,0),0,'de_DE') AS 'BRUTO',
                                                    FORMAT(IFNULL(KILOS_PROMEDIO_EXIMATERIAPRIMA,3),0,'de_DE') AS 'PROMEDIO',
                                                    FORMAT(IFNULL(PESO_PALLET_EXIMATERIAPRIMA,0),0,'de_DE') AS 'PALLET'
                                                    FROM fruta_eximateriaprima
                                                    WHERE ESTADO_REGISTRO = 1
                                                    AND ESTADO = 2
                                                    AND ID_EMPRESA = '" . $EMPRESA . "' 
                                                    AND ID_PLANTA = '" . $PLANTA . "'
                                                    AND ID_TEMPORADA = '" . $TEMPORADA . "';  ");
            $datos->execute();
            $resultado = $datos->fetchAll();

            //	print_r($resultado);
            //	VAR_DUMP($resultado);


            return $resultado;
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
    public function listarEximateriaprimaEmpresaPlantaTemporada2($EMPRESA,  $PLANTA, $TEMPORADA)
    {
        try {

            $datos = $this->conexion->prepare("SELECT *,  
                                                    DATEDIFF(SYSDATE(), INGRESO) AS 'DIAS',
                                                    IFNULL(DATE_FORMAT(INGRESO, '%d-%m-%Y'),'Sin Datos') AS 'INGRESO',
                                                    IFNULL(DATE_FORMAT(MODIFICACION, '%d-%m-%Y'),'Sin Datos') AS 'MODIFICACION',
                                                    IFNULL(DATE_FORMAT(FECHA_COSECHA_EXIMATERIAPRIMA, '%d-%m-%Y'),'Sin Datos') AS 'COSECHA',
                                                    IFNULL(DATE_FORMAT(FECHA_RECEPCION, '%d-%m-%Y'),'Sin Datos') AS 'RECEPCION',
                                                    IFNULL(DATE_FORMAT(FECHA_REPALETIZAJE, '%d-%m-%Y'),'Sin Datos') AS 'REPALETIZAJE',
                                                    IFNULL(DATE_FORMAT(FECHA_DESPACHO, '%d-%m-%Y'),'Sin Datos') AS 'DESPACHO',
                                                    FORMAT(IFNULL(CANTIDAD_ENVASE_EXIMATERIAPRIMA,0),0,'de_DE') AS 'ENVASE',
                                                    FORMAT(IFNULL(KILOS_NETO_EXIMATERIAPRIMA,0),2,'de_DE') AS 'NETO',
                                                    FORMAT(IFNULL(KILOS_BRUTO_EXIMATERIAPRIMA,0),0,'de_DE') AS 'BRUTO',
                                                    FORMAT(IFNULL(KILOS_PROMEDIO_EXIMATERIAPRIMA,3),0,'de_DE') AS 'PROMEDIO',
                                                    FORMAT(IFNULL(PESO_PALLET_EXIMATERIAPRIMA,0),0,'de_DE') AS 'PALLET'
                                                    FROM fruta_eximateriaprima
                                                    WHERE
                                                        ID_EMPRESA = '" . $EMPRESA . "' 
                                                        AND ID_PLANTA = '" . $PLANTA . "'
                                                        AND ID_TEMPORADA = '" . $TEMPORADA . "';  ");
            $datos->execute();
            $resultado = $datos->fetchAll();

            //	print_r($resultado);
            //	VAR_DUMP($resultado);


            return $resultado;
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }




    //BUSCAR

    public function buscarPorRecepcion($IDRECEPCION)
    {
        try {

            $datos = $this->conexion->prepare("SELECT * FROM fruta_eximateriaprima 
                                              WHERE ID_RECEPCION= '" . $IDRECEPCION . "'  AND ESTADO_REGISTRO = 1;");
            $datos->execute();
            $resultado = $datos->fetchAll();

            //	print_r($resultado);
            //	VAR_DUMP($resultado);


            return $resultado;
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
    public function buscarPorProceso($IDPROCESO)
    {
        try {

            $datos = $this->conexion->prepare("  SELECT * 
                                                FROM fruta_eximateriaprima 
                                                WHERE ID_PROCESO= '" . $IDPROCESO . "'  
                                                      AND ESTADO_REGISTRO = 1;");
            $datos->execute();
            $resultado = $datos->fetchAll();

            //	print_r($resultado);
            //	VAR_DUMP($resultado);


            return $resultado;
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
    public function buscarPorProceso2($IDPROCESO)
    {
        try {

            $datos = $this->conexion->prepare("  SELECT * ,  
                                                    IFNULL(DATE_FORMAT(FECHA_COSECHA_EXIMATERIAPRIMA, '%d-%m-%Y'),'Sin Datos') AS 'COSECHA',
                                                    FORMAT(IFNULL(CANTIDAD_ENVASE_EXIMATERIAPRIMA,0),0,'de_DE') AS 'ENVASE',
                                                    FORMAT(IFNULL(KILOS_NETO_EXIMATERIAPRIMA,0),2,'de_DE') AS 'NETO',
                                                    FORMAT(IFNULL(KILOS_BRUTO_EXIMATERIAPRIMA,0),0,'de_DE') AS 'BRUTO',
                                                    FORMAT(IFNULL(KILOS_PROMEDIO_EXIMATERIAPRIMA,3),0,'de_DE') AS 'PROMEDIO'
                                                FROM fruta_eximateriaprima 
                                                WHERE ID_PROCESO= '" . $IDPROCESO . "'  
                                                      AND ESTADO_REGISTRO = 1;");
            $datos->execute();
            $resultado = $datos->fetchAll();

            //	print_r($resultado);
            //	VAR_DUMP($resultado);


            return $resultado;
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function buscarPorRecepcionNumeroFolio($IDRECEPCION, $NUMEROFOLIO)
    {
        try {

            $datos = $this->conexion->prepare("SELECT * 
                                               FROM fruta_eximateriaprima 
                                               WHERE 
                                                    ID_RECEPCION= '" . $IDRECEPCION . "'  
                                                    AND FOLIO_EXIMATERIAPRIMA= '" . $NUMEROFOLIO . "'  
                                                    AND FOLIO_AUXILIAR_EXIMATERIAPRIMA= '" . $NUMEROFOLIO . "'  
                                                    AND ESTADO_REGISTRO = 1
                                                    AND ESTADO !=0;");
            $datos->execute();
            $resultado = $datos->fetchAll();

            //	print_r($resultado);
            //	VAR_DUMP($resultado);


            return $resultado;
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }


    //BUSQUEDA POR NUMERO FOLIO ASOCIADO AL REGISTRO
    public function buscarPorFolio($FOLIOAUXILIAREXIMATERIAPRIMA)
    {
        try {

            $datos = $this->conexion->prepare("SELECT * 
                                             FROM fruta_eximateriaprima 
                                             WHERE   FOLIO_AUXILIAR_EXIMATERIAPRIMA LIKE '" . $FOLIOAUXILIAREXIMATERIAPRIMA . "'
                                             AND ESTADO_REGISTRO =  1 
                                             AND ESTADO != 0    ;");
            $datos->execute();
            $resultado = $datos->fetchAll();

            //	print_r($resultado);
            //	VAR_DUMP($resultado);


            return $resultado;
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    //BUSQUEDA POR EMPRESA PLANTA TEMPORADA
    public function buscarPorEmpresaPlantaTemporada($EMPRESA, $PLANTA, $TEMPORADA)
    {
        try {

            $datos = $this->conexion->prepare("SELECT * FROM fruta_eximateriaprima 
                                            WHERE  ESTADO = 2  
                                            AND ESTADO_REGISTRO = 1 
                                            AND ID_EMPRESA = '" . $EMPRESA . "'
                                            AND ID_PLANTA = '" . $PLANTA . "'
                                            AND ID_TEMPORADA = '" . $TEMPORADA . "';");
            $datos->execute();
            $resultado = $datos->fetchAll();

            //	print_r($resultado);
            //	VAR_DUMP($resultado);


            return $resultado;
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
    public function buscarPorEmpresaPlantaTemporadaVariedadProductor($EMPRESA, $PLANTA, $TEMPORADA,  $VESPECIES, $PRODUCTOR)
    {
        try {

            $datos = $this->conexion->prepare("SELECT * ,  
                                                    DATEDIFF(SYSDATE(), INGRESO) AS 'DIAS',
                                                    IFNULL(DATE_FORMAT(INGRESO, '%d-%m-%Y'),'Sin Datos') AS 'INGRESO',
                                                    IFNULL(DATE_FORMAT(MODIFICACION, '%d-%m-%Y'),'Sin Datos') AS 'MODIFICACION',
                                                    IFNULL(DATE_FORMAT(FECHA_COSECHA_EXIMATERIAPRIMA, '%d-%m-%Y'),'Sin Datos') AS 'COSECHA',
                                                    IFNULL(DATE_FORMAT(FECHA_RECEPCION, '%d-%m-%Y'),'Sin Datos') AS 'RECEPCION',
                                                    IFNULL(DATE_FORMAT(FECHA_REPALETIZAJE, '%d-%m-%Y'),'Sin Datos') AS 'REPALETIZAJE',
                                                    IFNULL(DATE_FORMAT(FECHA_DESPACHO, '%d-%m-%Y'),'Sin Datos') AS 'DESPACHO',
                                                    FORMAT(IFNULL(CANTIDAD_ENVASE_EXIMATERIAPRIMA,0),0,'de_DE') AS 'ENVASE',
                                                    FORMAT(IFNULL(KILOS_NETO_EXIMATERIAPRIMA,0),2,'de_DE') AS 'NETO',
                                                    FORMAT(IFNULL(KILOS_BRUTO_EXIMATERIAPRIMA,0),0,'de_DE') AS 'BRUTO',
                                                    FORMAT(IFNULL(KILOS_PROMEDIO_EXIMATERIAPRIMA,3),0,'de_DE') AS 'PROMEDIO',
                                                    FORMAT(IFNULL(PESO_PALLET_EXIMATERIAPRIMA,0),0,'de_DE') AS 'PALLET'
                                                FROM fruta_eximateriaprima 
                                                WHERE  ESTADO = 2  
                                                AND ESTADO_REGISTRO = 1 
                                                AND ID_PRODUCTOR = '" . $PRODUCTOR . "'
                                                AND ID_VESPECIES = '" . $VESPECIES . "'
                                                AND ID_EMPRESA = '" . $EMPRESA . "'
                                                AND ID_PLANTA = '" . $PLANTA . "'
                                                AND ID_TEMPORADA = '" . $TEMPORADA . "' ;");
            $datos->execute();
            $resultado = $datos->fetchAll();

            //	print_r($resultado);
            //	VAR_DUMP($resultado);


            return $resultado;
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    //TOTALES
    public function obtenerTotalesEmpresaPlantaTemporadaDisponible($EMPRESA,  $PLANTA, $TEMPORADA)
    {
        try {

            $datos = $this->conexion->prepare(" SELECT  
                                                         IFNULL(SUM(CANTIDAD_ENVASE_EXIMATERIAPRIMA),0) AS 'ENVASE', 
                                                         IFNULL(SUM(KILOS_NETO_EXIMATERIAPRIMA),0) AS 'NETO' 
                                                    FROM fruta_eximateriaprima
                                                    WHERE ESTADO_REGISTRO = 1
                                                    AND ESTADO = 2                                             
                                                    AND ID_EMPRESA = '" . $EMPRESA . "' 
                                                    AND ID_PLANTA = '" . $PLANTA . "'
                                                    AND ID_TEMPORADA = '" . $TEMPORADA . "' ;");
            $datos->execute();
            $resultado = $datos->fetchAll();

            //	print_r($resultado);
            //	VAR_DUMP($resultado);


            return $resultado;
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }


    public function obtenerTotalesEmpresaPlantaTemporadaDisponible2($EMPRESA,  $PLANTA, $TEMPORADA)
    {
        try {

            $datos = $this->conexion->prepare("SELECT  
                                                            FORMAT(IFNULL(SUM(CANTIDAD_ENVASE_EXIMATERIAPRIMA),0),0,'de_DE') AS 'ENVASE', 
                                                            FORMAT(IFNULL(SUM(KILOS_NETO_EXIMATERIAPRIMA),0),2,'de_DE') AS 'NETO' 
                                                    FROM fruta_eximateriaprima
                                                    WHERE ESTADO_REGISTRO = 1
                                                    AND ESTADO = 2                                             
                                                    AND ID_EMPRESA = '" . $EMPRESA . "' 
                                                    AND ID_PLANTA = '" . $PLANTA . "'
                                                    AND ID_TEMPORADA = '" . $TEMPORADA . "' ;");
            $datos->execute();
            $resultado = $datos->fetchAll();

            //	print_r($resultado);
            //	VAR_DUMP($resultado);


            return $resultado;
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function obtenerTotalesProceso($IDPROCESO){
        try{            
            $datos=$this->conexion->prepare("SELECT IFNULL(SUM(CANTIDAD_ENVASE_EXIMATERIAPRIMA),0) AS 'ENVASE', 
                                                    IFNULL(SUM(KILOS_NETO_EXIMATERIAPRIMA),0) AS 'NETO' 
                                             FROM fruta_eximateriaprima
                                             WHERE ID_PROCESO = '".$IDPROCESO."' 
                                             AND  ESTADO_REGISTRO= 1;");
            $datos->execute();
            $resultado = $datos->fetchAll();
            
            //	print_r($resultado);
            //	VAR_DUMP($resultado);
            
            
            return $resultado;
        }catch(Exception $e){
            die($e->getMessage());
        }
        
    }
    public function obtenerTotalesProceso2($IDPROCESO){
        try{
            
            $datos=$this->conexion->prepare("SELECT FORMAT(IFNULL(SUM(CANTIDAD_ENVASE_EXIMATERIAPRIMA),0),0,'de_DE') AS 'ENVASE', 
                                                     FORMAT(IFNULL(SUM(KILOS_NETO_EXIMATERIAPRIMA),0),2,'de_DE') AS 'NETO' 
                                             FROM fruta_eximateriaprima
                                             WHERE ID_PROCESO = '".$IDPROCESO."'
                                             AND  ESTADO_REGISTRO= 1;");
            $datos->execute();
            $resultado = $datos->fetchAll();
            
            //	print_r($resultado);
            //	VAR_DUMP($resultado);
            
            
            return $resultado;
        }catch(Exception $e){
            die($e->getMessage());
        }
        
    }

    //CAMBIOS DE ESTADO Y SELECION    
    //CAMBIO DE ESTADO DE REGISTRO DEL REGISTRO

    public function actualizarSelecionarProcesoCambiarEstado(EXIMATERIAPRIMA $EXIMATERIAPRIMA)
    {
        try {
            $query = "
            UPDATE fruta_eximateriaprima SET
                MODIFICACION = SYSDATE(),
                ESTADO = 3,     
                ID_PROCESO = ?          
            WHERE ID_EXIMATERIAPRIMA= ?;";
            $this->conexion->prepare($query)
                ->execute(
                    array(
                        $EXIMATERIAPRIMA->__GET('ID_PROCESO'),
                        $EXIMATERIAPRIMA->__GET('ID_EXIMATERIAPRIMA')

                    )

                );
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
    //ACTUALIZAR ESTADO, ASOCIAR PROCESO, REGISTRO HISTORIAL PROCESO    
    public function actualizarDeselecionarProcesoCambiarEstado(EXIMATERIAPRIMA $EXIMATERIAPRIMA)
    {
        try {
            $query = "
            UPDATE fruta_eximateriaprima SET
                MODIFICACION = SYSDATE(), 
                ESTADO = 2,         
                ID_PROCESO = null          
            WHERE ID_EXIMATERIAPRIMA= ? ;";
            $this->conexion->prepare($query)
                ->execute(
                    array(
                        $EXIMATERIAPRIMA->__GET('ID_EXIMATERIAPRIMA')

                    )
                );
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }


    //CAMBIO A DESACTIVADO
    public function deshabilitarRecepcion(EXIMATERIAPRIMA $EXIMATERIAPRIMA)
    {

        try {
            $query = "
                    UPDATE fruta_eximateriaprima SET	
                            MODIFICACION = SYSDATE(),		
                            ESTADO_REGISTRO = 0                            
                    WHERE FOLIO_AUXILIAR_EXIMATERIAPRIMA= ? AND  ID_RECEPCION = ?;";
            $this->conexion->prepare($query)
                ->execute(
                    array(
                        $EXIMATERIAPRIMA->__GET('FOLIO_AUXILIAR_EXIMATERIAPRIMA'),
                        $EXIMATERIAPRIMA->__GET('ID_RECEPCION')
                    )

                );
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
    //CAMBIO A ACTIVADO
    public function habilitar(EXIMATERIAPRIMA $EXIMATERIAPRIMA)
    {
        try {
            $query = "
                UPDATE fruta_eximateriaprima SET	
                        MODIFICACION = SYSDATE(),		
                        ESTADO_REGISTRO = 1
                WHERE ID_EXIMATERIAPRIMA= ?;";
            $this->conexion->prepare($query)
                ->execute(
                    array(
                        $EXIMATERIAPRIMA->__GET('ID_EXIMATERIAPRIMA')
                    )

                );
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }



    //CAMBIO A ESTADO

    public function eliminadoRecepcion(EXIMATERIAPRIMA $EXIMATERIAPRIMA)
    {
        try {
            $query = "
                UPDATE fruta_eximateriaprima SET	
                        MODIFICACION = SYSDATE(),		
                        ESTADO = 0
                WHERE FOLIO_AUXILIAR_EXIMATERIAPRIMA= ? AND  ID_RECEPCION = ?;";
            $this->conexion->prepare($query)
                ->execute(
                    array(
                        $EXIMATERIAPRIMA->__GET('FOLIO_AUXILIAR_EXIMATERIAPRIMA'),
                        $EXIMATERIAPRIMA->__GET('ID_RECEPCION')
                    )

                );
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }



    public function eliminado(EXIMATERIAPRIMA $EXIMATERIAPRIMA)
    {
        try {
            $query = "
                UPDATE fruta_eximateriaprima SET	
                        MODIFICACION = SYSDATE(),		
                        ESTADO = 0
                WHERE ID_EXIMATERIAPRIMA= ?;";
            $this->conexion->prepare($query)
                ->execute(
                    array(
                        $EXIMATERIAPRIMA->__GET('ID_EXIMATERIAPRIMA')
                    )

                );
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }



    public function ingresando(EXIMATERIAPRIMA $EXIMATERIAPRIMA)
    {
        try {
            $query = "
                UPDATE fruta_eximateriaprima SET
                        MODIFICACION = SYSDATE(),			
                        ESTADO = 1
                WHERE ID_EXIMATERIAPRIMA= ?;";
            $this->conexion->prepare($query)
                ->execute(
                    array(
                        $EXIMATERIAPRIMA->__GET('ID_EXIMATERIAPRIMA')
                    )

                );
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }


    public function vigente(EXIMATERIAPRIMA $EXIMATERIAPRIMA)
    {
        try {
            $query = "
                UPDATE fruta_eximateriaprima SET
                        MODIFICACION = SYSDATE(),			
                        ESTADO = 2
                WHERE ID_EXIMATERIAPRIMA= ?;";
            $this->conexion->prepare($query)
                ->execute(
                    array(
                        $EXIMATERIAPRIMA->__GET('ID_EXIMATERIAPRIMA')
                    )

                );
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }



    public function enProceso(EXIMATERIAPRIMA $EXIMATERIAPRIMA)
    {
        try {
            $query = "
                UPDATE fruta_eximateriaprima SET	
                        MODIFICACION = SYSDATE(),			
                        ESTADO = 3
                WHERE ID_EXIMATERIAPRIMA= ?;";
            $this->conexion->prepare($query)
                ->execute(
                    array(
                        $EXIMATERIAPRIMA->__GET('ID_EXIMATERIAPRIMA')
                    )

                );
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function procesado(EXIMATERIAPRIMA $EXIMATERIAPRIMA)
    {
        try {
            $query = "
                UPDATE fruta_eximateriaprima SET
                        MODIFICACION = SYSDATE(),				
                        ESTADO = 4
                WHERE ID_EXIMATERIAPRIMA= ?;";
            $this->conexion->prepare($query)
                ->execute(
                    array(
                        $EXIMATERIAPRIMA->__GET('ID_EXIMATERIAPRIMA')
                    )

                );
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function repaletizando(EXIMATERIAPRIMA $EXIMATERIAPRIMA)
    {
        try {
            $query = "
                        UPDATE fruta_eximateriaprima SET	
                                MODIFICACION = SYSDATE(),			
                                ESTADO = 5
                        WHERE ID_EXIMATERIAPRIMA= ?;";
            $this->conexion->prepare($query)
                ->execute(
                    array(
                        $EXIMATERIAPRIMA->__GET('ID_EXIMATERIAPRIMA')
                    )

                );
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function repaletizado(EXIMATERIAPRIMA $EXIMATERIAPRIMA)
    {
        try {
            $query = "
                        UPDATE fruta_eximateriaprima SET	
                                MODIFICACION = SYSDATE(),			
                                ESTADO = 6
                        WHERE ID_EXIMATERIAPRIMA= ?;";
            $this->conexion->prepare($query)
                ->execute(
                    array(
                        $EXIMATERIAPRIMA->__GET('ID_EXIMATERIAPRIMA')
                    )

                );
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
    public function despachando(EXIMATERIAPRIMA $EXIMATERIAPRIMA)
    {
        try {
            $query = "
                        UPDATE fruta_eximateriaprima SET	
                                MODIFICACION = SYSDATE(),			
                                ESTADO = 7
                        WHERE ID_EXIMATERIAPRIMA= ?;";
            $this->conexion->prepare($query)
                ->execute(
                    array(
                        $EXIMATERIAPRIMA->__GET('ID_EXIMATERIAPRIMA')
                    )

                );
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function despachado(EXIMATERIAPRIMA $EXIMATERIAPRIMA)
    {
        try {
            $query = "
                        UPDATE fruta_eximateriaprima SET
                                MODIFICACION = SYSDATE(),				
                                ESTADO = 8
                        WHERE ID_EXIMATERIAPRIMA= ?;";
            $this->conexion->prepare($query)
                ->execute(
                    array(
                        $EXIMATERIAPRIMA->__GET('ID_EXIMATERIAPRIMA')
                    )

                );
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
    public function enTransito(EXIMATERIAPRIMA $EXIMATERIAPRIMA)
    {
        try {
            $query = "
                        UPDATE fruta_eximateriaprima SET
                                MODIFICACION = SYSDATE(),				
                                ESTADO = 9
                        WHERE ID_EXIMATERIAPRIMA= ?;";
            $this->conexion->prepare($query)
                ->execute(
                    array(
                        $EXIMATERIAPRIMA->__GET('ID_EXIMATERIAPRIMA')
                    )

                );
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
    public function rechazdo(EXIMATERIAPRIMA $EXIMATERIAPRIMA)
    {
        try {
            $query = "
                        UPDATE fruta_eximateriaprima SET
                                MODIFICACION = SYSDATE(),				
                                ESTADO = 10
                        WHERE ID_EXIMATERIAPRIMA= ?;";
            $this->conexion->prepare($query)
                ->execute(
                    array(
                        $EXIMATERIAPRIMA->__GET('ID_EXIMATERIAPRIMA')
                    )

                );
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }


    //OTRAS FUNCIONALIDADES

    //OBTENER EL ULTIMO FOLIO OCUPADO DEL DETALLE DE  RECEPCIONS


    public function obtenerFolio($IDFOLIO)
    {
        try {

            $datos = $this->conexion->prepare(" SELECT IFNULL(MAX(FOLIO_AUXILIAR_EXIMATERIAPRIMA),0) AS 'ULTIMOFOLIO'
                                                FROM fruta_eximateriaprima  
                                                WHERE  ID_FOLIO= '" . $IDFOLIO . "' 
                                                AND FOLIO_MANUAL = 0
                                                GROUP BY FOLIO_AUXILIAR_EXIMATERIAPRIMA
                                                ORDER BY ULTIMOFOLIO; ");
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
