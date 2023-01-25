<?php
/* 	*********************************
		Funciones Android
    ********************************* */
ob_start();
session_start();

require_once "../modelos/Usuario.php";
  
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
  <link rel="stylesheet" href="../public/css/blue.css">
  <link rel="stylesheet" href="../public/css/login_android.css">
</head>

<body class="hold-transition login-page">
  <div class="login-box">
    <div class="login-logo">
      <?= NOMBRE_EMPRESA ?>
    </div>
    <div class="login-box-body">
      <form method="post" id="frmAcceso">
        <div class="form-group has-feedback">
          <input type="text" id="dniusuario" name="dniusuario" value="1" class="form-control" placeholder="DNI">
          <span class=" form-control-feedback"></span>
        </div>
        <div class="form-group has-feedback">
          <input type="password" id="claveusuario" name="claveusuario" value="1" class="form-control"
            placeholder="Password">
          <span class=" form-control-feedback"></span>
        </div>
        <div class="row">
          <div class="col-xs-8">
          </div>
          <div class="col-xs-12">
            <button type="submit" class="btn btn-success btn-block btn-flat">Ingresar</button>
            <a class="btn btn-success btn-block btn-flat" href="usuario_android.php">Registrate</a>
          </div>
        </div>
      </form>
    </div>
  </div>

  <script src="../public/js/jquery-3.1.1.min.js"></script>
  <script src="../public/js/bootstrap.min.js"></script>
  <script src="../public/js/bootbox.min.js"></script>
  <script type="text/javascript" src="scripts/login_android.js"></script>
</body>

</html>