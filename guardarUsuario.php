<?php
// Incluir el archivo de conexión a la base de datos
include 'db.php';

// Obtener el ID del usuario que inició sesión
session_start();

// Verificar si el usuario tiene una sesión activa
if (!isset($_SESSION['user_id'])) {
    // Si no hay una sesión activa, redirigir al inicio de sesión
    exit('<script>alert("Error: No se ha iniciado sesión."); window.location.href = "login.php";</script>');
}

// Obtener el ID del usuario y su rol
$idUsuario = $_SESSION['user_id'];

// Verificar el rol del usuario
$queryRol = "SELECT id_rol FROM usuariosroles WHERE id_usuarios = ?";
$stmtRol = $conn->prepare($queryRol);
$stmtRol->bind_param('i', $idUsuario);
$stmtRol->execute();
$resultRol = $stmtRol->get_result();

// Verificar si se obtuvo el resultado y el rol del usuario
if ($resultRol && $rowRol = $resultRol->fetch_assoc()) {
    $idRol = $rowRol['id_rol'];

    // Verificar si el usuario tiene el rol permitido (rol 3 para administrador)
    if ($idRol != 3) {
        // Si no tiene el rol permitido, mostrar un mensaje de alerta y redirigir a la página principal
        exit('<script>alert("No tienes permiso para acceder a esta página >:u"); window.location.href = "index.php";</script>');
    }

    // Si tiene el rol permitido, continuar con el proceso de creación de usuario
} else {
    // Si hubo un error al obtener el rol, mostrar un mensaje de alerta y redirigir al inicio de sesión
    exit('<script>alert("Error al obtener el rol del usuario."); window.location.href = "login.php";</script>');
}

// Obtener los datos del formulario, incluido el nuevo campo de selección para el rol
$nombre = $_POST['nombre'];
$apellidos = $_POST['apellidos'];
$contrasena = $_POST['contrasena'];
$correo = $_POST['correo'];
$rol = $_POST['rol']; // Nuevo campo de selección para el rol

// Guardar los datos del usuario en la base de datos
$queryInsertUsuario = "INSERT INTO usuarios (nombre, apellidos, contrasena, correo) VALUES (?, ?, ?, ?)";
$stmtInsertUsuario = $conn->prepare($queryInsertUsuario);

// Verificar la preparación de la consulta
if ($stmtInsertUsuario) {
    $stmtInsertUsuario->bind_param('ssss', $nombre, $apellidos, $contrasena, $correo);

    // Ejecutar la consulta
    if ($stmtInsertUsuario->execute()) {
        // Obtener el ID del usuario recién insertado
        $idUsuario = $stmtInsertUsuario->insert_id;

        // Insertar el rol del usuario en la tabla usuariosroles
        $queryInsertRol = "INSERT INTO usuariosroles (id_usuarios, id_rol) VALUES (?, ?)";
        $stmtInsertRol = $conn->prepare($queryInsertRol);

        // Verificar la preparación de la consulta
        if ($stmtInsertRol) {
            $stmtInsertRol->bind_param('ii', $idUsuario, $rol);

            // Ejecutar la consulta
            $stmtInsertRol->execute();
            $stmtInsertRol->close();
        } else {
            // Imprimir cualquier error después de la ejecución de la consulta
            echo '<script>alert("Error al preparar la consulta para insertar el rol del usuario."); window.location.href = "agregaUsuarios.php";</script>';
        }

        $stmtInsertUsuario->close();

        // Mostrar una alerta en el navegador
        exit('<script>alert("Usuario creado correctamente."); window.location.href = "agregaUsuarios.php";</script>');
    } else {
        // Imprimir cualquier error después de la ejecución de la consulta
        echo '<script>alert("Error al ejecutar la consulta de inserción del usuario."); window.location.href = "agregaUsuarios.php";</script>';
    }
} else {
    echo '<script>alert("Error al preparar la consulta para insertar el usuario."); window.location.href = "agregaUsuarios.php";</script>';
}

// Cerrar la conexión a la base de datos al final del script
$conn->close();
?>
