<?php

//LLAMADA DE LOS ARCHIVOS NECESAROP PARA LA OPERACION DEL CONTROLADOR
//LLAMADA AL MODELO DE CLASE
include_once '../modelo/DICARGA.php';
//LLAMADA AL CONFIGURACION DE LA BASE DE DATOS
include_once '../config/BDCONFIG.php';

//INICIALIZAR VARIABLES
$HOST = "";
$DBNAME = "";
$USER = "";
$PASS = "";

//ESTRUCTURA DEL CONTROLADOR
class DICARGA_ADO
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
    public function listarDicarga()
    {
        try {

            $datos = $this->conexion->prepare("SELECT * FROM fruta_dicarga LIMIT 6;	");
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
    public function listarDicargaCBX()
    {
        try {

            $datos = $this->conexion->prepare("SELECT * FROM fruta_dicarga  WHERE ESTADO_REGISTRO = 1;	");
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

    public function listarDicarga2CBX()
    {
        try {

            $datos = $this->conexion->prepare("SELECT * FROM fruta_dicarga  WHERE ESTADO_REGISTRO = 0;	");
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
    public function verDicarga($ID)
    {
        try {

            $datos = $this->conexion->prepare("SELECT * FROM fruta_dicarga WHERE ID_DICARGA= '" . $ID . "';");
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
    public function agregarDicarga(DICARGA $DICARGA)
    {
        try {

            if ($DICARGA->__GET('ID_TMONEDA') == NULL) {
                $DICARGA->__SET('ID_TMONEDA', NULL);
            }

            $query =
                "INSERT INTO fruta_dicarga 
                                        (
                                            CANTIDAD_ENVASE_DICARGA, 
                                            KILOS_NETO_DICARGA, 
                                            KILOS_BRUTO_DICARGA, 
                                            PRECIO_US_DICARGA, 
                                            TOTAL_PRECIO_US_DICARGA, 
                                            ID_ESTANDAR,  
                                            ID_TCALIBRE, 
                                            ID_TMONEDA, 
                                            ID_ICARGA, 
                                            INGRESO, 
                                            MODIFICACION, 
                                            ESTADO, 
                                            ESTADO_REGISTRO
                                        ) 
            VALUES
	       	(?, ?, ?, ?, ?, ?, ?, ?, ?, SYSDATE(),SYSDATE(), 1, 1);";
            $this->conexion->prepare($query)
                ->execute(
                    array(

                        $DICARGA->__GET('CANTIDAD_ENVASE_DICARGA'),
                        $DICARGA->__GET('KILOS_NETO_DICARGA'),
                        $DICARGA->__GET('KILOS_BRUTO_DICARGA'),
                        $DICARGA->__GET('PRECIO_US_DICARGA'),
                        $DICARGA->__GET('TOTAL_PRECIO_US_DICARGA'),
                        $DICARGA->__GET('ID_ESTANDAR'),
                        $DICARGA->__GET('ID_TCALIBRE'),
                        $DICARGA->__GET('ID_TMONEDA'),
                        $DICARGA->__GET('ID_ICARGA')

                    )

                );
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    //ELIMINAR FILA, NO SE UTILIZA
    public function eliminarDicarga($id)
    {
        try {
            $sql = "DELETE FROM fruta_dicarga WHERE ID_DICARGA=" . $id . ";";
            $statement = $this->conexion->prepare($sql);
            $statement->execute();
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }


    //ACTUALIZAR INFORMACION DE LA FILA
    public function actualizarDicarga(DICARGA $DICARGA)
    {

        
        if ($DICARGA->__GET('ID_TMONEDA') == NULL) {
            $DICARGA->__SET('ID_TMONEDA', NULL);
        }
        try {
            $query = "
                    UPDATE fruta_dicarga SET
                        CANTIDAD_ENVASE_DICARGA = ?,
                        KILOS_NETO_DICARGA = ?,
                        KILOS_BRUTO_DICARGA = ?,
                        PRECIO_US_DICARGA = ?,
                        TOTAL_PRECIO_US_DICARGA = ?,
                        ID_ESTANDAR = ?,
                        ID_TCALIBRE= ?,
                        ID_TMONEDA= ?,
                        ID_ICARGA= ?
                    WHERE ID_DICARGA = ?  ;";
            $this->conexion->prepare($query)
                ->execute(
                    array(

                        $DICARGA->__GET('CANTIDAD_ENVASE_DICARGA'),
                        $DICARGA->__GET('KILOS_NETO_DICARGA'),
                        $DICARGA->__GET('KILOS_BRUTO_DICARGA'),
                        $DICARGA->__GET('PRECIO_US_DICARGA'),
                        $DICARGA->__GET('TOTAL_PRECIO_US_DICARGA'),
                        $DICARGA->__GET('ID_ESTANDAR'),
                        $DICARGA->__GET('ID_TCALIBRE'),
                        $DICARGA->__GET('ID_TMONEDA'),
                        $DICARGA->__GET('ID_ICARGA'),
                        $DICARGA->__GET('ID_DICARGA')

                    )

                );
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
    //FUNCIONES ESPECIALIZADAS 


    //LISTAR POR INSTRUCTIVO CARGA
    public function buscarPorIcarga($IDICARGA)
    {
        try {

            $datos = $this->conexion->prepare("SELECT *, 
                                                IFNULL(CANTIDAD_ENVASE_DICARGA,0)AS 'ENVASE',
                                                IFNULL(KILOS_NETO_DICARGA,0)AS 'NETO',
                                                IFNULL(KILOS_BRUTO_DICARGA,0) AS 'BRUTO',
                                                IFNULL(PRECIO_US_DICARGA,0) AS 'US',
                                                IFNULL(TOTAL_PRECIO_US_DICARGA,0) AS 'TOTALUS'
            
                                                 FROM fruta_dicarga 
                                                WHERE ID_ICARGA = '" . $IDICARGA . "'  
                                                AND ESTADO_REGISTRO = 1;	");
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
    
    public function buscarPorIcarga2($IDICARGA)
    {
        try {

            $datos = $this->conexion->prepare("SELECT *, 
                                                    FORMAT(IFNULL(CANTIDAD_ENVASE_DICARGA,0),0,'de_DE') AS 'ENVASE',
                                                    FORMAT(IFNULL(KILOS_NETO_DICARGA,0),2,'de_DE') AS 'NETO',
                                                    FORMAT(IFNULL(KILOS_BRUTO_DICARGA,0),2,'de_DE') AS 'BRUTO',
                                                    FORMAT(IFNULL(PRECIO_US_DICARGA,0),2,'de_DE') AS 'US',
                                                    FORMAT(IFNULL(TOTAL_PRECIO_US_DICARGA,0),2,'de_DE') AS 'TOTALUS'
                                                FROM fruta_dicarga 
                                                WHERE ID_ICARGA = '" . $IDICARGA . "'  
                                                AND ESTADO_REGISTRO = 1;	");
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
    public function totalesPorIcarga($IDICARGA)
    {
        try {

            $datos = $this->conexion->prepare("SELECT 
                                            IFNULL(SUM(CANTIDAD_ENVASE_DICARGA),0) AS 'ENVASE',
                                            IFNULL(SUM(KILOS_NETO_DICARGA),0) AS 'NETO',
                                            IFNULL(SUM(KILOS_BRUTO_DICARGA),0) AS 'BRUTO',
                                            IFNULL(SUM(TOTAL_PRECIO_US_DICARGA),0) AS 'TOTALUS'
                                         FROM fruta_dicarga 
                                         WHERE ID_ICARGA = '" . $IDICARGA . "'
                                               AND ESTADO_REGISTRO = 1;	");
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

    public function totalesPorIcarga2($IDICARGA)
    {
        try {

            $datos = $this->conexion->prepare("SELECT 
                                            FORMAT(IFNULL(SUM(CANTIDAD_ENVASE_DICARGA),0),0,'de_DE') AS 'ENVASE',
                                            FORMAT(IFNULL(SUM(KILOS_NETO_DICARGA),0),2,'de_DE') AS 'NETO',
                                            FORMAT(IFNULL(SUM(KILOS_BRUTO_DICARGA),0),2,'de_DE') AS 'BRUTO',
                                            FORMAT(IFNULL(SUM(TOTAL_PRECIO_US_DICARGA),0),2,'de_DE') AS 'TOTALUS'
                                         FROM fruta_dicarga 
                                         WHERE ID_ICARGA = '" . $IDICARGA . "'   
                                               AND ESTADO_REGISTRO = 1;	");
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

    //OTRAS FUNCIONES
    //CAMBIO DE ESTADO DE LA FILA
    //CAMBIO A DESACTIVADO
    public function deshabilitar(DICARGA $DICARGA)
    {

        try {
            $query = "
		UPDATE fruta_dicarga SET			
            ESTADO_REGISTRO = 0
		WHERE ID_DICARGA= ?;";
            $this->conexion->prepare($query)
                ->execute(
                    array(
                        $DICARGA->__GET('ID_DICARGA')
                    )

                );
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
    //CAMBIO A ACTIVADO
    public function habilitar(DICARGA $DICARGA)
    {

        try {
            $query = "
		UPDATE fruta_dicarga SET			
            ESTADO_REGISTRO = 1
		WHERE ID_DICARGA= ?;";
            $this->conexion->prepare($query)
                ->execute(
                    array(
                        $DICARGA->__GET('ID_DICARGA')
                    )

                );
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }


    //CAMBIO DE ESTADO DE LA FILA

    public function cerrado(DICARGA $DICARGA)
    {

        try {
            $query = "
		UPDATE fruta_dicarga SET			
            ESTADO = 0
		WHERE ID_DICARGA= ?;";
            $this->conexion->prepare($query)
                ->execute(
                    array(
                        $DICARGA->__GET('ID_DICARGA')
                    )

                );
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
    public function abierto(DICARGA $DICARGA)
    {

        try {
            $query = "
		UPDATE fruta_dicarga SET			
            ESTADO = 1
		WHERE ID_DICARGA= ?;";
            $this->conexion->prepare($query)
                ->execute(
                    array(
                        $DICARGA->__GET('ID_DICARGA')
                    )

                );
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
}
