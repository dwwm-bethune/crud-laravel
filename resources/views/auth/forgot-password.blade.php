@extends('layouts.base')

@section('title')
    Mot de passe oublié - @parent
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

        @if (session('status'))
            <p class="bg-emerald-500 py-2 px-3 text-emerald-200">{{ session('status') }}</p>
        @endif

        <form action="" method="post" class="my-6">
            @csrf

            <div class="mb-3">
                <label for="email" class="block mb-1">Email</label>
                <input type="text" name="email" id="email" class="text-gray-900 w-full rounded-lg mb-2" value="{{ old('email') }}">
            </div>

            <div>
                <button class="px-6 py-2 bg-blue-500 text-white shadow rounded hover:bg-blue-700">
                    Envoyer un lien
                </button>
            </div>
        </form>
    </div>
@endsection
