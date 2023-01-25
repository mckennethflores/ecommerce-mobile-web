<?php
/* 	*********************************
		Funciones Android
    ********************************* */
    session_start();
//Llamando al modelo PasswordRecovery porsiacaso
require_once "../modelos/PasswordRecoveryReset.php";
$passwordrecoveryreset = new PasswordRecoveryReset();
$IDUSUARIO = $_SESSION['idusuario'];
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
    <link rel="stylesheet" type="text/css" href="../public/css/bootstrap-select.min.css">
    <link rel="stylesheet" href="../public/css/general.css">
    <link href="../public/css/fontawesomeiconos.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../public/css/passwordrecovery.css">
  </head>
  <body>
  <div class="header-cont">
    <div class="header flex-container">
      <div class="flex-item">
        <a href="#" onclick="goToPasswordRecoveryActivation()" >
          <i class="fas fa-chevron-left"></i> Atras
        </a>
      </div>
      <div class="flex-item">
        <img src="../files/logosmall.png" width="80" alt="">
      </div>
    </div>
  </div>
  <div class="content_my_account">
  <h3 class="title-passwordrecovery">¿Se te olvidó tu contraseña?</h3>
  <p class="description-passwordrecovery">¡Porfavor Ingrese su nueva contraseña!</p>
        <form name="formulario" id="formulario" method="POST">
          <ul class="my_account">
              <input type="hidden" name="idusuario" id="idusuario" value="<?php echo $IDUSUARIO; ?>" >
              <input  type="password" id="claveusuario" name="claveusuario" placeholder="Contraseña Nueva">
              <div class="error ocultar ">
              Las contraseñas no coinciden
            </div>
              <input  type="password" id="rclaveusuario" name="rclaveusuario" placeholder="Confirmar Contraseña Nueva">
              <div class="error ocultar ">
              Las contraseñas no coinciden
            </div>
          </ul>
          <input class="button-passwordrecovery"  type="submit" value="Cambiar contraseña">
         <!--  <input type="button" class="button-passwordrecovery" onclick="resetpass_btn()" value="Restablecer contraseña">       -->
        </form>
  </div>

<?php
require 'footer.php';
?>
<script type="text/javascript" src="scripts/passwordrecovery_reset.js"></script>