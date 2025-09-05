@extends('layout')

@section('content')
<h2>Editar Producto</h2>
<form method="POST" action="{{ route('productos.update', $producto->codigo) }}" class="card p-4 shadow">
    @csrf
    @method('PUT')
    <div class="mb-3">
        <label>Nombre</label>
        <input type="text" name="nombre" class="form-control" value="{{ old('nombre', $producto->nombre) }}">
    </div>
    <div class="mb-3">
        <label>Descripción</label>
        <textarea name="descripcion" class="form-control">{{ old('descripcion', $producto->descripcion) }}</textarea>
    </div>
    <div class="mb-3">
        <label>Cantidad</label>
        <input type="number" name="cantidad" class="form-control" value="{{ old('cantidad', $producto->cantidad) }}">
    </div>
    <div class="mb-3">
        <label>Precio</label>
        <input type="number" step="0.01" name="precio" class="form-control" value="{{ old('precio', $producto->precio) }}">
    </div>
    <button type="submit" class="btn btn-warning">Actualizar</button>
    <a href="{{ route('productos.index') }}" class="btn btn-secondary">Cancelar</a>
</form>
@endsection
