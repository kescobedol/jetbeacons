<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\InstitucioneController;
use App\Http\Livewire\Beacons\ShowBeacons;
use App\Http\Livewire\Contenido\ShowContenido;
use App\Http\Livewire\Contenidos\ShowContenidos;
use App\Http\Livewire\Instituciones\ShowInstituciones;

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
    return view('welcome');
})->name('home');

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::middleware(['auth:sanctum', 'verified'])->get('/instituciones', ShowInstituciones::class)->name('instituciones');

Route::middleware(['auth:sanctum', 'verified'])->get('/beacons', ShowBeacons::class)->name('beacons');

Route::middleware(['auth:sanctum', 'verified'])->get('/contenido', ShowContenidos::class)->name('contenidos');

// Route::get('instituciones', [ShowInstituciones::class, 'index'])->name('instituciones.index');

// Route::get('instituciones/create', [InstitucioneController::class, 'create'])->name('instituciones.create');

// Route::post('instituciones', [InstitucioneController::class, 'store'])->name('instituciones.store');

// Route::get('instituciones/{institucione}', [InstitucioneController::class, 'show'])->name('instituciones.show');

// Route::get('instituciones/{institucione}/edit', [InstitucioneController::class, 'edit'])->name('instituciones.edit');

// Route::put('instituciones/{institucione}', [InstitucioneController::class, 'update'])->name('instituciones.update');

// Route::delete('instituciones/{institucione}', [InstitucioneController::class, 'destroy'])->name('instituciones.destroy');
