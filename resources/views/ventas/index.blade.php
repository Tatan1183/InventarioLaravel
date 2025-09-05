@extends('layout')

@section('content')
<h2>Gestión de Ventas</h2>
<a href="{{ route('ventas.create') }}" class="btn btn-success mb-3">➕ Registrar Venta</a>
<a href="{{ url('/menu') }}" class="btn btn-secondary mb-3">⬅ Volver al Menú</a>

<table class="table table-striped table-bordered">
    <thead class="table-dark">
        <tr>
            <th>ID</th>
            <th>Producto</th>
            <th>Cantidad</th>
            <th>Precio Unitario</th>
            <th>Total</th>
            <th>Fecha</th>
        </tr>
    </thead>
    <tbody>
        @foreach($ventas as $venta)
        <tr>
            <td>{{ $venta->id }}</td>
            <td>{{ $venta->producto->nombre }}</td>
            <td>{{ $venta->cantidad_vendida }}</td>
            <td>${{ number_format($venta->precio_unitario, 2) }}</td>
            <td>${{ number_format($venta->total, 2) }}</td>
            <td>{{ $venta->fecha }}</td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection

