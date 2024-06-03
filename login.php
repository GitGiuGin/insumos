<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <!-- Enlace al CSS de Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="css/style.css" rel="stylesheet">
</head>

<body>
    <div class="container d-flex justify-content-center align-items-center vh-100">
        <div class="card p-4 shadow-sm border border-primary border-5 rounded-4" style="width: 100%; max-width: 400px;">
            <div class="card-body">
                <h3 class="card-title text-center mb-4">Iniciar sesión</h3>
                <?php
                if (isset($_GET['error'])) {
                    echo '<div class="alert alert-danger" role="alert">' . htmlspecialchars($_GET['error']) . '</div>';
                }
                ?>
                <form action="process_login.php" method="POST">
                    <div class="mb-3">
                        <label for="email" class="form-label">Usuario</label>
                        <input type="email" class="form-control" id="email" name="email" placeholder="Ingresa tu usuario" required>
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Contraseña</label>
                        <input type="password" class="form-control" id="password" name="password" placeholder="Ingresa tu contraseña" required>
                    </div>
                    <div class="d-grid">
                        <button type="submit" class="btn btn-primary">Iniciar sesión</button>
                    </div>
                </form>
                <div class="mt-3 text-center">
                    <a href="#">¿Olvidaste tu contraseña?</a>
                </div>
                <div class="mt-3 text-center">
                    <span>¿No tienes una cuenta? <a href="registrar_usuario.php">Regístrate</a></span>
                </div>
            </div>
        </div>
    </div>
    <!-- Enlace al JS de Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>