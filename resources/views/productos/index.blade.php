@extends('layout')

@section('content')
<h2>Gestión de Productos</h2>
<a href="{{ route('productos.create') }}" class="btn btn-primary mb-3">➕ Agregar Producto</a>
<a href="{{ url('/menu') }}" class="btn btn-secondary mb-3">⬅ Volver al Menú</a>

<table class="table table-striped table-bordered">
    <thead class="table-dark">
        <tr>
            <th>Código</th>
            <th>Nombre</th>
            <th>Cantidad</th>
            <th>Precio</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach($productos as $producto)
        <tr>
            <td>{{ $producto->codigo }}</td>
            <td>{{ $producto->nombre }}</td>
            <td>{{ $producto->cantidad }}</td>
            <td>${{ number_format($producto->precio, 2) }}</td>
            <td>
                <a href="{{ route('productos.edit', $producto->codigo) }}" class="btn btn-sm btn-warning">✏ Editar</a>
                <form action="{{ route('productos.destroy', $producto->codigo) }}" method="POST" class="d-inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-sm btn-danger">🗑 Eliminar</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection

