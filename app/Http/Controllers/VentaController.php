<?php

namespace App\Http\Controllers;

use App\Models\Venta;
use App\Models\Producto;
use Illuminate\Http\Request;
use Carbon\Carbon;

class VentaController extends Controller
{
    public function index()
    {
        $ventas = Venta::with('producto')->orderBy('fecha', 'desc')->get();
        return view('ventas.index', compact('ventas'));
    }

    public function create()
    {
        $productos = Producto::all();
        return view('ventas.create', compact('productos'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'producto_id' => 'required|exists:productos,codigo',
            'cantidad_vendida' => 'required|integer|min:1',
        ]);

        $producto = Producto::findOrFail($request->producto_id);

        if ($request->cantidad_vendida > $producto->cantidad) {
            return back()->with('error', 'No hay suficiente stock disponible.');
        }

        $venta = Venta::create([
            'producto_id' => $producto->codigo,
            'cantidad_vendida' => $request->cantidad_vendida,
            'precio_unitario' => $producto->precio,
            'total' => $producto->precio * $request->cantidad_vendida,
            'fecha' => Carbon::now(),
        ]);

        // Reducir stock
        $producto->cantidad -= $request->cantidad_vendida;
        $producto->save();

        return redirect()->route('ventas.index');
    }

    public function resumen()
    {
    // Total de ventas
    $totalVentas = Venta::count();

    // Total en dinero
    $totalDinero = Venta::sum('total');

    // Producto más vendido
    $productoMasVendido = Venta::select('producto_id', DB::raw('SUM(cantidad) as total_cantidad'))
        ->groupBy('producto_id')
        ->orderByDesc('total_cantidad')
        ->with('producto') // Para traer nombre del producto
        ->first();

    // Última venta
    $ultimaVenta = Venta::orderBy('created_at', 'desc')->first();

    return view('ventas.resumen', compact(
        'totalVentas',
        'totalDinero',
        'productoMasVendido',
        'ultimaVenta'
    ));
    }
}

