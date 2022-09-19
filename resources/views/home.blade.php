@extends('layouts.base')

@section('content')
<div class="flex flex-wrap -mx-3">
    @foreach ($cars as $car)
        <div class="w-full md:w-1/2 lg:w-1/3">
            <div class="mx-5 mb-10 overflow-hidden">
                <a href="{{ route('cars.show', [$car->id, $car->slug]) }}" class="group">
                    <img class="rounded shadow-xl w-full h-64 object-cover group-hover:scale-110 duration-200" src="{{ asset($car->image) }}" alt="{{ $car->name }}">
                    <div>
                        <h3 class="text-center text-xl font-semibold mt-4">{{ $car->name }}</h3>
                        <p class="text-center text-xs">{{ $car->created_at->translatedFormat('l d F Y') }} - {{ $car->created_at->ago() }}</p>
                        <p class="text-justify mt-5">{{ str(strip_tags(str($car->content)->markdown()))->words(10) }}</p>
                    </div>
                </a>
            </div>
        </div>
    @endforeach
</div>
@endsection
