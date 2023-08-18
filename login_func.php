<?php
require_once "conexion.php";

// Procesar los datos del formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $email = $_POST["loginEmail"];
  $password = $_POST["loginPassword"];

  // Consultar la base de datos para verificar las credenciales de acceso
  $sql = "SELECT id_usuario, nombre, password, tipo_usuario FROM usuarios WHERE email = ?";
  $stmt = mysqli_prepare($conexion, $sql);
  mysqli_stmt_bind_param($stmt, "s", $email);
  mysqli_stmt_execute($stmt);
  $result = mysqli_stmt_get_result($stmt);

  if (mysqli_num_rows($result) == 1) {
    $row = mysqli_fetch_assoc($result);
    $id_usuario = $row['id_usuario']; // Obtener el id_usuario de la fila correspondiente
    // Verificar la contraseña encriptada
    if (password_verify($password, $row["password"])) {
      // Inicio de sesión exitoso
      session_start();
      $_SESSION['id_usuario'] = $id_usuario;
      $_SESSION['nombre'] = $row['nombre'];
      $_SESSION["loggedin"] = true;
      $_SESSION["email"] = $email;

      // Determinar el tipo de usuario y redireccionar a la página correspondiente
      $tipo_usuario = $row['tipo_usuario'];
      if ($tipo_usuario == 'administrador') {
        header("Location: admin.php"); // Redireccionar al administrador a su página correspondiente
      } elseif ($tipo_usuario == 'cliente') {
        header("Location: index.html"); // Redireccionar al biodiversidad a su página correspondiente
       // header("Location: prueba_asientos.php"); // Redireccionar al biodiversidad a su página correspondiente
      } elseif ($tipo_usuario == 'usuario_n') {
        header("Location: usuario_n.php"); // Redireccionar al usuario_n especial a su página correspondiente
      }
    } else {
      // Contraseña incorrecta
      header("Location: index.php?mensaje_error=La contraseña es incorrecta.");
    }
  } else {
    // Correo electrónico no encontrado
    header("Location: index.php?mensaje_error=El correo electrónico no está registrado.");
  }

  // Cerrar la consulta preparada
  mysqli_stmt_close($stmt);
}

// Cerrar la conexión a la base de datos
mysqli_close($conexion);
?>
