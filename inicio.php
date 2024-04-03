<?php
include 'db.php';

session_start();

// Verificar si el usuario ha iniciado sesión
if (!isset($_SESSION['user_id'])) {
    // Redirigir a index.php si el usuario no ha iniciado sesión
    header("Location: index.php");
    exit();
}

$idUsuario = $_SESSION['user_id'];

// Verificar el rol del usuario
$queryRol = "SELECT id_rol FROM usuariosroles WHERE id_usuarios = '$idUsuario'";
$resultRol = $conn->query($queryRol);

if ($resultRol && $rowRol = $resultRol->fetch_assoc()) {
    $idRol = $rowRol['id_rol'];
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Poder Judicial del Estado de Veracrúz</title>

  <link rel="shortcut icon" href="logo.jpg">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <style>
    <?php
      // Lógica para ocultar elementos del menú según el rol
      if ($idRol == 1) {
          // Usuario de rol 1
          echo '.nav-item-rol1 { display: none; }';
      } elseif ($idRol == 2) {
          // Usuario de rol 2
          echo '.nav-item-rol2 { display: none; }';
      }
      elseif ($idRol == 3) {
        // Usuario de rol 2
        echo '.nav-item-rol3 { display: none; }';
    }
    ?>
  </style>
</head>
<body class="hold-transition layout-top-nav">
<div class="wrapper">

 <!-- Navbar -->
<nav class="main-header navbar navbar-expand-md navbar-light navbar-white">
  <div class="container">
    <a href="inicio.php" class="navbar-brand">
      <img src="logo.jpg" alt="Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">MESA DE AYUDA</span>
    </a>

    <button class="navbar-toggler order-1" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse order-3" id="navbarCollapse">
      <!-- Left navbar links -->
      <ul class="navbar-nav">
        <li class="nav-item">
          <a href="inicio.php" class="nav-link">Inicio</a>
        </li>

        <!-- Enlace Generar Reporte -->
        <li class="nav-item nav-item-rol2 nav-item-rol3">
          <a href="generarReporte.php" class="nav-link">Generar Reporte</a>
        </li>

        <!-- Enlace Mis Reportes -->
        <li class="nav-item nav-item-rol1 ">
          <a href="sistema.php" class="nav-link">Mis Reportes</a>
        </li>

        <!-- Enlace Técnico -->
        <li class="nav-item nav-item-rol1 nav-item-rol3">
          <a href="administrador.php" class="nav-link">Técnico</a>
        </li>

        <!-- Enlace Crear Usuarios -->
        <li class="nav-item nav-item-rol2 nav-item-rol1">
          <a href="agregaUsuarios.php" class="nav-link">Crear Usuarios</a>
        </li>

        <!-- Enlace Lista de Usuarios -->
        <li class="nav-item nav-item-rol2 nav-item-rol1">
          <a href="usuarios.php" class="nav-link">Lista de Usuarios</a>
        </li>


        <!-- Enlace Eventos -->
        <li class="nav-item">
          <a href="calendario.php" class="nav-link">Eventos</a>
        </li>

        <!-- Enlace Cerrar Sesión -->
        <li class="nav-item">
          <a href="cerrar_sesion.php" class="nav-link">Cerrar Sesión</a>
        </li>
      </ul>

      <!-- Right navbar links -->
      <ul class="order-1 order-md-3 navbar-nav navbar-no-expand ml-auto">
        <!-- Messages Dropdown Menu -->
        <li class="nav-item dropdown">
          <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
            <a href="#" class="dropdown-item">
              <!-- Message Start -->
            </a>
            <!-- Message End -->
          </div>
        </li>

        <!-- Notifications Dropdown Menu -->
        <li class="nav-item dropdown">
          <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          </div>
        </li>

        <li class="nav-item">
          <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
            <i class="fas fa-th-large"></i>
          </a>
        </li>
      </ul>
    </div>
  </div>
</nav>
<!-- /.navbar -->



  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Bienvenidos a "Mesa de Ayuda</small></h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
            
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container">
        <div class="row">
          <div class="col-lg-6">
            <div class="card">
          
            </div>

            <div class="card">
              <div class="card-header">
                <h5 class="card-title m-0">¿Qué es?</h5>
              </div>
              <div class="card-body">
              <p class="card-text">Esté sistema permitirá a los usuarios 
                reportar problemas técnicos, asignar automáticamente técnicos cualificados, facilitar la
                comunicación bidireccional, generar informes periódicos  y
                  optimizar la resolución de problemas. El proyecto tiene como objetivos principales 
                  la mejora en la eficiencia operativa, la transparencia en la gestión de tickets, la
                  identificación de problemas recurrentes, y la optimización de recursos técnicos. La 
                  metodología incluye el análisis de requerimientos, desarrollo y establecimiento de un sistema de monitoreo para la mejora continua. 
                  En resumen, la iniciativa busca modernizar y agilizar la atención de problemas técnicos,
                    contribuyendo a una mayor 
                satisfacción del usuario y a la eficiencia en el Poder Judicial de la Federación.</p>
          
              </div>
            </div><!-- /.card -->
          </div>
          <!-- /.col-md-6 -->
          <div class="col-lg-6">
            <div class="card">
              <div class="card-header">
                <h5 class="card-title m-0">¿Pará qué sirve?</h5>
              </div>
              <div class="card-body">
                <p class="card-text">Esta diseñada para mejorar la coordinación y eficiencia de los servicios técnicos en La escuela del Poder Judicial en la Ciudad de Xalapa.Busca facilitar la comunicación entre los usuarios y el equipo técnico, agilizando la notificación, asignación y resolución de problemas técnicos que puedan surgir en el entorno laboral.</p>

                <img  src="enginers.jpg" alt="Equipo Técnico" width="300" height="300">
                <div class="card card-primary card-outline">
                </div>
              
              </div>
            </div>
  

      
          </div>
          <div class="card">
            <div class="card-header">
              <div class="card-header">
                <h5 class="card-title m-0">Elaborado por:</h5>
              </div>
              <div class="card-body">

                <p class="card-text">Vázquez Hernández María Marina</p>
                <p class="card-text">Hérnandez Martinez Tomy</p>
                <p class="card-text">Martinez Montero Alejandro</p>
                <p class="card-text">
                  <img  src="Equipo.png" alt="Equipo Técnico" width="200" height="200">
                </p>
              </div>
            </div>
            <div class="card-body">
            
        
            </div>
          <!-- /.col-md-6 -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->

  <!-- Main Footer -->
  <footer class="main-footer">
    <!-- Default to the left -->
    <strong><a href="index.php">SISTEMA DE MESA DE AYUDA</a>.</strong> 
  </footer>
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->

<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!--  App -->
<script src="dist/js/adminlte.min.js"></script>
<!--  for demo purposes -->
<script src="dist/js/demo.js"></script>
</body>
</html>