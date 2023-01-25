<?php
/* 	*********************************
		Funciones Android
    ********************************* */
ob_start();
session_start();
require_once "../modelos/MyAddressesAdd.php";
/* $_SESSION['idusuario'] =1; */
 $IDUSUARIO = $_SESSION['idusuario'];

 $idstore= $_GET['idstore']; 
/*  $_SESSION['idstore'] = $idstore; 
 $IDSTORE = $_SESSION['idstore']; */
 
$myaddressesadd = new MyAddressesAdd();
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
    <link rel="stylesheet" href="../public/css/my_addresses_add.css">
    </head>
  <body>
  <div class="header-cont">
    <div class="header flex-container">
      <div class="flex-item">
        <a href="#" onclick="goBackFunction(<?php echo $idstore; ?>)" >
          <i class="fas fa-chevron-left"></i> Agregar dirección
        </a>
      </div>

      <div class="flex-item">

      <img src="../files/logosmall.png" width="80" alt="">

      </div>
    </div>
  </div>

  <div class="content_my_account">
<h3 style="text-align: center;">Indicanos tu dirección para ofrecerte una mejor experiencia</h3>
<!-- sdf -->
<form name="formulario" id="formulario" method="POST">
                       
<!-- sdf -->
<input type="hidden" name="iddirecuser" id="iddirecuser">
  <input type="hidden" name="idusuario" id="idusuario" value="<?php echo $IDUSUARIO; ?>">
 
<div class="container">
  <div class="row">
    <div class="col-md-12">
          <div class="form-group">
            <label for="direccion">Dirección</label>
            <input type="text" class="form-control" value="" name="direccion" id="direccion" placeholder="Dirección">
            <div class="error direccion ocultar">
              Ingrese una dirección valida
            </div>
          </div>
          <div class="form-group">
            <label for="calle">Numero de calle</label>
            <input type="text" class="form-control" value="" name="calle" id="calle" placeholder="Número de calle">
            <div class="error calle ocultar">
              Ingrese un numero de calle valido
            </div>
          </div>
          <div class="form-group">
            <label for="calle">Distrito</label>
            <select name="iddistrito" id="iddistrito" class="form-control" required>
            <?php
                  $rspta = $myaddressesadd->listarDistritos();
                  while ($reg = $rspta->fetch_object()){
                    if($reg->descripcion =='Surquillo'){
                      echo '<option value=' . $reg->id . ' selected="selected" >' . $reg->descripcion . '</option>';
                    }
                      echo '<option value=' . $reg->id . '>' . $reg->descripcion . '</option>';
                  }
            ?>
            </select>
            <div class="error iddistrito ocultar">
             Seleccione un distrito
            </div>
          </div>
          <div class="form-group">
            <label for="calle">Piso/departamento</label>
            <input type="text" class="form-control" name="piso" id="piso" placeholder="Piso/departamento">
          </div>          
    </div>
  </div>
</div>
 
  </div>

  <div class="confirmPurcharse-container">
    <div class="confirmPurcharse-item">
    <input type="button" class="btnConfirmPurcharse" onclick="saveStore(<?php echo $idstore; ?>)" value="Guardar Cambios">
 
    </div>
  </div>
 
                        </form>
<?php
require 'footer.php';
?>
    <script type="text/javascript" src="scripts/my_addresses_add.js"></script>
