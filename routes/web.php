<?php

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
    return view('/auth/login');
});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::resource('prestamocompus', 'App\Http\Controllers\PrestamoController');
Route::resource('prestamosalas', 'App\Http\Controllers\PrestamosalaController');

Route::get('/guardarpres', [App\Http\Controllers\PrestamoController::class, 'guardar'])->name('guardar');
Route::get('/guardarsala', [App\Http\Controllers\PrestamosalaController::class, 'guardar'])->name('guardar');
Route::get('/guardaruser', [App\Http\Controllers\PrestamoController::class, 'guardaruser'])->name('guardaruser');

Route::get('/liberar/{id}/{comp}', [App\Http\Controllers\PrestamoController::class, 'liberar'])->name('liberar');
Route::get('/liberarsala/{id}/{sala}', [App\Http\Controllers\PrestamosalaController::class, 'liberarsala'])->name('liberarsala');

Auth::routes();
