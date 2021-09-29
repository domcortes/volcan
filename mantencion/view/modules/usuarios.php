<?php
  if ($_SESSION['nivelAcceso']!='superadmin') {
    echo '<script>
            swal.fire({
              icon:"error",
              title:"Acceso denegado",
              text:"No se puede acceder a este modulo con tu perfil de acceso",
              showConfirmButton:true,
              confirmButtonText:"OK",
              closeOnConfirm:false
            }).then((result)=>{
              if(result.value){
                window.location = "home";
              }
            });
          </script>';
  }
?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Administrar <?php echo ucfirst($_GET['ruta']) ?></h1>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <section class="content">
      <div class="card">
        <div class="card-header">
          <button class="btn btn-primary" data-toggle='modal' data-target='#modalAgregarUsuario'>Agregar Usuario</button>
        </div>
        <div class="card-body">
          <table id="example1" class="table table-bordered table-striped">
            <thead>
              <tr>
                <th>#</th>
                <th>Nombre</th>
                <th>Usuario</th>
                <th>Perfil</th>
                <th>Estado</th>
                <th>Acciones</th>
              </tr>
              </thead>
              <tbody>
                <?php
                  $item = null;
                  $valor = null;
                  $usuarios = UsuarioController::ctrMostrarUsuarios($item,$valor);
                  foreach ($usuarios as $key => $usuario) {
                ?>
                    <tr>
                      <td><?php echo $key+1;?></td>
                      <td><?php echo $usuario['nombreUsuario'];?></td>
                      <td><?php echo $usuario['usuarioAcceso'];?></td>
                      <td><?php echo $usuario['nivelAcceso'];?></td>
                      <td>
                        <?php if ($usuario['activo']!=0){ ?>
                          <button class="btn btn-success btn-block btnActivar" idUsuario="<?php echo $usuario['idusuario'];?>" estadoUsuario="0">Activado</button>
                        <?php } else { ?>
                          <button class="btn btn-danger btn-block btnActivar" idUsuario="<?php echo $usuario['idusuario'];?>" estadoUsuario="1">Desactivado</button>
                        <?php } ?>
                      </td>
                      <td>
                        <div class="btn-group btn-block">
                          <button class="btn btn-info btnEditarUsuario" idUsuario="<?php echo $usuario['idusuario'];?>" data-toggle="modal" data-target="#modalEditarUsuario"><i class="fas fa-pencil-ruler"></i></button>
                          <?php if ($_SESSION['idusuario']=='1'): ?>
                            <button class="btn btn-danger btnEliminarUsuario" idUsuario="<?php echo $usuario['idusuario'];?>"><i class="fas fa-user-minus"></i></button>
                          <?php endif ?>
                        </div>
                      </td>
                    </tr>
                  <?php } ?>
              </tbody>
              <tfoot>
              <tr>
                <th style="width: 10px">#</th>
                <th>Nombre</th>
                <th>Usuario</th>
                <th>Perfil</th>
                <th>Estado</th>
                <th>Acciones</th>
              </tr>
              </tfoot>
            </table>
        </div>
      </div>
    </section>
  </div>
<!-- Modal Agregar Usuario-->
<div class="modal fade" id="modalAgregarUsuario" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <form method="post" role='form'>
        <div class="modal-header" style="background: #343a40; color: white;">
          <h5 class="modal-title">Agregar Usuario</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <div class="form-row">
            <div class="col-md-12 mb-3">
              <label for="nuevoUsuario">Rut</label>
              <div class="input-group">
                <div class="input-group-prepend">
                  <span class="input-group-text" id="inputGroupPrepend2"><i class="fas fa-user"></i></span>
                </div>
                <input type="text" class="form-control" id="rut" name="rut" placeholder="Rut del usuario" aria-describedby="inputGroupPrepend2" required>
              </div>
            </div>
          </div>
          <div class="form-row">
            <div class="col-md-12 mb-3">
              <label for="nuevoUsuario">Nombre completo</label>
              <div class="input-group">
                <div class="input-group-prepend">
                  <span class="input-group-text" id="inputGroupPrepend2"><i class="fas fa-user"></i></span>
                </div>
                <input type="text" class="form-control" id="nombrenuevousuario" name="nombrenuevousuario" placeholder="Nombre completo del usuario" aria-describedby="inputGroupPrepend2" required>
              </div>
            </div>
          </div>
          <div class="form-row">
            <div class="col-md-12 mb-3">
              <label for="nuevoUsuario">Usuario</label>
              <div class="input-group">
                <div class="input-group-prepend">
                  <span class="input-group-text" id="inputGroupPrepend2"><i class="fas fa-user"></i></span>
                </div>
                <input type="text" class="form-control" id="nuevoUsuario" name="nuevoUsuario" placeholder="Ej.: nuevo.usuario" aria-describedby="inputGroupPrepend2" required>
              </div>
            </div>
          </div>
          <div class="form-row">
            <div class="col-md-12 mb-3">
              <label for="nivel">Perfil de usuario</label>
              <div class="input-group">
                <div class="input-group-prepend">
                  <span class="input-group-text" id="inputGroupPrepend2"><i class="fas fa-users"></i></span>
                </div>
                <select name="nivel" class="form-control input-group-lg">
                  <option value="">Seleccione el perfil</option>
                  <option value="superadmin">Super Administrador</option>
                  <option value="administrador">Administrador</option>
                  <option value="meson">Meson</option>
                  <option value="frontDesk">Recepcion</option>
                </select>
              </div>
            </div>
          </div>
          <div class="form-row">
            <div class="col-md-12 mb-3">
              <label for="correo">Correo Electronico</label>
              <div class="input-group">
                <div class="input-group-prepend">
                  <span class="input-group-text" id="inputGroupPrepend2"><i class="fas fa-images"></i></span>
                </div>
                <input type="text" class="form-control" name="correo" placeholder="Ingresa una url para tu foto de perfil" aria-describedby="inputGroupPrepend2">
              </div>
            </div>
          </div>
           <div class="form-row">
            <div class="col-md-12 mb-3">
              <label for="nuevoPassword">Contraseña</label>
              <div class="input-group">
                <div class="input-group-prepend">
                  <span class="input-group-text" id="inputGroupPrepend2"><i class="fas fa-lock"></i></span>
                </div>
                <input type="password" class="form-control" name="contrasenna" placeholder="Ingrese contraseña" aria-describedby="inputGroupPrepend2" required>
              </div>
            </div>
          </div>
          <div class="form-row">
            <div class="col-md-12 mb-3">
              <label for="activo">Estado Usuario</label>
              <div class="input-group">
                <div class="input-group-prepend">
                  <span class="input-group-text" id="inputGroupPrepend2"><i class="fas fa-users"></i></span>
                </div>
                <select name="activo" class="form-control input-group-lg">
                  <option value="">Seleccione Estado</option>
                  <option value="1">Activo</option>
                  <option value="0">Inactivo</option>
                </select>
              </div>
            </div>
          </div>
          <div class="form-row">

          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary pull-0" data-dismiss="modal">Cerrar</button>
          <button type="submit" class="btn btn-primary">Agregar</button>
        </div>
          <?php
            $crearUsuario = new UsuarioController();
            $crearUsuario->ctrCrearUsuario();
          ?>
      </form>
    </div>
  </div>
</div>


<!-- Modal editar Usuario-->
<div class="modal fade" id="modalEditarUsuario" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <form method="post" role='form'>
        <div class="modal-header" style="background: #343a40; color: white;">
          <h5 class="modal-title">Editando a Usuario</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="form-row">
            <div class="col-md-12 mb-3">
              <label for="editarNombre">Nombre del Usuario</label>
              <input type="text" class="form-control" id="editarNombre" value="" required name="editarNombre">
            </div>
          </div>
          <div class="form-row">
            <div class="col-md-12 mb-3">
              <label for="editarUsuario">Usuario</label>
              <div class="input-group">
                <div class="input-group-prepend">
                  <span class="input-group-text" id="inputGroupPrepend2"><i class="fas fa-user"></i></span>
                </div>
                <input type="text" class="form-control" id="editarUsuario" name="editarUsuario" value="" aria-describedby="inputGroupPrepend2" readonly>
              </div>
            </div>
          </div>
          <div class="form-row">
            <div class="col-md-12 mb-3">
              <label for="editarPassword">Contraseña</label>
              <div class="input-group">
                <div class="input-group-prepend">
                  <span class="input-group-text" id="inputGroupPrepend2"><i class="fas fa-lock"></i></span>
                </div>
                <input type="password" class="form-control" name="editarPassword" placeholder="Modifique contraseña" aria-describedby="inputGroupPrepend2">
                <input type="hidden" id="passwordActual" name="passwordActual">
              </div>
            </div>
          </div>
          <div class="form-row">
            <div class="col-md-12 mb-3">
              <label for="editarPerfil">Perfil de usuario</label>
              <div class="input-group">
                <div class="input-group-prepend">
                  <span class="input-group-text" id="inputGroupPrepend2"><i class="fas fa-users"></i></span>
                </div>
                <select name="editarPerfil" class="form-control input-group-lg">
                  <option value="" id="editarPerfil">Seleccione el perfil</option>
                  <option value="superadmin">Super Administrador</option>
                  <option value="administrador">Administrador</option>
                  <option value="meson">Meson</option>
                  <option value="frontDesk">Recepcion</option>
                </select>
              </div>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary pull-0" data-dismiss="modal">Cerrar</button>
          <button type="submit" class="btn btn-primary">Guardar cambios</button>
        </div>
          <?php
            $editarUsuario = new UsuarioController();
            $editarUsuario->ctrEditarUsuario();
          ?>
      </form>
    </div>
  </div>
</div>

<?php
  $borrarUsuario = new UsuarioController();
  $borrarUsuario->ctrBorrarUsuario();
?>