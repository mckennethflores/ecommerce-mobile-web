<?php

//header ('Location: producto_android.php?idstore=321314');
/* 	*********************************
		Funciones Android
    ********************************* */
ob_start();
session_start();
require_once "../modelos/Producto_Android.php";
/*
Esta es la sesión que se creo con microtime, para evitar el inicio de sesión
*/


 if(isset($_SESSION['idusuario_sinlogueo'])){
  $IDUSUARIO = $_SESSION['idusuario_sinlogueo'];
 }else{
  $_SESSION['idusuario_sinlogueo'] = round(microtime(true));
 }

//$IDUSUARIO =$_SESSION['idusuario_sinlogueo'];
 // $IDUSUARIO = $_SESSION['idusuario'];
  $productoandroid = new Producto_Android();
  //UPDATE STOCK
   $idstore= $_GET['idstore'];
/*   $_SESSION['idstore'] = $idstore;  $IDSTORE = $_SESSION['idstore']; */ /*   var_dump($IDSTORE); */
//ACTUALIZAMOS TODOS LOS PRODUCTOS DE LA BASE DE DATOS EXTERNA = llama modelos
  //$productoandroid->actualizarStockBce($idstore);
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
    <link rel="stylesheet" href="../public/css/general.css">
    <link href="../public/css/fontawesomeiconos.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../public/css/swiper.min.css">
    <script src="../public/js/swiper.min.js"></script>
    <link rel="stylesheet" href="../public/css/foundation.css">
    <link rel="stylesheet" type="text/css" href="../public/css/producto_android.css">    
  </head>
  <body>
  <!-- HEAD -->
            <div class="header-cont">
                    <div class="header flex-container">
                      <div class="flex-item"> 
                          <a href="#"  onclick="openMyAccount_func(<?php echo $idstore ?>)">
                          <i class="fas fa-bars"></i>
                          </a>
                      </div>
                      <div class="flex-item"> 
                        <span>
                          <a href="#" onclick="thereProductsTempAdded(<?php echo $idstore; ?>, <?php echo $IDUSUARIO; ?>)">
                            Elegir Tienda <i class="fas fa-sort-down"></i>
                          </a>
                        </span>
                      </div>
                      <div class="flex-item"> 
                      <div class="cart-resume-counter ocultar"><span>0</span></div>
                        <a href="#" onclick="abrirpagconfirm(<?php echo $idstore ?>)">
                          <i class="fas fa-shopping-cart"></i>
                        </a>
                      </div>
                    </div>
                    <div class="boxAlert">
                      <a onclick="hiddenBoxAlert()">
                        <i class="fa fa-times iconClose" aria-hidden="true"></i>
                      </a> Delivery 
                    </div>
            </div>
            
            <form name="formulario" id="formulario" method="POST">
                  <input name="idusuario" id="idusuario_input" type="hidden" value="<?php echo $IDUSUARIO; ?>">
                  <input name="idproducto" id="idproducto_input" type="hidden" value="">
                  <input name="precio" id="precio_input" type="hidden" value="">
                  <input name="cantidad" id="cantidad_input" type="hidden" value="1">
                  <!-- Agregamos la etiqueta responsive flexbox -->
              <div class="content">
                  <div class="swiper-container">
                    <div class="swiper-wrapper">
                     <!--<div class="swiper-slide">
                          <img src="../files/slide/slide6.png" width="100%" alt="">
                        </div>
                        <div class="swiper-slide">
                          <img src="../files/slide/slide5.png" width="100%" alt="">
                        </div>
                        <div class="swiper-slide">
                          <img src="../files/slide/slide4.png" width="100%" alt="">
                        </div>-->
                        <div class="swiper-slide"><img src="../files/slide/slide1.png" width="100%" alt=""></div>
                        <div class="swiper-slide"><img src="../files/slide/slide2.png" width="100%" alt=""></div>
                        <div class="swiper-slide"><img src="../files/slide/slide3.png" width="100%" alt=""></div>
                    </div>
                    <div class="swiper-pagination"></div>
                    <div class="swiper-scrollbar"></div>
                  </div>

                  <div class="titleCategoryMainProducts">
                      <h2> <?= NOMBRE_EMPRESA ?></h2>
                      <div class="lineProducts"></div>
                  </div>
                  <div class="contentCategoryMainProducts" id="contentCategoryMainProducts">
                  </div>

                  <h3 class="productos_">Productos mas vendidos</h3>  
                <!-- ********** PRODUCT *************** -->   
                <div class="container-product" id="container-product">
                <!-- PRODUCT LOADING -->
                <div class="product-loading">
                  <div class="product-imagen"></div>
                    <div class="_2JyJx">
                      <span class="_3yyG6"></span>
                      <span class="_3yyG6"></span>
                      <span class="_3yyG6"></span>
                    </div>
                  </div>
                  <div class="product-loading2">
                    <div class="product-imagen"></div>
                    <div class="_2JyJx">
                      <span class="_3yyG6"></span>
                      <span class="_3yyG6"></span>
                      <span class="_3yyG6"></span>
                     </div>
                  </div>                              
                </div>
                <!-- ********** /PRODUCT *************** -->    
              </div>
            </form>
 <!-- FOOTER -->
  <div class="pie-container">
    <div class="pie-item">
      <a href="#" ><i class="fas fa-home icon_disabled"></i>
      </a>
      </div>
    <div class="pie-item">
      <a href="#" onclick="goSearchFileAndroidFunction(<?php echo $idstore ?>) " ><i class="fas fa-search"></i>
      </a>
      </div>
    <div class="pie-item">
     
      <!-- <a href="#"   ><i class="fas fa-align-center icon_disabled"></i></a> -->
       <a href="#" onclick="goLinea(<?php echo $idstore ?>)" ><i class="fas fa-align-center"></i></a>
    </div>
    </div>
    <script src="../public/js/jquery-3.3.1.min.js"></script>
    <script src="../public/js/bootstrap.min.js"></script>
    <script src="../public/js/bootbox.min.js"></script>
    <script src="../public/js/app.min.js"></script>
    <script type="text/javascript" src="scripts/general.js"></script>
    <script src="../public/js/jquery.2.1.3.min.js"></script>
    <script src="../public/js/foundation.min.js"></script>
    <script src="../public/js/foundation.js"></script>
    <script type="text/javascript" src="scripts/producto_android.js"></script>
    </body>
  </html>

