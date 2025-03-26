<?php

namespace App\Http\Services;

use App\Http\DTO\Sono\SonoDTO;
use App\Models\Sono;

class SonoService
{
    const RECOMENDACAO = [
        [[0, 3], [14, 17]],
        [[4, 11], [12, 15]],
        [[1, 2], [11, 14]],
        [[3, 5], [10, 13]],
        [[6, 13], [9, 11]],
        [[14, 17], [8, 10]],
        [[18, 25], [7, 9]],
        [[26, 64], [7, 9]],
        [[65, 200], [7, 8]]
    ];
    public function verificarSono(SonoDTO $sonoDTO)
    {
        $sono = new Sono($sonoDTO->toArray());

        $idade = $sono->getIdade();
        $horas = $sono->horas;
        $classificacao = $this->getClassificacao($idade, $horas);
        return [
            'idade' => $idade,
            'horas' => $horas,
            'classificacao' => $classificacao
        ];
    }

    function getClassificacao(int $idade, float $horasDormidas): string {
        $intervaloSono = array_reduce(self::RECOMENDACAO, function ($carry, $item) use ($idade) {
            return ($idade >= $item[0][0] && $idade <= $item[0][1]) ? $item[1] : $carry;
        }, null);

        return $intervaloSono === null ? "Idade fora do intervalo considerado."
            : ($horasDormidas < $intervaloSono[0] ? "Você dormiu menos do que o recomendado para sua idade."
                : ($horasDormidas > $intervaloSono[1] ? "Você dormiu mais do que o recomendado para sua idade."
                    : "Você dormiu a quantidade ideal de horas para sua idade."));
    }
}
