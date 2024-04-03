<?php
include 'db.php';

header('Content-Type: application/json'); // Indicar que la respuesta será en formato JSON

$response = array();

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["idUsuario"])) {
    $idUsuario = $_POST["idUsuario"];

    // Eliminar registros relacionados en la tabla tickets
    $queryEliminarTickets = $conn->prepare("DELETE FROM tickets WHERE Solicitante = ?");
    $queryEliminarTickets->bind_param("i", $idUsuario);

    if ($queryEliminarTickets->execute()) {
        // Continuar con la eliminación del usuario y sus roles
        $queryEliminarRoles = $conn->prepare("DELETE FROM usuariosroles WHERE id_usuarios = ?");
        $queryEliminarRoles->bind_param("i", $idUsuario);

        if ($queryEliminarRoles->execute()) {
            // Eliminación exitosa, continuar con la eliminación del usuario
            $queryEliminarUsuario = $conn->prepare("DELETE FROM usuarios WHERE idUsuario = ?");
            $queryEliminarUsuario->bind_param("i", $idUsuario);

            if ($queryEliminarUsuario->execute()) {
                $response['success'] = true;
                $response['message'] = "Usuario, roles y tickets eliminados correctamente.";
            } else {
                $response['success'] = false;
                $response['message'] = "Error al intentar eliminar el usuario: " . $conn->error;
            }
        } else {
            $response['success'] = false;
            $response['message'] = "Error al intentar eliminar los roles del usuario: " . $conn->error;
        }
    } else {
        $response['success'] = false;
        $response['message'] = "Error al intentar eliminar los tickets del usuario: " . $conn->error;
    }
} else {
    $response['success'] = false;
    $response['message'] = "Solicitud no válida.";
}

echo json_encode($response); // Devolver la respuesta en formato JSON
?>
