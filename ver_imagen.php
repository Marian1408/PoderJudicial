<?php
// Incluir el archivo de conexión a la base de datos
include 'db.php';

// Obtener el ID del ticket desde la URL
$idTicket = isset($_GET['idTicket']) ? $_GET['idTicket'] : null;

// Verificar que el ID del ticket esté presente
if ($idTicket) {
    // Obtener el nombre de la imagen desde la tabla adjuntos usando el id_adjuntos asociado al ticket
    $query = "SELECT imagen FROM adjuntos WHERE idAdjuntos = (SELECT id_adjuntos FROM tickets WHERE IdTicket = ?)";
    $stmt = $conn->prepare($query);

    // Verificar si la preparación fue exitosa
    if ($stmt) {
        $stmt->bind_param('i', $idTicket);
        $stmt->execute();
        $stmt->bind_result($nombreImagen);

        // Verificar si se encontró el nombre de la imagen
        if ($stmt->fetch()) {
            // Construir la ruta completa a la imagen
            $rutaImagen = __DIR__ . '/imagesReport/' . $nombreImagen;

            // Verificar si la imagen existe en el servidor
            if (file_exists($rutaImagen)) {
                // Mostrar la imagen
                header('Content-Type: image/jpeg'); // Ajusta el tipo de contenido según tus necesidades
                readfile($rutaImagen);
            } else {
                echo 'La imagen asociada al ticket no existe en el servidor.';
            }
        } else {
            echo 'No se encontró el nombre de la imagen asociada al ticket.';
        }

        // Cerrar la conexión a la base de datos
        $stmt->close();
    } else {
        echo 'Error en la preparación de la consulta SQL para obtener el nombre de la imagen.';
    }

    // Cerrar la conexión a la base de datos
    $conn->close();
} else {
    echo 'ID del ticket no proporcionado.';
}
?>
