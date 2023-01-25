<?php
/* 	*********************************
		Funciones Android
    ********************************* */
    session_start();
//Llamando a sesion de la tienda agregada
require_once "../modelos/CarritoProducto_Android.php";
$carritoproductoandroid = new CarritoProducto_Android();

$IDUSUARIO = $_SESSION['idusuario'];
$carritoproductoandroid->selectStoreDestination($IDUSUARIO);

require_once "../modelos/MyAddresses.php";
$myaddresses = new MyAddresses();


 $idstore= $_GET['idstore']; 
 $iddistrito_destino=$_SESSION['iddistrito_destino'];
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
  </head>
  <body>
  <div class="header-cont">
    <div class="header flex-container">
      <div class="flex-item">
        <a href="#" onclick="goBackFunction(<?php echo $idstore; ?>)" >
          <i class="fas fa-chevron-left"></i> Mi cuenta
        </a>
      </div>
      <div class="flex-item">
        <img src="../files/logosmall.png" width="80" alt="">
      </div>
    </div>
  </div>
  <div class="content_my_account">
  <h5 class="margin-left">Elige a qué dirección quieres que lleguen tus envios</h5>
        <form name="formulario" id="formulario" method="POST">
        <input name="idusuario" id="idusuario_input" type="hidden" value="<?php echo $IDUSUARIO; ?>">
        <input name="iddistrito_destino" id="iddistrito_destino_input" type="hidden" value="<?php echo $iddistrito_destino; ?>">
          <ul class="my_account">
                      <?php
                        $rspta=$myaddresses->listarDireccionesUsuario($IDUSUARIO);
                      
                    while ($reg=$rspta->fetch_object()){
                            $id = $reg->iddirecuser; $departamento = $reg->departamento; $distrito = $reg->distrito; $direccion = $reg->direccion;      $nomzona = $reg->nomzona;
                            $delivery = $reg->delivery;
                      ?>
                        <li class="margin-left margin-right ">
                            <label for="direcciones<?php echo $id; ?>" class="cont_mydir card-input">
                                <div class="box_mydir"><i class="fas fa-map-marker-alt"></i></div>
                                <div class="box_mydir"> <?php echo $departamento." / ".$distrito . ", ".$nomzona. ", ". $direccion; ?></div>
                              <!--   <div class="box_mydir"><i class="far fa-edit"></i></div>
                                <div class="box_mydir"> <i class="far fa-trash-alt"></i></div> -->
                                <input type="radio" id="direcciones<?php echo $id; ?>" name="my_addresses" class="my_addresses"
                                    value="<?php echo $id; ?>" class="radio card-input-element">
                            </label>
                        </li>
                    <?php
                    }
                    ?>    
          </ul>

          <ul class="my_account">
              <li class="margin-left"> <a href="#" onclick="goOpenAddresses(<?php echo $idstore; ?>)" ><i></i> <span>Agregar otra dirección</span> <i
                          class="fas fa-plus-circle"></i></a> </li>
          </ul>
        </form>
  </div>

  <div class="confirmPurcharse-container">
        <div class="confirmPurcharse-item">
            <input class="btnConfirmPurcharse" type="button" onclick="guardar_direccion_fun(<?php echo $idstore; ?>)" value="Guardar Dirección">
        </div>
    </div>
<?php
require 'footer.php';
?>
<script type="text/javascript" src="scripts/my_addresses.js"></script>