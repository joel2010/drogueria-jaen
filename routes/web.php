<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home.index');
});

// Route::get('/nosotros', function () {
//     return view('about.index');
// });

Route::get('/contacto', function () {
    return view('contact.index');
});

Route::get('/servicios', function () {
    return view('services.index');
});

Route::get('/cuidado-en-casa', function () {
    return view('home-care.index');
});
