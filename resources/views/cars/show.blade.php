@extends('layouts.base')

@section('content')
    <div class="flex justify-between space-x-6">
        <div class="w-1/2">
            <h1 class="text-center text-3xl font-semibold mt-4">{{ $car->name }}</h1>
            <p class="text-center text-xs">{{ $car->created_at->translatedFormat('l d F Y') }} - {{ $car->created_at->ago() }}</p>
            <div class="text-justify mt-5">
                {!! str($car->content)->markdown() !!}
            </div>
        </div>
        <div class="w-1/2">
            <img class="w-full object-cover group-hover:scale-110 duration-200" src="{{ asset($car->image) }}" alt="{{ $car->name }}">
        </div>
    </div>
@endsection
