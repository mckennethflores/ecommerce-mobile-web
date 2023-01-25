<?php
/* 	*********************************
		Funciones Android
    ********************************* */
   
    session_start();
    require_once "../modelos/MyOrders.php";
    $IDUSUARIO = $_SESSION['idusuario'];

    $idstore= $_GET['idstore']; 
    $myorders = new MyOrders();
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Mis datos personales</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.5 -->
    <link rel="stylesheet" href="../public/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="../public/css/font-awesome.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="../public/css/AdminLTE.min.css">
 
    <link rel="stylesheet" href="../public/css/_all-skins.min.css">
    <link rel="apple-touch-icon" href="../public/img/apple-touch-icon.png">
    <link rel="shortcut icon" href="../public/img/favicon.ico">
    <!-- DATATABLES -->
    <link rel="stylesheet" type="text/css" href="../public/datatables/jquery.dataTables.min.css">    
 
    <link rel="stylesheet" type="text/css" href="../public/css/bootstrap-select.min.css">
    <link rel="stylesheet" href="../public/css/general.css">
    <link href="../public/css/fontawesomeiconos.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../public/css/my_orders.css">
  </head>
  <body>
  <div class="header-cont">
    <div class="header flex-container">
      <div class="flex-item">
        <a href="#" onclick="goBackFunction(<?php echo $idstore; ?>)" >
          <i class="fas fa-chevron-left"></i> Mis ordenes
        </a>
      </div>

      <div class="flex-item">

      <img src="../files/logosmall.png" width="80" alt="">

      </div>
    </div>
  </div>

  <div class="content">
<?php
                    $rspta=$myorders->listarOrders($IDUSUARIO);
                  if(!$rspta->fetch_object() == null){
                    while ($reg=$rspta->fetch_object())
                    {

                        $estadopedido = $reg->idestadopedido;
                        if($estadopedido=='1'){
                          $estadopedido = "En proceso";
                        }else if($estadopedido=='2'){
                          $estadopedido = "Finalizado";
                        }else if($estadopedido=='3'){
                          $estadopedido = "Anulado";
                        }
                      $distrito = $reg->distrito;
                      $codigopedido = $reg->codigopedido;
                      $direccion = $reg->direccion;
                      $fechapedido_ = $reg->fechapedido_;
                      $fechapedido = $reg->fechapedido;
                      $total = $reg->total;
                      ?>
        <!-- Order -->
        <div class="order__card">
            <div class="estado_card"><?php echo $estadopedido; ?></div>
            <div class="cont_card">
                <div class="img_card"><img width="30" src="../files/logo-loading.png" alt=""></div>
                <div class="cont_card">
                    <div class="distri_card"><?php echo $distrito; ?></div>
                    <div class="direc_card"> <?php echo $direccion. ", "; ?></div>
                </div>
                <div class="clearfix"></div>
                <div class="hora_card">Fecha: <?php echo $fechapedido_; ?> | Codigo de pedido: <?php echo $codigopedido; ?></div>
                <div class="total_card">S/ <?php echo $total; ?></div>
            </div>
        </div>
        <!-- Order -->
                <?php
                }
            }else{
              echo '<p style="color:#000; text-align:center" >Todavia no tienes pedidos</p>';
            }
?>  
  </div>

  
<?php
require 'footer.php';
?>

<script type="text/javascript" src="scripts/my_orders.js"></script>