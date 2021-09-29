<header class="main-header">
  <div class="d-flex align-items-center logo-box pl-20">
    <a href="#" class="waves-effect waves-light nav-link rounded d-none d-md-inline-block push-btn" data-toggle="push-menu" role="button">
      <img src="../../api/cryptioadmin10/html/images/svg-icon/collapse.svg" class="img-fluid svg-icon" alt="">
    </a>
    <!-- Logo -->
    <a href="index.php" class="logo">
      <!-- logo-->
      <div class="logo-lg">
        <span class="light-logo"><img src="img/logo.png" alt="logo"></span>
        <span class="dark-logo"><img src="img/logo.png" alt="logo"></span>
      </div>
    </a>
  </div>
  <!-- Header Navbar -->
  <nav class="navbar navbar-static-top pl-10">
    <!-- Sidebar toggle button-->
    <div class="app-menu">
      <ul class="header-megamenu nav">
        <li class="btn-group nav-item d-md-none">
          <a href="#" class="waves-effect waves-light nav-link rounded push-btn" data-toggle="push-menu" role="button">
            <img src="../../api/cryptioadmin10/html/images/svg-icon/collapse.svg" class="img-fluid svg-icon" alt="">
          </a>
        </li>
        <li class="btn-group nav-item">
          <a href="#" data-provide="fullscreen" class="waves-effect waves-light nav-link rounded full-screen" title="Full Screen">
            <img src="../../api/cryptioadmin10/html/images/svg-icon/fullscreen.svg" class="img-fluid svg-icon" alt="">
          </a>
        </li>
        <li class="btn-group d-md-inline-flex d-none">
          <div class="search-bx ml-10">
            <form id="fechahora" name="fechahora">
              <div class="input-group">
                <input type="search" class="form-control" name="fechahora" id="fechahora" placeholder="FECHA Y HORA" aria-describedby="button-addon2" disabled style="background-color: white;">
                <div class="input-group-append">
                  <div class="btn border-transparent" id="button-addon2" style="background-color: white;">
                    <i class="glyphicon glyphicon-calendar"></i>
                  </div>
                </div>
              </div>

            </form>
          </div>
        </li>

        <li class="btn-group nav-item">
          <div class="search-bx ml-10">
            <div class="input-group" style="font-size: 12px;">
              <?php
              if (isset($_SESSION["NOMBRE_USUARIO"])) {
                $ARRAYEMPRESAS = $EMPRESA_ADO->verEmpresa($EMPRESAS);
                if ($ARRAYEMPRESAS) {
                  echo $ARRAYEMPRESAS[0]['NOMBRE_EMPRESA'];
                  $EMPRESA = $ARRAYEMPRESAS[0]['ID_EMPRESA'];
                } else {
                  echo "-";
                }
              } else {
                session_destroy();
              }
              ?>
              <br>
              <?php
              if (isset($_SESSION["NOMBRE_USUARIO"])) {
                $ARRAYPLANTAS = $PLANTA_ADO->verPlanta($PLANTAS);
                if ($ARRAYPLANTAS) {
                  echo $ARRAYPLANTAS[0]['NOMBRE_PLANTA'];
                  $PLANTA = $ARRAYPLANTAS[0]['ID_PLANTA'];
                } else {
                  echo "-";
                }
              } else {
                session_destroy();
              }
              ?>
              <br>
              <?php
              if (isset($_SESSION["NOMBRE_USUARIO"])) {
                $ARRAYTEMPORADAS = $TEMPORADA_ADO->verTemporada($TEMPORADAS);
                if ($ARRAYTEMPORADAS) {
                  echo $ARRAYTEMPORADAS[0]['NOMBRE_TEMPORADA'];
                  $TEMPORADA = $ARRAYTEMPORADAS[0]['ID_TEMPORADA'];
                } else {
                  echo "-";
                }
              } else {
                session_destroy();
              }
              ?>
            </div>
          </div>
        </li>

        <li class="btn-group nav-item">
          <div class="search-bx ml-10">
            <div class="input-group">
            </div>
          </div>
        </li>

        <li class="btn-group nav-item">
          <div class="search-bx ml-10">
            <div class="input-group">
            </div>
          </div>
        </li>
      </ul>
    </div>

    <div class="navbar-custom-menu r-side">
      <ul class="nav navbar-nav">
        <!-- Notifications -->
        <li class="dropdown notifications-menu">
          <a href="#" class="waves-effect waves-light dropdown-toggle" data-toggle="dropdown" title="Notifications">
            <img src="../../api/cryptioadmin10/html/images/svg-icon/notifications.svg" class="img-fluid svg-icon" alt="">
          </a>
          <ul class="dropdown-menu animated bounceIn">

            <li class="header">
              <div class="p-20">
                <div class="flexbox">
                  <div>
                    <h4 class="mb-0 mt-0">Notificaciones</h4>
                  </div>
                  <div>
                    <a href="#" class="text-danger">Limpiar Todo</a>
                  </div>
                </div>
              </div>
            </li>

            <li>
              <!-- inner menu: contains the actual data -->
              <ul class="menu sm-scrol">
                <li>
                  <a href="#">
                    <i class="fa fa-users text-info"></i> Curabitur id eros quis nunc suscipit blandit.
                  </a>
                </li>
                <li>
                  <a href="#">
                    <i class="fa fa-warning text-warning"></i> Duis malesuada justo eu sapien elementum, in semper diam posuere.
                  </a>
                </li>
                <li>
                  <a href="#">
                    <i class="fa fa-users text-danger"></i> Donec at nisi sit amet tortor commodo porttitor pretium a erat.
                  </a>
                </li>
                <li>
                  <a href="#">
                    <i class="fa fa-shopping-cart text-success"></i> In gravida mauris et nisi
                  </a>
                </li>
                <li>
                  <a href="#">
                    <i class="fa fa-user text-danger"></i> Praesent eu lacus in libero dictum fermentum.
                  </a>
                </li>
                <li>
                  <a href="#">
                    <i class="fa fa-user text-primary"></i> Nunc fringilla lorem
                  </a>
                </li>
                <li>
                  <a href="#">
                    <i class="fa fa-user text-success"></i> Nullam euismod dolor ut quam interdum, at scelerisque ipsum imperdiet.
                  </a>
                </li>
              </ul>
            </li>
            <li class="footer">
              <a href="#">Ver Todo</a>
            </li>
          </ul>
        </li>

        <!-- User Account-->
        <li class="dropdown user user-menu">
          <a href="#" class="waves-effect waves-light dropdown-toggle" data-toggle="dropdown" title="User">
            <img src="../../api/cryptioadmin10/html/images/svg-icon/user.svg" class="rounded svg-icon" alt="" />
          </a>
          <ul class="dropdown-menu animated flipInX">
            <!-- User image -->
            <li class="user-header bg-img" style="background-image: url(../../api/cryptioadmin10/html/images/user-info.jpg)" data-overlay="3">
              <div class="flexbox align-self-center">
                <img src="../../api/cryptioadmin10/html/images/avatar/7.jpg" class="float-left rounded-circle" alt="User Image">
                <h4 class="user-name align-self-center">

                  <?php

                  if (isset($_SESSION["NOMBRE_USUARIO"])) {


                    $ARRAYNOMBRESUSUARIOSLOGIN = $USUARIO_ADO->ObtenerNombreCompleto($IDUSUARIOS);
                    $NOMBRESUSUARIOSLOGIN = $ARRAYNOMBRESUSUARIOSLOGIN[0]["NOMBRE_COMPLETO"];
                  }
                  ?>
                  <span> <?php echo $NOMBRESUSUARIOSLOGIN; ?> </span>
                  <br>
                  <small>
                    <?php
                    if (isset($_SESSION["NOMBRE_USUARIO"])) {
                      $ARRAYTUSUARIO = $TUSUARIO_ADO->verTusuario($_SESSION["TIPO_USUARIO"]);

                      if ($ARRAYTUSUARIO) {
                        echo $ARRAYTUSUARIO[0]['NOMBRE_TUSUARIO'];
                      }
                    } else {
                      session_destroy();
                    }
                    ?>
                  </small>


                </h4>
              </div>
            </li>
            <!-- Menu Body -->
            <li class="user-body">
              <a class="dropdown-item" href="verUsuario.php"><i class="ion ion-person"></i> Mi Perfil</a>
              <?php if ($TUSUARIO != 0) { ?>
                <a class="dropdown-item" href="editarUsuario.php"><i class="ion ion-email-unread"></i> Editar Perfil</a>
                <a class="dropdown-item" href="editarUsuarioClave.php"><i class="ion ion-settings"></i> Cambiar Contrasena</a>
              <?php } ?>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item" href="verUsuarioActividad.php"><i class="ion ion-bag"></i> Mi Actividad</a>
              <!--actividadUsuario.php-->
              <div class="dropdown-divider"></div>
              <a class="dropdown-item" data-toggle="modal" data-target="#modal-empresa" title="Cambiar">
                <i class="ti-settings"></i>Cambiar Empresa
              </a>
              <a class="dropdown-item" data-toggle="modal" data-target="#modal-planta" title="Cambiar">
                <i class="ti-settings"></i>Cambiar Planta
              </a>
              <div class="dropdown-divider"></div>
              <div class="p-10">
                <center>
                  <form>
                    <button type="submit" class="btn btn-rounded btn-danger " name="CERRARS" value="CERRARS">
                      <i class="ion-log-out"></i>
                      Cerrar Sesion
                    </button>
                  </form>
                </center>
              </div>
            </li>
          </ul>
        </li>



        <?php //include_once "../../config/menuExtra.php"; 
        ?>
        <!-- Control Sidebar Toggle Button -->
        <!--
        <li>
          <a href="#" data-toggle="control-sidebar" title="Setting" class="waves-effect waves-light">
            <img src="../../api/cryptioadmin10/html/images/svg-icon/settings.svg" class="img-fluid svg-icon" alt="">
          </a>
        </li>
        -->
      </ul>
    </div>
  </nav>
</header>

<?php
$ARRAYEMPRESACAMBIAR = $EMPRESA_ADO->listarEmpresaCBX();
$ARRAYPLANTACAMBIAR = $PLANTA_ADO->listarPlantaPropiaCBX();
?>
<!-- modal Area -->
<div class="modal center-modal fade" id="modal-empresa" tabindex="-1">
  <form method="POST">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Cambiar </h5>
          <button type="button" class="close" data-dismiss="modal">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <p>
          <div class="form-group">
            <label>Empresa</label>
            <select class="form-control select2" id="EMPRESACAMBIAR" name="EMPRESACAMBIAR" style="width: 100%;" <?php echo $DISABLEDMENU; ?>>
              <option></option>
              <?php foreach ($ARRAYEMPRESACAMBIAR as $r) : ?>
                <?php if ($ARRAYEMPRESACAMBIAR) {    ?>
                  <option value="<?php echo $r['ID_EMPRESA']; ?>" <?php if ($EMPRESA == $r['ID_EMPRESA']) {
                                                                    echo "selected";
                                                                  } ?>> <?php echo $r['NOMBRE_EMPRESA'] ?> </option>
                <?php } else { ?>
                  <option>No Hay Datos Registrados </option>
                <?php } ?>
              <?php endforeach; ?>
            </select>
            <label id="val_empresa" class="validacion"> </label>
          </div>
          </p>

        </div>
        <div class="modal-footer modal-footer-uniform">
          <button type="button" class="btn btn-rounded btn-secondary" data-dismiss="modal">Cerrar</button>
          <button type="submit" class="btn btn-rounded btn-primary float-right" id="CAMBIARE" name="CAMBIARE" <?php echo $DISABLEDMENU; ?>>Cambiar</button>
        </div>
      </div>
    </div>
  </form>
</div>
<div class="modal center-modal fade" id="modal-planta" tabindex="-1">
  <form method="POST">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Cambiar </h5>
          <button type="button" class="close" data-dismiss="modal">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <p>
          <div class="form-group">
            <label>Planta</label>
            <select class="form-control select2" id="PLANTACAMBIAR" name="PLANTACAMBIAR" style="width: 100%;" <?php echo $DISABLEDMENU; ?>>
              <option></option>
              <?php foreach ($ARRAYPLANTACAMBIAR as $r) : ?>
                <?php if ($ARRAYPLANTACAMBIAR) {    ?>
                  <option value="<?php echo $r['ID_PLANTA']; ?>" <?php if ($PLANTA == $r['ID_PLANTA']) {
                                                                    echo "selected";
                                                                  } ?>> <?php echo $r['NOMBRE_PLANTA'] ?> </option>
                <?php } else { ?>
                  <option>No Hay Datos Registrados </option>
                <?php } ?>
              <?php endforeach; ?>
            </select>
            <label id="val_planta" class="validacion"> </label>
          </div>
          </p>

        </div>
        <div class="modal-footer modal-footer-uniform">
          <button type="button" class="btn btn-rounded btn-secondary" data-dismiss="modal">Cerrar</button>
          <button type="submit" class="btn btn-rounded btn-primary float-right" id="CAMBIARP" name="CAMBIARP" <?php echo $DISABLEDMENU; ?>>Cambiar</button>
        </div>
      </div>
    </div>

  </form>
</div>

<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">
  <!-- sidebar-->
  <section class="sidebar">
    <!-- sidebar menu-->
    <ul class="sidebar-menu" data-widget="tree">

      <li>
        <a href="index.php">
          <img src="../../api/cryptioadmin10/html/images/svg-icon/sidebar-menu/dashboard.svg" class="svg-icon" alt="">
          <span>Inicio</span>
        </a>
      </li>
      <li class="header">Modulo</li>
      <li class="treeview">
        <a href="#">
          <img src="../../api/cryptioadmin10/html/images/svg-icon/sidebar-menu/layout.svg" class="svg-icon" alt="">
          <span>Granel</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-right pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li class="treeview">
            <a href="#">Recepcion
              <span class="pull-left-container">
                <i class=" fa fa-angle-right pull-right "></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <li class="treeview">
                <a href="#">Materia Prima
                  <span class="pull-left-container">
                    <i class=" fa fa-angle-right pull-right"></i>
                  </span>
                </a>
                <ul class="treeview-menu">
                  <li><a href="registroRecepcionmp.php">Registro Recepción <i class="ti-more"></i></a></li>
                  <li><a href="listarRecepcionmp.php">Agrupado Recepción<i class="ti-more"></i></a></li>
                  <li><a href="listarRecepcionmpInterplanta.php">Agrupado Interplanta<i class="ti-more"></i></a></li>
                </ul>
              </li>
              <li class="treeview">
                <a href="#">Industrial
                  <span class="pull-left-container">
                    <i class=" fa fa-angle-right pull-right"></i>
                  </span>
                </a>
                <ul class="treeview-menu">
                  <li><a href="registroRecepcionind.php">Registro Recepción <i class="ti-more"></i></a> </li>
                  <li><a href="listarRecepcionind.php">Agrupado Recepción<i class="ti-more"></i></a></li>
                  <li><a href="listarRecepcionindInterplanta.php">Agrupado Interplanta<i class="ti-more"></i></a></li>
                </ul>
              </li>
            </ul>
          </li>
          <li class="treeview">
            <a href="#">Despacho
              <span class="pull-left-container">
                <i class=" fa fa-angle-right pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <li class="treeview">
                <a href="#">Materia Prima
                  <span class="pull-left-container">
                    <i class=" fa fa-angle-right pull-right"></i>
                  </span>
                </a>
                <ul class="treeview-menu">
                  <li><a href="registroDespachomp.php">Registro Despacho<i class="ti-more"></i></a></li>
                  <li><a href="listarDespachomp.php">Agrupado Despacho<i class="ti-more"></i></a></li>
                </ul>
              </li>
              <li class="treeview">
                <a href="#">Industrial
                  <span class="pull-left-container">
                    <i class=" fa fa-angle-right pull-right"></i>
                  </span>
                </a>
                <ul class="treeview-menu">
                  <li><a href="registroDespachoind.php">Registro Despacho<i class="ti-more"></i></a></li>
                  <li><a href="listarDespachoind.php">Agrupado Despacho<i class="ti-more"></i></a></li>
                </ul>
              </li>
            </ul>
          </li>
          <li class="treeview">
            <a href="#">Guia Por Recibir
              <span class="pull-left-container">
                <i class=" fa fa-angle-right pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <li><a href="registroGuiaPorRecibirMP.php">Materia Prima<i class="ti-more"></i> </a></li>
              <li><a href="registroGuiaPorRecibirIND.php">Inudstrial<i class="ti-more"></i></a></li>
            </ul>
          </li>     
          <li><a href="listarEximateriaprima.php">Existencia Materia Prima<i class="ti-more"></i></a></li>
          <li><a href="listarExiindustrial.php">Existencia Industrial<i class="ti-more"></i></a></li>
        </ul>
      </li>
      <li class="treeview">
        <a href="#">
          <img src="../../api/cryptioadmin10/html/images/svg-icon/sidebar-menu/forms2.svg" class="svg-icon" alt="">
          <span>Packing</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-right pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li class="treeview">
            <a href="#">Proceso
              <span class="pull-left-container">
                <i class=" fa fa-angle-right pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <li><a href="registroProceso.php"><i class="ti-more"></i>Registro Proceso </a></li>
              <li><a href="listarProceso.php"><i class="ti-more"></i>Agrupado Proceso</a></li>
            </ul>
          </li>
          <li class="treeview">
            <a href="#">Reembalaje
              <span class="pull-left-container">
                <i class=" fa fa-angle-right pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <li><a href="registroReembalajeEx.php"><i class="ti-more"></i> Producto Terminado </a></li>
              <li><a href="listarReembalajeEx.php"><i class="ti-more"></i>Agrupado Reembalaje</a></li>
            </ul>
          </li>
          <!--
          <li class="treeview">
            <a href="#"> Repaletizaje
              <span class="pull-left-container">
                <i class=" fa fa-angle-right pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <li class="treeview">
                <a href="#"> Producto Terminado
                  <span class="pull-left-container">
                    <i class=" fa fa-angle-right pull-right"></i>
                  </span>
                </a>
                <ul class="treeview-menu">
                  <li><a href="registroRepaletizajePTProceso.php"><i class="ti-more"></i> Registro Repaletizaje</a></li>
                  <li><a href="listarRepaletizajePTProceso.php"><i class="ti-more"></i>Agrupado Repaletizaje</a></li>
                </ul>
              </li>
            </ul>-->
          <!--
            <ul class="treeview-menu">
              <li class="treeview">
                <a href="#"> Materia Prima
                  <span class="pull-left-container">
                    <i class=" fa fa-angle-right pull-right"></i>
                  </span>
                </a>
                <ul class="treeview-menu">
                  <li><a href="registroRepaletizajeMp.php"><i class="ti-more"></i> Registro Repaletizaje</a></li>
                  <li><a href="#"><i class="ti-more"></i>Agrupado Repaletizaje</a></li>
                </ul>
              </li>
            </ul>
          </li>
                -->

          <li><a href="listarExiexportacion.php"><i class="ti-more"></i>Existencia P. Terminado</a></li>
          <li><a href="listarEximateriaprimaProceso.php"><i class="ti-more"></i>Existencia Materia Prima</a></li>
          <li><a href="listarExiindustrialProceso.php"><i class="ti-more"></i>Existencia Industrial</a></li>
        </ul>
      </li>
      <li class="treeview">
        <a href="#">
          <img src="../../api/cryptioadmin10/html/images/svg-icon/sidebar-menu/exchange.svg" class="svg-icon" alt="">
          <span> Logistica</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-right pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li class="treeview">
            <a href="#">Inst. Carga
              <span class="pull-left-container">
                <i class=" fa fa-angle-right pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <li><a href="registroICarga.php">Registro Inst. Carga</a></li>
              <li><a href="listarICarga.php">Agrupado Inst. Carga</a></li>
            </ul>
          </li>
          <li><a href="listarExiexportacionLogistica.php"><i class="ti-more"></i> Existencia P. Terminado</a></li>
        </ul>
      </li>
      <li class="treeview">
        <a href="#">
          <img src="../../api/cryptioadmin10/html/images/svg-icon/sidebar-menu/transactions.svg" class="svg-icon" alt="">
          <span> Operaciónes SAG</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-right pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li class="treeview">
            <a href="#">Inspección SAG
              <span class="pull-left-container">
                <i class=" fa fa-angle-right pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <li><a href="registroInpsag.php"><i class="ti-more"></i>Registro Inspección </a></li>
              <li><a href="listarInpsag.php"><i class="ti-more"></i>Agrupado Inspección </a></li>
            </ul>
          </li>
          <li><a href="listarExiexportacionOSAG.php"><i class="ti-more"></i>Existencia P. Terminado</a></li>
        </ul>
      </li>
      <li class="treeview">
        <a href="#">
          <img src="../../api/cryptioadmin10/html/images/svg-icon/sidebar-menu/maps.svg" class="svg-icon" alt="">
          <span> Frigorifico</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-right pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li class="treeview">
            <a href="#">Recepción P. Terminado
              <span class="pull-left-container">
                <i class=" fa fa-angle-right pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <li><a href="registroRecepcionpt.php"><i class="ti-more"></i>Registro Recepción</a></li>
              <li><a href="listarRecepcionpt.php"><i class="ti-more"></i>Agrupado Recepción</a></li>
              <li><a href="listarRecepcionptInterplanta.php"><i class="ti-more"></i>Agrupado Interplanta</a></li>
            </ul>
          </li>
          <li class="treeview">
            <a href="#">Guia Por Recibir
              <span class="pull-left-container">
                <i class=" fa fa-angle-right pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <li><a href="registroGuiaPorRecibirPT.php"><i class="ti-more"></i> Producto Terminado</a></li>
            </ul>
          </li>
          <li class="treeview">
            <a href="#">Repaletizaje
              <span class="pull-left-container">
                <i class=" fa fa-angle-right pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <li><a href="registroRepaletizajePTFrigorifico.php"><i class="ti-more"></i> Producto Terminado</a></li>
              <li><a href="listarRepaletizajePTFrigorifico.php"><i class="ti-more"></i>Agrupado Repaletizaje</a></li>
            </ul>
          </li>
          <li class="treeview">
            <a href="#">Despacho P. Terminado
              <span class="pull-left-container">
                <i class=" fa fa-angle-right pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <li><a href="registroDespachopt.php"><i class="ti-more"></i>Registro Despacho</a></li>
              <li><a href="listarDespachopt.php"><i class="ti-more"></i>Agrupado Despacho</a></li>
            </ul>
          </li>
          <li class="treeview">
            <a href="#">Despacho Exportacion
              <span class="pull-left-container">
                <i class=" fa fa-angle-right pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <li><a href="registroDespachoEX.php"><i class="ti-more"></i>Registro Despacho</a></li>
              <li><a href="listarDespachoEX.php"><i class="ti-more"></i>Agrupado Despacho</a></li>
            </ul>
          </li>
          <li class="treeview">
            <a href="#">Planificador Carga
              <span class="pull-left-container">
                <i class=" fa fa-angle-right pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <li><a href="registroPcdespacho.php"><i class="ti-more"></i> Registro PC </a></li>
              <li><a href="listarPcdespacho.php"><i class="ti-more"></i>Agrupado PC</a></li>
            </ul>
          </li>
          <li><a href="listarExiexportacionFrigorifico.php"><i class="ti-more"></i>Existencia P. Terminado</a></li>
          <li><a href="listarExiexportacionDespachadoFrigorifico.php"><i class="ti-more"></i>Despacho P. Terminado</a></li>
          <li><a href="registroCambiarFolioPT.php"><i class="ti-more"></i>Cambiar Folio P. Terminado</a></li>
        </ul>
      </li>
      <li class="treeview">
        <a href="#">
          <img src="../../api/cryptioadmin10/html/images/svg-icon/sidebar-menu/pages.svg" class="svg-icon" alt="">
          <span> Hitorial Existencia</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-right pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li><a href="listarHEximateriaprima.php"><i class="ti-more"></i> Materia Prima</a></li>
          <li><a href="listarHExiexportacion.php"><i class="ti-more"></i> Producto Terminado</a></li>
          <li><a href="listarHExiindustrial.php"><i class="ti-more"></i>Producto Industrial</a></li>
        </ul>
      </li>
      <li class="treeview">
        <a href="#">
          <img src="../../api/cryptioadmin10/html/images/svg-icon/sidebar-menu/icons.svg" class="svg-icon" alt="">
          <span> AP</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-right pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li><a href="listarAProceso.php"><i class="ti-more"></i> Proceso</a></li>
        </ul>
      </li>
      <li class="header">Configuraciones</li>
      <li class="treeview">
        <a href="#">
          <img src="../../api/cryptioadmin10/html/images/svg-icon/sidebar-menu/miscellaneous.svg" class="svg-icon" alt="">
          <span>Mantenedores</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-right pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li class="treeview">
            <a href="#">Fruta
              <span class="pull-left-container">
                <i class=" fa fa-angle-right pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <li><a href="registroProductor.php"><i class="ti-more"></i>Productor</a></li>
              <li><a href="registroVespecies.php"><i class="ti-more"></i>Variedad Especies</a></li>
              <li><a href="registroEspecies.php"><i class="ti-more"></i>Especies</a></li>
              <li><a href="registroCuartel.php"><i class="ti-more"></i> Cuartel</a></li>
              <li><a href="registroTetiqueta.php"><i class="ti-more"></i>Etiqueta</a></li>
              <li><a href="registroTembalaje.php"><i class="ti-more"></i>Embalaje</a></li>
              <li><a href="registroTcalibre.php"><i class="ti-more"></i>Calibre</a></li>
            </ul>
          </li>
          <li class="treeview">
            <a href="#">Ubicacion
              <span class="pull-left-container">
                <i class=" fa fa-angle-right pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <li><a href="registroCiudad.php"><i class="ti-more"></i>Ciudad</a></li>
              <li><a href="registroComuna.php"><i class="ti-more"></i>Comuna</a></li>
              <li><a href="registroProvincia.php"><i class="ti-more"></i>Provincia</a></li>
              <li><a href="registroRegion.php"><i class="ti-more"></i>Region</a></li>
              <li><a href="registroPais.php"><i class="ti-more"></i>Pais</a></li>
              <li class="treeview">
                <a href="#">Destino
                  <span class="pull-left-container">
                    <i class=" fa fa-angle-right pull-right"></i>
                  </span>
                </a>
                <ul class="treeview-menu">
                  <li><a href="registroLdestino.php"><i class="ti-more"></i>Lugar Destino</a></li>
                  <li><a href="registroPdestino.php"><i class="ti-more"></i>Puerto Destino </a></li>
                  <li><a href="registroAdestino.php"><i class="ti-more"></i>Aeropuerto Destino </a></li>
                </ul>
              </li>
              <li class="treeview">
                <a href="#">Carga
                  <span class="pull-left-container">
                    <i class=" fa fa-angle-right pull-right"></i>
                  </span>
                </a>
                <ul class="treeview-menu">
                  <li><a href="registroLcarga.php"><i class="ti-more"></i>Lugar Carga</a></li>
                  <li><a href="registroPcarga.php"><i class="ti-more"></i>Puerto Carga </a></li>
                  <li><a href="registroAcarga.php"><i class="ti-more"></i>Aeropuerto Carga </a></li>
                </ul>
              </li>
            </ul>

          </li>

          <li class="treeview">
            <a href="#">Transporte
              <span class="pull-left-container">
                <i class=" fa fa-angle-right pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <li class="treeview">
                <a href="#">Aereo
                  <span class="pull-left-container">
                    <i class=" fa fa-angle-right pull-right"></i>
                  </span>
                </a>
                <ul class="treeview-menu">
                  <li><a href="registroLaerea.php"><i class="ti-more"></i>Linea Area</a></li>
                  <li><a href="registroAerolinia.php"><i class="ti-more"></i>Aerolinia</a></li>
                  <li><a href="registroAeronave.php"><i class="ti-more"></i>Aeronave</a></li>
                </ul>
              </li>
              <li class="treeview">
                <a href="#">Maritimo
                  <span class="pull-left-container">
                    <i class=" fa fa-angle-right pull-right"></i>
                  </span>
                </a>
                <ul class="treeview-menu">
                  <li><a href="registroNaviera.php"><i class="ti-more"></i>Naviera</a></li>
                  <li><a href="registroNave.php"><i class="ti-more"></i>Nave</a></li>
                </ul>
              </li>
              <li class="treeview">
                <a href="#">Terrestre
                  <span class="pull-left-container">
                    <i class=" fa fa-angle-right pull-right"></i>
                  </span>
                </a>
                <ul class="treeview-menu">
                  <li><a href="registroTransporte.php"><i class="ti-more"></i>Transporte</a></li>
                </ul>
              </li>
              <li><a href="registroConductor.php"><i class="ti-more"></i>Conductor</a></li>
            </ul>
          </li>
          <li class="treeview">
            <a href="#">Estandares
              <span class="pull-left-container">
                <i class=" fa fa-angle-right pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <li><a href="registroErecepcion.php"><i class="ti-more"></i>Granel</a></li>
              <li><a href="registroEexportacion.php"><i class="ti-more"></i>Exportacion</a></li>
              <li><a href="registroEcomercial.php"><i class="ti-more"></i> Expo. Comercial</a></li>
              <li><a href="registroEindustrial.php"><i class="ti-more"></i>Industrial</a></li>
            </ul>
          </li>
          <li class="treeview">
            <a href="#">Mercado
              <span class="pull-left-container">
                <i class=" fa fa-angle-right pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <li><a href="registroMercado.php"><i class="ti-more"></i>Mercado</a></li>
              <li><a href="registroRmercado.php"><i class="ti-more"></i>Restrinccion Mercado</a></li>
            </ul>
          </li>
          <li class="treeview">
            <a href="#">Instructivo
              <span class="pull-left-container">
                <i class=" fa fa-angle-right pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <li class="treeview">
                <a href="#">Pago
                  <span class="pull-left-container">
                    <i class=" fa fa-angle-right pull-right"></i>
                  </span>
                </a>
                <ul class="treeview-menu">
                  <li><a href="registroFpago.php"><i class="ti-more"></i>Formato Pago</a></li>
                  <li><a href="registroCventa.php"><i class="ti-more"></i>Clausaula Venta </a></li>
                  <li><a href="registroMventa.php"><i class="ti-more"></i>Modalidad Venta </a></li>
                </ul>
              </li>
              <li><a href="registroConsignatorio.php"><i class="ti-more"></i>Consignatorio</a></li>
              <li><a href="registroNotificador.php"><i class="ti-more"></i>Notificador </a></li>
              <li><a href="registroBroker.php"><i class="ti-more"></i>Broker </a></li>
              <li><a href="registroRfinal.php"><i class="ti-more"></i>Recibidor Final </a></li>
              <li><a href="registroAaduana.php"><i class="ti-more"></i>Agente Aduana </a></li>
              <li><a href="registroAgcarga.php"><i class="ti-more"></i>Agente Carga </a></li>
              <li><a href="registroDfinal.php"><i class="ti-more"></i>Destino Final </a></li>
              <li><a href="registroSeguro.php"><i class="ti-more"></i>Seguro </a></li>
            </ul>
          </li>


          <li class="treeview">
            <a href="#">Parametros
              <span class="pull-left-container">
                <i class=" fa fa-angle-right pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <li class="treeview">
                <a href="#">Tipo
                  <span class="pull-left-container">
                    <i class=" fa fa-angle-right pull-right"></i>
                  </span>
                </a>
                <ul class="treeview-menu">
                  <li><a href="registroTproductor.php"><i class="ti-more"></i>Tipo Productor</a></li>
                  <li><a href="registroTproceso.php"><i class="ti-more"></i>Tipo Proceso</a></li>
                  <li><a href="registroTreembalaje.php"><i class="ti-more"></i>Tipo Reembalaje</a></li>
                  <li><a href="registroTcontenedor.php"><i class="ti-more"></i>Tipo Contenedor</a></li>
                  <li><a href="registroTflete.php"><i class="ti-more"></i>Tipo Flete</a></li>
                  <li><a href="registroTmoneda.php"><i class="ti-more"></i>Tipo Moneda</a></li>
                  <li><a href="registroTservicio.php"><i class="ti-more"></i>Tipo Servicio</a></li>
                  <li><a href="registroTmanejo.php"><i class="ti-more"></i>Tipo Manejo</a></li>
                  <li><a href="registroTinpsag.php"><i class="ti-more"></i>Tipo Inpeccion Sag</a></li>
                </ul>
              </li>
              <li class="treeview">
                <a href="#">Folio
                  <span class="pull-left-container">
                    <i class=" fa fa-angle-right pull-right"></i>
                  </span>
                </a>
                <ul class="treeview-menu">
                  <li><a href="registroFolio.php"><i class="ti-more"></i>Folio</a></li>
                  <!--<li><a href="registroAfolio.php"><i class="ti-more"></i>Auto Folio</a></li>-->
                  <li><a href="registroTemporada.php"><i class="ti-more"></i>Temporada</a></li>
                </ul>
              </li>
              <li class="treeview">
                <a href="#">Control
                  <span class="pull-left-container">
                    <i class=" fa fa-angle-right pull-right"></i>
                  </span>
                </a>
                <ul class="treeview-menu">
                  <li><a href="registroEau.php"><i class="ti-more"></i>Empresa Usuario</a></li>
                </ul>
              </li>
              <li><a href="registroCcalidad.php"><i class="ti-more"></i>Color Calidad</a></li>
              <li><a href="registroContraparte.php"><i class="ti-more"></i>Contraparte</a></li>
              <li><a href="registroInpector.php"><i class="ti-more"></i>Inpector</a></li>
              <li><a href="registroAtmosfera.php"><i class="ti-more"></i>Atmosfera</a></li>
              <li><a href="registroExportadora.php"><i class="ti-more"></i>Exportadora</a></li>
              <li><a href="registroComprador.php"><i class="ti-more"></i>Comprador</a></li>
              <li><a href="registroEmpresa.php"><i class="ti-more"></i>Empresa</a></li>
              <li><a href="registroPlanta.php"><i class="ti-more"></i>Planta</a></li>
              <li><a href="registroBodega.php"><i class="ti-more"></i>Bodega</a></li>
            </ul>
          </li>

        </ul>
      </li>
      <li class="treeview">
        <a href="#">
          <img src="../../api/cryptioadmin10/html/images/svg-icon/sidebar-menu/members.svg" class="svg-icon" alt="">
          <span>Usuario</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-right pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li><a href="registroTusuario.php"><i class="ti-more"></i>Tipo Usuario</a></li>
          <li><a href="registroUsuario.php"><i class="ti-more"></i>Usuario</a></li>
          <li><a href="registroPtusuario.php"><i class="ti-more"></i>Privilegio Tipo Usuario</a></li>
          <li><a href="listarAusuario.php"><i class="ti-more"></i>Actividad Usuario</a></li>
        </ul>
      </li>
    </ul>
  </section>
</aside>