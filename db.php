<?php
// Configuración de la conexión a la base de datos
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

// Establecer el conjunto de caracteres
$conn->set_charset("utf8");

// Ejecutar la consulta
$result = $conn->query("SELECT * FROM tickets");

// Verificar si la consulta fue exitosa
if (!$result) {
    die("Error en la consulta: " . $conn->error);
}
?>