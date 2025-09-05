@extends('layout')

@section('content')
<h2>Registrar Venta</h2>
<form method="POST" action="{{ route('ventas.store') }}" class="card p-4 shadow">
    @csrf
    <div class="mb-3">
        <label>Producto</label>
        <select name="producto_id" class="form-select">
            @foreach($productos as $producto)
                <option value="{{ $producto->codigo }}">
                    {{ $producto->nombre }} ({{ $producto->cantidad }} disponibles)
                </option>
            @endforeach
        </select>
    </div>
    <div class="mb-3">
        <label>Cantidad</label>
        <input type="number" name="cantidad_vendida" class="form-control">
    </div>
    <button type="submit" class="btn btn-success">Registrar</button>
    <a href="{{ route('ventas.index') }}" class="btn btn-secondary">Cancelar</a>
</form>
@endsection

