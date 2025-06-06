@include('partials.header')
<x-guest-layout>
    @section('title', 'Login')

    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Correo')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Contraseña')" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="current-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Remember Me -->
        <div class="block mt-4">
            <label for="remember_me" class="inline-flex items-center">
                <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" name="remember">
                <span class="ms-2 text-sm text-gray-600">{{ __('Recuerdame') }}</span>
            </label>
        </div>

        <div class="flex items-center justify-center mt-4">
            @if (Route::has('password.request'))
                <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('password.request') }}">
                    {{ __('Olvidaste tu contraseña?') }}
                </a>
            @endif

            <x-primary-button class="ms-3">
                {{ __('Iniciar Sesion') }}
            </x-primary-button>
        </div>

        <!--  Para ir a registrarte si no tienes cuenta y la opcion para vovler al inicio-->
        <div class="mt-4 text-center">
            <span class="text-sm text-gray-600">{{ __("No tienes cuenta?") }}</span>
            <a href="{{ route('register') }}" class="ms-1 underline text-sm text-blue-600 hover:text-blue-800">
                {{ __('Regístrate') }}
            </a>
        </div>

        <div class="mt-5 text-center"> 
            <a href="{{ url('/') }}" class="text-sm text-gray-600 text-decoration-none">
                &larr; Volver al inicio
            </a>
        </div>
    </form>
</x-guest-layout>
