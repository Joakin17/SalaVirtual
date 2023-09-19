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
Route::resource('estadistica/compus', 'App\Http\Controllers\EstadisticaController');
Route::resource('estadistica/salas', 'App\Http\Controllers\EstadisticasalaController');

Route::get('/guardarpres', [App\Http\Controllers\PrestamoController::class, 'guardar'])->name('guardar');
Route::get('/guardarsala', [App\Http\Controllers\PrestamosalaController::class, 'guardar'])->name('guardar');
Route::get('/guardaruser', [App\Http\Controllers\PrestamoController::class, 'guardaruser'])->name('guardaruser');

Route::get('/liberar/{id}/{comp}', [App\Http\Controllers\PrestamoController::class, 'liberar'])->name('liberar');
Route::get('/liberarsala/{id}/{sala}', [App\Http\Controllers\PrestamosalaController::class, 'liberarsala'])->name('liberarsala');

Route::get('/estadisticacompus', [App\Http\Controllers\EstadisticaController::class, 'index'])->name('anualcompus');
Route::get('/estacompusmensual', [App\Http\Controllers\EstadisticaController::class, 'mensual'])->name('mensual');
Route::get('/estacompusrango', [App\Http\Controllers\EstadisticaController::class, 'rango'])->name('rango');
Route::get('/estacompusgenero', [App\Http\Controllers\EstadisticaController::class, 'genero'])->name('genero');

Route::get('/estadisticasalas', [App\Http\Controllers\EstadisticasalaController::class, 'index'])->name('anualsalas');
Route::get('/estasalasmensual', [App\Http\Controllers\EstadisticasalaController::class, 'mensual'])->name('mensual');
Route::get('/estasalasrango', [App\Http\Controllers\EstadisticasalaController::class, 'rango'])->name('rango');
Route::get('/estasalasgenero', [App\Http\Controllers\EstadisticasalaController::class, 'genero'])->name('genero');

Route::get('/prestamocompus/showedit/{carne}', [App\Http\Controllers\PrestamoController::class, 'showedit'])->name('prestamocompus.showedit');
Route::put('/prestamocompus/update/{id}', [App\Http\Controllers\PrestamoController::class, 'update'])->name('prestamocompus.update');



Route::get('/usuarios', function () {
    return view('usuario.usuarios');
})->name('usuarios');

Route::view('/usuarios', 'usuario.usuarios');
Route::view('/agregaru', 'prestamocompu.agregarusuario');
Route::view('/estadistica', 'estadistica.index')->name('estadistica');
// Route::view('/estadistica/compus', 'estadistica.compus.index');

Auth::routes();
