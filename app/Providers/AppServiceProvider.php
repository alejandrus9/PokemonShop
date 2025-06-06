<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Models\Producto;
use App\Models\Categoria;
use Illuminate\Support\Str;


class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
{
    // Para hacer una vista dinamica de las categorias
     View::composer('*', function ($view) {
    $categorias = Categoria::all()->map(function ($categoria) {
        return [
            'nombre' => $categoria->NOMBRE,
            'slug' => \Illuminate\Support\Str::slug($categoria->NOMBRE),
        ];
    });

    $view->with('categorias', $categorias);
});

}
}
