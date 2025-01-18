<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Viagem extends Model
{
    protected $table = 'viagens';

    protected $fillable = [
        'veiculo_id',
        'km_inicial',
        'km_final',
        'finished',
    ];

    public function veiculo()
    {
        return $this->belongsTo(Veiculo::class, 'veiculo_id');
    }

    public function motoristas()
    {
        return $this->belongsToMany(Motorista::class, 'motorista_viagem', 'viagem_id', 'motorista_id');
    }
    /** @use HasFactory<\Database\Factories\ViagemFactory> */
    use HasFactory;
}
