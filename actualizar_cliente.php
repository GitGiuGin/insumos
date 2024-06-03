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
                        <a class="nav-link btn btn-outline-primary active" href="clientes.php">Clientes</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link btn btn-outline-primary" href="ventas.php">Ventas</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link btn btn-outline-primary" href="compras.php">Compras</a>
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
        <h1>Actualizar Cliente</h1>
        <?php
            include_once 'logic/Cliente.php';
            $id = $_GET['id'];
            $cliente = Cliente::getId($id);
        ?>
        <form action="logic/Cliente.php" method="POST">
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="id" class="form-label">ID</label>
                    <input type="number" class="form-control" id="id" name="id" value="<?php echo $cliente->id; ?>" required>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="nombre" class="form-label">Nombre</label>
                    <input type="text" class="form-control" id="nombre" name="nombre" value="<?php echo $cliente->nombre; ?>" required>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="apellido" class="form-label">Apellido</label>
                    <input type="text" class="form-control" id="apellido" name="apellido" value="<?php echo $cliente->apellido; ?>" required>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="tipo_documento" class="form-label">Tipo de Documento</label>
                    <select class="form-select" id="tipo_documento" name="tipo_documento" required>
                        <option value="" disabled selected>Seleccione el tipo de documento</option>
                        <option value="Carnet de identidad">Carnet de identidad</option>
                        <option value="NIT">NIT</option>
                    </select>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="numero_documento" class="form-label">Número de Documento</label>
                    <input type="text" class="form-control" id="numero_documento" name="numero_documento" value="<?php echo $cliente->num_documento; ?>" required>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="direccion" class="form-label">Dirección</label>
                    <input type="text" class="form-control" id="direccion" name="direccion" value="<?php echo $cliente->direccion; ?>" required>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="telefono" class="form-label">Teléfono</label>
                    <input type="text" class="form-control" id="telefono" name="telefono" value="<?php echo $cliente->telefono; ?>" required>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="correo" class="form-label">Correo</label>
                    <input type="email" class="form-control" id="correo" name="correo" value="<?php echo $cliente->correo; ?>" required>
                </div>
            </div>
            <div class="d-flex justify-content-end">
                <button type="button" class="btn btn-secondary me-2" onclick="window.location.href='index.php';">Cancelar</button>
                <button type="submit" class="btn btn-primary">Actualizar</button>
                <?php
                    /*
                    $id = $_POST['id'];
                    $nombre = $_POST['nombre'];
                    $apellido = $_POST['apellido'];
                    $tipo_documento = $_POST['tipo_documento'];
                    $numero_documento = $_POST['numero_documento'];
                    $direccion = $_POST['direccion'];
                    $telefono = $_POST['telefono'];
                    $correo = $_POST['correo'];
                    

                    $cliente->id = $id;
                    $cliente->nombre = $nombre;
                    $cliente->apellido = $apellido;
                    $cliente->tipo_documento = $tipo_documento;
                    $cliente->num_documento = $numero_documento;
                    $cliente->direccion = $direccion;
                    $cliente->telefono = $telefono;
                    $cliente->correo = $correo;

                    $cliente->actualizar();*/
                ?>
            </div>
        </form>
    </div>
</body>

<!-- Enlace al JS de Bootstrap -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</html>