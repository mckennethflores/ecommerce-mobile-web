<?php
/* **********************************
		Funciones Android
    ********************************* */
ob_start();
session_start();
require_once "../modelos/CalculateDelivery.php";

$IDUSUARIO = $_SESSION['idusuario'];
$idstore= $_GET['idstore'];
$calculatedelivery = new CalculateDelivery();
/* $rspta=$calculatedelivery->listarIdStore($IDUSUARIO);
while ($reg=$rspta->fetch_object()){
  $idstore = $reg->idstore; 
} */
?>
<!DOCTYPE html>
<html>
  <head>
    <title>Calcular delivery</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
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
    <link rel="stylesheet" href="../public/css/calculate_delivery.css">
  </head>
  <body>
  <div class="header-cont">
    <div class="header flex-container">
      <div class="flex-item">
        <a href="#" onclick="goBackFunction(<?php echo $idstore; ?>)" ><i class="fas fa-chevron-left"></i> Agregar dirección</a>
      </div>
      <div class="flex-item"><img src="../files/logosmall.png" width="80" alt=""></div>
    </div>
  </div>
  <div class="content_my_account">
    <h5 style="text-align: center;">Tienda seleccionada: <i><b>BCE <?php echo $idstore; ?></b></i></h5>

<form name="formulario" id="formulario" method="POST">

  <input type="hidden" name="idusuario" id="idusuario" value="<?php echo $IDUSUARIO; ?>">
  
  <div class="container">
    <div class="row">
      <div class="col-md-12">
              <input name="idstore" id="idstore" type="hidden" value="<?php echo $idstore; ?>">
              <input type="hidden" name="iddepartamento_input" id="iddepartamento_input">
              <input type="hidden" name="iddistrito_input" id="iddistrito_input">
              <input type="hidden" name="idzona_input" id="idzona_input">
              <input type="hidden" name="predelive_input" id="predelive_input">
            <div class="form-group hidden">
              <label for="iddepartamento">Seleccione Departamento</label>
              <select name="iddepartamento" id="iddepartamento" class="form-control" required>
              </select>
              <div class="error iddepartamento ocultar">
              Todavía no tenemos cobertura para la provincia seleccionada Por favor intente con otra Provincia.
              </div>
            </div>
            <div class="form-group ciudad ">
              <label for="calle">Seleccione Ciudad</label>
              <select name="iddistrito" id="iddistrito" class="form-control" required>
              </select>
              <div class="error iddistrito ocultar">
              Todavía no tenemos cobertura para el distrito seleccionado Por favor intente con otro distrito.
              </div>
            </div>
            <div class="form-group zona idzona">
              <label for="zona">Seleccione zona</label>
              <select  name="idzona" id="idzona" class="form-control" >
              </select>
              <div class="error ocultar">
              Seleccione una zona
              </div>
            </div>
            <div class="form-group direccion iddireccion">
              <label for="direccion">Dirección</label>
              <input type="text" class="form-control" required name="direccion" id="direccion" placeholder="Dirección">
              <div class="error  ocultar">
                Ingrese una dirección valida
              </div>
            </div>
            <div  class="delivery iddelivery">
            <label for="direccion">El costo por delivery es:</label>
            <span class="error" >S/ <span id="precio"></span> Soles</span>
            </div>
      </div>
    </div>
  </div>
    </div>
    <div class="confirmPurcharse-container boton">
      <div class="confirmPurcharse-item">
      <input type="button" class="btnConfirmPurcharse" onclick="saveStore(<?php echo $idstore; ?>)" value="Guardar Cambios">
  
      </div>
    </div>
</form>
<?php
require 'footer.php';
?>
<script type="text/javascript" src="scripts/calculate_delivery.js"></script>