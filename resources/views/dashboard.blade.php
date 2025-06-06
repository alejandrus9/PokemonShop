@include('partials.header')
<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{ __("Ya has iniciado sesión!") }}
                </div>
            </div>
        </div>
    </div>
    <!-- Para que cuando te registres puedas volver al inicio con un boton -->
    <div class="mt-5 text-center"> 
            <a href="{{ url('/') }}" class="text-sm text-gray-600 text-decoration-none">
                &larr; Ir al inicio
            </a>
    </div>
</x-app-layout>
