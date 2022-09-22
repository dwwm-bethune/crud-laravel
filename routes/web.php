<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\CarController;
use App\Models\Car;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('home', [
        'cars' => Car::where('state', true)->limit(2)->latest()->get(),
    ]);
})->name('home');

Route::get('/voitures', [CarController::class, 'index'])->name('cars.index');
Route::get('/voiture/{car}-{slug}', [CarController::class, 'show'])->name('cars.show');
Route::get('/voiture/creer', [CarController::class, 'create'])->name('cars.create');
Route::post('/voiture', [CarController::class, 'store'])->name('cars.store');
Route::get('/voiture/{car}/modifier', [CarController::class, 'edit'])->name('cars.edit');
Route::put('/voiture/{car}', [CarController::class, 'update'])->name('cars.update');
Route::delete('/voiture/{car}', [CarController::class, 'destroy'])->name('cars.destroy');

Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'store']);
Route::get('/logout', [LoginController::class, 'destroy'])->name('logout')->middleware('auth');

Route::get('/inscription', [RegisterController::class, 'index'])->name('register')->middleware('guest');
Route::post('/inscription', [RegisterController::class, 'store'])->middleware('guest');
