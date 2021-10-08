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
                  session_destroy();
                  echo "<script type='text/javascript'> location.href ='iniciarSession.php';</script>";
                }
              } else {
                session_destroy();
                echo "<script type='text/javascript'> location.href ='iniciarSession.php';</script>";
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
                  session_destroy();
                  echo "<script type='text/javascript'> location.href ='iniciarSession.php';</script>";
                }
              } else {
                session_destroy();
                echo "<script type='text/javascript'> location.href ='iniciarSession.php';</script>";
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
                  session_destroy();
                  echo "<script type='text/javascript'> location.href ='iniciarSession.php';</script>";
                }
              } else {
                session_destroy();
                echo "<script type='text/javascript'> location.href ='iniciarSession.php';</script>";
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
          <?php echo $EURO; ?>
          <br>
          <?php echo $DOLAR; ?>
        </li>
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
                      echo "<script type='text/javascript'> location.href ='iniciarSession.php';</script>";
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
          <img src="../../api/cryptioadmin10/html/images/svg-icon/sidebar-menu/reports.svg" class="svg-icon" alt="">
          <span>Materiales</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-right pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li class="treeview">
            <a href="#">Ficha Consumo
              <span class="pull-left-container">
                <i class=" fa fa-angle-right pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <li><a href="registroFicha.php">Registro Ficha <i class="ti-more"></i></a></li>
              <li><a href="listarFicha.php"> Agrupado Ficha<i class="ti-more"></i></a></li>
            </ul>
          </li>
          <li><a href="#">Existencia Materiales<i class="ti-more"></i></a></li>
          <li><a href="#">Detallado Recepción<i class="ti-more"></i></a></li>
          <li><a href="#">Detallado Despacho<i class="ti-more"></i></a></li>
          <li><a href="#">Consumo Materiales<i class="ti-more"></i></a></li>
          <li><a href="#">Kardex<i class="ti-more"></i></a></li>
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
              <li><a href="registroICarga.php"> Registro Inst. Carga<i class="ti-more"></i></a></li>
              <li><a href="listarICarga.php"> Agrupado Inst. Carga<i class="ti-more"></i></a></li>
            </ul>
          </li>
        </ul>
      </li>
      <li class="treeview">
        <a href="#">
          <img src="../../api/cryptioadmin10/html/images/svg-icon/sidebar-menu/pages.svg" class="svg-icon" alt="">
          <span> Informes</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-right pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li class="treeview">
            <a href="#">Granel
              <span class="pull-left-container">
                <i class=" fa fa-angle-right pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <li><a href="#">Detallado Existencia MP<i class="ti-more"></i></a></li>
              <li><a href="#">Detallado Recepción MP<i class="ti-more"></i></a></li>
              <li><a href="#">Detallado Despacho MP<i class="ti-more"></i></a></li>              
              <li><a href="#">Detallado Existencia IND<i class="ti-more"></i></a></li>
              <li><a href="#">Detallado Recepción IND<i class="ti-more"></i></a></li>
              <li><a href="#">Detallado Despacho IND<i class="ti-more"></i></a></li>
              <li><a href="#">Consolidado Recep. Granel<i class="ti-more"></i></a></li>
              <li><a href="#">Consolidado Desp. Granel<i class="ti-more"></i></a></li>
              <li><a href="#">Historial Materia Prima<i class="ti-more"></i></a></li>
              <li><a href="#">Historial Industrial<i class="ti-more"></i></a></li>
            </ul>
          </li>
          <li class="treeview">
            <a href="#">Producto Terminado
              <span class="pull-left-container">
                <i class=" fa fa-angle-right pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <li><a href="listarExiexportacion.php">Detallado Existencia PT <i class="ti-more"></i></a></li>
              <li><a href="#">Detallado Recepción PT<i class="ti-more"></i></a></li>
              <li><a href="#">Detallado Despacho PT<i class="ti-more"></i></a></li>
              <li><a href="#">Detallado Despacho Expo<i class="ti-more"></i></a></li>
              <li><a href="#">Consolidado Desp. PT<i class="ti-more"></i></a></li>
              <li><a href="listarExiexportacionAgrupado.php">Agrupado Existencia PT <i class="ti-more"></i></a></li>
              <li><a href="listarHExiexportacion.php">Historial Producto Terminado <i class="ti-more"></i></a></li>
            </ul>
          </li>
          <li class="treeview">
            <a href="#">Gestión
              <span class="pull-left-container">
                <i class=" fa fa-angle-right pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <li><a href="#">Informe Liquidación <i class="ti-more"></i></a></li>
            </ul>
          </li>
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
              <li><a href="registroEspecies.php">Especies<i class="ti-more"></i></a></li>
              <li><a href="registroTetiqueta.php">Etiqueta<i class="ti-more"></i></a></li>
              <li><a href="registroTembalaje.php">Embalaje<i class="ti-more"></i></a></li>
              <li><a href="registroTcalibre.php">Calibre<i class="ti-more"></i></a></li>
            </ul>
          </li>
          <li class="treeview">
            <a href="#">Ubicacion
              <span class="pull-left-container">
                <i class=" fa fa-angle-right pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <li><a href="registroCiudad.php">Ciudad<i class="ti-more"></i></a></li>
              <li><a href="registroComuna.php">Comuna<i class="ti-more"></i></a></li>
              <li><a href="registroProvincia.php">Provincia<i class="ti-more"></i></a></li>
              <li><a href="registroRegion.php">Region<i class="ti-more"></i></a></li>
              <li><a href="registroPais.php">Pais<i class="ti-more"></i></a></li>
              <li class="treeview">
                <a href="#">Destino
                  <span class="pull-left-container">
                    <i class=" fa fa-angle-right pull-right"></i>
                  </span>
                </a>
                <ul class="treeview-menu">
                  <li><a href="registroLdestino.php">Lugar Destino<i class="ti-more"></i></a></li>
                  <li><a href="registroPdestino.php">Puerto Destino<i class="ti-more"></i> </a></li>
                  <li><a href="registroAdestino.php">Aeropuerto Destino <i class="ti-more"></i></a></li>
                </ul>
              </li>
              <li class="treeview">
                <a href="#">Carga
                  <span class="pull-left-container">
                    <i class=" fa fa-angle-right pull-right"></i>
                  </span>
                </a>
                <ul class="treeview-menu">
                  <li><a href="registroLcarga.php">Lugar Carga<i class="ti-more"></i></a></li>
                  <li><a href="registroPcarga.php">Puerto Carga<i class="ti-more"></i> </a></li>
                  <li><a href="registroAcarga.php">Aeropuerto Carga <i class="ti-more"></i></a></li>
                </ul>
              </li>
              <li><a href="registroDfinal.php">Destino Final <i class="ti-more"></i></a></li>
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
                  <li><a href="registroLaerea.php">Linea Area<i class="ti-more"></i></a></li>
                  <li><a href="registroAerolinia.php">Aerolinia<i class="ti-more"></i></a></li>
                  <li><a href="registroAeronave.php">Aeronave<i class="ti-more"></i></a></li>
                </ul>
              </li>
              <li class="treeview">
                <a href="#">Maritimo
                  <span class="pull-left-container">
                    <i class=" fa fa-angle-right pull-right"></i>
                  </span>
                </a>
                <ul class="treeview-menu">
                  <li><a href="registroNaviera.php">Naviera<i class="ti-more"></i></a></li>
                  <li><a href="registroNave.php">Nave<i class="ti-more"></i></a></li>
                </ul>
              </li>
              <li class="treeview">
                <a href="#">Terrestre
                  <span class="pull-left-container">
                    <i class=" fa fa-angle-right pull-right"></i>
                  </span>
                </a>
                <ul class="treeview-menu">
                  <li><a href="registroTransporte.php">Transporte<i class="ti-more"></i></a></li>
                </ul>
              </li>
              <li><a href="registroConductor.php">Conductor<i class="ti-more"></i></a></li>

            </ul>
          </li>
          <li class="treeview">
            <a href="#">Estandares
              <span class="pull-left-container">
                <i class=" fa fa-angle-right pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <li><a href="registroEexportacion.php">Exportacion<i class="ti-more"></i></a></li>
              <li><a href="registroEcomercial.php">Expo. Comercial<i class="ti-more"></i></a></li>
            </ul>
          </li>
          <li class="treeview">
            <a href="#">Mercado
              <span class="pull-left-container">
                <i class=" fa fa-angle-right pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <li><a href="registroMercado.php">Mercado<i class="ti-more"></i></a></li>
              <li><a href="registroRmercado.php">Restrinccion Mercado<i class="ti-more"></i></a></li>
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
                  <li><a href="registroFpago.php">Formato Pago<i class="ti-more"></i></a></li>
                  <li><a href="registroCventa.php">Clausaula Venta <i class="ti-more"></i></a></li>
                  <li><a href="registroMventa.php">Modalidad Venta <i class="ti-more"></i></a></li>
                </ul>
              </li>
              <li><a href="registroConsignatorio.php">Consignatorio<i class="ti-more"></i></a></li>
              <li><a href="registroNotificador.php">Notificador <i class="ti-more"></i></a></li>
              <li><a href="registroBroker.php">Broker </a></li>
              <li><a href="registroRfinal.php">Recibidor Final <i class="ti-more"></i></a></li>
              <li><a href="registroAaduana.php">Agente Aduana <i class="ti-more"></i></a></li>
              <li><a href="registroAgcarga.php">Agente Carga <i class="ti-more"></i></a></li>
              <li><a href="registroSeguro.php">Seguro <i class="ti-more"></i></a></li>
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
                <a href="#">Control
                  <span class="pull-left-container">
                    <i class=" fa fa-angle-right pull-right"></i>
                  </span>
                </a>
                <ul class="treeview-menu">
                  <li><a href="registroEau.php">Empresa Usuario<i class="ti-more"></i></a></li>
                </ul>
              </li>
              <li class="treeview">
                <a href="#">Tipo
                  <span class="pull-left-container">
                    <i class=" fa fa-angle-right pull-right"></i>
                  </span>
                </a>
                <ul class="treeview-menu">
                  <li><a href="registroTflete.php">Tipo Flete<i class="ti-more"></i></a></li>
                  <li><a href="registroTmoneda.php">Tipo Moneda<i class="ti-more"></i></a></li>
                  <li><a href="registroTcontenedor.php">Tipo Contenedor<i class="ti-more"></i></a></li>
                  <li><a href="registroTservicio.php">Tipo Servicio<i class="ti-more"></i></a></li>
                </ul>
              </li>
              <li><a href="registroAtmosfera.php">Atmosfera<i class="ti-more"></i></a></li>
              <li><a href="registroExportadora.php">Exportadora<i class="ti-more"></i></a></li>
              <li><a href="registroEmpresa.php">Empresa<i class="ti-more"></i></a></li>
              <li><a href="registroPlanta.php">Planta<i class="ti-more"></i></a></li>
              <li><a href="registroBodega.php">Bodega<i class="ti-more"></i></a></li>
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
          <li><a href="registroTusuario.php">Tipo Usuario<i class="ti-more"></i></a></li>
          <li><a href="registroUsuario.php">Usuario<i class="ti-more"></i></a></li>
          <li><a href="registroPtusuario.php">Privilegio Tipo Usuario<i class="ti-more"></i></a></li>
          <li><a href="listarAusuario.php">Actividad Usuario<i class="ti-more"></i></a></li>
        </ul>
      </li>
    </ul>
  </section>
</aside>