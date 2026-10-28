<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Clientes</title>
    @vite(['resources/scss/app.scss', 'resources/js/app.js'])
</head>

<body>
    <nav class="navbar md:navbar-expand bg-1" data-bs-theme="dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">STORE</a>
            <button class="btn-icon navbar-toggler" type="button" data-bs-toggle="drawer"
                data-bs-target="#navbarDarkDrawer" aria-controls="navbarDarkDrawer" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon" aria-hidden="true"></span>
            </button>
            <dialog class="drawer drawer-end" tabindex="-1" id="navbarDarkDrawer"
                aria-labelledby="navbarDarkDrawerLabel">
                <div class="drawer-header">
                    <h5 class="drawer-title" id="navbarDarkDrawerLabel">Menu</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="drawer" aria-label="Close"></button>
                </div>
                <div class="drawer-body mb-2 md:mb-0">
                    <ul class="nav navbar-nav me-auto">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="#">Categorias</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Empleados</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Pedidos</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Productos</a>
                        </li>
                        <li class="nav-item">
                            <button class="nav-link" type="button" data-bs-toggle="menu" aria-expanded="false">
                                Menu
                            </button>
                            <div class="menu">
                                <a class="menu-item" href="#">Actualizar</a>
                                <a class="menu-item" href="#">Another action</a>
                                <hr class="menu-divider">
                                <a class="menu-item" href="#">Something else here</a>
                            </div>
                        </li>
                    </ul>
                    <form class="hstack gap-2" role="search">
                        <input class="form-control" type="search" placeholder="Search" aria-label="Search" />
                        <button class="btn-solid btn-icon theme-secondary" type="submit">
                            <svg class="bi" width="16" height="16">
                                <use href="#search" />
                            </svg>
                        </button>
                    </form>
                </div>
            </dialog>
        </div>
    </nav>

    <div class="container-fluid px-4 py-4">
        <div class="d-flex justify-content-between align-items-center flex-wrap gap-3 mb-4">
            <div>
                <h1 class="h3 mb-1">Gestión de clientes</h1>
                <p class="text-secondary mb-0">
                    Administra la información de tus clientes.
                </p>
            </div>

            <button type="button" class="btn-register" data-bs-toggle="dialog" data-bs-target="#staticBackdropDialog"
                data-bs-backdrop="static">
                Registrar cliente
            </button>
        </div>
    </div>

    <dialog class="dialog dialog-scrollable d-flex flex-column" id="staticBackdropDialog" style="max-height: 85vh;">
        <form action="{{ route('clientes.store') }}" method="POST"
            class="d-flex flex-column overflow-hidden h-100 m-0">
            @csrf
            <div class="dialog-header flex-shrink-0">
                <h1 class="dialog-title">Ingrese los datos del nuevo Cliente</h1>
                <button type="button" class="btn-close" data-bs-dismiss="dialog" aria-label="Close"></button>
            </div>

            <div class="dialog-body overflow-y-auto flex-grow-1 p-3">
                <div class="mb-3">
                    <label for="codigo" class="form-label">Codigo</label>
                    <input type="text" class="form-control" id="codigo" name="codigo" placeholder="CLI-#####">
                </div>

                <div class="mb-3">
                    <label for="nombre" class="form-label">Nombre</label>
                    <input type="text" class="form-control" id="nombre" name="nombre"
                        placeholder="Erick Chirinos">
                </div>

                <div class="mb-3">
                    <label for="email" class="form-label">Correo electrónico</label>
                    <input type="email" class="form-control" id="email" name="email"
                        placeholder="name@example.com">
                    <div class="form-text">
                        Tu correo electrónico se utilizará para identificar al cliente.
                    </div>
                </div>

                <div class="mb-3">
                    <label for="telefono" class="form-label">Telefono</label>
                    <input type="text" class="form-control" id="telefono" name="telefono"
                        placeholder="+504 93983261">
                </div>

                <div class="mb-3">
                    <label for="direccion" class="form-label">Direccion</label>
                    <input type="text" class="form-control" id="direccion" name="direccion"
                        placeholder="Col. Carmen Elena">
                </div>

                <div class="mb-3">
                    <label for="estado" class="form-label">Estado</label>
                    <button id="estado" class="form-control combobox-toggle" type="button"
                        data-bs-toggle="combobox" data-bs-name="estado" data-bs-placeholder="Selecciona un estado">
                        <span class="combobox-value">Selecciona un estado</span>
                        <svg class="combobox-caret" width="10" height="16" viewBox="0 0 10 16"
                            fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M0.46967 5.46967C0.762563 5.17678 1.23744 5.17678 1.53033 5.46967L5 8.93934L8.46967 5.46967C8.76256 5.17678 9.23744 5.17678 9.53033 5.46967C9.82322 5.76256 9.82322 6.23744 9.53033 6.53033L5.53033 10.5303C5.23744 10.8232 4.76256 10.8232 4.46967 10.5303L0.46967 6.53033C0.176777 6.23744 0.176777 5.76256 0.46967 5.46967Z"
                                fill="currentcolor" />
                        </svg>
                    </button>
                    <div class="menu">
                        <button class="menu-item" type="button" data-bs-value="Activo">Activo</button>
                        <button class="menu-item" type="button" data-bs-value="Inactivo">Inactivo</button>
                    </div>
                    <div class="form-text">Selecciona el estado del cliente.</div>
                </div>
            </div>

            <div class="dialog-footer flex-shrink-0">
                <button type="button" class="btn-solid theme-secondary" data-bs-dismiss="dialog">Cerrar</button>
                <button type="submit" class="btn-solid theme-primary">Guardar cliente</button>
            </div>
        </form>
    </dialog>

    <div class="container-fluid px-4">
        <div class="table-responsive">
            <table class="table table-dark table-hover align-middle">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Codigo</th>
                        <th scope="col">Nombre</th>
                        <th scope="col">Email</th>
                        <th scope="col">Telefono</th>
                        <th scope="col">Direccion</th>
                        <th scope="col">Estado</th>
                        <th scope="col">Accion</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($clientes as $cliente)
                        <tr>
                            <th scope="row">{{ $cliente->id }}</th>
                            <td>{{ $cliente->codigo }}</td>
                            <td>{{ $cliente->nombre }}</td>
                            <td>{{ $cliente->email }}</td>
                            <td>{{ $cliente->telefono }}</td>
                            <td>{{ $cliente->direccion }}</td>
                            <td>{{ $cliente->estado }}</td>
                            <td>
                                <div class="btn-group" role="group" aria-label="Outlined example">
                                    <button type="button" class="btn btn-outline-primary btn-sm">Editar</button>
                                    <button type="button" class="btn btn-outline-danger btn-sm">Eliminar</button>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="8">No hay registros</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</body>

</html>
