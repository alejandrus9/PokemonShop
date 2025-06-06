<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="stylesheet" href="../css/styles.css">
</head>
<body>
    <header class="bg-dark sticky-top">
        <div class="container-fluid py-2 px-4 d-flex justify-content-between align-items-center">
        <a href="{{ url('/') }}" class="navbar-brand d-flex align-items-center">
            <img src="{{ asset('img/piplup.png') }}" alt="Logo Piplup" width="32" height="32" class="me-2">
            <span class="tituloPoke">Pokegallery</span>
        </a>
            <div>
                <!-- Para ver la ruta en la que estas -->
                @php
                    $route = Route::currentRouteName();
                @endphp

                <!-- Si ve que estas en alguna de estas opciones, te quita los iconos de usuario y carrito  -->
                @if (!in_array($route, ['login', 'register', 'dashboard',]))
                    @auth
                        <a href="{{ route('profile.edit') }}" class="btn btn-outline-primary">
                            <i class="bi bi-person-circle"></i>
                        </a>
                        <form method="POST" action="{{ route('logout') }}" class="d-inline">
                            @csrf
                            <!-- Este boton solo te lo muestra si estas logeado -->
                            <button type="submit" class="btn btn-outline-danger">
                                Salir
                            </button>
                        </form>
                    @else
                        <a href="{{ route('login') }}" class="btn btn-outline-primary">
                            <i class="bi bi-person-circle"></i>
                        </a>
                    @endauth
                    
                    <!-- Si estas logeado te muestra el carrito -->
                    @auth
                        <a href="{{ route('carrito.ver') }}" class="btn btn-outline-secondary me-2 position-relative">
                            <i class="bi bi-cart3"></i>
                        </a>
                    @endauth

                @endif
            </div>
        </div>
    </header>
</body>
</html>