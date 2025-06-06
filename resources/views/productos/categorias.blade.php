<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Productos en {{ $nombreCategoria }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
<body class="d-flex flex-column min-vh-100">
    @include('partials.header')
    <div class="container-fluid">
        @include('partials.sidebar')
        <main id="mainContent" class="pt-4">
            <div class="container">
                <div class="containerProd">
                    <h2 class="titulo text-center mb-4">Productos de: {{ $nombreCategoria }}</h2>

                    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-4">
                        @forelse ($productos as $producto)
                            <div class="col">
                                <div class="card h-100">
                                    <img src="{{ asset('img/' . ($producto->IMG ?? 'default.jpg')) }}" class="card-img-top img-fluid object-fit-contain" style="height: 250px;" alt="{{ $producto->NOMBRE_PRODUCTO }}">
                                    <div class="card-body text-center">
                                        <h5 class="card-title">{{ $producto->NOMBRE_PRODUCTO }}</h5>
                                        <p class="card-text">€{{ number_format($producto->PRECIO, 2) }}</p>
                                        <a href="{{ url('/producto/' . $producto->ID_PRODUCTO) }}" class="btn btn-success">Ver Producto</a>
                                    </div>
                                </div>
                            </div>
                        @empty
                            <p class="text-center">No hay productos en esta categoría.</p>
                        @endforelse
                    </div>
                </div>
            </div>
        </main>
    </div>
    @include('partials.footer')

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('js/sidebar.js') }}"></script>
</body>
</html>
