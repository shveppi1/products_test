<?php

use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\Products;
use \App\Http\Controllers\Auth\Sessions;

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

/*Route::get('/', function () {
    return view('welcome');
});*/

Route::get('/', function () {
    return view('index');
});


Route::prefix('/products')->group(function () {
    Route::get('/', [Products::class, 'index'])->name('products.index');
    Route::get('/{product}', [Products::class, 'show'])->name('products.show');
    Route::get('/{product}/edit', [Products::class, 'edit'])->name('products.edit');
    Route::post('/store', [Products::class, 'store'])->name('products.store');
    Route::delete('/{product}', [Products::class, 'destroy'])->name('products.destroy');
    Route::put('/{product}', [ Products::class, 'update' ])->name('products.update');
});


Route::prefix('/auth')->middleware('guest')->group(function(){
    Route::controller(Sessions::class)->group(function(){
        Route::get('/login', 'create')->name('auth.sessions.create');
        Route::post('/login', 'store')->name('auth.sessions.store');
    });
});

Route::middleware('auth', 'verified')->group(function(){
    Route::delete('/logout', [Sessions::class, 'destroy'])->name('auth.sessions.destroy');
});
