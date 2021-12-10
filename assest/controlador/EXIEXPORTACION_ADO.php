<?php

//LLAMADA DE LOS ARCHIVOS NECESAROP PARA LA OPERACION DEL CONTROLADOR
//LLAMADA AL MODELO DE CLASE
include_once '../../assest/modelo/EXIEXPORTACION.php';
//LLAMADA AL CONFIGURACION DE LA BASE DE DATOS
include_once '../../assest/config/BDCONFIG.php';

//INICIALIZAR VARIABLES
$HOST = "";
$DBNAME = "";
$USER = "";
$PASS = "";

//ESTRUCTURA DEL CONTROLADOR
class EXIEXPORTACION_ADO
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


    public function listarExiexportacion()
    {
        try {

            $datos = $this->conexion->prepare("SELECT * FROM fruta_exiexportacion limit 8;	");
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


    public function listarExiexportacionCBX()
    {
        try {

            $datos = $this->conexion->prepare("SELECT * FROM fruta_exiexportacion WHERE ESTADO_REGISTRO = 1;	");
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



    public function listarExiexportacion2CBX()
    {
        try {

            $datos = $this->conexion->prepare("SELECT * FROM fruta_exiexportacion WHERE ESTADO_REGISTRO = 0;	");
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
    public function agregarExiexportacionRecepcion(EXIEXPORTACION $EXIEXPORTACION)
    {
        try {
            if ($EXIEXPORTACION->__GET('ID_PLANTA2') == NULL) {
                $EXIEXPORTACION->__SET('ID_PLANTA2', NULL);
            }
            if ($EXIEXPORTACION->__GET('ID_TCATEGORIA') == NULL) {
                $EXIEXPORTACION->__SET('ID_TCATEGORIA', NULL);
            }
            if ($EXIEXPORTACION->__GET('ID_TCOLOR') == NULL) {
                $EXIEXPORTACION->__SET('ID_TCOLOR', NULL);
            }
            $query =
                "INSERT INTO fruta_exiexportacion (
                                                    FOLIO_EXIEXPORTACION,
                                                    FOLIO_AUXILIAR_EXIEXPORTACION,
                                                    FOLIO_MANUAL,
                                                    FECHA_EMBALADO_EXIEXPORTACION,
                                                    CANTIDAD_ENVASE_EXIEXPORTACION,
                                                    KILOS_NETO_EXIEXPORTACION,
                                                    KILOS_BRUTO_EXIEXPORTACION,
                                                    PDESHIDRATACION_EXIEXPORTACION,
                                                    KILOS_DESHIRATACION_EXIEXPORTACION,
                                                    OBSERVACION_EXIESPORTACION,
                                                    ALIAS_DINAMICO_FOLIO_EXIESPORTACION,
                                                    ALIAS_ESTATICO_FOLIO_EXIESPORTACION,
                                                    FECHA_RECEPCION,
                                                    STOCK, 
                                                    EMBOLSADO, 
                                                    GASIFICADO, 
                                                    PREFRIO,
                                                    ID_TCALIBRE,
                                                    ID_TEMBALAJE,
                                                    ID_TMANEJO,
                                                    ID_TCATEGORIA,
                                                    ID_TCOLOR,
                                                    ID_FOLIO,
                                                    ID_ESTANDAR, 
                                                    ID_PRODUCTOR,
                                                    ID_VESPECIES,
                                                    ID_EMPRESA, 
                                                    ID_PLANTA, 
                                                    ID_TEMPORADA, 
                                                    ID_RECEPCION,
                                                    ID_PLANTA2,
                                                    INGRESO,
                                                    MODIFICACION,
                                                    ESTADO,  
                                                    ESTADO_REGISTRO
                                                 ) VALUES
	       	( ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?,?, ?, ?, ?, ?, ?, SYSDATE(),SYSDATE(), 1, 1);";
            $this->conexion->prepare($query)
                ->execute(
                    array(

                        $EXIEXPORTACION->__GET('FOLIO_EXIEXPORTACION'),
                        $EXIEXPORTACION->__GET('FOLIO_AUXILIAR_EXIEXPORTACION'),
                        $EXIEXPORTACION->__GET('FOLIO_MANUAL'),
                        $EXIEXPORTACION->__GET('FECHA_EMBALADO_EXIEXPORTACION'),
                        $EXIEXPORTACION->__GET('CANTIDAD_ENVASE_EXIEXPORTACION'),
                        $EXIEXPORTACION->__GET('KILOS_NETO_EXIEXPORTACION'),
                        $EXIEXPORTACION->__GET('KILOS_BRUTO_EXIEXPORTACION'),
                        $EXIEXPORTACION->__GET('PDESHIDRATACION_EXIEXPORTACION'),
                        $EXIEXPORTACION->__GET('KILOS_DESHIRATACION_EXIEXPORTACION'),
                        $EXIEXPORTACION->__GET('OBSERVACION_EXIESPORTACION'),
                        $EXIEXPORTACION->__GET('ALIAS_DINAMICO_FOLIO_EXIESPORTACION'),
                        $EXIEXPORTACION->__GET('ALIAS_ESTATICO_FOLIO_EXIESPORTACION'),
                        $EXIEXPORTACION->__GET('FECHA_RECEPCION'),
                        $EXIEXPORTACION->__GET('STOCK'),
                        $EXIEXPORTACION->__GET('EMBOLSADO'),
                        $EXIEXPORTACION->__GET('GASIFICADO'),
                        $EXIEXPORTACION->__GET('PREFRIO'),
                        $EXIEXPORTACION->__GET('ID_TCALIBRE'),
                        $EXIEXPORTACION->__GET('ID_TEMBALAJE'),
                        $EXIEXPORTACION->__GET('ID_TMANEJO'),
                        $EXIEXPORTACION->__GET('ID_TCATEGORIA'),
                        $EXIEXPORTACION->__GET('ID_TCOLOR'),
                        $EXIEXPORTACION->__GET('ID_FOLIO'),
                        $EXIEXPORTACION->__GET('ID_ESTANDAR'),
                        $EXIEXPORTACION->__GET('ID_PRODUCTOR'),
                        $EXIEXPORTACION->__GET('ID_VESPECIES'),
                        $EXIEXPORTACION->__GET('ID_EMPRESA'),
                        $EXIEXPORTACION->__GET('ID_PLANTA'),
                        $EXIEXPORTACION->__GET('ID_TEMPORADA'),
                        $EXIEXPORTACION->__GET('ID_RECEPCION'),
                        $EXIEXPORTACION->__GET('ID_PLANTA2')
                    )

                );
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }


    public function agregarExiexportacionProceso(EXIEXPORTACION $EXIEXPORTACION)
    {
        try {

            $query =
                "INSERT INTO fruta_exiexportacion (
                                                    FOLIO_EXIEXPORTACION,
                                                    FOLIO_AUXILIAR_EXIEXPORTACION,
                                                    FOLIO_MANUAL,
                                                    FECHA_EMBALADO_EXIEXPORTACION,
                                                    CANTIDAD_ENVASE_EXIEXPORTACION,

                                                    KILOS_NETO_EXIEXPORTACION,
                                                    KILOS_BRUTO_EXIEXPORTACION,
                                                    PDESHIDRATACION_EXIEXPORTACION,
                                                    KILOS_DESHIRATACION_EXIEXPORTACION,
                                                    ALIAS_DINAMICO_FOLIO_EXIESPORTACION,

                                                    ALIAS_ESTATICO_FOLIO_EXIESPORTACION,
                                                    FECHA_PROCESO,
                                                    EMBOLSADO, 
                                                    ID_TCALIBRE,
                                                    ID_TEMBALAJE,

                                                    ID_TMANEJO,
                                                    ID_FOLIO,
                                                    ID_ESTANDAR, 
                                                    ID_PRODUCTOR,
                                                    ID_VESPECIES,

                                                    ID_EMPRESA, 
                                                    ID_PLANTA2, 
                                                    ID_PLANTA, 
                                                    ID_TEMPORADA, 
                                                    ID_PROCESO,

                                                    INGRESO,
                                                    MODIFICACION,
                                                    ESTADO,  
                                                    ESTADO_REGISTRO
                                                 ) VALUES
	       	( ?, ?, ?, ?, ?,   ?, ?, ?, ?, ?,   ?, ?, ?, ?, ?,   ?, ?, ?, ?, ?,  ?, ?, ?, ?, ?,  SYSDATE(),SYSDATE(), 2, 1);";
            $this->conexion->prepare($query)
                ->execute(
                    array(
                        $EXIEXPORTACION->__GET('FOLIO_EXIEXPORTACION'),
                        $EXIEXPORTACION->__GET('FOLIO_AUXILIAR_EXIEXPORTACION'),
                        $EXIEXPORTACION->__GET('FOLIO_MANUAL'),
                        $EXIEXPORTACION->__GET('FECHA_EMBALADO_EXIEXPORTACION'),
                        $EXIEXPORTACION->__GET('CANTIDAD_ENVASE_EXIEXPORTACION'),

                        $EXIEXPORTACION->__GET('KILOS_NETO_EXIEXPORTACION'),
                        $EXIEXPORTACION->__GET('KILOS_BRUTO_EXIEXPORTACION'),
                        $EXIEXPORTACION->__GET('PDESHIDRATACION_EXIEXPORTACION'),
                        $EXIEXPORTACION->__GET('KILOS_DESHIRATACION_EXIEXPORTACION'),
                        $EXIEXPORTACION->__GET('ALIAS_DINAMICO_FOLIO_EXIESPORTACION'),

                        $EXIEXPORTACION->__GET('ALIAS_ESTATICO_FOLIO_EXIESPORTACION'),
                        $EXIEXPORTACION->__GET('FECHA_PROCESO'),
                        $EXIEXPORTACION->__GET('EMBOLSADO'),
                        $EXIEXPORTACION->__GET('ID_TCALIBRE'),
                        $EXIEXPORTACION->__GET('ID_TEMBALAJE'),

                        $EXIEXPORTACION->__GET('ID_TMANEJO'),
                        $EXIEXPORTACION->__GET('ID_FOLIO'),
                        $EXIEXPORTACION->__GET('ID_ESTANDAR'),
                        $EXIEXPORTACION->__GET('ID_PRODUCTOR'),
                        $EXIEXPORTACION->__GET('ID_VESPECIES'),

                        $EXIEXPORTACION->__GET('ID_EMPRESA'),
                        $EXIEXPORTACION->__GET('ID_PLANTA2'),
                        $EXIEXPORTACION->__GET('ID_PLANTA'),
                        $EXIEXPORTACION->__GET('ID_TEMPORADA'),
                        $EXIEXPORTACION->__GET('ID_PROCESO')
                    )

                );
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function agregarExiexportacionReembalaje(EXIEXPORTACION $EXIEXPORTACION)
    {
        try {

            $query =
                "INSERT INTO fruta_exiexportacion (
                                                    FOLIO_EXIEXPORTACION,
                                                    FOLIO_AUXILIAR_EXIEXPORTACION,
                                                    FOLIO_MANUAL,
                                                    FECHA_EMBALADO_EXIEXPORTACION,
                                                    CANTIDAD_ENVASE_EXIEXPORTACION,

                                                    KILOS_NETO_EXIEXPORTACION,
                                                    KILOS_BRUTO_EXIEXPORTACION,
                                                    PDESHIDRATACION_EXIEXPORTACION,
                                                    KILOS_DESHIRATACION_EXIEXPORTACION,
                                                    ALIAS_DINAMICO_FOLIO_EXIESPORTACION,

                                                    ALIAS_ESTATICO_FOLIO_EXIESPORTACION,
                                                    FECHA_REEMBALAJE,
                                                    EMBOLSADO, 
                                                    ID_TCALIBRE,
                                                    ID_TEMBALAJE,

                                                    ID_TMANEJO,
                                                    ID_FOLIO,
                                                    ID_ESTANDAR, 
                                                    ID_PRODUCTOR,
                                                    ID_VESPECIES,

                                                    ID_EMPRESA, 
                                                    ID_PLANTA2, 
                                                    ID_PLANTA, 
                                                    ID_TEMPORADA, 
                                                    ID_REEMBALAJE,

                                                    INGRESO,
                                                    MODIFICACION,
                                                    ESTADO,  
                                                    ESTADO_REGISTRO
                                                 ) VALUES
	       	( ?, ?, ?, ?, ?,   ?, ?, ?, ?, ?,   ?, ?, ?, ?, ?,   ?, ?, ?, ?, ?,  ?, ?, ?, ?, ?,    SYSDATE(),SYSDATE(), 1, 1);";
            $this->conexion->prepare($query)
                ->execute(
                    array(
                        $EXIEXPORTACION->__GET('FOLIO_EXIEXPORTACION'),
                        $EXIEXPORTACION->__GET('FOLIO_AUXILIAR_EXIEXPORTACION'),
                        $EXIEXPORTACION->__GET('FOLIO_MANUAL'),
                        $EXIEXPORTACION->__GET('FECHA_EMBALADO_EXIEXPORTACION'),
                        $EXIEXPORTACION->__GET('CANTIDAD_ENVASE_EXIEXPORTACION'),

                        $EXIEXPORTACION->__GET('KILOS_NETO_EXIEXPORTACION'),
                        $EXIEXPORTACION->__GET('KILOS_BRUTO_EXIEXPORTACION'),
                        $EXIEXPORTACION->__GET('PDESHIDRATACION_EXIEXPORTACION'),
                        $EXIEXPORTACION->__GET('KILOS_DESHIRATACION_EXIEXPORTACION'),
                        $EXIEXPORTACION->__GET('ALIAS_DINAMICO_FOLIO_EXIESPORTACION'),

                        $EXIEXPORTACION->__GET('ALIAS_ESTATICO_FOLIO_EXIESPORTACION'),
                        $EXIEXPORTACION->__GET('FECHA_REEMBALAJE'),
                        $EXIEXPORTACION->__GET('EMBOLSADO'),
                        $EXIEXPORTACION->__GET('ID_TCALIBRE'),
                        $EXIEXPORTACION->__GET('ID_TEMBALAJE'),

                        $EXIEXPORTACION->__GET('ID_TMANEJO'),
                        $EXIEXPORTACION->__GET('ID_FOLIO'),
                        $EXIEXPORTACION->__GET('ID_ESTANDAR'),
                        $EXIEXPORTACION->__GET('ID_PRODUCTOR'),
                        $EXIEXPORTACION->__GET('ID_VESPECIES'),

                        $EXIEXPORTACION->__GET('ID_EMPRESA'),
                        $EXIEXPORTACION->__GET('ID_PLANTA2'),
                        $EXIEXPORTACION->__GET('ID_PLANTA'),
                        $EXIEXPORTACION->__GET('ID_TEMPORADA'),
                        $EXIEXPORTACION->__GET('ID_REEMBALAJE')
                    )

                );
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }



    public function agregarExiexportacionGuia(EXIEXPORTACION $EXIEXPORTACION)
    {
        try {

            if ($EXIEXPORTACION->__GET('ID_TCATEGORIA') == NULL) {
                $EXIEXPORTACION->__SET('ID_TCATEGORIA', NULL);
            }
            if ($EXIEXPORTACION->__GET('ID_TCOLOR') == NULL) {
                $EXIEXPORTACION->__SET('ID_TCOLOR', NULL);
            }
            $query =
                "INSERT INTO fruta_exiexportacion (                    
                                                    FOLIO_EXIEXPORTACION,
                                                    FOLIO_AUXILIAR_EXIEXPORTACION,
                                                    FOLIO_MANUAL,
                                                    FECHA_EMBALADO_EXIEXPORTACION,
                                                    CANTIDAD_ENVASE_EXIEXPORTACION,
                                                    KILOS_NETO_EXIEXPORTACION,
                                                    KILOS_BRUTO_EXIEXPORTACION,
                                                    PDESHIDRATACION_EXIEXPORTACION,
                                                    KILOS_DESHIRATACION_EXIEXPORTACION,
                                                    OBSERVACION_EXIESPORTACION,
                                                    ALIAS_DINAMICO_FOLIO_EXIESPORTACION,
                                                    ALIAS_ESTATICO_FOLIO_EXIESPORTACION,                                               
                                                    STOCK, 
                                                    EMBOLSADO, 
                                                    GASIFICADO, 
                                                    PREFRIO,
                                                    TESTADOSAG,
                                                    VGM,
                                                    INGRESO,
                                                    ID_TCALIBRE,  
                                                    ID_TEMBALAJE,
                                                    ID_TMANEJO,
                                                    ID_TCATEGORIA,
                                                    ID_TCOLOR,
                                                    ID_FOLIO,
                                                    ID_ESTANDAR,
                                                    ID_PRODUCTOR,   
                                                    ID_VESPECIES,
                                                    ID_PLANTA2,    
                                                    ID_DESPACHO2,
                                                    ID_EMPRESA,
                                                    ID_PLANTA,
                                                    ID_TEMPORADA, 
                                                    MODIFICACION,
                                                    ESTADO,  
                                                    ESTADO_REGISTRO
                                                 ) VALUES
	       	( ?, ?, ?, ?, ?,   ?, ?, ?, ?, ?,   ?, ?, ?, ?, ?,   ?, ?, ?, ?, ?,?, ?,   ?, ?, ?, ?, ?,   ?, ?, ?, ?, ?,   ?,     SYSDATE(), 2, 1);";
            $this->conexion->prepare($query)
                ->execute(
                    array(

                        $EXIEXPORTACION->__GET('FOLIO_EXIEXPORTACION'),
                        $EXIEXPORTACION->__GET('FOLIO_AUXILIAR_EXIEXPORTACION'),
                        $EXIEXPORTACION->__GET('FOLIO_MANUAL'),
                        $EXIEXPORTACION->__GET('FECHA_EMBALADO_EXIEXPORTACION'),
                        $EXIEXPORTACION->__GET('CANTIDAD_ENVASE_EXIEXPORTACION'),
                        $EXIEXPORTACION->__GET('KILOS_NETO_EXIEXPORTACION'),
                        $EXIEXPORTACION->__GET('KILOS_BRUTO_EXIEXPORTACION'),
                        $EXIEXPORTACION->__GET('PDESHIDRATACION_EXIEXPORTACION'),
                        $EXIEXPORTACION->__GET('KILOS_DESHIRATACION_EXIEXPORTACION'),
                        $EXIEXPORTACION->__GET('OBSERVACION_EXIESPORTACION'),
                        $EXIEXPORTACION->__GET('ALIAS_DINAMICO_FOLIO_EXIESPORTACION'),
                        $EXIEXPORTACION->__GET('ALIAS_ESTATICO_FOLIO_EXIESPORTACION'),
                        $EXIEXPORTACION->__GET('STOCK'),
                        $EXIEXPORTACION->__GET('EMBOLSADO'),
                        $EXIEXPORTACION->__GET('GASIFICADO'),
                        $EXIEXPORTACION->__GET('PREFRIO'),
                        $EXIEXPORTACION->__GET('TESTADOSAG'),
                        $EXIEXPORTACION->__GET('VGM'),
                        $EXIEXPORTACION->__GET('INGRESO'),
                        $EXIEXPORTACION->__GET('ID_TCALIBRE'),
                        $EXIEXPORTACION->__GET('ID_TEMBALAJE'),
                        $EXIEXPORTACION->__GET('ID_TMANEJO'),
                        $EXIEXPORTACION->__GET('ID_TCATEGORIA'),
                        $EXIEXPORTACION->__GET('ID_TCOLOR'),
                        $EXIEXPORTACION->__GET('ID_FOLIO'),
                        $EXIEXPORTACION->__GET('ID_ESTANDAR'),
                        $EXIEXPORTACION->__GET('ID_PRODUCTOR'),
                        $EXIEXPORTACION->__GET('ID_VESPECIES'),
                        $EXIEXPORTACION->__GET('ID_PLANTA2'),
                        $EXIEXPORTACION->__GET('ID_DESPACHO2'),
                        $EXIEXPORTACION->__GET('ID_EMPRESA'),
                        $EXIEXPORTACION->__GET('ID_PLANTA'),
                        $EXIEXPORTACION->__GET('ID_TEMPORADA')

                    )

                );
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }



    public function agregarExiexportacionRepaletizaje(EXIEXPORTACION $EXIEXPORTACION)
    {
        try {

            if ($EXIEXPORTACION->__GET('ID_TCATEGORIA') == NULL) {
                $EXIEXPORTACION->__SET('ID_TCATEGORIA', NULL);
            }
            if ($EXIEXPORTACION->__GET('ID_TCOLOR') == NULL) {
                $EXIEXPORTACION->__SET('ID_TCOLOR', NULL);
            }
            $query =
                "INSERT INTO fruta_exiexportacion (                    
                                                    FOLIO_EXIEXPORTACION,
                                                    FOLIO_AUXILIAR_EXIEXPORTACION,
                                                    FOLIO_MANUAL,
                                                    FECHA_EMBALADO_EXIEXPORTACION,
                                                    CANTIDAD_ENVASE_EXIEXPORTACION,

                                                    KILOS_NETO_EXIEXPORTACION,
                                                    KILOS_BRUTO_EXIEXPORTACION,
                                                    PDESHIDRATACION_EXIEXPORTACION,
                                                    KILOS_DESHIRATACION_EXIEXPORTACION,
                                                    OBSERVACION_EXIESPORTACION,

                                                    ALIAS_DINAMICO_FOLIO_EXIESPORTACION,
                                                    ALIAS_ESTATICO_FOLIO_EXIESPORTACION,                                               
                                                    STOCK, 
                                                    EMBOLSADO, 
                                                    GASIFICADO, 

                                                    PREFRIO,
                                                    TESTADOSAG,
                                                    VGM,
                                                    FECHA_RECEPCION,
                                                    FECHA_PROCESO,

                                                    FECHA_REEMBALAJE,
                                                    FECHA_REPALETIZAJE,
                                                    INGRESO,
                                                    ID_TCALIBRE,  
                                                    ID_TEMBALAJE,

                                                    ID_TMANEJO,
                                                    ID_TCATEGORIA,
                                                    ID_TCOLOR,
                                                    ID_FOLIO,
                                                    ID_ESTANDAR,
                                                    ID_PRODUCTOR,   
                                                    ID_VESPECIES,

                                                    ID_PLANTA2,
                                                    ID_RECEPCION,
                                                    ID_PROCESO,
                                                    ID_REPALETIZAJE,  
                                                    ID_REEMBALAJE,

                                                    ID_EMPRESA,
                                                    ID_PLANTA,
                                                    ID_TEMPORADA, 

                                                    MODIFICACION,
                                                    ESTADO,  
                                                    ESTADO_REGISTRO
                                                 ) VALUES
	       	( ?, ?, ?, ?, ?,   ?, ?, ?, ?, ?,   ?, ?, ?, ?, ?,   ?, ?, ?, ?, ?,   ?, ?, ?, ?, ?,   ?, ?, ?, ?, ?, ?, ?,    ?, ?, ?, ?, ?,   ?, ?, ?,    SYSDATE(), 1, 1);";
            $this->conexion->prepare($query)
                ->execute(
                    array(

                        $EXIEXPORTACION->__GET('FOLIO_EXIEXPORTACION'),
                        $EXIEXPORTACION->__GET('FOLIO_AUXILIAR_EXIEXPORTACION'),
                        $EXIEXPORTACION->__GET('FOLIO_MANUAL'),
                        $EXIEXPORTACION->__GET('FECHA_EMBALADO_EXIEXPORTACION'),
                        $EXIEXPORTACION->__GET('CANTIDAD_ENVASE_EXIEXPORTACION'),

                        $EXIEXPORTACION->__GET('KILOS_NETO_EXIEXPORTACION'),
                        $EXIEXPORTACION->__GET('KILOS_BRUTO_EXIEXPORTACION'),
                        $EXIEXPORTACION->__GET('PDESHIDRATACION_EXIEXPORTACION'),
                        $EXIEXPORTACION->__GET('KILOS_DESHIRATACION_EXIEXPORTACION'),
                        $EXIEXPORTACION->__GET('OBSERVACION_EXIESPORTACION'),

                        $EXIEXPORTACION->__GET('ALIAS_DINAMICO_FOLIO_EXIESPORTACION'),
                        $EXIEXPORTACION->__GET('ALIAS_ESTATICO_FOLIO_EXIESPORTACION'),
                        $EXIEXPORTACION->__GET('STOCK'),
                        $EXIEXPORTACION->__GET('EMBOLSADO'),
                        $EXIEXPORTACION->__GET('GASIFICADO'),

                        $EXIEXPORTACION->__GET('PREFRIO'),
                        $EXIEXPORTACION->__GET('TESTADOSAG'),
                        $EXIEXPORTACION->__GET('VGM'),
                        $EXIEXPORTACION->__GET('FECHA_RECEPCION'),
                        $EXIEXPORTACION->__GET('FECHA_PROCESO'),

                        $EXIEXPORTACION->__GET('FECHA_REEMBALAJE'),
                        $EXIEXPORTACION->__GET('FECHA_REPALETIZAJE'),
                        $EXIEXPORTACION->__GET('INGRESO'),
                        $EXIEXPORTACION->__GET('ID_TCALIBRE'),
                        $EXIEXPORTACION->__GET('ID_TEMBALAJE'),
                      
                        $EXIEXPORTACION->__GET('ID_TMANEJO'),
                        $EXIEXPORTACION->__GET('ID_TCATEGORIA'),
                        $EXIEXPORTACION->__GET('ID_TCOLOR'),
                        $EXIEXPORTACION->__GET('ID_FOLIO'),
                        $EXIEXPORTACION->__GET('ID_ESTANDAR'),
                        $EXIEXPORTACION->__GET('ID_PRODUCTOR'),
                        $EXIEXPORTACION->__GET('ID_VESPECIES'),

                        $EXIEXPORTACION->__GET('ID_PLANTA2'),
                        $EXIEXPORTACION->__GET('ID_RECEPCION'),
                        $EXIEXPORTACION->__GET('ID_PROCESO'),
                        $EXIEXPORTACION->__GET('ID_REPALETIZAJE'),
                        $EXIEXPORTACION->__GET('ID_REEMBALAJE'),

                        $EXIEXPORTACION->__GET('ID_EMPRESA'),
                        $EXIEXPORTACION->__GET('ID_PLANTA'),
                        $EXIEXPORTACION->__GET('ID_TEMPORADA')

                    )

                );
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }





    //ELIMINAR FILA, NO SE UTILIZA
    public function eliminarExiexportacion($id)
    {
        try {
            $sql = "DELETE FROM fruta_exiexportacion WHERE ID_EXIEXPORTACION=" . $id . ";";
            $statement = $this->conexion->prepare($sql);
            $statement->execute();
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }




    //ACTUALIZAR INFORMACION DE LA FILA
    public function actualizarExiexportacionRecepcion(EXIEXPORTACION $EXIEXPORTACION)
    {
        try {
            if ($EXIEXPORTACION->__GET('ID_TCATEGORIA') == NULL) {
                $EXIEXPORTACION->__SET('ID_TCATEGORIA', NULL);
            }
            if ($EXIEXPORTACION->__GET('ID_TCOLOR') == NULL) {
                $EXIEXPORTACION->__SET('ID_TCOLOR', NULL);
            }
            $query = "
                UPDATE fruta_exiexportacion SET
                    MODIFICACION = SYSDATE(),
                    FECHA_EMBALADO_EXIEXPORTACION = ?,
                    CANTIDAD_ENVASE_EXIEXPORTACION = ?,
                    KILOS_NETO_EXIEXPORTACION = ?,
                    KILOS_BRUTO_EXIEXPORTACION = ?,
                    PDESHIDRATACION_EXIEXPORTACION = ?,
                    KILOS_DESHIRATACION_EXIEXPORTACION = ?,
                    OBSERVACION_EXIESPORTACION = ?,   
                    FECHA_RECEPCION = ?,   
                    STOCK = ?,      
                    EMBOLSADO = ?,             
                    GASIFICADO = ?,             
                    PREFRIO = ?,          
                    ID_TCALIBRE = ? ,
                    ID_TEMBALAJE = ? ,  
                    ID_TMANEJO = ? , 
                    ID_TCATEGORIA = ? , 
                    ID_TCOLOR = ? , 
                    ID_ESTANDAR = ?, 
                    ID_PRODUCTOR = ?,
                    ID_VESPECIES = ?,
                    ID_RECEPCION = ? ,
                    ID_EMPRESA = ?,
                    ID_PLANTA = ?, 
                    ID_TEMPORADA = ?  
                WHERE ID_EXIEXPORTACION= ?;";
            $this->conexion->prepare($query)
                ->execute(
                    array(

                        $EXIEXPORTACION->__GET('FECHA_EMBALADO_EXIEXPORTACION'),
                        $EXIEXPORTACION->__GET('CANTIDAD_ENVASE_EXIEXPORTACION'),
                        $EXIEXPORTACION->__GET('KILOS_NETO_EXIEXPORTACION'),
                        $EXIEXPORTACION->__GET('KILOS_BRUTO_EXIEXPORTACION'),
                        $EXIEXPORTACION->__GET('PDESHIDRATACION_EXIEXPORTACION'),
                        $EXIEXPORTACION->__GET('KILOS_DESHIRATACION_EXIEXPORTACION'),
                        $EXIEXPORTACION->__GET('OBSERVACION_EXIESPORTACION'),
                        $EXIEXPORTACION->__GET('FECHA_RECEPCION'),
                        $EXIEXPORTACION->__GET('STOCK'),
                        $EXIEXPORTACION->__GET('EMBOLSADO'),
                        $EXIEXPORTACION->__GET('GASIFICADO'),
                        $EXIEXPORTACION->__GET('PREFRIO'),
                        $EXIEXPORTACION->__GET('ID_TCALIBRE'),
                        $EXIEXPORTACION->__GET('ID_TEMBALAJE'),
                        $EXIEXPORTACION->__GET('ID_TMANEJO'),
                        $EXIEXPORTACION->__GET('ID_TCATEGORIA'),
                        $EXIEXPORTACION->__GET('ID_TCOLOR'),
                        $EXIEXPORTACION->__GET('ID_ESTANDAR'),
                        $EXIEXPORTACION->__GET('ID_PRODUCTOR'),
                        $EXIEXPORTACION->__GET('ID_VESPECIES'),
                        $EXIEXPORTACION->__GET('ID_RECEPCION'),
                        $EXIEXPORTACION->__GET('ID_EMPRESA'),
                        $EXIEXPORTACION->__GET('ID_PLANTA'),
                        $EXIEXPORTACION->__GET('ID_TEMPORADA'),
                        $EXIEXPORTACION->__GET('ID_EXIEXPORTACION')

                    )

                );
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }


    public function actualizarExiexportacionProceso(EXIEXPORTACION $EXIEXPORTACION)
    {
        try {

            $query = "
                UPDATE fruta_exiexportacion SET
                    MODIFICACION = SYSDATE(),
                    FECHA_EMBALADO_EXIEXPORTACION = ?,
                    CANTIDAD_ENVASE_EXIEXPORTACION = ?,
                    KILOS_NETO_EXIEXPORTACION = ?,
                    KILOS_BRUTO_EXIEXPORTACION = ?,
                    PDESHIDRATACION_EXIEXPORTACION = ?,
                    KILOS_DESHIRATACION_EXIEXPORTACION = ?,
                    FECHA_PROCESO = ?,                     
                    EMBOLSADO = ?,     
                    ID_TCALIBRE = ? ,
                    ID_TEMBALAJE = ? ,  
                    ID_TMANEJO = ? , 
                    ID_ESTANDAR = ?, 
                    ID_PRODUCTOR = ?,
                    ID_VESPECIES = ?,
                    ID_EMPRESA = ?,
                    ID_PLANTA = ?, 
                    ID_TEMPORADA = ? , 
                    ID_PROCESO = ?   
                WHERE ID_EXIEXPORTACION= ?;";
            $this->conexion->prepare($query)
                ->execute(
                    array(

                        $EXIEXPORTACION->__GET('FECHA_EMBALADO_EXIEXPORTACION'),
                        $EXIEXPORTACION->__GET('CANTIDAD_ENVASE_EXIEXPORTACION'),
                        $EXIEXPORTACION->__GET('KILOS_NETO_EXIEXPORTACION'),
                        $EXIEXPORTACION->__GET('KILOS_BRUTO_EXIEXPORTACION'),
                        $EXIEXPORTACION->__GET('PDESHIDRATACION_EXIEXPORTACION'),
                        $EXIEXPORTACION->__GET('KILOS_DESHIRATACION_EXIEXPORTACION'),
                        $EXIEXPORTACION->__GET('FECHA_PROCESO'),
                        $EXIEXPORTACION->__GET('EMBOLSADO'),
                        $EXIEXPORTACION->__GET('ID_TCALIBRE'),
                        $EXIEXPORTACION->__GET('ID_TEMBALAJE'),
                        $EXIEXPORTACION->__GET('ID_TMANEJO'),
                        $EXIEXPORTACION->__GET('ID_ESTANDAR'),
                        $EXIEXPORTACION->__GET('ID_PRODUCTOR'),
                        $EXIEXPORTACION->__GET('ID_VESPECIES'),
                        $EXIEXPORTACION->__GET('ID_EMPRESA'),
                        $EXIEXPORTACION->__GET('ID_PLANTA'),
                        $EXIEXPORTACION->__GET('ID_TEMPORADA'),
                        $EXIEXPORTACION->__GET('ID_PROCESO'),
                        $EXIEXPORTACION->__GET('ID_EXIEXPORTACION')

                    )

                );
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function actualizarExiexportacionReenbalaje(EXIEXPORTACION $EXIEXPORTACION)
    {
        try {

            $query = "
                UPDATE fruta_exiexportacion SET
                    MODIFICACION = SYSDATE(),
                    FECHA_EMBALADO_EXIEXPORTACION = ?,
                    CANTIDAD_ENVASE_EXIEXPORTACION = ?,
                    KILOS_NETO_EXIEXPORTACION = ?,
                    KILOS_BRUTO_EXIEXPORTACION = ?,
                    PDESHIDRATACION_EXIEXPORTACION = ?,
                    KILOS_DESHIRATACION_EXIEXPORTACION = ?,
                    FECHA_REEMBALAJE = ?,                     
                    EMBOLSADO = ?,     
                    ID_TCALIBRE = ? ,
                    ID_TEMBALAJE = ? ,  
                    ID_TMANEJO = ? , 
                    ID_ESTANDAR = ?, 
                    ID_PRODUCTOR = ?,
                    ID_VESPECIES = ?,
                    ID_EMPRESA = ?,
                    ID_PLANTA = ?, 
                    ID_TEMPORADA = ? , 
                    ID_REEMBALAJE = ?   
                WHERE ID_EXIEXPORTACION= ?;";
            $this->conexion->prepare($query)
                ->execute(
                    array(

                        $EXIEXPORTACION->__GET('FECHA_EMBALADO_EXIEXPORTACION'),
                        $EXIEXPORTACION->__GET('CANTIDAD_ENVASE_EXIEXPORTACION'),
                        $EXIEXPORTACION->__GET('KILOS_NETO_EXIEXPORTACION'),
                        $EXIEXPORTACION->__GET('KILOS_BRUTO_EXIEXPORTACION'),
                        $EXIEXPORTACION->__GET('PDESHIDRATACION_EXIEXPORTACION'),
                        $EXIEXPORTACION->__GET('KILOS_DESHIRATACION_EXIEXPORTACION'),
                        $EXIEXPORTACION->__GET('FECHA_REEMBALAJE'),
                        $EXIEXPORTACION->__GET('EMBOLSADO'),
                        $EXIEXPORTACION->__GET('ID_TCALIBRE'),
                        $EXIEXPORTACION->__GET('ID_TEMBALAJE'),
                        $EXIEXPORTACION->__GET('ID_TMANEJO'),
                        $EXIEXPORTACION->__GET('ID_ESTANDAR'),
                        $EXIEXPORTACION->__GET('ID_PRODUCTOR'),
                        $EXIEXPORTACION->__GET('ID_VESPECIES'),
                        $EXIEXPORTACION->__GET('ID_EMPRESA'),
                        $EXIEXPORTACION->__GET('ID_PLANTA'),
                        $EXIEXPORTACION->__GET('ID_TEMPORADA'),
                        $EXIEXPORTACION->__GET('ID_REEMBALAJE'),
                        $EXIEXPORTACION->__GET('ID_EXIEXPORTACION')

                    )

                );
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    //FUNCIONES ESPECIALIZADAS


    //VEISUALIZAR 
    public function verExistenciaPorPCDespacho($IDPCDESPACHO)
    {
        try {

            $datos = $this->conexion->prepare("SELECT * FROM fruta_exiexportacion 
                                        WHERE ID_PCDESPACHO= '" . $IDPCDESPACHO . "'                                           
                                        AND ESTADO_REGISTRO = 1;");
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


    public function verExistenciaPorDespachoEX($IDDESPACHOEX)
    {
        try {

            $datos = $this->conexion->prepare("SELECT * FROM fruta_exiexportacion 
                                        WHERE ID_DESPACHOEX= '" . $IDDESPACHOEX . "'                                           
                                        AND ESTADO_REGISTRO = 1;");
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
    public function verExistenciaPorDespacho($IDDESPACHO)
    {
        try {

            $datos = $this->conexion->prepare("SELECT * FROM fruta_exiexportacion 
                                        WHERE ID_DESPACHO= '" . $IDDESPACHO . "'                                           
                                        AND ESTADO_REGISTRO = 1;");
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

    public function verExistenciaPorDespachoEnTransito($IDDESPACHO)
    {
        try {

            $datos = $this->conexion->prepare("SELECT * FROM fruta_exiexportacion 
                                        WHERE ID_DESPACHO= '" . $IDDESPACHO . "'                                           
                                        AND ESTADO_REGISTRO = 1
                                        AND ESTADO = 9
                                        ;");
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

    public function verExistenciaPorDespacho2($IDDESPACHO)
    {
        try {

            $datos = $this->conexion->prepare("SELECT * FROM fruta_exiexportacion 
                                        WHERE ID_DESPACHO= '" . $IDDESPACHO . "'                                           
                                        AND ESTADO_REGISTRO = 1
                                        AND ESTADO = ;");
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


    public function verExistenciaPorInpSag($IDDESEXPORTACION)
    {
        try {

            $datos = $this->conexion->prepare("SELECT * FROM fruta_exiexportacion 
                                        WHERE ID_INPSAG= '" . $IDDESEXPORTACION . "'                                           
                                        AND ESTADO_REGISTRO = 1;");
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
    public function verExiexportacion($ID)
    {
        try {

            $datos = $this->conexion->prepare("SELECT * FROM fruta_exiexportacion WHERE ID_EXIEXPORTACION= '" . $ID . "';");
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









    //LISTAS

    public function listarExiexportacionEmpresaPlantaTemporadaDisponible($EMPRESA, $PLANTA, $TEMPORADA)
    {
        try {

            $datos = $this->conexion->prepare("SELECT *,  
                                                    DATEDIFF(SYSDATE(), INGRESO) AS 'DIAS',             
                                                    DATE_FORMAT(FECHA_EMBALADO_EXIEXPORTACION, '%d-%m-%Y') AS 'EMBALADO',
                                                    DATE_FORMAT(INGRESO, '%d-%m-%Y ') AS 'INGRESO',
                                                    DATE_FORMAT(MODIFICACION, '%d-%m-%Y ') AS 'MODIFICACION',                                                    
                                                    IFNULL(DATE_FORMAT(FECHA_RECEPCION, '%d-%m-%Y'),'Sin Datos') AS 'RECEPCION',
                                                    IFNULL(DATE_FORMAT(FECHA_PROCESO, '%d-%m-%Y'),'Sin Datos') AS 'PROCESO',
                                                    IFNULL(DATE_FORMAT(FECHA_REEMBALAJE, '%d-%m-%Y'),'Sin Datos') AS 'REEMBALAJE',
                                                    IFNULL(DATE_FORMAT(FECHA_REPALETIZAJE, '%d-%m-%Y'),'Sin Datos') AS 'REPALETIZAJE',
                                                    IFNULL(DATE_FORMAT(FECHA_DESPACHO, '%d-%m-%Y'),'Sin Datos') AS 'DESPACHO',
                                                    IFNULL(DATE_FORMAT(FECHA_DESPACHOEX, '%d-%m-%Y'),'Sin Datos') AS 'DESPACHOEX',
                                                    IFNULL(CANTIDAD_ENVASE_EXIEXPORTACION,0) AS 'ENVASE', 
                                                    IFNULL(KILOS_NETO_EXIEXPORTACION,0) AS 'NETO',
                                                    IFNULL(KILOS_DESHIRATACION_EXIEXPORTACION,0) AS 'DESHIRATACION',
                                                    IFNULL(PDESHIDRATACION_EXIEXPORTACION,0) AS 'PORCENTAJE',
                                                    IFNULL(KILOS_BRUTO_EXIEXPORTACION,0) AS 'BRUTO',
                                                    IF(STOCK = '0','Sin Datos',STOCK ) AS 'STOCKR'
                                                FROM fruta_exiexportacion 
                                                WHERE 
                                                        ESTADO_REGISTRO = 1 
                                                        AND ESTADO = 2
                                                        AND ID_EMPRESA = '" . $EMPRESA . "' 
                                                        AND ID_PLANTA = '" . $PLANTA . "'
                                                        AND ID_TEMPORADA = '" . $TEMPORADA . "' 
                                          ;");
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
    public function listarExiexportacionEmpresaPlantaTemporadaDisponible2($EMPRESA, $PLANTA, $TEMPORADA)
    {
        try {

            $datos = $this->conexion->prepare("SELECT *,  
                                                    DATEDIFF(SYSDATE(), INGRESO) AS 'DIAS',             
                                                    DATE_FORMAT(FECHA_EMBALADO_EXIEXPORTACION, '%d-%m-%Y') AS 'EMBALADO',
                                                    DATE_FORMAT(INGRESO, '%d-%m-%Y ') AS 'INGRESO',
                                                    DATE_FORMAT(MODIFICACION, '%d-%m-%Y ') AS 'MODIFICACION',                                                    
                                                    IFNULL(DATE_FORMAT(FECHA_RECEPCION, '%d-%m-%Y'),'Sin Datos') AS 'RECEPCION',
                                                    IFNULL(DATE_FORMAT(FECHA_PROCESO, '%d-%m-%Y'),'Sin Datos') AS 'PROCESO',
                                                    IFNULL(DATE_FORMAT(FECHA_REEMBALAJE, '%d-%m-%Y'),'Sin Datos') AS 'REEMBALAJE',
                                                    IFNULL(DATE_FORMAT(FECHA_REPALETIZAJE, '%d-%m-%Y'),'Sin Datos') AS 'REPALETIZAJE',
                                                    IFNULL(DATE_FORMAT(FECHA_DESPACHO, '%d-%m-%Y'),'Sin Datos') AS 'DESPACHO',
                                                    IFNULL(DATE_FORMAT(FECHA_DESPACHOEX, '%d-%m-%Y'),'Sin Datos') AS 'DESPACHOEX',
                                                    FORMAT(IFNULL(CANTIDAD_ENVASE_EXIEXPORTACION,0),0,'de_DE') AS 'ENVASE', 
                                                    FORMAT(IFNULL(KILOS_NETO_EXIEXPORTACION,0),2,'de_DE') AS 'NETO',
                                                    FORMAT(IFNULL(KILOS_DESHIRATACION_EXIEXPORTACION,0),2,'de_DE') AS 'DESHIRATACION',
                                                    FORMAT(IFNULL(PDESHIDRATACION_EXIEXPORTACION,0),2,'de_DE') AS 'PORCENTAJE',
                                                    FORMAT(IFNULL(KILOS_BRUTO_EXIEXPORTACION,0),2,'de_DE') AS 'BRUTO',
                                                    IF(STOCK = '0','Sin Datos',STOCK ) AS 'STOCKR'
                                                FROM fruta_exiexportacion 
                                                WHERE 
                                                        ESTADO_REGISTRO = 1 
                                                        AND ESTADO = 2
                                                        AND ID_EMPRESA = '" . $EMPRESA . "' 
                                                        AND ID_PLANTA = '" . $PLANTA . "'
                                                        AND ID_TEMPORADA = '" . $TEMPORADA . "' 
                                          ;");
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
    public function listarExiexportacionEmpresaPlantaTemporadaDisponibleFoliomanual($EMPRESA, $PLANTA, $TEMPORADA)
    {
        try {

            $datos = $this->conexion->prepare("SELECT *,  
                                                    DATEDIFF(SYSDATE(), INGRESO) AS 'DIAS',             
                                                    DATE_FORMAT(FECHA_EMBALADO_EXIEXPORTACION, '%d-%m-%Y') AS 'EMBALADO',
                                                    DATE_FORMAT(INGRESO, '%d-%m-%Y ') AS 'INGRESO',
                                                    DATE_FORMAT(MODIFICACION, '%d-%m-%Y ') AS 'MODIFICACION',                                                    
                                                    IFNULL(DATE_FORMAT(FECHA_RECEPCION, '%d-%m-%Y'),'Sin Datos') AS 'RECEPCION',
                                                    IFNULL(DATE_FORMAT(FECHA_PROCESO, '%d-%m-%Y'),'Sin Datos') AS 'PROCESO',
                                                    IFNULL(DATE_FORMAT(FECHA_REEMBALAJE, '%d-%m-%Y'),'Sin Datos') AS 'REEMBALAJE',
                                                    IFNULL(DATE_FORMAT(FECHA_REPALETIZAJE, '%d-%m-%Y'),'Sin Datos') AS 'REPALETIZAJE',
                                                    IFNULL(DATE_FORMAT(FECHA_DESPACHO, '%d-%m-%Y'),'Sin Datos') AS 'DESPACHO',
                                                    IFNULL(DATE_FORMAT(FECHA_DESPACHOEX, '%d-%m-%Y'),'Sin Datos') AS 'DESPACHOEX',
                                                    IFNULL(CANTIDAD_ENVASE_EXIEXPORTACION,0) AS 'ENVASE', 
                                                    IFNULL(KILOS_NETO_EXIEXPORTACION,0) AS 'NETO',
                                                    IFNULL(KILOS_DESHIRATACION_EXIEXPORTACION,0) AS 'DESHIRATACION',
                                                    IFNULL(PDESHIDRATACION_EXIEXPORTACION,0) AS 'PORCENTAJE',
                                                    IFNULL(KILOS_BRUTO_EXIEXPORTACION,0) AS 'BRUTO',
                                                    IF(STOCK = '0','Sin Datos',STOCK ) AS 'STOCKR'
                                                FROM fruta_exiexportacion 
                                                WHERE 
                                                        ESTADO_REGISTRO = 1 
                                                        AND ESTADO = 2
                                                        AND FOLIO_MANUAL = 1
                                                        AND ID_EMPRESA = '" . $EMPRESA . "' 
                                                        AND ID_PLANTA = '" . $PLANTA . "'
                                                        AND ID_TEMPORADA = '" . $TEMPORADA . "' 
                                          ;");
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
    public function listarExiexportacionEmpresaPlantaTemporadaDisponibleFoliomanual2($EMPRESA, $PLANTA, $TEMPORADA)
    {
        try {

            $datos = $this->conexion->prepare("SELECT *,  
                                                    DATEDIFF(SYSDATE(), INGRESO) AS 'DIAS',             
                                                    DATE_FORMAT(FECHA_EMBALADO_EXIEXPORTACION, '%d-%m-%Y') AS 'EMBALADO',
                                                    DATE_FORMAT(INGRESO, '%d-%m-%Y ') AS 'INGRESO',
                                                    DATE_FORMAT(MODIFICACION, '%d-%m-%Y ') AS 'MODIFICACION',                                                    
                                                    IFNULL(DATE_FORMAT(FECHA_RECEPCION, '%d-%m-%Y'),'Sin Datos') AS 'RECEPCION',
                                                    IFNULL(DATE_FORMAT(FECHA_PROCESO, '%d-%m-%Y'),'Sin Datos') AS 'PROCESO',
                                                    IFNULL(DATE_FORMAT(FECHA_REEMBALAJE, '%d-%m-%Y'),'Sin Datos') AS 'REEMBALAJE',
                                                    IFNULL(DATE_FORMAT(FECHA_REPALETIZAJE, '%d-%m-%Y'),'Sin Datos') AS 'REPALETIZAJE',
                                                    IFNULL(DATE_FORMAT(FECHA_DESPACHO, '%d-%m-%Y'),'Sin Datos') AS 'DESPACHO',
                                                    IFNULL(DATE_FORMAT(FECHA_DESPACHOEX, '%d-%m-%Y'),'Sin Datos') AS 'DESPACHOEX',
                                                    FORMAT(IFNULL(CANTIDAD_ENVASE_EXIEXPORTACION,0),0,'de_DE') AS 'ENVASE', 
                                                    FORMAT(IFNULL(KILOS_NETO_EXIEXPORTACION,0),2,'de_DE') AS 'NETO',
                                                    FORMAT(IFNULL(KILOS_DESHIRATACION_EXIEXPORTACION,0),2,'de_DE') AS 'DESHIRATACION',
                                                    FORMAT(IFNULL(PDESHIDRATACION_EXIEXPORTACION,0),2,'de_DE') AS 'PORCENTAJE',
                                                    FORMAT(IFNULL(KILOS_BRUTO_EXIEXPORTACION,0),2,'de_DE') AS 'BRUTO',
                                                    IF(STOCK = '0','Sin Datos',STOCK ) AS 'STOCKR'
                                                FROM fruta_exiexportacion 
                                                WHERE 
                                                        ESTADO_REGISTRO = 1 
                                                        AND ESTADO = 2
                                                        AND FOLIO_MANUAL = 1
                                                        AND ID_EMPRESA = '" . $EMPRESA . "' 
                                                        AND ID_PLANTA = '" . $PLANTA . "'
                                                        AND ID_TEMPORADA = '" . $TEMPORADA . "' 
                                          ;");
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
    public function listarExiexportacionEmpresaPlantaTemporadaDespachado($EMPRESA, $PLANTA, $TEMPORADA)
    {
        try {

            $datos = $this->conexion->prepare("SELECT *,  
                                                    DATEDIFF(SYSDATE(), INGRESO) AS 'DIAS',             
                                                    DATE_FORMAT(FECHA_EMBALADO_EXIEXPORTACION, '%d-%m-%Y') AS 'EMBALADO',
                                                    DATE_FORMAT(INGRESO, '%d-%m-%Y ') AS 'INGRESO',
                                                    DATE_FORMAT(MODIFICACION, '%d-%m-%Y ') AS 'MODIFICACION',                                                    
                                                    IFNULL(DATE_FORMAT(FECHA_RECEPCION, '%d-%m-%Y'),'Sin Datos') AS 'RECEPCION',
                                                    IFNULL(DATE_FORMAT(FECHA_PROCESO, '%d-%m-%Y'),'Sin Datos') AS 'PROCESO',
                                                    IFNULL(DATE_FORMAT(FECHA_REEMBALAJE, '%d-%m-%Y'),'Sin Datos') AS 'REEMBALAJE',
                                                    IFNULL(DATE_FORMAT(FECHA_REPALETIZAJE, '%d-%m-%Y'),'Sin Datos') AS 'REPALETIZAJE',
                                                    IFNULL(DATE_FORMAT(FECHA_DESPACHO, '%d-%m-%Y'),'Sin Datos') AS 'DESPACHO',
                                                    IFNULL(DATE_FORMAT(FECHA_DESPACHOEX, '%d-%m-%Y'),'Sin Datos') AS 'DESPACHOEX',
                                                    IFNULL(CANTIDAD_ENVASE_EXIEXPORTACION,0) AS 'ENVASE', 
                                                    IFNULL(KILOS_NETO_EXIEXPORTACION,0) AS 'NETO',
                                                    IFNULL(KILOS_DESHIRATACION_EXIEXPORTACION,0) AS 'DESHIRATACION',
                                                    IFNULL(PDESHIDRATACION_EXIEXPORTACION,0) AS 'PORCENTAJE',
                                                    IFNULL(KILOS_BRUTO_EXIEXPORTACION,0) AS 'BRUTO',
                                                    IF(STOCK = '0','Sin Datos',STOCK ) AS 'STOCKR'
                                                FROM fruta_exiexportacion 
                                                WHERE 
                                                        ESTADO_REGISTRO = 1 
                                                        AND ESTADO = 8
                                                        AND ID_EMPRESA = '" . $EMPRESA . "' 
                                                        AND ID_PLANTA = '" . $PLANTA . "'
                                                        AND ID_TEMPORADA = '" . $TEMPORADA . "' 
                                          ;");
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
    public function listarExiexportacionEmpresaPlantaTemporadaDespachado2($EMPRESA, $PLANTA, $TEMPORADA)
    {
        try {

            $datos = $this->conexion->prepare("SELECT *,  
                                                    DATEDIFF(SYSDATE(), INGRESO) AS 'DIAS',             
                                                    DATE_FORMAT(FECHA_EMBALADO_EXIEXPORTACION, '%d-%m-%Y') AS 'EMBALADO',
                                                    DATE_FORMAT(INGRESO, '%d-%m-%Y ') AS 'INGRESO',
                                                    DATE_FORMAT(MODIFICACION, '%d-%m-%Y ') AS 'MODIFICACION',                                                    
                                                    IFNULL(DATE_FORMAT(FECHA_RECEPCION, '%d-%m-%Y'),'Sin Datos') AS 'RECEPCION',
                                                    IFNULL(DATE_FORMAT(FECHA_PROCESO, '%d-%m-%Y'),'Sin Datos') AS 'PROCESO',
                                                    IFNULL(DATE_FORMAT(FECHA_REEMBALAJE, '%d-%m-%Y'),'Sin Datos') AS 'REEMBALAJE',
                                                    IFNULL(DATE_FORMAT(FECHA_REPALETIZAJE, '%d-%m-%Y'),'Sin Datos') AS 'REPALETIZAJE',
                                                    IFNULL(DATE_FORMAT(FECHA_DESPACHO, '%d-%m-%Y'),'Sin Datos') AS 'DESPACHO',
                                                    IFNULL(DATE_FORMAT(FECHA_DESPACHOEX, '%d-%m-%Y'),'Sin Datos') AS 'DESPACHOEX',
                                                    FORMAT(IFNULL(CANTIDAD_ENVASE_EXIEXPORTACION,0),0,'de_DE') AS 'ENVASE', 
                                                    FORMAT(IFNULL(KILOS_NETO_EXIEXPORTACION,0),2,'de_DE') AS 'NETO',
                                                    FORMAT(IFNULL(KILOS_DESHIRATACION_EXIEXPORTACION,0),2,'de_DE') AS 'DESHIRATACION',
                                                    FORMAT(IFNULL(PDESHIDRATACION_EXIEXPORTACION,0),2,'de_DE') AS 'PORCENTAJE',
                                                    FORMAT(IFNULL(KILOS_BRUTO_EXIEXPORTACION,0),2,'de_DE') AS 'BRUTO',
                                                    IF(STOCK = '0','Sin Datos',STOCK ) AS 'STOCKR'
                                                FROM fruta_exiexportacion 
                                                WHERE 
                                                        ESTADO_REGISTRO = 1 
                                                        AND ESTADO = 8
                                                        AND ID_EMPRESA = '" . $EMPRESA . "' 
                                                        AND ID_PLANTA = '" . $PLANTA . "'
                                                        AND ID_TEMPORADA = '" . $TEMPORADA . "' 
                                          ;");
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
    public function listarExiexportacionEmpresaPlantaTemporada2($EMPRESA, $PLANTA, $TEMPORADA)
    {
        try {

            $datos = $this->conexion->prepare("SELECT *,  
                                                    DATEDIFF(SYSDATE(), INGRESO) AS 'DIAS',             
                                                    DATE_FORMAT(FECHA_EMBALADO_EXIEXPORTACION, '%d-%m-%Y') AS 'EMBALADO',
                                                    DATE_FORMAT(INGRESO, '%d-%m-%Y ') AS 'INGRESO',
                                                    DATE_FORMAT(MODIFICACION, '%d-%m-%Y ') AS 'MODIFICACION',                                                    
                                                    IFNULL(DATE_FORMAT(FECHA_RECEPCION, '%d-%m-%Y'),'Sin Datos') AS 'RECEPCION',
                                                    IFNULL(DATE_FORMAT(FECHA_PROCESO, '%d-%m-%Y'),'Sin Datos') AS 'PROCESO',
                                                    IFNULL(DATE_FORMAT(FECHA_REEMBALAJE, '%d-%m-%Y'),'Sin Datos') AS 'REEMBALAJE',
                                                    IFNULL(DATE_FORMAT(FECHA_REPALETIZAJE, '%d-%m-%Y'),'Sin Datos') AS 'REPALETIZAJE',
                                                    IFNULL(DATE_FORMAT(FECHA_DESPACHO, '%d-%m-%Y'),'Sin Datos') AS 'DESPACHO',
                                                    IFNULL(DATE_FORMAT(FECHA_DESPACHOEX, '%d-%m-%Y'),'Sin Datos') AS 'DESPACHOEX',
                                                    FORMAT(IFNULL(CANTIDAD_ENVASE_EXIEXPORTACION,0),0,'de_DE') AS 'ENVASE', 
                                                    FORMAT(IFNULL(KILOS_NETO_EXIEXPORTACION,0),2,'de_DE') AS 'NETO',
                                                    FORMAT(IFNULL(KILOS_DESHIRATACION_EXIEXPORTACION,0),2,'de_DE') AS 'DESHIRATACION',
                                                    FORMAT(IFNULL(PDESHIDRATACION_EXIEXPORTACION,0),2,'de_DE') AS 'PORCENTAJE',
                                                    FORMAT(IFNULL(KILOS_BRUTO_EXIEXPORTACION,0),2,'de_DE') AS 'BRUTO',
                                                    IF(STOCK = '0','Sin Datos',STOCK ) AS 'STOCKR'
                                                FROM fruta_exiexportacion 
                                                WHERE 
                                                        ID_EMPRESA = '" . $EMPRESA . "' 
                                                        AND ID_PLANTA = '" . $PLANTA . "'
                                                        AND ID_TEMPORADA = '" . $TEMPORADA . "' 
                                          ;");
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

    public function listarExiexportacionEmpresaPlantaTemporadaSF2($EMPRESA, $PLANTA, $TEMPORADA)
    {
        try {

            $datos = $this->conexion->prepare("SELECT *,  
                                                    DATEDIFF(SYSDATE(), INGRESO) AS 'DIAS',             
                                                    DATE_FORMAT(FECHA_EMBALADO_EXIEXPORTACION, '%d-%m-%Y') AS 'EMBALADO',
                                                    DATE_FORMAT(INGRESO, '%d-%m-%Y ') AS 'INGRESO',
                                                    DATE_FORMAT(MODIFICACION, '%d-%m-%Y ') AS 'MODIFICACION',                                                    
                                                    IFNULL(DATE_FORMAT(FECHA_RECEPCION, '%d-%m-%Y'),'Sin Datos') AS 'RECEPCION',
                                                    IFNULL(DATE_FORMAT(FECHA_PROCESO, '%d-%m-%Y'),'Sin Datos') AS 'PROCESO',
                                                    IFNULL(DATE_FORMAT(FECHA_REEMBALAJE, '%d-%m-%Y'),'Sin Datos') AS 'REEMBALAJE',
                                                    IFNULL(DATE_FORMAT(FECHA_REPALETIZAJE, '%d-%m-%Y'),'Sin Datos') AS 'REPALETIZAJE',
                                                    IFNULL(DATE_FORMAT(FECHA_DESPACHO, '%d-%m-%Y'),'Sin Datos') AS 'DESPACHO',
                                                    IFNULL(DATE_FORMAT(FECHA_DESPACHOEX, '%d-%m-%Y'),'Sin Datos') AS 'DESPACHOEX',
                                                    IFNULL(CANTIDAD_ENVASE_EXIEXPORTACION,0) AS 'ENVASE', 
                                                    IFNULL(KILOS_NETO_EXIEXPORTACION,0) AS 'NETO',
                                                    IFNULL(KILOS_DESHIRATACION_EXIEXPORTACION,0) AS 'DESHIRATACION',
                                                    IFNULL(PDESHIDRATACION_EXIEXPORTACION,0) AS 'PORCENTAJE',
                                                    IFNULL(KILOS_BRUTO_EXIEXPORTACION,0) AS 'BRUTO',
                                                    IF(STOCK = '0','Sin Datos',STOCK ) AS 'STOCKR'
                                                FROM fruta_exiexportacion 
                                                WHERE 
                                                        ID_EMPRESA = '" . $EMPRESA . "' 
                                                        AND ID_PLANTA = '" . $PLANTA . "'
                                                        AND ID_TEMPORADA = '" . $TEMPORADA . "' 
                                          ;");
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


    public function listarExiexportacionAgrupadoPorFolioEmpresaPlantaTemporada($EMPRESA, $PLANTA, $TEMPORADA)
    {
        try {

            $datos = $this->conexion->prepare("SELECT 
                                                    FOLIO_AUXILIAR_EXIEXPORTACION,                                               
                                                    IFNULL(CANTIDAD_ENVASE_EXIEXPORTACION,0) AS 'ENVASE', 
                                                    IFNULL(KILOS_NETO_EXIEXPORTACION,0)AS 'NETO',
                                                    IFNULL(KILOS_DESHIRATACION_EXIEXPORTACION,0) AS 'DESHIRATACION',
                                                    IFNULL(KILOS_BRUTO_EXIEXPORTACION,0)AS 'BRUTO'
                                                FROM fruta_exiexportacion 
                                                WHERE 
                                                        ID_EMPRESA = '" . $EMPRESA . "' 
                                                        AND ID_PLANTA = '" . $PLANTA . "'
                                                        AND ID_TEMPORADA = '" . $TEMPORADA . "'                                                 
                                                GROUP BY FOLIO_AUXILIAR_EXIEXPORTACION
                                          ;");
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

    public function listarExiexportacionEmpresaPlantaTemporadaPorFolio($EMPRESA, $PLANTA, $TEMPORADA, $FOLIO)
    {
        try {

            $datos = $this->conexion->prepare("SELECT *,  
                                                    DATEDIFF(SYSDATE(), INGRESO) AS 'DIAS',             
                                                    DATE_FORMAT(FECHA_EMBALADO_EXIEXPORTACION, '%d-%m-%Y') AS 'EMBALADO',
                                                    DATE_FORMAT(INGRESO, '%d-%m-%Y ') AS 'INGRESO',
                                                    DATE_FORMAT(MODIFICACION, '%d-%m-%Y ') AS 'MODIFICACION',                                                    
                                                    IFNULL(DATE_FORMAT(FECHA_RECEPCION, '%d-%m-%Y'),'Sin Datos') AS 'RECEPCION',
                                                    IFNULL(DATE_FORMAT(FECHA_PROCESO, '%d-%m-%Y'),'Sin Datos') AS 'PROCESO',
                                                    IFNULL(DATE_FORMAT(FECHA_REEMBALAJE, '%d-%m-%Y'),'Sin Datos') AS 'REEMBALAJE',
                                                    IFNULL(DATE_FORMAT(FECHA_REPALETIZAJE, '%d-%m-%Y'),'Sin Datos') AS 'REPALETIZAJE',
                                                    IFNULL(DATE_FORMAT(FECHA_DESPACHO, '%d-%m-%Y'),'Sin Datos') AS 'DESPACHO',
                                                    IFNULL(DATE_FORMAT(FECHA_DESPACHOEX, '%d-%m-%Y'),'Sin Datos') AS 'DESPACHOEX',
                                                    IFNULL(CANTIDAD_ENVASE_EXIEXPORTACION,0) AS 'ENVASE', 
                                                    IFNULL(KILOS_NETO_EXIEXPORTACION,0) AS 'NETO',
                                                    IFNULL(KILOS_DESHIRATACION_EXIEXPORTACION,0) AS 'DESHIRATACION',
                                                    IFNULL(PDESHIDRATACION_EXIEXPORTACION,0) AS 'PORCENTAJE',
                                                    IFNULL(KILOS_BRUTO_EXIEXPORTACION,0) AS 'BRUTO',
                                                    IF(STOCK = '0','Sin Datos',STOCK ) AS 'STOCKR'
                                                FROM fruta_exiexportacion 
                                                WHERE 
                                                        ID_EMPRESA = '" . $EMPRESA . "' 
                                                        AND ID_PLANTA = '" . $PLANTA . "'
                                                        AND ID_TEMPORADA = '" . $TEMPORADA . "' 
                                                        AND FOLIO_AUXILIAR_EXIEXPORTACION = '" . $FOLIO . "' 
                                          ;");
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

    
    public function listarExiexportacionAgrupadoPorFolioEmpresaPlantaTemporadaDisponible($EMPRESA, $PLANTA, $TEMPORADA)
    {
        try {

            $datos = $this->conexion->prepare("SELECT 
                                                    FOLIO_AUXILIAR_EXIEXPORTACION,                                               
                                                    IFNULL(CANTIDAD_ENVASE_EXIEXPORTACION,0) AS 'ENVASE', 
                                                    IFNULL(KILOS_NETO_EXIEXPORTACION,0)AS 'NETO',
                                                    IFNULL(KILOS_DESHIRATACION_EXIEXPORTACION,0) AS 'DESHIRATACION',
                                                    IFNULL(KILOS_BRUTO_EXIEXPORTACION,0)AS 'BRUTO'
                                                FROM fruta_exiexportacion 
                                                WHERE 
                                                        ID_EMPRESA = '" . $EMPRESA . "' 
                                                        AND ID_PLANTA = '" . $PLANTA . "'
                                                        AND ID_TEMPORADA = '" . $TEMPORADA . "'  
                                                        AND ESTADO_REGISTRO = 1
                                                        AND ESTADO = 2                                               
                                                GROUP BY FOLIO_AUXILIAR_EXIEXPORTACION
                                          ;");
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

    public function listarExiexportacionEmpresaPlantaTemporadaPorFolioDisponible($EMPRESA, $PLANTA, $TEMPORADA, $FOLIO)
    {
        try {

            $datos = $this->conexion->prepare("SELECT *,  
                                                    DATEDIFF(SYSDATE(), INGRESO) AS 'DIAS',             
                                                    DATE_FORMAT(FECHA_EMBALADO_EXIEXPORTACION, '%d-%m-%Y') AS 'EMBALADO',
                                                    DATE_FORMAT(INGRESO, '%d-%m-%Y ') AS 'INGRESO',
                                                    DATE_FORMAT(MODIFICACION, '%d-%m-%Y ') AS 'MODIFICACION',                                                    
                                                    IFNULL(DATE_FORMAT(FECHA_RECEPCION, '%d-%m-%Y'),'Sin Datos') AS 'RECEPCION',
                                                    IFNULL(DATE_FORMAT(FECHA_PROCESO, '%d-%m-%Y'),'Sin Datos') AS 'PROCESO',
                                                    IFNULL(DATE_FORMAT(FECHA_REEMBALAJE, '%d-%m-%Y'),'Sin Datos') AS 'REEMBALAJE',
                                                    IFNULL(DATE_FORMAT(FECHA_REPALETIZAJE, '%d-%m-%Y'),'Sin Datos') AS 'REPALETIZAJE',
                                                    IFNULL(DATE_FORMAT(FECHA_DESPACHO, '%d-%m-%Y'),'Sin Datos') AS 'DESPACHO',
                                                    IFNULL(DATE_FORMAT(FECHA_DESPACHOEX, '%d-%m-%Y'),'Sin Datos') AS 'DESPACHOEX',
                                                    IFNULL(CANTIDAD_ENVASE_EXIEXPORTACION,0) AS 'ENVASE', 
                                                    IFNULL(KILOS_NETO_EXIEXPORTACION,0) AS 'NETO',
                                                    IFNULL(KILOS_DESHIRATACION_EXIEXPORTACION,0) AS 'DESHIRATACION',
                                                    IFNULL(PDESHIDRATACION_EXIEXPORTACION,0) AS 'PORCENTAJE',
                                                    IFNULL(KILOS_BRUTO_EXIEXPORTACION,0) AS 'BRUTO',
                                                    IF(STOCK = '0','Sin Datos',STOCK ) AS 'STOCKR'
                                                FROM fruta_exiexportacion 
                                                WHERE 
                                                        ID_EMPRESA = '" . $EMPRESA . "' 
                                                        AND ID_PLANTA = '" . $PLANTA . "'
                                                        AND ID_TEMPORADA = '" . $TEMPORADA . "' 
                                                        AND ESTADO_REGISTRO = 1
                                                        AND ESTADO = 2                      
                                                        AND FOLIO_AUXILIAR_EXIEXPORTACION = '" . $FOLIO . "' 
                                          ;");
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

    public function listarExiexportacionAgrupadoPorFolioEmpresaPlantaTemporadaDespachado($EMPRESA, $PLANTA, $TEMPORADA)
    {
        try {

            $datos = $this->conexion->prepare("SELECT 
                                                    FOLIO_AUXILIAR_EXIEXPORTACION,                                               
                                                    IFNULL(CANTIDAD_ENVASE_EXIEXPORTACION,0) AS 'ENVASE', 
                                                    IFNULL(KILOS_NETO_EXIEXPORTACION,0)AS 'NETO',
                                                    IFNULL(KILOS_DESHIRATACION_EXIEXPORTACION,0) AS 'DESHIRATACION',
                                                    IFNULL(KILOS_BRUTO_EXIEXPORTACION,0)AS 'BRUTO'
                                                FROM fruta_exiexportacion 
                                                WHERE 
                                                        ID_EMPRESA = '" . $EMPRESA . "' 
                                                        AND ID_PLANTA = '" . $PLANTA . "'
                                                        AND ID_TEMPORADA = '" . $TEMPORADA . "'  
                                                        AND ESTADO_REGISTRO = 1
                                                        AND ESTADO = 8                                               
                                                GROUP BY FOLIO_AUXILIAR_EXIEXPORTACION
                                          ;");
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

    public function listarExiexportacionEmpresaPlantaTemporadaPorFolioDespachado($EMPRESA, $PLANTA, $TEMPORADA, $FOLIO)
    {
        try {

            $datos = $this->conexion->prepare("SELECT *,  
                                                    DATEDIFF(SYSDATE(), INGRESO) AS 'DIAS',             
                                                    DATE_FORMAT(FECHA_EMBALADO_EXIEXPORTACION, '%d-%m-%Y') AS 'EMBALADO',
                                                    DATE_FORMAT(INGRESO, '%d-%m-%Y ') AS 'INGRESO',
                                                    DATE_FORMAT(MODIFICACION, '%d-%m-%Y ') AS 'MODIFICACION',                                                    
                                                    IFNULL(DATE_FORMAT(FECHA_RECEPCION, '%d-%m-%Y'),'Sin Datos') AS 'RECEPCION',
                                                    IFNULL(DATE_FORMAT(FECHA_PROCESO, '%d-%m-%Y'),'Sin Datos') AS 'PROCESO',
                                                    IFNULL(DATE_FORMAT(FECHA_REEMBALAJE, '%d-%m-%Y'),'Sin Datos') AS 'REEMBALAJE',
                                                    IFNULL(DATE_FORMAT(FECHA_REPALETIZAJE, '%d-%m-%Y'),'Sin Datos') AS 'REPALETIZAJE',
                                                    IFNULL(DATE_FORMAT(FECHA_DESPACHO, '%d-%m-%Y'),'Sin Datos') AS 'DESPACHO',
                                                    IFNULL(DATE_FORMAT(FECHA_DESPACHOEX, '%d-%m-%Y'),'Sin Datos') AS 'DESPACHOEX',
                                                    IFNULL(CANTIDAD_ENVASE_EXIEXPORTACION,0) AS 'ENVASE', 
                                                    IFNULL(KILOS_NETO_EXIEXPORTACION,0) AS 'NETO',
                                                    IFNULL(KILOS_DESHIRATACION_EXIEXPORTACION,0) AS 'DESHIRATACION',
                                                    IFNULL(PDESHIDRATACION_EXIEXPORTACION,0) AS 'PORCENTAJE',
                                                    IFNULL(KILOS_BRUTO_EXIEXPORTACION,0) AS 'BRUTO',
                                                    IF(STOCK = '0','Sin Datos',STOCK ) AS 'STOCKR'
                                                FROM fruta_exiexportacion 
                                                WHERE 
                                                        ID_EMPRESA = '" . $EMPRESA . "' 
                                                        AND ID_PLANTA = '" . $PLANTA . "'
                                                        AND ID_TEMPORADA = '" . $TEMPORADA . "' 
                                                        AND ESTADO_REGISTRO = 1
                                                        AND ESTADO = 8                      
                                                        AND FOLIO_AUXILIAR_EXIEXPORTACION = '" . $FOLIO . "' 
                                          ;");
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


    //BUSQUEDAS

    public function buscarPorFolio($FOLIOAUXILIAREXIEXPORTACION)
    {
        try {

            $datos = $this->conexion->prepare(" SELECT * 
                                                FROM fruta_exiexportacion 
                                                WHERE  
                                                    FOLIO_AUXILIAR_EXIEXPORTACION LIKE '" . $FOLIOAUXILIAREXIEXPORTACION . "' 
                                                    AND ESTADO_REGISTRO =  1 
                                                    AND ESTADO != 0  ;");
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
    public function buscarPorFolioRepaletizaje($FOLIOAUXILIAREXIEXPORTACION)
    {
        try {

            $datos = $this->conexion->prepare(" SELECT * 
                                                FROM fruta_exiexportacion 
                                                WHERE  
                                                    FOLIO_AUXILIAR_EXIEXPORTACION LIKE '" . $FOLIOAUXILIAREXIEXPORTACION . "' 
                                                    AND ESTADO_REGISTRO =  1 
                                                    AND ESTADO != 0  
                                                    GROUP BY FOLIO_AUXILIAR_EXIEXPORTACION ;");
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



    public function buscarPorProcesoFolio($IDPROCESO,  $FOLIODREXPORTACION)
    {
        try {

            $datos = $this->conexion->prepare("SELECT * 
                                                FROM fruta_exiexportacion 
                                                WHERE ID_PROCESO= '" . $IDPROCESO . "' 
                                                AND FOLIO_AUXILIAR_EXIEXPORTACION = '" . $FOLIODREXPORTACION . "';");
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

    public function buscarPorRecepcionFolio($IDRECEPCIONPT,  $FOLIODREXPORTACION)
    {
        try {

            $datos = $this->conexion->prepare(" SELECT * 
                                                FROM fruta_exiexportacion 
                                                WHERE 
                                                    ID_RECEPCION= '" . $IDRECEPCIONPT . "' 
                                                    AND FOLIO_AUXILIAR_EXIEXPORTACION = '" . $FOLIODREXPORTACION . "';");
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

    public function buscarPorReembalajeFolio($IDREEMBALAJE,  $FOLIODREXPORTACION)
    {
        try {

            $datos = $this->conexion->prepare(" SELECT * 
                                                FROM fruta_exiexportacion 
                                                WHERE 
                                                    ID_REEMBALAJE= '" . $IDREEMBALAJE . "' 
                                                    AND FOLIO_AUXILIAR_EXIEXPORTACION = '" . $FOLIODREXPORTACION . "';");
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



    public function buscarPorFolioAgrupado($FOLIOAUXILIAREXIEXPORTACION)
    {
        try {

            $datos = $this->conexion->prepare("SELECT 
                                                    FOLIO_AUXILIAR_EXIEXPORTACION,
                                                    ID_ESTANDAR,
                                                    ID_EMPRESA,
                                                    IFNULL(SUM(CANTIDAD_ENVASE_EXIEXPORTACION),0) AS 'ENVASE',
                                                    IFNULL(SUM(KILOS_NETO_EXIEXPORTACION),0)  AS 'NETO',
                                                    IFNULL(SUM(KILOS_DESHIRATACION_EXIEXPORTACION),0) AS 'DESHIRATACION',
                                                    IFNULL(SUM(KILOS_BRUTO_EXIEXPORTACION),0) AS 'BRUTO' 
                                            FROM fruta_exiexportacion 
                                            WHERE   ESTADO_REGISTRO =  1 
                                                AND ESTADO > 0
                                                AND FOLIO_AUXILIAR_EXIEXPORTACION LIKE '" . $FOLIOAUXILIAREXIEXPORTACION . "' 
                                            GROUP BY FOLIO_AUXILIAR_EXIEXPORTACION, ID_ESTANDAR            
            
                          ;");
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

    public function buscarPorFoliotTarja($FOLIOAUXILIAREXIEXPORTACION)
    {
        try {

            $datos = $this->conexion->prepare(" SELECT 
                                                    DATE_FORMAT(FECHA_EMBALADO_EXIEXPORTACION, '%d-%m-%Y') AS 'EMBALADO',
                                                    IFNULL(CANTIDAD_ENVASE_EXIEXPORTACION,0) AS 'ENVASE',
                                                    IFNULL(KILOS_NETO_EXIEXPORTACION,0) AS 'NETO',
                                                    IFNULL(KILOS_DESHIRATACION_EXIEXPORTACION,0) AS 'DESHIRATACION',
                                                    IFNULL(PDESHIDRATACION_EXIEXPORTACION,0) AS 'PORCENTAJE',
                                                    IFNULL(KILOS_BRUTO_EXIEXPORTACION,0) AS 'BRUTO',
                                                    ID_PRODUCTOR,
                                                    ID_VESPECIES,
                                                    EMBOLSADO
                                                FROM fruta_exiexportacion 
                                                WHERE  
                                                    FOLIO_AUXILIAR_EXIEXPORTACION LIKE '" . $FOLIOAUXILIAREXIEXPORTACION . "' 
                                                    AND ESTADO_REGISTRO =  1 
                                                    AND ESTADO != 0  ;");
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
    public function buscarPorRecepcionIngresado($IDRECEPCION)
    {
        try {

            $datos = $this->conexion->prepare("SELECT * 
                                            FROM fruta_exiexportacion 
                                            WHERE ID_RECEPCION= '" . $IDRECEPCION . "'  
                                            AND ESTADO = 1
                                            AND ESTADO_REGISTRO = 1;");
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

    public function buscarPorRecepcion($IDRECEPCION)
    {
        try {

            $datos = $this->conexion->prepare("SELECT * 
                                            FROM fruta_exiexportacion 
                                            WHERE ID_RECEPCION= '" . $IDRECEPCION . "'  
                                            AND ESTADO_REGISTRO = 1;");
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


    public function buscarPorPcdespacho($IDPCDESPACHO)
    {
        try {

            $datos = $this->conexion->prepare("SELECT * FROM fruta_exiexportacion 
                                            WHERE ID_PCDESPACHO= '" . $IDPCDESPACHO . "'                                              
                                            AND ESTADO_REGISTRO = 1;");
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
    public function buscarPorPcdespacho2($IDPCDESPACHO)
    {
        try {

            $datos = $this->conexion->prepare("SELECT *,           
                                                    DATE_FORMAT(FECHA_EMBALADO_EXIEXPORTACION, '%d-%m-%Y') AS 'EMBALADO',               
                                                    FORMAT(IFNULL(CANTIDAD_ENVASE_EXIEXPORTACION,0),0,'de_DE') AS 'ENVASE', 
                                                    FORMAT(IFNULL(KILOS_NETO_EXIEXPORTACION,0),2,'de_DE') AS 'NETO',
                                                    FORMAT(IFNULL(KILOS_DESHIRATACION_EXIEXPORTACION,0),2,'de_DE') AS 'DESHIRATACION',
                                                    FORMAT(IFNULL(PDESHIDRATACION_EXIEXPORTACION,0),2,'de_DE') AS 'PORCENTAJE',
                                                    FORMAT(IFNULL(KILOS_BRUTO_EXIEXPORTACION,0),2,'de_DE') AS 'BRUTO',
                                                    IF(STOCK = '0','Sin Datos',STOCK ) AS 'STOCKR' 
                                            FROM fruta_exiexportacion 
                                            WHERE ID_PCDESPACHO= '" . $IDPCDESPACHO . "'                                              
                                            AND ESTADO_REGISTRO = 1;");
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
    
    public function buscarPorPcdespachoAgrupadoPorFolio($IDPCDESPACHO)
    {
        try {

            $datos = $this->conexion->prepare("SELECT *,           
                                                    DATE_FORMAT(FECHA_EMBALADO_EXIEXPORTACION, '%d-%m-%Y') AS 'EMBALADO',               
                                                    FORMAT(IFNULL(CANTIDAD_ENVASE_EXIEXPORTACION,0),0,'de_DE') AS 'ENVASE', 
                                                    FORMAT(IFNULL(KILOS_NETO_EXIEXPORTACION,0),2,'de_DE') AS 'NETO',
                                                    FORMAT(IFNULL(KILOS_DESHIRATACION_EXIEXPORTACION,0),2,'de_DE') AS 'DESHIRATACION',
                                                    FORMAT(IFNULL(PDESHIDRATACION_EXIEXPORTACION,0),2,'de_DE') AS 'PORCENTAJE',
                                                    FORMAT(IFNULL(KILOS_BRUTO_EXIEXPORTACION,0),2,'de_DE') AS 'BRUTO',
                                                    IF(STOCK = '0','Sin Datos',STOCK ) AS 'STOCKR' 
                                                FROM fruta_exiexportacion 
                                                WHERE ID_PCDESPACHO= '" . $IDPCDESPACHO . "'                                              
                                                   AND ESTADO_REGISTRO = 1                                            
                                                GROUP BY FOLIO_AUXILIAR_EXIEXPORTACION;");
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
    public function buscarPorProcesoIngresando($IDPROCESO)
    {
        try {

            $datos = $this->conexion->prepare("SELECT * FROM fruta_exiexportacion 
                                                WHERE ID_PROCESO= '" . $IDPROCESO . "'                                            
                                                 AND ESTADO = 1
                                                 AND ESTADO_REGISTRO = 1;");
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
    public function buscarPorProceso($IDPROCESO)
    {
        try {

            $datos = $this->conexion->prepare("SELECT * FROM fruta_exiexportacion 
                                                WHERE ID_PROCESO= '" . $IDPROCESO . "'                                            
                                                 AND ESTADO_REGISTRO = 1;");
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
    public function buscarPorSag($IDINPSAG)
    {
        try {

            $datos = $this->conexion->prepare("SELECT * FROM fruta_exiexportacion 
                                            WHERE ID_INPSAG= '" . $IDINPSAG . "'   
                                        
                                            AND ESTADO_REGISTRO = 1;");
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




    public function buscarPorRepaletizaje($IDREPALETIZAJE)
    {
        try {

            $datos = $this->conexion->prepare("SELECT * 
                                                FROM fruta_exiexportacion 
                                                WHERE ID_REPALETIZAJE= '" . $IDREPALETIZAJE . "'   
                                                AND ESTADO BETWEEN 3  AND 4 ;");
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


    public function buscarExiexportacionEliminar($FOLIOAUX, $CANTIDAD, $TMANEJO, $TCALIBRE, $TEMBALAJE, $VARIEDAD, $PRODUCTOR, $ESTANDAR, $FOLIO, $FECHAEMBALADO, $IDREPALETIZAJE)
    {
        try {

            $datos = $this->conexion->prepare("SELECT * 
                                                FROM fruta_exiexportacion
                                                WHERE FOLIO_AUXILIAR_EXIEXPORTACION= '" . $FOLIOAUX . "'
                                                    AND CANTIDAD_ENVASE_EXIEXPORTACION= '" . $CANTIDAD . "'
                                                    AND ID_TMANEJO= '" . $TMANEJO . "'  
                                                    AND ID_TCALIBRE= '" . $TCALIBRE . "'  
                                                    AND ID_TEMBALAJE= '" . $TEMBALAJE . "'  
                                                    AND ID_VESPECIES= '" . $VARIEDAD . "'
                                                    AND ID_PRODUCTOR= '" . $PRODUCTOR . "'   
                                                    AND ID_ESTANDAR= '" . $ESTANDAR . "'   
                                                    AND ID_FOLIO= '" . $FOLIO . "'  
                                                    AND FECHA_EMBALADO_EXIEXPORTACION= '" . $FECHAEMBALADO . "'   
                                                    AND ID_REPALETIZAJE= '" . $IDREPALETIZAJE . "' 
                                                    AND ESTADO_REGISTRO = 1 
                                                    AND ESTADO BETWEEN 1 AND 2
                                                   
                                                    ;	");
            $datos->execute();
            $resultado = $datos->fetchAll();
            $datos=null;

            //print_r($resultado);
        	//var_dump($resultado);


            return $resultado;
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
    public function buscarPorRepaletizaje2($IDREPALETIZAJE)
    {
        try {

            $datos = $this->conexion->prepare("SELECT * ,           
                                                    DATE_FORMAT(FECHA_EMBALADO_EXIEXPORTACION, '%d-%m-%Y') AS 'EMBALADO',               
                                                    FORMAT(IFNULL(CANTIDAD_ENVASE_EXIEXPORTACION,0),0,'de_DE') AS 'ENVASE', 
                                                    FORMAT(IFNULL(KILOS_NETO_EXIEXPORTACION,0),2,'de_DE') AS 'NETO',
                                                    FORMAT(IFNULL(KILOS_DESHIRATACION_EXIEXPORTACION,0),2,'de_DE') AS 'DESHIRATACION',
                                                    FORMAT(IFNULL(PDESHIDRATACION_EXIEXPORTACION,0),2,'de_DE') AS 'PORCENTAJE',
                                                    FORMAT(IFNULL(KILOS_BRUTO_EXIEXPORTACION,0),2,'de_DE') AS 'BRUTO',
                                                    IF(STOCK = '0','Sin Datos',STOCK ) AS 'STOCKR'
                                                FROM fruta_exiexportacion 
                                                WHERE ID_REPALETIZAJE= '" . $IDREPALETIZAJE . "'   
                                                AND ESTADO BETWEEN 3  AND 4 ;");
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

    public function buscarPorRepaletizajeIngresando($IDREPALETIZAJE)
    {
        try {

            $datos = $this->conexion->prepare("SELECT * 
                                                FROM fruta_exiexportacion 
                                                WHERE ID_REPALETIZAJE= '" . $IDREPALETIZAJE . "' 
                                                    AND  ESTADO = 1  
                                                    AND ESTADO_REGISTRO = 1;");
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

    public function buscarPorRepaletizajeAgrupado($IDREPALETIZAJE)
    {
        try {

            $datos = $this->conexion->prepare("SELECT * 
                                                FROM fruta_exiexportacion 
                                                WHERE ID_REPALETIZAJE= '" . $IDREPALETIZAJE . "'   
                                                AND ESTADO BETWEEN 3  AND 4 
                                                GROUP BY FOLIO_AUXILIAR_EXIEXPORTACION
                                                
                                                ;");
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


    public function buscarPordespacho($IDDESEXPORTACION)
    {
        try {

            $datos = $this->conexion->prepare("SELECT *  ,           
                                                    FECHA_EMBALADO_EXIEXPORTACION AS 'EMBALADO',                         
                                                    IFNULL(FECHA_PROCESO,'Sin Datos') AS 'PROCESO',
                                                    IFNULL(FECHA_REEMBALAJE,'Sin Datos') AS 'REEMBALAJE',
                                                    IFNULL(FECHA_REPALETIZAJE,'Sin Datos') AS 'REPALETIZAJE',
                                                    IFNULL(FECHA_DESPACHO,'Sin Datos') AS 'DESPACHO',            
                                                    IFNULL(CANTIDAD_ENVASE_EXIEXPORTACION,0) AS 'ENVASE', 
                                                    IFNULL(KILOS_NETO_EXIEXPORTACION,0) AS 'NETO',
                                                    IFNULL(KILOS_DESHIRATACION_EXIEXPORTACION,0) AS 'DESHIRATACION',
                                                    IFNULL(PDESHIDRATACION_EXIEXPORTACION,0) AS 'PORCENTAJE',
                                                    IFNULL(KILOS_BRUTO_EXIEXPORTACION,0) AS 'BRUTO',
                                                    IFNULL(PRECIO_PALLET,0) AS 'PRECIO',
                                                    IFNULL(PRECIO_PALLET*CANTIDAD_ENVASE_EXIEXPORTACION,0) AS 'TOTAL_PRECIO',
                                                    IF(STOCK = '0','Sin Datos',STOCK ) AS 'STOCKR'
                                                FROM fruta_exiexportacion 
                                                WHERE ID_DESPACHO= '" . $IDDESEXPORTACION . "'   
                                                AND ESTADO BETWEEN 7 AND  9
                                                AND ESTADO_REGISTRO = 1;");
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

    public function buscarPordespacho2($IDDESEXPORTACION)
    {
        try {

            $datos = $this->conexion->prepare("SELECT *  ,           
                                                    DATE_FORMAT(FECHA_EMBALADO_EXIEXPORTACION, '%d-%m-%Y') AS 'EMBALADO',               
                                                    FORMAT(IFNULL(CANTIDAD_ENVASE_EXIEXPORTACION,0),0,'de_DE') AS 'ENVASE', 
                                                    FORMAT(IFNULL(KILOS_NETO_EXIEXPORTACION,0),2,'de_DE') AS 'NETO',
                                                    FORMAT(IFNULL(KILOS_DESHIRATACION_EXIEXPORTACION,0),2,'de_DE') AS 'DESHIRATACION',
                                                    FORMAT(IFNULL(PDESHIDRATACION_EXIEXPORTACION,0),2,'de_DE') AS 'PORCENTAJE',
                                                    FORMAT(IFNULL(KILOS_BRUTO_EXIEXPORTACION,0),2,'de_DE') AS 'BRUTO',
                                                    FORMAT(IFNULL(PRECIO_PALLET,0),2,'de_DE') AS 'PRECIO',
                                                    FORMAT(IFNULL(PRECIO_PALLET*CANTIDAD_ENVASE_EXIEXPORTACION,0),2,'de_DE') AS 'TOTAL_PRECIO',
                                                    IF(STOCK = '0','Sin Datos',STOCK ) AS 'STOCKR'
                                                FROM fruta_exiexportacion 
                                                WHERE ID_DESPACHO= '" . $IDDESEXPORTACION . "'   
                                                AND ESTADO BETWEEN 7 AND  9
                                                AND ESTADO_REGISTRO = 1;");
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
    public function buscarPordespachoEx2($IDDESEXPORTACION)
    {
        try {

            $datos = $this->conexion->prepare("SELECT * ,           
                                                    DATE_FORMAT(FECHA_EMBALADO_EXIEXPORTACION, '%d-%m-%Y') AS 'EMBALADO',               
                                                    FORMAT(IFNULL(CANTIDAD_ENVASE_EXIEXPORTACION,0),0,'de_DE') AS 'ENVASE', 
                                                    FORMAT(IFNULL(KILOS_NETO_EXIEXPORTACION,0),2,'de_DE') AS 'NETO',
                                                    FORMAT(IFNULL(KILOS_DESHIRATACION_EXIEXPORTACION,0),2,'de_DE') AS 'DESHIRATACION',
                                                    FORMAT(IFNULL(PDESHIDRATACION_EXIEXPORTACION,0),2,'de_DE') AS 'PORCENTAJE',
                                                    FORMAT(IFNULL(KILOS_BRUTO_EXIEXPORTACION,0),2,'de_DE') AS 'BRUTO',
                                                    IF(STOCK = '0','Sin Datos',STOCK ) AS 'STOCKR'
                                                FROM fruta_exiexportacion 
                                                WHERE ID_DESPACHOEX= '" . $IDDESEXPORTACION . "'   
                                                AND ESTADO BETWEEN 7 AND  8
                                                AND ESTADO_REGISTRO = 1;");
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

    public function buscarPordespachoEx($IDDESEXPORTACION)
    {
        try {

            $datos = $this->conexion->prepare("SELECT * ,           
                                                    FECHA_EMBALADO_EXIEXPORTACION AS 'EMBALADO',                         
                                                    IFNULL(FECHA_RECEPCION,'Sin Datos') AS 'RECEPCION',
                                                    IFNULL(FECHA_PROCESO,'Sin Datos') AS 'PROCESO',
                                                    IFNULL(FECHA_REEMBALAJE,'Sin Datos') AS 'REEMBALAJE',
                                                    IFNULL(FECHA_REPALETIZAJE,'Sin Datos') AS 'REPALETIZAJE',
                                                    IFNULL(FECHA_DESPACHO,'Sin Datos') AS 'DESPACHO',            
                                                    IFNULL(CANTIDAD_ENVASE_EXIEXPORTACION,0) AS 'ENVASE', 
                                                    IFNULL(KILOS_NETO_EXIEXPORTACION,0) AS 'NETO',
                                                    IFNULL(KILOS_DESHIRATACION_EXIEXPORTACION,0) AS 'DESHIRATACION',
                                                    IFNULL(PDESHIDRATACION_EXIEXPORTACION,0) AS 'PORCENTAJE',
                                                    IFNULL(KILOS_BRUTO_EXIEXPORTACION,0) AS 'BRUTO',
                                                    IFNULL(PRECIO_PALLET,0) AS 'PRECIO',
                                                    IFNULL(PRECIO_PALLET*CANTIDAD_ENVASE_EXIEXPORTACION,0) AS 'TOTAL_PRECIO',
                                                    IF(STOCK = '0','Sin Datos',STOCK ) AS 'STOCKR'
                                                FROM fruta_exiexportacion 
                                                WHERE ID_DESPACHOEX= '" . $IDDESEXPORTACION . "'   
                                                AND ESTADO BETWEEN 7 AND  8
                                                AND ESTADO_REGISTRO = 1;");
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

    public function buscarPorEnTransito($IDDESPACHOMP)
    {
        try {

            $datos = $this->conexion->prepare("SELECT * FROM fruta_exiexportacion 
                                        WHERE ID_DESPACHO= '" . $IDDESPACHOMP . "'   
                                        AND ESTADO = 9  
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

    public function buscarPorReembalaje($IDREEMBALAJE)
    {
        try {

            $datos = $this->conexion->prepare("SELECT * FROM fruta_exiexportacion
                                            WHERE ID_REEMBALAJE= '" . $IDREEMBALAJE . "'
                                            AND ESTADO BETWEEN 5 AND 6
                                            AND ESTADO_REGISTRO = 1;");
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
    public function buscarPorReembalajeIngresando($IDREEMBALAJE)
    {
        try {

            $datos = $this->conexion->prepare("SELECT * FROM fruta_exiexportacion
                                            WHERE ID_REEMBALAJE= '" . $IDREEMBALAJE . "'
                                            AND ESTADO = 1
                                            AND ESTADO_REGISTRO = 1;");
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


    public function buscarPorReembalaje2($IDREEMBALAJE)
    {
        try {

            $datos = $this->conexion->prepare("SELECT * ,           
                                                        DATE_FORMAT(FECHA_EMBALADO_EXIEXPORTACION, '%d-%m-%Y') AS 'EMBALADO',               
                                                        FORMAT(IFNULL(CANTIDAD_ENVASE_EXIEXPORTACION,0),0,'de_DE') AS 'ENVASE', 
                                                        FORMAT(IFNULL(KILOS_NETO_EXIEXPORTACION,0),2,'de_DE') AS 'NETO',
                                                        FORMAT(IFNULL(KILOS_DESHIRATACION_EXIEXPORTACION,0),2,'de_DE') AS 'DESHIRATACION',
                                                        FORMAT(IFNULL(PDESHIDRATACION_EXIEXPORTACION,0),2,'de_DE') AS 'PORCENTAJE',
                                                        FORMAT(IFNULL(KILOS_BRUTO_EXIEXPORTACION,0),2,'de_DE') AS 'BRUTO',
                                                        IF(STOCK = '0','Sin Datos',STOCK ) AS 'STOCKR'
                                                FROM fruta_exiexportacion
                                                WHERE ID_REEMBALAJE= '" . $IDREEMBALAJE . "'
                                                AND ESTADO BETWEEN 5 AND 6
                                                AND ESTADO_REGISTRO = 1;");
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
    
    public function buscarPorRecepcionNumeroFolio($IDRECEPCION, $NUMEROFOLIO)
    {
        try {

            $datos = $this->conexion->prepare("SELECT * 
                                               FROM fruta_exiexportacion 
                                               WHERE 
                                                    ID_RECEPCION= '" . $IDRECEPCION . "'  
                                                    AND FOLIO_EXIEXPORTACION= '" . $NUMEROFOLIO . "'  
                                                    AND FOLIO_AUXILIAR_EXIEXPORTACION= '" . $NUMEROFOLIO . "'  
                                                    AND ESTADO_REGISTRO = 1
                                                    AND ESTADO !=0;");
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
    public function buscarPorProcesoNumeroFolio($IDPROCESO, $NUMEROFOLIO)
    {
        try {

            $datos = $this->conexion->prepare("SELECT * 
                                               FROM fruta_exiexportacion 
                                               WHERE 
                                                    ID_PROCESO= '" . $IDPROCESO . "'  
                                                    AND FOLIO_EXIEXPORTACION= '" . $NUMEROFOLIO . "'  
                                                    AND FOLIO_AUXILIAR_EXIEXPORTACION= '" . $NUMEROFOLIO . "'  
                                                    AND ESTADO_REGISTRO = 1
                                                    AND ESTADO !=0;");
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
    public function buscarPorReembalajeNumeroFolio($IDREEMBALAJE, $NUMEROFOLIO)
    {
        try {

            $datos = $this->conexion->prepare("SELECT * 
                                               FROM fruta_exiexportacion 
                                               WHERE 
                                                    ID_REEMBALAJE= '" . $IDREEMBALAJE . "'  
                                                    AND FOLIO_EXIEXPORTACION= '" . $NUMEROFOLIO . "'  
                                                    AND FOLIO_AUXILIAR_EXIEXPORTACION= '" . $NUMEROFOLIO . "'  
                                                    AND ESTADO_REGISTRO = 1
                                                    AND ESTADO !=0;");
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

    public function buscarPorEmpresaPlantaTemporadaEstadoSagNotNullInpsag($EMPRESA, $PLANTA, $TEMPORADA)
    {
        try {

            $datos = $this->conexion->prepare(" SELECT *,           
                                                    DATE_FORMAT(FECHA_EMBALADO_EXIEXPORTACION, '%d-%m-%Y') AS 'EMBALADO',               
                                                    FORMAT(IFNULL(CANTIDAD_ENVASE_EXIEXPORTACION,0),0,'de_DE') AS 'ENVASE', 
                                                    FORMAT(IFNULL(KILOS_NETO_EXIEXPORTACION,0),2,'de_DE') AS 'NETO',
                                                    FORMAT(IFNULL(KILOS_DESHIRATACION_EXIEXPORTACION,0),2,'de_DE') AS 'DESHIRATACION',
                                                    FORMAT(IFNULL(PDESHIDRATACION_EXIEXPORTACION,0),2,'de_DE') AS 'PORCENTAJE',
                                                    FORMAT(IFNULL(KILOS_BRUTO_EXIEXPORTACION,0),2,'de_DE') AS 'BRUTO',
                                                    IF(STOCK = '0','Sin Datos',STOCK ) AS 'STOCKR'     
                                                FROM fruta_exiexportacion
                                                WHERE  ESTADO = 2                                                         
                                                AND ESTADO_REGISTRO = 1 
                                                AND ID_EMPRESA = '" . $EMPRESA . "'
                                                AND ID_PLANTA = '" . $PLANTA . "'
                                                AND ID_TEMPORADA = '" . $TEMPORADA . "'
                                                AND TESTADOSAG BETWEEN 2 AND 4  
                                                        ;");
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


    public function buscarPorPlantaTemporadaEstadoSagNullInpsag($PLANTA, $TEMPORADA)
    {
        try {

            $datos = $this->conexion->prepare(" SELECT *,           
                                                    DATE_FORMAT(FECHA_EMBALADO_EXIEXPORTACION, '%d-%m-%Y') AS 'EMBALADO',               
                                                    FORMAT(IFNULL(CANTIDAD_ENVASE_EXIEXPORTACION,0),0,'de_DE') AS 'ENVASE', 
                                                    FORMAT(IFNULL(KILOS_NETO_EXIEXPORTACION,0),2,'de_DE') AS 'NETO',
                                                    FORMAT(IFNULL(KILOS_DESHIRATACION_EXIEXPORTACION,0),2,'de_DE') AS 'DESHIRATACION',
                                                    FORMAT(IFNULL(PDESHIDRATACION_EXIEXPORTACION,0),2,'de_DE') AS 'PORCENTAJE',
                                                    FORMAT(IFNULL(KILOS_BRUTO_EXIEXPORTACION,0),2,'de_DE') AS 'BRUTO',
                                                    IF(STOCK = '0','Sin Datos',STOCK ) AS 'STOCKR'     
                                                FROM fruta_exiexportacion
                                                WHERE  ESTADO = 2                                                         
                                                AND ESTADO_REGISTRO = 1 
                                                AND ID_PLANTA = '" . $PLANTA . "'
                                                AND ID_TEMPORADA = '" . $TEMPORADA . "'
                                                AND ID_INPSAG  IS  NULL 
                                                        ;");
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

    public function buscarPorEmpresaPlantaTemporadaPcDespachoNullNotNullInpsag($EMPRESA, $PLANTA, $TEMPORADA)
    {
        try {
            $datos = $this->conexion->prepare("SELECT *,  
                                                    DATEDIFF(SYSDATE(), INGRESO) AS 'DIAS',             
                                                    DATE_FORMAT(FECHA_EMBALADO_EXIEXPORTACION, '%d-%m-%Y') AS 'EMBALADO',
                                                    DATE_FORMAT(INGRESO, '%d-%m-%Y ') AS 'INGRESO',
                                                    DATE_FORMAT(MODIFICACION, '%d-%m-%Y ') AS 'MODIFICACION',                                                    
                                                    IFNULL(DATE_FORMAT(FECHA_RECEPCION, '%d-%m-%Y'),'Sin Datos') AS 'RECEPCION',
                                                    IFNULL(DATE_FORMAT(FECHA_PROCESO, '%d-%m-%Y'),'Sin Datos') AS 'PROCESO',
                                                    IFNULL(DATE_FORMAT(FECHA_REEMBALAJE, '%d-%m-%Y'),'Sin Datos') AS 'REEMBALAJE',
                                                    IFNULL(DATE_FORMAT(FECHA_REPALETIZAJE, '%d-%m-%Y'),'Sin Datos') AS 'REPALETIZAJE',
                                                    IFNULL(DATE_FORMAT(FECHA_DESPACHO, '%d-%m-%Y'),'Sin Datos') AS 'DESPACHO',
                                                    IFNULL(DATE_FORMAT(FECHA_DESPACHOEX, '%d-%m-%Y'),'Sin Datos') AS 'DESPACHOEX',
                                                    FORMAT(IFNULL(CANTIDAD_ENVASE_EXIEXPORTACION,0),0,'de_DE') AS 'ENVASE', 
                                                    FORMAT(IFNULL(KILOS_NETO_EXIEXPORTACION,0),2,'de_DE') AS 'NETO',
                                                    FORMAT(IFNULL(KILOS_DESHIRATACION_EXIEXPORTACION,0),2,'de_DE') AS 'DESHIRATACION',
                                                    FORMAT(IFNULL(PDESHIDRATACION_EXIEXPORTACION,0),2,'de_DE') AS 'PORCENTAJE',
                                                    FORMAT(IFNULL(KILOS_BRUTO_EXIEXPORTACION,0),2,'de_DE') AS 'BRUTO',
                                                    IF(STOCK = '0','Sin Datos',STOCK ) AS 'STOCKR'
                                                FROM fruta_exiexportacion 
                                                WHERE 
                                                        ESTADO_REGISTRO = 1 
                                                        AND ESTADO = 2
                                                        AND ID_PCDESPACHO IS NULL
                                                        AND ID_EMPRESA = '" . $EMPRESA . "' 
                                                        AND ID_PLANTA = '" . $PLANTA . "'
                                                        AND ID_TEMPORADA = '" . $TEMPORADA . "' 
                                                        AND ID_INPSAG  IS NOT NULL
                                                        AND TESTADOSAG BETWEEN 2 AND 4  
                                          ;");
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
    public function buscarPorEmpresaPlantaTemporada($EMPRESA, $PLANTA, $TEMPORADA)
    {
        try {

            $datos = $this->conexion->prepare(" SELECT *,  
                                                        DATEDIFF(SYSDATE(), INGRESO) AS 'DIAS',             
                                                        DATE_FORMAT(FECHA_EMBALADO_EXIEXPORTACION, '%d-%m-%Y') AS 'EMBALADO',
                                                        DATE_FORMAT(INGRESO, '%d-%m-%Y ') AS 'INGRESO',
                                                        DATE_FORMAT(MODIFICACION, '%d-%m-%Y ') AS 'MODIFICACION',                                                    
                                                        IFNULL(DATE_FORMAT(FECHA_RECEPCION, '%d-%m-%Y'),'Sin Datos') AS 'RECEPCION',
                                                        IFNULL(DATE_FORMAT(FECHA_PROCESO, '%d-%m-%Y'),'Sin Datos') AS 'PROCESO',
                                                        IFNULL(DATE_FORMAT(FECHA_REEMBALAJE, '%d-%m-%Y'),'Sin Datos') AS 'REEMBALAJE',
                                                        IFNULL(DATE_FORMAT(FECHA_REPALETIZAJE, '%d-%m-%Y'),'Sin Datos') AS 'REPALETIZAJE',
                                                        IFNULL(DATE_FORMAT(FECHA_DESPACHO, '%d-%m-%Y'),'Sin Datos') AS 'DESPACHO',
                                                        IFNULL(DATE_FORMAT(FECHA_DESPACHOEX, '%d-%m-%Y'),'Sin Datos') AS 'DESPACHOEX',
                                                        FORMAT(IFNULL(CANTIDAD_ENVASE_EXIEXPORTACION,0),0,'de_DE') AS 'ENVASE', 
                                                        FORMAT(IFNULL(KILOS_NETO_EXIEXPORTACION,0),2,'de_DE') AS 'NETO',
                                                        FORMAT(IFNULL(KILOS_DESHIRATACION_EXIEXPORTACION,0),2,'de_DE') AS 'DESHIRATACION',
                                                        FORMAT(IFNULL(PDESHIDRATACION_EXIEXPORTACION,0),2,'de_DE') AS 'PORCENTAJE',
                                                        FORMAT(IFNULL(KILOS_BRUTO_EXIEXPORTACION,0),2,'de_DE') AS 'BRUTO',
                                                        IF(STOCK = '0','Sin Datos',STOCK ) AS 'STOCKR' 
                                                FROM fruta_exiexportacion 
                                                WHERE  ESTADO = 2  
                                                    AND ID_EMPRESA = '" . $EMPRESA . "'
                                                    AND ID_PLANTA = '" . $PLANTA . "'
                                                    AND ID_TEMPORADA = '" . $TEMPORADA . "'                                                      
                                                    AND ESTADO_REGISTRO = 1 
                                                        ;");
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
    public function buscarPorEmpresaPlantaTemporadaProductorVariedad($EMPRESA, $PLANTA, $TEMPORADA,  $VESPECIES, $PRODUCTOR)
    {
        try {

            $datos = $this->conexion->prepare(" SELECT *,  
                                                        DATEDIFF(SYSDATE(), INGRESO) AS 'DIAS',             
                                                        DATE_FORMAT(FECHA_EMBALADO_EXIEXPORTACION, '%d-%m-%Y') AS 'EMBALADO',
                                                        DATE_FORMAT(INGRESO, '%d-%m-%Y ') AS 'INGRESO',
                                                        DATE_FORMAT(MODIFICACION, '%d-%m-%Y ') AS 'MODIFICACION',                                                    
                                                        IFNULL(DATE_FORMAT(FECHA_RECEPCION, '%d-%m-%Y'),'Sin Datos') AS 'RECEPCION',
                                                        IFNULL(DATE_FORMAT(FECHA_PROCESO, '%d-%m-%Y'),'Sin Datos') AS 'PROCESO',
                                                        IFNULL(DATE_FORMAT(FECHA_REEMBALAJE, '%d-%m-%Y'),'Sin Datos') AS 'REEMBALAJE',
                                                        IFNULL(DATE_FORMAT(FECHA_REPALETIZAJE, '%d-%m-%Y'),'Sin Datos') AS 'REPALETIZAJE',
                                                        IFNULL(DATE_FORMAT(FECHA_DESPACHO, '%d-%m-%Y'),'Sin Datos') AS 'DESPACHO',
                                                        IFNULL(DATE_FORMAT(FECHA_DESPACHOEX, '%d-%m-%Y'),'Sin Datos') AS 'DESPACHOEX',
                                                        FORMAT(IFNULL(CANTIDAD_ENVASE_EXIEXPORTACION,0),0,'de_DE') AS 'ENVASE', 
                                                        FORMAT(IFNULL(KILOS_NETO_EXIEXPORTACION,0),2,'de_DE') AS 'NETO',
                                                        FORMAT(IFNULL(KILOS_DESHIRATACION_EXIEXPORTACION,0),2,'de_DE') AS 'DESHIRATACION',
                                                        FORMAT(IFNULL(PDESHIDRATACION_EXIEXPORTACION,0),2,'de_DE') AS 'PORCENTAJE',
                                                        FORMAT(IFNULL(KILOS_BRUTO_EXIEXPORTACION,0),2,'de_DE') AS 'BRUTO',
                                                        IF(STOCK = '0','Sin Datos',STOCK ) AS 'STOCKR' 
                                                FROM fruta_exiexportacion 
                                                WHERE  ESTADO = 2  
                                                    AND ID_PRODUCTOR = '" . $PRODUCTOR . "'
                                                    AND ID_VESPECIES = '" . $VESPECIES . "'
                                                    AND ID_EMPRESA = '" . $EMPRESA . "'
                                                    AND ID_PLANTA = '" . $PLANTA . "'
                                                    AND ID_TEMPORADA = '" . $TEMPORADA . "'                                                      
                                                    AND ESTADO_REGISTRO = 1 
                                                        ;");
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


    //OBTENER TOTALES
    public function obtenerTotalesPorPcdespacho($IDPCDESPACHO)
    {
        try {

            $datos = $this->conexion->prepare("SELECT 
                                                    IFNULL(SUM(CANTIDAD_ENVASE_EXIEXPORTACION),0) AS 'ENVASE',
                                                    IFNULL(SUM(KILOS_NETO_EXIEXPORTACION),0) AS 'NETO'
                                            FROM fruta_exiexportacion 
                                            WHERE ID_PCDESPACHO= '" . $IDPCDESPACHO . "'                                          
                                            AND ESTADO_REGISTRO = 1;");
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

    public function obtenerTotalesRepaletizaje($IDREPALETIZAJE)
    {
        try {

            $datos = $this->conexion->prepare("SELECT IFNULL(SUM(CANTIDAD_ENVASE_EXIEXPORTACION),0) AS 'ENVASE', 
                                                    IFNULL(SUM(KILOS_NETO_EXIEXPORTACION),0) AS 'NETO' 
                                            FROM fruta_exiexportacion
                                            WHERE 
                                            ID_REPALETIZAJE = '" . $IDREPALETIZAJE . "' 
                                            AND
                                            ESTADO BETWEEN 3 AND  4
                                            AND ESTADO_REGISTRO = 1;");
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


    public function obtenerTotalesReembalaje($IDREEMBALAJE)
    {
        try {

            $datos = $this->conexion->prepare("SELECT IFNULL(SUM(CANTIDAD_ENVASE_EXIEXPORTACION),0) AS 'ENVASE', 
                                                    IFNULL(SUM(KILOS_NETO_EXIEXPORTACION),0) AS 'NETO', 
                                                    IFNULL(SUM(KILOS_DESHIRATACION_EXIEXPORTACION),0) AS 'DESHIRATACION'
                                            FROM fruta_exiexportacion
                                            WHERE 
                                                ID_REEMBALAJE = '" . $IDREEMBALAJE . "' 
                                            AND  ESTADO BETWEEN 5 AND  6
                                            AND ESTADO_REGISTRO = 1;");
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
    public function obtenerTotalesDespachoEx($IDDESEXPORTACION)
    {
        try {

            $datos = $this->conexion->prepare("SELECT IFNULL(SUM(CANTIDAD_ENVASE_EXIEXPORTACION),0) AS 'ENVASE', 
                                                    IFNULL(SUM(KILOS_NETO_EXIEXPORTACION),0) AS 'NETO' ,
                                                    IFNULL(SUM(KILOS_BRUTO_EXIEXPORTACION),0) AS 'BRUTO' 
                                            FROM fruta_exiexportacion
                                            WHERE 
                                                ID_DESPACHOEX = '" . $IDDESEXPORTACION . "' 
                                            AND
                                            ESTADO BETWEEN 7 AND  8
                                            AND ESTADO_REGISTRO = 1;");
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
    public function obtenerTotalesInspSag($IDINPSAG)
    {
        try {

            $datos = $this->conexion->prepare("SELECT IFNULL(SUM(CANTIDAD_ENVASE_EXIEXPORTACION),0) AS 'ENVASE', 
                                                    IFNULL(SUM(KILOS_NETO_EXIEXPORTACION),0) AS 'NETO' ,
                                                    IFNULL(SUM(KILOS_BRUTO_EXIEXPORTACION),0) AS 'BRUTO' 
                                            FROM fruta_exiexportacion
                                            WHERE 
                                                ID_INPSAG = '" . $IDINPSAG . "' 
                                            AND ESTADO_REGISTRO = 1;");
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

    public function obtenerTotalesDespacho($IDDESPACHOMP)
    {
        try {

            $datos = $this->conexion->prepare("SELECT IFNULL(SUM(CANTIDAD_ENVASE_EXIEXPORTACION),0) AS 'ENVASE', 
                                                    IFNULL(SUM(KILOS_NETO_EXIEXPORTACION),0) AS 'NETO' ,
                                                    IFNULL(SUM(KILOS_BRUTO_EXIEXPORTACION),0) AS 'BRUTO'  ,
                                                    IFNULL(SUM(PRECIO_PALLET*CANTIDAD_ENVASE_EXIEXPORTACION),0) AS 'TOTAL_PRECIO' 
                                            FROM fruta_exiexportacion
                                            WHERE 
                                            ID_DESPACHO = '" . $IDDESPACHOMP . "' 
                                            AND ESTADO BETWEEN 7 AND  9
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

    public function obtenerTotalesEmpresaPlantaTemporadaDisponible($EMPRESA, $PLANTA, $TEMPORADA)
    {
        try {

            $datos = $this->conexion->prepare("SELECT IFNULL(SUM(CANTIDAD_ENVASE_EXIEXPORTACION),0) AS 'ENVASE', 
                                                    IFNULL(SUM(KILOS_NETO_EXIEXPORTACION),0) AS 'NETO' ,
                                                    IFNULL(SUM(KILOS_DESHIRATACION_EXIEXPORTACION),0) AS 'DESHIRATACION' ,
                                                    IFNULL(SUM(KILOS_BRUTO_EXIEXPORTACION),0) AS 'BRUTO' 
                                            FROM fruta_exiexportacion
                                            WHERE  ESTADO = 2 
                                            AND ESTADO_REGISTRO = 1 
                                            AND ID_EMPRESA = '" . $EMPRESA . "' 
                                            AND ID_PLANTA = '" . $PLANTA . "'
                                            AND ID_TEMPORADA = '" . $TEMPORADA . "' ;");
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


    public function obtenerTotalesReembalaje2($IDREEMBALAJE)
    {
        try {

            $datos = $this->conexion->prepare("SELECT FORMAT(IFNULL(SUM(CANTIDAD_ENVASE_EXIEXPORTACION),0),0,'de_DE') AS 'ENVASE', 
                                                    FORMAT(IFNULL(SUM(KILOS_NETO_EXIEXPORTACION),0),2,'de_DE') AS 'NETO' , 
                                                    FORMAT(IFNULL(SUM(KILOS_DESHIRATACION_EXIEXPORTACION),0),2,'de_DE') AS 'DESHIRATACION',
                                                    IFNULL(SUM(KILOS_NETO_EXIEXPORTACION),0) AS 'NETOSF' 
                                            FROM fruta_exiexportacion
                                            WHERE 
                                                ID_REEMBALAJE = '" . $IDREEMBALAJE . "' 
                                            AND
                                            ESTADO BETWEEN 5 AND  6 
                                            AND ESTADO_REGISTRO = 1;");
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

    public function obtenerTotalesRepaletizaje2($IDREPALETIZAJE)
    {
        try {
            $datos = $this->conexion->prepare("SELECT FORMAT(IFNULL(SUM(CANTIDAD_ENVASE_EXIEXPORTACION),0),0,'de_DE') AS 'ENVASE', 
                                                    FORMAT(IFNULL(SUM(KILOS_NETO_EXIEXPORTACION),0),2,'de_DE') AS 'NETO' 
                                            FROM fruta_exiexportacion
                                            WHERE 
                                                ID_REPALETIZAJE = '" . $IDREPALETIZAJE . "' 
                                            AND
                                            ESTADO BETWEEN 3 AND  4 
                                            AND ESTADO_REGISTRO = 1;");
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
    public function obtenerTotalesDespachoEx2($IDDESEXPORTACION)
    {
        try {

            $datos = $this->conexion->prepare("SELECT FORMAT(IFNULL(SUM(CANTIDAD_ENVASE_EXIEXPORTACION),0),0,'de_DE') AS 'ENVASE', 
                                                    FORMAT(IFNULL(SUM(KILOS_NETO_EXIEXPORTACION),0),2,'de_DE') AS 'NETO' ,
                                                    FORMAT(IFNULL(SUM(KILOS_BRUTO_EXIEXPORTACION),0),2,'de_DE') AS 'BRUTO' 
                                            FROM fruta_exiexportacion
                                            WHERE 
                                                ID_DESPACHOEX = '" . $IDDESEXPORTACION . "' 
                                            AND
                                            ESTADO BETWEEN 7 AND  8
                                            AND ESTADO_REGISTRO = 1;");
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

    public function obtenerTotalesPorPcdespacho2($IDPCDESPACHO)
    {
        try {

            $datos = $this->conexion->prepare("SELECT 
                                                    FORMAT(IFNULL(SUM(CANTIDAD_ENVASE_EXIEXPORTACION),0),0,'de_DE') AS 'ENVASE',
                                                    FORMAT(IFNULL(SUM(KILOS_NETO_EXIEXPORTACION),0),2,'de_DE') AS 'NETO'
                                            FROM fruta_exiexportacion 
                                            WHERE ID_PCDESPACHO= '" . $IDPCDESPACHO . "'                                          
                                            AND ESTADO_REGISTRO = 1;");
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
    public function contarTotalPalletDespachoEx2($IDDESPACHOEX)
    {
        try {

            $datos = $this->conexion->prepare("SELECT 
                                                ID_EMPRESA, COUNT(DISTINCT(FOLIO_AUXILIAR_EXIEXPORTACION))  AS  'PALLET'                                                 
                                            FROM fruta_exiexportacion
                                            WHERE ESTADO_REGISTRO = 1
                                            AND ID_DESPACHOEX= '" . $IDDESPACHOEX . "'  ;");
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

    public function contarTotalPalletRepaletizajeEx($IDREPALETIZAJE)
    {
        try {

            $datos = $this->conexion->prepare("SELECT 
                                                ID_EMPRESA, COUNT(DISTINCT(FOLIO_AUXILIAR_EXIEXPORTACION))  AS  'PALLET'                                                 
                                            FROM fruta_exiexportacion
                                            WHERE ESTADO_REGISTRO = 1 
                                            AND ESTADO BETWEEN 3  AND 4
                                            AND ID_REPALETIZAJE= '" . $IDREPALETIZAJE . "'     ;");
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
    public function obtenerTotalesInspSag2($IDINPSAG)
    {
        try {

            $datos = $this->conexion->prepare("SELECT 
                                                    FORMAT(IFNULL(SUM(CANTIDAD_ENVASE_EXIEXPORTACION),0),0,'de_DE') AS 'ENVASE', 
                                                    FORMAT(IFNULL(SUM(KILOS_NETO_EXIEXPORTACION),0),2,'de_DE') AS 'NETO' ,
                                                    FORMAT(IFNULL(SUM(KILOS_BRUTO_EXIEXPORTACION),0),2,'de_DE') AS 'BRUTO' 
                                            FROM fruta_exiexportacion
                                            WHERE 
                                                ID_INPSAG = '" . $IDINPSAG . "' 
                                                 AND ESTADO_REGISTRO = 1;");
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

    public function contarTotalPalletInspSag2($IDINPSAG)
    {
        try {

            $datos = $this->conexion->prepare("SELECT 
                                                    ID_EMPRESA, COUNT(DISTINCT(FOLIO_AUXILIAR_EXIEXPORTACION))  AS  'PALLET'                                                 
                                                FROM fruta_exiexportacion
                                                WHERE ESTADO_REGISTRO = 1
                                                AND 
                                                    ID_INPSAG = '" . $IDINPSAG . "' 
                                                ;");
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


    public function obtenerTotalesEmpresaPlantaTemporadaDisponible2($EMPRESA, $PLANTA, $TEMPORADA)
    {
        try {


            $datos = $this->conexion->prepare("SELECT FORMAT(IFNULL(SUM(CANTIDAD_ENVASE_EXIEXPORTACION),0),0,'de_DE') AS 'ENVASE', 
                                                    FORMAT(IFNULL(SUM(KILOS_NETO_EXIEXPORTACION),0),2,'de_DE')  AS 'NETO' ,
                                                    FORMAT(IFNULL(SUM(KILOS_DESHIRATACION_EXIEXPORTACION),0),2,'de_DE')  AS 'DESHIRATACION' ,
                                                    FORMAT(IFNULL(SUM(KILOS_BRUTO_EXIEXPORTACION),0),2,'de_DE')  AS 'BRUTO' 
                                            FROM fruta_exiexportacion
                                            WHERE  ESTADO = 2 
                                            AND ESTADO_REGISTRO = 1 
                                            AND ID_EMPRESA = '" . $EMPRESA . "' 
                                            AND ID_PLANTA = '" . $PLANTA . "'
                                            AND ID_TEMPORADA = '" . $TEMPORADA . "' ;");
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
    public function obtenerTotalesEmpresaPlantaTemporadaDespachado2($EMPRESA, $PLANTA, $TEMPORADA)
    {
        try {


            $datos = $this->conexion->prepare("SELECT FORMAT(IFNULL(SUM(CANTIDAD_ENVASE_EXIEXPORTACION),0),0,'de_DE') AS 'ENVASE', 
                                                    FORMAT(IFNULL(SUM(KILOS_NETO_EXIEXPORTACION),0),2,'de_DE')  AS 'NETO' ,
                                                    FORMAT(IFNULL(SUM(KILOS_DESHIRATACION_EXIEXPORTACION),0),2,'de_DE')  AS 'DESHIRATACION' ,
                                                    FORMAT(IFNULL(SUM(KILOS_BRUTO_EXIEXPORTACION),0),2,'de_DE')  AS 'BRUTO' 
                                            FROM fruta_exiexportacion
                                            WHERE  ESTADO = 8
                                            AND ESTADO_REGISTRO = 1 
                                            AND ID_EMPRESA = '" . $EMPRESA . "' 
                                            AND ID_PLANTA = '" . $PLANTA . "'
                                            AND ID_TEMPORADA = '" . $TEMPORADA . "' ;");
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



    public function obtenerTotalesDespacho2($IDDESPACHOMP)
    {
        try {

            $datos = $this->conexion->prepare("SELECT FORMAT(IFNULL(SUM(CANTIDAD_ENVASE_EXIEXPORTACION),0),0,'de_DE') AS 'ENVASE', 
                                                    FORMAT(IFNULL(SUM(KILOS_NETO_EXIEXPORTACION),0),2,'de_DE') AS 'NETO' ,
                                                    FORMAT(IFNULL(SUM(KILOS_BRUTO_EXIEXPORTACION),0),2,'de_DE') AS 'BRUTO'  ,
                                                    FORMAT(IFNULL(SUM(PRECIO_PALLET*CANTIDAD_ENVASE_EXIEXPORTACION),0),2,'de_DE') AS 'TOTAL_PRECIO' 
                                            FROM fruta_exiexportacion
                                            WHERE 
                                            ID_DESPACHO = '" . $IDDESPACHOMP . "' 
                                            AND ESTADO BETWEEN 7 AND  9
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






    //OTRAS OPERACIONES
    public function contarExistenciaPorDespachoPrecioNulo($IDDESPACHO)
    {
        try {
            $datos = $this->conexion->prepare("SELECT 
                                                    IFNULL(COUNT(ID_EXIEXPORTACION),0)  AS 'CONTEO'
                                                FROM fruta_exiexportacion 
                                                WHERE ID_DESPACHO= '" . $IDDESPACHO . "'                                           
                                                    AND ESTADO_REGISTRO = 1
                                                    AND PRECIO_PALLET IS  NULL
                                        ;");
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
    public function vgm(EXIEXPORTACION $EXIEXPORTACION)
    {
        try {
            $query = "
                            UPDATE fruta_exiexportacion SET			
                                    VGM = ?
                            WHERE ID_EXIEXPORTACION= ?;";
            $this->conexion->prepare($query)
                ->execute(
                    array(
                        $EXIEXPORTACION->__GET('VGM'),
                        $EXIEXPORTACION->__GET('ID_EXIEXPORTACION')
                    )

                );
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }




    //SELECCCION DE EXISTENCIA
    //SELECCIONAR
    public function actualizarSelecionarRepaletizajeCambiarEstado(EXIEXPORTACION $EXIEXPORTACION)
    {
        try {
            $query = "
                    UPDATE fruta_exiexportacion SET
                        MODIFICACION = SYSDATE(),
                        ESTADO = 3,           
                        ID_REPALETIZAJE = ?,           
                        FECHA_REPALETIZAJE = ?       
                    WHERE ID_EXIEXPORTACION= ? ;";
            $this->conexion->prepare($query)
                ->execute(
                    array(
                        $EXIEXPORTACION->__GET('ID_REPALETIZAJE'),
                        $EXIEXPORTACION->__GET('FECHA_REPALETIZAJE'),
                        $EXIEXPORTACION->__GET('ID_EXIEXPORTACION')

                    )

                );
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }



    //ACTUALIZAR ESTADO, ASOCIAR PROCESO, REGISTRO HISTORIAL PROCESO
    public function actualizarSelecionarReembalajeCambiarEstado(EXIEXPORTACION $EXIEXPORTACION)
    {
        try {
            $query = "
                UPDATE fruta_exiexportacion SET
                    MODIFICACION = SYSDATE(),
                    ESTADO = 5,           
                    ID_REEMBALAJE = ?          
                WHERE ID_EXIEXPORTACION= ? ;";
            $this->conexion->prepare($query)
                ->execute(
                    array(
                        $EXIEXPORTACION->__GET('ID_REEMBALAJE'),
                        $EXIEXPORTACION->__GET('ID_EXIEXPORTACION')

                    )

                );
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
    public function actualizarSelecionarPCCambiarEstado(EXIEXPORTACION $EXIEXPORTACION)
    {
        try {
            $query = "
                    UPDATE fruta_exiexportacion SET              
                        MODIFICACION = SYSDATE(),
                        ID_PCDESPACHO = ?          
                    WHERE ID_EXIEXPORTACION= ? ;";
            $this->conexion->prepare($query)
                ->execute(
                    array(
                        $EXIEXPORTACION->__GET('ID_PCDESPACHO'),
                        $EXIEXPORTACION->__GET('ID_EXIEXPORTACION')

                    )

                );
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
    //ACTUALIZAR ESTADO, ASOCIAR PROCESO, REGISTRO HISTORIAL PROCESO
    public function actualizarSelecionarDespachoCambiarEstado(EXIEXPORTACION $EXIEXPORTACION)
    {
        try {
            $query = "
                UPDATE fruta_exiexportacion SET
                    MODIFICACION = SYSDATE(),
                    ESTADO = 7,           
                    ID_DESPACHO = ?          
                WHERE ID_EXIEXPORTACION= ?;";
            $this->conexion->prepare($query)
                ->execute(
                    array(
                        $EXIEXPORTACION->__GET('ID_DESPACHO'),
                        $EXIEXPORTACION->__GET('ID_EXIEXPORTACION')

                    )

                );
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
    //ACTUALIZAR ESTADO, ASOCIAR PROCESO, REGISTRO HISTORIAL PROCESO

    public function actualizarDespachoAgregarPrecio(EXIEXPORTACION $EXIEXPORTACION)
    {
        try {
            $query = "
                    UPDATE fruta_exiexportacion SET
                        MODIFICACION = SYSDATE(), 
                        ID_DESPACHO = ?,    
                        PRECIO_PALLET = ?         
                    WHERE ID_EXIEXPORTACION= ? ;";
            $this->conexion->prepare($query)
                ->execute(
                    array(
                        $EXIEXPORTACION->__GET('ID_DESPACHO'),
                        $EXIEXPORTACION->__GET('PRECIO_PALLET'),
                        $EXIEXPORTACION->__GET('ID_EXIEXPORTACION')

                    )

                );
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
    public function actualizarSelecionarSagCambiarEstado(EXIEXPORTACION $EXIEXPORTACION)
    {
        try {
            $query = "
                    UPDATE fruta_exiexportacion SET                    
                        MODIFICACION = SYSDATE(),
                        TESTADOSAG = 1 ,
                        ID_INPSAG = ?          
                    WHERE ID_EXIEXPORTACION= ?;";
            $this->conexion->prepare($query)
                ->execute(
                    array(
                        $EXIEXPORTACION->__GET('ID_INPSAG'),
                        $EXIEXPORTACION->__GET('ID_EXIEXPORTACION')

                    )

                );
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    //DESELECIONAR
    public function actualizarDeselecionarDespachoCambiarEstado(EXIEXPORTACION $EXIEXPORTACION)
    {
        try {
            $query = "
                    UPDATE fruta_exiexportacion SET
                        MODIFICACION = SYSDATE(), 
                        ESTADO = 2,          
                        ID_DESPACHO = null, 
                        PRECIO_PALLET = NULL          
                    WHERE ID_EXIEXPORTACION= ?;";
            $this->conexion->prepare($query)
                ->execute(
                    array(
                        $EXIEXPORTACION->__GET('ID_EXIEXPORTACION')

                    )

                );
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
    public function actualizarDeselecionarPCCambiarEstado(EXIEXPORTACION $EXIEXPORTACION)
    {
        try {
            $query = "
            UPDATE fruta_exiexportacion SET                    
                MODIFICACION = SYSDATE(), 
                ID_PCDESPACHO = null          
            WHERE ID_EXIEXPORTACION= ? ;";
            $this->conexion->prepare($query)
                ->execute(
                    array(
                        $EXIEXPORTACION->__GET('ID_EXIEXPORTACION')

                    )

                );
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function actualizarDeselecionarReembalajeeCambiarEstado(EXIEXPORTACION $EXIEXPORTACION)
    {
        try {
            $query = "
                UPDATE fruta_exiexportacion SET
                    MODIFICACION = SYSDATE(), 
                    ESTADO = 2,          
                    ID_REEMBALAJE = null          
                WHERE ID_EXIEXPORTACION= ? ;";
            $this->conexion->prepare($query)
                ->execute(
                    array(
                        $EXIEXPORTACION->__GET('ID_EXIEXPORTACION')

                    )

                );
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function actualizarDeselecionarRepaletizajeCambiarEstado(EXIEXPORTACION $EXIEXPORTACION)
    {
        try {
            $query = "
                    UPDATE fruta_exiexportacion SET
                        MODIFICACION = SYSDATE(), 
                        ESTADO = 2,          
                        ID_REPALETIZAJE = null          
                    WHERE ID_EXIEXPORTACION= ?;";
            $this->conexion->prepare($query)
                ->execute(
                    array(
                        $EXIEXPORTACION->__GET('ID_EXIEXPORTACION')

                    )

                );
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
    public function actualizarSelecionarDespachoExCambiarEstado(EXIEXPORTACION $EXIEXPORTACION)
    {
        try {
            $query = "
                UPDATE fruta_exiexportacion SET
                    MODIFICACION = SYSDATE(),
                    ESTADO = 7,           
                    ID_DESPACHOEX = ?          
                WHERE ID_EXIEXPORTACION= ? ;";
            $this->conexion->prepare($query)
                ->execute(
                    array(
                        $EXIEXPORTACION->__GET('ID_DESPACHOEX'),
                        $EXIEXPORTACION->__GET('ID_EXIEXPORTACION')

                    )

                );
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
    //ACTUALIZAR ESTADO, ASOCIAR PROCESO, REGISTRO HISTORIAL PROCESO
    public function actualizarDeselecionarDespachoExCambiarEstado(EXIEXPORTACION $EXIEXPORTACION)
    {
        try {
            $query = "
            UPDATE fruta_exiexportacion SET
                MODIFICACION = SYSDATE(), 
                ESTADO = 2,          
                ID_DESPACHOEX = null          
            WHERE ID_EXIEXPORTACION= ? ;";
            $this->conexion->prepare($query)
                ->execute(
                    array(
                        $EXIEXPORTACION->__GET('ID_EXIEXPORTACION')

                    )

                );
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
    public function actualizarDeselecionarSagCambiarEstado(EXIEXPORTACION $EXIEXPORTACION)
    {
        try {
            $query = "
                UPDATE fruta_exiexportacion SET                 
                    MODIFICACION = SYSDATE(), 
                    TESTADOSAG = 0 ,
                    ID_INPSAG = null          
                WHERE ID_EXIEXPORTACION= ? ;";
            $this->conexion->prepare($query)
                ->execute(
                    array(
                        $EXIEXPORTACION->__GET('ID_EXIEXPORTACION')

                    )

                );
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }


    //CAMBIAR ESTADOS


    //OPERACIONES DE CAMBIO DE ESTADO



    public function eliminadoRecepcion(EXIEXPORTACION $EXIEXPORTACION)
    {

        try {
            $query = "
                    UPDATE fruta_exiexportacion SET			
                            MODIFICACION = SYSDATE(), 
                            ESTADO = 0
                    WHERE FOLIO_AUXILIAR_EXIEXPORTACION = ?  AND ID_RECEPCION = ?; ";
            $this->conexion->prepare($query)
                ->execute(
                    array(
                        $EXIEXPORTACION->__GET('FOLIO_AUXILIAR_EXIEXPORTACION'),
                        $EXIEXPORTACION->__GET('ID_RECEPCION')
                    )

                );
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
    public function eliminadoProceso(EXIEXPORTACION $EXIEXPORTACION)
    {

        try {
            $query = "
                    UPDATE fruta_exiexportacion SET			
                            MODIFICACION = SYSDATE(), 
                            ESTADO = 0
                    WHERE FOLIO_AUXILIAR_EXIEXPORTACION = ? AND FOLIO_EXIEXPORTACION = ? AND ID_PROCESO = ? ; ";
            $this->conexion->prepare($query)
                ->execute(
                    array(
                        $EXIEXPORTACION->__GET('FOLIO_AUXILIAR_EXIEXPORTACION'),
                        $EXIEXPORTACION->__GET('FOLIO_EXIEXPORTACION'),
                        $EXIEXPORTACION->__GET('ID_PROCESO')
                    )

                );
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function eliminadoReenmbalaje(EXIEXPORTACION $EXIEXPORTACION)
    {

        try {
            $query = "
                    UPDATE fruta_exiexportacion SET			
                            MODIFICACION = SYSDATE(), 
                            ESTADO = 0
                    WHERE FOLIO_AUXILIAR_EXIEXPORTACION = ?  AND ID_REEMBALAJE = ?   AND ESTADO = 1; ";
            $this->conexion->prepare($query)
                ->execute(
                    array(
                        $EXIEXPORTACION->__GET('FOLIO_AUXILIAR_EXIEXPORTACION'),
                        $EXIEXPORTACION->__GET('ID_REEMBALAJE')
                    )

                );
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
    public function eliminado(EXIEXPORTACION $EXIEXPORTACION)
    {
        try {
            $query = "
                            UPDATE fruta_exiexportacion SET	
                                    MODIFICACION = SYSDATE(), 		
                                    ESTADO = 0
                            WHERE ID_EXIEXPORTACION= ?;";
            $this->conexion->prepare($query)
                ->execute(
                    array(
                        $EXIEXPORTACION->__GET('ID_EXIEXPORTACION')
                    )

                );
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
    public function eliminadoRepaletizaje(EXIEXPORTACION $EXIEXPORTACION)
    {
        try {
            $query = "
                            UPDATE fruta_exiexportacion SET	
                                    MODIFICACION = SYSDATE(), 		
                                    ESTADO = 0
                            WHERE ID_EXIEXPORTACION= ? AND ID_REPALETIZAJE = ? ;";
            $this->conexion->prepare($query)
                ->execute(
                    array(
                        $EXIEXPORTACION->__GET('ID_EXIEXPORTACION'),
                        $EXIEXPORTACION->__GET('ID_REPALETIZAJE')
                    )

                );
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
    public function ingresando(EXIEXPORTACION $EXIEXPORTACION)
    {
        try {
            $query = "
                            UPDATE fruta_exiexportacion SET	
                                    MODIFICACION = SYSDATE(), 		
                                    ESTADO = 1
                            WHERE ID_EXIEXPORTACION= ?;";
            $this->conexion->prepare($query)
                ->execute(
                    array(
                        $EXIEXPORTACION->__GET('ID_EXIEXPORTACION')
                    )

                );
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
    public function vigente(EXIEXPORTACION $EXIEXPORTACION)
    {
        try {
            $query = "
                            UPDATE fruta_exiexportacion SET                            
                                    MODIFICACION = SYSDATE(),   			
                                    ESTADO = 2
                            WHERE ID_EXIEXPORTACION= ? AND ESTADO = 1;";
            $this->conexion->prepare($query)
                ->execute(
                    array(
                        $EXIEXPORTACION->__GET('ID_EXIEXPORTACION')
                    )

                );
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }


    public function enRepaletizaje(EXIEXPORTACION $EXIEXPORTACION)
    {
        try {
            $query = "
                            UPDATE fruta_exiexportacion SET	
                                    MODIFICACION = SYSDATE(), 		
                                    ESTADO = 3
                            WHERE ID_EXIEXPORTACION= ?;";
            $this->conexion->prepare($query)
                ->execute(
                    array(
                        $EXIEXPORTACION->__GET('ID_EXIEXPORTACION')
                    )

                );
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function Repaletizaje(EXIEXPORTACION $EXIEXPORTACION)
    {
        try {
            $query = "
                            UPDATE fruta_exiexportacion SET	
                                    MODIFICACION = SYSDATE(), 		
                                    ESTADO = 4
                            WHERE ID_EXIEXPORTACION= ?;";
            $this->conexion->prepare($query)
                ->execute(
                    array(
                        $EXIEXPORTACION->__GET('ID_EXIEXPORTACION')
                    )

                );
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
    public function EnReembalaje(EXIEXPORTACION $EXIEXPORTACION)
    {
        try {
            $query = "
                            UPDATE fruta_exiexportacion SET		
                                    MODIFICACION = SYSDATE(), 	
                                    ESTADO = 5
                            WHERE ID_EXIEXPORTACION= ?;";
            $this->conexion->prepare($query)
                ->execute(
                    array(
                        $EXIEXPORTACION->__GET('ID_EXIEXPORTACION')
                    )

                );
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function Reembalaje(EXIEXPORTACION $EXIEXPORTACION)
    {
        try {
            $query = "
                            UPDATE fruta_exiexportacion SET		
                                    MODIFICACION = SYSDATE(), 	
                                    ESTADO = 6
                            WHERE ID_EXIEXPORTACION= ?;";
            $this->conexion->prepare($query)
                ->execute(
                    array(
                        $EXIEXPORTACION->__GET('ID_EXIEXPORTACION')
                    )

                );
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function endespacho(EXIEXPORTACION $EXIEXPORTACION)
    {
        try {
            $query = "
                            UPDATE fruta_exiexportacion SET	
                                    MODIFICACION = SYSDATE(), 		
                                    ESTADO = 7
                            WHERE ID_EXIEXPORTACION= ?;";
            $this->conexion->prepare($query)
                ->execute(
                    array(
                        $EXIEXPORTACION->__GET('ID_EXIEXPORTACION')
                    )

                );
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
    public function despachado(EXIEXPORTACION $EXIEXPORTACION)
    {
        try {
            $query = "
                            UPDATE fruta_exiexportacion SET	
                                    MODIFICACION = SYSDATE(), 	
                                    ESTADO = 8,
                                    FECHA_DESPACHO = ?
                            WHERE ID_EXIEXPORTACION= ?;";
            $this->conexion->prepare($query)
                ->execute(
                    array(
                        $EXIEXPORTACION->__GET('FECHA_DESPACHO'),
                        $EXIEXPORTACION->__GET('ID_EXIEXPORTACION')
                    )

                );
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
    public function despachadoInterplanta(EXIEXPORTACION $EXIEXPORTACION)
    {
        try {
            $query = "
                            UPDATE fruta_exiexportacion SET	
                                    MODIFICACION = SYSDATE(), 		
                                    ESTADO = 8
                            WHERE ID_EXIEXPORTACION= ?;";
            $this->conexion->prepare($query)
                ->execute(
                    array(
                        $EXIEXPORTACION->__GET('ID_EXIEXPORTACION')
                    )

                );
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
    public function despachadoEx(EXIEXPORTACION $EXIEXPORTACION)
    {
        try {
            $query = "
                            UPDATE fruta_exiexportacion SET	
                                    MODIFICACION = SYSDATE(), 		
                                    FECHA_DESPACHOEX = ?, 		
                                    ESTADO = 8
                            WHERE ID_EXIEXPORTACION= ?;";
            $this->conexion->prepare($query)
                ->execute(
                    array(
                        $EXIEXPORTACION->__GET('FECHA_DESPACHOEX'),
                        $EXIEXPORTACION->__GET('ID_EXIEXPORTACION')
                    )

                );
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
    public function enTransito(EXIEXPORTACION $EXIEXPORTACION)
    {
        try {
            $query = "
                            UPDATE fruta_exiexportacion SET		
                                    MODIFICACION = SYSDATE(), 	
                                    ESTADO = 9, 	
                                    FECHA_DESPACHO = ?
                            WHERE ID_EXIEXPORTACION= ?;";
            $this->conexion->prepare($query)
                ->execute(
                    array(
                            $EXIEXPORTACION->__GET('FECHA_DESPACHO') ,
                            $EXIEXPORTACION->__GET('ID_EXIEXPORTACION')
                    )

                );
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function enInpeccion(EXIEXPORTACION $EXIEXPORTACION)
    {
        try {
            $query = "
                            UPDATE fruta_exiexportacion SET		                            
                                    MODIFICACION = SYSDATE(), 	
                                    ESTADO = 10
                            WHERE ID_EXIEXPORTACION= ?;";
            $this->conexion->prepare($query)
                ->execute(
                    array(
                        $EXIEXPORTACION->__GET('ID_EXIEXPORTACION')
                    )

                );
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function rechazado(EXIEXPORTACION $EXIEXPORTACION)
    {
        try {
            $query = "
                            UPDATE fruta_exiexportacion SET	
                                    MODIFICACION = SYSDATE(), 		
                                    ESTADO = 11
                            WHERE ID_EXIEXPORTACION= ?;";
            $this->conexion->prepare($query)
                ->execute(
                    array(
                        $EXIEXPORTACION->__GET('ID_EXIEXPORTACION')
                    )

                );
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }


    public function deshabilitarRecepcion(EXIEXPORTACION $EXIEXPORTACION)
    {

        try {
            $query = "
                    UPDATE fruta_exiexportacion SET			
                            MODIFICACION = SYSDATE(), 
                            ESTADO_REGISTRO = 0
                    WHERE FOLIO_AUXILIAR_EXIEXPORTACION = ?  AND ID_RECEPCION = ?; ";
            $this->conexion->prepare($query)
                ->execute(
                    array(
                        $EXIEXPORTACION->__GET('FOLIO_AUXILIAR_EXIEXPORTACION'),
                        $EXIEXPORTACION->__GET('ID_RECEPCION')
                    )

                );
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
    public function deshabilitarProceso(EXIEXPORTACION $EXIEXPORTACION)
    {

        try {
            $query = "
                    UPDATE fruta_exiexportacion SET			
                            MODIFICACION = SYSDATE(), 
                            ESTADO_REGISTRO = 0
                    WHERE FOLIO_AUXILIAR_EXIEXPORTACION = ? AND FOLIO_EXIEXPORTACION = ? AND ID_PROCESO = ?; ";
            $this->conexion->prepare($query)
                ->execute(
                    array(
                        $EXIEXPORTACION->__GET('FOLIO_AUXILIAR_EXIEXPORTACION'),
                        $EXIEXPORTACION->__GET('FOLIO_EXIEXPORTACION'),
                        $EXIEXPORTACION->__GET('ID_PROCESO')
                    )

                );
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
    public function deshabilitarReenmbalaje(EXIEXPORTACION $EXIEXPORTACION)
    {

        try {
            $query = "
                    UPDATE fruta_exiexportacion SET			
                            MODIFICACION = SYSDATE(), 
                            ESTADO_REGISTRO = 0
                    WHERE FOLIO_AUXILIAR_EXIEXPORTACION = ?  AND ID_REEMBALAJE = ?   AND ESTADO = 1; ";
            $this->conexion->prepare($query)
                ->execute(
                    array(
                        $EXIEXPORTACION->__GET('FOLIO_AUXILIAR_EXIEXPORTACION'),
                        $EXIEXPORTACION->__GET('ID_REEMBALAJE')
                    )

                );
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
    public function deshabilitarRepaletizaje(EXIEXPORTACION $EXIEXPORTACION)
    {

        try {
            $query = "
                    UPDATE fruta_exiexportacion SET		
                            MODIFICACION = SYSDATE(), 	
                            ESTADO_REGISTRO = 0 	
                    WHERE ID_EXIEXPORTACION= ? AND ID_REPALETIZAJE = ?   ;";
            $this->conexion->prepare($query)
                ->execute(
                    array(
                        $EXIEXPORTACION->__GET('ID_EXIEXPORTACION'),
                        $EXIEXPORTACION->__GET('ID_REPALETIZAJE')
                    )

                );
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
    public function deshabilitar(EXIEXPORTACION $EXIEXPORTACION)
    {

        try {
            $query = "
                    UPDATE fruta_exiexportacion SET		
                            MODIFICACION = SYSDATE(), 	
                            ESTADO_REGISTRO = 0
                    WHERE ID_EXIEXPORTACION= ?;";
            $this->conexion->prepare($query)
                ->execute(
                    array(
                        $EXIEXPORTACION->__GET('ID_EXIEXPORTACION')
                    )

                );
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
    //CAMBIO A ACTIVADO
    public function habilitar(EXIEXPORTACION $EXIEXPORTACION)
    {
        try {
            $query = "
                    UPDATE fruta_exiexportacion SET	
                            MODIFICACION = SYSDATE(), 		
                            ESTADO_REGISTRO = 1
                    WHERE ID_EXIEXPORTACION= ?;";
            $this->conexion->prepare($query)
                ->execute(
                    array(
                        $EXIEXPORTACION->__GET('ID_EXIEXPORTACION')
                    )

                );
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }





    //OTRAS FUNCIONES


    //OBTENER EL ULTIMO FOLIO OCUPADO DEL DETALLE DE  RECEPCIONS

    public function obtenerFolioConteo($IDFOLIO)
    {
        try {
            $datos = $this->conexion->prepare(" SELECT 
                                                IFNULL(COUNT(ID_FOLIO),0) AS 'conteo'
                                                FROM fruta_exiexportacion 
                                                WHERE  ID_FOLIO = '" . $IDFOLIO . "' 
                                                AND FOLIO_MANUAL = 0
                                            ");
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
    public function obtenerFolio($IDFOLIO)
    {
        try {

            $datos = $this->conexion->prepare(" SELECT IFNULL(MAX(FOLIO_AUXILIAR_EXIEXPORTACION),0) AS 'ULTIMOFOLIO'
                                                FROM fruta_exiexportacion  
                                                WHERE  ID_FOLIO= '" . $IDFOLIO . "' 
                                                AND FOLIO_MANUAL = 0
                                                AND ESTADO_REGISTRO !=0
                                                ORDER BY ULTIMOFOLIO; ");
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
    
    public function obtenerFolioRepaletizaje($IDFOLIO)
    {
        try {

            $datos = $this->conexion->prepare(" SELECT IFNULL(MAX(FOLIO_AUXILIAR_EXIEXPORTACION),0) AS 'ULTIMOFOLIO'
                                                FROM fruta_exiexportacion  
                                                WHERE  ID_FOLIO= '" . $IDFOLIO . "' 
                                                AND FOLIO_MANUAL = 0
                                                AND ESTADO !=0
                                                AND ESTADO_REGISTRO =1
                                                ORDER BY ULTIMOFOLIO; ");
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
    public function obtenerFolioRecepción($IDFOLIO)
    {
        try {

            $datos = $this->conexion->prepare(" SELECT IFNULL(MAX(FOLIO_AUXILIAR_EXIEXPORTACION),0) AS 'ULTIMOFOLIO'
                                                FROM fruta_exiexportacion  
                                                WHERE  ID_FOLIO= '" . $IDFOLIO . "' 
                                                AND FOLIO_MANUAL = 0
                                                AND ESTADO_REGISTRO !=0
                                                ORDER BY ULTIMOFOLIO; ");
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
    public function obtenerFolioProceso($IDFOLIO)
    {
        try {

            $datos = $this->conexion->prepare(" SELECT IFNULL(MAX(FOLIO_AUXILIAR_EXIEXPORTACION),0) AS 'ULTIMOFOLIO'
                                                FROM fruta_exiexportacion  
                                                WHERE  ID_FOLIO= '" . $IDFOLIO . "' 
                                                AND FOLIO_MANUAL = 0
                                                AND ESTADO_REGISTRO !=0
                                                ORDER BY ULTIMOFOLIO; ");
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
    public function actualizarEstadoSag(EXIEXPORTACION $EXIEXPORTACION)
    {
        try {
            $query = "
            UPDATE fruta_exiexportacion SET                         
                MODIFICACION = SYSDATE(),
                TESTADOSAG = ?          
            WHERE ID_EXIEXPORTACION= ? ;";
            $this->conexion->prepare($query)
                ->execute(
                    array(
                        $EXIEXPORTACION->__GET('TESTADOSAG'),
                        $EXIEXPORTACION->__GET('ID_EXIEXPORTACION')

                    )

                );
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
    public function cambioFolio(EXIEXPORTACION $EXIEXPORTACION)
    {
        try {
            $query = "
            UPDATE fruta_exiexportacion SET                         
                MODIFICACION = SYSDATE(),
                FOLIO_AUXILIAR_EXIEXPORTACION = ?          
            WHERE ID_EXIEXPORTACION= ?;";
            $this->conexion->prepare($query)
                ->execute(
                    array(
                        $EXIEXPORTACION->__GET('FOLIO_AUXILIAR_EXIEXPORTACION'),
                        $EXIEXPORTACION->__GET('ID_EXIEXPORTACION')
                    )

                );
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }





    //PACKING LIST INSPECION SAG

    public function buscarPorSagFolio($IDINPSAG)
    {
        try {

            $datos = $this->conexion->prepare("SELECT * FROM fruta_exiexportacion 
                                            WHERE ID_INPSAG= '" . $IDINPSAG . "'                                         
                                            AND ESTADO_REGISTRO = 1
                                            GROUP BY FOLIO_AUXILIAR_EXIEXPORTACION;");
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

    public function buscarPorSag2($IDINPSAG)
    {
        try {

            $datos = $this->conexion->prepare(" SELECT * ,           
                                                    DATE_FORMAT(FECHA_EMBALADO_EXIEXPORTACION, '%d-%m-%Y') AS 'EMBALADO',               
                                                    FORMAT(IFNULL(CANTIDAD_ENVASE_EXIEXPORTACION,0),0,'de_DE') AS 'ENVASE', 
                                                    FORMAT(IFNULL(KILOS_NETO_EXIEXPORTACION,0),2,'de_DE') AS 'NETO',
                                                    FORMAT(IFNULL(KILOS_DESHIRATACION_EXIEXPORTACION,0),2,'de_DE') AS 'DESHIRATACION',
                                                    FORMAT(IFNULL(PDESHIDRATACION_EXIEXPORTACION,0),2,'de_DE') AS 'PORCENTAJE',
                                                    FORMAT(IFNULL(KILOS_BRUTO_EXIEXPORTACION,0),2,'de_DE') AS 'BRUTO',
                                                    IF(STOCK = '0','Sin Datos',STOCK ) AS 'STOCKR'
                                                FROM fruta_exiexportacion 
                                                WHERE ID_INPSAG= '" . $IDINPSAG . "'                                               
                                                AND ESTADO_REGISTRO = 1;");
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
    public function buscarPorSagAgrupadoFolio($IDINPSAG)
    {
        try {

            $datos = $this->conexion->prepare("SELECT 
                                                FOLIO_AUXILIAR_EXIEXPORTACION,        
                                                DATE_FORMAT(FECHA_EMBALADO_EXIEXPORTACION, '%d-%m-%Y') AS 'EMBALADO',               
                                                IFNULL(SUM(CANTIDAD_ENVASE_EXIEXPORTACION),0) AS 'ENVASE', 
                                                IFNULL(SUM(KILOS_NETO_EXIEXPORTACION),0) AS 'NETO',
                                                IFNULL(SUM(KILOS_DESHIRATACION_EXIEXPORTACION),0) AS 'DESHIRATACION',
                                                IFNULL(SUM(PDESHIDRATACION_EXIEXPORTACION),0) AS 'PORCENTAJE',
                                                IFNULL(SUM(KILOS_BRUTO_EXIEXPORTACION),0) AS 'BRUTO'
                                            FROM fruta_exiexportacion 
                                            WHERE ID_INPSAG = '" . $IDINPSAG . "'                                          
                                            AND ESTADO_REGISTRO = 1
                                            GROUP BY FOLIO_AUXILIAR_EXIEXPORTACION ;");
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
    public function buscarPorSag2AgrupadoFolio($IDINPSAG)
    {
        try {

            $datos = $this->conexion->prepare("SELECT * ,           
                                                DATE_FORMAT(FECHA_EMBALADO_EXIEXPORTACION, '%d-%m-%Y') AS 'EMBALADO',               
                                                FORMAT(IFNULL(CANTIDAD_ENVASE_EXIEXPORTACION,0),0,'de_DE') AS 'ENVASE', 
                                                FORMAT(IFNULL(KILOS_NETO_EXIEXPORTACION,0),2,'de_DE') AS 'NETO',
                                                FORMAT(IFNULL(KILOS_DESHIRATACION_EXIEXPORTACION,0),2,'de_DE') AS 'DESHIRATACION',
                                                FORMAT(IFNULL(PDESHIDRATACION_EXIEXPORTACION,0),2,'de_DE') AS 'PORCENTAJE',
                                                FORMAT(IFNULL(KILOS_BRUTO_EXIEXPORTACION,0),2,'de_DE') AS 'BRUTO'
                                            FROM fruta_exiexportacion 
                                            WHERE ID_INPSAG = '" . $IDINPSAG . "'                                          
                                            AND ESTADO_REGISTRO = 1
                                            GROUP BY FOLIO_AUXILIAR_EXIEXPORTACION ;");
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
    public function buscarExistenciaBolsaInspeccion2($IDINPSAG)
    {
        try {

            $datos = $this->conexion->prepare("SELECT *,           
                                                    DATE_FORMAT(FECHA_EMBALADO_EXIEXPORTACION, '%d-%m-%Y') AS 'EMBALADO',               
                                                    FORMAT(IFNULL(CANTIDAD_ENVASE_EXIEXPORTACION,0),0,'de_DE') AS 'ENVASE', 
                                                    FORMAT(IFNULL(KILOS_NETO_EXIEXPORTACION,0),2,'de_DE') AS 'NETO',
                                                    FORMAT(IFNULL(KILOS_DESHIRATACION_EXIEXPORTACION,0),2,'de_DE') AS 'DESHIRATACION',
                                                    FORMAT(IFNULL(PDESHIDRATACION_EXIEXPORTACION,0),2,'de_DE') AS 'PORCENTAJE',
                                                    FORMAT(IFNULL(KILOS_BRUTO_EXIEXPORTACION,0),2,'de_DE')
                                            FROM 
                                                fruta_exiexportacion 
                                            WHERE
                                                ID_INPSAG= '" . $IDINPSAG . "'                                                                                  
                                            AND ESTADO_REGISTRO = 1  
                                            GROUP BY 
                                            ID_PRODUCTOR
                                            
                                            ;");
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

    public function buscarPorFolio2ActivoInspeccion2($FOLIOAUXILIAREXIEXPORTACION, $IDINPSAG)
    {
        try {

            $datos = $this->conexion->prepare("SELECT *,
                                                DATE_FORMAT(INGRESO, '%d-%m-%Y')  AS 'FECHA',
                                                DATE_FORMAT(FECHA_EMBALADO_EXIEXPORTACION, '%d-%m-%Y')  AS 'EMBALADO',
                                                FORMAT(IFNULL(CANTIDAD_ENVASE_EXIEXPORTACION,0),0,'de_DE') AS 'ENVASE',
                                                FORMAT(IFNULL(KILOS_NETO_EXIEXPORTACION,0),2,'de_DE') AS 'NETO',
                                                FORMAT(IFNULL(KILOS_BRUTO_EXIEXPORTACION,0),2,'de_DE') AS 'BRUTO'
                                            FROM fruta_exiexportacion
                                            WHERE   
                                            FOLIO_AUXILIAR_EXIEXPORTACION = '" . $FOLIOAUXILIAREXIEXPORTACION . "' 
                                            AND ESTADO_REGISTRO = 1 
                                            AND ID_INPSAG= '" . $IDINPSAG . "' ;");
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
    public function buscarExistenciaBolsaInspeccion2DiferenciadoProductor($IDINPSAG, $IDPRODUCTOR)
    {
        try {

            $datos = $this->conexion->prepare("SELECT *, FORMAT(IFNULL( SUM(CANTIDAD_ENVASE_EXIEXPORTACION),0),0,'de_DE') AS 'ENVASE'
                                            FROM 
                                                fruta_exiexportacion 
                                            WHERE
                                                ID_INPSAG= '" . $IDINPSAG . "'                                                                                  
                                            AND ESTADO_REGISTRO = 1  
                                            AND ID_PRODUCTOR = '" . $IDPRODUCTOR . "'                                           
                                            GROUP BY 
                                            ID_PRODUCTOR
                                            
                                            ;");
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

    public function buscarExistenciaBolsaInspeccion2ProductorDiferenciadoProductorEstandar($IDINPSAG, $IDPRODUCTOR)
    {
        try {

            $datos = $this->conexion->prepare("SELECT *, FORMAT(IFNULL( SUM(CANTIDAD_ENVASE_EXIEXPORTACION),0),0,'de_DE') AS 'ENVASE'
                                            FROM 
                                                fruta_exiexportacion 
                                            WHERE
                                                ID_INPSAG= '" . $IDINPSAG . "'                                                                                  
                                            AND ESTADO_REGISTRO = 1  
                                            AND ID_PRODUCTOR = '" . $IDPRODUCTOR . "'                                           
                                            GROUP BY 
                                            ID_PRODUCTOR, ID_ESTANDAR
                                            
                                            ;");
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

    public function buscarExistenciaBolsaInspeccion2ProductorEstandarDiferenciadoProductorEstandar($IDINPSAG, $IDPRODUCTOR, $IDESTANDAR)
    {
        try {

            $datos = $this->conexion->prepare("SELECT *, FORMAT(IFNULL( SUM(CANTIDAD_ENVASE_EXIEXPORTACION),0),0,'de_DE') AS 'ENVASE'
                                            FROM 
                                                fruta_exiexportacion 
                                            WHERE
                                                ID_INPSAG= '" . $IDINPSAG . "'                                                                                  
                                            AND ESTADO_REGISTRO = 1  
                                            AND ID_PRODUCTOR = '" . $IDPRODUCTOR . "'  
                                            AND ID_ESTANDAR = '" . $IDESTANDAR . "'                                          
                                            GROUP BY 
                                            ID_PRODUCTOR, ID_ESTANDAR
                                            
                                            ;");
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
    public function buscarExistenciaBolsaInspeccion2ProductorEstandarDiferenciadoProductorEstandarVariedad($IDINPSAG, $IDPRODUCTOR, $IDESTANDAR)
    {
        try {

            $datos = $this->conexion->prepare("SELECT *, FORMAT(IFNULL( SUM(CANTIDAD_ENVASE_EXIEXPORTACION),0),0,'de_DE') AS 'ENVASE'
                                            FROM 
                                                fruta_exiexportacion 
                                            WHERE
                                                ID_INPSAG= '" . $IDINPSAG . "'                                                                                  
                                            AND ESTADO_REGISTRO = 1  
                                            AND ID_PRODUCTOR = '" . $IDPRODUCTOR . "'  
                                            AND ID_ESTANDAR = '" . $IDESTANDAR . "'                                          
                                            GROUP BY 
                                            ID_PRODUCTOR, ID_ESTANDAR, ID_VESPECIES
                                            
                                            ;");
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
    public function buscarExistenciaBolsaInspeccion2ProductorEstandarVariedadDiferenciadoProductorEstandarVariedad($IDINPSAG, $IDPRODUCTOR, $IDESTANDAR, $IDPVESPECIES)
    {
        try {

            $datos = $this->conexion->prepare("SELECT *, FORMAT(IFNULL( SUM(CANTIDAD_ENVASE_EXIEXPORTACION),0),0,'de_DE') AS 'ENVASE'
                                            FROM 
                                                fruta_exiexportacion 
                                            WHERE
                                                ID_INPSAG= '" . $IDINPSAG . "'                                                                                  
                                            AND ESTADO_REGISTRO = 1  
                                            AND ID_PRODUCTOR = '" . $IDPRODUCTOR . "'  
                                            AND ID_ESTANDAR = '" . $IDESTANDAR . "'   
                                            AND ID_VESPECIES = '" . $IDPVESPECIES . "'                                          
                                            GROUP BY 
                                            ID_PRODUCTOR, ID_ESTANDAR, ID_VESPECIES
                                            
                                            ;");
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

    public function obtenerTotalesExistenciaBolsaInspeccion2($IDINPSAG)
    {
        try {

            $datos = $this->conexion->prepare("SELECT 
                                                        FORMAT(IFNULL(SUM(CANTIDAD_ENVASE_EXIEXPORTACION),0),0,'de_DE') AS 'ENVASE', 
                                                        FORMAT(IFNULL(SUM(KILOS_NETO_EXIEXPORTACION),0),2,'de_DE')  AS 'NETO' ,
                                                        FORMAT(IFNULL(SUM(KILOS_DESHIRATACION_EXIEXPORTACION),0),2,'de_DE')  AS 'DESHIRATACION' ,
                                                        FORMAT(IFNULL(SUM(KILOS_BRUTO_EXIEXPORTACION),0),2,'de_DE')  AS 'BRUTO' 
                                                FROM 
                                                    fruta_exiexportacion 
                                                WHERE
                                                    ID_INPSAG= '" . $IDINPSAG . "'                                                                                  
                                                AND ESTADO_REGISTRO = 1  
                                                
                                            
                                            ;");
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

    public function obtenerTotalesFolio2ActivoInspeccion2($FOLIOAUXILIAREXIEXPORTACION, $IDINPSAG)
    {
        try {

            $datos = $this->conexion->prepare("SELECT
                                                    FORMAT(IFNULL(SUM(CANTIDAD_ENVASE_EXIEXPORTACION),0),0,'de_DE') AS 'ENVASE',
                                                    FORMAT(IFNULL(SUM(KILOS_NETO_EXIEXPORTACION),0),2,'de_DE') AS 'NETO',
                                                    FORMAT(IFNULL(SUM(KILOS_BRUTO_EXIEXPORTACION),0),2,'de_DE') AS 'BRUTO'
                                            FROM fruta_exiexportacion
                                            WHERE 
                                            FOLIO_AUXILIAR_EXIEXPORTACION = '" . $FOLIOAUXILIAREXIEXPORTACION . "' 
                                            AND ESTADO_REGISTRO = 1    
                                            AND ID_INPSAG= '" . $IDINPSAG . "'            ;");
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

    public function obtenerTotalesExistenciaBolsaInspeccionDiferenciadoProductor2($IDINPSAG, $IDPRODUCTOR)
    {
        try {

            $datos = $this->conexion->prepare("SELECT  FORMAT(IFNULL( SUM(CANTIDAD_ENVASE_EXIEXPORTACION),0),0,'de_DE') AS 'ENVASE'
                                            FROM 
                                                fruta_exiexportacion 
                                            WHERE
                                                ID_INPSAG= '" . $IDINPSAG . "'                                                                                  
                                            AND ESTADO_REGISTRO = 1  
                                            AND ID_PRODUCTOR = '" . $IDPRODUCTOR . "'                                      
                                            GROUP BY 
                                            ID_PRODUCTOR
                                            
                                            ;");
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
    public function obtenerTotalesExistenciaBolsaInspeccion2ProductorEstandarDiferenciadoProductorEstandar($IDINPSAG, $IDPRODUCTOR, $IDESTANDAR)
    {
        try {

            $datos = $this->conexion->prepare("SELECT  FORMAT(IFNULL( SUM(CANTIDAD_ENVASE_EXIEXPORTACION),0),0,'de_DE') AS 'ENVASE'
                                            FROM 
                                                fruta_exiexportacion 
                                            WHERE
                                                ID_INPSAG= '" . $IDINPSAG . "'                                                                                  
                                            AND ESTADO_REGISTRO = 1  
                                            AND ID_PRODUCTOR = '" . $IDPRODUCTOR . "'    
                                            AND ID_ESTANDAR = '" . $IDESTANDAR . "'                                     
                                            GROUP BY 
                                            ID_PRODUCTOR, ID_ESTANDAR
                                            
                                            ;");
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

    public function obtenerTotalesExistenciaBolsaInspeccion2ProductorEstandarVariedadDiferenciadoProductorEstandarVariedad($IDINPSAG, $IDPRODUCTOR, $IDESTANDAR,  $IDPVESPECIES)
    {
        try {

            $datos = $this->conexion->prepare("SELECT  FORMAT(IFNULL( SUM(CANTIDAD_ENVASE_EXIEXPORTACION),0),0,'de_DE') AS 'ENVASE'
                                            FROM 
                                                fruta_exiexportacion 
                                            WHERE
                                                ID_INPSAG= '" . $IDINPSAG . "'                                                                                  
                                            AND ESTADO_REGISTRO = 1  
                                            AND ID_PRODUCTOR = '" . $IDPRODUCTOR . "'    
                                            AND ID_ESTANDAR = '" . $IDESTANDAR . "'   
                                            AND ID_VESPECIES = '" . $IDPVESPECIES . "'                                    
                                            GROUP BY 
                                            ID_PRODUCTOR, ID_ESTANDAR, ID_VESPECIES
                                            
                                            ;");
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



    public function buscarPorDespachoexAgrupadoFolio($IDDESPACHOEX)
    {
        try {

            $datos = $this->conexion->prepare("SELECT * ,
                                                DATE_FORMAT(FECHA_EMBALADO_EXIEXPORTACION, '%d-%m-%Y') AS 'FECHA',
                                                IFNULL(SUM(CANTIDAD_ENVASE_EXIEXPORTACION),0) AS 'ENVASE',
                                                IFNULL(SUM(KILOS_NETO_EXIEXPORTACION),0) AS 'NETO',
                                                IFNULL(SUM(KILOS_BRUTO_EXIEXPORTACION),0) AS 'BRUTO'
                                        FROM fruta_exiexportacion 
                                        WHERE ID_DESPACHOEX= '" . $IDDESPACHOEX . "'                                          
                                        AND ESTADO_REGISTRO = 1
                                        GROUP BY FOLIO_AUXILIAR_EXIEXPORTACION;");
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


    //PACKING LIST DESPACHO EXPORTACION
    public function buscarPorDespachoex2AgrupadoFolio($IDDESPACHOEX)
    {
        try {

            $datos = $this->conexion->prepare("SELECT * ,
                                                DATE_FORMAT(FECHA_EMBALADO_EXIEXPORTACION, '%d-%m-%Y') AS 'FECHA',
                                                FORMAT(IFNULL(CANTIDAD_ENVASE_EXIEXPORTACION,0),0,'de_DE') AS 'ENVASE',
                                                FORMAT(IFNULL(KILOS_NETO_EXIEXPORTACION,0),2,'de_DE') AS 'NETO',
                                                FORMAT(IFNULL(KILOS_BRUTO_EXIEXPORTACION,0),2,'de_DE') AS 'BRUTO'
                                        FROM fruta_exiexportacion 
                                        WHERE ID_DESPACHOEX= '" . $IDDESPACHOEX . "'                                          
                                        AND ESTADO_REGISTRO = 1
                                        GROUP BY FOLIO_AUXILIAR_EXIEXPORTACION;");
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
    public function buscarExistenciaDespachoexInspeccion2($IDDESPACHOEX)
    {
        try {

            $datos = $this->conexion->prepare("SELECT *, FORMAT(IFNULL(CANTIDAD_ENVASE_EXIEXPORTACION,0),0,'de_DE') AS 'ENVASE'
                                        FROM 
                                            fruta_exiexportacion 
                                        WHERE
                                            ID_DESPACHOEX= '" . $IDDESPACHOEX . "'                                                                                       
                                        AND ESTADO_REGISTRO = 1  
                                        GROUP BY 
                                        ID_PRODUCTOR
                                        
                                        ;");
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
    
    public function buscarExistenciaPCdespachoex2($IDPCDESPACHO)
    {
        try {

            $datos = $this->conexion->prepare("SELECT *, FORMAT(IFNULL(CANTIDAD_ENVASE_EXIEXPORTACION,0),0,'de_DE') AS 'ENVASE'
                                        FROM 
                                            fruta_exiexportacion 
                                        WHERE
                                            ID_PCDESPACHO= '" . $IDPCDESPACHO . "'                                                                                 
                                        AND ESTADO_REGISTRO = 1  
                                        GROUP BY 
                                        ID_PRODUCTOR
                                        
                                        ;");
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
    public function buscarPorFolio2Activo2DespachoEX($FOLIOAUXILIAREXIEXPORTACION, $IDDESPACHOEX)
    {
        try {

            $datos = $this->conexion->prepare("SELECT *, 
                                            DATE_FORMAT(INGRESO, '%d-%m-%Y')  AS 'FECHA',
                                            DATE_FORMAT(FECHA_EMBALADO_EXIEXPORTACION, '%d-%m-%Y')  AS 'EMBALADO',
                                            FORMAT(IFNULL(CANTIDAD_ENVASE_EXIEXPORTACION,0),0,'de_DE') AS 'ENVASE',
                                            FORMAT(IFNULL(KILOS_NETO_EXIEXPORTACION,0),2,'de_DE') AS 'NETO',
                                            FORMAT(IFNULL(KILOS_BRUTO_EXIEXPORTACION,0),2,'de_DE') AS 'BRUTO'
                                        FROM fruta_exiexportacion
                                        WHERE   
                                        FOLIO_AUXILIAR_EXIEXPORTACION = '" . $FOLIOAUXILIAREXIEXPORTACION . "' 
                                        AND ESTADO_REGISTRO = 1 
                                        AND ID_DESPACHOEX= '" . $IDDESPACHOEX . "'  ;");
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
    
    public function buscarPorFolio2Activo2PCdespachoEX($FOLIOAUXILIAREXIEXPORTACION, $IDPCDESPACHO)
    {
        try {

            $datos = $this->conexion->prepare("SELECT *, 
                                            DATE_FORMAT(INGRESO, '%d-%m-%Y')  AS 'FECHA',
                                            DATE_FORMAT(FECHA_EMBALADO_EXIEXPORTACION, '%d-%m-%Y')  AS 'EMBALADO',
                                            FORMAT(IFNULL(CANTIDAD_ENVASE_EXIEXPORTACION,0),0,'de_DE') AS 'ENVASE',
                                            FORMAT(IFNULL(KILOS_NETO_EXIEXPORTACION,0),2,'de_DE') AS 'NETO',
                                            FORMAT(IFNULL(KILOS_BRUTO_EXIEXPORTACION,0),2,'de_DE') AS 'BRUTO'
                                        FROM fruta_exiexportacion
                                        WHERE   
                                        FOLIO_AUXILIAR_EXIEXPORTACION = '" . $FOLIOAUXILIAREXIEXPORTACION . "' 
                                        AND ESTADO_REGISTRO = 1 
                                        AND ID_PCDESPACHO= '" . $IDPCDESPACHO . "'  ;");
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

    public function buscarExistenciaBolsacPCdespachoEx2DiferenciadoProductor($IDPCDESPACHO, $IDPRODUCTOR)
    {
        try {

            $datos = $this->conexion->prepare("SELECT *, FORMAT(IFNULL( SUM(CANTIDAD_ENVASE_EXIEXPORTACION),0),0,'de_DE') AS 'ENVASE'
                                            FROM 
                                                fruta_exiexportacion 
                                            WHERE
                                                 ID_PCDESPACHO= '" . $IDPCDESPACHO . "'                                                                            
                                                AND ESTADO_REGISTRO = 1  
                                                AND ID_PRODUCTOR = '" . $IDPRODUCTOR . "'                                           
                                            GROUP BY 
                                            ID_PRODUCTOR
                                            
                                            ;");
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
    public function buscarExistenciaBolsaDespachoEx2DiferenciadoProductor($IDDESPACHOEX, $IDPRODUCTOR)
    {
        try {

            $datos = $this->conexion->prepare("SELECT *, FORMAT(IFNULL( SUM(CANTIDAD_ENVASE_EXIEXPORTACION),0),0,'de_DE') AS 'ENVASE'
                                            FROM 
                                                fruta_exiexportacion 
                                            WHERE
                                                ID_DESPACHOEX= '" . $IDDESPACHOEX . "'                                                                                  
                                                AND ESTADO_REGISTRO = 1  
                                                AND ID_PRODUCTOR = '" . $IDPRODUCTOR . "'                                           
                                            GROUP BY 
                                            ID_PRODUCTOR
                                            
                                            ;");
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
    public function buscarExistenciaBolsaDespachoEx2ProductorDiferenciadoProductorEstandar($IDDESPACHOEX, $IDPRODUCTOR)
    {
        try {

            $datos = $this->conexion->prepare("SELECT *, FORMAT(IFNULL( SUM(CANTIDAD_ENVASE_EXIEXPORTACION),0),0,'de_DE') AS 'ENVASE'
                                            FROM 
                                                fruta_exiexportacion 
                                            WHERE
                                                ID_DESPACHOEX= '" . $IDDESPACHOEX . "'                                                                                   
                                            AND ESTADO_REGISTRO = 1  
                                            AND ID_PRODUCTOR = '" . $IDPRODUCTOR . "'                                           
                                            GROUP BY 
                                            ID_PRODUCTOR, ID_ESTANDAR
                                            
                                            ;");
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
    
    public function buscarExistenciaBolsaPCdespachoEx2ProductorDiferenciadoProductorEstandar($IDPCDESPACHO, $IDPRODUCTOR)
    {
        try {

            $datos = $this->conexion->prepare("SELECT *, FORMAT(IFNULL( SUM(CANTIDAD_ENVASE_EXIEXPORTACION),0),0,'de_DE') AS 'ENVASE'
                                            FROM 
                                                fruta_exiexportacion 
                                            WHERE
                                                 ID_PCDESPACHO= '" . $IDPCDESPACHO . "'                                                                                  
                                            AND ESTADO_REGISTRO = 1  
                                            AND ID_PRODUCTOR = '" . $IDPRODUCTOR . "'                                           
                                            GROUP BY 
                                            ID_PRODUCTOR, ID_ESTANDAR
                                            
                                            ;");
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
    public function buscarExistenciaBolsaDespachoEx2ProductorEstandarDiferenciadoProductorEstandar($IDDESPACHOEX, $IDPRODUCTOR, $IDESTANDAR)
    {
        try {

            $datos = $this->conexion->prepare("SELECT *, FORMAT(IFNULL( SUM(CANTIDAD_ENVASE_EXIEXPORTACION),0),0,'de_DE') AS 'ENVASE'
                                            FROM 
                                                fruta_exiexportacion 
                                            WHERE
                                                ID_DESPACHOEX= '" . $IDDESPACHOEX . "'                                                                                 
                                            AND ESTADO_REGISTRO = 1  
                                            AND ID_PRODUCTOR = '" . $IDPRODUCTOR . "'  
                                            AND ID_ESTANDAR = '" . $IDESTANDAR . "'                                          
                                            GROUP BY 
                                            ID_PRODUCTOR, ID_ESTANDAR
                                            
                                            ;");
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
    
    public function buscarExistenciaBolsaPCdespachoEx2ProductorEstandarDiferenciadoProductorEstandar($IDPCDESPACHO, $IDPRODUCTOR, $IDESTANDAR)
    {
        try {

            $datos = $this->conexion->prepare("SELECT *, FORMAT(IFNULL( SUM(CANTIDAD_ENVASE_EXIEXPORTACION),0),0,'de_DE') AS 'ENVASE'
                                            FROM 
                                                fruta_exiexportacion 
                                            WHERE
                                                 ID_PCDESPACHO= '" . $IDPCDESPACHO . "'                                                                                  
                                            AND ESTADO_REGISTRO = 1  
                                            AND ID_PRODUCTOR = '" . $IDPRODUCTOR . "'  
                                            AND ID_ESTANDAR = '" . $IDESTANDAR . "'                                          
                                            GROUP BY 
                                            ID_PRODUCTOR, ID_ESTANDAR
                                            
                                            ;");
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
    public function buscarExistenciaBolsaDespachoEx2ProductorEstandarDiferenciadoProductorEstandarVariedad($IDDESPACHOEX, $IDPRODUCTOR, $IDESTANDAR)
    {
        try {

            $datos = $this->conexion->prepare("SELECT *, FORMAT(IFNULL( SUM(CANTIDAD_ENVASE_EXIEXPORTACION),0),0,'de_DE') AS 'ENVASE'
                                            FROM 
                                                fruta_exiexportacion 
                                            WHERE
                                                ID_DESPACHOEX= '" . $IDDESPACHOEX . "'                                                                           
                                            AND ESTADO_REGISTRO = 1  
                                            AND ID_PRODUCTOR = '" . $IDPRODUCTOR . "'  
                                            AND ID_ESTANDAR = '" . $IDESTANDAR . "'                                          
                                            GROUP BY 
                                            ID_PRODUCTOR, ID_ESTANDAR, ID_VESPECIES
                                            
                                            ;");
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
    
    public function buscarExistenciaBolsaPCdespachoEx2ProductorEstandarDiferenciadoProductorEstandarVariedad($IDPCDESPACHO, $IDPRODUCTOR, $IDESTANDAR)
    {
        try {

            $datos = $this->conexion->prepare("SELECT *, FORMAT(IFNULL( SUM(CANTIDAD_ENVASE_EXIEXPORTACION),0),0,'de_DE') AS 'ENVASE'
                                            FROM 
                                                fruta_exiexportacion 
                                            WHERE
                                                 ID_PCDESPACHO= '" . $IDPCDESPACHO . "'                                                                            
                                            AND ESTADO_REGISTRO = 1  
                                            AND ID_PRODUCTOR = '" . $IDPRODUCTOR . "'  
                                            AND ID_ESTANDAR = '" . $IDESTANDAR . "'                                          
                                            GROUP BY 
                                            ID_PRODUCTOR, ID_ESTANDAR, ID_VESPECIES
                                            
                                            ;");
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

    
    public function buscarExistenciaBolsaDespachoeEx2ProductorEstandarVariedadDiferenciadoProductorEstandarVariedad($IDDESPACHOEX, $IDPRODUCTOR, $IDESTANDAR, $IDPVESPECIES)
    {
        try {

            $datos = $this->conexion->prepare("SELECT *, FORMAT(IFNULL( SUM(CANTIDAD_ENVASE_EXIEXPORTACION),0),0,'de_DE') AS 'ENVASE'
                                            FROM 
                                                fruta_exiexportacion 
                                            WHERE
                                                ID_DESPACHOEX= '" . $IDDESPACHOEX . "'                                                                                    
                                            AND ESTADO_REGISTRO = 1  
                                            AND ID_PRODUCTOR = '" . $IDPRODUCTOR . "'  
                                            AND ID_ESTANDAR = '" . $IDESTANDAR . "'   
                                            AND ID_VESPECIES = '" . $IDPVESPECIES . "'                                          
                                            GROUP BY 
                                            ID_PRODUCTOR, ID_ESTANDAR, ID_VESPECIES
                                            
                                            ;");
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
    public function buscarExistenciaBolsaPCdespachoeEx2ProductorEstandarVariedadDiferenciadoProductorEstandarVariedad($IDPCDESPACHO, $IDPRODUCTOR, $IDESTANDAR, $IDPVESPECIES)
    {
        try {

            $datos = $this->conexion->prepare("SELECT *, FORMAT(IFNULL( SUM(CANTIDAD_ENVASE_EXIEXPORTACION),0),0,'de_DE') AS 'ENVASE'
                                            FROM 
                                                fruta_exiexportacion 
                                            WHERE
                                                 ID_PCDESPACHO= '" . $IDPCDESPACHO . "'                                                                                     
                                            AND ESTADO_REGISTRO = 1  
                                            AND ID_PRODUCTOR = '" . $IDPRODUCTOR . "'  
                                            AND ID_ESTANDAR = '" . $IDESTANDAR . "'   
                                            AND ID_VESPECIES = '" . $IDPVESPECIES . "'                                          
                                            GROUP BY 
                                            ID_PRODUCTOR, ID_ESTANDAR, ID_VESPECIES
                                            
                                            ;");
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



    public function obtenerTotalesExistenciaBolsaDespachoeEx2($IDDESPACHOEX)
    {
        try {

            $datos = $this->conexion->prepare("SELECT 
                                            FORMAT(IFNULL( SUM(CANTIDAD_ENVASE_EXIEXPORTACION),0),0,'de_DE') AS 'ENVASE',
                                            FORMAT(IFNULL( SUM(KILOS_NETO_EXIEXPORTACION),0),0,'de_DE') AS 'NETO',
                                            FORMAT(IFNULL( SUM(KILOS_BRUTO_EXIEXPORTACION),0),0,'de_DE') AS 'BRUTO'
                                        FROM 
                                            fruta_exiexportacion 
                                        WHERE                        
                                            ID_DESPACHOEX= '" . $IDDESPACHOEX . "'                                                           
                                        AND ESTADO_REGISTRO = 1  
                                        
                                        
                                        ;");
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
    
    public function obtenerTotalesExistenciaBolsaPCdespachoeEx2($IDDESPACHOEX)
    {
        try {

            $datos = $this->conexion->prepare("SELECT 
                                            FORMAT(IFNULL( SUM(CANTIDAD_ENVASE_EXIEXPORTACION),0),0,'de_DE') AS 'ENVASE',
                                            FORMAT(IFNULL( SUM(KILOS_NETO_EXIEXPORTACION),0),0,'de_DE') AS 'NETO',
                                            FORMAT(IFNULL( SUM(KILOS_BRUTO_EXIEXPORTACION),0),0,'de_DE') AS 'BRUTO'
                                        FROM 
                                            fruta_exiexportacion 
                                        WHERE
                                            ID_PCDESPACHO= '" . $IDDESPACHOEX . "'                                                                                
                                        AND ESTADO_REGISTRO = 1  
                                        
                                        
                                        ;");
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
    public function obtenerTotalesFolio2DespachoExActivo2($FOLIOAUXILIAREXIEXPORTACION, $IDDESPACHOEX)
    {
        try {

            $datos = $this->conexion->prepare("SELECT
                                                FORMAT(IFNULL(SUM(CANTIDAD_ENVASE_EXIEXPORTACION),0),0,'de_DE') AS 'ENVASE',
                                                FORMAT(IFNULL(SUM(KILOS_NETO_EXIEXPORTACION),0),2,'de_DE') AS 'NETO',
                                                FORMAT(IFNULL(SUM(KILOS_BRUTO_EXIEXPORTACION),0),2,'de_DE') AS 'BRUTO'
                                        FROM fruta_exiexportacion
                                        WHERE 
                                        FOLIO_AUXILIAR_EXIEXPORTACION = '" . $FOLIOAUXILIAREXIEXPORTACION . "' 
                                        AND ESTADO_REGISTRO = 1                                            
                                        AND ID_DESPACHOEX= '" . $IDDESPACHOEX . "' ;");
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

    public function obtenerTotalesExistenciaBolsaDespachoeExnDiferenciadoProductor2($IDDESPACHOEX, $IDPRODUCTOR)
    {
        try {

            $datos = $this->conexion->prepare("SELECT  
                                                    FORMAT(IFNULL( SUM(CANTIDAD_ENVASE_EXIEXPORTACION),0),0,'de_DE') AS 'ENVASE',
                                                    FORMAT(IFNULL( SUM(KILOS_NETO_EXIEXPORTACION),0),0,'de_DE') AS 'NETO'
                                            FROM 
                                                fruta_exiexportacion 
                                            WHERE
                                                ID_DESPACHOEX= '" . $IDDESPACHOEX . "'                                                                                
                                            AND ESTADO_REGISTRO = 1  
                                            AND ID_PRODUCTOR = '" . $IDPRODUCTOR . "'                                      
                                            GROUP BY 
                                            ID_PRODUCTOR
                                            
                                            ;");
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
    
    public function obtenerTotalesExistenciaBolsaPCdespachoeExnDiferenciadoProductor2($IDPCDESPACHO, $IDPRODUCTOR)
    {
        try {

            $datos = $this->conexion->prepare("SELECT  
                                                    FORMAT(IFNULL( SUM(CANTIDAD_ENVASE_EXIEXPORTACION),0),0,'de_DE') AS 'ENVASE',
                                                    FORMAT(IFNULL( SUM(KILOS_NETO_EXIEXPORTACION),0),0,'de_DE') AS 'NETO'
                                            FROM 
                                                fruta_exiexportacion 
                                            WHERE
                                                 ID_PCDESPACHO= '" . $IDPCDESPACHO . "'                                                                              
                                            AND ESTADO_REGISTRO = 1  
                                            AND ID_PRODUCTOR = '" . $IDPRODUCTOR . "'                                      
                                            GROUP BY 
                                            ID_PRODUCTOR
                                            
                                            ;");
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
    
    public function obtenerTotalesExistenciaBolsaPCdespachoEx2ProductorEstandarDiferenciadoProductorEstandar($IDPCDESPACHO, $IDPRODUCTOR, $IDESTANDAR)
    {
        try {

            $datos = $this->conexion->prepare("SELECT  
                                                FORMAT(IFNULL( SUM(CANTIDAD_ENVASE_EXIEXPORTACION),0),0,'de_DE') AS 'ENVASE',
                                                FORMAT(IFNULL( SUM(KILOS_NETO_EXIEXPORTACION),0),0,'de_DE') AS 'NETO'
                                            FROM 
                                                fruta_exiexportacion 
                                            WHERE
                                                 ID_PCDESPACHO= '" . $IDPCDESPACHO . "'                                                                                         
                                            AND ESTADO_REGISTRO = 1  
                                            AND ID_PRODUCTOR = '" . $IDPRODUCTOR . "'    
                                            AND ID_ESTANDAR = '" . $IDESTANDAR . "'                                     
                                            GROUP BY 
                                            ID_PRODUCTOR, ID_ESTANDAR
                                            
                                            ;");
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
    
    public function obtenerTotalesExistenciaBolsaDespachoeEx2ProductorEstandarVariedadDiferenciadoProductorEstandarVariedad($IDDESPACHOEX, $IDPRODUCTOR, $IDESTANDAR,  $IDPVESPECIES)
    {
        try {

            $datos = $this->conexion->prepare("SELECT  
                                                    FORMAT(IFNULL( SUM(CANTIDAD_ENVASE_EXIEXPORTACION),0),0,'de_DE') AS 'ENVASE',
                                                    FORMAT(IFNULL( SUM(KILOS_NETO_EXIEXPORTACION),0),0,'de_DE') AS 'NETO'
                                            FROM 
                                                fruta_exiexportacion 
                                            WHERE
                                                ID_DESPACHOEX= '" . $IDDESPACHOEX . "'                                                                                      
                                            AND ESTADO_REGISTRO = 1  
                                            AND ID_PRODUCTOR = '" . $IDPRODUCTOR . "'    
                                            AND ID_ESTANDAR = '" . $IDESTANDAR . "'   
                                            AND ID_VESPECIES = '" . $IDPVESPECIES . "'                                    
                                            GROUP BY 
                                            ID_PRODUCTOR, ID_ESTANDAR, ID_VESPECIES
                                            
                                            ;");
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
    
    
    public function obtenerTotalesExistenciaBolsaDespachoEx2ProductorEstandarDiferenciadoProductorEstandar($IDDESPACHOEX, $IDPRODUCTOR, $IDESTANDAR)
    {
        try {

            $datos = $this->conexion->prepare("SELECT  
                                                FORMAT(IFNULL( SUM(CANTIDAD_ENVASE_EXIEXPORTACION),0),0,'de_DE') AS 'ENVASE',
                                                FORMAT(IFNULL( SUM(KILOS_NETO_EXIEXPORTACION),0),0,'de_DE') AS 'NETO'
                                            FROM 
                                                fruta_exiexportacion 
                                            WHERE
                                                ID_DESPACHOEX= '" . $IDDESPACHOEX . "'                                                                                    
                                            AND ESTADO_REGISTRO = 1  
                                            AND ID_PRODUCTOR = '" . $IDPRODUCTOR . "'    
                                            AND ID_ESTANDAR = '" . $IDESTANDAR . "'                                     
                                            GROUP BY 
                                            ID_PRODUCTOR, ID_ESTANDAR
                                            
                                            ;");
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

    public function obtenerTotalesExistenciaBolsaPCdespachoeEx2ProductorEstandarVariedadDiferenciadoProductorEstandarVariedad($IDPCDESPACHO, $IDPRODUCTOR, $IDESTANDAR,  $IDPVESPECIES)
    {
        try {

            $datos = $this->conexion->prepare("SELECT  
                                                    FORMAT(IFNULL( SUM(CANTIDAD_ENVASE_EXIEXPORTACION),0),0,'de_DE') AS 'ENVASE',
                                                    FORMAT(IFNULL( SUM(KILOS_NETO_EXIEXPORTACION),0),0,'de_DE') AS 'NETO'
                                            FROM 
                                                fruta_exiexportacion 
                                            WHERE
                                                 ID_PCDESPACHO= '" . $IDPCDESPACHO . "'                                                                                     
                                            AND ESTADO_REGISTRO = 1  
                                            AND ID_PRODUCTOR = '" . $IDPRODUCTOR . "'    
                                            AND ID_ESTANDAR = '" . $IDESTANDAR . "'   
                                            AND ID_VESPECIES = '" . $IDPVESPECIES . "'                                    
                                            GROUP BY 
                                            ID_PRODUCTOR, ID_ESTANDAR, ID_VESPECIES
                                            
                                            ;");
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

    
    //VALIDAR FOLIO TOMADO
    //VALIDAR DETALLE PROCESO

    
    public function validarFolioProceso($FOLIO )
    {
        try {

            $datos = $this->conexion->prepare("SELECT * 
                                                FROM fruta_exiexportacion
                                                WHERE 
                                                    ID_REPALETIZAJE IS NULL
                                                    AND ID_REEMBALAJE IS NULL
                                                    AND ID_DESPACHO IS NULL
                                                    AND ID_DESPACHOEX IS NULL
                                                    AND FOLIO_EXIEXPORTACION = '".$FOLIO."' ;");
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

    public function validarFolioReembalaje($FOLIO )
    {
        try {

            $datos = $this->conexion->prepare("SELECT * 
                                                FROM fruta_exiexportacion
                                                WHERE 
                                                    ID_REPALETIZAJE IS NULL
                                                    AND ID_DESPACHO IS NULL
                                                    AND ID_DESPACHOEX IS NULL
                                                    AND FOLIO_EXIEXPORTACION = '".$FOLIO."' ;");
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

//CONSUMO
public function listarExiexportacionEstandarAgrupadoProceso($ESTANDAR)
{
    try {

        $datos = $this->conexion->prepare("SELECT 
                                                IFNULL(SUM(CANTIDAD_ENVASE_EXIEXPORTACION),0) AS 'ENVASE', 
                                                IFNULL(SUM(KILOS_NETO_EXIEXPORTACION),0) AS 'NUMERO'
                                            FROM fruta_exiexportacion 
                                            WHERE 
                                                    ID_ESTANDAR = '" . $ESTANDAR . "' 
                                                    AND ESTADO_REGISTRO = 1
                                                    AND ESTADO = 2
                                            GROUP BY ID_PROCESO
                                      ;");
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





}
