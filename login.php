<?php
session_start();
include("db.php");
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $usuario = $_POST['usuario'];
    $contrasena = $_POST['contrasena'];
    if(empty($usuario) || empty($contrasena)){
        echo "<script>alert('Por favor, complete todos los campos.');</script>";
    } else {
        // Verificar si el usuario existe
        $query = "SELECT * FROM administrar_usuarios WHERE usuario='$usuario' AND contrasena='$contrasena'";
        $result = mysqli_query($connexion, $query);
        
        if(mysqli_num_rows($result) > 0){
            $_SESSION['usuario'] = $usuario;
            header("Location: index.php"); // Redirigir a la página principal
            /*die;*/
            exit();
        } else {
            echo "<script>alert('Usuario o contraseña incorrectos.');</script>";
        }
    }
    // Cerrar la conexión a la base de datos
}
?>


<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LOGIN</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="login">
        <h1>LOGIN</h1>
        <form method="POST">
            <label for="usuario">Usuario:</label>
            <input type="text" name="usuario" required>

            <label for="contrasena">Contraseña:</label>
            <input type="password" name="contrasena" required>

            <input type="submit" name="" value="Iniciar Sesión">
        </form>
        <p>no tienes una cuenta? <a href="administrar_usuario.php">registrate aqui</a></p>
    </div>
</body>

</html>