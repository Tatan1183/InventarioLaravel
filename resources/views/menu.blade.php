{{-- Vista Hija--}}

@extends('layout') {{-- indicar que se usa el layout--}}


@section('content') {{-- Se agrega el contenido y Laravel lo mete en el hueco de @yield('content').--}}
<div class="text-center">
    <h1 class="mb-4">📦 Gestión de Inventarios</h1>
    <a href="{{ route('productos.index') }}" class="btn btn-primary btn-lg m-2">Gestión de Productos</a>
    <a href="{{ route('ventas.index') }}" class="btn btn-success btn-lg m-2">Gestión de Ventas</a>
</div>
@endsection
