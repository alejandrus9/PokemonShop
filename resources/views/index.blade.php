<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio</title>
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
        <!-- Carrusel Bootstrap -->
          <div id="pokemonCarousel" class="carousel slide mb-5" data-bs-ride="carousel" data-bs-interval="2000">
            <div class="carousel-inner position-relative mx-auto">
              <div class="carousel-item active">
                <img src="{{ asset('img/GemPackV1.png') }}" class="d-block w-100" alt="china151">
              </div>
              <div class="carousel-item">
                <img src="{{ asset('img/gemPackV2.webp') }}" class="d-block w-100" alt="gempack1">
              </div>
              <div class="carousel-item">
                <img src="{{ asset('img/china151.webp') }}" class="d-block w-100" alt="gempack2">
              </div>

              <!-- Botones dentro del contenedor visible -->
              <button class="carousel-control-prev position-absolute top-50 start-0 translate-middle-y" type="button" data-bs-target="#pokemonCarousel" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Anterior</span>
              </button>

              <button class="carousel-control-next position-absolute top-50 end-0 translate-middle-y" type="button" data-bs-target="#pokemonCarousel" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Siguiente</span>
              </button>
            </div>
          </div>

          <!-- Últimos lanzamientos -->
          <div class="containerProd">
            <h2 class="titulo text-center mb-4">Lo último</h2>
            <div class="bloque row row-cols-1 row-cols-sm-2 row-cols-md-3 g-4">
              @foreach ($productos as $producto)
                <div class="col">
                  <div class="card h-100">
                    <img src="{{ asset('img/' . ($producto->IMG ?? 'default.jpg')) }}" alt="{{ $producto->NOMBRE_PRODUCTO }}" class="card-img-top img-fluid object-fit-contain" 
              style="height: 250px;" >
                    <div class="card-body text-center">
                      <h5 class="card-title">{{ $producto->NOMBRE_PRODUCTO }}</h5>
                      <p class="card-text">€{{ number_format($producto->PRECIO, 2) }}</p>
                      <a href="{{ url('/producto/' . $producto->ID_PRODUCTO) }}" class="btn btn-success">Ver Producto</a>
                    </div>
                  </div>
                </div>
              @endforeach
            </div>

            <!-- Productos Destacados -->
            <h2 class="titulo text-center mt-5 mb-4">Productos Destacados</h2>
            <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-4">
              @foreach ($destacados as $producto)
                <div class="col">
                  <div class="card h-100">
                    <img src="{{ asset('img/' . ($producto->IMG ?? 'default.jpg')) }}" alt="{{ $producto->NOMBRE_PRODUCTO }}" class="card-img-top img-fluid object-fit-contain"
                    style="height: 250px;">
                    <div class="card-body text-center">
                      <h5 class="card-title">{{ $producto->NOMBRE_PRODUCTO }}</h5>
                      <p class="card-text">€{{ number_format($producto->PRECIO, 2) }}</p>
                      <a href="{{ url('/producto/' . $producto->ID_PRODUCTO) }}" class="btn btn-success">Ver Producto</a>
                    </div>
                  </div>
                </div>
              @endforeach
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