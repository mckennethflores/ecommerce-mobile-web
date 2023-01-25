<?php
ob_start();
session_start();
$IDUSUARIO = $_SESSION['idusuario']; 
$idstore= $_GET['idstore']; 
?>
<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Libro de Reclamos</title>
  <link rel="stylesheet" type="text/css" href="../public/datatables/jquery.dataTables.min.css">    
  <link href="../public/datatables/buttons.dataTables.min.css" rel="stylesheet"/>
  <link href="../public/datatables/responsive.dataTables.min.css" rel="stylesheet"/>
  <link rel="stylesheet" type="text/css" href="../public/css/bootstrap-select.min.css">
  <link rel="stylesheet" href="../public/css/general.css">
  <link href="../public/css/fontawesomeiconos.min.css" rel="stylesheet">
  <link rel="stylesheet" href="../public/css/my_addresses_add.css">  
  <link rel="stylesheet" href="../public/css/bootstrap.min.css">
  <link rel="stylesheet" href="../public/css/font-awesome.css">
  <link rel="stylesheet" href="../public/css/AdminLTE.min.css">
  <link rel="stylesheet" href="../public/css/blue.css">
  <link rel="stylesheet" href="../public/css/libro.css">

</head>

<body>
  <!--   Cabecera del nuevo diseño -->
  <div class="header-cont">
    <div class="header flex-container">
      <div class="flex-item">
        <a href="#" onclick="goBackClaimBook(<?php echo $idstore; ?>)">
        <i class="fas fa-chevron-left"></i> Mi cuenta
        </a>
      </div>
      <div class="flex-item">
        <img src="../files/logosmall.png" width="70">
      </div>
    </div>
  </div>

  <div class="content_my_account">
    <form name="formulario" id="formulario" method="POST">
    <input name="idusuario" id="idusuario" type="hidden" value="<?php echo $IDUSUARIO; ?>">
    <input name="idstore" id="idstore" type="hidden" value="<?php echo $idstore; ?>">
        <!-- Titulos -->
        <div class="box-header">
          <h3 class="text-center">Libro de Reclamaciones</h3>
          <span>Información sobre la recopilación y tratamiento de los datos para Quejas y Reclamos</span>
          <div class="clearfix"></div>
        </div>
      <!--   Bloque Datos de la Persona que presenta el Reclamo -->
        <div class="box box-primary">            
          <div class="box-body">
              <h4 class="box-title">Datos de la Persona que presenta el Reclamo</h4>
            <!-- Tienda -->
            <div class="form-group">
              <label>Tienda</label>
              <select class="form-control" id="idtienda" name="idtienda"></select>
            </div>
            <!--  DNI / RUC -->
            <div class="form-group">
              <label>DNI / RUC</label>
              <input type="text" class="form-control" placeholder="DNI / RUC" id="docdni" name="docdni">
            </div>
            <!-- Nombre -->
            <div class="form-group">
              <label>Nombre</label>
              <input type="text" class="form-control" placeholder="Nombre" id="nombre" name="nombre">
            </div>
            <!-- Apellidos -->
            <div class="form-group">
              <label>Apellidos</label>
              <input type="text" class="form-control" placeholder="Apellidos" id="apellidos" name="apellidos">
            </div>
            <!-- Dirección -->
            <div class="form-group">
              <label>Dirección</label>
              <input type="text" class="form-control" placeholder="Dirección" id="direccion" name="direccion">
            </div>
            <!-- Departamento -->
<!--             <div class="form-group">
              <label>Departamento</label>
              <select class="form-control" id="departamento" name="departamento">
                <option>option 1</option>
                <option>option 2</option>
              </select>
            </div> -->
            <!-- Provincia -->
<!--             <div class="form-group">
              <label>Provincia</label>
              <select class="form-control" id="idprovincia" name="idprovincia">
                <option>option 1</option>
                <option>option 2</option>
              </select>
            </div> -->
            <!-- Distrito -->
            <div class="form-group">
              <label>Distrito</label>
              <select class="form-control" id="iddistrito" name="iddistrito">
              </select>
            </div>            
            <!-- Telefono -->
            <div class="form-group">
              <label>Telefono</label>
              <input type="text" class="form-control" placeholder="Telefono" id="telefono" name="telefono">
            </div>
            <!-- Email -->
            <div class="form-group">
              <label>Email</label>
              <input type="text" class="form-control" placeholder="Email" id="email" name="email">
            </div>
          </div>
        </div>
      <!-- Bloque Información General -->
      <div class="box box-primary">
          <div class="box-header with-border">
            <h3 class="box-title">Información General</h3>
          </div>
          <div class="box-body">
            <!--   Monto Reclamado -->
            <div class="form-group">
              <label>Monto Reclamado S/</label>
              <input type="text" class="form-control" placeholder="S/" id="monto" name="monto">
            </div>
            <!-- Marca -->
            <div class="form-group">
              <label>Marca</label>
              <input type="text" class="form-control" placeholder="Marca" id="marca" name="marca">
            </div>
            <!-- Tipo de Reclamo -->
            <div class="form-group">
              <label>Tipo de Reclamo</label>
              <select class="form-control" id="tiporeclamo" name="tiporeclamo">
              <option value="demo" selected >Demo</option>
              <!-- <option value="0" selected disabled>Seleccione tipo de reclamo</option> -->
              <option value="Queja por trato del personal">Queja por trato del personal</option>
              <option value="Atención preferencial">Atención preferencial</option>
              <option value="Incidentes Externos">Incidentes Externos</option>
              <option value="Información-Publicidad">Información-Publicidad</option>
              <option value="Mantenimiento">Mantenimiento</option>
              <option value="Calidad de producto de alimentación">Calidad de producto de alimentación</option>
              <option value="Calidad de producto de no alimentación">Calidad de producto de no alimentación</option>
              <option value="Seguridad">Seguridad</option>
              <option value="Servicio inadecuado">Servicio inadecuado</option>
              <option value="Servicios técnicos">Servicios técnicos</option>
              <option value="Tarjetas Externas">Tarjetas Externas</option>
              </select>
            </div>
            <!-- Motivo -->
            <div class="form-group">
              <label>Motivo</label>
              <select class="form-control" id="motivo" name="motivo">
              <option value="demo" selected >Demo</option>
              <!-- <option value="0" selected disabled>Seleccione motivo</option> -->
              <option value="Atención inadecuada">Atención inadecuada</option>
              <option value="Intervención inapropiada">Intervención inapropiada</option>
              </select>
            </div>
            <!-- Descripción del producto -->
            <div class="form-group">
              <label>Descripción del producto</label>
              <input type="text" class="form-control" placeholder="Dirección" id="descripcion" name="descripcion">
            </div>
          </div>
      </div>
      <!--  Bloque Detalle del Reclamo -->
      <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Detalle del Reclamo</h3>
            </div>
        <!-- Método de pago -->
        <div class="metododepago">
          <p>Método de pago</p>
          <div class="metododepago-border">
            <div class="metododepago-container">
              <div class="metododepago-item">
                  <label for="reclamo" id="efectivo_div" class="radio-label btnLogin label_contratar">Reclamo</label>
                  <input  required type="radio" id="reclamo"  name="claimtype" value="Reclamo" class="radio" >
              </div>
              <div class="metododepago-item" >
                  <label for="queja" class="radio-label btnLogin label_trabajo" id="tarjeta_div">Queja</label>
                  <input  required type="radio" id="queja" name="claimtype" value="Queja" class="radio" checked="">
              </div>
            </div>
          </div>
        <!-- Detalle del Reclamo -->
        <div class="form-group">
          <label>Detalle del Reclamo</label>
          <textarea class="form-control" rows="3" placeholder="Detalle del Reclamo" id="detreclamo" name="detreclamo"></textarea>
        </div>
        <!-- Numero de pedido -->
        <div class="form-group">
          <label>Pedido</label>
          <textarea class="form-control" rows="3" placeholder="Numero de Pedido" id="numpedido" name="numpedido"></textarea>
        </div>
        <!-- Boton Enviar -->
        <div class="box-footer">
          <button class="btn btn-success" type="submit" id="btnGuardar">Enviar Reclamo</button>
        </div>      
        <!-- Leyenda -->
        <div class="container">
          <div class="row">
            <div class="col-md-12">
              <div class="col-md-12 col-sm-12 contact-form">
                <p><strong>RECLAMO:</strong> Disconformidad relacionada a los productos o servicios. </p>
                <p><strong>QUEJA:</strong> Disconformidad no relacionada a los productos o servicios o malestar o descontento
                  respecto a la atención al público.</p>
                <p>La formulación del reclamo no impide acudir a otras vías de solución de controversias ni es requisito
                  previo para interponer una denuncia ante el INDECOPI.</p>
                <p>El provedor deberá dar respuesta al reclamo en un plazo no mayor de treinta (30) días calendario, pudiendo
                  ampliar el plazo hasta por treinta (30) días más, previa comunicación al consumidor.</p>
              </div>
            </div>
          </div>
        </div>        
      </div>
    </form>
  </div>
</body>
<?php
require 'footer.php';
?>
    <script type="text/javascript" src="scripts/libro_reclamaciones.js"></script>