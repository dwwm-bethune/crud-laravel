<?php

namespace App\Http\Controllers;

use App\Models\Car;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class CarController extends Controller
{
    public function index()
    {
        return view('cars.index', [
            'cars' => Car::where('state', true)->get(),
        ]);
    }

    public function show(Car $car, $slug)
    {
        // Le slug de la voiture doit correspondre à ce qui est dans l'URL
        abort_if($car->slug !== $slug, 404);
        abort_unless($car->state, 404, 'VOITURE DESACTIVEE');

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

        // $request->boolean('state') => On est sûr d'avoir true ou false
        // que la checkboxe soit cochée ou non...
        $validated['state'] = $request->boolean('state');
        // Peugeot 206 => peugeot-206
        $validated['slug'] = str($request->brand.'-'.$request->model)->slug();
        $validated['image'] = '/storage/'.$request->file('image')->store('cars');
        $validated['user_id'] = Auth::user()->id;

        Car::create($validated);

        return redirect()->route('cars.index');
    }

    public function edit(Car $car)
    {
        $this->authorize('update', $car);

        return view('cars.edit', [
            'car' => $car,
        ]);
    }

    public function update(Car $car, Request $request)
    {
        $this->authorize('update', $car);

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
        $this->authorize('delete', $car);

        Storage::delete(str($car->image)->remove('/storage/'));
        $car->delete();

        return redirect()->route('cars.index');
    }
}
