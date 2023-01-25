<?php
/* 	*********************************
		Funciones Android
    ********************************* */
ob_start();
session_start();
require_once "../modelos/Producto_Android.php";
 $IDUSUARIO = $_SESSION['idusuario'];

 $idstore= $_GET['idstore']; 
 
$productoandroid = new Producto_Android();
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
    <link href="../public/datatables/buttons.dataTables.min.css" rel="stylesheet"/>
    <link href="../public/datatables/responsive.dataTables.min.css" rel="stylesheet"/>
    <link rel="stylesheet" type="text/css" href="../public/css/bootstrap-select.min.css">
    <link rel="stylesheet" href="../public/css/general.css">
    <link href="../public/css/fontawesomeiconos.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../public/css/change_password_android.css">
  </head>
  <body>
  <div class="header-cont">
    <div class="header flex-container">
      <div class="flex-item">
        <a href="#" onclick="goBackFunction(<?php echo $idstore; ?>)" >
          <i class="fas fa-chevron-left"></i> Cambiar contraseña
        </a>
      </div>

      <div class="flex-item">

      <img src="../files/logosmall.png" width="80" alt="">

      </div>
    </div>
  </div>
  <form name="formulario" id="formulario" method="POST">
  <div class="content_my_account">
        <ul class="my_account">
            <li class="margin-left margin-right ">
                <div>Contraseña actual</div>
                <a href="#">
                    <span> 
                      <input type="hidden" name="idusuario" id="idusuario" value="<?php echo $IDUSUARIO; ?>" ></span>
                      <input type="password" name="claveusuario" id="claveusuario"
                       value="" maxlength="50" ></span>
                    <span class="right"> </span></a>
            </li>
            <li class="margin-left margin-right ">
                <div>Contraseña nueva</div>
                <a href="#"> <span>
                  <input type="password"  name="nuevaclaveusuario" id="nuevaclaveusuario"  value=""  maxlength="50" ></span>
                    <span class="right"> </span></a>
                    <div class="error ocultar nuevaclaveusuario">
              Las contraseñas no coinciden
            </div>
            </li>
            <li class="margin-left margin-right ">
                <div>Repetir contraseña nueva</div>
                <a href="#"> <span>
                  <input type="password" id="repitenuevaclaveusuario" maxlength="50"  value=""  > </span> <span class="right"> </span></a>
                  <div class="error ocultar repitenuevaclaveusuario">
                Las contraseñas no coinciden
            </div>
            </li>
          
        </ul>
  </div>
  <div class="confirmPurcharse-container">
    <div class="confirmPurcharse-item">
    <input type="button" class="btnConfirmPurcharse" onclick="changePassword(<?php echo $idstore; ?>)" value="Guardar Cambios">
 
    </div>
  </div>
  </form>

<?php
require 'footer.php';
?>
<script type="text/javascript" src="scripts/change_password_android.js"></script>