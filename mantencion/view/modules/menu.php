<?php
if (isset($_SESSION['establecimiento'])) {
  $itemLocal = 'id_empresa';
  $valorLocal = $_SESSION['establecimiento'];
  $nombreLocal = EmpresasController::ctrMostrarNombreLocal($itemLocal, $valorLocal);
}

?>
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <a href="home" class="brand-link">
      <img src="view/img/plantilla/fav.png" alt="NePOS Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">ShowCase</span>
    </a>
    <div class="sidebar">
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="view/img/plantilla/fav.png" class="img-rounded" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block"><?php echo $_SESSION['nombreUsuario']; ?></a>
        </div>
      </div>
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <li class="nav-item">
            <a href="home" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Inicio
              </p>
            </a>
          </li>
          <?php if ($_SESSION['nivelAcceso']=='superadmin'): ?>
            <li class="nav-item">
              <a href="/usuarios" class="nav-link">
                <i class="nav-icon fas fa-user"></i>
                <p>
                  Usuario
                </p>
              </a>
            </li>
            <!-- empresas -->
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="fas fa-building"></i>
                  <p>
                    Empresas
                    <i class="fas fa-angle-left right"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="/crear-empresa" class="nav-link">
                      <i class="fas fa-arrow-right"></i>
                      <p>Agregar Empresas </p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="/lista-empresas" class="nav-link">
                      <i class="fas fa-arrow-right"></i>
                      <p>Listado de empresas</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="/usuario-empresa" class="nav-link">
                      <i class="fas fa-arrow-right"></i>
                      <p>Usuario <i class="fas fa-arrows-alt-h"></i> Empresas</p>
                    </a>
                  </li>
                </ul>
              </li>
            <!-- /empresas -->
          <?php endif ?>

          <?php if (isset($_SESSION['establecimiento'])): ?>
              <!-- categorias -->
                <li class="nav-item">
                  <a href="#" class="nav-link">
                    <i class="fas fa-list"></i>
                    <p>
                      Categorias
                      <i class="fas fa-angle-left right"></i>
                    </p>
                  </a>
                  <ul class="nav nav-treeview">
                    <li class="nav-item">
                      <a href="agregar-categoria" class="nav-link">
                        <i class="fas fa-arrow-right"></i>
                        <p>Agregar Categoria </p>
                      </a>
                    </li>
                    <li class="nav-item">
                      <a href="categorias" class="nav-link">
                        <i class="fas fa-arrow-right"></i>
                        <p>Listado de categorias</p>
                      </a>
                    </li>
                  </ul>
                </li>
              <!-- /categorias -->
              <!-- productos -->
                <li class="nav-item">
                  <a href="#" class="nav-link">
                    <i class="fab fa-product-hunt"></i>
                    <p>
                      Productos
                      <i class="fas fa-angle-left right"></i>
                    </p>
                  </a>
                  <ul class="nav nav-treeview">
                    <li class="nav-item">
                      <a href="/agregar-producto" class="nav-link">
                        <i class="fas fa-arrow-right"></i>
                        <p>Agregar Producto </p>
                      </a>
                    </li>
                    <li class="nav-item">
                      <a href="productos" class="nav-link">
                        <i class="fas fa-arrow-right"></i>
                        <p>Listado de productos</p>
                      </a>
                    </li>
                  </ul>
                </li>
              <!-- /productos -->
              <!-- configuracion establecimiento -->
                <li class="nav-item">
                  <a href="#" class="nav-link">
                    <i class="fas fa-cash-register"></i>
                      <p>
                        Establecimiento
                        <i class="fas fa-angle-left right"></i>
                      </p>
                  </a>
                  <ul class="nav nav-treeview">
                    <li class="nav-item">
                      <a href="#" class="nav-link">
                        <i class="fas fa-arrow-right"></i>
                        <p>Horarios</p>
                      </a>
                    </li>
                    <li class="nav-item">
                      <a href="contacto" class="nav-link">
                        <i class="fas fa-arrow-right"></i>
                        <p>Contacto</p>
                      </a>
                    </li>
                    <li class="nav-item">
                      <a href="/listado-cobros-mesa" class="nav-link" disabled>
                        <i class="fas fa-arrow-right"></i>
                        <p>Cobro Web</p>
                      </a>
                    </li>
                    <li class="nav-item">
                      <a href="mapa-establecimiento" class="nav-link">
                        <i class="fas fa-arrow-right"></i>
                        <p>Mapa
                          <?php if ($nombreLocal[0]['mapa']==''): ?>
                            <span class="right badge badge-danger"><i class="fas fa-map-marked"></i></span>
                          <?php endif ?>
                          <?php if ($nombreLocal[0]['mapa']!=''): ?>
                            <span class="right badge badge-success"><i class="fas fa-map-marked"></i></span>
                          <?php endif ?>
                      </p>
                      </a>
                    </li>
                  </ul>
                </li>
              <!-- /configuracion establecimiento -->
              <!-- configuracion ecommerce y tienda virtual -->
                <li class="nav-item">
                  <a href="#" class="nav-link">
                    <i class="fas fa-chalkboard"></i>
                    <p>E-commerce
                      <i class="fas fa-angle-left right"></i>
                    </p>
                  </a>
                  <ul class="nav nav-treeview">
                    <li class="nav-item">
                      <a href="transbank-webpay-plus" class="nav-link">
                        <i class="fas fa-arrow-right"></i>
                        <p>
                          Transbank
                          <?php if ($nombreLocal[0]['habilita_tbk']==0): ?>
                            <span class="right badge badge-danger">Desactivado</span>
                          <?php endif ?>
                          <?php if ($nombreLocal[0]['habilita_tbk']==1): ?>
                            <span class="right badge badge-success">Activado</span>
                          <?php endif ?>
                        </p>
                      </a>
                    </li>
                    <li class="nav-item">
                      <a href="#" class="nav-link">
                        <i class="fas fa-arrow-right"></i>
                        <p>
                          MachPay
                            <span class="right badge badge-danger">Desactivado</span>
                        </p>
                      </a>
                    </li>
                    <li class="nav-item">
                      <a href="facebook-messenger" class="nav-link">
                        <i class="fas fa-arrow-right"></i>
                        <p>
                        FB Chat
                        <?php if ($nombreLocal[0]['habilita_fb_msn']==0): ?>
                          <span class="right badge badge-danger">Desactivado</span>
                        <?php endif ?>
                        <?php if ($nombreLocal[0]['habilita_fb_msn']==1): ?>
                          <span class="right badge badge-success">Activado</span>
                        <?php endif ?>
                        </p>
                      </a>
                    </li>
                    <li class="nav-item">
                      <a href="#" class="nav-link">
                        <i class="fas fa-arrow-right"></i>
                        <p>Delivery</p>
                      </a>
                    </li>
                  </ul>
                </li>
              <!-- /configuracion ecommerce y tienda virtual -->
          <?php endif ?>

          <!-- gestion usuarios -->
            <li class="nav-item">
              <a href="salir" class="nav-link">
                <i class="fas fa-sign-out-alt"></i>
                <p>Cerrar Sesion</p>
              </a>
            </li>
          <!-- /gestion usuarios -->
        </ul>
      </nav>
    </div>
  </aside>