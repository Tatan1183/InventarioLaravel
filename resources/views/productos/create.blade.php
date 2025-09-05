@extends('layout')

@section('content')
<h2>Agregar Producto</h2>
<form method="POST" action="{{ route('productos.store') }}" class="card p-4 shadow">
    @csrf
    <div class="mb-3">
        <label>Código</label>
        <input type="text" name="codigo" class="form-control" value="{{ old('codigo') }}">
    </div>
    <div class="mb-3">
        <label>Nombre</label>
        <input type="text" name="nombre" class="form-control" value="{{ old('nombre') }}">
    </div>
    <div class="mb-3">
        <label>Descripción</label>
        <textarea name="descripcion" class="form-control">{{ old('descripcion') }}</textarea>
    </div>
    <div class="mb-3">
        <label>Cantidad</label>
        <input type="number" name="cantidad" class="form-control" value="{{ old('cantidad') }}">
    </div>
    <div class="mb-3">
        <label>Precio</label>
        <input type="number" step="0.01" name="precio" class="form-control" value="{{ old('precio') }}">
    </div>
    <button type="submit" class="btn btn-success">Guardar</button>
    <a href="{{ route('productos.index') }}" class="btn btn-secondary">Cancelar</a>
</form>
@endsection

