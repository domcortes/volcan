<?php

//LLAMADA DE LOS ARCHIVOS NECESAROP PARA LA OPERACION DEL CONTROLADOR
//LLAMADA AL MODELO DE CLASE
include_once '../../assest/modelo/DVALOR.php';
//LLAMADA AL CONFIGURACION DE LA BASE DE DATOS
include_once '../../assest/config/BDCONFIG.php';

//INICIALIZAR VARIABLES
$HOST = "";
$DBNAME = "";
$USER = "";
$PASS = "";

//ESTRUCTURA DEL CONTROLADOR
class DVALOR_ADO
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
    public function listarDvalor()
    {
        try {

            $datos = $this->conexion->prepare("SELECT * FROM liquidacion_dvalor LIMIT 6;	");
            $datos->execute();
            $resultado = $datos->fetchAll();
            $datos=null;

            //	print_r($resultado);
            //	var_dump($resultado);


            return $resultado;
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
    //LISTAR TODO
    public function listarDvalorCBX()
    {
        try {

            $datos = $this->conexion->prepare("SELECT * FROM liquidacion_dvalor  WHERE ESTADO_REGISTRO = 1;	");
            $datos->execute();
            $resultado = $datos->fetchAll();
            $datos=null;

            //	print_r($resultado);
            //	var_dump($resultado);


            return $resultado;
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function listarDvalor2CBX()
    {
        try {

            $datos = $this->conexion->prepare("SELECT * FROM liquidacion_dvalor  WHERE ESTADO_REGISTRO = 0;	");
            $datos->execute();
            $resultado = $datos->fetchAll();
            $datos=null;

            //	print_r($resultado);
            //	var_dump($resultado);


            return $resultado;
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
    //VER LA INFORMACION RELACIONADA EN BASE AL ID INGRESADO A LA FUNCION
    public function verDvalor($ID)
    {
        try {

            $datos = $this->conexion->prepare("SELECT * FROM liquidacion_dvalor WHERE ID_DVALOR= '" . $ID . "';");
            $datos->execute();
            $resultado = $datos->fetchAll();
            $datos=null;

            //	print_r($resultado);
            //	var_dump($resultado);


            return $resultado;
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    //REGISTRO DE UNA NUEVA FILA    
    public function agregarDvalor(DVALOR $DVALOR)
    {
        try {

            if ($DVALOR->__GET('ID_ECOMERCIAL') == NULL) {
                $DVALOR->__SET('ID_ECOMERCIAL', NULL);
            }
            $query =
                "INSERT INTO liquidacion_dvalor 
                                        (
                                            VALOR_DVALOR,  
                                            COMERCIAL,  

                                            ID_ECOMERCIAL,  
                                            ID_TITEM,  
                                            
                                            ID_USUARIOI,  
                                            ID_USUARIOM,  
                                            ID_VALOR,

                                            INGRESO, 
                                            MODIFICACION, 
                                            ESTADO, 
                                            ESTADO_REGISTRO
                                        ) 
            VALUES
	       	(?, ?, ?, ?,  ?, ?, ?, SYSDATE(),SYSDATE(), 1, 1);";
            $this->conexion->prepare($query)
                ->execute(
                    array(
                        $DVALOR->__GET('VALOR_DVALOR'),
                        $DVALOR->__GET('COMERCIAL'),
                        $DVALOR->__GET('ID_ECOMERCIAL'),
                        $DVALOR->__GET('ID_TITEM'),
                        $DVALOR->__GET('ID_USUARIOI'),
                        $DVALOR->__GET('ID_USUARIOM'),
                        $DVALOR->__GET('ID_VALOR')

                    )

                );
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    //ELIMINAR FILA, NO SE UTILIZA
    public function eliminarDvalor($id)
    {
        try {
            $sql = "DELETE FROM liquidacion_dvalor WHERE ID_DVALOR=" . $id . ";";
            $statement = $this->conexion->prepare($sql);
            $statement->execute();
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }


    //ACTUALIZAR INFORMACION DE LA FILA
    public function actualizarDvalor(DVALOR $DVALOR)
    {

        try {
            if ($DVALOR->__GET('ID_ECOMERCIAL') == NULL) {
                $DVALOR->__SET('ID_ECOMERCIAL', NULL);
            }
            echo $DVALOR->__GET('COMERCIAL');
            $query = "
                    UPDATE liquidacion_dvalor SET
                        MODIFICACION = SYSDATE(),

                        VALOR_DVALOR = ?,    
                        COMERCIAL= ?,   

                        ID_ECOMERCIAL= ?,                       
                        ID_TITEM= ?,
                        ID_USUARIOM= ?,
                        ID_VALOR= ?
                        
                    WHERE ID_DVALOR = ?  ;";
            $this->conexion->prepare($query)
                ->execute(
                    array(

                        $DVALOR->__GET('VALOR_DVALOR'),
                        $DVALOR->__GET('COMERCIAL'),

                        $DVALOR->__GET('ID_ECOMERCIAL'),
                        $DVALOR->__GET('ID_TITEM'),
                        $DVALOR->__GET('ID_USUARIOM'),
                        $DVALOR->__GET('ID_VALOR'),

                        $DVALOR->__GET('ID_DVALOR')

                    )

                );
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
    //FUNCIONES ESPECIALIZADAS 


    //LISTAR POR INSTRUCTIVO CARGA
    public function buscarPorValor($IDVALOR)
    {
        try {

            $datos = $this->conexion->prepare("SELECT * FROM liquidacion_dvalor 
                                                WHERE ID_VALOR = '" . $IDVALOR . "'  
                                                AND ESTADO_REGISTRO = 1;	");
            $datos->execute();
            $resultado = $datos->fetchAll();
            $datos=null;

            //	print_r($resultado);
            //	var_dump($resultado);


            return $resultado;
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function buscarPorValorItem($IDVALOR, $IDTITEM)
    {
        try {

            $datos = $this->conexion->prepare(" SELECT * 
                                                FROM liquidacion_dvalor 
                                                WHERE ID_VALOR = '" . $IDVALOR . "'  
                                                AND ID_TITEM = '" . $IDTITEM . "'  
                                                AND ESTADO_REGISTRO = 1
                                                ;	");
            $datos->execute();
            $resultado = $datos->fetchAll();
            $datos=null;

            //	print_r($resultado);
            //	var_dump($resultado);


            return $resultado;
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function contarPorValor($IDVALOR)
    {
        try {

            $datos = $this->conexion->prepare("SELECT IFNULL(COUNT(ID_DVALOR),0) AS 'CONTEO'
                                                FROM liquidacion_dvalor 
                                                WHERE ID_VALOR = '" . $IDVALOR . "'  
                                                AND ESTADO_REGISTRO = 1;	");
            $datos->execute();
            $resultado = $datos->fetchAll();
            $datos=null;

            //	print_r($resultado);
            //	var_dump($resultado);


            return $resultado;
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    //OTRAS FUNCIONES
    //CAMBIO DE ESTADO DE LA FILA
    //CAMBIO A DESACTIVADO
    public function deshabilitar(DVALOR $DVALOR)
    {

        try {
            $query = "
                UPDATE liquidacion_dvalor SET			
                    ESTADO_REGISTRO = 0
                WHERE ID_DVALOR= ?;";
            $this->conexion->prepare($query)
                ->execute(
                    array(
                        $DVALOR->__GET('ID_DVALOR')
                    )

                );
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
    //CAMBIO A ACTIVADO
    public function habilitar(DVALOR $DVALOR)
    {

        try {
            $query = "
                UPDATE liquidacion_dvalor SET			
                    ESTADO_REGISTRO = 1
                WHERE ID_DVALOR= ?;";
            $this->conexion->prepare($query)
                ->execute(
                    array(
                        $DVALOR->__GET('ID_DVALOR')
                    )

                );
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }


    //CAMBIO DE ESTADO DE LA FILA

    public function cerrado(DVALOR $DVALOR)
    {

        try {
            $query = "
                UPDATE liquidacion_dvalor SET			
                    ESTADO = 0
                WHERE ID_DVALOR= ?;";
            $this->conexion->prepare($query)
                ->execute(
                    array(
                        $DVALOR->__GET('ID_DVALOR')
                    )

                );
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
    public function abierto(DVALOR $DVALOR)
    {

        try {
            $query = "
                UPDATE liquidacion_dvalor SET			
                    ESTADO = 1
                WHERE ID_DVALOR= ?;";
            $this->conexion->prepare($query)
                ->execute(
                    array(
                        $DVALOR->__GET('ID_DVALOR')
                    )

                );
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
}
