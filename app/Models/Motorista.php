<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Motorista extends Model
{
    protected $table = 'motoristas';

    protected $fillable = [
        'nome', 'data_nascimento', 'numero_cnh',
    ];

    public function viagens()
    {
        return $this->belongsToMany(Viagem::class, 'motorista_viagem', 'motorista_id', 'viagem_id');
    }
    /** @use HasFactory<\Database\Factories\MotoristaFactory> */
    use HasFactory;
}
