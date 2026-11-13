<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pedidos</title>
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
                            <a class="nav-link active" aria-current="page"
                                href="{{ route('pedidos.index') }}">Pedidos</a>
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

    <div class="container-fluid">
        <div class="d-flex justify-content-between align-items-center flex-wrap gap-3 mb-4">
            <div>
                <h1 class="h3 mb-1">Gestión de Pedidos</h1>
                <p class="text-secondary mb-0">
                    Administra la información de tus pedidos.
                </p>
            </div>

            <button type="button" class="btn-register" data-bs-toggle="dialog" data-bs-target="#scrollableBodyDialog"
                data-bs-backdrop="static">Registrar Pedido</button>
        </div>
    </div>

    <dialog class="dialog dialog-scrollable" id="scrollableBodyDialog">
        <form action="{{ route('pedidos.store') }}" method="POST" class="d-flex flex-column overflow-hidden h-100 m-0">
            @csrf
            <div class="dialog-header">
                <h1 class="dialog-title">Ingrese los datos del nuevo Pedido</h1>
                <button type="button" class="btn-close" data-bs-dismiss="dialog" aria-label="Close"></button>
            </div>
            <div class="dialog-body">

                {{-- Campo de Cliente --}}
                <div class="mb-3">
                    <label for="cliente_id" class="form-label">Cliente</label>

                    <select class="tom-select" id="cliente_id" name="cliente_id" required>
                        <option value=""></option>

                        @foreach ($clientes as $cliente)
                            <option value="{{ $cliente->id }}">
                                {{ $cliente->codigo }} - {{ $cliente->nombre }}
                            </option>
                        @endforeach
                    </select>
                </div>

                {{-- Campo de Empleado --}}
                <div class="mb-3">
                    <label for="empleado_id" class="form-label">Empleado</label>

                    <select class="tom-select" id="empleado_id" name="empleado_id" required>
                        <option value=""></option>

                        @foreach ($empleados as $empleado)
                            <option value="{{ $empleado->id }}">
                                {{ $empleado->codigo }} - {{ $empleado->nombre }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-3">
                    <label for="numero_pedido" class="form-label">Numero Pedido</label>
                    <input type="text" class="form-control" id="numero_pedido" name="numero_pedido"
                        placeholder="PED-#####">
                </div>

                <div class="mb-3">
                    <label for="fecha_pedido">Fecha de Pedido</label>
                    <div class="form-floating">
                        {{-- <label for="floatingDate" class>Date</label> --}}
                        <input type="date" class="form-control" id="fecha_pedido" name="fecha_pedido">
                    </div>
                </div>

                <div class="mb-3">
                    <label for="fecha_entrega">Fecha de Entrega</label>
                    <div class="form-floating">
                        {{-- <label for="floatingDate" class>Date</label> --}}
                        <input type="date" class="form-control" id="fecha_entrega" name="fecha_entrega">
                    </div>
                </div>

                <div class="mb-3">
                    <label for="total" class="form-label">Total</label>
                    <input type="number" class="form-control" id="total" name="total" step="0.01"
                        min="0" placeholder="0.00">
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
                        <button class="menu-item selected" type="button" data-bs-value="Pendiente"
                            aria-selected="true">Pendiente</button>
                        <button class="menu-item" type="button" data-bs-value="En Proceso">En Proceso</button>
                        <button class="menu-item" type="button" data-bs-value="Entregado">Entregado</button>
                        <button class="menu-item" type="button" data-bs-value="Cancelado">Cancelado</button>
                    </div>
                </div>

                <div class="mb-3">
                    <label for="observaciones" class="form-label">Observaciones</label>
                    <textarea class="form-control" id="observaciones" name="observaciones" rows="3"></textarea>
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
                <th scope="col">Cliente ID</th>
                <th scope="col">Empleado ID</th>
                <th scope="col">Numero de Pedido</th>
                <th scope="col">Fecha de Pedido</th>
                <th scope="col">Fecha de Entrega</th>
                <th scope="col">Total</th>
                <th scope="col">Estado</th>
                <th scope="col">Observaciones</th>
                <th scope="col">Acciones</th>
            </tr>
        </thead>
        <tbody>
            @forelse($pedidos as $pedido)
                <tr>
                    <th scope="row">{{ $pedido->id }}</th>
                    <td>{{ $pedido->cliente_id }}</td>
                    <td>{{ $pedido->empleado_id }}</td>
                    <td>{{ $pedido->numero_pedido }}</td>
                    <td>{{ $pedido->fecha_pedido }}</td>
                    <td>{{ $pedido->fecha_entrega }}</td>
                    <td>{{ $pedido->total }}</td>
                    <td>{{ $pedido->estado }}</td>
                    <td>{{ $pedido->observaciones }}</td>
                    <td>

                        <div class="btn-group" role="group" aria-label="Basic example">
                            <button type="button" class="btn btn-outline-danger btn-sm" data-bs-toggle="dialog"
                                data-bs-target="#scrollableBodyDialogEditar{{ $pedido->id }}">Editar</button>

                            <dialog class="dialog dialog-scrollable"
                                id="scrollableBodyDialogEditar{{ $pedido->id }}">
                                <form action="{{ route('pedidos.update', $pedido->id) }}" method="POST"
                                    class="d-flex flex-column overflow-hidden h-100 m-0">
                                    @csrf
                                    @method('PUT')
                                    <div class="dialog-header">
                                        <h1 class="dialog-title">Ingrese los datos del nuevo Pedido</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="dialog"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="dialog-body">

                                        {{-- Campo de Cliente --}}
                                        <div class="mb-3">
                                            <label for="cliente_id_{{ $pedido->id }}"
                                                class="form-label">Cliente</label>

                                            <div class="form-control bg-body-secondary opacity-75"
                                                style="cursor: default; user-select: none;">
                                                {{ $pedido->cliente->codigo }} - {{ $pedido->cliente->nombre }}
                                            </div>
                                        </div>

                                        {{-- Campo de Empleado --}}
                                        <div class="mb-3">
                                            <label for="empleado_id_{{ $pedido->id }}"
                                                class="form-label">Empleado</label>

                                            <div class="form-control bg-body-secondary opacity-75"
                                                style="cursor: default; user-select: none;">
                                                {{ $pedido->empleado->codigo }} - {{ $pedido->empleado->nombre }}
                                            </div>
                                        </div>

                                        <div class="mb-3">
                                            <label for="numero_pedido" class="form-label">Numero Pedido</label>
                                            <input type="text" class="form-control" id="numero_pedido"
                                                name="numero_pedido" placeholder="PED-#####"
                                                value="{{ $pedido->numero_pedido }}">
                                        </div>

                                        <div class="mb-3">
                                            <label for="fecha_pedido">Fecha de Pedido</label>
                                            <div class="form-floating">
                                                {{-- <label for="floatingDate" class>Date</label> --}}
                                                <input type="date" class="form-control" id="fecha_pedido"
                                                    name="fecha_pedido" value="{{ $pedido->fecha_pedido }}">
                                            </div>
                                        </div>

                                        <div class="mb-3">
                                            <label for="fecha_entrega">Fecha de Entrega</label>
                                            <div class="form-floating">
                                                {{-- <label for="floatingDate" class>Date</label> --}}
                                                <input type="date" class="form-control" id="fecha_entrega"
                                                    name="fecha_entrega" value="{{ $pedido->fecha_entrega }}">
                                            </div>
                                        </div>

                                        <div class="mb-3">
                                            <label for="total" class="form-label">Total</label>
                                            <input type="number" class="form-control" id="total" name="total"
                                                value="{{ $pedido->total }}" step="0.01" min="0">
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
                                                    data-bs-value="Pendiente" aria-selected="true">Pendiente</button>
                                                <button class="menu-item" type="button"
                                                    data-bs-value="En Proceso">En Proceso</button>
                                                <button class="menu-item" type="button"
                                                    data-bs-value="Entregado">Entregado</button>
                                                <button class="menu-item" type="button"
                                                    data-bs-value="Cancelado">Cancelado</button>
                                            </div>
                                        </div>

                                        <div class="mb-3">
                                            <label for="observaciones" class="form-label">Observaciones</label>
                                            <textarea class="form-control" id="observaciones" name="observaciones" rows="3">{{ $pedido->observaciones }}</textarea>
                                        </div>

                                    </div>
                                    <div class="dialog-footer">
                                        <button type="button" class="btn-solid theme-secondary"
                                            data-bs-dismiss="dialog">Cerrar</button>
                                        <button type="submit" class="btn-solid theme-primary">Guardar</button>
                                    </div>
                                </form>
                            </dialog>

                            <form action="{{ route('pedidos.destroy', [$pedido->id]) }}" method="post">
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
