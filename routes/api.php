<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SurfistaController;
use App\Http\Controllers\BateriaController;


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
