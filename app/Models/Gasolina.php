<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Gasolina extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * Tipos de combustível disponíveis.
     */
    const ETANOL = 1;
    const GASOLINA = 2;
    const DIESEL = 3;
    const GNV = 4;

    protected $fillable = [
        'valor',
        'combustivel',
        'distancia',
        'gasto',
    ];

    /**
     * Retorna os tipos de combustível permitidos.
     *
     * @return array
     */
    public static function tiposCombustivel(): array
    {
        return [
            self::ETANOL,
            self::GASOLINA,
            self::DIESEL,
            self::GNV,
        ];
    }
}
