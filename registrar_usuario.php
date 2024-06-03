<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema de Insumos</title>
    <!-- Enlace al CSS de Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="css/style.css" rel="stylesheet">
</head>


<body>
    <div class="container mt-5">
        <h1>Registrar Usuario</h1>
        <form action="registrar_usuario.php" method="POST">
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="id" class="form-label">ID</label>
                    <input type="number" class="form-control" id="id" name="id" required>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="id_rol" class="form-label">ID Rol</label>
                    <select class="form-select" id="id_rol" name="id_rol" required>
                        <option value="" disabled selected>Seleccione un rol</option>
                        <?php
                        foreach ($roles as $rol) {
                            echo "<option value='" . $rol['id'] . "'>" . $rol['nombre'] . "</option>";
                        }
                        ?>
                    </select>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="nombre" class="form-label">Nombre</label>
                    <input type="text" class="form-control" id="nombre" name="nombre" required>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="apellido" class="form-label">Apellido</label>
                    <input type="text" class="form-control" id="apellido" name="apellido" required>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="numero_documento" class="form-label">Número de Documento</label>
                    <input type="text" class="form-control" id="numero_documento" name="numero_documento" required>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="telefono" class="form-label">Teléfono</label>
                    <input type="text" class="form-control" id="telefono" name="telefono" required>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 mb-3">
                    <label for="direccion" class="form-label">Dirección</label>
                    <input type="text" class="form-control" id="direccion" name="direccion" required>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="correo" class="form-label">Correo</label>
                    <input type="email" class="form-control" id="correo" name="correo" required>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="contrasena" class="form-label">Contraseña</label>
                    <input type="password" class="form-control" id="contrasena" name="contrasena" required>
                </div>
            </div>
            <div class="d-flex justify-content-end">
                <button type="button" class="btn btn-secondary me-2" onclick="window.location.href='login.php';">Cancelar</button>
                <button type="submit" class="btn btn-primary">Registrar</button>
            </div>
        </form>
    </div>

</body>

<!-- Enlace al JS de Bootstrap -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</html>