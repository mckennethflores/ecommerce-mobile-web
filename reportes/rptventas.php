<?php
//Activamos el almacenamiento en el buffer
/* ob_start();
if (strlen(session_id()) < 1) 
  session_start(); */

//Inlcuímos a la clase PDF_MC_Table
require('PDF_MC_Table.php');
 
//Instanciamos la clase para generar el documento pdf
$pdf=new PDF_MC_Table();
 
//Agregamos la primera página al documento pdf
$pdf->AddPage();
 
//Seteamos el inicio del margen superior en 25 pixeles 
$y_axis_initial = 25;
 
//Seteamos el tipo de letra y creamos el título de la página. No es un encabezado no se repetirá
$pdf->SetFont('Arial','B',12);

$pdf->Cell(30,6,'',0,0,'C');
$pdf->Cell(140,6,'REPORTE DE VENTAS REALIZADAS APLICATIVO MOVIL - 2020',1,0,'C'); 
$pdf->Ln(10);
 
//Creamos las celdas para los títulos de cada columna y le asignamos un fondo gris y el tipo de letra
$pdf->SetFillColor(232,232,232); 
$pdf->SetFont('Arial','B',10);
$pdf->Cell(21,6,'Codigo',1,0,'C',1); 
$pdf->Cell(48,6,'Cliente',1,0,'C',1);
$pdf->Cell(27,6,'Celular',1,0,'C',1);
$pdf->Cell(35,6,'Fecha',1,0,'C',1);
$pdf->Cell(20,6,'Estado',1,0,'C',1);
$pdf->Cell(20,6,'Total',1,0,'C',1);
 
$pdf->Ln(10);
//Comenzamos a crear las filas de los registros según la consulta mysql
require_once "../modelos/Pedidos.php";
$ordersTerminated = new Pedidos();

$rspta = $ordersTerminated->listarpedidosgeneralSuccessful();

//Table with rows and columns
$pdf->SetWidths(array(21,48,27,35,20,20));

$suma = 0;
$contador = 0;
while($reg= $rspta->fetch_object())
{
    $codigopedido = $reg->codigopedido;
    $nomusuario = $reg->nomusuario;
    $telusuario = $reg->telusuario;
    $fechapedido = $reg->fechapedido;
    $estado = $reg->estado;
    $total = $reg->total;
 	
 	$pdf->SetFont('Arial','',10);
    $pdf->Row(array($codigopedido,utf8_decode($nomusuario),utf8_decode($telusuario),$fechapedido,$estado,'S/ '.$total));

    $suma = $suma+$total;
    $contador++;

}
 
$pdf->Row(array('Nro ped: '.$contador,'','','','Total: ','S/ '.$suma));
//Mostramos el documento pdf
$pdf->Output();

?>
<?php
ob_end_flush();
?>