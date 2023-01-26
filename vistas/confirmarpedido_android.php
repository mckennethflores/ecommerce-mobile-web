<?php
/* 	*********************************
		Funciones Android
    ********************************* */
ob_start();
session_start();
require_once "../modelos/CarritoProducto_Android.php";
require_once "../modelos/Tiendas.php";

/* Esta es la sesión que recupero de producto_android.php, de la sesion se llama idusuario_sinlogueo */
 //echo $IDUSUARIO = $_SESSION['idusuario_sinlogueo'];

 if(isset($_SESSION['idusuario_sinlogueo'])){
  $IDUSUARIO = $_SESSION['idusuario_sinlogueo'];
 }else{
  $_SESSION['idusuario_sinlogueo'] = round(microtime(true));
 }

 //$IDUSUARIO = $_SESSION['idusuario'];

/* idstore = Se utiliza para regresar atras y volver a ver la tienda seleccionada */
  $idstore= $_GET['idstore']; 
 
  $carritoproductoandroid = new CarritoProducto_Android();
  $tiendas = new Tiendas();

  $carritoproductoandroid->selectStoreFrom($IDUSUARIO);
  $carritoproductoandroid->selectStoreDestination($IDUSUARIO);
  //$iddestino = $carritoproductoandroid->getIdDestination($IDUSUARIO);

/*   Desactive estas sesiones porque ahora que la tienda no inicia con el login no lo necesito */
/*   $origen = $_SESSION['iddistrito_origen'];
  $destino = $_SESSION['iddistrito_destino'];
  $delivery = $_SESSION['delivery_destino']; */
  

/*   if($origen == $destino){
    $precio = "3.00";
    $precio_delivery = (int)$precio;
    if($destino=='24'){
      $precio = "0.00";
      $precio_delivery = (int)$precio;
    }
    if ($destino=='29'){
      $precio = "0.00";
      $precio_delivery = (int)$precio;
      
    }
  }else{
    $precio = "5.00";
    $precio_delivery = (int)$precio;
  } */

  
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title><?= NOMBRE_EMPRESA ?></title>
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <link rel="stylesheet" href="../public/css/bootstrap.min.css">
    <link rel="stylesheet" href="../public/css/font-awesome.css">
    <link rel="stylesheet" href="../public/css/AdminLTE.min.css">
    <link rel="stylesheet" href="../public/css/_all-skins.min.css">
    <link rel="apple-touch-icon" href="../public/img/apple-touch-icon.png">
    <link rel="shortcut icon" href="../public/img/favicon.ico">
    <link rel="stylesheet" href="../public/css/general.css">
    <link rel="stylesheet" type="text/css" href="../public/css/confirmarpedido_android.css">
  </head>
  <body>
 
<!-- ************ HEAD ************-->
                <div class="header-cont">
                  <div class="header flex-container">
                    <div class="flex-item"> 
                          <a  onclick="goBackFunction(<?php echo $idstore; ?>)">
                          <i class="fa fa-chevron-left" aria-hidden="true"></i> 
                          <span class="atras">ATRAS</span>
                          </a>
                    </div>
                    <div class="flex-item"> 
                    <?= NOMBRE_EMPRESA ?>
                    </div>
                   </div>
                </div>
                <div class="content">

                  <form name="formulario" id="formulario" method="POST">
                      <input name="idusuario" id="idusuario_input" type="hidden" value="<?php echo $IDUSUARIO; ?>">
                      <input name="idproducto" id="idproducto_input" type="hidden" value="">
                      <input name="idpaprotemp" id="idpaprotemp_input" type="hidden" value="">
                   
                      
<!--    Origen Destino -->
                     
<!--    Delivery      -->                                
                      <div class="totalProducts">
                        <p>Resumen de pedido</p>
                        <div class="totalProductsBorder">
                          <div class="resumenpedido-container">
                            <div class="resumenpedido-item">Sutotal</div>
                            <div class="resumenpedido-item ">S/ <span class="subtotal_span"></span></div>
                            <input type="hidden" id="subtotal_input" name="subtotal_input">  
                          </div>
                          <div class="resumenpedido-container2">
                            <div class="resumenpedido-item2">Precio por delivery</div>
                            <div class="resumenpedido-item2">S/ <span id="delivery_span">10.00
                            <?php // echo number_format($precio_delivery, 2, '.', ' ');?></span>
                            <input type="hidden" id="delivery_input"  name="delivery_input" value="10.00<?php //echo number_format($precio_delivery, 2, '.', ' ');?>">
                            <input type="hidden" id="valueHiddenDelivery" value="<?php // number_format($precio_delivery, 2, '.', ' ');?>">
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="totalapagar">
                        <div class="totalapagar-container">
                          <div class="totalapagar-item">Total a pagar</div>
                          <div class="totalapagar-item">S/ <span class="total_span"></span>
                            <input type="hidden" id="total_input" name="total_input" >
                        </div>
                        </div>
                      </div>
                      <span class="minimumOrder">Pedido minimo S/ 30.00</span>
                      <div class="metododepago ocultar">
                        <p>Método de pago</p>
                        <div class="metododepago-border">
                          <div class="metododepago-container">
                            <div class="metododepago-item">
                            <label for="pagoefectivo" id="efectivo_div" class="radio-label btnLogin label_contratar">PAGO EFECTIVO</label>
                              <input  required type="radio" id="pagoefectivo"  name="tipodepago" value="Pagoefectivo" class="radio" >
                              <div class="cancelacon_div ocultar">Seleccione Efectivo</div>
                              <select name="pagacon_cbo" class="form-control pagacon_cbo ocultar" id="pagacon_cbo" class="form-control" required>
                                <option value="0" disabled="disabled">Seleccione Efectivo</option>
                                <?php
                                  for($i = 5; $i<=200; $i++){
                                    echo '<option value="'.$i.'">'.$i.'</option>';
                                    $i = $i+4;
                                    }
                                ?>
                              </select>
                              <!-- <input type="tel" name="pagacon" id="pagacon" onkeyup="vuelto()" placeholder="S/" class="precioPagoEfectivo ocultar"> -->
                              <div class="vuelto_div ocultar">VUELTO: <span id="vuelto_span">S/ 00.00</span>
                              <input type="hidden" id="pagacon_input" name="pagacon_input" placeholder="PAGACON" >
                              <input type="hidden" id="vuelto_input" name="vuelto_input" placeholder="vuelto" >
                            </div>
                              <div class="sms_error ocultar">Ingresa un monto Mayor</div>
                            </div>
                            <div class="metododepago-item" >
                            <label for="tarjeta" class="radio-label btnLogin label_trabajo" id="tarjeta_div">TARJETA</label>
                              <input  required type="radio" id="tarjeta" name="tipodepago" value="Tarjeta" class="radio" checked="">
                            </div>
                          </div>
                        </div>
                      </div>
                      
<!-- Datos de facturación 1     -->     
                      <div class="metododepago ocultar">
                        <p>Datos de facturación</p>
                        <div class="metododepago-border">
                          <div class="metododepago-container">
                            <div class="metododepago-item">
                            <label for="datosfact1" class="radio-label btnLogin "  id="datosfact_label1">BOLETA</label>
                              <input  required type="radio" id="datosfact1"  name="metododepago" value="Boleta" class="radio" >
                            
                            </div>
                            <div class="metododepago-item" >
                           
                            <label for="datosfact2" class="radio-label btnLogin " id="datosfact_label2">FACTURA</label>
                              <input  required type="radio" id="datosfact2" name="metododepago" value="Factura" class="radio" checked="">                            
                            </div>
                          </div>
                              <!-- Formulario -->
                              <div class="container ocultar">
                                <div class="row">
                                <!-- Razon Social -->
                                  <div class="col-md-12">
                                    <div>
                                      <label for="razonsoc">Razon Social</label>
                                      <input type="text" class="form-control" name="razonsoc_input" id="razonsoc" placeholder="Razon Social">
                                      <div class="error razonsoc ocultar">
                                        Ingrese una dirección valida
                                      </div>
                                    </div>
                                  </div>
                                <!-- RUC -->
                                  <div class="col-md-12">
                                    <div>
                                      <label for="ruc">RUC</label>
                                      <input name="ruc_input" id="ruc" class="form-control"  placeholder="RUC" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" type = "number"  maxlength = "11"/>
                                      
                                      <div class="error ruc ocultar">
                                        Ingrese una dirección valida
                                      </div>
                                    </div>
                                  </div>
                                <!-- Dirección -->
                                  <div class="col-md-12">
                                    <div>
                                      <label for="direccion">Dirección</label>
                                      <input type="text" class="form-control" name="direccion_input" id="direccion" placeholder="Dirección">
                                      <div class="error direccion ocultar">
                                        Ingrese una dirección valida
                                      </div>
                                    </div>
                                  </div>

                                </div>
                              </div>                            
                        </div>
                      </div>       
<!-- Datos de facturación  2    -->
                          <div class="datosfacturacion ocultar">
                            <p>Datos de facturación</p>
                            <div class="datosfacturacion-border">
                            
                            </div>
                          </div>
                          <input type="hidden" id="recojoen" name="recojoen_input" placeholder="">
                    <div class="contenedor" id="contenedor">
<!--************************ PRODUCT ***************************************-->                 
                      <?php
                        $rspta=$carritoproductoandroid->listarprodtemp($IDUSUARIO);
                        $subTotal=0;
                      
                        while ($reg=$rspta->fetch_object()){
                          $precioporcantidad = $reg->cantidad*$reg->valorventa;
                          $subTotal = $subTotal + $precioporcantidad;
                      ?>
                        <div class="elemento" id="elemento-<?php echo $reg->idproducto; ?>">
                        
                              <a href="#" class="iconoRemoverItem" data="<?php echo $reg->idproducto; ?>"><img class="remover" src="../files/remover.png"  > </a>

                              <div class="imagenProducto"><a href=""><img width="100%" src="../files/productos/<?php echo $reg->imagen; ?>"></a></div>

                              <div class="nombreProducto"><?php echo $reg->nomproductocorto;  ?></div>

                              <div class="cantidad">
                                Cant:  <span ><?php echo $reg->cantidad;  ?> </span> |
                                Precio: <span class="text-red precio">
                                            S/ <?php echo number_format($precioporcantidad, 2, '.', ' '); ?>
                                          <input type="hidden" name="cantidad" value="<?php echo $reg->cantidad;  ?>">
                                          <input type="hidden"  class='precioOcultoCalcularJs' value="<?php echo number_format($precioporcantidad, 2, '.', ' '); ?>">
                                        </span>
                              </div>
                        </div>
                      <?php
                        }
                      ?>
                      
                      <!--  <input type="text" id="subtotal_input" value="<?php echo number_format($subTotal, 2, '.', ' ');?>"> -->
                    
                    </span>
                    </div>
<!--************************ /PRODUCT **************************************-->
<!--************************ FOOTER  **************************************-->

  <div class="confirmPurcharse-container">
    <div class="confirmPurcharse-item" id="confirmar_compra">
      <input class="btnConfirmPurcharse" type="button" onclick="<?php echo 'confirmarCompra('.$IDUSUARIO.')'; ?>" value="Confirmar Compra">
    </div>
  </div>
  <div class="confirmPurcharse-container2" >
    <div class="confirmPurcharse-item2"  id="casa_btn" >
      <input class="btnConfirmPurcharse2" onclick="recojoEnCasa_fun(<?php echo $idstore; ?>)" type="button" value="ENTREGA EN CASA">
    </div>
    <div class="confirmPurcharse-item2" id="tienda_btn">
      <input class="btnConfirmPurcharse2" onclick="recojoEnTienda_fun(<?php echo $idstore; ?>)" type="button" value="RECOJO EN TIENDA">
    </div>
  </div>
  <div class="confirmPurcharse-container3 ocultar">
    <div class="confirmPurcharse-item3" id="">
      <input class="btnConfirmPurcharse3" type="button" onclick="confirmarPedido(<?php echo $idstore; ?>)" value="COMPRAR">
 
    </div>
  </div>
<!-- Comprobante -->
<!--   <div class="voucher ocultar" >
    <div class="voucher_item"  id="boleta_btn" >
      <input class="btnVoucher" onclick="boleta_fun(<?php echo $idstore; ?>)" type="button" value="BOLETA">
    </div>
    <div class="voucher_item" id="factura_btn">
      <input class="btnVoucher" onclick="factura_fun(<?php echo $idstore; ?>)" type="button" value="FACTURA">
    </div>
  </div> -->
    </form>
  </div>
 

    <script src="../public/js/jquery-3.3.1.min.js"></script>
    <script src="../public/js/bootstrap.min.js"></script>
    <script src="../public/js/bootbox.min.js"></script> 
    <script src="../public/js/app.min.js"></script>    
    <script src="../public/js/bootstrap-select.min.js"></script>
    <script type="text/javascript" src="scripts/general.js"></script>
    <script type="text/javascript" src="scripts/confirmarpedido_android.js"></script>
  </body>
</html>
    
