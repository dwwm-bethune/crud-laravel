@extends('layouts.base')

@section('content')
    <div class="text-center mb-12">
        <a class="inline-block text-xl bg-gray-200 text-gray-900 border font-semibold px-6 py-3 rounded-md shadow-md hover:bg-transparent hover:text-white duration-200" href="{{ route('cars.create') }}">
            Créer une voiture
        </a>
    </div>

    <div class="flex flex-wrap -mx-3">
        @forelse ($cars as $car)
            <div class="w-full md:w-1/2 lg:w-1/3">
                <div class="mx-5 mb-10 overflow-hidden">
                    <a href="{{ route('cars.show', [$car->id, $car->slug]) }}" class="group">
                        <img class="rounded shadow-xl w-full h-64 object-cover group-hover:scale-110 duration-200" src="{{ asset($car->image) }}" alt="{{ $car->name }}">
                        <div>
                            <h3 class="text-center text-xl font-semibold mt-4">{{ $car->name }}</h3>
                            <p class="text-center text-xs">{{ $car->created_at->translatedFormat('l d F Y') }} - {{ $car->created_at->ago() }}</p>
                            <p class="text-justify mt-5">{{ strip_tags(str($car->content)->markdown()->words(10)) }}</p>
                        </div>
                    </a>
                </div>
            </div>
        @empty
            <h2 class="text-center w-full text-2xl">Il n'y a pas de ressources.</h2>
        @endforelse
    </div>
@endsection
