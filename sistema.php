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
    if ($idRol != 2 && $idRol != 3) {
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
  <title>Mis Reportes</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="shortcut icon" href="logo.jpg">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <script>
    function confirmarAceptacion() {
      return confirm("¿Estás seguro de que quieres aceptar este ticket?");
    }
  </script>
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
<style>
  .custom-ellipsis {
    max-width: 700px; /* Ajusta este valor según tus necesidades */
    overflow: hidden;
    display: -webkit-box;
    -webkit-box-orient: vertical;
    word-wrap: break-word;
    line-clamp: 2; /* Ajusta este valor según la cantidad de líneas que desees mostrar */
  }
</style>
<script>
  document.addEventListener('DOMContentLoaded', function () {
    adjustColumnWidth();
  });

  function adjustColumnWidth() {
    const table = document.getElementById('example1');
    const rows = table.querySelectorAll('tbody tr');

    rows.forEach(row => {
      const cells = row.querySelectorAll('td');
      cells.forEach((cell, index) => {
        if (index === 4) { // Ajusta el índice según la columna que quieras modificar
          cell.classList.add('custom-ellipsis');
        }
      });
    });
  }
</script>
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

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">

      <!-- Notifications Dropdown Menu -->
      <li class="nav-item dropdown">
      
      </li>
      <li class="nav-item">
        
      </li>
      <li class="nav-item">
        
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
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Reportes</h1>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      
            <!-- /.card -->

            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Lista de Reportes creados</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body p-0">
    <div class="table-responsive">
        <table id="example1" class="table table-bordered table-striped" style="width:100%">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Solicitante</th>
                    <th>Fecha Creación</th>
                    <th>Fecha Completado</th>
                    <th>Descripción</th>
                    <th>Técnico</th>
                    <th>Estado</th>
                    <th>Adjuntos</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
            <?php
            // Dentro del bucle while
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo '<td>' . $row['IdTicket'] . '</td>';
                echo '<td>' . obtenerNombreCompletoUsuario($row['Solicitante'], $conn) . '</td>';
                echo '<td>' . $row['HoraCreacion'] . '</td>';
                echo '<td>' . $row['FechaCompletado'] . '</td>';
                echo '<td class="custom-ellipsis">' . $row['Descripcion'] . '</td>';
                echo '<td>' . obtenerNombreCompletoUsuario($row['Tecnico'], $conn) . '</td>';
                echo '<td>' . $row['Estado'] . '</td>';

                // Mostrar la columna de imágenes con enlace "Ver más" o "No hay imagen"
                echo '<td>';
                if (tieneImagenesAdjuntas($row['IdTicket'], $conn)) {
                    echo '<a href="ver_imagen.php?idTicket=' . $row['IdTicket'] . '" target="_blank">Ver más</a>';
                } else {
                    echo 'No hay imagen';
                }
                echo '</td>';

                echo '<td>';

                // Verificar si el ticket está finalizado
                if ($row['Estado'] !== 'Terminado') {
                    echo '<form action="procesar_aceptar.php" method="post" onsubmit="return confirmarAceptacion();">';
                    echo '<input type="hidden" name="idTicket" value="' . $row['IdTicket'] . '">';
                    echo '<button type="submit" class="btn btn-success" name="aceptar" style="margin-bottom: 5px;">Aceptar</button>';
                    echo '</form>';

                    echo '<form action="procesar_delegar.php" method="post">';
                    echo '<input type="hidden" name="idTicket" value="' . $row['IdTicket'] . '">';
                    echo '<button type="submit" class="btn btn-warning" name="delegar" style="margin-bottom: 5px;">Delegar</button>';
                    echo '</form>';

                    echo '<form action="procesar_finalizar.php" method="post">';
                    echo '<input type="hidden" name="idTicket" value="' . $row['IdTicket'] . '">';
                    echo '<button type="submit" class="btn btn-danger" name="finalizar">Finalizar</button>';
                    echo '</form>';
                } else {
                    // Si el ticket está finalizado, muestra un mensaje o realiza alguna acción alternativa
                    echo 'Ticket Finalizado';
                }

                echo '</td>';

                echo "</tr>";
            }

            // Función para obtener el nombre completo del usuario
            function obtenerNombreCompletoUsuario($idUsuario, $conn) {
                $query = "SELECT CONCAT(nombre, ' ', apellidos) AS nombre_completo FROM usuarios WHERE idUsuario = '$idUsuario'";
                $result = $conn->query($query);

                if ($result && $row = $result->fetch_assoc()) {
                    return $row['nombre_completo'];
                }

                return 'Libre'; // Otra opción, en caso de no encontrar el nombre
            }

            // Función para verificar si hay imágenes adjuntas al ticket
            function tieneImagenesAdjuntas($idTicket, $conn) {
                $query = "SELECT COUNT(*) AS num_imagenes FROM adjuntos WHERE ticket = ?";
                $stmt = $conn->prepare($query);
                $stmt->bind_param('i', $idTicket);
                $stmt->execute();
                $result = $stmt->get_result();

                if ($result && $row = $result->fetch_assoc()) {
                    return $row['num_imagenes'] > 0;
                }

                return false;
            }
            ?>
            </tbody>
            <tfoot>
                <tr>
                    <th>ID</th>
                    <th>Solicitante</th>
                    <th>Fecha Creación</th>
                    <th>Fecha Completado</th>
                    <th>Descripción</th>
                    <th>Técnico</th>
                    <th>Estado</th>
                    <th>Adjuntos</th>
                    <th>Acciones</th>
                </tr>
            </tfoot>
        </table>
    </div>
</div>
                    <!-- /.card -->
                </section>
                <!-- /.content -->
            </div>
            <!-- /.content-wrapper -->
    </div>

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
<!-- DataTables  & Plugins -->
<script src="plugins/datatables/jquery.dataTables.min.js"></script>
<script src="plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="plugins/jszip/jszip.min.js"></script>
<script src="plugins/pdfmake/pdfmake.min.js"></script>
<script src="plugins/pdfmake/vfs_fonts.js"></script>
<script src="plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
<!-- Page specific script -->
<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
</script>
</body>
</html>
