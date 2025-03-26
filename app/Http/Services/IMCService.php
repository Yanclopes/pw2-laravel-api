<?php

namespace App\Http\Services;

use App\Http\DTO\IMC\IMCDTO;
use App\Models\IMC;
use DateTime;

class IMCService
{
    public function calcularIMC(IMCDTO $imcDTO)
    {
        $imc = new IMC($imcDTO->toArray());

        $resultado = $imc->calculate();
        $idade = $imc->getIdade();
        $classificacao = $this->getClassificacao($resultado);
        return [
            'imc' => round($resultado, 2),
            'idade' => $idade,
            'classificacao' => $classificacao
        ];
    }

    private function getClassificacao($imc)
    {
        return array_reduce($this->getFaixas(), function ($carry, $faixa) use ($imc) {
            if ($imc <= $faixa[0] && !$carry) {
                return $faixa[1];
            }
            return $carry;
        });
    }

    private function getFaixas()
    {
        return [
            [18.5, 'Abaixo do peso'],
            [24.9, 'Peso normal'],
            [29.9, 'Sobrepeso'],
            [34.9, 'Obesidade Grau I'],
            [39.9, 'Obesidade Grau II'],
            [PHP_INT_MAX, 'Obesidade Grau III (Mórbida)']
        ];
    }
}
