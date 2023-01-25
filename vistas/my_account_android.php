<?php
/* 	*********************************
		Funciones Android
    ********************************* */
ob_start();
session_start();

require_once "../modelos/Usuario.php";
$usuario = new Usuario();

 $IDUSUARIO = $_SESSION['idusuario'];
 $idstore= $_GET['idstore']; 
 
 if(isset($_GET['idusuariosesion'])){
  session_start();
  session_destroy();
 }
  
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
 
    <link rel="stylesheet" href="../public/css/_all-skins.min.css">
    <link rel="apple-touch-icon" href="../public/img/apple-touch-icon.png">
    <link rel="shortcut icon" href="../public/img/favicon.ico">
    <!-- DATATABLES -->
    <link rel="stylesheet" type="text/css" href="../public/datatables/jquery.dataTables.min.css">    
    <link href="../public/datatables/buttons.dataTables.min.css" rel="stylesheet"/>
    <link href="../public/datatables/responsive.dataTables.min.css" rel="stylesheet"/>
    <link rel="stylesheet" type="text/css" href="../public/css/bootstrap-select.min.css">
    <link rel="stylesheet" href="../public/css/general.css">
    <link href="../public/css/fontawesomeiconos.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../public/css/my_account_android.css">
  </head>
  <body>
  <div class="header-cont">
    <div class="header flex-container">
      <div class="flex-item">
        <a href="#" onclick="goBackFunction(<?php echo $idstore; ?>)" >
          <i class="fas fa-chevron-left"></i> Atras
        </a>
      </div>
      <div class="flex-item">
        <img src="../files/logosmall.png" width="80" alt="">
      </div>
    </div>
  </div>

  <div class="content_my_account">
  <?php

    $rspta=$usuario->mostrar2($IDUSUARIO);
 
 while ($reg=$rspta->fetch_object()){
   ?>
    <h3 class="margin-left" id="name"><?php echo $reg->nomusuario; ?></h3>
    <h5 class="margin-left" id="email"><?php echo $reg->emailusuario; ?></h5>
  <?php
} 
 ?> 
    <ul class="my_account">
      <!-- <li class="margin-left margin-right "> <a  ><i class="far fa-user"></i> <span> Mis datos personales</span> -->
      <li class="margin-left margin-right "> <a href="#" onclick="goPersonalData(<?php echo $idstore; ?>)" ><i class="far fa-user"></i> <span> Mis datos personales</span>
          <span class="right"><i class="fas fa-chevron-right"></i></span></a> </li>
      <li class="margin-left margin-right "> <a href="#" onclick="goMyOrders(<?php echo $idstore; ?>)" ><i class="fas fa-list-ul"></i> <span>Mis órdenes</span> <span
            class="right"><i class="fas fa-chevron-right"></i></span></a> </li>
      <li class="margin-left margin-right "> <a href="#" onclick="goAddresses(<?php echo $idstore; ?>)" ><i class="fas fa-map-marker-alt"></i> <span>Mis
            direcciones</span> <span class="right"><i class="fas fa-chevron-right"></i></span></a> </li>
            <li class="margin-left margin-right "> <a href="#" onclick="goAtentionCustomer(<?php echo $idstore; ?>)" ><i class="far fa-life-ring"></i> <span>Atención al Cliente</span> <span class="right"><i class="fas fa-chevron-right"></i></span></a> </li>
    </ul>
    <ul class="my_account">
      <li class="margin-left"> <a style="padding: 20px;"  onclick="goOpenActivitySesionLogout()" ><i></i> <span>Cerrar Sesión</span></a> </li>
    </ul>
    
  </div>

<?php
require 'footer.php';
?>
<script type="text/javascript" src="scripts/my_account_android.js"></script>