<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Veiculo;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Viagem>
 */
class ViagemFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        
        $km_inicial = fake()->numberBetween(0, 100000);
        
        return [
            'km_inicial' => $km_inicial,
            'km_final' => $this->faker->numberBetween($km_inicial + 1, $km_inicial + 500),
            'veiculo_id' => Veiculo::query()->inRandomOrder()->value('id'),
        ];
    }
}
