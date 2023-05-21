<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SurfistaController;
use App\Http\Controllers\BateriaController;
use App\Http\Controllers\OndaController;
use App\Http\Controllers\NotaController;


//Surfistas
Route::get('/surfistas', [SurfistaController::class, 'index']);
Route::post('/surfistas', [SurfistaController::class, 'create']);
Route::put('/surfistas/{numero}', [SurfistaController::class, 'update']);
Route::delete('/surfistas/{numero}', [SurfistaController::class, 'delete']);

//Baterias
Route::get('/baterias', [BateriaController::class, 'index']);
Route::post('/baterias', [BateriaController::class, 'create']);
Route::put('/baterias/{id}', [BateriaController::class, 'update']);
Route::delete('/baterias/{id}', [BateriaController::class, 'destroy']);

//Ondas
Route::prefix('ondas')->group(function () {
    Route::get('/', [OndaController::class, 'index']);
    Route::post('/', [OndaController::class, 'create']);
    Route::get('/{id}', [OndaController::class, 'show']);
    Route::put('/{id}', [OndaController::class, 'update']);
    Route::delete('/{id}', [OndaController::class, 'destroy']);
});

//Notas
Route::prefix('notas')->group(function () {
    Route::get('/', [NotaController::class, 'index']);
    Route::post('/', [NotaController::class, 'create']);
    Route::get('/{id}', [NotaController::class, 'show']);
    Route::put('/{id}', [NotaController::class, 'update']);
    Route::delete('/{id}', [NotaController::class, 'destroy']);
});
