<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use Illuminate\Http\Request;

class ProductoController extends Controller
{
    public function index()
    {
        $productos = Producto::all();
        return view('productos.index', compact('productos'));
    }

    public function create()
    {
        return view('productos.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'codigo' => 'required|unique:productos,codigo',
            'nombre' => 'required',
            'cantidad' => 'required|integer|min:0',
            'precio' => 'required|numeric|min:0',
        ]);

        Producto::create($request->all());
        return redirect()->route('productos.index');
    }

    public function edit($codigo)
    {
        $producto = Producto::findOrFail($codigo);
        return view('productos.edit', compact('producto'));
    }

    public function update(Request $request, $codigo)
    {
        $producto = Producto::findOrFail($codigo);

        $request->validate([
            'nombre' => 'required',
            'cantidad' => 'required|integer|min:0',
            'precio' => 'required|numeric|min:0',
        ]);

        $producto->update($request->all());
        return redirect()->route('productos.index');
    }

    public function destroy($codigo)
    {
        $producto = Producto::with('ventas')->findOrFail($codigo);

        if ($producto->ventas->count() > 0) {
            return back()->with('error', 'No se puede eliminar un producto con ventas registradas.');
        }

        $producto->delete();
        return redirect()->route('productos.index');
    }
}
