<?php

use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\ResetPasswordController;
use App\Http\Controllers\CarController;
use App\Http\Controllers\ProfilController;
use App\Http\Controllers\UserController;
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
Route::get('/voiture/creer', [CarController::class, 'create'])->name('cars.create')->middleware('auth');
Route::post('/voiture', [CarController::class, 'store'])->name('cars.store')->middleware('auth');
Route::get('/voiture/{car}/modifier', [CarController::class, 'edit'])->name('cars.edit');
Route::put('/voiture/{car}', [CarController::class, 'update'])->name('cars.update');
Route::delete('/voiture/{car}', [CarController::class, 'destroy'])->name('cars.destroy');

Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'store']);
Route::get('/logout', [LoginController::class, 'destroy'])->name('logout')->middleware('auth');

Route::get('/inscription', [RegisterController::class, 'index'])->name('register')->middleware('guest');
Route::post('/inscription', [RegisterController::class, 'store'])->middleware('guest');

Route::get('/forgot-password', [ForgotPasswordController::class, 'index'])->name('password.request')->middleware('guest');
Route::post('/forgot-password', [ForgotPasswordController::class, 'store'])->name('password.email')->middleware('guest');
Route::get('/reset-password/{token}', [ResetPasswordController::class, 'index'])->name('password.reset')->middleware('guest');
Route::post('/reset-password', [ResetPasswordController::class, 'store'])->name('password.update')->middleware('guest');

Route::get('/profil', [ProfilController::class, 'index'])->name('profile')->middleware('auth');
Route::put('/profil', [ProfilController::class, 'update'])->middleware('auth');

Route::get('/users', [UserController::class, 'index'])->middleware('admin');
Route::get('/users/{user}', [UserController::class, 'edit'])->name('users.edit');
Route::put('/users/{user}', [UserController::class, 'update']);
