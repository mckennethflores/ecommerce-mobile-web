<?php
/* 	*********************************
		Funciones Android
    ********************************* */
ob_start();
session_start();
require_once "../modelos/CarritoProducto_Android.php";
 $IDUSUARIO = $_SESSION['idusuario'];
 $idstore= $_GET['idstore'];
 
$carritoproductoandroid = new CarritoProducto_Android();
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
    <link rel="stylesheet" type="text/css" href="../public/datatables/jquery.dataTables.min.css">    
    <link href="../public/datatables/buttons.dataTables.min.css" rel="stylesheet"/>
    <link href="../public/datatables/responsive.dataTables.min.css" rel="stylesheet"/>

    <link rel="stylesheet" type="text/css" href="../public/css/bootstrap-select.min.css">
    <link rel="stylesheet" href="../public/css/general.css">
    <link rel="stylesheet" type="text/css" href="../public/css/confirmarpedi_recojoentienda_android.css">
  </head>
  <body>
              <!--   Cabecera del nuevo diseño -->    
                   <div class="header-cont">
                    <div class="header flex-container">
                      <div class="flex-item"> 
                          <a  onclick="goBackFunction($idstore)">
                          <i class="fa fa-chevron-left" aria-hidden="true"></i> ATRAS
                          </a>
                      </div>
                      <div class="flex-item"> 
                      </div>
                    </div>
                  </div>
              <!--   Cabecera del nuevo diseño -->
<!--************************ Recojo en tienda ***************************************-->               
              <div class="content">

                  <form name="formulario" id="formulario" method="POST">
                    <input name="idusuario" id="idusuario_input" type="hidden" value="<?php echo $IDUSUARIO; ?>">
                    <input name="idproducto" id="idproducto_input" type="hidden" value="">
                    <input name="idpaprotemp" id="idpaprotemp_input" type="hidden" value="">

<img class="logo"  src="../files/logoconfirmarcompra.png" alt="">  
  <span class="shopSuccess">Gracias por preferirnos</span>
                     
                     <h1>Por el momento no tenemos cobertura en la dirección ingresada</h1>


<div class="confirmPurcharse-container-back">
    <div class="confirmPurcharse-item-back">
      <input class="btnBack" type="button"  onclick="goBackFunctionSelectStore(<?php echo $idstore ?>)" value="VOLVER">
    </div>
 
  </div>
                  </form>
<!--************************ /Recojo en tienda **********************************-->
  </div>
 
<?php

require 'footer.php';
?>

<?php 
/*}
ob_end_flush();*/
?>
<script type="text/javascript" src="scripts/confirmarpedi_recojoentienda_android.js"></script>
 

