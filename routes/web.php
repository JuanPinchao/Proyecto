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

Auth::routes();



Route::get('/', [App\Http\Controllers\IndexController::class, 'index'])->name('index.index');
Route::get('show/{id}', [App\Http\Controllers\IndexController::class, 'show'])->name('index.show');

Route::get('/shop',[App\Http\Controllers\ShopController::class, 'index'])->name('shop.index');
Route::get('/shop/categorias/{id}',[App\Http\Controllers\ShopController::class, 'showCategoria'])->name('shop.showCategoria');
Route::get('/shop/subcategorias/{id}',[App\Http\Controllers\ShopController::class, 'showSubcategoria'])->name('shop.showSubcategoria');


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::resource('productos',App\Http\Controllers\ProductoController::class)->except('show')->names('productos');
Route::resource('categorias',App\Http\Controllers\CategoriaController::class)->except('show')->names('categorias');
Route::resource('subcategorias',App\Http\Controllers\SubcategoriasController::class)->except('show')->names('subcategorias');
Route::resource('users',App\Http\Controllers\UserController::class)->only(['index','edit','update'])->names('users');


Route::resource('profile',App\Http\Controllers\ProfileController::class)->names('profile');
Route::put('profile/edit/{id}',[App\Http\Controllers\UpdateProfile::class, 'update'])->name('updateProfile.update');
Route::put('profile/editPass/{id}',[App\Http\Controllers\UpdatePassword::class, 'update'])->name('updatePassword.update');


