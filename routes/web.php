<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ViewsController;

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

Route::get('/', [ViewsController::class, 'products']) ->name('products');

Auth::routes();

Route::group(['prefix' => 'dashboard', 'middleware' => 'admin'], function () {
    Route::resource('products', ProductController::class);
});


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
