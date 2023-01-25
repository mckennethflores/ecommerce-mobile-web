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

 
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Mis datos personales</title>
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
    <link href="../public/css/fontawesomeiconos.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../public/css/my_personal_data_edit.css">
  </head>
  <body>
  <div class="header-cont">
    <div class="header flex-container">
      <div class="flex-item">
        <a href="#" onclick="goBack()" >
          <i class="fas fa-chevron-left"></i> Regresar
        </a>
      </div>
      <div class="flex-item">
        <img src="../files/logosmall.png" width="80" alt="">
      </div>
    </div>
  </div>
  <form name="formulario" id="formulario" method="POST">
  <div class="content_my_account">
  <?php
    $rspta=$usuario->mostrar2($IDUSUARIO);
    while ($reg=$rspta->fetch_object()){
   ?>
  <ul class="my_account">
            <input type="hidden" name="idusuario" id="idusuario" value="<?php echo $reg->idusuario; ?>">
            <li class="margin-left margin-right ">
                <div>Nombres</div>
                <a href="#">
                    <span> <input type="text" name="nomusuario" maxlength="120" id="nomusuario" value="<?php echo $reg->nomusuario; ?>"></span>
                    <span class="right"> </span></a>
            </li>
            <li class="margin-left margin-right ">
                <div>Email</div><a href="#"> 
                <span><input readonly="readonly" type="text" name="emailusuario" id="emailusuario" value="<?php echo $reg->emailusuario; ?>"></span>
                    <span class="right"> </span></a>
            </li>
            <li class="margin-left margin-right ">
                <div>DNI</div>
                <a href="#"> <span><input type="text" readonly="readonly" name="dniusuario" id="dniusuario" value="<?php echo $reg->dniusuario; ?>"> </span> <span class="right"> </span></a>
            </li>
            <li class="margin-left margin-right ">
                <div>Celular</div>
                <a href="#"> <span><input type="text" maxlength="9" name="telusuario" id="telusuario" value="<?php echo $reg->telusuario; ?>"> </span> <span class="right"> </span></a>
            </li>
 
        </ul>
        <?php
          }
        ?>         
  </div>
  <div class="confirmPurcharse-container">
    <div class="confirmPurcharse-item">
      <button class="btnConfirmPurcharse" type="submit" id="btnGuardar">  Guardar Cambios</button>
    </div>
  </div>
  </form>



<?php
require 'footer.php';
?>

<script type="text/javascript" src="scripts/my_personal_data_edit.js"></script>