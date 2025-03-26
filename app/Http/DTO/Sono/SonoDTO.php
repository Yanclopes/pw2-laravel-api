<?php

namespace App\Http\DTO\Sono;

use App\Http\Requests\Sono\VerificarSonoRequest;

class SonoDTO
{
    public int $horas;
    public string $dataNascimento;

    public function fromRequest(VerificarSonoRequest $request)
    {
        $this->horas = $request['horas'];
        $this->dataNascimento = $request['dataNascimento'];
        return $this;
    }

    public function toArray() {
        return [
            'horas' => $this->horas,
            'data_nascimento' => $this->dataNascimento,
        ];
    }
}
