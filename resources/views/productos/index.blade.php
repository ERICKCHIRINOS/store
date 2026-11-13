<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Productos</title>
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
                            <a class="nav-link" href="{{ route('categorias.index') }}">Categorias</a>
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
                            <a class="nav-link active" aria-current="page" href="{{ route('productos.index') }}">Productos</a>
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

    <div class="container-fluid">
        <div class="d-flex justify-content-between align-items-center flex-wrap gap-3 mb-4">
            <div>
                <h1 class="h3 mb-1">Gestión de Productos</h1>
                <p class="text-secondary mb-0">
                    Administra la información de tus productos.
                </p>
            </div>

            <button type="button" class="btn-register" data-bs-toggle="dialog" data-bs-target="#scrollableBodyDialog"
                data-bs-backdrop="static">Registrar Producto</button>
        </div>
    </div>

    <dialog class="dialog dialog-scrollable" id="scrollableBodyDialog">
        <form action="{{ route('productos.store') }}" method="POST"
            class="d-flex flex-column overflow-hidden h-100 m-0">
            @csrf
            <div class="dialog-header">
                <h1 class="dialog-title">Ingrese los datos del nuevo Producto</h1>
                <button type="button" class="btn-close" data-bs-dismiss="dialog" aria-label="Close"></button>
            </div>
            <div class="dialog-body">

                {{-- Campo de Categoria --}}
                <div class="mb-3">
                    <label for="categoria_id" class="form-label">Categoria</label>

                    <select class="tom-select" id="categoria_id" name="categoria_id" required>
                        <option value=""></option>

                        @foreach ($categorias as $categoria)
                            <option value="{{ $categoria->id }}">
                                {{ $categoria->id }} - {{ $categoria->nombre }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-3">
                    <label for="codigo" class="form-label">Codigo</label>
                    <input type="text" class="form-control" id="codigo" name="codigo"
                        placeholder="PRO-#####">
                </div>

                <div class="mb-3">
                    <label for="nombre" class="form-label">Nombre</label>
                    <input type="text" class="form-control" id="nombre" name="nombre"
                        placeholder="Filete de Pollo">
                </div>

                <div class="mb-3">
                    <label for="descripcion" class="form-label">Descripcion</label>
                    <textarea class="form-control" id="descripcion" name="descripcion" rows="3"
                        placeholder="Descripción del producto"></textarea>
                </div>

                <div class="mb-3">
                    <label for="precio" class="form-label">Precio</label>
                    <input type="number" class="form-control" id="precio" name="precio" step="0.01"
                        min="0" placeholder="0.00">
                </div>

                <div class="mb-3">
                    <label for="stock" class="form-label">Stock</label>
                    <input type="number" class="form-control" id="stock" name="stock" min="0"
                        placeholder="0">
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
                            aria-selected="true">Activo</button>
                        <button class="menu-item" type="button" data-bs-value="Inactivo">Inactivo</button>
                    </div>
                </div>

            </div>
            <div class="dialog-footer">
                <button type="button" class="btn-solid theme-secondary" data-bs-dismiss="dialog">Cerrar</button>
                <button type="submit" class="btn-solid theme-primary">Guardar</button>
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
                <th scope="col">Categoria ID</th>
                <th scope="col">Codigo</th>
                <th scope="col">Nombre</th>
                <th scope="col">Descripcion</th>
                <th scope="col">Precio</th>
                <th scope="col">Stock</th>
                <th scope="col">Estado</th>
                <th scope="col">Acciones</th>
            </tr>
        </thead>
        <tbody>
            @forelse($productos as $producto)
                <tr>
                    <th scope="row">{{ $producto->id }}</th>
                    <th scope="row">{{ $producto->categoria_id }}</th>
                    <td>{{ $producto->codigo }}</td>
                    <td>{{ $producto->nombre }}</td>
                    <td>{{ $producto->descripcion }}</td>
                    <td>{{ $producto->precio }}</td>
                    <td>{{ $producto->stock }}</td>
                    <td>{{ $producto->estado }}</td>
                    <td>

                        <div class="btn-group" role="group" aria-label="Basic example">
                            <button type="button" class="btn btn-outline-danger btn-sm" data-bs-toggle="dialog"
                                data-bs-target="#scrollableBodyDialogEditar{{ $producto->id }}">Editar</button>

                            <dialog class="dialog dialog-scrollable"
                                id="scrollableBodyDialogEditar{{ $producto->id }}">
                                <form action="{{ route('productos.update', $producto->id) }}" method="POST"
                                    class="d-flex flex-column overflow-hidden h-100 m-0">
                                    @csrf
                                    @method('PUT')
                                    <div class="dialog-header">
                                        <h1 class="dialog-title">Ingrese los datos del nuevo Producto</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="dialog"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="dialog-body">

                                        {{-- Campo de Categoria --}}
                                        <div class="mb-3">
                                            <label for="cliente_id_{{ $producto->id }}"
                                                class="form-label">Cliente</label>

                                            <div class="form-control bg-body-secondary opacity-75"
                                                style="cursor: default; user-select: none;">
                                                {{ $producto->categoria->id }} - {{ $producto->categoria->nombre }}
                                            </div>
                                        </div>

                                        <div class="mb-3">
                                            <label for="codigo" class="form-label">Codigo</label>
                                            <input type="text" class="form-control" id="codigo" name="codigo"
                                                placeholder="PRO-#####" value="{{ $producto->codigo }}">
                                        </div>

                                        <div class="mb-3">
                                            <label for="nombre" class="form-label">Nombre</label>
                                            <input type="text" class="form-control" id="nombre" name="nombre"
                                                placeholder="Filete de Pollo" value="{{ $producto->nombre }}">
                                        </div>

                                        <div class="mb-3">
                                            <label for="descripcion" class="form-label">Descripcion</label>
                                            <textarea class="form-control" id="descripcion" name="descripcion" rows="3"
                                                placeholder="Descripción del producto">{{ $producto->descripcion }}</textarea>
                                        </div>

                                        <div class="mb-3">
                                            <label for="precio" class="form-label">Precio</label>
                                            <input type="number" class="form-control" id="precio" name="precio"
                                                step="0.01" min="0" placeholder="0.00"
                                                value="{{ $producto->precio }}">
                                        </div>

                                        <div class="mb-3">
                                            <label for="stock" class="form-label">Stock</label>
                                            <input type="number" class="form-control" id="stock" name="stock"
                                                min="0" placeholder="0" value="{{ $producto->stock }}">
                                        </div>

                                        <div class="mb-3">
                                            <label for="estado" class="form-label">Estado</label>
                                            <button class="form-control combobox-toggle" type="button"
                                                data-bs-toggle="combobox" data-bs-name="estado"
                                                data-bs-placeholder="Seleccione un estado">
                                                <span class="combobox-value">Seleccione un estado</span>
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
                                                    data-bs-value="Activo" aria-selected="true">Activo</button>
                                                <button class="menu-item" type="button"
                                                    data-bs-value="Inactivo">Inactivo</button>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="dialog-footer">
                                        <button type="button" class="btn-solid theme-secondary"
                                            data-bs-dismiss="dialog">Cerrar</button>
                                        <button type="submit" class="btn-solid theme-primary">Guardar</button>
                                    </div>
                                </form>
                            </dialog>


                            <form action="{{ route('productos.destroy', [$producto->id]) }}" method="post">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-outline-danger btn-sm">Eliminar</button>
                            </form>

                        </div>

                    </td>
                </tr>
            @empty
                <tr>
                <tr colspan="8">No hay registros.</tr>
                </tr>
            @endforelse
        </tbody>
    </table>

</body>

</html>
