<?php
ob_start();
session_start();
$_SESSION["idusuario"];
if (!isset($_SESSION["nomusuario"]))
{
  header("Location: login.php");
}
else
{
require 'header.php';
if ($_SESSION['pedidos']==1)
{
?>
      <div class="content-wrapper">
        <section class="content">
            <div class="row">
              <div class="col-md-12">
                  <div class="box">
                    <div class="box-header with-border">
                          <h1 class="box-title">Zonas
                           <button class="btn btn-success" id="btnagregar" onclick="mostrarform(true)"><i class="fa fa-plus-circle"></i> Agregar</button></h1>
                        <div class="box-tools pull-right">
                        </div>
                    </div>
                    <div class="panel-body table-responsive" id="listadoregistros">
                        <table id="tbllistado" class="table table-striped table-bordered table-condensed table-hover">
                          <thead>
                            <th>Opciones</th>
                            <th>Distrito</th>
                            <th>Zona</th>
                          </thead>
                          <tbody>                            
                          </tbody>
                          <tfoot>
                            <th>Opciones</th>
                            <th>Distrito</th>
                            <th>Zona</th>
                          </tfoot>
                        </table>
                    </div>
                    <div class="panel-body" id="formularioregistros">
                        <form name="formulario" id="formulario" method="POST">
                          <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <label>Distrito:</label>
                            <input type="hidden" name="id" id="id">
                            <select id="iddistrito" name="iddistrito" class="form-control selectpicker" data-live-search="true" required></select>
                          </div>
                          <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <label>Nombre:</label>
                            <input type="text" class="form-control" name="nombre" id="nombre" maxlength="100" placeholder="Nombre" >
                          </div> 
                          <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <label>Desde (Latitud/Longitud):</label>
                            <input type="text" class="form-control"  name="desde" id="desde"  placeholder="Desde">
                            <input type="button" name="desde" id="desde" class="btn-success" value="..." onclick="fGps1();">
                          </div>
                          <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <label>Hasta (Latitud/Longitud):</label>
                            <input type="text" class="form-control"  name="hasta" id="hasta"  placeholder="Hasta">
                            <input name="bGra" type="button" id="bGra" class="btn-success" value="..." onclick="fGps1();">
                          </div>                                     
                          <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <button class="btn btn-primary" type="submit" id="btnGuardar"><i class="fa fa-save"></i> Guardar</button>
                            <button class="btn btn-danger" onclick="cancelarform()" type="button"><i class="fa fa-arrow-circle-left"></i> Cancelar</button>
                          </div>
                        </form>
                    </div>
                  </div><!-- /.box -->
              </div><!-- /.col -->
          </div><!-- /.row -->
      </section><!-- /.content -->
    </div>
<?php
}else
{
  require 'noacceso.php';
}
require 'footer.php';
?>

<script type="text/javascript" src="scripts/zonas.js"></script>

<?php 
}
ob_end_flush();
?>