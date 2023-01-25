<?php
/* 	*********************************
		Funciones Android
    ********************************* */
    session_start();
//Llamando al modelo PasswordRecovery porsiacaso
require_once "../modelos/PasswordRecovery.php";
$passwordrecovery = new PasswordRecovery();
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
        <a href="#" onclick="goOpenActivityBackToLoginPage()" >
          <i class="fas fa-chevron-left"></i> Atras
        </a>
      </div>
      <div class="flex-item">
        <img src="../files/logosmall.png" width="80" alt="">
      </div>
    </div>
  </div>
  <div class="content_my_account">
  <img class="forgot_password_img" src="../files/forgot_password.png" alt="">

  <h3 class="title-passwordrecovery">¿Se te olvidó tu contraseña?</h3>
  <p class="description-passwordrecovery">¡No se preocupe, solo necesitamos su dirección de correo electrónico registrada y listo!</p>
        <form name="formulario" id="formulario" method="POST">
          <ul class="my_account">
              <input  type="email" id="emailusuario" name="emailusuario" placeholder="Ingrese su email">
          </ul>
          <input class="button-passwordrecovery"  type="submit" value="Restablecer la contraseña">
          <!-- <div class="message-success ocultar">Se acaba de enviar un correo electrónico con un código de verificación a tu email</div> -->
          <div class="message-error ocultar ">El email ingresado no pertenece a ninguna cuenta</div>
          <p class="button-text-passwordrecovery">Verifique su bandeja de entrada después de hacer clic en el botón de arriba.</p>
        </form>
  </div>

<?php
require 'footer.php';
?>
<script type="text/javascript" src="scripts/passwordrecovery.js"></script>