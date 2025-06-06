@php use Illuminate\Support\Str; @endphp

<aside id="sidebar" class="bg-dark sidebar collapsed">
  <div class="sidebar-toggle">
    <button id="toggleSidebar" class="btn btn-sm btn-outline-secondary">
      <i id="toggleIcon" class="bi bi-list"></i>
    </button>
  </div>

  <nav class="nav flex-column mt-3">

    <a class="nav-link" href="{{ url('/') }}">
      <i class="bi bi-house-door-fill"></i> <span class="link-text">Inicio</span>
    </a>

    <a class="nav-link" data-bs-toggle="collapse" href="#collapseIdiomas" role="button" aria-expanded="false" aria-controls="collapseIdiomas">
      <i class="bi bi-translate"></i><span class="link-text">Ver idiomas</span>
    </a>
    <div class="collapse" id="collapseIdiomas">
      <a class="nav-link link-text ps-5" href="{{ url('/idioma/japones') }}">Japonés</a>
      <a class="nav-link link-text ps-5" href="{{ url('/idioma/chino') }}">Chino</a>
      <a class="nav-link link-text ps-5" href="{{ url('/idioma/coreano') }}">Coreano</a>
    </div>

    <a class="nav-link" data-bs-toggle="collapse" href="#collapseCategorias" role="button" aria-expanded="false" aria-controls="collapseCategorias">
      <i class="bi bi-tags-fill"></i><span class="link-text">Categorías</span>
    </a>
    <div class="collapse" id="collapseCategorias">
      <!-- Para mostrar y filtrar las categorias -->
      @foreach ($categorias as $cat)
        <a class="nav-link link-text ps-5" href="{{ route('filtrar.categorias', $cat['slug']) }}">
            {{ $cat['nombre'] }}
        </a> 
      @endforeach
    </div>

  </nav>
</aside>
