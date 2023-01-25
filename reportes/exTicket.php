<?php
//Activamos el almacenamiento en el buffer
ob_start();
session_start();
?>
<html>
<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<link href="../public/css/ticket.css" rel="stylesheet" type="text/css">
</head>
<body onload="window.print();"> 
<?php

//Incluímos la clase Venta
require_once "../modelos/Pedidos.php";
//Instanaciamos a la clase con el objeto venta
$pedidos = new Pedidos();
//En el objeto $rspta Obtenemos los valores devueltos del método ventacabecera del modelo
$rspta = $pedidos->pedidocabecera($_GET["id"]);
 
//Recorremos todos los valores obtenidos
$reg = $rspta->fetch_object();
$rsptau = $pedidos-> selectDireccion($reg->idusuario);

$reg2 = $rsptau->fetch_object();

//Establecemos los datos de la empresa
$empresa = NOMBRE_EMPRESA;
$documento = RUC_EMPRESA;
$direccion = DIRECCION_EMPRESA;
$telefono = CELULAR1;
$email = EMAIL;

?>
<div class="zona_impresion">
<!-- codigo imprimir -->
<br>
<table border="0" align="center" width="500px">
    <tr>
    <td colspan="2" align="center">
        <!-- Mostramos los datos de la empresa en el documento HTML -->
        .::<strong> <?php echo $empresa;?></strong>::.<br>

        <?php echo $documento; ?><br>
        <?php echo $direccion .' - '.$telefono; ?><br>
        </td>
    </tr>

    <tr>
    <td colspan="2">Dirección: <?php 
    
    echo  $reg2->nomdepa ? $reg2->nomdepa : "";
echo " / ";
echo   $reg2->distrito ? $reg2->distrito : "";
    echo ", ";
    echo  $reg2->nomzona ? $reg2->nomzona : "";
    echo ", ";
    echo  $reg2->direccionusuario ? $reg2->direccionusuario : "";

 ?></td>
    </tr>
    <tr>
        <!-- Mostramos los datos del cliente en el documento HTML -->
        <td>Cliente: <?php echo $reg->cliente; ?></td>
        <td>Celular cliente: <?php echo $reg->telusuario; ?></td>
       
    </tr>

    <tr>
      
        <td><?php echo "DNI: ".$reg->num_documento; ?></td>
        <td>Tip. env.:  <?php echo $reg->formadeentrega; ?></td>
    </tr>
    <tr>
        <td>Codigo Pedido: <?php echo "PTB-000".$reg->idpedido; ?></td>
        <td>Metodo de Pago: <?php echo $reg->metodopago; ?></td>
    </tr>  
    <tr>
    <td colspan="2">Email: <?php echo $reg->emailusuario; ?></td>
    </tr>
</table>
<br>
<!-- Mostramos los detalles de la venta en el documento HTML -->
<table border="0" align="center" width="400px">
    <tr>
        <td>CANT.</td>
        <td >CODIGO</td>
        <td width="1200px" >DESCRIPCIÓN</td>
       
        <td align="right">IMPORTE</td>
    </tr>
    <tr>
      <td colspan="4">===============================================================</td>
    </tr>
    <?php
    $rsptad = $pedidos->pedidodetalle($_GET["id"]);
    $cantidad=0;
    while ($regd = $rsptad->fetch_object()) {
        echo "<tr>";
        echo "<td>".$regd->cantidad."</td>";
        echo "<td>".$regd->codigobarra."</td>";
        echo "<td>".$regd->articulo;
        
        echo "<td align='right'>S/ ".number_format($regd->subtotal, 2, ',', ' ')."</td>";
        echo "</tr>";
        $cantidad+=$regd->cantidad;
    }
    ?>
      <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td align="right"><b>Delivery:</b></td>
    <td align="right"><b>S/<?php  echo $reg->delivery   ?></b></td>
    </tr>
    <!-- Mostramos los totales de la venta en el documento HTML -->
    <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td align="right"><b>TOTAL:</b></td>
    <td align="right"><b>S/  <?php echo $reg->total;  ?></b></td>
    </tr>
    <tr>
      <td colspan="2">Total productos: <?php echo $cantidad; ?></td>
      <td colspan="">Paga con: S/ <?php echo $reg->pagacon;  ?> </td>
      <?php $vuelto =  $reg->pagacon - $reg->total ?>
      <?php
      if($vuelto>0){
?>
<td colspan="">Vuelto: S/ <?php echo $vuelto; ?> </td>
<?php
      }?>
      
    </tr>
    <tr>
      <td colspan="3">&nbsp;</td>
    </tr>      
    <tr>
      <td colspan="3" align="center">¡Gracias por su compra!</td>
    </tr>
    <tr>
      <td colspan="3" align="center">Tu Bazar</td>
    </tr>
    <tr>
      <td colspan="3" align="center">Lima - Perú</td>
    </tr>
    <tr>
      <td colspan="3" align="center">Fecha de impresion: <?php echo date("d-m-Y H:i:s"); ?></td>
    </tr>
  
</table>
<br>
</div>
<p>&nbsp;</p>

</body>
</html>
<?php 
ob_end_flush();
?>