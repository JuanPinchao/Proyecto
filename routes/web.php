<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::resource('productos',App\Http\Controllers\ProductoController::class)->except('show')->names('productos');
Route::resource('categorias',App\Http\Controllers\CategoriaController::class)->except('show')->names('categorias');
Route::resource('subcategorias',App\Http\Controllers\SubcategoriasController::class)->except('show')->names('subcategorias');
Route::resource('users',App\Http\Controllers\UserController::class)->only(['index','edit','update'])->names('users');

