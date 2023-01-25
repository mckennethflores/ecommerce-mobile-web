<?php
/* 	*********************************
		Funciones Android
    ********************************* */
ob_start();
session_start();

require_once "../modelos/Tiendas.php";

$tiendas = new Tiendas();
// PROBANDO EL SISTEMA SOLO EN LINEA - QUITO LA VALIDACION DE ANDROID
if(isset($_GET['idusuario'])){
 }else{
   $_SESSION['idusuario'];
    $_SESSION['idusuario'];
 }
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
    <link rel="stylesheet" href="../public/css/general.css">
    <link rel="stylesheet" type="text/css" href="../public/css/tiendas_android.css">
  </head>
  <body class="hold-transition">
       <!-- Modal -->
       <!--
<div id="modal" class="">
    <div class="header">
      <h2 class="titulo">Gran sorteo por Fiestas Patrias</h2>
    </div>
    <span id="cerrar">X</span>
    <form name="formulario" id="formulario" method="POST">
    <input type="hidden" id="idusuario_input" name="idusuario" value="<?php // echo $_SESSION['idusuario'];  ?>">
      <div class="form-group">
        <h6>Ingrese su codigo de boleta o factura</h6>
        <input class="cls_prefijo_tienda_input" id="prefijo_tienda_input" name="prefijo_tienda_input"
          placeholder="123" />
          <span>-</span>
          <input class="cls_codigo_tienda_input" id="codigo_tienda_input"  maxlength="18" name="codigo_tienda_input" placeholder="329577" />
          <div class="clearfix"></div>
          <span class="span_prefijo hidden">Prefijo incorrecto</span>
          <span class="span_codigo hidden">Codigo incorrecto</span>
          <span class="span_codigonovalido hidden">El codigo ingresado no es valido</span>
      </div>
      <div class="form-group">
        <h6>Ingrese su nombre y apellidos</h6>
        <input class="cls_nombres_input" name="nombres_input" id="nombres_input" placeholder="Nombre y apellidos" />
        <span class="span_nombres hidden">Porfavor ingrese su nombre</span>
      </div>
      <div class="form-group">
        <h6>Ingrese su DNI</h6>
        <input class="cls_dni_input" type="number" maxlength="8" name="dni_input" id="dni_input" placeholder="Dni" />
        <span class="span_dni hidden">Porfavor ingrese su DNI</span>
      </div>
      <div class="form-group">
        <h6>Ingrese su numero de telefono</h6>
        <input class="cls_telefono_input" type="number" name="telefono_input" id="telefono_input" placeholder="Ejem. 954" />
        <span class="span_telefono hidden">Porfavor ingrese su telefono</span>
      </div>
      <div class="form-group">
        <input id="guardar_btn" type="button" value="Participar"/>
      </div>
    </form>
  </div>
  <!-- <div class="modal-backdrop"></div>-->



<!-- <div id="modal" class="">
    <div class="header">
      <h2 class="titulo"> Delivery disponible solo para Chorrillos!</h2>
    </div>
    <span id="cerrar">X</span>
  <img class="imgDeliveryCobertura" src="../files/delivery.jpg" alt="">
</div> -->

<!--   <div class="modal-backdrop"></div>
 -->

  <!-- Modal -->
  <div id="bloque2">
  <div class="headStore">
    <div><img width="100" src="../files/logosmall.png" ></div>
  </div>
    <div class="wrapper">
    <h3>Seleccione su tienda</h3>
    <div>        
    <p class="text-center"></p>
    <section class="content">
            <div class="row">
              <div class="col-md-12">
                  <div class="box">                  
                        <form name="formulario" id="formulario" method="POST">
                        <input type="hidden" id="idstore_input" name="idstore" value="">
                        <input type="hidden" id="idusuario_input" name="idusuario" value="">
                        <div class="contenedor">
                        <?php
                        // Este codigo es para que se comunique el android con el php, sin este codigo todo queda inutilizable
                        // todo el app
                        if(isset($_GET['idusuario'])){
                          $idusuario = $_GET['idusuario'];
                          $_SESSION['idusuario'] = $idusuario;
                        }
                        ?>
                        <!--  Tiendas -->   
                            <?php
                                $rspta=$tiendas->listarTiendas();
                                while ($reg=$rspta->fetch_object()){
                            ?>

                            <div class="elemento">

                            <!-- <img  onclick="store_function(<?php // echo $_SESSION['idusuario'].','.$reg->idstore; ?>)" 
                            src="../files/<?php // echo $reg->icontienda; ?>"> -->
                            <img  onclick="store_function(<?php echo $_SESSION['idusuario'].',' . $reg->idstore; ?>)" 
                            src="../files/<?php echo $reg->icontienda; ?>">
                            
                            </div>                                 

                            <?php
                            }
                            ?>   
                        </div>
                        </form>
                    <!--Fin centro -->
                  </div><!-- /.box -->
              </div><!-- /.col -->
          </div><!-- /.row -->
      </section><!-- /.content -->
    </div>
</div>    
    <script src="../public/js/jquery-3.3.1.min.js"></script>
    <script src="../public/js/bootstrap.min.js"></script>
    <script src="../public/js/app.min.js"></script>
    <script src="../public/js/bootbox.min.js"></script> 
    <script src="../public/js/bootstrap-select.min.js"></script>
    <script type="text/javascript" src="scripts/general.js"></script>
    <script type="text/javascript" src="scripts/tiendas_android.js"></script>
  </body>
</html>
