
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title> MESA DE AYUDA</title>

  <link rel="shortcut icon" href="logo.jpg"><!-- Font Awesome -->
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- IonIcons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <style>
    </style>
</head>
<body class="hold-transition sidebar-mini">
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
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
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
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Analisis de Reportes</h1>
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
      <div class="container-fluid">
        <div class="row">
          <div class="col-lg-6">
            <div class="card">
              <div class="card-header border-0">
                <div class="d-flex justify-content-between">
                  <h3 class="card-title">Problemas Minimos</h3>
                  <a href="javascript:void(0);">View Report</a>
                </div>
              </div>
              <div class="card-body">
                <div class="d-flex">
                  <p class="d-flex flex-column">
                    <span class="text-bold text-lg">820</span>
                    <span>Minimas probabilidades</span>
                  </p>
                  <p class="ml-auto d-flex flex-column text-right">
                    <span class="text-success">
                      <i class="fas fa-arrow-up"></i> 12.5%
                    </span>
                    <span class="text-muted">Since last week</span>
                  </p>
                </div>
                <!-- /.d-flex -->

                <div class="position-relative mb-4">
                  <canvas id="visitors-chart" height="200"></canvas>
                </div>

                <div class="d-flex flex-row justify-content-end">
                  <span class="mr-2">
                    <i class="fas fa-square text-primary"></i> This Week
                  </span>

                  <span>
                    <i class="fas fa-square text-gray"></i> Last Week
                  </span>
                </div>
              </div>
            </div>
            <!-- /.card -->

            <div class="card">
              <div class="card-header border-0">
                <h3 class="card-title">Problemas comunes</h3>
                <div class="card-tools">
                  <a href="#" class="btn btn-tool btn-sm">
                    <i class="fas fa-download"></i>
                  </a>
                  <a href="#" class="btn btn-tool btn-sm">
                    <i class="fas fa-bars"></i>
                  </a>
                </div>
              </div>
              <div class="card-body table-responsive p-0">
                <table class="table table-striped table-valign-middle">
                  <thead>
                  <tr>
                    <th>Product</th>
                    <th>Price</th>
                    <th>Problemas Tecnicos Reportados</th>
                    <th>More</th>
                  </tr>
                  </thead>
                  <tbody>
                  <tr>
                    <td>
                      <img src="dist/img/default-150x150.png" alt="Product 1" class="img-circle img-size-32 mr-2">
                      Some Product
                    </td>
                    <td>$13 USD</td>
                    <td>
                      <small class="text-success mr-1">
                        <i class="fas fa-arrow-up"></i>
                        12%
                      </small>
                      12,000 Sold
                    </td>
                    <td>
                      <a href="#" class="text-muted">
                        <i class="fas fa-search"></i>
                      </a>
                    </td>
                  </tr>
                  <tr>
                    <td>
                      <img src="dist/img/default-150x150.png" alt="Product 1" class="img-circle img-size-32 mr-2">
                      Another Product
                    </td>
                    <td>$29 USD</td>
                    <td>
                      <small class="text-warning mr-1">
                        <i class="fas fa-arrow-down"></i>
                        0.5%
                      </small>
                      123,234 Sold
                    </td>
                    <td>
                      <a href="#" class="text-muted">
                        <i class="fas fa-search"></i>
                      </a>
                    </td>
                  </tr>
                  <tr>
                    <td>
                      <img src="dist/img/default-150x150.png" alt="Product 1" class="img-circle img-size-32 mr-2">
                      Amazing Product
                    </td>
                    <td>$1,230 USD</td>
                    <td>
                      <small class="text-danger mr-1">
                        <i class="fas fa-arrow-down"></i>
                        3%
                      </small>
                      198 Sold
                    </td>
                    <td>
                      <a href="#" class="text-muted">
                        <i class="fas fa-search"></i>
                      </a>
                    </td>
                  </tr>
                  <tr>
                    <td>
                      <img src="dist/img/default-150x150.png" alt="Product 1" class="img-circle img-size-32 mr-2">
                      Perfect Item
                      <span class="badge bg-danger">NEW</span>
                    </td>
                    <td>$199 USD</td>
                    <td>
                      <small class="text-success mr-1">
                        <i class="fas fa-arrow-up"></i>
                        63%
                      </small>
                      87 Sold
                    </td>
                    <td>
                      <a href="#" class="text-muted">
                        <i class="fas fa-search"></i>
                      </a>
                    </td>
                  </tr>
                  </tbody>
                </table>
              </div>
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col-md-6 -->
          <div class="col-lg-6">
            <div class="card">
              <div class="card-header border-0">
                <div class="d-flex justify-content-between">
                  <h3 class="card-title">Problemas comunes</h3>
                  <a href="javascript:void(0);">View Report</a>
                </div>
              </div>
              <div class="card-body">
                <div class="d-flex">
                  <p class="d-flex flex-column">
                    <span class="text-bold text-lg">15 Problemas</span>
                    <span>Problemas Técnicos más largos</span>
                  </p>
                  <p class="ml-auto d-flex flex-column text-right">
                    <span class="text-success">
                      <i class="fas fa-arrow-up"></i> 33.1%
                    </span>
                    <span class="text-muted">Since last month</span>
                  </p>
                </div>
                <!-- /.d-flex -->

                <div class="position-relative mb-4">
                  <canvas id="sales-chart" height="200"></canvas>
                </div>

                <div class="d-flex flex-row justify-content-end">
                  <span class="mr-2">
                    <i class="fas fa-square text-primary"></i> Este Mes
                  </span>

                  <span>
                    <i class="fas fa-square text-gray"></i> Mes pasado
                  </span>
                </div>
              </div>
            </div>
            <!-- /.card -->

            <div class="card">
              <div class="card-header border-0">
                <h3 class="card-title">Problemas poco Problables</h3>
                <div class="card-tools">
                <a href="#" class="btn btn-sm btn-tool">
                    <i class="fas fa-download"></i>
                </a>
                <a href="#" class="btn btn-sm btn-tool">
                    <i class="fas fa-bars"></i>
                </a>
                </div>
            </div>
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center border-bottom mb-3">
                <p class="text-success text-xl">
                    <i class="ion ion-ios-refresh-empty"></i>
                </p>
                <p class="d-flex flex-column text-right">
                    <span class="font-weight-bold">
                    <i class="ion ion-android-arrow-up text-success"></i> 12%
                    </span>
                    <span class="text-muted">CONVERSION RATE</span>
                </p>
                </div>
                <!-- /.d-flex -->
                <div class="d-flex justify-content-between align-items-center border-bottom mb-3">
                <p class="text-warning text-xl">
                    <i class="ion ion-ios-cart-outline"></i>
                </p>
                <p class="d-flex flex-column text-right">
                    <span class="font-weight-bold">
                    <i class="ion ion-android-arrow-up text-warning"></i> 0.8%
                    </span>
                    <span class="text-muted">SALES RATE</span>
                </p>
                </div>
                <!-- /.d-flex -->
                <div class="d-flex justify-content-between align-items-center mb-0">
                <p class="text-danger text-xl">
                    <i class="ion ion-ios-people-outline"></i>
                </p>
                <p class="d-flex flex-column text-right">
                    <span class="font-weight-bold">
                    <i class="ion ion-android-arrow-down text-danger"></i> 1%
                    </span>
                    <span class="text-muted">REGISTRATION RATE</span>
                </p>
                </div>
                <!-- /.d-flex -->
</div>
            </div>
        </div>
<!-- /.col-md-6 -->
        </div>
        <!-- /.row -->
</div>
<!-- /.container-fluid -->
    </div>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
<!-- Control Sidebar --><aside class="control-sidebar control-sidebar-dark">
<!-- Control sidebar content goes here -->
</aside>
<!-- /.control-sidebar -->

<!-- Main Footer -->
<footer class="main-footer">
    <div class="float-right d-none d-sm-block">
      <b>Alumnos del Tecnólogico de Xalapa</b>
    </div>
    <strong> <a href="index.php">Mesa De Ayuda</a></strong> 
  </footer>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->

<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE -->
<script src="dist/js/adminlte.js"></script>

<!-- OPTIONAL SCRIPTS -->
<script src="plugins/chart.js/Chart.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="dist/js/pages/dashboard3.js"></script>
</body>
</html>
