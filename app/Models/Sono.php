<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use DateTime;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Sono extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'horas',
        'data_nascimento',
    ];

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
