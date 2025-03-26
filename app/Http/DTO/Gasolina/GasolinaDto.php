<?php

namespace App\Http\DTO\Gasolina;

use App\Http\Requests\Gasolina\CalcularGastoRequest;

class GasolinaDto
{
    public int $combustivel;
    public float $valor;
    public int $distancia;
    public int $gasto;

    public function fromRequest(CalcularGastoRequest $data)
    {
        $this->gasto = $data['gasto'];
        $this->distancia = $data['distancia'];
        $this->combustivel = $data['combustivel'];
        $this->valor = $data['valor'];
        return $this;
    }

    public function toArray(){
        return [
            "combustivel" => $this->combustivel,
            "valor" => $this->valor,
            "distancia" => $this->distancia,
            "gasto" => $this->gasto,
        ];
    }
}
