<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bodegas</title>
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
                            <a class="nav-link active" href="{{ route('bodegas.index') }}">Bodegas</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" aria-current="page"
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
                                <a class="menu-item" href="{{ route('clientes.index') }}">Mostrar todo</a>
                                <a class="menu-item" href="#">Another action</a>
                                <hr class="menu-divider">
                                <a class="menu-item" href="#">Something else here</a>
                            </div>
                        </li>
                    </ul>
                    <form action="{{ route('clientes.index') }}" method="GET" class="hstack gap-2" role="search">
                        <input class="form-control" name="codigo" type="search" placeholder="Search"
                            aria-label="Search" />
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
                <h1 class="h3 mb-1">Gestión de Bodegas</h1>
                <p class="text-secondary mb-0">
                    Administra la información de tus bodegas.
                </p>
            </div>

            <button type="button" class="btn-register" data-bs-toggle="dialog" data-bs-target="#staticBackdropDialog"
                data-bs-backdrop="static">
                Registrar Bodega
            </button>
        </div>
    </div>

    <dialog class="dialog dialog-scrollable d-flex flex-column" id="staticBackdropDialog" style="max-height: 85vh;">
        <form action="{{ route('bodegas.store') }}" method="POST" class="d-flex flex-column overflow-hidden h-100 m-0">
            @csrf
            <div class="dialog-header flex-shrink-0">
                <h1 class="dialog-title">Ingrese los datos de la nueva bodega</h1>
                <button type="button" class="btn-close" data-bs-dismiss="dialog" aria-label="Close"></button>
            </div>

            <div class="dialog-body overflow-y-auto flex-grow-1 p-3">

                <div class="mb-3">
                    <label for="nombre" class="form-label">Nombre</label>
                    <input type="text" class="form-control" id="nombre" name="nombre"
                        placeholder="Bodega Mayor">
                </div>

                <div class="mb-3">
                    <label for="descripcion" class="form-label">Descripcion</label>
                    <input type="text" class="form-control" id="descripcion" name="descripcion"
                        placeholder="Bodega Principal">
                </div>

                <div class="mb-3">
                    <label for="codigo" class="form-label">Codigo</label>
                    <input type="text" class="form-control" id="codigo" name="codigo"
                        placeholder="BOD-0001">
                </div>

            </div>

            <div class="dialog-footer flex-shrink-0">
                <button type="button" class="btn-solid theme-secondary" data-bs-dismiss="dialog">Cerrar</button>
                <button type="submit" class="btn-solid theme-primary">Guardar Bodega</button>
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
                <th scope="col">#</th>
                <th scope="col">Nombre</th>
                <th scope="col">Descripcion</th>
                <th scope="col">Codigo</th>
                <th scope="col">Acciones</th>
            </tr>
        </thead>
        <tbody>
            @forelse($bodegas as $bodega)
                <tr>
                    <th scope="row">{{ $bodega->id }}</th>
                    <td>{{ $bodega->nombre }}</td>
                    <td>{{ $bodega->descripcion }}</td>
                    <td>{{ $bodega->codigo }}</td>
                    <td>
                        <div class="btn-group" role="group" aria-label="Basic example">
                            <button type="button" class="btn btn-outline-primary btn-sm" data-bs-toggle="dialog"
                                data-bs-target="#staticBackdropDialogEditar{{ $bodega->id }}">Editar</button>

                            <dialog class="dialog dialog-scrollable d-flex flex-column"
                                id="staticBackdropDialogEditar{{ $bodega->id }}" style="max-height: 85vh;">
                                <form action="{{ route('bodegas.update', $bodega->id) }}" method="POST"
                                    class="d-flex flex-column overflow-hidden h-100 m-0">
                                    @csrf
                                    @method('PUT')
                                    <div class="dialog-header flex-shrink-0">
                                        <h1 class="dialog-title">Editar</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="dialog"
                                            aria-label="Close"></button>
                                    </div>

                                    <div class="dialog-body overflow-y-auto flex-grow-1 p-3">

                                        <div class="mb-3">
                                            <label for="nombre" class="form-label">Nombre</label>
                                            <input type="text" class="form-control" id="nombre" name="nombre"
                                                value="{{ old('nombre', $bodega->nombre) }}"
                                                placeholder="Bodega Mayor">
                                        </div>

                                        <div class="mb-3">
                                            <label for="descripcion" class="form-label">Descripcion</label>
                                            <input type="text" class="form-control" id="descripcion"
                                                value="{{ old('descripcion', $bodega->descripcion) }}"
                                                name="descripcion" placeholder="Bodega Principal">
                                        </div>

                                        <div class="mb-3">
                                            <label for="codigo" class="form-label">Codigo</label>
                                            <input type="text" class="form-control" id="codigo" name="codigo"
                                                value="{{ old('codigo', $bodega->codigo) }}" placeholder="BOD-0001">
                                        </div>

                                    </div>

                                    <div class="dialog-footer flex-shrink-0">
                                        <button type="button" class="btn-solid theme-secondary"
                                            data-bs-dismiss="dialog">Cerrar</button>
                                        <button type="submit" class="btn-solid theme-primary">Actualizar
                                            bodega</button>
                                    </div>
                                </form>
                            </dialog>

                            @if (session('success'))
                                <div class="toast position-fixed bottom-0 end-0 m-6 z-toast" role="alert"
                                    aria-live="assertive" aria-atomic="true">
                                    <div class="toast-header">
                                        <strong class="me-auto">Exito!</strong>
                                        <small>Bien hecho!</small>
                                        <button type="button" class="btn-close" data-bs-dismiss="toast"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="toast-body">
                                        {{ session('success') }}
                                    </div>
                                </div>
                            @endif

                            <form action="{{ route('bodegas.destroy', [$bodega->id]) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-outline-primary btn-sm">Eliminar</button>
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
