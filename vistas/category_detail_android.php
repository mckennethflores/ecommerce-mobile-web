<?php
/* 	*********************************
		Funciones Android
    ********************************* */
ob_start();
session_start();
require_once "../modelos/Producto_Android.php";
$productoandroid = new Producto_Android();
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
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
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
    <link rel="stylesheet" type="text/css" href="../public/css/category_detail_android.css">
  </head>
  <body >
            <div class="header-cont">
                    <div class="header flex-container">
                      <div class="flex-item"> 
                        <a  onclick="goBackFunction()">
                          <i class="fa fa-chevron-left" aria-hidden="true"></i> 
                          <span class="atras">CATEGORY NAME</span>
                        </a>
                      </div>
                      <div class="flex-item"> 
                       
                          <img src="../files/logoconfirmarcompra.png" alt="">
                      
                      </div>
                    </div>
            </div>            

                        <form name="formulario" id="formulario" method="POST">
                            <input name="idusuario" id="idusuario_input" type="hidden" value="<?php echo $IDUSUARIO; ?>">
                            <input name="idproducto" id="idproducto_input" type="hidden" value="">
                            <input name="precio" id="precio_input" type="hidden" value="">
                            <input name="cantidad" id="cantidad_input" type="hidden" value="1">
                            <!-- Agregamos la etiqueta responsive flexbox -->
                <div class="content">
                <!-- ************************* -->    
                <!--  Producto -->
                <!-- *********************** -->
                <div class="container-product">                            
                           <!--  <div class="contenedor" id="contenedor"> -->
                            <?php
                                $rspta=$productoandroid->listar();
                                while ($reg=$rspta->fetch_object()){
                            ?>
                                <div class="product-unit"><!-- Etiqueta flexbox similar a col-md-6 -->
                                    <div class="image"> <a href=""><img width="120" src="<?php echo $reg->imagen; ?>"></a>  </div>
                                    <div class="brand">GLORIA</div>
                                    <div class="name"><?php echo $reg->nomproductocorto; ?></div>
                                    <div class="price-unit">S/ <?php echo $reg->valorventa; ?> c/u</div>
                                    <div class="indicadoresCantidad">
                                    <?php echo'<button type="button" class="btn-right decrementar'.$reg->idproducto.'" onclick="decrementar('.$reg->idproducto.')" ><i class="fas fa-minus-circle"></i></button>
                <input type="text" readonly id="input'.$reg->idproducto.'" value="1">
                <button type="button" class="btn-left incrementar'.$reg->idproducto.'" onclick="incrementar('.$reg->idproducto.')"><i class="fas fa-plus-circle"></i></button>';?>
                    <input type="button" class="comprar_btn" onclick="<?php echo 'comprar_fun('.$reg->idproducto.','.$reg->valorventa.')'; ?>" value="Comprar">
        </div>

</div>
                             <!--    </div> -->
                                <!-- /Etiqueta flexbox similar a col-md-6 -->
                            <?php
                            }
                            ?>
                        </form>
                 <!--  </div> -->

                 
                 </div>
<!-- ************************* -->    
<!--  Producto -->
<!-- *********************** -->

  </div>
  <div class="pie-container">
    <div class="pie-item">
      <a href="#"  onclick="goBackFunction()"><i class="fas fa-home"></i>
      </a></div>
    <div class="pie-item">
      <a href="#" onclick="goSearchFileAndroidFunction()" ><i class="fas fa-search"></i>
      </a></div>
    <div class="pie-item">
      <a href="#" onclick="goCategoryFileAndroidFunction()" ><i class="fas fa-align-center"></i>
      </a></div>
  </div>

<?php
require 'footer.php';
?>

<?php 
/*}
ob_end_flush();*/
?>
<script type="text/javascript" src="scripts/category_detail_android.js"></script>