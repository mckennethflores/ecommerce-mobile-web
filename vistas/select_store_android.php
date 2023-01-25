<?php
/* 	*********************************
		Funciones Android
    ********************************* */
ob_start();
session_start();
require_once "../modelos/Tiendas.php";

$tiendas = new Tiendas();
$IDUSUARIO = $_SESSION['idusuario'];

  $idstore= $_GET['idstore']; 
  $_SESSION['idstore'] = $idstore; 
  $IDSTORE = $_SESSION['idstore'];

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
 
    <link rel="stylesheet" type="text/css" href="../public/css/tiendas_android.css">
  </head>
  <body class="hold-transition">
    <div class="wrapper">

 
      <!-- Left side column. contains the logo and sidebar -->
 
<style>
  .login-logo, .register-logo {
 
    margin-bottom: 0px !important;
 
}h3 {
    text-align: center;
    color: #fff;
    font-size: 1.5rem;
}.toBack {
    width: 100%;
    background: #5A7229;
    height: 40px;
    color: white;
    padding-left: 9%;
    padding-top: 3%;
}
</style>
<!--Contenido-->
      <!-- Content Wrapper. Contains page content -->
      <div class="toBack">
 <span onclick="goBackFunction(<?php echo $IDSTORE; ?>)" > <i class="fa fa-chevron-left" aria-hidden="true"></i> Regresar</span>
                </div> 
      <div class="">        
        <!-- Main content -->
        <section class="content">
            <div class="row">
              <div class="col-md-12">
                  <div class="box">
 
                    <!-- /.box-header -->
                    <!-- centro -->
 
                    <h3>Seleccione su tienda</h3>
                  
                        <form name="formulario" id="formulario" method="POST">
                        <input type="hidden" id="idstore_input" name="idstore" value="">
                       <input type="hidden" id="idusuario_input" name="idusuario" value="">
                        <div class="contenedor">
                        <?php
 
                        
                        ?>
                <!-- ************************* -->    
                <!--  Tiendas -->
                <!-- *********************** -->    
                <?php
                                $rspta=$tiendas->listarTiendas();
                                while ($reg=$rspta->fetch_object()){
                            ?>

                            <div class="elemento"><img  onclick="store_function(<?php echo $reg->idstore.','.$_SESSION['idusuario']; ?>)" src="../files/<?php echo $reg->icontienda; ?>">  </div>                                 

                            <?php
                            }
                            ?>   
                <!-- ************************* -->    
                <!--  /Tiendas -->
                <!-- *********************** -->   
   

<style>
#formulario > div > div:nth-child(10) {
 /*    margin-left: 34%; */
}.skin-green .wrapper, .skin-green .main-sidebar, .skin-green .left-side {
    background-color: #73A904;
}body {
    background-color: #73A904;
}
</style>
</div>
       
                        </form>
             
                  
                    <!--Fin centro -->
                  </div><!-- /.box -->
              </div><!-- /.col -->
          </div><!-- /.row -->
      </section><!-- /.content -->

    </div><!-- /.content-wrapper -->
  <!--Fin-Contenido-->
<?php

require 'footer.php';
?>

<?php 
/*}
ob_end_flush();*/
?>
<script type="text/javascript" src="scripts/select_store_android.js"></script>
<script type="text/javascript">

/* $(document).ready(function(){

      var height = $(window).height();

      $('.wrapper').height(height);
});
 */
</script>

