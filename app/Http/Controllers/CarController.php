<?php

namespace App\Http\Controllers;

use App\Models\Car;
use Illuminate\Http\Request;

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

    public function create()
    {
        return view('cars.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'brand' => 'required',
            'model' => 'required',
            'content' => 'required|min:50|max:1000',
            'image' => 'required|image|max:4096',
            'state' => 'boolean',
        ]);

        $validated['state'] = $request->boolean('state');
        $validated['slug'] = str($request->brand.'-'.$request->model)->slug();
        $validated['image'] = '/storage/'.$request->file('image')->store('cars');

        Car::create($validated);

        return redirect()->route('cars.index');
    }
}
