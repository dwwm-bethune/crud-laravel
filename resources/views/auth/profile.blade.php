@extends('layouts.base')

@section('title')
    {{ Auth::user()->name }} - @parent
@endsection

@section('content')
    <div class="w-1/2 mx-auto">
        @if ($errors->any())
            <div class="bg-red-500 py-2 px-3 text-red-200">
                @foreach($errors->all() as $error)
                    <p>{{ $error }}</p>
                @endforeach
            </div>
        @endif

        <form action="" method="post" class="my-6">
            @csrf
            @method('put')

            <div class="mb-3">
                <label for="name" class="block mb-1">Nom</label>
                <input type="text" name="name" id="name" class="text-gray-900 w-full rounded-lg mb-2" value="{{ old('name', Auth::user()->name) }}">
            </div>

            <div class="mb-3">
                <label for="email" class="block mb-1">Email</label>
                <input type="text" name="email" id="email" class="text-gray-900 w-full rounded-lg mb-2" value="{{ old('email', Auth::user()->email) }}">
            </div>

            <div class="mb-3">
                <label for="password" class="block mb-1">Mot de passe</label>
                <input type="password" name="password" id="password" class="text-gray-900 w-full rounded-lg mb-2">
            </div>

            <div class="mb-3">
                <label for="password_confirmation" class="block mb-1">Confirmer le mot de passe</label>
                <input type="password" name="password_confirmation" id="password_confirmation" class="text-gray-900 w-full rounded-lg mb-2">
            </div>

            <div class="flex justify-between">
                <button class="px-6 py-2 bg-blue-500 text-white shadow rounded hover:bg-blue-700">Modifier</button>
                <a class="px-6 py-2 bg-red-500 text-white shadow rounded hover:bg-red-700" href="{{ route('logout') }}">Déconnexion</a>
            </div>
        </form>
    </div>
@endsection
