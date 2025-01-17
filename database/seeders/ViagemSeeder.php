<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Viagem;
use App\Models\Motorista;
use App\Models\Veiculo;

class ViagemSeeder extends Seeder
{
    public function run()
    {
        $motoristas = Motorista::all();
        $veiculos = Veiculo::all();
        

        Viagem::factory(30)->create()->each(function ($viagem) {
            $viagem->motoristas()->attach(
                Motorista::inRandomOrder()->take(rand(1, 3))->pluck('id')->toArray()
            );
        });
    }
}