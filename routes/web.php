<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ViewsController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\Auth\GoogleController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Route::get('/auth/google', [GoogleController::class, 'redirectToGoogle'])->name('google.login');
Route::get('/auth/google/callback', [GoogleController::class, 'handleGoogleCallback'])->name('google.callback');


Route::get('/', [ViewsController::class, 'products']) ->name('products');

Auth::routes();

Route::group(['prefix' => 'dashboard', 'middleware' => 'admin'], function () {
    Route::resource('products', ProductController::class);
    Route::get('/users', [App\Http\Controllers\AdminController::class, 'index'])->name('admin.users');
    Route::post('/users/update', [App\Http\Controllers\AdminController::class, 'update'])->name('admin.updateUsers');
});

// Alleen toegankelijk voor ingelogde gebruikers
Route::middleware('auth')->group(function () {
    Route::post('/cart/add', [CartController::class, 'add'])->name('cart.add'); // Product toevoegen
    Route::post('/cart/update', [CartController::class, 'updateQuantity'])->name('cart.update'); // Hoeveelheid bijwerken
    Route::post('/cart/remove', [CartController::class, 'remove'])->name('cart.remove'); // Product verwijderen
    Route::get('/cart', [CartController::class, 'index'])->name('cart.index'); // Winkelwagenpagina
});



Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
