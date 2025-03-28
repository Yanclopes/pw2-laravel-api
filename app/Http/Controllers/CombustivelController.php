<?php

namespace App\Http\Controllers;

use App\Http\DTO\Combustivel\CombustivelDto;
use App\Http\Requests\Combustivel\CalcularGastoRequest;
use App\Http\Services\CombustivelService;
use App\Models\Combustivel;

class CombustivelController extends Controller
{
    public function __construct(
        private readonly CombustivelService $GasolinaService
    ){}

    public function listCombustiveis() {
        return response()->json(Combustivel::listCombustiveis());
    }

    public function calcularGasto(CalcularGastoRequest $request, CombustivelDto $gasolinaDTO)
    {
        $request->validated();
        return response()->json($this->GasolinaService->calcularGasto($gasolinaDTO->fromRequest($request)));
    }
}
