<?php
/* 	*********************************
		Funciones Android
    ********************************* */
    ob_start();
    session_start();
//Llamando a sesion de la tienda agregada
$IDUSUARIO = $_SESSION['idusuario'];
 $idstore= $_GET['idstore']; 
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
    <link rel="stylesheet" href="../public/css/my_addresses.css">
    <style>
        body > div.content_my_account > ul > li:nth-child(2) > a > img {
    width: 60px;
}
    </style>
  </head>
  <body>
  <div class="header-cont">
    <div class="header flex-container">
      <div class="flex-item">
        <a href="#" onclick="goBackFunction(<?php echo $idstore; ?>)" >
          <i class="fas fa-chevron-left"></i> REGRESAR
        </a>
      </div>

      <div class="flex-item">
        <img src="../files/logosmall.png" width="80" alt="">
      </div>
    </div>
  </div>
<!-- Aqui va terminos y condiciones y libro de reclamaciones -->
  <div class="content_my_account">
  <ul class="my_account">
      <!-- <li class="margin-left margin-right "> <a  ><i class="far fa-user"></i> <span> Mis datos personales</span> -->
      <li class="margin-left margin-right "> <a href="#" onclick="goConditionTerms(<?php echo $idstore; ?>)" > <span> Términos y Condiciones</span>
          <span class="right"><i class="fas fa-chevron-right"></i></span></a> </li>
      <li class="margin-left margin-right "> <a href="#" onclick="goClaimbook(<?php echo $idstore; ?>)" > <img src="../files/libro_de_reclamaciones.jpg" alt=""> <span>Libro de reclamaciones</span> <span
            class="right"><i class="fas fa-chevron-right"></i></span></a> </li>
    </ul>
  </div>
 
<?php
require 'footer.php';
?>
<script type="text/javascript" src="scripts/atencionalcliente_android.js"></script>