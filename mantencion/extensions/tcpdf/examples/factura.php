<?php
require_once '../../../controller/ventas.controller.php';
require_once '../../../model/ventas.model.php';

require_once '../../../controller/clientes.controller.php';
require_once '../../../model/clientes.model.php';

require_once '../../../controller/usuario.controller.php';
require_once '../../../model/usuarios.model.php';

require_once '../../../controller/productos.controller.php';
require_once '../../../model/productos.model.php';

class imprimirFactura {
public $codigo;
public function traerImpresionFactura(){
//traer venta
$itemVenta = 'codigo';
$valorVenta = $this->codigo;

$respuestaVenta  = VentasController::ctrMostrarVentas($itemVenta, $valorVenta);

$date = new DateTime($respuestaVenta['fecha']);
$fecha = $date->format('d/m/Y');
$productos = json_decode($respuestaVenta['productos'], true);
$neto = '$ '.number_format($respuestaVenta['neto'],0,',','.');
$impuesto = '$ '.number_format($respuestaVenta['impuesto'],0,',','.');
$total = '$ '.number_format($respuestaVenta['total'],0,',','.');


//informacion cliente
$itemCliente = 'id';
$valorCliente = $respuestaVenta['id_cliente'];
$respuestaCliente = ClientesController::ctrMostrarClientes($itemCliente, $valorCliente);


//informacion vendedor
$itemVendedor ='id';
$valorVendedor = $respuestaVenta['id_vendedor'];
$respuestaVendedor = UsuarioController::ctrMostrarUsuarios($itemVendedor, $valorVendedor);


//inicio pdf
require_once('tcpdf_include.php');
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
$pdf->startPageGroup();
$pdf->AddPage();

$bloque1 = <<<EOF
<table>
	<tr>
		<td style="width: 150px;"><img src="images/131757976_100248185322923_8529490950190202310_n.jpg" alt=""></td>
		<td style="background-color: white; width: 140px;">
			<div style="font-size: 8.5px; text-align: right; line-height: 15px;">
				<br>
				RUT: 77.094.028-1
				<br>
				Direccion: O Higgins # 717
			</div>
		</td>
		<td style="background-color: white; width: 140px;`">
			<div style="font-size: 8.5px; text-align: right; line-height: 15px;">
				<br>
				Telefono: +56 9 3446 5841
				<br>
				miastore@miapatagonia.cl
			</div>
		</td>
		<td style="width: 110px; background-color: white; text-align: center; color: red;">
			<div style="text-align: center; line-height: 15px;">
				<br><strong>COMPRA N.</strong>
				<br><strong>$valorVenta</strong>
			</div>
		</td>
	</tr>
</table>
EOF;


$bloque2 = <<<EOF
<br><br>
<table style="font-size: 10px; padding: 5px 10px;">
	<tr>
		<td style="border: 1px solid #666; background-color: white; width: 390px;">
			Cliente: $respuestaCliente[nombre]
		</td>
		<td style="border: 1px solid #666; background-color: white; width: 150px;">
			Fecha: $fecha
		</td>
	</tr>
	<tr>
		<td style="border: 1px solid #666; background-color: white; width: 540PX;">
			Vendedor: $respuestaVendedor[nombre]
		</td>
	</tr>
</table>
EOF;


$bloque3 = <<<EOF
	<br><br>
	<table style="font-size:12px; padding:5px 10px:">
		<tr>
			<th style="border:1px solid #666; background-color: white; width: 260px; text-align:center;">Producto</th>
			<th style="border:1px solid #666; background-color: white; width: 80px; text-align:center;">Cantidad</th>
			<th style="border:1px solid #666; background-color: white; width: 100px; text-align:center;">Valor Unitario</th>
			<th style="border:1px solid #666; background-color: white; width: 100px; text-align:center;">Valor Total</th>
		</tr>
	</table>
EOF;

$pdf->writeHTML($bloque1, false,false,false,false,'');
$pdf->writeHTML($bloque2, false,false,false,false,'');
$pdf->writeHTML($bloque3, false,false,false,false,'');

foreach ($productos as $key => $item) {
$itemProducto = 'descripcion';
$valorProducto = $item['descripcion'];
$orden = null;
$respuestaProducto = ProductosController::ctrMostrarProductos($itemProducto, $valorProducto, $orden);
$valorUnitario = '$ '.number_format($respuestaProducto['precio_venta'],0,',','.');
$precioTotal = '$ '.number_format($item['total'],0,',','.');
$bloque4 = <<<EOF
	<table style="font-size:10px; padding:5px 10px:">
		<tr>
			<td style="border:1px solid #666; color:#333; background-color: white; width: 260px; text-align:center;">$item[descripcion]</td>
			<td style="border:1px solid #666; color:#333; background-color: white; width: 80px; text-align:center;">$item[cantidad]</td>
			<td style="border:1px solid #666; color:#333; background-color: white; width: 100px; text-align:center;">$valorUnitario</td>
			<td style="border:1px solid #666; color:#333; background-color: white; width: 100px; text-align:center;">$precioTotal</td>
		</tr>
	</table>
EOF;
$pdf->writeHTML($bloque4, false,false,false,false,'');
}

$bloque5 = <<<EOF
	<table style="font-size:10px; padding:5px 10px:">
		<tr>
			<td style="background-color: white; width: 340px; text-align:center;"></td>
			<td style="border-bottom:1px solid #666; background-color: white; width: 100px; text-align:center;"></td>
			<td style="border-bottom:1px solid #666; color:#333; background-color: white; width: 100px; text-align:center;"></td>
		</tr>
		<tr>
			<td style="border-right:1px solid #666; color:#333; background-color: white; width: 340px; text-align:center;"></td>
			<td style="border:1px solid #666; background-color: white; width: 100px; text-align:center;">Neto:</td>
			<td style="border:1px solid #666; background-color: white; width: 100px; text-align:center;">$neto</td>
		</tr>
		<tr>
			<td style="border-right:1px solid #666; color:#333; background-color: white; width: 340px; text-align:center;"></td>
			<td style="border:1px solid #666; background-color: white; width: 100px; text-align:center;">IVA:</td>
			<td style="border:1px solid #666; background-color: white; width: 100px; text-align:center;">$impuesto</td>
		</tr>
		<tr>
			<td style="border-right:1px solid #666; color:#333; background-color: white; width: 340px; text-align:center;"></td>
			<td style="border:1px solid #666; background-color: white; width: 100px; text-align:center;">Total Venta:</td>
			<td style="border:1px solid #666; background-color: white; width: 100px; text-align:center;">$total</td>
		</tr>
	</table>
EOF;
$pdf->writeHTML($bloque5, false,false,false,false,'');

//salida del archivo
$pdf->Output('factura.pdf');
}
}
$factura = new imprimirFactura();
$factura->codigo = $_GET['codigo'];
$factura->traerImpresionFactura();

?>