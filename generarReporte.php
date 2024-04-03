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

    // Verificar si el usuario tiene un rol permitido (1 o 3)
    if ($idRol != 1 && $idRol != 3) {
        // Redirigir a una página de acceso no autorizado si el rol no es permitido
        header("Location: acceso-no-autorizado.php");
        exit();
    }
} else {
    // Redirigir a una página de acceso no autorizado si no se puede obtener el rol
    header("Location: acceso-no-autorizado.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Generar Reporte</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="shortcut icon" href="logo.jpg"><!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
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
            ?>
    </style>
</head>
<body class="hold-transition sidebar-mini">
<!-- Site wrapper -->
<div class="wrapper">
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
  <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="#" class="nav-link"></a>
      </li>
    </ul>
  </nav>

    
    <ul class="navbar-nav ml-auto">
      
      <li class="nav-item dropdown">
      </li>
      
    </ul>
  </nav>

  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    </br>
<div style="text-align: center;">
    <img src="logo.jpg" class="brand-image img-circle elevation-3" height="120" style="opacity: 1">
    <a href="index3.html" class="brand-link"></a>
</div>
    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="info">
          <a href="#" class="d-block">Escuela del Poder Judicial</a>
        </div>
      </div>

    <!-- Sidebar Menu -->
    <nav class="mt-2">
  <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

    <!-- Enlace Inicio -->
    <li class="nav-item">
      <a href="inicio.php" class="nav-link">
        <i class=" fas fa-tachometer-alt"></i>
        <p>Inicio</p>
      </a>
    </li>

    <li class="nav-item nav-item-rol2">
      <a href="generarReporte.php" class="nav-link">
        <i class=" fas fa-tachometer-alt"></i>
        <p>Generar Reporte</p>
        <i class="right fas fa-angle-left"></i>
      </a>
    </li>

    <!-- Enlace Mis Reportes -->
    <li class="nav-item nav-item-rol1">
      <a href="sistema.php" class="nav-link">
        <i class=" fas fa-tachometer-alt"></i>
        <p>Mis Reportes</p>
        <i class="right fas fa-angle-left"></i>
      </a>
    </li>

    <!-- Enlace Técnico -->
    <li class="nav-item nav-item-rol1">
      <a href="administrador.php" class="nav-link">
        <i class=" fas fa-tachometer-alt"></i>
        <p>Técnico</p>
        <i class="right fas fa-angle-left"></i>
      </a>
    </li>

    <!-- Enlace Lista de Usuarios -->
    <li class="nav-item nav-item-rol2 nav-item-rol1">
      <a href="usuarios.php" class="nav-link">
        <i class=" fas fa-tachometer-alt"></i>
        <p>Lista de Usuarios</p>
        <i class="right fas fa-angle-left"></i>
      </a>
    </li>

    <!-- Enlace Crear Usuarios -->
    <li class="nav-item nav-item-rol2 nav-item-rol1">
      <a href="agregaUsuarios.php" class="nav-link">
        <i class=" fas fa-tachometer-alt"></i>
        <p>Crear Usuarios</p>
        <i class="right fas fa-angle-left"></i>
      </a>
    </li>

    <!-- Enlace Calendario -->
    <li class="nav-item">
      <a href="calendario.php" class="nav-link">
        <i class=" fas fa-tachometer-alt"></i>
        <p>Eventos</p>
        <i class="right fas fa-angle-left"></i>
      </a>
    </li>

    <!-- Enlace Cerrar Sesión -->
    <li class="nav-item">
      <a href="cerrar_sesion.php" class="nav-link">
        <i class=" fas fa-tachometer-alt"></i>
        <p>Cerrar sesión</p>
        <i class="right fas fa-angle-left"></i>
      </a>
    </li>
  </ul>
</nav>
<!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Generar Reporte</h1>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-6">
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">General</h3>

            </div>
            <div class="card-body">
              <form action="guardarReporte.php" method="post" enctype="multipart/form-data">
                <div class="form-group">
                  <label for="inputDescription">Descripción del Reporte</label>
                  <textarea id="inputDescription" name="descripcion" class="form-control" rows="4" required></textarea>
                </div>

                <div class="form-group">
                  <label for="inputImage">Adjuntar alguna imagen de referencia</label>
                  <input type="file" name="imagen" accept="image/png, .jpeg, .jpg, image/gif">
                </div>

                <div class="row">
                  <div class="col-12">
                    <input type="submit" value="Guardar" class="btn btn-success float-right">
                  </div>
                </div>
              </form>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <div class="col-md-6">
          <div class="card card-secondary">
            <div class="card-header">
              <h3 class="card-title">En un momento te estaremos resolviendo tu problema técnico</h3>
            </div>
            <div class="col-md-6">
              <br><b>¡RECUERDA ESPECIFICAR!</b>
              <br><img justify-content=" center" src="Equipo.png" width="400" height="400" />
            </div>
          </div>
          <!-- /.card-body -->
        </div>
      </div>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <footer class="main-footer">
    <div class="float-right d-none d-sm-block">
      <b>Alumnos del Tecnólogico de Xalapa</b>
    </div>
    <strong> <a href="index.php">Mesa De Ayuda</a></strong> 
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
</body>
</html>
