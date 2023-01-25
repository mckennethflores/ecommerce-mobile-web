<?php
/* 	*********************************
		Funciones Android
    ********************************* */


require_once "../modelos/Usuario.php";
  

if (strlen(session_id()) < 1) 
  session_start();
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
    <!-- AdminLTE Skins -->
    <link rel="stylesheet" href="../public/css/_all-skins.min.css">
    <link rel="apple-touch-icon" href="../public/img/apple-touch-icon.png">
    <link rel="shortcut icon" href="../public/img/favicon.ico">
    <!-- DATATABLES -->
    <link rel="stylesheet" type="text/css" href="../public/datatables/jquery.dataTables.min.css">    
    <link href="../public/datatables/buttons.dataTables.min.css" rel="stylesheet"/>
    <link href="../public/datatables/responsive.dataTables.min.css" rel="stylesheet"/>
    <link rel="stylesheet" type="text/css" href="../public/css/bootstrap-select.min.css">
    <link rel="stylesheet" type="text/css" href="../public/css/general.css">
  </head>
  <body class="hold-transition skin-green sidebar-mini">
    <div class="wrapper">
      <header class="main-header">
        <!-- Logo -->
        <a href="escritorio.php" class="logo">
          <!-- mini logo for sidebar mini 50x50 pixels -->
          <span class="logo-mini"><?= NOMBRE_EMPRESA ?> </span>
          <!-- logo for regular state and mobile devices -->
          <span class="logo-lg"><b><?= NOMBRE_EMPRESA ?></b></span>
        </a>
        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top" role="navigation">
          <!-- Sidebar toggle button-->
          <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Navegación</span>
          </a>
          <!-- Navbar Right Menu -->
          <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
              <!-- Messages: style can be found in dropdown.less-->
              <li class="dropdown user user-menu">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <img src="../files/usuarios/<?php echo $_SESSION['imagenusuario']; ?>" class="user-image" alt="<?php echo $_SESSION['nomusuario']; ?>">
                  <span class="hidden-xs"><?php echo $_SESSION['nomusuario']; ?></span>
                </a>
                <ul class="dropdown-menu">
                  <!-- User image -->
                  <li class="user-header">
                  <img src="../files/usuarios/<?php echo $_SESSION['imagenusuario']; ?>" class="img-circle" alt="<?php echo $_SESSION['nomusuario']; ?>">
                    <p>
                    <?php echo $_SESSION['nomusuario']; ?>
                    </p>
                  </li>
                  <!-- Menu Footer-->
                  <li class="user-footer">
                    
                    <div class="pull-right">
                      <a href="../ajax/usuario.php?op=salir" class="btn btn-default btn-flat">Cerrar</a>
                    </div>
                  </li>
                </ul>
              </li>
            </ul>
          </div>
        </nav>
      </header>
      <!-- Left side column. contains the logo and sidebar -->
      <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">       
          <!-- sidebar menu: : style can be found in sidebar.less -->
          <ul class="sidebar-menu">
            <li class="header"></li>
            <li id="mEscritorio">
              <a href="escritorio.php">
                <i class="fa fa-tasks"></i> <span>Escritorio</span>
              </a>
            </li>
            <li id="mGestion" class="treeview">
              <a href="#">
                <i class="fa fa-laptop"></i>
                <span>Gestión</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li id="lPedidos"><a href="pedidos.php"><i class="fa fa-circle-o"></i> Pedidos</a></li>
                <li id="lPedidosGeneral"><a href="pedidos_general.php"><i class="fa fa-circle-o"></i> Pedidos tiendas</a></li>
                <li id="lZonas"><a href="zonas.php"><i class="fa fa-circle-o"></i> Zonas / Tarifas</a></li>
              </ul>
            </li>
            <li id="mAlmacen" class="treeview">
              <a href="#">
                <i class="fa fa-th"></i>
                <span>Almacen</span>
                 <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li id="lLineas"><a href="linea.php"><i class="fa fa-circle-o"></i> Linea</a></li>
                <li id="lSublineas"><a href="sublinea.php"><i class="fa fa-circle-o"></i> Sublinea</a></li>
                <li id="lMarcas"><a href="marca.php"><i class="fa fa-circle-o"></i> Marca</a></li>
                <li id="lProductos"><a href="producto.php"><i class="fa fa-circle-o"></i> Productos</a></li>
                <li id="lProductosAllStore"><a href="producto-all-store.php"><i class="fa fa-circle-o"></i> Productos de todas las tiendas</a></li>

              </ul>
            </li>
            <li id="mPerfil" class="treeview">
              <a href="#">
                <i class="fa fa-folder"></i>
                <span>Perfil</span>
                 <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li id="lUsuarios"><a href="usuario.php"><i class="fa fa-circle-o"></i> Usuarios</a></li>
              </ul>
            </li>            
            <li>
              <a target="_blank" href="http://www.frsystem.com.pe/">
                <i class="fa fa-plus-square"></i> <span>Pagina Web</span>
                <small class="label pull-right bg-red">PDF</small>
              </a>
            </li>        
          </ul>
        </section>
      </aside>