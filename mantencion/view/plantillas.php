<?php session_start(); ?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Showcase</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="">
  <link rel="icon" href="view/img/plantilla/icono-negro.png">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="view/plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="view/dist/css/adminlte.css">
  <!-- jQuery -->
  <script src="view/plugins/jquery/jquery.min.js"></script>
  <!-- Bootstrap 4 -->
  <script src="view/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- AdminLTE App -->
  <script src="view/dist/js/adminlte.min.js"></script>
  <!-- AdminLTE for demo purposes -->
  <script src="view/dist/js/demo.js"></script>
  <!-- DataTables -->
  <link rel="stylesheet" href="view/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="view/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="view/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
  <script src="view/plugins/datatables/jquery.dataTables.min.js"></script>
  <script src="view/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
  <script src="view/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
  <script src="view/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
  <script src="view/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
  <script src="view/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
  <script src="view/plugins/jszip/jszip.min.js"></script>
  <script src="view/plugins/pdfmake/pdfmake.min.js"></script>
  <script src="view/plugins/pdfmake/vfs_fonts.js"></script>
  <script src="view/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
  <script src="view/plugins/datatables-buttons/js/buttons.print.min.js"></script>
  <script src="view/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
  <!--sweetalert-->
  <link rel="stylesheet" href="view/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">
  <script src="view/plugins/sweetalert2/sweetalert2.min.js"></script>
  <!-- Bootstrap Switch -->
  <link href="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/css/bootstrap4-toggle.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/js/bootstrap4-toggle.min.js"></script>
  <!-- InputMask -->
  <script src="view/plugins/moment/moment.min.js"></script>
  <script src="view/plugins/inputmask/jquery.inputmask.min.js"></script>
  <!-- jquery number -->
  <script src="view/plugins/jqueryNumber/jquerynumber.min.js"></script>
    <!-- Toastr -->
  <link rel="stylesheet" href="view/plugins/toastr/toastr.min.css">
  <script src="view/plugins/toastr/toastr.min.js"></script>
    <!-- daterange picker -->
  <link rel="stylesheet" href="view/plugins/daterangepicker/daterangepicker.css">
  <script src="view/plugins/daterangepicker/daterangepicker.js"></script>
    <!-- ChartJS -->
  <script src="view/plugins/chart.js/Chart.min.js"></script>
    <!-- jQuery Knob Chart -->
  <script src="view/plugins/jquery-knob/jquery.knob.min.js"></script>
    <!-- CodeMirror -->
  <link rel="stylesheet" href="view/plugins/codemirror/codemirror.css">
  <link rel="stylesheet" href="view/plugins/codemirror/theme/monokai.css">
</head>
<body class="hold-transition sidebar-collapse sidebar-mini <?php if(!isset($_SESSION['iniciarSesion'])){echo 'login-page';} ?>" onload="mueveReloj()">
<!-- Site wrapper -->
<?php
    if (isset($_SESSION['iniciarSesion']) && $_SESSION['iniciarSesion']=='ok') {
      echo '<div class="wrapper">';
      include "modules/mainHeader.php";
      include "modules/menu.php";
      if (isset($_GET['ruta'])) {
        if ($_GET['ruta']=='home' ||
            $_GET['ruta']=='usuarios' ||
            $_GET['ruta']=='categorias' ||
            $_GET['ruta']=='agregar-categoria' ||
            $_GET['ruta']=='agregar-producto' ||
            $_GET['ruta']=='productos' ||
            $_GET['ruta']=='clientes' ||
            $_GET['ruta']=='ventas-click' ||
            $_GET['ruta']=='crear-venta' ||
            $_GET['ruta']=='editar-venta' ||
            $_GET['ruta']=='reporte-ventas' ||
            $_GET['ruta']=='modificar-libro-contable' ||
            $_GET['ruta']=='reporte-sucursal' ||
            $_GET['ruta']=='documentos-pendientes'||
            $_GET['ruta']=='venta-con-oc'||
            $_GET['ruta']=='cambiar-folio'||
            $_GET['ruta']=='cheques-cartera'||
            $_GET['ruta']=='facebook-messenger'||
            $_GET['ruta']=='transbank-webpay-plus' ||
            $_GET['ruta']=='mapa-establecimiento' ||
            $_GET['ruta']=='contacto' ||
            $_GET['ruta']=='crear-empresa' ||
            $_GET['ruta']=='lista-empresas' ||
            $_GET['ruta']=='usuario-empresa' ||
            $_GET['ruta']=='cobro-mesa' ||
            $_GET['ruta']=='listado-cobros-mesa' ||
            $_GET['ruta']=='salir') {
              include "modules/".$_GET['ruta'].".php";
        } else {
          include "modules/404.php";
        }
      }
      include "modules/footer.php";
      echo '<div>';
    } else {
      include "modules/login.php";
    }
  ?>

</div>
<!-- ./wrapper -->
<?php if (isset($_SESSION['iniciarSesion']) && $_SESSION['iniciarSesion']=='ok'): ?>
  <script src="view/js/plantilla.js"></script>
  <script src="view/js/usuarios.js"></script>
  <script src="view/js/categorias.js"></script>
  <script src="view/js/productos.js"></script>
  <script src="view/js/clientes.js"></script>
  <script src="view/js/ventas.js"></script>
  <script src="view/js/reportes.js"></script>
  <script src="view/js/contabilidad.js"></script>
  <script src="view/js/finanzas.js"></script>
  <script src="view/js/empresas.js"></script>
  <script src="view/js/contacto.js"></script>
  <script src="view/js/qr.js"></script>
  <?php if ($_GET['ruta']=='facebook-messenger' || $_GET['ruta']=='mapa-establecimiento'): ?>
    <script src="view/plugins/codemirror/codemirror.js"></script>
    <script src="view/plugins/codemirror/mode/css/css.js"></script>
    <script src="view/plugins/codemirror/mode/xml/xml.js"></script>
    <script src="view/plugins/codemirror/mode/htmlmixed/htmlmixed.js"></script>
  <?php endif ?>
  <?php if ($_GET['ruta']=='facebook-messenger'): ?>
    <script src="view/js/facebook-messenger.js"></script>
  <?php endif ?>
  <?php if ($_GET['ruta']=='mapa-establecimiento'): ?>
    <script src="view/js/mapa.js"></script>
  <?php endif ?>
  <?php
    if ($_GET['ruta']=='transbank-webpay-plus') {
      echo '<script src="view/plugins/bootstrap-switch/js/bootstrap-switch.min.js"></script>';
      echo '<script src="view/js/transbank.js"></script>';
    }
  ?>
  <!-- Load Facebook SDK for JavaScript -->

    <!-- Your Chat Plugin code -->
    <div class="fb-customerchat"
      attribution="setup_tool"
      page_id="529424941323817"
      theme_color="#6699cc"
      logged_in_greeting="Hola! por favor indicanos la empresa de donde nos contactas"
      logged_out_greeting="Hola! por favor indicanos la empresa de donde nos contactas">
    </div>
<?php endif ?>
<?php if (isset($_SESSION['iniciarSesion'])==false): ?>
  <!-- Load Facebook SDK for JavaScript -->
      <div id="fb-root"></div>

      <!-- Your Chat Plugin code -->
      <div class="fb-customerchat"
        attribution="setup_tool"
        page_id="1175745969193812"
        theme_color="#0A7CFF"
        logged_in_greeting="¡Hola! ¿Te interesa este producto? Contactanos!"
        logged_out_greeting="¡Hola! ¿Te interesa este producto? Contactanos!">
      </div>
<?php endif ?>
</body>
</html>
