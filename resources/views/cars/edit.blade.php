@extends('layouts.base')

@section('content')
    <div class="max-w-3xl mx-auto border border-gray-600 rounded-lg p-8 shadow-xl">
        <form action="{{ route('cars.update', $car->id) }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('put')

            <div class="flex justify-between">
                <div class="mb-3 w-1/2 mr-6">
                    <label for="brand" class="block mb-1">Marque</label>
                    <input type="text" name="brand" id="brand" class="text-gray-900 w-full rounded-lg mb-2" value="{{ old('brand', $car->brand) }}">

                    @error('brand')
                        <p class="text-red-500">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-3 w-1/2">
                    <label for="model" class="block mb-1">Modèle</label>
                    <input type="text" name="model" id="model" class="text-gray-900 w-full rounded-lg mb-2" value="{{ old('model', $car->model) }}">

                    @error('model')
                        <p class="text-red-500">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <div class="mb-3">
                <label for="content" class="block mb-1">Contenu</label>
                <textarea id="content" name="content" class="text-gray-900 w-full rounded-lg">{{ old('content', $car->content) }}</textarea>

                @error('content')
                    <p class="text-red-500">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-3">
                <label for="image" class="block mb-1">Image</label>
                <input type="file" name="image" id="image" class="mb-2 cursor-pointer file:cursor-pointer file:duration-300 file:border-0 file:bg-blue-500 file:hover:bg-blue-700 file:rounded file:text-white file:shadow-lg file:px-4 file:py-1 file:mr-3">

                @error('image')
                    <p class="text-red-500">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-3">
                <div class="flex items-center">
                    <input type="checkbox" id="state" name="state" class="mr-3" value="1" @checked(old('state', $car->state)) />
                    <label for="state">Activé ?</label>
                </div>

                @error('state')
                    <p class="text-red-500">{{ $message }}</p>
                @enderror
            </div>

            <div class="text-center">
                <button class="inline-block text-xl bg-gray-200 text-gray-900 border font-semibold px-6 py-3 rounded-md shadow-md hover:bg-transparent hover:text-white duration-200">
                    Modifier la voiture
                </button>
            </div>
        </form>
    </div>
@endsection
