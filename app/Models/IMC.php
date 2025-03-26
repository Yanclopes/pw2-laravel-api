<?php

namespace App\Models;

use DateTime;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class IMC extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'peso',
        'altura',
        'data_nascimento',
    ];

    public function calculate(): float
    {
        $resultado = 0;
        if ($this->altura > 0) {
            $resultado = $this->peso / ($this->altura * $this->altura);
        }
        return $resultado;
    }

    public function getIdade(): int
    {
        if (!$this->data_nascimento) {
            return 0;
        }

        $dataNascimento = new DateTime($this->data_nascimento);
        $hoje = new DateTime();
        return $dataNascimento->diff($hoje)->y;
    }
}
