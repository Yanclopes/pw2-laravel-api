<?php

namespace App\Http\Controllers;

use App\Http\DTO\Sono\SonoDTO;
use App\Http\Requests\Sono\VerificarSonoRequest;
use App\Http\Services\SonoService;

class SonoController extends Controller
{
    public function __construct(
        private readonly SonoService $SonoService
    )
    {

    }

    public function verificarSono(VerificarSonoRequest $request, SonoDTO $sonoDTO)
    {
        $request->validated();
        return response()->json($this->SonoService->verificarSono($sonoDTO->fromRequest($request)));
    }
}
