<?php

namespace App\Http\DTO\IMC;

use App\Http\Requests\IMC\CalcularIMCRequest;

class IMCDTO
{
    public int $peso;
    public float $altura;
    public string $dataNascimento;
    public function fromRequest(CalcularIMCRequest $data)
    {
        $this->peso = $data['peso'];
        $this->altura = $data['altura'];
        $this->dataNascimento = $data['dataNascimento'];
        return $this;
    }

    public function toArray(){
        return [
            'peso' => $this->peso,
            'altura' => $this->altura / 100,
            'data_nascimento' => $this->dataNascimento,
        ];
    }
}
