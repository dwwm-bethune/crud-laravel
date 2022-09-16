<?php

namespace App\Http\Controllers;

use App\Models\Car;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

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

    public function edit(Car $car)
    {
        return view('cars.edit', [
            'car' => $car,
        ]);
    }

    public function update(Car $car, Request $request)
    {
        $validated = $request->validate([
            'brand' => 'required',
            'model' => 'required',
            'content' => 'required|min:50|max:1000',
            'image' => 'nullable|image|max:4096',
            'state' => 'boolean',
        ]);

        $validated['state'] = $request->boolean('state');
        $validated['slug'] = str($request->brand.'-'.$request->model)->slug();

        if ($request->hasFile('image')) {
            if ($car->image) {
                Storage::delete(str($car->image)->remove('/storage/'));
            }

            $validated['image'] = '/storage/'.$request->file('image')->store('cars');
        }

        $car->update($validated);

        return redirect()->route('cars.index');
    }

    public function destroy(Car $car)
    {
        Storage::delete(str($car->image)->remove('/storage/'));
        $car->delete();

        return redirect()->route('cars.index');
    }
}
