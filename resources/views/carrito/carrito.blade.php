<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Carrito</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}" />
</head>
<body class="d-flex flex-column min-vh-100">
    @include('partials.header')

    <div class="container-fluid">
        @include('partials.sidebar')

        <main id="mainContent" class="py-4">
            <div class="container">
                <h2 class="mb-4">Tu carrito</h2>

                <!-- Te avisa al añadir o eliminar productos -->
                @if (session('success'))
                    <div class="alert alert-success">{{ session('success') }}</div>
                @endif

                @if (empty($carrito))
                    <div class="alert alert-info">No tienes productos en tu carrito.</div>
                    <a href="{{ route('home') }}" class="btn btn-primary">Volver a productos</a>
                @else
                    <table class="table table-bordered">
                        <thead class="table-light">
                            <tr>
                                <th>Producto</th>
                                <th>Cantidad</th>
                                <th>Precio</th>
                                <th>Total</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- Para calcular el precio de los productos y el total -->
                            @php $total = 0; @endphp
                            @foreach ($carrito as $producto)
                                @php
                                    $subtotal = $producto['precio'] * $producto['cantidad'];
                                    $total += $subtotal;
                                @endphp
                                <tr>
                                    <td>{{ $producto['nombre'] }}</td>
                                    <td>{{ $producto['cantidad'] }}</td>
                                    <td>€{{ number_format($producto['precio'], 2) }}</td>
                                    <td>€{{ number_format($subtotal, 2) }}</td>
                                    <td>
                                        <form method="POST" action="{{ route('carrito.eliminar') }}">
                                            @csrf
                                            <input type="hidden" name="id" value="{{ $producto['id'] }}">
                                            <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                            <tr>
                                <td colspan="3" class="text-end"><strong>Total:</strong></td>
                                <td colspan="2"><strong>€{{ number_format($total, 2) }}</strong></td>
                            </tr>
                        </tbody>
                    </table>
                    <a href="{{ route('home') }}" class="btn btn-secondary">Seguir comprando</a>
                @endif
            </div>
        </main>
    </div>

    @include('partials.footer')

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('js/sidebar.js') }}"></script>
</body>
</html>
