<?php
include 'db.php';

// Función para obtener el idUsuario según tu sistema de autenticación
function obtenerIdUsuario() {
    // Agrega la lógica necesaria para obtener el idUsuario
    // Puedes usar sesiones u otros métodos de autenticación aquí
    session_start();
    if (isset($_SESSION['user_id'])) {
        return $_SESSION['user_id'];
    }
    return null;
}

// Verificar si el usuario tiene el rol correcto (id_rol igual a 2)
function tieneRolCorrecto($idUsuario, $conn) {
    $query = "SELECT id_rol FROM usuariosroles WHERE id_usuarios = '$idUsuario'";
    $result = $conn->query($query);

    if ($result && $row = $result->fetch_assoc()) {
        return $row['id_rol'] == 2;
    }

    return false;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['aceptar'])) {
    // Obtén el idTicket desde el formulario
    $idTicket = $_POST['idTicket'];

    // Obtén el idUsuario de la persona
    $idUsuario = obtenerIdUsuario();

    if ($idUsuario !== null) {
        // Verificar si el usuario tiene el rol correcto para aceptar
        if (tieneRolCorrecto($idUsuario, $conn)) {
            // Verificar si ya hay un técnico asignado
            $queryTecnicoActual = "SELECT Tecnico FROM tickets WHERE IdTicket = $idTicket";
            $resultTecnicoActual = $conn->query($queryTecnicoActual);

            if ($resultTecnicoActual && $rowTecnicoActual = $resultTecnicoActual->fetch_assoc()) {
                $tecnicoActual = $rowTecnicoActual['Tecnico'];

                if ($tecnicoActual === null) {
                    // Si no hay un técnico asignado, actualizar la columna Tecnico y Estado
                    $sql = "UPDATE tickets SET Tecnico = $idUsuario, Estado = 'En proceso' WHERE IdTicket = $idTicket";

                    if ($conn->query($sql) === TRUE) {
                        // Resto del código...
                    } else {
                        echo '<script>alert("Error al actualizar el registro: ' . $conn->error . '");</script>';
                    }
                } else {
                    echo '<script>alert("Este ticket ya tiene un técnico asignado.");</script>';
                }
            } else {
                echo '<script>alert("Error al obtener el técnico actual.");</script>';
            }
        } else {
            // Mostrar una alerta si el usuario no tiene permisos
            echo '<script>alert("No tienes permisos para aceptar este ticket.");</script>';
        }
    } else {
        echo '<script>alert("Error: No se ha iniciado sesión.");</script>';
    }
}

// Redirige de vuelta a sistema.php después de mostrar la alerta
echo '<script>window.location.href = "sistema.php";</script>';
exit();
?>
