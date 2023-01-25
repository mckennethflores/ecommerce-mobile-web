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
                    <div class="box-header with-border">
                      <h1 class="box-title">Producto <button class="btn btn-success" id="btnagregar" onclick="mostrarform(true)"><i class="fa fa-plus-circle"></i> Agregar</button></h1>
                        <div class="box-tools pull-right">
                        </div>
                    </div>
                    <div class="panel-body table-responsive" id="listadoregistros">
                        <table id="tbllistado" class="table table-striped table-bordered table-condensed table-hover">
                          <thead>
                            <th>Opciones</th>
                            <th>Nombre</th>
                            <th>Codigo</th>
                            <th>Tienda</th>
                            <th>Imagen</th>
                            <th>Tienda</th>
                            <th>Estado</th>
                          </thead>
                          <tbody>                            
                          </tbody>
                          <tfoot>
                            <th>Opciones</th>
                            <th>Nombre</th>
                            <th>Codigo</th>
                            <th>Tienda</th>
                            <th>Tienda</th>
                            <th>Estado</th>
                          </tfoot>
                        </table>
                    </div>
                    <div class="panel-body"   id="formularioregistros">
                        <form name="formulario" id="formulario" method="POST">
                          <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                          <input type="hidden" name="idproducto" id="idproducto">
                            <label>Linea:</label>
                            <select id="idlinea" name="idlinea" class="form-control selectpicker" data-live-search="true" required></select>
                          </div>
                          <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <label>SubLinea:</label>
                            <select id="idproductosublinea" name="idproductosublinea" class="form-control selectpicker" required></select>
                          </div>
                          <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <label>Unidad Medida:</label>
                            <select id="idunidadmedida" name="idunidadmedida" class="form-control selectpicker" data-live-search="true" required></select>
                          </div>                          
<!--                           <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <label>Codigo:</label>
                            <input type="text" class="form-control" name="codproducto" id="codproducto" maxlength="20"placeholder="CodProducto" >
                          </div> -->
<!--                           <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <label>Nombre:</label>
                            <input type="text" class="form-control" name="nomproducto" id="nomproducto" maxlength="100" placeholder="Nombre">
                          </div> -->
                          <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <label>Nombre Corto:</label>
                            <input type="text" class="form-control" name="nomproductocorto" id="nomproductocorto" maxlength="70"  placeholder="Nombre" >
                          </div>
                          <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <label>Codigo de Barra:</label>
                            <input type="text" class="form-control" name="codigobarra" id="codigobarra" maxlength="256" placeholder="Codigo de barra">
                          </div>
                          <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <label>Imagen:</label>
                            <input type="file" class="form-control" name="imagen" id="imagen">
                            <input type="hidden" name="imagenactual1" id="imagenactual1">
                            <img src="" width="150px" height="120px" id="imagenmuestra1">
                          </div>
<!--                           <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <label>Imagen Grande:</label>
                            <input type="file" class="form-control" name="imagengrande" id="imagengrande">
                            <input type="hidden" name="imagenactual2" id="imagenactual2">
                            <img src="" width="150px" height="120px" id="imagenmuestra2">
                          </div> -->
<!--                           <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12 ocultar">
                            <label>Estado:</label>
                            <select id="idproductoestado" name="idproductoestado" class="form-control selectpicker" data-live-search="true" required></select>
                          </div> -->
<!--                           <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <label>Proveedor:</label>
                            <select id="idanexo_proveedor" name="idanexo_proveedor" class="form-control selectpicker" data-live-search="true" required></select>
                          </div> -->
                          <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <label>Precio:</label>
                            <input type="text" class="form-control" name="valorventa" id="valorventa" step=".01">
                          </div>
                          <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <label>Observacion:</label>
                            <input type="text" class="form-control" name="observacion" id="observacion" maxlength="256" placeholder="Observacion">
                          </div>
                          <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <label>Marca:</label>
                            <select id="idmarca" name="idmarca" class="form-control selectpicker"  data-live-search="true" required></select>
                          </div>                                                                 
                          <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <label>Precio Promocion:</label>
                            <input type="text" class="form-control" name="preciopromocion" id="preciopromocion" maxlength="256" placeholder="PrecioPromocion">
                          </div>                                                                                                                                  
                          <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <label>Stock:</label>
                            <input type="text" class="form-control" name="stock" id="stock" maxlength="25" placeholder="Stock">
                          </div>                                                                                                                                  
                          <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <button class="btn btn-primary" type="submit" id="btnGuardar"><i class="fa fa-save"></i> Guardar</button>
                            <button class="btn btn-danger" onclick="cancelarform()" type="button"><i class="fa fa-arrow-circle-left"></i> Cancelar</button>
                          </div>
                        </form>
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
<script type="text/javascript" src="scripts/producto-all-store.js"></script>
<?php 
}
//ob_end_flush();
?>