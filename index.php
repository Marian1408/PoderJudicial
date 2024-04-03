<?php
session_start();

include('db.php');

if ($_POST) {
    $correo = $_POST['correo'];
    $contrasena = $_POST['contrasena'];

    // Realiza la verificación del usuario y la contraseña en la base de datos
    $sql = "SELECT idUsuario FROM usuarios WHERE correo = '$correo' AND contrasena = '$contrasena'";
    $result = mysqli_query($conn, $sql);

    if ($result && mysqli_num_rows($result) > 0) {
        // Usuario válido, obtén el ID y almacénalo en la sesión
        $row = mysqli_fetch_assoc($result);
        $_SESSION['user_id'] = $row['idUsuario'];

        // Redirige a inicio.php
        header('Location: inicio.php');
        exit;
    } else {
        // Usuario no válido, puedes mostrar un mensaje de error
        $error_message = "Correo o contraseña incorrectos";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Acceso</title>
    
    <!-- Bootstrap CSS -->
    <link rel="shortcut icon" href="logo.jpg">
    <link rel="stylesheet" href="styles.css">
    <script src="scrypt.js"></script>
    <style>
        body {
            background-image: url('IMG.jpg');
            background-size: cover;
            background-position: center;
            margin: 0;
            padding: 0;
        }
    </style>
</head>
<body>

    <div class="wrapper">
        <form method="POST" class="login" action="index.php">
            <p class="title">Acceso</p>
            <?php if (isset($error_message)) : ?>
                <p style="color: red;"><?php echo $error_message; ?></p>
            <?php endif; ?>
            <input type="email" name="correo" placeholder="Correo electrónico" autofocus />
            <input type="password" name="contrasena" placeholder="Contraseña" />
            <button type="submit" class="btn btn-primary">
                <i class="spinner"></i>
                <span class="state">Aceptar</span>
            </button>
        </form>
        <footer><a target="blank" href="https://escuelajudicial.pjeveracruz.gob.mx/moodle/">Más información</a></footer>
    </div>
</body>
</html>
