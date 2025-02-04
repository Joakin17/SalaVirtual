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


Route::middleware(['auth'])->group(function () {
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::resource('prestamocompus', 'App\Http\Controllers\PrestamoController');
    Route::resource('prestamosalas', 'App\Http\Controllers\PrestamosalaController');
    Route::resource('estadistica/compus', 'App\Http\Controllers\EstadisticaController');
    Route::resource('estadistica/salas', 'App\Http\Controllers\EstadisticasalaController');
    Route::resource('estadistica/salaspace', 'App\Http\Controllers\EstadisticasalaspaceController');
    
    Route::get('/guardarpres', [App\Http\Controllers\PrestamoController::class, 'guardar'])->name('guardar');
    Route::get('/guardarspaces', [App\Http\Controllers\PrestamoController::class, 'guardarspaces'])->name('guardarspaces');
    Route::get('/guardarsala', [App\Http\Controllers\PrestamosalaController::class, 'guardar'])->name('guardar');
    Route::get('/guardaruser', [App\Http\Controllers\PrestamoController::class, 'guardaruser'])->name('guardaruser');
    
    Route::get('/liberar/{id}/{comp}', [App\Http\Controllers\PrestamoController::class, 'liberar'])->name('liberar');
    Route::get('/liberarpcspace/{id}/{comp}', [App\Http\Controllers\PrestamoController::class, 'liberarpcspace'])->name('liberarpcspace');

    Route::get('/liberarsala/{id}/{sala}', [App\Http\Controllers\PrestamosalaController::class, 'liberarsala'])->name('liberarsala');
    
    Route::get('/estadisticacompus', [App\Http\Controllers\EstadisticaController::class, 'index'])->name('anualcompus');
    Route::get('/estacompusmensual', [App\Http\Controllers\EstadisticaController::class, 'mensual'])->name('mensual');
    Route::get('/estacompusrango', [App\Http\Controllers\EstadisticaController::class, 'rango'])->name('rango');
    Route::get('/estacompusgenero', [App\Http\Controllers\EstadisticaController::class, 'genero'])->name('genero');
    
    Route::get('/estadisticasalas', [App\Http\Controllers\EstadisticasalaController::class, 'index'])->name('anualsalas');
    Route::get('/estasalasmensual', [App\Http\Controllers\EstadisticasalaController::class, 'mensual'])->name('mensual');
    Route::get('/estasalasrango', [App\Http\Controllers\EstadisticasalaController::class, 'rango'])->name('rango');
    Route::get('/estasalasgenero', [App\Http\Controllers\EstadisticasalaController::class, 'genero'])->name('genero');

    Route::get('/estadisticasalaspace', [App\Http\Controllers\EstadisticasalaspaceController::class, 'index'])->name('anualsalas');    
    Route::get('/estasalaspacemensual', [App\Http\Controllers\EstadisticasalaspaceController::class, 'mensual'])->name('mensual');
    Route::get('/estasalaspacerango', [App\Http\Controllers\EstadisticasalaspaceController::class, 'rango'])->name('rango');
    Route::get('/estasalasspacegenero', [App\Http\Controllers\EstadisticasalaspaceController::class, 'genero'])->name('genero');
    
    Route::get('/prestamocompus/showedit/{carne}', [App\Http\Controllers\PrestamoController::class, 'showedit'])->name('prestamocompus.showedit');
    Route::get('/prestamocompus/showspace/{nit}', [App\Http\Controllers\PrestamoController::class, 'showspace'])->name('prestamocompus.showspace');
    Route::put('/prestamocompus/update/{id}', [App\Http\Controllers\PrestamoController::class, 'update'])->name('prestamocompus.update');
    
    Route::get('/prestamocompu/index', [App\Http\Controllers\PrestamoController::class, 'index'])->name('prestamocompu.index');
    Route::get('/prestamosala/index', [App\Http\Controllers\PrestamosalaController::class, 'index'])->name('prestamosala.index');
    

    Route::get('/usuarios', function () {
    return view('usuario.usuarios');
    })->name('usuarios');
    
    Route::view('/estudiante', 'usuario.estudiante');
    Route::view('/externo', 'usuario.externo');
    
    Route::get('/agregarusuarioext', function () {
        return view('usuario.agregarusuarioext');
    })->name('agregarusuarioext');
    
    Route::post('/guardarUsuario', [App\Http\Controllers\UsuarioExternoController::class, 'guardarUsuario'])->name('guardarUsuario');
    
    Route::get('/usuarios-externos', 'UsuarioExternoController@index')->name('usuarios_externos.index');
    Route::get('/usuario-externo/editar/{id}', 'UsuarioExternoController@showedit')->name('UsuarioExterno.showeditar');
    Route::get('/usarios-externo/showeditar/{nit}', [App\Http\Controllers\UsuarioExternoController::class, 'showeditar'])->name('UsuarioExterno.showeditar');    
    Route::put('/usuario-externo/update/{id}', [App\Http\Controllers\UsuarioExternoController::class, 'update'])->name('updateUsuarioExterno');
    
    Route::get('/prestamos/americanspace', function () {
        return view('prestamosamericanspace.index');
    })->name('prestamos.americanspace.index');
    
    Route::get('/Prestamosspace/showspace/{nit}', [App\Http\Controllers\PrestamosspaceController::class, 'showspace'])->name('Prestamosspace.showspace');
    Route::get('/Prestamosspace/showestu/{carne}', [App\Http\Controllers\PrestamosspaceController::class, 'showestu'])->name('Prestamosspace.showestu');


    Route::get('/guardarspace', [App\Http\Controllers\PrestamosspaceController::class, 'guardarspace'])->name('guardarspace');
    Route::get('/guardarprestamoestudiante', [App\Http\Controllers\PrestamosspaceController::class, 'guardarPrestamoEstudiante'])->name('guardarprestamoestudiante');

    Route::get('/prestamosspace', [App\Http\Controllers\PrestamosspaceController::class,'index'])->name('prestamosspace.index');
    Route::get('/liberar/{id}', 'App\Http\Controllers\PrestamosspaceController@liberarspace')->name('liberar.space');
    Route::get('/liberar-estudiante/{id}', 'App\Http\Controllers\PrestamosspaceController@liberarEstudiante')->name('liberar.estudiante');

 
    Route::view('/usuarios', 'usuario.usuarios');
    Route::view('/agregaru', 'prestamocompu.agregarusuario');
    Route::view('/estadistica', 'estadistica.index')->name('estadistica');
    // Route::view('/estadistica/compus', 'estadistica.compus.index');
});

Auth::routes();
