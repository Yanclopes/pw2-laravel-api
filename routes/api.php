<?php

use Illuminate\Support\Facades\Route;

Route::get('/imc', [\App\Http\Controllers\IMCController::class, 'calcularIMC']);
Route::get('/sono', [\App\Http\Controllers\SonoController::class, 'verificarSono']);
Route::get('/combustivel', [\App\Http\Controllers\CombustivelController::class, 'calcularGasto']);
Route::get('/combustivel/list', [\App\Http\Controllers\CombustivelController::class, 'listCombustiveis']);
