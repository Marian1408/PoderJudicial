<?php
// Incluir el archivo de conexión a la base de datos
include 'db.php';

// Obtener el ID del usuario que inició sesión
session_start();
if (isset($_SESSION['user_id'])) {
    $idUsuario = $_SESSION['user_id'];

    // Verificar el rol del usuario
    $queryRol = "SELECT id_rol FROM usuariosroles WHERE id_usuarios = ?";
    $stmtRol = $conn->prepare($queryRol);
    $stmtRol->bind_param('i', $idUsuario);
    $stmtRol->execute();
    $resultRol = $stmtRol->get_result();

    if ($resultRol) {
        $rowRol = $resultRol->fetch_assoc();
        $idRol = $rowRol['id_rol'];

        // Si el usuario tiene el rol de técnico (suponiendo que el ID del rol de técnico es 2),
        // mostrar un mensaje de alerta y redirigir a la página de generarReporte
        if ($idRol == 2) {
            exit('<script>alert("No tienes permiso para hacer reportes >:u"); window.location.href = "generarReporte.php";</script>');
        }

        // Obtener los datos del formulario
        $descripcion = mysqli_real_escape_string($conn, $_POST['descripcion']);
        $imagen = isset($_FILES['imagen']) ? $_FILES['imagen'] : null;

        // Guardar la descripción en la base de datos (con sentencia preparada)
        $query = "INSERT INTO tickets (Descripcion, Solicitante) VALUES (?, ?)";
        $stmt = $conn->prepare($query);
        $stmt->bind_param('si', $descripcion, $idUsuario);
        $stmt->execute();
        $lastTicketId = $stmt->insert_id;
        $stmt->close();

        // Guardar la imagen si se proporciona
        if ($imagen && $imagen['name'] !== '') {
            // Guardar el nombre de la imagen en la tabla de adjuntos
            $query = "INSERT INTO adjuntos (ticket, imagen) VALUES (?, ?)";
            $stmt = $conn->prepare($query);
            $stmt->bind_param('is', $lastTicketId, $imagen['name']);
            $stmt->execute();
            $stmt->close();

            // Mover el archivo de la imagen al directorio deseado
            $rutaAlmacenamiento = __DIR__ . '/imagesReport/'; // Reemplaza con tu ruta
            move_uploaded_file($imagen['tmp_name'], $rutaAlmacenamiento . $imagen['name']);
        }

        // Mostrar una alerta en el navegador
        exit('<script>alert("Reporte subido correctamente."); window.location.href = "generarReporte.php";</script>');
    } else {
        echo '<script>alert("Error al obtener el rol del usuario.");</script>';
    }
} else {
    echo '<script>alert("Error: No se ha iniciado sesión.");</script>';
}

// Cerrar la conexión a la base de datos al final del script
$conn->close();
?>
