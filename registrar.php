<?php
include("conexion.php");

if (isset($_POST['register'])){
        if(
            strlen($_POST['name']) >= 1 &&
            strlen($_POST['email']) >= 1 &&
            strlen($_POST['direction']) >= 1 &&
            strlen($_POST['phone']) >= 1 &&
            strlen($_POST['password']) >= 1 
        ){
            $name = trim($_POST['name']);
            $email = trim($_POST['email']);
            $direction = trim($_POST['apellidos']);
            $password = trim($_POST['password']);
            $fecha = date("d/m/y");

            $consulta ="INSERT TO datos(nombre, email, apellidos, contraseña, fecha)
                VALUES('$name', '$email', '$direction', '$phone', '$password', '$fecha')";
            $resultado = mysqli_query($conex, $consulta);
            if ($resultado){
            ?>
                <h3 class="success">Tu regustro se a completado</h3>
            <?php
            } else{
                ?>
                <h3 class="error"> Ocurrio un error</h3>
                <?php
            }
            }else{
            ?>
            <h3 class="error"> LLena todos los campos</h3>
            <?php
    }

}

?>