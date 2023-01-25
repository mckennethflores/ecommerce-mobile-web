<?php
/* 	*********************************
		Funciones Android
    ********************************* */
    session_start();
//Llamando al modelo PasswordRecovery porsiacaso
require_once "../modelos/PasswordRecoveryActivation.php";
$passwordrecoveryactivation = new PasswordRecoveryActivation();

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
        <a href="#" onclick="goToPasswordRecovery()" >
          <i class="fas fa-chevron-left"></i> Atras
        </a>
      </div>
      <div class="flex-item">
        <img src="../files/logosmall.png" width="80" alt="">
      </div>
    </div>
  </div>
  <div class="content_my_account">
  <h3 class="title-passwordrecovery">Escribe el código</h3>
  <p class="description-passwordrecovery">¡Escribe el código
para facilitar el proceso de recuperación.!</p>
        <form name="formulario" id="formulario" method="POST">
            <input name="idusuario" id="idusuario_input" type="hidden" value="<?php echo $IDUSUARIO; ?>">
          <ul class="my_account">
              <input  type="text" id="tokenusuario" name="tokenusuario" placeholder="Ingrese el codigo">
          </ul>
          <input class="button-passwordrecovery"  type="submit" value="Enviar codigo">
          <div class="message-success ocultar">Se acaba de enviar un correo electrónico con un código de verificación a tu email</div>
         
        </form>
  </div>

<?php
require 'footer.php';
?>
<script type="text/javascript" src="scripts/passwordrecovery_activation.js"></script>