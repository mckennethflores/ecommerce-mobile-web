<?php
/* 	*********************************
		Funciones Android
    ********************************* */
ob_start();
session_start();
require_once "../modelos/CarritoProducto_Android.php";
 $IDUSUARIO = $_SESSION['idusuario'];
 $IDSTORE = $_SESSION['idstore'];
 
$carritoproductoandroid = new CarritoProducto_Android();
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title><?= NOMBRE_EMPRESA ?></title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.5 -->
    <link rel="stylesheet" href="../public/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="../public/css/font-awesome.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="../public/css/AdminLTE.min.css">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="../public/css/_all-skins.min.css">
    <link rel="apple-touch-icon" href="../public/img/apple-touch-icon.png">
    <link rel="shortcut icon" href="../public/img/favicon.ico">

    <!-- DATATABLES -->
    <link rel="stylesheet" type="text/css" href="../public/datatables/jquery.dataTables.min.css">    
    <link href="../public/datatables/buttons.dataTables.min.css" rel="stylesheet"/>
    <link href="../public/datatables/responsive.dataTables.min.css" rel="stylesheet"/>

    <link rel="stylesheet" type="text/css" href="../public/css/bootstrap-select.min.css">
    <link rel="stylesheet" href="../public/css/general.css">
    <link rel="stylesheet" type="text/css" href="../public/css/recojoencasa_android.css">
  </head>
  <body>
              <!--   Cabecera del nuevo diseño -->    
                   <div class="header-cont">
                    <div class="header flex-container">
                      <div class="flex-item"> 
                          <a  onclick="goBackFunction()">
                          <i class="fa fa-chevron-left" aria-hidden="true"></i> 
                          <span class="atras">ATRAS</span>
                          </a>
                      </div>
 
                      <div class="flex-item"> 
                       
                          <img src="../files/logoconfirmarcompra.png" alt="">
                      
                      </div>
                    </div>
                  </div>
              <!--   Cabecera del nuevo diseño -->
              <div class="content">

                  <form name="formulario" id="formulario" method="POST">
                    <input name="idusuario" id="idusuario_input" type="hidden" value="<?php echo $IDUSUARIO; ?>">
                    <input name="idproducto" id="idproducto_input" type="hidden" value="">
                    <input name="idpaprotemp" id="idpaprotemp_input" type="hidden" value="">
<!-- ************ -->
<!-- Lugar de recojo -->
<!-- ************ -->

    <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <h5 class="text-white">Distrito</h5>
        <input type="text" class="form-control" name="nomusuario" id="nomusuario" maxlength="100" >
    </div> 
    <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <h5 class="text-white">Dirección</h5>
        <input type="text" class="form-control" name="nomusuario" id="nomusuario" maxlength="100" >
    </div> 
    <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <h5 class="text-white">Celular</h5>
        <input type="text" class="form-control" name="nomusuario" id="nomusuario" maxlength="100" >
    </div> 
    <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <h5 class="text-white">Nombre del contacto</h5>
        <input type="text" class="form-control" name="nomusuario" id="nomusuario" maxlength="100" >
    </div> 

 
 
 
<!-- ************************************************************************ -->
<!--************************ /Lugar de recojo *******************************-->
<!-- ************************************************************************ -->


 <!-- ************************************************************************ -->
<!--************************ /Lugar de recojo *******************************-->
<!-- ************************************************************************ -->
  <div class="confirmPurcharse-container">
    <div class="confirmPurcharse-item">
      <input class="btnConfirmPurcharse" type="button" onclick="<?php echo 'confirmar_pedido_recojoencasa_fun('.$IDUSUARIO.')'; ?>" value="SIGUIENTE">
    </div>
  </div>  
                  
                  </form>
  </div>
 
<?php

require 'footer.php';
?>

<?php 
/*}
ob_end_flush();*/
?>
<script type="text/javascript" src="scripts/recojoencasa_android.js"></script>
 

