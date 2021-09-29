<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>BIENVENIDO <?php echo strtoupper($_SESSION['nombreUsuario']); ?></h1>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <?php if (isset($_SESSION['establecimiento'])) { ?>
        <!-- Default box -->
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">RESUMEN DE CATEGORIAS Y PRODUCTOS</h3>
               <div class="card-tools">
                <button type="button" class="btn bg-warning btn-sm" data-card-widget="collapse">
                  <i class="fas fa-minus"></i>
                </button>
                <button type="button" class="btn bg-danger btn-sm" data-card-widget="remove">
                  <i class="fas fa-times"></i>
                </button>
              </div>
            </div>
            <div class="card-body">
              <!-- Small boxes (Stat box) -->
              <div class="row">
                  <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-success">
                      <div class="inner">
                        <h3>CATEGORIAS</h3>
                        <p>Creadas: <strong><span class="badge-danger badge">informacion en proceso</span></strong></p>
                      </div>
                      <div class="icon">
                        <i class="ion ion-bag"></i>
                      </div>
                      <a href="#" class="small-box-footer">Ver categorias <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                  </div>
                  <!-- ./col -->
                  <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-warning">
                      <div class="inner">
                        <h3>PRODUCTOS</h3>
                        <p>Creadas: <strong><span class="badge-danger badge">informacion en proceso</span></strong></p>
                      </div>
                      <div class="icon">
                        <i class="ion ion-person-add"></i>
                      </div>
                      <a href="#" class="small-box-footer">Administrar productos <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                  </div>
                  <!-- ./col -->
                  <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-info">
                      <div class="inner">
                        <h3>Transbank Plugin</h3>
                        <p>Contrata el servicio con nosotros</p>
                      </div>
                      <div class="icon">
                        <i class="ion ion-bag"></i>
                      </div>
                      <a href="https://wa.me/56953414450" class="small-box-footer">Hablar a nuestro soporte <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                  </div>
                  <!-- ./col -->
              </div>
              <!-- /.row -->
            </div>
            <!-- /.card-body -->
            <div class="card-footer">

            </div>
            <!-- /.card-footer-->
          </div>
        <!-- /.card -->
      <?php } else { ?>
        <div class="alert alert-danger text-center text-uppercase" role="alert">
          Debes seleccionar una empresa para poder continuar. Por favor verifica en el selector en la parte superior izquierda
        </div>
      <?php } ?>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->