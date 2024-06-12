<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    try {
        include_once("logic/Producto.php");
        $producto = new Producto();

        $producto->codigo = $_POST['codigo'];
        $producto->nombre = $_POST['nombre'];
        $producto->id_categoria = $_POST['id_categoria'];
        $producto->precio_compra = $_POST['precio_compra'];
        $producto->precio_venta = $_POST['precio_venta'];
        $producto->cantidad = $_POST['cantidad'];
        $producto->id_pais = $_POST['id_pais'];
        $producto->crear();

        header("Location: productos.php");
        exit();
    } catch (Exception $e) {
        // Manejo de errores
        $errorMessage = $e->getMessage();
        // Aquí puedes redirigir a una página de error, registrar el error, etc.
    }
}
?>
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
            <a class="navbar-brand" href="index.php">Insumos Médicos</a>
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
        <h1>Agregar Producto</h1>
        <form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="codigo" class="form-label">Código</label>
                    <input type="text" class="form-control" id="codigo" name="codigo" required>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="nombre" class="form-label">Nombre</label>
                    <input type="text" class="form-control" id="nombre" name="nombre" required>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="id_categoria" class="form-label">Categoría</label>
                    <a href="registrar_categoria.php">Nueva Categoría</a>
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
                    <input type="number" step="0.01" class="form-control" id="precio_compra" name="precio_compra" required>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="precio_venta" class="form-label">Precio Venta</label>
                    <input type="number" step="0.01" class="form-control" id="precio_venta" name="precio_venta" required>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="cantidad" class="form-label">Cantidad</label>
                    <input type="number" class="form-control" id="cantidad" name="cantidad" required>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="precio_venta" class="form-label">Pais de origen</label>
                    <?php
                    include_once 'logic/Pais.php';
                    $paises = Pais::consultar(); // Suponiendo que tienes un método estático en la clase Categoria para consultar las categorías
                    ?>
                    <select class="form-select" id="id_pais" name="id_pais" required>
                        <option value="" disabled selected>Seleccione una País</option>
                        <?php foreach ($paises as $pais) { ?>
                            <option value="<?php echo $pais->id ?>"><?php echo $pais->nombre; ?></option>
                        <?php } ?>
                    </select>
                </div>
            </div>
            <div class="d-flex justify-content-end">
                <button type="button" class="btn btn-secondary me-2" onclick="window.location.href='productos.php';">Cancelar</button>
                <button type="submit" class="btn btn-primary">Registrar</button>
            </div>
        </form>
    </div>
</body>

<!-- Enlace al JS de Bootstrap -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</html>