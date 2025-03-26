<?php

namespace App\Http\Controllers;

use App\Http\DTO\Gasolina\GasolinaDto;
use App\Http\Requests\Gasolina\CalcularGastoRequest;
use App\Http\Services\GasolinaService;

class GasolinaController extends Controller
{
    public function __construct(
        private readonly GasolinaService $GasolinaService
    )
    {}

    public function calcularGasto(CalcularGastoRequest $request, GasolinaDTO $gasolinaDTO)
    {
        $request->validated();
        return response()->json($this->GasolinaService->calcularGasto($gasolinaDTO->fromRequest($request)));
    }
}
