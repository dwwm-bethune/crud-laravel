@extends('layouts.base')

@section('content')
    <div class="flex flex-wrap -mx-3">
        @forelse ($cars as $car)
            <div class="w-1/3">
                <div class="mx-5">
                    <img class="w-full h-64 object-cover" src="{{ asset($car->image) }}" alt="{{ $car->name }}">
                    <div>
                        <h3 class="text-center text-xl font-semibold mt-4">{{ $car->name }}</h3>
                        <p class="text-center text-xs">{{ $car->created_at->translatedFormat('l d F Y') }} - {{ $car->created_at->ago() }}</p>
                        <p class="text-justify mt-5">{{ str($car->content)->words(10) }}</p>
                    </div>
                </div>
            </div>
        @empty
            <h2 class="text-center w-full text-2xl">Il n'y a pas de ressources.</h2>
        @endforelse
    </div>
@endsection
