<?php

use App\Http\Controllers\Back\BackController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ComplaintBookController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\FileController;
use App\Http\Controllers\FrontController;
use App\Http\Controllers\LandingPageController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SpecialtyController;
use App\Http\Controllers\TypeController;
use Illuminate\Support\Facades\Route;

Route::get('/', [FrontController::class, 'index']);

Route::get('/nosotros', [FrontController::class, 'about']);

Route::get('/contacto', function () {
    return view('contact.index');
});

Route::get('/servicios', [FrontController::class, 'services']);

Route::get('/cuidado-en-casa', [FrontController::class, 'homeCare']);

Route::get('/productos', [FrontController::class, 'products']);

Route::get('/libro-reclamaciones', [FrontController::class, 'complaintsBook']);

Route::get('/producto/{slug}', [FrontController::class, 'productDetails']);
Route::post('contacto', [FrontController::class, 'contactStore']);
Route::post('complaints-book', [FrontController::class, 'complaintsBookStore']);
Route::get('login', [LoginController::class, 'showForm'])->name('login');
Route::post('login', [LoginController::class, 'login']);
Route::middleware('auth')->group(function () {
    Route::get('dashboard', [BackController::class, 'home']);
    Route::post('logout', [LogoutController::class, 'logout']);

    // Especialidad
    Route::prefix('specialties')->group(function () {
        Route::get('',                  [SpecialtyController::class, 'list']);
        Route::get('{id}/show',         [SpecialtyController::class, 'show']);
        Route::post('store',            [SpecialtyController::class, 'store']);
        Route::put('{id}/update',       [SpecialtyController::class, 'update']);
        Route::delete('{id}/delete',    [SpecialtyController::class, 'delete']);
    });

    // Contacto
    Route::prefix('contacts')->group(function () {
        Route::get('', [ContactController::class, 'list']);
    });

    // landing page
    Route::prefix('banners')->group(function () {
        Route::get('',                  [LandingPageController::class, 'list']);
        Route::get('{id}/show',         [LandingPageController::class, 'showId']);
        Route::post('store',            [LandingPageController::class, 'store']);
        Route::post('{id}/update',      [LandingPageController::class, 'update']);
        Route::delete('{id}/delete',    [LandingPageController::class, 'delete']);
    });

    //  marcas
    Route::prefix('brands')->group(function () {
        Route::get('',                  [BrandController::class, 'list']);
        Route::get('{id}/show',         [BrandController::class, 'showId']);
        Route::post('store',            [BrandController::class, 'store']);
        Route::put('{id}/update',       [BrandController::class, 'update']);
        Route::delete('{id}/delete',    [BrandController::class, 'delete']);
    });

    // categories
    Route::prefix('categories')->group(function () {
        Route::get('',                  [CategoryController::class, 'list']);
        Route::get('{id}/show',         [CategoryController::class, 'showId']);
        Route::post('store',            [CategoryController::class, 'store']);
        Route::put('{id}/update',       [CategoryController::class, 'update']);
        Route::delete('{id}/delete',    [CategoryController::class, 'delete']);
    });

    // tipos
    Route::prefix('types')->group(function () {
        Route::get('',                  [TypeController::class, 'list']);
        Route::get('{id}/show',         [TypeController::class, 'showId']);
        Route::post('store',            [TypeController::class, 'store']);
        Route::put('{id}/update',       [TypeController::class, 'update']);
        Route::delete('{id}/delete',    [TypeController::class, 'delete']);
    });

    // productos
    Route::prefix('products')->group(function () {
        Route::get('',                  [ProductController::class, 'list']);
        Route::get('{id}/show',         [ProductController::class, 'showId']);
        Route::post('store',            [ProductController::class, 'store']);
        Route::post('{id}/update',      [ProductController::class, 'update']);
        Route::delete('{id}/delete',    [ProductController::class, 'delete']);
        Route::put('{id}/delete-pdf',    [ProductController::class, 'deletePdf']);
        Route::get('tables',    [ProductController::class, 'tables']);
    });

    Route::prefix('files')->group(function () {
        Route::delete('{id}/delete', [FileController::class, 'delete']);
    });

    // libro de reclamaciones
    Route::prefix('complaints-book')->group(function () {
        Route::get('',  [ComplaintBookController::class, 'list']);
    });
});
