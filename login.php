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
    <!-- link de Bootstrap para ocupar codigo-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-SgOJa3DmI69IUzQ2PVdRZhwQ+dy64/BUtbMJw1MZ8t5HZApcHrRKUc4W0kG879m7" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js" integrity="sha384-k6d4wzSIapyDyv1kpU366/PK5hCdSbCRGRCMv+eplOQJWyd1fbcAu9OCUj5zNLiq" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="style.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
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
        </form><!--aqui se pone un link para registrarse en algunas ocasiones-->
        <!--p>no tienes una cuenta? <a href="administrar_usuario.php">registrate aqui</a></p-->
    </div>
</body>

</html>