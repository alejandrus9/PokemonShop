<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Producto;
use App\Models\Categoria;
use App\Models\Expansion;
use Carbon\Carbon;

class ProductoController extends Controller
{
    public function mostrar($id)
{
    $producto = Producto::with(['categoria', 'expansion', 'idioma'])->find($id);

    if (!$producto) {
        abort(404, 'Producto no encontrado');
    }
// Para mostrar los datos en la pagina los datos del producto (categoria, expansion, idioma)
    return view('productos.mostrar', compact('producto'));
}


    public function index()
{
    // Para que nos muestre los 3 ultimos productos que han salido 
    $productos = Producto::with(['categoria', 'expansion', 'idioma'])
        ->whereHas('expansion', function ($query) {
            $query->whereDate('FECHA_PUBLICACION', '<=', now());
        })
        ->orderByDesc('ID_PRODUCTO')
        ->take(3)
        ->get();


    // Para los productos destacados, que coja 1 de cada idioma y el que tenga mas cantidad
    $destacados = collect();
    foreach ([1, 2, 3] as $idIdioma) {
        $producto = Producto::with(['categoria', 'expansion', 'idioma'])
            ->where('IDIOMA', $idIdioma)
            ->orderByDesc('CANTIDAD')
            ->first();

        if ($producto) {
            $destacados->push($producto);
        }
    }

    return view('index', compact('productos', 'destacados'));
}



// Para mostrar los productos segun su idioma
    public function idiomaJapones()
{
    return $this->mostrarIdioma(1, 'Japonés');
}

    public function idiomaChino()
{
    return $this->mostrarIdioma(2, 'Chino');
}

    public function idiomaCoreano()
{
    return $this->mostrarIdioma(3, 'Coreano');
}


// Para filtrar los productos por idioma
    private function mostrarIdioma($idIdioma, $nombreIdioma)
{
    $productos = Producto::with(['categoria', 'expansion', 'idioma'])
                         ->where('IDIOMA', $idIdioma)
                         ->orderBy('ID_PRODUCTO', 'desc')
                         ->get();

    return view('productos.idiomas', compact('productos', 'nombreIdioma'));
}


//Para filtrar los productos por categoria
    public function filtrarCategorias($slug)
{
    // Para buscar la categoria por slug 
    $categoria = Categoria::where('slug', $slug)->first();

    if (!$categoria) {
        abort(404, 'Categoría no encontrada');
    }

    // Para buscar productos asociados a esa categoria
    $productos = Producto::with(['categoria', 'expansion', 'idioma'])
                         ->where('CATEGORIA', $categoria->ID_CATEGORIA)
                         ->orderBy('ID_PRODUCTO', 'desc')
                         ->get();

    return view('productos.categorias', [
        'productos' => $productos,
        'nombreCategoria' => $categoria->NOMBRE,
    ]);
   
}


}