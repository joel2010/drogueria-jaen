<?php

use App\Http\Controllers\Back\BackController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\SpecialtyController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home.index');
});

Route::get('/nosotros', function () {
    return view('about.index');
});

Route::get('/contacto', function () {
    return view('contact.index');
});

Route::get('/servicios', function () {
    return view('services.index');
});

Route::get('/cuidado-en-casa', function () {
    return view('home-care.index');
});

Route::get('/productos', function () {
    return view('products.index');
});

Route::get('/producto/{id}', function ($id) {
    return view('products.detail', ['id' => $id]);
});

Route::get('login', [LoginController::class, 'showForm']);
Route::post('login', [LoginController::class, 'login']);
Route::get('dashboard', [BackController::class, 'home']);
Route::middleware('auth')->group(function () {
    Route::post('logout', [LogoutController::class, 'logout']);

    // Especialidad
    Route::prefix('specialties')->group(function () {
        Route::get('', [SpecialtyController::class, 'list']);
        Route::get('{id}/show', [SpecialtyController::class, 'show']);
        Route::post('store', [SpecialtyController::class, 'store']);
        Route::put('{id}/update', [SpecialtyController::class, 'update']);
        Route::delete('{id}/delete', [SpecialtyController::class, 'delete']);
    });
});