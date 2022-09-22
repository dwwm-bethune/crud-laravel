@extends('layouts.base')

@section('title')
    Login - @parent
@endsection

@section('content')
    <div class="w-1/2 mx-auto">
        @error('email')
            <p class="bg-red-500 py-2 px-3 text-red-200">{{ $message }}</p>
        @enderror

        @if (session('status'))
            <p class="bg-emerald-500 py-2 px-3 text-emerald-200">{{ session('status') }}</p>
        @endif

        <form action="" method="post" class="my-6">
            @csrf

            <div class="mb-3">
                <label for="email" class="block mb-1">Email</label>
                <input type="text" name="email" id="email" class="text-gray-900 w-full rounded-lg mb-2" value="{{ old('email') }}">
            </div>

            <div class="mb-3">
                <label for="password" class="block mb-1">Mot de passe</label>
                <input type="password" name="password" id="password" class="text-gray-900 w-full rounded-lg mb-2">
            </div>

            <div class="mb-3">
                <label for="remember">
                    <input type="checkbox" name="remember" id="remember">
                    <span class="ml-2">Se rappeller de moi</span>
                </label>
            </div>

            <div>
                <button class="px-6 py-2 bg-blue-500 text-white shadow rounded hover:bg-blue-700">Connexion</button>
                <a class="block text-xs mt-4" href="">Réinitialiser le mot de passe</a>
            </div>
        </form>
    </div>
@endsection
