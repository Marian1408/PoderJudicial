<?php
include 'db.php';

session_start();

// Inicializar $resultUsuarios
$resultUsuarios = null;

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

    // Realizar la consulta SQL para obtener los usuarios
    $queryUsuarios = "SELECT * FROM usuarios";
    $resultUsuarios = $conn->query($queryUsuarios);
    
    if ($idRol != 3) {
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
  <title>Usuarios</title>

  <link rel="shortcut icon" href="logo.jpg">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
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
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
    
      </li>
    </ul>

    
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
            <h1> Lista Usuarios</h1>
          </div>
          <div class="col-sm-6">
            
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      
            <!-- /.card -->

            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Usuarios</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Apellidos</th>
                    <th>Contraseña </th>
                    <th>Correo</th>
                    <th>Acciones</th>
                  </tr>
                  </thead>
                  <tbody>
                  <?php
                    // Verificar si la consulta de usuarios fue exitosa
                    if ($resultUsuarios && $resultUsuarios->num_rows > 0) {
                      while ($rowUsuario = $resultUsuarios->fetch_assoc()) {
                        echo "<tr>";
                        echo '<td>' . $rowUsuario['idUsuario'] . '</td>'; // Cambiado de 'id' a 'idUsuario'
                        echo '<td>' . $rowUsuario['nombre'] . '</td>';
                        echo '<td>' . $rowUsuario['apellidos'] . '</td>';
                        echo '<td>' . $rowUsuario['contrasena'] . '</td>';
                        echo '<td>' . $rowUsuario['correo'] . '</td>';
                        echo '<td><button class="btn btn-danger btn-eliminar" data-id="' . $rowUsuario['idUsuario'] . '">Eliminar</button></td>';
                        echo "</tr>";
                      }
                    } else {
                      echo "<tr><td colspan='6'>No se encontraron usuarios.</td></tr>";
                    }
                  ?>
                  </tbody>
                  <tfoot>
                  <tr>
                  <tr>

                  </tr>
                  </tr>
                  </tfoot>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
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
<script>
$(function () {
    // Configuración de DataTables y otros scripts...

    // Manejar clics en botones de eliminar
    $(".btn-eliminar").click(function () {
        // Obtener el ID del usuario a eliminar
        var idUsuario = $(this).data("id");

        // Confirmar la eliminación
        var confirmar = confirm("¿Estás seguro de que deseas eliminar este usuario?");

        if (confirmar) {
            // Realizar la eliminación mediante una solicitud AJAX
            $.ajax({
                url: "eliminar_usuario.php",
                method: "POST",
                data: { idUsuario: idUsuario },
                dataType: 'json', // Esperar respuesta en formato JSON
                success: function (response) {
                    if (response.success) {
                        // Eliminación exitosa, actualizar solo la fila en la tabla
                        $("#example1").DataTable().row("#row-" + idUsuario).remove().draw(false);
                        alert(response.message); // Mostrar mensaje de éxito
                        location.reload(); // Recargar la página
                    } else {
                        console.error("Error al intentar eliminar el usuario: " + response.message);
                        alert("Error al intentar eliminar el usuario. Consulta la consola para más detalles.");
                    }
                },
                error: function (xhr, status, error) {
                    console.error("Error en la solicitud AJAX:", status, error);
                    alert("Error al intentar eliminar el usuario.");
                }
            });
        }
    });
});
</script>
</body>
</html>
