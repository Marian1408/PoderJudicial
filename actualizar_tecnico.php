<?php
// Actualizar el técnico en la base de datos según el ID del ticket
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["idTicket"])) {
    $idTicket = $_POST["idTicket"];

    // Conecta a la base de datos (asegúrate de ajustar la configuración según tu entorno)
    $servername = "localhost"; // Puedes necesitar cambiar esto según tu configuración
    $username = "root";
    $password = "";
    $database = "mesadeayuda_php";
    
    // Crear conexión
    $conn = new mysqli($servername, $username, $password, $database);
    
    // Verificar la conexión
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Actualiza el técnico (supongamos que el ID del técnico es 2)
    $idTecnico = 2;

    $sql = "UPDATE tickets SET Tecnico = $idTecnico WHERE IdTicket = $idTicket";

    if ($conn->query($sql) === TRUE) {
        echo "Actualización exitosa";
    } else {
        echo "Error al actualizar: " . $conn->error;
    }

    $conn->close();
} else {
    echo "Solicitud no válida";
}
?>
