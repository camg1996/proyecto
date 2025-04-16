<?php
session_start();
include("db.php");
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $email = $_POST['email'];
    $telefono = $_POST['telefono'];
    $usuario = $_POST['usuario'];
    $contrasena = $_POST['contrasena'];

    // Verificar si el usuario ya existe
    $query = "SELECT * FROM administrar_usuarios WHERE usuario='$usuario'";
    $result = mysqli_query($connexion, $query);

    if (mysqli_num_rows($result) > 0) {
        echo "<script>alert('El usuario ya existe.');</script>";
    } else {
        // Insertar el nuevo usuario
        $query = "INSERT INTO administrar_usuarios (nombre, apellido, email, telefono, usuario, contrasena) VALUES ('$nombre', '$apellido', '$email', '$telefono', '$usuario', '$contrasena')";
        if (mysqli_query($connexion, $query)) {
            echo "<script>alert('Usuario registrado exitosamente.');</script>";
        } else {
            echo "<script>alert('Error al registrar el usuario.');</script>";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>REGISTRAR USUARIOS</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="registrarse">
        <h1>Registrar Usuarios</h1>
        <form method="POST">
            <label for="nombre">Nombre:</label>
            <input type="text" name="nombre" required>

            <label for="apellido">Apellido:</label>
            <input type="text" name="apellido" required>

            <label for="email">Email:</label>
            <input type="email" name="email" required>

            <label for="telefono">Teléfono:</label>
            <input type="tel" name="telefono">

            <label for="usuario">Usuario:</label>
            <input type="text" name="usuario" required>

            <label for="contrasena">Contraseña:</label>
            <input type="text" name="contrasena" required>

            <input type="submit" name="" value="Registrar Usuario">
        </form>
        <p>Al hacer clic en el boton registrarse <br>
            <a href="">acepta nuestros terminos y condiciones</a> y <a href="">politica y privacidad</a>
        </p>
        <p>ya tienes una cuenta? <a href="login.php">inicia sesion aqui</a></p>
    </div>
</body>

</html>