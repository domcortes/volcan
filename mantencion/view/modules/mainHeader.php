  <nav class="main-header navbar navbar-expand navbar-dark navbar-dark">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
    </ul>

    <!-- SEARCH FORM -->
    <form class="form-inline ml-3">
      <div class="input-group input-group-sm">
        <select name="empresaSelector" id="empresaSelector" class="form-control">
          <option value="">Selecciona una empresa</option>
          <?php
            $itemEmpresa = 'id_usuario';
            $valorEmpresa = $_SESSION['idusuario'];
            $locales = EmpresasController::ctrMostrarLocales($itemEmpresa, $valorEmpresa);
            foreach ($locales as $key => $value) {
          ?>
            <option value="<?php echo $value['id_empresa']?>">
              <?php
                $itemLocal = 'id_empresa';
                $valorLocal = $value['id_empresa'];
                $nombreLocal = EmpresasController::ctrMostrarNombreLocal($itemLocal, $valorLocal);
                echo $nombreLocal[0]['nombre_fantasia'];
              ?>
            </option>
          <?php
            }
          ?>
        </select>
        <div class="input-group-append">
          <button class="btn btn-navbar" disabled>
            <i class="fas fa-search"></i>
          </button>
        </div>
        <div class="input-group-append">
            <?php if (isset($_SESSION['establecimiento'])){ ?>
              <?php               $item = 'id_empresa';
              $idempresa = $_SESSION['establecimiento'];
              $botonEstablecimiento = EmpresasController::ctrMostrarNombreLocal($item, $idempresa);?>

              <a target="_blank" href="/visita/selector/<?php echo $botonEstablecimiento[0]['url'] ?>" class="btn btn-outline-warning">Usted se encuentra en el establecimiento <strong class="text-uppercase"><?php echo $botonEstablecimiento[0]['nombre_fantasia']; ?></strong> y puede ver su pagina con este <strong class="text-uppercase">aqui</strong></a>
            <?php } else { ?>
              <button class="btn btn-block btn-danger"><i class="fas fa-hand-point-left"></i> Debes seleccionar una de las empresas registradas de tu usuario para continuar</button>
            <?php } ?>
        </div>
      </div>
    </form>
  </nav>