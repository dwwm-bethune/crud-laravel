@extends('layouts.base')

@section('content')
    <div class="flex flex-wrap lg:flex-nowrap lg:justify-between lg:space-x-6">
        <div class="order-1 lg:order-none lg:w-1/2 w-full">
            <h1 class="text-center text-5xl font-bold">{{ $car->name }}</h1>
            <p class="text-center text-xs">{{ $car->created_at->translatedFormat('l d F Y') }} - {{ $car->created_at->ago() }}</p>
            <div class="text-justify mt-5 prose max-w-none prose-invert">
                {!! str($car->content)->markdown() !!}
            </div>
        </div>
        <div class="lg:w-1/2">
            <img class="mb-10 lg:mb-0 rounded shadow-xl w-full object-cover group-hover:scale-110 duration-200" src="{{ asset($car->image) }}" alt="{{ $car->name }}">
        </div>
    </div>
@endsection
