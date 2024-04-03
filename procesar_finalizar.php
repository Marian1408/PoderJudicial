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

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['finalizar'])) {
    $idTicket = $_POST['idTicket'];

    // Obtén el idUsuario de la persona que inició sesión
    $idUsuario = obtenerIdUsuario();

    // Obtén el idTecnico del ticket para comparar con el idUsuario
    $queryTecnico = "SELECT Tecnico FROM tickets WHERE IdTicket = $idTicket";
    $resultTecnico = $conn->query($queryTecnico);

    if ($resultTecnico && $rowTecnico = $resultTecnico->fetch_assoc()) {
        $idTecnico = $rowTecnico['Tecnico'];

        // Verifica que el usuario que inició sesión sea el mismo que el técnico asignado al ticket
        if ($idUsuario !== null && $idUsuario == $idTecnico) {
            // Actualizar el estado del ticket a "Terminado" en la base de datos
            $sql = "UPDATE tickets SET Estado = 'Terminado' WHERE IdTicket = $idTicket";

            if ($conn->query($sql) === TRUE) {
                // Éxito al actualizar la base de datos
                echo '<script>alert("Ticket finalizado con éxito.");</script>';
            } else {
                // Error al actualizar la base de datos
                echo '<script>alert("Error al finalizar el ticket: ' . $conn->error . '");</script>';
            }
        } else {
            // Mostrar un mensaje de error si el usuario no tiene permisos para finalizar el ticket
            echo '<script>alert("No tienes permisos para finalizar este ticket.");</script>';
        }
    } else {
        // Error al obtener el técnico del ticket
        echo '<script>alert("Error al obtener la información del ticket.");</script>';
    }
}

// Redirigir de vuelta a sistema.php después de procesar la solicitud
echo '<script>window.location.href = "sistema.php";</script>';
exit();
?>
