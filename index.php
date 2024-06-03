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
                        <a class="nav-link btn btn-outline-primary" href="productos.php">Productos</a>
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
    <!-- Formulario de Búsqueda -->
    <div class="container mt-5">
        <form class="d-flex" action="buscar.php" method="GET">
            <input class="form-control me-2" type="search" name="query" placeholder="Buscar" aria-label="Buscar">
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="categoria" id="categoria" value="categoria">
                <label class="form-check-label" for="categoria1">Categoría</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="nombre" id="nombre" value="nombre">
                <label class="form-check-label" for="categoria2">Nombre</label>
            </div>
            <!-- Añadimos mas segun necesitemos -->
            <button class="btn btn-outline-success" type="submit">Buscar</button>
        </form>

    </div>

    <div class="container mt-5">
        <h1 class="mb-4">Lista de Productos</h1>
        <table class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Código</th>
                    <th>Nombre</th>
                    <th>ID Categoria</th>
                    <th>Precio Compra</th>
                    <th>Precio Venta</th>
                    <th>Cantidad</th>
                    <th>Editar</th>
                    <th>Eliminar</th>
                </tr>
            </thead>
            <tbody>
                <!-- Consulta a la base de datos -->
            </tbody>
        </table>
        <div class="d-flex justify-content-end">
            <a href="registrar_producto.php" class="btn btn-success btn-add-product mb-3">Agregar Producto</a>
        </div>
    </div>
</body>
<!-- Footer -->
<footer class="bg-light text-center text-lg-start">
    <div class="container p-4">
        <div class="row">
            <div class="col-lg-4 col-md-6 mb-4 mb-md-0">
                <h5 class="text-uppercase">Sobre nosotros</h5>
                <p>
                    Somos una empresa dedicada a la gestión de insumos, ofreciendo soluciones para productos, proveedores, clientes, ventas, compras y alquileres.
                </p>
            </div>
            <div class="col-lg-2 col-md-6 mb-4 mb-md-0">
                <h5 class="text-uppercase">Secciones</h5>
                <ul class="list-unstyled mb-0">
                    <li>
                        <a href="#" class="text-dark">Productos</a>
                    </li>
                    <li>
                        <a href="#" class="text-dark">Proveedores</a>
                    </li>
                    <li>
                        <a href="#" class="text-dark">Clientes</a>
                    </li>
                    <li>
                        <a href="#" class="text-dark">Ventas</a>
                    </li>
                    <li>
                        <a href="#" class="text-dark">Compras</a>
                    </li>
                    <li>
                        <a href="#" class="text-dark">Alquileres</a>
                    </li>
                </ul>
            </div>
            <div class="col-lg-2 col-md-6 mb-4 mb-md-0">
                <h5 class="text-uppercase">Enlaces útiles</h5>
                <ul class="list-unstyled mb-0">
                    <li>
                        <a href="#" class="text-dark">Soporte</a>
                    </li>
                    <li>
                        <a href="#" class="text-dark">Términos de uso</a>
                    </li>
                    <li>
                        <a href="#" class="text-dark">Política de privacidad</a>
                    </li>
                    <li>
                        <a href="#" class="text-dark">Contacto</a>
                    </li>
                </ul>
            </div>
            <div class="col-lg-4 col-md-6 mb-4 mb-md-0">
                <h5 class="text-uppercase">Contacto</h5>
                <p>
                    Caja Ferrroviaria, Av. Primavera, La Paz, Bolivia<br>
                    Teléfono: (+591) 69840923<br>
                    Correo: info@hotmail.com
                </p>
                <div>
                    <a href="#" class="text-dark me-4">
                        <i class="bi bi-facebook"></i>
                    </a>
                    <a href="#" class="text-dark me-4">
                        <i class="bi bi-twitter"></i>
                    </a>
                    <a href="#" class="text-dark me-4">
                        <i class="bi bi-instagram"></i>
                    </a>
                    <a href="#" class="text-dark me-4">
                        <i class="bi bi-linkedin"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <div class="text-center p-3 bg-dark text-light">
        © 2024 Sistema de Insumos. Todos los derechos reservados.
    </div>
</footer>
<!-- Enlace al JS de Bootstrap -->

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</html>