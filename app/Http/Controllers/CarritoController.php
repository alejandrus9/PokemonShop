<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Producto;

class CarritoController extends Controller
{
    public function ver()
    {
        $carrito = session()->get('carrito', []);
        return view('carrito.carrito', compact('carrito'));
    }


    public function anadir(Request $request)
{
    // Para comprobar que el usuario este logeado y permitir que meta cosas al carrito
    if (!auth()->check()) {
        return redirect()->route('login')->with('error', 'Debes iniciar sesión para añadir productos al carrito.');
    }

    $request->validate([
        'id' => 'required|integer',
        'cantidad' => 'required|integer|min:1'
    ]);

    $productoBD = Producto::find($request->input('id'));

    if (!$productoBD) {
        return redirect()->back()->with('error', 'Producto no encontrado.');
    }

    // Para verificar si quedan suficientes
    if ($productoBD->CANTIDAD < $request->input('cantidad')) {
        return redirect()->back()->with('error', 'No hay suficiente stock disponible.');
    }

    $producto = [
        'id' => $productoBD->ID_PRODUCTO,
        'nombre' => $productoBD->NOMBRE_PRODUCTO,
        'precio' => $productoBD->PRECIO,
        'cantidad' => $request->input('cantidad')
    ];

    $carrito = session()->get('carrito', []);

    // Para que si ya hay ese producto en el carrito, haga la suma de la otra que metas
    if (isset($carrito[$producto['id']])) {
        $nuevaCantidad = $carrito[$producto['id']]['cantidad'] + $producto['cantidad'];

        if ($nuevaCantidad > $productoBD->CANTIDAD) {
            return redirect()->back()->with('error', 'No puedes añadir más unidades de las disponibles.');
        }

        $carrito[$producto['id']]['cantidad'] = $nuevaCantidad;
    } else {
        $carrito[$producto['id']] = $producto;
    }

    session()->put('carrito', $carrito);

    // Para que cuando añadas al carrito, te redirija a la pagina en la que estabas
    return redirect($request->input('return_to'))->with('success', 'Producto añadido al carrito.');
}


    public function eliminar(Request $request)
    {
        $id = $request->input('id');
        $carrito = session()->get('carrito', []);

        unset($carrito[$id]);

        session()->put('carrito', $carrito);

        return redirect()->route('carrito.ver')->with('success', 'Producto eliminado del carrito.');
    }
}
