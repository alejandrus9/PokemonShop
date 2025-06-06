<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $nombreIdioma }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
</head>
<body class="d-flex flex-column min-vh-100">
    @include('partials.header')

    <div class="container-fluid">
        @include('partials.sidebar')

        <main id="mainContent">
            <div class="container">
                <div class="containerProd">
                    <h2 class="titulo text-center my-4">Productos en {{ $nombreIdioma }}</h2>

                    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-4">
                        @forelse ($productos as $producto)
                            <div class="col">
                                <div class="card h-100">
                                    <img src="{{ asset('img/' . ($producto->IMG ?? 'default.jpg')) }}" 
                                        alt="{{ $producto->NOMBRE_PRODUCTO }}" 
                                        class="card-img-top img-fluid object-fit-contain" 
                                        style="height: 250px;">
                                    <div class="card-body text-center">
                                        <h5 class="card-title">{{ $producto->NOMBRE_PRODUCTO }}</h5>
                                        <p class="card-text">€{{ number_format($producto->PRECIO, 2) }}</p>
                                        <a href="{{ url('/producto/' . $producto->ID_PRODUCTO) }}" class="btn btn-success">Ver Producto</a>
                                    </div>
                                </div>
                            </div>
                        @empty
                            <div class="col-12">
                                <p class="text-center">No hay productos disponibles en este idioma.</p>
                            </div>
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
