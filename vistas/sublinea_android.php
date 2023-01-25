<?php
    /**********************************
      Funciones Android
    ********************************* */
    session_start();
    require_once "../modelos/SubLinea.php";
    $IDUSUARIO = $_SESSION['idusuario'];
    $sublinea = new SubLinea();
    //UPDATE STOCK
     $idstore = $_GET['idstore'];
     $idlinea = $_GET['idlinea'];
    
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
    <link href="../public/css/fontawesomeiconos.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../public/css/general.css">
    <link rel="stylesheet" type="text/css" href="../public/css/sublinea.css">
  </head>
  <body>
            <div class="header-cont">
                    <div class="header flex-container">
                      <div class="flex-item"> 
                      <a href="#" onclick="goBack()" >
          <i class="fas fa-chevron-left"></i> Atras
        </a>
                      </div>
                      <div class="flex-item"> 
                        <span>
                       
                        </span>
                      </div>
                      <div class="flex-item"> 
                         
                      </div>
                    </div>
            </div>            
            <!--   Cabecera del nuevo diseño -->
                <form name="formulario" id="formulario" method="POST">
                        <input name="idusuario" id="idusuario_input" type="hidden" value="<?php echo $IDUSUARIO; ?>">
                        <input name="idproducto" id="idproducto_input" type="hidden" value="">
                        <input name="precio" id="precio_input" type="hidden" value="">
                        <input name="cantidad" id="cantidad_input" type="hidden" value="1">
                        <!-- Agregamos la etiqueta responsive flexbox -->
                      <div class="content">
                      <!-- ******************* Linea ******************-->
                        <ul id="listCategory">
                          <?php
                          if($idlinea == 34){
                            $rspta = $sublinea->listSubLineaSanValentin();

                              while ($reg=$rspta->fetch_object()){
                                ?>
                                <a href="producto_sublinea.php?idstore=<?php echo $idstore; ?>&idsublinea=<?php echo $reg->idproductosublinea; ?>"><li><?php echo $reg->nomproductosublinea; ?></li></a>
                                <?php
                                    }
                          }else{

                          
                              $rspta = $sublinea->listSubLinea($idlinea);

                              while ($reg=$rspta->fetch_object()){
                          ?>
                          <a href="producto_sublinea.php?idstore=<?php echo $idstore; ?>&idsublinea=<?php echo $reg->idproductosublinea; ?>"><li><?php echo $reg->nomproductosublinea; ?></li></a>
                          <?php
                              }
                        }
                          ?>
                        </ul>
                      </div>
                  </form>
    <div class="pie-container">
        <div class="pie-item">
        <a href="#" onclick="goBackFunction(<?php echo $idstore ?>)" ><i class="fas fa-home "></i>
        </a>
        </div>
        <div class="pie-item">
        <a href="#" onclick="goSearchFileAndroidFunction(<?php echo $idstore ?>) ><i class="fas fa-search "></i>
        </a>
        </div>
        <div class="pie-item">
        <a href="#"><i class="fas fa-align-center icon_disabled"></i>
        </a>
        </div>
    </div>
<?php
require 'footer.php';
?>
<script type="text/javascript" src="scripts/sublinea.js"></script>