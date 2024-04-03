<?php
include 'db.php';

function obtenerIdUsuario() {
    session_start();
    if (isset($_SESSION['user_id'])) {
        return $_SESSION['user_id'];
    }
    return null;
}

function tieneRolCorrecto($idUsuario, $conn) {
    $query = "SELECT id_rol FROM usuariosroles WHERE id_usuarios = '$idUsuario'";
    $result = $conn->query($query);

    if ($result && $row = $result->fetch_assoc()) {
        return $row['id_rol'] == 2; // Reemplaza 2 con el ID de rol correcto para técnicos
    }

    return false;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['delegar'])) {
    $idTicket = $_POST['idTicket'];
    $idUsuario = obtenerIdUsuario();

    if ($idUsuario !== null && tieneRolCorrecto($idUsuario, $conn)) {
        // Verificar si el ticket ya fue aceptado por el mismo técnico
        $queryTicketAceptado = "SELECT Tecnico FROM tickets WHERE IdTicket = $idTicket";
        $resultTicketAceptado = $conn->query($queryTicketAceptado);

        if ($resultTicketAceptado && $rowTicketAceptado = $resultTicketAceptado->fetch_assoc()) {
            $tecnicoAceptado = $rowTicketAceptado['Tecnico'];

            if ($tecnicoAceptado == $idUsuario) {
                // Realizar la acción de delegar aquí
                $sql = "UPDATE tickets SET Estado = 'Delegado', Tecnico = NULL WHERE IdTicket = $idTicket";

                if ($conn->query($sql) === TRUE) {
                    // Acciones adicionales si es necesario
                    echo '<script>alert("Ticket delegado correctamente.");</script>';
                } else {
                    echo '<script>alert("Error al delegar el ticket: ' . $conn->error . '");</script>';
                }
            } else {
                echo '<script>alert("No puedes delegar este ticket porque no lo aceptaste.");</script>';
            }
        } else {
            echo '<script>alert("Error al obtener el técnico que aceptó el ticket.");</script>';
        }
    } else {
        echo '<script>alert("No tienes permisos para delegar este ticket.");</script>';
    }
}

// Redirige después de realizar la acción
echo '<script>window.location.href = "sistema.php";</script>';
exit();
?>
