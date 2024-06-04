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
                        <a class="nav-link btn btn-outline-primary active" aria-current="page" href="productos.php">Productos</a>
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
        <h1>Actualizar Producto</h1>
        <?php
        include_once 'logic/Producto.php';
        $id = $_GET['id'];
        $producto = Producto::getId($id);
        ?>
        <?php
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            include_once("logic/Producto.php");
            $update = new Producto();

            $update->id = $_POST['id'];
            $update->codigo = $_POST['codigo'];
            $update->nombre = $_POST['nombre'];
            $update->id_categoria = $_POST['id_categoria'];
            $update->precio_compra = $_POST['precio_compra'];
            $update->precio_venta = $_POST['precio_venta'];
            $update->cantidad = $_POST['cantidad'];
            $update->actualizar();

            // Redireccionar después de la actualización
            header("Location: productos.php");
            exit();
        }
        ?>
        <form action="actualizar_producto.php" method="POST">
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="codigo" class="form-label">Código</label>
                    <input type="text" class="form-control" id="codigo" name="codigo" value="<?php echo $producto->codigo; ?>" readonly>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="nombre" class="form-label">Nombre</label>
                    <input type="text" class="form-control" id="nombre" name="nombre" value="<?php echo $producto->nombre; ?>" readonly>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4 mb-2">
                    <label for="id_categoria" class="form-label">Categoría</label>
                    <a href="registrar_categoria.php">Nueva Categoria</a>
                    <?php
                    include_once 'logic/Categoria.php';
                    $categorias = Categoria::consultar(); // Suponiendo que tienes un método estático en la clase Categoria para consultar las categorías
                    ?>
                    <select class="form-select" id="id_categoria" name="id_categoria" required>
                        <option value="" disabled selected>Seleccione una categoría</option>
                        <?php foreach ($categorias as $categoria) { ?>
                            <option value="<?php echo $categoria->id ?>"><?php echo $categoria->nombre; ?></option>
                        <?php } ?>
                    </select>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="precio_compra" class="form-label">Precio Compra</label>
                    <input type="number" step="0.01" class="form-control" id="precio_compra" name="precio_compra" value="<?php echo $producto->precio_compra; ?>" required>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="precio_venta" class="form-label">Precio Venta</label>
                    <input type="number" step="0.01" class="form-control" id="precio_venta" name="precio_venta" value="<?php echo $producto->precio_venta; ?>" required>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="cantidad" class="form-label">Cantidad</label>
                    <input type="number" class="form-control" id="cantidad" name="cantidad" value="<?php echo $producto->cantidad; ?>" readonly>
                </div>
            </div>
            <div class="d-flex justify-content-end">
                <button type="button" class="btn btn-secondary me-2" onclick="window.location.href='index.php';">Cancelar</button>
                <button type="submit" class="btn btn-primary">Actualizar</button>
            </div>
            <input type="hidden" class="form-control" id="id" name="id" value="<?php echo $producto->id; ?>" readonly>
        </form> 
    </div>
</body>

<!-- Enlace al JS de Bootstrap -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</html>