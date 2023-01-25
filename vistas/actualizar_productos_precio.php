<?php
ob_start();
session_start();

if (!isset($_SESSION["nomusuario"]))
{
  header("Location: login.php");
}
else
{
require 'header.php';
if ($_SESSION['productos']==1)
{
?>
      <div class="content-wrapper">
        <section class="content">
            <div class="row">
              <div class="col-md-12">
                  <div class="box">
                    <div class="panel-body" id="formularioregistros">
                        <h2>Agregar estock a las tiendas</h2>
                       <ul>
                           <li> <a target="_blank" href="http://chulloweb.com/acmp/bce-v1.2/api/stockeartiendas.php?idt=321315">TIENDA N° 1</a></li>
                           <li> <a target="_blank" href="http://chulloweb.com/acmp/bce-v1.2/api/stockeartiendas.php?idt=321316">TIENDA N° 2</a></li>
                           <li> <a target="_blank" href="http://chulloweb.com/acmp/bce-v1.2/api/stockeartiendas.php?idt=321317">TIENDA N° 3</a></li>
                           <li> <a target="_blank" href="http://chulloweb.com/acmp/bce-v1.2/api/stockeartiendas.php?idt=321318">TIENDA N° 4</a></li>
                           <li> <a target="_blank" href="http://chulloweb.com/acmp/bce-v1.2/api/stockeartiendas.php?idt=321320">TIENDA N° 6</a></li>
                           <li> <a target="_blank" href="http://chulloweb.com/acmp/bce-v1.2/api/stockeartiendas.php?idt=329612">TIENDA N° 7</a></li>
                           <li> <a target="_blank" href="http://chulloweb.com/acmp/bce-v1.2/api/stockeartiendas.php?idt=321321">TIENDA N° 8</a></li>
                           <li> <a target="_blank" href="http://chulloweb.com/acmp/bce-v1.2/api/stockeartiendas.php?idt=374537">TIENDA N° 10</a></li>
                           <li> <a target="_blank" href="http://chulloweb.com/acmp/bce-v1.2/api/stockeartiendas.php?idt=321313">TIENDA RIMAC</a></li>
                           <li> <a target="_blank" href="http://chulloweb.com/acmp/bce-v1.2/api/stockeartiendas.php?idt=321314">TIENDA CGE</a></li>
                       </ul>
                       <h2>Agregar precio, stock a los productos de las tiendas</h2>
                       <ul>
                           <li> <a target="_blank" href="http://chulloweb.com/acmp/bce-v1.2/api/test.php?idt=321315">TIENDA N° 1</a></li>
                           <li> <a target="_blank" href="http://chulloweb.com/acmp/bce-v1.2/api/test.php?idt=321316">TIENDA N° 2</a></li>
                           <li> <a target="_blank" href="http://chulloweb.com/acmp/bce-v1.2/api/test.php?idt=321317">TIENDA N° 3</a></li>
                           <li> <a target="_blank" href="http://chulloweb.com/acmp/bce-v1.2/api/test.php?idt=321318">TIENDA N° 4</a></li>
                           <li> <a target="_blank" href="http://chulloweb.com/acmp/bce-v1.2/api/test.php?idt=321320">TIENDA N° 6</a></li>
                           <li> <a target="_blank" href="http://chulloweb.com/acmp/bce-v1.2/api/test.php?idt=329612">TIENDA N° 7</a></li>
                           <li> <a target="_blank" href="http://chulloweb.com/acmp/bce-v1.2/api/test.php?idt=321321">TIENDA N° 8</a></li>
                           <li> <a target="_blank" href="http://chulloweb.com/acmp/bce-v1.2/api/test.php?idt=374537">TIENDA N° 10</a></li>
                           <li> <a target="_blank" href="http://chulloweb.com/acmp/bce-v1.2/api/test.php?idt=321313">TIENDA RIMAC</a></li>
                           <li> <a target="_blank" href="http://chulloweb.com/acmp/bce-v1.2/api/test.php?idt=321314">TIENDA CGE</a></li>
                       </ul>                       
                    </div>
                    <!--Fin centro -->
                  </div><!-- /.box -->
              </div><!-- /.col -->
          </div><!-- /.row -->
      </section><!-- /.content -->

    </div><!-- /.content-wrapper -->
  <!--Fin-Contenido-->
<?php
}else
{
  require 'noacceso.php';
}
require 'footer.php';
?>

<?php 
/*}
*/
?>
<script type="text/javascript" src="scripts/actualizar_productos_precio.js"></script>
<?php 
}
//ob_end_flush();
?>