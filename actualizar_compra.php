<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema de Insumos</title>
    <!-- Enlace al CSS de Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="css/style.css" rel="stylesheet">
    <script>
        document.addEventListener('DOMContentLoaded', (event) => {
            const today = new Date().toISOString().split('T')[0];
            document.getElementById('fecha').setAttribute('min', today);
            document.getElementById('fecha').setAttribute('max', today);
        });
    </script>
</head>
<header>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Insumos Médicos</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link btn btn-outline-primary" aria-current="page" href="productos.php">Productos</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link btn btn-outline-primary" href="proveedores.php">Proveedores</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link btn btn-outline-primary" href="clientes.php">Clientes</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link btn btn-outline-primary" href="ventas.php">Ventas</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link btn btn-outline-primary active" href="compras.php">Compras</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link btn btn-outline-primary" href="alquiler.php">Alquileres</a>
                    </li>
                </ul>
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Usuario
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="#">Perfil</a></li>
                            <li><a class="dropdown-item" href="#">Editar</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item" href="logout.php">Cerrar sesión</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

</header>

<body>
    <div class="container mt-5">
        <h1>Actualizar Venta</h1>
        <form action="agregar_venta.php" method="POST">
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="id" class="form-label">ID</label>
                    <input type="number" class="form-control" id="id" name="id" required>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="id_cliente" class="form-label">ID Cliente</label>
                    <select class="form-select" id="id_cliente" name="id_cliente" required>
                        <option value="" disabled selected>Seleccione un cliente</option>
                        <?php
                        foreach ($clientes as $cliente) {
                            echo "<option value='" . $cliente['id'] . "'>" . $cliente['nombre'] . "</option>";
                        }
                        ?>
                    </select>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="id_usuario" class="form-label">ID Usuario</label>
                    <select class="form-select" id="id_usuario" name="id_usuario" required>
                        <option value="" disabled selected>Seleccione un usuario</option>
                        <?php
                        foreach ($usuarios as $usuario) {
                            echo "<option value='" . $usuario['id'] . "'>" . $usuario['nombre'] . "</option>";
                        }
                        ?>
                    </select>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="numero_comprobante" class="form-label">Número de Comprobante</label>
                    <input type="text" class="form-control" id="numero_comprobante" name="numero_comprobante" required>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="fecha" class="form-label">Fecha</label>
                    <input type="date" class="form-control" id="fecha" name="fecha" required>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="total" class="form-label">Total</label>
                    <input type="number" step="0.01" class="form-control" id="total" name="total" required>
                </div>
            </div>
            <div class="d-flex justify-content-end">
                <button type="button" class="btn btn-secondary me-2" onclick="window.location.href='index.php';">Cancelar</button>
                <button type="submit" class="btn btn-primary">Actualizar</button>
            </div>
        </form>
    </div>
</body>

<!-- Enlace al JS de Bootstrap -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</html>