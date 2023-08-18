<!DOCTYPE html>
<html>
<head>
  <title>Iniciar Sesión</title>
  <!-- Agregar los enlaces a los estilos de Bootstrap -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
  <div class="container">
    <h2 class="mt-4">Iniciar Sesión</h2>
    <form action="login_func.php" method="POST">
      <div class="mb-3">
        <label for="loginEmail" class="form-label">Correo Electrónico:</label>
        <input type="email" id="loginEmail" name="loginEmail" class="form-control" required>
      </div>
      
      <div class="mb-3">
        <label for="loginPassword" class="form-label">Contraseña:</label>
        <input type="password" id="loginPassword" name="loginPassword" class="form-control" required>
      </div>
      
      <button type="submit" class="btn btn-primary">Iniciar Sesión</button>
      <a href="registro.php" class="btn btn-danger"><i class="fas fa-sign-out-alt"></i>Registrate</a>
      <br>
     
    </form>
  </div>
  <!-- Agregar los scripts de Bootstrap al final del body -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
