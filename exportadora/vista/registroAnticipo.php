<?php

include_once "../../assest/config/validarUsuarioExpo.php";

//LLAMADA ARCHIVOS NECESARIOS PARA LAS OPERACIONES BASE OPERACION

include_once '../../assest/controlador/BROKER.php';
include_once '../../assest/controlador/Anticipo.php';
include_once '../../assest/modelo/Anticipos.php';

$brokers = BrokerController::ctrIndexBroker($_SESSION['ID_EMPRESA']);


?>


<!DOCTYPE html>
<html lang="es">

<head>
    <title> Registro Anticipo</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="description" content="">
    <meta name="author" content="">
    <!- LLAMADA DE LOS ARCHIVOS NECESARIOS PARA DISEÑO Y FUNCIONES BASE DE LA VISTA -!>
    <?php include_once "../../assest/config/urlHead.php"; ?>
    <!- FUNCIONES BASES -!>
</head>
<body class="hold-transition light-skin fixed sidebar-mini theme-primary" >
<div class="wrapper">
    <!- LLAMADA AL MENU PRINCIPAL DE LA PAGINA-!>
    <?php include_once "../../assest/config/menuExpo.php"; ?>
    <div class="content-wrapper">
        <div class="container-full">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="d-flex align-items-center">
                    <div class="mr-auto">
                        <h3 class="page-title">Anticipos</h3>
                        <div class="d-inline-block align-items-center">
                            <nav>
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"> <a href="index.php"> <i class="mdi mdi-home-outline"></i></a></li>
                                    <li class="breadcrumb-item" aria-current="page">Módulo</li>
                                    <li class="breadcrumb-item" aria-current="page">Anticipos</li>
                                    <li class="breadcrumb-item active" aria-current="page"> <a href="#">Registro Anticipos </a>
                                    </li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                    <?php include_once "../../assest/config/verIndicadorEconomico.php"; ?>
                </div>
            </div>
            <!-- Main content -->
            <section class="content">
                <div class="box">
                    <div class="box-header with-border bg-primary">
                        <h4 class="box-title">Registro de Anticipos</h4>
                    </div>
                    <form class="form" role="form" method="post" name="form_reg_dato" id="form_reg_dato">
                        <div class="box-body ">
                            <div class="row">
                                <div class="col-xxl-2 col-xl-3 col-lg-3 col-md-6 col-sm-6 col-6 col-xs-6">
                                    <div class="form-group ">
                                        <label>Correlativo Anticipo</label>
                                        <input type="text" disabled class="form-control" id="id_correlativo" name="id_correlativo" placeholder="Nro. Correlativo">
                                    </div>
                                </div>
                                <div class="col-xxl-6 col-xl-1 col-lg-1 col-md-6 col-sm-6 col-6 col-xs-6">
                                    <div class="form-group">
                                        <label>Cliente</label>
                                        <select class="form-control select2" id="id_broker" name="id_broker" style="width: 100%;"  required>
                                            <option>Selecciona un cliente</option>
                                            <?php foreach($brokers as $broker){?>
                                                <option value="<?php echo $broker['ID_BROKER']?>"><?php echo $broker['NOMBRE_BROKER'];?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-xxl-2 col-xl-4 col-lg-4 col-md-6 col-sm-6 col-6 col-xs-6">
                                    <div class="form-group">
                                        <label>Fecha Ingreso</label>
                                        <input type="date" class="form-control" style="background-color: #eeeeee;" placeholder="Fecha Ingreso" id="ingreso_anticipo" name="ingreso_anticipo" value="" disabled />
                                    </div>
                                </div>
                                <div class="col-xxl-2 col-xl-4 col-lg-4 col-md-6 col-sm-6 col-6 col-xs-6">
                                    <div class="form-group">
                                        <label>Fecha Modificación</label>
                                        <input type="date" class="form-control " style="background-color: #eeeeee;" placeholder="Fecha Modificacion" id="modificacion_anticipo" name="modificacion_anticipo" value="" disabled />
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Observacion Anticipo </label>
                                <textarea class="form-control" rows="1"  placeholder="Observacion del anticipo (opcional)  " id="observacion_anticipo" name="observacion_anticipo"></textarea>
                            </div>
                        </div>
                        <!-- /.box-body -->
                        <div class="box-footer">
                            <div class="btn-toolbar justify-content-between" role="toolbar" aria-label="toolbar">
                                <div class="btn-group  col-xxl-4 col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12 col-xs-12" role="group" aria-label="Acciones generales">
                                    <?php if (!isset($_GET['hash'])) { ?>
                                        <button type="button" class="btn btn-warning " data-toggle="tooltip" title="Cancelar" name="CANCELAR" value="CANCELAR" Onclick="irPagina('registroValorPago.php');">
                                            <i class="ti-trash"></i> Cancelar
                                        </button>
                                        <button type="submit" class="btn btn-primary" data-toggle="tooltip" title="Crear" name="CREAR" value="CREAR"   onclick="return validacion()">
                                            <i class="ti-save-alt"></i> Crear
                                        </button>
                                    <?php } ?>
                                </div>
                            </div>
                        </div>
                        <?php
                            $crear_anticipo = new AnticipoController();
                            $crear_anticipo->ctrCrearAnticipo();
                        ?>
                    </form>
                </div>
                <!--.row -->
                <?php if (isset($_GET['op'])): ?>
                    <div class="card">
                        <div class="card-header bg-info">
                            <h4 class="card-title">Detalle de Valor</h4>
                        </div>
                        <div class="card-header">
                            <div class="form-row align-items-center">
                                <div class="col-auto">
                                    <label class="sr-only" for="inlineFormInputGroup">Username</label>
                                    <div class="input-group mb-2">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">Total Liquidacion </div>
                                        </div>
                                        <input type="hidden" name="TOTALVALORL" id="TOTALVALORL" value="<?php echo $TOTALVALORLIQUIDACION; ?>" />
                                        <input type="text" class="form-control" placeholder="Total Valor Liqui." id="TOTALVALORV" name="TOTALVALORV" value="<?php echo $TOTALVALORLIQUIDACIONV; ?>" disabled />
                                    </div>
                                </div>
                                <div class="col-auto">
                                    <label class="sr-only" for="inlineFormInputGroup">Username</label>
                                    <div class="input-group mb-2">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">Total Anticipo </div>
                                        </div>
                                        <input type="hidden" name="TOTALVALOP" id="TOTALVALORP" value="<?php echo $TOTALVALORPAGO; ?>" />
                                        <input type="text" class="form-control" placeholder="Total Valor Pago" id="TOTALVALORV" name="TOTALVALORV" value="<?php echo $TOTALVALORPAGOV; ?>" disabled />
                                    </div>
                                </div>
                                <div class="col-auto">
                                    <label class="sr-only" for="inlineFormInputGroup">Username</label>
                                    <div class="input-group mb-2">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">Total Valor </div>
                                        </div>
                                        <input type="hidden" name="TOTALVALOR" id="TOTALVALOR" value="<?php echo $TOTALVALOR; ?>" />
                                        <input type="text" class="form-control" placeholder="Total Valor" id="TOTALVALORV" name="TOTALVALORV" value="<?php echo number_format($TOTALVALOR,1,',','.'); ?>" disabled />
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-xxl-12 col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 col-xs-12">
                                    <div class="table-responsive">
                                        <table id="detalle" class=" table-hover " style="width: 100%;">
                                            <thead>
                                            <tr>
                                                <th>N° Item </th>
                                                <th class="text-center">Operaciónes</th>
                                                <th>Item </th>
                                                <th>Valor  </th>
                                                <th>Tipo Moneda </th>
                                                <th>Fecha </th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <?php
                                            $ARRAYSEGURO=$SEGURO_ADO->verSeguro($SEGURO);
                                            if($ARRAYSEGURO){
                                                $NOMBRESEGURO =  $ARRAYSEGURO[0]["NOMBRE_SEGURO"];
                                                $VALORSEGURO =  $ARRAYSEGURO[0]["SUMA_SEGURO"];
                                            }else{
                                                $NOMBRESEGURO="Sin Datos";
                                                $VALORSEGURO="Sin Datos";
                                            }

                                            ?>
                                            <tr class="center">
                                                <td>1</td>
                                                <td>No Aplica</td>
                                                <td><?php echo $NOMBRESEGURO; ?></td>
                                                <td><?php echo $VALORSEGURO; ?></td>
                                                <td><?php echo $TMONEDA; ?></td>
                                                <td>No Aplica</td>
                                            </tr>
                                            <?php if ($ARRAYITEM) { ?>
                                                <?php foreach ($ARRAYITEM as $s) : ?>
                                                    <?php
                                                    $CONTADOR+=1;
                                                    $ARRAYDVALOR=$DVALOR_ADO->buscarPorValorItem($IDOP,$s["ID_TITEM"]);
                                                    if($ARRAYDVALOR){
                                                        $VALORDVALOR= $ARRAYDVALOR[0]["VALOR_DVALOR"];
                                                        $FECHADVALOR= $ARRAYDVALOR[0]["FECHA_DVALOR"];
                                                    }else{
                                                        $VALORDVALOR=0;
                                                        $FECHADVALOR="";
                                                    }
                                                    ?>
                                                    <tr class="center">
                                                        <td><?php echo $CONTADOR; ?></td>
                                                        <td>
                                                            <form method="post" id="form1">
                                                                <input type="hidden" class="form-control" placeholder="ID DRECEPCIONE" id="IDD" name="IDD" value="<?php echo $s['ID_TITEM']; ?>" />
                                                                <input type="hidden" class="form-control" placeholder="ID RECEPCIONE" id="IDP" name="IDP" value="<?php echo $IDOP; ?>" />
                                                                <input type="hidden" class="form-control" placeholder="OP RECEPCIONE" id="OPP" name="OPP" value="<?php echo $OP; ?>" />
                                                                <input type="hidden" class="form-control" placeholder="URL RECEPCIONE" id="URLP" name="URLP" value="registroValorPago" />
                                                                <input type="hidden" class="form-control" placeholder="URL DRECEPCIONE" id="URLD" name="URLD" value="registroDvalorPago" />
                                                                <div class="btn-group btn-rounded  btn-block" role="group" aria-label="Operaciones Detalle">
                                                                    <?php if ($ESTADO == "0") { ?>
                                                                        <button type="submit" class="btn btn-info btn-sm  " id="VERDURL" name="VERDURL" data-toggle="tooltip" title="Ver Valor  ">
                                                                            <i class="ti-eye"></i> <br>Ver
                                                                        </button>
                                                                    <?php } ?>
                                                                    <?php if ($ESTADO == "1") { ?>
                                                                        <?php if ( empty($ARRAYDVALOR)) { ?>
                                                                            <button type="submit" class="btn   btn-success  btn-sm" id="DUPLICARDURL" name="DUPLICARDURL" data-toggle="tooltip" title="Agregar Valor " >
                                                                                <i class="ti-plus"></i> <br> Agregar
                                                                            </button>
                                                                        <?php }else{ ?>
                                                                            <button type="submit" class="btn btn-warning btn-sm " id="EDITARDURL" name="EDITARDURL" data-toggle="tooltip" title="Editar Valor  " >
                                                                                <i class="ti-pencil-alt"></i><br> Editar
                                                                            </button>
                                                                            <button type="submit" class="btn btn-danger btn-sm" id="ELIMINARDURL" name="ELIMINARDURL" data-toggle="tooltip" title="Eliminar Valor  ">
                                                                                <i class="ti-close"></i> <br>Eliminar
                                                                            </button>
                                                                        <?php } ?>
                                                                    <?php } ?>
                                                                </div>
                                                            </form>
                                                        </td>
                                                        <td><?php echo $s["NOMBRE_TITEM"]; ?></td>
                                                        <td><?php echo number_format( $VALORDVALOR,2,',','.' ); ?></td>
                                                        <td><?php echo $TMONEDA; ?></td>
                                                        <td><?php echo $FECHADVALOR; ?></td>
                                                    </tr>
                                                <?php endforeach; ?>
                                            <?php } ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endif ?>
            </section>
            <!-- /.content -->
        </div>
    </div>
    <!- LLAMADA ARCHIVO DEL DISEÑO DEL FOOTER Y MENU USUARIO -!>
    <?php include_once "../../assest/config/footer.php"; ?>
    <?php include_once "../../assest/config/menuExtraExpo.php"; ?>
</div>
<!- LLAMADA URL DE ARCHIVOS DE DISEÑO Y JQUERY E OTROS -!>
<?php include_once "../../assest/config/urlBase.php"; ?>

</body>

</html>