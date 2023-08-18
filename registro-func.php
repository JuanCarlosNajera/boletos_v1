<?php 
require_once "conexion.php";

$nombre = $_POST['registerName'];
$email = $_POST['registerEmail'];
$password = $_POST['registerPassword'];
$confirm_password = $_POST['confirm_password'];
$tipo_usuario = $_POST['tipo_usuario'];

$query = "SELECT * FROM usuarios WHERE email='$email'";
$result = mysqli_query($conexion, $query);

if (mysqli_num_rows($result) > 0) {
    header("Location: registro.php?mensaje_error=El correo ya está en uso, por favor elige otro.");
} else {
    if ($password !== $confirm_password) {
        header("Location: registro.php?mensaje_error=Las contraseñas no coinciden, por favor verifica.");
    } else {
        $password_hash = password_hash($password, PASSWORD_BCRYPT);
        $query = "INSERT INTO usuarios (nombre, email, password, tipo_usuario) VALUES ('$nombre', '$email', '$password_hash', '$tipo_usuario')";
        if (mysqli_query($conexion, $query)) {
            header("Location: registro.php?mensaje=Registro exitoso. Ahora inicia sesión.");
        } else {
            header("Location: registro.php?mensaje_error=Error al registrarse.");
        }
    }
}

$conexion->close();
?>
