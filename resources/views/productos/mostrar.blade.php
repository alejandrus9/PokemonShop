<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>{{ $producto->NOMBRE_PRODUCTO }}</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}" />
</head>
<body class="d-flex flex-column min-vh-100">
    @include('partials.header')

    <div class="container-fluid">
        @include('partials.sidebar')

        <main id="mainContent" class="py-4">
            <div class="container py-4">
                <div class="row">
                    <div class="col-md-6 img-container">
                        <img src="{{ asset('img/' . $producto->IMG) }}" class="img-fluid" alt="{{ $producto->NOMBRE_PRODUCTO }}">
                    </div>
                    <div class="col-md-6">
                        <h2 class="titulo">{{ $producto->NOMBRE_PRODUCTO }}</h2>

                        <p><strong>Categoría:</strong> {{ $producto->categoria->NOMBRE }}</p>
                        <p><strong>Descripción:</strong> {{ $producto->categoria->DESCRIPCION ?? 'N/A' }}</p>

                        <p><strong>Expansión:</strong> {{ $producto->expansion->NOMBRE }}</p>

                        <p><strong>Cantidad disponible:</strong> {{ $producto->CANTIDAD }}</p>
                        <p><strong>Estado:</strong> {{ $producto->ESTADO }}</p>
                        <p><strong>Precio:</strong> €{{ number_format($producto->PRECIO, 2) }}</p>

                        <!-- Para que en caso de que no haya stock nos avise -->
                        @if ($producto->CANTIDAD > 0 && strtolower($producto->ESTADO) !== 'agotado')
                        <form action="{{ route('carrito.anadir') }}" method="POST" class="mt-3">
                            @csrf
                            <input type="hidden" name="id" value="{{ $producto->ID_PRODUCTO }}">
                            <input type="hidden" name="nombre" value="{{ $producto->NOMBRE_PRODUCTO }}">
                            <input type="hidden" name="precio" value="{{ $producto->PRECIO }}">
                            <!-- Para volver a la pagina donde te encontrabas antes de añadir al carrito -->
                            <input type="hidden" name="return_to" value="{{ url()->previous() }}">
                            <label for="cantidad">Cantidad:</label>
                            <input type="number" name="cantidad" value="1" min="1" max="{{ $producto->CANTIDAD }}" class="form-control w-25 d-inline-block">
                            <button type="submit" class="btn btn-success ms-2">Añadir al carrito</button>
                        </form>
                    @else
                        <div class="alert alert-warning mt-3">
                            <strong>Sin stock:</strong> Este producto no está disponible actualmente.
                        </div>
                    @endif

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
