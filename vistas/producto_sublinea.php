<?php
/* 	*********************************
		Funciones Android
    ********************************* */
ob_start();
session_start();
require_once "../modelos/Producto_Android.php";
  $IDUSUARIO = $_SESSION['idusuario'];
  $productoandroid = new Producto_Android();
  //UPDATE STOCK
  $idstore= $_GET['idstore'];
  $idsublinea = $_GET['idsublinea']; 
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
    <link rel="stylesheet" href="../public/css/general.css">
    <link href="../public/css/fontawesomeiconos.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../public/css/foundation.css">
    <link rel="stylesheet" type="text/css" href="../public/css/producto_sublinea.css">    
  </head>
  <body>
  <!-- HEAD -->
            <div class="header-cont">
                    <div class="header flex-container">
                      <div class="flex-item"> 
                      <a href="#" onclick="goBack()" >
          <i class="fas fa-chevron-left"></i> Atras
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
            </div>

            <form name="formulario" id="formulario" method="POST">
                  <input name="idusuario" id="idusuario_input" type="hidden" value="<?php echo $IDUSUARIO; ?>">
                  <input name="idproducto" id="idproducto_input" type="hidden" value="">
                  <input name="precio" id="precio_input" type="hidden" value="">
                  <input name="cantidad" id="cantidad_input" type="hidden" value="1">
                  <!-- Agregamos la etiqueta responsive flexbox -->
              <div class="content">
                  <h3 class="productos_" id="nomsublinea"></h3>  
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
        <a href="#" onclick="goCategoryFileAndroidFunction(<?php echo $idstore ?>)" ><i class="fas fa-align-center"></i></a>
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
      <script type="text/javascript" src="scripts/productosublinea.js"></script>
    </body>
  </html>