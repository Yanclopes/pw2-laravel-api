<?php

namespace App\Http\Services;

use App\Http\DTO\Combustivel\CombustivelDto;
use App\Models\Combustivel;

class CombustivelService
{
    /**
     * Calcula o gasto total de combustível com base na distância, consumo e preço do combustível.
     *
     * @param CombustivelDto $gasolinaDto
     * @return array
     */
    public function calcularGasto(CombustivelDto $gasolinaDto): array
    {
        $gasolina = new Combustivel($gasolinaDto->toArray());
        $litrosNecessarios = $gasolina->distancia / $gasolina->gasto;
        $gastoTotal = $litrosNecessarios * $gasolina->valor;
        return [
            "gasto"=> round($gastoTotal, 2)
        ];
    }
}
