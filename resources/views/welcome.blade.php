
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>STORE | Bienvenido</title>
    @vite(['resources/scss/app.scss', 'resources/js/app.js'])
</head>

<body>

    <!-- Navbar -->
    <nav class="navbar md:navbar-expand bg-1" data-bs-theme="dark">
        <div class="container-fluid">

            <a class="navbar-brand" href="#">
                STORE
            </a>

            <button class="btn-icon navbar-toggler" type="button"
                data-bs-toggle="drawer" data-bs-target="#navbarDarkDrawer"
                aria-controls="navbarDarkDrawer" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon" aria-hidden="true"></span>
            </button>

            <dialog class="drawer drawer-end" tabindex="-1"
                id="navbarDarkDrawer"
                aria-labelledby="navbarDarkDrawerLabel">

                <div class="drawer-header">
                    <h5 class="drawer-title" id="navbarDarkDrawerLabel">
                        Menu
                    </h5>

                    <button type="button" class="btn-close"
                        data-bs-dismiss="drawer" aria-label="Close">
                    </button>
                </div>

                <div class="drawer-body mb-2 md:mb-0">

                    <ul class="nav navbar-nav me-auto">

                        <li class="nav-item">
                            <a class="nav-link"
                                href="{{ route('bodegas.index') }}">
                                Bodegas
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link"
                                href="{{ route('categorias.index') }}">
                                Categorías
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link"
                                href="{{ route('clientes.index') }}">
                                Clientes
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link"
                                href="{{ route('empleados.index') }}">
                                Empleados
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link"
                                href="{{ route('pedidos.index') }}">
                                Pedidos
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link"
                                href="{{ route('productos.index') }}">
                                Productos
                            </a>
                        </li>

                    </ul>

                    <form action="{{ route('clientes.index') }}"
                        method="GET" class="hstack gap-2" role="search">

                        <input class="form-control" name="codigo"
                            type="search" placeholder="Search"
                            aria-label="Search" />

                        <button class="btn-solid btn-icon theme-secondary"
                            type="submit">
                            <svg class="bi" width="16" height="16">
                                <use href="#search" />
                            </svg>
                        </button>

                    </form>

                </div>
            </dialog>

        </div>
    </nav>

    <!-- Contenido principal -->
    <main class="container py-5">

        <!-- Bienvenida -->
        <section class="row align-items-center py-5 mb-4">

            <div class="col-lg-8">

                <span class="badge text-bg-primary mb-3">
                    Sistema de gestión
                </span>

                <h1 class="display-4 fw-bold mb-3">
                    Bienvenido a STORE
                </h1>

                <p class="lead text-secondary mb-4">
                    Gestiona y organiza las operaciones de tu negocio
                    desde una plataforma sencilla y centralizada.
                    Mantén el control de tus productos, clientes,
                    empleados y pedidos.
                </p>

                <a href="{{ route('productos.index') }}"
                    class="btn-solid theme-primary me-2">
                    Comenzar
                </a>

                <a href="{{ route('bodegas.index') }}"
                    class="btn-solid theme-secondary">
                    Explorar bodegas
                </a>

            </div>

        </section>

        <hr class="my-4">

        <!-- Accesos rápidos -->
        <section class="py-3">

            <div class="mb-4">

                <h2 class="h4 fw-bold">
                    Accesos rápidos
                </h2>

                <p class="text-secondary">
                    Selecciona el módulo que deseas administrar.
                </p>

            </div>

            <div class="row g-3">

                <!-- Productos -->
                <div class="col-md-4">

                    <a href="{{ route('productos.index') }}"
                        class="card text-decoration-none h-100">

                        <div class="card-body">

                            <h5 class="card-title">
                                Productos
                            </h5>

                            <p class="card-text text-secondary">
                                Consulta y administra tu inventario.
                            </p>

                        </div>

                    </a>

                </div>

                <!-- Bodegas -->
                <div class="col-md-4">

                    <a href="{{ route('bodegas.index') }}"
                        class="card text-decoration-none h-100">

                        <div class="card-body">

                            <h5 class="card-title">
                                Bodegas
                            </h5>

                            <p class="card-text text-secondary">
                                Organiza tus espacios de almacenamiento.
                            </p>

                        </div>

                    </a>

                </div>

                <!-- Categorías -->
                <div class="col-md-4">

                    <a href="{{ route('categorias.index') }}"
                        class="card text-decoration-none h-100">

                        <div class="card-body">

                            <h5 class="card-title">
                                Categorías
                            </h5>

                            <p class="card-text text-secondary">
                                Clasifica los productos registrados.
                            </p>

                        </div>

                    </a>

                </div>

            </div>

        </section>

    </main>

    <!-- Footer -->
    <footer class="border-top py-3 mt-5">

        <div class="container text-center">

            <small class="text-secondary">
                © {{ date('Y') }} STORE. Sistema de gestión de inventario.
            </small>

        </div>

    </footer>

</body>

</html>
