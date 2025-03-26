<?php

namespace App\Http\Controllers;

use App\Http\DTO\IMC\IMCDTO;
use App\Http\Requests\IMC\CalcularIMCRequest;
use App\Http\Services\IMCService;

class IMCController extends Controller
{
    public function __construct(
        private readonly IMCService $IMCService
    ){}

    public function calcularIMC(CalcularIMCRequest $request, IMCDTO $imcDTO)
    {
        $request->validated();
        return response()->json($this->IMCService->calcularIMC($imcDTO->fromRequest($request)));
    }
}
