<?php

namespace App\Http\Services;

use App\Http\DTO\Gasolina\GasolinaDto;
use App\Models\Gasolina;

class GasolinaService
{
    /**
     * Calcula o gasto total de combustível com base na distância, consumo e preço do combustível.
     *
     * @param GasolinaDto $gasolinaDto
     * @return array
     */
    public function calcularGasto(GasolinaDto $gasolinaDto): array
    {
        $gasolina = new Gasolina($gasolinaDto->toArray());
        $litrosNecessarios = $gasolina->distancia / $gasolina->gasto;
        $gastoTotal = $litrosNecessarios * $gasolina->valor;
        return [
            "gasto"=> round($gastoTotal, 2)
        ];
    }
}
