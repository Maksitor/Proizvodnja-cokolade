<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NaruciController;
use App\Http\Controllers\SirovinaController;
use App\Http\Controllers\ProizvodController;
use App\Http\Controllers\ProizvodniProcesController;
use App\Http\Controllers\VrstaCokoladeController;
use App\Http\Controllers\NarudzbinaController;

// Public rute
Route::get('/', function () {
    return view('welcome');
});

// USE CASE 1: Naručivanje proizvoda
Route::get('/naruci', [NaruciController::class, 'create'])->name('naruci.create');
Route::post('/naruci', [NaruciController::class, 'store'])->name('naruci.store');

// USE CASE 2: Stanje sirovina (public)
Route::get('/sirovine/stanje', [SirovinaController::class, 'indexPublic'])->name('sirovine.stanje');

// USE CASE 3: Detalji proizvodne serije
Route::get('/proizvodni-procesi/{proizvodni_proce}', [ProizvodniProcesController::class, 'show'])
    ->name('proizvodni-procesi.show');

// Auth rute (za sada bez auth-a, ali čuvamo strukturu)
Route::prefix('admin')->middleware('auth')->group(function () {
    Route::resource('proizvodi', ProizvodController::class);
    Route::resource('sirovine', SirovinaController::class);
    Route::resource('proizvodni-procesi', ProizvodniProcesController::class);
    Route::resource('vrste-cokolade', VrstaCokoladeController::class);
    Route::resource('narudzbine', NarudzbinaController::class);
});

// Za sada, omogući sve bez auth (za testiranje)
Route::resource('proizvodi', ProizvodController::class);
Route::resource('sirovine', SirovinaController::class);
Route::resource('proizvodni-procesi', ProizvodniProcesController::class);
Route::resource('vrste-cokolade', VrstaCokoladeController::class);
Route::resource('narudzbine', NarudzbinaController::class);