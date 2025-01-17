<?php

namespace Database\Seeders;

use App\Models\Veiculo;
use Database\Factories\VeiculoFactory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class VeiculoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Veiculo::factory()->count(15)->create();
    }
}
