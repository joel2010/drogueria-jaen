<?php

use App\Http\Controllers\Back\BackController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ComplaintBookController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\FrontController;
use App\Http\Controllers\LandingPageController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SpecialtyController;
use App\Http\Controllers\TypeController;
use Illuminate\Support\Facades\Route;

Route::get('/',                     [FrontController::class, 'home'])->name('home');
Route::get('/nosotros',             [FrontController::class, 'about'])->name('about');
Route::get('/contacto',             [FrontController::class, 'contact'])->name('contact');
Route::get('/servicios',            [FrontController::class, 'services'])->name('services');
Route::get('/cuidado-en-casa',      [FrontController::class, 'homeCare'])->name('home-care');
Route::get('/productos',            [FrontController::class, 'products'])->name('products');
Route::get('/producto/{id}',        [FrontController::class, 'productDetail'])->name('product.detail');
Route::get('/libro-reclamaciones',  [FrontController::class, 'complaintsBook'])->name('complaints-book');
Route::get('/products',             [FrontController::class, 'listProducts']);
Route::get('login',                 [LoginController::class, 'showForm'])->name('login');
Route::post('contacto',             [FrontController::class, 'contactStore']);
Route::post('complaints-book',      [FrontController::class, 'complaintsBookStore']);
Route::post('login',                [LoginController::class, 'login']);

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
    Route::prefix('landing-pages')->group(function () {
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
    });

    // libro de reclamaciones
    Route::prefix('complaints-book')->group(function () {
        Route::get('',  [ComplaintBookController::class, 'list']);
    });
});
