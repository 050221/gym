<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SuscripcionesController;
use App\Http\Controllers\UsuariosController;
use App\Http\Controllers\MembresiasController;

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
    return view('auth.login');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('suscripciones', [SuscripcionesController::class, 'index'])->middleware('can:admin.suscripciones')->name('suscripciones');
    Route::get('suscripciones/{id}/edit', [SuscripcionesController::class, 'edit'])->middleware('can:admin.suscripciones.edit')->name('suscripciones.edit');
    Route::get('suscripciones/{id}', [SuscripcionesController::class, 'update'])->middleware('can:admin.suscripciones.update')->name('suscripciones.update');
    Route::delete('suscripciones/{id}', [SuscripcionesController::class, 'destroy'])->middleware('can:admin.suscripciones.destroy')->name('suscripciones.destroy');
    Route::get('transacciones', [SuscripcionesController::class, 'transacciones'])->middleware('can:admin.transacciones')->name('transacciones');
    Route::get('historialSuscripciones', [SuscripcionesController::class, 'historialSuscripciones'])->middleware('can:admin.historialSuscripciones')->name('historialSuscripciones');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('clientes', [UsuariosController::class, 'index'])->middleware('can:admin.clientes')->name('clientes');
    Route::get('clientes/{id}/edit', [UsuariosController::class, 'edit'])->middleware('can:admin.clientes.edit')->name('clientes.edit');
    Route::get('clientes/{id}', [UsuariosController::class, 'update'])->middleware('can:admin.clientes.update')->name('clientes.update');
    Route::delete('clientes/{id}', [UsuariosController::class, 'destroy'])->middleware('can:admin.clientes.destroy')->name('clientes.destroy');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('membresias', [MembresiasController::class, 'index'])->middleware('can:admin.membresias')->name('membresias');
    Route::get('membresias/{id}/edit', [MembresiasController::class, 'edit'])->middleware('can:admin.membresias.edit')->name('membresias.edit');
    Route::get('membresias/{id}', [MembresiasController::class, 'update'])->middleware('can:admin.membresias.update')->name('membresias.update');
    Route::delete('membresias/{id}', [MembresiasController::class, 'destroy'])->middleware('can:admin.membresias.destroy')->name('membresias.destroy');
});



