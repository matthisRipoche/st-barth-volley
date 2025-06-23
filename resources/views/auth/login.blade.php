@extends('layouts.app') {{-- Ou 'layouts.guest' si tu en as un --}}

@section('content')
    <div class="max-w-md mx-auto mt-10 p-6 bg-white shadow-md rounded">

        {{-- Message de session (ex : "déconnecté avec succès") --}}
        @if (session('status'))
            <div class="mb-4 text-sm text-green-600">
                {{ session('status') }}
            </div>
        @endif

        <form method="POST" action="{{ route('login') }}">
            @csrf

            {{-- Email --}}
            <div class="mb-4">
                <label for="email" class="block font-medium text-sm text-gray-700">Email</label>
                <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus
                       class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring focus:ring-indigo-200">

                @error('email')
                    <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                @enderror
            </div>

            {{-- Password --}}
            <div class="mb-4">
                <label for="password" class="block font-medium text-sm text-gray-700">Mot de passe</label>
                <input id="password" type="password" name="password" required
                       class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring focus:ring-indigo-200">

                @error('password')
                    <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                @enderror
            </div>

            {{-- Remember Me --}}
            <div class="mb-4 flex items-center">
                <input id="remember" type="checkbox" name="remember"
                       class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500">
                <label for="remember" class="ms-2 text-sm text-gray-600">Se souvenir de moi</label>
            </div>

            {{-- Boutons --}}
            <div class="flex justify-between items-center">
                @if (Route::has('password.request'))
                    <a href="{{ route('password.request') }}"
                       class="text-sm text-gray-600 hover:text-gray-900 underline">
                        Mot de passe oublié ?
                    </a>
                @endif

                <button type="submit"
                        class="ml-3 inline-flex items-center px-4 py-2 bg-indigo-600 border border-transparent rounded-md
                               font-semibold text-sm text-white uppercase tracking-widest hover:bg-indigo-500">
                    Connexion
                </button>
            </div>
        </form>
    </div>
@endsection
