<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Categorias</title>
    @vite(['resources/scss/app.scss', 'resources/js/app.js'])
</head>

<body>
    <nav class="navbar md:navbar-expand bg-1" data-bs-theme="dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="/">STORE</a>
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
                            <a class="nav-link" href="{{ route('bodegas.index') }}">Bodegas</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page"
                                href="{{ route('categorias.index') }}">Categorias</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('clientes.index') }}">Clientes</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('empleados.index') }}">Empleados</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('pedidos.index') }}">Pedidos</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('productos.index') }}">Productos</a>
                        </li>
                        <li class="nav-item">
                            <button class="nav-link" type="button" data-bs-toggle="menu" aria-expanded="false">
                                Menu
                            </button>
                            <div class="menu">
                                <a class="menu-item" href="#">Action</a>
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
                <h1 class="h3 mb-1">Gestión de Categorias</h1>
                <p class="text-secondary mb-0">
                    Administra la información de tus categorias.
                </p>
            </div>

            <button type="button" class="btn-register" data-bs-toggle="dialog" data-bs-target="#staticBackdropDialog"
                data-bs-backdrop="static">
                Registrar categoria
            </button>
        </div>
    </div>

    <dialog class="dialog dialog-scrollable d-flex flex-column" id="staticBackdropDialog" style="max-height: 85vh;">
        <form action="{{ route('categorias.store') }}" method="POST"
            class="d-flex flex-column overflow-hidden h-100 m-0">
            @csrf
            <div class="dialog-header flex-shrink-0">
                <h1 class="dialog-title">Ingrese los datos de la nueva categoria</h1>
                <button type="button" class="btn-close" data-bs-dismiss="dialog" aria-label="Close"></button>
            </div>

            <div class="dialog-body overflow-y-auto flex-grow-1 p-3">

                <div class="mb-3">
                    <label for="nombre" class="form-label">Nombre</label>
                    <input type="text" class="form-control" id="nombre" name="nombre"
                        placeholder="Chuleta de cerdo">
                </div>

                <div class="mb-3">
                    <label for="descripcion" class="form-label">Descripcion</label>
                    <input type="text" class="form-control" id="descripcion" name="descripcion"
                        placeholder="Carnes congeladas">
                </div>

                <div class="mb-3">
                    <label for="estado" class="form-label">Estado</label>
                    <button class="form-control combobox-toggle" type="button" data-bs-toggle="combobox"
                        data-bs-name="estado" data-bs-placeholder="Seleccione un estado">
                        <span class="combobox-value">Seleccione un estado</span>
                        <svg class="combobox-caret" width="10" height="16" viewBox="0 0 10 16"
                            fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M0.46967 5.46967C0.762563 5.17678 1.23744 5.17678 1.53033 5.46967L5 8.93934L8.46967 5.46967C8.76256 5.17678 9.23744 5.17678 9.53033 5.46967C9.82322 5.76256 9.82322 6.23744 9.53033 6.53033L5.53033 10.5303C5.23744 10.8232 4.76256 10.8232 4.46967 10.5303L0.46967 6.53033C0.176777 6.23744 0.176777 5.76256 0.46967 5.46967Z"
                                fill="currentcolor" />
                        </svg>
                    </button>
                    <div class="menu">
                        <button class="menu-item selected" type="button" data-bs-value="Activo"
                            aria-selected="true">Activa</button>
                        <button class="menu-item" type="button" data-bs-value="Inactivo">Inactiva</button>
                    </div>
                </div>

            </div>

            <div class="dialog-footer flex-shrink-0">
                <button type="button" class="btn-solid theme-secondary" data-bs-dismiss="dialog">Cerrar</button>
                <button type="submit" class="btn-solid theme-primary">Guardar Categoria</button>
            </div>
        </form>
    </dialog>

    @if (session('status'))
        <div class="toast position-fixed bottom-0 end-0 m-6 z-toast" role="alert" aria-live="assertive"
            aria-atomic="true">
            <div class="toast-header">
                <strong class="me-auto">Exito!</strong>
                <small>Bien hecho!</small>
                <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
            </div>
            <div class="toast-body">
                {{ session('status') }}
            </div>
        </div>
    @endif

    @if ($errors->any())
        <div class="toast position-fixed bottom-0 end-0 m-6 z-toast" role="alert" aria-live="assertive"
            aria-atomic="true">
            <div class="toast-header">
                <strong class="me-auto">Alerta!</strong>
                <small>Se han detectado estos errores</small>
                <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
            </div>
            <div class="toast-body">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        </div>
    @endif

    <table class="table">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Nombre</th>
                <th scope="col">Descripcion</th>
                <th scope="col">Estado</th>
                <th scope="col">Acciones</th>
            </tr>
        </thead>
        <tbody>
            @forelse($categorias as $categoria)
                <tr>
                    <th scope="row">{{ $categoria->id }}</th>
                    <td>{{ $categoria->nombre }}</td>
                    <td>{{ $categoria->descripcion }}</td>
                    <td>{{ $categoria->estado }}</td>
                    <td>
                        <div class="btn-group" role="group" aria-label="Outlined example">
                            <button type="button" class="btn btn-outline-primary btn-sm" data-bs-toggle="dialog"
                                data-bs-target="#staticBackdropDialogEditar{{ $categoria->id }}">Editar</button>

                            <dialog class="dialog dialog-scrollable d-flex flex-column"
                                id="staticBackdropDialogEditar{{ $categoria->id }}" style="max-height: 85vh;">
                                <form action="{{ route('categorias.update', $categoria->id) }}" method="POST"
                                    class="d-flex flex-column overflow-hidden h-100 m-0">
                                    @csrf
                                    @method('PUT')
                                    <div class="dialog-header flex-shrink-0">
                                        <h1 class="dialog-title">Ingrese los datos del nuevo Cliente</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="dialog"
                                            aria-label="Close"></button>
                                    </div>

                                    <div class="dialog-body overflow-y-auto flex-grow-1 p-3">

                                        <div class="mb-3">
                                            <label for="nombre" class="form-label">Nombre</label>
                                            <input type="text" class="form-control" id="nombre" name="nombre"
                                                value="{{ old('nombre', $categoria->nombre) }}"
                                                placeholder="Chuleta de Cerdo">

                                            <div class="mb-3">
                                                <label for="descripcion class="form-label>Descripcion</label>
                                                <input type="text" class="form-control" id="descripcion"
                                                    name="descripcion" value="{{ old('descripcion', $categoria->descripcion) }}"
                                                    placeholder="Carnes congeladas">

                                                <div class="mb-3">
                                                    <label for="estado" class="form-label">Estado</label>

                                                    <button id="estado" class="form-control combobox-toggle"
                                                        type="button" data-bs-toggle="combobox"
                                                        data-bs-name="estado" data-bs-placeholder="Escoja un Estado">
                                                        <span class="combobox-value">Selecciona un estado</span>
                                                        <svg class="combobox-caret" width="10" height="16"
                                                            viewBox="0 0 10 16" fill="none"
                                                            xmlns="http://www.w3.org/2000/svg">
                                                            <path
                                                                d="M0.46967 5.46967C0.762563 5.17678 1.23744 5.17678 1.53033 5.46967L5 8.93934L8.46967 5.46967C8.76256 5.17678 9.23744 5.17678 9.53033 5.46967C9.82322 5.76256 9.82322 6.23744 9.53033 6.53033L5.53033 10.5303C5.23744 10.8232 4.76256 10.8232 4.46967 10.5303L0.46967 6.53033C0.176777 6.23744 0.176777 5.76256 0.46967 5.46967Z"
                                                                fill="currentcolor" />
                                                        </svg>
                                                    </button>
                                                    <div class="menu">
                                                        <button class="menu-item selected" type="button"
                                                            data-bs-value="Activo"
                                                            aria-selected="true">Activa</button>
                                                        <button class="menu-item" type="button"
                                                            data-bs-value="Inactivo">Inactiva</button>
                                                    </div>
                                                    <div class="form-text">Selecciona el estado de la categoria.</div>
                                                </div>
                                            </div>

                                            <div class="dialog-footer flex-shrink-0">
                                                <button type="button" class="btn-solid theme-secondary"
                                                    data-bs-dismiss="dialog">Cerrar</button>
                                                <button type="submit" class="btn-solid theme-primary">Actualizar
                                                    categoria</button>
                                            </div>
                                </form>
                            </dialog>

                            <form action="{{ route('categorias.destroy', [$categoria->id]) }}" method="post">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-outline-danger btn-sm">Eliminar</button>
                            </form>

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

</body>

</html>
