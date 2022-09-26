@extends('layouts.base')

@section('content')
    <div class="max-w-3xl mx-auto border border-gray-600 rounded-lg p-8 shadow-xl">
        @if ($errors->any())
            <div class="bg-red-500 py-2 px-3 text-red-200">
                @foreach($errors->all() as $error)
                    <p>{{ $error }}</p>
                @endforeach
            </div>
        @endif

        <form action="" method="post">
            @csrf
            @method('put')

            <h2>Vous modifiez les rôles de {{ $user->name }}</h2>

            @foreach ($roles as $role)
            <div class="mb-3">
                <div class="flex items-center">
                    <input type="checkbox"
                        id="roles-{{ $role->id }}"
                        name="roles[]"
                        class="mr-3"
                        @checked( in_array($role->id, old('roles', $user->roles->pluck('id')->all())) )
                        value="{{ $role->id }}" />
                    <label for="roles-{{ $role->id }}">{{ $role->name }}</label>
                </div>
            </div>
            @endforeach

            <div class="text-center">
                <button class="inline-block text-xl bg-gray-200 text-gray-900 border font-semibold px-6 py-3 rounded-md shadow-md hover:bg-transparent hover:text-white duration-200">
                    Modifier les rôles
                </button>
            </div>
        </form>
    </div>
@endsection
