<?php
/* 	*********************************
		Funciones Android
    ********************************* */
  session_start();
  require_once "../modelos/Producto_Android.php";

?>
    <?php

$debug = false;

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
    <link rel="stylesheet" href="../public/css/general.css">
    <link rel="stylesheet" type="text/css" href="../public/css/bootstrap-select.min.css">
    <link rel="stylesheet" href="../public/css/usuario_android.css">
  </head>
  <body>
  <section class="content">
            <div class="row">
              <div class="col-md-12">
                  <div class="box"> 
                    <div class="panel-body"   id="listadoregistros">
                        <form name="formulario" id="formulario" method="POST">
                          <h2>Registrate</h2>
                          <div class="form-group col-lg-12 col-lg-12 col-lg-12 col-xs-12">
                            <input type="hidden" name="idusuario" id="idusuario">
                            <input type="text" class="form-control" name="dniusuario" id="dniusuario" value="<?=  $debug == true ? "25412365" : "" ?>" maxlength="8" placeholder="DNI">
                          </div>
                          <div class="form-group col-lg-12 col-lg-12 col-lg-12 col-xs-12">
                            <input type="text" class="form-control" name="nomusuario" id="nomusuario" value="<?=  $debug == true ? "Juan Perez" : "" ?>" maxlength="100" placeholder="Nombre" >
                          </div>                          
                          <div class="form-group col-lg-12 col-lg-12 col-lg-12 col-xs-12">
                            <input type="text" class="form-control" name="telusuario" id="telusuario" value="<?=  $debug == true ? "017340616" : "" ?>"  maxlength="12" placeholder="Telefono">
                          </div>
                          <div class="form-group col-lg-12 col-lg-12 col-lg-12 col-xs-12">
                            <input type="text" class="form-control" name="emailusuario" id="emailusuario" value="<?=  $debug == true ? "dem42o@gmail.com" : "" ?>"  maxlength="256" placeholder="Email">
                          </div>
                          <div class="form-group col-lg-12 col-lg-12 col-lg-12 col-xs-12">
                            <input type="text" class="form-control" name="claveusuario" id="claveusuario" value="<?=  $debug == true ? "123456" : "" ?>" maxlength="20"placeholder="Clave" >
                          </div>
                          <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            
                            <button class="btn btn-success" type="submit" id="btnGuardar" style="width: 100%; margin-top: 22px;">  REGISTRARSE</button>
                            <br><br>
                            <a class="btn btn-success btn-block btn-flat" href="login_android.php">INICIAR SESIÓN</a>
                          </div>
                        </form>
                    </div>
                  </div>
              </div>
          </div>
      </section>
<?php
require 'footer.php';
?>
<script type="text/javascript" src="scripts/usuario_android.js"></script>