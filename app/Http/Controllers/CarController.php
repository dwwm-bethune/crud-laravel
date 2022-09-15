<?php

namespace App\Http\Controllers;

use App\Models\Car;

class CarController extends Controller
{
    public function index()
    {
        return view('cars.index', [
            'cars' => Car::all(),
        ]);
    }

    public function show(Car $car, $slug)
    {
        abort_if($car->slug !== $slug, 404);

        return view('cars.show', [
            'car' => $car,
        ]);
    }
}
