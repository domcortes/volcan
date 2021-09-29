<?php
setlocale(LC_ALL,"es_ES");
$usuarioInCharge = $_GET['idUsuario'];
$correoElectronico=$_GET['correoElectronico'];
require_once('fpdf.php');
require_once("../panel/php/clases/Conexion.php");
require_once("../panel/php/clases/crud.php");

$obj = new metodos();
$sql = "SELECT * from usuarios where idusuario=$usuarioInCharge and correoElectronico=$correoElectronico";
$usuarios = $obj->mostrarDatos($sql);
foreach ($usuarios as $usuario) {
    $originalDate = $usuario['fechaContrato'];
    $newDate = date("d-m-Y", strtotime($originalDate));
    $encabezado = "     En Puerto Natales, con fecha ".$newDate.", entre ".$usuario['nombreMainEmpresa'].", rut ".$usuario['rutMainEmpresa'].", representado por don(a) ".$usuario['nombreUsuario'].", rut ".$usuario['rutUsuario']." (desde ahora CLIENTE) y Daniel Oscar Miguel Cortés Cortés, rut 16.964.735-6 (desde ahora PROVEEDOR), se establece el siguiente contrato de prestación de servicios para el sistema de vitrina digital denominado SHOWCASE.
        \n";
}

$clausulas = "1. El costo de instalación de este servicio es de 150.000 + IVA, el cual tendrá su respectiva factura nacional afecta a impuestos para efectos contables.
        \n 2. El servicio de mantención tiene un valor de 12.000 CLP + IVA con su respectiva factura nacional afecta a impuestos para efectos contables.
        \n 3. La fecha de pago para los servicios de mantención mensual son los dias 05 de cada mes.
        \n 4. Se considera periodo de gracia un plazo de 5 dias a contar de la fecha de emisión del documento para realizar el pago.
        \n 5. El proveedor se reserva el derecho a dar de baja la plataforma de manera parcial o total ante el incumplimiento de pagos indicados en los puntos 2, 3, 4 del presente contrato.
        \n 6. Para la validación del contrato anexo, se adjunta como firma el ROL de Impuestos Internos y Cédula del Representante Legal
        \n 7. El presente contrato queda sin efecto en caso de que el cliente lo solicite con 30 días de anticipacion, cancelando la membresía del mes correspondiente.
        \n 8. El PROVEEDOR se reserva el derecho para utilizar el nombre del local asociado para fines promocionales de la aplicación contratada.
        \n 9. Ambas partes acuerdan total confidencialidad en materia de precios, productos y promociones.
        \n 10. El uso no autorizado o indebidos por parte del cliente, quedan sujetos a la ley 17.336 referente a Propiedad Intelectual, articulo nº 1 y 3.
        \n 11. Se prohíbe estrictamente la copia no autorizada de este software en forma parcial o total.
        \n 12. El PROVEEDOR se compromete a mantener accesos e información comercial NO PUBLICA de manera confidencial.
        \n 13. Se entiende como información NO PUBLICA todo lo que no se exponga en las URL de cada página.
        \n 14. El presente contrato tiene validez para los siguientes locales comerciales:";

$contrato = $encabezado.$clausulas;

$obj = new metodos();
$sql = "SELECT * from usuarios where idusuario=$usuarioInCharge";
$usuarios = $obj->mostrarDatos($sql);
foreach ($usuarios as $usuario) {
    $firmas = "\nFirma para el presente contrato:
                \n\n\n\n\nDaniel Cortés - 16.964.735-6
                \n\n\n\n\n".$usuario['nombreUsuario']." - ".$usuario['rutUsuario'];
}

class PDF extends FPDF
{
// Cabecera de página
function Header()
{
    // Logo
    $this->Image('../img/logos/showcase.png',10,8,16);
    // Arial bold 15
    $this->SetFont('Arial','B',15);
    // Movernos a la derecha
    $this->Cell(80);
    // Título
    $this->Cell(30,10,utf8_decode('Contrato de prestación de servicios'),0,0,'C');
    // Salto de línea
    $this->Ln(20);
}

// Pie de página
function Footer()
{
    // Posición: a 1,5 cm del final
    $this->SetY(-15);
    // Arial italic 8
    $this->SetFont('Arial','I',8);
    // Número de página
    $this->Cell(0,10,utf8_decode('Página ').$this->PageNo().'/{nb}',0,0,'C');
}
}

function SetCol($col)
{
    // Establecer la posición de una columna dada
    $this->col = $col;
    $x = 10+$col*65;
    $this->SetLeftMargin($x);
    $this->SetX($x);
}
// Creación del objeto de la clase heredada
$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Arial','',10);
$pdf->MultiCell(0,7,utf8_decode($contrato));

$obj = new metodos();
$sql = "SELECT usuario_empresa.id, usuario_empresa.id_empresa, usuario_empresa.id_usuario, empresas.id_empresa, empresas.nombre_fantasia, empresas.direccion_empresa, empresas.url
            from usuario_empresa
            inner join empresas
            on usuario_empresa.id_empresa = empresas.id_empresa
            where usuario_empresa.id_usuario=$usuarioInCharge";

$empresas = $obj->mostrarDatos($sql);
foreach ($empresas as $empresa) {
    $pdf->Cell(0,10,utf8_decode(">> ".$empresa['nombre_fantasia']),0,1);
    $pdf->Cell(0,10,utf8_decode("     Dirección: ".$empresa['direccion_empresa'].", con URL registrada: 'https://www.showcaseapp.net".$empresa['url']."'"),0,1);
}

$pdf->MultiCell(0,7,utf8_decode($firmas));
$pdf->Output('i',utf8_decode('Contrato prestación de servicios'));
?>