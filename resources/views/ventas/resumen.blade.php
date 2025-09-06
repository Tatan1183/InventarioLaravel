@extends('layout')

@section('content')
<div class="container mt-4">
    <h2 class="mb-4">📊 Resumen de Ventas</h2>

    <div class="card p-4 shadow">
        <p><strong>Total de Ventas:</strong> {{ $totalVentas }}</p>
        <p><strong>Total en Dinero:</strong> ${{ number_format($totalDinero, 2) }}</p>

        @if($productoMasVendido)
            <p><strong>Producto más vendido:</strong> 
               {{ $productoMasVendido->producto->nombre }} 
               ({{ $productoMasVendido->total_cantidad }} unidades)
            </p>
        @endif

        @if($ultimaVenta)
            <p><strong>Última venta:</strong> {{ $ultimaVenta->created_at->format('d/m/Y H:i') }}</p>
        @endif
    </div>

    <a href="/ventas" class="btn btn-secondary mt-3">⬅️ Regresar</a>
</div>
@endsection
