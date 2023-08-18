<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de Usuario</title>
    <!-- Agrega enlaces a los archivos CSS de Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1 class="mb-4">Registro de Usuario</h1>
        <?php
        if (isset($_GET['mensaje_error'])) {
            echo '<p class="text-danger">' . $_GET['mensaje_error'] . '</p>';
        } elseif (isset($_GET['mensaje'])) {
            echo '<p class="text-success">' . $_GET['mensaje'] . '</p>';
        }
        ?>
        <form action="registro-func.php" method="POST">
            <div class="mb-3">
                <label for="registerName" class="form-label">Nombre:</label>
                <input type="text" class="form-control" name="registerName" required>
            </div>
            
            <div class="mb-3">
                <label for="registerEmail" class="form-label">Correo electrónico:</label>
                <input type="email" class="form-control" name="registerEmail" required>
            </div>
            
            <div class="mb-3">
                <label for="registerPassword" class="form-label">Contraseña:</label>
                <input type="password" class="form-control" name="registerPassword" required>
            </div>
            
            <div class="mb-3">
                <label for="confirm_password" class="form-label">Confirmar Contraseña:</label>
                <input type="password" class="form-control" name="confirm_password" required>
            </div>
            
            <div class="mb-3">
                <input type="hidden" value="cliente" name="tipo_usuario">
            </div>
            
            <button type="submit" class="btn btn-primary">Registrarse</button>
        </form>
    </div>
    <!-- Agrega enlaces a los archivos JavaScript de Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
</body>
</html>
