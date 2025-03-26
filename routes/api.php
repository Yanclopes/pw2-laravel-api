<?php

use Illuminate\Support\Facades\Route;

Route::get('/imc', [\App\Http\Controllers\IMCController::class, 'calcularIMC']);
Route::get('/sono', [\App\Http\Controllers\SonoController::class, 'verificarSono']);
Route::get('/gasolina', [\App\Http\Controllers\GasolinaController::class, 'calcularGasto']);
